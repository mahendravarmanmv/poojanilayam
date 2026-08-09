<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description"
          content="Pooja Nilayam - Book Poojas, Temples, Priests, Digital Poojas and Astrology Services online.">

    <title>Pooja Nilayam | Divine Services Online</title>

    {{-- Bootstrap 5.3 --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
          rel="stylesheet">

    {{-- Bootstrap Icons --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css"
          rel="stylesheet">

    {{-- Google Font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect"
          href="https://fonts.gstatic.com"
          crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;500;600;700&display=swap"
          rel="stylesheet">

    {{-- Custom CSS --}}
    <link href="{{ asset('css/style.css') }}"
          rel="stylesheet">

</head>

<body>

{{-- =========================================================
     TOP BAR
========================================================= --}}

<div class="bg-warning-subtle border-bottom">

    <div class="container">

        <div class="d-flex flex-column flex-md-row
                    justify-content-between
                    align-items-center
                    py-2 gap-2">

            <div class="small text-secondary">

                <i class="bi bi-stars text-warning me-1"></i>

                Bring divine blessings to your doorstep

            </div>

            <div class="d-flex gap-3 small">

                <a href="#" class="text-secondary">
                    Track Booking
                </a>

                <a href="#" class="text-secondary">
                    Help
                </a>

                <a href="#" class="text-secondary">
                    Contact Us
                </a>

            </div>

        </div>

    </div>

</div>


{{-- =========================================================
     MAIN HEADER
========================================================= --}}

<header class="bg-white shadow-sm sticky-top">

    <nav class="navbar navbar-expand-xl py-3">

        <div class="container">

            {{-- Logo --}}

            <a href="#"
               class="navbar-brand d-flex align-items-center gap-2">

                <span class="d-flex align-items-center justify-content-center
                             bg-warning rounded-circle
                             text-white"
                      style="width:45px;height:45px;">

                    <i class="bi bi-flower1 fs-4"></i>

                </span>

                <span>

                    <span class="d-block fw-bold text-danger fs-4 lh-1">
                        Pooja Nilayam
                    </span>

                    <small class="text-secondary">
                        Divine Services
                    </small>

                </span>

            </a>


            {{-- Mobile Buttons --}}

            <div class="d-flex align-items-center gap-2 d-xl-none">

                <a href="#"
                   class="btn btn-light position-relative">

                    <i class="bi bi-search"></i>

                </a>

                <a href="#"
                   class="btn btn-light position-relative">

                    <i class="bi bi-cart3"></i>

                    <span class="position-absolute top-0 start-100
                                 translate-middle badge rounded-pill bg-danger">
                        2
                    </span>

                </a>

                <button class="navbar-toggler"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#mainNavigation"
                        aria-controls="mainNavigation"
                        aria-expanded="false"
                        aria-label="Toggle navigation">

                    <span class="navbar-toggler-icon"></span>

                </button>

            </div>


            {{-- Navigation --}}

            <div class="collapse navbar-collapse"
                 id="mainNavigation">


                {{-- Search --}}

                <form class="d-flex mx-xl-4 my-3 my-xl-0 flex-grow-1">

                    <div class="input-group">

                        <span class="input-group-text bg-light border-end-0">

                            <i class="bi bi-search text-secondary"></i>

                        </span>

                        <input type="search"
                               class="form-control bg-light border-start-0"
                               placeholder="Search Pooja, Temple, Priest, Astrology...">

                    </div>

                </form>


                {{-- Right Navigation --}}

                <ul class="navbar-nav align-items-xl-center gap-xl-2">

                    {{-- Location --}}

                    <li class="nav-item dropdown">

                        <a class="nav-link dropdown-toggle"
                           href="#"
                           role="button"
                           data-bs-toggle="dropdown">

                            <i class="bi bi-geo-alt text-danger me-1"></i>

                            Hyderabad

                        </a>

                        <ul class="dropdown-menu">

                            <li>
                                <h6 class="dropdown-header">
                                    Select Location
                                </h6>
                            </li>

                            <li>
                                <a class="dropdown-item" href="#">
                                    Hyderabad
                                </a>
                            </li>

                            <li>
                                <a class="dropdown-item" href="#">
                                    Vijayawada
                                </a>
                            </li>

                            <li>
                                <a class="dropdown-item" href="#">
                                    Tirupati
                                </a>
                            </li>

                        </ul>

                    </li>


                    {{-- Wishlist --}}

                    <li class="nav-item">

                        <a href="#"
                           class="nav-link">

                            <i class="bi bi-heart"></i>

                            <span class="d-xl-none ms-2">
                                Wishlist
                            </span>

                        </a>

                    </li>


                    {{-- Cart --}}

                    <li class="nav-item">

                        <a href="#"
                           class="nav-link position-relative">

                            <i class="bi bi-cart3"></i>

                            <span class="d-xl-none ms-2">
                                Cart
                            </span>

                            <span class="position-absolute top-0 start-100
                                         translate-middle badge rounded-pill bg-danger
                                         d-none d-xl-block">

                                2

                            </span>

                        </a>

                    </li>


                    {{-- Login --}}

                    <li class="nav-item ms-xl-2 mt-2 mt-xl-0">

                        <a href="#"
                           class="btn btn-warning rounded-pill px-4 fw-medium">

                            <i class="bi bi-person me-1"></i>

                            Login

                        </a>

                    </li>

                </ul>

            </div>

        </div>

    </nav>


    {{-- Main Navigation --}}

    <div class="border-top d-none d-xl-block">

        <div class="container">

            <ul class="nav justify-content-center py-2 gap-1">

                <li class="nav-item">

                    <a href="#"
                       class="nav-link text-dark fw-medium px-3">

                        Home

                    </a>

                </li>

                <li class="nav-item">

                    <a href="#"
                       class="nav-link text-dark px-3">

                        Poojas

                    </a>

                </li>

                <li class="nav-item">

                    <a href="#"
                       class="nav-link text-dark px-3">

                        Digital Pooja

                    </a>

                </li>

                <li class="nav-item">

                    <a href="#"
                       class="nav-link text-dark px-3">

                        Temples

                    </a>

                </li>

                <li class="nav-item">

                    <a href="#"
                       class="nav-link text-dark px-3">

                        Priests

                    </a>

                </li>

                <li class="nav-item">

                    <a href="#"
                       class="nav-link text-dark px-3">

                        Astrology

                    </a>

                </li>

                <li class="nav-item">

                    <a href="#"
                       class="nav-link text-dark px-3">

                        Online Store

                    </a>

                </li>

                <li class="nav-item">

                    <a href="#"
                       class="nav-link text-dark px-3">

                        Festivals

                    </a>

                </li>

                <li class="nav-item">

                    <a href="#"
                       class="nav-link text-dark px-3">

                        Donations

                    </a>

                </li>

                <li class="nav-item">

                    <a href="#"
                       class="nav-link text-dark px-3">

                        More

                    </a>

                </li>

            </ul>

        </div>

    </div>

</header>


{{-- =========================================================
     HERO SECTION
========================================================= --}}

<section class="bg-warning-subtle">

    <div class="container py-5 py-lg-6">

        <div class="row align-items-center g-5">

            {{-- Hero Content --}}

            <div class="col-lg-6">

                <span class="badge bg-warning text-dark
                             rounded-pill px-3 py-2 mb-3">

                    <i class="bi bi-stars me-1"></i>

                    Your Spiritual Journey Begins Here

                </span>


                <h1 class="display-4 fw-bold text-dark mb-4">

                    Bring Divine Blessings
                    <span class="text-danger">
                        Closer to You
                    </span>

                </h1>


                <p class="lead text-secondary mb-4">

                    Book authentic poojas, connect with trusted priests,
                    explore sacred temples and experience divine services
                    from anywhere.

                </p>


                {{-- Search Pooja --}}

                <div class="bg-white rounded-4 shadow p-2 mb-4">

                    <div class="input-group">

                        <span class="input-group-text
                                     bg-white border-0">

                            <i class="bi bi-search
                                      text-danger fs-5"></i>

                        </span>

                        <input type="text"
                               class="form-control border-0"
                               placeholder="What pooja are you looking for?">

                        <button class="btn btn-danger
                                       rounded-3 px-4">

                            Search

                        </button>

                    </div>

                </div>


                {{-- Hero Links --}}

                <div class="d-flex flex-wrap gap-3">

                    <a href="#"
                       class="btn btn-danger rounded-pill px-4">

                        Explore Poojas

                    </a>

                    <a href="#"
                       class="btn btn-outline-dark rounded-pill px-4">

                        Explore Temples

                    </a>

                </div>

            </div>


            {{-- Hero Image Area --}}

            <div class="col-lg-6">

                <div class="position-relative">

                    <div class="bg-white rounded-5 shadow
                                overflow-hidden">

                        <div class="ratio ratio-4x3">

                            <img src="https://images.unsplash.com/photo-1609766857041-ed402ea8069a?auto=format&fit=crop&w=1200&q=80"
                                 class="w-100 h-100 object-fit-cover"
                                 alt="Indian Temple">

                        </div>

                    </div>


                    {{-- Floating Card --}}

                    <div class="position-absolute bottom-0 start-0
                                translate-middle-y
                                bg-white shadow rounded-4 p-3
                                d-none d-md-block">

                        <div class="d-flex align-items-center gap-3">

                            <div class="bg-warning-subtle
                                        rounded-circle
                                        d-flex align-items-center
                                        justify-content-center"
                                 style="width:50px;height:50px;">

                                <i class="bi bi-check-circle-fill
                                          text-success fs-4"></i>

                            </div>

                            <div>

                                <div class="fw-semibold">
                                    Trusted Services
                                </div>

                                <small class="text-secondary">
                                    Thousands of devotees
                                </small>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- =========================================================
     TRUST / STATS
========================================================= --}}

<section class="border-bottom bg-white">

    <div class="container">

        <div class="row py-4 g-4 text-center">

            <div class="col-6 col-lg-3">

                <div class="fw-bold fs-4 text-danger">
                    10K+
                </div>

                <small class="text-secondary">
                    Poojas Booked
                </small>

            </div>

            <div class="col-6 col-lg-3">

                <div class="fw-bold fs-4 text-danger">
                    500+
                </div>

                <small class="text-secondary">
                    Verified Priests
                </small>

            </div>

            <div class="col-6 col-lg-3">

                <div class="fw-bold fs-4 text-danger">
                    100+
                </div>

                <small class="text-secondary">
                    Temples
                </small>

            </div>

            <div class="col-6 col-lg-3">

                <div class="fw-bold fs-4 text-danger">
                    25K+
                </div>

                <small class="text-secondary">
                    Devotees
                </small>

            </div>

        </div>

    </div>

</section>


{{-- =========================================================
     CATEGORIES
========================================================= --}}

<section class="py-5">

    <div class="container">

        <div class="text-center mb-5">

            <span class="text-danger fw-semibold">
                EXPLORE
            </span>

            <h2 class="fw-bold mt-2">
                Discover Divine Services
            </h2>

            <p class="text-secondary mb-0">
                Everything you need for your spiritual journey.
            </p>

        </div>


        <div class="row g-4">

            @php

                $categories = [
                    ['icon' => 'bi-fire', 'title' => 'Poojas', 'text' => 'Book sacred poojas'],
                    ['icon' => 'bi-camera-video', 'title' => 'Digital Pooja', 'text' => 'Join poojas online'],
                    ['icon' => 'bi-bank', 'title' => 'Temples', 'text' => 'Explore sacred temples'],
                    ['icon' => 'bi-person-hearts', 'title' => 'Priests', 'text' => 'Connect with priests'],
                    ['icon' => 'bi-stars', 'title' => 'Astrology', 'text' => 'Discover your future'],
                    ['icon' => 'bi-shop', 'title' => 'Online Store', 'text' => 'Shop spiritual products'],
                ];

            @endphp


            @foreach($categories as $category)

                <div class="col-6 col-md-4 col-lg-2">

                    <a href="#"
                       class="d-block text-center text-dark">

                        <div class="bg-warning-subtle
                                    rounded-4
                                    p-4 mb-3
                                    shadow-sm">

                            <i class="bi {{ $category['icon'] }}
                                      text-danger fs-1"></i>

                        </div>

                        <h6 class="fw-semibold mb-1">

                            {{ $category['title'] }}

                        </h6>

                        <small class="text-secondary">

                            {{ $category['text'] }}

                        </small>

                    </a>

                </div>

            @endforeach

        </div>

    </div>

</section>


{{-- =========================================================
     FEATURED POOJAS
========================================================= --}}

<section class="py-5 bg-light">

    <div class="container">

        <div class="d-flex flex-column flex-md-row
                    justify-content-between
                    align-items-md-end
                    mb-4">

            <div>

                <span class="text-danger fw-semibold">
                    FEATURED
                </span>

                <h2 class="fw-bold mt-2 mb-1">
                    Popular Poojas
                </h2>

                <p class="text-secondary mb-0">
                    Sacred rituals performed by experienced priests.
                </p>

            </div>

            <a href="#"
               class="btn btn-outline-danger rounded-pill mt-3 mt-md-0">

                View All Poojas

                <i class="bi bi-arrow-right ms-1"></i>

            </a>

        </div>


        <div class="row g-4">

            @php

                $poojas = [
                    [
                        'title' => 'Ganesh Pooja',
                        'price' => '₹1,499',
                        'image' => 'https://images.unsplash.com/photo-1606293926075-69a00dbfde81?auto=format&fit=crop&w=800&q=80'
                    ],
                    [
                        'title' => 'Lakshmi Pooja',
                        'price' => '₹1,999',
                        'image' => 'https://images.unsplash.com/photo-1604608672516-f1b9c2f5a7f2?auto=format&fit=crop&w=800&q=80'
                    ],
                    [
                        'title' => 'Satyanarayan Pooja',
                        'price' => '₹2,499',
                        'image' => 'https://images.unsplash.com/photo-1577083552431-6e5fd01988a5?auto=format&fit=crop&w=800&q=80'
                    ],
                ];

            @endphp


            @foreach($poojas as $pooja)

                <div class="col-md-6 col-lg-4">

                    <div class="card border-0 shadow-sm
                                rounded-4 overflow-hidden h-100">

                        <div class="ratio ratio-16x9">

                            <img src="{{ $pooja['image'] }}"
                                 class="w-100 h-100 object-fit-cover"
                                 alt="{{ $pooja['title'] }}">

                        </div>

                        <div class="card-body p-4">

                            <div class="d-flex
                                        justify-content-between
                                        align-items-start">

                                <h5 class="fw-semibold mb-2">
                                    {{ $pooja['title'] }}
                                </h5>

                                <span class="badge bg-warning-subtle
                                             text-dark">

                                    Popular

                                </span>

                            </div>

                            <div class="text-warning mb-3">

                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-half"></i>

                                <small class="text-secondary ms-1">
                                    4.8
                                </small>

                            </div>

                            <div class="d-flex
                                        justify-content-between
                                        align-items-center">

                                <div>

                                    <small class="text-secondary d-block">
                                        Starting from
                                    </small>

                                    <strong class="text-danger fs-5">
                                        {{ $pooja['price'] }}
                                    </strong>

                                </div>

                                <a href="#"
                                   class="btn btn-danger rounded-pill">

                                    Book Now

                                </a>

                            </div>

                        </div>

                    </div>

                </div>

            @endforeach

        </div>

    </div>

</section>


{{-- =========================================================
     DIGITAL POOJA
========================================================= --}}

<section class="py-5">

    <div class="container">

        <div class="row align-items-center
                    g-5">

            <div class="col-lg-6">

                <span class="badge bg-danger-subtle
                             text-danger rounded-pill
                             px-3 py-2 mb-3">

                    DIGITAL POOJA

                </span>

                <h2 class="fw-bold mb-3">

                    Experience Divine Rituals
                    <span class="text-danger">
                        From Anywhere
                    </span>

                </h2>

                <p class="text-secondary">

                    Participate in sacred rituals remotely with live
                    streaming, scheduled poojas and experienced priests.

                </p>

                <div class="row g-3 my-4">

                    <div class="col-6">

                        <div class="d-flex gap-2">

                            <i class="bi bi-camera-video
                                      text-danger fs-4"></i>

                            <div>

                                <strong class="d-block">
                                    Live Pooja
                                </strong>

                                <small class="text-secondary">
                                    Participate live
                                </small>

                            </div>

                        </div>

                    </div>

                    <div class="col-6">

                        <div class="d-flex gap-2">

                            <i class="bi bi-calendar-check
                                      text-danger fs-4"></i>

                            <div>

                                <strong class="d-block">
                                    Schedule
                                </strong>

                                <small class="text-secondary">
                                    Choose your time
                                </small>

                            </div>

                        </div>

                    </div>

                </div>

                <a href="#"
                   class="btn btn-danger rounded-pill px-4">

                    Explore Digital Pooja

                    <i class="bi bi-arrow-right ms-1"></i>

                </a>

            </div>


            <div class="col-lg-6">

                <div class="rounded-5 overflow-hidden shadow">

                    <div class="ratio ratio-4x3">

                        <img src="https://images.unsplash.com/photo-1599839575945-a955c75a3e68?auto=format&fit=crop&w=1200&q=80"
                             class="w-100 h-100 object-fit-cover"
                             alt="Digital Pooja">

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- =========================================================
     ASTROLOGY
========================================================= --}}

<section class="py-5 bg-warning-subtle">

    <div class="container">

        <div class="text-center mb-5">

            <span class="text-danger fw-semibold">
                ASTROLOGY
            </span>

            <h2 class="fw-bold mt-2">
                Discover What the Stars Say
            </h2>

            <p class="text-secondary mb-0">
                Consult experienced astrologers for guidance and insights.
            </p>

        </div>


        <div class="row g-4">

            @php

                $astrology = [
                    ['icon' => 'bi-stars', 'title' => 'Horoscope'],
                    ['icon' => 'bi-moon-stars', 'title' => 'Kundli'],
                    ['icon' => 'bi-heart', 'title' => 'Match Making'],
                    ['icon' => 'bi-123', 'title' => 'Numerology'],
                ];

            @endphp


            @foreach($astrology as $service)

                <div class="col-6 col-lg-3">

                    <a href="#"
                       class="card border-0
                              rounded-4 shadow-sm
                              h-100 text-dark">

                        <div class="card-body text-center p-4">

                            <div class="bg-danger-subtle
                                        rounded-circle
                                        d-inline-flex
                                        align-items-center
                                        justify-content-center
                                        mb-3"
                                 style="width:65px;height:65px;">

                                <i class="bi {{ $service['icon'] }}
                                          text-danger fs-3"></i>

                            </div>

                            <h5 class="fw-semibold">
                                {{ $service['title'] }}
                            </h5>

                            <small class="text-secondary">
                                Explore service
                            </small>

                        </div>

                    </a>

                </div>

            @endforeach

        </div>

    </div>

</section>


{{-- =========================================================
     POPULAR TEMPLES
========================================================= --}}

<section class="py-5">

    <div class="container">

        <div class="d-flex
                    justify-content-between
                    align-items-end
                    mb-4">

            <div>

                <span class="text-danger fw-semibold">
                    SACRED PLACES
                </span>

                <h2 class="fw-bold mt-2 mb-1">
                    Popular Temples
                </h2>

                <p class="text-secondary mb-0">
                    Explore sacred temples and spiritual destinations.
                </p>

            </div>

            <a href="#"
               class="btn btn-outline-danger rounded-pill">

                View All

            </a>

        </div>


        <div class="row g-4">

            @php

                $temples = [
                    [
                        'title' => 'Tirumala Temple',
                        'location' => 'Tirupati, Andhra Pradesh',
                        'image' => 'https://images.unsplash.com/photo-1622308644420-b20142dc993c?auto=format&fit=crop&w=800&q=80'
                    ],
                    [
                        'title' => 'Meenakshi Temple',
                        'location' => 'Madurai, Tamil Nadu',
                        'image' => 'https://images.unsplash.com/photo-1582510003544-4d00b7f74220?auto=format&fit=crop&w=800&q=80'
                    ],
                    [
                        'title' => 'Jagannath Temple',
                        'location' => 'Puri, Odisha',
                        'image' => 'https://images.unsplash.com/photo-1590050752117-238cb0fb12c8?auto=format&fit=crop&w=800&q=80'
                    ],
                ];

            @endphp


            @foreach($temples as $temple)

                <div class="col-md-6 col-lg-4">

                    <div class="card border-0 shadow-sm
                                rounded-4 overflow-hidden h-100">

                        <div class="ratio ratio-16x9">

                            <img src="{{ $temple['image'] }}"
                                 class="w-100 h-100 object-fit-cover"
                                 alt="{{ $temple['title'] }}">

                        </div>

                        <div class="card-body p-4">

                            <h5 class="fw-semibold mb-2">
                                {{ $temple['title'] }}
                            </h5>

                            <p class="text-secondary mb-3">

                                <i class="bi bi-geo-alt text-danger me-1"></i>

                                {{ $temple['location'] }}

                            </p>

                            <a href="#"
                               class="text-danger fw-medium">

                                Explore Temple

                                <i class="bi bi-arrow-right ms-1"></i>

                            </a>

                        </div>

                    </div>

                </div>

            @endforeach

        </div>

    </div>

</section>


{{-- =========================================================
     POPULAR PRIESTS
========================================================= --}}

<section class="py-5 bg-light">

    <div class="container">

        <div class="text-center mb-5">

            <span class="text-danger fw-semibold">
                TRUSTED EXPERTS
            </span>

            <h2 class="fw-bold mt-2">
                Popular Priests
            </h2>

            <p class="text-secondary">
                Connect with experienced and verified priests.
            </p>

        </div>


        <div class="row g-4">

            @php

                $priests = [
                    ['name' => 'Sri Ravi Sharma', 'speciality' => 'Vedic Poojas'],
                    ['name' => 'Sri Anil Kumar', 'speciality' => 'Temple Rituals'],
                    ['name' => 'Sri Suresh Rao', 'speciality' => 'Homam & Poojas'],
                    ['name' => 'Sri Krishna Murthy', 'speciality' => 'Vedic Rituals'],
                ];

            @endphp


            @foreach($priests as $priest)

                <div class="col-6 col-lg-3">

                    <div class="card border-0 shadow-sm
                                rounded-4 text-center h-100">

                        <div class="card-body p-4">

                            <div class="bg-warning-subtle
                                        rounded-circle
                                        mx-auto mb-3
                                        d-flex align-items-center
                                        justify-content-center"
                                 style="width:90px;height:90px;">

                                <i class="bi bi-person
                                          text-danger fs-1"></i>

                            </div>

                            <h6 class="fw-semibold mb-1">
                                {{ $priest['name'] }}
                            </h6>

                            <small class="text-secondary d-block mb-2">
                                {{ $priest['speciality'] }}
                            </small>

                            <div class="text-warning small mb-3">

                                <i class="bi bi-star-fill"></i>
                                4.9

                            </div>

                            <a href="#"
                               class="btn btn-outline-danger
                                      btn-sm rounded-pill px-3">

                                View Profile

                            </a>

                        </div>

                    </div>

                </div>

            @endforeach

        </div>

    </div>

</section>


{{-- =========================================================
     FESTIVAL OFFER
========================================================= --}}

<section class="py-5">

    <div class="container">

        <div class="bg-danger rounded-5
                    text-white overflow-hidden">

            <div class="row align-items-center">

                <div class="col-lg-7 p-5">

                    <span class="badge bg-warning text-dark
                                 rounded-pill mb-3">

                        FESTIVAL SPECIAL

                    </span>

                    <h2 class="fw-bold mb-3">

                        Celebrate Festivals
                        with Divine Blessings

                    </h2>

                    <p class="text-white-50 mb-4">

                        Book special festival poojas and receive
                        blessings from sacred temples and experienced priests.

                    </p>

                    <a href="#"
                       class="btn btn-warning
                              rounded-pill px-4">

                        Explore Festival Poojas

                    </a>

                </div>

                <div class="col-lg-5">

                    <div class="ratio ratio-4x3">

                        <img src="https://images.unsplash.com/photo-1604608672516-f1b9c2f5a7f2?auto=format&fit=crop&w=900&q=80"
                             class="w-100 h-100 object-fit-cover"
                             alt="Festival">

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- =========================================================
     TESTIMONIALS
========================================================= --}}

