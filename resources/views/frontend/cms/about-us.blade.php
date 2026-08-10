@extends('layouts.app')

@section('title', 'About Us | Pooja Nilayam')

@section(
    'meta_description',
    'Learn about Pooja Nilayam, our vision and mission to make authentic Hindu rituals, temples and spiritual services accessible to every devotee.'
)

@section('content')

@php

    /*
    |--------------------------------------------------------------------------
    | ABOUT US CONTENT
    |--------------------------------------------------------------------------
    | Content below is based on the finalized Pooja Nilayam
    | project planning documents.
    |
    | No unsupported company history, founder names, statistics
    | or claims are added at this UI stage.
    |--------------------------------------------------------------------------
    */


    $vision =
        "To become the world's largest digital spiritual ecosystem " .
        "where devotees can perform personalized online poojas, " .
        "book authentic temple poojas, purchase pooja materials, " .
        "make donations, learn mantras, and receive AI-powered " .
        "spiritual guidance.";


    $mission =
        "Digitize temples, priests, and spiritual services worldwide " .
        "while making authentic Hindu rituals accessible to every devotee.";


    $audiences = [

        [
            'title' => 'Devotees in India',
            'icon' => 'bi-geo-alt'
        ],

        [
            'title' => 'NRIs',
            'icon' => 'bi-globe2'
        ],

        [
            'title' => 'Elderly People',
            'icon' => 'bi-person-heart'
        ],

        [
            'title' => 'Busy Professionals',
            'icon' => 'bi-briefcase'
        ],

        [
            'title' => 'Daily Devotees',
            'icon' => 'bi-sunrise'
        ]

    ];


    $services = [

        [
            'title' => 'Temple Pooja Booking',
            'description' =>
                'Book authentic temple poojas with temple-wise '
                . 'services and available slots.',
            'icon' => 'bi-building'
        ],

        [
            'title' => 'Online Live Pooja',
            'description' =>
                'Participate in live spiritual experiences and '
                . 'receive recordings and completion updates.',
            'icon' => 'bi-camera-video'
        ],

        [
            'title' => 'AI Personalized Digital Pooja',
            'description' =>
                'Experience personalized digital devotion with '
                . 'AI Sankalpam, mantras, flowers and deepams.',
            'icon' => 'bi-stars'
        ],

        [
            'title' => 'Pooja Marketplace',
            'description' =>
                'Purchase pooja samagri and pooja kits through '
                . 'the online marketplace.',
            'icon' => 'bi-bag'
        ],

        [
            'title' => 'Donations',
            'description' =>
                'Support temples, NGOs, Annadanam and Goshala '
                . 'initiatives through donations.',
            'icon' => 'bi-heart'
        ],

        [
            'title' => 'Spiritual Learning',
            'description' =>
                'Explore mantras with audio, lyrics, meanings '
                . 'and language selection.',
            'icon' => 'bi-book'
        ]

    ];


    $digitalFeatures = [

        [
            'title' => 'AI Sankalpam',
            'icon' => 'bi-stars'
        ],

        [
            'title' => 'Personalized Name Pronunciation',
            'icon' => 'bi-person-check'
        ],

        [
            'title' => 'Flower Selection',
            'icon' => 'bi-flower1'
        ],

        [
            'title' => 'Deepam Selection',
            'icon' => 'bi-brightness-high'
        ],

        [
            'title' => 'Temple Animations',
            'icon' => 'bi-building'
        ],

        [
            'title' => 'Personalized Mantras',
            'icon' => 'bi-music-note-beamed'
        ],

        [
            'title' => 'Blessings',
            'icon' => 'bi-heart'
        ],

        [
            'title' => 'Certificate Generation',
            'icon' => 'bi-award'
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
                    About Us
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
                   g-4
                   g-lg-5"
        >

            <div class="col-12 col-lg-7">

                <span
                    class="small
                           text-pn-gold
                           fw-semibold
                           text-uppercase"
                >
                    About Pooja Nilayam
                </span>


                <h1
                    class="font-serif
                           display-3
                           text-pn-brown
                           mt-2
                           mb-4"
                >

                    Bringing Spirituality
                    <span
                        class="text-pn-primary"
                    >
                        Closer
                    </span>
                    to Every Devotee

                </h1>


                <p
                    class="lead
                           text-secondary
                           col-lg-10
                           mb-4"
                >

                    Pooja Nilayam is envisioned as a digital spiritual
                    ecosystem connecting devotees with authentic
                    Hindu rituals, temples, priests, digital pooja
                    experiences, spiritual learning and devotional
                    services.

                </p>


                <div
                    class="d-flex
                           flex-wrap
                           gap-2"
                >

                    <a
                        href="{{ url('/poojas') }}"
                        class="btn btn-pn"
                    >

                        Explore Poojas

                        <i
                            class="bi bi-arrow-right ms-1"
                        ></i>

                    </a>


                    <a
                        href="{{ url('/contact-us') }}"
                        class="btn btn-pn-outline"
                    >

                        Contact Us

                    </a>

                </div>

            </div>


            {{-- Spiritual Visual --}}

            <div class="col-12 col-lg-5">

                <div
                    class="rounded-5
                           bg-white
                           border
                           border-warning-subtle
                           shadow-sm
                           p-3"
                >

                    <div
                        class="rounded-4
                               bg-pn-beige
                               d-flex
                               align-items-center
                               justify-content-center
                               text-center
                               p-5"
                        style="min-height:360px;"
                    >

                        <div>

                            <div
                                class="rounded-circle
                                       bg-pn-cream
                                       text-pn-primary
                                       d-flex
                                       align-items-center
                                       justify-content-center
                                       mx-auto
                                       mb-4"
                                style="width:90px;height:90px;"
                            >

                                <i
                                    class="bi bi-flower1
                                           display-5"
                                ></i>

                            </div>


                            <h2
                                class="font-serif
                                       h2
                                       text-pn-brown
                                       mb-2"
                            >
                                A Digital Spiritual Ecosystem
                            </h2>


                            <p
                                class="small
                                       text-secondary
                                       mb-0"
                            >

                                Connecting devotion, authentic
                                rituals and technology in one place.

                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- ============================================================
     INTRODUCTION
============================================================ --}}

