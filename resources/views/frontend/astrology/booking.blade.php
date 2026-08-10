@extends('layouts.app')

@section('title', 'Astrology Booking | Pooja Nilayam')

@section(
    'meta_description',
    'Book an astrology consultation with an astrologer through Pooja Nilayam.'
)

@section('content')

@php

    /*
    |--------------------------------------------------------------------------
    | TEMPORARY ASTROLOGY BOOKING UI DATA
    |--------------------------------------------------------------------------
    | UI prototype only.
    |
    | Actual astrologers, availability, pricing, consultation types,
    | slots and booking information will come from the backend later.
    |--------------------------------------------------------------------------
    */


    /*
    |--------------------------------------------------------------------------
    | SAMPLE ASTROLOGERS
    |--------------------------------------------------------------------------
    */

    $astrologers = [

        [
            'name' => 'Acharya Ananta',
            'speciality' => 'Vedic Astrology',
            'experience' => '12+ Years',
            'rating' => '4.9',
            'reviews' => '128',
            'price' => '₹501',
            'status' => 'Available',
            'image' => 'images/home/hero.jpg'
        ],

        [
            'name' => 'Acharya Devika',
            'speciality' => 'Kundli & Astrology',
            'experience' => '10+ Years',
            'rating' => '4.8',
            'reviews' => '96',
            'price' => '₹601',
            'status' => 'Available',
            'image' => 'images/home/hero.jpg'
        ],

        [
            'name' => 'Acharya Vedant',
            'speciality' => 'Vastu & Astrology',
            'experience' => '15+ Years',
            'rating' => '4.9',
            'reviews' => '154',
            'price' => '₹751',
            'status' => 'Available',
            'image' => 'images/home/hero.jpg'
        ]

    ];


    /*
    |--------------------------------------------------------------------------
    | CONSULTATION TYPES
    |--------------------------------------------------------------------------
    */

    $consultationTypes = [

        [
            'title' => 'Video Consultation',
            'description' => 'Speak with your astrologer face-to-face.',
            'icon' => 'bi-camera-video',
            'duration' => '30 Minutes'
        ],

        [
            'title' => 'Audio Consultation',
            'description' => 'Have a private consultation through audio.',
            'icon' => 'bi-telephone',
            'duration' => '30 Minutes'
        ],

        [
            'title' => 'Chat Consultation',
            'description' => 'Discuss your questions through chat.',
            'icon' => 'bi-chat-dots',
            'duration' => '30 Minutes'
        ]

    ];


    /*
    |--------------------------------------------------------------------------
    | SAMPLE SLOTS
    |--------------------------------------------------------------------------
    */

    $slots = [

        '10:00 AM',
        '11:00 AM',
        '12:30 PM',
        '02:00 PM',
        '04:00 PM',
        '06:00 PM',
        '07:30 PM',
        '09:00 PM'

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
                        Astrology
                    </a>

                </li>


                <li
                    class="breadcrumb-item active"
                    aria-current="page"
                >
                    Astrology Booking
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
                   g-5"
        >

            {{-- Hero Content --}}

            <div class="col-12 col-lg-6">

                <span
                    class="small
                           text-pn-gold
                           fw-semibold
                           text-uppercase"
                >

                    Astrology Consultation

                </span>


                <h1
                    class="font-serif
                           display-3
                           text-pn-brown
                           mt-2
                           mb-3"
                >

                    Connect with the
                    <span class="text-pn-primary">
                        right astrologer.
                    </span>

                </h1>


                <p
                    class="lead
                           text-secondary
                           mb-4"
                >

                    Choose an astrologer, select your preferred
                    consultation type and book a convenient
                    time slot.

                </p>


                <a
                    href="#astrologers"
                    class="btn
                           btn-pn
                           btn-lg"
                >

                    Browse Astrologers

                    <i
                        class="bi bi-arrow-down ms-2"
                    ></i>

                </a>


                <div
                    class="d-flex
                           flex-wrap
                           gap-4
                           mt-4"
                >

                    <div
                        class="d-flex
                               align-items-center
                               gap-2"
                    >

                        <i
                            class="bi bi-camera-video
                                   text-pn-primary"
                        ></i>


                        <small class="text-secondary">

                            Video

                        </small>

                    </div>


                    <div
                        class="d-flex
                               align-items-center
                               gap-2"
                    >

                        <i
                            class="bi bi-telephone
                                   text-pn-primary"
                        ></i>


                        <small class="text-secondary">

                            Audio

                        </small>

                    </div>


                    <div
                        class="d-flex
                               align-items-center
                               gap-2"
                    >

                        <i
                            class="bi bi-chat-dots
                                   text-pn-primary"
                        ></i>


                        <small class="text-secondary">

                            Chat

                        </small>

                    </div>

                </div>

            </div>


            {{-- Hero Visual --}}

            <div class="col-12 col-lg-6">

                <div
                    class="pn-digital
                           rounded-5
                           overflow-hidden
                           position-relative"
                >

                    <div class="ratio ratio-4x3">

                        <img
                            src="{{ asset('images/home/hero.jpg') }}"
                            class="object-fit-cover"
                            alt="Astrology consultation"
                            loading="eager"
                        >

                    </div>


                    <div
                        class="position-absolute
                               bottom-0
                               start-0
                               end-0
                               p-4
                               text-white"
                        style="background:linear-gradient(transparent,rgba(35,20,12,.9));"
                    >

                        <span
                            class="small
                                   text-warning
                                   fw-semibold
                                   text-uppercase"
                        >

                            Personalized Guidance

                        </span>


                        <h2
                            class="font-serif
                                   h2
                                   mt-2
                                   mb-0"
                        >

                            Choose your astrologer
                            and consultation style.

                        </h2>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- ============================================================
     BOOKING STEPS
============================================================ --}}

