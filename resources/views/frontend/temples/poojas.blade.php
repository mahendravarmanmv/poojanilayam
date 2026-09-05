@extends('layouts.app')

@section('title', 'Temple Poojas | Pooja Nilayam')
@section('meta_description', 'Explore poojas available at the selected temple through Pooja Nilayam.')

@section('content')

@php
    $templeName = 'Sri Venkateswara Temple';

    $poojas = [
        [
            'slug' => 'suprabhata-seva',
            'name' => 'Suprabhata Seva',
            'description' => 'Begin the day with a traditional devotional service and seek the blessings of the presiding deity.',
            'time' => '6:00 AM',
            'duration' => '45 mins',
            'price' => '₹501',
        ],
        [
            'slug' => 'archana-seva',
            'name' => 'Archana Seva',
            'description' => 'Offer your prayers and participate in a traditional archana performed at the temple.',
            'time' => '8:00 AM – 11:00 AM',
            'duration' => '30 mins',
            'price' => '₹301',
        ],
        [
            'slug' => 'special-pooja',
            'name' => 'Special Pooja',
            'description' => 'A dedicated temple pooja for devotees seeking a meaningful and personal worship experience.',
            'time' => '10:00 AM',
            'duration' => '60 mins',
            'price' => '₹751',
        ],
        [
            'slug' => 'abhishekam',
            'name' => 'Abhishekam',
            'description' => 'A traditional ceremonial offering performed with devotion and sacred materials.',
            'time' => '7:30 AM',
            'duration' => '60 mins',
            'price' => '₹1,001',
        ],
        [
            'slug' => 'kalyanotsavam',
            'name' => 'Kalyanotsavam',
            'description' => 'Participate in the sacred ceremonial celebration conducted in the temple tradition.',
            'time' => '11:00 AM',
            'duration' => '90 mins',
            'price' => '₹1,501',
        ],
        [
            'slug' => 'ekanta-seva',
            'name' => 'Ekanta Seva',
            'description' => 'Experience a peaceful devotional service traditionally offered at the close of the day.',
            'time' => '8:30 PM',
            'duration' => '30 mins',
            'price' => '₹501',
        ],
    ];
@endphp

<section class="bg-pn-cream py-4">
    <div class="container">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item">
                    <a href="{{ route('home') }}" class="text-pn-primary">Home</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('temple.index') }}" class="text-pn-primary">Temples</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('temple.show', ['slug' => 'sri-venkateswara-temple']) }}"
                       class="text-pn-primary">
                        {{ $templeName }}
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Poojas</li>
            </ol>
        </nav>

        <div class="row align-items-center py-3 py-lg-4">
            <div class="col-lg-8">
                <span class="pn-section-label text-uppercase text-pn-gold fw-semibold small">
                    Temple Services
                </span>

                <h1 class="font-serif display-5 text-pn-brown mt-2 mb-3">
                    Poojas at {{ $templeName }}
                </h1>

                <div class="pn-divider mb-3"></div>

                <p class="text-secondary mb-0 col-lg-9">
                    Explore the poojas and devotional services available at this
                    temple and choose an offering that suits your visit.
                </p>
            </div>

            <div class="col-lg-4 mt-4 mt-lg-0">
                <div class="bg-white border rounded-4 p-4 text-center shadow-sm">
                    <div class="d-inline-flex align-items-center justify-content-center rounded-circle bg-pn-cream text-pn-primary mb-3"
                         style="width:72px;height:72px;">
                        <i class="bi bi-flower1 fs-2"></i>
                    </div>

                    <div class="fw-semibold text-pn-brown">
                        {{ count($poojas) }} Poojas Available
                    </div>

                    <small class="text-secondary">
                        Temple-specific services
                    </small>
                </div>
            </div>
        </div>

    </div>
</section>

