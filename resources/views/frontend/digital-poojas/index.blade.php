@extends('layouts.app')

@section('title', 'Digital Pooja | Pooja Nilayam')

@section(
    'meta_description',
    'Experience personalized digital poojas with AI Sankalpam, personalized prayers, flowers, deepams, temple experiences and blessings.'
)

@section('content')

@php

    /*
    |--------------------------------------------------------------------------
    | TEMPORARY UI DATA
    |--------------------------------------------------------------------------
    | Frontend prototype data only.
    | These values will later come from Controller / Database.
    |--------------------------------------------------------------------------
    */


    /*
    |--------------------------------------------------------------------------
    | Digital Pooja Services
    |--------------------------------------------------------------------------
    */

    $digitalPoojas = [

        [
            'name' => 'Ganapathi Digital Pooja',

            'god' => 'Lord Ganesha',

            'image' => 'ganapathi.jpg',

            'description' =>
                'Begin your spiritual journey with a personalized Ganapathi pooja experience.',

            'price' => 251,

            'duration' => '20 Mins',

            'rating' => '4.9',

            'reviews' => 186,

            'language' => 'Telugu / English',

            'tag' => 'Popular',

            'features' => [
                'AI Sankalpam',
                'Personalized Mantra',
                'Flower Selection'
            ]

        ],

        [
            'name' => 'Lakshmi Digital Pooja',

            'god' => 'Goddess Lakshmi',

            'image' => 'lakshmi.jpg',

            'description' =>
                'Create a personalized devotional experience seeking blessings for prosperity and wellbeing.',

            'price' => 301,

            'duration' => '25 Mins',

            'rating' => '4.9',

            'reviews' => 154,

            'language' => 'Telugu / English',

            'tag' => 'Popular',

            'features' => [
                'AI Sankalpam',
                'Deepam Selection',
                'Personalized Blessings'
            ]

        ],

        [
            'name' => 'Shiva Digital Pooja',

            'god' => 'Lord Shiva',

            'image' => 'shiva.jpg',

            'description' =>
                'Experience a personalized Shiva devotional journey with sacred mantras and offerings.',

            'price' => 351,

            'duration' => '25 Mins',

            'rating' => '4.8',

            'reviews' => 129,

            'language' => 'Telugu / English',

            'tag' => 'Featured',

            'features' => [
                'AI Sankalpam',
                'Sacred Mantras',
                'Digital Deepam'
            ]

        ],

        [
            'name' => 'Durga Digital Pooja',

            'god' => 'Goddess Durga',

            'image' => 'durga.jpg',

            'description' =>
                'Offer your prayers through a personalized digital Durga pooja experience.',

            'price' => 301,

            'duration' => '20 Mins',

            'rating' => '4.8',

            'reviews' => 112,

            'language' => 'Telugu / English',

            'tag' => 'Featured',

            'features' => [
                'Personalized Prayer',
                'Flower Selection',
                'Blessings'
            ]

        ],

        [
            'name' => 'Hanuman Digital Pooja',

            'god' => 'Lord Hanuman',

            'image' => 'hanuman.jpg',

            'description' =>
                'A personalized devotional experience dedicated to Lord Hanuman.',

            'price' => 251,

            'duration' => '20 Mins',

            'rating' => '4.9',

            'reviews' => 98,

            'language' => 'Telugu / English',

            'tag' => 'Popular',

            'features' => [
                'AI Sankalpam',
                'Personalized Mantra',
                'Blessings'
            ]

        ],

        [
            'name' => 'Balaji Digital Pooja',

            'god' => 'Lord Venkateswara',

            'image' => 'balaji.jpg',

            'description' =>
                'Offer your prayers to Lord Venkateswara through a personalized digital temple experience.',

            'price' => 351,

            'duration' => '25 Mins',

            'rating' => '4.9',

            'reviews' => 141,

            'language' => 'Telugu / English',

            'tag' => 'Featured',

            'features' => [
                'AI Sankalpam',
                'Temple Experience',
                'Certificate'
            ]

        ]

    ];


    /*
    |--------------------------------------------------------------------------
    | Gods
    |--------------------------------------------------------------------------
    */

    $gods = [

        [
            'name' => 'Ganesha',
            'icon' => 'bi-flower1'
        ],

        [
            'name' => 'Shiva',
            'icon' => 'bi-circle'
        ],

        [
            'name' => 'Lakshmi',
            'icon' => 'bi-stars'
        ],

        [
            'name' => 'Durga',
            'icon' => 'bi-shield'
        ],

        [
            'name' => 'Hanuman',
            'icon' => 'bi-heart'
        ],

        [
            'name' => 'Balaji',
            'icon' => 'bi-building'
        ]

    ];


    /*
    |--------------------------------------------------------------------------
    | Digital Pooja Features
    |--------------------------------------------------------------------------
    */

    $features = [

        [
            'icon' => 'bi-stars',
            'title' => 'AI Sankalpam',
            'text' =>
                'Personalized Sankalpam created around your devotional purpose.'
        ],

        [
            'icon' => 'bi-flower1',
            'title' => 'Choose Flowers',
            'text' =>
                'Select your preferred flowers as part of your digital offering.'
        ],

        [
            'icon' => 'bi-brightness-high',
            'title' => 'Choose Deepam',
            'text' =>
                'Personalize the sacred deepam experience.'
        ],

        [
            'icon' => 'bi-translate',
            'title' => 'Your Language',
            'text' =>
                'Experience the devotional journey in your preferred language.'
        ],

        [
            'icon' => 'bi-music-note-beamed',
            'title' => 'Personalized Mantras',
            'text' =>
                'Experience personalized devotional mantras during the pooja.'
        ],

        [
            'icon' => 'bi-award',
            'title' => 'Blessings & Certificate',
            'text' =>
                'Complete your journey with blessings and a digital certificate.'
        ]

    ];


    /*
    |--------------------------------------------------------------------------
    | How It Works
    |--------------------------------------------------------------------------
    */

    $steps = [

        [
            'number' => '01',
            'title' => 'Choose Your God',
            'icon' => 'bi-stars'
        ],

        [
            'number' => '02',
            'title' => 'Personalize',
            'icon' => 'bi-sliders'
        ],

        [
            'number' => '03',
            'title' => 'AI Sankalpam',
            'icon' => 'bi-magic'
        ],

        [
            'number' => '04',
            'title' => 'Experience',
            'icon' => 'bi-camera-video'
        ],

        [
            'number' => '05',
            'title' => 'Blessings',
            'icon' => 'bi-flower1'
        ],

        [
            'number' => '06',
            'title' => 'Certificate',
            'icon' => 'bi-award'
        ]

    ];


    /*
    |--------------------------------------------------------------------------
    | FAQ
    |--------------------------------------------------------------------------
    */

    $faqs = [

        [
            'question' =>
                'What is a Digital Pooja?',

            'answer' =>
                'Digital Pooja is a personalized spiritual experience where devotees can select a God, personalize offerings and experience the devotional journey digitally.'
        ],

        [
            'question' =>
                'What can I personalize?',

            'answer' =>
                'The planned Digital Pooja experience includes flower selection, deepam selection, language selection, family details, AI-generated Sankalpam and personalized devotional elements.'
        ],

        [
            'question' =>
                'What is AI Sankalpam?',

            'answer' =>
                'AI Sankalpam is the planned personalized Sankalpam experience generated using the devotee information and purpose provided during the Digital Pooja journey.'
        ],

        [
            'question' =>
                'Will I receive a certificate?',

            'answer' =>
                'Certificate generation is part of the planned Digital Pooja experience and will be available after completion where applicable.'
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


                <li
                    class="breadcrumb-item active"
                    aria-current="page"
                >

                    Digital Pooja

                </li>

            </ol>

        </nav>

    </div>

</section>


{{-- ============================================================
     HERO
============================================================ --}}

<section
    class="bg-pn-cream
           position-relative
           overflow-hidden"
>

    <div class="container py-5 py-lg-6">

        <div
            class="row
                   align-items-center
                   g-5"
        >

            {{-- Left --}}

            <div class="col-12 col-lg-6">

                <span
                    class="pn-section-label
                           text-uppercase
                           text-pn-gold
                           small
                           fw-semibold"
                >

                    Personalized Spiritual Experience

                </span>


                <h1
                    class="font-serif
                           display-4
                           text-pn-brown
                           mt-3
                           mb-4"
                >

                    A sacred experience,
                    <span class="text-pn-primary">
                        made personal.
                    </span>

                </h1>


                <p
                    class="lead
                           text-secondary
                           mb-4"
                >

                    Experience personalized Digital Pooja with
                    AI Sankalpam, devotional mantras, flowers,
                    deepams, blessings and a meaningful spiritual
                    journey from wherever you are.

                </p>


                <div
                    class="d-flex
                           flex-column
                           flex-sm-row
                           gap-2
                           mb-4"
                >

                    <a
                        href="#digitalPoojas"
                        class="btn
                               btn-pn
                               btn-lg
                               px-4"
                    >

                        Explore Digital Poojas

                        <i
                            class="bi bi-arrow-down ms-2"
                        ></i>

                    </a>


                    <a
                        href="#howItWorks"
                        class="btn
                               btn-pn-outline
                               btn-lg
                               px-4"
                    >

                        How It Works

                    </a>

                </div>


                {{-- Trust points --}}

                <div
                    class="row
                           row-cols-1
                           row-cols-sm-3
                           g-3"
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
                                AI Personalized
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
                                Devotional
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
                                Digital Certificate
                            </small>

                        </div>

                    </div>

                </div>

            </div>


            {{-- Right Visual --}}

            <div class="col-12 col-lg-6">

                <div
                    class="position-relative
                           rounded-5
                           overflow-hidden
                           bg-pn-beige"
                >

                    <img
                        src="{{ Vite::asset('resources/images/home/hero.jpg') }}"
                        class="img-fluid
                               w-100
                               object-fit-cover"
                        style="min-height:430px;"
                        alt="Digital Pooja"
                        loading="eager"
                    >


                    {{-- Overlay --}}

                    <div
                        class="position-absolute
                               bottom-0
                               start-0
                               end-0
                               p-4"
                    >

                        <div
                            class="bg-dark
                                   bg-opacity-75
                                   rounded-4
                                   text-white
                                   p-3
                                   p-md-4"
                        >

                            <div
                                class="d-flex
                                       align-items-center
                                       gap-3"
                            >

                                <div
                                    class="rounded-circle
                                           d-flex
                                           align-items-center
                                           justify-content-center
                                           bg-warning
                                           text-dark"
                                    style="width:48px;height:48px;"
                                >

                                    <i
                                        class="bi bi-stars"
                                    ></i>

                                </div>


                                <div>

                                    <span
                                        class="small
                                               text-warning
                                               fw-semibold"
                                    >

                                        AI PERSONALIZED

                                    </span>


                                    <strong
                                        class="d-block"
                                    >

                                        Your Sankalpam.
                                        Your offerings.
                                        Your journey.

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
     GOD FILTER
============================================================ --}}

