@extends('layouts.app')

@section('title', 'Palm Reading | Pooja Nilayam')

@section(
    'meta_description',
    'Explore palm reading services through Pooja Nilayam and discover personalized guidance.'
)

@section('content')

@php

    /*
    |--------------------------------------------------------------------------
    | TEMPORARY PALM READING UI DATA
    |--------------------------------------------------------------------------
    | UI prototype only.
    | Actual palm-reading service configuration and interpretation
    | will be implemented later.
    |--------------------------------------------------------------------------
    */

    $services = [

        [
            'title' => 'Palm Reading',
            'description' =>
                'Explore the palm-reading experience available
                 through Pooja Nilayam.',
            'icon' => 'bi-hand-index-thumb'
        ],

        [
            'title' => 'Personal Insights',
            'description' =>
                'Discover the personalized guidance provided
                 through the configured service.',
            'icon' => 'bi-stars'
        ],

        [
            'title' => 'Expert Guidance',
            'description' =>
                'Connect with an astrologer for a more
                 personalized consultation experience.',
            'icon' => 'bi-person-hearts'
        ]

    ];


    $palmAreas = [

        [
            'title' => 'Palm Image',
            'description' =>
                'Provide the palm information required by
                 the configured service.',
            'icon' => 'bi-image'
        ],

        [
            'title' => 'Palm Features',
            'description' =>
                'Present applicable palm-reading information.',
            'icon' => 'bi-hand-index-thumb'
        ],

        [
            'title' => 'Insights',
            'description' =>
                'Display the configured interpretation and
                 guidance.',
            'icon' => 'bi-stars'
        ],

        [
            'title' => 'Personal Guidance',
            'description' =>
                'Explore additional guidance where available.',
            'icon' => 'bi-compass'
        ]

    ];


    $guidanceAreas = [

        [
            'title' => 'Life',
            'icon' => 'bi-person'
        ],

        [
            'title' => 'Career',
            'icon' => 'bi-briefcase'
        ],

        [
            'title' => 'Relationships',
            'icon' => 'bi-heart'
        ],

        [
            'title' => 'Guidance',
            'icon' => 'bi-stars'
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
                    Palm Reading
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

                    Discover the story
                    <span class="text-pn-primary">
                        in your palm.
                    </span>

                </h1>


                <p
                    class="lead
                           text-secondary
                           mb-4"
                >

                    Explore the palm-reading experience available
                    through Pooja Nilayam and discover personalized
                    astrology guidance.

                </p>


                <div
                    class="d-flex
                           flex-column
                           flex-sm-row
                           gap-2"
                >

                    <a
                        href="#palm-form"
                        class="btn
                               btn-pn
                               btn-lg"
                    >

                        Start Palm Reading

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
                            class="bi bi-hand-index-thumb
                                   text-pn-primary"
                        ></i>


                        <small class="text-secondary">

                            Palm-based experience

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
                                alt="Palm reading astrology"
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
                                Palm Reading
                            </span>


                            <h2
                                class="font-serif
                                       h2
                                       mt-2
                                       mb-0"
                            >

                                Explore your palm
                                through a guided experience.

                            </h2>

                        </div>

                    </div>


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
                                        class="bi bi-hand-index-thumb"
                                    ></i>

                                </div>


                                <div>

                                    <strong
                                        class="small
                                               d-block
                                               text-pn-brown"
                                    >

                                        Palm Insights

                                    </strong>


                                    <small class="text-secondary">

                                        Begin with your palm details.

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
                        Palm Reading
                    </span>


                    <h2
                        class="font-serif
                               display-6
                               text-pn-brown
                               mt-2"
                    >

                        Begin with your palm.

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

                        Provide the information requested by
                        the configured palm-reading service
                        and continue to your personalized
                        experience.

                    </p>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- ============================================================
     PALM READING SERVICES
============================================================ --}}

<section class="pb-5">

    <div class="container">

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
                                href="#palm-form"
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
     PALM FORM
============================================================ --}}

