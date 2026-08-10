@extends('layouts.app')

@section('title', 'Ganapathi Digital Pooja | Pooja Nilayam')

@section(
    'meta_description',
    'Experience a personalized Ganapathi Digital Pooja with AI Sankalpam, flowers, deepam, personalized mantras and blessings.'
)

@section('content')

@php

    /*
    |--------------------------------------------------------------------------
    | TEMPORARY UI DATA
    |--------------------------------------------------------------------------
    | Frontend prototype only.
    | These values will later come from the Digital Pooja model/controller.
    |--------------------------------------------------------------------------
    */

    $pooja = [

        'name' => 'Ganapathi Digital Pooja',

        'god' => 'Lord Ganesha',

        'category' => 'Digital Pooja',

        'image' => 'ganapathi.jpg',

        'price' => 251,

        'duration' => '20 Minutes',

        'rating' => '4.9',

        'reviews' => 186,

        'languages' => [
            'Telugu',
            'English'
        ],

        'short_description' =>
            'A personalized devotional experience dedicated to Lord Ganesha, designed to help you participate in a meaningful digital pooja from wherever you are.',

        'description' =>
            'Begin your spiritual journey with Lord Ganesha through a personalized Digital Pooja experience. Select your offerings, language and family details and experience a devotional journey designed around your Sankalpam.',

        'benefits' => [

            'Seek blessings for success and removal of obstacles.',

            'Create a personalized Sankalpam based on your details.',

            'Choose flowers and deepam as part of your digital offering.',

            'Experience personalized devotional mantras.',

            'Receive blessings and certificate generation where applicable.'

        ]

    ];


    /*
    |--------------------------------------------------------------------------
    | Personalization Features
    |--------------------------------------------------------------------------
    */

    $personalization = [

        [
            'icon' => 'bi-person-vcard',
            'title' => 'Your Details',
            'text' =>
                'Enter your family and devotional details.'
        ],

        [
            'icon' => 'bi-stars',
            'title' => 'AI Sankalpam',
            'text' =>
                'Generate a personalized Sankalpam from your details.'
        ],

        [
            'icon' => 'bi-volume-up',
            'title' => 'Name Pronunciation',
            'text' =>
                'Personalized name pronunciation is part of the planned experience.'
        ],

        [
            'icon' => 'bi-flower1',
            'title' => 'Choose Flowers',
            'text' =>
                'Select flowers for your digital offering.'
        ],

        [
            'icon' => 'bi-brightness-high',
            'title' => 'Choose Deepam',
            'text' =>
                'Select the deepam for your devotional experience.'
        ],

        [
            'icon' => 'bi-translate',
            'title' => 'Choose Language',
            'text' =>
                'Select your preferred language for the experience.'
        ],

        [
            'icon' => 'bi-music-note-beamed',
            'title' => 'Personalized Mantras',
            'text' =>
                'Experience devotional mantras during the pooja.'
        ],

        [
            'icon' => 'bi-award',
            'title' => 'Blessings & Certificate',
            'text' =>
                'Complete your journey with blessings and certificate generation.'
        ]

    ];


    /*
    |--------------------------------------------------------------------------
    | Digital Journey
    |--------------------------------------------------------------------------
    */

    $journey = [

        [
            'number' => '01',
            'icon' => 'bi-stars',
            'title' => 'Select Your God',
            'text' => 'Begin by choosing the deity for your Digital Pooja.'
        ],

        [
            'number' => '02',
            'icon' => 'bi-flower1',
            'title' => 'Choose Flowers',
            'text' => 'Select the flowers you would like to offer.'
        ],

        [
            'number' => '03',
            'icon' => 'bi-brightness-high',
            'title' => 'Choose Deepam',
            'text' => 'Personalize the deepam experience.'
        ],

        [
            'number' => '04',
            'icon' => 'bi-translate',
            'title' => 'Choose Language',
            'text' => 'Select your preferred language.'
        ],

        [
            'number' => '05',
            'icon' => 'bi-person-vcard',
            'title' => 'Family Details',
            'text' => 'Provide the details required for personalization.'
        ],

        [
            'number' => '06',
            'icon' => 'bi-stars',
            'title' => 'AI Sankalpam',
            'text' => 'AI generates your personalized Sankalpam.'
        ],

        [
            'number' => '07',
            'icon' => 'bi-building',
            'title' => 'Temple Experience',
            'text' => 'Continue through the planned temple animation experience.'
        ],

        [
            'number' => '08',
            'icon' => 'bi-music-note-beamed',
            'title' => 'Mantras',
            'text' => 'Experience the devotional mantras.'
        ],

        [
            'number' => '09',
            'icon' => 'bi-fire',
            'title' => 'Harathi',
            'text' => 'Complete the devotional experience with Harathi.'
        ],

        [
            'number' => '10',
            'icon' => 'bi-award',
            'title' => 'Blessings & Certificate',
            'text' => 'Receive blessings and certificate generation where applicable.'
        ]

    ];


    /*
    |--------------------------------------------------------------------------
    | Related Digital Poojas
    |--------------------------------------------------------------------------
    */

    $relatedPoojas = [

        [
            'name' => 'Lakshmi Digital Pooja',
            'god' => 'Goddess Lakshmi',
            'image' => 'lakshmi.jpg',
            'price' => 301
        ],

        [
            'name' => 'Shiva Digital Pooja',
            'god' => 'Lord Shiva',
            'image' => 'shiva.jpg',
            'price' => 351
        ],

        [
            'name' => 'Hanuman Digital Pooja',
            'god' => 'Lord Hanuman',
            'image' => 'hanuman.jpg',
            'price' => 251
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
                        Digital Pooja
                    </a>

                </li>


                <li
                    class="breadcrumb-item active"
                    aria-current="page"
                >

                    {{ $pooja['name'] }}

                </li>

            </ol>

        </nav>

    </div>

</section>


{{-- ============================================================
     HERO / PRODUCT DETAILS
============================================================ --}}

<section class="py-5 bg-pn-cream">

    <div class="container py-lg-3">

        <div class="row g-5 align-items-center">


            {{-- IMAGE --}}

            <div class="col-12 col-lg-6">

                <div
                    class="position-relative
                           rounded-5
                           overflow-hidden"
                >

                    <img
                        src="{{ Vite::asset('resources/images/home/' . $pooja['image']) }}"
                        class="img-fluid
                               w-100
                               object-fit-cover"
                        style="min-height:520px;"
                        alt="{{ $pooja['name'] }}"
                        loading="eager"
                    >


                    {{-- Featured badge --}}

                    <span
                        class="position-absolute
                               top-0
                               start-0
                               m-3
                               badge
                               rounded-pill
                               bg-pn-primary
                               px-3
                               py-2"
                    >

                        Personalized Experience

                    </span>


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
                        style="width:46px;height:46px;"
                        aria-label="Add to wishlist"
                    >

                        <i class="bi bi-heart"></i>

                    </button>


                    {{-- Bottom overlay --}}

                    <div
                        class="position-absolute
                               bottom-0
                               start-0
                               end-0
                               p-3"
                    >

                        <div
                            class="bg-dark
                                   bg-opacity-75
                                   rounded-4
                                   p-3
                                   text-white"
                        >

                            <div
                                class="d-flex
                                       align-items-center
                                       justify-content-between
                                       gap-3"
                            >

                                <div>

                                    <small
                                        class="text-white-50
                                               d-block"
                                    >
                                        Dedicated to
                                    </small>


                                    <strong>

                                        {{ $pooja['god'] }}

                                    </strong>

                                </div>


                                <div
                                    class="text-end"
                                >

                                    <small
                                        class="text-white-50
                                               d-block"
                                    >
                                        Starting from
                                    </small>


                                    <strong
                                        class="fs-4
                                               text-warning"
                                    >

                                        ₹{{ number_format($pooja['price']) }}

                                    </strong>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>


            {{-- DETAILS --}}

            <div class="col-12 col-lg-6">

                <span
                    class="small
                           text-pn-primary
                           fw-semibold
                           text-uppercase"
                >

                    {{ $pooja['category'] }}

                </span>


                <h1
                    class="font-serif
                           display-5
                           text-pn-brown
                           mt-2
                           mb-3"
                >

                    {{ $pooja['name'] }}

                </h1>


                <div
                    class="d-flex
                           flex-wrap
                           align-items-center
                           gap-3
                           mb-4"
                >

                    <span>

                        <i
                            class="bi bi-star-fill
                                   text-pn-gold"
                        ></i>

                        <strong>
                            {{ $pooja['rating'] }}
                        </strong>

                        <span class="text-secondary">

                            ({{ $pooja['reviews'] }} reviews)

                        </span>

                    </span>


                    <span
                        class="text-secondary"
                    >

                        <i
                            class="bi bi-clock
                                   text-pn-primary
                                   me-1"
                        ></i>

                        {{ $pooja['duration'] }}

                    </span>

                </div>


                <p
                    class="lead
                           text-secondary
                           mb-4"
                >

                    {{ $pooja['short_description'] }}

                </p>


                {{-- Price --}}

                <div
                    class="d-flex
                           align-items-end
                           gap-2
                           mb-4"
                >

                    <span
                        class="small
                               text-secondary
                               mb-1"
                    >
                        Starting from
                    </span>


                    <strong
                        class="font-serif
                               display-6
                               text-pn-primary"
                    >

                        ₹{{ number_format($pooja['price']) }}

                    </strong>

                </div>


                {{-- Highlights --}}

                <div
                    class="row
                           row-cols-1
                           row-cols-sm-2
                           g-3
                           mb-4"
                >

                    <div class="col">

                        <div
                            class="d-flex
                                   align-items-center
                                   gap-2"
                        >

                            <i
                                class="bi bi-stars
                                       text-pn-primary
                                       fs-5"
                            ></i>


                            <small
                                class="fw-semibold
                                       text-pn-brown"
                            >

                                AI Sankalpam

                            </small>

                        </div>

                    </div>


                    <div class="col">

                        <div
                            class="d-flex
                                   align-items-center
                                   gap-2"
                        >

                            <i
                                class="bi bi-flower1
                                       text-pn-primary
                                       fs-5"
                            ></i>


                            <small
                                class="fw-semibold
                                       text-pn-brown"
                            >

                                Choose Flowers

                            </small>

                        </div>

                    </div>


                    <div class="col">

                        <div
                            class="d-flex
                                   align-items-center
                                   gap-2"
                        >

                            <i
                                class="bi bi-brightness-high
                                       text-pn-primary
                                       fs-5"
                            ></i>


                            <small
                                class="fw-semibold
                                       text-pn-brown"
                            >

                                Choose Deepam

                            </small>

                        </div>

                    </div>


                    <div class="col">

                        <div
                            class="d-flex
                                   align-items-center
                                   gap-2"
                        >

                            <i
                                class="bi bi-award
                                       text-pn-primary
                                       fs-5"
                            ></i>


                            <small
                                class="fw-semibold
                                       text-pn-brown"
                            >

                                Certificate

                            </small>

                        </div>

                    </div>

                </div>


                {{-- Languages --}}

                <div class="mb-4">

                    <small
                        class="text-secondary
                               d-block
                               mb-2"
                    >

                        Available Languages

                    </small>


                    <div
                        class="d-flex
                               flex-wrap
                               gap-2"
                    >

                        @foreach($pooja['languages'] as $language)

                            <span
                                class="badge
                                       bg-white
                                       text-pn-brown
                                       border
                                       border-warning-subtle
                                       rounded-pill
                                       px-3
                                       py-2"
                            >

                                <i
                                    class="bi bi-translate
                                           text-pn-primary
                                           me-1"
                                ></i>

                                {{ $language }}

                            </span>

                        @endforeach

                    </div>

                </div>


                {{-- CTA --}}

                <div
                    class="d-grid
                           d-sm-flex
                           gap-2"
                >

                    <a
                        href="#"
                        class="btn
                               btn-pn
                               btn-lg
                               px-4"
                    >

                        Personalize Your Pooja

                        <i
                            class="bi bi-arrow-right ms-2"
                        ></i>

                    </a>


                    <button
                        type="button"
                        class="btn
                               btn-pn-outline
                               btn-lg
                               px-4"
                    >

                        <i
                            class="bi bi-heart me-2"
                        ></i>

                        Save

                    </button>

                </div>


                <div
                    class="d-flex
                           flex-wrap
                           gap-4
                           mt-4"
                >

                    <span
                        class="small
                               text-secondary"
                    >

                        <i
                            class="bi bi-shield-check
                                   text-pn-primary
                                   me-1"
                        ></i>

                        Secure Booking

                    </span>


                    <span
                        class="small
                               text-secondary"
                    >

                        <i
                            class="bi bi-credit-card
                                   text-pn-primary
                                   me-1"
                        ></i>

                        Secure Payments

                    </span>


                    <span
                        class="small
                               text-secondary"
                    >

                        <i
                            class="bi bi-phone
                                   text-pn-primary
                                   me-1"
                        ></i>

                        Book From Anywhere

                    </span>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- ============================================================
     QUICK NAVIGATION
============================================================ --}}

