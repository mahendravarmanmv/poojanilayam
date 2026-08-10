@extends('layouts.app')

@section('title', 'Temple Details | Pooja Nilayam')

@section(
    'meta_description',
    'Explore temple details, poojas, timings, services and devotional experiences at Pooja Nilayam.'
)

@section('content')

@php

    /*
    |--------------------------------------------------------------------------
    | TEMPORARY TEMPLE DATA
    |--------------------------------------------------------------------------
    | These values will later come from the Temple model/controller.
    |--------------------------------------------------------------------------
    */

    $temple = [

        'name' => 'Sri Venkateswara Temple',

        'deity' => 'Lord Venkateswara',

        'location' => 'Tirumala, Andhra Pradesh',

        'address' =>
            'Tirumala Hills, Tirupati, Andhra Pradesh, India',

        'description' =>
            'A sacred destination dedicated to Lord Venkateswara.
             Explore temple services, devotional experiences,
             pooja offerings and other available spiritual services.',

        'image' => 'temple-1.jpg',

        'verified' => true,

        'rating' => '4.9',

        'reviews' => '2,840',

        'established' => 'Traditional Sacred Temple',

        'language' => 'Telugu',

        'status' => 'Active'

    ];


    /*
    |--------------------------------------------------------------------------
    | TEMPLE SERVICES
    |--------------------------------------------------------------------------
    */

    $services = [

        [
            'icon' => 'bi-calendar-check',
            'title' => 'Pooja Booking',
            'text' =>
                'Explore available temple poojas and booking options.'
        ],

        [
            'icon' => 'bi-heart',
            'title' => 'Donations',
            'text' =>
                'Support the temple through available donation services.'
        ],

        [
            'icon' => 'bi-images',
            'title' => 'Temple Gallery',
            'text' =>
                'Explore photos and sacred moments from the temple.'
        ],

        [
            'icon' => 'bi-calendar-event',
            'title' => 'Temple Events',
            'text' =>
                'Discover upcoming devotional events and activities.'
        ]

    ];


    /*
    |--------------------------------------------------------------------------
    | SAMPLE POOJAS
    |--------------------------------------------------------------------------
    */

    $poojas = [

        [
            'name' => 'Suprabhatham Seva',

            'description' =>
                'Begin the day with a traditional devotional experience.',

            'timing' => 'Early Morning',

            'image' => 'pooja-1.jpg'
        ],

        [
            'name' => 'Archana',

            'description' =>
                'A devotional offering performed in the name of devotees.',

            'timing' => 'Morning / Evening',

            'image' => 'pooja-2.jpg'
        ],

        [
            'name' => 'Special Pooja',

            'description' =>
                'Explore available special temple pooja offerings.',

            'timing' => 'As Scheduled',

            'image' => 'pooja-3.jpg'
        ]

    ];


    /*
    |--------------------------------------------------------------------------
    | TEMPLE INFORMATION
    |--------------------------------------------------------------------------
    */

    $information = [

        [
            'icon' => 'bi-geo-alt',
            'title' => 'Location',
            'value' => $temple['location']
        ],

        [
            'icon' => 'bi-translate',
            'title' => 'Language',
            'value' => $temple['language']
        ],

        [
            'icon' => 'bi-check-circle',
            'title' => 'Status',
            'value' => $temple['status']
        ],

        [
            'icon' => 'bi-shield-check',
            'title' => 'Verification',
            'value' => 'Verified Temple'
        ]

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
                        href="{{ route('home') }}"
                        class="text-pn-primary"
                    >
                        Home
                    </a>

                </li>

                <li class="breadcrumb-item">

                    <a
                        href="#"
                        class="text-pn-primary"
                    >
                        Temples
                    </a>

                </li>

                <li
                    class="breadcrumb-item active"
                    aria-current="page"
                >
                    {{ $temple['name'] }}
                </li>

            </ol>

        </nav>

    </div>

</section>


{{-- ============================================================
     TEMPLE HERO
============================================================ --}}

<section class="bg-pn-cream">

    <div class="container py-4 py-lg-5">

        <div
            class="row
                   g-4
                   align-items-center"
        >

            {{-- Temple Image --}}

            <div class="col-12 col-lg-6">

                <div
                    class="position-relative
                           rounded-5
                           overflow-hidden"
                >

                    <img
                        src="{{ asset('images/temples/' . $temple['image']) }}"
                        class="img-fluid
                               w-100
                               object-fit-cover"
                        style="height:420px;"
                        alt="{{ $temple['name'] }}"
                        loading="eager"
                    >


                    {{-- Verified Badge --}}

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

                            Verified Temple

                        </span>

                    @endif


                    {{-- Favorite --}}

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
                        style="width:46px;height:46px;"
                        aria-label="Add temple to wishlist"
                    >

                        <i class="bi bi-heart"></i>

                    </button>


                    {{-- Status --}}

                    <span
                        class="position-absolute
                               bottom-0
                               start-0
                               m-3
                               badge
                               rounded-pill
                               bg-dark
                               bg-opacity-75
                               px-3
                               py-2"
                    >

                        <i
                            class="bi bi-circle-fill
                                   text-success
                                   me-1"
                            style="font-size:7px;"
                        ></i>

                        {{ $temple['status'] }}

                    </span>

                </div>

            </div>


            {{-- Temple Information --}}

            <div class="col-12 col-lg-6">

                <span
                    class="small
                           text-pn-gold
                           fw-semibold
                           text-uppercase"
                >
                    Sacred Temple
                </span>


                <h1
                    class="font-serif
                           display-4
                           text-pn-brown
                           mt-2
                           mb-2"
                >

                    {{ $temple['name'] }}

                </h1>


                <div
                    class="d-flex
                           flex-wrap
                           align-items-center
                           gap-2
                           mb-3"
                >

                    <span
                        class="text-pn-primary
                               fw-semibold"
                    >

                        {{ $temple['deity'] }}

                    </span>


                    <span
                        class="text-secondary"
                    >
                        ·
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

                        <span class="text-muted">
                            ({{ $temple['reviews'] }})
                        </span>

                    </span>

                </div>


                <p
                    class="text-secondary
                           lead
                           mb-4"
                >

                    {{ $temple['description'] }}

                </p>


                <div
                    class="d-flex
                           align-items-start
                           gap-3
                           mb-4"
                >

                    <div
                        class="rounded-circle
                               d-flex
                               align-items-center
                               justify-content-center
                               bg-pn-beige
                               text-pn-primary
                               flex-shrink-0"
                        style="width:48px;height:48px;"
                    >

                        <i class="bi bi-geo-alt"></i>

                    </div>


                    <div>

                        <small
                            class="text-secondary
                                   d-block"
                        >
                            Location
                        </small>


                        <strong
                            class="text-pn-brown"
                        >

                            {{ $temple['location'] }}

                        </strong>


                        <p
                            class="small
                                   text-secondary
                                   mb-0
                                   mt-1"
                        >

                            {{ $temple['address'] }}

                        </p>

                    </div>

                </div>


                <div
                    class="d-flex
                           flex-column
                           flex-sm-row
                           gap-2"
                >

                    <a
                        href="#poojas"
                        class="btn
                               btn-pn
                               btn-lg
                               px-4"
                    >

                        Explore Poojas

                        <i
                            class="bi bi-arrow-right ms-2"
                        ></i>

                    </a>


                    <a
                        href="#temple-info"
                        class="btn
                               btn-pn-outline
                               btn-lg
                               px-4"
                    >

                        Temple Information

                    </a>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- ============================================================
     QUICK INFORMATION
============================================================ --}}