<section class="py-5">

    <div class="container">

        <div
            class="row
                   justify-content-center"
        >

            <div class="col-12 col-lg-9 text-center">

                <span
                    class="small
                           text-pn-gold
                           fw-semibold
                           text-uppercase"
                >
                    Our Purpose
                </span>


                <h2
                    class="font-serif
                           display-6
                           text-pn-brown
                           mt-2
                           mb-3"
                >
                    Making Authentic Rituals More Accessible
                </h2>


                <div
                    class="pn-divider
                           mx-auto
                           mb-4"
                ></div>


                <p
                    class="text-secondary
                           lh-lg
                           mb-3"
                >

                    Pooja Nilayam is designed to bring together
                    devotees, temples, priests and spiritual
                    services through a single digital platform.

                </p>


                <p
                    class="text-secondary
                           lh-lg
                           mb-0"
                >

                    The platform combines traditional Hindu rituals
                    with digital experiences so devotees can
                    participate in spiritual services from wherever
                    they are.

                </p>

            </div>

        </div>

    </div>

</section>


{{-- ============================================================
     VISION & MISSION
============================================================ --}}

<section class="bg-pn-beige py-5">

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
                Our Direction
            </span>


            <h2
                class="font-serif
                       display-6
                       text-pn-brown
                       mt-2"
            >
                Vision & Mission
            </h2>

        </div>


        <div
            class="row
                   g-4"
        >

            {{-- Vision --}}

            <div class="col-12 col-lg-6">

                <article
                    class="card
                           border
                           border-warning-subtle
                           rounded-5
                           h-100"
                >

                    <div
                        class="card-body
                               p-4
                               p-md-5"
                    >

                        <div
                            class="rounded-circle
                                   bg-pn-cream
                                   text-pn-primary
                                   d-flex
                                   align-items-center
                                   justify-content-center
                                   mb-4"
                            style="width:62px;height:62px;"
                        >

                            <i
                                class="bi bi-eye
                                       fs-4"
                            ></i>

                        </div>


                        <span
                            class="small
                                   text-pn-gold
                                   fw-semibold
                                   text-uppercase"
                        >
                            Vision
                        </span>


                        <h3
                            class="font-serif
                                   h3
                                   text-pn-brown
                                   mt-2
                                   mb-3"
                        >
                            A Global Digital Spiritual Ecosystem
                        </h3>


                        <p
                            class="text-secondary
                                   lh-lg
                                   mb-0"
                        >

                            {{ $vision }}

                        </p>

                    </div>

                </article>

            </div>


            {{-- Mission --}}

            <div class="col-12 col-lg-6">

                <article
                    class="card
                           border
                           border-warning-subtle
                           rounded-5
                           h-100"
                >

                    <div
                        class="card-body
                               p-4
                               p-md-5"
                    >

                        <div
                            class="rounded-circle
                                   bg-pn-cream
                                   text-pn-primary
                                   d-flex
                                   align-items-center
                                   justify-content-center
                                   mb-4"
                            style="width:62px;height:62px;"
                        >

                            <i
                                class="bi bi-bullseye
                                       fs-4"
                            ></i>

                        </div>


                        <span
                            class="small
                                   text-pn-gold
                                   fw-semibold
                                   text-uppercase"
                        >
                            Mission
                        </span>


                        <h3
                            class="font-serif
                                   h3
                                   text-pn-brown
                                   mt-2
                                   mb-3"
                        >
                            Authentic Rituals Within Reach
                        </h3>


                        <p
                            class="text-secondary
                                   lh-lg
                                   mb-0"
                        >

                            {{ $mission }}

                        </p>

                    </div>

                </article>

            </div>

        </div>

    </div>

