@extends('layouts.app')

@section('title', 'Numerology | Pooja Nilayam')

@section(
    'meta_description',
    'Explore numerology services through Pooja Nilayam and discover personalized number-based guidance.'
)

@section('content')

@php

    /*
    |--------------------------------------------------------------------------
    | TEMPORARY NUMEROLOGY UI DATA
    |--------------------------------------------------------------------------
    | UI prototype only.
    | Actual numerology calculation and service configuration
    | will be implemented later.
    |--------------------------------------------------------------------------
    */

    $services = [

        [
            'title' => 'Name Analysis',
            'description' =>
                'Explore the configured numerology experience
                 based on your name.',
            'icon' => 'bi-person-vcard'
        ],

        [
            'title' => 'Birth Date Analysis',
            'description' =>
                'Explore number-based insights using your
                 birth information.',
            'icon' => 'bi-calendar3'
        ],

        [
            'title' => 'Personal Guidance',
            'description' =>
                'Discover the personalized guidance available
                 through the numerology service.',
            'icon' => 'bi-stars'
        ]

    ];


    /*
    |--------------------------------------------------------------------------
    | TEMPORARY NUMEROLOGY AREAS
    |--------------------------------------------------------------------------
    */

    $areas = [

        [
            'title' => 'Personal Numbers',
            'description' =>
                'Present relevant configured number information.',
            'icon' => 'bi-123'
        ],

        [
            'title' => 'Name Insights',
            'description' =>
                'Display the applicable name-based information.',
            'icon' => 'bi-person-vcard'
        ],

        [
            'title' => 'Birth Information',
            'description' =>
                'Use the submitted birth information where applicable.',
            'icon' => 'bi-calendar-heart'
        ],

        [
            'title' => 'Guidance',
            'description' =>
                'Present the configured numerology interpretation.',
            'icon' => 'bi-compass'
        ]

    ];


    /*
    |--------------------------------------------------------------------------
    | SAMPLE NUMBER DISPLAY
    |--------------------------------------------------------------------------
    | Visual placeholder only.
    |--------------------------------------------------------------------------
    */

    $sampleNumbers = [

        [
            'number' => '1',
            'title' => 'Number One',
            'icon' => 'bi-1-circle'
        ],

        [
            'number' => '2',
            'title' => 'Number Two',
            'icon' => 'bi-2-circle'
        ],

        [
            'number' => '3',
            'title' => 'Number Three',
            'icon' => 'bi-3-circle'
        ],

        [
            'number' => '4',
            'title' => 'Number Four',
            'icon' => 'bi-4-circle'
        ],

        [
            'number' => '5',
            'title' => 'Number Five',
            'icon' => 'bi-5-circle'
        ],

        [
            'number' => '6',
            'title' => 'Number Six',
            'icon' => 'bi-6-circle'
        ],

        [
            'number' => '7',
            'title' => 'Number Seven',
            'icon' => 'bi-7-circle'
        ],

        [
            'number' => '8',
            'title' => 'Number Eight',
            'icon' => 'bi-8-circle'
        ],

        [
            'number' => '9',
            'title' => 'Number Nine',
            'icon' => 'bi-9-circle'
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
                    Numerology
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

                    Discover the
                    <span class="text-pn-primary">
                        meaning of numbers.
                    </span>

                </h1>


                <p
                    class="lead
                           text-secondary
                           mb-4"
                >

                    Explore the numerology experience available
                    through Pooja Nilayam and discover
                    personalized number-based guidance.

                </p>


                <div
                    class="d-flex
                           flex-column
                           flex-sm-row
                           gap-2"
                >

                    <a
                        href="#numerology-form"
                        class="btn
                               btn-pn
                               btn-lg"
                    >

                        Explore Numerology

                        <i
                            class="bi bi-arrow-down ms-2"
                        ></i>

                    </a>


                    <a
                        href="#how-it-works"
                        class="btn
                               btn-pn-outline
                               btn-lg"
                    >

                        How It Works

                    </a>

                </div>


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
                            class="bi bi-123
                                   text-pn-primary"
                        ></i>


                        <small class="text-secondary">

                            Number-based experience

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


                        <small class="text-secondary">

                            Secure platform

                        </small>

                    </div>

                </div>

            </div>


            {{-- Hero Visual --}}

            <div class="col-12 col-lg-6">

                <div class="position-relative">

                    <div
                        class="pn-digital
                               rounded-5
                               overflow-hidden"
                    >

                        <div class="ratio ratio-4x3">

                            <img
                                src="{{ asset('images/home/hero.webp') }}"
                                class="object-fit-cover"
                                alt="Numerology astrology"
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

                                Numerology

                            </span>


                            <h2
                                class="font-serif
                                       h2
                                       mt-2
                                       mb-0"
                            >

                                Explore the story
                                behind your numbers.

                            </h2>

                        </div>

                    </div>


                    {{-- Floating Number Card --}}

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

                                    <i class="bi bi-123"></i>

                                </div>


                                <div>

                                    <strong
                                        class="small
                                               d-block
                                               text-pn-brown"
                                    >

                                        Your Numbers

                                    </strong>


                                    <small class="text-secondary">

                                        Begin with your details.

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
     NUMEROLOGY SERVICES
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

                Numerology Services

            </span>


            <h2
                class="font-serif
                       display-6
                       text-pn-brown
                       mt-2"
            >

                Explore your numerology experience

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

                Choose the available numerology service
                configured for the platform.

            </p>

        </div>


        <div
            class="row
                   row-cols-1
                   row-cols-md-3
                   g-4"
        >

            @foreach($services as $service)

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
                                    class="bi {{ $service['icon'] }}
                                           fs-4"
                                ></i>

                            </div>


                            <h2
                                class="font-serif
                                       h3
                                       text-pn-brown"
                            >

                                {{ $service['title'] }}

                            </h2>


                            <p
                                class="small
                                       text-secondary
                                       mb-4"
                            >

                                {{ $service['description'] }}

                            </p>


                            <a
                                href="#numerology-form"
                                class="btn
                                       btn-pn-outline
                                       w-100"
                            >

                                Explore Service

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
     NUMEROLOGY FORM
============================================================ --}}

