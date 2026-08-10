@extends('layouts.app')

@section('title', 'Terms & Conditions | Pooja Nilayam')

@section(
    'meta_description',
    'Read the Terms & Conditions for using the Pooja Nilayam website and its spiritual services.'
)

@section('content')

@php

    /*
    |--------------------------------------------------------------------------
    | TERMS & CONDITIONS CONTENT
    |--------------------------------------------------------------------------
    | The project documents confirm that this page is required,
    | but they do not contain the approved legal wording.
    |
    | This screen therefore provides the complete UI structure.
    | Final legal content should be maintained through CMS.
    |--------------------------------------------------------------------------
    */

    $lastUpdated = 'To be updated by Pooja Nilayam';


    $sections = [

        [
            'id' => 'introduction',
            'number' => '01',
            'title' => 'Introduction'
        ],

        [
            'id' => 'acceptance',
            'number' => '02',
            'title' => 'Acceptance of Terms'
        ],

        [
            'id' => 'account',
            'number' => '03',
            'title' => 'Account Registration'
        ],

        [
            'id' => 'services',
            'number' => '04',
            'title' => 'Services'
        ],

        [
            'id' => 'bookings',
            'number' => '05',
            'title' => 'Bookings'
        ],

        [
            'id' => 'digital',
            'number' => '06',
            'title' => 'Digital & Live Pooja Services'
        ],

        [
            'id' => 'astrology',
            'number' => '07',
            'title' => 'Astrology Services'
        ],

        [
            'id' => 'store',
            'number' => '08',
            'title' => 'Marketplace & Orders'
        ],

        [
            'id' => 'donations',
            'number' => '09',
            'title' => 'Donations'
        ],

        [
            'id' => 'payments',
            'number' => '10',
            'title' => 'Payments'
        ],

        [
            'id' => 'cancellation',
            'number' => '11',
            'title' => 'Cancellation & Refunds'
        ],

        [
            'id' => 'user-responsibilities',
            'number' => '12',
            'title' => 'User Responsibilities'
        ],

        [
            'id' => 'intellectual-property',
            'number' => '13',
            'title' => 'Intellectual Property'
        ],

        [
            'id' => 'prohibited',
            'number' => '14',
            'title' => 'Prohibited Activities'
        ],

        [
            'id' => 'availability',
            'number' => '15',
            'title' => 'Service Availability'
        ],

        [
            'id' => 'liability',
            'number' => '16',
            'title' => 'Limitation of Liability'
        ],

        [
            'id' => 'changes',
            'number' => '17',
            'title' => 'Changes to These Terms'
        ],

        [
            'id' => 'contact',
            'number' => '18',
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


                <li
                    class="breadcrumb-item active"
                    aria-current="page"
                >
                    Terms & Conditions
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
                    Terms & Conditions
                </h1>


                <p
                    class="lead
                           text-secondary
                           mb-3"
                >

                    Please review the terms that govern the use of
                    the Pooja Nilayam website and its services.

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
                            class="bi bi-file-earmark-text me-1"
                        ></i>

                        Terms & Conditions

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
                        Terms Awaiting Final Legal Approval
                    </strong>


                    <p
                        class="small
                               text-secondary
                               mb-0"
                    >

                        The project documentation defines this
                        Terms & Conditions page as a required CMS
                        page, but does not provide the final approved
                        legal wording. The final content should be
                        reviewed and maintained through the CMS.

                    </p>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- ============================================================
     MAIN CONTENT
============================================================ --}}

