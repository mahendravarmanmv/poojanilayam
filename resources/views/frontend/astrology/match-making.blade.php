@extends('layouts.app')

@section('title', 'Match Making | Pooja Nilayam')

@section(
    'meta_description',
    'Explore traditional match making services through Pooja Nilayam.'
)

@section('content')

@php

    /*
    |--------------------------------------------------------------------------
    | TEMPORARY MATCH MAKING UI DATA
    |--------------------------------------------------------------------------
    | UI prototype only.
    | Actual compatibility calculation and service configuration
    | will be implemented later.
    |--------------------------------------------------------------------------
    */

    $features = [

        [
            'title' => 'Two Profiles',
            'description' =>
                'Enter the relevant birth details for both individuals.',
            'icon' => 'bi-people'
        ],

        [
            'title' => 'Compatibility',
            'description' =>
                'Present the configured match-making result clearly.',
            'icon' => 'bi-heart'
        ],

        [
            'title' => 'Traditional Guidance',
            'description' =>
                'Explore the match-making service configured for the platform.',
            'icon' => 'bi-stars'
        ],

        [
            'title' => 'Easy Experience',
            'description' =>
                'A simple, structured experience from details to result.',
            'icon' => 'bi-check2-circle'
        ]

    ];


    /*
    |--------------------------------------------------------------------------
    | TEMPORARY MATCH AREAS
    |--------------------------------------------------------------------------
    */

    $matchAreas = [

        [
            'title' => 'Personal Details',
            'description' => 'Basic information for each profile.',
            'icon' => 'bi-person'
        ],

        [
            'title' => 'Birth Details',
            'description' => 'Birth information required by the configured service.',
            'icon' => 'bi-calendar3'
        ],

        [
            'title' => 'Compatibility',
            'description' => 'Display the configured compatibility assessment.',
            'icon' => 'bi-heart'
        ],

        [
            'title' => 'Match Result',
            'description' => 'Present the final result in a clear format.',
            'icon' => 'bi-clipboard-check'
        ]

    ];


    /*
    |--------------------------------------------------------------------------
    | TEMPORARY RESULT INDICATORS
    |--------------------------------------------------------------------------
    */

    $resultItems = [

        [
            'title' => 'Profile Comparison',
            'icon' => 'bi-people'
        ],

        [
            'title' => 'Compatibility Overview',
            'icon' => 'bi-heart-pulse'
        ],

        [
            'title' => 'Match Summary',
            'icon' => 'bi-file-earmark-text'
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
                    Match Making
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

                    Explore
                    <span class="text-pn-primary">
                        Match Making.
                    </span>

                </h1>


                <p
                    class="lead
                           text-secondary
                           mb-4"
                >

                    Compare two profiles through the configured
                    match-making service and explore the
                    resulting compatibility experience.

                </p>


                <div
                    class="d-flex
                           flex-column
                           flex-sm-row
                           gap-2"
                >

                    <a
                        href="#match-form"
                        class="btn
                               btn-pn
                               btn-lg"
                    >

                        Start Match Making

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
                            class="bi bi-heart
                                   text-pn-primary"
                        ></i>


                        <small class="text-secondary">

                            Two-profile comparison

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

                            Secure experience

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
                                alt="Match making astrology"
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

                                Compatibility

                            </span>


                            <h2
                                class="font-serif
                                       h2
                                       mt-2
                                       mb-0"
                            >

                                Two journeys.
                                One meaningful comparison.

                            </h2>

                        </div>

                    </div>


                    {{-- Floating Heart Card --}}

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

                                    <i
                                        class="bi bi-heart-fill"
                                    ></i>

                                </div>


                                <div>

                                    <strong
                                        class="small
                                               d-block
                                               text-pn-brown"
                                    >

                                        Compare Profiles

                                    </strong>


                                    <small class="text-secondary">

                                        Begin with both birth details.

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

            <div class="col-12 col-lg-8">

                <div class="text-center">

                    <span
                        class="small
                               text-pn-gold
                               fw-semibold
                               text-uppercase"
                    >

                        Match Making

                    </span>


                    <h2
                        class="font-serif
                               display-6
                               text-pn-brown
                               mt-2"
                    >

                        Begin with two profiles.

                    </h2>


                    <div
                        class="pn-divider
                               mx-auto
                               my-3"
                    ></div>


                    <p
                        class="text-secondary
                               mb-0"
                    >

                        Enter the information requested by the
                        match-making service and continue to the
                        configured compatibility experience.

                    </p>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- ============================================================
     MATCH FORM
============================================================ --}}