<section
    id="numerology-form"
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

                    <div class="row g-0">

                        {{-- Form Introduction --}}

                        <div
                            class="col-12 col-lg-4
                                   bg-white"
                        >

                            <div
                                class="h-100
                                       p-4
                                       p-md-5"
                            >

                                <span
                                    class="small
                                           text-pn-gold
                                           fw-semibold
                                           text-uppercase"
                                >

                                    Start Here

                                </span>


                                <h2
                                    class="font-serif
                                           display-6
                                           text-pn-brown
                                           mt-2
                                           mb-3"
                                >

                                    Enter your
                                    details.

                                </h2>


                                <p
                                    class="small
                                           text-secondary"
                                >

                                    Provide the information
                                    requested by the configured
                                    Numerology service.

                                </p>


                                <div
                                    class="vstack
                                           gap-3
                                           mt-4"
                                >

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
                                            style="width:42px;height:42px;"
                                        >

                                            <i class="bi bi-person"></i>

                                        </div>


                                        <div>

                                            <strong
                                                class="small
                                                       d-block
                                                       text-pn-brown"
                                            >

                                                Personal Information

                                            </strong>


                                            <small
                                                class="text-secondary"
                                            >

                                                Enter your name.

                                            </small>

                                        </div>

                                    </div>


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
                                            style="width:42px;height:42px;"
                                        >

                                            <i
                                                class="bi bi-calendar3"
                                            ></i>

                                        </div>


                                        <div>

                                            <strong
                                                class="small
                                                       d-block
                                                       text-pn-brown"
                                            >

                                                Birth Information

                                            </strong>


                                            <small
                                                class="text-secondary"
                                            >

                                                Provide your date.

                                            </small>

                                        </div>

                                    </div>


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
                                            style="width:42px;height:42px;"
                                        >

                                            <i class="bi bi-123"></i>

                                        </div>


                                        <div>

                                            <strong
                                                class="small
                                                       d-block
                                                       text-pn-brown"
                                            >

                                                Number Insights

                                            </strong>


                                            <small
                                                class="text-secondary"
                                            >

                                                Continue to the configured
                                                service.

                                            </small>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>


                        {{-- Form --}}

                        <div class="col-12 col-lg-8">

                            <form
                                action="#"
                                method="POST"
                                class="p-4 p-md-5"
                            >

                                @csrf


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
                                        style="width:50px;height:50px;"
                                    >

                                        <i class="bi bi-123"></i>

                                    </div>


                                    <div>

                                        <h2
                                            class="font-serif
                                                   h3
                                                   text-pn-brown
                                                   mb-1"
                                        >

                                            Numerology Details

                                        </h2>


                                        <p
                                            class="small
                                                   text-secondary
                                                   mb-0"
                                        >

                                            Enter the details required
                                            to continue.

                                        </p>

                                    </div>

                                </div>


                                {{-- Full Name --}}

                                <div class="mb-3">

                                    <label
                                        for="fullName"
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
                                        id="fullName"
                                        name="full_name"
                                        class="form-control
                                               form-control-lg"
                                        placeholder="Enter your full name"
                                        autocomplete="name"
                                        required
                                    >

                                </div>


                                {{-- Date of Birth --}}

                                <div class="mb-3">

                                    <label
                                        for="dateOfBirth"
                                        class="form-label
                                               small
                                               fw-semibold
                                               text-pn-brown"
                                    >

                                        Date of Birth
                                        <span class="text-danger">*</span>

                                    </label>


                                    <input
                                        type="date"
                                        id="dateOfBirth"
                                        name="date_of_birth"
                                        class="form-control
                                               form-control-lg"
                                        required
                                    >


                                    <div class="form-text">

                                        Enter your date of birth
                                        accurately.

                                    </div>

                                </div>


                                {{-- Optional Preferred Name --}}

                                <div class="mb-3">

                                    <label
                                        for="preferredName"
                                        class="form-label
                                               small
                                               fw-semibold
                                               text-pn-brown"
                                    >

                                        Preferred / Other Name

                                        <span
                                            class="text-secondary
                                                   fw-normal"
                                        >
                                            (Optional)
                                        </span>

                                    </label>


                                    <input
                                        type="text"
                                        id="preferredName"
                                        name="preferred_name"
                                        class="form-control
                                               form-control-lg"
                                        placeholder="Enter if applicable"
                                    >

                                </div>


                                {{-- Email / Mobile --}}

                                <div
                                    class="row
                                           g-3
                                           mb-4"
                                >

                                    <div class="col-12 col-md-6">

                                        <label
                                            for="mobile"
                                            class="form-label
                                                   small
                                                   fw-semibold
                                                   text-pn-brown"
                                        >

                                            Mobile Number

                                        </label>


                                        <input
                                            type="tel"
                                            id="mobile"
                                            name="mobile"
                                            class="form-control
                                                   form-control-lg"
                                            placeholder="Enter mobile number"
                                            autocomplete="tel"
                                        >

                                    </div>


                                    <div class="col-12 col-md-6">

                                        <label
                                            for="email"
                                            class="form-label
                                                   small
                                                   fw-semibold
                                                   text-pn-brown"
                                        >

                                            Email Address

                                        </label>


                                        <input
                                            type="email"
                                            id="email"
                                            name="email"
                                            class="form-control
                                                   form-control-lg"
                                            placeholder="Enter email address"
                                            autocomplete="email"
                                        >

                                    </div>

                                </div>


                                {{-- Confirmation --}}

                                <div
                                    class="form-check
                                           mb-4"
                                >

                                    <input
                                        class="form-check-input"
                                        type="checkbox"
                                        id="detailsAccuracy"
                                        required
                                    >


                                    <label
                                        class="form-check-label
                                               small
                                               text-secondary"
                                        for="detailsAccuracy"
                                    >

                                        I confirm that the information
                                        entered above is accurate.

                                        <span class="text-danger">*</span>

                                    </label>

                                </div>


                                {{-- Submit --}}

                                <div
                                    class="d-grid
                                           d-sm-flex
                                           justify-content-sm-end"
                                >

                                    <button
                                        type="submit"
                                        class="btn
                                               btn-pn
                                               btn-lg
                                               px-4"
                                    >

                                        Continue

                                        <i
                                            class="bi bi-arrow-right ms-2"
                                        ></i>

                                    </button>

                                </div>

                            </form>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- ============================================================
     NUMBER VISUALIZATION
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

                Numbers

            </span>


            <h2
                class="font-serif
                       display-6
                       text-pn-brown
                       mt-2"
            >

                Explore the number spectrum

            </h2>


            <p
                class="text-secondary
                       col-lg-7
                       mx-auto
                       mb-0"
            >

                The numbers below are presented as a visual
                UI concept. Their actual interpretation will
                depend on the final Numerology service.

            </p>

        </div>


        <div
            class="row
                   row-cols-3
                   row-cols-sm-3
                   row-cols-md-5
                   row-cols-lg-9
                   g-3
                   justify-content-center"
        >

            @foreach($sampleNumbers as $number)

                <div class="col">

                    <div
                        class="card
                               border
                               border-warning-subtle
                               rounded-4
                               h-100
                               text-center"
                    >

                        <div class="card-body p-3">

                            <div
                                class="rounded-circle
                                       bg-pn-cream
                                       text-pn-primary
                                       d-flex
                                       align-items-center
                                       justify-content-center
                                       mx-auto"
                                style="width:58px;height:58px;"
                            >

                                <span
                                    class="font-serif
                                           fs-3"
                                >

                                    {{ $number['number'] }}

                                </span>

                            </div>


                            <small
                                class="d-block
                                       text-pn-brown
                                       fw-semibold
                                       mt-3"
                            >

                                {{ $number['title'] }}

                            </small>

                        </div>

                    </div>

                </div>

            @endforeach

        </div>

    </div>

