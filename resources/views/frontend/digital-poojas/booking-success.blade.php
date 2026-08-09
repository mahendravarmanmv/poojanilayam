@extends('layouts.app')

@section('title', 'Digital Pooja Booking Confirmed | Pooja Nilayam')

@section(
    'meta_description',
    'Your Digital Pooja booking has been successfully confirmed with Pooja Nilayam.'
)

@section('content')

@php

    /*
    |--------------------------------------------------------------------------
    | TEMPORARY FRONTEND DATA
    |--------------------------------------------------------------------------
    | These values will later come from the successful booking response.
    |--------------------------------------------------------------------------
    */

    $booking = [

        'booking_id' => 'PN-DP-20260811-1024',

        'reference_id' => 'PN-REF-784521',

        'pooja_name' => 'Ganapathi Digital Pooja',

        'god' => 'Lord Ganesha',

        'date' => '11 August 2026',

        'time' => '07:00 PM',

        'language' => 'Telugu',

        'devotee' => 'Mahendra Varma',

        'duration' => '20 Minutes',

        'amount' => 251,

        'payment_status' => 'Paid',

        'booking_status' => 'Confirmed',

        'image' => 'ganapathi.jpg'

    ];


    /*
    |--------------------------------------------------------------------------
    | Next Steps
    |--------------------------------------------------------------------------
    */

    $nextSteps = [

        [
            'number' => '01',
            'icon' => 'bi-bell',
            'title' => 'Booking Notifications',
            'text' =>
                'You will receive booking updates through the available notification channels.'
        ],

        [
            'number' => '02',
            'icon' => 'bi-stars',
            'title' => 'Personalized Experience',
            'text' =>
                'Your submitted details will be used for the planned personalized Digital Pooja experience.'
        ],

        [
            'number' => '03',
            'icon' => 'bi-camera-video',
            'title' => 'Pooja Experience',
            'text' =>
                'Follow your Digital Pooja journey and participate according to the scheduled experience.'
        ],

        [
            'number' => '04',
            'icon' => 'bi-images',
            'title' => 'Photos & Videos',
            'text' =>
                'After completion, applicable photos and videos will be shared with you.'
        ]

    ];


    /*
    |--------------------------------------------------------------------------
    | Notification Channels
    |--------------------------------------------------------------------------
    */

    $notifications = [

        [
            'icon' => 'bi-envelope',
            'title' => 'Email',
            'text' => 'Booking confirmation'
        ],

        [
            'icon' => 'bi-chat-text',
            'title' => 'SMS',
            'text' => 'Booking updates'
        ],

        [
            'icon' => 'bi-whatsapp',
            'title' => 'WhatsApp',
            'text' => 'Important notifications'
        ],

        [
            'icon' => 'bi-bell',
            'title' => 'Push',
            'text' => 'Service updates'
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
                        Digital Pooja
                    </a>

                </li>


                <li
                    class="breadcrumb-item active"
                    aria-current="page"
                >
                    Booking Confirmation
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

        <div
            class="row
                   justify-content-center
                   text-center"
        >

            <div class="col-12 col-lg-9">

                {{-- Success Icon --}}

                <div
                    class="mx-auto
                           rounded-circle
                           d-flex
                           align-items-center
                           justify-content-center
                           bg-success
                           bg-opacity-10
                           text-success
                           mb-4"
                    style="width:96px;height:96px;"
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
                           border
                           border-success-subtle
                           px-3
                           py-2"
                >

                    Payment Successful

                </span>


                <h1
                    class="font-serif
                           display-4
                           text-pn-brown
                           mt-3
                           mb-3"
                >

                    Your Digital Pooja is confirmed.

                </h1>


                <p
                    class="lead
                           text-secondary
                           col-lg-8
                           mx-auto
                           mb-4"
                >

                    Thank you for choosing Pooja Nilayam.
                    Your Digital Pooja booking has been successfully
                    confirmed.

                </p>


                <div
                    class="d-flex
                           flex-column
                           flex-sm-row
                           justify-content-center
                           gap-2"
                >

                    <a
                        href="#booking-details"
                        class="btn
                               btn-pn
                               btn-lg
                               px-4"
                    >

                        View Booking Details

                        <i
                            class="bi bi-arrow-down ms-2"
                        ></i>

                    </a>


                    <button
                        type="button"
                        class="btn
                               btn-pn-outline
                               btn-lg
                               px-4"
                    >

                        <i
                            class="bi bi-download me-2"
                        ></i>

                        Download Receipt

                    </button>

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
                   row-cols-1
                   row-cols-sm-2
                   g-3"
        >

            <div class="col">

                <div
                    class="card
                           border
                           border-warning-subtle
                           rounded-4
                           h-100"
                >

                    <div
                        class="card-body
                               p-4
                               d-flex
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
                                Booking ID
                            </small>


                            <strong
                                class="text-pn-brown"
                            >
                                {{ $booking['booking_id'] }}
                            </strong>

                        </div>


                        <button
                            type="button"
                            class="btn
                                   btn-pn-outline
                                   btn-sm"
                            aria-label="Copy booking ID"
                        >

                            <i class="bi bi-copy"></i>

                        </button>

                    </div>

                </div>

            </div>


            <div class="col">

                <div
                    class="card
                           border
                           border-warning-subtle
                           rounded-4
                           h-100"
                >

                    <div
                        class="card-body
                               p-4
                               d-flex
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
                                Reference ID
                            </small>


                            <strong
                                class="text-pn-brown"
                            >
                                {{ $booking['reference_id'] }}
                            </strong>

                        </div>


                        <button
                            type="button"
                            class="btn
                                   btn-pn-outline
                                   btn-sm"
                            aria-label="Copy reference ID"
                        >

                            <i class="bi bi-copy"></i>

                        </button>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- ============================================================
     BOOKING DETAILS
============================================================ --}}

