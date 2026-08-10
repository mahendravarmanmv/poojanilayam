@extends('layouts.app')

@section('title', 'Booking Confirmed | Pooja Nilayam')

@section(
    'meta_description',
    'Your priest booking has been confirmed successfully with Pooja Nilayam.'
)

@section('content')

@php

    /*
    |--------------------------------------------------------------------------
    | TEMPORARY SUCCESS DATA
    |--------------------------------------------------------------------------
    | These values will later come from the confirmed booking.
    |--------------------------------------------------------------------------
    */

    $booking = [

        'booking_id' => 'PNP-20260818-00428',

        'reference_id' => 'REF-7K29P4',

        'status' => 'Confirmed',

        'priest_name' => 'Sri Ananda Sharma',

        'priest_title' => 'Vedic Priest',

        'priest_image' => 'priest-1.jpg',

        'service' => 'Vedic Pooja',

        'date' => '18 August 2026',

        'day' => 'Tuesday',

        'time' => '07:00 AM',

        'location' => 'Hyderabad, Telangana',

        'temple' => 'Sri Venkateswara Temple',

        'amount' => '₹1,732.50',

        'live_available' => true,

        'google_meet' => true,

        'calendar_invite' => true

    ];


    /*
    |--------------------------------------------------------------------------
    | NOTIFICATION CHANNELS
    |--------------------------------------------------------------------------
    */

    $notifications = [

        [
            'icon' => 'bi-envelope-check',
            'title' => 'Email Confirmation',
            'description' =>
                'Booking confirmation has been sent to your registered email address.',
            'status' => 'Sent'
        ],

        [
            'icon' => 'bi-phone',
            'title' => 'SMS Confirmation',
            'description' =>
                'A booking confirmation message will be sent to your registered mobile number.',
            'status' => 'Sent'
        ],

        [
            'icon' => 'bi-whatsapp',
            'title' => 'WhatsApp Notification',
            'description' =>
                'WhatsApp notification will be sent where supported.',
            'status' => 'Sent'
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
                   justify-content-center"
        >

            <div class="col-12 col-lg-8">

                <div
                    class="text-center"
                >

                    {{-- Success Icon --}}

                    <div
                        class="mx-auto
                               rounded-circle
                               bg-success
                               text-white
                               d-flex
                               align-items-center
                               justify-content-center
                               shadow-sm"
                        style="width:88px;height:88px;"
                    >

                        <i
                            class="bi bi-check-lg"
                            style="font-size:2.75rem;"
                        ></i>

                    </div>


                    <span
                        class="small
                               text-pn-gold
                               fw-semibold
                               text-uppercase
                               d-block
                               mt-4"
                    >
                        Booking Confirmed
                    </span>


                    <h1
                        class="font-serif
                               display-5
                               text-pn-brown
                               mt-2
                               mb-3"
                    >

                        Your priest booking is confirmed.

                    </h1>


                    <p
                        class="lead
                               text-secondary
                               mb-0"
                    >

                        Thank you for choosing Pooja Nilayam.
                        Your booking has been successfully confirmed.

                    </p>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- ============================================================
     BOOKING REFERENCE
============================================================ --}}

<section class="py-4 bg-white border-bottom">

    <div class="container">

        <div
            class="row
                   justify-content-center
                   g-3"
        >

            {{-- Booking ID --}}

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


                    <strong
                        class="text-pn-brown"
                    >

                        {{ $booking['booking_id'] }}

                    </strong>

                </div>

            </div>


            {{-- Reference ID --}}

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


                    <strong
                        class="text-pn-brown"
                    >

                        {{ $booking['reference_id'] }}

                    </strong>

                </div>

            </div>


            {{-- Status --}}

            <div class="col-12 col-sm-6 col-lg-4">

                <div
                    class="border
                           border-success-subtle
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
                               bg-success
                               px-3
                               py-2"
                    >

                        <i
                            class="bi bi-check-circle-fill me-1"
                        ></i>

                        {{ $booking['status'] }}

                    </span>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- ============================================================
     MAIN SUCCESS CONTENT
============================================================ --}}