</section>


{{-- ============================================================
     NUMEROLOGY AREAS
============================================================ --}}

<section class="py-5 bg-light-subtle">

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

                    Your Numerology

                </span>


                <h2
                    class="font-serif
                           display-6
                           text-pn-brown
                           mt-2
                           mb-3"
                >

                    A clear and
                    structured experience.

                </h2>


                <div
                    class="pn-divider
                           mb-4"
                ></div>


                <p
                    class="text-secondary
                           mb-0"
                >

                    The final service can present the
                    applicable numerology information in
                    organized sections so customers can
                    easily understand their results.

                </p>

            </div>


            <div class="col-12 col-lg-7">

                <div
                    class="row
                           row-cols-1
                           row-cols-sm-2
                           g-3"
                >

                    @foreach($areas as $area)

                        <div class="col">

                            <div
                                class="border
                                       border-warning-subtle
                                       rounded-4
                                       bg-white
                                       p-4
                                       h-100"
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
                                        class="bi {{ $area['icon'] }}
                                               fs-5"
                                    ></i>

                                </div>


                                <h3
                                    class="font-serif
                                           h5
                                           text-pn-brown"
                                >

                                    {{ $area['title'] }}

                                </h3>


                                <p
                                    class="small
                                           text-secondary
                                           mb-0"
                                >

                                    {{ $area['description'] }}

                                </p>

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
    id="how-it-works"
    class="py-5"
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

                Simple Process

            </span>


            <h2
                class="font-serif
                       display-6
                       text-pn-brown
                       mt-2"
            >

                How Numerology Works

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

                        Enter Details

                    </h3>


                    <p
                        class="small
                               text-secondary
                               mb-0"
                    >

                        Provide the requested information.

                    </p>

                </div>

            </div>


            {{-- Step 2 --}}

            <div class="col">

                <div class="text-center h-100">

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

                        Submit

                    </h3>


                    <p
                        class="small
                               text-secondary
                               mb-0"
                    >

                        Submit your numerology request.

                    </p>

                </div>

            </div>


            {{-- Step 3 --}}

            <div class="col">

                <div class="text-center h-100">

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
                        03
                    </div>


                    <h3
                        class="font-serif
                               h5
                               text-pn-brown
                               mt-3"
                    >

                        Process

                    </h3>


                    <p
                        class="small
                               text-secondary
                               mb-0"
                    >

                        The configured service processes
                        the submitted information.

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

                        View Guidance

                    </h3>


                    <p
                        class="small
                               text-secondary
                               mb-0"
                    >

                        Continue to the available numerology
                        experience.

                    </p>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- ============================================================
     ASTROLOGER CTA
