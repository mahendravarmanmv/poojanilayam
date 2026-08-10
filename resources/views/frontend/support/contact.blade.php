@extends('layouts.app')

@section('title', 'Contact Us | Pooja Nilayam')

@section(
    'meta_description',
    'Contact Pooja Nilayam for general enquiries, pooja services, temple services, digital pooja, astrology and other assistance.'
)

@section('content')

@php

    /*
    |--------------------------------------------------------------------------
    | TEMPORARY CONTACT DATA
    |--------------------------------------------------------------------------
    | These values will later come from the Website / Company Settings
    | configuration in the Admin Panel.
    |--------------------------------------------------------------------------
    */

    $contactInfo = [

        'phone' => '+91 90000 00000',

        'email' => 'support@poojanilayam.com',

        'hours' => 'Monday - Saturday, 9:00 AM - 7:00 PM',

        'address' =>
            'Pooja Nilayam, Hyderabad, Telangana, India'

    ];


    $contactReasons = [

        'Pooja Booking',

        'Digital Pooja',

        'Temple Services',

        'Priest Services',

        'Astrology Services',

        'Online Store',

        'Donation',

        'General Enquiry'

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
                    Contact Us
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
                    We're Here to Help
                </span>


                <h1
                    class="font-serif
                           display-4
                           text-pn-brown
                           mt-2
                           mb-3"
                >
                    Contact Us
                </h1>


                <p
                    class="lead
                           text-secondary
                           mb-0"
                >

                    Have a question about our poojas, temples,
                    priests, digital services or online store?
                    We'd be happy to help.

                </p>

            </div>

        </div>

    </div>

</section>


{{-- ============================================================
     CONTACT INFORMATION
============================================================ --}}

<section class="py-5">

    <div class="container">

        <div
            class="row
                   row-cols-1
                   row-cols-sm-2
                   row-cols-lg-4
                   g-3
                   g-lg-4"
        >

            {{-- Phone --}}

            <div class="col">

                <div
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

                        <div
                            class="rounded-circle
                                   bg-pn-cream
                                   text-pn-primary
                                   d-flex
                                   align-items-center
                                   justify-content-center
                                   mx-auto
                                   mb-3"
                            style="width:58px;height:58px;"
                        >

                            <i
                                class="bi bi-telephone fs-5"
                            ></i>

                        </div>


                        <h2
                            class="font-serif
                                   h5
                                   text-pn-brown"
                        >
                            Call Us
                        </h2>


                        <p
                            class="small
                                   text-secondary
                                   mb-2"
                        >
                            Speak with our support team.
                        </p>


                        <a
                            href="tel:{{ preg_replace(
                                '/[^0-9+]/',
                                '',
                                $contactInfo['phone']
                            ) }}"
                            class="text-pn-primary
                                   fw-semibold
                                   text-decoration-none"
                        >

                            {{ $contactInfo['phone'] }}

                        </a>

                    </div>

                </div>

            </div>


            {{-- Email --}}

            <div class="col">

                <div
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

                        <div
                            class="rounded-circle
                                   bg-pn-cream
                                   text-pn-primary
                                   d-flex
                                   align-items-center
                                   justify-content-center
                                   mx-auto
                                   mb-3"
                            style="width:58px;height:58px;"
                        >

                            <i
                                class="bi bi-envelope fs-5"
                            ></i>

                        </div>


                        <h2
                            class="font-serif
                                   h5
                                   text-pn-brown"
                        >
                            Email Us
                        </h2>


                        <p
                            class="small
                                   text-secondary
                                   mb-2"
                        >
                            Send us your enquiry.
                        </p>


                        <a
                            href="mailto:{{ $contactInfo['email'] }}"
                            class="text-pn-primary
                                   fw-semibold
                                   text-decoration-none
                                   text-break"
                        >

                            {{ $contactInfo['email'] }}

                        </a>

                    </div>

                </div>

            </div>


            {{-- Hours --}}

            <div class="col">

                <div
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

                        <div
                            class="rounded-circle
                                   bg-pn-cream
                                   text-pn-primary
                                   d-flex
                                   align-items-center
                                   justify-content-center
                                   mx-auto
                                   mb-3"
                            style="width:58px;height:58px;"
                        >

                            <i
                                class="bi bi-clock fs-5"
                            ></i>

                        </div>


                        <h2
                            class="font-serif
                                   h5
                                   text-pn-brown"
                        >
                            Support Hours
                        </h2>


                        <p
                            class="small
                                   text-secondary
                                   mb-0"
                        >

                            {{ $contactInfo['hours'] }}

                        </p>

                    </div>

                </div>

            </div>


            {{-- Location --}}

            <div class="col">

                <div
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

                        <div
                            class="rounded-circle
                                   bg-pn-cream
                                   text-pn-primary
                                   d-flex
                                   align-items-center
                                   justify-content-center
                                   mx-auto
                                   mb-3"
                            style="width:58px;height:58px;"
                        >

                            <i
                                class="bi bi-geo-alt fs-5"
                            ></i>

                        </div>


                        <h2
                            class="font-serif
                                   h5
                                   text-pn-brown"
                        >
                            Our Location
                        </h2>


                        <p
                            class="small
                                   text-secondary
                                   mb-0"
                        >

                            {{ $contactInfo['address'] }}

                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- ============================================================
     CONTACT FORM + SUPPORT INFORMATION
