@extends('layouts.app')

@section('title', 'Astrology Services | Pooja Go')

@section(
    'meta_description',
    'Explore astrology services including Horoscope, Kundli, Match Making, Numerology, Palm Reading and Vastu Consultation.'
)

@section('content')

@php
    /*
    |--------------------------------------------------------------------------
    | Date strip
    |--------------------------------------------------------------------------
    | ?date=YYYY-MM-DD  -> selected day
    | ?from=YYYY-MM-DD  -> first day shown in the 7-day strip
    */
    $selected = \Carbon\Carbon::make(request('date'))?->startOfDay() ?? today();
    $from     = \Carbon\Carbon::make(request('from'))?->startOfDay() ?? today();

    // Keep the selected day visible inside the strip
    if ($selected->lt($from) || $selected->gt($from->copy()->addDays(6))) {
        $from = $selected->copy();
    }

    $days     = collect(range(0, 6))->map(fn ($i) => $from->copy()->addDays($i));
    $prevFrom = $from->copy()->subDays(7)->max(today());
    $nextFrom = $from->copy()->addDays(7);
    $canGoPrev = $from->gt(today());

    $dateLink = fn ($date, $start) => request()->fullUrlWithQuery([
        'date' => $date->toDateString(),
        'from' => $start->toDateString(),
    ]) . '#select-date';

    /*
    |--------------------------------------------------------------------------
    | Temporary UI Data (replace with Controller / DB data later)
    |--------------------------------------------------------------------------
    */
    $signs = [
        ['name' => 'Mesha',      'english' => 'Aries',       'glyph' => '♈︎', 'rating' => 3,   'text' => 'Good opportunities at work. Stay confident.'],
        ['name' => 'Vrishabha',  'english' => 'Taurus',      'glyph' => '♉︎', 'rating' => 3,   'text' => 'Focus on finances and avoid unnecessary expenses.'],
        ['name' => 'Mithuna',    'english' => 'Gemini',      'glyph' => '♊︎', 'rating' => 3,   'text' => 'Good communication brings positive results.'],
        ['name' => 'Karkataka',  'english' => 'Cancer',      'glyph' => '♋︎', 'rating' => 3,   'text' => 'Family support brings happiness. Take care of your health.'],
        ['name' => 'Simha',      'english' => 'Leo',         'glyph' => '♌︎', 'rating' => 3.5, 'text' => 'Confidence and new opportunities are on the way.'],
        ['name' => 'Kanya',      'english' => 'Virgo',       'glyph' => '♍︎', 'rating' => 2.5, 'text' => 'Plan your work well. Avoid overthinking.'],
        ['name' => 'Tula',       'english' => 'Libra',       'glyph' => '♎︎', 'rating' => 3,   'text' => 'Balance work and personal life. Good day for relationships.'],
        ['name' => 'Vrushchika', 'english' => 'Scorpio',     'glyph' => '♏︎', 'rating' => 3,   'text' => 'Stay calm and avoid conflicts. New opportunities may come.'],
        ['name' => 'Dhanu',      'english' => 'Sagittarius', 'glyph' => '♐︎', 'rating' => 3,   'text' => 'A favorable day for learning and travel plans.'],
        ['name' => 'Makara',     'english' => 'Capricorn',   'glyph' => '♑︎', 'rating' => 3,   'text' => 'Hard work brings positive results. Be patient.'],
        ['name' => 'Kumbha',     'english' => 'Aquarius',    'glyph' => '♒︎', 'rating' => 3.5, 'text' => 'Good time for new ideas and networking.'],
        ['name' => 'Meena',      'english' => 'Pisces',      'glyph' => '♓︎', 'rating' => 3,   'text' => 'Focus on your goals. Spiritual growth is indicated.'],
    ];
@endphp


{{-- ============================================================
     HERO
============================================================ --}}

