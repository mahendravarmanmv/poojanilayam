@extends('layouts.app')

@section('title', 'Privacy Policy | Pooja Nilayam')

@section(
    'meta_description',
    'Read the Pooja Nilayam Privacy Policy and learn how privacy information is presented and managed.'
)

@section('content')

@php

    /*
    |--------------------------------------------------------------------------
    | PRIVACY POLICY CONTENT
    |--------------------------------------------------------------------------
    | IMPORTANT:
    | The project documents confirm that Privacy Policy is a required
    | frontend CMS page, but they do NOT provide the approved legal text.
    |
    | Therefore this screen contains the UI structure only.
    | The final legal content should be entered/managed through CMS.
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
            'id' => 'information',
            'number' => '02',
            'title' => 'Information We Collect'
        ],

        [
            'id' => 'usage',
            'number' => '03',
            'title' => 'How Information Is Used'
        ],

        [
            'id' => 'services',
            'number' => '04',
            'title' => 'Information Related to Services'
        ],

        [
            'id' => 'payments',
            'number' => '05',
            'title' => 'Payments and Transactions'
        ],

        [
            'id' => 'communications',
            'number' => '06',
            'title' => 'Communications'
        ],

        [
            'id' => 'security',
            'number' => '07',
            'title' => 'Data Security'
        ],

        [
            'id' => 'retention',
            'number' => '08',
            'title' => 'Data Retention'
        ],

        [
            'id' => 'rights',
            'number' => '09',
            'title' => 'Your Privacy Choices'
        ],

        [
            'id' => 'cookies',
            'number' => '10',
            'title' => 'Cookies and Similar Technologies'
        ],

        [
            'id' => 'third-party',
            'number' => '11',
            'title' => 'Third-Party Services'
        ],

        [
            'id' => 'children',
            'number' => '12',
            'title' => 'Children and Privacy'
        ],

        [
            'id' => 'changes',
            'number' => '13',
            'title' => 'Changes to This Policy'
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


                <li
                    class="breadcrumb-item active"
                    aria-current="page"
                >
                    Privacy Policy
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
                    Legal & Privacy
                </span>


                <h1
                    class="font-serif
                           display-4
                           text-pn-brown
                           mt-2
                           mb-3"
                >
                    Privacy Policy
                </h1>


                <p
                    class="lead
                           text-secondary
                           mb-3"
                >

                    Your privacy is important to us. This page
                    provides the Privacy Policy for Pooja Nilayam.

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
                            class="bi bi-shield-check me-1"
                        ></i>

                        Privacy Policy

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
                        Policy Content Pending Final Approval
                    </strong>


                    <p
                        class="small
                               text-secondary
                               mb-0"
                    >

                        The Privacy Policy legal text is intended to
                        be maintained through the Pooja Nilayam CMS.
                        The project documentation defines this page
                        as a required CMS page but does not contain
                        the final approved legal wording.

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
                                    Privacy Policy
                                </h2>

                            </div>


                            <nav
                                id="privacyNavigation"
                                class="vstack
                                       gap-1"
                                aria-label="Privacy Policy sections"
                            >

                                @foreach(
                                    $sections as $index => $section
                                )

                                    <a
                                        href="#{{ $section['id'] }}"
                                        class="privacy-nav-link
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


                    {{-- Contact Card --}}

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
                                class="bi bi-envelope
                                       fs-5"
                            ></i>

                        </div>


                        <h3
                            class="font-serif
                                   h5
                                   text-pn-brown"
                        >
                            Privacy Questions?
                        </h3>


                        <p
                            class="small
                                   text-secondary"
                        >

                            Contact the Pooja Nilayam support team
                            for privacy-related assistance.

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
                 POLICY CONTENT
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

                        {{-- Introduction --}}

                        <section
                            id="introduction"
                            class="privacy-section
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
                                    class="privacy-number
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

                                        This section will contain
                                        the approved introduction to
                                        the Pooja Nilayam Privacy
                                        Policy, including the scope
                                        of the policy and the services
                                        to which it applies.

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


                        {{-- Information We Collect --}}

                        <section
                            id="information"
                            class="privacy-section
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
                                    class="privacy-number
                                           text-pn-gold
                                           fw-semibold"
                                >
                                    02
                                </span>


                                <div class="flex-grow-1">

                                    <h2
                                        class="font-serif
                                               h3
                                               text-pn-brown
                                               mb-3"
                                    >
                                        Information We Collect
                                    </h2>


                                    <p
                                        class="text-secondary
                                               lh-lg"
                                    >

                                        The final Privacy Policy
                                        should specify the categories
                                        of information collected by
                                        Pooja Nilayam and the
                                        circumstances in which such
                                        information may be provided.

                                    </p>


                                    <div
                                        class="row
                                               row-cols-1
                                               row-cols-md-2
                                               g-3
                                               mt-1"
                                    >

                                        @foreach([
                                            [
                                                'icon' => 'bi-person',
                                                'title' => 'Account Information'
                                            ],
                                            [
                                                'icon' => 'bi-calendar-check',
                                                'title' => 'Booking Information'
                                            ],
                                            [
                                                'icon' => 'bi-bag',
                                                'title' => 'Order Information'
                                            ],
                                            [
                                                'icon' => 'bi-chat-dots',
                                                'title' => 'Support Information'
                                            ]
                                        ] as $item)

                                            <div class="col">

                                                <div
                                                    class="bg-pn-cream
                                                           rounded-4
                                                           p-3
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
                                                               fw-semibold
                                                               text-pn-brown
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


                        {{-- Usage --}}

                        <section
                            id="usage"
                            class="privacy-section
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
                                    class="privacy-number
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
                                        How Information Is Used
                                    </h2>


                                    <p
                                        class="text-secondary
                                               lh-lg
                                               mb-0"
                                    >

                                        The approved policy will
                                        describe the permitted purposes
                                        for which information may be
                                        used in connection with the
                                        Pooja Nilayam platform and its
                                        services.

                                    </p>

                                </div>

                            </div>

                        </section>


                        {{-- Services --}}

                        <section
                            id="services"
                            class="privacy-section
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
                                    class="privacy-number
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
                                        Information Related to Services
                                    </h2>


                                    <p
                                        class="text-secondary
                                               lh-lg"
                                    >

                                        Pooja Nilayam includes multiple
                                        services such as pooja booking,
                                        digital pooja, temple services,
                                        astrology, marketplace,
                                        donations and customer support.
                                        The final policy should explain
                                        the relevant privacy practices
                                        applicable to those services.

                                    </p>

                                </div>

                            </div>

                        </section>


                        {{-- Payments --}}

                        <section
                            id="payments"
                            class="privacy-section
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
                                    class="privacy-number
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
                                        Payments and Transactions
                                    </h2>


                                    <p
                                        class="text-secondary
                                               lh-lg
                                               mb-0"
                                    >

                                        The final policy should
                                        describe the privacy aspects
                                        associated with payments,
                                        transactions, bookings,
                                        orders and donations, including
                                        any applicable third-party
                                        payment services.

                                    </p>

                                </div>

                            </div>

                        </section>


                        {{-- Communications --}}

                        <section
                            id="communications"
                            class="privacy-section
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
                                    class="privacy-number
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
                                        Communications
                                    </h2>


                                    <p
                                        class="text-secondary
                                               lh-lg
                                               mb-0"
                                    >

                                        The final approved policy
                                        should explain communications
                                        associated with account
                                        activity, bookings, orders,
                                        support and other platform
                                        services.

                                    </p>

                                </div>

                            </div>

                        </section>


                        {{-- Security --}}

                        <section
                            id="security"
                            class="privacy-section
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
                                    class="privacy-number
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
                                        Data Security
                                    </h2>


                                    <p
                                        class="text-secondary
                                               lh-lg
                                               mb-0"
                                    >

                                        The final legal policy should
                                        describe the security measures,
                                        safeguards and limitations
                                        applicable to information
                                        handled by the platform.

                                    </p>

                                </div>

                            </div>

                        </section>


                        {{-- Retention --}}

                        <section
                            id="retention"
                            class="privacy-section
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
                                    class="privacy-number
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
                                        Data Retention
                                    </h2>


                                    <p
                                        class="text-secondary
                                               lh-lg
                                               mb-0"
                                    >

                                        The final Privacy Policy
                                        should define applicable
                                        information-retention
                                        practices and requirements.

                                    </p>

                                </div>

                            </div>

                        </section>


                        {{-- Rights --}}

                        <section
                            id="rights"
                            class="privacy-section
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
                                    class="privacy-number
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
                                        Your Privacy Choices
                                    </h2>


                                    <p
                                        class="text-secondary
                                               lh-lg
                                               mb-0"
                                    >

                                        The approved policy should
                                        describe the choices, rights
                                        and available mechanisms
                                        applicable to users regarding
                                        their personal information.

                                    </p>

                                </div>

                            </div>

                        </section>


                        {{-- Cookies --}}

                        <section
                            id="cookies"
                            class="privacy-section
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
                                    class="privacy-number
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
                                        Cookies and Similar Technologies
                                    </h2>


                                    <p
                                        class="text-secondary
                                               lh-lg
                                               mb-0"
                                    >

                                        The final policy should state
                                        whether and how cookies or
                                        similar technologies are used,
                                        together with the applicable
                                        user choices.

                                    </p>

                                </div>

                            </div>

                        </section>


                        {{-- Third Party --}}

                        <section
                            id="third-party"
                            class="privacy-section
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
                                    class="privacy-number
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
                                        Third-Party Services
                                    </h2>


                                    <p
                                        class="text-secondary
                                               lh-lg
                                               mb-0"
                                    >

                                        The approved policy should
                                        identify relevant third-party
                                        services and explain the
                                        applicable privacy relationship
                                        where required.

                                    </p>

                                </div>

                            </div>

                        </section>


                        {{-- Children --}}

                        <section
                            id="children"
                            class="privacy-section
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
                                    class="privacy-number
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
                                        Children and Privacy
                                    </h2>


                                    <p
                                        class="text-secondary
                                               lh-lg
                                               mb-0"
                                    >

                                        The final legal policy should
                                        define the applicable provisions
                                        concerning children and privacy.

                                    </p>

                                </div>

                            </div>

                        </section>


                        {{-- Changes --}}

                        <section
                            id="changes"
                            class="privacy-section
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
                                    class="privacy-number
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
                                        Changes to This Policy
                                    </h2>


                                    <p
                                        class="text-secondary
                                               lh-lg
                                               mb-0"
                                    >

                                        The final approved policy
                                        should explain how changes
                                        to the Privacy Policy are
                                        communicated and recorded.

                                    </p>

                                </div>

                            </div>

                        </section>


                        {{-- Contact --}}

                        <section
                            id="contact"
                            class="privacy-section"
                        >

                            <div
                                class="d-flex
                                       align-items-start
                                       gap-3"
                            >

                                <span
                                    class="privacy-number
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

                                        For privacy-related questions,
                                        the final Privacy Policy should
                                        provide the approved contact
                                        details and applicable
                                        communication process.

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

    .privacy-nav-link {
        transition:
            background-color .2s ease,
            color .2s ease;
    }


    .privacy-nav-link:hover,
    .privacy-nav-link.active {
        background-color: #f8f1e4;
    }


    .privacy-nav-link:hover span:last-child,
    .privacy-nav-link.active span:last-child {
        color: #8b5e34 !important;
    }


    .privacy-section {
        scroll-margin-top: 110px;
    }


    .privacy-number {
        min-width: 32px;
        padding-top: 3px;
    }


    @media (max-width: 991.98px) {

        .privacy-section {
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
            '.privacy-nav-link'
        );


    const sections =
        document.querySelectorAll(
            '.privacy-section'
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