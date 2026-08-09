@extends('layouts.app')

@section('title', 'Donate | Pooja Nilayam')

@section(
    'meta_description',
    'Support temples, spiritual initiatives and devotional activities through Pooja Nilayam.'
)

@section('content')

@php

    /*
    |--------------------------------------------------------------------------
    | TEMPORARY DONATION DATA
    |--------------------------------------------------------------------------
    | UI prototype only.
    |
    | These values will later come from the database / CMS.
    |--------------------------------------------------------------------------
    */

    $temples = [

        [
            'name' => 'Sri Venkateswara Temple',
            'location' => 'Tirumala, Andhra Pradesh',
            'description' => 'Support temple activities, worship services and spiritual initiatives.',
            'image' => 'images/home/hero.jpg',
            'tag' => 'Temple Support'
        ],

        [
            'name' => 'Sri Durga Devi Temple',
            'location' => 'Hyderabad, Telangana',
            'description' => 'Contribute towards devotional activities and temple services.',
            'image' => 'images/home/hero.jpg',
            'tag' => 'Temple Seva'
        ],

        [
            'name' => 'Sri Shiva Temple',
            'location' => 'Varanasi, Uttar Pradesh',
            'description' => 'Support sacred worship, temple maintenance and spiritual activities.',
            'image' => 'images/home/hero.jpg',
            'tag' => 'Temple Development'
        ]

    ];


    $donationTypes = [

        [
            'title' => 'Temple Support',
            'description' => 'Support temple worship, maintenance and spiritual activities.',
            'icon' => 'bi-bank2'
        ],

        [
            'title' => 'Annadanam',
            'description' => 'Support devotional food and community service initiatives.',
            'icon' => 'bi-people'
        ],

        [
            'title' => 'Pooja & Seva',
            'description' => 'Contribute towards sacred poojas and temple seva activities.',
            'icon' => 'bi-flower1'
        ],

        [
            'title' => 'Temple Development',
            'description' => 'Support development and improvement of sacred spaces.',
            'icon' => 'bi-building'
        ]

    ];


    $suggestedAmounts = [

        501,
        1001,
        2501,
        5001

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

                    Donation

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

            <div class="col-12 col-lg-7">

                <span
                    class="small
                           text-pn-gold
                           fw-semibold
                           text-uppercase"
                >

                    Give With Devotion

                </span>


                <h1
                    class="font-serif
                           display-3
                           text-pn-brown
                           mt-2
                           mb-4"
                >

                    Your contribution can
                    support a sacred purpose.

                </h1>


                <p
                    class="lead
                           text-secondary
                           mb-4"
                >

                    Support temples, devotional activities and
                    spiritual initiatives through a simple and
                    secure donation experience.

                </p>


                <div
                    class="d-flex
                           flex-column
                           flex-sm-row
                           gap-2"
                >

                    <a
                        href="#donationTemples"
                        class="btn
                               btn-pn
                               btn-lg
                               px-4"
                    >

                        Donate Now

                        <i
                            class="bi bi-arrow-right ms-2"
                        ></i>

                    </a>


                    <a
                        href="#donationTypes"
                        class="btn
                               btn-pn-outline
                               btn-lg
                               px-4"
                    >

                        Explore Donation Types

                    </a>

                </div>


                {{-- Trust indicators --}}

                <div
                    class="row
                           row-cols-1
                           row-cols-sm-3
                           g-3
                           mt-4"
                >

                    <div class="col">

                        <div
                            class="d-flex
                                   align-items-center
                                   gap-2"
                        >

                            <i
                                class="bi bi-shield-check
                                       text-pn-primary
                                       fs-5"
                            ></i>


                            <small class="text-secondary">

                                Secure

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
                                class="bi bi-receipt
                                       text-pn-primary
                                       fs-5"
                            ></i>


                            <small class="text-secondary">

                                Receipt Generated

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
                                class="bi bi-heart
                                       text-pn-primary
                                       fs-5"
                            ></i>


                            <small class="text-secondary">

                                Give With Faith

                            </small>

                        </div>

                    </div>

                </div>

            </div>


            {{-- Hero Visual --}}

            <div class="col-12 col-lg-5">

                <div
                    class="position-relative
                           rounded-5
                           overflow-hidden
                           shadow-sm"
                >

                    <div
                        class="ratio ratio-4x3"
                    >

                        <img
                            src="{{ asset('images/home/hero.jpg') }}"
                            class="w-100
                                   h-100
                                   object-fit-cover"
                            alt="Sacred temple and devotional setting"
                            fetchpriority="high"
                        >

                    </div>


                    {{-- Floating message --}}

                    <div
                        class="position-absolute
                               bottom-0
                               start-0
                               end-0
                               p-3"
                    >

                        <div
                            class="bg-white
                                   bg-opacity-95
                                   rounded-4
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
                                           justify-content-center
                                           flex-shrink-0"
                                    style="width:48px;height:48px;"
                                >

                                    <i
                                        class="bi bi-stars"
                                    ></i>

                                </div>


                                <div>

                                    <strong
                                        class="d-block
                                               font-serif
                                               text-pn-brown"
                                    >

                                        A contribution with purpose

                                    </strong>


                                    <small class="text-secondary">

                                        Support the spiritual
                                        community.

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
     INTRODUCTION
============================================================ --}}

