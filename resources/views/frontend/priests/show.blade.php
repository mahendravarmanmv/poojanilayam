@extends('layouts.app')

@section('title', 'Priest Details | Pooja Nilayam')

@section(
    'meta_description',
    'View priest profile, experience, languages, specializations, availability and booking options on Pooja Nilayam.'
)

@section('content')

@php

    /*
    |--------------------------------------------------------------------------
    | TEMPORARY PRIEST DATA
    |--------------------------------------------------------------------------
    | These values will later come from the Priest model/controller.
    |--------------------------------------------------------------------------
    */

    $priest = [

        'name' => 'Sri Ananda Sharma',

        'title' => 'Vedic Priest',

        'location' => 'Hyderabad, Telangana',

        'experience' => '18+ Years',

        'languages' => [
            'Telugu',
            'Sanskrit',
            'English'
        ],

        'specializations' => [
            'Vedic Poojas',
            'Griha Pravesh',
            'Homam',
            'Abhishekam',
            'Traditional Rituals'
        ],

        'rating' => '4.9',

        'reviews' => '428',

        'image' => 'priest-1.jpg',

        'verified' => true,

        'available' => true,

        'price_from' => '₹1,500',

        'temple' => 'Sri Venkateswara Temple',

        'temple_location' => 'Hyderabad, Telangana',

        'live_available' => true,

        'recording_available' => true,

        'prasadam_available' => true,

        'bio' =>
            'An experienced Vedic priest with extensive knowledge
             of traditional poojas, homams and devotional rituals.
             Available for selected spiritual services and
             traditional ceremonies.',

        'qualification' => 'Vedic Studies',

        'availability' => 'Available for selected dates',

        'member_since' => '2024'

    ];


    /*
    |--------------------------------------------------------------------------
    | SAMPLE AVAILABLE SLOTS
    |--------------------------------------------------------------------------
    */

    $slots = [

        [
            'date' => '18',
            'month' => 'Aug',
            'day' => 'Tuesday',
            'slots' => [
                '07:00 AM',
                '10:00 AM',
                '06:00 PM'
            ]
        ],

        [
            'date' => '19',
            'month' => 'Aug',
            'day' => 'Wednesday',
            'slots' => [
                '08:00 AM',
                '11:00 AM',
                '05:30 PM'
            ]
        ],

        [
            'date' => '20',
            'month' => 'Aug',
            'day' => 'Thursday',
            'slots' => [
                '07:30 AM',
                '04:00 PM',
                '06:30 PM'
            ]
        ]

    ];


    /*
    |--------------------------------------------------------------------------
    | SAMPLE SERVICES
    |--------------------------------------------------------------------------
    */

    $services = [

        [
            'title' => 'Vedic Poojas',
            'icon' => 'bi-flower1',
            'description' =>
                'Traditional poojas performed according to
                 the prescribed rituals.'
        ],

        [
            'title' => 'Homam',
            'icon' => 'bi-fire',
            'description' =>
                'Sacred fire rituals for selected devotional
                 and spiritual purposes.'
        ],

        [
            'title' => 'Griha Pravesh',
            'icon' => 'bi-house-heart',
            'description' =>
                'Traditional housewarming rituals and ceremonies.'
        ],

        [
            'title' => 'Abhishekam',
            'icon' => 'bi-droplet',
            'description' =>
                'Devotional Abhishekam services for selected deities.'
        ]

    ];


    /*
    |--------------------------------------------------------------------------
    | SAMPLE REVIEWS
    |--------------------------------------------------------------------------
    */

    $reviews = [

        [
            'name' => 'Srinivas R.',
            'rating' => '5.0',
            'date' => '2 weeks ago',
            'text' =>
                'Very professional and explained the pooja
                 process clearly. The overall experience was
                 peaceful and well organized.'
        ],

        [
            'name' => 'Lakshmi K.',
            'rating' => '5.0',
            'date' => '1 month ago',
            'text' =>
                'We were very happy with the traditional
                 arrangements and the way the ceremony was
                 conducted.'
        ],

        [
            'name' => 'Ramesh V.',
            'rating' => '4.8',
            'date' => '2 months ago',
            'text' =>
                'Good experience. The priest was knowledgeable
                 and punctual.'
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
                        href="{{ url('/') }}"
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
                        Priests
                    </a>

                </li>


                <li
                    class="breadcrumb-item active"
                    aria-current="page"
                >
                    {{ $priest['name'] }}
                </li>

            </ol>

        </nav>

    </div>

</section>


{{-- ============================================================
     PRIEST HERO / PROFILE
============================================================ --}}

<section class="bg-pn-cream py-4 py-lg-5">

    <div class="container">

        <div
            class="row
                   g-4
                   align-items-center"
        >

            {{-- =================================================
                 PROFILE IMAGE
            ================================================== --}}

            <div class="col-12 col-lg-5">

                <div
                    class="position-relative
                           rounded-5
                           overflow-hidden"
                >

                    <img
                        src="{{ asset('images/priests/' . $priest['image']) }}"
                        class="img-fluid
                               w-100
                               object-fit-cover"
                        style="height:460px;"
                        alt="{{ $priest['name'] }}"
                        loading="eager"
                    >


                    {{-- Verified Badge --}}

                    @if($priest['verified'])

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

                            Verified Priest

                        </span>

                    @endif


                    {{-- Availability --}}

                    <span
                        class="position-absolute
                               bottom-0
                               start-0
                               m-3
                               badge
                               rounded-pill
                               bg-success"
                    >

                        <i
                            class="bi bi-circle-fill me-1"
                            style="font-size:7px;"
                        ></i>

                        {{ $priest['available']
                            ? 'Available'
                            : 'Currently Unavailable' }}

                    </span>


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
                        aria-label="Add priest to wishlist"
                    >

                        <i class="bi bi-heart"></i>

                    </button>

                </div>

            </div>


            {{-- =================================================
                 PROFILE DETAILS
            ================================================== --}}

            <div class="col-12 col-lg-7">

                <span
                    class="small
                           text-pn-gold
                           fw-semibold
                           text-uppercase"
                >
                    Priest Profile
                </span>


                <h1
                    class="font-serif
                           display-4
                           text-pn-brown
                           mt-2
                           mb-2"
                >

                    {{ $priest['name'] }}

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

                        {{ $priest['title'] }}

                    </span>


                    <span class="text-secondary">
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

                        {{ $priest['rating'] }}

                        <span class="text-muted">

                            ({{ $priest['reviews'] }} reviews)

                        </span>

                    </span>

                </div>


                <div
                    class="d-flex
                           align-items-center
                           gap-2
                           mb-4"
                >

                    <i
                        class="bi bi-geo-alt
                               text-pn-primary"
                    ></i>


                    <span
                        class="text-secondary"
                    >

                        {{ $priest['location'] }}

                    </span>

                </div>


                <p
                    class="lead
                           text-secondary
                           mb-4"
                >

                    {{ $priest['bio'] }}

                </p>


                {{-- Experience --}}

                <div
                    class="d-flex
                           flex-wrap
                           gap-2
                           mb-4"
                >

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

                        <i
                            class="bi bi-award
                                   text-pn-primary
                                   me-1"
                        ></i>

                        {{ $priest['experience'] }}

                    </span>


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

                        <i
                            class="bi bi-mortarboard
                                   text-pn-primary
                                   me-1"
                        ></i>

                        {{ $priest['qualification'] }}

                    </span>

                </div>


                {{-- Languages --}}

                <div
                    class="mb-4"
                >

                    <small
                        class="text-secondary
                               d-block
                               mb-2"
                    >

                        Languages Known

                    </small>


                    <div
                        class="d-flex
                               flex-wrap
                               gap-2"
                    >

                        @foreach($priest['languages'] as $language)

                            <span
                                class="badge
                                       rounded-pill
                                       bg-white
                                       text-pn-brown
                                       border
                                       border-warning-subtle
                                       px-3
                                       py-2"
                            >

                                {{ $language }}

                            </span>

                        @endforeach

                    </div>

                </div>


                {{-- Specializations --}}

                <div
                    class="mb-4"
                >

                    <small
                        class="text-secondary
                               d-block
                               mb-2"
                    >

                        Specializations

                    </small>


                    <div
                        class="d-flex
                               flex-wrap
                               gap-2"
                    >

                        @foreach(
                            $priest['specializations']
                            as $specialization
                        )

                            <span
                                class="badge
                                       rounded-pill
                                       bg-white
                                       text-pn-brown
                                       border
                                       border-warning-subtle
                                       px-3
                                       py-2"
                            >

                                {{ $specialization }}

                            </span>

                        @endforeach

                    </div>

                </div>


                {{-- CTA --}}

                <div
                    class="d-flex
                           flex-column
                           flex-sm-row
                           gap-2"
                >

                    <a
                        href="#availability"
                        class="btn
                               btn-pn
                               btn-lg
                               px-4"
                    >

                        Check Availability

                        <i
                            class="bi bi-calendar-check ms-2"
                        ></i>

                    </a>


                    <a
                        href="#services"
                        class="btn
                               btn-pn-outline
                               btn-lg
                               px-4"
                    >

                        View Services

                    </a>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- ============================================================
     QUICK PRIEST INFORMATION
============================================================ --}}