<section class="py-4 border-bottom bg-white">

    <div class="container">

        <div
            class="d-flex
                   flex-column
                   flex-lg-row
                   align-items-lg-center
                   justify-content-between
                   gap-3"
        >

            <div>

                <span
                    class="small
                           text-secondary"
                >

                    Explore by Deity

                </span>

            </div>


            <div
                class="d-flex
                       gap-2
                       overflow-auto
                       pb-1"
            >

                <button
                    type="button"
                    class="btn
                           btn-pn
                           btn-sm
                           flex-shrink-0"
                >

                    All

                </button>


                @foreach($gods as $god)

                    <button
                        type="button"
                        class="btn
                               btn-pn-outline
                               btn-sm
                               flex-shrink-0"
                    >

                        <i
                            class="bi {{ $god['icon'] }} me-1"
                        ></i>

                        {{ $god['name'] }}

                    </button>

                @endforeach

            </div>

        </div>

    </div>

</section>


{{-- ============================================================
     DIGITAL POOJA LISTING
============================================================ --}}

<section
    id="digitalPoojas"
    class="py-5"
>

    <div class="container py-lg-3">


        {{-- Heading --}}

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
                    class="pn-section-label
                           text-uppercase
                           text-pn-gold
                           small
                           fw-semibold"
                >

                    Choose Your Experience

                </span>


                <h2
                    class="font-serif
                           display-6
                           text-pn-brown
                           mt-2
                           mb-2"
                >

                    Digital Poojas

                </h2>


                <div class="pn-divider mb-3"></div>


                <p
                    class="text-secondary
                           mb-0"
                >

                    Choose a sacred experience and personalize
                    it according to your spiritual needs.

                </p>

            </div>


            {{-- Search --}}

            <div
                class="input-group
                       flex-nowrap"
                style="max-width:340px;"
            >

                <span
                    class="input-group-text
                           bg-white"
                >

                    <i class="bi bi-search"></i>

                </span>


                <input
                    type="search"
                    class="form-control"
                    placeholder="Search digital pooja..."
                    aria-label="Search digital pooja"
                >

            </div>

        </div>


        {{-- Cards --}}

        <div
            class="row
                   row-cols-1
                   row-cols-sm-2
                   row-cols-lg-3
                   g-4"
        >

            @foreach($digitalPoojas as $pooja)

                <div class="col">

                    <article
                        class="card
                               pn-pooja-card
                               border-0
                               rounded-4
                               overflow-hidden
                               h-100"
                    >

                        {{-- Image --}}

                        <div
                            class="position-relative
                                   overflow-hidden"
                        >

                            <img
                                src="{{ Vite::asset('resources/images/home/' . $pooja['image']) }}"
                                class="card-img-top
                                       pn-pooja-image
                                       object-fit-cover"
                                style="height:260px;"
                                alt="{{ $pooja['name'] }}"
                                loading="lazy"
                            >


                            {{-- Tag --}}

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

                                {{ $pooja['tag'] }}

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
                                style="width:42px;height:42px;"
                                aria-label="Add {{ $pooja['name'] }} to wishlist"
                            >

                                <i class="bi bi-heart"></i>

                            </button>

                        </div>


                        {{-- Content --}}

                        <div
                            class="card-body
                                   p-4
                                   d-flex
                                   flex-column"
                        >

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

                                    {{ $pooja['god'] }}

                                </span>


                                <span class="small">

                                    <i
                                        class="bi bi-star-fill
                                               text-pn-gold"
                                    ></i>

                                    {{ $pooja['rating'] }}

                                    <span
                                        class="text-secondary"
                                    >
                                        ({{ $pooja['reviews'] }})
                                    </span>

                                </span>

                            </div>


                            <h3
                                class="font-serif
                                       h4
                                       text-pn-brown
                                       mb-2"
                            >

                                {{ $pooja['name'] }}

                            </h3>


                            <p
                                class="small
                                       text-secondary
                                       mb-3"
                            >

                                {{ $pooja['description'] }}

                            </p>


                            {{-- Features --}}

                            <div
                                class="d-flex
                                       flex-wrap
                                       gap-2
                                       mb-4"
                            >

                                @foreach($pooja['features'] as $feature)

                                    <span
                                        class="badge
                                               bg-pn-cream
                                               text-pn-primary
                                               border
                                               border-warning-subtle"
                                    >

                                        <i
                                            class="bi bi-check-circle me-1"
                                        ></i>

                                        {{ $feature }}

                                    </span>

                                @endforeach

                            </div>


                            {{-- Meta --}}

                            <div
                                class="d-flex
                                       flex-wrap
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
                                        class="bi bi-translate
                                               text-pn-primary
                                               me-1"
                                    ></i>

                                    {{ $pooja['language'] }}

                                </span>

                            </div>


                            {{-- Bottom --}}

                            <div
                                class="d-flex
                                       align-items-center
                                       justify-content-between
                                       mt-auto
                                       pt-3
                                       border-top"
                            >

                                <div>

                                    <small
                                        class="text-secondary
                                               d-block"
                                    >

                                        Starting from

                                    </small>


                                    <strong
                                        class="fs-4
                                               font-serif
                                               text-pn-brown"
                                    >

                                        ₹{{ number_format($pooja['price']) }}

                                    </strong>

                                </div>


                                <a
                                    href="#"
                                    class="btn btn-pn"
                                >

                                    Explore

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


        {{-- Pagination --}}

        <div
            class="d-flex
                   justify-content-center
                   mt-5"
        >

            <nav aria-label="Digital Pooja pagination">

                <ul class="pagination mb-0">

                    <li
                        class="page-item disabled"
                    >

                        <span class="page-link">
                            Previous
                        </span>

                    </li>


                    <li
                        class="page-item active"
                        aria-current="page"
                    >

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
                            Next
                        </a>

                    </li>

                </ul>

            </nav>

        </div>

    </div>

