@extends('layouts.app')

@section('title', 'Temples | Pooja Nilayam')

@section(
    'meta_description',
    'Explore temples, discover sacred places and find temple services with Pooja Nilayam.'
)

@section('content')

@php

    /*
    |--------------------------------------------------------------------------
    | TEMPORARY TEMPLE DATA
    |--------------------------------------------------------------------------
    | These values will later come from the Temple model / controller.
    |--------------------------------------------------------------------------
    */

    $temples = [

        [
            'name' => 'Sri Venkateswara Temple',
            'location' => 'Tirumala, Andhra Pradesh',
            'deity' => 'Lord Venkateswara',
            'image' => 'temple-1.jpg',
            'verified' => true,
            'rating' => '4.9',
            'reviews' => '2,840',
            'description' =>
                'A sacred temple experience with devotional services,
                 pooja bookings and spiritual offerings.',
            'services' => [
                'Pooja Booking',
                'Darshan',
                'Donations'
            ]
        ],

        [
            'name' => 'Sri Srisailam Mallikarjuna Temple',
            'location' => 'Srisailam, Andhra Pradesh',
            'deity' => 'Lord Mallikarjuna',
            'image' => 'temple-2.jpg',
            'verified' => true,
            'rating' => '4.8',
            'reviews' => '1,920',
            'description' =>
                'Discover temple services, devotional experiences
                 and sacred offerings.',
            'services' => [
                'Pooja Booking',
                'Events',
                'Donations'
            ]
        ],

        [
            'name' => 'Sri Kalahasti Temple',
            'location' => 'Srikalahasti, Andhra Pradesh',
            'deity' => 'Lord Shiva',
            'image' => 'temple-3.jpg',
            'verified' => true,
            'rating' => '4.8',
            'reviews' => '1,540',
            'description' =>
                'Explore spiritual services and temple experiences
                 from a trusted sacred destination.',
            'services' => [
                'Pooja Booking',
                'Gallery',
                'Donations'
            ]
        ],

        [
            'name' => 'Sri Kanaka Durga Temple',
            'location' => 'Vijayawada, Andhra Pradesh',
            'deity' => 'Goddess Durga',
            'image' => 'temple-4.jpg',
            'verified' => true,
            'rating' => '4.9',
            'reviews' => '2,110',
            'description' =>
                'Experience devotional services dedicated to
                 Goddess Durga and the temple community.',
            'services' => [
                'Pooja Booking',
                'Events',
                'Donations'
            ]
        ],

        [
            'name' => 'Birla Mandir',
            'location' => 'Hyderabad, Telangana',
            'deity' => 'Lord Venkateswara',
            'image' => 'temple-5.jpg',
            'verified' => true,
            'rating' => '4.7',
            'reviews' => '3,420',
            'description' =>
                'A beautiful spiritual destination offering
                 devotional experiences and temple services.',
            'services' => [
                'Pooja Booking',
                'Gallery'
            ]
        ],

        [
            'name' => 'Sri Ramakrishna Math',
            'location' => 'Hyderabad, Telangana',
            'deity' => 'Sri Ramakrishna',
            'image' => 'temple-6.jpg',
            'verified' => true,
            'rating' => '4.8',
            'reviews' => '980',
            'description' =>
                'Explore a peaceful spiritual environment and
                 discover available devotional services.',
            'services' => [
                'Events',
                'Gallery',
                'Donations'
            ]
        ]

    ];


    /*
    |--------------------------------------------------------------------------
    | Temple Categories
    |--------------------------------------------------------------------------
    */

    $categories = [

        [
            'icon' => 'bi-stars',
            'title' => 'Popular Temples',
            'count' => '24 Temples'
        ],

        [
            'icon' => 'bi-geo-alt',
            'title' => 'Nearby Temples',
            'count' => '18 Temples'
        ],

        [
            'icon' => 'bi-heart',
            'title' => 'Deity Temples',
            'count' => '42 Temples'
        ],

        [
            'icon' => 'bi-calendar-event',
            'title' => 'Event Temples',
            'count' => '16 Temples'
        ]

    ];


    /*
    |--------------------------------------------------------------------------
    | States
    |--------------------------------------------------------------------------
    */

    $states = [
        'All Locations',
        'Andhra Pradesh',
        'Telangana',
        'Tamil Nadu',
        'Karnataka',
        'Kerala',
        'Maharashtra'
    ];

@endphp


{{-- ============================================================
     BREADCRUMB
============================================================ --}}

