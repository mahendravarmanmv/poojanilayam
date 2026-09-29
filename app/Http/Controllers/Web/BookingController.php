<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Currency;
use App\Models\FamilyMember;
use App\Models\Language;
use App\Models\Pooja;
use App\Models\PoojaExtra;
use App\Models\PujariProfile;
use App\Models\PujariTempleAssignment;
use App\Models\TemplePooja;
use App\Services\Booking\BookingAvailabilityService;
use App\Services\Booking\BookingService;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BookingController extends Controller
{
    public function __construct(
        private readonly BookingAvailabilityService $availability,
        private readonly BookingService $bookingService,
    ) {
    }

    public function create(Request $request, string $slug): View
    {
        $user = $request->user();

        $pooja = Pooja::query()
            ->where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();

        $templePoojas = TemplePooja::query()
            ->with(['temple', 'pricing.currency'])
            ->where('pooja_id', $pooja->id)
            ->where('status', 'active')
            ->whereHas('temple', function ($query) {
                $query->where('status', 'active')
                    ->where('verification_status', 'approved');
            })
            ->orderBy('sort_order')
            ->get();

        $selectedTemplePooja = null;
        $slots = collect();
        $date = Carbon::parse($request->query('date', today()->toDateString()));

        if ($request->filled('temple_pooja_id')) {
            $selectedTemplePooja = $templePoojas->firstWhere('id', (int) $request->query('temple_pooja_id'));

            if ($selectedTemplePooja) {
                $slots = $this->availability->slotsForDate($selectedTemplePooja, $date);
            }
        } elseif ($templePoojas->count() === 1) {
            $selectedTemplePooja = $templePoojas->first();
            $slots = $this->availability->slotsForDate($selectedTemplePooja, $date);
        }

        $currencies = Currency::query()
            ->where('is_active', true)
            ->orderBy('name')
            ->get(['id', 'name', 'code', 'symbol', 'decimal_places']);

        $languages = Language::query()
            ->where('is_active', true)
            ->orderBy('name')
            ->get(['id', 'name', 'code', 'native_name']);

        $familyMembers = FamilyMember::query()
            ->with('relation')
            ->where('customer_profile_id', $user->customerProfile?->id)
            ->where('is_active', true)
            ->orderBy('first_name')
            ->get();

        $addresses = Address::query()
            ->with(['city', 'state', 'country'])
            ->where('user_id', $user->id)
            ->orderByDesc('is_default')
            ->latest('id')
            ->get();

        $extras = PoojaExtra::query()
            ->with(['options' => function ($query) {
                $query->where('is_active', true)
                    ->orderBy('sort_order')
                    ->with('currency:id,name,code,symbol,decimal_places');
            }])
            ->where('pooja_id', $pooja->id)
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        $pujaris = collect();

        if ($selectedTemplePooja) {
            $pujaris = PujariProfile::query()
                ->where('is_active', true)
                ->where('verification_status', 'approved')
                ->whereHas('templeAssignments', function ($query) use ($selectedTemplePooja) {
                    $query->where('temple_id', $selectedTemplePooja->temple_id)
                        ->where('status', 'active')
                        ->where(function ($query) {
                            $query->whereNull('ended_at')
                                ->orWhere('ended_at', '>=', now());
                        });
                })
                ->orderBy('display_name')
                ->get(['id', 'pujari_number', 'display_name', 'experience_years', 'bio']);
        }

        return view('frontend.poojas.book', compact(
            'pooja',
            'templePoojas',
            'selectedTemplePooja',
            'date',
            'slots',
            'currencies',
            'languages',
            'familyMembers',
            'addresses',
            'extras',
            'pujaris'
        ));
    }

    /**
     * Lightweight endpoint for AJAX slot refresh when temple/date changes.
     */
    public function pujaris(Request $request, string $slug): JsonResponse
    {
        $validated = $request->validate(['temple_pooja_id' => ['required', 'integer']]);
        $pooja = Pooja::query()->where('slug', $slug)->where('is_active', true)->firstOrFail();
        $templePooja = TemplePooja::query()->whereKey($validated['temple_pooja_id'])->where('pooja_id', $pooja->id)->where('status', 'active')->firstOrFail();
        $pujaris = PujariProfile::query()->where('is_active', true)->where('verification_status', 'approved')
            ->whereHas('templeAssignments', function ($query) use ($templePooja) {
                $query->where('temple_id', $templePooja->temple_id)->where('status', 'active')
                    ->where(function ($query) { $query->whereNull('ended_at')->orWhere('ended_at', '>=', now()); });
            })->orderBy('display_name')->get(['id', 'display_name', 'experience_years', 'bio']);
        return response()->json(['pujaris' => $pujaris->map(fn ($pujari) => [
            'id' => $pujari->id, 'display_name' => $pujari->display_name,
            'experience_years' => $pujari->experience_years, 'bio' => $pujari->bio,
        ])->values()]);
    }

    public function slots(Request $request, string $slug): JsonResponse
    {
        $validated = $request->validate([
            'temple_pooja_id' => ['required', 'integer'],
            'date' => ['required', 'date_format:Y-m-d'],
        ]);

        $pooja = Pooja::query()
            ->where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();

        $templePooja = TemplePooja::query()
            ->whereKey($validated['temple_pooja_id'])
            ->where('pooja_id', $pooja->id)
            ->firstOrFail();

        $slots = $this->availability
            ->slotsForDate($templePooja, Carbon::createFromFormat('Y-m-d', $validated['date']));

        return response()->json([
            'date' => $validated['date'],
            'slots' => $slots->map(fn ($slot) => [
                'id' => $slot->id,
                'start_time' => $slot->start_time,
                'end_time' => $slot->end_time,
                'capacity' => $slot->capacity,
                'remaining_capacity' => $this->availability->remainingCapacity($slot),
            ])->values(),
        ]);
    }

    public function store(Request $request, string $slug): RedirectResponse
    {
        $validated = $request->validate([
            'temple_pooja_id' => ['required', 'integer'],
            'booking_slot_id' => ['required', 'integer'],
            'currency_code' => ['nullable', 'string', 'size:3'],
            'pujari_profile_id' => ['nullable', 'integer'],
            'customer_notes' => ['nullable', 'string', 'max:5000'],
            'address_id' => ['nullable', 'integer'],
            'sankalpam' => ['nullable', 'array'],
            'sankalpam.language_id' => ['nullable', 'integer'],
            'sankalpam.purpose_type' => ['nullable', 'string', 'max:50'],
            'sankalpam.purpose_details' => ['nullable', 'string', 'max:255'],
            'sankalpam.gotram' => ['nullable', 'string', 'max:150'],
            'sankalpam.nakshatram' => ['nullable', 'string', 'max:150'],
            'sankalpam.special_instructions' => ['nullable', 'string', 'max:5000'],
            'sankalpam.sankalpam_text' => ['nullable', 'string', 'max:10000'],
            'sankalpam.generated_text' => ['nullable', 'string', 'max:10000'],
            'sankalpam.members' => ['nullable', 'array'],
            'sankalpam.members.*.family_member_id' => ['nullable', 'integer'],
            'sankalpam.members.*.name' => ['required', 'string', 'max:200'],
            'sankalpam.members.*.relationship' => ['nullable', 'string', 'max:100'],
            'extras' => ['nullable', 'array'],
            'extras.*.pooja_extra_option_id' => ['required', 'integer'],
            'extras.*.quantity' => ['nullable', 'integer', 'min:1', 'max:99'],
            'address.recipient_name' => ['nullable', 'string', 'max:200'],
            'address.phone' => ['nullable', 'string', 'max:30'],
            'address.address_line_1' => ['nullable', 'string', 'max:255'],
            'address.address_line_2' => ['nullable', 'string', 'max:255'],
            'address.landmark' => ['nullable', 'string', 'max:255'],
            'address.city' => ['nullable', 'string', 'max:150'],
            'address.state' => ['nullable', 'string', 'max:150'],
            'address.country' => ['nullable', 'string', 'max:150'],
            'address.postal_code' => ['nullable', 'string', 'max:30'],
            'address.latitude' => ['nullable', 'numeric'],
            'address.longitude' => ['nullable', 'numeric'],
        ]);

        try {
            $booking = $this->bookingService->createPendingBooking(
                $request->user()->id,
                $validated
            );
        } catch (\DomainException $exception) {
            return back()->withInput()->with('error', $exception->getMessage());
        }

        return redirect()
            ->route('dashboard.bookings')
            ->with('success', "Booking {$booking->booking_id} has been created and is awaiting payment.");
    }
}
