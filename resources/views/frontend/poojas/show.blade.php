@extends('layouts.app')

@section('title', 'Ganapathi Homam | Pooja Nilayam')

@section(
    'meta_description',
    'Learn about Ganapathi Homam, its benefits, procedure, materials and booking options with Pooja Nilayam.'
)

@section('content')

@php

    /*
    |--------------------------------------------------------------------------
    | Temporary UI Data
    |--------------------------------------------------------------------------
    | Frontend prototype data only.
    | This will later come from Controller / Service / Database.
    |--------------------------------------------------------------------------
    */

    $pooja = [
        'name' => 'Ganapathi Homam',

        'category' => 'Homam',

        'image' => 'ganapathi.jpg',

        'short_description' =>
            'A sacred Vedic ritual performed to seek the blessings of Lord Ganesha for success, prosperity and removal of obstacles.',

        'description' =>
            'Ganapathi Homam is a traditional Vedic fire ritual dedicated to Lord Ganesha. It is traditionally performed before beginning important activities and is associated with seeking blessings for success, wisdom, prosperity and the removal of obstacles.',

        'rating' => '4.9',

        'reviews' => '128',

        'duration' => '60 Mins',

        'starting_price' => '₹501',

        'location' => 'Hyderabad',

        'language' => 'Sanskrit & Telugu',

        'mode' => 'Online / In-Person',

        'priest' => [
            'name' => 'Sri Venkatesh Sharma',
            'image' => 'priest-1.jpg',
            'experience' => '18+ Years',
            'speciality' => 'Vedic Rituals',
            'rating' => '4.9'
        ]
    ];


    $benefits = [

        [
            'icon' => 'bi-shield-check',
            'title' => 'Removal of Obstacles',
            'text' => 'Traditionally performed to seek blessings for overcoming obstacles.'
        ],

        [
            'icon' => 'bi-graph-up-arrow',
            'title' => 'Success & Growth',
            'text' => 'Performed when seeking blessings for success in important endeavors.'
        ],

        [
            'icon' => 'bi-lightbulb',
            'title' => 'Wisdom & Clarity',
            'text' => 'Associated with seeking knowledge, wisdom and clarity.'
        ],

        [
            'icon' => 'bi-heart',
            'title' => 'Peace & Wellbeing',
            'text' => 'Creates a devotional atmosphere for peace and spiritual wellbeing.'
        ]

    ];


    $procedure = [

        [
            'step' => '01',
            'title' => 'Sankalpam',
            'text' => 'The ritual begins with the Sankalpam and invocation of divine blessings.'
        ],

        [
            'step' => '02',
            'title' => 'Ganapathi Invocation',
            'text' => 'Prayers and offerings are made to Lord Ganesha.'
        ],

        [
            'step' => '03',
            'title' => 'Homam',
            'text' => 'Sacred offerings are made into the fire while Vedic mantras are chanted.'
        ],

        [
            'step' => '04',
            'title' => 'Purnahuti',
            'text' => 'The homam concludes with the final offering and prayers for blessings.'
        ]

    ];


    $materials = [

        'Turmeric',
        'Kumkum',
        'Flowers',
        'Fruits',
        'Coconut',
        'Betel Leaves',
        'Ghee',
        'Homa Samagri'
    ];


    $faqs = [

        [
            'question' => 'How long does Ganapathi Homam take?',
            'answer' => 'The standard service duration is approximately 60 minutes. Actual duration may vary depending on the selected service and ritual requirements.'
        ],

        [
            'question' => 'Can I attend the pooja online?',
            'answer' => 'Online participation is available for services that support digital participation. The available mode will be shown during booking.'
        ],

        [
            'question' => 'Can I select a priest?',
            'answer' => 'Where priest selection is available, you can select a preferred priest during the booking process.'
        ],

        [
            'question' => 'Can I request prasadam?',
            'answer' => 'Prasadam availability depends on the selected service and location. Applicable options will be displayed during booking.'
        ]

    ];


    $relatedPoojas = [

        [
            'image' => 'rudrabhishekam.jpg',
            'name' => 'Rudrabhishekam',
            'description' => 'For peace, health and wellbeing.',
            'price' => '₹1,101',
            'rating' => '4.8'
        ],

        [
            'image' => 'lakshmi.jpg',
            'name' => 'Lakshmi Pooja',
            'description' => 'For prosperity and family happiness.',
            'price' => '₹501',
            'rating' => '4.9'
        ],

        [
            'image' => 'satyanarayana.jpg',
            'name' => 'Satyanarayana Pooja',
            'description' => 'For peace, blessings and harmony.',
            'price' => '₹601',
            'rating' => '4.8'
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
                        Poojas
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
     MAIN PO0JA INTRODUCTION
============================================================ --}}

