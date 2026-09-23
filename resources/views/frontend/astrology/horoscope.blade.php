@extends('layouts.app')

@section('title', 'Horoscope | Pooja Nilayam')

@section(
    'meta_description',
    'Explore horoscope services through Pooja Nilayam and discover astrology guidance for your journey.'
)

@section('content')

@php

    /*
    |--------------------------------------------------------------------------
    | TEMPORARY HOROSCOPE UI DATA
    |--------------------------------------------------------------------------
    | These values are only for the UI prototype.
    | Actual horoscope data/calculations will come later from the
    | controller/service layer.
    |--------------------------------------------------------------------------
    */

    $zodiacSigns = [

        [
            'name' => 'Aries',
            'symbol' => '♈',
            'date' => 'Mar 21 – Apr 19',
            'icon' => 'bi-stars'
        ],

        [
            'name' => 'Taurus',
            'symbol' => '♉',
            'date' => 'Apr 20 – May 20',
            'icon' => 'bi-circle'
        ],

        [
            'name' => 'Gemini',
            'symbol' => '♊',
            'date' => 'May 21 – Jun 20',
            'icon' => 'bi-intersect'
        ],

        [
            'name' => 'Cancer',
            'symbol' => '♋',
            'date' => 'Jun 21 – Jul 22',
            'icon' => 'bi-moon-stars'
        ],

        [
            'name' => 'Leo',
            'symbol' => '♌',
            'date' => 'Jul 23 – Aug 22',
            'icon' => 'bi-sun'
        ],

        [
            'name' => 'Virgo',
            'symbol' => '♍',
            'date' => 'Aug 23 – Sep 22',
            'icon' => 'bi-flower1'
        ],

        [
            'name' => 'Libra',
            'symbol' => '♎',
            'date' => 'Sep 23 – Oct 22',
            'icon' => 'bi-balance'
        ],

        [
            'name' => 'Scorpio',
            'symbol' => '♏',
            'date' => 'Oct 23 – Nov 21',
            'icon' => 'bi-droplet'
        ],

        [
            'name' => 'Sagittarius',
            'symbol' => '♐',
            'date' => 'Nov 22 – Dec 21',
            'icon' => 'bi-arrow-up-right'
        ],

        [
            'name' => 'Capricorn',
            'symbol' => '♑',
            'date' => 'Dec 22 – Jan 19',
            'icon' => 'bi-triangle'
        ],

        [
            'name' => 'Aquarius',
            'symbol' => '♒',
            'date' => 'Jan 20 – Feb 18',
            'icon' => 'bi-water'
        ],

        [
            'name' => 'Pisces',
            'symbol' => '♓',
            'date' => 'Feb 19 – Mar 20',
            'icon' => 'bi-stars'
        ]

    ];


    /*
    |--------------------------------------------------------------------------
    | TEMPORARY HOROSCOPE TYPES
    |--------------------------------------------------------------------------
    */

    $horoscopeTypes = [

        [
            'title' => 'Daily Horoscope',
            'description' =>
                'A quick daily astrology guidance experience.',
            'icon' => 'bi-sunrise'
        ],

        [
            'title' => 'Weekly Horoscope',
            'description' =>
                'Explore horoscope guidance for the week ahead.',
            'icon' => 'bi-calendar-week'
        ],

        [
            'title' => 'Monthly Horoscope',
            'description' =>
                'Explore broader monthly horoscope guidance.',
            'icon' => 'bi-calendar3'
        ]

    ];


    /*
    |--------------------------------------------------------------------------
    | TEMPORARY INSIGHT AREAS
    |--------------------------------------------------------------------------
    */

    $insightAreas = [

        [
            'title' => 'Career',
            'icon' => 'bi-briefcase'
        ],

        [
            'title' => 'Relationships',
            'icon' => 'bi-heart'
        ],

        [
            'title' => 'Finance',
            'icon' => 'bi-wallet2'
        ],

        [
            'title' => 'Family',
            'icon' => 'bi-people'
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
                        Astrology
                    </a>

                </li>


                <li
                    class="breadcrumb-item active"
                    aria-current="page"
                >
                    Horoscope
                </li>

            </ol>

        </nav>

    </div>

</section>


{{-- ============================================================
     HERO
============================================================ --}}

<section class="bg-pn-cream py-5 overflow-hidden">

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

                    Astrology

                </span>


                <h1
                    class="font-serif
                           display-3
                           text-pn-brown
                           mt-2
                           mb-3"
                >

                    Explore your
                    <span class="text-pn-primary">
                        horoscope.
                    </span>

                </h1>


                <p
                    class="lead
                           text-secondary
                           mb-4"
                >

                    Choose your zodiac sign and explore the
                    available horoscope experience through
                    Pooja Nilayam.

                </p>


                {{-- Sign Search --}}

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
                        class="form-control
                               border-0
                               shadow-none"
                        placeholder="Search your zodiac sign..."
                        aria-label="Search zodiac sign"
                    >


                    <button
                        type="button"
                        class="btn
                               btn-pn
                               rounded-pill
                               m-1
                               px-4"
                    >

                        Find

                        <i
                            class="bi bi-arrow-right ms-1"
                        ></i>

                    </button>

                </div>


                {{-- Hero Trust Indicators --}}

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
                            class="bi bi-stars
                                   text-pn-primary"
                        ></i>


                        <small
                            class="text-secondary"
                        >

                            Zodiac-based experience

                        </small>

                    </div>


                    <div
                        class="d-flex
                               align-items-center
                               gap-2"
                    >

                        <i
                            class="bi bi-shield-check
                                   text-pn-primary"
                        ></i>


                        <small
                            class="text-secondary"
                        >

                            Trusted platform

                        </small>

                    </div>

                </div>

            </div>


            {{-- Hero Visual --}}

            <div class="col-12 col-lg-6">

                <div
                    class="position-relative"
                >

                    <div
                        class="pn-digital
                               rounded-5
                               overflow-hidden"
                    >

                        <div
                            class="ratio ratio-4x3"
                        >

                            <img
                                src="{{ asset('images/home/hero.webp') }}"
                                class="object-fit-cover"
                                alt="Horoscope and astrology"
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

                                Horoscope

                            </span>


                            <h2
                                class="font-serif
                                       h2
                                       mt-2
                                       mb-0"
                            >

                                Look within.
                                Understand your path.

                            </h2>

                        </div>

                    </div>


                    {{-- Floating Zodiac Card --}}

                    <div
                        class="position-absolute
                               bottom-0
                               start-0
                               translate-middle-y
                               ms-3
                               d-none
                               d-sm-block"
                    >

                        <div
                            class="bg-white
                                   rounded-4
                                   shadow-sm
                                   p-3"
                        >

                            <div
                                class="d-flex
                                       align-items-center
                                       gap-3"
                            >

                                <div
                                    class="rounded-circle
                                           bg-pn-cream
                                           text-pn-primary
                                           d-flex
                                           align-items-center
                                           justify-content-center"
                                    style="width:48px;height:48px;"
                                >

                                    <span
                                        class="fs-4"
                                    >
                                        ♈
                                    </span>

                                </div>


                                <div>

                                    <strong
                                        class="small
                                               d-block
                                               text-pn-brown"
                                    >

                                        Choose Your Sign

                                    </strong>


                                    <small
                                        class="text-secondary"
                                    >

                                        Explore your horoscope.

                                    </small>

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
     HOROSCOPE TYPE
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

                Horoscope Services

            </span>


            <h2
                class="font-serif
                       display-6
                       text-pn-brown
                       mt-2"
            >

                Choose your horoscope experience

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

                Select the horoscope service that matches
                what you are looking for.

            </p>

        </div>


        <div
            class="row
                   row-cols-1
                   row-cols-md-3
                   g-4"
        >

            @foreach($horoscopeTypes as $type)

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
                                style="width:64px;height:64px;"
                            >

                                <i
                                    class="bi {{ $type['icon'] }}
                                           fs-4"
                                ></i>

                            </div>


                            <h3
                                class="font-serif
                                       h3
                                       text-pn-brown"
                            >

                                {{ $type['title'] }}

                            </h3>


                            <p
                                class="small
                                       text-secondary
                                       mb-4"
                            >

                                {{ $type['description'] }}

                            </p>


                            <a
                                href="#zodiac"
                                class="btn
                                       btn-pn-outline
                                       w-100"
                            >

                                Explore

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
     ZODIAC SECTION
============================================================ --}}

