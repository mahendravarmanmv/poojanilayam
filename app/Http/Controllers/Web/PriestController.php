<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\PujariProfile;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PriestController extends Controller
{
    private function baseQuery()
    {
        return PujariProfile::query()
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
                    ->where('status', 'available')
                    ->orderBy('availability_date')
                    ->orderBy('day_of_week')
                    ->orderBy('start_time'),
            ]);
    }

    public function index(Request $request): View
    {
        $priests = $this->baseQuery()
            ->when($request->filled('search'), function ($query) use ($request) {
                $term = trim((string) $request->input('search'));

                $query->where(function ($query) use ($term) {
                    $query->where('display_name', 'like', "%{$term}%")
                        ->orWhere('bio', 'like', "%{$term}%")
                        ->orWhereHas('experiences', function ($query) use ($term) {
                            $query->where('title', 'like', "%{$term}%")
                                ->orWhere('description', 'like', "%{$term}%")
                                ->orWhere('temple_or_organization', 'like', "%{$term}%");
                        })
                        ->orWhereHas('languages.language', function ($query) use ($term) {
                            $query->where('name', 'like', "%{$term}%");
                        })
                        ->orWhereHas('templeAssignments.temple', function ($query) use ($term) {
                            $query->where('name', 'like', "%{$term}%");
                        });
                });
            })
            ->orderByDesc('experience_years')
            ->orderBy('display_name')
            ->get();

        $mappedPriests = $priests->map(fn (PujariProfile $priest) => $this->mapCard($priest))->values();

        $locations = $mappedPriests
            ->pluck('location')
            ->filter()
            ->unique()
            ->sort()
            ->values();

        $specializations = $mappedPriests
            ->flatMap(fn ($priest) => $priest['specializations'])
            ->filter()
            ->unique()
            ->sort()
            ->values();

        $languages = $mappedPriests
            ->flatMap(fn ($priest) => $priest['languages'])
            ->filter()
            ->unique()
            ->sort()
            ->values();

        return view('frontend.priests.index', [
            'priests' => $mappedPriests,
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

        return view('frontend.priests.show', [
            'priest' => $mappedPriest,
            'services' => $services,
            'reviews' => [],
            'slots' => $this->mapAvailabilitySlots($priest),
        ]);
    }

    public function book(string $slug): View
    {
        $priest = $this->findPublicPriest($slug);
        $mappedPriest = $this->mapProfile($priest);
        $availableDates = $this->mapAvailableDates($priest);
        $timeSlots = $this->mapTimeSlots($priest);

        $firstDate = $availableDates->first();
        $firstSlot = $timeSlots->firstWhere('available', true);

        return view('frontend.priests.book', [
            'priest' => array_merge($mappedPriest, [
                'service' => $mappedPriest['specializations'][0] ?? 'Not specified',
            ]),
            'availableDates' => $availableDates,
            'timeSlots' => $timeSlots,
            'selectedDate' => $firstDate['full_date'] ?? 'Not selected',
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

        return [
            'name' => $priest->display_name,
            'title' => $priest->experiences->pluck('title')->filter()->first() ?? 'Pujari',
            'location' => $this->formatLocation($address),
            'experience' => $this->formatExperience($priest->experience_years),
            'languages' => $priest->languages->map(fn ($item) => $item->language?->name)->filter()->values()->all(),
            'specializations' => $priest->experiences->pluck('title')->filter()->unique()->values()->all(),
            'rating' => '—',
            'reviews' => '—',
            'image' => $profile?->profile_photo,
            'verified' => $priest->verification_status === 'approved',
            'available' => $priest->availabilities->isNotEmpty(),
            'slug' => $priest->display_name,
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
            ->groupBy(fn ($availability) => $availability->availability_date?->format('Y-m-d') ?? 'recurring-' . $availability->day_of_week)
            ->map(function ($items, $key) {
                $first = $items->first();

                return [
                    'date' => $first->availability_date?->format('d') ?? '—',
                    'month' => $first->availability_date?->format('M') ?? 'Recurring',
                    'day' => $first->availability_date?->format('l') ?? $this->dayName($first->day_of_week),
                    'slots' => $items->map(fn ($item) => $this->formatTimeRange($item->start_time, $item->end_time))->values()->all(),
                ];
            })
            ->values();
    }

    private function mapAvailableDates(PujariProfile $priest)
    {
        return $priest->availabilities
            ->filter(fn ($item) => $item->availability_date)
            ->groupBy(fn ($item) => $item->availability_date->format('Y-m-d'))
            ->map(function ($items) {
                $date = $items->first()->availability_date;

                return [
                    'date' => $date->format('d'),
                    'month' => $date->format('M'),
                    'day' => $date->format('D'),
                    'day_name' => $date->format('l'),
                    'full_date' => $date->format('d F Y'),
                    'active' => false,
                ];
            })
            ->values();
    }

    private function mapTimeSlots(PujariProfile $priest)
    {
        return $priest->availabilities
            ->map(fn ($item) => [
                'time' => $this->formatTimeRange($item->start_time, $item->end_time),
                'available' => $item->status === 'available',
                'active' => false,
            ])
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