<section
    id="booking-details"
    class="py-5 bg-light-subtle"
>

    <div class="container">

        <div
            class="row
                   g-4
                   align-items-start"
        >


            {{-- =================================================
                 POoja SUMMARY
            ================================================= --}}

            <div class="col-12 col-lg-8">

                <div
                    class="card
                           border
                           border-warning-subtle
                           rounded-5
                           overflow-hidden"
                >

                    <div class="row g-0">


                        {{-- Image --}}

                        <div class="col-12 col-md-5">

                            <div
                                class="position-relative
                                       h-100"
                            >

                                <img
                                    src="{{ Vite::asset('resources/images/home/' . $booking['image']) }}"
                                    class="img-fluid
                                           w-100
                                           h-100
                                           object-fit-cover"
                                    style="min-height:360px;"
                                    alt="{{ $booking['pooja_name'] }}"
                                    loading="eager"
                                >


                                <span
                                    class="position-absolute
                                           top-0
                                           start-0
                                           m-3
                                           badge
                                           rounded-pill
                                           bg-success
                                           px-3
                                           py-2"
                                >

                                    CONFIRMED

                                </span>

                            </div>

                        </div>


                        {{-- Details --}}

                        <div class="col-12 col-md-7">

                            <div
                                class="card-body
                                       p-4
                                       p-md-5"
                            >

                                <span
                                    class="small
                                           text-pn-primary
                                           fw-semibold
                                           text-uppercase"
                                >
                                    Digital Pooja
                                </span>


                                <h2
                                    class="font-serif
                                           display-6
                                           text-pn-brown
                                           mt-2
                                           mb-2"
                                >

                                    {{ $booking['pooja_name'] }}

                                </h2>


                                <p
                                    class="text-secondary
                                           mb-4"
                                >

                                    Dedicated to
                                    <strong>
                                        {{ $booking['god'] }}
                                    </strong>

                                </p>


                                <div
                                    class="vstack
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
                                                   text-pn-primary
                                                   flex-shrink-0"
                                            style="width:44px;height:44px;"
                                        >

                                            <i
                                                class="bi bi-calendar3"
                                            ></i>

                                        </div>


                                        <div>

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
                                                   text-pn-primary
                                                   flex-shrink-0"
                                            style="width:44px;height:44px;"
                                        >

                                            <i
                                                class="bi bi-clock"
                                            ></i>

                                        </div>


                                        <div>

                                            <small
                                                class="text-secondary
                                                       d-block"
                                            >
                                                Scheduled Time
                                            </small>


                                            <strong
                                                class="text-pn-brown"
                                            >
                                                {{ $booking['time'] }}
                                            </strong>

                                        </div>

                                    </div>


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
                                                   text-pn-primary
                                                   flex-shrink-0"
                                            style="width:44px;height:44px;"
                                        >

                                            <i
                                                class="bi bi-person"
                                            ></i>

                                        </div>


                                        <div>

                                            <small
                                                class="text-secondary
                                                       d-block"
                                            >
                                                Devotee
                                            </small>


                                            <strong
                                                class="text-pn-brown"
                                            >
                                                {{ $booking['devotee'] }}
                                            </strong>

                                        </div>

                                    </div>


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
                                                   text-pn-primary
                                                   flex-shrink-0"
                                            style="width:44px;height:44px;"
                                        >

                                            <i
                                                class="bi bi-translate"
                                            ></i>

                                        </div>


                                        <div>

                                            <small
                                                class="text-secondary
                                                       d-block"
                                            >
                                                Language
                                            </small>


                                            <strong
                                                class="text-pn-brown"
                                            >
                                                {{ $booking['language'] }}
                                            </strong>

                                        </div>

                                    </div>


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
                                                   text-pn-primary
                                                   flex-shrink-0"
                                            style="width:44px;height:44px;"
                                        >

                                            <i
                                                class="bi bi-clock-history"
                                            ></i>

                                        </div>


                                        <div>

                                            <small
                                                class="text-secondary
                                                       d-block"
                                            >
                                                Duration
                                            </small>


                                            <strong
                                                class="text-pn-brown"
                                            >
                                                {{ $booking['duration'] }}
                                            </strong>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>


            {{-- =================================================
                 PAYMENT SUMMARY
            ================================================= --}}

            <div class="col-12 col-lg-4">

                <div
                    class="card
                           border
                           border-warning-subtle
                           rounded-4"
                >

                    <div class="card-body p-4 p-md-5">

                        <h2
                            class="font-serif
                                   h3
                                   text-pn-brown
                                   mb-4"
                        >

                            Payment Summary

                        </h2>


                        <div
                            class="d-flex
                                   justify-content-between
                                   mb-3"
                        >

                            <span
                                class="text-secondary"
                            >
                                Digital Pooja
                            </span>


                            <strong>
                                ₹{{ number_format($booking['amount']) }}
                            </strong>

                        </div>


                        <div
                            class="d-flex
                                   justify-content-between
                                   mb-3"
                        >

                            <span
                                class="text-secondary"
                            >
                                Payment Status
                            </span>


                            <span
                                class="badge
                                       rounded-pill
                                       bg-success-subtle
                                       text-success-emphasis"
                            >

                                <i
                                    class="bi bi-check-circle-fill me-1"
                                ></i>

                                {{ $booking['payment_status'] }}

                            </span>

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
                                class="fw-semibold
                                       text-pn-brown"
                            >
                                Total Paid
                            </span>


                            <strong
                                class="font-serif
                                       fs-3
                                       text-pn-primary"
                            >

                                ₹{{ number_format($booking['amount']) }}

                            </strong>

                        </div>


                        <button
                            type="button"
                            class="btn
                                   btn-pn-outline
                                   w-100
                                   mt-4"
                        >

                            <i
                                class="bi bi-receipt me-2"
                            ></i>

                            View Payment Receipt

                        </button>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- ============================================================
     WHAT HAPPENS NEXT
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
                What Happens Next
            </span>


            <h2
                class="font-serif
                       display-6
                       text-pn-brown
                       mt-2"
            >

                Your devotional journey continues.

            </h2>


            <div
                class="pn-divider
                       mx-auto
                       my-3"
            ></div>


            <p
                class="text-secondary
                       col-lg-7
                       mx-auto
                       mb-0"
            >

                Your booking is confirmed. The following steps will
                guide you through the Digital Pooja experience.

            </p>

        </div>


        <div
            class="row
                   row-cols-1
                   row-cols-md-2
                   g-4"
        >

            @foreach($nextSteps as $step)

                <div class="col">

                    <div
                        class="card
                               border
                               border-warning-subtle
                               rounded-4
                               h-100"
                    >

                        <div
                            class="card-body
                                   p-4
                                   d-flex
                                   align-items-start
                                   gap-3"
                        >

                            <span
                                class="badge
                                       rounded-pill
                                       bg-pn-beige
                                       text-pn-primary
                                       px-3
                                       py-2"
                            >

                                {{ $step['number'] }}

                            </span>


                            <div
                                class="rounded-circle
                                       d-flex
                                       align-items-center
                                       justify-content-center
                                       bg-pn-cream
                                       text-pn-primary
                                       flex-shrink-0"
                                style="width:50px;height:50px;"
                            >

                                <i
                                    class="bi {{ $step['icon'] }}"
                                ></i>

                            </div>


                            <div>

                                <h3
                                    class="font-serif
                                           h5
                                           text-pn-brown"
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

                        </div>

                    </div>

                </div>

            @endforeach

        </div>

    </div>