<section
    id="zodiac"
    class="py-5 bg-pn-cream"
>

    <div class="container">

        <div
            class="row
                   justify-content-center"
        >

            <div class="col-12 col-lg-8">

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

                        Zodiac Signs

                    </span>


                    <h2
                        class="font-serif
                               display-6
                               text-pn-brown
                               mt-2"
                    >

                        Select your zodiac sign

                    </h2>


                    <p
                        class="text-secondary
                               mb-0"
                    >

                        Choose your sign to continue to the
                        horoscope experience.

                    </p>

                </div>

            </div>

        </div>


        <div
            class="row
                   row-cols-2
                   row-cols-sm-3
                   row-cols-md-4
                   row-cols-lg-6
                   g-3"
        >

            @foreach($zodiacSigns as $sign)

                <div class="col">

                    <button
                        type="button"
                        class="card
                               border
                               border-warning-subtle
                               rounded-4
                               bg-white
                               w-100
                               h-100
                               text-center
                               text-pn-brown
                               p-0"
                    >

                        <div
                            class="card-body
                                   p-3
                                   p-md-4"
                        >

                            <div
                                class="rounded-circle
                                       bg-pn-cream
                                       text-pn-primary
                                       d-flex
                                       align-items-center
                                       justify-content-center
                                       mx-auto"
                                style="width:64px;height:64px;"
                            >

                                <span
                                    class="fs-3"
                                >

                                    {{ $sign['symbol'] }}

                                </span>

                            </div>


                            <h3
                                class="h6
                                       fw-semibold
                                       mt-3
                                       mb-1"
                            >

                                {{ $sign['name'] }}

                            </h3>


                            <small
                                class="text-secondary"
                            >

                                {{ $sign['date'] }}

                            </small>

                        </div>

                    </button>

                </div>

            @endforeach

        </div>

    </div>