<section
    class="border-bottom
           bg-white
           position-sticky
           top-0"
    style="z-index:1010;"
>

    <div class="container">

        <div
            class="d-flex
                   gap-4
                   overflow-auto"
        >

            <a
                href="#overview"
                class="py-3
                       text-pn-primary
                       text-decoration-none
                       text-nowrap
                       fw-semibold"
            >
                Overview
            </a>


            <a
                href="#personalization"
                class="py-3
                       text-secondary
                       text-decoration-none
                       text-nowrap"
            >
                Personalization
            </a>


            <a
                href="#journey"
                class="py-3
                       text-secondary
                       text-decoration-none
                       text-nowrap"
            >
                How It Works
            </a>


            <a
                href="#benefits"
                class="py-3
                       text-secondary
                       text-decoration-none
                       text-nowrap"
            >
                Benefits
            </a>


            <a
                href="#related"
                class="py-3
                       text-secondary
                       text-decoration-none
                       text-nowrap"
            >
                More Digital Poojas
            </a>

        </div>

    </div>

</section>


{{-- ============================================================
     OVERVIEW
============================================================ --}}

<section
    id="overview"
    class="py-5"
>

    <div class="container py-lg-3">

        <div class="row g-5">


            <div class="col-12 col-lg-8">

                <span
                    class="small
                           text-pn-primary
                           fw-semibold
                           text-uppercase"
                >

                    About This Experience

                </span>


                <h2
                    class="font-serif
                           display-6
                           text-pn-brown
                           mt-2
                           mb-4"
                >

                    A personalized devotional journey.

                </h2>


                <p
                    class="text-secondary"
                >

                    {{ $pooja['description'] }}

                </p>


                <p
                    class="text-secondary"
                >

                    The Digital Pooja experience is designed around
                    personalization rather than simply presenting a
                    generic digital prayer. Your details, offerings,
                    language and Sankalpam become part of the planned
                    experience.

                </p>


                <p
                    class="text-secondary
                           mb-0"
                >

                    After completing the personalization steps, the
                    planned journey continues through temple animation,
                    mantras, flowers, deepam, Harathi and blessings,
                    followed by certificate generation where applicable.

                </p>

            </div>


            <div class="col-12 col-lg-4">

                <div
                    class="card
                           border
                           border-warning-subtle
                           rounded-4
                           bg-pn-cream
                           h-100"
                >

                    <div class="card-body p-4">

                        <h3
                            class="font-serif
                                   h4
                                   text-pn-brown
                                   mb-4"
                        >

                            At a Glance

                        </h3>


                        <div
                            class="vstack
                                   gap-3"
                        >

                            <div
                                class="d-flex
                                       justify-content-between"
                            >

                                <span
                                    class="small
                                           text-secondary"
                                >
                                    Deity
                                </span>


                                <strong class="small">
                                    {{ $pooja['god'] }}
                                </strong>

                            </div>


                            <div
                                class="d-flex
                                       justify-content-between"
                            >

                                <span
                                    class="small
                                           text-secondary"
                                >
                                    Duration
                                </span>


                                <strong class="small">
                                    {{ $pooja['duration'] }}
                                </strong>

                            </div>


                            <div
                                class="d-flex
                                       justify-content-between"
                            >

                                <span
                                    class="small
                                           text-secondary"
                                >
                                    Languages
                                </span>


                                <strong
                                    class="small
                                           text-end"
                                >

                                    Telugu / English

                                </strong>

                            </div>


                            <div
                                class="d-flex
                                       justify-content-between"
                            >

                                <span
                                    class="small
                                           text-secondary"
                                >
                                    Rating
                                </span>


                                <strong class="small">

                                    <i
                                        class="bi bi-star-fill
                                               text-pn-gold"
                                    ></i>

                                    {{ $pooja['rating'] }}

                                </strong>

                            </div>


                            <hr
                                class="border-warning-subtle"
                            >


                            <div
                                class="d-flex
                                       align-items-center
                                       justify-content-between"
                            >

                                <span
                                    class="text-secondary"
                                >
                                    Starting from
                                </span>


                                <strong
                                    class="font-serif
                                           fs-4
                                           text-pn-primary"
                                >

                                    ₹{{ number_format($pooja['price']) }}

                                </strong>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- ============================================================
     PERSONALIZATION