<section class="py-4 border-bottom">

    <div class="container">

        <div
            class="row
                   row-cols-2
                   row-cols-md-5
                   g-3"
        >

            {{-- Step 1 --}}

            <div class="col">

                <div
                    class="d-flex
                           align-items-center
                           gap-2"
                >

                    <div
                        class="rounded-circle
                               bg-pn-primary
                               text-white
                               d-flex
                               align-items-center
                               justify-content-center
                               fw-semibold
                               flex-shrink-0"
                        style="width:38px;height:38px;"
                    >
                        1
                    </div>


                    <small
                        class="fw-semibold
                               text-pn-brown"
                    >

                        Astrologer

                    </small>

                </div>

            </div>


            {{-- Step 2 --}}

            <div class="col">

                <div
                    class="d-flex
                           align-items-center
                           gap-2"
                >

                    <div
                        class="rounded-circle
                               bg-light
                               border
                               text-pn-primary
                               d-flex
                               align-items-center
                               justify-content-center
                               fw-semibold
                               flex-shrink-0"
                        style="width:38px;height:38px;"
                    >
                        2
                    </div>


                    <small class="text-secondary">

                        Type

                    </small>

                </div>

            </div>


            {{-- Step 3 --}}

            <div class="col">

                <div
                    class="d-flex
                           align-items-center
                           gap-2"
                >

                    <div
                        class="rounded-circle
                               bg-light
                               border
                               text-pn-primary
                               d-flex
                               align-items-center
                               justify-content-center
                               fw-semibold
                               flex-shrink-0"
                        style="width:38px;height:38px;"
                    >
                        3
                    </div>


                    <small class="text-secondary">

                        Slot

                    </small>

                </div>

            </div>


            {{-- Step 4 --}}

            <div class="col">

                <div
                    class="d-flex
                           align-items-center
                           gap-2"
                >

                    <div
                        class="rounded-circle
                               bg-light
                               border
                               text-pn-primary
                               d-flex
                               align-items-center
                               justify-content-center
                               fw-semibold
                               flex-shrink-0"
                        style="width:38px;height:38px;"
                    >
                        4
                    </div>


                    <small class="text-secondary">

                        Payment

                    </small>

                </div>

            </div>


            {{-- Step 5 --}}

            <div class="col">

                <div
                    class="d-flex
                           align-items-center
                           gap-2"
                >

                    <div
                        class="rounded-circle
                               bg-light
                               border
                               text-pn-primary
                               d-flex
                               align-items-center
                               justify-content-center
                               fw-semibold
                               flex-shrink-0"
                        style="width:38px;height:38px;"
                    >
                        5
                    </div>


                    <small class="text-secondary">

                        Confirmed

                    </small>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- ============================================================
     ASTROLOGER LIST
============================================================ --}}

<section
    id="astrologers"
    class="py-5"