<section class="bg-pn-cream border-bottom">

    <div class="container py-3">

        <nav aria-label="breadcrumb">

            <ol class="breadcrumb mb-0">

                <li class="breadcrumb-item">

                    <a
                        href="{{ url('/') }}"
                        class="text-pn-primary"
                    >
                        Home
                    </a>

                </li>


                <li
                    class="breadcrumb-item active"
                    aria-current="page"
                >
                    Temples
                </li>

            </ol>

        </nav>

    </div>

</section>


{{-- ============================================================
     HERO
============================================================ --}}

<section class="bg-pn-cream py-5">

    <div class="container">

        <div
            class="row
                   align-items-center
                   g-4"
        >

            <div class="col-12 col-lg-7">

                <span
                    class="small
                           text-pn-gold
                           fw-semibold
                           text-uppercase"
                >
                    Sacred Places
                </span>


                <h1
                    class="font-serif
                           display-4
                           text-pn-brown
                           mt-2
                           mb-3"
                >

                    Discover Sacred Temples

                </h1>


                <p
                    class="lead
                           text-secondary
                           col-xl-10
                           mb-4"
                >

                    Explore temples, discover their spiritual
                    offerings and connect with sacred experiences
                    through Pooja Nilayam.

                </p>


                {{-- Search --}}

                <form
                    action="#"
                    method="GET"
                >

                    <div
                        class="input-group
                               input-group-lg
                               bg-white
                               rounded-pill
                               shadow-sm
                               overflow-hidden"
                    >

                        <span
                            class="input-group-text
                                   bg-white
                                   border-0
                                   ps-4"
                        >

                            <i
                                class="bi bi-search
                                       text-pn-primary"
                            ></i>

                        </span>


                        <input
                            type="search"
                            name="search"
                            class="form-control
                                   border-0
                                   shadow-none"
                            placeholder="Search temples, deities or locations..."
                            aria-label="Search temples"
                        >


                        <button
                            type="submit"
                            class="btn
                                   btn-pn
                                   rounded-pill
                                   m-1
                                   px-4"
                        >

                            Search

                        </button>

                    </div>

                </form>

            </div>


            <div class="col-12 col-lg-5">

                <div
                    class="pn-digital
                           rounded-5
                           overflow-hidden
                           text-white
                           p-4
                           p-md-5
                           text-center"
                >

                    <div
                        class="mx-auto
                               rounded-circle
                               d-flex
                               align-items-center
                               justify-content-center
                               bg-warning
                               text-dark
                               mb-4"
                        style="width:110px;height:110px;"
                    >

                        <i
                            class="bi bi-bank
                                   display-5"
                        ></i>

                    </div>


                    <h2
                        class="font-serif
                               h2"
                    >

                        Find Your Sacred Place

                    </h2>


                    <p
                        class="text-white-50
                               small
                               mb-0"
                    >

                        Discover temples and explore their
                        available spiritual services.

                    </p>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- ============================================================
     QUICK CATEGORIES
============================================================ --}}

<section class="py-5">

    <div class="container">

        <div
            class="text-center
                   mb-5"
        >

            <span
                class="small
                       text-pn-gold
                       fw-semibold
                       text-uppercase"
            >
                Explore Temples
            </span>


            <h2
                class="font-serif
                       display-6
                       text-pn-brown
                       mt-2"
            >

                Find a temple that feels close to your heart.

            </h2>


            <div
                class="pn-divider
                       mx-auto
                       my-3"
            ></div>

        </div>


        <div
            class="row
                   row-cols-2
                   row-cols-md-4
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
                               text-decoration-none"
                    >

                        <div
                            class="card-body
                                   p-3
                                   p-md-4
                                   text-center"
                        >

                            <div
                                class="mx-auto
                                       rounded-circle
                                       d-flex
                                       align-items-center
                                       justify-content-center
                                       bg-pn-cream
                                       text-pn-primary
                                       fs-4
                                       mb-3"
                                style="width:60px;height:60px;"
                            >

                                <i
                                    class="bi {{ $category['icon'] }}"
                                ></i>

                            </div>


                            <h3
                                class="font-serif
                                       h6
                                       text-pn-brown
                                       mb-1"
                            >

                                {{ $category['title'] }}

                            </h3>


                            <small
                                class="text-secondary"
                            >

                                {{ $category['count'] }}

                            </small>

                        </div>

                    </a>

                </div>

            @endforeach

        </div>

    </div>

</section>


{{-- ============================================================
     FILTER + LISTING
============================================================ --}}

