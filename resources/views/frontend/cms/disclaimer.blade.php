@extends('layouts.app')

@section('title', 'Disclaimer | Pooja Nilayam')

@section(
    'meta_description',
    'Read the Pooja Nilayam Disclaimer covering spiritual services, astrology, digital experiences, products, information and third-party services.'
)

@section('content')

@php

    /*
    |--------------------------------------------------------------------------
    | DISCLAIMER CONTENT
    |--------------------------------------------------------------------------
    | IMPORTANT:
    | The project documents confirm that Disclaimer is a required
    | frontend CMS page, but they do not contain the final approved
    | legal disclaimer wording.
    |
    | Therefore this file provides the complete UI structure.
    | Final legal content should be maintained through CMS.
    |--------------------------------------------------------------------------
    */

    $lastUpdated = 'To be updated by Pooja Nilayam';


    $sections = [

        [
            'id' => 'overview',
            'number' => '01',
            'title' => 'Disclaimer Overview'
        ],

        [
            'id' => 'spiritual',
            'number' => '02',
            'title' => 'Spiritual & Religious Content'
        ],

        [
            'id' => 'pooja',
            'number' => '03',
            'title' => 'Pooja Services'
        ],

        [
            'id' => 'digital',
            'number' => '04',
            'title' => 'Digital & Live Pooja'
        ],

        [
            'id' => 'astrology',
            'number' => '05',
            'title' => 'Astrology Services'
        ],

        [
            'id' => 'products',
            'number' => '06',
            'title' => 'Products & Marketplace'
        ],

        [
            'id' => 'donations',
            'number' => '07',
            'title' => 'Donations'
        ],

        [
            'id' => 'content',
            'number' => '08',
            'title' => 'Website Content'
        ],

        [
            'id' => 'third-party',
            'number' => '09',
            'title' => 'Third-Party Services'
        ],

        [
            'id' => 'availability',
            'number' => '10',
            'title' => 'Service Availability'
        ],

        [
            'id' => 'results',
            'number' => '11',
            'title' => 'Results & Outcomes'
        ],

        [
            'id' => 'external-links',
            'number' => '12',
            'title' => 'External Links'
        ],

        [
            'id' => 'changes',
            'number' => '13',
            'title' => 'Changes to Disclaimer'
        ],

        [
            'id' => 'contact',
            'number' => '14',
            'title' => 'Contact Us'
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
                        href="{{ url('/terms-conditions') }}"
                        class="text-pn-primary"
                    >
                        Legal
                    </a>

                </li>


                <li
                    class="breadcrumb-item active"
                    aria-current="page"
                >
                    Disclaimer
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
                   justify-content-center
                   text-center"
        >

            <div class="col-12 col-lg-9">

                <span
                    class="small
                           text-pn-gold
                           fw-semibold
                           text-uppercase"
                >
                    Legal Information
                </span>


                <h1
                    class="font-serif
                           display-4
                           text-pn-brown
                           mt-2
                           mb-3"
                >
                    Disclaimer
                </h1>


                <p
                    class="lead
                           text-secondary
                           mb-3"
                >

                    Important information regarding the content,
                    services and experiences provided through
                    Pooja Nilayam.

                </p>


                <div
                    class="d-flex
                           flex-wrap
                           justify-content-center
                           align-items-center
                           gap-2"
                >

                    <span
                        class="badge
                               bg-white
                               text-pn-primary
                               border
                               border-warning-subtle
                               rounded-pill
                               px-3
                               py-2"
                    >

                        <i
                            class="bi bi-exclamation-circle me-1"
                        ></i>

                        Disclaimer

                    </span>


                    <span
                        class="small
                               text-secondary"
                    >

                        Last Updated:
                        {{ $lastUpdated }}

                    </span>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- ============================================================
     IMPORTANT NOTICE
============================================================ --}}