>

    <div class="container">

        <div
            class="row
                   align-items-end
                   g-3
                   mb-5"
        >

            <div class="col-12 col-lg-8">

                <span
                    class="small
                           text-pn-gold
                           fw-semibold
                           text-uppercase"
                >

                    Step 1

                </span>


                <h2
                    class="font-serif
                           display-6
                           text-pn-brown
                           mt-2
                           mb-2"
                >

                    Choose your astrologer

                </h2>


                <p
                    class="text-secondary
                           mb-0"
                >

                    Browse the available astrologers and select
                    the one you would like to consult.

                </p>

            </div>


            <div class="col-12 col-lg-4">

                <div
                    class="input-group"
                >

                    <span class="input-group-text bg-white">

                        <i class="bi bi-search"></i>

                    </span>


                    <input
                        type="search"
                        class="form-control"
                        placeholder="Search astrologers..."
                        aria-label="Search astrologers"
                    >

                </div>

            </div>

        </div>


        <div
            class="row
                   row-cols-1
                   row-cols-md-2
                   row-cols-xl-3
                   g-4"
        >

            @foreach($astrologers as $index => $astrologer)

                <div class="col">

                    <article
                        class="card
                               border
                               border-warning-subtle
                               rounded-5
                               h-100
                               overflow-hidden"
                    >

                        <div class="position-relative">

                            <div class="ratio ratio-4x3">

                                <img
                                    src="{{ asset($astrologer['image']) }}"
                                    class="object-fit-cover"
                                    alt="{{ $astrologer['name'] }}"
                                    loading="lazy"
                                >

                            </div>


                            <span
                                class="position-absolute
                                       top-0
                                       start-0
                                       m-3
                                       badge
                                       rounded-pill
                                       bg-success"
                            >

                                <i
                                    class="bi bi-circle-fill me-1"
                                    style="font-size:6px;"
                                ></i>

                                {{ $astrologer['status'] }}

                            </span>

                        </div>


                        <div
                            class="card-body
                                   p-4"
                        >

                            <div
                                class="d-flex
                                       justify-content-between
                                       align-items-start
                                       gap-3"
                            >

                                <div>

                                    <h3
                                        class="font-serif
                                               h4
                                               text-pn-brown
                                               mb-1"
                                    >

                                        {{ $astrologer['name'] }}

                                    </h3>


                                    <p
                                        class="small
                                               text-pn-primary
                                               fw-semibold
                                               mb-2"
                                    >

                                        {{ $astrologer['speciality'] }}

                                    </p>

                                </div>


                                <div
                                    class="text-end
                                           flex-shrink-0"
                                >

                                    <div
                                        class="small
                                               fw-semibold
                                               text-pn-brown"
                                    >

                                        <i
                                            class="bi bi-star-fill
                                                   text-warning"
                                        ></i>

                                        {{ $astrologer['rating'] }}

                                    </div>


                                    <small class="text-secondary">

                                        {{ $astrologer['reviews'] }}
                                        reviews

                                    </small>

                                </div>

                            </div>


                            <div
                                class="d-flex
                                       flex-wrap
                                       gap-3
                                       border-top
                                       border-bottom
                                       py-3
                                       my-3"
                            >

                                <small class="text-secondary">

                                    <i
                                        class="bi bi-award
                                               text-pn-primary
                                               me-1"
                                    ></i>

                                    {{ $astrologer['experience'] }}

                                </small>


                                <small class="text-secondary">

                                    <i
                                        class="bi bi-camera-video
                                               text-pn-primary
                                               me-1"
                                    ></i>

                                    Video

                                </small>


                                <small class="text-secondary">

                                    <i
                                        class="bi bi-chat-dots
                                               text-pn-primary
                                               me-1"
                                    ></i>

                                    Chat

                                </small>

                            </div>


                            <div
                                class="d-flex
                                       align-items-center
                                       justify-content-between
                                       gap-3"
                            >

                                <div>

                                    <small
                                        class="text-secondary
                                               d-block"
                                    >

                                        Starting from

                                    </small>


                                    <strong
                                        class="text-pn-brown"
                                    >

                                        {{ $astrologer['price'] }}

                                    </strong>

                                </div>


                                <a
                                    href="#booking-form"
                                    class="btn
                                           btn-pn"
                                >

                                    Select

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

    </div>

</section>


{{-- ============================================================
     BOOKING FORM / SELECTION
============================================================ --}}

<section
    id="booking-form"
    class="py-5 bg-pn-cream"