<section class="py-5">

    <div class="container">

        <div class="row g-4 g-lg-5 align-items-start">


            {{-- =================================================
                 IMAGE
            ================================================= --}}

            <div class="col-12 col-lg-6">

                <div
                    class="position-relative
                           rounded-5
                           overflow-hidden
                           bg-pn-cream"
                >

                    <img
                        src="{{ Vite::asset('resources/images/home/' . $pooja['image']) }}"
                        class="img-fluid
                               w-100
                               object-fit-cover"
                        style="min-height:420px;"
                        alt="{{ $pooja['name'] }}"
                    >


                    {{-- Featured Badge --}}

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

                        <i class="bi bi-stars me-1"></i>

                        Popular Pooja

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
                        style="width:44px;height:44px;"
                        aria-label="Add to wishlist"
                    >

                        <i class="bi bi-heart"></i>

                    </button>

                </div>


                {{-- Thumbnail / Gallery placeholders --}}

                <div class="row g-2 mt-2">

                    @foreach([
                        'ganapathi.jpg',
                        'ganapathi.jpg',
                        'ganapathi.jpg'
                    ] as $galleryImage)

                        <div class="col-4">

                            <button
                                type="button"
                                class="btn
                                       p-0
                                       border
                                       rounded-3
                                       overflow-hidden
                                       w-100"
                            >

                                <img
                                    src="{{ Vite::asset('resources/images/home/' . $galleryImage) }}"
                                    class="img-fluid
                                           w-100
                                           object-fit-cover"
                                    style="height:90px;"
                                    alt="{{ $pooja['name'] }}"
                                >

                            </button>

                        </div>

                    @endforeach

                </div>

            </div>


            {{-- =================================================
                 DETAILS
            ================================================= --}}

            <div class="col-12 col-lg-6">

                <span
                    class="badge
                           rounded-pill
                           bg-pn-beige
                           text-pn-primary
                           px-3
                           py-2
                           mb-3"
                >

                    {{ $pooja['category'] }}

                </span>


                <h1
                    class="font-serif
                           display-5
                           text-pn-brown
                           mb-3"
                >

                    {{ $pooja['name'] }}

                </h1>


                <p
                    class="lead
                           text-secondary
                           mb-4"
                >

                    {{ $pooja['short_description'] }}

                </p>


                {{-- Rating --}}

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

                    </span>


                    <span
                        class="small
                               text-secondary"
                    >

                        {{ $pooja['reviews'] }} Reviews

                    </span>


                    <span
                        class="small
                               text-secondary"
                    >

                        <i
                            class="bi bi-patch-check-fill
                                   text-pn-primary
                                   me-1"
                        ></i>

                        Verified Service

                    </span>

                </div>


                {{-- Quick Info --}}

                <div
                    class="border
                           border-warning-subtle
                           rounded-4
                           p-3
                           mb-4"
                >

                    <div class="row g-3">

                        <div class="col-6">

                            <div
                                class="d-flex
                                       align-items-center
                                       gap-2"
                            >

                                <i
                                    class="bi bi-clock
                                           text-pn-primary
                                           fs-5"
                                ></i>

                                <div>

                                    <small
                                        class="text-secondary
                                               d-block"
                                    >
                                        Duration
                                    </small>

                                    <strong>
                                        {{ $pooja['duration'] }}
                                    </strong>

                                </div>

                            </div>

                        </div>


                        <div class="col-6">

                            <div
                                class="d-flex
                                       align-items-center
                                       gap-2"
                            >

                                <i
                                    class="bi bi-geo-alt
                                           text-pn-primary
                                           fs-5"
                                ></i>

                                <div>

                                    <small
                                        class="text-secondary
                                               d-block"
                                    >
                                        Location
                                    </small>

                                    <strong>
                                        {{ $pooja['location'] }}
                                    </strong>

                                </div>

                            </div>

                        </div>


                        <div class="col-6">

                            <div
                                class="d-flex
                                       align-items-center
                                       gap-2"
                            >

                                <i
                                    class="bi bi-translate
                                           text-pn-primary
                                           fs-5"
                                ></i>

                                <div>

                                    <small
                                        class="text-secondary
                                               d-block"
                                    >
                                        Language
                                    </small>

                                    <strong>
                                        {{ $pooja['language'] }}
                                    </strong>

                                </div>

                            </div>

                        </div>


                        <div class="col-6">

                            <div
                                class="d-flex
                                       align-items-center
                                       gap-2"
                            >

                                <i
                                    class="bi bi-camera-video
                                           text-pn-primary
                                           fs-5"
                                ></i>

                                <div>

                                    <small
                                        class="text-secondary
                                               d-block"
                                    >
                                        Mode
                                    </small>

                                    <strong>
                                        {{ $pooja['mode'] }}
                                    </strong>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>


                {{-- Price --}}

                <div class="mb-4">

                    <small
                        class="text-secondary
                               d-block"
                    >
                        Starting from
                    </small>


                    <strong
                        class="display-6
                               text-pn-primary
                               font-serif"
                    >

                        {{ $pooja['starting_price'] }}

                    </strong>

                </div>


                {{-- Booking CTA --}}

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

                        Book This Pooja

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
                            class="bi bi-share me-2"
                        ></i>

                        Share

                    </button>

                </div>


                {{-- Trust Message --}}

                <div
                    class="d-flex
                           align-items-center
                           gap-2
                           mt-4
                           small
                           text-secondary"
                >

                    <i
                        class="bi bi-shield-check
                               text-pn-primary
                               fs-5"
                    ></i>

                    Secure booking • Verified priests •
                    Transparent pricing

                </div>

            </div>

        </div>

    </div>

