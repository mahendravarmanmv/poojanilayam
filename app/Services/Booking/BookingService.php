<?php

namespace App\Services\Booking;

use App\Models\Address;
use App\Models\Booking;
use App\Models\BookingAddress;
use App\Models\BookingExtra;
use App\Models\BookingSankalpam;
use App\Models\BookingSankalpamMember;
use App\Models\BookingSlot;
use App\Models\BookingSlotLock;
use App\Models\BookingStatusHistory;
use App\Models\Currency;
use App\Models\FamilyMember;
use App\Models\PoojaExtraOption;
use App\Models\PujariProfile;
use App\Models\PujariTempleAssignment;
use App\Models\TemplePooja;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BookingService
{
    public function __construct(
        private readonly BookingAvailabilityService $availability,
    ) {
    }

    public function createPendingBooking(int $userId, array $data): Booking
    {
        return DB::transaction(function () use ($userId, $data) {
            $user = \App\Models\User::query()->with('customerProfile')->findOrFail($userId);
            $customerProfile = $user->customerProfile;

            if (!$customerProfile || !$customerProfile->is_booking_eligible) {
                throw new \DomainException('Your customer profile must be completed before booking a pooja.');
            }

            $templePooja = TemplePooja::query()
                ->with(['pooja', 'pricing.currency', 'temple'])
                ->whereKey((int) $data['temple_pooja_id'])
                ->where('status', 'active')
                ->firstOrFail();

            $slot = BookingSlot::query()
                ->whereKey((int) $data['booking_slot_id'])
                ->lockForUpdate()
                ->firstOrFail();

            $slotBelongsToTemplePooja = $slot->schedule()
                ->where('temple_pooja_id', $templePooja->id)
                ->exists();

            if (!$slotBelongsToTemplePooja) {
                throw new \DomainException('The selected time slot does not belong to the selected temple pooja.');
            }

            $this->availability->assertAvailable($slot);

            $currency = $this->resolveCurrency($data['currency_code'] ?? null, $templePooja);

            $pujari = null;
            if (!empty($data['pujari_profile_id'])) {
                $pujari = PujariProfile::query()
                    ->whereKey((int) $data['pujari_profile_id'])
                    ->where('is_active', true)
                    ->where('verification_status', 'approved')
                    ->firstOrFail();

                $assigned = PujariTempleAssignment::query()
                    ->where('pujari_profile_id', $pujari->id)
                    ->where('temple_id', $templePooja->temple_id)
                    ->where('status', 'active')
                    ->where(function ($query) {
                        $query->whereNull('ended_at')->orWhere('ended_at', '>=', now());
                    })
                    ->exists();

                if (!$assigned) {
                    throw new \DomainException('The selected pujari is not available for this temple.');
                }
            }

            $address = $this->resolveAddress($userId, $data);
            $extraRows = $this->resolveExtras($templePooja->pooja_id, $data['extras'] ?? [], $currency->id);

            $poojaAmount = $this->resolvePoojaAmount($templePooja, $currency->id);
            $extrasAmount = collect($extraRows)->sum('total_price');
            $totalAmount = $poojaAmount + $extrasAmount;

            $booking = Booking::query()->create([
                'customer_profile_id' => $customerProfile->id,
                'temple_pooja_id' => $templePooja->id,
                'booking_slot_id' => $slot->id,
                'currency_id' => $currency->id,
                'booking_id' => $this->uniqueBookingId(),
                'reference_id' => $this->uniqueReferenceId(),
                'service_mode' => $templePooja->service_mode,
                'status' => 'pending_payment',
                'booking_date' => $slot->slot_date,
                'start_time' => $slot->start_time,
                'end_time' => $slot->end_time,
                'timezone' => $templePooja->temple?->timezone,
                'pooja_amount' => $poojaAmount,
                'extras_amount' => $extrasAmount,
                'discount_amount' => 0,
                'tax_amount' => 0,
                'total_amount' => $totalAmount,
                'customer_notes' => $data['customer_notes'] ?? null,
            ]);

            BookingStatusHistory::query()->create([
                'booking_id' => $booking->id,
                'from_status' => null,
                'to_status' => 'pending_payment',
                'changed_by_user_id' => $userId,
                'remarks' => 'Booking created and awaiting payment.',
                'changed_at' => now(),
            ]);

            $lock = BookingSlotLock::query()->create([
                'booking_slot_id' => $slot->id,
                'user_id' => $userId,
                'lock_token' => Str::uuid()->toString(),
                'locked_at' => now(),
                'expires_at' => now()->addMinutes(10),
            ]);

            $booking->updateQuietly(['customer_notes' => $booking->customer_notes]);

            foreach ($extraRows as $extra) {
                BookingExtra::query()->create([
                    'booking_id' => $booking->id,
                    'pooja_extra_id' => $extra['pooja_extra_id'],
                    'pooja_extra_option_id' => $extra['pooja_extra_option_id'],
                    'name' => $extra['name'],
                    'code' => $extra['code'],
                    'quantity' => $extra['quantity'],
                    'unit_price' => $extra['unit_price'],
                    'total_price' => $extra['total_price'],
                ]);
            }

            $this->createSankalpam($booking, $userId, $data['sankalpam'] ?? []);
            $this->createBookingAddress($booking, $address);

            if ($pujari) {
                \App\Models\BookingAssignment::query()->create([
                    'booking_id' => $booking->id,
                    'pujari_profile_id' => $pujari->id,
                    'assigned_by_user_id' => $userId,
                    'status' => 'pending',
                    'is_primary' => true,
                    'assigned_at' => now(),
                ]);
            }

            return $booking->fresh(['statusHistories', 'sankalpam', 'extras', 'address', 'assignments']);
        });
    }

    private function resolveCurrency(?string $code, TemplePooja $templePooja): Currency
    {
        if ($code) {
            $currency = Currency::query()->where('code', strtoupper($code))->where('is_active', true)->first();
            if ($currency) {
                return $currency;
            }
        }

        $pricing = $templePooja->pricing
            ->where('is_active', true)
            ->where('is_default', true)
            ->first()
            ?? $templePooja->pricing->where('is_active', true)->first();

        if (!$pricing?->currency) {
            throw new \DomainException('No active currency pricing is configured for this temple pooja.');
        }

        return $pricing->currency;
    }

    private function resolvePoojaAmount(TemplePooja $templePooja, int $currencyId): float
    {
        $pricing = $templePooja->pricing
            ->where('currency_id', $currencyId)
            ->where('is_active', true)
            ->sortByDesc('is_default')
            ->first();

        if (!$pricing) {
            throw new \DomainException('Pricing is not available for the selected currency.');
        }

        return max(0, (float) $pricing->amount - (float) $pricing->discount_amount);
    }

    private function resolveExtras(int $poojaId, array $extras, int $currencyId): array
    {
        $rows = [];
        foreach ($extras as $extra) {
            $option = PoojaExtraOption::query()
                ->with('extra')
                ->whereKey((int) $extra['pooja_extra_option_id'])
                ->where('is_active', true)
                ->whereHas('extra', fn ($query) => $query->where('pooja_id', $poojaId)->where('is_active', true))
                ->firstOrFail();

            if ($option->currency_id !== null && (int) $option->currency_id !== $currencyId) {
                throw new \DomainException("Extra '{$option->name}' is not priced in the selected currency.");
            }

            $quantity = max(1, (int) ($extra['quantity'] ?? 1));
            $unitPrice = (float) $option->price;

            $rows[] = [
                'pooja_extra_id' => $option->pooja_extra_id,
                'pooja_extra_option_id' => $option->id,
                'name' => $option->name,
                'code' => $option->code,
                'quantity' => $quantity,
                'unit_price' => $unitPrice,
                'total_price' => $unitPrice * $quantity,
            ];
        }

        return $rows;
    }

    private function resolveAddress(int $userId, array $data): ?array
    {
        if (!empty($data['address_id'])) {
            $address = Address::query()->where('user_id', $userId)->whereKey((int) $data['address_id'])->firstOrFail();
            return [
                'recipient_name' => $address->recipient_name ?? $address->name ?? '',
                'phone' => $address->phone ?? null,
                'address_line_1' => $address->address_line_1,
                'address_line_2' => $address->address_line_2,
                'landmark' => $address->landmark,
                'city' => $address->city?->name ?? $address->city,
                'state' => $address->state?->name ?? $address->state,
                'country' => $address->country?->name ?? $address->country,
                'postal_code' => $address->postal_code,
                'latitude' => $address->latitude,
                'longitude' => $address->longitude,
            ];
        }

        $raw = $data['address'] ?? [];
        if (!$raw) {
            return null;
        }

        foreach (['recipient_name', 'address_line_1', 'city', 'state', 'country', 'postal_code'] as $required) {
            if (empty($raw[$required])) {
                throw new \DomainException('Please provide all required booking address fields.');
            }
        }

        return $raw;
    }

    private function createBookingAddress(Booking $booking, ?array $address): void
    {
        if (!$address) {
            return;
        }

        BookingAddress::query()->create(array_merge($address, ['booking_id' => $booking->id]));
    }

    private function createSankalpam(Booking $booking, int $userId, array $data): void
    {
        if (!$data) {
            return;
        }

        $members = $data['members'] ?? [];
        $familyIds = collect($members)->pluck('family_member_id')->filter()->map(fn ($id) => (int) $id)->unique();

        if ($familyIds->isNotEmpty()) {
            $allowed = FamilyMember::query()
                ->where('customer_profile_id', $booking->customer_profile_id)
                ->whereIn('id', $familyIds)
                ->pluck('id');

            if ($allowed->count() !== $familyIds->count()) {
                throw new \DomainException('One or more selected family members do not belong to your profile.');
            }
        }

        $sankalpam = BookingSankalpam::query()->create([
            'booking_id' => $booking->id,
            'language_id' => $data['language_id'] ?? null,
            'purpose_type' => $data['purpose_type'] ?? null,
            'purpose_details' => $data['purpose_details'] ?? null,
            'gotram' => $data['gotram'] ?? null,
            'nakshatram' => $data['nakshatram'] ?? null,
            'special_instructions' => $data['special_instructions'] ?? null,
            'sankalpam_text' => $data['sankalpam_text'] ?? null,
            'generated_text' => $data['generated_text'] ?? null,
        ]);

        foreach (array_values($members) as $index => $member) {
            BookingSankalpamMember::query()->create([
                'booking_sankalpam_id' => $sankalpam->id,
                'family_member_id' => $member['family_member_id'] ?? null,
                'name' => $member['name'],
                'relationship' => $member['relationship'] ?? null,
                'sort_order' => $index,
            ]);
        }
    }

    private function uniqueBookingId(): string
    {
        do {
            $id = 'PNB-' . now()->format('Ymd') . '-' . strtoupper(Str::random(8));
        } while (Booking::query()->where('booking_id', $id)->exists());

        return $id;
    }

    private function uniqueReferenceId(): string
    {
        do {
            $id = 'PNR-' . strtoupper(Str::random(10));
        } while (Booking::query()->where('reference_id', $id)->exists());

        return $id;
    }
}