>

    <div class="container">

        <div
            class="row
                   justify-content-center"
        >

            <div class="col-12 col-xl-10">

                <div
                    class="card
                           border
                           border-warning-subtle
                           rounded-5
                           overflow-hidden"
                >

                    <div class="card-body p-4 p-md-5">

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

                                Booking Details

                            </span>


                            <h2
                                class="font-serif
                                       display-6
                                       text-pn-brown
                                       mt-2"
                            >

                                Schedule your consultation

                            </h2>


                            <p
                                class="text-secondary
                                       col-lg-7
                                       mx-auto
                                       mb-0"
                            >

                                Complete the following steps to
                                schedule your astrology consultation.

                            </p>

                        </div>


                        {{-- ====================================================
                             SELECTED ASTROLOGER
                        ===================================================== --}}

                        <div class="mb-5">

                            <div
                                class="d-flex
                                       align-items-center
                                       justify-content-between
                                       mb-3"
                            >

                                <div>

                                    <span
                                        class="small
                                               text-pn-gold
                                               fw-semibold
                                               text-uppercase"
                                    >

                                        Step 1

                                    </span>


                                    <h3
                                        class="font-serif
                                               h3
                                               text-pn-brown
                                               mb-0"
                                    >

                                        Selected Astrologer

                                    </h3>

                                </div>

                            </div>


                            <div
                                class="border
                                       border-warning-subtle
                                       rounded-4
                                       bg-white
                                       p-3
                                       p-md-4"
                            >

                                <div
                                    class="row
                                           align-items-center
                                           g-3"
                                >

                                    <div class="col-auto">

                                        <div
                                            class="rounded-circle
                                                   overflow-hidden"
                                            style="width:72px;height:72px;"
                                        >

                                            <img
                                                src="{{ asset('images/home/hero.jpg') }}"
                                                class="w-100 h-100 object-fit-cover"
                                                alt="Selected astrologer"
                                            >

                                        </div>

                                    </div>


                                    <div class="col">

                                        <h4
                                            class="font-serif
                                                   h4
                                                   text-pn-brown
                                                   mb-1"
                                        >

                                            Acharya Ananta

                                        </h4>


                                        <p
                                            class="small
                                                   text-pn-primary
                                                   fw-semibold
                                                   mb-1"
                                        >

                                            Vedic Astrology

                                        </p>


                                        <small class="text-secondary">

                                            <i
                                                class="bi bi-star-fill
                                                       text-warning"
                                            ></i>

                                            4.9 · 128 reviews

                                        </small>

                                    </div>


                                    <div class="col-12 col-md-auto">

                                        <button
                                            type="button"
                                            class="btn
                                                   btn-pn-outline
                                                   btn-sm"
                                        >

                                            Change Astrologer

                                        </button>

                                    </div>

                                </div>

                            </div>

                        </div>


                        {{-- ====================================================
                             CONSULTATION TYPE
                        ===================================================== --}}

                        <div class="mb-5">

                            <span
                                class="small
                                       text-pn-gold
                                       fw-semibold
                                       text-uppercase"
                            >

                                Step 2

                            </span>


                            <h3
                                class="font-serif
                                       h3
                                       text-pn-brown
                                       mt-1
                                       mb-3"
                            >

                                Choose Consultation Type

                            </h3>


                            <div
                                class="row
                                       row-cols-1
                                       row-cols-md-3
                                       g-3"
                            >

                                @foreach($consultationTypes as $index => $type)

                                    <div class="col">

                                        <input
                                            type="radio"
                                            class="btn-check"
                                            name="consultation_type"
                                            id="consultation{{ $index }}"
                                            value="{{ $type['title'] }}"
                                            @checked($index === 0)
                                        >


                                        <label
                                            for="consultation{{ $index }}"
                                            class="card
                                                   border
                                                   border-warning-subtle
                                                   rounded-4
                                                   h-100
                                                   text-start
                                                   p-0"
                                            style="cursor:pointer;"
                                        >

                                            <div class="card-body p-4">

                                                <div
                                                    class="rounded-circle
                                                           bg-pn-cream
                                                           text-pn-primary
                                                           d-flex
                                                           align-items-center
                                                           justify-content-center
                                                           mb-3"
                                                    style="width:52px;height:52px;"
                                                >

                                                    <i
                                                        class="bi {{ $type['icon'] }}
                                                               fs-5"
                                                    ></i>

                                                </div>


                                                <h4
                                                    class="font-serif
                                                           h5
                                                           text-pn-brown"
                                                >

                                                    {{ $type['title'] }}

                                                </h4>


                                                <p
                                                    class="small
                                                           text-secondary
                                                           mb-2"
                                                >

                                                    {{ $type['description'] }}

                                                </p>


                                                <small
                                                    class="text-pn-primary
                                                           fw-semibold"
                                                >

                                                    {{ $type['duration'] }}

                                                </small>

                                            </div>

                                        </label>

                                    </div>

                                @endforeach

                            </div>

                        </div>


                        {{-- ====================================================
                             DATE
                        ===================================================== --}}

                        <div class="mb-5">

                            <span
                                class="small
                                       text-pn-gold
                                       fw-semibold
                                       text-uppercase"
                            >

                                Step 3

                            </span>


                            <h3
                                class="font-serif
                                       h3
                                       text-pn-brown
                                       mt-1
                                       mb-3"
                            >

                                Select Date & Time

                            </h3>


                            <div
                                class="row
                                       g-4"
                            >

                                <div class="col-12 col-lg-5">

                                    <label
                                        for="bookingDate"
                                        class="form-label
                                               small
                                               fw-semibold
                                               text-pn-brown"
                                    >

                                        Consultation Date

                                    </label>


                                    <input
                                        type="date"
                                        id="bookingDate"
                                        name="booking_date"
                                        class="form-control
                                               form-control-lg"
                                    >

                                </div>


                                <div class="col-12 col-lg-7">

                                    <span
                                        class="form-label
                                               small
                                               fw-semibold
                                               text-pn-brown
                                               d-block"
                                    >

                                        Available Slots

                                    </span>


                                    <div
                                        class="d-flex
                                               flex-wrap
                                               gap-2"
                                    >

                                        @foreach($slots as $index => $slot)

                                            <input
                                                type="radio"
                                                class="btn-check"
                                                name="booking_slot"
                                                id="slot{{ $index }}"
                                                value="{{ $slot }}"
                                            >


                                            <label
                                                for="slot{{ $index }}"
                                                class="btn
                                                       btn-outline-secondary
                                                       rounded-3"
                                            >

                                                {{ $slot }}

                                            </label>

                                        @endforeach

                                    </div>

                                </div>

                            </div>

                        </div>


                        {{-- ====================================================
                             CUSTOMER DETAILS
                        ===================================================== --}}

                        <div class="mb-5">

                            <span
                                class="small
                                       text-pn-gold
                                       fw-semibold
                                       text-uppercase"
                            >

                                Your Details

                            </span>


                            <h3
                                class="font-serif
                                       h3
                                       text-pn-brown
                                       mt-1
                                       mb-3"
                            >

                                Customer Information

                            </h3>


                            <div
                                class="row
                                       g-3"
                            >

                                <div class="col-12 col-md-6">

                                    <label
                                        for="customerName"
                                        class="form-label
                                               small
                                               fw-semibold
                                               text-pn-brown"
                                    >

                                        Full Name
                                        <span class="text-danger">*</span>

                                    </label>


                                    <input
                                        type="text"
                                        id="customerName"
                                        name="customer_name"
                                        class="form-control
                                               form-control-lg"
                                        placeholder="Enter your name"
                                        autocomplete="name"
                                    >

                                </div>


                                <div class="col-12 col-md-6">

                                    <label
                                        for="customerMobile"
                                        class="form-label
                                               small
                                               fw-semibold
                                               text-pn-brown"
                                    >

                                        Mobile Number
                                        <span class="text-danger">*</span>

                                    </label>


                                    <input
                                        type="tel"
                                        id="customerMobile"
                                        name="customer_mobile"
                                        class="form-control
                                               form-control-lg"
                                        placeholder="Enter mobile number"
                                        autocomplete="tel"
                                    >

                                </div>


                                <div class="col-12">

                                    <label
                                        for="customerEmail"
                                        class="form-label
                                               small
                                               fw-semibold
                                               text-pn-brown"
                                    >

                                        Email Address
                                        <span class="text-danger">*</span>

                                    </label>


                                    <input
                                        type="email"
                                        id="customerEmail"
                                        name="customer_email"
                                        class="form-control
                                               form-control-lg"
                                        placeholder="Enter email address"
                                        autocomplete="email"
                                    >

                                </div>


                                <div class="col-12">

                                    <label
                                        for="customerQuestion"
                                        class="form-label
                                               small
                                               fw-semibold
                                               text-pn-brown"
                                    >

                                        What would you like
                                        to discuss?

                                        <span
                                            class="text-secondary
                                                   fw-normal"
                                        >
                                            (Optional)
                                        </span>

                                    </label>


                                    <textarea
                                        id="customerQuestion"
                                        name="customer_question"
                                        class="form-control"
                                        rows="4"
                                        placeholder="Briefly describe your question..."
                                    ></textarea>

                                </div>

                            </div>

                        </div>


                        {{-- ====================================================
                             PAYMENT SUMMARY
                        ===================================================== --}}

                        <div class="mb-4">

                            <span
                                class="small
                                       text-pn-gold
                                       fw-semibold
                                       text-uppercase"
                            >

                                Step 4

                            </span>


                            <h3
                                class="font-serif
                                       h3
                                       text-pn-brown
                                       mt-1
                                       mb-3"
                            >

                                Review & Payment

                            </h3>


                            <div
                                class="border
                                       border-warning-subtle
                                       rounded-4
                                       bg-white
                                       overflow-hidden"
                            >

                                <div
                                    class="p-4"
                                >

                                    <div
                                        class="d-flex
                                               justify-content-between
                                               gap-3
                                               mb-3"
                                    >

                                        <span class="text-secondary">

                                            Astrologer

                                        </span>


                                        <strong
                                            class="text-pn-brown"
                                        >

                                            Acharya Ananta

                                        </strong>

                                    </div>


                                    <div
                                        class="d-flex
                                               justify-content-between
                                               gap-3
                                               mb-3"
                                    >

                                        <span class="text-secondary">

                                            Consultation

                                        </span>


                                        <strong
                                            class="text-pn-brown"
                                        >

                                            Video Consultation

                                        </strong>

                                    </div>


                                    <div
                                        class="d-flex
                                               justify-content-between
                                               gap-3
                                               mb-3"
                                    >

                                        <span class="text-secondary">

                                            Duration

                                        </span>


                                        <strong
                                            class="text-pn-brown"
                                        >

                                            30 Minutes

                                        </strong>

                                    </div>


                                    <div
                                        class="d-flex
                                               justify-content-between
                                               gap-3
                                               mb-3"
                                    >

                                        <span class="text-secondary">

                                            Consultation Fee

                                        </span>


                                        <strong
                                            class="text-pn-brown"
                                        >

                                            ₹501

                                        </strong>

                                    </div>


                                    <hr
                                        class="border-warning-subtle"
                                    >


                                    <div
                                        class="d-flex
                                               justify-content-between
                                               gap-3"
                                    >

                                        <strong
                                            class="text-pn-brown"
                                        >

                                            Total

                                        </strong>


                                        <strong
                                            class="fs-5
                                                   text-pn-primary"
                                        >

                                            ₹501

                                        </strong>

                                    </div>

                                </div>

                            </div>

                        </div>


                        {{-- Terms --}}

                        <div
                            class="form-check
                                   mb-4"
                        >

                            <input
                                class="form-check-input"
                                type="checkbox"
                                id="bookingTerms"
                                required
                            >


                            <label
                                class="form-check-label
                                       small
                                       text-secondary"
                                for="bookingTerms"
                            >

                                I agree to the applicable consultation,
                                payment and cancellation terms.

                                <span class="text-danger">*</span>

                            </label>

                        </div>


                        {{-- Payment Button --}}

                        <div
                            class="d-grid
                                   d-sm-flex
                                   justify-content-sm-end"
                        >

                            <button
                                type="button"
                                class="btn
                                       btn-pn
                                       btn-lg
                                       px-4"
                            >

                                Proceed to Payment

                                <i
                                    class="bi bi-arrow-right ms-2"
                                ></i>

                            </button>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- ============================================================
     CONSULTATION TYPES
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

                Consultation Options

            </span>


            <h2
                class="font-serif
                       display-6
                       text-pn-brown
                       mt-2"
            >

                Choose how you want to connect

            </h2>


            <p
                class="text-secondary
                       col-lg-7
                       mx-auto
                       mb-0"
            >

                The consultation type is selected during the
                booking process.

            </p>

        </div>


        <div
            class="row
                   row-cols-1
                   row-cols-md-3
                   g-4"
        >

            @foreach($consultationTypes as $type)

                <div class="col">

                    <div
                        class="card
                               border
                               border-warning-subtle
                               rounded-5
                               h-100"
                    >

                        <div
                            class="card-body
                                   p-4
                                   text-center"
                        >

                            <div
                                class="rounded-circle
                                       bg-pn-cream
                                       text-pn-primary
                                       d-flex
                                       align-items-center
                                       justify-content-center
                                       mx-auto
                                       mb-4"
                                style="width:64px;height:64px;"
                            >

                                <i
                                    class="bi {{ $type['icon'] }}
                                           fs-4"
                                ></i>

                            </div>


                            <h3
                                class="font-serif
                                       h4
                                       text-pn-brown"
                            >

                                {{ $type['title'] }}

                            </h3>


                            <p
                                class="small
                                       text-secondary
                                       mb-2"
                            >

                                {{ $type['description'] }}

                            </p>


                            <small
                                class="text-pn-primary
                                       fw-semibold"
                            >

                                {{ $type['duration'] }}

                            </small>

                        </div>

                    </div>

                </div>

            @endforeach

        </div>

    </div>