<section class="py-4">

    <div class="container">

        <div
            class="alert
                   alert-warning
                   border-warning-subtle
                   rounded-4
                   mb-0"
            role="alert"
        >

            <div
                class="d-flex
                       align-items-start
                       gap-3"
            >

                <i
                    class="bi bi-info-circle-fill
                           text-warning
                           fs-5
                           mt-1"
                ></i>


                <div>

                    <strong
                        class="d-block
                               text-pn-brown
                               mb-1"
                    >
                        Final Disclaimer Requires Legal Approval
                    </strong>


                    <p
                        class="small
                               text-secondary
                               mb-0"
                    >

                        The project documentation identifies
                        Disclaimer as a required CMS page but does
                        not provide the final approved legal wording.
                        The content below therefore represents the
                        page structure and documented service areas,
                        not final legal advice or approved legal text.

                    </p>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- ============================================================
     KEY NOTICE CARDS
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
                Important Information
            </span>


            <h2
                class="font-serif
                       display-6
                       text-pn-brown
                       mt-2
                       mb-3"
            >
                Please Read Before Using Our Services
            </h2>


            <p
                class="text-secondary
                       mx-auto
                       mb-0"
                style="max-width:760px;"
            >

                Pooja Nilayam brings together spiritual services,
                digital experiences, astrology, products, donations
                and related content. The final disclaimer will define
                the applicable limitations and conditions.

            </p>

        </div>


        <div
            class="row
                   row-cols-1
                   row-cols-md-2
                   row-cols-lg-4
                   g-3"
        >

            @foreach([

                [
                    'icon' => 'bi-flower1',
                    'title' => 'Spiritual Services',
                    'text' => 'Spiritual and devotional services form part of the documented platform scope.'
                ],

                [
                    'icon' => 'bi-stars',
                    'title' => 'Digital Experiences',
                    'text' => 'Digital Pooja and Live Pooja are documented platform experiences.'
                ],

                [
                    'icon' => 'bi-moon-stars',
                    'title' => 'Astrology',
                    'text' => 'Astrology services are included as a dedicated platform module.'
                ],

                [
                    'icon' => 'bi-bag',
                    'title' => 'Marketplace',
                    'text' => 'The platform includes a Pooja Store for devotional products.'
                ]

            ] as $item)

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
                                   text-center"
                        >

                            <span
                                class="d-inline-flex
                                       align-items-center
                                       justify-content-center
                                       rounded-circle
                                       bg-pn-cream
                                       text-pn-primary
                                       mb-3"
                                style="width:58px;height:58px;"
                            >

                                <i
                                    class="bi {{ $item['icon'] }}
                                           fs-5"
                                ></i>

                            </span>


                            <h3
                                class="font-serif
                                       h5
                                       text-pn-brown
                                       mb-2"
                            >

                                {{ $item['title'] }}

                            </h3>


                            <p
                                class="small
                                       text-secondary
                                       mb-0"
                            >

                                {{ $item['text'] }}

                            </p>

                        </div>

                    </article>

                </div>

            @endforeach

        </div>

    </div>

</section>


{{-- ============================================================
     MAIN CONTENT
============================================================ --}}