============================================================ --}}

<section class="py-5 bg-pn-cream">

    <div class="container">

        <div
            class="row
                   align-items-center
                   g-4"
        >

            <div class="col-12 col-lg-8">

                <span
                    class="small
                           text-pn-gold
                           fw-semibold
                           text-uppercase"
                >

                    Personalized Guidance

                </span>


                <h2
                    class="font-serif
                           display-6
                           text-pn-brown
                           mt-2
                           mb-3"
                >

                    Want to discuss your questions?

                </h2>


                <p
                    class="text-secondary
                           mb-0"
                >

                    Explore the available astrologers and
                    consultation options for a more
                    personalized astrology experience.

                </p>

            </div>


            <div
                class="col-12 col-lg-4
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
     INFORMATION
============================================================ --}}

<section class="py-5">

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

                    Numerology information

                </strong>


                <small
                    class="text-secondary"
                >

                    Numerology calculations, interpretation,
                    available services and result details will
                    depend on the final service configuration.

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
                    class="bi bi-123
                           display-5
                           text-warning"
                ></i>


                <h2
                    class="font-serif
                           display-6
                           mt-3"
                >

                    Begin your numerology journey.

                </h2>


                <p
                    class="text-white-50
                           col-lg-7
                           mx-auto
                           mb-4"
                >

                    Enter your details and continue to the
                    configured numerology experience.

                </p>


                <a
                    href="#numerology-form"
                    class="btn
                           btn-warning
                           text-dark
                           fw-semibold
                           px-4"
                >

                    Explore Numerology

                    <i
                        class="bi bi-arrow-right ms-2"
                    ></i>

                </a>

            </div>

        </div>

    </div>

</section>

@endsection