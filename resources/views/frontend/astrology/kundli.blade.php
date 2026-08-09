@extends('layouts.app')

@section('title', 'Kundli | Pooja Nilayam')

@section(
    'meta_description',
    'Create your Kundli by providing your birth details through Pooja Nilayam.'
)

@section('content')

@php

    /*
    |--------------------------------------------------------------------------
    | TEMPORARY KUNDLI UI DATA
    |--------------------------------------------------------------------------
    | UI prototype only.
    | Actual Kundli calculation and service configuration will be
    | handled later through the controller/service layer.
    |--------------------------------------------------------------------------
    */

    $benefits = [

        [
            'title' => 'Birth Chart',
            'description' =>
                'Generate a personalized birth-chart experience.',
            'icon' => 'bi-stars'
        ],

        [
            'title' => 'Planetary Insights',
            'description' =>
                'Present configured planetary information in one place.',
            'icon' => 'bi-diagram-3'
        ],

        [
            'title' => 'Personal Guidance',
            'description' =>
                'Explore astrology guidance based on your birth details.',
            'icon' => 'bi-person-hearts'
        ],

        [
            'title' => 'Easy Access',
            'description' =>
                'Keep your Kundli experience accessible from your account.',
            'icon' => 'bi-phone'
        ]

    ];


    /*
    |--------------------------------------------------------------------------
    | TEMPORARY KUNDLI AREAS
    |--------------------------------------------------------------------------
    */

    $kundliAreas = [

        [
            'title' => 'Birth Chart',
            'icon' => 'bi-grid-3x3-gap'
        ],

        [
            'title' => 'Planetary Positions',
            'icon' => 'bi-stars'
        ],

        [
            'title' => 'Dasha',
            'icon' => 'bi-clock-history'
        ],

        [
            'title' => 'Astrology Insights',
            'icon' => 'bi-compass'
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
                        Astrology
                    </a>

                </li>


                <li
                    class="breadcrumb-item active"
                    aria-current="page"
                >
                    Kundli
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

                    Discover your
                    <span class="text-pn-primary">
                        Kundli.
                    </span>

                </h1>


                <p
                    class="lead
                           text-secondary
                           mb-4"
                >

                    Enter your birth details to begin your
                    personalized Kundli experience.

                </p>


                <div
                    class="d-flex
                           flex-wrap
                           gap-2"
                >

                    <a
                        href="#kundli-form"
                        class="btn
                               btn-pn
                               btn-lg"
                    >

                        Create Kundli

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
                            class="bi bi-shield-check
                                   text-pn-primary"
                        ></i>


                        <small class="text-secondary">

                            Secure details

                        </small>

                    </div>


                    <div
                        class="d-flex
                               align-items-center
                               gap-2"
                    >

                        <i
                            class="bi bi-stars
                                   text-pn-primary"
                        ></i>


                        <small class="text-secondary">

                            Astrology experience

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
                                src="{{ asset('images/home/hero.jpg') }}"
                                class="object-fit-cover"
                                alt="Kundli astrology"
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

                                Birth Chart

                            </span>


                            <h2
                                class="font-serif
                                       h2
                                       mt-2
                                       mb-0"
                            >

                                Your birth details,
                                your unique chart.

                            </h2>

                        </div>

                    </div>


                    {{-- Floating Card --}}

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

                                    <i class="bi bi-stars"></i>

                                </div>


                                <div>

                                    <strong
                                        class="small
                                               d-block
                                               text-pn-brown"
                                    >

                                        Personalized Kundli

                                    </strong>


                                    <small class="text-secondary">

                                        Start with your birth details.

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
     KUNDLI FORM
============================================================ --}}

