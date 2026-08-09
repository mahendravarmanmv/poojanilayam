@extends('layouts.app')

@section('title', 'Donate Now | Pooja Nilayam')

@section(
    'meta_description',
    'Make a devotional contribution to your selected temple or spiritual initiative through Pooja Nilayam.'
)

@section('content')

@php

    /*
    |--------------------------------------------------------------------------
    | TEMPORARY UI DATA
    |--------------------------------------------------------------------------
    | These values will later come from the database / controller.
    |--------------------------------------------------------------------------
    */

    $temples = [
        [
            'id' => 1,
            'name' => 'Sri Venkateswara Temple',
            'location' => 'Tirumala, Andhra Pradesh'
        ],
        [
            'id' => 2,
            'name' => 'Sri Durga Devi Temple',
            'location' => 'Hyderabad, Telangana'
        ],
        [
            'id' => 3,
            'name' => 'Sri Shiva Temple',
            'location' => 'Varanasi, Uttar Pradesh'
        ]
    ];


    $donationTypes = [
        [
            'id' => 1,
            'name' => 'Temple Support',
            'description' => 'Support temple worship and activities.'
        ],
        [
            'id' => 2,
            'name' => 'Annadanam',
            'description' => 'Support devotional food and community service.'
        ],
        [
            'id' => 3,
            'name' => 'Pooja & Seva',
            'description' => 'Support sacred poojas and seva activities.'
        ],
        [
            'id' => 4,
            'name' => 'Temple Development',
            'description' => 'Support development of sacred spaces.'
        ]
    ];


    $suggestedAmounts = [
        501,
        1001,
        2501,
        5001
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
                    Donate Now
                </li>

            </ol>

        </nav>

    </div>

</section>


{{-- ============================================================
     PAGE HEADER
============================================================ --}}

<section class="bg-pn-cream py-5">

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-12 col-lg-9 text-center">

                <span
                    class="small
                           text-pn-gold
                           fw-semibold
                           text-uppercase"
                >
                    Donation
                </span>


                <h1
                    class="font-serif
                           display-4
                           text-pn-brown
                           mt-2
                           mb-3"
                >
                    Make a Donation
                </h1>


                <p
                    class="lead
                           text-secondary
                           col-lg-9
                           mx-auto
                           mb-0"
                >
                    Choose a temple, select your purpose, enter your
                    contribution and provide your donor details to
                    continue securely.
                </p>

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

            {{-- Step 1 --}}

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
                    1
                </span>


                <small
                    class="fw-semibold
                           text-pn-primary
                           d-none
                           d-sm-inline"
                >
                    Temple
                </small>

            </div>


            <div
                class="bg-pn-primary
                       mx-2
                       mx-sm-3"
                style="height:2px;width:35px;"
            ></div>


            {{-- Step 2 --}}

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
                    2
                </span>


                <small
                    class="fw-semibold
                           text-pn-primary
                           d-none
                           d-sm-inline"
                >
                    Purpose
                </small>

            </div>


            <div
                class="bg-pn-primary
                       mx-2
                       mx-sm-3"
                style="height:2px;width:35px;"
            ></div>


            {{-- Step 3 --}}

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
                    3
                </span>


                <small
                    class="fw-semibold
                           text-pn-primary
                           d-none
                           d-sm-inline"
                >
                    Amount
                </small>

            </div>


            <div
                class="bg-pn-primary
                       mx-2
                       mx-sm-3"
                style="height:2px;width:35px;"
            ></div>


            {{-- Step 4 --}}

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
                    4
                </span>


                <small
                    class="fw-semibold
                           text-pn-primary
                           d-none
                           d-sm-inline"
                >
                    Details
                </small>

            </div>


            <div
                class="bg-secondary-subtle
                       mx-2
                       mx-sm-3"
                style="height:2px;width:35px;"
            ></div>


            {{-- Step 5 --}}

            <div
                class="d-flex
                       align-items-center
                       gap-2"
            >

                <span
                    class="rounded-circle
                           border
                           border-secondary
                           text-secondary
                           d-inline-flex
                           align-items-center
                           justify-content-center"
                    style="width:34px;height:34px;"
                >
                    5
                </span>


                <small
                    class="text-secondary
                           d-none
                           d-sm-inline"
                >
                    Payment
                </small>

            </div>

        </div>

    </div>

</section>


{{-- ============================================================
     DONATION FORM
============================================================ --}}

<section class="py-5">

    <div class="container">

        <form
            id="donationForm"
            method="POST"
            action="#"
        >

            @csrf

            <div class="row g-4 g-xl-5">

                {{-- ====================================================
                     LEFT FORM
                ===================================================== --}}

                <div class="col-12 col-lg-7">

                    {{-- ==================================================
                         1. SELECT TEMPLE
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
                                    style="width:52px;height:52px;"
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
                                        Step 1
                                    </span>


                                    <h2
                                        class="font-serif
                                               h3
                                               text-pn-brown
                                               mt-1
                                               mb-1"
                                    >
                                        Select Temple
                                    </h2>


                                    <p
                                        class="small
                                               text-secondary
                                               mb-0"
                                    >
                                        Choose the temple you would
                                        like to support.
                                    </p>

                                </div>

                            </div>


                            <label
                                for="temple"
                                class="form-label
                                       fw-semibold
                                       text-pn-brown"
                            >
                                Temple
                                <span class="text-danger">*</span>
                            </label>


                            <select
                                id="temple"
                                name="temple_id"
                                class="form-select
                                       form-select-lg"
                                required
                            >

                                <option
                                    value=""
                                    selected
                                    disabled
                                >
                                    Select a temple
                                </option>


                                @foreach($temples as $temple)

                                    <option
                                        value="{{ $temple['id'] }}"
                                    >
                                        {{ $temple['name'] }}
                                        —
                                        {{ $temple['location'] }}
                                    </option>

                                @endforeach

                            </select>

                        </div>

                    </div>


                    {{-- ==================================================
                         2. DONATION TYPE
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
                                    style="width:52px;height:52px;"
                                >

                                    <i
                                        class="bi bi-heart
                                               fs-5"
                                    ></i>

                                </div>


                                <div>

                                    <span
                                        class="small
                                               text-pn-gold
                                               fw-semibold
                                               text-uppercase"
                                    >
                                        Step 2
                                    </span>


                                    <h2
                                        class="font-serif
                                               h3
                                               text-pn-brown
                                               mt-1
                                               mb-1"
                                    >
                                        Choose Donation Type
                                    </h2>


                                    <p
                                        class="small
                                               text-secondary
                                               mb-0"
                                    >
                                        Select the purpose for your
                                        contribution.
                                    </p>

                                </div>

                            </div>


                            <div
                                class="row
                                       row-cols-1
                                       row-cols-sm-2
                                       g-3"
                            >

                                @foreach(
                                    $donationTypes as $type
                                )

                                    <div class="col">

                                        <input
                                            type="radio"
                                            class="btn-check"
                                            name="donation_type"
                                            id="donationType{{ $type['id'] }}"
                                            value="{{ $type['id'] }}"
                                            required
                                        >


                                        <label
                                            for="donationType{{ $type['id'] }}"
                                            class="donation-type-option
                                                   border
                                                   border-warning-subtle
                                                   rounded-4
                                                   p-3
                                                   h-100
                                                   d-block"
                                            style="cursor:pointer;"
                                        >

                                            <strong
                                                class="d-block
                                                       text-pn-brown
                                                       mb-1"
                                            >
                                                {{ $type['name'] }}
                                            </strong>


                                            <small
                                                class="text-secondary"
                                            >
                                                {{ $type['description'] }}
                                            </small>

                                        </label>

                                    </div>

                                @endforeach

                            </div>

                        </div>

                    </div>


                    {{-- ==================================================
                         3. AMOUNT
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
                                    style="width:52px;height:52px;"
                                >

                                    <i
                                        class="bi bi-currency-rupee
                                               fs-5"
                                    ></i>

                                </div>


                                <div>

                                    <span
                                        class="small
                                               text-pn-gold
                                               fw-semibold
                                               text-uppercase"
                                    >
                                        Step 3
                                    </span>


                                    <h2
                                        class="font-serif
                                               h3
                                               text-pn-brown
                                               mt-1
                                               mb-1"
                                    >
                                        Enter Amount
                                    </h2>


                                    <p
                                        class="small
                                               text-secondary
                                               mb-0"
                                    >
                                        Choose a suggested amount or
                                        enter your own contribution.
                                    </p>

                                </div>

                            </div>


                            <label
                                class="form-label
                                       fw-semibold
                                       text-pn-brown"
                            >
                                Suggested Amounts
                            </label>


                            <div
                                class="d-flex
                                       flex-wrap
                                       gap-2
                                       mb-4"
                            >

                                @foreach(
                                    $suggestedAmounts as $amount
                                )

                                    <button
                                        type="button"
                                        class="btn
                                               btn-outline-secondary
                                               rounded-pill
                                               px-4
                                               donation-amount-btn"
                                        data-amount="{{ $amount }}"
                                    >
                                        ₹{{ number_format($amount) }}
                                    </button>

                                @endforeach

                            </div>


                            <label
                                for="donationAmount"
                                class="form-label
                                       fw-semibold
                                       text-pn-brown"
                            >
                                Donation Amount
                                <span class="text-danger">*</span>
                            </label>


                            <div class="input-group input-group-lg">

                                <span
                                    class="input-group-text
                                           bg-pn-cream
                                           text-pn-primary
                                           border-warning-subtle"
                                >
                                    ₹
                                </span>


                                <input
                                    type="number"
                                    id="donationAmount"
                                    name="amount"
                                    class="form-control
                                           border-warning-subtle"
                                    min="1"
                                    step="1"
                                    placeholder="Enter amount"
                                    inputmode="numeric"
                                    required
                                >

                            </div>


                            <small
                                class="text-secondary
                                       d-block
                                       mt-2"
                            >
                                Enter the amount you wish to donate.
                            </small>

                        </div>

                    </div>


                    {{-- ==================================================
                         4. DONOR DETAILS
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
                                    style="width:52px;height:52px;"
                                >

                                    <i
                                        class="bi bi-person
                                               fs-5"
                                    ></i>

                                </div>


                                <div>

                                    <span
                                        class="small
                                               text-pn-gold
                                               fw-semibold
                                               text-uppercase"
                                    >
                                        Step 4
                                    </span>


                                    <h2
                                        class="font-serif
                                               h3
                                               text-pn-brown
                                               mt-1
                                               mb-1"
                                    >
                                        Donor Details
                                    </h2>


                                    <p
                                        class="small
                                               text-secondary
                                               mb-0"
                                    >
                                        Enter the details required
                                        for your donation confirmation
                                        and receipt.
                                    </p>

                                </div>

                            </div>


                            {{-- Name --}}

                            <div class="mb-3">

                                <label
                                    for="donorName"
                                    class="form-label
                                           fw-semibold
                                           text-pn-brown"
                                >
                                    Full Name
                                    <span class="text-danger">*</span>
                                </label>


                                <input
                                    type="text"
                                    id="donorName"
                                    name="donor_name"
                                    class="form-control
                                           form-control-lg"
                                    placeholder="Enter your full name"
                                    autocomplete="name"
                                    required
                                >

                            </div>


                            {{-- Email --}}

                            <div class="mb-3">

                                <label
                                    for="donorEmail"
                                    class="form-label
                                           fw-semibold
                                           text-pn-brown"
                                >
                                    Email Address
                                    <span class="text-danger">*</span>
                                </label>


                                <input
                                    type="email"
                                    id="donorEmail"
                                    name="donor_email"
                                    class="form-control
                                           form-control-lg"
                                    placeholder="you@example.com"
                                    autocomplete="email"
                                    required
                                >

                            </div>


                            {{-- Mobile --}}

                            <div class="mb-3">

                                <label
                                    for="donorMobile"
                                    class="form-label
                                           fw-semibold
                                           text-pn-brown"
                                >
                                    Mobile Number
                                    <span class="text-danger">*</span>
                                </label>


                                <div class="input-group input-group-lg">

                                    <span class="input-group-text">
                                        +91
                                    </span>


                                    <input
                                        type="tel"
                                        id="donorMobile"
                                        name="donor_mobile"
                                        class="form-control"
                                        placeholder="Enter mobile number"
                                        inputmode="numeric"
                                        autocomplete="tel"
                                        maxlength="10"
                                        required
                                    >

                                </div>

                            </div>


                            {{-- PAN --}}

                            <div class="mb-3">

                                <label
                                    for="donorPan"
                                    class="form-label
                                           fw-semibold
                                           text-pn-brown"
                                >
                                    PAN Number
                                    <span
                                        class="text-secondary
                                               fw-normal"
                                    >
                                        (Optional)
                                    </span>
                                </label>


                                <input
                                    type="text"
                                    id="donorPan"
                                    name="pan"
                                    class="form-control
                                           form-control-lg
                                           text-uppercase"
                                    placeholder="Enter PAN number"
                                    maxlength="10"
                                    autocomplete="off"
                                >


                                <small
                                    class="text-secondary
                                           d-block
                                           mt-2"
                                >
                                    Provide PAN only if required for
                                    the applicable donation/receipt
                                    process.
                                </small>

                            </div>


                            {{-- Address --}}

                            <div class="mb-3">

                                <label
                                    for="donorAddress"
                                    class="form-label
                                           fw-semibold
                                           text-pn-brown"
                                >
                                    Address
                                    <span
                                        class="text-secondary
                                               fw-normal"
                                    >
                                        (Optional)
                                    </span>
                                </label>


                                <textarea
                                    id="donorAddress"
                                    name="address"
                                    class="form-control"
                                    rows="3"
                                    placeholder="Enter your address"
                                    autocomplete="street-address"
                                ></textarea>

                            </div>


                            {{-- Dedication --}}

                            <div class="mb-0">

                                <label
                                    for="donationMessage"
                                    class="form-label
                                           fw-semibold
                                           text-pn-brown"
                                >
                                    Dedication / Message
                                    <span
                                        class="text-secondary
                                               fw-normal"
                                    >
                                        (Optional)
                                    </span>
                                </label>


                                <textarea
                                    id="donationMessage"
                                    name="message"
                                    class="form-control"
                                    rows="3"
                                    placeholder="Add a dedication or message"
                                    maxlength="500"
                                ></textarea>


                                <small
                                    class="text-secondary
                                           d-block
                                           mt-2"
                                >
                                    You may add a short devotional
                                    message or dedication.
                                </small>

                            </div>

                        </div>

                    </div>


                    {{-- ==================================================
                         CONSENT
                    =================================================== --}}

                    <div
                        class="border
                               border-warning-subtle
                               rounded-5
                               bg-pn-cream
                               p-4"
                    >

                        <div class="form-check">

                            <input
                                class="form-check-input"
                                type="checkbox"
                                id="donationConsent"
                                name="consent"
                                required
                            >


                            <label
                                class="form-check-label
                                       small
                                       text-secondary"
                                for="donationConsent"
                            >

                                I confirm that the information
                                provided above is correct and I agree
                                to proceed with this donation.

                                <span class="text-danger">*</span>

                            </label>

                        </div>

                    </div>

                </div>


                {{-- ====================================================
                     RIGHT SUMMARY
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

                            <span
                                class="small
                                       text-pn-gold
                                       fw-semibold
                                       text-uppercase"
                            >
                                Donation Summary
                            </span>


                            <h2
                                class="font-serif
                                       h3
                                       text-pn-brown
                                       mt-1
                                       mb-4"
                            >
                                Review Your Donation
                            </h2>


                            {{-- Selected Temple --}}

                            <div
                                class="border
                                       border-warning-subtle
                                       rounded-4
                                       p-4
                                       mb-3"
                            >

                                <div
                                    class="d-flex
                                           align-items-start
                                           gap-3"
                                >

                                    <i
                                        class="bi bi-bank2
                                               text-pn-primary
                                               fs-5"
                                    ></i>


                                    <div>

                                        <small
                                            class="text-secondary
                                                   d-block
                                                   mb-1"
                                        >
                                            Temple
                                        </small>


                                        <strong
                                            id="summaryTemple"
                                            class="d-block
                                                   text-pn-brown"
                                        >
                                            Not selected
                                        </strong>

                                    </div>

                                </div>

                            </div>


                            {{-- Donation Type --}}

                            <div
                                class="border
                                       border-warning-subtle
                                       rounded-4
                                       p-4
                                       mb-3"
                            >

                                <div
                                    class="d-flex
                                           align-items-start
                                           gap-3"
                                >

                                    <i
                                        class="bi bi-heart
                                               text-pn-primary
                                               fs-5"
                                    ></i>


                                    <div>

                                        <small
                                            class="text-secondary
                                                   d-block
                                                   mb-1"
                                        >
                                            Donation Purpose
                                        </small>


                                        <strong
                                            id="summaryType"
                                            class="d-block
                                                   text-pn-brown"
                                        >
                                            Not selected
                                        </strong>

                                    </div>

                                </div>

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

                                    <span
                                        class="text-secondary"
                                    >
                                        Donation Amount
                                    </span>


                                    <strong
                                        id="summaryAmount"
                                        class="fs-3
                                               text-pn-primary"
                                    >
                                        ₹0
                                    </strong>

                                </div>

                            </div>


                            {{-- Donor --}}

                            <div class="mb-4">

                                <small
                                    class="text-secondary
                                           d-block
                                           mb-1"
                                >
                                    Donor
                                </small>


                                <strong
                                    id="summaryDonor"
                                    class="text-pn-brown"
                                >
                                    Not entered
                                </strong>

                            </div>


                            <hr
                                class="border-warning-subtle
                                       my-4"
                            >


                            {{-- Secure Payment --}}

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
                                    style="width:46px;height:46px;"
                                >

                                    <i
                                        class="bi bi-shield-lock"
                                    ></i>

                                </div>


                                <div>

                                    <strong
                                        class="d-block
                                               small
                                               text-pn-brown
                                               mb-1"
                                    >
                                        Secure Payment
                                    </strong>


                                    <small
                                        class="text-secondary"
                                    >
                                        You will continue to the
                                        payment process after
                                        submitting your donation
                                        details.
                                    </small>

                                </div>

                            </div>


                            {{-- Continue Button --}}

                            <div class="d-grid">

                                <button
                                    type="submit"
                                    id="continueDonationButton"
                                    class="btn
                                           btn-pn
                                           btn-lg"
                                >

                                    Continue to Payment

                                    <i
                                        class="bi bi-arrow-right ms-2"
                                    ></i>

                                </button>

                            </div>


                            <small
                                class="text-secondary
                                       text-center
                                       d-block
                                       mt-3"
                            >

                                Your donation will be processed
                                securely.

                            </small>

                        </div>

                    </aside>

                </div>

            </div>

        </form>

    </div>

</section>


{{-- ============================================================
     TRUST SECTION
============================================================ --}}

<section class="py-5 bg-pn-cream">

    <div class="container">

        <div class="row g-4">

            <div class="col-12 col-md-4">

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
                        style="width:58px;height:58px;"
                    >

                        <i
                            class="bi bi-shield-check fs-5"
                        ></i>

                    </div>


                    <h3
                        class="font-serif
                               h5
                               text-pn-brown"
                    >
                        Secure
                    </h3>


                    <p
                        class="small
                               text-secondary
                               mb-0"
                    >
                        Your payment journey is designed with
                        secure processing in mind.
                    </p>

                </div>

            </div>


            <div class="col-12 col-md-4">

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
                        style="width:58px;height:58px;"
                    >

                        <i
                            class="bi bi-receipt fs-5"
                        ></i>

                    </div>


                    <h3
                        class="font-serif
                               h5
                               text-pn-brown"
                    >
                        Donation Receipt
                    </h3>


                    <p
                        class="small
                               text-secondary
                               mb-0"
                    >
                        A receipt will be generated after a
                        successful donation.
                    </p>

                </div>

            </div>


            <div class="col-12 col-md-4">

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
                        style="width:58px;height:58px;"
                    >

                        <i
                            class="bi bi-heart fs-5"
                        ></i>

                    </div>


                    <h3
                        class="font-serif
                               h5
                               text-pn-brown"
                    >
                        Give With Purpose
                    </h3>


                    <p
                        class="small
                               text-secondary
                               mb-0"
                    >
                        Support the devotional purpose that matters
                        to you.
                    </p>

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

    const templeSelect =
        document.getElementById('temple');

    const donationAmount =
        document.getElementById('donationAmount');

    const donorName =
        document.getElementById('donorName');

    const summaryTemple =
        document.getElementById('summaryTemple');

    const summaryType =
        document.getElementById('summaryType');

    const summaryAmount =
        document.getElementById('summaryAmount');

    const summaryDonor =
        document.getElementById('summaryDonor');

    const amountButtons =
        document.querySelectorAll(
            '.donation-amount-btn'
        );


    /*
    |--------------------------------------------------------------------------
    | Suggested Donation Amount
    |--------------------------------------------------------------------------
    */

    amountButtons.forEach(function (button) {

        button.addEventListener(
            'click',
            function () {

                const amount =
                    this.dataset.amount;

                donationAmount.value =
                    amount;


                amountButtons.forEach(
                    function (item) {

                        item.classList.remove(
                            'btn-pn'
                        );

                        item.classList.add(
                            'btn-outline-secondary'
                        );

                    }
                );


                this.classList.remove(
                    'btn-outline-secondary'
                );

                this.classList.add(
                    'btn-pn'
                );


                updateSummary();

            }
        );

    });


    /*
    |--------------------------------------------------------------------------
    | Temple Summary
    |--------------------------------------------------------------------------
    */

    templeSelect?.addEventListener(
        'change',
        function () {

            const option =
                this.options[
                    this.selectedIndex
                ];


            summaryTemple.textContent =
                option?.text || 'Not selected';

        }
    );


    /*
    |--------------------------------------------------------------------------
    | Donation Type Summary
    |--------------------------------------------------------------------------
    */

    document
        .querySelectorAll(
            'input[name="donation_type"]'
        )
        .forEach(function (radio) {

            radio.addEventListener(
                'change',
                function () {

                    const label =
                        document.querySelector(
                            'label[for="' +
                            this.id +
                            '"]'
                        );


                    const title =
                        label?.querySelector(
                            'strong'
                        );


                    summaryType.textContent =
                        title?.textContent.trim()
                        || 'Not selected';

                }
            );

        });


    /*
    |--------------------------------------------------------------------------
    | Amount / Donor Summary
    |--------------------------------------------------------------------------
    */

    donationAmount?.addEventListener(
        'input',
        updateSummary
    );


    donorName?.addEventListener(
        'input',
        updateSummary
    );


    function updateSummary() {

        const amount =
            Number(
                donationAmount?.value || 0
            );


        summaryAmount.textContent =
            '₹' +
            amount.toLocaleString(
                'en-IN'
            );


        summaryDonor.textContent =
            donorName?.value.trim()
            || 'Not entered';

    }


    /*
    |--------------------------------------------------------------------------
    | Form Validation
    |--------------------------------------------------------------------------
    */

    const donationForm =
        document.getElementById(
            'donationForm'
        );


    const continueButton =
        document.getElementById(
            'continueDonationButton'
        );


    donationForm?.addEventListener(
        'submit',
        function (event) {

            /*
            |--------------------------------------------------------------------------
            | UI Prototype
            |--------------------------------------------------------------------------
            | Backend payment route will be connected later.
            |--------------------------------------------------------------------------
            */

            if (!donationForm.checkValidity()) {

                event.preventDefault();

                donationForm.classList.add(
                    'was-validated'
                );

                return;

            }


            continueButton.disabled =
                true;


            continueButton.innerHTML =
                '<span class="spinner-border spinner-border-sm me-2"></span>' +
                'Preparing Payment...';

        }
    );


    updateSummary();

});
</script>

@endpush

@endsection