============================================================ --}}

<section
    id="personalization"
    class="py-5 bg-pn-cream"
>

    <div class="container py-lg-3">

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

                Personalized By Design

            </span>


            <h2
                class="font-serif
                       display-6
                       text-pn-brown
                       mt-2"
            >

                Make the experience your own.

            </h2>


            <div
                class="pn-divider
                       mx-auto
                       my-3"
            ></div>


            <p
                class="text-secondary
                       col-lg-7
                       mx-auto
                       mb-0"
            >

                The planned Digital Pooja experience brings several
                personalized elements together in one spiritual journey.

            </p>

        </div>


        <div
            class="row
                   row-cols-1
                   row-cols-sm-2
                   row-cols-lg-4
                   g-4"
        >

            @foreach($personalization as $item)

                <div class="col">

                    <div
                        class="card
                               border-0
                               bg-white
                               rounded-4
                               h-100
                               p-3"
                    >

                        <div class="card-body">

                            <div
                                class="rounded-circle
                                       d-flex
                                       align-items-center
                                       justify-content-center
                                       bg-pn-beige
                                       text-pn-primary
                                       fs-5
                                       mb-3"
                                style="width:52px;height:52px;"
                            >

                                <i
                                    class="bi {{ $item['icon'] }}"
                                ></i>

                            </div>


                            <h5
                                class="font-serif
                                       h5
                                       text-pn-brown"
                            >

                                {{ $item['title'] }}

                            </h5>


                            <p
                                class="small
                                       text-secondary
                                       mb-0"
                            >

                                {{ $item['text'] }}

                            </p>

                        </div>

                    </div>

                </div>

            @endforeach

        </div>

    </div>