<section class="py-5 bg-light">

    <div class="container">

        <div class="text-center mb-5">

            <span class="text-danger fw-semibold">
                DEVOTEE EXPERIENCES
            </span>

            <h2 class="fw-bold mt-2">
                What Our Devotees Say
            </h2>

        </div>


        <div class="row g-4">

            @php

                $testimonials = [
                    [
                        'name' => 'Priya Reddy',
                        'text' => 'The entire booking process was simple and convenient. The pooja was performed beautifully.'
                    ],
                    [
                        'name' => 'Arun Kumar',
                        'text' => 'The digital pooja experience allowed our family to participate even though we were away from home.'
                    ],
                    [
                        'name' => 'Srinivas Rao',
                        'text' => 'Very professional service. The priest was knowledgeable and the entire experience was peaceful.'
                    ],
                ];

            @endphp


            @foreach($testimonials as $testimonial)

                <div class="col-md-4">

                    <div class="card border-0 shadow-sm
                                rounded-4 h-100">

                        <div class="card-body p-4">

                            <div class="text-warning mb-3">

                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>

                            </div>

                            <p class="text-secondary">

                                "{{ $testimonial['text'] }}"

                            </p>

                            <div class="d-flex align-items-center gap-3 mt-4">

                                <div class="bg-warning-subtle
                                            rounded-circle
                                            d-flex
                                            align-items-center
                                            justify-content-center"
                                     style="width:45px;height:45px;">

                                    <i class="bi bi-person text-danger"></i>

                                </div>

                                <strong>
                                    {{ $testimonial['name'] }}
                                </strong>

                            </div>

                        </div>

                    </div>

                </div>

            @endforeach

        </div>

    </div>

