@extends('layouts.app')

@section('title', 'Share Your Feedback | Pooja Nilayam')

@section(
    'meta_description',
    'Share your experience with Pooja Nilayam and provide feedback about your completed service.'
)

@section('content')

@php

    /*
    |--------------------------------------------------------------------------
    | TEMPORARY FEEDBACK DATA
    |--------------------------------------------------------------------------
    | This will later come from the completed booking / service.
    |--------------------------------------------------------------------------
    */

    $service = [

        'booking_id' => 'PN-BKG-45821',

        'reference_id' => 'PN-REF-45821',

        'service_name' => 'Ganapathi Pooja',

        'service_type' => 'Online Pooja',

        'date' => '08 August 2026',

        'priest' => 'Sri Venkatesh Sharma',

        'status' => 'Completed'

    ];


    $ratingLabels = [

        1 => 'Very Poor',

        2 => 'Poor',

        3 => 'Average',

        4 => 'Good',

        5 => 'Excellent'

    ];


    $feedbackTopics = [

        'Pooja Experience',

        'Priest Experience',

        'Booking Experience',

        'Communication',

        'Overall Service'

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
                        Support
                    </a>

                </li>


                <li
                    class="breadcrumb-item active"
                    aria-current="page"
                >
                    Feedback
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

            <div class="col-12 col-lg-8">

                <span
                    class="small
                           text-pn-gold
                           fw-semibold
                           text-uppercase"
                >
                    Your Experience Matters
                </span>


                <h1
                    class="font-serif
                           display-4
                           text-pn-brown
                           mt-2
                           mb-3"
                >
                    Share Your Feedback
                </h1>


                <p
                    class="lead
                           text-secondary
                           mb-0"
                >

                    Thank you for choosing Pooja Nilayam.
                    Your feedback helps us improve the experience
                    for every devotee.

                </p>

            </div>

        </div>

    </div>

</section>


{{-- ============================================================
     MAIN FEEDBACK SECTION
============================================================ --}}

<section class="py-5">

    <div class="container">

        <div class="row g-4 g-xl-5">


            {{-- ==================================================
                 FEEDBACK FORM
            =================================================== --}}

            <div class="col-12 col-lg-8">

                <div
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

                        {{-- Success State --}}

                        <div
                            id="feedbackSuccess"
                            class="d-none
                                   text-center
                                   py-4"
                        >

                            <div
                                class="rounded-circle
                                       bg-success-subtle
                                       text-success
                                       d-flex
                                       align-items-center
                                       justify-content-center
                                       mx-auto
                                       mb-4"
                                style="width:76px;height:76px;"
                            >

                                <i
                                    class="bi bi-check-lg fs-2"
                                ></i>

                            </div>


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
                                Feedback Submitted
                            </h2>


                            <p
                                class="text-secondary
                                       mb-4"
                            >

                                Thank you for sharing your experience
                                with Pooja Nilayam.

                            </p>


                            <a
                                href="{{ route('home') }}"
                                class="btn btn-pn"
                            >

                                Back to Home

                                <i
                                    class="bi bi-arrow-right ms-1"
                                ></i>

                            </a>

                        </div>


                        {{-- Feedback Form --}}

                        <div id="feedbackFormWrapper">

                            <div class="mb-4">

                                <span
                                    class="small
                                           text-pn-gold
                                           fw-semibold
                                           text-uppercase"
                                >
                                    Service Feedback
                                </span>


                                <h2
                                    class="font-serif
                                           h2
                                           text-pn-brown
                                           mt-1
                                           mb-2"
                                >
                                    How Was Your Experience?
                                </h2>


                                <p
                                    class="small
                                           text-secondary
                                           mb-0"
                                >

                                    Please take a moment to tell us
                                    about your completed service.

                                </p>

                            </div>


                            {{-- Error --}}

                            <div
                                id="feedbackError"
                                class="alert
                                       alert-danger
                                       rounded-4
                                       d-none"
                                role="alert"
                            >

                                <div
                                    class="d-flex
                                           align-items-start
                                           gap-2"
                                >

                                    <i
                                        class="bi bi-exclamation-circle-fill
                                               mt-1"
                                    ></i>


                                    <span
                                        id="feedbackErrorMessage"
                                    >
                                        Please complete the required
                                        fields.
                                    </span>

                                </div>

                            </div>


                            <form
                                id="feedbackForm"
                                method="POST"
                                action="#"
                                novalidate
                            >

                                @csrf


                                {{-- ==================================================
                                     OVERALL RATING
                                =================================================== --}}

                                <div
                                    class="text-center
                                           bg-pn-cream
                                           rounded-5
                                           p-4
                                           p-md-5
                                           mb-4"
                                >

                                    <label
                                        class="form-label
                                               fw-semibold
                                               text-pn-brown
                                               d-block"
                                    >

                                        Overall Rating

                                        <span
                                            class="text-danger"
                                        >
                                            *
                                        </span>

                                    </label>


                                    <p
                                        id="ratingText"
                                        class="small
                                               text-secondary
                                               mb-3"
                                    >
                                        Please select a rating
                                    </p>


                                    <div
                                        class="d-flex
                                               justify-content-center
                                               gap-2
                                               gap-md-3"
                                        role="radiogroup"
                                        aria-label="Overall service rating"
                                    >

                                        @foreach(
                                            $ratingLabels as $rating => $label
                                        )

                                            <div
                                                class="rating-option"
                                            >

                                                <input
                                                    type="radio"
                                                    class="btn-check"
                                                    name="rating"
                                                    id="rating{{ $rating }}"
                                                    value="{{ $rating }}"
                                                    required
                                                >


                                                <label
                                                    for="rating{{ $rating }}"
                                                    class="rating-star
                                                           d-flex
                                                           flex-column
                                                           align-items-center
                                                           gap-1"
                                                    title="{{ $label }}"
                                                >

                                                    <i
                                                        class="bi bi-star-fill"
                                                    ></i>


                                                    <small>
                                                        {{ $rating }}
                                                    </small>

                                                </label>

                                            </div>

                                        @endforeach

                                    </div>


                                    <div
                                        id="ratingFeedback"
                                        class="invalid-feedback
                                               d-block
                                               mt-3"
                                        style="display:none !important;"
                                    >
                                        Please select a rating.
                                    </div>

                                </div>


                                {{-- ==================================================
                                     SERVICE DETAILS
                                =================================================== --}}

                                <div
                                    class="border
                                           border-warning-subtle
                                           rounded-5
                                           p-4
                                           mb-4"
                                >

                                    <h3
                                        class="font-serif
                                               h4
                                               text-pn-brown
                                               mb-4"
                                    >
                                        Your Service
                                    </h3>


                                    <div
                                        class="row
                                               g-3"
                                    >

                                        <div
                                            class="col-12 col-md-6"
                                        >

                                            <small
                                                class="text-secondary
                                                       d-block
                                                       mb-1"
                                            >
                                                Service
                                            </small>


                                            <strong
                                                class="text-pn-brown"
                                            >

                                                {{ $service['service_name'] }}

                                            </strong>

                                        </div>


                                        <div
                                            class="col-12 col-md-6"
                                        >

                                            <small
                                                class="text-secondary
                                                       d-block
                                                       mb-1"
                                            >
                                                Service Type
                                            </small>


                                            <strong
                                                class="text-pn-brown"
                                            >

                                                {{ $service['service_type'] }}

                                            </strong>

                                        </div>


                                        <div
                                            class="col-12 col-md-6"
                                        >

                                            <small
                                                class="text-secondary
                                                       d-block
                                                       mb-1"
                                            >
                                                Booking ID
                                            </small>


                                            <strong
                                                class="text-pn-brown"
                                            >

                                                {{ $service['booking_id'] }}

                                            </strong>

                                        </div>


                                        <div
                                            class="col-12 col-md-6"
                                        >

                                            <small
                                                class="text-secondary
                                                       d-block
                                                       mb-1"
                                            >
                                                Service Date
                                            </small>


                                            <strong
                                                class="text-pn-brown"
                                            >

                                                {{ $service['date'] }}

                                            </strong>

                                        </div>

                                    </div>

                                </div>


                                {{-- ==================================================
                                     FEEDBACK AREAS
                                =================================================== --}}

                                <div class="mb-4">

                                    <label
                                        class="form-label
                                               fw-semibold
                                               text-pn-brown"
                                    >

                                        What Would You Like to
                                        Comment On?

                                        <span
                                            class="text-secondary
                                                   fw-normal"
                                        >
                                            (Optional)
                                        </span>

                                    </label>


                                    <div
                                        class="d-flex
                                               flex-wrap
                                               gap-2"
                                    >

                                        @foreach(
                                            $feedbackTopics as $index => $topic
                                        )

                                            <input
                                                type="checkbox"
                                                class="btn-check"
                                                name="topics[]"
                                                id="topic{{ $index }}"
                                                value="{{ strtolower(
                                                    str_replace(
                                                        ' ',
                                                        '_',
                                                        $topic
                                                    )
                                                ) }}"
                                            >


                                            <label
                                                for="topic{{ $index }}"
                                                class="btn
                                                       btn-outline-secondary
                                                       rounded-pill"
                                            >

                                                {{ $topic }}

                                            </label>

                                        @endforeach

                                    </div>

                                </div>


                                {{-- ==================================================
                                     COMMENT
                                =================================================== --}}

                                <div class="mb-4">

                                    <label
                                        for="feedbackComment"
                                        class="form-label
                                               fw-semibold
                                               text-pn-brown"
                                    >

                                        Tell Us More

                                        <span
                                            class="text-secondary
                                                   fw-normal"
                                        >
                                            (Optional)
                                        </span>

                                    </label>


                                    <textarea
                                        id="feedbackComment"
                                        name="comment"
                                        class="form-control"
                                        rows="6"
                                        maxlength="1000"
                                        placeholder="Tell us what you liked or what we could improve..."
                                    ></textarea>


                                    <div
                                        class="d-flex
                                               justify-content-end
                                               mt-2"
                                    >

                                        <small
                                            id="commentCounter"
                                            class="text-secondary"
                                        >
                                            0 / 1000
                                        </small>

                                    </div>

                                </div>


                                {{-- ==================================================
                                     RECOMMENDATION
                                =================================================== --}}

                                <div class="mb-4">

                                    <label
                                        class="form-label
                                               fw-semibold
                                               text-pn-brown"
                                    >

                                        Would You Recommend
                                        Pooja Nilayam?

                                    </label>


                                    <div
                                        class="row
                                               g-2"
                                    >

                                        <div
                                            class="col-12 col-sm-4"
                                        >

                                            <input
                                                type="radio"
                                                class="btn-check"
                                                name="recommend"
                                                id="recommendYes"
                                                value="yes"
                                            >


                                            <label
                                                for="recommendYes"
                                                class="btn
                                                       btn-outline-secondary
                                                       w-100"
                                            >

                                                <i
                                                    class="bi bi-hand-thumbs-up me-1"
                                                ></i>

                                                Yes

                                            </label>

                                        </div>


                                        <div
                                            class="col-12 col-sm-4"
                                        >

                                            <input
                                                type="radio"
                                                class="btn-check"
                                                name="recommend"
                                                id="recommendMaybe"
                                                value="maybe"
                                            >


                                            <label
                                                for="recommendMaybe"
                                                class="btn
                                                       btn-outline-secondary
                                                       w-100"
                                            >

                                                <i
                                                    class="bi bi-dash-circle me-1"
                                                ></i>

                                                Maybe

                                            </label>

                                        </div>


                                        <div
                                            class="col-12 col-sm-4"
                                        >

                                            <input
                                                type="radio"
                                                class="btn-check"
                                                name="recommend"
                                                id="recommendNo"
                                                value="no"
                                            >


                                            <label
                                                for="recommendNo"
                                                class="btn
                                                       btn-outline-secondary
                                                       w-100"
                                            >

                                                <i
                                                    class="bi bi-hand-thumbs-down me-1"
                                                ></i>

                                                No

                                            </label>

                                        </div>

                                    </div>

                                </div>


                                {{-- ==================================================
                                     CONSENT
                                =================================================== --}}

                                <div class="mb-4">

                                    <div
                                        class="form-check"
                                    >

                                        <input
                                            type="checkbox"
                                            id="feedbackConsent"
                                            name="consent"
                                            class="form-check-input"
                                            required
                                        >


                                        <label
                                            for="feedbackConsent"
                                            class="form-check-label
                                                   small
                                                   text-secondary"
                                        >

                                            I confirm that this feedback
                                            reflects my experience with
                                            the completed service.

                                            <span
                                                class="text-danger"
                                            >
                                                *
                                            </span>

                                        </label>


                                        <div
                                            class="invalid-feedback"
                                        >
                                            Please confirm before
                                            submitting your feedback.
                                        </div>

                                    </div>

                                </div>


                                {{-- ==================================================
                                     SUBMIT
                                =================================================== --}}

                                <div
                                    class="d-flex
                                           flex-column
                                           flex-sm-row
                                           gap-2"
                                >

                                    <button
                                        type="submit"
                                        id="submitFeedback"
                                        class="btn
                                               btn-pn
                                               btn-lg
                                               px-4"
                                    >

                                        <i
                                            class="bi bi-send me-2"
                                        ></i>

                                        Submit Feedback

                                    </button>


                                    <button
                                        type="reset"
                                        id="resetFeedback"
                                        class="btn
                                               btn-outline-secondary
                                               btn-lg
                                               px-4"
                                    >

                                        Reset

                                    </button>

                                </div>

                            </form>

                        </div>

                    </div>

                </div>

            </div>


            {{-- ==================================================
                 SIDEBAR
            =================================================== --}}

            <div class="col-12 col-lg-4">

                <div
                    class="position-sticky"
                    style="top:100px;"
                >

                    {{-- Service Summary --}}

                    <div
                        class="card
                               border
                               border-warning-subtle
                               rounded-5
                               mb-4"
                    >

                        <div
                            class="card-body
                                   p-4"
                        >

                            <span
                                class="small
                                       text-pn-gold
                                       fw-semibold
                                       text-uppercase"
                            >
                                Completed Service
                            </span>


                            <div
                                class="d-flex
                                       align-items-center
                                       gap-3
                                       mt-3
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
                                    style="width:58px;height:58px;"
                                >

                                    <i
                                        class="bi bi-flower1 fs-4"
                                    ></i>

                                </div>


                                <div>

                                    <h2
                                        class="font-serif
                                               h5
                                               text-pn-brown
                                               mb-1"
                                    >

                                        {{ $service['service_name'] }}

                                    </h2>


                                    <small
                                        class="text-secondary"
                                    >

                                        {{ $service['service_type'] }}

                                    </small>

                                </div>

                            </div>


                            <div
                                class="vstack
                                       gap-3"
                            >

                                <div
                                    class="d-flex
                                           justify-content-between
                                           gap-3"
                                >

                                    <small
                                        class="text-secondary"
                                    >
                                        Booking ID
                                    </small>


                                    <strong
                                        class="small
                                               text-pn-brown
                                               text-end"
                                    >

                                        {{ $service['booking_id'] }}

                                    </strong>

                                </div>


                                <div
                                    class="d-flex
                                           justify-content-between
                                           gap-3"
                                >

                                    <small
                                        class="text-secondary"
                                    >
                                        Reference ID
                                    </small>


                                    <strong
                                        class="small
                                               text-pn-brown
                                               text-end"
                                    >

                                        {{ $service['reference_id'] }}

                                    </strong>

                                </div>


                                <div
                                    class="d-flex
                                           justify-content-between
                                           gap-3"
                                >

                                    <small
                                        class="text-secondary"
                                    >
                                        Date
                                    </small>


                                    <strong
                                        class="small
                                               text-pn-brown
                                               text-end"
                                    >

                                        {{ $service['date'] }}

                                    </strong>

                                </div>


                                <div
                                    class="d-flex
                                           justify-content-between
                                           gap-3"
                                >

                                    <small
                                        class="text-secondary"
                                    >
                                        Status
                                    </small>


                                    <span
                                        class="badge
                                               text-bg-success
                                               rounded-pill"
                                    >

                                        {{ $service['status'] }}

                                    </span>

                                </div>

                            </div>

                        </div>

                    </div>


                    {{-- Why Feedback Matters --}}

                    <div
                        class="card
                               border
                               border-warning-subtle
                               rounded-5
                               mb-4"
                    >

                        <div
                            class="card-body
                                   p-4"
                        >

                            <div
                                class="d-flex
                                       align-items-center
                                       gap-3
                                       mb-3"
                            >

                                <div
                                    class="rounded-circle
                                           bg-pn-cream
                                           text-pn-primary
                                           d-flex
                                           align-items-center
                                           justify-content-center"
                                    style="width:46px;height:46px;"
                                >

                                    <i
                                        class="bi bi-heart"
                                    ></i>

                                </div>


                                <h2
                                    class="font-serif
                                           h5
                                           text-pn-brown
                                           mb-0"
                                >
                                    Your Feedback Matters
                                </h2>

                            </div>


                            <p
                                class="small
                                       text-secondary
                                       mb-3"
                            >

                                Your feedback helps Pooja Nilayam
                                understand what devotees value and
                                where we can improve.

                            </p>


                            <div
                                class="d-flex
                                       align-items-start
                                       gap-2
                                       mb-2"
                            >

                                <i
                                    class="bi bi-check-circle-fill
                                           text-success
                                           mt-1"
                                ></i>


                                <small
                                    class="text-secondary"
                                >
                                    Helps improve our services.
                                </small>

                            </div>


                            <div
                                class="d-flex
                                       align-items-start
                                       gap-2
                                       mb-2"
                            >

                                <i
                                    class="bi bi-check-circle-fill
                                           text-success
                                           mt-1"
                                ></i>


                                <small
                                    class="text-secondary"
                                >
                                    Helps improve the devotee
                                    experience.
                                </small>

                            </div>


                            <div
                                class="d-flex
                                       align-items-start
                                       gap-2"
                            >

                                <i
                                    class="bi bi-check-circle-fill
                                           text-success
                                           mt-1"
                                ></i>


                                <small
                                    class="text-secondary"
                                >
                                    Helps us serve the community
                                    better.
                                </small>

                            </div>

                        </div>

                    </div>


                    {{-- Support Links --}}

                    <div
                        class="bg-pn-cream
                               rounded-5
                               p-4"
                    >

                        <i
                            class="bi bi-headset
                                   text-pn-primary
                                   fs-4"
                        ></i>


                        <h2
                            class="font-serif
                                   h5
                                   text-pn-brown
                                   mt-3"
                        >
                            Need Help Instead?
                        </h2>


                        <p
                            class="small
                                   text-secondary"
                        >

                            If your service issue is not resolved,
                            contact our support team or raise a
                            support ticket.

                        </p>


                        <div
                            class="d-grid
                                   gap-2"
                        >

                            <a
                                href="{{ url('/contact-us') }}"
                                class="btn
                                       btn-pn-outline"
                            >
                                Contact Us
                            </a>


                            <a
                                href="{{ url('/help-center') }}"
                                class="btn
                                       btn-light
                                       border"
                            >
                                Help Center
                            </a>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- ============================================================
     THANK YOU CTA