<section class="py-4 bg-white border-bottom">

    <div class="container">

        <div
            class="row
                   row-cols-2
                   row-cols-md-4
                   g-3"
        >

            {{-- Price --}}

            <div class="col">

                <div
                    class="p-3
                           text-center
                           h-100"
                >

                    <i
                        class="bi bi-currency-rupee
                               text-pn-primary
                               fs-4"
                    ></i>


                    <small
                        class="d-block
                               text-secondary
                               mt-2"
                    >

                        Starting From

                    </small>


                    <strong
                        class="text-pn-brown"
                    >

                        {{ $priest['price_from'] }}

                    </strong>

                </div>

            </div>


            {{-- Experience --}}

            <div class="col">

                <div
                    class="p-3
                           text-center
                           h-100"
                >

                    <i
                        class="bi bi-award
                               text-pn-primary
                               fs-4"
                    ></i>


                    <small
                        class="d-block
                               text-secondary
                               mt-2"
                    >

                        Experience

                    </small>


                    <strong
                        class="text-pn-brown"
                    >

                        {{ $priest['experience'] }}

                    </strong>

                </div>

            </div>


            {{-- Rating --}}

            <div class="col">

                <div
                    class="p-3
                           text-center
                           h-100"
                >

                    <i
                        class="bi bi-star-fill
                               text-warning
                               fs-4"
                    ></i>


                    <small
                        class="d-block
                               text-secondary
                               mt-2"
                    >

                        Rating

                    </small>


                    <strong
                        class="text-pn-brown"
                    >

                        {{ $priest['rating'] }}

                    </strong>

                </div>

            </div>


            {{-- Availability --}}

            <div class="col">

                <div
                    class="p-3
                           text-center
                           h-100"
                >

                    <i
                        class="bi bi-calendar-check
                               text-pn-primary
                               fs-4"
                    ></i>


                    <small
                        class="d-block
                               text-secondary
                               mt-2"
                    >

                        Availability

                    </small>


                    <strong
                        class="text-pn-brown"
                    >

                        Available

                    </strong>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- ============================================================
     ABOUT PRIEST