</section>


{{-- ============================================================
     BENEFITS
============================================================ --}}

<section class="bg-pn-cream py-5">

    <div class="container py-lg-3">

        <div class="text-center mb-5">

            <span
                class="pn-section-label
                       text-uppercase
                       text-pn-gold
                       small
                       fw-semibold"
            >
                Why Perform This Pooja?
            </span>


            <h2
                class="font-serif
                       display-6
                       text-pn-brown
                       mt-2"
            >

                Benefits & Blessings

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

            @foreach($benefits as $benefit)

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
     ABOUT THE POOJA
============================================================ --}}

<section class="py-5">

    <div class="container py-lg-3">

        <div class="row g-5">

            <div class="col-lg-8">

                <span
                    class="pn-section-label
                           text-uppercase
                           text-pn-gold
                           small
                           fw-semibold"
                >
                    About The Ritual
                </span>


                <h2
                    class="font-serif
                           display-6
                           text-pn-brown
                           mt-2
                           mb-3"
                >

                    About {{ $pooja['name'] }}

                </h2>


                <div class="pn-divider mb-4"></div>


                <p class="text-secondary">

                    {{ $pooja['description'] }}

                </p>


                <p class="text-secondary">

                    The ritual is performed according to traditional
                    practices, with the appropriate mantras,
                    offerings and devotional procedures.

                </p>


                <p class="text-secondary mb-0">

                    Devotees can choose the available service mode,
                    preferred date and other applicable options
                    during the booking process.

                </p>

            </div>


            <div class="col-lg-4">

                <div
                    class="card
                           border
                           border-warning-subtle
                           rounded-4
                           h-100"
                >

                    <div class="card-body p-4">

                        <h5
                            class="font-serif
                                   text-pn-brown
                                   mb-4"
                        >

                            Service Highlights

                        </h5>


                        <ul
                            class="list-unstyled
                                   mb-0"
                        >

                            <li
                                class="d-flex
                                       gap-2
                                       mb-3"
                            >

                                <i
                                    class="bi bi-check-circle-fill
                                           text-pn-primary"
                                ></i>

                                Traditional Vedic Ritual

                            </li>


                            <li
                                class="d-flex
                                       gap-2
                                       mb-3"
                            >

                                <i
                                    class="bi bi-check-circle-fill
                                           text-pn-primary"
                                ></i>

                                Experienced Priest

                            </li>


                            <li
                                class="d-flex
                                       gap-2
                                       mb-3"
                            >

                                <i
                                    class="bi bi-check-circle-fill
                                           text-pn-primary"
                                ></i>

                                Flexible Scheduling

                            </li>


                            <li
                                class="d-flex
                                       gap-2
                                       mb-3"
                            >

                                <i
                                    class="bi bi-check-circle-fill
                                           text-pn-primary"
                                ></i>

                                Online Participation Available

                            </li>


                            <li
                                class="d-flex
                                       gap-2"
                            >

                                <i
                                    class="bi bi-check-circle-fill
                                           text-pn-primary"
                                ></i>

                                Secure Booking

                            </li>

                        </ul>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- ============================================================
     PROCEDURE