</section>


{{-- ============================================================
     HOW IT WORKS
============================================================ --}}

<section
    id="how-it-works"
    class="py-5 bg-pn-cream"
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

                Simple Booking

            </span>


            <h2
                class="font-serif
                       display-6
                       text-pn-brown
                       mt-2"
            >

                How Astrology Booking Works

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
                   row-cols-md-4
                   g-4"
        >

            {{-- Step 1 --}}

            <div class="col">

                <div class="text-center h-100">

                    <div
                        class="mx-auto
                               rounded-circle
                               bg-white
                               text-pn-primary
                               d-flex
                               align-items-center
                               justify-content-center
                               fw-semibold
                               fs-5"
                        style="width:64px;height:64px;"
                    >
                        01
                    </div>


                    <h3
                        class="font-serif
                               h5
                               text-pn-brown
                               mt-3"
                    >

                        Select Astrologer

                    </h3>


                    <p
                        class="small
                               text-secondary
                               mb-0"
                    >

                        Browse and choose your preferred
                        astrologer.

                    </p>

                </div>

            </div>


            {{-- Step 2 --}}

            <div class="col">

                <div class="text-center h-100">

                    <div
                        class="mx-auto
                               rounded-circle
                               bg-white
                               text-pn-primary
                               d-flex
                               align-items-center
                               justify-content-center
                               fw-semibold
                               fs-5"
                        style="width:64px;height:64px;"
                    >
                        02
                    </div>


                    <h3
                        class="font-serif
                               h5
                               text-pn-brown
                               mt-3"
                    >

                        Choose Type

                    </h3>


                    <p
                        class="small
                               text-secondary
                               mb-0"
                    >

                        Select Video, Audio or Chat consultation.

                    </p>

                </div>

            </div>


            {{-- Step 3 --}}

            <div class="col">

                <div class="text-center h-100">

                    <div
                        class="mx-auto
                               rounded-circle
                               bg-white
                               text-pn-primary
                               d-flex
                               align-items-center
                               justify-content-center
                               fw-semibold
                               fs-5"
                        style="width:64px;height:64px;"
                    >
                        03
                    </div>


                    <h3
                        class="font-serif
                               h5
                               text-pn-brown
                               mt-3"
                    >

                        Select Slot

                    </h3>


                    <p
                        class="small
                               text-secondary
                               mb-0"
                    >

                        Choose an available date and time.

                    </p>

                </div>

            </div>


            {{-- Step 4 --}}

            <div class="col">

                <div class="text-center h-100">

                    <div
                        class="mx-auto
                               rounded-circle
                               bg-success-subtle
                               text-success
                               d-flex
                               align-items-center
                               justify-content-center
                               fw-semibold
                               fs-5"
                        style="width:64px;height:64px;"
                    >

                        <i class="bi bi-check-lg"></i>

                    </div>


                    <h3
                        class="font-serif
                               h5
                               text-pn-brown
                               mt-3"
                    >

                        Pay & Confirm

                    </h3>


                    <p
                        class="small
                               text-secondary
                               mb-0"
                    >

                        Complete payment and receive your
                        booking confirmation.

                    </p>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- ============================================================
     BEFORE CONSULTATION