<section
    id="palm-form"
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

                        {{-- Introduction --}}

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

                                    Submit your
                                    palm details.

                                </h2>


                                <p
                                    class="small
                                           text-secondary"
                                >

                                    Provide the information
                                    required by the final
                                    Palm Reading service.

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
                                                   bg-pn-cream
                                                   text-pn-primary
                                                   d-flex
                                                   align-items-center
                                                   justify-content-center
                                                   flex-shrink-0"
                                            style="width:42px;height:42px;"
                                        >

                                            <i class="bi bi-image"></i>

                                        </div>


                                        <div>

                                            <strong
                                                class="small
                                                       d-block
                                                       text-pn-brown"
                                            >

                                                Palm Information

                                            </strong>


                                            <small
                                                class="text-secondary"
                                            >

                                                Provide the requested
                                                palm details.

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

                                            <i class="bi bi-stars"></i>

                                        </div>


                                        <div>

                                            <strong
                                                class="small
                                                       d-block
                                                       text-pn-brown"
                                            >

                                                Palm Insights

                                            </strong>


                                            <small
                                                class="text-secondary"
                                            >

                                                Continue to the configured
                                                experience.

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
                                enctype="multipart/form-data"
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
                                            class="bi bi-hand-index-thumb"
                                        ></i>

                                    </div>


                                    <div>

                                        <h2
                                            class="font-serif
                                                   h3
                                                   text-pn-brown
                                                   mb-1"
                                        >

                                            Palm Reading Details

                                        </h2>


                                        <p
                                            class="small
                                                   text-secondary
                                                   mb-0"
                                        >

                                            Enter the information
                                            requested to continue.

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

                                        <span class="text-danger">
                                            *
                                        </span>

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

                                    </label>


                                    <input
                                        type="date"
                                        id="dateOfBirth"
                                        name="date_of_birth"
                                        class="form-control
                                               form-control-lg"
                                    >

                                </div>


                                {{-- Palm Selection --}}

                                <div class="mb-3">

                                    <label
                                        for="palmType"
                                        class="form-label
                                               small
                                               fw-semibold
                                               text-pn-brown"
                                    >

                                        Palm Information

                                    </label>


                                    <select
                                        id="palmType"
                                        name="palm_type"
                                        class="form-select
                                               form-select-lg"
                                    >

                                        <option selected>
                                            Select an option
                                        </option>

                                        <option value="left">
                                            Left Palm
                                        </option>

                                        <option value="right">
                                            Right Palm
                                        </option>

                                        <option value="both">
                                            Both Palms
                                        </option>

                                    </select>

                                </div>


                                {{-- Upload --}}

                                <div class="mb-3">

                                    <label
                                        for="palmImage"
                                        class="form-label
                                               small
                                               fw-semibold
                                               text-pn-brown"
                                    >

                                        Palm Image

                                        <span
                                            class="text-secondary
                                                   fw-normal"
                                        >
                                            (If required)
                                        </span>

                                    </label>


                                    <input
                                        type="file"
                                        id="palmImage"
                                        name="palm_image"
                                        class="form-control
                                               form-control-lg"
                                        accept="image/*"
                                    >


                                    <div class="form-text">

                                        Upload requirements and supported
                                        formats will be finalized with
                                        the actual service.

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
                                        provided is accurate.

                                        <span class="text-danger">
                                            *
                                        </span>

                                    </label>

                                </div>


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
     PALM READING AREAS
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

                    Palm Reading Experience

                </span>


                <h2
                    class="font-serif
                           display-6
                           text-pn-brown
                           mt-2
                           mb-3"
                >

                    A simple path from
                    palm to insight.

                </h2>


                <div
                    class="pn-divider
                           mb-4"
                ></div>


                <p
                    class="text-secondary
                           mb-0"
                >

                    The final service can organize the applicable
                    palm-reading information into clear sections
                    for the customer.

                </p>

            </div>


            <div class="col-12 col-lg-7">

                <div
                    class="row
                           row-cols-1
                           row-cols-sm-2
                           g-3"
                >

                    @foreach($palmAreas as $area)

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
     GUIDANCE AREAS
============================================================ --}}

<section class="py-5 bg-pn-cream">

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
                Insights
            </span>


            <h2
                class="font-serif
                       display-6
                       text-pn-brown
                       mt-2"
            >

                Explore areas of guidance

            </h2>


            <p
                class="text-secondary
                       col-lg-7
                       mx-auto
                       mb-0"
            >

                These are visual placeholders for the areas
                that the final Palm Reading service may present.

            </p>

        </div>


        <div
            class="row
                   row-cols-2
                   row-cols-md-4
                   g-3"
        >

            @foreach($guidanceAreas as $area)

                <div class="col">

                    <div
                        class="card
                               border
                               border-warning-subtle
                               rounded-4
                               bg-white
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
                                       mx-auto"
                                style="width:58px;height:58px;"
                            >

                                <i
                                    class="bi {{ $area['icon'] }}
                                           fs-4"
                                ></i>

                            </div>


                            <h3
                                class="font-serif
                                       h5
                                       text-pn-brown
                                       mt-3
                                       mb-0"
                            >

                                {{ $area['title'] }}

                            </h3>

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

                How Palm Reading Works

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

                        Provide the information requested by
                        the service.

                    </p>

                </div>

            </div>


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

                        Submit your palm-reading request.

                    </p>

                </div>

            </div>


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

                        The configured service processes the
                        submitted information.

                    </p>

                </div>

            </div>


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

                        View Insights

                    </h3>


                    <p
                        class="small
                               text-secondary
                               mb-0"
                    >

                        Continue to the available palm-reading
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
                    Personalized Guidance
                </span>


                <h2
                    class="font-serif
                           display-6
                           text-pn-brown
                           mt-2
                           mb-3"
                >

                    Want a personalized consultation?

                </h2>


                <p
                    class="text-secondary
                           mb-0"
                >

                    Explore available astrologers and
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

                    Palm Reading information

                </strong>


                <small class="text-secondary">

                    Palm-reading methods, image requirements,
                    interpretation, available services and
                    result details will depend on the final
                    service configuration.

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
                    class="bi bi-hand-index-thumb
                           display-5
                           text-warning"
                ></i>


                <h2
                    class="font-serif
                           display-6
                           mt-3"
                >

                    Begin your Palm Reading journey.

                </h2>


                <p
                    class="text-white-50
                           col-lg-7
                           mx-auto
                           mb-4"
                >

                    Provide your details and continue to the
                    configured palm-reading experience.

                </p>


                <a
                    href="#palm-form"
                    class="btn
                           btn-warning
                           text-dark
                           fw-semibold
                           px-4"
                >

                    Start Palm Reading

                    <i
                        class="bi bi-arrow-right ms-2"
                    ></i>

                </a>

            </div>

        </div>

    </div>

</section>

@endsection