<section
    id="match-form"
    class="pb-5"
>

    <div class="container">

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

                            Start Here

                        </span>


                        <h2
                            class="font-serif
                                   display-6
                                   text-pn-brown
                                   mt-2
                                   mb-3"
                        >

                            Compare
                            two profiles.

                        </h2>


                        <p
                            class="small
                                   text-secondary"
                        >

                            Provide the required information
                            for both individuals. The exact
                            fields can be adjusted later based
                            on the final match-making rules.

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

                                    <i class="bi bi-person"></i>

                                </div>


                                <div>

                                    <strong
                                        class="small
                                               d-block
                                               text-pn-brown"
                                    >

                                        Person One

                                    </strong>


                                    <small class="text-secondary">

                                        Enter first profile details.

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

                                    <i class="bi bi-person"></i>

                                </div>


                                <div>

                                    <strong
                                        class="small
                                               d-block
                                               text-pn-brown"
                                    >

                                        Person Two

                                    </strong>


                                    <small class="text-secondary">

                                        Enter second profile details.

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

                                    <i class="bi bi-heart"></i>

                                </div>


                                <div>

                                    <strong
                                        class="small
                                               d-block
                                               text-pn-brown"
                                    >

                                        Match Result

                                    </strong>


                                    <small class="text-secondary">

                                        Continue to the configured
                                        compatibility result.

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


                        {{-- Person One --}}

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

                                <i class="bi bi-person"></i>

                            </div>


                            <div>

                                <h2
                                    class="font-serif
                                           h3
                                           text-pn-brown
                                           mb-1"
                                >

                                    Person One

                                </h2>


                                <p
                                    class="small
                                           text-secondary
                                           mb-0"
                                >

                                    Enter the first person's details.

                                </p>

                            </div>

                        </div>


                        {{-- Person One Name --}}

                        <div class="mb-3">

                            <label
                                for="personOneName"
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
                                id="personOneName"
                                name="person_one_name"
                                class="form-control
                                       form-control-lg"
                                placeholder="Enter full name"
                                autocomplete="name"
                                required
                            >

                        </div>


                        {{-- Person One Birth Details --}}

                        <div
                            class="row
                                   g-3
                                   mb-4"
                        >

                            <div class="col-12 col-md-4">

                                <label
                                    for="personOneDob"
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
                                    id="personOneDob"
                                    name="person_one_dob"
                                    class="form-control
                                           form-control-lg"
                                    required
                                >

                            </div>


                            <div class="col-12 col-md-4">

                                <label
                                    for="personOneTime"
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
                                    id="personOneTime"
                                    name="person_one_time"
                                    class="form-control
                                           form-control-lg"
                                    required
                                >

                            </div>


                            <div class="col-12 col-md-4">

                                <label
                                    for="personOnePlace"
                                    class="form-label
                                           small
                                           fw-semibold
                                           text-pn-brown"
                                >

                                    Birth Place
                                    <span class="text-danger">*</span>

                                </label>


                                <input
                                    type="text"
                                    id="personOnePlace"
                                    name="person_one_place"
                                    class="form-control
                                           form-control-lg"
                                    placeholder="City"
                                    required
                                >

                            </div>

                        </div>


                        <hr
                            class="border-warning-subtle
                                   my-4"
                        >


                        {{-- Person Two --}}

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

                                <i class="bi bi-person"></i>

                            </div>


                            <div>

                                <h2
                                    class="font-serif
                                           h3
                                           text-pn-brown
                                           mb-1"
                                >

                                    Person Two

                                </h2>


                                <p
                                    class="small
                                           text-secondary
                                           mb-0"
                                >

                                    Enter the second person's details.

                                </p>

                            </div>

                        </div>


                        {{-- Person Two Name --}}

                        <div class="mb-3">

                            <label
                                for="personTwoName"
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
                                id="personTwoName"
                                name="person_two_name"
                                class="form-control
                                       form-control-lg"
                                placeholder="Enter full name"
                                required
                            >

                        </div>


                        {{-- Person Two Birth Details --}}

                        <div
                            class="row
                                   g-3
                                   mb-4"
                        >

                            <div class="col-12 col-md-4">

                                <label
                                    for="personTwoDob"
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
                                    id="personTwoDob"
                                    name="person_two_dob"
                                    class="form-control
                                           form-control-lg"
                                    required
                                >

                            </div>


                            <div class="col-12 col-md-4">

                                <label
                                    for="personTwoTime"
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
                                    id="personTwoTime"
                                    name="person_two_time"
                                    class="form-control
                                           form-control-lg"
                                    required
                                >

                            </div>


                            <div class="col-12 col-md-4">

                                <label
                                    for="personTwoPlace"
                                    class="form-label
                                           small
                                           fw-semibold
                                           text-pn-brown"
                                >

                                    Birth Place
                                    <span class="text-danger">*</span>

                                </label>


                                <input
                                    type="text"
                                    id="personTwoPlace"
                                    name="person_two_place"
                                    class="form-control
                                           form-control-lg"
                                    placeholder="City"
                                    required
                                >

                            </div>

                        </div>


                        {{-- Optional Message --}}

                        <div class="mb-4">

                            <label
                                for="matchMessage"
                                class="form-label
                                       small
                                       fw-semibold
                                       text-pn-brown"
                            >

                                Additional Information
                                <span
                                    class="text-secondary
                                           fw-normal"
                                >
                                    (Optional)
                                </span>

                            </label>


                            <textarea
                                id="matchMessage"
                                name="message"
                                class="form-control"
                                rows="3"
                                placeholder="Add any relevant information..."
                            ></textarea>

                        </div>


                        {{-- Confirmation --}}

                        <div
                            class="form-check
                                   mb-4"
                        >

                            <input
                                class="form-check-input"
                                type="checkbox"
                                id="matchAccuracy"
                                required
                            >


                            <label
                                class="form-check-label
                                       small
                                       text-secondary"
                                for="matchAccuracy"
                            >

                                I confirm that the information
                                provided is accurate to the best
                                of my knowledge.

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

                                Check Match

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