</section>


{{-- ============================================================
     AI SANKALPAM FEATURE
============================================================ --}}

<section class="py-5">

    <div class="container py-lg-3">

        <div
            class="pn-digital
                   rounded-5
                   overflow-hidden
                   text-white"
        >

            <div class="row align-items-center">


                <div class="col-12 col-lg-7">

                    <div class="p-4 p-md-5">

                        <span
                            class="small
                                   text-warning
                                   fw-semibold
                                   text-uppercase"
                        >

                            Main USP

                        </span>


                        <h2
                            class="font-serif
                                   display-6
                                   mt-2
                                   mb-3"
                        >

                            Your Sankalpam,
                            personalized with AI.

                        </h2>


                        <p
                            class="text-white-50
                                   mb-4"
                        >

                            The planned Digital Pooja experience uses
                            the details you provide to create a
                            personalized Sankalpam as part of your
                            devotional journey.

                        </p>


                        <div
                            class="row
                                   row-cols-1
                                   row-cols-sm-2
                                   g-3"
                        >

                            <div class="col">

                                <div
                                    class="d-flex
                                           align-items-center
                                           gap-2"
                                >

                                    <i
                                        class="bi bi-check-circle-fill
                                               text-warning"
                                    ></i>


                                    <small>
                                        Family Details
                                    </small>

                                </div>

                            </div>


                            <div class="col">

                                <div
                                    class="d-flex
                                           align-items-center
                                           gap-2"
                                >

                                    <i
                                        class="bi bi-check-circle-fill
                                               text-warning"
                                    ></i>


                                    <small>
                                        Personalized Sankalpam
                                    </small>

                                </div>

                            </div>


                            <div class="col">

                                <div
                                    class="d-flex
                                           align-items-center
                                           gap-2"
                                >

                                    <i
                                        class="bi bi-check-circle-fill
                                               text-warning"
                                    ></i>


                                    <small>
                                        Name Pronunciation
                                    </small>

                                </div>

                            </div>


                            <div class="col">

                                <div
                                    class="d-flex
                                           align-items-center
                                           gap-2"
                                >

                                    <i
                                        class="bi bi-check-circle-fill
                                               text-warning"
                                    ></i>


                                    <small>
                                        Personalized Mantras
                                    </small>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>


                <div class="col-12 col-lg-5">

                    <div
                        class="text-center
                               p-4
                               p-md-5"
                    >

                        <div
                            class="mx-auto
                                   rounded-circle
                                   d-flex
                                   align-items-center
                                   justify-content-center
                                   bg-warning
                                   text-dark"
                            style="width:160px;height:160px;"
                        >

                            <i
                                class="bi bi-stars"
                                style="font-size:5rem;"
                            ></i>

                        </div>


                        <p
                            class="small
                                   text-white-50
                                   mt-3
                                   mb-0"
                        >

                            AI Personalized Spiritual Experience

                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- ============================================================
     JOURNEY