</section>


{{-- =========================================================
     BLOGS
========================================================= --}}

<section class="py-5">

    <div class="container">

        <div class="d-flex
                    justify-content-between
                    align-items-end
                    mb-4">

            <div>

                <span class="text-danger fw-semibold">
                    FROM OUR BLOG
                </span>

                <h2 class="fw-bold mt-2 mb-1">
                    Spiritual Insights
                </h2>

                <p class="text-secondary mb-0">
                    Stories, traditions and spiritual knowledge.
                </p>

            </div>

            <a href="#"
               class="btn btn-outline-danger rounded-pill">

                View All

            </a>

        </div>


        <div class="row g-4">

            @php

                $blogs = [
                    [
                        'title' => 'The Significance of Ganesh Pooja',
                        'image' => 'https://images.unsplash.com/photo-1606293926075-69a00dbfde81?auto=format&fit=crop&w=800&q=80'
                    ],
                    [
                        'title' => 'Why Temple Visits Are Spiritually Important',
                        'image' => 'https://images.unsplash.com/photo-1622308644420-b20142dc993c?auto=format&fit=crop&w=800&q=80'
                    ],
                    [
                        'title' => 'Understanding Vedic Astrology',
                        'image' => 'https://images.unsplash.com/photo-1515894347716-20a5f6f6f1c7?auto=format&fit=crop&w=800&q=80'
                    ],
                ];

            @endphp


            @foreach($blogs as $blog)

                <div class="col-md-6 col-lg-4">

                    <article class="card border-0 shadow-sm
                                   rounded-4 overflow-hidden h-100">

                        <div class="ratio ratio-16x9">

                            <img src="{{ $blog['image'] }}"
                                 class="w-100 h-100 object-fit-cover"
                                 alt="{{ $blog['title'] }}">

                        </div>

                        <div class="card-body p-4">

                            <small class="text-danger">
                                Spirituality
                            </small>

                            <h5 class="fw-semibold mt-2 mb-3">

                                {{ $blog['title'] }}

                            </h5>

                            <a href="#"
                               class="text-danger fw-medium">

                                Read More

                                <i class="bi bi-arrow-right ms-1"></i>

                            </a>

                        </div>

                    </article>

                </div>

            @endforeach

        </div>

    </div>