============================================================ --}}

<section class="bg-pn-beige py-5">

    <div class="container py-lg-3">

        <div class="text-center mb-5">

            <span
                class="pn-section-label
                       text-uppercase
                       text-pn-gold
                       small
                       fw-semibold"
            >
                Traditional Process
            </span>


            <h2
                class="font-serif
                       display-6
                       text-pn-brown
                       mt-2"
            >

                How The Pooja Is Performed

            </h2>


            <div class="pn-divider mx-auto my-3"></div>

        </div>


        <div class="row g-4">

            @foreach($procedure as $item)

                <div class="col-12 col-md-6 col-lg-3">

                    <div
                        class="card
                               border-0
                               bg-white
                               rounded-4
                               h-100
                               p-3"
                    >

                        <div class="card-body">

                            <span
                                class="badge
                                       rounded-pill
                                       bg-pn-beige
                                       text-pn-primary
                                       mb-3"
                            >

                                {{ $item['step'] }}

                            </span>


                            <h5
                                class="font-serif
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
     MATERIALS
============================================================ --}}

<section class="py-5">

    <div class="container py-lg-3">

        <div class="row align-items-center g-5">

            <div class="col-lg-6">

                <span
                    class="pn-section-label
                           text-uppercase
                           text-pn-gold
                           small
                           fw-semibold"
                >
                    Pooja Requirements
                </span>


                <h2
                    class="font-serif
                           display-6
                           text-pn-brown
                           mt-2
                           mb-3"
                >

                    Pooja Materials

                </h2>


                <div class="pn-divider mb-4"></div>


                <p class="text-secondary">

                    The following are commonly used materials
                    for this ritual. The exact requirements may
                    vary depending on the selected service.

                </p>

            </div>


            <div class="col-lg-6">

                <div
                    class="row
                           row-cols-2
                           g-3"
                >

                    @foreach($materials as $material)

                        <div class="col">

                            <div
                                class="border
                                       border-warning-subtle
                                       rounded-3
                                       p-3
                                       bg-pn-cream"
                            >

                                <i
                                    class="bi bi-check-circle-fill
                                           text-pn-primary
                                           me-2"
                                ></i>

                                <span class="small fw-semibold">

                                    {{ $material }}

                                </span>

                            </div>

                        </div>

                    @endforeach

                </div>

            </div>

        </div>

    </div>

</section>


{{-- ============================================================
     PRIEST
============================================================ --}}