<section class="pb-5">

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
                                    Terms & Conditions
                                </h2>

                            </div>


                            <nav
                                id="termsNavigation"
                                class="vstack
                                       gap-1"
                                aria-label="Terms and Conditions sections"
                            >

                                @foreach(
                                    $sections as $section
                                )

                                    <a
                                        href="#{{ $section['id'] }}"
                                        class="terms-nav-link
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


                    {{-- Legal Help Card --}}

                    <div
                        class="bg-pn-cream
                               rounded-5
                               p-4
                               mt-4"
                    >

                        <div
                            class="rounded-circle
                                   bg-white
                                   text-pn-primary
                                   d-flex
                                   align-items-center
                                   justify-content-center
                                   mb-3"
                            style="width:52px;height:52px;"
                        >

                            <i
                                class="bi bi-question-circle
                                       fs-5"
                            ></i>

                        </div>


                        <h3
                            class="font-serif
                                   h5
                                   text-pn-brown"
                        >
                            Need Clarification?
                        </h3>


                        <p
                            class="small
                                   text-secondary"
                        >

                            Contact the Pooja Nilayam team if you
                            have questions about these terms.

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
                 TERMS CONTENT
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

                        {{-- 01 Introduction --}}

                        <section
                            id="introduction"
                            class="terms-section
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
                                    class="terms-number
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
                                        Introduction
                                    </h2>


                                    <p
                                        class="text-secondary
                                               lh-lg"
                                    >

                                        This section will contain the
                                        approved introduction to the
                                        Pooja Nilayam Terms & Conditions
                                        and explain the scope of these
                                        terms.

                                    </p>


                                    <p
                                        class="small
                                               text-secondary
                                               mb-0"
                                    >

                                        Final CMS-approved legal
                                        content to be inserted here.

                                    </p>

                                </div>

                            </div>

                        </section>


                        {{-- 02 Acceptance --}}

                        <section
                            id="acceptance"
                            class="terms-section
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
                                    class="terms-number
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
                                        Acceptance of Terms
                                    </h2>


                                    <p
                                        class="text-secondary
                                               lh-lg
                                               mb-0"
                                    >

                                        The final approved terms will
                                        define how users accept and
                                        agree to the applicable terms
                                        when accessing or using the
                                        Pooja Nilayam platform.

                                    </p>

                                </div>

                            </div>

                        </section>


                        {{-- 03 Account --}}

                        <section
                            id="account"
                            class="terms-section
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
                                    class="terms-number
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
                                        Account Registration
                                    </h2>


                                    <p
                                        class="text-secondary
                                               lh-lg"
                                    >

                                        Pooja Nilayam includes customer
                                        registration, login, OTP
                                        verification and account
                                        management as part of the
                                        documented customer flow.

                                    </p>


                                    <div
                                        class="bg-pn-cream
                                               rounded-4
                                               p-3"
                                    >

                                        <div
                                            class="d-flex
                                                   align-items-start
                                                   gap-2"
                                        >

                                            <i
                                                class="bi bi-person-check
                                                       text-pn-primary
                                                       mt-1"
                                            ></i>


                                            <small
                                                class="text-secondary"
                                            >

                                                The final legal terms
                                                should define the user's
                                                responsibilities regarding
                                                account information and
                                                account security.

                                            </small>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </section>


                        {{-- 04 Services --}}

                        <section
                            id="services"
                            class="terms-section
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
                                    class="terms-number
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
                                        Services
                                    </h2>


                                    <p
                                        class="text-secondary
                                               lh-lg"
                                    >

                                        The Pooja Nilayam platform
                                        includes multiple service
                                        areas such as online pooja,
                                        temple booking, digital pooja,
                                        astrology, marketplace,
                                        donations and related
                                        spiritual services.

                                    </p>


                                    <div
                                        class="row
                                               row-cols-2
                                               row-cols-md-3
                                               g-3"
                                    >

                                        @foreach([
                                            ['Pooja', 'bi-flower1'],
                                            ['Temples', 'bi-building'],
                                            ['Digital Pooja', 'bi-stars'],
                                            ['Astrology', 'bi-moon-stars'],
                                            ['Store', 'bi-bag'],
                                            ['Donations', 'bi-heart']
                                        ] as $service)

                                            <div class="col">

                                                <div
                                                    class="bg-pn-cream
                                                           rounded-4
                                                           p-3
                                                           text-center
                                                           h-100"
                                                >

                                                    <i
                                                        class="bi {{ $service[1] }}
                                                               text-pn-primary
                                                               fs-5"
                                                    ></i>


                                                    <span
                                                        class="d-block
                                                               small
                                                               fw-semibold
                                                               text-pn-brown
                                                               mt-2"
                                                    >

                                                        {{ $service[0] }}

                                                    </span>

                                                </div>

                                            </div>

                                        @endforeach

                                    </div>

                                </div>

                            </div>

                        </section>


                        {{-- 05 Bookings --}}

                        <section
                            id="bookings"
                            class="terms-section
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
                                    class="terms-number
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
                                        Bookings
                                    </h2>


                                    <p
                                        class="text-secondary
                                               lh-lg"
                                    >

                                        The documented booking flows
                                        cover online pooja, temple
                                        pooja, digital pooja and priest
                                        booking. The final legal terms
                                        should define the applicable
                                        booking conditions.

                                    </p>


                                    <div
                                        class="bg-pn-cream
                                               rounded-4
                                               p-3"
                                    >

                                        <small
                                            class="text-secondary"
                                        >

                                            Documented booking flow:
                                            select service → choose
                                            date/time where applicable →
                                            provide devotee details →
                                            review → payment →
                                            confirmation.

                                        </small>

                                    </div>

                                </div>

                            </div>

                        </section>


                        {{-- 06 Digital --}}

                        <section
                            id="digital"
                            class="terms-section
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
                                    class="terms-number
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
                                        Digital & Live Pooja Services
                                    </h2>


                                    <p
                                        class="text-secondary
                                               lh-lg
                                               mb-0"
                                    >

                                        The platform documentation
                                        includes Digital Pooja,
                                        Online Live Pooja, live
                                        sessions, recordings and
                                        completion notifications.
                                        The final terms should define
                                        the conditions applicable to
                                        these services.

                                    </p>

                                </div>

                            </div>

                        </section>


                        {{-- 07 Astrology --}}

                        <section
                            id="astrology"
                            class="terms-section
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
                                    class="terms-number
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
                                        Astrology Services
                                    </h2>


                                    <p
                                        class="text-secondary
                                               lh-lg
                                               mb-0"
                                    >

                                        Astrology services documented
                                        for Pooja Nilayam include
                                        Horoscope, Kundli, Match Making,
                                        Numerology, Palm Reading and
                                        Vastu Consultation. The final
                                        terms should specify the
                                        applicable service conditions.

                                    </p>

                                </div>

                            </div>

                        </section>


                        {{-- 08 Store --}}

                        <section
                            id="store"
                            class="terms-section
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
                                    class="terms-number
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
                                        Marketplace & Orders
                                    </h2>


                                    <p
                                        class="text-secondary
                                               lh-lg"
                                    >

                                        The Pooja Store includes
                                        product browsing, cart,
                                        checkout, payment, order
                                        confirmation, shipment and
                                        delivery. The final terms
                                        should establish the applicable
                                        marketplace and order
                                        conditions.

                                    </p>

                                </div>

                            </div>

                        </section>


                        {{-- 09 Donations --}}

                        <section
                            id="donations"
                            class="terms-section
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
                                    class="terms-number
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
                                        Donations
                                    </h2>


                                    <p
                                        class="text-secondary
                                               lh-lg"
                                    >

                                        The documented donation module
                                        includes Temple Donations,
                                        NGO Donations, Annadanam and
                                        Goshala donations. The final
                                        legal terms should define the
                                        applicable donation conditions.

                                    </p>

                                </div>

                            </div>

                        </section>


                        {{-- 10 Payments --}}

                        <section
                            id="payments"
                            class="terms-section
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
                                    class="terms-number
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
                                        Payments
                                    </h2>


                                    <p
                                        class="text-secondary
                                               lh-lg"
                                    >

                                        The project defines a common
                                        payment workflow for bookings,
                                        purchases, donations and event
                                        registrations. The final legal
                                        terms should define payment
                                        obligations and applicable
                                        transaction conditions.

                                    </p>

                                </div>

                            </div>

                        </section>


                        {{-- 11 Cancellation --}}

                        <section
                            id="cancellation"
                            class="terms-section
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
                                    class="terms-number
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
                                        Cancellation & Refunds
                                    </h2>


                                    <p
                                        class="text-secondary
                                               lh-lg"
                                    >

                                        The project includes dedicated
                                        cancellation and refund
                                        processes. The final Terms &
                                        Conditions should refer users
                                        to the approved Refund Policy
                                        and define the applicable
                                        contractual conditions.

                                    </p>


                                    <a
                                        href="{{ url('/refund-policy') }}"
                                        class="btn
                                               btn-sm
                                               btn-pn-outline"
                                    >

                                        View Refund Policy

                                        <i
                                            class="bi bi-arrow-right ms-1"
                                        ></i>

                                    </a>

                                </div>

                            </div>

                        </section>


                        {{-- 12 User Responsibilities --}}

                        <section
                            id="user-responsibilities"
                            class="terms-section
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
                                    class="terms-number
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
                                        User Responsibilities
                                    </h2>


                                    <p
                                        class="text-secondary
                                               lh-lg
                                               mb-0"
                                    >

                                        The final legal document
                                        should specify user
                                        responsibilities associated
                                        with account use, bookings,
                                        payments, content and
                                        platform usage.

                                    </p>

                                </div>

                            </div>

                        </section>


                        {{-- 13 IP --}}

                        <section
                            id="intellectual-property"
                            class="terms-section
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
                                    class="terms-number
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
                                        Intellectual Property
                                    </h2>


                                    <p
                                        class="text-secondary
                                               lh-lg
                                               mb-0"
                                    >

                                        The final Terms & Conditions
                                        should define ownership and
                                        permitted use of the website,
                                        content, branding, media and
                                        other protected materials.

                                    </p>

                                </div>

                            </div>

                        </section>


                        {{-- 14 Prohibited --}}

                        <section
                            id="prohibited"
                            class="terms-section
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
                                    class="terms-number
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
                                        Prohibited Activities
                                    </h2>


                                    <p
                                        class="text-secondary
                                               lh-lg
                                               mb-0"
                                    >

                                        The approved legal terms
                                        should identify activities
                                        that are not permitted while
                                        using the Pooja Nilayam
                                        platform or services.

                                    </p>

                                </div>

                            </div>

                        </section>


                        {{-- 15 Availability --}}

                        <section
                            id="availability"
                            class="terms-section
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
                                    class="terms-number
                                           text-pn-gold
                                           fw-semibold"
                                >
                                    15
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

                                        The final policy should
                                        describe the applicable
                                        conditions concerning
                                        availability, interruptions,
                                        maintenance and changes to
                                        services.

                                    </p>

                                </div>

                            </div>

                        </section>


                        {{-- 16 Liability --}}

                        <section
                            id="liability"
                            class="terms-section
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
                                    class="terms-number
                                           text-pn-gold
                                           fw-semibold"
                                >
                                    16
                                </span>


                                <div>

                                    <h2
                                        class="font-serif
                                               h3
                                               text-pn-brown
                                               mb-3"
                                    >
                                        Limitation of Liability
                                    </h2>


                                    <p
                                        class="text-secondary
                                               lh-lg
                                               mb-0"
                                    >

                                        The final legal document
                                        should contain the approved
                                        provisions regarding liability,
                                        warranties, responsibilities
                                        and applicable limitations.

                                    </p>

                                </div>

                            </div>

                        </section>


                        {{-- 17 Changes --}}

                        <section
                            id="changes"
                            class="terms-section
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
                                    class="terms-number
                                           text-pn-gold
                                           fw-semibold"
                                >
                                    17
                                </span>


                                <div>

                                    <h2
                                        class="font-serif
                                               h3
                                               text-pn-brown
                                               mb-3"
                                    >
                                        Changes to These Terms
                                    </h2>


                                    <p
                                        class="text-secondary
                                               lh-lg
                                               mb-0"
                                    >

                                        The final policy should explain
                                        how changes to the Terms &
                                        Conditions are published and
                                        communicated.

                                    </p>

                                </div>

                            </div>

                        </section>


                        {{-- 18 Contact --}}

                        <section
                            id="contact"
                            class="terms-section"
                        >

                            <div
                                class="d-flex
                                       align-items-start
                                       gap-3"
                            >

                                <span
                                    class="terms-number
                                           text-pn-gold
                                           fw-semibold"
                                >
                                    18
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

                                        Questions regarding these
                                        Terms & Conditions can be
                                        directed to the Pooja Nilayam
                                        support team using the
                                        approved contact details.

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


                <a
                    href="{{ url('/disclaimer') }}"
                    class="btn
                           btn-sm
                           btn-pn-outline"
                >

                    Disclaimer

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

    .terms-nav-link {
        transition:
            background-color .2s ease,
            color .2s ease;
    }


    .terms-nav-link:hover,
    .terms-nav-link.active {
        background-color: #f8f1e4;
    }


    .terms-nav-link:hover span:last-child,
    .terms-nav-link.active span:last-child {
        color: #8b5e34 !important;
    }


    .terms-section {
        scroll-margin-top: 110px;
    }


    .terms-number {
        min-width: 32px;
        padding-top: 3px;
    }


    @media (max-width: 991.98px) {

        .terms-section {
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
            '.terms-nav-link'
        );


    const sections =
        document.querySelectorAll(
            '.terms-section'
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