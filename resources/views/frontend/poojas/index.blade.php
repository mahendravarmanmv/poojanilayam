@extends('layouts.app')

@section('title', 'Poojas | Pooja Nilayam')

@section(
    'meta_description',
    'Explore and book authentic poojas for health, prosperity, success, peace and special occasions with Pooja Nilayam.'
)

@section('content')

@php

    /*
    |--------------------------------------------------------------------------
    | Temporary UI Data
    |--------------------------------------------------------------------------
    | Frontend prototype data only.
    | This will later come from Controllers / Services / Database.
    |--------------------------------------------------------------------------
    */

    $categories = [
        [
            'icon' => 'bi-flower1',
            'name' => 'All Poojas',
            'count' => 24
        ],
        [
            'icon' => 'bi-sun',
            'name' => 'Daily Poojas',
            'count' => 8
        ],
        [
            'icon' => 'bi-fire',
            'name' => 'Homams',
            'count' => 12
        ],
        [
            'icon' => 'bi-heart',
            'name' => 'Special Poojas',
            'count' => 16
        ],
        [
            'icon' => 'bi-house-heart',
            'name' => 'Griha Pooja',
            'count' => 10
        ],
        [
            'icon' => 'bi-stars',
            'name' => 'Festival Poojas',
            'count' => 14
        ]
    ];


    $occasions = [
        'Health',
        'Prosperity',
        'Success',
        'Peace',
        'Marriage',
        'Education',
        'House Warming',
        'Birthday'
    ];


    $locations = [
        'Hyderabad',
        'Bengaluru',
        'Chennai',
        'Tirupati',
        'Vijayawada',
        'Srisailam'
    ];


    $poojas = [
        [
            'image' => 'ganapathi.jpg',
            'name' => 'Ganapathi Homam',
            'category' => 'Homam',
            'description' => 'A sacred ritual performed for success, prosperity and removal of obstacles.',
            'duration' => '60 Mins',
            'rating' => '4.9',
            'reviews' => '128',
            'price' => '₹501',
            'location' => 'Hyderabad',
            'featured' => true
        ],

        [
            'image' => 'rudrabhishekam.jpg',
            'name' => 'Rudrabhishekam',
            'category' => 'Special Pooja',
            'description' => 'A traditional Shiva worship ceremony for peace, health and spiritual wellbeing.',
            'duration' => '90 Mins',
            'rating' => '4.8',
            'reviews' => '96',
            'price' => '₹1,101',
            'location' => 'Hyderabad',
            'featured' => true
        ],

        [
            'image' => 'lakshmi.jpg',
            'name' => 'Lakshmi Pooja',
            'category' => 'Prosperity',
            'description' => 'A devotional ceremony seeking the blessings of Goddess Lakshmi for prosperity.',
            'duration' => '60 Mins',
            'rating' => '4.9',
            'reviews' => '152',
            'price' => '₹501',
            'location' => 'Bengaluru',
            'featured' => false
        ],

        [
            'image' => 'satyanarayana.jpg',
            'name' => 'Satyanarayana Pooja',
            'category' => 'Special Pooja',
            'description' => 'A traditional pooja performed for peace, blessings and family wellbeing.',
            'duration' => '90 Mins',
            'rating' => '4.8',
            'reviews' => '84',
            'price' => '₹601',
            'location' => 'Vijayawada',
            'featured' => true
        ],

        [
            'image' => 'ganapathi.jpg',
            'name' => 'Sankashta Hara Ganapathi Pooja',
            'category' => 'Ganapathi Pooja',
            'description' => 'Seek the blessings of Lord Ganesha for overcoming challenges and obstacles.',
            'duration' => '45 Mins',
            'rating' => '4.9',
            'reviews' => '73',
            'price' => '₹401',
            'location' => 'Chennai',
            'featured' => false
        ],

        [
            'image' => 'rudrabhishekam.jpg',
            'name' => 'Maha Mrityunjaya Homam',
            'category' => 'Homam',
            'description' => 'A powerful Vedic ritual traditionally performed for wellbeing and peace.',
            'duration' => '120 Mins',
            'rating' => '4.9',
            'reviews' => '61',
            'price' => '₹1,501',
            'location' => 'Srisailam',
            'featured' => true
        ],

        [
            'image' => 'lakshmi.jpg',
            'name' => 'Dhanalakshmi Pooja',
            'category' => 'Prosperity',
            'description' => 'A devotional offering seeking blessings for abundance and financial wellbeing.',
            'duration' => '60 Mins',
            'rating' => '4.7',
            'reviews' => '55',
            'price' => '₹701',
            'location' => 'Hyderabad',
            'featured' => false
        ],

        [
            'image' => 'satyanarayana.jpg',
            'name' => 'Navagraha Pooja',
            'category' => 'Special Pooja',
            'description' => 'A traditional ritual dedicated to the Navagrahas for harmony and wellbeing.',
            'duration' => '90 Mins',
            'rating' => '4.8',
            'reviews' => '48',
            'price' => '₹1,201',
            'location' => 'Tirupati',
            'featured' => false
        ]
    ];