<section
    id="kundli-form"
    class="py-5"
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

                    <div
                        class="row
                               g-0"
                    >

                        {{-- Form Introduction --}}

                        <div
                            class="col-12 col-lg-4
                                   bg-pn-cream"
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

                                    Create Your Kundli

                                </span>


                                <h2
                                    class="font-serif
                                           display-6
                                           text-pn-brown
                                           mt-2
                                           mb-3"
                                >

                                    Enter your
                                    birth details.

                                </h2>


                                <p
                                    class="small
                                           text-secondary"
                                >

                                    Please provide the required
                                    information accurately. These
                                    details will be used later by
                                    the Kundli service.

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
                                                   bg-white
                                                   text-pn-primary
                                                   d-flex
                                                   align-items-center
                                                   justify-content-center
                                                   flex-shrink-0"
                                            style="width:42px;height:42px;"
                                        >

                                            <i
                                                class="bi bi-person"
                                            ></i>

                                        </div>


                                        <div>

                                            <strong
                                                class="small
                                                       d-block
                                                       text-pn-brown"
                                            >

                                                Personal Details

                                            </strong>


                                            <small
                                                class="text-secondary"
                                            >

                                                Tell us about yourself.

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
                                                   bg-white
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

                                                Birth Details

                                            </strong>


                                            <small
                                                class="text-secondary"
                                            >

                                                Date, time and place.

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
                                                   bg-white
                                                   text-pn-primary
                                                   d-flex
                                                   align-items-center
                                                   justify-content-center
                                                   flex-shrink-0"
                                            style="width:42px;height:42px;"
                                        >

                                            <i
                                                class="bi bi-stars"
                                            ></i>

                                        </div>


                                        <div>

                                            <strong
                                                class="small
                                                       d-block
                                                       text-pn-brown"
                                            >

                                                Kundli Experience

                                            </strong>


                                            <small
                                                class="text-secondary"
                                            >

                                                Continue to your
                                                configured service.

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

                                        <i
                                            class="bi bi-person-vcard"
                                        ></i>

                                    </div>


                                    <div>

                                        <h2
                                            class="font-serif
                                                   h3
                                                   text-pn-brown
                                                   mb-1"
                                        >

                                            Birth Information

                                        </h2>


                                        <p
                                            class="small
                                                   text-secondary
                                                   mb-0"
                                        >

                                            Enter your details below
                                            to continue.

                                        </p>

                                    </div>

                                </div>


                                {{-- Name --}}

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


                                {{-- Date / Gender --}}

                                <div
                                    class="row
                                           g-3
                                           mb-3"
                                >

                                    <div class="col-12 col-md-6">

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

                                    </div>


                                    <div class="col-12 col-md-6">

                                        <label
                                            for="gender"
                                            class="form-label
                                                   small
                                                   fw-semibold
                                                   text-pn-brown"
                                        >

                                            Gender

                                        </label>


                                        <select
                                            id="gender"
                                            name="gender"
                                            class="form-select
                                                   form-select-lg"
                                        >

                                            <option selected>
                                                Select Gender
                                            </option>

                                            <option value="male">
                                                Male
                                            </option>

                                            <option value="female">
                                                Female
                                            </option>

                                            <option value="other">
                                                Other
                                            </option>

                                        </select>

                                    </div>

                                </div>


                                {{-- Time --}}

                                <div class="mb-3">

                                    <label
                                        for="timeOfBirth"
                                        class="form-label
                                               small
                                               fw-semibold
                                               text-pn-brown"
                                    >

                                        Time of Birth
                                        <span class="text-danger">*</span>

                                    </label>


                                    <input
                                        type="time"
                                        id="timeOfBirth"
                                        name="time_of_birth"
                                        class="form-control
                                               form-control-lg"
                                        required
                                    >


                                    <div
                                        class="form-text"
                                    >

                                        Enter the birth time as accurately
                                        as possible.

                                    </div>

                                </div>


                                {{-- Place --}}

                                <div
                                    class="row
                                           g-3
                                           mb-3"
                                >

                                    <div class="col-12 col-md-6">

                                        <label
                                            for="birthPlace"
                                            class="form-label
                                                   small
                                                   fw-semibold
                                                   text-pn-brown"
                                        >

                                            Place of Birth
                                            <span class="text-danger">*</span>

                                        </label>


                                        <input
                                            type="text"
                                            id="birthPlace"
                                            name="birth_place"
                                            class="form-control
                                                   form-control-lg"
                                            placeholder="Enter birth place"
                                            required
                                        >

                                    </div>


                                    <div class="col-12 col-md-6">

                                        <label
                                            for="birthCountry"
                                            class="form-label
                                                   small
                                                   fw-semibold
                                                   text-pn-brown"
                                        >

                                            Country

                                        </label>


                                        <select
                                            id="birthCountry"
                                            name="birth_country"
                                            class="form-select
                                                   form-select-lg"
                                        >

                                            <option selected>
                                                India
                                            </option>

                                            <option>
                                                United States
                                            </option>

                                            <option>
                                                United Kingdom
                                            </option>

                                            <option>
                                                Australia
                                            </option>

                                            <option>
                                                Other
                                            </option>

                                        </select>

                                    </div>

                                </div>


                                {{-- Contact --}}

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


                                {{-- Consent --}}

                                <div
                                    class="form-check
                                           mb-4"
                                >

                                    <input
                                        class="form-check-input"
                                        type="checkbox"
                                        id="accuracy"
                                        name="accuracy"
                                        required
                                    >


                                    <label
                                        class="form-check-label
                                               small
                                               text-secondary"
                                        for="accuracy"
                                    >

                                        I confirm that the birth
                                        information entered above is
                                        accurate to the best of my
                                        knowledge.

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

                                        Generate Kundli

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
     BENEFITS
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

                Kundli Experience

            </span>


            <h2
                class="font-serif
                       display-6
                       text-pn-brown
                       mt-2"
            >

                One place for your birth-chart journey

            </h2>


            <p
                class="text-secondary
                       col-lg-7
                       mx-auto
                       mb-0"
            >

                The exact services and information displayed
                will be configured through the Kundli Services
                administration area.

            </p>

        </div>


        <div
            class="row
                   row-cols-1
                   row-cols-sm-2
                   row-cols-lg-4
                   g-4"
        >

            @foreach($benefits as $benefit)

                <div class="col">

                    <article
                        class="card
                               border
                               border-warning-subtle
                               rounded-5
                               bg-white
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
                                       mb-4"
                                style="width:58px;height:58px;"
                            >

                                <i
                                    class="bi {{ $benefit['icon'] }}
                                           fs-4"
                                ></i>

                            </div>


                            <h3
                                class="font-serif
                                       h5
                                       text-pn-brown"
                            >

                                {{ $benefit['title'] }}

                            </h3>


                            <p
                                class="small
                                       text-secondary
                                       mb-0"
                            >

                                {{ $benefit['description'] }}

                            </p>

                        </div>

                    </article>

                </div>

            @endforeach

        </div>

    </div>