</section>


{{-- ============================================================
     NOTIFICATIONS
============================================================ --}}

<section class="py-5 bg-pn-cream">

    <div class="container">

        <div
            class="row
                   justify-content-center"
        >

            <div class="col-12 col-xl-10">

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
                        Stay Updated
                    </span>


                    <h2
                        class="font-serif
                               display-6
                               text-pn-brown
                               mt-2"
                    >

                        We'll keep you informed.

                    </h2>


                    <p
                        class="text-secondary
                               mb-0"
                    >

                        Pooja Nilayam supports multiple notification
                        channels for important service updates.

                    </p>

                </div>


                <div
                    class="row
                           row-cols-2
                           row-cols-md-4
                           g-3"
                >

                    @foreach($notifications as $notification)

                        <div class="col">

                            <div
                                class="card
                                       border-0
                                       bg-white
                                       rounded-4
                                       text-center
                                       h-100"
                            >

                                <div
                                    class="card-body
                                           p-4"
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
                                            class="bi {{ $notification['icon'] }}"
                                        ></i>

                                    </div>


                                    <h3
                                        class="font-serif
                                               h6
                                               text-pn-brown
                                               mt-3
                                               mb-1"
                                    >

                                        {{ $notification['title'] }}

                                    </h3>


                                    <p
                                        class="small
                                               text-secondary
                                               mb-0"
                                    >

                                        {{ $notification['text'] }}

                                    </p>

                                </div>

                            </div>

                        </div>

                    @endforeach

                </div>

            </div>

        </div>

    </div>