============================================================ --}}

<section class="py-5">

    <div class="container">

        <div
            class="row
                   align-items-center
                   g-5"
        >

            <div class="col-12 col-lg-6">

                <span
                    class="small
                           text-pn-gold
                           fw-semibold
                           text-uppercase"
                >

                    Consultation

                </span>


                <h2
                    class="font-serif
                           display-6
                           text-pn-brown
                           mt-2
                           mb-3"
                >

                    Your consultation journey
                    continues after booking.

                </h2>


                <div
                    class="pn-divider
                           mb-4"
                ></div>


                <p
                    class="text-secondary
                           mb-0"
                >

                    After successful payment and booking
                    confirmation, the consultation can proceed
                    according to the selected consultation type
                    and scheduled slot.

                </p>

            </div>


            <div class="col-12 col-lg-6">

                <div
                    class="vstack
                           gap-3"
                >

                    <div
                        class="border
                               border-warning-subtle
                               rounded-4
                               p-4
                               d-flex
                               align-items-center
                               gap-3"
                    >

                        <div
                            class="rounded-circle
                                   bg-pn-cream
                                   text-pn-primary
                                   d-flex
                                   align-items-center
                                   justify-content-center
                                   flex-shrink-0"
                            style="width:50px;height:50px;"
                        >

                            <i class="bi bi-check-circle"></i>

                        </div>


                        <div>

                            <strong
                                class="d-block
                                       text-pn-brown"
                            >

                                Booking Confirmed

                            </strong>


                            <small class="text-secondary">

                                Your confirmed consultation is
                                recorded in the platform.

                            </small>

                        </div>

                    </div>


                    <div
                        class="border
                               border-warning-subtle
                               rounded-4
                               p-4
                               d-flex
                               align-items-center
                               gap-3"
                    >

                        <div
                            class="rounded-circle
                                   bg-pn-cream
                                   text-pn-primary
                                   d-flex
                                   align-items-center
                                   justify-content-center
                                   flex-shrink-0"
                            style="width:50px;height:50px;"
                        >

                            <i class="bi bi-play-circle"></i>

                        </div>


                        <div>

                            <strong
                                class="d-block
                                       text-pn-brown"
                            >

                                Consultation Starts

                            </strong>


                            <small class="text-secondary">

                                Join or start the consultation
                                according to the selected type.

                            </small>

                        </div>

                    </div>


                    <div
                        class="border
                               border-warning-subtle
                               rounded-4
                               p-4
                               d-flex
                               align-items-center
                               gap-3"
                    >

                        <div
                            class="rounded-circle
                                   bg-pn-cream
                                   text-pn-primary
                                   d-flex
                                   align-items-center
                                   justify-content-center
                                   flex-shrink-0"
                            style="width:50px;height:50px;"
                        >

                            <i class="bi bi-check2-all"></i>

                        </div>


                        <div>

                            <strong
                                class="d-block
                                       text-pn-brown"
                            >

                                Session Completed

                            </strong>


                            <small class="text-secondary">

                                The consultation concludes after
                                the scheduled session.

                            </small>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- ============================================================
     INFORMATION
