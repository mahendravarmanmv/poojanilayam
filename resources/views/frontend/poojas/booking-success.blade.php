@extends('layouts.app')

@section('title', 'Booking Confirmed | Pooja Nilayam')

@section(
    'meta_description',
    'Your Pooja Nilayam booking has been successfully confirmed.'
)

@section('content')

@php

    /*
    |--------------------------------------------------------------------------
    | TEMPORARY UI DATA
    |--------------------------------------------------------------------------
    | Frontend prototype data only.
    | These values will later come from the booking record.
    |--------------------------------------------------------------------------
    */

    $booking = [

        'booking_id' => 'PN202608110001',

        'reference_id' => 'REF-PN-8A72K4',

        'pooja' => 'Ganapathi Homam',

        'category' => 'Homam',

        'date' => '11 August 2026',

        'time' => '07:00 AM',

        'duration' => '60 Minutes',

        'location' => 'Hyderabad',

        'mode' => 'Online',

        'priest' => 'Sri Venkatesh Sharma',

        'amount' => '₹501',

        'status' => 'Confirmed',

        'meet_link' => 'https://meet.google.com/example',

        'devotee' => 'Mahendra Varma',

        'email' => 'devotee@example.com',

        'phone' => '+91 XXXXX XXXXX'

    ];


    /*
    |--------------------------------------------------------------------------
    | Notification Channels
    |--------------------------------------------------------------------------
    */

    $notifications = [

        [
            'icon' => 'bi-envelope-check',
            'title' => 'Email Sent',
            'text' => 'Booking confirmation sent to your registered email.',
            'status' => 'Sent'
        ],

        [
            'icon' => 'bi-chat-text',
            'title' => 'SMS Sent',
            'text' => 'Booking confirmation sent to your registered mobile number.',
            'status' => 'Sent'
        ],

        [
            'icon' => 'bi-whatsapp',
            'title' => 'WhatsApp',
            'text' => 'Confirmation will be sent through WhatsApp where supported.',
            'status' => 'Supported'
        ]

    ];


    /*
    |--------------------------------------------------------------------------
    | Before Pooja Reminders
    |--------------------------------------------------------------------------
    */

    $reminders = [

        [
            'time' => '1 Hour Before',
            'icon' => 'bi-bell',
            'text' => 'You will receive a notification before the pooja.'
        ],

        [
            'time' => '15 Minutes Before',
            'icon' => 'bi-alarm',
            'text' => 'A reminder will be sent shortly before the pooja.'
        ],

        [
            'time' => '5 Minutes Before',
            'icon' => 'bi-clock-history',
            'text' => 'Final reminder before the pooja begins.'
        ]

    ];

@endphp


{{-- ============================================================
     SUCCESS HERO
============================================================ --}}

<section class="bg-pn-cream py-5">

    <div class="container">

        <div
            class="row
                   justify-content-center
                   text-center"
        >

            <div class="col-12 col-md-10 col-lg-8">


                {{-- Success Icon --}}

                <div
                    class="mx-auto
                           rounded-circle
                           d-flex
                           align-items-center
                           justify-content-center
                           bg-white
                           text-success
                           shadow-sm"
                    style="width:92px;height:92px;"
                >

                    <i
                        class="bi bi-check-lg"
                        style="font-size:3rem;"
                    ></i>

                </div>


                <span
                    class="badge
                           rounded-pill
                           bg-success-subtle
                           text-success-emphasis
                           px-3
                           py-2
                           mt-4"
                >

                    Booking Confirmed

                </span>


                <h1
                    class="font-serif
                           display-5
                           text-pn-brown
                           mt-3
                           mb-3"
                >

                    Your Pooja is Confirmed

                </h1>


                <p
                    class="lead
                           text-secondary
                           mb-2"
                >

                    Your {{ $booking['pooja'] }} has been successfully
                    booked.

                </p>


                <p
                    class="small
                           text-secondary
                           mb-0"
                >

                    Thank you for choosing Pooja Nilayam.
                    Your booking details are provided below.

                </p>

            </div>

        </div>

    </div>

</section>


{{-- ============================================================
     BOOKING IDENTIFIERS
============================================================ --}}