<section class="astrology-hero d-flex align-items-center">
    <div class="container-fluid px-3 px-md-4 px-lg-5 position-relative py-5" style="z-index: 1;">
        <div class="row">
            <div class="col-12 col-sm-8 col-md-6 col-lg-5 astrology-hero-content text-start">
                <span class="small text-pn-gold fw-bold text-uppercase">Indian Horoscope</span>

                <h1 class="font-serif display-5 fw-semibold text-pn-brown pn-hero-accent mt-2 mb-3">Daily Horoscope</h1>

                <p class="text-dark mb-4">
                    Get your daily predictions based on Vedic astrology.
                    Explore insights for love, career, finance, health,
                    family and more.
                </p>

                <a href="#todays-horoscope" class="btn btn-pn px-4">
                    View Today's Horoscope
                    <i class="bi bi-arrow-right ms-2"></i>
                </a>
            </div>
        </div>
    </div>
</section>


{{-- ============================================================
     SELECT DATE
============================================================ --}}

<section class="pt-4">
    <div class="container-fluid px-3 px-md-4 px-lg-5">
        <div id="select-date" class="bg-pn-cream border border-warning-subtle rounded-4 p-3 p-md-4">

            {{-- Header Row --}}
            <div class="d-flex align-items-center justify-content-between mb-3">
                <div class="d-flex align-items-center gap-3">
                    <h2 class="font-serif fs-3 fw-bold text-pn-red mb-0">Select Date</h2>

                    {{-- Gold line with centered diamond (pure Bootstrap 5) --}}
                    <div class="d-none d-sm-flex align-items-center">
                        <span class="border-top border-warning px-4"></span>
                        <span class="text-warning lh-1 small">&#9670;</span>
                        <span class="border-top border-warning px-4"></span>
                    </div>
                </div>

                <div class="dropdown">
                    <button
                        type="button"
                        class="btn btn-link d-inline-flex align-items-center gap-2 text-pn-primary fw-semibold text-decoration-none p-0"
                        data-bs-toggle="dropdown"
                        aria-expanded="false"
                    >
                        <i class="bi bi-calendar3 fs-5"></i>
                        <span class="text-decoration-underline">Pick a Date</span>
                    </button>

                    <form
                        method="GET"
                        action="{{ request()->url() }}#select-date"
                        class="dropdown-menu dropdown-menu-end shadow-sm border-warning-subtle p-3"
                    >
                        <label for="pickDate" class="form-label small fw-semibold text-pn-brown mb-1">Choose a date</label>
                        <input
                            type="date"
                            id="pickDate"
                            name="date"
                            value="{{ $selected->toDateString() }}"
                            min="{{ today()->toDateString() }}"
                            class="form-control form-control-sm mb-2"
                            required
                        >
                        <button type="submit" class="btn btn-pn btn-sm w-100">View Horoscope</button>
                    </form>
                </div>
            </div>

            {{-- 7-Day Date Strip --}}
            <div class="d-flex align-items-center gap-2 gap-md-3">
			<a href="{{ $canGoPrev ? $dateLink($selected, $prevFrom) : '#select-date' }}"
			class="btn bg-white border border-warning-subtle text-pn-primary rounded-circle d-inline-flex align-items-center justify-content-center flex-shrink-0 p-2 lh-1 {{ $canGoPrev ? '' : 'disabled' }}"
			aria-label="Previous days"
			@if(!$canGoPrev) aria-disabled="true" tabindex="-1" @endif >
			<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
			<polyline points="15 18 9 12 15 6"></polyline>
			</svg></a>

                <div class="d-flex gap-2 gap-md-3 flex-grow-1 overflow-x-auto py-1">
                    @foreach($days as $day)
                        @php
                            $isSelected = $day->isSameDay($selected);
                            $label = $day->isToday() ? 'Today' : ($day->isTomorrow() ? 'Tomorrow' : $day->format('D'));
                        @endphp

                        <a
                            href="{{ $dateLink($day, $from) }}"
                            class="btn flex-fill text-center rounded-3 px-3 py-3 {{ $isSelected ? 'btn-pn text-white shadow-sm' : 'bg-white bg-opacity-75 border border-warning-subtle text-pn-brown' }}"
                            @if($isSelected) aria-current="date" @endif
                        >
                            <span class="d-block small {{ $isSelected ? 'text-white' : 'text-pn-brown' }}">
                                {{ $label }}
                            </span>
                            <span class="d-block fs-3 fw-bold lh-1 my-2 {{ $isSelected ? 'text-white' : 'text-pn-brown' }}">
                                {{ $day->format('d') }}
                            </span>
                            <span class="d-block small {{ $isSelected ? 'text-white-50' : 'text-secondary' }}">
                                {{ $day->format('M') }}
                            </span>
                        </a>
                    @endforeach
                </div>

				<a
				href="{{ $dateLink($selected, $nextFrom) }}"
				class="btn bg-white border border-warning-subtle text-pn-primary rounded-circle d-inline-flex align-items-center justify-content-center flex-shrink-0 p-2 lh-1"
				aria-label="Next days"
				>
				<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
				<polyline points="9 18 15 12 9 6"></polyline>
				</svg>
				</a>
            </div>

        </div>
    </div>
