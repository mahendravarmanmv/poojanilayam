@extends('layouts.app')

@section('title', 'Donation Successful | Pooja Nilayam')

@section(
    'meta_description',
    'Your donation has been successfully completed through Pooja Nilayam.'
)

@section('content')

@php

    /*
    |--------------------------------------------------------------------------
    | TEMPORARY UI DATA
    |--------------------------------------------------------------------------
    | Actual values will later come from the verified donation record.
    |--------------------------------------------------------------------------
    */

    $donation = [

        'number' => 'PN-DON-2026-000124',

        'date' => '09 August 2026',

        'amount' => 1001,

        'temple' => 'Sri Venkateswara Temple',

        'location' => 'Tirumala, Andhra Pradesh',

        'purpose' => 'Temple Support',

        'payment_method' => 'UPI',

        'payment_status' => 'Payment Successful',

        'transaction_reference' => 'TXN-2026-000124'

    ];


    $donor = [

        'name' => 'Mahendra Varma',

        'email' => 'customer@example.com',

        'mobile' => '+91 XXXXX XXXXX'

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
                        Donation
                    </a>

                </li>


                <li
                    class="breadcrumb-item active"
                    aria-current="page"
                >
                    Donation Success
                </li>

            </ol>

        </nav>

    </div>

</section>


{{-- ============================================================
     SUCCESS HERO
============================================================ --}}

<section class="bg-pn-cream py-5">

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-12 col-lg-9">

                <div class="text-center">

                    {{-- Success Icon --}}

                    <div
                        class="rounded-circle
                               bg-success-subtle
                               text-success
                               d-flex
                               align-items-center
                               justify-content-center
                               mx-auto
                               mb-4"
                        style="width:100px;height:100px;"
                    >

                        <i
                            class="bi bi-check-lg"
                            style="font-size:3.2rem;"
                        ></i>

                    </div>


                    <span
                        class="small
                               text-pn-gold
                               fw-semibold
                               text-uppercase"
                    >
                        Donation Successful
                    </span>


                    <h1
                        class="font-serif
                               display-3
                               text-pn-brown
                               mt-2
                               mb-3"
                    >
                        Thank you for your generous contribution.
                    </h1>


                    <p
                        class="lead
                               text-secondary
                               col-lg-9
                               mx-auto
                               mb-4"
                    >
                        Your donation has been successfully
                        completed. We are grateful for your support
                        of this sacred initiative.
                    </p>


                    {{-- Donation Reference --}}

                    <div
                        class="d-inline-flex
                               flex-column
                               flex-sm-row
                               align-items-center
                               gap-2
                               gap-sm-3
                               bg-white
                               border
                               border-warning-subtle
                               rounded-pill
                               px-4
                               py-3"
                    >

                        <span
                            class="small
                                   text-secondary"
                        >
                            Donation Reference
                        </span>


                        <strong
                            class="text-pn-primary"
                        >
                            {{ $donation['number'] }}
                        </strong>


                        <span
                            class="badge
                                   bg-success-subtle
                                   text-success
                                   rounded-pill"
                        >
                            Successful
                        </span>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- ============================================================
     DONATION PROGRESS
============================================================ --}}