</section>


{{-- ============================================================
     DIGITAL POOJA USP
============================================================ --}}

<section class="bg-pn-cream py-5">

    <div class="container py-lg-3">

        <div class="row align-items-center g-5">

            <div class="col-12 col-lg-6">

                <span
                    class="pn-section-label
                           text-uppercase
                           text-pn-gold
                           small
                           fw-semibold"
                >

                    Our Digital Spiritual Experience

                </span>


                <h2
                    class="font-serif
                           display-6
                           text-pn-brown
                           mt-2
                           mb-3"
                >

                    More than a digital prayer.

                </h2>


                <div class="pn-divider mb-4"></div>


                <p
                    class="text-secondary"
                >

                    Pooja Nilayam's Digital Pooja experience is
                    designed around personalization. Instead of
                    providing only a generic digital prayer,
                    the planned experience allows devotees to
                    participate in a personalized spiritual journey.

                </p>


                <p
                    class="text-secondary
                           mb-4"
                >

                    From selecting the deity and offerings to
                    generating a personalized Sankalpam and
                    completing the journey with blessings and
                    certificate generation, every stage is designed
                    to feel meaningful and personal.

                </p>


                <a
                    href="#howItWorks"
                    class="btn btn-pn"
                >

                    Discover the Experience

                    <i
                        class="bi bi-arrow-right ms-2"
                    ></i>

                </a>

            </div>


            <div class="col-12 col-lg-6">

                <div class="row g-3">

                    @foreach($features as $feature)

                        <div class="col-12 col-sm-6">

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
                                        style="width:50px;height:50px;"
                                    >

                                        <i
                                            class="bi {{ $feature['icon'] }}"
                                        ></i>

                                    </div>


                                    <h5
                                        class="font-serif
                                               text-pn-brown"
                                    >

                                        {{ $feature['title'] }}

                                    </h5>


                                    <p
                                        class="small
                                               text-secondary
                                               mb-0"
                                    >

                                        {{ $feature['text'] }}

                                    </p>

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
     HOW IT WORKS
