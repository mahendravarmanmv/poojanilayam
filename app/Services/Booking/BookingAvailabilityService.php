<?php

namespace App\Services\Booking;

use App\Models\BookingSlot;
use App\Models\BookingSlotLock;
use App\Models\TemplePooja;
use Carbon\Carbon;
use Illuminate\Support\Collection;

class BookingAvailabilityService
{
    public function slotsForDate(TemplePooja $templePooja, Carbon $date): Collection
    {
        return BookingSlot::query()
            ->whereHas('schedule', function ($query) use ($templePooja, $date) {
                $query->where('temple_pooja_id', $templePooja->id)
                    ->where('status', 'active')
                    ->where(function ($query) use ($date) {
                        $query->where(function ($q) use ($date) {
                            $q->where('schedule_type', 'specific')
                                ->whereDate('schedule_date', $date->toDateString());
                        })->orWhere(function ($q) use ($date) {
                            $q->where('schedule_type', 'recurring')
                                ->where('day_of_week', $date->dayOfWeek);
                        });
                    });
            })
            ->whereDate('slot_date', $date->toDateString())
            ->where('status', 'available')
            ->orderBy('start_time')
            ->get()
            ->filter(fn (BookingSlot $slot) => $this->remainingCapacity($slot) > 0)
            ->values();
    }

    public function remainingCapacity(BookingSlot $slot): int
    {
        $activeLocks = BookingSlotLock::query()
            ->where('booking_slot_id', $slot->id)
            ->whereNull('released_at')
            ->where(function ($query) {
                $query->whereNull('expires_at')
                    ->orWhere('expires_at', '>', now());
            })
            ->count();

        return max(0, (int) $slot->capacity - (int) $slot->booked_count - $activeLocks);
    }

    public function assertAvailable(BookingSlot $slot): void
    {
        if ($slot->status !== 'available') {
            throw new \DomainException('The selected time slot is no longer available.');
        }

        if ($this->remainingCapacity($slot) < 1) {
            throw new \DomainException('The selected time slot is already fully booked.');
        }
    }
}