@endphp


{{-- ============================================================
     PAGE HERO
============================================================ --}}

<section class="bg-pn-cream border-bottom">

    <div class="container py-5">

        {{-- Breadcrumb --}}

        <nav
            aria-label="breadcrumb"
            class="mb-4"
        >

            <ol class="breadcrumb mb-0">

                <li class="breadcrumb-item">

                    <a
                        href="{{ route('home') }}"
                        class="text-pn-primary"
                    >
                        Home
                    </a>

                </li>

                <li
                    class="breadcrumb-item active"
                    aria-current="page"
                >
                    Poojas
                </li>

            </ol>

        </nav>


        <div class="row align-items-center g-4">

            <div class="col-lg-7">

                <span
                    class="pn-section-label
                           text-uppercase
                           text-pn-gold
                           small
                           fw-semibold"
                >
                    Sacred Services
                </span>


                <h1
                    class="font-serif
                           display-4
                           text-pn-brown
                           mt-2
                           mb-3"
                >
                    Discover Poojas
                </h1>


                <div class="pn-divider mb-3"></div>


                <p
                    class="lead
                           text-secondary
                           col-lg-10
                           mb-0"
                >
                    Explore authentic poojas and traditional
                    rituals for health, prosperity, peace,
                    success and life's special occasions.
                </p>

            </div>


            <div class="col-lg-5">

                <div
                    class="bg-white
                           rounded-4
                           border
                           shadow-sm
                           p-2"
                >

                    <form
                        action="#"
                        method="GET"
                    >

                        <div class="input-group input-group-lg">

                            <span
                                class="input-group-text
                                       bg-transparent
                                       border-0"
                            >

                                <i
                                    class="bi bi-search
                                           text-pn-primary"
                                ></i>

                            </span>


                            <input
                                type="search"
                                name="search"
                                value="{{ request('search') }}"
                                class="form-control
                                       border-0
                                       shadow-none"
                                placeholder="Search for a pooja..."
                                aria-label="Search for a pooja"
                            >


                            <button
                                type="submit"
                                class="btn btn-pn"
                            >
                                Search
                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- ============================================================
     CATEGORY STRIP
============================================================ --}}

<section class="py-4 bg-white border-bottom">

    <div class="container">

        <div
            class="row
                   row-cols-2
                   row-cols-md-3
                   row-cols-lg-6
                   g-3"
        >

            @foreach($categories as $category)

                <div class="col">

                    <a
                        href="#"
                        class="card
                               border
                               border-warning-subtle
                               rounded-4
                               h-100
                               text-center
                               text-pn-brown
                               p-3"
                    >

                        <div class="card-body p-2">

                            <div
                                class="icon-circle-58
                                       mx-auto
                                       d-flex
                                       align-items-center
                                       justify-content-center
                                       rounded-circle
                                       bg-pn-beige
                                       text-pn-primary
                                       fs-3
                                       mb-3"
                            >

                                <i
                                    class="bi {{ $category['icon'] }}"
                                ></i>

                            </div>


                            <h6 class="fw-semibold mb-1">

                                {{ $category['name'] }}

                            </h6>


                            <small class="text-secondary">

                                {{ $category['count'] }} Poojas

                            </small>

                        </div>

                    </a>

                </div>

            @endforeach

        </div>

    </div>