<section class="py-5 bg-light-subtle">

    <div class="container">


        {{-- Heading --}}

        <div
            class="d-flex
                   flex-column
                   flex-md-row
                   align-items-md-end
                   justify-content-between
                   gap-3
                   mb-4"
        >

            <div>

                <span
                    class="small
                           text-pn-gold
                           fw-semibold
                           text-uppercase"
                >
                    Temple Directory
                </span>


                <h2
                    class="font-serif
                           display-6
                           text-pn-brown
                           mt-2
                           mb-0"
                >

                    Explore Temples

                </h2>

            </div>


            <span
                class="text-secondary
                       small"
            >

                Showing
                <strong>{{ count($temples) }}</strong>
                temples

            </span>

        </div>


        {{-- Filters --}}

        <div
            class="card
                   border
                   border-warning-subtle
                   rounded-4
                   mb-4"
        >

            <div class="card-body p-3 p-md-4">

                <form>

                    <div
                        class="row
                               g-3
                               align-items-end"
                    >

                        {{-- Location --}}

                        <div class="col-12 col-md-4">

                            <label
                                for="location"
                                class="form-label
                                       small
                                       fw-semibold
                                       text-pn-brown"
                            >

                                Location

                            </label>


                            <select
                                id="location"
                                name="location"
                                class="form-select"
                            >

                                @foreach($states as $state)

                                    <option>
                                        {{ $state }}
                                    </option>

                                @endforeach

                            </select>

                        </div>


                        {{-- Deity --}}

                        <div class="col-12 col-md-3">

                            <label
                                for="deity"
                                class="form-label
                                       small
                                       fw-semibold
                                       text-pn-brown"
                            >

                                Deity

                            </label>


                            <select
                                id="deity"
                                name="deity"
                                class="form-select"
                            >

                                <option>All Deities</option>

                                <option>Lord Shiva</option>

                                <option>Lord Vishnu</option>

                                <option>Lord Ganesha</option>

                                <option>Goddess Durga</option>

                                <option>Lord Venkateswara</option>

                            </select>

                        </div>


                        {{-- Services --}}

                        <div class="col-12 col-md-3">

                            <label
                                for="service"
                                class="form-label
                                       small
                                       fw-semibold
                                       text-pn-brown"
                            >

                                Service

                            </label>


                            <select
                                id="service"
                                name="service"
                                class="form-select"
                            >

                                <option>All Services</option>

                                <option>Pooja Booking</option>

                                <option>Events</option>

                                <option>Donations</option>

                                <option>Gallery</option>

                            </select>

                        </div>


                        {{-- Button --}}

                        <div class="col-12 col-md-2">

                            <button
                                type="submit"
                                class="btn
                                       btn-pn
                                       w-100"
                            >

                                <i
                                    class="bi bi-funnel me-1"
                                ></i>

                                Filter

                            </button>

                        </div>

                    </div>

                </form>

            </div>

        </div>


        {{-- =================================================
             TEMPLE CARDS
        ================================================= --}}

        <div
            class="row
                   row-cols-1
                   row-cols-md-2
                   row-cols-xl-3
                   g-4"
        >

            @foreach($temples as $temple)

                <div class="col">

                    <article
                        class="card
                               border
                               border-warning-subtle
                               rounded-5
                               overflow-hidden
                               h-100"
                    >

                        {{-- Image --}}

                        <div
                            class="position-relative"
                        >

                            <img
                                src="{{ asset('images/temples/' . $temple['image']) }}"
                                class="card-img-top
                                       object-fit-cover"
                                style="height:260px;"
                                alt="{{ $temple['name'] }}"
                                loading="lazy"
                            >


                            {{-- Verified --}}

                            @if($temple['verified'])

                                <span
                                    class="position-absolute
                                           top-0
                                           start-0
                                           m-3
                                           badge
                                           rounded-pill
                                           bg-success
                                           px-3
                                           py-2"
                                >

                                    <i
                                        class="bi bi-patch-check-fill me-1"
                                    ></i>

                                    Verified

                                </span>

                            @endif


                            {{-- Wishlist --}}

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
                                style="width:42px;height:42px;"
                                aria-label="Add {{ $temple['name'] }} to wishlist"
                            >

                                <i
                                    class="bi bi-heart"
                                ></i>

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

                                    {{ $temple['deity'] }}

                                </span>


                                <span
                                    class="small
                                           text-secondary"
                                >

                                    <i
                                        class="bi bi-star-fill
                                               text-warning"
                                    ></i>

                                    {{ $temple['rating'] }}

                                    <span
                                        class="text-muted"
                                    >
                                        ({{ $temple['reviews'] }})
                                    </span>

                                </span>

                            </div>


                            <h3
                                class="font-serif
                                       h4
                                       text-pn-brown
                                       mb-2"
                            >

                                {{ $temple['name'] }}

                            </h3>


                            <p
                                class="small
                                       text-secondary
                                       mb-3"
                            >

                                <i
                                    class="bi bi-geo-alt
                                           text-pn-primary
                                           me-1"
                                ></i>

                                {{ $temple['location'] }}

                            </p>


                            <p
                                class="small
                                       text-secondary
                                       mb-4"
                            >

                                {{ $temple['description'] }}

                            </p>


                            {{-- Services --}}

                            <div
                                class="d-flex
                                       flex-wrap
                                       gap-2
                                       mb-4"
                            >

                                @foreach($temple['services'] as $service)

                                    <span
                                        class="badge
                                               rounded-pill
                                               bg-pn-cream
                                               text-pn-brown
                                               border
                                               border-warning-subtle
                                               px-3
                                               py-2"
                                    >

                                        {{ $service }}

                                    </span>

                                @endforeach

                            </div>


                            {{-- Action --}}

                            <a
                                href="#"
                                class="btn
                                       btn-pn-outline
                                       w-100"
                            >

                                View Temple

                                <i
                                    class="bi bi-arrow-right ms-2"
                                ></i>

                            </a>

                        </div>

                    </article>

                </div>

            @endforeach

        </div>


        {{-- =================================================
             PAGINATION
        ================================================= --}}

        <div
            class="d-flex
                   justify-content-center
                   mt-5"
        >

            <nav aria-label="Temple pagination">

                <ul class="pagination mb-0">

                    <li
                        class="page-item disabled"
                    >

                        <span class="page-link">

                            <i
                                class="bi bi-chevron-left"
                            ></i>

                        </span>

                    </li>


                    <li class="page-item active">

                        <span class="page-link">
                            1
                        </span>

                    </li>


                    <li class="page-item">

                        <a
                            href="#"
                            class="page-link"
                        >
                            2
                        </a>

                    </li>


                    <li class="page-item">

                        <a
                            href="#"
                            class="page-link"
                        >
                            3
                        </a>

                    </li>


                    <li class="page-item">

                        <a
                            href="#"
                            class="page-link"
                        >

                            <i
                                class="bi bi-chevron-right"
                            ></i>

                        </a>

                    </li>

                </ul>

            </nav>

        </div>

    </div>