============================================================ --}}

<section
    id="journey"
    class="py-5 bg-light-subtle"
>

    <div class="container py-lg-3">

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

                Your Spiritual Journey

            </span>


            <h2
                class="font-serif
                       display-6
                       text-pn-brown
                       mt-2"
            >

                From selection to blessings.

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
                   row-cols-md-2
                   g-3"
        >

            @foreach($journey as $step)

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
                                       align-items-start
                                       gap-3"
                            >

                                <span
                                    class="badge
                                           rounded-pill
                                           bg-pn-beige
                                           text-pn-primary
                                           px-3
                                           py-2"
                                >

                                    {{ $step['number'] }}

                                </span>


                                <div
                                    class="rounded-circle
                                           d-flex
                                           align-items-center
                                           justify-content-center
                                           bg-pn-cream
                                           text-pn-primary
                                           fs-5
                                           flex-shrink-0"
                                    style="width:48px;height:48px;"
                                >

                                    <i
                                        class="bi {{ $step['icon'] }}"
                                    ></i>

                                </div>


                                <div>

                                    <h5
                                        class="font-serif
                                               h5
                                               text-pn-brown
                                               mb-1"
                                    >

                                        {{ $step['title'] }}

                                    </h5>


                                    <p
                                        class="small
                                               text-secondary
                                               mb-0"
                                    >

                                        {{ $step['text'] }}

                                    </p>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            @endforeach

        </div>

    </div>

