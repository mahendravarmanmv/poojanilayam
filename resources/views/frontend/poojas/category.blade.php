@extends('layouts.app')

@section('title', 'Ganapathi Poojas | Pooja Nilayam')
@section('meta_description', 'Explore Ganapathi Poojas available through Pooja Nilayam.')

@section('content')

@php
    $categoryName = 'Ganapathi Poojas';

    $poojas = [
        ['slug'=>'ganapathi-homam','name'=>'Ganapathi Homam','description'=>'A traditional fire ritual seeking auspicious beginnings and the blessings of Lord Ganesha.','duration'=>'60–90 mins','price'=>'₹1,501','rating'=>'4.9'],
        ['slug'=>'ganapathi-pooja','name'=>'Ganapathi Pooja','description'=>'A devotional pooja performed to invoke Lord Ganesha before important beginnings and occasions.','duration'=>'45–60 mins','price'=>'₹901','rating'=>'4.8'],
        ['slug'=>'sankashta-hara-chaturthi-pooja','name'=>'Sankashta Hara Chaturthi Pooja','description'=>'A traditional Ganapathi worship service associated with devotion and seeking divine grace.','duration'=>'45–60 mins','price'=>'₹751','rating'=>'4.9'],
        ['slug'=>'varasiddhi-vinayaka-pooja','name'=>'Varasiddhi Vinayaka Pooja','description'=>'A sacred worship service dedicated to Lord Vinayaka for an auspicious and devotional observance.','duration'=>'60 mins','price'=>'₹1,101','rating'=>'4.8'],
        ['slug'=>'ganesha-atharvashirsha','name'=>'Ganesha Atharvashirsha','description'=>'A devotional recitation and worship experience centred around Ganesha Atharvashirsha.','duration'=>'30–45 mins','price'=>'₹601','rating'=>'4.8'],
        ['slug'=>'vinayaka-chavithi-pooja','name'=>'Vinayaka Chavithi Pooja','description'=>'A traditional Ganapathi worship service for the sacred Vinayaka Chavithi occasion.','duration'=>'60–90 mins','price'=>'₹1,201','rating'=>'4.9'],
    ];
@endphp

<section class="bg-pn-cream py-4">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-pn-primary">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('pooja.index') }}" class="text-pn-primary">Poojas</a></li>
                <li class="breadcrumb-item"><a href="{{ route('pooja.categories') }}" class="text-pn-primary">Categories</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $categoryName }}</li>
            </ol>
        </nav>

        <div class="row align-items-center py-3 py-lg-4">
            <div class="col-lg-8">
                <span class="pn-section-label text-uppercase text-pn-gold fw-semibold small">Pooja Category</span>
                <h1 class="font-serif display-5 text-pn-brown mt-2 mb-3">{{ $categoryName }}</h1>
                <div class="pn-divider mb-3"></div>
                <p class="text-secondary mb-0 col-lg-9">
                    Explore traditional Ganapathi worship services and choose a Pooja that suits your devotional needs and occasion.
                </p>
            </div>

            <div class="col-lg-4 mt-4 mt-lg-0">
                <div class="bg-white border rounded-4 p-4 text-center shadow-sm">
                    <div class="d-inline-flex align-items-center justify-content-center rounded-circle bg-pn-cream text-pn-primary mb-3"
                         style="width:72px;height:72px;">
                        <i class="bi bi-flower1 fs-2"></i>
                    </div>
                    <div class="fw-semibold text-pn-brown">{{ count($poojas) }} Poojas Available</div>
                    <small class="text-secondary">Explore the collection below</small>
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
                    <input type="search" class="form-control border-0 shadow-none"
                           placeholder="Search within {{ $categoryName }}..."
                           aria-label="Search {{ $categoryName }}">
                </div>
            </div>

            <div class="col-6 col-lg-auto">
                <select class="form-select" aria-label="Filter by duration">
                    <option selected>All Durations</option>
                    <option>Under 45 mins</option>
                    <option>45–60 mins</option>
                    <option>60–90 mins</option>
                </select>
            </div>

            <div class="col-6 col-lg-auto">
                <select class="form-select" aria-label="Sort poojas">
                    <option selected>Recommended</option>
                    <option>Price: Low to High</option>
                    <option>Price: High to Low</option>
                    <option>Highest Rated</option>
                </select>
            </div>
        </div>
    </div>
</section>

<section class="py-5">
    <div class="container py-lg-3">
        <div class="d-flex flex-column flex-sm-row justify-content-between align-items-sm-center gap-2 mb-4">
            <span class="text-secondary small">Showing {{ count($poojas) }} Poojas</span>
            <a href="{{ route('pooja.categories') }}" class="small text-pn-primary fw-semibold">
                <i class="bi bi-grid-3x3-gap me-1"></i> Browse Categories
            </a>
        </div>

        <div class="row g-4">
            @foreach($poojas as $pooja)
                <div class="col-12 col-sm-6 col-lg-4">
                    <article class="pn-pooja-card card h-100 border-0 rounded-4 overflow-hidden bg-white shadow-sm">
                        <div class="bg-pn-cream d-flex align-items-center justify-content-center" style="height:220px;">
                            <div class="text-center text-pn-primary">
                                <i class="bi bi-flower1 display-3"></i>
                                <div class="small mt-2 fw-semibold">Sacred Pooja</div>
                            </div>
                        </div>

                        <div class="card-body p-4 d-flex flex-column">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span class="small text-pn-primary fw-semibold">{{ $categoryName }}</span>
                                <span class="small"><i class="bi bi-star-fill text-pn-gold me-1"></i>{{ $pooja['rating'] }}</span>
                            </div>

                            <h2 class="h5 font-serif text-pn-brown fw-semibold mb-2">{{ $pooja['name'] }}</h2>
                            <p class="small text-secondary mb-3">{{ $pooja['description'] }}</p>

                            <div class="d-flex flex-wrap gap-3 small text-secondary mb-4">
                                <span><i class="bi bi-clock me-1 text-pn-primary"></i>{{ $pooja['duration'] }}</span>
                                <span><i class="bi bi-shield-check me-1 text-pn-primary"></i>Trusted Service</span>
                            </div>

                            <div class="d-flex justify-content-between align-items-end mt-auto">
                                <div>
                                    <small class="text-secondary d-block">From</small>
                                    <strong class="fs-5 text-pn-brown">{{ $pooja['price'] }}</strong>
                                </div>
                                <a href="{{ route('pooja.show', ['slug' => $pooja['slug']]) }}"
                                   class="btn btn-pn btn-sm px-3">
                                    View Details <i class="bi bi-arrow-right ms-1"></i>
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
    <div class="container text-center py-lg-3">
        <h2 class="font-serif text-pn-brown mb-3">Looking for another kind of Pooja?</h2>
        <p class="text-secondary mx-auto col-lg-6 mb-4">
            Explore all Pooja categories to find rituals for festivals, family occasions, prosperity, wellbeing and more.
        </p>
        <div class="d-flex flex-column flex-sm-row justify-content-center gap-2">
            <a href="{{ route('pooja.categories') }}" class="btn btn-pn px-4">Explore Categories</a>
            <a href="{{ route('pooja.index') }}" class="btn btn-pn-outline px-4">View All Poojas</a>
        </div>
    </div>
</section>

@endsection
