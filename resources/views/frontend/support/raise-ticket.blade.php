@extends('layouts.app')

@section('title', 'Raise a Support Ticket | Pooja Nilayam')

@section(
    'meta_description',
    'Raise a support ticket for your Pooja Nilayam booking, order, digital pooja or other service.'
)

@section('content')

@php

    /*
    |--------------------------------------------------------------------------
    | TEMPORARY SUPPORT DATA
    |--------------------------------------------------------------------------
    | These values will later come from the logged-in customer,
    | bookings, orders and support configuration.
    |--------------------------------------------------------------------------
    */

    $issueTypes = [
        'Booking Issue',
        'Digital Pooja Issue',
        'Temple Service Issue',
        'Priest Service Issue',
        'Payment Issue',
        'Order / Delivery Issue',
        'Refund Issue',
        'Other'
    ];


    $priorities = [
        'low' => 'Low',
        'normal' => 'Normal',
        'high' => 'High'
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
                        Support
                    </a>

                </li>


                <li
                    class="breadcrumb-item active"
                    aria-current="page"
                >
                    Raise Ticket
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
                    Customer Support
                </span>


                <h1
                    class="font-serif
                           display-4
                           text-pn-brown
                           mt-2
                           mb-3"
                >
                    Raise a Support Ticket
                </h1>


                <p
                    class="lead
                           text-secondary
                           mb-0"
                >

                    Tell us about the issue you're facing and our
                    support team will review your request.

                </p>

            </div>

        </div>

    </div>

</section>


{{-- ============================================================
     MAIN CONTENT
============================================================ --}}

<section class="py-5">

    <div class="container">

        <div class="row g-4 g-xl-5">


            {{-- ==================================================
                 TICKET FORM
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

                        <div class="mb-4">

                            <span
                                class="small
                                       text-pn-gold
                                       fw-semibold
                                       text-uppercase"
                            >
                                Support Request
                            </span>


                            <h2
                                class="font-serif
                                       h2
                                       text-pn-brown
                                       mt-1
                                       mb-2"
                            >
                                Tell Us What Happened
                            </h2>


                            <p
                                class="small
                                       text-secondary
                                       mb-0"
                            >

                                Please provide the relevant booking
                                or reference information so we can
                                identify your service quickly.

                            </p>

                        </div>


                        {{-- Success --}}

                        <div
                            id="ticketSuccess"
                            class="alert
                                   alert-success
                                   rounded-4
                                   d-none"
                            role="alert"
                        >

                            <div
                                class="d-flex
                                       align-items-start
                                       gap-3"
                            >

                                <i
                                    class="bi bi-check-circle-fill
                                           fs-5
                                           mt-1"
                                ></i>


                                <div>

                                    <strong
                                        class="d-block"
                                    >
                                        Ticket Submitted Successfully
                                    </strong>


                                    <small
                                        class="d-block
                                               mt-1"
                                    >

                                        Your support request has been
                                        created.

                                    </small>


                                    <div
                                        class="mt-2"
                                    >

                                        <span
                                            class="small
                                                   text-secondary"
                                        >
                                            Ticket ID:
                                        </span>


                                        <strong
                                            id="generatedTicketId"
                                            class="text-pn-primary"
                                        >
                                            PN-TKT-000001
                                        </strong>

                                    </div>

                                </div>

                            </div>

                        </div>


                        {{-- Error --}}

                        <div
                            id="ticketError"
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


                                <div
                                    id="ticketErrorMessage"
                                >
                                    Please review the required fields.
                                </div>

                            </div>

                        </div>


                        <form
                            id="raiseTicketForm"
                            method="POST"
                            action="#"
                            enctype="multipart/form-data"
                            novalidate
                        >

                            @csrf


                            {{-- ==================================================
                                 BOOKING / REFERENCE ID
                            =================================================== --}}

                            <div class="mb-4">

                                <label
                                    for="referenceId"
                                    class="form-label
                                           fw-semibold
                                           text-pn-brown"
                                >

                                    Booking ID / Reference ID

                                    <span
                                        class="text-danger"
                                    >
                                        *
                                    </span>

                                </label>


                                <div
                                    class="input-group
                                           input-group-lg"
                                >

                                    <span
                                        class="input-group-text
                                               bg-white"
                                    >

                                        <i
                                            class="bi bi-receipt
                                                   text-pn-primary"
                                        ></i>

                                    </span>


                                    <input
                                        type="text"
                                        id="referenceId"
                                        name="reference_id"
                                        class="form-control"
                                        placeholder="Enter Booking ID or Reference ID"
                                        autocomplete="off"
                                        required
                                    >

                                </div>


                                <div
                                    class="form-text"
                                >

                                    Enter the Booking ID or Reference
                                    ID related to your issue.

                                </div>


                                <div
                                    class="invalid-feedback"
                                >
                                    Please enter your Booking ID or
                                    Reference ID.
                                </div>

                            </div>


                            {{-- ==================================================
                                 ISSUE TYPE
                            =================================================== --}}

                            <div class="mb-4">

                                <label
                                    for="issueType"
                                    class="form-label
                                           fw-semibold
                                           text-pn-brown"
                                >

                                    Issue Type

                                    <span
                                        class="text-danger"
                                    >
                                        *
                                    </span>

                                </label>


                                <select
                                    id="issueType"
                                    name="issue_type"
                                    class="form-select
                                           form-select-lg"
                                    required
                                >

                                    <option
                                        value=""
                                        selected
                                        disabled
                                    >
                                        Select your issue type
                                    </option>


                                    @foreach(
                                        $issueTypes as $issueType
                                    )

                                        <option
                                            value="{{ strtolower(
                                                str_replace(
                                                    ' ',
                                                    '_',
                                                    $issueType
                                                )
                                            ) }}"
                                        >

                                            {{ $issueType }}

                                        </option>

                                    @endforeach

                                </select>


                                <div
                                    class="invalid-feedback"
                                >
                                    Please select an issue type.
                                </div>

                            </div>


                            {{-- ==================================================
                                 SUBJECT
                            =================================================== --}}

                            <div class="mb-4">

                                <label
                                    for="ticketSubject"
                                    class="form-label
                                           fw-semibold
                                           text-pn-brown"
                                >

                                    Subject

                                    <span
                                        class="text-danger"
                                    >
                                        *
                                    </span>

                                </label>


                                <input
                                    type="text"
                                    id="ticketSubject"
                                    name="subject"
                                    class="form-control
                                           form-control-lg"
                                    placeholder="Briefly describe your issue"
                                    maxlength="150"
                                    required
                                >


                                <div
                                    class="invalid-feedback"
                                >
                                    Please enter a subject.
                                </div>

                            </div>


                            {{-- ==================================================
                                 DESCRIPTION
                            =================================================== --}}

                            <div class="mb-4">

                                <label
                                    for="ticketDescription"
                                    class="form-label
                                           fw-semibold
                                           text-pn-brown"
                                >

                                    Describe Your Issue

                                    <span
                                        class="text-danger"
                                    >
                                        *
                                    </span>

                                </label>


                                <textarea
                                    id="ticketDescription"
                                    name="description"
                                    class="form-control"
                                    rows="7"
                                    maxlength="2000"
                                    placeholder="Please provide details about the issue..."
                                    required
                                ></textarea>


                                <div
                                    class="d-flex
                                           justify-content-between
                                           gap-3
                                           mt-2"
                                >

                                    <div
                                        class="invalid-feedback"
                                    >
                                        Please describe your issue.
                                    </div>


                                    <small
                                        id="descriptionCounter"
                                        class="text-secondary
                                               ms-auto"
                                    >
                                        0 / 2000
                                    </small>

                                </div>

                            </div>


                            {{-- ==================================================
                                 PRIORITY
                            =================================================== --}}

                            <div class="mb-4">

                                <label
                                    class="form-label
                                           fw-semibold
                                           text-pn-brown"
                                >
                                    Priority
                                </label>


                                <div
                                    class="row
                                           g-2"
                                >

                                    @foreach(
                                        $priorities as $value => $label
                                    )

                                        <div class="col-12 col-sm-4">

                                            <input
                                                type="radio"
                                                class="btn-check"
                                                name="priority"
                                                id="priority{{ ucfirst($value) }}"
                                                value="{{ $value }}"
                                                {{ $value === 'normal'
                                                    ? 'checked'
                                                    : ''
                                                }}
                                            >


                                            <label
                                                class="btn
                                                       btn-outline-secondary
                                                       w-100
                                                       py-2"
                                                for="priority{{ ucfirst($value) }}"
                                            >

                                                @if(
                                                    $value === 'low'
                                                )

                                                    <i
                                                        class="bi bi-arrow-down-circle me-1"
                                                    ></i>

                                                @elseif(
                                                    $value === 'normal'
                                                )

                                                    <i
                                                        class="bi bi-dash-circle me-1"
                                                    ></i>

                                                @else

                                                    <i
                                                        class="bi bi-arrow-up-circle me-1"
                                                    ></i>

                                                @endif

                                                {{ $label }}

                                            </label>

                                        </div>

                                    @endforeach

                                </div>

                            </div>


                            {{-- ==================================================
                                 ATTACHMENT
                            =================================================== --}}

                            <div class="mb-4">

                                <label
                                    for="ticketAttachment"
                                    class="form-label
                                           fw-semibold
                                           text-pn-brown"
                                >

                                    Attachment

                                    <span
                                        class="text-secondary
                                               fw-normal"
                                    >
                                        (Optional)
                                    </span>

                                </label>


                                <input
                                    type="file"
                                    id="ticketAttachment"
                                    name="attachment"
                                    class="form-control
                                           form-control-lg"
                                    accept=".jpg,.jpeg,.png,.pdf"
                                >


                                <div
                                    class="form-text"
                                >

                                    You can attach a screenshot,
                                    receipt or relevant document.
                                    JPG, PNG and PDF files are
                                    supported.

                                </div>


                                <div
                                    id="attachmentFeedback"
                                    class="small
                                           mt-2"
                                ></div>

                            </div>


                            {{-- ==================================================
                                 CONTACT DETAILS
                            =================================================== --}}

                            <div
                                class="border-top
                                       border-warning-subtle
                                       pt-4
                                       mb-4"
                            >

                                <h3
                                    class="font-serif
                                           h4
                                           text-pn-brown
                                           mb-3"
                                >
                                    Contact Information
                                </h3>


                                <div
                                    class="row
                                           g-3"
                                >

                                    <div
                                        class="col-12 col-md-6"
                                    >

                                        <label
                                            for="ticketEmail"
                                            class="form-label
                                                   fw-semibold
                                                   text-pn-brown"
                                        >

                                            Email Address

                                            <span
                                                class="text-danger"
                                            >
                                                *
                                            </span>

                                        </label>


                                        <input
                                            type="email"
                                            id="ticketEmail"
                                            name="email"
                                            class="form-control"
                                            placeholder="you@example.com"
                                            autocomplete="email"
                                            required
                                        >


                                        <div
                                            class="invalid-feedback"
                                        >
                                            Please enter a valid email
                                            address.
                                        </div>

                                    </div>


                                    <div
                                        class="col-12 col-md-6"
                                    >

                                        <label
                                            for="ticketMobile"
                                            class="form-label
                                                   fw-semibold
                                                   text-pn-brown"
                                        >

                                            Mobile Number

                                            <span
                                                class="text-danger"
                                            >
                                                *
                                            </span>

                                        </label>


                                        <input
                                            type="tel"
                                            id="ticketMobile"
                                            name="mobile"
                                            class="form-control"
                                            placeholder="Enter mobile number"
                                            autocomplete="tel"
                                            inputmode="tel"
                                            required
                                        >


                                        <div
                                            class="invalid-feedback"
                                        >
                                            Please enter your mobile
                                            number.
                                        </div>

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
                                        id="ticketConsent"
                                        name="consent"
                                        class="form-check-input"
                                        required
                                    >


                                    <label
                                        for="ticketConsent"
                                        class="form-check-label
                                               small
                                               text-secondary"
                                    >

                                        I confirm that the information
                                        provided is accurate and I
                                        agree to be contacted regarding
                                        this support request.

                                        <span
                                            class="text-danger"
                                        >
                                            *
                                        </span>

                                    </label>


                                    <div
                                        class="invalid-feedback"
                                    >
                                        Please confirm before submitting
                                        the ticket.
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
                                    id="submitTicket"
                                    class="btn
                                           btn-pn
                                           btn-lg
                                           px-4"
                                >

                                    <i
                                        class="bi bi-ticket-perforated me-2"
                                    ></i>

                                    Submit Ticket

                                </button>


                                <button
                                    type="reset"
                                    id="resetTicket"
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


            {{-- ==================================================
                 SUPPORT SIDEBAR
            =================================================== --}}

            <div class="col-12 col-lg-4">

                <div
                    class="position-sticky"
                    style="top:100px;"
                >

                    {{-- Ticket Process --}}

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
                                What Happens Next?
                            </span>


                            <h2
                                class="font-serif
                                       h4
                                       text-pn-brown
                                       mt-1
                                       mb-4"
                            >
                                Support Process
                            </h2>


                            <div
                                class="vstack
                                       gap-4"
                            >

                                <div
                                    class="d-flex
                                           align-items-start
                                           gap-3"
                                >

                                    <div
                                        class="rounded-circle
                                               bg-pn-primary
                                               text-white
                                               d-flex
                                               align-items-center
                                               justify-content-center
                                               flex-shrink-0"
                                        style="width:38px;height:38px;"
                                    >
                                        1
                                    </div>


                                    <div>

                                        <strong
                                            class="d-block
                                                   text-pn-brown"
                                        >
                                            Ticket Submitted
                                        </strong>


                                        <small
                                            class="text-secondary"
                                        >
                                            Your support request is
                                            recorded.
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
                                               bg-pn-primary
                                               text-white
                                               d-flex
                                               align-items-center
                                               justify-content-center
                                               flex-shrink-0"
                                        style="width:38px;height:38px;"
                                    >
                                        2
                                    </div>


                                    <div>

                                        <strong
                                            class="d-block
                                                   text-pn-brown"
                                        >
                                            Support Review
                                        </strong>


                                        <small
                                            class="text-secondary"
                                        >
                                            Our support team reviews
                                            the request.
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
                                               bg-pn-primary
                                               text-white
                                               d-flex
                                               align-items-center
                                               justify-content-center
                                               flex-shrink-0"
                                        style="width:38px;height:38px;"
                                    >
                                        3
                                    </div>


                                    <div>

                                        <strong
                                            class="d-block
                                                   text-pn-brown"
                                        >
                                            Investigation
                                        </strong>


                                        <small
                                            class="text-secondary"
                                        >
                                            The appropriate team
                                            investigates the issue.
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
                                               bg-pn-primary
                                               text-white
                                               d-flex
                                               align-items-center
                                               justify-content-center
                                               flex-shrink-0"
                                        style="width:38px;height:38px;"
                                    >
                                        4
                                    </div>


                                    <div>

                                        <strong
                                            class="d-block
                                                   text-pn-brown"
                                        >
                                            Resolution
                                        </strong>


                                        <small
                                            class="text-secondary"
                                        >
                                            A resolution or response
                                            is provided.
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
                                               bg-success
                                               text-white
                                               d-flex
                                               align-items-center
                                               justify-content-center
                                               flex-shrink-0"
                                        style="width:38px;height:38px;"
                                    >
                                        5
                                    </div>


                                    <div>

                                        <strong
                                            class="d-block
                                                   text-pn-brown"
                                        >
                                            Ticket Closed
                                        </strong>


                                        <small
                                            class="text-secondary"
                                        >
                                            The request is closed after
                                            resolution.
                                        </small>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>


                    {{-- Important Information --}}

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

                                <i
                                    class="bi bi-info-circle
                                           text-pn-primary
                                           fs-4"
                                ></i>


                                <h2
                                    class="font-serif
                                           h5
                                           text-pn-brown
                                           mb-0"
                                >
                                    Helpful Tips
                                </h2>

                            </div>


                            <ul
                                class="small
                                       text-secondary
                                       ps-3
                                       mb-0"
                            >

                                <li class="mb-2">

                                    Always provide the correct
                                    Booking ID or Reference ID.

                                </li>


                                <li class="mb-2">

                                    Describe the issue clearly so
                                    our team can investigate faster.

                                </li>


                                <li class="mb-2">

                                    Include relevant screenshots or
                                    documents when useful.

                                </li>


                                <li>

                                    Keep your ticket ID for future
                                    communication.

                                </li>

                            </ul>

                        </div>

                    </div>


                    {{-- Existing Tickets --}}

                    <div
                        class="bg-pn-cream
                               rounded-5
                               p-4"
                    >

                        <div
                            class="d-flex
                                   align-items-start
                                   gap-3"
                        >

                            <i
                                class="bi bi-list-check
                                       text-pn-primary
                                       fs-4"
                            ></i>


                            <div>

                                <strong
                                    class="d-block
                                           text-pn-brown
                                           mb-1"
                                >
                                    Already Raised a Ticket?
                                </strong>


                                <p
                                    class="small
                                           text-secondary
                                           mb-3"
                                >

                                    View your existing tickets and
                                    check their latest status.

                                </p>


                                <a
                                    href="#"
                                    class="btn
                                           btn-sm
                                           btn-pn-outline"
                                >

                                    My Tickets

                                    <i
                                        class="bi bi-arrow-right ms-1"
                                    ></i>

                                </a>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- ============================================================
     HELP CTA