<section class="bg-pn-cream py-5">

    <div class="container py-lg-3">

        <div class="text-center mb-5">

            <span
                class="pn-section-label
                       text-uppercase
                       text-pn-gold
                       small
                       fw-semibold"
            >
                Your Ritual Expert
            </span>


            <h2
                class="font-serif
                       display-6
                       text-pn-brown
                       mt-2"
            >

                Experienced Priest

            </h2>


            <div class="pn-divider mx-auto my-3"></div>

        </div>


        <div class="row justify-content-center">

            <div class="col-12 col-md-8 col-lg-6">

                <div
                    class="card
                           border
                           border-warning-subtle
                           rounded-4
                           bg-white
                           p-3"
                >

                    <div
                        class="card-body
                               d-flex
                               flex-column
                               flex-sm-row
                               align-items-center
                               text-center
                               text-sm-start
                               gap-4"
                    >

                        <img
                            src="{{ Vite::asset('resources/images/home/' . $pooja['priest']['image']) }}"
                            class="rounded-circle
                                   object-fit-cover"
                            style="width:110px;height:110px;"
                            alt="{{ $pooja['priest']['name'] }}"
                        >


                        <div class="flex-grow-1">

                            <div
                                class="d-flex
                                       align-items-center
                                       justify-content-center
                                       justify-content-sm-start
                                       gap-2"
                            >

                                <h5
                                    class="font-serif
                                           text-pn-brown
                                           mb-0"
                                >

                                    {{ $pooja['priest']['name'] }}

                                </h5>


                                <i
                                    class="bi bi-patch-check-fill
                                           text-pn-primary"
                                    title="Verified Priest"
                                ></i>

                            </div>


                            <p
                                class="small
                                       text-secondary
                                       mb-2"
                            >

                                {{ $pooja['priest']['speciality'] }}

                            </p>


                            <div
                                class="d-flex
                                       flex-wrap
                                       justify-content-center
                                       justify-content-sm-start
                                       gap-3
                                       small"
                            >

                                <span>

                                    <i
                                        class="bi bi-award
                                               text-pn-primary
                                               me-1"
                                    ></i>

                                    {{ $pooja['priest']['experience'] }}

                                </span>


                                <span>

                                    <i
                                        class="bi bi-star-fill
                                               text-pn-gold
                                               me-1"
                                    ></i>

                                    {{ $pooja['priest']['rating'] }}

                                </span>

                            </div>

                        </div>


                        <a
                            href="#"
                            class="btn btn-pn-outline btn-sm"
                        >

                            View Profile

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- ============================================================
     BOOKING CTA
============================================================ --}}

<section class="py-5">

    <div class="container">

        <div
            class="pn-digital
                   rounded-5
                   overflow-hidden
                   text-white"
        >

            <div class="row align-items-center">

                <div class="col-lg-8">

                    <div class="p-4 p-md-5">

                        <span
                            class="small
                                   text-warning
                                   fw-semibold
                                   text-uppercase"
                        >
                            Begin Your Sacred Journey
                        </span>


                        <h2
                            class="font-serif
                                   display-6
                                   mt-2"
                        >

                            Ready to book
                            {{ $pooja['name'] }}?

                        </h2>


                        <p
                            class="text-white-50
                                   mb-4"
                        >

                            Select your preferred date and time,
                            provide your details and complete
                            your booking securely.

                        </p>


                        <a
                            href="#"
                            class="btn btn-warning
                                   text-dark
                                   fw-semibold
                                   px-4"
                        >

                            Book This Pooja

                            <i
                                class="bi bi-arrow-right ms-2"
                            ></i>

                        </a>

                    </div>

                </div>


                <div class="col-lg-4">

                    <div
                        class="p-4
                               p-md-5
                               text-center
                               text-lg-start"
                    >

                        <small
                            class="text-white-50
                                   d-block"
                        >
                            Starting from
                        </small>


                        <strong
                            class="display-5
                                   font-serif
                                   text-warning"
                        >

                            {{ $pooja['starting_price'] }}

                        </strong>


                        <small
                            class="text-white-50
                                   d-block
                                   mt-2"
                        >

                            Secure & convenient booking

                        </small>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- ============================================================
     FAQ
============================================================ --}}