</section>


{{-- ============================================================
     SELECTED HOROSCOPE PREVIEW
============================================================ --}}

<section class="py-5">

    <div class="container">

        <div
            class="row
                   g-4
                   align-items-stretch"
        >

            {{-- Selected Sign --}}

            <div class="col-12 col-lg-4">

                <div
                    class="pn-digital
                           rounded-5
                           text-white
                           h-100
                           p-4
                           p-md-5"
                >

                    <span
                        class="small
                               text-warning
                               fw-semibold
                               text-uppercase"
                    >

                        Your Sign

                    </span>


                    <div
                        class="rounded-circle
                               bg-white
                               bg-opacity-10
                               d-flex
                               align-items-center
                               justify-content-center
                               mx-auto
                               my-4"
                        style="width:120px;height:120px;"
                    >

                        <span
                            class="display-3
                                   text-warning"
                        >
                            ♈
                        </span>

                    </div>


                    <h2
                        class="font-serif
                               display-6
                               text-center"
                    >

                        Aries

                    </h2>


                    <p
                        class="text-white-50
                               text-center
                               mb-0"
                    >

                        Mar 21 – Apr 19

                    </p>

                </div>

            </div>


            {{-- Horoscope Preview --}}

            <div class="col-12 col-lg-8">

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
                               p-md-5"
                    >

                        <div
                            class="d-flex
                                   flex-column
                                   flex-sm-row
                                   justify-content-between
                                   align-items-sm-center
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

                                    Horoscope Preview

                                </span>


                                <h2
                                    class="font-serif
                                           h2
                                           text-pn-brown
                                           mt-2
                                           mb-0"
                                >

                                    Today's Guidance

                                </h2>

                            </div>


                            <span
                                class="badge
                                       rounded-pill
                                       bg-pn-cream
                                       text-pn-primary
                                       px-3
                                       py-2"
                            >

                                Aries

                            </span>

                        </div>


                        <p
                            class="text-secondary
                                   mb-4"
                        >

                            Your horoscope content will appear
                            here based on the configured astrology
                            service and selected zodiac sign.

                        </p>


                        <div
                            class="row
                                   row-cols-2
                                   row-cols-md-4
                                   g-3
                                   mb-4"
                        >

                            @foreach($insightAreas as $area)

                                <div class="col">

                                    <div
                                        class="border
                                               border-warning-subtle
                                               rounded-4
                                               p-3
                                               h-100"
                                    >

                                        <i
                                            class="bi {{ $area['icon'] }}
                                                   text-pn-primary"
                                        ></i>


                                        <strong
                                            class="small
                                                   d-block
                                                   text-pn-brown
                                                   mt-2"
                                        >

                                            {{ $area['title'] }}

                                        </strong>

                                    </div>

                                </div>

                            @endforeach

                        </div>


                        <a
                            href="#"
                            class="btn
                                   btn-pn"
                        >

                            View Horoscope

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
     PERSONALIZED ASTROLOGY CTA
