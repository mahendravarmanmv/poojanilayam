<?php

namespace App\Http\Controllers\Web;

use App\Models\Booking;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Http\Controllers\Controller;
use App\Models\PujariProfile;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PriestController extends Controller
{
    private function baseQuery()
    {
        
		return PujariProfile::query()
			->withAvg([
				'reviews as published_rating' => fn ($query) => $query
					->where('customer_visible', true)
					->whereNotNull('published_at')
					->whereNull('hidden_at')
					->whereIn('status', ['approved', 'published']),
			], 'rating')
			->withCount([
				'reviews as published_reviews_count' => fn ($query) => $query
					->where('customer_visible', true)
					->whereNotNull('published_at')
					->whereNull('hidden_at')
					->whereIn('status', ['approved', 'published']),
			])
			->where('is_active', true)
            ->where('profile_status', '!=', 'incomplete')
            ->where('verification_status', 'approved')
            ->with([
                'user.profile',
                'languages.language',
                'experiences',
                'templeAssignments' => fn ($query) => $query
                    ->where('status', 'active')
                    ->with([
                        'temple.profile.address.city',
                        'temple.profile.address.state',
                        'temple.profile.address.country',
                    ]),
				'availabilities' => fn ($query) => $query
				->orderBy('availability_date')
				->orderBy('day_of_week')
				->orderBy('start_time'),
            ]);
    }

    public function index(Request $request): View
{
    // Fetch public profiles using the existing visibility rules.
    $allPriests = $this->baseQuery()
        ->orderByDesc('experience_years')
        ->orderBy('display_name')
        ->get()
        ->map(fn (PujariProfile $priest) => $this->mapCard($priest))
        ->values();

    // Build filter options from all available public profiles.
    $locations = $allPriests
        ->pluck('location')
        ->filter(fn ($value) => filled($value))
        ->unique()
        ->sort()
        ->values();

    $specializations = $allPriests
        ->flatMap(fn ($priest) => $priest['specializations'])
        ->filter()
        ->unique()
        ->sort()
        ->values();

    $languages = $allPriests
        ->flatMap(fn ($priest) => $priest['languages'])
        ->filter()
        ->unique()
        ->sort()
        ->values();

    // Apply search and filters.
    $filteredPriests = $allPriests
        ->filter(function ($priest) use ($request) {
            $search = mb_strtolower(trim((string) $request->input('search', '')));
            $location = trim((string) $request->input('location', ''));
            $specialization = trim((string) $request->input('specialization', ''));
            $language = trim((string) $request->input('language', ''));

            if ($search !== '') {
                $searchText = mb_strtolower($priest['search_text'] ?? $priest['name']);

                if (! str_contains($searchText, $search)) {
                    return false;
                }
            }

            if (
                $location !== '' &&
                mb_strtolower($priest['location']) !== mb_strtolower($location)
            ) {
                return false;
            }

            if (
                $specialization !== '' &&
                ! in_array(
                    mb_strtolower($specialization),
                    array_map('mb_strtolower', $priest['specializations']),
                    true
                )
            ) {
                return false;
            }

            if (
                $language !== '' &&
                ! in_array(
                    mb_strtolower($language),
                    array_map('mb_strtolower', $priest['languages']),
                    true
                )
            ) {
                return false;
            }

            return true;
        })
        ->values();

    $totalPriests = $filteredPriests->count();

    // Paginate the filtered results while preserving query parameters.
    $perPage = 6;
    $currentPage = LengthAwarePaginator::resolveCurrentPage();

    $priests = new LengthAwarePaginator(
        $filteredPriests
            ->slice(($currentPage - 1) * $perPage, $perPage)
            ->values(),
        $totalPriests,
        $perPage,
        $currentPage,
        [
            'path' => LengthAwarePaginator::resolveCurrentPath(),
            'query' => $request->query(),
        ]
    );

    return view('frontend.priests.index', [
        'priests' => $priests,
        'totalPriests' => $totalPriests,
        'locations' => $locations,
        'specializations' => $specializations,
        'languages' => $languages,
    ]);
}

    public function show(string $slug): View
    {
        $priest = $this->findPublicPriest($slug);

        $mappedPriest = $this->mapProfile($priest);

        $services = collect($mappedPriest['specializations'])
            ->map(fn ($title) => [
                'title' => $title,
                'icon' => 'bi-flower1',
                'description' => 'Service specialization recorded in the priest profile.',
            ])
            ->values();

		$reviews = $priest->reviews()
		->where('customer_visible', true)
		->whereNotNull('published_at')
		->whereNull('hidden_at')
		->whereIn('status', ['approved', 'published'])
		->with('customerProfile.user')
		->latest('published_at')
		->get();
		
		$eligibleBookings = collect();

		if (auth()->check() && $customerProfile = auth()->user()->customerProfile) {

			$eligibleBookings = Booking::query()
				->where('customer_profile_id', $customerProfile->id)
				->where('status', 'completed')
				->whereNotNull('completed_at')
				->whereHas('assignments', function ($query) use ($priest) {
					$query->where('pujari_profile_id', $priest->id);
				})
				->whereNotIn('id', Review::query()
					->select('booking_id')
					->where('reviewable_type', PujariProfile::class)
					->where('reviewable_id', $priest->id)
					->whereNotNull('booking_id')
				)
				->orderByDesc('completed_at')
				->get();
		}
		

		return view('frontend.priests.show', [
		'priest' => $mappedPriest,
		'services' => $services,
		'reviews' => $reviews,
		'slots' => $this->mapAvailabilitySlots($priest),
		'eligibleBookings' => $eligibleBookings,
		]);
    }

    
public function book(string $slug): View
{
    $priest = $this->findPublicPriest($slug);
    $mappedPriest = $this->mapProfile($priest);

    $services = $priest->services()
        ->where('is_active', true)
        ->orderBy('sort_order')
        ->orderBy('service_name')
        ->get();

    // Generate availability slots separately for each service duration.
    $serviceSlotData = [];

    foreach ($services as $service) {
        $duration = max(1, (int) $service->duration_minutes);

        $slots = $this->mapTimeSlots($priest, $duration);

        $serviceSlotData[$service->id] = [
            'duration_minutes' => $duration,
            'dates' => $this->mapAvailableDates($priest, $slots),
            'slots' => $slots,
        ];
    }

    // Initially select the first active service.
    $selectedService = $services->first();

    $selectedData = $selectedService
        ? ($serviceSlotData[$selectedService->id] ?? null)
        : null;

    $availableDates = $selectedData['dates'] ?? collect();
    $timeSlots = $selectedData['slots'] ?? collect();

    $firstDate = $availableDates->first();

    $dateSlots = $firstDate
        ? $timeSlots->where('date_value', $firstDate['date_value'])->values()
        : collect();

    $firstSlot = $dateSlots->firstWhere('available', true);

    return view('frontend.priests.book', [
        'priest' => array_merge($mappedPriest, [
            'service' => $mappedPriest['specializations'][0] ?? 'Not specified',
        ]),
        'services' => $services,
        'serviceSlotData' => $serviceSlotData,
        'availableDates' => $availableDates,
        'timeSlots' => $timeSlots,
        'selectedDate' => $firstDate['full_date'] ?? 'Not selected',
        'selectedDateValue' => $firstDate['date_value'] ?? '',
        'selectedDay' => $firstDate['day_name'] ?? 'Not selected',
        'selectedTime' => $firstSlot['time'] ?? 'Not selected',
    ]);
}


    public function poojas(string $slug): View
    {
        $priest = $this->findPublicPriest($slug);

        // The current schema has no direct priest-to-pooja relationship.
        // Do not infer or fabricate Poojas as being performed by this priest.
        return view('frontend.priests.poojas', [
            'priest' => [
                'name' => $priest->display_name,
                'specialization' => $priest->experiences->pluck('title')->filter()->first() ?? 'Not specified',
                'rating' => '—',
                'reviews' => '—',
                'experience' => $this->formatExperience($priest->experience_years),
            ],
            'poojas' => collect(),
        ]);
    }

    private function findPublicPriest(string $slug): PujariProfile
    {
        return $this->baseQuery()
            ->where(function ($query) use ($slug) {
                $query->where('display_name', $slug)
                    ->orWhere('pujari_number', $slug)
                    ->orWhereRaw("LOWER(REPLACE(display_name, ' ', '-')) = ?", [strtolower($slug)]);
            })
            ->firstOrFail();
    }

    
private function mapCard(PujariProfile $priest): array
{
    $profile = $priest->user?->profile;

    $assignment = $priest->templeAssignments->first();

    $address = $assignment?->temple?->profile?->address;

    $languages = $priest->languages
        ->map(fn ($item) => $item->language?->name)
        ->filter()
        ->values()
        ->all();

    $specializations = $priest->experiences
        ->pluck('title')
        ->filter()
        ->unique()
        ->values()
        ->all();

    $templeNames = $priest->templeAssignments
        ->map(fn ($item) => $item->temple?->name)
        ->filter()
        ->implode(' ');

    $location = filled($priest->location)
    ? trim($priest->location)
    : $this->formatLocation($address);

    $searchText = implode(' ', array_filter([
        $priest->display_name,
        $priest->bio,
        $priest->experience_details,
        $priest->experiences->pluck('title')->implode(' '),
        $priest->experiences->pluck('description')->implode(' '),
        $priest->experiences->pluck('temple_or_organization')->implode(' '),
        implode(' ', $languages),
        implode(' ', $specializations),
        $templeNames,
        $location,
    ]));

    return [
        'name' => $priest->display_name,

        'title' => $priest->experiences
            ->pluck('title')
            ->filter()
            ->first() ?? 'Pujari',

        'location' => $location,

        'experience' => $this->formatExperience(
            $priest->experience_years
        ),

        'languages' => $languages,

        'specializations' => $specializations,

		'rating' => $priest->published_rating !== null
		? number_format((float) $priest->published_rating, 1)
		: '—',

		'reviews' => (int) ($priest->published_reviews_count ?? 0),

        'image' => $profile?->profile_photo,

        'verified' => $priest->verification_status === 'approved',

        'available' => $priest->availabilities->contains('status', 'available'),

        'slug' => $priest->display_name,

        'search_text' => mb_strtolower($searchText),
    ];
}


    private function mapProfile(PujariProfile $priest): array
    {
        $card = $this->mapCard($priest);
        $assignment = $priest->templeAssignments->first();
        $temple = $assignment?->temple;
        $address = $temple?->profile?->address;

        return array_merge($card, [
            'bio' => $priest->bio ?: 'No biography has been provided.',
            'qualification' => $priest->experiences->pluck('title')->filter()->first() ?? 'Not specified',
            'price_from' => 'Not specified',
            'temple' => $temple?->name ?? 'Not assigned',
            'temple_location' => $this->formatLocation($address),
            'temple_slug' => $temple?->slug,
            'live_available' => false,
            'recording_available' => false,
            'prasadam_available' => false,
            'member_since' => $priest->created_at?->format('Y') ?? '—',
        ]);
    }

	private function mapAvailabilitySlots(PujariProfile $priest)
	{
	return $priest->availabilities
		->where('status', 'available')
		->groupBy(function ($availability) {
			return $availability->availability_date?->format('Y-m-d')
				?? 'recurring-' . $availability->day_of_week;
		})
		->map(function ($items) {
			$first = $items->first();

			return [
				'date' => $first->availability_date?->format('d') ?? '—',
				'month' => $first->availability_date?->format('M') ?? 'Recurring',
				'day' => $first->availability_date?->format('l')
					?? $this->dayName($first->day_of_week),
				'slots' => $items->map(
					fn ($item) => $this->formatTimeRange(
						$item->start_time,
						$item->end_time
					)
				)->values()->all(),
			];
		})
		->values();
	}

    
	private function mapAvailableDates(PujariProfile $priest, $timeSlots = null)
	{
	$timeSlots = $timeSlots ?? $this->mapTimeSlots($priest, 60);

	return $timeSlots
		->pluck('date_value')
		->unique()
		->sort()
		->values()
		->map(function ($date, $index) {
			$carbonDate = \Carbon\Carbon::parse($date);

			return [
				'date_value' => $date,
				'date' => $carbonDate->format('d'),
				'month' => $carbonDate->format('M'),
				'day' => $carbonDate->format('D'),
				'day_name' => $carbonDate->format('l'),
				'full_date' => $carbonDate->format('d F Y'),
				'active' => $index === 0,
			];
		});
	}

	private function mapTimeSlots(PujariProfile $priest, int $durationMinutes = 60)
{
    $today = now()->startOfDay();
    $lastDate = $today->copy()->addDays(29);

    $slots = collect();

    $durationMinutes = max(1, $durationMinutes);

    for (
        $date = $today->copy();
        $date->lte($lastDate);
        $date->addDay()
    ) {
        $dateValue = $date->format('Y-m-d');

        // Find availability records applicable to this date.
        $applicableRecords = $priest->availabilities->filter(
            function ($item) use ($date, $dateValue) {
                if ($item->availability_type === 'specific') {
                    return $item->availability_date?->format('Y-m-d')
                        === $dateValue;
                }

                if ($item->availability_type === 'recurring') {
                    return (int) $item->day_of_week
                        === (int) $date->dayOfWeek;
                }

                return false;
            }
        );

        $availableRecords = $applicableRecords
            ->where('status', 'available');

        $unavailableRecords = $applicableRecords
            ->where('status', 'unavailable');

        foreach ($availableRecords as $item) {
            if (!$item->start_time || !$item->end_time) {
                continue;
            }

            $windowStart = \Carbon\Carbon::parse(
                $dateValue . ' ' . $item->start_time
            );

            $windowEnd = \Carbon\Carbon::parse(
                $dateValue . ' ' . $item->end_time
            );

            // Ignore invalid availability windows.
            if ($windowEnd->lte($windowStart)) {
                continue;
            }

            // Generate consecutive slots using the service duration.
            for (
                $slotStart = $windowStart->copy();
                $slotStart->copy()->addMinutes($durationMinutes)->lte($windowEnd);
                $slotStart->addMinutes($durationMinutes)
            ) {
                $slotEnd = $slotStart->copy()->addMinutes($durationMinutes);

                // Hide slots that have already started today.
                if (
                    $date->isToday()
                    && $slotStart->lte(now())
                ) {
                    continue;
                }

                // Exclude slots overlapping an unavailable window.
                $isBlocked = $unavailableRecords->contains(
                    function ($blocked) use ($dateValue, $slotStart, $slotEnd) {
                        if (!$blocked->start_time || !$blocked->end_time) {
                            return false;
                        }

                        $blockedStart = \Carbon\Carbon::parse(
                            $dateValue . ' ' . $blocked->start_time
                        );

                        $blockedEnd = \Carbon\Carbon::parse(
                            $dateValue . ' ' . $blocked->end_time
                        );

                        return $slotStart->lt($blockedEnd)
                            && $slotEnd->gt($blockedStart);
                    }
                );

                if ($isBlocked) {
                    continue;
                }

                $slots->push([
                    'availability_id' => $item->id,
                    'date_value' => $dateValue,
                    'start_time' => $slotStart->format('H:i:s'),
                    'end_time' => $slotEnd->format('H:i:s'),
                    'time' => $this->formatTimeRange(
                        $slotStart->format('H:i:s'),
                        $slotEnd->format('H:i:s')
                    ),
                    'available' => true,
                    'active' => false,
                ]);
            }
        }
    }

    // Remove duplicate slots and sort chronologically.
    return $slots
        ->unique(function ($slot) {
            return $slot['date_value'] . '|'
                . $slot['start_time'] . '|'
                . $slot['end_time'];
        })
        ->sortBy(function ($slot) {
            return $slot['date_value'] . ' ' . $slot['start_time'];
        })
        ->values();
}


    private function formatLocation($address): string
    {
        if (!$address) {
            return 'Location not specified';
        }

        return collect([
            $address->city?->name,
            $address->state?->name,
        ])->filter()->implode(', ') ?: 'Location not specified';
    }

    private function formatExperience(?int $years): string
    {
        return $years !== null ? $years . '+ Years' : 'Experience not specified';
    }

    private function formatTimeRange(?string $start, ?string $end): string
    {
        if (!$start) {
            return 'Time not specified';
        }

        $startLabel = date('g:i A', strtotime($start));
        $endLabel = $end ? date('g:i A', strtotime($end)) : null;

        return $endLabel ? $startLabel . ' - ' . $endLabel : $startLabel;
    }

    private function dayName(?int $day): string
    {
        return match ($day) {
            0 => 'Sunday',
            1 => 'Monday',
            2 => 'Tuesday',
            3 => 'Wednesday',
            4 => 'Thursday',
            5 => 'Friday',
            6 => 'Saturday',
            default => 'Recurring',
        };
    }
}