</section>


{{-- ============================================================
     WHY EXPLORE TEMPLES
============================================================ --}}

<section class="py-5">

    <div class="container">

        <div
            class="row
                   align-items-center
                   g-5"
        >

            <div class="col-12 col-lg-5">

                <span
                    class="small
                           text-pn-gold
                           fw-semibold
                           text-uppercase"
                >
                    Temple Experience
                </span>


                <h2
                    class="font-serif
                           display-6
                           text-pn-brown
                           mt-2
                           mb-3"
                >

                    More than a temple directory.

                </h2>


                <div
                    class="pn-divider
                           mb-4"
                ></div>


                <p
                    class="text-secondary"
                >

                    Pooja Nilayam brings temple discovery together
                    with devotional services and spiritual experiences.

                </p>


                <a
                    href="#"
                    class="btn btn-pn"
                >

                    Explore Poojas

                    <i
                        class="bi bi-arrow-right ms-2"
                    ></i>

                </a>

            </div>


            <div class="col-12 col-lg-7">

                <div
                    class="row
                           row-cols-1
                           row-cols-sm-2
                           g-3"
                >

                    <div class="col">

                        <div
                            class="card
                                   border
                                   border-warning-subtle
                                   rounded-4
                                   h-100"
                        >

                            <div class="card-body p-4">

                                <div
                                    class="rounded-circle
                                           d-flex
                                           align-items-center
                                           justify-content-center
                                           bg-pn-cream
                                           text-pn-primary
                                           mb-3"
                                    style="width:54px;height:54px;"
                                >

                                    <i
                                        class="bi bi-calendar-check
                                               fs-5"
                                    ></i>

                                </div>


                                <h3
                                    class="font-serif
                                           h5
                                           text-pn-brown"
                                >

                                    Temple Poojas

                                </h3>


                                <p
                                    class="small
                                           text-secondary
                                           mb-0"
                                >

                                    Discover available temple pooja
                                    and booking experiences.

                                </p>

                            </div>

                        </div>

                    </div>


                    <div class="col">

                        <div
                            class="card
                                   border
                                   border-warning-subtle
                                   rounded-4
                                   h-100"
                        >

                            <div class="card-body p-4">

                                <div
                                    class="rounded-circle
                                           d-flex
                                           align-items-center
                                           justify-content-center
                                           bg-pn-cream
                                           text-pn-primary
                                           mb-3"
                                    style="width:54px;height:54px;"
                                >

                                    <i
                                        class="bi bi-images
                                               fs-5"
                                    ></i>

                                </div>


                                <h3
                                    class="font-serif
                                           h5
                                           text-pn-brown"
                                >

                                    Temple Gallery

                                </h3>


                                <p
                                    class="small
                                           text-secondary
                                           mb-0"
                                >

                                    Explore the visual heritage and
                                    sacred spaces of temples.

                                </p>

                            </div>

                        </div>

                    </div>


                    <div class="col">

                        <div
                            class="card
                                   border
                                   border-warning-subtle
                                   rounded-4
                                   h-100"
                        >

                            <div class="card-body p-4">

                                <div
                                    class="rounded-circle
                                           d-flex
                                           align-items-center
                                           justify-content-center
                                           bg-pn-cream
                                           text-pn-primary
                                           mb-3"
                                    style="width:54px;height:54px;"
                                >

                                    <i
                                        class="bi bi-calendar-event
                                               fs-5"
                                    ></i>

                                </div>


                                <h3
                                    class="font-serif
                                           h5
                                           text-pn-brown"
                                >

                                    Temple Events

                                </h3>


                                <p
                                    class="small
                                           text-secondary
                                           mb-0"
                                >

                                    Discover upcoming events and
                                    devotional activities.

                                </p>

                            </div>

                        </div>

                    </div>


                    <div class="col">

                        <div
                            class="card
                                   border
                                   border-warning-subtle
                                   rounded-4
                                   h-100"
                        >

                            <div class="card-body p-4">

                                <div
                                    class="rounded-circle
                                           d-flex
                                           align-items-center
                                           justify-content-center
                                           bg-pn-cream
                                           text-pn-primary
                                           mb-3"
                                    style="width:54px;height:54px;"
                                >

                                    <i
                                        class="bi bi-heart
                                               fs-5"
                                    ></i>

                                </div>


                                <h3
                                    class="font-serif
                                           h5
                                           text-pn-brown"
                                >

                                    Temple Donations

                                </h3>


                                <p
                                    class="small
                                           text-secondary
                                           mb-0"
                                >

                                    Support temples through available
                                    donation opportunities.

                                </p>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- ============================================================
     LOCATION CTA
