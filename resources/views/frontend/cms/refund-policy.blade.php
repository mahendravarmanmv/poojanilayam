@extends('layouts.app')

@section('title', 'Refund Policy | Pooja Nilayam')

@section(
    'meta_description',
    'Read the Pooja Nilayam Refund Policy and understand the refund request and processing workflow.'
)

@section('content')

@php

    /*
    |--------------------------------------------------------------------------
    | REFUND POLICY
    |--------------------------------------------------------------------------
    | The project SRS defines the refund workflow:
    |
    | Customer Requests Refund
    |        ↓
    | Admin Verification
    |        ↓
    | Eligible?
    |   ┌────┴────┐
    |  Yes        No
    |   ↓          ↓
    | Approved   Rejected
    |   ↓
    | Amount Credited
    |   ↓
    | Notification Sent
    |
    | The project documents do NOT define exact refund windows,
    | percentages or eligibility rules. Those must be supplied
    | through the approved CMS/legal content.
    |--------------------------------------------------------------------------
    */

    $lastUpdated = 'To be updated by Pooja Nilayam';


    $sections = [

        [
            'id' => 'overview',
            'number' => '01',
            'title' => 'Refund Policy Overview'
        ],

        [
            'id' => 'eligibility',
            'number' => '02',
            'title' => 'Refund Eligibility'
        ],

        [
            'id' => 'request',
            'number' => '03',
            'title' => 'How to Request a Refund'
        ],

        [
            'id' => 'verification',
            'number' => '04',
            'title' => 'Refund Verification'
        ],

        [
            'id' => 'approval',
            'number' => '05',
            'title' => 'Refund Approval'
        ],

        [
            'id' => 'rejection',
            'number' => '06',
            'title' => 'Refund Rejection'
        ],

        [
            'id' => 'credit',
            'number' => '07',
            'title' => 'Refund Credit'
        ],

        [
            'id' => 'notification',
            'number' => '08',
            'title' => 'Refund Notifications'
        ],

        [
            'id' => 'services',
            'number' => '09',
            'title' => 'Service-Specific Refunds'
        ],

        [
            'id' => 'orders',
            'number' => '10',
            'title' => 'Product & Order Refunds'
        ],

        [
            'id' => 'donations',
            'number' => '11',
            'title' => 'Donation Refunds'
        ],

        [
            'id' => 'support',
            'number' => '12',
            'title' => 'Refund Support'
        ],

        [
            'id' => 'changes',
            'number' => '13',
            'title' => 'Changes to Refund Policy'
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
                    Refund Policy
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
                    Payments & Refunds
                </span>


                <h1
                    class="font-serif
                           display-4
                           text-pn-brown
                           mt-2
                           mb-3"
                >
                    Refund Policy
                </h1>


                <p
                    class="lead
                           text-secondary
                           mb-3"
                >

                    Learn how refund requests are submitted,
                    reviewed and processed through Pooja Nilayam.

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
                            class="bi bi-arrow-counterclockwise me-1"
                        ></i>

                        Refund Policy

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
                        Final Refund Rules Require Business Approval
                    </strong>


                    <p
                        class="small
                               text-secondary
                               mb-0"
                    >

                        The project documents define the refund
                        processing workflow, but do not specify
                        exact eligibility periods, refund percentages,
                        service-specific cancellation windows or
                        other final refund conditions. These values
                        should be maintained through the approved
                        CMS/legal content.

                    </p>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- ============================================================
     REFUND PROCESS SUMMARY
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
                Refund Process
            </span>


            <h2
                class="font-serif
                       display-6
                       text-pn-brown
                       mt-2
                       mb-3"
            >
                How Refund Requests Are Processed
            </h2>


            <p
                class="text-secondary
                       mx-auto
                       mb-0"
                style="max-width:760px;"
            >

                The documented Pooja Nilayam refund workflow begins
                with a customer request and continues through
                verification, eligibility review and the final
                refund decision.

            </p>

        </div>


        <div
            class="row
                   row-cols-1
                   row-cols-md-2
                   row-cols-lg-4
                   g-3
                   justify-content-center"
        >

            @foreach([

                [
                    'number' => '01',
                    'icon' => 'bi-file-earmark-text',
                    'title' => 'Request',
                    'text' => 'Customer requests a refund.'
                ],

                [
                    'number' => '02',
                    'icon' => 'bi-search',
                    'title' => 'Verification',
                    'text' => 'Admin verifies the refund request.'
                ],

                [
                    'number' => '03',
                    'icon' => 'bi-check2-circle',
                    'title' => 'Eligibility',
                    'text' => 'The request is checked for eligibility.'
                ],

                [
                    'number' => '04',
                    'icon' => 'bi-bell',
                    'title' => 'Resolution',
                    'text' => 'Approved refunds are credited and the customer is notified.'
                ]

            ] as $step)

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
                                    class="bi {{ $step['icon'] }}
                                           fs-5"
                                ></i>

                            </span>


                            <span
                                class="d-block
                                       small
                                       text-pn-gold
                                       fw-semibold
                                       mb-1"
                            >

                                STEP {{ $step['number'] }}

                            </span>


                            <h3
                                class="font-serif
                                       h5
                                       text-pn-brown
                                       mb-2"
                            >

                                {{ $step['title'] }}

                            </h3>


                            <p
                                class="small
                                       text-secondary
                                       mb-0"
                            >

                                {{ $step['text'] }}

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
                                    Refund Policy
                                </h2>

                            </div>


                            <nav
                                id="refundNavigation"
                                class="vstack
                                       gap-1"
                                aria-label="Refund Policy sections"
                            >

                                @foreach(
                                    $sections as $section
                                )

                                    <a
                                        href="#{{ $section['id'] }}"
                                        class="refund-nav-link
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
                            Need Help With a Refund?
                        </h3>


                        <p
                            class="small
                                   text-secondary"
                        >

                            Contact support or raise a ticket for
                            assistance with a refund request.

                        </p>


                        <div
                            class="d-grid
                                   gap-2"
                        >

                            <a
                                href="{{ url('/raise-ticket') }}"
                                class="btn btn-pn"
                            >

                                Raise a Ticket

                            </a>


                            <a
                                href="{{ url('/contact-us') }}"
                                class="btn
                                       btn-light
                                       border"
                            >

                                Contact Us

                            </a>

                        </div>

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


                        {{-- 01 Overview --}}

                        <section
                            id="overview"
                            class="refund-section
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
                                    class="refund-number
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
                                        Refund Policy Overview
                                    </h2>


                                    <p
                                        class="text-secondary
                                               lh-lg"
                                    >

                                        Pooja Nilayam provides a
                                        defined refund-request workflow
                                        in which a customer can submit
                                        a refund request for review.
                                        The request is verified and
                                        evaluated before a final
                                        decision is made.

                                    </p>


                                    <p
                                        class="small
                                               text-secondary
                                               mb-0"
                                    >

                                        Final refund terms and
                                        conditions will be maintained
                                        through the approved CMS
                                        content.

                                    </p>

                                </div>

                            </div>

                        </section>


                        {{-- 02 Eligibility --}}

                        <section
                            id="eligibility"
                            class="refund-section
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
                                    class="refund-number
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
                                        Refund Eligibility
                                    </h2>


                                    <p
                                        class="text-secondary
                                               lh-lg"
                                    >

                                        According to the documented
                                        process, every refund request
                                        is subject to an eligibility
                                        check by the administrator.

                                    </p>


                                    <div
                                        class="row
                                               row-cols-1
                                               row-cols-md-2
                                               g-3"
                                    >

                                        <div class="col">

                                            <div
                                                class="bg-pn-cream
                                                       rounded-4
                                                       p-4
                                                       h-100"
                                            >

                                                <i
                                                    class="bi bi-check-circle
                                                           text-success
                                                           fs-4"
                                                ></i>


                                                <h3
                                                    class="font-serif
                                                           h6
                                                           text-pn-brown
                                                           mt-3"
                                                >
                                                    Eligible
                                                </h3>


                                                <p
                                                    class="small
                                                           text-secondary
                                                           mb-0"
                                                >

                                                    Refund is approved
                                                    and the amount is
                                                    credited.

                                                </p>

                                            </div>

                                        </div>


                                        <div class="col">

                                            <div
                                                class="bg-light
                                                       rounded-4
                                                       p-4
                                                       h-100"
                                            >

                                                <i
                                                    class="bi bi-x-circle
                                                           text-danger
                                                           fs-4"
                                                ></i>


                                                <h3
                                                    class="font-serif
                                                           h6
                                                           text-pn-brown
                                                           mt-3"
                                                >
                                                    Not Eligible
                                                </h3>


                                                <p
                                                    class="small
                                                           text-secondary
                                                           mb-0"
                                                >

                                                    The refund request
                                                    is rejected.

                                                </p>

                                            </div>

                                        </div>

                                    </div>


                                    <div
                                        class="alert
                                               alert-light
                                               border
                                               rounded-4
                                               mt-3
                                               mb-0"
                                    >

                                        <small
                                            class="text-secondary"
                                        >

                                            Exact eligibility criteria
                                            are to be defined and
                                            approved by the business/
                                            legal team.

                                        </small>

                                    </div>

                                </div>

                            </div>

                        </section>


                        {{-- 03 Request --}}

                        <section
                            id="request"
                            class="refund-section
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
                                    class="refund-number
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
                                        How to Request a Refund
                                    </h2>


                                    <p
                                        class="text-secondary
                                               lh-lg"
                                    >

                                        A customer must initiate a
                                        refund request through the
                                        applicable Pooja Nilayam
                                        customer/support process.

                                    </p>


                                    <a
                                        href="{{ url('/raise-ticket') }}"
                                        class="btn btn-pn"
                                    >

                                        Raise Refund Request

                                        <i
                                            class="bi bi-arrow-right ms-1"
                                        ></i>

                                    </a>

                                </div>

                            </div>

                        </section>


                        {{-- 04 Verification --}}

                        <section
                            id="verification"
                            class="refund-section
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
                                    class="refund-number
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
                                        Refund Verification
                                    </h2>


                                    <p
                                        class="text-secondary
                                               lh-lg
                                               mb-0"
                                    >

                                        After a customer submits a
                                        refund request, the documented
                                        process requires administrator
                                        verification before an
                                        eligibility decision is made.

                                    </p>

                                </div>

                            </div>

                        </section>


                        {{-- 05 Approval --}}

                        <section
                            id="approval"
                            class="refund-section
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
                                    class="refund-number
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
                                        Refund Approval
                                    </h2>


                                    <p
                                        class="text-secondary
                                               lh-lg"
                                    >

                                        When the refund request is
                                        determined to be eligible,
                                        the documented process moves
                                        to refund approval.

                                    </p>


                                    <div
                                        class="bg-success-subtle
                                               rounded-4
                                               p-4"
                                    >

                                        <div
                                            class="d-flex
                                                   align-items-center
                                                   gap-3"
                                        >

                                            <div
                                                class="rounded-circle
                                                       bg-success
                                                       text-white
                                                       d-flex
                                                       align-items-center
                                                       justify-content-center"
                                                style="width:48px;height:48px;"
                                            >

                                                <i
                                                    class="bi bi-check-lg"
                                                ></i>

                                            </div>


                                            <div>

                                                <strong
                                                    class="d-block
                                                           text-success-emphasis"
                                                >
                                                    Refund Approved
                                                </strong>


                                                <small
                                                    class="text-success-emphasis"
                                                >

                                                    The approved amount
                                                    proceeds to the
                                                    refund-credit stage.

                                                </small>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </section>


                        {{-- 06 Rejection --}}

                        <section
                            id="rejection"
                            class="refund-section
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
                                    class="refund-number
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
                                        Refund Rejection
                                    </h2>


                                    <p
                                        class="text-secondary
                                               lh-lg
                                               mb-0"
                                    >

                                        If the refund request is found
                                        to be ineligible, the documented
                                        process requires the request
                                        to be rejected.

                                    </p>

                                </div>

                            </div>

                        </section>


                        {{-- 07 Credit --}}

                        <section
                            id="credit"
                            class="refund-section
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
                                    class="refund-number
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
                                        Refund Credit
                                    </h2>


                                    <p
                                        class="text-secondary
                                               lh-lg"
                                    >

                                        For an approved refund, the
                                        documented process states that
                                        the refund amount is credited
                                        after approval.

                                    </p>


                                    <div
                                        class="bg-pn-cream
                                               rounded-4
                                               p-4"
                                    >

                                        <div
                                            class="d-flex
                                                   align-items-center
                                                   gap-3"
                                        >

                                            <i
                                                class="bi bi-wallet2
                                                       text-pn-primary
                                                       fs-3"
                                            ></i>


                                            <div>

                                                <strong
                                                    class="d-block
                                                           text-pn-brown"
                                                >
                                                    Amount Credited
                                                </strong>


                                                <small
                                                    class="text-secondary"
                                                >

                                                    The approved refund
                                                    proceeds through the
                                                    applicable payment
                                                    process.

                                                </small>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </section>


                        {{-- 08 Notification --}}

                        <section
                            id="notification"
                            class="refund-section
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
                                    class="refund-number
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
                                        Refund Notifications
                                    </h2>


                                    <p
                                        class="text-secondary
                                               lh-lg"
                                    >

                                        The documented refund workflow
                                        includes a customer notification
                                        after an approved refund is
                                        processed.

                                    </p>


                                    <div
                                        class="row
                                               row-cols-2
                                               row-cols-md-4
                                               g-3"
                                    >

                                        @foreach([
                                            ['icon' => 'bi-envelope', 'title' => 'Email'],
                                            ['icon' => 'bi-chat-text', 'title' => 'SMS'],
                                            ['icon' => 'bi-whatsapp', 'title' => 'WhatsApp'],
                                            ['icon' => 'bi-bell', 'title' => 'Push']
                                        ] as $notification)

                                            <div class="col">

                                                <div
                                                    class="bg-pn-cream
                                                           rounded-4
                                                           p-3
                                                           text-center
                                                           h-100"
                                                >

                                                    <i
                                                        class="bi {{ $notification['icon'] }}
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

                                                        {{ $notification['title'] }}

                                                    </span>

                                                </div>

                                            </div>

                                        @endforeach

                                    </div>

                                </div>

                            </div>

                        </section>


                        {{-- 09 Services --}}

                        <section
                            id="services"
                            class="refund-section
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
                                    class="refund-number
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
                                        Service-Specific Refunds
                                    </h2>


                                    <p
                                        class="text-secondary
                                               lh-lg"
                                    >

                                        Pooja Nilayam includes multiple
                                        transaction-based services,
                                        including Online Pooja, Temple
                                        Pooja, Digital Pooja and
                                        Astrology services.

                                    </p>


                                    <p
                                        class="small
                                               text-secondary
                                               mb-0"
                                    >

                                        Any service-specific refund
                                        conditions should be defined
                                        in the approved Refund Policy
                                        content before production.

                                    </p>

                                </div>

                            </div>

                        </section>


                        {{-- 10 Orders --}}

                        <section
                            id="orders"
                            class="refund-section
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
                                    class="refund-number
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
                                        Product & Order Refunds
                                    </h2>


                                    <p
                                        class="text-secondary
                                               lh-lg"
                                    >

                                        The Pooja Store includes orders,
                                        shipping, delivery status,
                                        returns and cancellations.
                                        Product-specific refund rules
                                        should be defined in the
                                        approved policy.

                                    </p>


                                    <a
                                        href="{{ url('/shipping-policy') }}"
                                        class="btn
                                               btn-sm
                                               btn-pn-outline"
                                    >

                                        View Shipping Policy

                                        <i
                                            class="bi bi-arrow-right ms-1"
                                        ></i>

                                    </a>

                                </div>

                            </div>

                        </section>


                        {{-- 11 Donations --}}

                        <section
                            id="donations"
                            class="refund-section
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
                                    class="refund-number
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
                                        Donation Refunds
                                    </h2>


                                    <p
                                        class="text-secondary
                                               lh-lg
                                               mb-0"
                                    >

                                        The platform includes Temple
                                        Donations, NGO Donations,
                                        Annadanam and Goshala donations.
                                        The final approved policy should
                                        define whether and under what
                                        conditions donation transactions
                                        may be refunded.

                                    </p>

                                </div>

                            </div>

                        </section>


                        {{-- 12 Support --}}

                        <section
                            id="support"
                            class="refund-section
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
                                    class="refund-number
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
                                        Refund Support
                                    </h2>


                                    <p
                                        class="text-secondary
                                               lh-lg
                                               mb-4"
                                    >

                                        Customers who need assistance
                                        with a refund can use the
                                        documented support and ticket
                                        workflow.

                                    </p>


                                    <div
                                        class="d-flex
                                               flex-wrap
                                               gap-2"
                                    >

                                        <a
                                            href="{{ url('/raise-ticket') }}"
                                            class="btn btn-pn"
                                        >

                                            Raise a Ticket

                                        </a>


                                        <a
                                            href="{{ url('/help-center') }}"
                                            class="btn btn-pn-outline"
                                        >

                                            Visit Help Center

                                        </a>

                                    </div>

                                </div>

                            </div>

                        </section>


                        {{-- 13 Changes --}}

                        <section
                            id="changes"
                            class="refund-section
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
                                    class="refund-number
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
                                        Changes to Refund Policy
                                    </h2>


                                    <p
                                        class="text-secondary
                                               lh-lg
                                               mb-0"
                                    >

                                        Any changes to the approved
                                        Refund Policy should be
                                        maintained through the Pooja
                                        Nilayam CMS and reflected on
                                        this page.

                                    </p>

                                </div>

                            </div>

                        </section>


                        {{-- 14 Contact --}}

                        <section
                            id="contact"
                            class="refund-section"
                        >

                            <div
                                class="d-flex
                                       align-items-start
                                       gap-3"
                            >

                                <span
                                    class="refund-number
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

                                        For questions about a refund
                                        request or the refund process,
                                        contact the Pooja Nilayam
                                        support team.

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

    .refund-nav-link {
        transition:
            background-color .2s ease,
            color .2s ease;
    }


    .refund-nav-link:hover,
    .refund-nav-link.active {
        background-color: #f8f1e4;
    }


    .refund-nav-link:hover span:last-child,
    .refund-nav-link.active span:last-child {
        color: #8b5e34 !important;
    }


    .refund-section {
        scroll-margin-top: 110px;
    }


    .refund-number {
        min-width: 32px;
        padding-top: 3px;
    }


    @media (max-width: 991.98px) {

        .refund-section {
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
            '.refund-nav-link'
        );


    const sections =
        document.querySelectorAll(
            '.refund-section'
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