</section>


{{-- ============================================================
     FEATURES
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

                Match Making Experience

            </span>


            <h2
                class="font-serif
                       display-6
                       text-pn-brown
                       mt-2"
            >

                Designed around two profiles

            </h2>


            <p
                class="text-secondary
                       col-lg-7
                       mx-auto
                       mb-0"
            >

                The service can present the configured
                match-making information in a simple,
                understandable format.

            </p>

        </div>


        <div
            class="row
                   row-cols-1
                   row-cols-sm-2
                   row-cols-lg-4
                   g-4"
        >

            @foreach($features as $feature)

                <div class="col">

                    <article
                        class="card
                               border
                               border-warning-subtle
                               rounded-5
                               bg-white
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
                                    class="bi {{ $feature['icon'] }}
                                           fs-4"
                                ></i>

                            </div>


                            <h3
                                class="font-serif
                                       h5
                                       text-pn-brown"
                            >

                                {{ $feature['title'] }}

                            </h3>


                            <p
                                class="small
                                       text-secondary
                                       mb-0"
                            >

                                {{ $feature['description'] }}

                            </p>

                        </div>

                    </article>

                </div>

            @endforeach

        </div>

    </div>

</section>


{{-- ============================================================
     COMPARISON AREAS
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

                    Match Journey

                </span>


                <h2
                    class="font-serif
                           display-6
                           text-pn-brown
                           mt-2
                           mb-3"
                >

                    From profiles
                    to a clear result.

                </h2>


                <div
                    class="pn-divider
                           mb-4"
                ></div>


                <p
                    class="text-secondary
                           mb-0"
                >

                    The exact compatibility information,
                    calculations and result format will be
                    controlled by the final Match Making
                    service configuration.

                </p>

            </div>


            <div class="col-12 col-lg-7">

                <div
                    class="row
                           row-cols-1
                           row-cols-sm-2
                           g-3"
                >

                    @foreach($matchAreas as $area)

                        <div class="col">

                            <div
                                class="border
                                       border-warning-subtle
                                       rounded-4
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
     RESULT PREVIEW
============================================================ --}}

<section class="py-5 bg-pn-cream">

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
                        class="card-body
                               p-4
                               p-md-5"
                    >

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

                                Result Preview

                            </span>


                            <h2
                                class="font-serif
                                       display-6
                                       text-pn-brown
                                       mt-2"
                            >

                                Your match result

                            </h2>


                            <p
                                class="text-secondary
                                       mb-0"
                            >

                                The actual result will be generated
                                by the configured Match Making service.

                            </p>

                        </div>


                        {{-- Sample score presentation --}}

                        <div
                            class="row
                                   justify-content-center
                                   mb-5"
                        >

                            <div class="col-12 col-md-6">

                                <div
                                    class="text-center
                                           border
                                           border-warning-subtle
                                           rounded-5
                                           p-4"
                                >

                                    <div
                                        class="mx-auto
                                               rounded-circle
                                               bg-pn-cream
                                               text-pn-primary
                                               d-flex
                                               align-items-center
                                               justify-content-center"
                                        style="width:110px;height:110px;"
                                    >

                                        <i
                                            class="bi bi-heart
                                                   display-5"
                                        ></i>

                                    </div>


                                    <span
                                        class="small
                                               text-secondary
                                               d-block
                                               mt-3"
                                    >

                                        Compatibility Result

                                    </span>


                                    <strong
                                        class="font-serif
                                               display-6
                                               text-pn-brown
                                               d-block
                                               mt-1"
                                    >

                                        Result

                                    </strong>


                                    <small
                                        class="text-secondary"
                                    >

                                        Generated after submission

                                    </small>

                                </div>

                            </div>

                        </div>


                        {{-- Result Items --}}

                        <div
                            class="row
                                   row-cols-1
                                   row-cols-md-3
                                   g-3"
                        >

                            @foreach($resultItems as $item)

                                <div class="col">

                                    <div
                                        class="border
                                               border-warning-subtle
                                               rounded-4
                                               bg-white
                                               p-4
                                               h-100
                                               text-center"
                                    >

                                        <div
                                            class="rounded-circle
                                                   bg-pn-cream
                                                   text-pn-primary
                                                   d-flex
                                                   align-items-center
                                                   justify-content-center
                                                   mx-auto"
                                            style="width:52px;height:52px;"
                                        >

                                            <i
                                                class="bi {{ $item['icon'] }}"
                                            ></i>

                                        </div>


                                        <h3
                                            class="font-serif
                                                   h5
                                                   text-pn-brown
                                                   mt-3
                                                   mb-0"
                                        >

                                            {{ $item['title'] }}

                                        </h3>

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

                How Match Making Works

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

                        Enter Profile One

                    </h3>


                    <p
                        class="small
                               text-secondary
                               mb-0"
                    >

                        Provide the required information.

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

                        Enter Profile Two

                    </h3>


                    <p
                        class="small
                               text-secondary
                               mb-0"
                    >

                        Provide the second profile information.

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

                        Compare

                    </h3>


                    <p
                        class="small
                               text-secondary
                               mb-0"
                    >

                        Process the submitted information.

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

                        View Result

                    </h3>


                    <p
                        class="small
                               text-secondary
                               mb-0"
                    >

                        Explore the configured match result.

                    </p>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- ============================================================
     PERSONALIZED CONSULTATION
============================================================ --}}