<section class="py-4 bg-white border-bottom">

    <div class="container">

        <div
            class="row
                   row-cols-2
                   row-cols-md-4
                   g-3"
        >

            @foreach($information as $item)

                <div class="col">

                    <div
                        class="d-flex
                               align-items-center
                               gap-3
                               p-3
                               h-100"
                    >

                        <div
                            class="rounded-circle
                                   d-flex
                                   align-items-center
                                   justify-content-center
                                   bg-pn-cream
                                   text-pn-primary
                                   flex-shrink-0"
                            style="width:48px;height:48px;"
                        >

                            <i
                                class="bi {{ $item['icon'] }}"
                            ></i>

                        </div>


                        <div
                            class="min-w-0"
                        >

                            <small
                                class="text-secondary
                                       d-block"
                            >

                                {{ $item['title'] }}

                            </small>


                            <strong
                                class="small
                                       text-pn-brown"
                            >

                                {{ $item['value'] }}

                            </strong>

                        </div>

                    </div>

                </div>

            @endforeach

        </div>

    </div>

</section>


{{-- ============================================================
     TEMPLE ABOUT
============================================================ --}}

<section
    id="temple-info"
    class="py-5"
>

    <div class="container">

        <div
            class="row
                   g-5
                   align-items-start"
        >

            <div class="col-12 col-lg-7">

                <span
                    class="small
                           text-pn-gold
                           fw-semibold
                           text-uppercase"
                >
                    About the Temple
                </span>


                <h2
                    class="font-serif
                           display-6
                           text-pn-brown
                           mt-2
                           mb-3"
                >

                    A place for devotion and spiritual connection.

                </h2>


                <div
                    class="pn-divider
                           mb-4"
                ></div>


                <p
                    class="text-secondary"
                >

                    {{ $temple['description'] }}

                </p>


                <p
                    class="text-secondary"
                >

                    Through Pooja Nilayam, devotees can discover
                    available temple services, explore devotional
                    offerings and access relevant temple information
                    from one place.

                </p>


                <p
                    class="text-secondary
                           mb-0"
                >

                    Temple service availability, booking options,
                    schedules and other information will be maintained
                    through the temple management system.

                </p>

            </div>


            <div class="col-12 col-lg-5">

                <div
                    class="card
                           border
                           border-warning-subtle
                           rounded-5
                           bg-pn-cream"
                >

                    <div class="card-body p-4 p-md-5">

                        <span
                            class="small
                                   text-pn-gold
                                   fw-semibold
                                   text-uppercase"
                        >
                            Temple Information
                        </span>


                        <h3
                            class="font-serif
                                   h3
                                   text-pn-brown
                                   mt-2
                                   mb-4"
                        >

                            At a glance

                        </h3>


                        <div class="vstack gap-3">

                            <div
                                class="d-flex
                                       justify-content-between
                                       gap-3"
                            >

                                <span
                                    class="small
                                           text-secondary"
                                >
                                    Deity
                                </span>


                                <strong
                                    class="small
                                           text-end
                                           text-pn-brown"
                                >
                                    {{ $temple['deity'] }}
                                </strong>

                            </div>


                            <div
                                class="d-flex
                                       justify-content-between
                                       gap-3"
                            >

                                <span
                                    class="small
                                           text-secondary"
                                >
                                    Location
                                </span>


                                <strong
                                    class="small
                                           text-end
                                           text-pn-brown"
                                >
                                    {{ $temple['location'] }}
                                </strong>

                            </div>


                            <div
                                class="d-flex
                                       justify-content-between
                                       gap-3"
                            >

                                <span
                                    class="small
                                           text-secondary"
                                >
                                    Language
                                </span>


                                <strong
                                    class="small
                                           text-end
                                           text-pn-brown"
                                >
                                    {{ $temple['language'] }}
                                </strong>

                            </div>


                            <div
                                class="d-flex
                                       justify-content-between
                                       gap-3"
                            >

                                <span
                                    class="small
                                           text-secondary"
                                >
                                    Verification
                                </span>


                                <span
                                    class="badge
                                           rounded-pill
                                           bg-success-subtle
                                           text-success-emphasis"
                                >

                                    <i
                                        class="bi bi-check-circle-fill me-1"
                                    ></i>

                                    Verified

                                </span>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- ============================================================
     TEMPLE SERVICES