<section class="py-4 border-bottom">

    <div class="container">

        <div
            class="d-flex
                   align-items-center
                   justify-content-center"
        >

            {{-- Donation --}}

            <div
                class="d-flex
                       align-items-center
                       gap-2"
            >

                <span
                    class="rounded-circle
                           bg-pn-primary
                           text-white
                           d-inline-flex
                           align-items-center
                           justify-content-center"
                    style="width:34px;height:34px;"
                >
                    <i class="bi bi-check"></i>
                </span>


                <small
                    class="fw-semibold
                           text-pn-primary
                           d-none
                           d-sm-inline"
                >
                    Donation
                </small>

            </div>


            <div
                class="bg-pn-primary
                       mx-2
                       mx-sm-3"
                style="height:2px;width:45px;"
            ></div>


            {{-- Payment --}}

            <div
                class="d-flex
                       align-items-center
                       gap-2"
            >

                <span
                    class="rounded-circle
                           bg-pn-primary
                           text-white
                           d-inline-flex
                           align-items-center
                           justify-content-center"
                    style="width:34px;height:34px;"
                >
                    <i class="bi bi-check"></i>
                </span>


                <small
                    class="fw-semibold
                           text-pn-primary
                           d-none
                           d-sm-inline"
                >
                    Payment
                </small>

            </div>


            <div
                class="bg-pn-primary
                       mx-2
                       mx-sm-3"
                style="height:2px;width:45px;"
            ></div>


            {{-- Success --}}

            <div
                class="d-flex
                       align-items-center
                       gap-2"
            >

                <span
                    class="rounded-circle
                           bg-success
                           text-white
                           d-inline-flex
                           align-items-center
                           justify-content-center"
                    style="width:34px;height:34px;"
                >
                    <i class="bi bi-check-lg"></i>
                </span>


                <small
                    class="fw-semibold
                           text-success
                           d-none
                           d-sm-inline"
                >
                    Completed
                </small>

            </div>


            <div
                class="bg-success
                       mx-2
                       mx-sm-3"
                style="height:2px;width:45px;"
            ></div>


            {{-- Receipt --}}

            <div
                class="d-flex
                       align-items-center
                       gap-2"
            >

                <span
                    class="rounded-circle
                           bg-success
                           text-white
                           d-inline-flex
                           align-items-center
                           justify-content-center"
                    style="width:34px;height:34px;"
                >
                    <i class="bi bi-receipt"></i>
                </span>


                <small
                    class="fw-semibold
                           text-success
                           d-none
                           d-sm-inline"
                >
                    Receipt
                </small>

            </div>

        </div>

    </div>

</section>


{{-- ============================================================
     DONATION INFORMATION
============================================================ --}}