============================================================ --}}

<section class="py-5">

    <div class="container">

        <div
            class="row
                   g-5"
        >

            <div class="col-12 col-lg-7">

                <span
                    class="small
                           text-pn-gold
                           fw-semibold
                           text-uppercase"
                >
                    About the Priest
                </span>


                <h2
                    class="font-serif
                           display-6
                           text-pn-brown
                           mt-2
                           mb-3"
                >

                    Traditional knowledge with a devotional approach.

                </h2>


                <div
                    class="pn-divider
                           mb-4"
                ></div>


                <p
                    class="text-secondary"
                >

                    {{ $priest['bio'] }}

                </p>


                <p
                    class="text-secondary"
                >

                    The priest profile can be used to review
                    experience, languages, specialization and
                    available services before proceeding with
                    a booking.

                </p>


                <div
                    class="row
                           row-cols-1
                           row-cols-sm-2
                           g-3
                           mt-3"
                >

                    <div class="col">

                        <div
                            class="border
                                   border-warning-subtle
                                   rounded-4
                                   p-4
                                   h-100"
                        >

                            <i
                                class="bi bi-award
                                       fs-4
                                       text-pn-primary"
                            ></i>


                            <h3
                                class="font-serif
                                       h5
                                       text-pn-brown
                                       mt-3"
                            >

                                Experience

                            </h3>


                            <p
                                class="small
                                       text-secondary
                                       mb-0"
                            >

                                {{ $priest['experience'] }}
                                of traditional ritual experience.

                            </p>

                        </div>

                    </div>


                    <div class="col">

                        <div
                            class="border
                                   border-warning-subtle
                                   rounded-4
                                   p-4
                                   h-100"
                        >

                            <i
                                class="bi bi-translate
                                       fs-4
                                       text-pn-primary"
                            ></i>


                            <h3
                                class="font-serif
                                       h5
                                       text-pn-brown
                                       mt-3"
                            >

                                Languages

                            </h3>


                            <p
                                class="small
                                       text-secondary
                                       mb-0"
                            >

                                {{ implode(
                                    ', ',
                                    $priest['languages']
                                ) }}

                            </p>

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
                           bg-pn-cream
                           h-100"
                >

                    <div class="card-body p-4 p-md-5">

                        <span
                            class="small
                                   text-pn-gold
                                   fw-semibold
                                   text-uppercase"
                        >
                            Associated Temple
                        </span>


                        <h3
                            class="font-serif
                                   h3
                                   text-pn-brown
                                   mt-2
                                   mb-3"
                        >

                            {{ $priest['temple'] }}

                        </h3>


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
                                       bg-white
                                       text-pn-primary
                                       flex-shrink-0"
                                style="width:48px;height:48px;"
                            >

                                <i class="bi bi-bank"></i>

                            </div>


                            <div>

                                <small
                                    class="text-secondary
                                           d-block"
                                >
                                    Temple Location
                                </small>


                                <strong
                                    class="text-pn-brown"
                                >

                                    {{ $priest['temple_location'] }}

                                </strong>

                            </div>

                        </div>


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

                </div>

            </div>

        </div>

    </div>