============================================================ --}}

<section class="py-5 bg-light-subtle">

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

                    Need More Guidance?

                </span>


                <h2
                    class="font-serif
                           display-6
                           text-pn-brown
                           mt-2
                           mb-3"
                >

                    Connect with an astrologer

                </h2>


                <p
                    class="text-secondary
                           mb-0"
                >

                    If you want a more personalized experience,
                    explore available astrologers and choose a
                    consultation type and available slot.

                </p>

            </div>


            <div
                class="col-12 col-lg-5
                       text-lg-end"
            >

                <a
                    href="#"
                    class="btn
                           btn-pn
                           btn-lg"
                >

                    Find an Astrologer

                    <i
                        class="bi bi-arrow-right ms-2"
                    ></i>

                </a>

            </div>

        </div>

    </div>

</section>


{{-- ============================================================
     HOW IT WORKS
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

                Simple Experience

            </span>


            <h2
                class="font-serif
                       display-6
                       text-pn-brown
                       mt-2"
            >

                Explore your horoscope in a few steps

            </h2>

        </div>


        <div
            class="row
                   row-cols-1
                   row-cols-md-3
                   g-4"
        >

            {{-- Step 1 --}}

            <div class="col">

                <div
                    class="text-center
                           px-lg-3"
                >

                    <div
                        class="mx-auto
                               rounded-circle
                               bg-pn-cream
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

                        Choose your sign

                    </h3>


                    <p
                        class="small
                               text-secondary
                               mb-0"
                    >

                        Select the zodiac sign you want
                        to explore.

                    </p>

                </div>

            </div>


            {{-- Step 2 --}}

            <div class="col">

                <div
                    class="text-center
                           px-lg-3"
                >

                    <div
                        class="mx-auto
                               rounded-circle
                               bg-pn-cream
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

                        Select horoscope

                    </h3>


                    <p
                        class="small
                               text-secondary
                               mb-0"
                    >

                        Choose the available horoscope
                        service.

                    </p>

                </div>

            </div>


            {{-- Step 3 --}}

            <div class="col">

                <div
                    class="text-center
                           px-lg-3"
                >

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

                        Explore guidance

                    </h3>


                    <p
                        class="small
                               text-secondary
                               mb-0"
                    >

                        View the configured horoscope
                        experience.

                    </p>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- ============================================================
     DISCLAIMER / INFORMATION
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

                    Horoscope information

                </strong>


                <small
                    class="text-secondary"
                >

                    Horoscope content, services and available
                    experiences will be configured and managed
                    through the astrology services section of
                    the platform.

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

                    Explore what the stars have to say.

                </h2>


                <p
                    class="text-white-50
                           col-lg-7
                           mx-auto
                           mb-4"
                >

                    Select your zodiac sign and continue
                    exploring the horoscope experience.

                </p>


                <a
                    href="#zodiac"
                    class="btn
                           btn-warning
                           text-dark
                           fw-semibold
                           px-4"
                >

                    Choose Your Sign

                    <i
                        class="bi bi-arrow-right ms-2"
                    ></i>

                </a>

            </div>

        </div>

    </div>

</section>

@endsection