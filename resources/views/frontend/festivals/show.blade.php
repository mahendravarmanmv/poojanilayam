@extends('layouts.app')

@section('title', 'Festival Details | Pooja Nilayam')

@section(
    'meta_description',
    'Learn about the significance, traditions and pooja services associated with this sacred festival.'
)

@section('content')

@php
    $festival = [
        'name' => 'Ganesh Chaturthi',
        'date' => '27 August 2026',
        'day' => 'Thursday',
        'description' => 'Ganesh Chaturthi is a sacred celebration dedicated to Lord Ganesha, observed with devotion, prayers and traditional pooja rituals.',
    ];

    $poojas = [
        ['name' => 'Ganapathi Pooja', 'duration' => '60 mins', 'price' => '₹1,501'],
        ['name' => 'Ganapathi Homam', 'duration' => '90 mins', 'price' => '₹2,501'],
        ['name' => 'Ganesha Atharvashirsha', 'duration' => '45 mins', 'price' => '₹1,201'],
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
                    {{ $festival['name'] }}
                </li>
            </ol>
        </nav>
    </div>
</section>

{{-- Festival Hero --}}
<section class="py-5 bg-white">
    <div class="container">
        <div class="row align-items-center g-4">

            <div class="col-12 col-lg-7">
                <span class="pn-section-label text-uppercase text-pn-gold fw-semibold small">
                    Sacred Festival
                </span>

                <h1 class="display-5 font-serif text-pn-brown mt-2 mb-3">
                    {{ $festival['name'] }}
                </h1>

                <div class="pn-divider mb-3"></div>

                <p class="text-secondary mb-4">
                    {{ $festival['description'] }}
                </p>

                <div class="d-flex flex-wrap gap-3">
                    <span class="badge rounded-pill bg-pn-cream text-pn-primary px-3 py-2">
                        <i class="bi bi-calendar-event me-1"></i>
                        {{ $festival['date'] }}
                    </span>

                    <span class="badge rounded-pill bg-pn-cream text-pn-primary px-3 py-2">
                        <i class="bi bi-calendar-day me-1"></i>
                        {{ $festival['day'] }}
                    </span>
                </div>
            </div>

            <div class="col-12 col-lg-5">
                <div class="bg-pn-cream rounded-4 p-4 p-lg-5 text-center">
                    <div
                        class="rounded-circle bg-white d-inline-flex align-items-center justify-content-center"
                        style="width: 120px; height: 120px;"
                    >
                        <i class="bi bi-flower1 display-4 text-pn-primary"></i>
                    </div>

                    <h2 class="h4 font-serif text-pn-brown mt-4 mb-2">
                        Celebrate with Devotion
                    </h2>

                    <p class="small text-secondary mb-0">
                        Plan a sacred pooja for this auspicious occasion with your family.
                    </p>
                </div>
            </div>

        </div>
    </div>
</section>

{{-- Significance --}}
<section class="py-5 bg-pn-cream">
    <div class="container">

        <div class="row g-4 align-items-start">

            <div class="col-12 col-lg-7">
                <span class="pn-section-label text-uppercase text-pn-gold fw-semibold small">
                    About the Festival
                </span>

                <h2 class="font-serif display-6 text-pn-brown mt-2 mb-3">
                    Significance & Traditions
                </h2>

                <div class="pn-divider mb-4"></div>

                <p class="text-secondary">
                    Ganesh Chaturthi is observed with prayers and traditional rituals
                    dedicated to Lord Ganesha. Families come together to seek blessings
                    for wisdom, auspicious beginnings, prosperity and the removal of obstacles.
                </p>

                <p class="text-secondary mb-0">
                    Devotees may perform a home pooja, participate in temple rituals or
                    arrange a traditional service with a qualified priest.
                </p>
            </div>

            <div class="col-12 col-lg-5">
                <div class="card border-0 rounded-4 shadow-sm h-100">
                    <div class="card-body p-4">
                        <h3 class="h5 font-serif text-pn-brown mb-4">
                            Festival Highlights
                        </h3>

                        <div class="d-flex gap-3 mb-3">
                            <i class="bi bi-heart-fill text-pn-primary mt-1"></i>
                            <div>
                                <strong class="d-block text-pn-brown">Devotional Worship</strong>
                                <span class="small text-secondary">Traditional prayers and pooja rituals.</span>
                            </div>
                        </div>

                        <div class="d-flex gap-3 mb-3">
                            <i class="bi bi-people-fill text-pn-primary mt-1"></i>
                            <div>
                                <strong class="d-block text-pn-brown">Family Celebration</strong>
                                <span class="small text-secondary">A meaningful occasion to celebrate together.</span>
                            </div>
                        </div>

                        <div class="d-flex gap-3">
                            <i class="bi bi-stars text-pn-primary mt-1"></i>
                            <div>
                                <strong class="d-block text-pn-brown">Auspicious Beginnings</strong>
                                <span class="small text-secondary">Seek blessings for new and important endeavours.</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</section>

{{-- Festival Poojas --}}
<section class="py-5 bg-white">
    <div class="container">

        <div class="text-center mb-5">
            <span class="pn-section-label text-uppercase text-pn-gold fw-semibold small">
                Recommended Services
            </span>

            <h2 class="font-serif display-6 text-pn-brown mt-2">
                Poojas for {{ $festival['name'] }}
            </h2>

            <div class="pn-divider mx-auto my-3"></div>

            <p class="text-secondary mx-auto col-lg-7 mb-0">
                Choose a suitable pooja service for your festival celebration.
            </p>
        </div>

        <div class="row g-4">

            @foreach($poojas as $pooja)
                <div class="col-12 col-md-6 col-lg-4">
                    <article class="card h-100 border-0 rounded-4 shadow-sm">

                        <div class="card-body p-4 d-flex flex-column">

                            <div
                                class="rounded-circle bg-pn-cream d-inline-flex align-items-center justify-content-center mb-4"
                                style="width: 64px; height: 64px;"
                            >
                                <i class="bi bi-flower1 fs-4 text-pn-primary"></i>
                            </div>

                            <h3 class="h5 font-serif text-pn-brown">
                                {{ $pooja['name'] }}
                            </h3>

                            <div class="d-flex flex-wrap gap-3 small text-secondary my-3">
                                <span>
                                    <i class="bi bi-clock text-pn-primary me-1"></i>
                                    {{ $pooja['duration'] }}
                                </span>

                                <span>
                                    <i class="bi bi-tag text-pn-primary me-1"></i>
                                    {{ $pooja['price'] }}
                                </span>
                            </div>

                            <a
                                href="{{ route('pooja.show', ['slug' => \Illuminate\Support\Str::slug($pooja['name'])]) }}"
                                class="btn btn-pn btn-sm mt-auto"
                            >
                                View Pooja
                                <i class="bi bi-arrow-right ms-2"></i>
                            </a>

                        </div>
                    </article>
                </div>
            @endforeach

        </div>

    </div>
</section>

{{-- Bottom CTA --}}
<section class="py-5 bg-pn-cream">
    <div class="container">
        <div class="text-center">
            <h2 class="font-serif text-pn-brown mb-2">
                Plan your festival pooja
            </h2>

            <p class="text-secondary mb-4">
                Explore all available poojas and choose the service that suits your family.
            </p>

            <div class="d-flex flex-column flex-sm-row justify-content-center gap-2">
                <a href="{{ route('pooja.index') }}" class="btn btn-pn">
                    Explore Poojas
                </a>

                <a href="{{ route('festival.calendar') }}" class="btn btn-pn-outline">
                    View Festival Calendar
                </a>
            </div>
        </div>
    </div>
</section>

@endsection