</section>


{{-- ============================================================
     AVAILABLE SERVICES
============================================================ --}}

<section
    id="services"
    class="py-5 bg-light-subtle"
>

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
                Priest Services
            </span>


            <h2
                class="font-serif
                       display-6
                       text-pn-brown
                       mt-2"
            >

                Services & Specializations

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
                                       mb-0"
                            >

                                {{ $service['description'] }}

                            </p>

                        </div>

                    </div>

                </div>

            @endforeach

        </div>

    </div>

</section>


{{-- ============================================================
     SERVICE AVAILABILITY FEATURES
============================================================ --}}

<section class="py-5">

    <div class="container">

        <div
            class="row
                   g-4
                   align-items-center"
        >

            <div class="col-12 col-lg-5">

                <span
                    class="small
                           text-pn-gold
                           fw-semibold
                           text-uppercase"
                >
                    Service Options
                </span>


                <h2
                    class="font-serif
                           display-6
                           text-pn-brown
                           mt-2
                           mb-3"
                >

                    Choose the experience that works for you.

                </h2>


                <div
                    class="pn-divider
                           mb-4"
                ></div>


                <p
                    class="text-secondary"
                >

                    Availability of individual options depends on
                    the selected service and booking arrangement.

                </p>

            </div>


            <div class="col-12 col-lg-7">

                <div
                    class="row
                           row-cols-1
                           row-cols-sm-2
                           g-3"
                >

                    {{-- Live --}}

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
                                    class="d-flex
                                           align-items-center
                                           justify-content-between
                                           gap-3
                                           mb-3"
                                >

                                    <div
                                        class="rounded-circle
                                               d-flex
                                               align-items-center
                                               justify-content-center
                                               bg-pn-cream
                                               text-pn-primary"
                                        style="width:52px;height:52px;"
                                    >

                                        <i
                                            class="bi bi-camera-video"
                                        ></i>

                                    </div>


                                    <span
                                        class="badge
                                               rounded-pill
                                               bg-success-subtle
                                               text-success-emphasis"
                                    >

                                        {{ $priest['live_available']
                                            ? 'Available'
                                            : 'Unavailable' }}

                                    </span>

                                </div>


                                <h3
                                    class="font-serif
                                           h5
                                           text-pn-brown"
                                >

                                    Live Available

                                </h3>


                                <p
                                    class="small
                                           text-secondary
                                           mb-0"
                                >

                                    Live service availability can
                                    be offered where supported.

                                </p>

                            </div>

                        </div>

                    </div>


                    {{-- Recording --}}

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
                                    class="d-flex
                                           align-items-center
                                           justify-content-between
                                           gap-3
                                           mb-3"
                                >

                                    <div
                                        class="rounded-circle
                                               d-flex
                                               align-items-center
                                               justify-content-center
                                               bg-pn-cream
                                               text-pn-primary"
                                        style="width:52px;height:52px;"
                                    >

                                        <i
                                            class="bi bi-camera-reels"
                                        ></i>

                                    </div>


                                    <span
                                        class="badge
                                               rounded-pill
                                               bg-success-subtle
                                               text-success-emphasis"
                                    >

                                        {{ $priest['recording_available']
                                            ? 'Available'
                                            : 'Unavailable' }}

                                    </span>

                                </div>


                                <h3
                                    class="font-serif
                                           h5
                                           text-pn-brown"
                                >

                                    Recording Available

                                </h3>


                                <p
                                    class="small
                                           text-secondary
                                           mb-0"
                                >

                                    Recording options can be
                                    provided where supported.

                                </p>

                            </div>

                        </div>

                    </div>


                    {{-- Prasadam --}}

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
                                    class="d-flex
                                           align-items-center
                                           justify-content-between
                                           gap-3
                                           mb-3"
                                >

                                    <div
                                        class="rounded-circle
                                               d-flex
                                               align-items-center
                                               justify-content-center
                                               bg-pn-cream
                                               text-pn-primary"
                                        style="width:52px;height:52px;"
                                    >

                                        <i
                                            class="bi bi-box-seam"
                                        ></i>

                                    </div>


                                    <span
                                        class="badge
                                               rounded-pill
                                               bg-success-subtle
                                               text-success-emphasis"
                                    >

                                        {{ $priest['prasadam_available']
                                            ? 'Available'
                                            : 'Unavailable' }}

                                    </span>

                                </div>


                                <h3
                                    class="font-serif
                                           h5
                                           text-pn-brown"
                                >

                                    Prasadam Available

                                </h3>


                                <p
                                    class="small
                                           text-secondary
                                           mb-0"
                                >

                                    Prasadam availability can be
                                    shown for applicable bookings.

                                </p>

                            </div>

                        </div>

                    </div>


                    {{-- Verified --}}

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
                                    class="d-flex
                                           align-items-center
                                           justify-content-between
                                           gap-3
                                           mb-3"
                                >

                                    <div
                                        class="rounded-circle
                                               d-flex
                                               align-items-center
                                               justify-content-center
                                               bg-pn-cream
                                               text-pn-primary"
                                        style="width:52px;height:52px;"
                                    >

                                        <i
                                            class="bi bi-patch-check"
                                        ></i>

                                    </div>


                                    <span
                                        class="badge
                                               rounded-pill
                                               bg-success-subtle
                                               text-success-emphasis"
                                    >

                                        Verified

                                    </span>

                                </div>


                                <h3
                                    class="font-serif
                                           h5
                                           text-pn-brown"
                                >

                                    Verified Profile

                                </h3>


                                <p
                                    class="small
                                           text-secondary
                                           mb-0"
                                >

                                    Priest profiles are subject
                                    to the platform's verification
                                    and approval process.

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
     AVAILABILITY