<section class="py-5">

    <div class="container">

        <div class="row g-4 g-xl-5">

            {{-- ====================================================
                 LEFT
            ===================================================== --}}

            <div class="col-12 col-lg-7">

                {{-- ==================================================
                     DONATION DETAILS
                =================================================== --}}

                <div
                    class="card
                           border
                           border-warning-subtle
                           rounded-5
                           mb-4"
                >

                    <div class="card-body p-4 p-md-5">

                        <div
                            class="d-flex
                                   align-items-start
                                   justify-content-between
                                   gap-3
                                   mb-4"
                        >

                            <div>

                                <span
                                    class="small
                                           text-pn-gold
                                           fw-semibold
                                           text-uppercase"
                                >
                                    Donation Details
                                </span>


                                <h2
                                    class="font-serif
                                           h3
                                           text-pn-brown
                                           mt-1
                                           mb-0"
                                >
                                    Your Contribution
                                </h2>

                            </div>


                            <span
                                class="badge
                                       bg-success-subtle
                                       text-success
                                       rounded-pill
                                       px-3
                                       py-2"
                            >
                                Successful
                            </span>

                        </div>


                        {{-- Amount --}}

                        <div
                            class="border
                                   border-warning-subtle
                                   rounded-4
                                   bg-pn-cream
                                   p-4
                                   mb-4"
                        >

                            <div
                                class="d-flex
                                       align-items-center
                                       justify-content-between
                                       gap-3"
                            >

                                <div>

                                    <small
                                        class="text-secondary
                                               d-block
                                               mb-1"
                                    >
                                        Donation Amount
                                    </small>


                                    <strong
                                        class="font-serif
                                               display-6
                                               text-pn-primary"
                                    >
                                        ₹{{ number_format(
                                            $donation['amount']
                                        ) }}
                                    </strong>

                                </div>


                                <div
                                    class="rounded-circle
                                           bg-white
                                           text-success
                                           d-flex
                                           align-items-center
                                           justify-content-center"
                                    style="width:58px;height:58px;"
                                >

                                    <i
                                        class="bi bi-check-circle-fill
                                               fs-4"
                                    ></i>

                                </div>

                            </div>

                        </div>


                        {{-- Details Grid --}}

                        <div
                            class="row
                                   row-cols-1
                                   row-cols-sm-2
                                   g-3"
                        >

                            <div class="col">

                                <div
                                    class="border
                                           border-warning-subtle
                                           rounded-4
                                           p-3
                                           h-100"
                                >

                                    <small
                                        class="text-secondary
                                               d-block
                                               mb-1"
                                    >
                                        Donation Reference
                                    </small>


                                    <strong
                                        class="small
                                               text-pn-brown
                                               text-break"
                                    >
                                        {{ $donation['number'] }}
                                    </strong>

                                </div>

                            </div>


                            <div class="col">

                                <div
                                    class="border
                                           border-warning-subtle
                                           rounded-4
                                           p-3
                                           h-100"
                                >

                                    <small
                                        class="text-secondary
                                               d-block
                                               mb-1"
                                    >
                                        Donation Date
                                    </small>


                                    <strong
                                        class="small
                                               text-pn-brown"
                                    >
                                        {{ $donation['date'] }}
                                    </strong>

                                </div>

                            </div>


                            <div class="col">

                                <div
                                    class="border
                                           border-warning-subtle
                                           rounded-4
                                           p-3
                                           h-100"
                                >

                                    <small
                                        class="text-secondary
                                               d-block
                                               mb-1"
                                    >
                                        Donation Purpose
                                    </small>


                                    <strong
                                        class="small
                                               text-pn-brown"
                                    >
                                        {{ $donation['purpose'] }}
                                    </strong>

                                </div>

                            </div>


                            <div class="col">

                                <div
                                    class="border
                                           border-warning-subtle
                                           rounded-4
                                           p-3
                                           h-100"
                                >

                                    <small
                                        class="text-secondary
                                               d-block
                                               mb-1"
                                    >
                                        Payment Method
                                    </small>


                                    <strong
                                        class="small
                                               text-pn-brown"
                                    >
                                        {{ $donation['payment_method'] }}
                                    </strong>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>


                {{-- ==================================================
                     TEMPLE
                =================================================== --}}

                <div
                    class="card
                           border
                           border-warning-subtle
                           rounded-5
                           mb-4"
                >

                    <div class="card-body p-4 p-md-5">

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
                                style="width:54px;height:54px;"
                            >

                                <i
                                    class="bi bi-bank2 fs-5"
                                ></i>

                            </div>


                            <div>

                                <span
                                    class="small
                                           text-pn-gold
                                           fw-semibold
                                           text-uppercase"
                                >
                                    Supported Temple
                                </span>


                                <h2
                                    class="font-serif
                                           h3
                                           text-pn-brown
                                           mt-1
                                           mb-1"
                                >
                                    {{ $donation['temple'] }}
                                </h2>


                                <div
                                    class="d-flex
                                           align-items-center
                                           gap-2"
                                >

                                    <i
                                        class="bi bi-geo-alt
                                               text-pn-primary"
                                    ></i>


                                    <small
                                        class="text-secondary"
                                    >
                                        {{ $donation['location'] }}
                                    </small>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>


                {{-- ==================================================
                     DONOR DETAILS
                =================================================== --}}

                <div
                    class="card
                           border
                           border-warning-subtle
                           rounded-5
                           mb-4"
                >

                    <div class="card-body p-4 p-md-5">

                        <span
                            class="small
                                   text-pn-gold
                                   fw-semibold
                                   text-uppercase"
                        >
                            Donor Information
                        </span>


                        <h2
                            class="font-serif
                                   h3
                                   text-pn-brown
                                   mt-1
                                   mb-4"
                        >
                            Thank you, {{ $donor['name'] }}
                        </h2>


                        <div class="vstack gap-3">

                            <div
                                class="d-flex
                                       align-items-center
                                       gap-3"
                            >

                                <i
                                    class="bi bi-person
                                           text-pn-primary"
                                ></i>


                                <span
                                    class="small
                                           text-secondary"
                                >
                                    {{ $donor['name'] }}
                                </span>

                            </div>


                            <div
                                class="d-flex
                                       align-items-center
                                       gap-3"
                            >

                                <i
                                    class="bi bi-envelope
                                           text-pn-primary"
                                ></i>


                                <span
                                    class="small
                                           text-secondary
                                           text-break"
                                >
                                    {{ $donor['email'] }}
                                </span>

                            </div>


                            <div
                                class="d-flex
                                       align-items-center
                                       gap-3"
                            >

                                <i
                                    class="bi bi-phone
                                           text-pn-primary"
                                ></i>


                                <span
                                    class="small
                                           text-secondary"
                                >
                                    {{ $donor['mobile'] }}
                                </span>

                            </div>

                        </div>

                    </div>

                </div>


                {{-- ==================================================
                     PAYMENT INFORMATION
                =================================================== --}}

                <div
                    class="card
                           border
                           border-warning-subtle
                           rounded-5"
                >

                    <div class="card-body p-4 p-md-5">

                        <div
                            class="d-flex
                                   align-items-start
                                   gap-3"
                        >

                            <div
                                class="rounded-circle
                                       bg-success-subtle
                                       text-success
                                       d-flex
                                       align-items-center
                                       justify-content-center
                                       flex-shrink-0"
                                style="width:54px;height:54px;"
                            >

                                <i
                                    class="bi bi-credit-card
                                           fs-5"
                                ></i>

                            </div>


                            <div class="flex-grow-1">

                                <span
                                    class="small
                                           text-pn-gold
                                           fw-semibold
                                           text-uppercase"
                                >
                                    Payment
                                </span>


                                <h2
                                    class="font-serif
                                           h4
                                           text-pn-brown
                                           mt-1
                                           mb-3"
                                >
                                    Payment confirmed
                                </h2>


                                <div
                                    class="row
                                           row-cols-1
                                           row-cols-sm-2
                                           g-3"
                                >

                                    <div class="col">

                                        <div
                                            class="bg-pn-cream
                                                   rounded-4
                                                   p-3"
                                        >

                                            <small
                                                class="text-secondary
                                                       d-block
                                                       mb-1"
                                            >
                                                Status
                                            </small>


                                            <strong
                                                class="small
                                                       text-success"
                                            >
                                                {{ $donation['payment_status'] }}
                                            </strong>

                                        </div>

                                    </div>


                                    <div class="col">

                                        <div
                                            class="bg-pn-cream
                                                   rounded-4
                                                   p-3"
                                        >

                                            <small
                                                class="text-secondary
                                                       d-block
                                                       mb-1"
                                            >
                                                Method
                                            </small>


                                            <strong
                                                class="small
                                                       text-pn-brown"
                                            >
                                                {{ $donation['payment_method'] }}
                                            </strong>

                                        </div>

                                    </div>


                                    <div class="col-12">

                                        <div
                                            class="bg-pn-cream
                                                   rounded-4
                                                   p-3"
                                        >

                                            <small
                                                class="text-secondary
                                                       d-block
                                                       mb-1"
                                            >
                                                Transaction Reference
                                            </small>


                                            <strong
                                                class="small
                                                       text-pn-brown
                                                       text-break"
                                            >
                                                {{ $donation['transaction_reference'] }}
                                            </strong>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>


            {{-- ====================================================
                 RIGHT — RECEIPT / SUMMARY
            ===================================================== --}}

            <div class="col-12 col-lg-5">

                <aside
                    class="card
                           border
                           border-warning-subtle
                           rounded-5
                           sticky-lg-top"
                    style="top:90px;"
                >

                    <div class="card-body p-4 p-md-5">

                        {{-- Receipt Header --}}

                        <div
                            class="text-center
                                   mb-4"
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
                                style="width:64px;height:64px;"
                            >

                                <i
                                    class="bi bi-receipt
                                           fs-4"
                                ></i>

                            </div>


                            <h2
                                class="font-serif
                                       h3
                                       text-pn-brown
                                       mb-1"
                            >
                                Donation Receipt
                            </h2>


                            <small class="text-secondary">
                                {{ $donation['number'] }}
                            </small>

                        </div>


                        {{-- Amount --}}

                        <div
                            class="text-center
                                   bg-pn-cream
                                   rounded-4
                                   p-4
                                   mb-4"
                        >

                            <small
                                class="text-secondary
                                       d-block"
                            >
                                Total Donated
                            </small>


                            <strong
                                class="font-serif
                                       display-5
                                       text-pn-primary"
                            >
                                ₹{{ number_format(
                                    $donation['amount']
                                ) }}
                            </strong>

                        </div>


                        {{-- Summary --}}

                        <div class="vstack gap-3">

                            <div
                                class="d-flex
                                       justify-content-between
                                       gap-3"
                            >

                                <span class="text-secondary">
                                    Temple
                                </span>


                                <strong
                                    class="small
                                           text-pn-brown
                                           text-end"
                                >
                                    {{ $donation['temple'] }}
                                </strong>

                            </div>


                            <div
                                class="d-flex
                                       justify-content-between
                                       gap-3"
                            >

                                <span class="text-secondary">
                                    Purpose
                                </span>


                                <strong
                                    class="small
                                           text-pn-brown"
                                >
                                    {{ $donation['purpose'] }}
                                </strong>

                            </div>


                            <div
                                class="d-flex
                                       justify-content-between
                                       gap-3"
                            >

                                <span class="text-secondary">
                                    Date
                                </span>


                                <strong
                                    class="small
                                           text-pn-brown"
                                >
                                    {{ $donation['date'] }}
                                </strong>

                            </div>


                            <div
                                class="d-flex
                                       justify-content-between
                                       gap-3"
                            >

                                <span class="text-secondary">
                                    Payment
                                </span>


                                <strong
                                    class="small
                                           text-success"
                                >
                                    Successful
                                </strong>

                            </div>

                        </div>


                        <hr
                            class="border-warning-subtle
                                   my-4"
                        >


                        {{-- Receipt Button --}}

                        <div class="d-grid gap-2">

                            <button
                                type="button"
                                class="btn
                                       btn-pn
                                       btn-lg"
                                id="downloadReceiptButton"
                            >

                                <i
                                    class="bi bi-download me-2"
                                ></i>

                                Download Receipt

                            </button>


                            <button
                                type="button"
                                class="btn
                                       btn-pn-outline"
                                id="printReceiptButton"
                            >

                                <i
                                    class="bi bi-printer me-2"
                                ></i>

                                Print Receipt

                            </button>

                        </div>


                        <div
                            class="text-center
                                   mt-4"
                        >

                            <small class="text-secondary">

                                Keep your donation reference for
                                future communication.

                            </small>

                        </div>

                    </div>

                </aside>

            </div>

        </div>

    </div>