============================================================ --}}

<section class="pb-5">

    <div class="container">

        <div
            class="alert
                   alert-light
                   border
                   border-warning-subtle
                   rounded-4
                   d-flex
                   align-items-start
                   gap-3"
        >

            <i
                class="bi bi-info-circle
                       text-pn-primary
                       fs-5"
            ></i>


            <div>

                <strong
                    class="d-block
                           text-pn-brown
                           mb-1"
                >

                    Booking information

                </strong>


                <small class="text-secondary">

                    Astrologer availability, consultation fees,
                    duration, slots, payment options and
                    cancellation rules will be connected to the
                    actual backend configuration.

                </small>

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
                    class="bi bi-stars
                           display-5
                           text-warning"
                ></i>


                <h2
                    class="font-serif
                           display-6
                           mt-3"
                >

                    Ready to speak with an astrologer?

                </h2>


                <p
                    class="text-white-50
                           col-lg-7
                           mx-auto
                           mb-4"
                >

                    Choose an astrologer, select your preferred
                    consultation type and book your slot.

                </p>


                <a
                    href="#astrologers"
                    class="btn
                           btn-warning
                           text-dark
                           fw-semibold
                           px-4"
                >

                    Browse Astrologers

                    <i
                        class="bi bi-arrow-right ms-2"
                    ></i>

                </a>

            </div>

        </div>

    </div>

</section>

@endsection