<section class="bg-pn-beige py-5">

    <div class="container">

        <div class="row g-4 g-xl-5">


            {{-- ==================================================
                 TABLE OF CONTENTS
            =================================================== --}}

            <div class="col-12 col-lg-3">

                <div
                    class="position-sticky"
                    style="top:100px;"
                >

                    <div
                        class="card
                               border
                               border-warning-subtle
                               rounded-5"
                    >

                        <div
                            class="card-body
                                   p-3"
                        >

                            <div
                                class="px-2
                                       mb-3"
                            >

                                <span
                                    class="small
                                           text-pn-gold
                                           fw-semibold
                                           text-uppercase"
                                >
                                    On This Page
                                </span>


                                <h2
                                    class="font-serif
                                           h5
                                           text-pn-brown
                                           mt-1
                                           mb-0"
                                >
                                    Disclaimer
                                </h2>

                            </div>


                            <nav
                                id="disclaimerNavigation"
                                class="vstack
                                       gap-1"
                                aria-label="Disclaimer sections"
                            >

                                @foreach(
                                    $sections as $section
                                )

                                    <a
                                        href="#{{ $section['id'] }}"
                                        class="disclaimer-nav-link
                                               d-flex
                                               align-items-center
                                               gap-2
                                               text-decoration-none
                                               rounded-3
                                               px-3
                                               py-2"
                                    >

                                        <span
                                            class="small
                                                   text-pn-gold
                                                   fw-semibold"
                                        >

                                            {{ $section['number'] }}

                                        </span>


                                        <span
                                            class="small
                                                   text-secondary"
                                        >

                                            {{ $section['title'] }}

                                        </span>

                                    </a>

                                @endforeach

                            </nav>

                        </div>

                    </div>


                    {{-- Support Card --}}

                    <div
                        class="bg-white
                               rounded-5
                               p-4
                               mt-4
                               border
                               border-warning-subtle"
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
                                class="bi bi-headset
                                       fs-5"
                            ></i>

                        </div>


                        <h3
                            class="font-serif
                                   h5
                                   text-pn-brown"
                        >
                            Have Questions?
                        </h3>


                        <p
                            class="small
                                   text-secondary"
                        >

                            Contact the Pooja Nilayam support team
                            if you need clarification about our
                            services.

                        </p>


                        <a
                            href="{{ url('/contact-us') }}"
                            class="btn
                                   btn-pn-outline
                                   w-100"
                        >

                            Contact Us

                        </a>

                    </div>

                </div>

            </div>


            {{-- ==================================================
                 DISCLAIMER CONTENT
            =================================================== --}}

            <div class="col-12 col-lg-9">

                <article
                    class="card
                           border
                           border-warning-subtle
                           rounded-5"
                >

                    <div
                        class="card-body
                               p-4
                               p-md-5"
                    >


                        {{-- 01 Overview --}}

                        <section
                            id="overview"
                            class="disclaimer-section
                                   pb-4
                                   mb-4
                                   border-bottom
                                   border-warning-subtle"
                        >

                            <div
                                class="d-flex
                                       align-items-start
                                       gap-3"
                            >

                                <span
                                    class="disclaimer-number
                                           text-pn-gold
                                           fw-semibold"
                                >
                                    01
                                </span>


                                <div>

                                    <h2
                                        class="font-serif
                                               h3
                                               text-pn-brown
                                               mb-3"
                                    >
                                        Disclaimer Overview
                                    </h2>


                                    <p
                                        class="text-secondary
                                               lh-lg"
                                    >

                                        This page is intended to
                                        provide important information
                                        about the nature of content,
                                        services and experiences made
                                        available through Pooja Nilayam.

                                    </p>


                                    <p
                                        class="small
                                               text-secondary
                                               mb-0"
                                    >

                                        The final approved legal
                                        disclaimer will be maintained
                                        through the CMS.

                                    </p>

                                </div>

                            </div>

                        </section>


                        {{-- 02 Spiritual --}}

                        <section
                            id="spiritual"
                            class="disclaimer-section
                                   pb-4
                                   mb-4
                                   border-bottom
                                   border-warning-subtle"
                        >

                            <div
                                class="d-flex
                                       align-items-start
                                       gap-3"
                            >

                                <span
                                    class="disclaimer-number
                                           text-pn-gold
                                           fw-semibold"
                                >
                                    02
                                </span>


                                <div>

                                    <h2
                                        class="font-serif
                                               h3
                                               text-pn-brown
                                               mb-3"
                                    >
                                        Spiritual & Religious Content
                                    </h2>


                                    <p
                                        class="text-secondary
                                               lh-lg"
                                    >

                                        Pooja Nilayam is designed as
                                        a spiritual and devotional
                                        platform. The project scope
                                        includes poojas, temples,
                                        priests, digital experiences,
                                        mantras, donations and other
                                        devotional content.

                                    </p>


                                    <div
                                        class="bg-pn-cream
                                               rounded-4
                                               p-4"
                                    >

                                        <div
                                            class="d-flex
                                                   align-items-start
                                                   gap-3"
                                        >

                                            <i
                                                class="bi bi-flower1
                                                       text-pn-primary
                                                       fs-4"
                                            ></i>


                                            <small
                                                class="text-secondary"
                                            >

                                                The final disclaimer
                                                should define the
                                                appropriate legal
                                                limitations applicable
                                                to spiritual and
                                                devotional content.

                                            </small>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </section>


                        {{-- 03 Pooja --}}

                        <section
                            id="pooja"
                            class="disclaimer-section
                                   pb-4
                                   mb-4
                                   border-bottom
                                   border-warning-subtle"
                        >

                            <div
                                class="d-flex
                                       align-items-start
                                       gap-3"
                            >

                                <span
                                    class="disclaimer-number
                                           text-pn-gold
                                           fw-semibold"
                                >
                                    03
                                </span>


                                <div>

                                    <h2
                                        class="font-serif
                                               h3
                                               text-pn-brown
                                               mb-3"
                                    >
                                        Pooja Services
                                    </h2>


                                    <p
                                        class="text-secondary
                                               lh-lg"
                                    >

                                        The documented platform
                                        includes Online Pooja,
                                        Temple Pooja and Priest-related
                                        services. Customers may browse
                                        services, select applicable
                                        dates and times, provide
                                        devotee details and complete
                                        payment.

                                    </p>


                                    <p
                                        class="small
                                               text-secondary
                                               mb-0"
                                    >

                                        The final disclaimer should
                                        define the applicable
                                        limitations relating to
                                        service availability,
                                        performance and outcomes.

                                    </p>

                                </div>

                            </div>

                        </section>


                        {{-- 04 Digital --}}

                        <section
                            id="digital"
                            class="disclaimer-section
                                   pb-4
                                   mb-4
                                   border-bottom
                                   border-warning-subtle"
                        >

                            <div
                                class="d-flex
                                       align-items-start
                                       gap-3"
                            >

                                <span
                                    class="disclaimer-number
                                           text-pn-gold
                                           fw-semibold"
                                >
                                    04
                                </span>


                                <div>

                                    <h2
                                        class="font-serif
                                               h3
                                               text-pn-brown
                                               mb-3"
                                    >
                                        Digital & Live Pooja
                                    </h2>


                                    <p
                                        class="text-secondary
                                               lh-lg"
                                    >

                                        The project scope includes AI
                                        Personalized Digital Pooja and
                                        Online Live Pooja, including
                                        digital personalization,
                                        live sessions, recordings,
                                        photos, videos and completion
                                        notifications.

                                    </p>


                                    <div
                                        class="row
                                               row-cols-2
                                               row-cols-md-4
                                               g-3"
                                    >

                                        @foreach([
                                            ['icon' => 'bi-stars', 'title' => 'Digital Pooja'],
                                            ['icon' => 'bi-camera-video', 'title' => 'Live Session'],
                                            ['icon' => 'bi-camera', 'title' => 'Photos'],
                                            ['icon' => 'bi-play-btn', 'title' => 'Recording']
                                        ] as $item)

                                            <div class="col">

                                                <div
                                                    class="bg-pn-cream
                                                           rounded-4
                                                           p-3
                                                           text-center
                                                           h-100"
                                                >

                                                    <i
                                                        class="bi {{ $item['icon'] }}
                                                               text-pn-primary
                                                               fs-5"
                                                    ></i>


                                                    <span
                                                        class="d-block
                                                               small
                                                               text-pn-brown
                                                               fw-semibold
                                                               mt-2"
                                                    >

                                                        {{ $item['title'] }}

                                                    </span>

                                                </div>

                                            </div>

                                        @endforeach

                                    </div>

                                </div>

                            </div>

                        </section>


                        {{-- 05 Astrology --}}

                        <section
                            id="astrology"
                            class="disclaimer-section
                                   pb-4
                                   mb-4
                                   border-bottom
                                   border-warning-subtle"
                        >

                            <div
                                class="d-flex
                                       align-items-start
                                       gap-3"
                            >

                                <span
                                    class="disclaimer-number
                                           text-pn-gold
                                           fw-semibold"
                                >
                                    05
                                </span>


                                <div>

                                    <h2
                                        class="font-serif
                                               h3
                                               text-pn-brown
                                               mb-3"
                                    >
                                        Astrology Services
                                    </h2>


                                    <p
                                        class="text-secondary
                                               lh-lg"
                                    >

                                        The documented astrology
                                        module includes Horoscope,
                                        Kundli, Match Making,
                                        Numerology, Palm Reading and
                                        Vastu Consultation.

                                    </p>


                                    <div
                                        class="alert
                                               alert-light
                                               border
                                               rounded-4
                                               mb-0"
                                    >

                                        <small
                                            class="text-secondary"
                                        >

                                            The final disclaimer should
                                            define the legal limitations
                                            applicable to astrology
                                            information, consultations
                                            and related content.

                                        </small>

                                    </div>

                                </div>

                            </div>

                        </section>


                        {{-- 06 Products --}}

                        <section
                            id="products"
                            class="disclaimer-section
                                   pb-4
                                   mb-4
                                   border-bottom
                                   border-warning-subtle"
                        >

                            <div
                                class="d-flex
                                       align-items-start
                                       gap-3"
                            >

                                <span
                                    class="disclaimer-number
                                           text-pn-gold
                                           fw-semibold"
                                >
                                    06
                                </span>


                                <div>

                                    <h2
                                        class="font-serif
                                               h3
                                               text-pn-brown
                                               mb-3"
                                    >
                                        Products & Marketplace
                                    </h2>


                                    <p
                                        class="text-secondary
                                               lh-lg"
                                    >

                                        The Pooja Store is documented
                                        to include Pooja Samagri,
                                        Pooja Kits, product browsing,
                                        cart, checkout, payment,
                                        shipment and order tracking.

                                    </p>


                                    <a
                                        href="{{ url('/shop') }}"
                                        class="btn
                                               btn-sm
                                               btn-pn-outline"
                                    >

                                        Visit Pooja Store

                                        <i
                                            class="bi bi-arrow-right ms-1"
                                        ></i>

                                    </a>

                                </div>

                            </div>

                        </section>


                        {{-- 07 Donations --}}

                        <section
                            id="donations"
                            class="disclaimer-section
                                   pb-4
                                   mb-4
                                   border-bottom
                                   border-warning-subtle"
                        >

                            <div
                                class="d-flex
                                       align-items-start
                                       gap-3"
                            >

                                <span
                                    class="disclaimer-number
                                           text-pn-gold
                                           fw-semibold"
                                >
                                    07
                                </span>


                                <div>

                                    <h2
                                        class="font-serif
                                               h3
                                               text-pn-brown
                                               mb-3"
                                    >
                                        Donations
                                    </h2>


                                    <p
                                        class="text-secondary
                                               lh-lg"
                                    >

                                        The project includes Temple
                                        Donations, NGO Donations,
                                        Annadanam and Goshala
                                        donations, together with
                                        donation receipts.

                                    </p>


                                    <p
                                        class="small
                                               text-secondary
                                               mb-0"
                                    >

                                        The final disclaimer should
                                        establish the appropriate
                                        legal treatment and limitations
                                        applicable to donation-related
                                        information and services.

                                    </p>

                                </div>

                            </div>

                        </section>


                        {{-- 08 Content --}}

                        <section
                            id="content"
                            class="disclaimer-section
                                   pb-4
                                   mb-4
                                   border-bottom
                                   border-warning-subtle"
                        >

                            <div
                                class="d-flex
                                       align-items-start
                                       gap-3"
                            >

                                <span
                                    class="disclaimer-number
                                           text-pn-gold
                                           fw-semibold"
                                >
                                    08
                                </span>


                                <div>

                                    <h2
                                        class="font-serif
                                               h3
                                               text-pn-brown
                                               mb-3"
                                    >
                                        Website Content
                                    </h2>


                                    <p
                                        class="text-secondary
                                               lh-lg"
                                    >

                                        Pooja Nilayam includes website
                                        content such as service
                                        descriptions, temple information,
                                        blogs, devotional content,
                                        FAQs, testimonials and other
                                        CMS-managed content.

                                    </p>


                                    <p
                                        class="small
                                               text-secondary
                                               mb-0"
                                    >

                                        Final content accuracy,
                                        completeness and legal
                                        disclaimers should be governed
                                        by the approved CMS/legal
                                        content.

                                    </p>

                                </div>

                            </div>

                        </section>


                        {{-- 09 Third Party --}}

                        <section
                            id="third-party"
                            class="disclaimer-section
                                   pb-4
                                   mb-4
                                   border-bottom
                                   border-warning-subtle"
                        >

                            <div
                                class="d-flex
                                       align-items-start
                                       gap-3"
                            >

                                <span
                                    class="disclaimer-number
                                           text-pn-gold
                                           fw-semibold"
                                >
                                    09
                                </span>


                                <div>

                                    <h2
                                        class="font-serif
                                               h3
                                               text-pn-brown
                                               mb-3"
                                    >
                                        Third-Party Services
                                    </h2>


                                    <p
                                        class="text-secondary
                                               lh-lg"
                                    >

                                        The overall project includes
                                        integrations and third-party
                                        services such as payment
                                        gateways and, for Phase 1
                                        Online Live Pooja, Google Meet
                                        integration.

                                    </p>


                                    <div
                                        class="bg-pn-cream
                                               rounded-4
                                               p-4"
                                    >

                                        <div
                                            class="d-flex
                                                   align-items-start
                                                   gap-3"
                                        >

                                            <i
                                                class="bi bi-link-45deg
                                                       text-pn-primary
                                                       fs-4"
                                            ></i>


                                            <small
                                                class="text-secondary"
                                            >

                                                The final disclaimer
                                                should identify the
                                                applicable limitations
                                                associated with
                                                third-party services.

                                            </small>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </section>


                        {{-- 10 Availability --}}

                        <section
                            id="availability"
                            class="disclaimer-section
                                   pb-4
                                   mb-4
                                   border-bottom
                                   border-warning-subtle"
                        >

                            <div
                                class="d-flex
                                       align-items-start
                                       gap-3"
                            >

                                <span
                                    class="disclaimer-number
                                           text-pn-gold
                                           fw-semibold"
                                >
                                    10
                                </span>


                                <div>

                                    <h2
                                        class="font-serif
                                               h3
                                               text-pn-brown
                                               mb-3"
                                    >
                                        Service Availability
                                    </h2>


                                    <p
                                        class="text-secondary
                                               lh-lg
                                               mb-0"
                                    >

                                        The availability of specific
                                        services, sessions, slots,
                                        products and other platform
                                        functionality may be subject
                                        to the operational conditions
                                        defined by the business.

                                    </p>

                                </div>

                            </div>

                        </section>


                        {{-- 11 Results --}}

                        <section
                            id="results"
                            class="disclaimer-section
                                   pb-4
                                   mb-4
                                   border-bottom
                                   border-warning-subtle"
                        >

                            <div
                                class="d-flex
                                       align-items-start
                                       gap-3"
                            >

                                <span
                                    class="disclaimer-number
                                           text-pn-gold
                                           fw-semibold"
                                >
                                    11
                                </span>


                                <div>

                                    <h2
                                        class="font-serif
                                               h3
                                               text-pn-brown
                                               mb-3"
                                    >
                                        Results & Outcomes
                                    </h2>


                                    <p
                                        class="text-secondary
                                               lh-lg"
                                    >

                                        The final disclaimer should
                                        define the applicable
                                        limitations concerning
                                        outcomes, results or
                                        expectations associated with
                                        spiritual, devotional,
                                        astrology or other services.

                                    </p>


                                    <div
                                        class="alert
                                               alert-light
                                               border
                                               rounded-4
                                               mb-0"
                                    >

                                        <small
                                            class="text-secondary"
                                        >

                                            No specific outcome
                                            guarantee is being stated
                                            here because the project
                                            documents do not provide
                                            approved legal wording.

                                        </small>

                                    </div>

                                </div>

                            </div>

                        </section>


                        {{-- 12 External Links --}}

                        <section
                            id="external-links"
                            class="disclaimer-section
                                   pb-4
                                   mb-4
                                   border-bottom
                                   border-warning-subtle"
                        >

                            <div
                                class="d-flex
                                       align-items-start
                                       gap-3"
                            >

                                <span
                                    class="disclaimer-number
                                           text-pn-gold
                                           fw-semibold"
                                >
                                    12
                                </span>


                                <div>

                                    <h2
                                        class="font-serif
                                               h3
                                               text-pn-brown
                                               mb-3"
                                    >
                                        External Links
                                    </h2>


                                    <p
                                        class="text-secondary
                                               lh-lg
                                               mb-0"
                                    >

                                        Where external websites or
                                        third-party services are
                                        referenced, the final legal
                                        disclaimer should define the
                                        applicable responsibility and
                                        limitations.

                                    </p>

                                </div>

                            </div>

                        </section>


                        {{-- 13 Changes --}}

                        <section
                            id="changes"
                            class="disclaimer-section
                                   pb-4
                                   mb-4
                                   border-bottom
                                   border-warning-subtle"
                        >

                            <div
                                class="d-flex
                                       align-items-start
                                       gap-3"
                            >

                                <span
                                    class="disclaimer-number
                                           text-pn-gold
                                           fw-semibold"
                                >
                                    13
                                </span>


                                <div>

                                    <h2
                                        class="font-serif
                                               h3
                                               text-pn-brown
                                               mb-3"
                                    >
                                        Changes to Disclaimer
                                    </h2>


                                    <p
                                        class="text-secondary
                                               lh-lg
                                               mb-0"
                                    >

                                        Changes to the approved
                                        disclaimer should be managed
                                        through the Pooja Nilayam CMS
                                        and reflected on this page.

                                    </p>

                                </div>

                            </div>

                        </section>


                        {{-- 14 Contact --}}

                        <section
                            id="contact"
                            class="disclaimer-section"
                        >

                            <div
                                class="d-flex
                                       align-items-start
                                       gap-3"
                            >

                                <span
                                    class="disclaimer-number
                                           text-pn-gold
                                           fw-semibold"
                                >
                                    14
                                </span>


                                <div>

                                    <h2
                                        class="font-serif
                                               h3
                                               text-pn-brown
                                               mb-3"
                                    >
                                        Contact Us
                                    </h2>


                                    <p
                                        class="text-secondary
                                               lh-lg
                                               mb-4"
                                    >

                                        If you have questions about
                                        information presented on this
                                        page or about Pooja Nilayam
                                        services, contact the support
                                        team.

                                    </p>


                                    <a
                                        href="{{ url('/contact-us') }}"
                                        class="btn btn-pn"
                                    >

                                        Contact Pooja Nilayam

                                        <i
                                            class="bi bi-arrow-right ms-1"
                                        ></i>

                                    </a>

                                </div>

                            </div>

                        </section>

                    </div>

                </article>

            </div>

        </div>

    </div>