</section>


{{-- ============================================================
     WHAT HAPPENS NEXT
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
                Thank You
            </span>


            <h2
                class="font-serif
                       display-6
                       text-pn-brown
                       mt-2
                       mb-3"
            >
                What happens next?
            </h2>


            <p
                class="text-secondary
                       col-lg-7
                       mx-auto"
            >
                Your contribution has been recorded as a successful
                donation. Your receipt can be retained for your
                records.
            </p>

        </div>


        <div
            class="row
                   row-cols-1
                   row-cols-md-3
                   g-4"
        >

            {{-- Confirmation --}}

            <div class="col">

                <div
                    class="text-center
                           h-100"
                >

                    <div
                        class="rounded-circle
                               bg-white
                               text-success
                               d-flex
                               align-items-center
                               justify-content-center
                               mx-auto
                               mb-3"
                        style="width:60px;height:60px;"
                    >

                        <i class="bi bi-check-circle fs-5"></i>

                    </div>


                    <h3
                        class="font-serif
                               h5
                               text-pn-brown"
                    >
                        Donation Confirmed
                    </h3>


                    <p
                        class="small
                               text-secondary
                               mb-0"
                    >
                        Your donation has been successfully
                        confirmed.
                    </p>

                </div>

            </div>


            {{-- Receipt --}}

            <div class="col">

                <div
                    class="text-center
                           h-100"
                >

                    <div
                        class="rounded-circle
                               bg-white
                               text-pn-primary
                               d-flex
                               align-items-center
                               justify-content-center
                               mx-auto
                               mb-3"
                        style="width:60px;height:60px;"
                    >

                        <i class="bi bi-receipt fs-5"></i>

                    </div>


                    <h3
                        class="font-serif
                               h5
                               text-pn-brown"
                    >
                        Receipt Available
                    </h3>


                    <p
                        class="small
                               text-secondary
                               mb-0"
                    >
                        Keep your donation receipt for your records.
                    </p>

                </div>

            </div>


            {{-- Continue --}}

            <div class="col">

                <div
                    class="text-center
                           h-100"
                >

                    <div
                        class="rounded-circle
                               bg-white
                               text-pn-primary
                               d-flex
                               align-items-center
                               justify-content-center
                               mx-auto
                               mb-3"
                        style="width:60px;height:60px;"
                    >

                        <i class="bi bi-stars fs-5"></i>

                    </div>


                    <h3
                        class="font-serif
                               h5
                               text-pn-brown"
                    >
                        Continue Your Journey
                    </h3>


                    <p
                        class="small
                               text-secondary
                               mb-0"
                    >
                        Explore poojas, temples, digital services and
                        other devotional experiences.
                    </p>

                </div>

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
                    Thank you for supporting a sacred purpose.
                </h2>


                <p
                    class="text-white-50
                           col-lg-7
                           mx-auto
                           mb-4"
                >
                    We are grateful for your contribution and
                    support of the devotional community.
                </p>


                <div
                    class="d-flex
                           flex-column
                           flex-sm-row
                           justify-content-center
                           gap-2"
                >

                    <a
                        href="{{ url('/') }}"
                        class="btn
                               btn-warning
                               text-dark
                               fw-semibold
                               px-4"
                    >

                        Go to Home

                        <i
                            class="bi bi-arrow-right ms-2"
                        ></i>

                    </a>


                    <a
                        href="#"
                        class="btn
                               btn-outline-light
                               px-4"
                    >

                        Explore Services

                    </a>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- ============================================================
     PAGE SCRIPT
============================================================ --}}

@push('scripts')

<script>
document.addEventListener('DOMContentLoaded', function () {

    /*
    |--------------------------------------------------------------------------
    | Print Receipt
    |--------------------------------------------------------------------------
    */

    const printButton =
        document.getElementById(
            'printReceiptButton'
        );


    printButton?.addEventListener(
        'click',
        function () {

            window.print();

        }
    );


    /*
    |--------------------------------------------------------------------------
    | Download Receipt
    |--------------------------------------------------------------------------
    | Backend receipt/PDF generation will be connected later.
    |--------------------------------------------------------------------------
    */

    const downloadButton =
        document.getElementById(
            'downloadReceiptButton'
        );


    downloadButton?.addEventListener(
        'click',
        function () {

            const originalHTML =
                this.innerHTML;


            this.innerHTML =
                '<span class="spinner-border spinner-border-sm me-2"></span>' +
                'Preparing Receipt...';


            this.disabled = true;


            /*
            |--------------------------------------------------------------------------
            | Temporary UI prototype behaviour.
            |--------------------------------------------------------------------------
            */

            setTimeout(function () {

                downloadButton.innerHTML =
                    originalHTML;

                downloadButton.disabled =
                    false;

            }, 1000);

        }
    );

});
</script>

@endpush

@endsection