<section class="py-5">

    <div class="container">

        <div
            class="row
                   justify-content-center"
        >

            <div class="col-12 col-lg-9">

                <div class="text-center">

                    <span
                        class="small
                               text-pn-gold
                               fw-semibold
                               text-uppercase"
                    >

                        Support Sacred Initiatives

                    </span>


                    <h2
                        class="font-serif
                               display-6
                               text-pn-brown
                               mt-2
                               mb-3"
                    >

                        Every contribution can make a difference.

                    </h2>


                    <p
                        class="text-secondary
                               mb-0"
                    >

                        Choose a temple and donation purpose that
                        matters to you. Pooja Nilayam provides a
                        convenient way to make your contribution and
                        receive a donation receipt after successful
                        completion.

                    </p>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- ============================================================
     DONATION TYPES
============================================================ --}}

<section
    id="donationTypes"
    class="py-5 bg-pn-cream"
>

    <div class="container">

        <div
            class="row
                   align-items-end
                   g-4
                   mb-5"
        >

            <div class="col-12 col-lg-8">

                <span
                    class="small
                           text-pn-gold
                           fw-semibold
                           text-uppercase"
                >

                    Choose Your Purpose

                </span>


                <h2
                    class="font-serif
                           display-6
                           text-pn-brown
                           mt-2
                           mb-2"
                >

                    Ways you can contribute

                </h2>


                <p
                    class="text-secondary
                           mb-0"
                >

                    Select the donation purpose that best matches
                    your intention.

                </p>

            </div>

        </div>


        <div
            class="row
                   row-cols-1
                   row-cols-sm-2
                   row-cols-lg-4
                   g-4"
        >

            @foreach($donationTypes as $type)

                <div class="col">

                    <div
                        class="card
                               border
                               border-warning-subtle
                               rounded-5
                               h-100"
                    >

                        <div class="card-body p-4">

                            <div
                                class="rounded-circle
                                       bg-pn-cream
                                       text-pn-primary
                                       d-flex
                                       align-items-center
                                       justify-content-center
                                       mb-4"
                                style="width:58px;height:58px;"
                            >

                                <i
                                    class="bi
                                           {{ $type['icon'] }}
                                           fs-5"
                                ></i>

                            </div>


                            <h3
                                class="font-serif
                                       h4
                                       text-pn-brown
                                       mb-2"
                            >

                                {{ $type['title'] }}

                            </h3>


                            <p
                                class="small
                                       text-secondary
                                       mb-0"
                            >

                                {{ $type['description'] }}

                            </p>

                        </div>

                    </div>

                </div>

            @endforeach

        </div>

    </div>

</section>


{{-- ============================================================
     TEMPLE SELECTION
============================================================ --}}

<section
    id="donationTemples"
    class="py-5"