============================================================ --}}

<section class="py-5 bg-light-subtle">

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
                Temple Services
            </span>


            <h2
                class="font-serif
                       display-6
                       text-pn-brown
                       mt-2"
            >

                Explore available temple experiences.

            </h2>


            <div
                class="pn-divider
                       mx-auto
                       my-3"
            ></div>

        </div>


        <div
            class="row
                   row-cols-1
                   row-cols-sm-2
                   row-cols-lg-4
                   g-4"
        >

            @foreach($services as $service)

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
                                       fs-5
                                       mb-3"
                                style="width:58px;height:58px;"
                            >

                                <i
                                    class="bi {{ $service['icon'] }}"
                                ></i>

                            </div>


                            <h3
                                class="font-serif
                                       h5
                                       text-pn-brown"
                            >

                                {{ $service['title'] }}

                            </h3>


                            <p
                                class="small
                                       text-secondary
                                       mb-3"
                            >

                                {{ $service['text'] }}

                            </p>


                            <a
                                href="#"
                                class="small
                                       text-pn-primary
                                       fw-semibold
                                       text-decoration-none"
                            >

                                Explore

                                <i
                                    class="bi bi-arrow-right ms-1"
                                ></i>

                            </a>

                        </div>

                    </div>

                </div>

            @endforeach

        </div>

    </div>

