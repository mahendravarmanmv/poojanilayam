@extends('layouts.app')

@section('title', 'Vastu Consultation | Pooja Nilayam')

@section(
    'meta_description',
    'Explore Vastu consultation services through Pooja Nilayam.'
)

@section('content')

@php

    /*
    |--------------------------------------------------------------------------
    | TEMPORARY VASTU UI DATA
    |--------------------------------------------------------------------------
    | UI prototype only.
    | Actual Vastu consultation rules, questionnaire,
    | calculations and report generation will be implemented later.
    |--------------------------------------------------------------------------
    */

    $services = [

        [
            'title' => 'Home Vastu',
            'description' =>
                'Explore Vastu guidance for your home and living spaces.',
            'icon' => 'bi-house-heart'
        ],

        [
            'title' => 'Office Vastu',
            'description' =>
                'Explore Vastu consultation for workplace environments.',
            'icon' => 'bi-building'
        ],

        [
            'title' => 'Personal Consultation',
            'description' =>
                'Connect with an astrologer for personalized Vastu guidance.',
            'icon' => 'bi-person-hearts'
        ]

    ];


    $consultationAreas = [

        [
            'title' => 'Property Details',
            'description' =>
                'Provide the property information requested by the service.',
            'icon' => 'bi-house'
        ],

        [
            'title' => 'Location',
            'description' =>
                'Enter the relevant location details for your property.',
            'icon' => 'bi-geo-alt'
        ],

        [
            'title' => 'Property Type',
            'description' =>
                'Select the type of property you want to discuss.',
            'icon' => 'bi-buildings'
        ],

        [
            'title' => 'Vastu Guidance',
            'description' =>
                'Receive the configured consultation and recommendations.',
            'icon' => 'bi-stars'
        ]

    ];


    $propertyTypes = [

        'Residential',
        'Apartment',
        'Villa',
        'Office',
        'Commercial',
        'Other'

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
                    Vastu Consultation
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

                    Bring harmony to
                    <span class="text-pn-primary">
                        your space.
                    </span>

                </h1>


                <p
                    class="lead
                           text-secondary
                           mb-4"
                >

                    Explore Vastu consultation services through
                    Pooja Nilayam and discover guidance for your
                    home, office or property.

                </p>


                <div
                    class="d-flex
                           flex-column
                           flex-sm-row
                           gap-2"
                >

                    <a
                        href="#vastu-form"
                        class="btn
                               btn-pn
                               btn-lg"
                    >

                        Start Consultation

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
                            class="bi bi-house-heart
                                   text-pn-primary"
                        ></i>


                        <small class="text-secondary">

                            Property-focused guidance

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
                                alt="Vastu consultation"
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

                                Vastu Consultation

                            </span>


                            <h2
                                class="font-serif
                                       h2
                                       mt-2
                                       mb-0"
                            >

                                Create a balanced and
                                harmonious environment.

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

                                    <i class="bi bi-compass"></i>

                                </div>


                                <div>

                                    <strong
                                        class="small
                                               d-block
                                               text-pn-brown"
                                    >

                                        Vastu Guidance

                                    </strong>


                                    <small class="text-secondary">

                                        Begin with your property details.

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

                        Vastu Consultation

                    </span>


                    <h2
                        class="font-serif
                               display-6
                               text-pn-brown
                               mt-2"
                    >

                        Start with your space.

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

                        Share the information requested by the
                        configured Vastu service so the consultation
                        can be tailored to your property.

                    </p>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- ============================================================
     SERVICE TYPES
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
                                href="#vastu-form"
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
     VASTU CONSULTATION FORM
============================================================ --}}