>

    <div class="container">

        <div
            class="row
                   align-items-end
                   g-4
                   mb-5"
        >

            <div class="col-12 col-lg-8">

                <span
                    class="small
                           text-pn-gold
                           fw-semibold
                           text-uppercase"
                >

                    Select Temple

                </span>


                <h2
                    class="font-serif
                           display-6
                           text-pn-brown
                           mt-2
                           mb-2"
                >

                    Choose where you would like to contribute

                </h2>


                <p
                    class="text-secondary
                           mb-0"
                >

                    Select a temple to continue with your donation.

                </p>

            </div>


            <div
                class="col-12 col-lg-4
                       text-lg-end"
            >

                <a
                    href="#"
                    class="text-pn-primary
                           fw-semibold
                           text-decoration-none"
                >

                    View All Temples

                    <i
                        class="bi bi-arrow-right ms-1"
                    ></i>

                </a>

            </div>

        </div>


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

                        {{-- Temple Image --}}

                        <div
                            class="ratio ratio-16x9"
                        >

                            <img
                                src="{{ asset($temple['image']) }}"
                                class="w-100
                                       h-100
                                       object-fit-cover"
                                alt="{{ $temple['name'] }}"
                                loading="lazy"
                            >

                        </div>


                        <div class="card-body p-4">

                            <span
                                class="badge
                                       bg-pn-cream
                                       text-pn-primary
                                       rounded-pill
                                       mb-3"
                            >

                                {{ $temple['tag'] }}

                            </span>


                            <h3
                                class="font-serif
                                       h4
                                       text-pn-brown
                                       mb-2"
                            >

                                {{ $temple['name'] }}

                            </h3>


                            <div
                                class="d-flex
                                       align-items-center
                                       gap-2
                                       mb-3"
                            >

                                <i
                                    class="bi bi-geo-alt
                                           text-pn-primary"
                                ></i>


                                <small
                                    class="text-secondary"
                                >

                                    {{ $temple['location'] }}

                                </small>

                            </div>


                            <p
                                class="small
                                       text-secondary
                                       mb-4"
                            >

                                {{ $temple['description'] }}

                            </p>


                            <div
                                class="d-grid"
                            >

                                <a
                                    href="#"
                                    class="btn
                                           btn-pn-outline"
                                >

                                    Donate to this Temple

                                    <i
                                        class="bi bi-arrow-right ms-2"
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
     SUGGESTED DONATION AMOUNTS
============================================================ --}}