============================================================ --}}

<section
    id="howItWorks"
    class="py-5"
>

    <div class="container py-lg-3">

        <div class="text-center mb-5">

            <span
                class="pn-section-label
                       text-uppercase
                       text-pn-gold
                       small
                       fw-semibold"
            >

                Simple & Meaningful

            </span>


            <h2
                class="font-serif
                       display-6
                       text-pn-brown
                       mt-2"
            >

                How Digital Pooja Works

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

                A simple digital journey that brings together
                personalization, devotion and sacred experiences.

            </p>

        </div>


        <div
            class="row
                   row-cols-2
                   row-cols-md-3
                   row-cols-lg-6
                   g-3"
        >

            @foreach($steps as $step)

                <div class="col">

                    <div
                        class="card
                               border
                               border-warning-subtle
                               rounded-4
                               h-100
                               text-center
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

                                {{ $step['number'] }}

                            </span>


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
                                style="width:58px;height:58px;"
                            >

                                <i
                                    class="bi {{ $step['icon'] }}"
                                ></i>

                            </div>


                            <h6
                                class="fw-semibold
                                       text-pn-brown
                                       mb-0"
                            >

                                {{ $step['title'] }}

                            </h6>

                        </div>

                    </div>

                </div>

            @endforeach

        </div>

    </div>