============================================================ --}}

<section
    class="bg-pn-beige
           py-5"
>

    <div class="container">

        <div class="row g-4 g-xl-5">


            {{-- ==================================================
                 CONTACT FORM
            =================================================== --}}

            <div class="col-12 col-lg-7">

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
                                Send an Enquiry
                            </span>


                            <h2
                                class="font-serif
                                       h2
                                       text-pn-brown
                                       mt-1
                                       mb-2"
                            >
                                How Can We Help?
                            </h2>


                            <p
                                class="small
                                       text-secondary
                                       mb-0"
                            >

                                Fill in the form below and our team
                                will get back to you.

                            </p>

                        </div>


                        {{-- Success Message --}}

                        <div
                            id="contactSuccess"
                            class="alert
                                   alert-success
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
                                    class="bi bi-check-circle-fill
                                           mt-1"
                                ></i>


                                <div>

                                    <strong>
                                        Thank you for contacting us.
                                    </strong>

                                    <div class="small mt-1">

                                        Your enquiry has been submitted
                                        successfully. Our team will
                                        contact you shortly.

                                    </div>

                                </div>

                            </div>

                        </div>


                        {{-- Error Message --}}

                        <div
                            id="contactError"
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
                                    id="contactErrorMessage"
                                >
                                    Please review the required fields.
                                </div>

                            </div>

                        </div>


                        <form
                            id="contactForm"
                            method="POST"
                            action="#"
                            novalidate
                        >

                            @csrf


                            <div
                                class="row
                                       g-3"
                            >

                                {{-- First Name --}}

                                <div class="col-12 col-md-6">

                                    <label
                                        for="firstName"
                                        class="form-label
                                               fw-semibold
                                               text-pn-brown"
                                    >

                                        First Name

                                        <span
                                            class="text-danger"
                                        >
                                            *
                                        </span>

                                    </label>


                                    <input
                                        type="text"
                                        id="firstName"
                                        name="first_name"
                                        class="form-control
                                               form-control-lg"
                                        placeholder="Enter first name"
                                        autocomplete="given-name"
                                        required
                                    >


                                    <div
                                        class="invalid-feedback"
                                    >
                                        Please enter your first name.
                                    </div>

                                </div>


                                {{-- Last Name --}}

                                <div class="col-12 col-md-6">

                                    <label
                                        for="lastName"
                                        class="form-label
                                               fw-semibold
                                               text-pn-brown"
                                    >

                                        Last Name

                                        <span
                                            class="text-danger"
                                        >
                                            *
                                        </span>

                                    </label>


                                    <input
                                        type="text"
                                        id="lastName"
                                        name="last_name"
                                        class="form-control
                                               form-control-lg"
                                        placeholder="Enter last name"
                                        autocomplete="family-name"
                                        required
                                    >


                                    <div
                                        class="invalid-feedback"
                                    >
                                        Please enter your last name.
                                    </div>

                                </div>


                                {{-- Email --}}

                                <div class="col-12 col-md-6">

                                    <label
                                        for="contactEmail"
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
                                        id="contactEmail"
                                        name="email"
                                        class="form-control
                                               form-control-lg"
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


                                {{-- Mobile --}}

                                <div class="col-12 col-md-6">

                                    <label
                                        for="contactMobile"
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
                                        id="contactMobile"
                                        name="mobile"
                                        class="form-control
                                               form-control-lg"
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


                                {{-- Reason --}}

                                <div class="col-12">

                                    <label
                                        for="contactReason"
                                        class="form-label
                                               fw-semibold
                                               text-pn-brown"
                                    >

                                        How Can We Help?

                                        <span
                                            class="text-danger"
                                        >
                                            *
                                        </span>

                                    </label>


                                    <select
                                        id="contactReason"
                                        name="reason"
                                        class="form-select
                                               form-select-lg"
                                        required
                                    >

                                        <option
                                            value=""
                                            selected
                                            disabled
                                        >
                                            Select an enquiry type
                                        </option>


                                        @foreach(
                                            $contactReasons as $reason
                                        )

                                            <option
                                                value="{{ strtolower(
                                                    str_replace(
                                                        ' ',
                                                        '_',
                                                        $reason
                                                    )
                                                ) }}"
                                            >

                                                {{ $reason }}

                                            </option>

                                        @endforeach

                                    </select>


                                    <div
                                        class="invalid-feedback"
                                    >
                                        Please select an enquiry type.
                                    </div>

                                </div>


                                {{-- Subject --}}

                                <div class="col-12">

                                    <label
                                        for="contactSubject"
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
                                        id="contactSubject"
                                        name="subject"
                                        class="form-control
                                               form-control-lg"
                                        placeholder="Enter subject"
                                        required
                                    >


                                    <div
                                        class="invalid-feedback"
                                    >
                                        Please enter a subject.
                                    </div>

                                </div>


                                {{-- Message --}}

                                <div class="col-12">

                                    <label
                                        for="contactMessage"
                                        class="form-label
                                               fw-semibold
                                               text-pn-brown"
                                    >

                                        Message

                                        <span
                                            class="text-danger"
                                        >
                                            *
                                        </span>

                                    </label>


                                    <textarea
                                        id="contactMessage"
                                        name="message"
                                        class="form-control"
                                        rows="6"
                                        maxlength="1000"
                                        placeholder="Tell us how we can help..."
                                        required
                                    ></textarea>


                                    <div
                                        class="d-flex
                                               align-items-center
                                               justify-content-between
                                               mt-2"
                                    >

                                        <div
                                            class="invalid-feedback"
                                        >
                                            Please enter your message.
                                        </div>


                                        <small
                                            class="text-secondary
                                                   ms-auto"
                                            id="messageCounter"
                                        >
                                            0 / 1000
                                        </small>

                                    </div>

                                </div>


                                {{-- Consent --}}

                                <div class="col-12">

                                    <div
                                        class="form-check"
                                    >

                                        <input
                                            type="checkbox"
                                            id="contactConsent"
                                            name="consent"
                                            class="form-check-input"
                                            required
                                        >


                                        <label
                                            for="contactConsent"
                                            class="form-check-label
                                                   small
                                                   text-secondary"
                                        >

                                            I agree to be contacted
                                            regarding my enquiry.

                                            <span
                                                class="text-danger"
                                            >
                                                *
                                            </span>

                                        </label>


                                        <div
                                            class="invalid-feedback"
                                        >
                                            Please confirm that we may
                                            contact you.
                                        </div>

                                    </div>

                                </div>


                                {{-- Submit --}}

                                <div class="col-12">

                                    <button
                                        type="submit"
                                        id="contactSubmit"
                                        class="btn
                                               btn-pn
                                               btn-lg
                                               px-4"
                                    >

                                        <i
                                            class="bi bi-send me-2"
                                        ></i>

                                        Send Enquiry

                                    </button>

                                </div>

                            </div>

                        </form>

                    </div>

                </div>

            </div>


            {{-- ==================================================
                 SUPPORT INFORMATION
            =================================================== --}}

            <div class="col-12 col-lg-5">

                <div
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

                        <span
                            class="small
                                   text-pn-gold
                                   fw-semibold
                                   text-uppercase"
                        >
                            Need Assistance?
                        </span>


                        <h2
                            class="font-serif
                                   display-6
                                   text-pn-brown
                                   mt-2
                                   mb-3"
                        >
                            We're Here for You
                        </h2>


                        <p
                            class="text-secondary
                                   mb-4"
                        >

                            Whether you need help choosing a pooja,
                            understanding a service or resolving an
                            order-related question, our support team
                            is here to assist.

                        </p>


                        {{-- Phone --}}

                        <div
                            class="d-flex
                                   align-items-start
                                   gap-3
                                   border-bottom
                                   border-warning-subtle
                                   pb-4
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
                                    class="bi bi-telephone"
                                ></i>

                            </div>


                            <div>

                                <strong
                                    class="d-block
                                           text-pn-brown
                                           mb-1"
                                >
                                    Call Us
                                </strong>


                                <small
                                    class="text-secondary
                                           d-block
                                           mb-1"
                                >
                                    Our team is available during
                                    support hours.
                                </small>


                                <a
                                    href="tel:{{ preg_replace(
                                        '/[^0-9+]/',
                                        '',
                                        $contactInfo['phone']
                                    ) }}"
                                    class="text-pn-primary
                                           fw-semibold
                                           text-decoration-none"
                                >

                                    {{ $contactInfo['phone'] }}

                                </a>

                            </div>

                        </div>


                        {{-- Email --}}

                        <div
                            class="d-flex
                                   align-items-start
                                   gap-3
                                   border-bottom
                                   border-warning-subtle
                                   pb-4
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
                                    class="bi bi-envelope"
                                ></i>

                            </div>


                            <div>

                                <strong
                                    class="d-block
                                           text-pn-brown
                                           mb-1"
                                >
                                    Email Support
                                </strong>


                                <small
                                    class="text-secondary
                                           d-block
                                           mb-1"
                                >
                                    Send detailed enquiries by email.
                                </small>


                                <a
                                    href="mailto:{{ $contactInfo['email'] }}"
                                    class="text-pn-primary
                                           fw-semibold
                                           text-decoration-none
                                           text-break"
                                >

                                    {{ $contactInfo['email'] }}

                                </a>

                            </div>

                        </div>


                        {{-- Hours --}}

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
                                    class="bi bi-clock"
                                ></i>

                            </div>


                            <div>

                                <strong
                                    class="d-block
                                           text-pn-brown
                                           mb-1"
                                >
                                    Support Hours
                                </strong>


                                <small
                                    class="text-secondary"
                                >

                                    {{ $contactInfo['hours'] }}

                                </small>

                            </div>

                        </div>


                        {{-- Support Ticket CTA --}}

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
                                    class="bi bi-ticket-perforated
                                           text-pn-primary
                                           fs-4"
                                ></i>


                                <div>

                                    <strong
                                        class="d-block
                                               text-pn-brown
                                               mb-1"
                                    >
                                        Already have a support issue?
                                    </strong>


                                    <p
                                        class="small
                                               text-secondary
                                               mb-3"
                                    >

                                        For issues requiring tracking
                                        and follow-up, raise a support
                                        ticket.

                                    </p>


                                    <a
                                        href="#"
                                        class="btn
                                               btn-sm
                                               btn-pn-outline"
                                    >

                                        Raise a Ticket

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

    </div>