</section>


{{-- ============================================================
     WHAT WE BRING TOGETHER
============================================================ --}}

<section class="py-5">

    <div class="container">

        <div
            class="row
                   align-items-center
                   g-4
                   g-lg-5"
        >

            <div class="col-12 col-lg-5">

                <span
                    class="small
                           text-pn-gold
                           fw-semibold
                           text-uppercase"
                >
                    One Platform
                </span>


                <h2
                    class="font-serif
                           display-6
                           text-pn-brown
                           mt-2
                           mb-3"
                >

                    Many Ways to
                    <span
                        class="text-pn-primary"
                    >
                        Experience Devotion
                    </span>

                </h2>


                <p
                    class="text-secondary
                           lh-lg
                           mb-4"
                >

                    Pooja Nilayam brings multiple spiritual services
                    together so devotees can discover, participate,
                    learn and stay connected with their spiritual
                    journey.

                </p>


                <a
                    href="{{ route('home') }}"
                    class="btn btn-pn-outline"
                >

                    Explore Our Services

                    <i
                        class="bi bi-arrow-right ms-1"
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

                    @foreach(
                        $services as $service
                    )

                        <div class="col">

                            <article
                                class="card
                                       border
                                       border-warning-subtle
                                       rounded-5
                                       h-100"
                            >

                                <div
                                    class="card-body
                                           p-4"
                                >

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
                                            class="bi {{ $service['icon'] }}
                                                   fs-5"
                                        ></i>

                                    </div>


                                    <h3
                                        class="font-serif
                                               h5
                                               text-pn-brown
                                               mb-2"
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

                            </article>

                        </div>

                    @endforeach

                </div>

            </div>

        </div>

    </div>

</section>


{{-- ============================================================
     MAIN USP
============================================================ --}}