<section class="py-5 bg-light-subtle">

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

                    Need More Guidance?

                </span>


                <h2
                    class="font-serif
                           display-6
                           text-pn-brown
                           mt-2
                           mb-3"
                >

                    Speak with an astrologer

                </h2>


                <p
                    class="text-secondary
                           mb-0"
                >

                    If you would like personalized guidance,
                    explore the available astrologers and
                    consultation options.

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

                    Match Making information

                </strong>


                <small
                    class="text-secondary"
                >

                    Match-making calculations, criteria,
                    scoring and result details will be based
                    on the final service configuration.

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
                    class="bi bi-heart
                           display-5
                           text-warning"
                ></i>


                <h2
                    class="font-serif
                           display-6
                           mt-3"
                >

                    Begin your Match Making journey.

                </h2>


                <p
                    class="text-white-50
                           col-lg-7
                           mx-auto
                           mb-4"
                >

                    Enter the details of both profiles and
                    continue to the configured match-making
                    experience.

                </p>


                <a
                    href="#match-form"
                    class="btn
                           btn-warning
                           text-dark
                           fw-semibold
                           px-4"
                >

                    Start Match Making

                    <i
                        class="bi bi-arrow-right ms-2"
                    ></i>

                </a>

            </div>

        </div>

    </div>

</section>

@endsection