</section>


{{-- ============================================================
     KUNDLI AREAS
============================================================ --}}

<section class="py-5">

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

                    Your Kundli

                </span>


                <h2
                    class="font-serif
                           display-6
                           text-pn-brown
                           mt-2
                           mb-3"
                >

                    A structured astrology
                    experience.

                </h2>


                <div
                    class="pn-divider
                           mb-4"
                ></div>


                <p
                    class="text-secondary
                           mb-0"
                >

                    Once the Kundli service is configured,
                    the relevant birth-chart information can
                    be presented in a clear and organized
                    experience.

                </p>

            </div>


            <div class="col-12 col-lg-7">

                <div
                    class="row
                           row-cols-2
                           g-3"
                >

                    @foreach($kundliAreas as $area)

                        <div class="col">

                            <div
                                class="border
                                       border-warning-subtle
                                       rounded-4
                                       p-4
                                       h-100
                                       bg-white"
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
                                           text-pn-brown
                                           mb-0"
                                >

                                    {{ $area['title'] }}

                                </h3>

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

                Simple Process

            </span>


            <h2
                class="font-serif
                       display-6
                       text-pn-brown
                       mt-2"
            >

                How it works

            </h2>


            <p
                class="text-secondary
                       col-lg-7
                       mx-auto
                       mb-0"
            >

                Start with your birth information and continue
                through the configured Kundli service.

            </p>

        </div>


        <div
            class="row
                   row-cols-1
                   row-cols-md-4
                   g-4"
        >

            {{-- Step 1 --}}

            <div class="col">

                <div
                    class="text-center
                           h-100"
                >

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

                        Enter Details

                    </h3>


                    <p
                        class="small
                               text-secondary
                               mb-0"
                    >

                        Provide your birth information.

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

                        Submit

                    </h3>


                    <p
                        class="small
                               text-secondary
                               mb-0"
                    >

                        Submit the Kundli request.

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

                        Process

                    </h3>


                    <p
                        class="small
                               text-secondary
                               mb-0"
                    >

                        The configured Kundli service processes
                        the information.

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

                        Continue

                    </h3>


                    <p
                        class="small
                               text-secondary
                               mb-0"
                    >

                        Continue to the available Kundli
                        experience.

                    </p>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- ============================================================
     ASTROLOGY CONSULTATION CTA
============================================================ --}}

<section class="py-5">

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

                    Want to speak with an astrologer?

                </h2>


                <p
                    class="text-secondary
                           mb-0"
                >

                    Explore astrologers and the available
                    consultation options when you need a
                    more personalized astrology experience.

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
     INFORMATION / PRIVACY
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
                class="bi bi-shield-check
                       text-pn-primary
                       fs-5"
            ></i>


            <div>

                <strong
                    class="d-block
                           text-pn-brown
                           mb-1"
                >

                    Your information matters

                </strong>


                <small
                    class="text-secondary"
                >

                    Birth details entered through this form
                    should be handled according to the
                    platform's privacy, security and data
                    protection requirements.

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

                    Begin your Kundli journey.

                </h2>


                <p
                    class="text-white-50
                           col-lg-7
                           mx-auto
                           mb-4"
                >

                    Enter your birth details and continue
                    to the configured Kundli service.

                </p>


                <a
                    href="#kundli-form"
                    class="btn
                           btn-warning
                           text-dark
                           fw-semibold
                           px-4"
                >

                    Create Kundli

                    <i
                        class="bi bi-arrow-right ms-2"
                    ></i>

                </a>

            </div>

        </div>

    </div>

</section>

@endsection