<section class="bg-pn-beige py-5">

    <div class="container">

        <div
            class="pn-digital
                   rounded-5
                   overflow-hidden
                   text-white"
        >

            <div class="p-4 p-md-5">

                <div
                    class="row
                           align-items-center
                           g-4"
                >

                    <div class="col-12 col-lg-6">

                        <span
                            class="small
                                   text-warning
                                   fw-semibold
                                   text-uppercase"
                        >
                            Our Main USP
                        </span>


                        <h2
                            class="font-serif
                                   display-6
                                   mt-2
                                   mb-3"
                        >

                            AI Personalized
                            Digital Pooja

                        </h2>


                        <p
                            class="text-white-50
                                   lh-lg
                                   mb-4"
                        >

                            Pooja Nilayam's AI Personalized Digital
                            Pooja is designed to create a more
                            personalized spiritual experience by
                            combining technology with devotional
                            elements.

                        </p>


                        <a
                            href="{{ url('/digital-pooja') }}"
                            class="btn
                                   btn-warning
                                   text-dark
                                   fw-semibold"
                        >

                            Explore Digital Pooja

                            <i
                                class="bi bi-arrow-right ms-2"
                            ></i>

                        </a>

                    </div>


                    <div class="col-12 col-lg-6">

                        <div
                            class="row
                                   row-cols-2
                                   g-3"
                        >

                            @foreach(
                                $digitalFeatures as $feature
                            )

                                <div class="col">

                                    <div
                                        class="bg-white
                                               bg-opacity-10
                                               border
                                               border-white
                                               border-opacity-10
                                               rounded-4
                                               p-3
                                               h-100"
                                    >

                                        <i
                                            class="bi {{ $feature['icon'] }}
                                                   text-warning
                                                   fs-5"
                                        ></i>


                                        <span
                                            class="d-block
                                                   small
                                                   mt-2"
                                        >

                                            {{ $feature['title'] }}

                                        </span>

                                    </div>

                                </div>

                            @endforeach

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- ============================================================
     WHO WE SERVE
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
                Who We Serve
            </span>


            <h2
                class="font-serif
                       display-6
                       text-pn-brown
                       mt-2
                       mb-3"
            >
                Devotion Without Distance
            </h2>


            <p
                class="text-secondary
                       mx-auto
                       mb-0"
                style="max-width:700px;"
            >

                The platform is designed for devotees with different
                lifestyles and locations, including people in India,
                NRIs, elderly people, busy professionals and daily
                devotees.

            </p>

        </div>


        <div
            class="row
                   row-cols-2
                   row-cols-md-3
                   row-cols-lg-5
                   g-3
                   justify-content-center"
        >

            @foreach(
                $audiences as $audience
            )

                <div class="col">

                    <div
                        class="card
                               border
                               border-warning-subtle
                               rounded-5
                               h-100
                               text-center"
                    >

                        <div
                            class="card-body
                                   p-4"
                        >

                            <div
                                class="rounded-circle
                                       bg-pn-cream
                                       text-pn-primary
                                       d-flex
                                       align-items-center
                                       justify-content-center
                                       mx-auto
                                       mb-3"
                                style="width:58px;height:58px;"
                            >

                                <i
                                    class="bi {{ $audience['icon'] }}
                                           fs-5"
                                ></i>

                            </div>


                            <h3
                                class="font-serif
                                       h6
                                       text-pn-brown
                                       mb-0"
                            >

                                {{ $audience['title'] }}

                            </h3>

                        </div>

                    </div>

                </div>

            @endforeach

        </div>

    </div>

</section>


{{-- ============================================================
     DIGITAL + TRADITION
============================================================ --}}

<section class="bg-pn-cream py-5">

    <div class="container">

        <div
            class="row
                   align-items-center
                   g-4
                   g-lg-5"
        >

            <div class="col-12 col-lg-6">

                <div
                    class="bg-white
                           rounded-5
                           border
                           border-warning-subtle
                           p-4
                           p-md-5"
                >

                    <div
                        class="d-flex
                               align-items-center
                               gap-3
                               mb-4"
                    >

                        <div
                            class="rounded-circle
                                   bg-pn-primary
                                   text-white
                                   d-flex
                                   align-items-center
                                   justify-content-center"
                            style="width:58px;height:58px;"
                        >

                            <i
                                class="bi bi-lamp
                                       fs-4"
                            ></i>

                        </div>


                        <div>

                            <span
                                class="small
                                       text-pn-gold
                                       fw-semibold
                                       text-uppercase"
                            >
                                Tradition
                            </span>


                            <h2
                                class="font-serif
                                       h3
                                       text-pn-brown
                                       mb-0"
                            >
                                Authentic Spiritual Practices
                            </h2>

                        </div>

                    </div>


                    <p
                        class="text-secondary
                               lh-lg
                               mb-0"
                    >

                        Pooja Nilayam is built around authentic Hindu
                        rituals and spiritual services while using
                        technology to make those experiences easier
                        to access.

                    </p>

                </div>

            </div>


            <div class="col-12 col-lg-6">

                <div
                    class="bg-white
                           rounded-5
                           border
                           border-warning-subtle
                           p-4
                           p-md-5"
                >

                    <div
                        class="d-flex
                               align-items-center
                               gap-3
                               mb-4"
                    >

                        <div
                            class="rounded-circle
                                   bg-pn-primary
                                   text-white
                                   d-flex
                                   align-items-center
                                   justify-content-center"
                            style="width:58px;height:58px;"
                        >

                            <i
                                class="bi bi-cpu
                                       fs-4"
                            ></i>

                        </div>


                        <div>

                            <span
                                class="small
                                       text-pn-gold
                                       fw-semibold
                                       text-uppercase"
                            >
                                Technology
                            </span>


                            <h2
                                class="font-serif
                                       h3
                                       text-pn-brown
                                       mb-0"
                            >
                                Thoughtfully Connected
                            </h2>

                        </div>

                    </div>


                    <p
                        class="text-secondary
                               lh-lg
                               mb-0"
                    >

                        Digital services, live experiences,
                        personalized technology and online access
                        are used to help devotees stay connected
                        with their spiritual journey.

                    </p>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- ============================================================
     WHAT MAKES THE PLATFORM DIFFERENT