<section class="py-4 bg-white border-bottom">

    <div class="container">

        <div
            class="row
                   justify-content-center
                   g-3"
        >

            <div class="col-12 col-sm-6 col-lg-4">

                <div
                    class="border
                           border-warning-subtle
                           rounded-4
                           p-3
                           text-center
                           h-100"
                >

                    <small
                        class="text-secondary
                               d-block
                               mb-1"
                    >
                        Booking ID
                    </small>


                    <div
                        class="d-flex
                               align-items-center
                               justify-content-center
                               gap-2"
                    >

                        <strong
                            class="text-pn-brown"
                        >

                            {{ $booking['booking_id'] }}

                        </strong>


                        <button
                            type="button"
                            class="btn
                                   btn-sm
                                   btn-light
                                   rounded-circle"
                            aria-label="Copy booking ID"
                            title="Copy booking ID"
                        >

                            <i class="bi bi-copy"></i>

                        </button>

                    </div>

                </div>

            </div>


            <div class="col-12 col-sm-6 col-lg-4">

                <div
                    class="border
                           border-warning-subtle
                           rounded-4
                           p-3
                           text-center
                           h-100"
                >

                    <small
                        class="text-secondary
                               d-block
                               mb-1"
                    >
                        Reference ID
                    </small>


                    <div
                        class="d-flex
                               align-items-center
                               justify-content-center
                               gap-2"
                    >

                        <strong
                            class="text-pn-brown"
                        >

                            {{ $booking['reference_id'] }}

                        </strong>


                        <button
                            type="button"
                            class="btn
                                   btn-sm
                                   btn-light
                                   rounded-circle"
                            aria-label="Copy reference ID"
                            title="Copy reference ID"
                        >

                            <i class="bi bi-copy"></i>

                        </button>

                    </div>

                </div>

            </div>


            <div class="col-12 col-sm-6 col-lg-4">

                <div
                    class="border
                           border-warning-subtle
                           rounded-4
                           p-3
                           text-center
                           h-100"
                >

                    <small
                        class="text-secondary
                               d-block
                               mb-1"
                    >
                        Booking Status
                    </small>


                    <span
                        class="badge
                               rounded-pill
                               bg-success-subtle
                               text-success-emphasis
                               px-3
                               py-2"
                    >

                        <i
                            class="bi bi-check-circle me-1"
                        ></i>

                        {{ $booking['status'] }}

                    </span>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- ============================================================
     MAIN CONTENT
============================================================ --}}