<section class="py-5 bg-pn-cream">

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

                    Give What Feels Right

                </span>


                <h2
                    class="font-serif
                           display-6
                           text-pn-brown
                           mt-2
                           mb-3"
                >

                    Choose your donation amount.

                </h2>


                <p
                    class="text-secondary
                           mb-4"
                >

                    You can choose from a suggested amount or enter
                    a custom amount when you continue to donate.

                </p>


                <div
                    class="d-flex
                           flex-wrap
                           gap-2"
                >

                    @foreach($suggestedAmounts as $amount)

                        <button
                            type="button"
                            class="btn
                                   btn-outline-secondary
                                   rounded-pill
                                   px-4"
                        >

                            ₹{{ number_format($amount) }}

                        </button>

                    @endforeach

                </div>

            </div>


            <div class="col-12 col-lg-6">

                <div
                    class="border
                           border-warning-subtle
                           rounded-5
                           bg-white
                           p-4
                           p-md-5"
                >

                    <div
                        class="d-flex
                               align-items-start
                               gap-3
                               mb-4"
                    >

                        <div
                            class="rounded-circle
                                   bg-pn-cream
                                   text-pn-primary
                                   d-flex
                                   align-items-center
                                   justify-content-center
                                   flex-shrink-0"
                            style="width:54px;height:54px;"
                        >

                            <i class="bi bi-heart-fill"></i>

                        </div>


                        <div>

                            <h3
                                class="font-serif
                                       h4
                                       text-pn-brown
                                       mb-1"
                            >

                                Your contribution matters

                            </h3>


                            <p
                                class="small
                                       text-secondary
                                       mb-0"
                            >

                                Every donation can be made with a
                                purpose and devotion.

                            </p>

                        </div>

                    </div>


                    <div
                        class="border
                               border-warning-subtle
                               rounded-4
                               p-3"
                    >

                        <div
                            class="d-flex
                                   align-items-center
                                   justify-content-between
                                   gap-3"
                        >

                            <span
                                class="small
                                       text-secondary"
                            >

                                Suggested contribution

                            </span>


                            <strong
                                class="fs-4
                                       text-pn-primary"
                            >

                                ₹1,001

                            </strong>

                        </div>

                    </div>


                    <div class="d-grid mt-3">

                        <a
                            href="#"
                            class="btn
                                   btn-pn
                                   btn-lg"
                        >

                            Continue to Donate

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
     HOW DONATION WORKS
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

                Simple Donation Journey

            </span>


            <h2
                class="font-serif
                       display-6
                       text-pn-brown
                       mt-2
                       mb-3"
            >

                Give in a few simple steps

            </h2>


            <p
                class="text-secondary
                       col-lg-7
                       mx-auto"
            >

                The donation process follows a simple journey from
                temple selection through payment and receipt.

            </p>

        </div>


        <div
            class="row
                   row-cols-1
                   row-cols-sm-2
                   row-cols-lg-5
                   g-4"
        >

            {{-- Step 1 --}}

            <div class="col">

                <div
                    class="text-center
                           h-100"
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

                        <span class="fw-semibold">
                            1
                        </span>

                    </div>


                    <h3
                        class="font-serif
                               h5
                               text-pn-brown"
                    >

                        Select Temple

                    </h3>


                    <p
                        class="small
                               text-secondary
                               mb-0"
                    >

                        Choose the temple you would like to support.

                    </p>

                </div>

            </div>


            {{-- Step 2 --}}

            <div class="col">

                <div
                    class="text-center
                           h-100"
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

                        <span class="fw-semibold">
                            2
                        </span>

                    </div>


                    <h3
                        class="font-serif
                               h5
                               text-pn-brown"
                    >

                        Donation Type

                    </h3>


                    <p
                        class="small
                               text-secondary
                               mb-0"
                    >

                        Select the purpose of your contribution.

                    </p>

                </div>

            </div>


            {{-- Step 3 --}}

            <div class="col">

                <div
                    class="text-center
                           h-100"
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

                        <span class="fw-semibold">
                            3
                        </span>

                    </div>


                    <h3
                        class="font-serif
                               h5
                               text-pn-brown"
                    >

                        Enter Amount

                    </h3>


                    <p
                        class="small
                               text-secondary
                               mb-0"
                    >

                        Choose a suggested or custom amount.

                    </p>

                </div>

            </div>


            {{-- Step 4 --}}

            <div class="col">

                <div
                    class="text-center
                           h-100"
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

                        <span class="fw-semibold">
                            4
                        </span>

                    </div>


                    <h3
                        class="font-serif
                               h5
                               text-pn-brown"
                    >

                        Donor Details

                    </h3>


                    <p
                        class="small
                               text-secondary
                               mb-0"
                    >

                        Provide the required donor information.

                    </p>

                </div>

            </div>


            {{-- Step 5 --}}

            <div class="col">

                <div
                    class="text-center
                           h-100"
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

                        <span class="fw-semibold">
                            5
                        </span>

                    </div>


                    <h3
                        class="font-serif
                               h5
                               text-pn-brown"
                    >

                        Payment

                    </h3>


                    <p
                        class="small
                               text-secondary
                               mb-0"
                    >

                        Complete your donation securely.

                    </p>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- ============================================================
     IMPACT / PURPOSE SECTION
============================================================ --}}