============================================================ --}}

<section class="py-5">

    <div class="container">

        <div
            class="row
                   justify-content-center"
        >

            <div class="col-12 col-lg-9 text-center">

                <span
                    class="small
                           text-pn-gold
                           fw-semibold
                           text-uppercase"
                >
                    Our Ecosystem
                </span>


                <h2
                    class="font-serif
                           display-6
                           text-pn-brown
                           mt-2
                           mb-3"
                >
                    More Than a Single Service
                </h2>


                <div
                    class="pn-divider
                           mx-auto
                           mb-4"
                ></div>


                <p
                    class="text-secondary
                           lh-lg
                           mb-0"
                >

                    Pooja Nilayam brings together temple pooja
                    booking, online live pooja, AI Personalized
                    Digital Pooja, marketplace services, donations
                    and spiritual learning as part of one connected
                    ecosystem.

                </p>

            </div>

        </div>


        <div
            class="row
                   row-cols-2
                   row-cols-md-3
                   row-cols-lg-6
                   g-3
                   mt-4"
        >

            @foreach([
                ['Temple Pooja', 'bi-building'],
                ['Live Pooja', 'bi-camera-video'],
                ['Digital Pooja', 'bi-stars'],
                ['Marketplace', 'bi-bag'],
                ['Donations', 'bi-heart'],
                ['Learning', 'bi-book']
            ] as $item)

                <div class="col">

                    <div
                        class="text-center
                               p-3"
                    >

                        <div
                            class="rounded-circle
                                   bg-pn-cream
                                   text-pn-primary
                                   d-flex
                                   align-items-center
                                   justify-content-center
                                   mx-auto
                                   mb-3"
                            style="width:58px;height:58px;"
                        >

                            <i
                                class="bi {{ $item[1] }}
                                       fs-5"
                            ></i>

                        </div>


                        <h3
                            class="small
                                   fw-semibold
                                   text-pn-brown
                                   mb-0"
                        >

                            {{ $item[0] }}

                        </h3>

                    </div>

                </div>

            @endforeach

        </div>

    </div>

</section>


{{-- ============================================================
     CTA
============================================================ --}}

<section class="bg-pn-beige py-5">

    <div class="container">

        <div
            class="pn-digital
                   rounded-5
                   overflow-hidden
                   text-white"
        >

            <div class="p-4 p-md-5">

                <div
                    class="row
                           align-items-center
                           g-4"
                >

                    <div class="col-12 col-lg-8">

                        <span
                            class="small
                                   text-warning
                                   fw-semibold
                                   text-uppercase"
                        >
                            Begin Your Journey
                        </span>


                        <h2
                            class="font-serif
                                   display-6
                                   mt-2
                                   mb-2"
                        >

                            Experience Pooja Nilayam

                        </h2>


                        <p
                            class="text-white-50
                                   mb-0"
                        >

                            Discover authentic poojas, temples,
                            priests, digital experiences, astrology,
                            spiritual learning and more.

                        </p>

                    </div>


                    <div
                        class="col-12 col-lg-4
                               text-lg-end"
                    >

                        <a
                            href="{{ route('home') }}"
                            class="btn
                                   btn-warning
                                   text-dark
                                   fw-semibold
                                   px-4"
                        >

                            Explore Pooja Nilayam

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

@endsection