</section>


{{-- ============================================================
     BENEFITS
============================================================ --}}

<section
    id="benefits"
    class="py-5"
>

    <div class="container py-lg-3">

        <div class="row g-5 align-items-center">

            <div class="col-12 col-lg-6">

                <span
                    class="small
                           text-pn-gold
                           fw-semibold
                           text-uppercase"
                >

                    Why Choose This Experience

                </span>


                <h2
                    class="font-serif
                           display-6
                           text-pn-brown
                           mt-2
                           mb-4"
                >

                    Meaningful devotion,
                    wherever you are.

                </h2>


                <div class="vstack gap-3">

                    @foreach($pooja['benefits'] as $benefit)

                        <div
                            class="d-flex
                                   align-items-start
                                   gap-3"
                        >

                            <div
                                class="rounded-circle
                                       d-flex
                                       align-items-center
                                       justify-content-center
                                       bg-pn-beige
                                       text-pn-primary
                                       flex-shrink-0"
                                style="width:42px;height:42px;"
                            >

                                <i
                                    class="bi bi-check-lg"
                                ></i>

                            </div>


                            <p
                                class="text-secondary
                                       mb-0
                                       pt-2"
                            >

                                {{ $benefit }}

                            </p>

                        </div>

                    @endforeach

                </div>

            </div>


            <div class="col-12 col-lg-6">

                <div
                    class="card
                           border
                           border-warning-subtle
                           rounded-5
                           bg-pn-cream"
                >

                    <div class="card-body p-4 p-md-5">

                        <div
                            class="text-center
                                   mb-4"
                        >

                            <div
                                class="mx-auto
                                       rounded-circle
                                       d-flex
                                       align-items-center
                                       justify-content-center
                                       bg-white
                                       text-pn-primary"
                                style="width:72px;height:72px;"
                            >

                                <i
                                    class="bi bi-heart
                                           fs-3"
                                ></i>

                            </div>


                            <h3
                                class="font-serif
                                       h3
                                       text-pn-brown
                                       mt-3"
                            >

                                A personal spiritual moment.

                            </h3>


                            <p
                                class="small
                                       text-secondary
                                       mb-0"
                            >

                                Designed to bring traditional devotion
                                into a convenient digital experience.

                            </p>

                        </div>


                        <div
                            class="row
                                   row-cols-2
                                   g-3"
                        >

                            <div class="col">

                                <div
                                    class="bg-white
                                           rounded-4
                                           p-3
                                           text-center
                                           h-100"
                                >

                                    <i
                                        class="bi bi-stars
                                               text-pn-primary
                                               fs-4"
                                    ></i>


                                    <strong
                                        class="d-block
                                               small
                                               mt-2"
                                    >

                                        AI Personalized

                                    </strong>

                                </div>

                            </div>


                            <div class="col">

                                <div
                                    class="bg-white
                                           rounded-4
                                           p-3
                                           text-center
                                           h-100"
                                >

                                    <i
                                        class="bi bi-flower1
                                               text-pn-primary
                                               fs-4"
                                    ></i>


                                    <strong
                                        class="d-block
                                               small
                                               mt-2"
                                    >

                                        Sacred Offerings

                                    </strong>

                                </div>

                            </div>


                            <div class="col">

                                <div
                                    class="bg-white
                                           rounded-4
                                           p-3
                                           text-center
                                           h-100"
                                >

                                    <i
                                        class="bi bi-translate
                                               text-pn-primary
                                               fs-4"
                                    ></i>


                                    <strong
                                        class="d-block
                                               small
                                               mt-2"
                                    >

                                        Multiple Languages

                                    </strong>

                                </div>

                            </div>


                            <div class="col">

                                <div
                                    class="bg-white
                                           rounded-4
                                           p-3
                                           text-center
                                           h-100"
                                >

                                    <i
                                        class="bi bi-award
                                               text-pn-primary
                                               fs-4"
                                    ></i>


                                    <strong
                                        class="d-block
                                               small
                                               mt-2"
                                    >

                                        Certificate

                                    </strong>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- ============================================================
     RELATED DIGITAL POOJAS