</section>


{{-- ============================================================
     LEGAL PAGE NAVIGATION
============================================================ --}}

<section class="bg-pn-cream py-4">

    <div class="container">

        <div
            class="d-flex
                   flex-column
                   flex-md-row
                   justify-content-between
                   align-items-md-center
                   gap-3"
        >

            <div>

                <small
                    class="text-secondary"
                >
                    Other Legal Pages
                </small>

            </div>


            <div
                class="d-flex
                       flex-wrap
                       gap-2"
            >

                <a
                    href="{{ url('/privacy-policy') }}"
                    class="btn
                           btn-sm
                           btn-pn-outline"
                >
                    Privacy Policy
                </a>


                <a
                    href="{{ url('/terms-conditions') }}"
                    class="btn
                           btn-sm
                           btn-pn-outline"
                >
                    Terms & Conditions
                </a>


                <a
                    href="{{ url('/refund-policy') }}"
                    class="btn
                           btn-sm
                           btn-pn-outline"
                >
                    Refund Policy
                </a>


                <a
                    href="{{ url('/shipping-policy') }}"
                    class="btn
                           btn-sm
                           btn-pn-outline"
                >
                    Shipping Policy
                </a>

            </div>

        </div>

    </div>

</section>


{{-- ============================================================
     PAGE-SPECIFIC STYLE
============================================================ --}}