<section class="py-5">

    <div class="container">

        <div
            class="row
                   g-4
                   align-items-start"
        >

            {{-- =================================================
                 LEFT COLUMN
            ================================================== --}}

            <div class="col-12 col-lg-8">

                {{-- =============================================
                     BOOKING DETAILS
                ============================================== --}}

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
                                style="width:50px;height:50px;"
                            >

                                <i
                                    class="bi bi-calendar-check"
                                ></i>

                            </div>


                            <div>

                                <h2
                                    class="font-serif
                                           h3
                                           text-pn-brown
                                           mb-1"
                                >

                                    Booking Details

                                </h2>


                                <p
                                    class="small
                                           text-secondary
                                           mb-0"
                                >

                                    Your confirmed priest booking details.

                                </p>

                            </div>

                        </div>


                        {{-- Service --}}

                        <div
                            class="row
                                   g-3"
                        >

                            <div class="col-12 col-sm-6">

                                <div
                                    class="bg-light-subtle
                                           rounded-4
                                           p-3
                                           h-100"
                                >

                                    <small
                                        class="text-secondary
                                               d-block"
                                    >

                                        Service

                                    </small>


                                    <strong
                                        class="text-pn-brown"
                                    >

                                        {{ $booking['service'] }}

                                    </strong>

                                </div>

                            </div>


                            {{-- Date --}}

                            <div class="col-12 col-sm-6">

                                <div
                                    class="bg-light-subtle
                                           rounded-4
                                           p-3
                                           h-100"
                                >

                                    <small
                                        class="text-secondary
                                               d-block"
                                    >

                                        Date

                                    </small>


                                    <strong
                                        class="text-pn-brown"
                                    >

                                        {{ $booking['date'] }}

                                    </strong>

                                </div>

                            </div>


                            {{-- Day --}}

                            <div class="col-12 col-sm-6">

                                <div
                                    class="bg-light-subtle
                                           rounded-4
                                           p-3
                                           h-100"
                                >

                                    <small
                                        class="text-secondary
                                               d-block"
                                    >

                                        Day

                                    </small>


                                    <strong
                                        class="text-pn-brown"
                                    >

                                        {{ $booking['day'] }}

                                    </strong>

                                </div>

                            </div>


                            {{-- Time --}}

                            <div class="col-12 col-sm-6">

                                <div
                                    class="bg-light-subtle
                                           rounded-4
                                           p-3
                                           h-100"
                                >

                                    <small
                                        class="text-secondary
                                               d-block"
                                    >

                                        Time

                                    </small>


                                    <strong
                                        class="text-pn-brown"
                                    >

                                        {{ $booking['time'] }}

                                    </strong>

                                </div>

                            </div>


                            {{-- Temple --}}

                            <div class="col-12">

                                <div
                                    class="bg-light-subtle
                                           rounded-4
                                           p-3"
                                >

                                    <small
                                        class="text-secondary
                                               d-block"
                                    >

                                        Temple / Service Location

                                    </small>


                                    <strong
                                        class="text-pn-brown"
                                    >

                                        {{ $booking['temple'] }}

                                    </strong>


                                    <small
                                        class="text-secondary
                                               d-block
                                               mt-1"
                                    >

                                        <i
                                            class="bi bi-geo-alt
                                                   text-pn-primary
                                                   me-1"
                                        ></i>

                                        {{ $booking['location'] }}

                                    </small>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>


                {{-- =============================================
                     PRIEST DETAILS
                ============================================== --}}

                <div
                    class="card
                           border
                           border-warning-subtle
                           rounded-5
                           mb-4"
                >

                    <div class="card-body p-4">

                        <div
                            class="d-flex
                                   flex-column
                                   flex-sm-row
                                   align-items-sm-center
                                   gap-3"
                        >

                            <img
                                src="{{ asset('images/priests/' . $booking['priest_image']) }}"
                                width="88"
                                height="88"
                                class="rounded-4
                                       object-fit-cover
                                       flex-shrink-0"
                                alt="{{ $booking['priest_name'] }}"
                                loading="lazy"
                            >


                            <div class="flex-grow-1">

                                <span
                                    class="small
                                           text-pn-gold
                                           fw-semibold
                                           text-uppercase"
                                >

                                    Priest

                                </span>


                                <h2
                                    class="font-serif
                                           h3
                                           text-pn-brown
                                           mt-1
                                           mb-1"
                                >

                                    {{ $booking['priest_name'] }}

                                </h2>


                                <p
                                    class="small
                                           text-pn-primary
                                           fw-semibold
                                           mb-1"
                                >

                                    {{ $booking['priest_title'] }}

                                </p>


                                <span
                                    class="badge
                                           rounded-pill
                                           bg-success"
                                >

                                    <i
                                        class="bi bi-patch-check-fill me-1"
                                    ></i>

                                    Verified

                                </span>

                            </div>


                            <a
                                href="#"
                                class="btn
                                       btn-pn-outline
                                       btn-sm"
                            >

                                View Profile

                            </a>

                        </div>

                    </div>

                </div>


                {{-- =============================================
                     GOOGLE MEET / LIVE SESSION
                ============================================== --}}

                @if($booking['live_available'])

                    <div
                        class="card
                               border-0
                               rounded-5
                               pn-digital
                               text-white
                               overflow-hidden
                               mb-4"
                    >

                        <div class="card-body p-4 p-md-5">

                            <div
                                class="row
                                       align-items-center
                                       g-4"
                            >

                                <div class="col-12 col-md-7">

                                    <span
                                        class="small
                                               text-warning
                                               fw-semibold
                                               text-uppercase"
                                    >

                                        Live Session

                                    </span>


                                    <h2
                                        class="font-serif
                                               h3
                                               mt-2
                                               mb-3"
                                    >

                                        Your live session details

                                    </h2>


                                    @if($booking['google_meet'])

                                        <p
                                            class="text-white-50
                                                   small
                                                   mb-3"
                                        >

                                            A Google Meet link can be
                                            provided/generated for
                                            applicable live bookings.

                                        </p>


                                        <div
                                            class="bg-white
                                                   bg-opacity-10
                                                   rounded-4
                                                   p-3
                                                   mb-3"
                                        >

                                            <small
                                                class="text-white-50
                                                       d-block
                                                       mb-1"
                                            >

                                                Meeting Link

                                            </small>


                                            <span
                                                class="small
                                                       text-white"
                                            >

                                                Meeting details will
                                                be available for the
                                                confirmed booking.

                                            </span>

                                        </div>


                                        <a
                                            href="#"
                                            class="btn
                                                   btn-warning
                                                   text-dark
                                                   fw-semibold"
                                        >

                                            Open Meeting Details

                                            <i
                                                class="bi bi-box-arrow-up-right ms-2"
                                            ></i>

                                        </a>

                                    @endif

                                </div>


                                <div class="col-12 col-md-5">

                                    <div
                                        class="text-center"
                                    >

                                        <div
                                            class="mx-auto
                                                   rounded-circle
                                                   bg-white
                                                   bg-opacity-10
                                                   d-flex
                                                   align-items-center
                                                   justify-content-center"
                                            style="width:100px;height:100px;"
                                        >

                                            <i
                                                class="bi bi-camera-video
                                                       text-warning
                                                       display-6"
                                            ></i>

                                        </div>


                                        <small
                                            class="text-white-50
                                                   d-block
                                                   mt-3"
                                        >

                                            Live session available
                                            where applicable

                                        </small>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                @endif


                {{-- =============================================
                     CALENDAR INVITE
                ============================================== --}}

                @if($booking['calendar_invite'])

                    <div
                        class="card
                               border
                               border-warning-subtle
                               rounded-5
                               mb-4"
                    >

                        <div class="card-body p-4">

                            <div
                                class="d-flex
                                       flex-column
                                       flex-sm-row
                                       align-items-sm-center
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
                                    style="width:52px;height:52px;"
                                >

                                    <i
                                        class="bi bi-calendar-plus"
                                    ></i>

                                </div>


                                <div class="flex-grow-1">

                                    <h3
                                        class="font-serif
                                               h5
                                               text-pn-brown
                                               mb-1"
                                    >

                                        Add to your calendar

                                    </h3>


                                    <p
                                        class="small
                                               text-secondary
                                               mb-0"
                                    >

                                        Save your confirmed booking
                                        date and time to your calendar.

                                    </p>

                                </div>


                                <button
                                    type="button"
                                    class="btn
                                           btn-pn-outline
                                           btn-sm"
                                >

                                    Add to Calendar

                                </button>

                            </div>

                        </div>

                    </div>

                @endif


                {{-- =============================================
                     NOTIFICATIONS
                ============================================== --}}

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
                                style="width:50px;height:50px;"
                            >

                                <i class="bi bi-bell"></i>

                            </div>


                            <div>

                                <h2
                                    class="font-serif
                                           h3
                                           text-pn-brown
                                           mb-1"
                                >

                                    Confirmation Notifications

                                </h2>


                                <p
                                    class="small
                                           text-secondary
                                           mb-0"
                                >

                                    Your booking information will be
                                    communicated through supported
                                    notification channels.

                                </p>

                            </div>

                        </div>


                        <div
                            class="vstack
                                   gap-3"
                        >

                            @foreach($notifications as $notification)

                                <div
                                    class="d-flex
                                           align-items-start
                                           gap-3
                                           border
                                           border-warning-subtle
                                           rounded-4
                                           p-3"
                                >

                                    <div
                                        class="rounded-circle
                                               bg-pn-cream
                                               text-pn-primary
                                               d-flex
                                               align-items-center
                                               justify-content-center
                                               flex-shrink-0"
                                        style="width:44px;height:44px;"
                                    >

                                        <i
                                            class="bi {{ $notification['icon'] }}"
                                        ></i>

                                    </div>


                                    <div class="flex-grow-1">

                                        <div
                                            class="d-flex
                                                   flex-column
                                                   flex-sm-row
                                                   justify-content-between
                                                   gap-2"
                                        >

                                            <strong
                                                class="text-pn-brown"
                                            >

                                                {{ $notification['title'] }}

                                            </strong>


                                            <span
                                                class="badge
                                                       rounded-pill
                                                       bg-success-subtle
                                                       text-success-emphasis
                                                       align-self-start"
                                            >

                                                {{ $notification['status'] }}

                                            </span>

                                        </div>


                                        <small
                                            class="text-secondary"
                                        >

                                            {{ $notification['description'] }}

                                        </small>

                                    </div>

                                </div>

                            @endforeach

                        </div>

                    </div>

                </div>


                {{-- =============================================
                     WHAT HAPPENS NEXT
                ============================================== --}}

                <div
                    class="card
                           border
                           border-warning-subtle
                           rounded-5"
                >

                    <div class="card-body p-4 p-md-5">

                        <span
                            class="small
                                   text-pn-gold
                                   fw-semibold
                                   text-uppercase"
                        >

                            Next Steps

                        </span>


                        <h2
                            class="font-serif
                                   h3
                                   text-pn-brown
                                   mt-2
                                   mb-4"
                        >

                            What happens next?

                        </h2>


                        <div
                            class="vstack
                                   gap-4"
                        >

                            {{-- Step 1 --}}

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
                                           flex-shrink-0
                                           fw-semibold"
                                    style="width:40px;height:40px;"
                                >
                                    1
                                </div>


                                <div>

                                    <h3
                                        class="font-serif
                                               h5
                                               text-pn-brown
                                               mb-1"
                                    >

                                        Booking is confirmed

                                    </h3>


                                    <p
                                        class="small
                                               text-secondary
                                               mb-0"
                                    >

                                        Your booking reference has
                                        been generated and your
                                        booking is recorded.

                                    </p>

                                </div>

                            </div>


                            {{-- Step 2 --}}

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
                                           flex-shrink-0
                                           fw-semibold"
                                    style="width:40px;height:40px;"
                                >
                                    2
                                </div>


                                <div>

                                    <h3
                                        class="font-serif
                                               h5
                                               text-pn-brown
                                               mb-1"
                                    >

                                        Keep your booking details

                                    </h3>


                                    <p
                                        class="small
                                               text-secondary
                                               mb-0"
                                    >

                                        Keep your Booking ID and
                                        Reference ID for future
                                        communication and support.

                                    </p>

                                </div>

                            </div>


                            {{-- Step 3 --}}

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
                                           flex-shrink-0
                                           fw-semibold"
                                    style="width:40px;height:40px;"
                                >
                                    3
                                </div>


                                <div>

                                    <h3
                                        class="font-serif
                                               h5
                                               text-pn-brown
                                               mb-1"
                                    >

                                        Attend your scheduled service

                                    </h3>


                                    <p
                                        class="small
                                               text-secondary
                                               mb-0"
                                    >

                                        Follow the confirmed date,
                                        time and applicable meeting
                                        instructions.

                                    </p>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>


            {{-- =================================================
                 RIGHT COLUMN
            ================================================== --}}

            <div class="col-12 col-lg-4">

                <div
                    class="position-sticky"
                    style="top:1.5rem;"
                >

                    {{-- Payment Summary --}}

                    <div
                        class="card
                               border-0
                               rounded-5
                               shadow-sm
                               overflow-hidden"
                    >

                        <div
                            class="pn-digital
                                   text-white
                                   p-4"
                        >

                            <span
                                class="small
                                       text-warning
                                       fw-semibold
                                       text-uppercase"
                            >

                                Payment Summary

                            </span>


                            <h2
                                class="font-serif
                                       h3
                                       mt-2
                                       mb-0"
                            >

                                Payment Successful

                            </h2>

                        </div>


                        <div class="card-body p-4">

                            <div
                                class="text-center
                                       mb-4"
                            >

                                <div
                                    class="mx-auto
                                           rounded-circle
                                           bg-success-subtle
                                           text-success
                                           d-flex
                                           align-items-center
                                           justify-content-center"
                                    style="width:64px;height:64px;"
                                >

                                    <i
                                        class="bi bi-check-circle-fill
                                               fs-3"
                                    ></i>

                                </div>


                                <p
                                    class="small
                                           text-secondary
                                           mt-3
                                           mb-0"
                                >

                                    Your payment has been processed
                                    successfully.

                                </p>

                            </div>


                            <hr>


                            <div
                                class="d-flex
                                       justify-content-between
                                       gap-3
                                       mt-4
                                       mb-3"
                            >

                                <span
                                    class="small
                                           text-secondary"
                                >

                                    Service

                                </span>


                                <strong
                                    class="small
                                           text-pn-brown
                                           text-end"
                                >

                                    {{ $booking['service'] }}

                                </strong>

                            </div>


                            <div
                                class="d-flex
                                       justify-content-between
                                       gap-3
                                       mb-3"
                            >

                                <span
                                    class="small
                                           text-secondary"
                                >

                                    Booking ID

                                </span>


                                <strong
                                    class="small
                                           text-pn-brown
                                           text-end"
                                >

                                    {{ $booking['booking_id'] }}

                                </strong>

                            </div>


                            <div
                                class="d-flex
                                       justify-content-between
                                       gap-3
                                       mb-3"
                            >

                                <span
                                    class="small
                                           text-secondary"
                                >

                                    Amount Paid

                                </span>


                                <strong
                                    class="text-pn-primary"
                                >

                                    {{ $booking['amount'] }}

                                </strong>

                            </div>


                            <hr>


                            <div
                                class="d-flex
                                       justify-content-between
                                       align-items-center
                                       gap-3
                                       mt-3"
                            >

                                <strong
                                    class="text-pn-brown"
                                >

                                    Status

                                </strong>


                                <span
                                    class="badge
                                           rounded-pill
                                           bg-success"
                                >

                                    Confirmed

                                </span>

                            </div>

                        </div>

                    </div>


                    {{-- Quick Actions --}}

                    <div
                        class="card
                               border
                               border-warning-subtle
                               rounded-5
                               mt-3"
                    >

                        <div class="card-body p-4">

                            <h3
                                class="font-serif
                                       h5
                                       text-pn-brown
                                       mb-3"
                            >

                                Quick Actions

                            </h3>


                            <div
                                class="d-grid
                                       gap-2"
                            >

                                <a
                                    href="#"
                                    class="btn
                                           btn-pn"
                                >

                                    <i
                                        class="bi bi-calendar-event me-2"
                                    ></i>

                                    Add to Calendar

                                </a>


                                <a
                                    href="#"
                                    class="btn
                                           btn-pn-outline"
                                >

                                    <i
                                        class="bi bi-receipt me-2"
                                    ></i>

                                    View Booking

                                </a>


                                <a
                                    href="#"
                                    class="btn
                                           btn-light
                                           border"
                                >

                                    <i
                                        class="bi bi-house me-2"
                                    ></i>

                                    Back to Home

                                </a>

                            </div>

                        </div>

                    </div>


                    {{-- Support --}}

                    <div
                        class="card
                               border
                               border-warning-subtle
                               rounded-4
                               mt-3
                               bg-pn-cream"
                    >

                        <div class="card-body p-4">

                            <div
                                class="d-flex
                                       align-items-start
                                       gap-3"
                            >

                                <i
                                    class="bi bi-headset
                                           fs-4
                                           text-pn-primary"
                                ></i>


                                <div>

                                    <strong
                                        class="d-block
                                               text-pn-brown"
                                    >

                                        Need help?

                                    </strong>


                                    <small
                                        class="text-secondary"
                                    >

                                        Use your Booking ID or
                                        Reference ID when contacting
                                        support.

                                    </small>


                                    <a
                                        href="#"
                                        class="small
                                               text-pn-primary
                                               fw-semibold
                                               d-block
                                               mt-2"
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
     FINAL SUCCESS MESSAGE
============================================================ --}}

<section class="py-5 bg-pn-cream">

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
                    class="bi bi-flower1
                           display-5
                           text-warning"
                ></i>


                <h2
                    class="font-serif
                           display-6
                           mt-3"
                >

                    May your ceremony be filled with
                    peace and blessings.

                </h2>


                <p
                    class="text-white-50
                           col-lg-7
                           mx-auto
                           mb-4"
                >

                    Your booking details have been recorded.
                    Please keep your Booking ID and Reference ID
                    for future communication.

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
                        class="btn
                               btn-warning
                               text-dark
                               fw-semibold
                               px-4"
                    >

                        View My Bookings

                        <i
                            class="bi bi-calendar-check ms-2"
                        ></i>

                    </a>


                    <a
                        href="{{ route('home') }}"
                        class="btn
                               btn-outline-light
                               px-4"
                    >

                        Back to Home

                    </a>

                </div>

            </div>

        </div>

    </div>

</section>

@endsection