============================================================ --}}

<section class="py-5 bg-pn-cream">

    <div class="container">

        <div
            class="pn-digital
                   rounded-5
                   overflow-hidden
                   text-white"
        >

            <div
                class="p-4
                       p-md-5
                       text-center"
            >

                <div
                    class="mx-auto
                           rounded-circle
                           d-flex
                           align-items-center
                           justify-content-center
                           bg-warning
                           text-dark
                           mb-4"
                    style="width:72px;height:72px;"
                >

                    <i
                        class="bi bi-geo-alt-fill
                               fs-3"
                    ></i>

                </div>


                <h2
                    class="font-serif
                           display-6"
                >

                    Looking for temples near you?

                </h2>


                <p
                    class="text-white-50
                           col-lg-7
                           mx-auto"
                >

                    Use your location to discover nearby temples
                    and explore available spiritual services.

                </p>


                <button
                    type="button"
                    class="btn
                           btn-warning
                           text-dark
                           fw-semibold
                           px-4"
                >

                    <i
                        class="bi bi-crosshair me-2"
                    ></i>

                    Use My Location

                </button>

            </div>

        </div>

    </div>

</section>


{{-- ============================================================
     FINAL CTA
============================================================ --}}

<section class="py-5">

    <div class="container">

        <div class="text-center">

            <i
                class="bi bi-flower1
                       display-5
                       text-pn-primary"
            ></i>


            <h2
                class="font-serif
                       display-6
                       text-pn-brown
                       mt-3"
            >

                Begin your temple journey.

            </h2>


            <p
                class="text-secondary
                       col-lg-7
                       mx-auto"
            >

                Discover sacred temples, explore devotional services
                and stay connected with your spiritual journey.

            </p>


            <a
                href="#"
                class="btn btn-pn"
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