</section>


{{-- ============================================================
     MAIN LISTING
============================================================ --}}

<section class="py-5">

    <div class="container">

        <div class="row g-4">


            {{-- =================================================
                 FILTER SIDEBAR
            ================================================= --}}

            <div class="col-lg-3">

                {{-- Mobile Filter Button --}}

                <div class="d-lg-none mb-3">

                    <button
                        class="btn btn-pn-outline w-100"
                        type="button"
                        data-bs-toggle="offcanvas"
                        data-bs-target="#poojaFilters"
                        aria-controls="poojaFilters"
                    >

                        <i class="bi bi-funnel me-2"></i>

                        Filters

                    </button>

                </div>


                {{-- Desktop / Offcanvas Filter --}}

                <div
                    class="offcanvas-lg
                           offcanvas-start"
                    tabindex="-1"
                    id="poojaFilters"
                    aria-labelledby="poojaFiltersLabel"
                >

                    <div class="offcanvas-header border-bottom">

                        <h5
                            class="offcanvas-title
                                   font-serif
                                   text-pn-brown"
                            id="poojaFiltersLabel"
                        >
                            Filter Poojas
                        </h5>


                        <button
                            type="button"
                            class="btn-close d-lg-none"
                            data-bs-dismiss="offcanvas"
                            aria-label="Close"
                        ></button>

                    </div>


                    <div class="offcanvas-body d-block p-0">

                        <div
                            class="card
                                   border
                                   border-warning-subtle
                                   rounded-4
                                   shadow-sm"
                        >

                            <div class="card-body p-4">


                                {{-- Filter Header --}}

                                <div
                                    class="d-flex
                                           align-items-center
                                           justify-content-between
                                           mb-4"
                                >

                                    <h5
                                        class="font-serif
                                               text-pn-brown
                                               mb-0"
                                    >
                                        Filters
                                    </h5>


                                    <a
                                        href="#"
                                        class="small
                                               text-pn-primary"
                                    >
                                        Clear All
                                    </a>

                                </div>


                                {{-- Category --}}

                                <div class="mb-4">

                                    <h6
                                        class="fw-semibold
                                               text-pn-brown
                                               mb-3"
                                    >
                                        Pooja Category
                                    </h6>


                                    <div
                                        class="vstack
                                               gap-2"
                                    >

                                        @foreach($categories as $index => $category)

                                            @if($index > 0)

                                                <div
                                                    class="form-check"
                                                >

                                                    <input
                                                        class="form-check-input"
                                                        type="checkbox"
                                                        value="{{ $category['name'] }}"
                                                        id="category{{ $index }}"
                                                    >

                                                    <label
                                                        class="form-check-label
                                                               small"
                                                        for="category{{ $index }}"
                                                    >

                                                        {{ $category['name'] }}

                                                        <span
                                                            class="text-secondary"
                                                        >
                                                            ({{ $category['count'] }})
                                                        </span>

                                                    </label>

                                                </div>

                                            @endif

                                        @endforeach

                                    </div>

                                </div>


                                <hr class="border-warning-subtle">


                                {{-- Occasion --}}

                                <div class="py-3">

                                    <h6
                                        class="fw-semibold
                                               text-pn-brown
                                               mb-3"
                                    >
                                        Occasion
                                    </h6>


                                    <div
                                        class="vstack
                                               gap-2"
                                    >

                                        @foreach($occasions as $index => $occasion)

                                            <div class="form-check">

                                                <input
                                                    class="form-check-input"
                                                    type="checkbox"
                                                    value="{{ $occasion }}"
                                                    id="occasion{{ $index }}"
                                                >

                                                <label
                                                    class="form-check-label
                                                           small"
                                                    for="occasion{{ $index }}"
                                                >

                                                    {{ $occasion }}

                                                </label>

                                            </div>

                                        @endforeach

                                    </div>

                                </div>


                                <hr class="border-warning-subtle">


                                {{-- Location --}}

                                <div class="py-3">

                                    <h6
                                        class="fw-semibold
                                               text-pn-brown
                                               mb-3"
                                    >
                                        Location
                                    </h6>


                                    <select
                                        class="form-select"
                                        name="location"
                                    >

                                        <option value="">
                                            All Locations
                                        </option>

                                        @foreach($locations as $location)

                                            <option
                                                value="{{ $location }}"
                                            >
                                                {{ $location }}
                                            </option>

                                        @endforeach

                                    </select>

                                </div>


                                <hr class="border-warning-subtle">


                                {{-- Price --}}

                                <div class="py-3">

                                    <h6
                                        class="fw-semibold
                                               text-pn-brown
                                               mb-3"
                                    >
                                        Price Range
                                    </h6>


                                    <div class="row g-2">

                                        <div class="col-6">

                                            <input
                                                type="number"
                                                class="form-control"
                                                placeholder="Min"
                                                aria-label="Minimum price"
                                            >

                                        </div>


                                        <div class="col-6">

                                            <input
                                                type="number"
                                                class="form-control"
                                                placeholder="Max"
                                                aria-label="Maximum price"
                                            >

                                        </div>

                                    </div>

                                </div>


                                <button
                                    type="button"
                                    class="btn btn-pn w-100 mt-3"
                                >

                                    Apply Filters

                                </button>

                            </div>

                        </div>

                    </div>

                </div>

            </div>


            {{-- =================================================
                 RESULTS
            ================================================= --}}

            <div class="col-lg-9">


                {{-- Results Header --}}

                <div
                    class="d-flex
                           flex-column
                           flex-md-row
                           align-items-md-center
                           justify-content-between
                           gap-3
                           mb-4"
                >

                    <div>

                        <h2
                            class="font-serif
                                   text-pn-brown
                                   mb-1"
                        >
                            All Poojas
                        </h2>


                        <p
                            class="small
                                   text-secondary
                                   mb-0"
                        >
                            Showing
                            <strong class="text-pn-brown">
                                {{ count($poojas) }}
                            </strong>
                            poojas
                        </p>

                    </div>


                    <div
                        class="d-flex
                               align-items-center
                               gap-2"
                    >

                        <label
                            for="sortPoojas"
                            class="small
                                   text-secondary
                                   text-nowrap"
                        >
                            Sort by
                        </label>


                        <select
                            id="sortPoojas"
                            class="form-select"
                            style="width:190px;"
                        >

                            <option>
                                Recommended
                            </option>

                            <option>
                                Price: Low to High
                            </option>

                            <option>
                                Price: High to Low
                            </option>

                            <option>
                                Highest Rated
                            </option>

                            <option>
                                Most Popular
                            </option>

                        </select>

                    </div>

                </div>


                {{-- Active Filters --}}

                <div
                    class="d-flex
                           flex-wrap
                           align-items-center
                           gap-2
                           mb-4"
                >

                    <span
                        class="small
                               text-secondary
                               me-1"
                    >
                        Popular:
                    </span>


                    <a
                        href="#"
                        class="badge
                               rounded-pill
                               bg-pn-beige
                               text-pn-primary
                               px-3
                               py-2"
                    >
                        Ganapathi
                    </a>


                    <a
                        href="#"
                        class="badge
                               rounded-pill
                               bg-pn-beige
                               text-pn-primary
                               px-3
                               py-2"
                    >
                        Homam
                    </a>


                    <a
                        href="#"
                        class="badge
                               rounded-pill
                               bg-pn-beige
                               text-pn-primary
                               px-3
                               py-2"
                    >
                        Prosperity
                    </a>

                </div>


                {{-- Pooja Grid --}}

                <div class="row g-4">

                    @foreach($poojas as $pooja)

                        <div class="col-12 col-sm-6 col-xl-4">

                            <article
                                class="pn-pooja-card
                                       card
                                       border-0
                                       rounded-4
                                       overflow-hidden
                                       bg-white
                                       h-100"
                            >

                                {{-- Image --}}

                                <div
                                    class="position-relative"
                                >

                                    <img
                                        src="{{ asset('images/home/' . $pooja['image']) }}"
                                        class="pn-pooja-image
                                               card-img-top"
                                        alt="{{ $pooja['name'] }}"
                                        loading="lazy"
                                    >


                                    @if($pooja['featured'])

                                        <span
                                            class="position-absolute
                                                   top-0
                                                   start-0
                                                   m-3
                                                   badge
                                                   rounded-pill
                                                   bg-pn-primary"
                                        >

                                            <i
                                                class="bi bi-stars me-1"
                                            ></i>

                                            Featured

                                        </span>

                                    @endif


                                    <button
                                        type="button"
                                        class="btn
                                               btn-light
                                               rounded-circle
                                               position-absolute
                                               top-0
                                               end-0
                                               m-3
                                               shadow-sm"
                                        style="width:40px;height:40px;"
                                        aria-label="Add to wishlist"
                                    >

                                        <i class="bi bi-heart"></i>

                                    </button>

                                </div>


                                {{-- Content --}}

                                <div class="card-body p-4">


                                    <div
                                        class="d-flex
                                               align-items-center
                                               justify-content-between
                                               gap-2
                                               mb-2"
                                    >

                                        <span
                                            class="small
                                                   text-pn-primary
                                                   fw-semibold"
                                        >

                                            {{ $pooja['category'] }}

                                        </span>


                                        <span
                                            class="small
                                                   text-secondary"
                                        >

                                            <i
                                                class="bi bi-geo-alt
                                                       text-pn-primary"
                                            ></i>

                                            {{ $pooja['location'] }}

                                        </span>

                                    </div>


                                    <h5
                                        class="font-serif
                                               text-pn-brown
                                               fw-semibold
                                               mb-2"
                                    >

                                        {{ $pooja['name'] }}

                                    </h5>


                                    <p
                                        class="small
                                               text-secondary
                                               mb-3"
                                    >

                                        {{ $pooja['description'] }}

                                    </p>


                                    {{-- Rating --}}

                                    <div
                                        class="d-flex
                                               align-items-center
                                               gap-2
                                               mb-3"
                                    >

                                        <span>

                                            <i
                                                class="bi bi-star-fill
                                                       text-pn-gold"
                                            ></i>

                                            <strong
                                                class="small"
                                            >
                                                {{ $pooja['rating'] }}
                                            </strong>

                                        </span>


                                        <span
                                            class="small
                                                   text-secondary"
                                        >
                                            ({{ $pooja['reviews'] }}
                                            reviews)
                                        </span>

                                    </div>


                                    {{-- Duration --}}

                                    <div
                                        class="d-flex
                                               align-items-center
                                               gap-3
                                               small
                                               text-secondary
                                               mb-4"
                                    >

                                        <span>

                                            <i
                                                class="bi bi-clock
                                                       text-pn-primary
                                                       me-1"
                                            ></i>

                                            {{ $pooja['duration'] }}

                                        </span>


                                        <span>

                                            <i
                                                class="bi bi-patch-check
                                                       text-pn-primary
                                                       me-1"
                                            ></i>

                                            Verified

                                        </span>

                                    </div>


                                    {{-- Bottom --}}

                                    <div
                                        class="d-flex
                                               align-items-end
                                               justify-content-between
                                               gap-2"
                                    >

                                        <div>

                                            <small
                                                class="text-secondary
                                                       d-block"
                                            >
                                                Starting from
                                            </small>


                                            <strong
                                                class="fs-5
                                                       text-pn-brown"
                                            >

                                                {{ $pooja['price'] }}

                                            </strong>

                                        </div>


                                        <a
                                            href="#"
                                            class="btn btn-pn btn-sm px-3"
                                        >

                                            View Details

                                            <i
                                                class="bi bi-arrow-right ms-1"
                                            ></i>

                                        </a>

                                    </div>

                                </div>

                            </article>

                        </div>

                    @endforeach

                </div>


                {{-- =================================================
                     PAGINATION
                ================================================= --}}

                <nav
                    aria-label="Pooja pagination"
                    class="mt-5"
                >

                    <ul
                        class="pagination
                               justify-content-center
                               mb-0"
                    >

                        <li class="page-item disabled">

                            <span class="page-link">

                                <i class="bi bi-chevron-left"></i>

                            </span>

                        </li>


                        <li class="page-item active">

                            <span
                                class="page-link
                                       bg-pn-primary
                                       border-pn-primary"
                            >
                                1
                            </span>

                        </li>


                        <li class="page-item">

                            <a
                                href="#"
                                class="page-link
                                       text-pn-primary"
                            >
                                2
                            </a>

                        </li>


                        <li class="page-item">

                            <a
                                href="#"
                                class="page-link
                                       text-pn-primary"
                            >
                                3
                            </a>

                        </li>


                        <li class="page-item">

                            <a
                                href="#"
                                class="page-link
                                       text-pn-primary"
                            >
                                4
                            </a>

                        </li>


                        <li class="page-item">

                            <a
                                href="#"
                                class="page-link
                                       text-pn-primary"
                            >

                                <i class="bi bi-chevron-right"></i>

                            </a>

                        </li>

                    </ul>

                </nav>

            </div>

        </div>

    </div>