</section>


{{-- ============================================================
     MAP / LOCATION SECTION
============================================================ --}}

<section class="py-5">

    <div class="container">

        <div
            class="row
                   g-4
                   align-items-stretch"
        >

            <div class="col-12 col-lg-7">

                <div
                    class="card
                           border
                           border-warning-subtle
                           rounded-5
                           overflow-hidden
                           h-100"
                >

                    <div
                        class="bg-pn-cream
                               d-flex
                               align-items-center
                               justify-content-center"
                        style="min-height:360px;"
                    >

                        <div
                            class="text-center
                                   p-4"
                        >

                            <div
                                class="rounded-circle
                                       bg-white
                                       text-pn-primary
                                       d-flex
                                       align-items-center
                                       justify-content-center
                                       mx-auto
                                       mb-3
                                       shadow-sm"
                                style="width:72px;height:72px;"
                            >

                                <i
                                    class="bi bi-geo-alt-fill fs-3"
                                ></i>

                            </div>


                            <h2
                                class="font-serif
                                       h4
                                       text-pn-brown"
                            >
                                Pooja Nilayam
                            </h2>


                            <p
                                class="small
                                       text-secondary
                                       mb-3"
                            >

                                {{ $contactInfo['address'] }}

                            </p>


                            <a
                                href="#"
                                class="btn
                                       btn-sm
                                       btn-pn-outline"
                            >

                                Get Directions

                                <i
                                    class="bi bi-arrow-up-right ms-1"
                                ></i>

                            </a>

                        </div>

                    </div>

                </div>

            </div>


            <div class="col-12 col-lg-5">

                <div
                    class="card
                           border
                           border-warning-subtle
                           rounded-5
                           h-100"
                >

                    <div class="card-body p-4 p-md-5">

                        <span
                            class="small
                                   text-pn-gold
                                   fw-semibold
                                   text-uppercase"
                        >
                            Before You Contact Us
                        </span>


                        <h2
                            class="font-serif
                                   h3
                                   text-pn-brown
                                   mt-2
                                   mb-4"
                        >
                            Helpful Information
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

                                <i
                                    class="bi bi-check-circle-fill
                                           text-success
                                           mt-1"
                                ></i>


                                <div>

                                    <strong
                                        class="d-block
                                               small
                                               text-pn-brown
                                               mb-1"
                                    >
                                        Booking Questions
                                    </strong>


                                    <small
                                        class="text-secondary"
                                    >

                                        Keep your booking reference
                                        available when contacting
                                        support.

                                    </small>

                                </div>

                            </div>


                            <div
                                class="d-flex
                                       align-items-start
                                       gap-3"
                            >

                                <i
                                    class="bi bi-check-circle-fill
                                           text-success
                                           mt-1"
                                ></i>


                                <div>

                                    <strong
                                        class="d-block
                                               small
                                               text-pn-brown
                                               mb-1"
                                    >
                                        Order Questions
                                    </strong>


                                    <small
                                        class="text-secondary"
                                    >

                                        Include your order number for
                                        faster assistance.

                                    </small>

                                </div>

                            </div>


                            <div
                                class="d-flex
                                       align-items-start
                                       gap-3"
                            >

                                <i
                                    class="bi bi-check-circle-fill
                                           text-success
                                           mt-1"
                                ></i>


                                <div>

                                    <strong
                                        class="d-block
                                               small
                                               text-pn-brown
                                               mb-1"
                                    >
                                        General Enquiries
                                    </strong>


                                    <small
                                        class="text-secondary"
                                    >

                                        Choose the closest enquiry
                                        category so your request can
                                        reach the right team.

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
     FAQ / HELP CTA
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
                            Need a Quick Answer?
                        </span>


                        <h2
                            class="font-serif
                                   display-6
                                   mt-2
                                   mb-2"
                        >
                            Visit our Help Center.
                        </h2>


                        <p
                            class="text-white-50
                                   mb-0"
                        >

                            Find answers to common questions before
                            contacting our support team.

                        </p>

                    </div>


                    <div
                        class="col-12 col-lg-4
                               text-lg-end"
                    >

                        <a
                            href="#"
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
            'contactForm'
        );


    const successAlert =
        document.getElementById(
            'contactSuccess'
        );


    const errorAlert =
        document.getElementById(
            'contactError'
        );


    const errorMessage =
        document.getElementById(
            'contactErrorMessage'
        );


    const messageInput =
        document.getElementById(
            'contactMessage'
        );


    const messageCounter =
        document.getElementById(
            'messageCounter'
        );


    const submitButton =
        document.getElementById(
            'contactSubmit'
        );


    /*
    |--------------------------------------------------------------------------
    | Message Counter
    |--------------------------------------------------------------------------
    */

    messageInput?.addEventListener(
        'input',
        function () {

            if (messageCounter) {

                messageCounter.textContent =
                    this.value.length
                    +
                    ' / 1000';

            }

        }
    );


    /*
    |--------------------------------------------------------------------------
    | Form Submit
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


            /*
            |--------------------------------------------------------------------------
            | Bootstrap Validation
            |--------------------------------------------------------------------------
            */

            if (!form.checkValidity()) {

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
                    'Sending...';

            }


            /*
            |--------------------------------------------------------------------------
            | Backend contact enquiry submission will be connected later.
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


                    form.reset();


                    form.classList.remove(
                        'was-validated'
                    );


                    if (messageCounter) {

                        messageCounter.textContent =
                            '0 / 1000';

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
                800
            );

        }
    );

});
</script>

@endpush

@endsection