</section>


{{-- =========================================================
     FAQ
========================================================= --}}

<section class="py-5 bg-light">

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-lg-9">

                <div class="text-center mb-5">

                    <span class="text-danger fw-semibold">
                        FAQ
                    </span>

                    <h2 class="fw-bold mt-2">
                        Frequently Asked Questions
                    </h2>

                </div>


                <div class="accordion"
                     id="faqAccordion">


                    <div class="accordion-item border-0
                                shadow-sm mb-3 rounded-3 overflow-hidden">

                        <h2 class="accordion-header">

                            <button class="accordion-button fw-semibold"
                                    type="button"
                                    data-bs-toggle="collapse"
                                    data-bs-target="#faqOne">

                                How can I book a pooja online?

                            </button>

                        </h2>

                        <div id="faqOne"
                             class="accordion-collapse collapse show"
                             data-bs-parent="#faqAccordion">

                            <div class="accordion-body text-secondary">

                                You can browse available poojas, select
                                your preferred service, choose a date and
                                complete your booking online.

                            </div>

                        </div>

                    </div>


                    <div class="accordion-item border-0
                                shadow-sm mb-3 rounded-3 overflow-hidden">

                        <h2 class="accordion-header">

                            <button class="accordion-button collapsed fw-semibold"
                                    type="button"
                                    data-bs-toggle="collapse"
                                    data-bs-target="#faqTwo">

                                Can I participate in a digital pooja?

                            </button>

                        </h2>

                        <div id="faqTwo"
                             class="accordion-collapse collapse"
                             data-bs-parent="#faqAccordion">

                            <div class="accordion-body text-secondary">

                                Yes. Digital pooja services allow devotees
                                to participate remotely through scheduled
                                and live spiritual services.

                            </div>

                        </div>

                    </div>


                    <div class="accordion-item border-0
                                shadow-sm mb-3 rounded-3 overflow-hidden">

                        <h2 class="accordion-header">

                            <button class="accordion-button collapsed fw-semibold"
                                    type="button"
                                    data-bs-toggle="collapse"
                                    data-bs-target="#faqThree">

                                How do I find a priest?

                            </button>

                        </h2>

                        <div id="faqThree"
                             class="accordion-collapse collapse"
                             data-bs-parent="#faqAccordion">

                            <div class="accordion-body text-secondary">

                                You can explore verified priests based on
                                their specialization, experience and
                                available services.

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- =========================================================
     NEWSLETTER