@push('styles')

<style>

    .disclaimer-nav-link {
        transition:
            background-color .2s ease,
            color .2s ease;
    }


    .disclaimer-nav-link:hover,
    .disclaimer-nav-link.active {
        background-color: #f8f1e4;
    }


    .disclaimer-nav-link:hover span:last-child,
    .disclaimer-nav-link.active span:last-child {
        color: #8b5e34 !important;
    }


    .disclaimer-section {
        scroll-margin-top: 110px;
    }


    .disclaimer-number {
        min-width: 32px;
        padding-top: 3px;
    }


    @media (max-width: 991.98px) {

        .disclaimer-section {
            scroll-margin-top: 90px;
        }

    }

</style>

@endpush


{{-- ============================================================
     PAGE SCRIPT
============================================================ --}}

@push('scripts')

<script>
document.addEventListener('DOMContentLoaded', function () {

    const navLinks =
        document.querySelectorAll(
            '.disclaimer-nav-link'
        );


    const sections =
        document.querySelectorAll(
            '.disclaimer-section'
        );


    /*
    |--------------------------------------------------------------------------
    | Highlight Current Section
    |--------------------------------------------------------------------------
    */

    if (
        'IntersectionObserver'
        in window
    ) {

        const observer =
            new IntersectionObserver(
                function (entries) {

                    entries.forEach(
                        function (entry) {

                            if (
                                entry.isIntersecting
                            ) {

                                navLinks.forEach(
                                    function (link) {

                                        link.classList.toggle(
                                            'active',
                                            link.getAttribute(
                                                'href'
                                            ) ===
                                            '#' +
                                            entry.target.id
                                        );

                                    }
                                );

                            }

                        }
                    );

                },
                {
                    rootMargin:
                        '-100px 0px -65% 0px'
                }
            );


        sections.forEach(
            function (section) {

                observer.observe(
                    section
                );

            }
        );

    }


    /*
    |--------------------------------------------------------------------------
    | Smooth Scroll
    |--------------------------------------------------------------------------
    */

    navLinks.forEach(
        function (link) {

            link.addEventListener(
                'click',
                function (event) {

                    const targetId =
                        this.getAttribute(
                            'href'
                        );


                    const target =
                        document.querySelector(
                            targetId
                        );


                    if (!target) {

                        return;

                    }


                    event.preventDefault();


                    target.scrollIntoView({

                        behavior: 'smooth',

                        block: 'start'

                    });


                    history.replaceState(
                        null,
                        '',
                        targetId
                    );

                }
            );

        }
    );

});
</script>

@endpush

@endsection