============================================================ --}}

<section
    id="availability"
    class="py-5 bg-pn-cream"
>

    <div class="container">

        <div
            class="row
                   g-4
                   align-items-start"
        >

            <div class="col-12 col-lg-7">

                <span
                    class="small
                           text-pn-gold
                           fw-semibold
                           text-uppercase"
                >
                    Availability
                </span>


                <h2
                    class="font-serif
                           display-6
                           text-pn-brown
                           mt-2
                           mb-3"
                >

                    Choose a suitable date and time.

                </h2>


                <p
                    class="text-secondary"
                >

                    Select from the available slots below.
                    Final availability will be validated when
                    the booking is processed.

                </p>


                {{-- Dates --}}

                <div
                    class="row
                           row-cols-3
                           g-2
                           mb-4"
                >

                    @foreach($slots as $index => $slot)

                        <div class="col">

                            <button
                                type="button"
                                class="btn
                                       {{ $index === 0
                                            ? 'btn-pn'
                                            : 'btn-pn-outline' }}
                                       w-100
                                       py-3"
                            >

                                <strong
                                    class="d-block
                                           fs-5"
                                >

                                    {{ $slot['date'] }}

                                </strong>


                                <small>

                                    {{ $slot['month'] }}

                                </small>


                                <small
                                    class="d-block"
                                >

                                    {{ $slot['day'] }}

                                </small>

                            </button>

                        </div>

                    @endforeach

                </div>


                {{-- Time Slots --}}

                <div>

                    <h3
                        class="font-serif
                               h5
                               text-pn-brown
                               mb-3"
                    >

                        Available Time Slots

                    </h3>


                    <div
                        class="d-flex
                               flex-wrap
                               gap-2"
                    >

                        @foreach($slots[0]['slots'] as $index => $time)

                            <button
                                type="button"
                                class="btn
                                       {{ $index === 0
                                            ? 'btn-pn'
                                            : 'btn-pn-outline' }}"
                            >

                                <i
                                    class="bi bi-clock me-1"
                                ></i>

                                {{ $time }}

                            </button>

                        @endforeach

                    </div>

                </div>

            </div>


            {{-- Booking Card --}}

            <div class="col-12 col-lg-5">

                <div
                    class="card
                           border-0
                           rounded-5
                           shadow-sm
                           overflow-hidden"
                >

                    <div
                        class="card-body
                               p-4
                               p-md-5"
                    >

                        <span
                            class="small
                                   text-pn-gold
                                   fw-semibold
                                   text-uppercase"
                        >
                            Booking
                        </span>


                        <h3
                            class="font-serif
                                   h3
                                   text-pn-brown
                                   mt-2"
                        >

                            Ready to book?

                        </h3>


                        <div
                            class="border-top
                                   my-4"
                        ></div>


                        <div
                            class="d-flex
                                   justify-content-between
                                   gap-3
                                   mb-3"
                        >

                            <span
                                class="small
                                       text-secondary"
                            >

                                Starting price

                            </span>


                            <strong
                                class="text-pn-brown"
                            >

                                {{ $priest['price_from'] }}

                            </strong>

                        </div>


                        <div
                            class="d-flex
                                   justify-content-between
                                   gap-3
                                   mb-3"
                        >

                            <span
                                class="small
                                       text-secondary"
                            >

                                Selected date

                            </span>


                            <strong
                                class="small
                                       text-pn-brown"
                            >

                                18 Aug 2026

                            </strong>

                        </div>


                        <div
                            class="d-flex
                                   justify-content-between
                                   gap-3
                                   mb-4"
                        >

                            <span
                                class="small
                                       text-secondary"
                            >

                                Selected time

                            </span>


                            <strong
                                class="small
                                       text-pn-brown"
                            >

                                07:00 AM

                            </strong>

                        </div>


                        <a
                            href="#"
                            class="btn
                                   btn-pn
                                   btn-lg
                                   w-100"
                        >

                            Book Priest

                            <i
                                class="bi bi-arrow-right ms-2"
                            ></i>

                        </a>


                        <small
                            class="text-secondary
                                   text-center
                                   d-block
                                   mt-3"
                        >

                            Availability and final pricing will
                            be confirmed during booking.

                        </small>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- ============================================================
     RATINGS & REVIEWS