</section>


{{-- ============================================================
     WHY BOOK WITH POOJA NILAYAM
============================================================ --}}

<section class="bg-pn-cream py-5">

    <div class="container py-lg-4">

        <div class="text-center mb-5">

            <span
                class="pn-section-label
                       text-uppercase
                       text-pn-gold
                       small
                       fw-semibold"
            >
                Our Promise
            </span>


            <h2
                class="font-serif
                       display-6
                       text-pn-brown
                       mt-2"
            >
                Why Book With Pooja Nilayam?
            </h2>


            <div class="pn-divider mx-auto my-3"></div>

        </div>


        <div
            class="row
                   row-cols-1
                   row-cols-md-2
                   row-cols-lg-4
                   g-4"
        >

            @foreach([
                [
                    'icon' => 'bi-patch-check',
                    'title' => 'Authentic Rituals',
                    'text' => 'Traditional rituals performed with devotion and care.'
                ],
                [
                    'icon' => 'bi-person-check',
                    'title' => 'Trusted Priests',
                    'text' => 'Connect with experienced and verified priests.'
                ],
                [
                    'icon' => 'bi-calendar-check',
                    'title' => 'Easy Booking',
                    'text' => 'Choose your preferred service and schedule with ease.'
                ],
                [
                    'icon' => 'bi-shield-check',
                    'title' => 'Secure Payments',
                    'text' => 'Safe and convenient payment experience.'
                ]
            ] as $benefit)

                <div class="col">

                    <div
                        class="card
                               border-0
                               bg-white
                               rounded-4
                               h-100
                               text-center
                               p-4"
                    >

                        <div class="card-body">

                            <div
                                class="mx-auto
                                       d-flex
                                       align-items-center
                                       justify-content-center
                                       rounded-circle
                                       bg-pn-beige
                                       text-pn-primary
                                       fs-3
                                       mb-3"
                                style="width:64px;height:64px;"
                            >

                                <i
                                    class="bi {{ $benefit['icon'] }}"
                                ></i>

                            </div>


                            <h5
                                class="font-serif
                                       text-pn-brown"
                            >

                                {{ $benefit['title'] }}

                            </h5>


                            <p
                                class="small
                                       text-secondary
                                       mb-0"
                            >

                                {{ $benefit['text'] }}

                            </p>

                        </div>

                    </div>

                </div>

            @endforeach

        </div>

    </div>

</section>


{{-- ============================================================
     FINAL CTA
============================================================ --}}

<section class="py-5">

    <div class="container py-lg-4">

        <div
            class="bg-pn-brown
                   rounded-5
                   text-center
                   text-white
                   p-4
                   p-md-5"
        >

            <i
                class="bi bi-flower1
                       display-5
                       text-warning"
            ></i>


            <h2
                class="font-serif
                       display-6
                       mt-3"
            >

                Find the right pooja
                for your occasion.

            </h2>


            <p
                class="text-white-50
                       col-lg-6
                       mx-auto"
            >

                Explore our collection of traditional poojas
                and choose a sacred experience that suits
                your needs.

            </p>


            <a
                href="#"
                class="btn btn-warning
                       text-dark
                       fw-semibold
                       px-4"
            >

                Explore Poojas

                <i
                    class="bi bi-arrow-right ms-2"
                ></i>

            </a>

        </div>

    </div>

</section>

@endsection