</section>


{{-- ============================================================
     DIGITAL POOJA EXPERIENCE
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
                class="row
                       align-items-center"
            >

                <div class="col-12 col-lg-7">

                    <div
                        class="p-4
                               p-md-5"
                    >

                        <span
                            class="small
                                   text-warning
                                   fw-semibold
                                   text-uppercase"
                        >
                            Your Digital Pooja
                        </span>


                        <h2
                            class="font-serif
                                   display-6
                                   mt-2
                                   mb-3"
                        >

                            A personalized devotional experience
                            awaits you.

                        </h2>


                        <p
                            class="text-white-50
                                   mb-4"
                        >

                            Your Digital Pooja journey is designed around
                            the details and preferences you provide,
                            including the planned personalized Sankalpam,
                            flowers, deepam, language and devotional
                            experience.

                        </p>


                        <div
                            class="row
                                   row-cols-2
                                   g-3"
                        >

                            <div class="col">

                                <div
                                    class="d-flex
                                           align-items-center
                                           gap-2"
                                >

                                    <i
                                        class="bi bi-stars
                                               text-warning"
                                    ></i>


                                    <small>
                                        AI Sankalpam
                                    </small>

                                </div>

                            </div>


                            <div class="col">

                                <div
                                    class="d-flex
                                           align-items-center
                                           gap-2"
                                >

                                    <i
                                        class="bi bi-flower1
                                               text-warning"
                                    ></i>


                                    <small>
                                        Flowers
                                    </small>

                                </div>

                            </div>


                            <div class="col">

                                <div
                                    class="d-flex
                                           align-items-center
                                           gap-2"
                                >

                                    <i
                                        class="bi bi-brightness-high
                                               text-warning"
                                    ></i>


                                    <small>
                                        Deepam
                                    </small>

                                </div>

                            </div>


                            <div class="col">

                                <div
                                    class="d-flex
                                           align-items-center
                                           gap-2"
                                >

                                    <i
                                        class="bi bi-award
                                               text-warning"
                                    ></i>


                                    <small>
                                        Certificate
                                    </small>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>


                <div class="col-12 col-lg-5">

                    <div
                        class="text-center
                               p-4
                               p-md-5"
                    >

                        <div
                            class="mx-auto
                                   rounded-circle
                                   d-flex
                                   align-items-center
                                   justify-content-center
                                   bg-warning
                                   text-dark"
                            style="width:170px;height:170px;"
                        >

                            <i
                                class="bi bi-stars"
                                style="font-size:5rem;"
                            ></i>

                        </div>


                        <p
                            class="small
                                   text-white-50
                                   mt-3
                                   mb-0"
                        >

                            Your sacred journey begins here.

                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- ============================================================
     QUICK ACTIONS
============================================================ --}}