<section class="py-5 bg-pn-cream">

    <div class="container">

        <div
            class="row
                   align-items-center
                   g-5"
        >

            <div class="col-12 col-lg-6">

                <div
                    class="rounded-5
                           overflow-hidden"
                >

                    <div class="ratio ratio-4x3">

                        <img
                            src="{{ asset('images/home/hero.jpg') }}"
                            class="w-100
                                   h-100
                                   object-fit-cover"
                            alt="Temple devotional activities"
                            loading="lazy"
                        >

                    </div>

                </div>

            </div>


            <div class="col-12 col-lg-6">

                <span
                    class="small
                           text-pn-gold
                           fw-semibold
                           text-uppercase"
                >

                    Your Support

                </span>


                <h2
                    class="font-serif
                           display-6
                           text-pn-brown
                           mt-2
                           mb-4"
                >

                    Support the spirit of
                    devotion and service.

                </h2>


                <p
                    class="text-secondary
                           mb-4"
                >

                    Donations can support the devotional purposes
                    made available through the platform. Choose
                    your temple and donation purpose during the
                    donation journey.

                </p>


                <div class="vstack gap-3">

                    <div
                        class="d-flex
                               align-items-start
                               gap-3"
                    >

                        <i
                            class="bi bi-check-circle-fill
                                   text-success
                                   fs-5"
                        ></i>


                        <div>

                            <strong
                                class="d-block
                                       text-pn-brown"
                            >

                                Choose your temple

                            </strong>


                            <small class="text-secondary">

                                Select the temple you wish to support.

                            </small>

                        </div>

                    </div>


                    <div
                        class="d-flex
                               align-items-start
                               gap-3"
                    >

                        <i
                            class="bi bi-check-circle-fill
                                   text-success
                                   fs-5"
                        ></i>


                        <div>

                            <strong
                                class="d-block
                                       text-pn-brown"
                            >

                                Choose your purpose

                            </strong>


                            <small class="text-secondary">

                                Select the available donation type.

                            </small>

                        </div>

                    </div>


                    <div
                        class="d-flex
                               align-items-start
                               gap-3"
                    >

                        <i
                            class="bi bi-check-circle-fill
                                   text-success
                                   fs-5"
                        ></i>


                        <div>

                            <strong
                                class="d-block
                                       text-pn-brown"
                            >

                                Receive confirmation

                            </strong>


                            <small class="text-secondary">

                                A receipt is generated after a
                                successful donation.

                            </small>

                        </div>

                    </div>

                </div>


                <div class="mt-4">

                    <a
                        href="#donationTemples"
                        class="btn btn-pn"
                    >

                        Make a Donation

                        <i
                            class="bi bi-heart ms-2"
                        ></i>

                    </a>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- ============================================================
     SECURITY / TRUST
============================================================ --}}

<section class="py-5">

    <div class="container">

        <div
            class="border
                   border-warning-subtle
                   rounded-5
                   p-4
                   p-md-5"
        >

            <div
                class="row
                       align-items-center
                       g-4"
            >

                <div class="col-12 col-lg-7">

                    <div
                        class="d-flex
                               align-items-start
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
                            style="width:58px;height:58px;"
                        >

                            <i
                                class="bi bi-shield-check
                                       fs-5"
                            ></i>

                        </div>


                        <div>

                            <span
                                class="small
                                       text-pn-gold
                                       fw-semibold
                                       text-uppercase"
                            >

                                Secure Donation

                            </span>


                            <h2
                                class="font-serif
                                       h4
                                       text-pn-brown
                                       mt-1
                                       mb-2"
                            >

                                Donate with confidence.

                            </h2>


                            <p
                                class="small
                                       text-secondary
                                       mb-0"
                            >

                                Your donation journey is designed
                                around secure payment processing and
                                confirmation after successful payment.

                            </p>

                        </div>

                    </div>

                </div>


                <div class="col-12 col-lg-5">

                    <div
                        class="row
                               row-cols-2
                               g-3"
                    >

                        <div class="col">

                            <div
                                class="bg-pn-cream
                                       rounded-4
                                       p-3
                                       text-center"
                            >

                                <i
                                    class="bi bi-lock-fill
                                           text-pn-primary
                                           fs-5"
                                ></i>


                                <small
                                    class="d-block
                                           text-pn-brown
                                           fw-semibold
                                           mt-2"
                                >

                                    Secure Payment

                                </small>

                            </div>

                        </div>


                        <div class="col">

                            <div
                                class="bg-pn-cream
                                       rounded-4
                                       p-3
                                       text-center"
                            >

                                <i
                                    class="bi bi-receipt
                                           text-pn-primary
                                           fs-5"
                                ></i>


                                <small
                                    class="d-block
                                           text-pn-brown
                                           fw-semibold
                                           mt-2"
                                >

                                    Donation Receipt

                                </small>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- ============================================================
     FINAL CTA
============================================================ --}}

<section class="pb-5">

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

                    Give with devotion. Support with purpose.

                </h2>


                <p
                    class="text-white-50
                           col-lg-7
                           mx-auto
                           mb-4"
                >

                    Choose a temple and continue to the donation
                    form when you are ready.

                </p>


                <a
                    href="#donationTemples"
                    class="btn
                           btn-warning
                           text-dark
                           fw-semibold
                           px-4"
                >

                    Donate Now

                    <i
                        class="bi bi-arrow-right ms-2"
                    ></i>

                </a>

            </div>

        </div>

    </div>

</section>

@endsection