<section class="py-4 border-bottom bg-white">
    <div class="container">

        <div class="row g-3 align-items-center">

            <div class="col-12 col-lg">
                <div class="input-group border rounded-3 overflow-hidden">
                    <span class="input-group-text bg-white border-0">
                        <i class="bi bi-search text-pn-primary"></i>
                    </span>

                    <input
                        type="search"
                        class="form-control border-0 shadow-none"
                        placeholder="Search temple poojas..."
                        aria-label="Search temple poojas"
                    >
                </div>
            </div>

            <div class="col-6 col-lg-auto">
                <select class="form-select" aria-label="Filter by service time">
                    <option selected>All Times</option>
                    <option>Morning</option>
                    <option>Afternoon</option>
                    <option>Evening</option>
                </select>
            </div>

            <div class="col-6 col-lg-auto">
                <select class="form-select" aria-label="Sort poojas">
                    <option selected>Recommended</option>
                    <option>Price: Low to High</option>
                    <option>Price: High to Low</option>
                </select>
            </div>

        </div>

    </div>
</section>

<section class="py-5">
    <div class="container py-lg-3">

        <div class="d-flex flex-column flex-sm-row justify-content-between align-items-sm-center gap-2 mb-4">
            <span class="text-secondary small">
                Showing {{ count($poojas) }} temple services
            </span>

            <a href="{{ route('temple.show', ['slug' => 'sri-venkateswara-temple']) }}"
               class="small text-pn-primary fw-semibold">
                <i class="bi bi-bank me-1"></i>
                Back to Temple
            </a>
        </div>

        <div class="row g-4">

            @foreach($poojas as $pooja)
                <div class="col-12 col-sm-6 col-lg-4">

                    <article class="pn-pooja-card card h-100 border-0 rounded-4 overflow-hidden bg-white shadow-sm">

                        <div class="bg-pn-cream d-flex align-items-center justify-content-center"
                             style="height:210px;">
                            <div class="text-center text-pn-primary">
                                <i class="bi bi-bank display-4"></i>
                                <div class="small mt-2 fw-semibold">
                                    {{ $templeName }}
                                </div>
                            </div>
                        </div>

                        <div class="card-body p-4 d-flex flex-column">

                            <span class="small text-pn-primary fw-semibold mb-2">
                                Temple Pooja
                            </span>

                            <h2 class="h5 font-serif text-pn-brown fw-semibold mb-2">
                                {{ $pooja['name'] }}
                            </h2>

                            <p class="small text-secondary mb-3">
                                {{ $pooja['description'] }}
                            </p>

                            <div class="d-flex flex-column gap-2 small text-secondary mb-4">
                                <span>
                                    <i class="bi bi-clock me-2 text-pn-primary"></i>
                                    {{ $pooja['time'] }}
                                </span>

                                <span>
                                    <i class="bi bi-hourglass-split me-2 text-pn-primary"></i>
                                    {{ $pooja['duration'] }}
                                </span>
                            </div>

                            <div class="d-flex justify-content-between align-items-end mt-auto">

                                <div>
                                    <small class="text-secondary d-block">Offering from</small>
                                    <strong class="fs-5 text-pn-brown">
                                        {{ $pooja['price'] }}
                                    </strong>
                                </div>

                                <a
                                    href="{{ route('pooja.show', ['slug' => $pooja['slug']]) }}"
                                    class="btn btn-pn btn-sm px-3"
                                >
                                    View Details
                                    <i class="bi bi-arrow-right ms-1"></i>
                                </a>

                            </div>

                        </div>
                    </article>

                </div>
            @endforeach

        </div>

    </div>
</section>

<section class="bg-pn-cream py-5">
    <div class="container py-lg-3">

        <div class="row align-items-center g-4">

            <div class="col-lg-8">
                <span class="text-pn-gold text-uppercase small fw-semibold pn-section-label">
                    Plan Your Visit
                </span>

                <h2 class="font-serif text-pn-brown mt-2 mb-3">
                    Explore more about {{ $templeName }}
                </h2>

                <p class="text-secondary mb-0">
                    View temple information, timings, gallery and other available
                    services before planning your devotional visit.
                </p>
            </div>

            <div class="col-lg-4 text-lg-end">
                <a
                    href="{{ route('temple.show', ['slug' => 'sri-venkateswara-temple']) }}"
                    class="btn btn-pn px-4"
                >
                    View Temple
                    <i class="bi bi-arrow-right ms-2"></i>
                </a>
            </div>

        </div>

    </div>
</section>

@endsection
