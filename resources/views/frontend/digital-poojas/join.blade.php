@extends('layouts.app')

@section('title', 'Join Live Pooja | Pooja Nilayam')

@section(
    'meta_description',
    'Join your scheduled Live Pooja with Pooja Nilayam.'
)

@section('content')

@php

    /*
    |--------------------------------------------------------------------------
    | TEMPORARY FRONTEND DATA
    |--------------------------------------------------------------------------
    | These values will later come from the authenticated user's
    | confirmed booking/session.
    |--------------------------------------------------------------------------
    */

    $booking = [

        'booking_id' => 'PN-DP-20260811-1024',

        'reference_id' => 'PN-REF-784521',

        'pooja_name' => 'Ganapathi Pooja',

        'god' => 'Lord Ganesha',

        'temple' => 'Pooja Nilayam',

        'priest' => 'Sri Venkateshwara Sharma',

        'date' => '11 August 2026',

        'time' => '07:00 PM',

        'timezone' => 'IST (India Standard Time)',

        'duration' => '60 Minutes',

        'language' => 'Telugu',

        'status' => 'Scheduled',

        'meet_link' => '#',

        'image' => 'ganapathi.jpg'

    ];


    /*
    |--------------------------------------------------------------------------
    | Reminder Timeline
    |--------------------------------------------------------------------------
    */

    $reminders = [

        [
            'icon' => 'bi-bell',
            'title' => '1 Hour Before',
            'text' => 'You will receive a reminder before the Live Pooja begins.'
        ],

        [
            'icon' => 'bi-alarm',
            'title' => '15 Minutes Before',
            'text' => 'A second reminder will help you get ready to join.'
        ],

        [
            'icon' => 'bi-hourglass-split',
            'title' => '5 Minutes Before',
            'text' => 'Final reminder before the Live Pooja starts.'
        ]

    ];


    /*
    |--------------------------------------------------------------------------
    | Live Experience
    |--------------------------------------------------------------------------
    */

    $liveFeatures = [

        [
            'icon' => 'bi-camera-video',
            'title' => 'Live Video',
            'text' => 'Join the scheduled Live Pooja session.'
        ],

        [
            'icon' => 'bi-badge-hd',
            'title' => 'High Quality Video',
            'text' => 'The planned experience targets 1080p minimum video quality.'
        ],

        [
            'icon' => 'bi-volume-up',
            'title' => 'Enhanced Audio',
            'text' => 'Noise cancellation is part of the planned live experience.'
        ],

        [
            'icon' => 'bi-sun',
            'title' => 'Video Enhancement',
            'text' => 'Auto lighting and video enhancement are planned.'
        ],

        [
            'icon' => 'bi-record-circle',
            'title' => 'Auto Recording',
            'text' => 'The live session is planned to support automatic recording.'
        ],

        [
            'icon' => 'bi-images',
            'title' => 'Photos & Videos',
            'text' => 'Photos and videos can be shared after the pooja.'
        ]

    ];


    /*
    |--------------------------------------------------------------------------
    | Before You Join
    |--------------------------------------------------------------------------
    */

    $checklist = [

        'Keep a stable internet connection ready.',

        'Join from a quiet and comfortable place.',

        'Keep your family members ready if they are participating.',

        'Keep any required devotional items ready.',

        'Use headphones or a suitable audio device if needed.',

        'Join a few minutes before the scheduled start time.'

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
                        Digital Pooja
                    </a>

                </li>


                <li
                    class="breadcrumb-item active"
                    aria-current="page"
                >
                    Join Live Pooja
                </li>

            </ol>

        </nav>

    </div>

</section>


{{-- ============================================================
     SESSION STATUS
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
                    class="badge
                           rounded-pill
                           bg-success-subtle
                           text-success-emphasis
                           border
                           border-success-subtle
                           px-3
                           py-2"
                >

                    <i
                        class="bi bi-check-circle-fill me-1"
                    ></i>

                    Booking Confirmed

                </span>


                <h1
                    class="font-serif
                           display-5
                           text-pn-brown
                           mt-3
                           mb-3"
                >

                    Your Live Pooja is scheduled.

                </h1>


                <p
                    class="lead
                           text-secondary
                           mb-0"
                >

                    Join your devotional experience at the scheduled
                    time using the secure meeting link.

                </p>

            </div>

        </div>

    </div>

</section>


{{-- ============================================================
     BOOKING SUMMARY
============================================================ --}}

<section class="py-5 bg-light-subtle">

    <div class="container">

        <div class="row g-4">


            {{-- =================================================
                 LEFT: SESSION CARD
            ================================================= --}}

            <div class="col-12 col-lg-8">

                <div
                    class="card
                           border
                           border-warning-subtle
                           rounded-5
                           overflow-hidden
                           h-100"
                >

                    <div class="row g-0">


                        {{-- Image --}}

                        <div class="col-12 col-md-5">

                            <div
                                class="h-100
                                       position-relative"
                            >

                                <img
                                    src="{{ Vite::asset('resources/images/home/' . $booking['image']) }}"
                                    class="img-fluid
                                           w-100
                                           h-100
                                           object-fit-cover"
                                    style="min-height:300px;"
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
                                           bg-pn-primary
                                           px-3
                                           py-2"
                                >

                                    LIVE POOJA

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
                                    Scheduled Live Session
                                </span>


                                <h2
                                    class="font-serif
                                           h2
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

                                    Dedicated to {{ $booking['god'] }}

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
                                                   text-pn-primary"
                                            style="width:42px;height:42px;"
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
                                                   text-pn-primary"
                                            style="width:42px;height:42px;"
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
                                                Time
                                            </small>


                                            <strong
                                                class="text-pn-brown"
                                            >
                                                {{ $booking['time'] }}
                                            </strong>


                                            <small
                                                class="text-secondary
                                                       d-block"
                                            >
                                                {{ $booking['timezone'] }}
                                            </small>

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
                                                   text-pn-primary"
                                            style="width:42px;height:42px;"
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
                                                Priest
                                            </small>


                                            <strong
                                                class="text-pn-brown"
                                            >
                                                {{ $booking['priest'] }}
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
                                                   text-pn-primary"
                                            style="width:42px;height:42px;"
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

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>


            {{-- =================================================
                 RIGHT: JOIN CARD
            ================================================= --}}

            <div class="col-12 col-lg-4">

                <div
                    class="card
                           border-0
                           rounded-5
                           h-100
                           text-white
                           overflow-hidden"
                >

                    <div
                        class="pn-digital
                               h-100"
                    >

                        <div
                            class="card-body
                                   p-4
                                   p-md-5
                                   d-flex
                                   flex-column
                                   justify-content-center
                                   text-center"
                        >

                            <div
                                class="mx-auto
                                       rounded-circle
                                       d-flex
                                       align-items-center
                                       justify-content-center
                                       bg-warning
                                       text-dark
                                       mb-4"
                                style="width:90px;height:90px;"
                            >

                                <i
                                    class="bi bi-camera-video-fill
                                           fs-1"
                                ></i>

                            </div>


                            <span
                                class="small
                                       text-warning
                                       fw-semibold
                                       text-uppercase"
                            >
                                Your session
                            </span>


                            <h2
                                class="font-serif
                                       h2
                                       mt-2"
                            >

                                Ready to join?

                            </h2>


                            <p
                                class="small
                                       text-white-50"
                            >

                                The Join button will become available
                                when the Live Pooja session is ready.

                            </p>


                            <div
                                class="bg-white
                                       bg-opacity-10
                                       rounded-4
                                       p-3
                                       my-3"
                            >

                                <small
                                    class="text-white-50
                                           d-block"
                                >
                                    Scheduled Start
                                </small>


                                <strong
                                    class="fs-4"
                                >
                                    {{ $booking['time'] }}
                                </strong>

                            </div>


                            <a
                                href="{{ $booking['meet_link'] }}"
                                class="btn
                                       btn-warning
                                       text-dark
                                       fw-semibold
                                       btn-lg
                                       w-100
                                       disabled"
                                aria-disabled="true"
                            >

                                <i
                                    class="bi bi-camera-video-fill
                                           me-2"
                                ></i>

                                Join Live Pooja

                            </a>


                            <small
                                class="text-white-50
                                       mt-3"
                            >

                                Meeting access will be enabled
                                according to the scheduled session.

                            </small>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- ============================================================
     COUNTDOWN / UPCOMING SESSION
============================================================ --}}

<section class="py-5">

    <div class="container">

        <div
            class="card
                   border
                   border-warning-subtle
                   rounded-5
                   overflow-hidden"
        >

            <div
                class="card-body
                       p-4
                       p-md-5"
            >

                <div
                    class="row
                           align-items-center
                           g-4"
                >

                    <div class="col-12 col-lg-7">

                        <span
                            class="small
                                   text-pn-gold
                                   fw-semibold
                                   text-uppercase"
                        >
                            Upcoming Session
                        </span>


                        <h2
                            class="font-serif
                                   display-6
                                   text-pn-brown
                                   mt-2
                                   mb-3"
                        >

                            Your sacred moment is getting closer.

                        </h2>


                        <p
                            class="text-secondary
                                   mb-0"
                        >

                            Please be ready a few minutes before the
                            scheduled start time. You will receive
                            reminders before the session.

                        </p>

                    </div>


                    <div class="col-12 col-lg-5">

                        <div
                            class="row
                                   row-cols-3
                                   g-2
                                   text-center"
                        >

                            <div class="col">

                                <div
                                    class="bg-pn-cream
                                           rounded-4
                                           p-3"
                                >

                                    <strong
                                        class="display-6
                                               font-serif
                                               text-pn-primary"
                                    >
                                        02
                                    </strong>

                                    <small
                                        class="d-block
                                               text-secondary"
                                    >
                                        Days
                                    </small>

                                </div>

                            </div>


                            <div class="col">

                                <div
                                    class="bg-pn-cream
                                           rounded-4
                                           p-3"
                                >

                                    <strong
                                        class="display-6
                                               font-serif
                                               text-pn-primary"
                                    >
                                        05
                                    </strong>

                                    <small
                                        class="d-block
                                               text-secondary"
                                    >
                                        Hours
                                    </small>

                                </div>

                            </div>


                            <div class="col">

                                <div
                                    class="bg-pn-cream
                                           rounded-4
                                           p-3"
                                >

                                    <strong
                                        class="display-6
                                               font-serif
                                               text-pn-primary"
                                    >
                                        24
                                    </strong>

                                    <small
                                        class="d-block
                                               text-secondary"
                                    >
                                        Minutes
                                    </small>

                                </div>

                            </div>

                        </div>


                        <small
                            class="text-secondary
                                   d-block
                                   text-center
                                   mt-2"
                        >
                            Sample countdown — backend timer will
                            replace this during integration.
                        </small>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- ============================================================
     REMINDERS
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
                Stay Ready
            </span>


            <h2
                class="font-serif
                       display-6
                       text-pn-brown
                       mt-2"
            >
                You won't miss the session.
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

                The planned live-puja flow includes multiple reminders
                before your scheduled session.

            </p>

        </div>


        <div
            class="row
                   row-cols-1
                   row-cols-md-3
                   g-4"
        >

            @foreach($reminders as $reminder)

                <div class="col">

                    <div
                        class="card
                               border-0
                               bg-white
                               rounded-4
                               h-100"
                    >

                        <div
                            class="card-body
                                   p-4
                                   text-center"
                        >

                            <div
                                class="mx-auto
                                       rounded-circle
                                       d-flex
                                       align-items-center
                                       justify-content-center
                                       bg-pn-beige
                                       text-pn-primary
                                       fs-4
                                       mb-3"
                                style="width:60px;height:60px;"
                            >

                                <i
                                    class="bi {{ $reminder['icon'] }}"
                                ></i>

                            </div>


                            <h3
                                class="font-serif
                                       h5
                                       text-pn-brown"
                            >

                                {{ $reminder['title'] }}

                            </h3>


                            <p
                                class="small
                                       text-secondary
                                       mb-0"
                            >

                                {{ $reminder['text'] }}

                            </p>

                        </div>

                    </div>

                </div>

            @endforeach

        </div>

    </div>

</section>


{{-- ============================================================
     BEFORE YOU JOIN
============================================================ --}}

<section class="py-5">

    <div class="container">

        <div class="row g-5 align-items-start">


            <div class="col-12 col-lg-5">

                <span
                    class="small
                           text-pn-gold
                           fw-semibold
                           text-uppercase"
                >
                    Before You Join
                </span>


                <h2
                    class="font-serif
                           display-6
                           text-pn-brown
                           mt-2
                           mb-3"
                >

                    Prepare for your devotional experience.

                </h2>


                <div class="pn-divider mb-4"></div>


                <p
                    class="text-secondary
                           mb-0"
                >

                    A few simple preparations can help you and your
                    family participate comfortably in the Live Pooja.

                </p>

            </div>


            <div class="col-12 col-lg-7">

                <div class="vstack gap-3">

                    @foreach($checklist as $index => $item)

                        <div
                            class="d-flex
                                   align-items-start
                                   gap-3"
                        >

                            <div
                                class="rounded-circle
                                       d-flex
                                       align-items-center
                                       justify-content-center
                                       bg-pn-cream
                                       text-pn-primary
                                       flex-shrink-0"
                                style="width:42px;height:42px;"
                            >

                                <i class="bi bi-check-lg"></i>

                            </div>


                            <div>

                                <p
                                    class="text-secondary
                                           mb-0
                                           pt-2"
                                >

                                    {{ $item }}

                                </p>

                            </div>

                        </div>

                    @endforeach

                </div>

            </div>

        </div>

    </div>

</section>


{{-- ============================================================
     LIVE EXPERIENCE FEATURES
============================================================ --}}

<section class="py-5 bg-light-subtle">

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
                Live Experience
            </span>


            <h2
                class="font-serif
                       display-6
                       text-pn-brown
                       mt-2"
            >
                Designed for a meaningful live session.
            </h2>


            <div
                class="pn-divider
                       mx-auto
                       my-3"
            ></div>

        </div>


        <div
            class="row
                   row-cols-1
                   row-cols-sm-2
                   row-cols-lg-3
                   g-4"
        >

            @foreach($liveFeatures as $feature)

                <div class="col">

                    <div
                        class="card
                               border
                               border-warning-subtle
                               rounded-4
                               h-100"
                    >

                        <div class="card-body p-4">

                            <div
                                class="rounded-circle
                                       d-flex
                                       align-items-center
                                       justify-content-center
                                       bg-pn-cream
                                       text-pn-primary
                                       fs-5
                                       mb-3"
                                style="width:52px;height:52px;"
                            >

                                <i
                                    class="bi {{ $feature['icon'] }}"
                                ></i>

                            </div>


                            <h3
                                class="font-serif
                                       h5
                                       text-pn-brown"
                            >

                                {{ $feature['title'] }}

                            </h3>


                            <p
                                class="small
                                       text-secondary
                                       mb-0"
                            >

                                {{ $feature['text'] }}

                            </p>

                        </div>

                    </div>

                </div>

            @endforeach

        </div>

    </div>

</section>


{{-- ============================================================
     BOOKING REFERENCES
============================================================ --}}

<section class="py-5">

    <div class="container">

        <div
            class="row
                   row-cols-1
                   row-cols-md-2
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
                               p-4"
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
                                   justify-content-between
                                   gap-3"
                        >

                            <strong
                                class="text-pn-brown"
                            >
                                {{ $booking['booking_id'] }}
                            </strong>


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
                               p-4"
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
                                   justify-content-between
                                   gap-3"
                        >

                            <strong
                                class="text-pn-brown"
                            >
                                {{ $booking['reference_id'] }}
                            </strong>


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

    </div>

</section>


{{-- ============================================================
     SUPPORT CTA
============================================================ --}}

<section class="py-5 bg-pn-cream">

    <div class="container">

        <div
            class="row
                   justify-content-center"
        >

            <div class="col-12 col-lg-8">

                <div
                    class="text-center"
                >

                    <i
                        class="bi bi-headset
                               display-5
                               text-pn-primary"
                    ></i>


                    <h2
                        class="font-serif
                               display-6
                               text-pn-brown
                               mt-3"
                    >

                        Need help before your session?

                    </h2>


                    <p
                        class="text-secondary"
                    >

                        If you have questions about your booking or
                        joining the Live Pooja, our support team can help.

                    </p>


                    <a
                        href="#"
                        class="btn btn-pn"
                    >

                        Contact Support

                        <i
                            class="bi bi-arrow-right ms-2"
                        ></i>

                    </a>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- ============================================================
     FINAL JOIN CTA
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

                <div
                    class="mx-auto
                           rounded-circle
                           d-flex
                           align-items-center
                           justify-content-center
                           bg-warning
                           text-dark
                           mb-3"
                    style="width:70px;height:70px;"
                >

                    <i
                        class="bi bi-camera-video-fill
                               fs-3"
                    ></i>

                </div>


                <span
                    class="small
                           text-warning
                           fw-semibold
                           text-uppercase"
                >
                    {{ $booking['date'] }}
                    ·
                    {{ $booking['time'] }}
                </span>


                <h2
                    class="font-serif
                           display-6
                           mt-2"
                >

                    Join your Live Pooja.

                </h2>


                <p
                    class="text-white-50
                           col-lg-7
                           mx-auto"
                >

                    The meeting link will be activated when your
                    scheduled session is ready.

                </p>


                <a
                    href="{{ $booking['meet_link'] }}"
                    class="btn
                           btn-warning
                           text-dark
                           fw-semibold
                           btn-lg
                           px-4
                           disabled"
                    aria-disabled="true"
                >

                    <i
                        class="bi bi-camera-video-fill
                               me-2"
                    ></i>

                    Join Live Pooja

                </a>

            </div>

        </div>

    </div>

</section>

@endsection