</section>


{{-- ============================================================
     POOJAS
============================================================ --}}

<section
    id="poojas"
    class="py-5"
>

    <div class="container">

        <div
            class="d-flex
                   flex-column
                   flex-md-row
                   align-items-md-end
                   justify-content-between
                   gap-3
                   mb-5"
        >

            <div>

                <span
                    class="small
                           text-pn-gold
                           fw-semibold
                           text-uppercase"
                >
                    Temple Poojas
                </span>


                <h2
                    class="font-serif
                           display-6
                           text-pn-brown
                           mt-2
                           mb-0"
                >

                    Available Pooja Services

                </h2>

            </div>


            <a
                href="#"
                class="btn
                       btn-pn-outline"
            >

                View All Poojas

                <i
                    class="bi bi-arrow-right ms-2"
                ></i>

            </a>

        </div>


        <div
            class="row
                   row-cols-1
                   row-cols-md-2
                   row-cols-xl-3
                   g-4"
        >

            @foreach($poojas as $pooja)

                <div class="col">

                    <article
                        class="card
                               border
                               border-warning-subtle
                               rounded-5
                               overflow-hidden
                               h-100"
                    >

                        <img
                            src="{{ asset('images/poojas/' . $pooja['image']) }}"
                            class="card-img-top
                                   object-fit-cover"
                            style="height:220px;"
                            alt="{{ $pooja['name'] }}"
                            loading="lazy"
                        >


                        <div class="card-body p-4">

                            <span
                                class="badge
                                       rounded-pill
                                       bg-pn-cream
                                       text-pn-brown
                                       mb-3"
                            >

                                {{ $pooja['timing'] }}

                            </span>


                            <h3
                                class="font-serif
                                       h4
                                       text-pn-brown"
                            >

                                {{ $pooja['name'] }}

                            </h3>


                            <p
                                class="small
                                       text-secondary"
                            >

                                {{ $pooja['description'] }}

                            </p>


                            <a
                                href="#"
                                class="btn
                                       btn-pn
                                       w-100
                                       mt-2"
                            >

                                View Pooja

                                <i
                                    class="bi bi-arrow-right ms-2"
                                ></i>

                            </a>

                        </div>

                    </article>

                </div>

            @endforeach

        </div>

    </div>

</section>


{{-- ============================================================
     TEMPLE LOCATION
============================================================ --}}

<section class="py-5 bg-pn-cream">

    <div class="container">

        <div
            class="row
                   g-4
                   align-items-stretch"
        >

            <div class="col-12 col-lg-7">

                <div
                    class="card
                           border-0
                           rounded-5
                           overflow-hidden
                           h-100
                           bg-dark"
                >

                    <div
                        class="ratio ratio-16x9"
                    >

                        <div
                            class="d-flex
                                   align-items-center
                                   justify-content-center
                                   text-white
                                   text-center
                                   p-4"
                        >

                            <div>

                                <i
                                    class="bi bi-map
                                           display-4
                                           text-warning"
                                ></i>


                                <h2
                                    class="font-serif
                                           h3
                                           mt-3"
                                >

                                    Temple Location

                                </h2>


                                <p
                                    class="small
                                           text-white-50
                                           mb-0"
                                >

                                    Map integration can be connected
                                    during the backend/API integration.

                                </p>

                            </div>

                        </div>

                    </div>

                </div>

            </div>


            <div class="col-12 col-lg-5">

                <div
                    class="card
                           border
                           border-warning-subtle
                           rounded-5
                           h-100"
                >

                    <div class="card-body p-4 p-md-5">

                        <span
                            class="small
                                   text-pn-gold
                                   fw-semibold
                                   text-uppercase"
                        >
                            Visit
                        </span>


                        <h2
                            class="font-serif
                                   display-6
                                   text-pn-brown
                                   mt-2
                                   mb-3"
                        >

                            Find the Temple

                        </h2>


                        <div
                            class="d-flex
                                   align-items-start
                                   gap-3
                                   mb-4"
                        >

                            <i
                                class="bi bi-geo-alt-fill
                                       text-pn-primary
                                       fs-4"
                            ></i>


                            <div>

                                <strong
                                    class="text-pn-brown
                                           d-block"
                                >

                                    {{ $temple['name'] }}

                                </strong>


                                <small
                                    class="text-secondary"
                                >

                                    {{ $temple['address'] }}

                                </small>

                            </div>

                        </div>


                        <a
                            href="#"
                            class="btn
                                   btn-pn
                                   w-100"
                        >

                            <i
                                class="bi bi-map me-2"
                            ></i>

                            Get Directions

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- ============================================================
     RELATED TEMPLE FEATURES