<section class="py-5 bg-light-subtle">

    <div class="container">

        <div
            class="row
                   row-cols-1
                   row-cols-sm-2
                   row-cols-lg-4
                   g-3"
        >

            <div class="col">

                <a
                    href="#"
                    class="card
                           border
                           border-warning-subtle
                           rounded-4
                           h-100
                           text-decoration-none"
                >

                    <div class="card-body p-4">

                        <i
                            class="bi bi-calendar-check
                                   text-pn-primary
                                   fs-3"
                        ></i>


                        <h3
                            class="font-serif
                                   h5
                                   text-pn-brown
                                   mt-3"
                        >
                            My Booking
                        </h3>


                        <p
                            class="small
                                   text-secondary
                                   mb-0"
                        >
                            View your booking details and status.
                        </p>

                    </div>

                </a>

            </div>


            <div class="col">

                <a
                    href="#"
                    class="card
                           border
                           border-warning-subtle
                           rounded-4
                           h-100
                           text-decoration-none"
                >

                    <div class="card-body p-4">

                        <i
                            class="bi bi-person-circle
                                   text-pn-primary
                                   fs-3"
                        ></i>


                        <h3
                            class="font-serif
                                   h5
                                   text-pn-brown
                                   mt-3"
                        >
                            My Dashboard
                        </h3>


                        <p
                            class="small
                                   text-secondary
                                   mb-0"
                        >
                            Manage your bookings and profile.
                        </p>

                    </div>

                </a>

            </div>


            <div class="col">

                <a
                    href="#"
                    class="card
                           border
                           border-warning-subtle
                           rounded-4
                           h-100
                           text-decoration-none"
                >

                    <div class="card-body p-4">

                        <i
                            class="bi bi-question-circle
                                   text-pn-primary
                                   fs-3"
                        ></i>


                        <h3
                            class="font-serif
                                   h5
                                   text-pn-brown
                                   mt-3"
                        >
                            Help Center
                        </h3>


                        <p
                            class="small
                                   text-secondary
                                   mb-0"
                        >
                            Find answers to common questions.
                        </p>

                    </div>

                </a>

            </div>


            <div class="col">

                <a
                    href="#"
                    class="card
                           border
                           border-warning-subtle
                           rounded-4
                           h-100
                           text-decoration-none"
                >

                    <div class="card-body p-4">

                        <i
                            class="bi bi-headset
                                   text-pn-primary
                                   fs-3"
                        ></i>


                        <h3
                            class="font-serif
                                   h5
                                   text-pn-brown
                                   mt-3"
                        >
                            Contact Support
                        </h3>


                        <p
                            class="small
                                   text-secondary
                                   mb-0"
                        >
                            Get assistance with your booking.
                        </p>

                    </div>

                </a>

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
                    class="bi bi-flower1
                           display-5
                           text-warning"
                ></i>


                <h2
                    class="font-serif
                           display-6
                           mt-3"
                >

                    Your booking is complete.

                </h2>


                <p
                    class="text-white-50
                           col-lg-7
                           mx-auto"
                >

                    May your Digital Pooja bring peace, positivity
                    and blessings to you and your family.

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

                        Go to My Dashboard

                        <i
                            class="bi bi-arrow-right ms-2"
                        ></i>

                    </a>


                    <a
                        href="{{ url('/') }}"
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