============================================================ --}}

<section
    class="bg-pn-beige
           py-5"
>

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
                            Before Raising a Ticket
                        </span>


                        <h2
                            class="font-serif
                                   display-6
                                   mt-2
                                   mb-2"
                        >
                            Check our Help Center first.
                        </h2>


                        <p
                            class="text-white-50
                                   mb-0"
                        >

                            You may find an immediate answer to your
                            question in our Help Center.

                        </p>

                    </div>


                    <div
                        class="col-12 col-lg-4
                               text-lg-end"
                    >

                        <a
                            href="{{ url('/help-center') }}"
                            class="btn
                                   btn-warning
                                   text-dark
                                   fw-semibold
                                   px-4"
                        >

                            Visit Help Center

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
            'raiseTicketForm'
        );


    const description =
        document.getElementById(
            'ticketDescription'
        );


    const descriptionCounter =
        document.getElementById(
            'descriptionCounter'
        );


    const attachment =
        document.getElementById(
            'ticketAttachment'
        );


    const attachmentFeedback =
        document.getElementById(
            'attachmentFeedback'
        );


    const successAlert =
        document.getElementById(
            'ticketSuccess'
        );


    const errorAlert =
        document.getElementById(
            'ticketError'
        );


    const errorMessage =
        document.getElementById(
            'ticketErrorMessage'
        );


    const submitButton =
        document.getElementById(
            'submitTicket'
        );


    /*
    |--------------------------------------------------------------------------
    | Description Counter
    |--------------------------------------------------------------------------
    */

    description?.addEventListener(
        'input',
        function () {

            if (descriptionCounter) {

                descriptionCounter.textContent =
                    this.value.length
                    +
                    ' / 2000';

            }

        }
    );


    /*
    |--------------------------------------------------------------------------
    | Attachment Validation
    |--------------------------------------------------------------------------
    */

    attachment?.addEventListener(
        'change',
        function () {

            if (!this.files.length) {

                if (attachmentFeedback) {

                    attachmentFeedback.textContent =
                        '';

                }

                return;

            }


            const file =
                this.files[0];


            const allowedTypes = [

                'image/jpeg',
                'image/png',
                'application/pdf'

            ];


            const maxSize =
                5 * 1024 * 1024;


            if (
                !allowedTypes.includes(
                    file.type
                )
            ) {

                this.value = '';


                attachmentFeedback.textContent =
                    'Please upload a JPG, PNG or PDF file.';


                attachmentFeedback.className =
                    'small mt-2 text-danger';


                return;

            }


            if (
                file.size > maxSize
            ) {

                this.value = '';


                attachmentFeedback.textContent =
                    'Attachment size must not exceed 5 MB.';


                attachmentFeedback.className =
                    'small mt-2 text-danger';


                return;

            }


            attachmentFeedback.textContent =
                file.name
                +
                ' selected successfully.';


            attachmentFeedback.className =
                'small mt-2 text-success';

        }
    );


    /*
    |--------------------------------------------------------------------------
    | Submit Ticket
    |--------------------------------------------------------------------------
    */

    form?.addEventListener(
        'submit',
        function (event) {

            event.preventDefault();


            successAlert?.classList.add(
                'd-none'
            );


            errorAlert?.classList.add(
                'd-none'
            );


            if (
                !form.checkValidity()
            ) {

                form.classList.add(
                    'was-validated'
                );


                if (errorMessage) {

                    errorMessage.textContent =
                        'Please complete all required fields correctly.';

                }


                errorAlert?.classList.remove(
                    'd-none'
                );


                return;

            }


            /*
            |--------------------------------------------------------------------------
            | Prevent very short descriptions.
            |--------------------------------------------------------------------------
            */

            if (
                description.value.trim().length < 10
            ) {

                description.classList.add(
                    'is-invalid'
                );


                if (errorMessage) {

                    errorMessage.textContent =
                        'Please provide more details about your issue.';

                }


                errorAlert?.classList.remove(
                    'd-none'
                );


                return;

            }


            description.classList.remove(
                'is-invalid'
            );


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
            | Backend ticket creation will be connected later.
            |--------------------------------------------------------------------------
            */

            setTimeout(
                function () {

                    const ticketId =
                        'PN-TKT-'
                        +
                        String(
                            Math.floor(
                                100000
                                +
                                Math.random()
                                * 900000
                            )
                        );


                    const generatedTicket =
                        document.getElementById(
                            'generatedTicketId'
                        );


                    if (generatedTicket) {

                        generatedTicket.textContent =
                            ticketId;

                    }


                    if (submitButton) {

                        submitButton.disabled =
                            false;


                        submitButton.innerHTML =
                            originalHTML;

                    }


                    form.reset();


                    form.classList.remove(
                        'was-validated'
                    );


                    if (descriptionCounter) {

                        descriptionCounter.textContent =
                            '0 / 2000';

                    }


                    if (attachmentFeedback) {

                        attachmentFeedback.textContent =
                            '';

                    }


                    successAlert?.classList.remove(
                        'd-none'
                    );


                    window.scrollTo({

                        top:
                            successAlert
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
            'resetTicket'
        )
        ?.addEventListener(
            'click',
            function () {

                setTimeout(
                    function () {

                        form?.classList.remove(
                            'was-validated'
                        );


                        successAlert?.classList.add(
                            'd-none'
                        );


                        errorAlert?.classList.add(
                            'd-none'
                        );


                        if (descriptionCounter) {

                            descriptionCounter.textContent =
                                '0 / 2000';

                        }


                        if (attachmentFeedback) {

                            attachmentFeedback.textContent =
                                '';

                        }

                    },
                    0
                );

            }
        );

});
</script>

@endpush

@endsection