============================================================ --}}

<section class="py-5">

    <div class="container">

        <div
            class="row
                   row-cols-1
                   row-cols-md-3
                   g-4"
        >

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

                    <div class="card-body p-4">

                        <i
                            class="bi bi-images
                                   fs-3
                                   text-pn-primary"
                        ></i>


                        <h3
                            class="font-serif
                                   h5
                                   text-pn-brown
                                   mt-3"
                        >

                            Temple Gallery

                        </h3>


                        <p
                            class="small
                                   text-secondary
                                   mb-0"
                        >

                            Explore photos and sacred moments
                            from this temple.

                        </p>


                        <span
                            class="small
                                   text-pn-primary
                                   fw-semibold
                                   d-block
                                   mt-3"
                        >

                            View Gallery

                            <i
                                class="bi bi-arrow-right ms-1"
                            ></i>

                        </span>

                    </div>

                </a>

            </div>


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

                    <div class="card-body p-4">

                        <i
                            class="bi bi-calendar-event
                                   fs-3
                                   text-pn-primary"
                        ></i>


                        <h3
                            class="font-serif
                                   h5
                                   text-pn-brown
                                   mt-3"
                        >

                            Temple Events

                        </h3>


                        <p
                            class="small
                                   text-secondary
                                   mb-0"
                        >

                            Discover upcoming temple events
                            and devotional activities.

                        </p>


                        <span
                            class="small
                                   text-pn-primary
                                   fw-semibold
                                   d-block
                                   mt-3"
                        >

                            View Events

                            <i
                                class="bi bi-arrow-right ms-1"
                            ></i>

                        </span>

                    </div>

                </a>

            </div>


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

                    <div class="card-body p-4">

                        <i
                            class="bi bi-heart
                                   fs-3
                                   text-pn-primary"
                        ></i>


                        <h3
                            class="font-serif
                                   h5
                                   text-pn-brown
                                   mt-3"
                        >

                            Support Temple

                        </h3>


                        <p
                            class="small
                                   text-secondary
                                   mb-0"
                        >

                            Explore available temple donation
                            opportunities.

                        </p>


                        <span
                            class="small
                                   text-pn-primary
                                   fw-semibold
                                   d-block
                                   mt-3"
                        >

                            Donate

                            <i
                                class="bi bi-arrow-right ms-1"
                            ></i>

                        </span>

                    </div>

                </a>

            </div>

        </div>

    </div>

</section>


{{-- ============================================================
     FINAL CTA
============================================================ --}}

<section class="py-5">

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

                    Begin your temple experience.

                </h2>


                <p
                    class="text-white-50
                           col-lg-7
                           mx-auto"
                >

                    Explore available Poojas and devotional services
                    associated with this sacred temple.

                </p>


                <div
                    class="d-flex
                           flex-column
                           flex-sm-row
                           justify-content-center
                           gap-2"
                >

                    <a
                        href="#poojas"
                        class="btn
                               btn-warning
                               text-dark
                               fw-semibold
                               px-4"
                    >

                        Explore Poojas

                        <i
                            class="bi bi-arrow-right ms-2"
                        ></i>

                    </a>


                    <a
                        href="#"
                        class="btn
                               btn-outline-light
                               px-4"
                    >

                        View Gallery

                    </a>

                </div>

            </div>

        </div>

    </div>

</section>

@endsection