============================================================ --}}

<section class="bg-pn-beige py-5">

    <div class="container">

        <div
            class="pn-digital
                   rounded-5
                   overflow-hidden
                   text-white"
        >

            <div class="p-4 p-md-5">

                <div
                    class="row
                           align-items-center
                           g-4"
                >

                    <div class="col-12 col-lg-8">

                        <span
                            class="small
                                   text-warning
                                   fw-semibold
                                   text-uppercase"
                        >
                            Pooja Nilayam
                        </span>


                        <h2
                            class="font-serif
                                   display-6
                                   mt-2
                                   mb-2"
                        >
                            Continue Your Spiritual Journey
                        </h2>


                        <p
                            class="text-white-50
                                   mb-0"
                        >

                            Explore more poojas, temples, digital
                            experiences and devotional services.

                        </p>

                    </div>


                    <div
                        class="col-12 col-lg-4
                               text-lg-end"
                    >

                        <a
                            href="{{ route('home') }}"
                            class="btn
                                   btn-warning
                                   text-dark
                                   fw-semibold
                                   px-4"
                        >

                            Explore Pooja Nilayam

                            <i
                                class="bi bi-arrow-right ms-2"
                            ></i>

                        </a>

                    </div>

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

    const form =
        document.getElementById(
            'feedbackForm'
        );


    const ratingText =
        document.getElementById(
            'ratingText'
        );


    const ratingFeedback =
        document.getElementById(
            'ratingFeedback'
        );


    const comment =
        document.getElementById(
            'feedbackComment'
        );


    const commentCounter =
        document.getElementById(
            'commentCounter'
        );


    const feedbackError =
        document.getElementById(
            'feedbackError'
        );


    const feedbackErrorMessage =
        document.getElementById(
            'feedbackErrorMessage'
        );


    const submitButton =
        document.getElementById(
            'submitFeedback'
        );


    const successState =
        document.getElementById(
            'feedbackSuccess'
        );


    const formWrapper =
        document.getElementById(
            'feedbackFormWrapper'
        );


    /*
    |--------------------------------------------------------------------------
    | Rating Labels
    |--------------------------------------------------------------------------
    */

    const ratingLabels = {

        1: 'Very Poor',

        2: 'Poor',

        3: 'Average',

        4: 'Good',

        5: 'Excellent'

    };


    /*
    |--------------------------------------------------------------------------
    | Rating Selection
    |--------------------------------------------------------------------------
    */

    document
        .querySelectorAll(
            'input[name="rating"]'
        )
        .forEach(
            function (radio) {

                radio.addEventListener(
                    'change',
                    function () {

                        const value =
                            this.value;


                        if (ratingText) {

                            ratingText.textContent =
                                ratingLabels[value]
                                ||
                                'Please select a rating';

                        }


                        ratingFeedback?.style
                            ?.setProperty(
                                'display',
                                'none',
                                'important'
                            );

                    }
                );

            }
        );


    /*
    |--------------------------------------------------------------------------
    | Comment Counter
    |--------------------------------------------------------------------------
    */

    comment?.addEventListener(
        'input',
        function () {

            if (commentCounter) {

                commentCounter.textContent =
                    this.value.length
                    +
                    ' / 1000';

            }

        }
    );


    /*
    |--------------------------------------------------------------------------
    | Submit Feedback
    |--------------------------------------------------------------------------
    */

    form?.addEventListener(
        'submit',
        function (event) {

            event.preventDefault();


            feedbackError?.classList.add(
                'd-none'
            );


            const selectedRating =
                document.querySelector(
                    'input[name="rating"]:checked'
                );


            /*
            |--------------------------------------------------------------------------
            | Rating Validation
            |--------------------------------------------------------------------------
            */

            if (!selectedRating) {

                ratingFeedback?.style
                    ?.setProperty(
                        'display',
                        'block',
                        'important'
                    );


                if (feedbackErrorMessage) {

                    feedbackErrorMessage.textContent =
                        'Please select an overall rating.';

                }


                feedbackError?.classList.remove(
                    'd-none'
                );


                document
                    .querySelector(
                        '.rating-star'
                    )
                    ?.scrollIntoView({

                        behavior: 'smooth',

                        block: 'center'

                    });


                return;

            }


            /*
            |--------------------------------------------------------------------------
            | Consent Validation
            |--------------------------------------------------------------------------
            */

            if (!form.checkValidity()) {

                form.classList.add(
                    'was-validated'
                );


                if (feedbackErrorMessage) {

                    feedbackErrorMessage.textContent =
                        'Please complete the required fields.';

                }


                feedbackError?.classList.remove(
                    'd-none'
                );


                return;

            }


            form.classList.add(
                'was-validated'
            );


            const originalHTML =
                submitButton?.innerHTML;


            if (submitButton) {

                submitButton.disabled =
                    true;


                submitButton.innerHTML =
                    '<span class="spinner-border spinner-border-sm me-2"></span>' +
                    'Submitting...';

            }


            /*
            |--------------------------------------------------------------------------
            | Backend feedback submission will be connected later.
            |--------------------------------------------------------------------------
            */

            setTimeout(
                function () {

                    if (submitButton) {

                        submitButton.disabled =
                            false;


                        submitButton.innerHTML =
                            originalHTML;

                    }


                    formWrapper?.classList.add(
                        'd-none'
                    );


                    successState?.classList.remove(
                        'd-none'
                    );


                    window.scrollTo({

                        top:
                            successState
                                ?.getBoundingClientRect()
                                .top
                            +
                            window.scrollY
                            -
                            120,

                        behavior: 'smooth'

                    });

                },
                900
            );

        }
    );


    /*
    |--------------------------------------------------------------------------
    | Reset
    |--------------------------------------------------------------------------
    */

    document
        .getElementById(
            'resetFeedback'
        )
        ?.addEventListener(
            'click',
            function () {

                setTimeout(
                    function () {

                        form?.classList.remove(
                            'was-validated'
                        );


                        feedbackError?.classList.add(
                            'd-none'
                        );


                        ratingText.textContent =
                            'Please select a rating';


                        ratingFeedback?.style
                            ?.setProperty(
                                'display',
                                'none',
                                'important'
                            );


                        if (commentCounter) {

                            commentCounter.textContent =
                                '0 / 1000';

                        }

                    },
                    0
                );

            }
        );

});
</script>

@endpush


{{-- ============================================================
     MINIMAL PAGE-SPECIFIC STYLE
============================================================ --}}

@push('styles')

<style>
    .rating-star {
        cursor: pointer;
        color: #c8c1b5;
        transition: color .2s ease, transform .2s ease;
    }

    .rating-star i {
        font-size: 2rem;
    }

    .rating-star small {
        font-size: .75rem;
        color: #6c757d;
    }

    .rating-star:hover {
        color: #d19a2a;
        transform: translateY(-2px);
    }

    .btn-check:checked + .rating-star {
        color: #d19a2a;
    }

    .btn-check:checked + .rating-star small {
        color: #8a5a00;
        font-weight: 600;
    }

    @media (max-width: 575.98px) {

        .rating-star i {
            font-size: 1.65rem;
        }

    }
</style>

@endpush

@endsection