</section>


{{-- ============================================================
     PERSONALIZATION JOURNEY
============================================================ --}}

<section class="bg-pn-beige py-5">

    <div class="container py-lg-3">

        <div class="row align-items-center g-5">

            {{-- Visual --}}

            <div class="col-12 col-lg-6">

                <div
                    class="position-relative
                           rounded-5
                           overflow-hidden"
                >

                    <img
                        src="{{ Vite::asset('resources/images/home/hero.jpg') }}"
                        class="img-fluid
                               w-100
                               object-fit-cover"
                        style="min-height:380px;"
                        alt="Personalized Digital Pooja"
                        loading="lazy"
                    >


                    <div
                        class="position-absolute
                               top-0
                               start-0
                               m-3"
                    >

                        <span
                            class="badge
                                   rounded-pill
                                   bg-white
                                   text-pn-primary
                                   px-3
                                   py-2"
                        >

                            <i
                                class="bi bi-stars me-1"
                            ></i>

                            AI Personalized

                        </span>

                    </div>

                </div>

            </div>


            {{-- Content --}}

            <div class="col-12 col-lg-6">

                <span
                    class="pn-section-label
                           text-uppercase
                           text-pn-gold
                           small
                           fw-semibold"
                >

                    Designed Around You

                </span>


                <h2
                    class="font-serif
                           display-6
                           text-pn-brown
                           mt-2
                           mb-4"
                >

                    Your family.
                    Your purpose.
                    Your Sankalpam.

                </h2>


                <div class="vstack gap-3">

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
                                   bg-white
                                   text-pn-primary
                                   flex-shrink-0"
                            style="width:44px;height:44px;"
                        >

                            <i class="bi bi-person-vcard"></i>

                        </div>


                        <div>

                            <h6
                                class="fw-semibold
                                       text-pn-brown
                                       mb-1"
                            >

                                Enter Family Details

                            </h6>


                            <p
                                class="small
                                       text-secondary
                                       mb-0"
                            >

                                Provide the family information needed
                                for your personalized spiritual journey.

                            </p>

                        </div>

                    </div>


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
                                   bg-white
                                   text-pn-primary
                                   flex-shrink-0"
                            style="width:44px;height:44px;"
                        >

                            <i class="bi bi-stars"></i>

                        </div>


                        <div>

                            <h6
                                class="fw-semibold
                                       text-pn-brown
                                       mb-1"
                            >

                                AI Generates Sankalpam

                            </h6>


                            <p
                                class="small
                                       text-secondary
                                       mb-0"
                            >

                                The planned AI Sankalpam experience
                                creates a personalized devotional
                                Sankalpam.

                            </p>

                        </div>

                    </div>


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
                                   bg-white
                                   text-pn-primary
                                   flex-shrink-0"
                            style="width:44px;height:44px;"
                        >

                            <i class="bi bi-flower1"></i>

                        </div>


                        <div>

                            <h6
                                class="fw-semibold
                                       text-pn-brown
                                       mb-1"
                            >

                                Personalized Offerings

                            </h6>


                            <p
                                class="small
                                       text-secondary
                                       mb-0"
                            >

                                Choose flowers and deepams as part
                                of your personalized experience.

                            </p>

                        </div>

                    </div>


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
                                   bg-white
                                   text-pn-primary
                                   flex-shrink-0"
                            style="width:44px;height:44px;"
                        >

                            <i class="bi bi-award"></i>

                        </div>


                        <div>

                            <h6
                                class="fw-semibold
                                       text-pn-brown
                                       mb-1"
                            >

                                Blessings & Certificate

                            </h6>


                            <p
                                class="small
                                       text-secondary
                                       mb-0"
                            >

                                Complete the journey with blessings
                                and certificate generation where applicable.

                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- ============================================================
     WHY DIGITAL POOJA
