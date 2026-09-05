@extends('layouts.app')

@section('title', 'Festival Calendar | Pooja Nilayam')

@section(
    'meta_description',
    'Browse the Pooja Nilayam festival calendar and explore important upcoming sacred occasions throughout the year.'
)

@section('content')

@php
    $months = [
        [
            'month' => 'August 2026',
            'festivals' => [
                ['date' => '26 Aug', 'name' => 'Onam', 'description' => 'A joyful celebration of prosperity, devotion and family.'],
                ['date' => '27 Aug', 'name' => 'Ganesh Chaturthi', 'description' => 'Sacred worship dedicated to Lord Ganesha.'],
            ],
        ],
        [
            'month' => 'October 2026',
            'festivals' => [
                ['date' => '11 Oct', 'name' => 'Navaratri', 'description' => 'Nine sacred nights dedicated to the Divine Mother.'],
                ['date' => '20 Oct', 'name' => 'Dussehra', 'description' => 'Celebration of the victory of dharma over adharma.'],
            ],
        ],
        [
            'month' => 'November 2026',
            'festivals' => [
                ['date' => '08 Nov', 'name' => 'Diwali', 'description' => 'The festival of lights celebrated with prayers and Lakshmi pooja.'],
                ['date' => '24 Nov', 'name' => 'Karthika Purnima', 'description' => 'A spiritually significant full-moon devotional occasion.'],
            ],
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
                <li class="breadcrumb-item">
                    <a href="{{ route('festival.index') }}" class="text-pn-primary">Festivals</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    Calendar
                </li>
            </ol>
        </nav>
    </div>
</section>

{{-- Page Header --}}
<section class="py-5 bg-white">
    <div class="container">
        <div class="row align-items-center g-4">

            <div class="col-12 col-lg-8">
                <span class="pn-section-label text-uppercase text-pn-gold fw-semibold small">
                    Sacred Calendar
                </span>

                <h1 class="display-5 font-serif text-pn-brown mt-2 mb-3">
                    Festival Calendar
                </h1>

                <div class="pn-divider mb-3"></div>

                <p class="text-secondary mb-0 col-lg-10">
                    Keep track of important festivals and sacred occasions throughout the year.
                    Use the calendar to plan your family poojas and devotional celebrations.
                </p>
            </div>

            <div class="col-12 col-lg-4">
                <div class="bg-pn-cream rounded-4 p-4 text-center">
                    <i class="bi bi-calendar3 display-4 text-pn-primary"></i>
                    <h2 class="h5 font-serif text-pn-brown mt-3">
                        Plan Ahead
                    </h2>
                    <p class="small text-secondary mb-0">
                        Mark important occasions and prepare your pooja plans in advance.
                    </p>
                </div>
            </div>

        </div>
    </div>
</section>

{{-- Calendar Controls --}}
<section class="py-4 bg-pn-cream border-top border-bottom">
    <div class="container">
        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-body p-3 p-lg-4">
                <div class="row g-3 align-items-center">

                    <div class="col-12 col-md">
                        <div class="d-flex align-items-center gap-3">
                            <button
                                type="button"
                                class="btn btn-light border"
                                aria-label="Previous year"
                            >
                                <i class="bi bi-chevron-left"></i>
                            </button>

                            <div class="text-center flex-grow-1">
                                <span class="small text-secondary d-block">
                                    Festival Year
                                </span>
                                <strong class="fs-5 text-pn-brown">
                                    2026
                                </strong>
                            </div>

                            <button
                                type="button"
                                class="btn btn-light border"
                                aria-label="Next year"
                            >
                                <i class="bi bi-chevron-right"></i>
                            </button>
                        </div>
                    </div>

                    <div class="col-12 col-md-4">
                        <select class="form-select" aria-label="Select month">
                            <option selected>All Months</option>
                            <option>January</option>
                            <option>February</option>
                            <option>March</option>
                            <option>April</option>
                            <option>May</option>
                            <option>June</option>
                            <option>July</option>
                            <option>August</option>
                            <option>September</option>
                            <option>October</option>
                            <option>November</option>
                            <option>December</option>
                        </select>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

{{-- Festival Calendar --}}
<section class="py-5 bg-white">
    <div class="container">

        <div class="text-center mb-5">
            <span class="pn-section-label text-uppercase text-pn-gold fw-semibold small">
                2026
            </span>

            <h2 class="font-serif display-6 text-pn-brown mt-2">
                Upcoming Sacred Occasions
            </h2>

            <div class="pn-divider mx-auto my-3"></div>

            <p class="text-secondary mb-0 mx-auto col-lg-7">
                Explore the festivals currently listed in the devotional calendar.
            </p>
        </div>

        <div class="row g-4">

            @foreach($months as $month)
                <div class="col-12 col-lg-4">

                    <div class="card h-100 border-0 rounded-4 shadow-sm overflow-hidden">

                        <div class="bg-pn-cream px-4 py-3 border-bottom">
                            <h3 class="h5 font-serif text-pn-brown mb-0">
                                {{ $month['month'] }}
                            </h3>
                        </div>

                        <div class="card-body p-0">

                            @foreach($month['festivals'] as $festival)
                                <div class="p-4 {{ !$loop->last ? 'border-bottom' : '' }}">

                                    <div class="d-flex gap-3">

                                        <div
                                            class="bg-pn-cream rounded-3 text-center px-2 py-2 flex-shrink-0"
                                            style="min-width: 68px;"
                                        >
                                            <span class="small fw-semibold text-pn-primary">
                                                {{ $festival['date'] }}
                                            </span>
                                        </div>

                                        <div>
                                            <h4 class="h6 font-serif text-pn-brown mb-1">
                                                {{ $festival['name'] }}
                                            </h4>

                                            <p class="small text-secondary mb-0">
                                                {{ $festival['description'] }}
                                            </p>
                                        </div>

                                    </div>

                                </div>
                            @endforeach

                        </div>

                    </div>

                </div>
            @endforeach

        </div>

    </div>
</section>

{{-- CTA --}}
<section class="py-5 bg-pn-cream">
    <div class="container">
        <div class="text-center">
            <h2 class="font-serif text-pn-brown mb-2">
                Celebrate every sacred occasion
            </h2>

            <p class="text-secondary mb-4">
                Explore festival-specific poojas and plan your devotional services.
            </p>

            <div class="d-flex flex-column flex-sm-row justify-content-center gap-2">
                <a href="{{ route('pooja.index') }}" class="btn btn-pn">
                    Explore Poojas
                    <i class="bi bi-arrow-right ms-2"></i>
                </a>

                <a href="{{ route('festival.index') }}" class="btn btn-pn-outline">
                    Back to Festivals
                </a>
            </div>
        </div>
    </div>
</section>

@endsection
