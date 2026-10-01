<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Temple;
use App\Models\TempleEvent;
use App\Models\TemplePooja;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class TempleController extends Controller
{
    public function index(Request $request): View
    {
        $query = Temple::query()
            ->with(['profile.address.state', 'galleries' => fn ($q) => $q->where('is_active', true)->orderBy('sort_order')->orderBy('id')])
            ->where('status', 'active')
            ->where('verification_status', 'approved');

        if ($request->filled('search')) {
            $search = trim((string) $request->string('search'));
            if ($search !== '') {
                $query->where(function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%")
                        ->orWhere('description', 'like', "%{$search}%")
                        ->orWhereHas('profile.address', fn ($address) => $address->where('address_line_1', 'like', "%{$search}%"));
                });
            }
        }

        if ($request->filled('state')) {
            $state = trim((string) $request->string('state'));
            if ($state !== '' && $state !== 'All Locations') {
                $query->whereHas('profile.address.state', fn ($q) => $q->where('name', $state));
            }
        }

        $temples = $query->orderBy('name')->get()->map(fn (Temple $temple) => $this->templeCardData($temple));

        $activeTempleCount = Temple::query()
            ->where('status', 'active')
            ->where('verification_status', 'approved')
            ->count();

        $eventTempleCount = Temple::query()
            ->where('status', 'active')
            ->where('verification_status', 'approved')
            ->whereHas('events', fn ($q) => $q->where('status', 'active')->where(function ($q) {
                $q->whereNull('end_at')->orWhere('end_at', '>=', now());
            }))
            ->count();

        $categories = [
            ['icon' => 'bi-stars', 'title' => 'Popular Temples', 'count' => $activeTempleCount . ' Temples'],
            ['icon' => 'bi-geo-alt', 'title' => 'Nearby Temples', 'count' => 'Location based'],
            ['icon' => 'bi-heart', 'title' => 'Deity Temples', 'count' => 'Explore temples'],
            ['icon' => 'bi-calendar-event', 'title' => 'Event Temples', 'count' => $eventTempleCount . ' Temples'],
        ];

        $states = Temple::query()
            ->with('profile.address.state')
            ->where('status', 'active')
            ->where('verification_status', 'approved')
            ->get()
            ->map(fn (Temple $temple) => $temple->profile?->address?->state?->name)
            ->filter()
            ->unique()
            ->sort()
            ->values()
            ->prepend('All Locations')
            ->all();

        return view('frontend.temples.index', compact('temples', 'categories', 'states'));
    }

    public function show(string $slug): View
    {
        $temple = $this->publicTemple($slug);

        $templeData = $this->templeDetailData($temple);
        $services = [
            ['icon' => 'bi-calendar-check', 'title' => 'Pooja Booking', 'text' => 'Explore available temple poojas and booking options.'],
            ['icon' => 'bi-heart', 'title' => 'Donations', 'text' => 'Support the temple through available donation services.'],
            ['icon' => 'bi-images', 'title' => 'Temple Gallery', 'text' => 'Explore photos and sacred moments from the temple.'],
            ['icon' => 'bi-calendar-event', 'title' => 'Temple Events', 'text' => 'Discover upcoming devotional events and activities.'],
        ];

        $poojas = TemplePooja::query()
            ->with(['pooja.media', 'schedules'])
            ->where('temple_id', $temple->id)
            ->where('status', 'active')
            ->orderBy('sort_order')
            ->limit(6)
            ->get()
            ->map(fn (TemplePooja $tp) => [
                'name' => $tp->pooja?->name ?? 'Temple Pooja',
                'description' => $tp->description ?: $tp->pooja?->short_description ?: $tp->pooja?->description ?: 'Traditional devotional service.',
                'timing' => $this->scheduleLabel($tp),
                'image' => $this->poojaImage($tp),
            ])->all();

        $information = [
            ['icon' => 'bi-geo-alt', 'title' => 'Location', 'value' => $templeData['location']],
            ['icon' => 'bi-translate', 'title' => 'Language', 'value' => 'Not specified'],
            ['icon' => 'bi-calendar3', 'title' => 'Established', 'value' => $templeData['established']],
            ['icon' => 'bi-shield-check', 'title' => 'Verification', 'value' => 'Verified Temple'],
        ];

        return view('frontend.temples.show', [
            'temple' => $templeData,
            'services' => $services,
            'poojas' => $poojas,
            'information' => $information,
        ]);
    }

    public function gallery(string $slug): View
    {
        $temple = $this->publicTemple($slug);
        $gallery = $temple->galleries()
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get()
            ->map(fn ($item) => [
                'image' => $this->mediaFile($item->file_path),
                'title' => $item->title ?: $temple->name,
                'category' => Str::headline((string) $item->media_type),
            ])->values()->all();

        return view('frontend.temples.gallery', [
            'temple' => $this->templeCardData($temple),
            'gallery' => $gallery,
            'categories' => ['All', 'Architecture', 'Deity', 'Festivals', 'Darshan'],
        ]);
    }

    public function events(string $slug): View
    {
        $temple = $this->publicTemple($slug);
        $events = $temple->events()
            ->where('status', 'active')
            ->where(function ($query) {
                $query->whereNull('end_at')->orWhere('end_at', '>=', now());
            })
            ->orderBy('start_at')
            ->get()
            ->map(fn (TempleEvent $event) => $this->eventData($event, $temple))
            ->values()->all();

        return view('frontend.temples.events', [
            'temple' => $this->templeCardData($temple),
            'events' => $events,
            'categories' => collect($events)->pluck('category')->filter()->unique()->sort()->values()->all(),
            'months' => collect($events)->map(fn ($event) => $event['date'])->values()->all(),
        ]);
    }

    public function poojas(string $slug): View
    {
        $temple = $this->publicTemple($slug);
        $templePoojas = TemplePooja::query()
            ->with(['pooja.category', 'pricing.currency', 'schedules'])
            ->where('temple_id', $temple->id)
            ->where('status', 'active')
            ->orderBy('sort_order')
            ->get();

        $poojas = $templePoojas->map(fn (TemplePooja $tp) => [
            'slug' => $tp->pooja?->slug ?? Str::slug($tp->pooja?->name ?? 'temple-pooja'),
            'name' => $tp->pooja?->name ?? 'Temple Pooja',
            'description' => $tp->description ?: $tp->pooja?->short_description ?: $tp->pooja?->description ?: 'Traditional devotional service.',
            'time' => $this->scheduleLabel($tp),
            'duration' => $tp->pooja?->duration_minutes ? $tp->pooja->duration_minutes . ' mins' : 'As per ritual',
            'price' => $this->displayPrice($tp),
        ])->values()->all();

        return view('frontend.temples.poojas', [
            'temple' => $temple,
            'templeName' => $temple->name,
            'poojas' => $poojas,
        ]);
    }

    public function donations(string $slug): View
    {
        $temple = $this->publicTemple($slug);
        return view('frontend.temples.donations', compact('temple'));
    }

    public function timings(string $slug): View
    {
        $temple = $this->publicTemple($slug);
        $timings = $temple->timings()->orderBy('day_of_week')->get()->map(function ($timing) {
            $label = ($timing->opening_time ? date('g:i A', strtotime($timing->opening_time)) : '') .
                ($timing->opening_time && $timing->closing_time ? ' – ' : '') .
                ($timing->closing_time ? date('g:i A', strtotime($timing->closing_time)) : '');

            return [
                'day' => $this->dayName((int) $timing->day_of_week),
                'timing' => $timing->is_closed ? 'Closed' : (trim($label) !== '' ? trim($label) : 'Not specified'),
            ];
        })->values()->all();

        return view('frontend.temples.timings', compact('temple', 'timings'));
    }

    private function publicTemple(string $slug): Temple
    {
        return Temple::query()
            ->with(['profile.address.city', 'profile.address.state', 'profile.address.country', 'galleries'])
            ->where('slug', $slug)
            ->where('status', 'active')
            ->where('verification_status', 'approved')
            ->firstOrFail();
    }

    private function templeCardData(Temple $temple): array
    {
        $address = $temple->profile?->address;
        return [
            'name' => $temple->name,
            'slug' => $temple->slug,
            'location' => $this->locationLabel($temple),
            'deity' => 'Not specified',
            'image' => $this->templeImage($temple),
            'verified' => $temple->verification_status === 'approved',
            'rating' => '—',
            'reviews' => '0',
            'description' => $temple->description ?: $temple->profile?->short_description ?: 'Explore this sacred temple and its available devotional services.',
            'services' => ['Pooja Booking', 'Gallery', 'Events', 'Donations'],
        ];
    }

    private function templeDetailData(Temple $temple): array
    {
        $data = $this->templeCardData($temple);
        $address = $temple->profile?->address;
        $data['address'] = $address ? implode(', ', array_filter([
            $address->address_line_1,
            $address->address_line_2,
            $address->city?->name,
            $address->state?->name,
            $address->country?->name,
            $address->postal_code,
        ])) : $data['location'];
        $data['established'] = $temple->profile?->established_year ? (string) $temple->profile->established_year : 'Not specified';
        $data['language'] = 'Not specified';
        $data['status'] = 'Active';
        return $data;
    }

    private function locationLabel(Temple $temple): string
    {
        $address = $temple->profile?->address;
        return implode(', ', array_filter([$address?->city?->name, $address?->state?->name])) ?: 'Location not specified';
    }

    private function templeImage(Temple $temple): string
    {
        $gallery = $temple->galleries->first(fn ($item) => $item->is_active);
        return $gallery ? $this->mediaFile($gallery->file_path) : 'temple-1.jpg';
    }

    private function poojaImage(TemplePooja $templePooja): string
    {
        $media = $templePooja->pooja?->media?->first();
        return $media?->file_path ? basename($media->file_path) : 'pooja-1.jpg';
    }

    private function mediaFile(?string $path): string
    {
        if (!$path) {
            return 'temple-1.jpg';
        }
        return basename(parse_url($path, PHP_URL_PATH) ?: $path);
    }

    private function scheduleLabel(TemplePooja $templePooja): string
    {
        $schedule = $templePooja->schedules->first(fn ($item) => $item->status === 'active');
        if (!$schedule) {
            return 'As Scheduled';
        }
        $start = $schedule->start_time ? date('g:i A', strtotime($schedule->start_time)) : null;
        $end = $schedule->end_time ? date('g:i A', strtotime($schedule->end_time)) : null;
        return trim(($start ?: '') . ($start && $end ? ' – ' : '') . ($end ?: '')) ?: 'As Scheduled';
    }

    private function displayPrice(TemplePooja $templePooja): string
    {
        $price = $templePooja->pricing
            ->where('is_active', true)
            ->sortByDesc('is_default')
            ->first();
        if (!$price) {
            return 'Price on request';
        }
        $currency = $price->currency?->code ?: 'INR';
        $symbol = $currency === 'INR' ? '₹' : $currency . ' ';
        return $symbol . number_format((float) $price->amount, 2);
    }

    private function eventData(TempleEvent $event, Temple $temple): array
    {
        $start = $event->start_at;
        return [
            'title' => $event->title,
            'category' => 'Temple Event',
            'date' => $start?->format('d F Y') ?? 'Date not specified',
            'day' => $start?->format('l') ?? '',
            'time' => $start ? $start->format('h:i A') . ($event->end_at ? ' – ' . $event->end_at->format('h:i A') : '') : 'Time not specified',
            'location' => $temple->name,
            'image' => $this->templeImage($temple),
            'description' => $event->description ?: 'Temple devotional event.',
            'registration' => (bool) $event->registration_required,
            'payment' => false,
            'status' => 'Upcoming',
            'featured' => $event->start_at?->isFuture() ?? false,
        ];
    }

    private function dayName(int $day): string
    {
        return [0 => 'Sunday', 1 => 'Monday', 2 => 'Tuesday', 3 => 'Wednesday', 4 => 'Thursday', 5 => 'Friday', 6 => 'Saturday'][$day] ?? 'Day';
    }
}