<section class="py-5 bg-pn-cream">

    <div class="container py-lg-3">

        <div class="row justify-content-center">

            <div class="col-lg-9">

                <div class="text-center mb-5">

                    <span
                        class="pn-section-label
                               text-uppercase
                               text-pn-gold
                               small
                               fw-semibold"
                    >
                        Need Help?
                    </span>


                    <h2
                        class="font-serif
                               display-6
                               text-pn-brown
                               mt-2"
                    >

                        Frequently Asked Questions

                    </h2>


                    <div class="pn-divider mx-auto my-3"></div>

                </div>


                <div
                    class="accordion"
                    id="poojaFaq"
                >

                    @foreach($faqs as $index => $faq)

                        <div
                            class="accordion-item
                                   border
                                   border-warning-subtle
                                   rounded-3
                                   mb-3
                                   overflow-hidden"
                        >

                            <h2
                                class="accordion-header"
                                id="poojaFaqHeading{{ $index }}"
                            >

                                <button
                                    class="accordion-button
                                           {{ $index !== 0 ? 'collapsed' : '' }}
                                           bg-white
                                           fw-semibold"
                                    type="button"
                                    data-bs-toggle="collapse"
                                    data-bs-target="#poojaFaq{{ $index }}"
                                    aria-expanded="{{ $index === 0 ? 'true' : 'false' }}"
                                    aria-controls="poojaFaq{{ $index }}"
                                >

                                    {{ $faq['question'] }}

                                </button>

                            </h2>


                            <div
                                id="poojaFaq{{ $index }}"
                                class="accordion-collapse
                                       collapse
                                       {{ $index === 0 ? 'show' : '' }}"
                                data-bs-parent="#poojaFaq"
                            >

                                <div
                                    class="accordion-body
                                           text-secondary"
                                >

                                    {{ $faq['answer'] }}

                                </div>

                            </div>

                        </div>

                    @endforeach

                </div>

            </div>

        </div>

    </div>

</section>


{{-- ============================================================
     RELATED POOJAS
============================================================ --}}

<section class="py-5">

    <div class="container py-lg-3">

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
                    class="pn-section-label
                           text-uppercase
                           text-pn-gold
                           small
                           fw-semibold"
                >
                    You May Also Like
                </span>


                <h2
                    class="font-serif
                           display-6
                           text-pn-brown
                           mt-2
                           mb-2"
                >

                    Related Poojas

                </h2>


                <div class="pn-divider"></div>

            </div>


            <a
                href="#"
                class="btn btn-pn-outline"
            >

                View All Poojas

                <i
                    class="bi bi-arrow-right ms-2"
                ></i>

            </a>

        </div>


        <div class="row g-4">

            @foreach($relatedPoojas as $related)

                <div class="col-12 col-sm-6 col-lg-4">

                    <article
                        class="pn-pooja-card
                               card
                               border-0
                               rounded-4
                               overflow-hidden
                               bg-white
                               h-100"
                    >

                        <img
                            src="{{ Vite::asset('resources/images/home/' . $related['image']) }}"
                            class="pn-pooja-image
                                   card-img-top"
                            alt="{{ $related['name'] }}"
                            loading="lazy"
                        >


                        <div class="card-body p-4">

                            <div
                                class="d-flex
                                       align-items-center
                                       justify-content-between
                                       mb-2"
                            >

                                <span
                                    class="small
                                           text-pn-primary
                                           fw-semibold"
                                >
                                    Popular
                                </span>


                                <span class="small">

                                    <i
                                        class="bi bi-star-fill
                                               text-pn-gold"
                                    ></i>

                                    {{ $related['rating'] }}

                                </span>

                            </div>


                            <h5
                                class="font-serif
                                       text-pn-brown"
                            >

                                {{ $related['name'] }}

                            </h5>


                            <p
                                class="small
                                       text-secondary"
                            >

                                {{ $related['description'] }}

                            </p>


                            <div
                                class="d-flex
                                       align-items-center
                                       justify-content-between
                                       mt-4"
                            >

                                <strong
                                    class="fs-5
                                           text-pn-brown"
                                >

                                    {{ $related['price'] }}

                                </strong>


                                <a
                                    href="#"
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

    </div>

</section>


{{-- ============================================================
     FINAL CTA
============================================================ --}}

<section class="py-5">

    <div class="container">

        <div
            class="bg-pn-cream
                   border
                   border-warning-subtle
                   rounded-5
                   text-center
                   p-4
                   p-md-5"
        >

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

                Make your next occasion sacred.

            </h2>


            <p
                class="text-secondary
                       col-lg-6
                       mx-auto"
            >

                Explore more traditional poojas and discover
                the right ritual for your needs.

            </p>


            <a
                href="#"
                class="btn btn-pn px-4"
            >

                Explore All Poojas

                <i
                    class="bi bi-arrow-right ms-2"
                ></i>

            </a>

        </div>

    </div>

</section>

@endsection