========================================================= --}}

<section class="py-5">

    <div class="container">

        <div class="bg-warning-subtle
                    rounded-5 p-4 p-lg-5 text-center">

            <i class="bi bi-envelope-heart
                      text-danger fs-1"></i>

            <h2 class="fw-bold mt-3">
                Stay Connected With Pooja Nilayam
            </h2>

            <p class="text-secondary">

                Receive festival updates, spiritual content,
                offers and new services.

            </p>


            <form class="row justify-content-center
                         g-2 mt-4">

                <div class="col-12 col-md-7 col-lg-5">

                    <input type="email"
                           class="form-control form-control-lg"
                           placeholder="Enter your email address">

                </div>

                <div class="col-12 col-md-auto">

                    <button type="submit"
                            class="btn btn-danger
                                   btn-lg px-4">

                        Subscribe

                    </button>

                </div>

            </form>

        </div>

    </div>

</section>


{{-- =========================================================
     FOOTER
========================================================= --}}

<footer class="bg-dark text-white">

    <div class="container py-5">

        <div class="row g-5">

            {{-- About --}}

            <div class="col-lg-4">

                <a href="#"
                   class="d-inline-flex align-items-center
                          gap-2 text-white mb-3">

                    <span class="bg-warning rounded-circle
                                 d-flex align-items-center
                                 justify-content-center"
                          style="width:45px;height:45px;">

                        <i class="bi bi-flower1"></i>

                    </span>

                    <span class="fw-bold fs-4">
                        Pooja Nilayam
                    </span>

                </a>

                <p class="text-white-50">

                    Your trusted platform for poojas, temples,
                    priests, digital spiritual services, astrology
                    and devotional products.

                </p>


                <div class="d-flex gap-2">

                    <a href="#"
                       class="btn btn-outline-light rounded-circle">

                        <i class="bi bi-facebook"></i>

                    </a>

                    <a href="#"
                       class="btn btn-outline-light rounded-circle">

                        <i class="bi bi-instagram"></i>

                    </a>

                    <a href="#"
                       class="btn btn-outline-light rounded-circle">

                        <i class="bi bi-youtube"></i>

                    </a>

                </div>

            </div>


            {{-- Quick Links --}}

            <div class="col-6 col-lg-2">

                <h6 class="fw-semibold mb-3">
                    Explore
                </h6>

                <ul class="list-unstyled d-grid gap-2">

                    <li>
                        <a href="#" class="text-white-50">
                            Poojas
                        </a>
                    </li>

                    <li>
                        <a href="#" class="text-white-50">
                            Temples
                        </a>
                    </li>

                    <li>
                        <a href="#" class="text-white-50">
                            Priests
                        </a>
                    </li>

                    <li>
                        <a href="#" class="text-white-50">
                            Digital Pooja
                        </a>
                    </li>

                    <li>
                        <a href="#" class="text-white-50">
                            Astrology
                        </a>
                    </li>

                    <li>
                        <a href="#" class="text-white-50">
                            Online Store
                        </a>
                    </li>

                </ul>

            </div>


            {{-- Company --}}

            <div class="col-6 col-lg-2">

                <h6 class="fw-semibold mb-3">
                    Company
                </h6>

                <ul class="list-unstyled d-grid gap-2">

                    <li>
                        <a href="#" class="text-white-50">
                            About Us
                        </a>
                    </li>

                    <li>
                        <a href="#" class="text-white-50">
                            Contact Us
                        </a>
                    </li>

                    <li>
                        <a href="#" class="text-white-50">
                            Blogs
                        </a>
                    </li>

                    <li>
                        <a href="#" class="text-white-50">
                            Careers
                        </a>
                    </li>

                    <li>
                        <a href="#" class="text-white-50">
                            Testimonials
                        </a>
                    </li>

                    <li>
                        <a href="#" class="text-white-50">
                            FAQ
                        </a>
                    </li>

                </ul>

            </div>


            {{-- Support --}}

            <div class="col-6 col-lg-2">

                <h6 class="fw-semibold mb-3">
                    Support
                </h6>

                <ul class="list-unstyled d-grid gap-2">

                    <li>
                        <a href="#" class="text-white-50">
                            Help Center
                        </a>
                    </li>

                    <li>
                        <a href="#" class="text-white-50">
                            Raise Ticket
                        </a>
                    </li>

                    <li>
                        <a href="#" class="text-white-50">
                            Privacy Policy
                        </a>
                    </li>

                    <li>
                        <a href="#" class="text-white-50">
                            Terms & Conditions
                        </a>
                    </li>

                    <li>
                        <a href="#" class="text-white-50">
                            Refund Policy
                        </a>
                    </li>

                </ul>

            </div>


            {{-- Contact --}}

            <div class="col-6 col-lg-2">

                <h6 class="fw-semibold mb-3">
                    Contact
                </h6>

                <ul class="list-unstyled d-grid gap-3">

                    <li class="text-white-50">

                        <i class="bi bi-telephone text-warning me-2"></i>

                        +91 90000 00000

                    </li>

                    <li class="text-white-50">

                        <i class="bi bi-envelope text-warning me-2"></i>

                        support@poojanilayam.com

                    </li>

                    <li class="text-white-50">

                        <i class="bi bi-clock text-warning me-2"></i>

                        Mon - Sat
                        <br>
                        9:00 AM - 7:00 PM

                    </li>

                </ul>

            </div>

        </div>

    </div>


    {{-- Copyright --}}

    <div class="border-top border-secondary">

        <div class="container">

            <div class="d-flex flex-column
                        flex-md-row
                        justify-content-between
                        align-items-center
                        gap-2 py-3">

                <small class="text-white-50">

                    © {{ date('Y') }} Pooja Nilayam.
                    All rights reserved.

                </small>

                <small class="text-white-50">

                    Made with devotion ❤️

                </small>

            </div>

        </div>

    </div>

</footer>


{{-- =========================================================
     BOOTSTRAP JS
========================================================= --}}

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>