<section class="py-5 bg-light-subtle">

    <div class="container">

        <div class="row g-4 align-items-start">


            {{-- =================================================
                 LEFT CONTENT
            ================================================= --}}

            <div class="col-12 col-lg-8">


                {{-- =================================================
                     BOOKING DETAILS
                ================================================= --}}

                <div
                    class="card
                           border
                           border-warning-subtle
                           rounded-4
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
                                       d-flex
                                       align-items-center
                                       justify-content-center
                                       bg-pn-beige
                                       text-pn-primary"
                                style="width:48px;height:48px;"
                            >

                                <i class="bi bi-flower1 fs-5"></i>

                            </div>


                            <div>

                                <span
                                    class="small
                                           text-pn-primary
                                           fw-semibold
                                           text-uppercase"
                                >
                                    Booking Details
                                </span>


                                <h2
                                    class="font-serif
                                           h3
                                           text-pn-brown
                                           mb-0"
                                >

                                    {{ $booking['pooja'] }}

                                </h2>

                            </div>

                        </div>


                        <div class="row g-3">

                            {{-- Date --}}

                            <div class="col-12 col-sm-6">

                                <div
                                    class="border
                                           rounded-3
                                           p-3
                                           h-100"
                                >

                                    <small
                                        class="text-secondary
                                               d-block"
                                    >

                                        <i
                                            class="bi bi-calendar3
                                                   text-pn-primary
                                                   me-1"
                                        ></i>

                                        Date

                                    </small>


                                    <strong
                                        class="d-block
                                               mt-1
                                               text-pn-brown"
                                    >

                                        {{ $booking['date'] }}

                                    </strong>

                                </div>

                            </div>


                            {{-- Time --}}

                            <div class="col-12 col-sm-6">

                                <div
                                    class="border
                                           rounded-3
                                           p-3
                                           h-100"
                                >

                                    <small
                                        class="text-secondary
                                               d-block"
                                    >

                                        <i
                                            class="bi bi-clock
                                                   text-pn-primary
                                                   me-1"
                                        ></i>

                                        Time

                                    </small>


                                    <strong
                                        class="d-block
                                               mt-1
                                               text-pn-brown"
                                    >

                                        {{ $booking['time'] }}

                                    </strong>

                                </div>

                            </div>


                            {{-- Duration --}}

                            <div class="col-12 col-sm-6">

                                <div
                                    class="border
                                           rounded-3
                                           p-3
                                           h-100"
                                >

                                    <small
                                        class="text-secondary
                                               d-block"
                                    >

                                        <i
                                            class="bi bi-hourglass-split
                                                   text-pn-primary
                                                   me-1"
                                        ></i>

                                        Duration

                                    </small>


                                    <strong
                                        class="d-block
                                               mt-1
                                               text-pn-brown"
                                    >

                                        {{ $booking['duration'] }}

                                    </strong>

                                </div>

                            </div>


                            {{-- Mode --}}

                            <div class="col-12 col-sm-6">

                                <div
                                    class="border
                                           rounded-3
                                           p-3
                                           h-100"
                                >

                                    <small
                                        class="text-secondary
                                               d-block"
                                    >

                                        <i
                                            class="bi bi-camera-video
                                                   text-pn-primary
                                                   me-1"
                                        ></i>

                                        Mode

                                    </small>


                                    <strong
                                        class="d-block
                                               mt-1
                                               text-pn-brown"
                                    >

                                        {{ $booking['mode'] }}

                                    </strong>

                                </div>

                            </div>


                            {{-- Priest --}}

                            <div class="col-12 col-sm-6">

                                <div
                                    class="border
                                           rounded-3
                                           p-3
                                           h-100"
                                >

                                    <small
                                        class="text-secondary
                                               d-block"
                                    >

                                        <i
                                            class="bi bi-person-check
                                                   text-pn-primary
                                                   me-1"
                                        ></i>

                                        Priest

                                    </small>


                                    <strong
                                        class="d-block
                                               mt-1
                                               text-pn-brown"
                                    >

                                        {{ $booking['priest'] }}

                                    </strong>

                                </div>

                            </div>


                            {{-- Location --}}

                            <div class="col-12 col-sm-6">

                                <div
                                    class="border
                                           rounded-3
                                           p-3
                                           h-100"
                                >

                                    <small
                                        class="text-secondary
                                               d-block"
                                    >

                                        <i
                                            class="bi bi-geo-alt
                                                   text-pn-primary
                                                   me-1"
                                        ></i>

                                        Location

                                    </small>


                                    <strong
                                        class="d-block
                                               mt-1
                                               text-pn-brown"
                                    >

                                        {{ $booking['location'] }}

                                    </strong>

                                </div>

                            </div>

                        </div>


                        {{-- Amount --}}

                        <div
                            class="border-top
                                   mt-4
                                   pt-4
                                   d-flex
                                   align-items-center
                                   justify-content-between"
                        >

                            <span
                                class="text-secondary"
                            >
                                Amount Paid
                            </span>


                            <strong
                                class="fs-4
                                       font-serif
                                       text-pn-primary"
                            >

                                {{ $booking['amount'] }}

                            </strong>

                        </div>

                    </div>

                </div>


                {{-- =================================================
                     GOOGLE MEET
                ================================================= --}}

                <div
                    class="card
                           border
                           border-warning-subtle
                           rounded-4
                           mb-4
                           overflow-hidden"
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
                                       d-flex
                                       align-items-center
                                       justify-content-center
                                       bg-success-subtle
                                       text-success"
                                style="width:48px;height:48px;"
                            >

                                <i
                                    class="bi bi-camera-video fs-5"
                                ></i>

                            </div>


                            <div>

                                <span
                                    class="small
                                           text-success
                                           fw-semibold
                                           text-uppercase"
                                >
                                    Online Pooja
                                </span>


                                <h2
                                    class="font-serif
                                           h3
                                           text-pn-brown
                                           mb-1"
                                >

                                    Google Meet

                                </h2>


                                <p
                                    class="small
                                           text-secondary
                                           mb-0"
                                >

                                    Your meeting link is ready.
                                    Please join at the scheduled time.

                                </p>

                            </div>

                        </div>


                        <div
                            class="bg-pn-cream
                                   rounded-4
                                   p-3
                                   p-md-4"
                        >

                            <small
                                class="text-secondary
                                       d-block
                                       mb-2"
                            >
                                Meeting Link
                            </small>


                            <div
                                class="d-flex
                                       flex-column
                                       flex-sm-row
                                       align-items-stretch
                                       gap-2"
                            >

                                <input
                                    type="text"
                                    class="form-control
                                           bg-white"
                                    value="{{ $booking['meet_link'] }}"
                                    readonly
                                >


                                <a
                                    href="#"
                                    class="btn btn-pn
                                           text-nowrap"
                                >

                                    <i
                                        class="bi bi-box-arrow-up-right me-1"
                                    ></i>

                                    Join Meet

                                </a>

                            </div>


                            <div
                                class="d-flex
                                       align-items-start
                                       gap-2
                                       small
                                       text-secondary
                                       mt-3"
                            >

                                <i
                                    class="bi bi-info-circle
                                           text-pn-primary"
                                ></i>


                                <span>

                                    The Google Meet link is generated
                                    automatically by the Pujari or the
                                    integrated video service.

                                </span>

                            </div>

                        </div>

                    </div>

                </div>


                {{-- =================================================
                     CALENDAR INVITE
                ================================================= --}}

                <div
                    class="card
                           border
                           border-warning-subtle
                           rounded-4
                           mb-4"
                >

                    <div class="card-body p-4 p-md-5">

                        <div
                            class="d-flex
                                   flex-column
                                   flex-sm-row
                                   align-items-sm-center
                                   justify-content-between
                                   gap-3"
                        >

                            <div
                                class="d-flex
                                       align-items-center
                                       gap-3"
                            >

                                <div
                                    class="rounded-circle
                                           d-flex
                                           align-items-center
                                           justify-content-center
                                           bg-pn-beige
                                           text-pn-primary"
                                    style="width:48px;height:48px;"
                                >

                                    <i
                                        class="bi bi-calendar-plus fs-5"
                                    ></i>

                                </div>


                                <div>

                                    <h3
                                        class="font-serif
                                               h4
                                               text-pn-brown
                                               mb-1"
                                    >

                                        Add to Calendar

                                    </h3>


                                    <p
                                        class="small
                                               text-secondary
                                               mb-0"
                                    >

                                        Save your pooja schedule
                                        to your calendar.

                                    </p>

                                </div>

                            </div>


                            <button
                                type="button"
                                class="btn btn-pn-outline"
                            >

                                <i
                                    class="bi bi-calendar-plus me-2"
                                ></i>

                                Add to Calendar

                            </button>

                        </div>

                    </div>

                </div>


                {{-- =================================================
                     NOTIFICATIONS
                ================================================= --}}

                <div
                    class="card
                           border
                           border-warning-subtle
                           rounded-4
                           mb-4"
                >

                    <div class="card-body p-4 p-md-5">

                        <div class="mb-4">

                            <span
                                class="small
                                       text-pn-primary
                                       fw-semibold
                                       text-uppercase"
                            >
                                Confirmation
                            </span>


                            <h2
                                class="font-serif
                                       h3
                                       text-pn-brown
                                       mt-1
                                       mb-1"
                            >

                                Notifications

                            </h2>


                            <p
                                class="small
                                       text-secondary
                                       mb-0"
                            >

                                Your booking confirmation and updates
                                will be communicated through supported
                                notification channels.

                            </p>

                        </div>


                        <div class="row g-3">

                            @foreach($notifications as $notification)

                                <div class="col-12 col-md-4">

                                    <div
                                        class="border
                                               rounded-4
                                               p-3
                                               h-100"
                                    >

                                        <div
                                            class="d-flex
                                                   align-items-center
                                                   justify-content-between
                                                   mb-3"
                                        >

                                            <div
                                                class="rounded-circle
                                                       d-flex
                                                       align-items-center
                                                       justify-content-center
                                                       bg-pn-beige
                                                       text-pn-primary"
                                                style="width:44px;height:44px;"
                                            >

                                                <i
                                                    class="bi {{ $notification['icon'] }}"
                                                ></i>

                                            </div>


                                            <span
                                                class="badge
                                                       rounded-pill
                                                       bg-success-subtle
                                                       text-success-emphasis"
                                            >

                                                {{ $notification['status'] }}

                                            </span>

                                        </div>


                                        <h6
                                            class="fw-semibold
                                                   text-pn-brown"
                                        >

                                            {{ $notification['title'] }}

                                        </h6>


                                        <p
                                            class="small
                                                   text-secondary
                                                   mb-0"
                                        >

                                            {{ $notification['text'] }}

                                        </p>

                                    </div>

                                </div>

                            @endforeach

                        </div>

                    </div>

                </div>


                {{-- =================================================
                     BEFORE POOJA REMINDERS
                ================================================= --}}

                <div
                    class="card
                           border
                           border-warning-subtle
                           rounded-4
                           mb-4"
                >

                    <div class="card-body p-4 p-md-5">

                        <div class="mb-4">

                            <span
                                class="small
                                       text-pn-primary
                                       fw-semibold
                                       text-uppercase"
                            >
                                Before Your Pooja
                            </span>


                            <h2
                                class="font-serif
                                       h3
                                       text-pn-brown
                                       mt-1
                                       mb-1"
                            >

                                We'll Remind You

                            </h2>


                            <p
                                class="small
                                       text-secondary
                                       mb-0"
                            >

                                You will receive reminders before
                                your scheduled pooja.

                            </p>

                        </div>


                        <div class="row g-3">

                            @foreach($reminders as $reminder)

                                <div class="col-12 col-md-4">

                                    <div
                                        class="text-center
                                               border
                                               rounded-4
                                               p-4
                                               h-100"
                                    >

                                        <div
                                            class="mx-auto
                                                   rounded-circle
                                                   d-flex
                                                   align-items-center
                                                   justify-content-center
                                                   bg-pn-beige
                                                   text-pn-primary
                                                   fs-5"
                                            style="width:52px;height:52px;"
                                        >

                                            <i
                                                class="bi {{ $reminder['icon'] }}"
                                            ></i>

                                        </div>


                                        <h6
                                            class="fw-semibold
                                                   text-pn-brown
                                                   mt-3"
                                        >

                                            {{ $reminder['time'] }}

                                        </h6>


                                        <p
                                            class="small
                                                   text-secondary
                                                   mb-0"
                                        >

                                            {{ $reminder['text'] }}

                                        </p>

                                    </div>

                                </div>

                            @endforeach

                        </div>


                        <div
                            class="alert
                                   alert-light
                                   border
                                   mt-4
                                   mb-0"
                        >

                            <i
                                class="bi bi-camera-video
                                       text-pn-primary
                                       me-2"
                            ></i>

                            Your Google Meet link will also be available
                            before the pooja.

                        </div>

                    </div>

                </div>


                {{-- =================================================
                     IMPORTANT PAYMENT INFORMATION
                ================================================= --}}

                <div
                    class="alert
                           alert-warning
                           border-warning-subtle
                           rounded-4"
                >

                    <div
                        class="d-flex
                               align-items-start
                               gap-3"
                    >

                        <i
                            class="bi bi-info-circle-fill
                                   fs-5"
                        ></i>


                        <div>

                            <strong
                                class="d-block
                                       mb-1"
                            >

                                Payment & Completion

                            </strong>


                            <span class="small">

                                Your payment is processed as part of the
                                booking flow. As defined in the project
                                payment flow, the platform holds the payment
                                until the pooja is completed and the applicable
                                completion process takes place.

                            </span>

                        </div>

                    </div>

                </div>

            </div>


            {{-- =================================================
                 RIGHT SIDEBAR
            ================================================= --}}

            <div class="col-12 col-lg-4">

                <div
                    class="position-sticky"
                    style="top:100px;"
                >


                    {{-- Quick Summary --}}

                    <div
                        class="card
                               border
                               border-warning-subtle
                               rounded-4
                               mb-3"
                    >

                        <div class="card-body p-4">

                            <h3
                                class="font-serif
                                       h4
                                       text-pn-brown
                                       mb-4"
                            >

                                Booking Summary

                            </h3>


                            <div
                                class="d-flex
                                       align-items-center
                                       gap-3
                                       mb-4"
                            >

                                <div
                                    class="rounded-3
                                           d-flex
                                           align-items-center
                                           justify-content-center
                                           bg-pn-beige
                                           text-pn-primary
                                           fs-4"
                                    style="width:64px;height:64px;"
                                >

                                    <i class="bi bi-flower1"></i>

                                </div>


                                <div>

                                    <h6
                                        class="fw-semibold
                                               text-pn-brown
                                               mb-1"
                                    >

                                        {{ $booking['pooja'] }}

                                    </h6>


                                    <small
                                        class="text-secondary"
                                    >

                                        {{ $booking['category'] }}

                                    </small>

                                </div>

                            </div>


                            <div
                                class="d-flex
                                       justify-content-between
                                       mb-3"
                            >

                                <span class="small text-secondary">
                                    Date
                                </span>


                                <strong class="small">
                                    {{ $booking['date'] }}
                                </strong>

                            </div>


                            <div
                                class="d-flex
                                       justify-content-between
                                       mb-3"
                            >

                                <span class="small text-secondary">
                                    Time
                                </span>


                                <strong class="small">
                                    {{ $booking['time'] }}
                                </strong>

                            </div>


                            <div
                                class="d-flex
                                       justify-content-between
                                       mb-3"
                            >

                                <span class="small text-secondary">
                                    Devotee
                                </span>


                                <strong
                                    class="small
                                           text-end"
                                >
                                    {{ $booking['devotee'] }}
                                </strong>

                            </div>


                            <div
                                class="d-flex
                                       justify-content-between
                                       mb-3"
                            >

                                <span class="small text-secondary">
                                    Priest
                                </span>


                                <strong
                                    class="small
                                           text-end"
                                >
                                    {{ $booking['priest'] }}
                                </strong>

                            </div>


                            <hr
                                class="border-warning-subtle"
                            >


                            <div
                                class="d-flex
                                       justify-content-between
                                       align-items-center"
                            >

                                <span
                                    class="text-secondary"
                                >
                                    Total Paid
                                </span>


                                <strong
                                    class="fs-4
                                           font-serif
                                           text-pn-primary"
                                >

                                    {{ $booking['amount'] }}

                                </strong>

                            </div>

                        </div>

                    </div>


                    {{-- Actions --}}

                    <div
                        class="card
                               border
                               border-warning-subtle
                               rounded-4
                               mb-3"
                    >

                        <div class="card-body p-4">

                            <div
                                class="d-grid
                                       gap-2"
                            >

                                <button
                                    type="button"
                                    class="btn btn-pn"
                                >

                                    <i
                                        class="bi bi-download me-2"
                                    ></i>

                                    Download Confirmation

                                </button>


                                <button
                                    type="button"
                                    class="btn btn-pn-outline"
                                >

                                    <i
                                        class="bi bi-receipt me-2"
                                    ></i>

                                    View Booking Details

                                </button>


                                <button
                                    type="button"
                                    class="btn btn-light"
                                >

                                    <i
                                        class="bi bi-share me-2"
                                    ></i>

                                    Share Booking

                                </button>

                            </div>

                        </div>

                    </div>


                    {{-- Support --}}

                    <div
                        class="card
                               border
                               border-warning-subtle
                               rounded-4"
                    >

                        <div class="card-body p-4">

                            <div
                                class="d-flex
                                       align-items-start
                                       gap-3"
                            >

                                <i
                                    class="bi bi-headset
                                           text-pn-primary
                                           fs-4"
                                ></i>


                                <div>

                                    <h6
                                        class="fw-semibold
                                               text-pn-brown"
                                    >

                                        Need Help?

                                    </h6>


                                    <p
                                        class="small
                                               text-secondary
                                               mb-3"
                                    >

                                        Keep your Booking ID or Reference ID
                                        ready when contacting support.

                                    </p>


                                    <a
                                        href="#"
                                        class="btn btn-pn-outline btn-sm"
                                    >

                                        Contact Support

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
     NEXT ACTIONS
============================================================ --}}

<section class="py-5">

    <div class="container">

        <div
            class="bg-pn-cream
                   border
                   border-warning-subtle
                   rounded-5
                   text-center
                   p-4
                   p-md-5"
        >

            <i
                class="bi bi-flower1
                       display-5
                       text-pn-primary"
            ></i>


            <h2
                class="font-serif
                       display-6
                       text-pn-brown
                       mt-3"
            >

                Your spiritual journey continues.

            </h2>


            <p
                class="text-secondary
                       col-lg-7
                       mx-auto"
            >

                You can explore more poojas, temples, digital poojas
                and other services available through Pooja Nilayam.

            </p>


            <div
                class="d-flex
                       flex-column
                       flex-sm-row
                       justify-content-center
                       gap-2"
            >

                <a
                    href="#"
                    class="btn btn-pn px-4"
                >

                    Explore More Poojas

                    <i
                        class="bi bi-arrow-right ms-2"
                    ></i>

                </a>


                <a
                    href="#"
                    class="btn btn-pn-outline px-4"
                >

                    Go to Dashboard

                </a>

            </div>

        </div>

    </div>

</section>

@endsection