</section>


{{-- ============================================================
     TODAY'S HOROSCOPE
============================================================ --}}

<section class="pt-4">
    <div class="container-fluid px-3 px-md-4 px-lg-5">
        <div id="todays-horoscope" class="bg-pn-cream border border-warning-subtle rounded-4 p-3 p-md-4">

            <div class="d-flex flex-column flex-sm-row align-items-sm-center justify-content-between gap-1 mb-3">
                <div class="d-flex align-items-center gap-2">
                    <h2 class="font-serif fs-4 fw-semibold text-pn-red mb-0">
                        {{ $selected->isToday() ? "Today's Horoscope" : 'Horoscope' }}
                    </h2>
					<div class="d-none d-sm-flex align-items-center">
                        <span class="border-top border-warning px-4"></span>
                        <span class="text-warning lh-1 small">&#9670;</span>
                        <span class="border-top border-warning px-4"></span>
                    </div>
                    
                </div>

                <small class="text-secondary">{{ $selected->format('d F Y, l') }}</small>
            </div>

            <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-8 g-3">
                @foreach($signs as $sign)
                    <div class="col">
                        <article class="card h-100 border border-warning-subtle rounded-3 bg-white p-2">

					<div class="d-flex align-items-center gap-2 mb-2">
					<div class="ratio ratio-1x1 w-25 flex-shrink-0">
					<div class="d-flex align-items-center justify-content-center rounded-circle bg-pn-beige text-pn-red fs-4">
					{{ $sign['glyph'] }}
					</div>
					</div>

					<div class="lh-sm">
					<strong class="d-block small text-pn-red">{{ $sign['name'] }}</strong>
					<small class="text-secondary">({{ $sign['english'] }})</small>
					</div>
					</div>

                            <div class="small text-pn-gold mb-1" aria-label="Rating {{ $sign['rating'] }} out of 5">
                                @for($i = 1; $i <= 5; $i++)
                                    <i class="bi {{ $sign['rating'] >= $i ? 'bi-star-fill' : ($sign['rating'] >= $i - 0.5 ? 'bi-star-half' : 'bi-star') }}"></i>
                                @endfor
                            </div>

                            <p class="small text-secondary mb-2">{{ $sign['text'] }}</p>

                            <a
                                href="{{ route('astrology.horoscope', ['sign' => Str::slug($sign['english']), 'date' => $selected->toDateString()]) }}"
                                class="small fw-semibold text-pn-primary text-decoration-none mt-auto"
                            >
                                Read More
                                <i class="bi bi-arrow-right ms-1"></i>
                            </a>

                        </article>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
</section>


{{-- ============================================================
     EXPERT ASTROLOGERS CTA
============================================================ --}}

<section class="astrology-bottom d-flex align-items-center">
    <div class="container-fluid px-3 px-md-4 px-lg-5 position-relative py-5" style="z-index: 1;">
        <div class="row">
            <div class="col-12 col-sm-8 col-md-6 col-lg-5 astrology-hero-content text-start">
                <span class="small text-pn-gold fw-bold text-uppercase">Get Deeper Guidance</span>

                <h1 class="font-serif display-5 fw-semibold text-pn-brown pn-hero-accent mt-2 mb-3">Connect with Expert Astrologers</h1>

                <p class="text-dark mb-4">
                    Get personalized solutions for your life's questions
                        through video, audio or chat consultations.
                </p>

                <a href="{{ route('astrology.booking') }}" class="btn btn-pn px-4">
                    Find an Astrologer
                    <i class="bi bi-arrow-right ms-2"></i>
                </a>
            </div>
        </div>
    </div>
</section>

@endsection