============================================================ --}}

<section class="py-5">

    <div class="container">

        <div
            class="row
                   g-5"
        >

            {{-- Rating Summary --}}

            <div class="col-12 col-lg-4">

                <span
                    class="small
                           text-pn-gold
                           fw-semibold
                           text-uppercase"
                >
                    Devotee Reviews
                </span>


                <h2
                    class="font-serif
                           display-6
                           text-pn-brown
                           mt-2"
                >

                    Ratings & Reviews

                </h2>


                <div
                    class="pn-divider
                           mb-4"
                ></div>


                <div
                    class="text-center
                           border
                           border-warning-subtle
                           rounded-5
                           p-4"
                >

                    <div
                        class="display-4
                               font-serif
                               text-pn-brown"
                    >

                        {{ $priest['rating'] }}

                    </div>


                    <div
                        class="text-warning
                               fs-5
                               mb-2"
                    >

                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>

                    </div>


                    <p
                        class="small
                               text-secondary
                               mb-0"
                    >

                        Based on
                        {{ $priest['reviews'] }}
                        reviews

                    </p>

                </div>

            </div>


            {{-- Reviews --}}

            <div class="col-12 col-lg-8">

                <div
                    class="vstack
                           gap-3"
                >

                    @foreach($reviews as $review)

                        <article
                            class="border
                                   border-warning-subtle
                                   rounded-4
                                   p-4"
                        >

                            <div
                                class="d-flex
                                       flex-column
                                       flex-sm-row
                                       justify-content-between
                                       gap-2
                                       mb-2"
                            >

                                <div>

                                    <strong
                                        class="text-pn-brown"
                                    >

                                        {{ $review['name'] }}

                                    </strong>


                                    <small
                                        class="text-secondary
                                               d-block"
                                    >

                                        {{ $review['date'] }}

                                    </small>

                                </div>


                                <span
                                    class="small
                                           text-warning"
                                >

                                    <i
                                        class="bi bi-star-fill"
                                    ></i>

                                    {{ $review['rating'] }}

                                </span>

                            </div>


                            <p
                                class="small
                                       text-secondary
                                       mb-0"
                            >

                                {{ $review['text'] }}

                            </p>

                        </article>

                    @endforeach

                </div>


                <div
                    class="text-center
                           mt-4"
                >

                    <a
                        href="#"
                        class="btn
                               btn-pn-outline"
                    >

                        View All Reviews

                    </a>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- ============================================================
     BOOKING FLOW
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
                Simple Booking
            </span>


            <h2
                class="font-serif
                       display-6
                       text-pn-brown
                       mt-2"
            >

                Book your priest in a few simple steps.

            </h2>

        </div>


        <div
            class="row
                   row-cols-1
                   row-cols-md-4
                   g-4"
        >

            <div class="col">

                <div
                    class="text-center
                           p-3"
                >

                    <div
                        class="mx-auto
                               rounded-circle
                               bg-pn-cream
                               text-pn-primary
                               d-flex
                               align-items-center
                               justify-content-center
                               fs-5
                               mb-3"
                        style="width:60px;height:60px;"
                    >
                        01
                    </div>


                    <h3
                        class="font-serif
                               h5
                               text-pn-brown"
                    >

                        Select Priest

                    </h3>


                    <p
                        class="small
                               text-secondary
                               mb-0"
                    >

                        Review the priest profile and services.

                    </p>

                </div>

            </div>


            <div class="col">

                <div
                    class="text-center
                           p-3"
                >

                    <div
                        class="mx-auto
                               rounded-circle
                               bg-pn-cream
                               text-pn-primary
                               d-flex
                               align-items-center
                               justify-content-center
                               fs-5
                               mb-3"
                        style="width:60px;height:60px;"
                    >
                        02
                    </div>


                    <h3
                        class="font-serif
                               h5
                               text-pn-brown"
                    >

                        Choose Slot

                    </h3>


                    <p
                        class="small
                               text-secondary
                               mb-0"
                    >

                        Select an available date and time.

                    </p>

                </div>

            </div>


            <div class="col">

                <div
                    class="text-center
                           p-3"
                >

                    <div
                        class="mx-auto
                               rounded-circle
                               bg-pn-cream
                               text-pn-primary
                               d-flex
                               align-items-center
                               justify-content-center
                               fs-5
                               mb-3"
                        style="width:60px;height:60px;"
                    >
                        03
                    </div>


                    <h3
                        class="font-serif
                               h5
                               text-pn-brown"
                    >

                        Enter Details

                    </h3>


                    <p
                        class="small
                               text-secondary
                               mb-0"
                    >

                        Provide the required booking details.

                    </p>

                </div>

            </div>


            <div class="col">

                <div
                    class="text-center
                           p-3"
                >

                    <div
                        class="mx-auto
                               rounded-circle
                               bg-pn-cream
                               text-pn-primary
                               d-flex
                               align-items-center
                               justify-content-center
                               fs-5
                               mb-3"
                        style="width:60px;height:60px;"
                    >
                        04
                    </div>


                    <h3
                        class="font-serif
                               h5
                               text-pn-brown"
                    >

                        Confirm Booking

                    </h3>


                    <p
                        class="small
                               text-secondary
                               mb-0"
                    >

                        Complete the booking process securely.

                    </p>

                </div>

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

                    Ready to begin your sacred ceremony?

                </h2>


                <p
                    class="text-white-50
                           col-lg-7
                           mx-auto"
                >

                    Check the available slots and continue
                    with your priest booking.

                </p>


                <a
                    href="#availability"
                    class="btn
                           btn-warning
                           text-dark
                           fw-semibold
                           px-4"
                >

                    Book Priest

                    <i
                        class="bi bi-arrow-right ms-2"
                    ></i>

                </a>

            </div>

        </div>

    </div>

</section>

@endsection