============================================================ --}}

<section class="py-5">

    <div class="container py-lg-3">

        <div class="text-center mb-5">

            <span
                class="pn-section-label
                       text-uppercase
                       text-pn-gold
                       small
                       fw-semibold"
            >

                Why Digital Pooja?

            </span>


            <h2
                class="font-serif
                       display-6
                       text-pn-brown
                       mt-2"
            >

                Devotion From Wherever You Are

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
                   row-cols-lg-4
                   g-4"
        >

            <div class="col">

                <div
                    class="card
                           border-0
                           bg-pn-cream
                           rounded-4
                           h-100
                           text-center
                           p-4"
                >

                    <div class="card-body">

                        <i
                            class="bi bi-house-heart
                                   display-6
                                   text-pn-primary"
                        ></i>


                        <h5
                            class="font-serif
                                   text-pn-brown
                                   mt-3"
                        >

                            From Anywhere

                        </h5>


                        <p
                            class="small
                                   text-secondary
                                   mb-0"
                        >

                            Participate in a meaningful
                            devotional experience from wherever
                            you are.

                        </p>

                    </div>

                </div>

            </div>


            <div class="col">

                <div
                    class="card
                           border-0
                           bg-pn-cream
                           rounded-4
                           h-100
                           text-center
                           p-4"
                >

                    <div class="card-body">

                        <i
                            class="bi bi-person-heart
                                   display-6
                                   text-pn-primary"
                        ></i>


                        <h5
                            class="font-serif
                                   text-pn-brown
                                   mt-3"
                        >

                            Personal

                        </h5>


                        <p
                            class="small
                                   text-secondary
                                   mb-0"
                        >

                            Personalized family and Sankalpam
                            details make the experience meaningful.

                        </p>

                    </div>

                </div>

            </div>


            <div class="col">

                <div
                    class="card
                           border-0
                           bg-pn-cream
                           rounded-4
                           h-100
                           text-center
                           p-4"
                >

                    <div class="card-body">

                        <i
                            class="bi bi-stars
                                   display-6
                                   text-pn-primary"
                        ></i>


                        <h5
                            class="font-serif
                                   text-pn-brown
                                   mt-3"
                        >

                            AI Powered

                        </h5>


                        <p
                            class="small
                                   text-secondary
                                   mb-0"
                        >

                            AI Sankalpam is part of the platform's
                            planned personalized experience.

                        </p>

                    </div>

                </div>

            </div>


            <div class="col">

                <div
                    class="card
                           border-0
                           bg-pn-cream
                           rounded-4
                           h-100
                           text-center
                           p-4"
                >

                    <div class="card-body">

                        <i
                            class="bi bi-award
                                   display-6
                                   text-pn-primary"
                        ></i>


                        <h5
                            class="font-serif
                                   text-pn-brown
                                   mt-3"
                        >

                            Memorable

                        </h5>


                        <p
                            class="small
                                   text-secondary
                                   mb-0"
                        >

                            Blessings and certificate generation
                            complete the planned journey.

                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- ============================================================
     FAQ
