@extends('layouts.app')

@section('title', 'Festivals | Pooja Nilayam')

@section(
    'meta_description',
    'Explore upcoming Hindu festivals, their significance, and sacred pooja services with Pooja Nilayam.'
)

@section('content')

@php
    $festivals = [
        [
            'name' => 'Ganesh Chaturthi',
            'date' => '27 August 2026',
            'month' => 'AUG',
            'day' => '27',
            'description' => 'Celebrate the arrival of Lord Ganesha with traditional pooja, prayers and devotional offerings.',
            'icon' => 'bi-flower1',
        ],
        [
            'name' => 'Onam',
            'date' => '26 August 2026',
            'month' => 'AUG',
            'day' => '26',
            'description' => 'A joyful festival celebrating prosperity, devotion, family and the traditional spirit of Onam.',
            'icon' => 'bi-sun',
        ],
        [
            'name' => 'Navaratri',
            'date' => '11 October 2026',
            'month' => 'OCT',
            'day' => '11',
            'description' => 'Nine sacred nights dedicated to the Divine Mother, observed with prayers, poojas and devotion.',
            'icon' => 'bi-stars',
        ],
        [
            'name' => 'Dussehra',
            'date' => '20 October 2026',
            'month' => 'OCT',
            'day' => '20',
            'description' => 'A sacred celebration of the victory of dharma over adharma and the triumph of good over evil.',
            'icon' => 'bi-brightness-high',
        ],
        [
            'name' => 'Diwali',
            'date' => '8 November 2026',
            'month' => 'NOV',
            'day' => '08',
            'description' => 'Celebrate the festival of lights with Lakshmi pooja, prayers for prosperity and family wellbeing.',
            'icon' => 'bi-lamp-fill',
        ],
        [
            'name' => 'Karthika Purnima',
            'date' => '24 November 2026',
            'month' => 'NOV',
            'day' => '24',
            'description' => 'A spiritually significant full-moon day observed with sacred prayers, lamps and devotional offerings.',
            'icon' => 'bi-moon-stars',
        ],
    ];
@endphp

{{-- Breadcrumb --}}
<section class="bg-pn-cream border-bottom">
    <div class="container py-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 small">
                <li class="breadcrumb-item">
                    <a href="{{ route('home') }}" class="text-pn-primary">Home</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    Festivals
                </li>
            </ol>
        </nav>
    </div>
</section>

{{-- Hero --}}
<section class="py-5 bg-white">
    <div class="container">
        <div class="row align-items-center g-4">

            <div class="col-12 col-lg-8">
                <span class="pn-section-label text-uppercase text-pn-gold fw-semibold small">
                    Sacred Calendar
                </span>

                <h1 class="display-5 font-serif text-pn-brown mt-2 mb-3">
                    Festivals & Sacred Occasions
                </h1>

                <div class="pn-divider mb-3"></div>

                <p class="text-secondary mb-0 col-lg-10">
                    Discover important festivals and auspicious occasions throughout the year.
                    Explore their significance and find suitable pooja services for your family.
                </p>
            </div>

            <div class="col-12 col-lg-4">
                <div class="bg-pn-cream rounded-4 p-4 text-center">
                    <i class="bi bi-calendar-heart display-4 text-pn-primary"></i>
                    <h2 class="h5 font-serif text-pn-brown mt-3">
                        Plan Your Devotion
                    </h2>
                    <p class="small text-secondary mb-3">
                        View upcoming festivals and plan your sacred observances in advance.
                    </p>

                    <a href="{{ route('festival.calendar') }}" class="btn btn-pn btn-sm">
                        View Festival Calendar
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>

{{-- Upcoming Festivals --}}
<section class="py-5 bg-pn-cream">
    <div class="container">

        <div class="text-center mb-5">
            <span class="pn-section-label text-uppercase text-pn-gold fw-semibold small">
                Upcoming
            </span>

            <h2 class="font-serif display-6 text-pn-brown mt-2">
                Upcoming Festivals
            </h2>

            <div class="pn-divider mx-auto my-3"></div>

            <p class="text-secondary mb-0 mx-auto col-lg-7">
                Keep track of upcoming sacred occasions and discover meaningful ways
                to celebrate them with your family.
            </p>
        </div>

        <div class="row g-4">

            @foreach($festivals as $festival)
                <div class="col-12 col-md-6 col-lg-4">

                    <article class="card h-100 border-0 rounded-4 shadow-sm overflow-hidden">

                        <div class="bg-white p-4">
                            <div class="d-flex align-items-center gap-3">

                                <div
                                    class="bg-pn-cream rounded-3 text-center p-2 flex-shrink-0"
                                    style="min-width: 68px;"
                                >
                                    <span class="d-block small fw-semibold text-pn-primary">
                                        {{ $festival['month'] }}
                                    </span>

                                    <strong class="d-block fs-4 font-serif text-pn-brown lh-1">
                                        {{ $festival['day'] }}
                                    </strong>
                                </div>

                                <div>
                                    <span class="small text-secondary">
                                        {{ $festival['date'] }}
                                    </span>

                                    <h3 class="h5 font-serif text-pn-brown mb-0 mt-1">
                                        {{ $festival['name'] }}
                                    </h3>
                                </div>

                            </div>
                        </div>

                        <div class="card-body p-4 d-flex flex-column">

                            <div class="mb-3">
                                <div
                                    class="rounded-circle bg-pn-cream d-inline-flex align-items-center justify-content-center"
                                    style="width: 58px; height: 58px;"
                                >
                                    <i class="bi {{ $festival['icon'] }} fs-4 text-pn-primary"></i>
                                </div>
                            </div>

                            <p class="text-secondary small mb-4">
                                {{ $festival['description'] }}
                            </p>

                            <div class="mt-auto">
                                <a
                                    href="{{ route('festival.show', ['slug' => \Illuminate\Support\Str::slug($festival['name'])]) }}"
                                    class="btn btn-pn-outline btn-sm w-100"
                                >
                                    View Festival Details
                                    <i class="bi bi-arrow-right ms-2"></i>
                                </a>
                            </div>

                        </div>

                    </article>

                </div>
            @endforeach

        </div>

    </div>
</section>

{{-- Calendar CTA --}}
<section class="py-5 bg-white">
    <div class="container">
        <div class="bg-pn-brown text-white rounded-4 p-4 p-lg-5">
            <div class="row align-items-center g-4">

                <div class="col-12 col-lg">
                    <span class="small text-uppercase text-warning fw-semibold">
                        Plan Ahead
                    </span>

                    <h2 class="font-serif mt-2 mb-2">
                        Explore the complete festival calendar
                    </h2>

                    <p class="text-white-50 mb-0">
                        Find festivals by month and plan your poojas and devotional occasions.
                    </p>
                </div>

                <div class="col-12 col-lg-auto">
                    <a href="{{ route('festival.calendar') }}" class="btn btn-warning">
                        Open Festival Calendar
                        <i class="bi bi-calendar3 ms-2"></i>
                    </a>
                </div>

            </div>
        </div>
    </div>
</section>

@endsection