============================================================ --}}

<section
    id="related"
    class="py-5 bg-pn-cream"
>

    <div class="container py-lg-3">

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

                    Explore More

                </span>


                <h2
                    class="font-serif
                           display-6
                           text-pn-brown
                           mt-2
                           mb-0"
                >

                    More Digital Poojas

                </h2>

            </div>


            <a
                href="#"
                class="btn btn-pn-outline"
            >

                View All

                <i
                    class="bi bi-arrow-right ms-2"
                ></i>

            </a>

        </div>


        <div
            class="row
                   row-cols-1
                   row-cols-sm-2
                   row-cols-lg-3
                   g-4"
        >

            @foreach($relatedPoojas as $related)

                <div class="col">

                    <article
                        class="card
                               border-0
                               rounded-4
                               overflow-hidden
                               h-100"
                    >

                        <img
                            src="{{ Vite::asset('resources/images/home/' . $related['image']) }}"
                            class="card-img-top
                                   object-fit-cover"
                            style="height:240px;"
                            alt="{{ $related['name'] }}"
                            loading="lazy"
                        >


                        <div
                            class="card-body
                                   p-4"
                        >

                            <small
                                class="text-pn-primary
                                       fw-semibold"
                            >

                                {{ $related['god'] }}

                            </small>


                            <h3
                                class="font-serif
                                       h4
                                       text-pn-brown
                                       mt-2"
                            >

                                {{ $related['name'] }}

                            </h3>


                            <div
                                class="d-flex
                                       align-items-center
                                       justify-content-between
                                       mt-3"
                            >

                                <strong
                                    class="fs-5
                                           text-pn-primary"
                                >

                                    ₹{{ number_format($related['price']) }}

                                </strong>


                                <a
                                    href="#"
                                    class="btn
                                           btn-pn
                                           btn-sm"
                                >

                                    Explore

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
                           display-4
                           text-warning"
                ></i>


                <h2
                    class="font-serif
                           display-6
                           mt-3"
                >

                    Ready to personalize your Digital Pooja?

                </h2>


                <p
                    class="text-white-50
                           col-lg-7
                           mx-auto"
                >

                    Begin your journey by selecting your preferred
                    date and continuing to personalize the experience.

                </p>


                <a
                    href="#"
                    class="btn
                           btn-warning
                           text-dark
                           fw-semibold
                           px-4"
                >

                    Schedule Digital Pooja

                    <i
                        class="bi bi-arrow-right ms-2"
                    ></i>

                </a>

            </div>

        </div>

    </div>

</section>

@endsection