<section
    id="vastu-form"
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

                                    Tell us about
                                    your space.

                                </h2>


                                <p
                                    class="small
                                           text-secondary"
                                >

                                    Provide the information
                                    requested by the final
                                    Vastu consultation service.

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

                                                Tell us who we are
                                                assisting.

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

                                            <i class="bi bi-house"></i>

                                        </div>


                                        <div>

                                            <strong
                                                class="small
                                                       d-block
                                                       text-pn-brown"
                                            >

                                                Property Details

                                            </strong>


                                            <small
                                                class="text-secondary"
                                            >

                                                Tell us about the property.

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

                                            <i class="bi bi-compass"></i>

                                        </div>


                                        <div>

                                            <strong
                                                class="small
                                                       d-block
                                                       text-pn-brown"
                                            >

                                                Consultation

                                            </strong>


                                            <small
                                                class="text-secondary"
                                            >

                                                Continue to the configured
                                                Vastu service.

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
                                            class="bi bi-house-heart"
                                        ></i>

                                    </div>


                                    <div>

                                        <h2
                                            class="font-serif
                                                   h3
                                                   text-pn-brown
                                                   mb-1"
                                        >

                                            Consultation Details

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


                                {{-- Property Type --}}

                                <div class="mb-3">

                                    <label
                                        for="propertyType"
                                        class="form-label
                                               small
                                               fw-semibold
                                               text-pn-brown"
                                    >

                                        Property Type

                                        <span class="text-danger">
                                            *
                                        </span>

                                    </label>


                                    <select
                                        id="propertyType"
                                        name="property_type"
                                        class="form-select
                                               form-select-lg"
                                        required
                                    >

                                        <option
                                            value=""
                                            selected
                                            disabled
                                        >
                                            Select property type
                                        </option>


                                        @foreach($propertyTypes as $type)

                                            <option value="{{ $type }}">

                                                {{ $type }}

                                            </option>

                                        @endforeach

                                    </select>

                                </div>


                                {{-- Location --}}

                                <div class="mb-3">

                                    <label
                                        for="location"
                                        class="form-label
                                               small
                                               fw-semibold
                                               text-pn-brown"
                                    >

                                        Property Location

                                        <span class="text-danger">
                                            *
                                        </span>

                                    </label>


                                    <input
                                        type="text"
                                        id="location"
                                        name="location"
                                        class="form-control
                                               form-control-lg"
                                        placeholder="City / Location"
                                        required
                                    >

                                </div>


                                {{-- Property Details --}}

                                <div class="mb-3">

                                    <label
                                        for="propertyDetails"
                                        class="form-label
                                               small
                                               fw-semibold
                                               text-pn-brown"
                                    >

                                        Property Details

                                        <span
                                            class="text-secondary
                                                   fw-normal"
                                        >
                                            (Optional)
                                        </span>

                                    </label>


                                    <textarea
                                        id="propertyDetails"
                                        name="property_details"
                                        class="form-control"
                                        rows="4"
                                        placeholder="Share relevant property details..."
                                    ></textarea>

                                </div>


                                {{-- Consultation Requirement --}}

                                <div class="mb-4">

                                    <label
                                        for="consultationRequirement"
                                        class="form-label
                                               small
                                               fw-semibold
                                               text-pn-brown"
                                    >

                                        What would you like
                                        guidance on?

                                    </label>


                                    <textarea
                                        id="consultationRequirement"
                                        name="consultation_requirement"
                                        class="form-control"
                                        rows="3"
                                        placeholder="Describe your requirement..."
                                    ></textarea>

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
     CONSULTATION AREAS
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

                    Vastu Experience

                </span>


                <h2
                    class="font-serif
                           display-6
                           text-pn-brown
                           mt-2
                           mb-3"
                >

                    From property details
                    to personalized guidance.

                </h2>


                <div
                    class="pn-divider
                           mb-4"
                ></div>


                <p
                    class="text-secondary
                           mb-0"
                >

                    The final Vastu service can organize the
                    relevant property information, assessment
                    and recommendations into a clear customer
                    experience.

                </p>

            </div>


            <div class="col-12 col-lg-7">

                <div
                    class="row
                           row-cols-1
                           row-cols-sm-2
                           g-3"
                >

                    @foreach($consultationAreas as $area)

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
     VASTU GUIDANCE AREAS
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

                Guidance

            </span>


            <h2
                class="font-serif
                       display-6
                       text-pn-brown
                       mt-2"
            >

                Areas you can discuss

            </h2>


            <p
                class="text-secondary
                       col-lg-7
                       mx-auto
                       mb-0"
            >

                These categories are presented as UI areas.
                The exact consultation scope will be controlled
                by the final Vastu service configuration.

            </p>

        </div>


        <div
            class="row
                   row-cols-2
                   row-cols-md-4
                   g-3"
        >

            @foreach([

                [
                    'title' => 'Home',
                    'icon' => 'bi-house-heart'
                ],

                [
                    'title' => 'Office',
                    'icon' => 'bi-building'
                ],

                [
                    'title' => 'Property',
                    'icon' => 'bi-buildings'
                ],

                [
                    'title' => 'Space',
                    'icon' => 'bi-compass'
                ]

            ] as $area)

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

                        <div class="card-body p-4">

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

                How Vastu Consultation Works

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

                        Share Details

                    </h3>


                    <p
                        class="small
                               text-secondary
                               mb-0"
                    >

                        Provide the information requested
                        about your property.

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

                        Submit Request

                    </h3>


                    <p
                        class="small
                               text-secondary
                               mb-0"
                    >

                        Submit your Vastu consultation request.

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

                        Consultation

                    </h3>


                    <p
                        class="small
                               text-secondary
                               mb-0"
                    >

                        Continue through the configured
                        consultation process.

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

                        Receive Guidance

                    </h3>


                    <p
                        class="small
                               text-secondary
                               mb-0"
                    >

                        Continue to the available Vastu
                        recommendations.

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

                    Prefer a personal consultation?

                </h2>


                <p
                    class="text-secondary
                           mb-0"
                >

                    Explore available astrologers and
                    consultation options for personalized
                    Vastu guidance.

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

                    Vastu consultation information

                </strong>


                <small class="text-secondary">

                    The final consultation questionnaire,
                    property requirements, assessment method,
                    recommendations and report format will be
                    based on the approved Vastu service
                    configuration.

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
                    class="bi bi-house-heart
                           display-5
                           text-warning"
                ></i>


                <h2
                    class="font-serif
                           display-6
                           mt-3"
                >

                    Begin your Vastu journey.

                </h2>


                <p
                    class="text-white-50
                           col-lg-7
                           mx-auto
                           mb-4"
                >

                    Tell us about your space and continue to
                    the configured Vastu consultation experience.

                </p>


                <a
                    href="#vastu-form"
                    class="btn
                           btn-warning
                           text-dark
                           fw-semibold
                           px-4"
                >

                    Start Consultation

                    <i
                        class="bi bi-arrow-right ms-2"
                    ></i>

                </a>

            </div>

        </div>

    </div>

</section>

@endsection