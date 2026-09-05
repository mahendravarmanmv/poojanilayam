@extends('layouts.app')

@section('title', 'Poojas by Priest | Pooja Nilayam')

@section(
    'meta_description',
    'Explore poojas performed by this priest and choose a suitable service for your devotional needs.'
)

@section('content')

@php
    $priest = [
        'name' => 'Sri Anantha Sharma',
        'specialization' => 'Vedic Poojas & Homams',
        'experience' => '15+ Years',
        'rating' => '4.9',
        'reviews' => '128',
    ];

    $poojas = [
        [
            'name' => 'Ganapathi Homam',
            'description' => 'A sacred homam performed for removing obstacles and seeking auspicious beginnings.',
            'duration' => '90 mins',
            'price' => '₹2,501',
            'rating' => '4.9',
            'category' => 'Ganapathi',
        ],
        [
            'name' => 'Rudrabhishekam',
            'description' => 'Traditional Shiva worship for peace, wellbeing and spiritual blessings.',
            'duration' => '75 mins',
            'price' => '₹2,101',
            'rating' => '4.9',
            'category' => 'Shiva',
        ],
        [
            'name' => 'Satyanarayana Pooja',
            'description' => 'A devotional pooja traditionally performed for blessings, harmony and prosperity.',
            'duration' => '120 mins',
            'price' => '₹2,801',
            'rating' => '4.8',
            'category' => 'Vishnu',
        ],
        [
            'name' => 'Lakshmi Pooja',
            'description' => 'A sacred Lakshmi worship service seeking prosperity, abundance and family wellbeing.',
            'duration' => '60 mins',
            'price' => '₹1,801',
            'rating' => '4.9',
            'category' => 'Lakshmi',
        ],
        [
            'name' => 'Navagraha Shanti Pooja',
            'description' => 'Traditional prayers dedicated to the Navagrahas for peace and auspiciousness.',
            'duration' => '120 mins',
            'price' => '₹3,501',
            'rating' => '4.8',
            'category' => 'Navagraha',
        ],
        [
            'name' => 'Ayushya Homam',
            'description' => 'A traditional homam performed with prayers for wellbeing, longevity and blessings.',
            'duration' => '90 mins',
            'price' => '₹2,901',
            'rating' => '4.9',
            'category' => 'Homam',
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
                    <a href="{{ route('priest.index') }}" class="text-pn-primary">Priests</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    Poojas
                </li>
            </ol>
        </nav>
    </div>
</section>

{{-- Priest Header --}}
<section class="py-5 bg-white">
    <div class="container">
        <div class="row align-items-center g-4">

            <div class="col-12 col-md-auto text-center text-md-start">
                <div
                    class="rounded-circle bg-pn-cream border border-warning-subtle d-inline-flex align-items-center justify-content-center"
                    style="width: 110px; height: 110px;"
                >
                    <i class="bi bi-person-heart display-5 text-pn-primary"></i>
                </div>
            </div>

            <div class="col-12 col-md">
                <div class="text-center text-md-start">
                    <span class="small text-uppercase text-pn-gold fw-semibold">
                        Poojas by Priest
                    </span>

                    <h1 class="font-serif text-pn-brown mt-2 mb-2">
                        {{ $priest['name'] }}
                    </h1>

                    <p class="text-secondary mb-3">
                        {{ $priest['specialization'] }}
                    </p>

                    <div class="d-flex flex-wrap justify-content-center justify-content-md-start gap-3">
                        <span class="small">
                            <i class="bi bi-star-fill text-pn-gold me-1"></i>
                            {{ $priest['rating'] }} ({{ $priest['reviews'] }} reviews)
                        </span>

                        <span class="small text-secondary">
                            <i class="bi bi-award text-pn-primary me-1"></i>
                            {{ $priest['experience'] }} experience
                        </span>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-auto text-center">
                <a
                    href="{{ route('priest.show', ['slug' => 'anantha-sharma']) }}"
                    class="btn btn-pn"
                >
                    View Priest Profile
                    <i class="bi bi-arrow-right ms-2"></i>
                </a>
            </div>

        </div>
    </div>
</section>

{{-- Intro --}}
<section class="bg-pn-cream py-5">
    <div class="container">

        <div class="text-center mb-4">
            <span class="pn-section-label text-uppercase text-pn-gold fw-semibold small">
                Sacred Services
            </span>

            <h2 class="font-serif display-6 text-pn-brown mt-2">
                Poojas performed by {{ $priest['name'] }}
            </h2>

            <div class="pn-divider mx-auto my-3"></div>

            <p class="text-secondary mx-auto col-lg-7 mb-0">
                Choose from the poojas and homams available with this priest.
                Select a service to view its details and booking options.
            </p>
        </div>

        {{-- Search / Filters --}}
        <div class="card border-0 shadow-sm rounded-4 mb-5">
            <div class="card-body p-3 p-lg-4">
                <div class="row g-3 align-items-center">

                    <div class="col-12 col-lg">
                        <div class="input-group">
                            <span class="input-group-text bg-white border-end-0">
                                <i class="bi bi-search text-pn-primary"></i>
                            </span>

                            <input
                                type="search"
                                class="form-control border-start-0 shadow-none"
                                placeholder="Search poojas..."
                                aria-label="Search poojas"
                            >
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-lg-3">
                        <select class="form-select" aria-label="Filter by category">
                            <option selected>All Categories</option>
                            <option>Ganapathi</option>
                            <option>Shiva</option>
                            <option>Vishnu</option>
                            <option>Lakshmi</option>
                            <option>Navagraha</option>
                            <option>Homam</option>
                        </select>
                    </div>

                    <div class="col-12 col-sm-6 col-lg-3">
                        <select class="form-select" aria-label="Sort poojas">
                            <option selected>Recommended</option>
                            <option>Price: Low to High</option>
                            <option>Price: High to Low</option>
                            <option>Rating</option>
                            <option>Duration</option>
                        </select>
                    </div>

                </div>
            </div>
        </div>

        {{-- Pooja Cards --}}
        <div class="row g-4">

            @foreach($poojas as $pooja)
                <div class="col-12 col-sm-6 col-lg-4">

                    <article class="card h-100 border-0 rounded-4 shadow-sm overflow-hidden">

                        <div class="bg-white d-flex align-items-center justify-content-center" style="height: 190px;">
                            <div
                                class="rounded-circle bg-pn-cream d-inline-flex align-items-center justify-content-center"
                                style="width: 92px; height: 92px;"
                            >
                                <i class="bi bi-flower1 display-6 text-pn-primary"></i>
                            </div>
                        </div>

                        <div class="card-body p-4 d-flex flex-column">

                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span class="badge rounded-pill bg-pn-cream text-pn-primary">
                                    {{ $pooja['category'] }}
                                </span>

                                <span class="small">
                                    <i class="bi bi-star-fill text-pn-gold me-1"></i>
                                    {{ $pooja['rating'] }}
                                </span>
                            </div>

                            <h3 class="h5 font-serif text-pn-brown fw-semibold">
                                {{ $pooja['name'] }}
                            </h3>

                            <p class="small text-secondary mb-4">
                                {{ $pooja['description'] }}
                            </p>

                            <div class="row g-2 small text-secondary mb-4">
                                <div class="col-6">
                                    <i class="bi bi-clock text-pn-primary me-1"></i>
                                    {{ $pooja['duration'] }}
                                </div>

                                <div class="col-6 text-end">
                                    <i class="bi bi-person-check text-pn-primary me-1"></i>
                                    Verified Priest
                                </div>
                            </div>

                            <div class="d-flex align-items-end justify-content-between gap-3 mt-auto">
                                <div>
                                    <small class="text-secondary d-block">
                                        Starting from
                                    </small>

                                    <strong class="fs-5 text-pn-brown">
                                        {{ $pooja['price'] }}
                                    </strong>
                                </div>

                                <a
                                    href="{{ route('pooja.show', ['slug' => \Illuminate\Support\Str::slug($pooja['name'])]) }}"
                                    class="btn btn-pn btn-sm"
                                >
                                    View Details
                                </a>
                            </div>

                        </div>
                    </article>

                </div>
            @endforeach

        </div>

        {{-- Bottom CTA --}}
        <div class="text-center mt-5 pt-2">
            <p class="text-secondary mb-3">
                Looking for a different priest?
            </p>

            <a
                href="{{ route('priest.index') }}"
                class="btn btn-pn-outline"
            >
                Explore All Priests
                <i class="bi bi-arrow-right ms-2"></i>
            </a>
        </div>

    </div>
</section>

@endsection