============================================================ --}}

<section class="bg-pn-cream py-5">

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

                        Frequently Asked

                    </span>


                    <h2
                        class="font-serif
                               display-6
                               text-pn-brown
                               mt-2"
                    >

                        Digital Pooja FAQs

                    </h2>


                    <div
                        class="pn-divider
                               mx-auto
                               my-3"
                    ></div>

                </div>


                <div
                    class="accordion"
                    id="digitalPoojaFaq"
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
                                id="digitalFaqHeading{{ $index }}"
                            >

                                <button
                                    class="accordion-button
                                           {{ $index !== 0 ? 'collapsed' : '' }}
                                           bg-white
                                           fw-semibold"
                                    type="button"
                                    data-bs-toggle="collapse"
                                    data-bs-target="#digitalFaq{{ $index }}"
                                    aria-expanded="{{ $index === 0 ? 'true' : 'false' }}"
                                    aria-controls="digitalFaq{{ $index }}"
                                >

                                    {{ $faq['question'] }}

                                </button>

                            </h2>


                            <div
                                id="digitalFaq{{ $index }}"
                                class="accordion-collapse
                                       collapse
                                       {{ $index === 0 ? 'show' : '' }}"
                                data-bs-parent="#digitalPoojaFaq"
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
                class="row
                       align-items-center"
            >

                <div class="col-lg-8">

                    <div class="p-4 p-md-5">

                        <span
                            class="small
                                   text-warning
                                   fw-semibold
                                   text-uppercase"
                        >

                            Begin Your Digital Journey

                        </span>


                        <h2
                            class="font-serif
                                   display-6
                                   mt-2"
                        >

                            Bring devotion closer
                            to home.

                        </h2>


                        <p
                            class="text-white-50
                                   mb-4"
                        >

                            Choose your deity and create a personalized
                            Digital Pooja experience.

                        </p>


                        <a
                            href="#digitalPoojas"
                            class="btn
                                   btn-warning
                                   text-dark
                                   fw-semibold
                                   px-4"
                        >

                            Explore Digital Poojas

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
                               text-center"
                    >

                        <i
                            class="bi bi-stars
                                   display-1
                                   text-warning"
                        ></i>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

@endsection