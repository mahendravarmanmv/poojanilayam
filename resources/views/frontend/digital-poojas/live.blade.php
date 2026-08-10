@extends('layouts.app')

@section('title', 'Live Pooja | Pooja Nilayam')

@section(
    'meta_description',
    'Join your live devotional Pooja experience with Pooja Nilayam.'
)

@section('content')

@php

    /*
    |--------------------------------------------------------------------------
    | TEMPORARY LIVE SESSION DATA
    |--------------------------------------------------------------------------
    | Frontend prototype only.
    | These values will later come from the live-session backend.
    |--------------------------------------------------------------------------
    */

    $session = [

        'booking_id' => 'PN-DP-20260811-1024',

        'reference_id' => 'PN-REF-784521',

        'pooja_name' => 'Ganapathi Live Pooja',

        'god' => 'Lord Ganesha',

        'priest' => 'Sri Venkateshwara Sharma',

        'temple' => 'Pooja Nilayam',

        'date' => '11 August 2026',

        'time' => '07:00 PM',

        'language' => 'Telugu',

        'duration' => '60 Minutes',

        'status' => 'LIVE',

        'platform' => 'Google Meet',

        'image' => 'ganapathi.jpg'

    ];


    /*
    |--------------------------------------------------------------------------
    | Session Information
    |--------------------------------------------------------------------------
    */

    $sessionInfo = [

        [
            'icon' => 'bi-person',
            'label' => 'Priest',
            'value' => $session['priest']
        ],

        [
            'icon' => 'bi-building',
            'label' => 'Temple',
            'value' => $session['temple']
        ],

        [
            'icon' => 'bi-translate',
            'label' => 'Language',
            'value' => $session['language']
        ],

        [
            'icon' => 'bi-clock',
            'label' => 'Duration',
            'value' => $session['duration']
        ]

    ];


    /*
    |--------------------------------------------------------------------------
    | Live Session Features
    |--------------------------------------------------------------------------
    */

    $features = [

        [
            'icon' => 'bi-camera-video',
            'title' => 'Live Video',
            'text' => 'Participate in your scheduled Live Pooja session.'
        ],

        [
            'icon' => 'bi-badge-hd',
            'title' => 'High Quality',
            'text' => 'The planned experience targets a minimum 1080p video quality.'
        ],

        [
            'icon' => 'bi-volume-up',
            'title' => 'Noise Cancellation',
            'text' => 'Enhanced audio experience with planned noise cancellation.'
        ],

        [
            'icon' => 'bi-sun',
            'title' => 'Video Enhancement',
            'text' => 'Planned video enhancement and auto lighting support.'
        ],

        [
            'icon' => 'bi-record-circle',
            'title' => 'Auto Recording',
            'text' => 'The session is planned to support automatic recording.'
        ],

        [
            'icon' => 'bi-cloud-arrow-up',
            'title' => 'Recording Storage',
            'text' => 'Recorded content can be stored for later access.'
        ]

    ];


    /*
    |--------------------------------------------------------------------------
    | Participant Guidelines
    |--------------------------------------------------------------------------
    */

    $guidelines = [

        'Keep your internet connection stable during the session.',

        'Keep your microphone muted unless participation is required.',

        'Use a quiet and comfortable place for the devotional experience.',

        'Keep your family members nearby if they are participating.',

        'Avoid refreshing or closing the session while the Pooja is in progress.'

    ];

@endphp


{{-- ============================================================
     LIVE HEADER
============================================================ --}}

<header
    class="bg-dark
           text-white
           border-bottom
           border-secondary"
>

    <div class="container-fluid px-3 px-lg-4">

        <div
            class="d-flex
                   align-items-center
                   justify-content-between
                   gap-3
                   py-3"
        >

            {{-- Brand / Session --}}

            <div
                class="d-flex
                       align-items-center
                       gap-3
                       min-w-0"
            >

                <a
                    href="{{ route('home') }}"
                    class="text-white
                           text-decoration-none
                           fw-semibold
                           d-none
                           d-md-inline-block"
                >

                    Pooja Nilayam

                </a>


                <span
                    class="text-secondary
                           d-none
                           d-md-inline"
                >
                    /
                </span>


                <div class="min-w-0">

                    <strong
                        class="d-block
                               text-truncate"
                    >

                        {{ $session['pooja_name'] }}

                    </strong>


                    <small
                        class="text-white-50"
                    >

                        {{ $session['temple'] }}

                    </small>

                </div>

            </div>


            {{-- Live Status --}}

            <div
                class="d-flex
                       align-items-center
                       gap-2
                       flex-shrink-0"
            >

                <span
                    class="d-inline-flex
                           align-items-center
                           gap-2
                           badge
                           rounded-pill
                           bg-danger
                           px-3
                           py-2"
                >

                    <span
                        class="rounded-circle
                               bg-white"
                        style="width:7px;height:7px;"
                    ></span>

                    LIVE

                </span>


                <span
                    class="small
                           text-white-50
                           d-none
                           d-sm-inline"
                >

                    {{ $session['platform'] }}

                </span>

            </div>

        </div>

    </div>

</header>


{{-- ============================================================
     MAIN LIVE AREA
============================================================ --}}

<main class="bg-black text-white min-vh-100">

    <div class="container-fluid px-3 px-lg-4 py-3 py-lg-4">

        <div class="row g-3">


            {{-- =================================================
                 VIDEO AREA
            ================================================= --}}

            <div class="col-12 col-xl-8">

                <section
                    class="position-relative
                           bg-dark
                           rounded-4
                           overflow-hidden"
                >

                    {{-- Video Placeholder --}}

                    <div
                        class="ratio ratio-16x9
                               bg-black"
                    >

                        <div
                            class="d-flex
                                   align-items-center
                                   justify-content-center
                                   position-absolute
                                   top-0
                                   start-0
                                   end-0
                                   bottom-0"
                        >

                            <div
                                class="text-center
                                       px-4"
                            >

                                <div
                                    class="mx-auto
                                           rounded-circle
                                           d-flex
                                           align-items-center
                                           justify-content-center
                                           bg-secondary
                                           bg-opacity-25
                                           mb-3"
                                    style="width:90px;height:90px;"
                                >

                                    <i
                                        class="bi bi-camera-video
                                               display-5
                                               text-white-50"
                                    ></i>

                                </div>


                                <span
                                    class="badge
                                           rounded-pill
                                           bg-danger
                                           mb-3"
                                >

                                    LIVE SESSION

                                </span>


                                <h2
                                    class="font-serif
                                           h3"
                                >

                                    {{ $session['pooja_name'] }}

                                </h2>


                                <p
                                    class="text-white-50
                                           small
                                           mb-0"
                                >

                                    Live video will appear here when
                                    the streaming integration is connected.

                                </p>

                            </div>

                        </div>

                    </div>


                    {{-- Top Video Information --}}

                    <div
                        class="position-absolute
                               top-0
                               start-0
                               end-0
                               p-3"
                    >

                        <div
                            class="d-flex
                                   align-items-center
                                   justify-content-between
                                   gap-3"
                        >

                            <span
                                class="badge
                                       rounded-pill
                                       bg-dark
                                       bg-opacity-75
                                       px-3
                                       py-2"
                            >

                                <i
                                    class="bi bi-camera-video-fill
                                           text-danger
                                           me-1"
                                ></i>

                                Live Pooja

                            </span>


                            <span
                                class="badge
                                       rounded-pill
                                       bg-dark
                                       bg-opacity-75
                                       px-3
                                       py-2"
                            >

                                <i
                                    class="bi bi-clock me-1"
                                ></i>

                                00:18:42

                            </span>

                        </div>

                    </div>


                    {{-- Bottom Controls --}}

                    <div
                        class="position-absolute
                               bottom-0
                               start-0
                               end-0
                               p-3"
                    >

                        <div
                            class="bg-dark
                                   bg-opacity-75
                                   rounded-4
                                   p-2"
                        >

                            <div
                                class="d-flex
                                       align-items-center
                                       justify-content-between
                                       gap-2"
                            >

                                <div
                                    class="d-flex
                                           align-items-center
                                           gap-2"
                                >

                                    <button
                                        type="button"
                                        class="btn
                                               btn-dark
                                               border
                                               border-secondary
                                               rounded-circle"
                                        style="width:42px;height:42px;"
                                        aria-label="Mute"
                                    >

                                        <i
                                            class="bi bi-mic-mute"
                                        ></i>

                                    </button>


                                    <button
                                        type="button"
                                        class="btn
                                               btn-dark
                                               border
                                               border-secondary
                                               rounded-circle"
                                        style="width:42px;height:42px;"
                                        aria-label="Camera"
                                    >

                                        <i
                                            class="bi bi-camera-video"
                                        ></i>

                                    </button>


                                    <button
                                        type="button"
                                        class="btn
                                               btn-dark
                                               border
                                               border-secondary
                                               rounded-circle
                                               d-none
                                               d-sm-inline-flex"
                                        style="width:42px;height:42px;"
                                        aria-label="Fullscreen"
                                    >

                                        <i
                                            class="bi bi-arrows-fullscreen"
                                        ></i>

                                    </button>

                                </div>


                                <div>

                                    <button
                                        type="button"
                                        class="btn
                                               btn-danger
                                               rounded-pill
                                               px-3"
                                    >

                                        <i
                                            class="bi bi-box-arrow-right
                                                   me-1"
                                        ></i>

                                        Leave

                                    </button>

                                </div>

                            </div>

                        </div>

                    </div>

                </section>


                {{-- Session Info under video --}}

                <div
                    class="row
                           row-cols-2
                           row-cols-md-4
                           g-2
                           mt-1"
                >

                    @foreach($sessionInfo as $info)

                        <div class="col">

                            <div
                                class="bg-dark
                                       rounded-3
                                       p-3
                                       h-100"
                            >

                                <i
                                    class="bi {{ $info['icon'] }}
                                           text-warning"
                                ></i>


                                <small
                                    class="text-white-50
                                           d-block
                                           mt-2"
                                >

                                    {{ $info['label'] }}

                                </small>


                                <strong
                                    class="small
                                           d-block
                                           text-truncate"
                                >

                                    {{ $info['value'] }}

                                </strong>

                            </div>

                        </div>

                    @endforeach

                </div>

            </div>


            {{-- =================================================
                 RIGHT SIDE
            ================================================= --}}

            <div class="col-12 col-xl-4">

                <div class="vstack gap-3">


                    {{-- Live Session Details --}}

                    <div
                        class="card
                               bg-dark
                               border-secondary
                               rounded-4
                               text-white"
                    >

                        <div class="card-body p-4">

                            <div
                                class="d-flex
                                       align-items-center
                                       justify-content-between
                                       mb-4"
                            >

                                <h2
                                    class="font-serif
                                           h4
                                           mb-0"
                                >

                                    Live Pooja

                                </h2>


                                <span
                                    class="badge
                                           bg-danger
                                           rounded-pill"
                                >

                                    LIVE

                                </span>

                            </div>


                            <div
                                class="d-flex
                                       align-items-center
                                       gap-3
                                       mb-4"
                            >

                                <img
                                    src="{{ Vite::asset('resources/images/home/' . $session['image']) }}"
                                    class="rounded-3
                                           object-fit-cover"
                                    style="width:64px;height:64px;"
                                    alt="{{ $session['pooja_name'] }}"
                                    loading="lazy"
                                >


                                <div>

                                    <h3
                                        class="h6
                                               mb-1"
                                    >

                                        {{ $session['pooja_name'] }}

                                    </h3>


                                    <small
                                        class="text-white-50"
                                    >

                                        {{ $session['god'] }}

                                    </small>

                                </div>

                            </div>


                            <div class="vstack gap-3">

                                <div
                                    class="d-flex
                                           justify-content-between"
                                >

                                    <span
                                        class="small
                                               text-white-50"
                                    >
                                        Priest
                                    </span>


                                    <strong
                                        class="small
                                               text-end"
                                    >

                                        {{ $session['priest'] }}

                                    </strong>

                                </div>


                                <div
                                    class="d-flex
                                           justify-content-between"
                                >

                                    <span
                                        class="small
                                               text-white-50"
                                    >
                                        Date
                                    </span>


                                    <strong
                                        class="small
                                               text-end"
                                    >

                                        {{ $session['date'] }}

                                    </strong>

                                </div>


                                <div
                                    class="d-flex
                                           justify-content-between"
                                >

                                    <span
                                        class="small
                                               text-white-50"
                                    >
                                        Time
                                    </span>


                                    <strong
                                        class="small
                                               text-end"
                                    >

                                        {{ $session['time'] }}

                                    </strong>

                                </div>


                                <div
                                    class="d-flex
                                           justify-content-between"
                                >

                                    <span
                                        class="small
                                               text-white-50"
                                    >
                                        Language
                                    </span>


                                    <strong
                                        class="small
                                               text-end"
                                    >

                                        {{ $session['language'] }}

                                    </strong>

                                </div>

                            </div>

                        </div>

                    </div>


                    {{-- =================================================
                         PARTICIPANT CONTROLS
                    ================================================= --}}

                    <div
                        class="card
                               bg-dark
                               border-secondary
                               rounded-4
                               text-white"
                    >

                        <div class="card-body p-4">

                            <h2
                                class="font-serif
                                       h4
                                       mb-4"
                            >

                                Your Controls

                            </h2>


                            <div
                                class="d-grid
                                       gap-2"
                            >

                                <button
                                    type="button"
                                    class="btn
                                           btn-outline-light
                                           text-start
                                           d-flex
                                           align-items-center
                                           justify-content-between"
                                >

                                    <span>

                                        <i
                                            class="bi bi-mic-mute
                                                   me-2"
                                        ></i>

                                        Microphone

                                    </span>


                                    <span
                                        class="badge
                                               bg-secondary"
                                    >
                                        Muted
                                    </span>

                                </button>


                                <button
                                    type="button"
                                    class="btn
                                           btn-outline-light
                                           text-start
                                           d-flex
                                           align-items-center
                                           justify-content-between"
                                >

                                    <span>

                                        <i
                                            class="bi bi-camera-video
                                                   me-2"
                                        ></i>

                                        Camera

                                    </span>


                                    <span
                                        class="badge
                                               bg-success"
                                    >
                                        On
                                    </span>

                                </button>


                                <button
                                    type="button"
                                    class="btn
                                           btn-outline-light
                                           text-start
                                           d-flex
                                           align-items-center
                                           justify-content-between"
                                >

                                    <span>

                                        <i
                                            class="bi bi-volume-up
                                                   me-2"
                                        ></i>

                                        Speaker

                                    </span>


                                    <span
                                        class="badge
                                               bg-success"
                                    >
                                        On
                                    </span>

                                </button>

                            </div>

                        </div>

                    </div>


                    {{-- =================================================
                         LIVE STATUS
                    ================================================= --}}

                    <div
                        class="card
                               bg-dark
                               border-secondary
                               rounded-4
                               text-white"
                    >

                        <div class="card-body p-4">

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
                                           bg-danger
                                           bg-opacity-25
                                           text-danger"
                                    style="width:50px;height:50px;"
                                >

                                    <i
                                        class="bi bi-broadcast-pin"
                                    ></i>

                                </div>


                                <div>

                                    <small
                                        class="text-white-50
                                               d-block"
                                    >

                                        Session Status

                                    </small>


                                    <strong>

                                        Live now

                                    </strong>

                                </div>

                            </div>


                            <div
                                class="progress
                                       mt-4"
                                style="height:5px;"
                            >

                                <div
                                    class="progress-bar
                                           bg-danger"
                                    role="progressbar"
                                    style="width:31%;"
                                    aria-valuenow="31"
                                    aria-valuemin="0"
                                    aria-valuemax="100"
                                ></div>

                            </div>


                            <div
                                class="d-flex
                                       justify-content-between
                                       mt-2"
                            >

                                <small
                                    class="text-white-50"
                                >
                                    18 min
                                </small>


                                <small
                                    class="text-white-50"
                                >
                                    60 min
                                </small>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>


        {{-- ============================================================
             SESSION INFORMATION
        ============================================================ --}}

        <section class="mt-4">

            <div
                class="card
                       bg-dark
                       border-secondary
                       rounded-4
                       text-white"
            >

                <div class="card-body p-4 p-lg-5">

                    <div
                        class="row
                               align-items-center
                               g-4"
                    >

                        <div class="col-12 col-lg-7">

                            <span
                                class="small
                                       text-warning
                                       fw-semibold
                                       text-uppercase"
                            >

                                Live Experience

                            </span>


                            <h2
                                class="font-serif
                                       display-6
                                       mt-2
                                       mb-3"
                            >

                                Participate in your
                                sacred moment.

                            </h2>


                            <p
                                class="text-white-50
                                       mb-0"
                            >

                                Your Live Pooja is being conducted by
                                the assigned priest. Stay connected
                                throughout the session to experience
                                the live devotional ceremony.

                            </p>

                        </div>


                        <div class="col-12 col-lg-5">

                            <div
                                class="row
                                       row-cols-2
                                       g-3"
                            >

                                <div class="col">

                                    <div
                                        class="bg-white
                                               bg-opacity-10
                                               rounded-4
                                               p-3
                                               text-center"
                                    >

                                        <i
                                            class="bi bi-camera-video
                                                   text-warning
                                                   fs-4"
                                        ></i>


                                        <small
                                            class="d-block
                                                   mt-2
                                                   text-white-50"
                                        >
                                            Live Video
                                        </small>

                                    </div>

                                </div>


                                <div class="col">

                                    <div
                                        class="bg-white
                                               bg-opacity-10
                                               rounded-4
                                               p-3
                                               text-center"
                                    >

                                        <i
                                            class="bi bi-mic
                                                   text-warning
                                                   fs-4"
                                        ></i>


                                        <small
                                            class="d-block
                                                   mt-2
                                                   text-white-50"
                                        >
                                            Live Audio
                                        </small>

                                    </div>

                                </div>


                                <div class="col">

                                    <div
                                        class="bg-white
                                               bg-opacity-10
                                               rounded-4
                                               p-3
                                               text-center"
                                    >

                                        <i
                                            class="bi bi-record-circle
                                                   text-warning
                                                   fs-4"
                                        ></i>


                                        <small
                                            class="d-block
                                                   mt-2
                                                   text-white-50"
                                        >
                                            Recording
                                        </small>

                                    </div>

                                </div>


                                <div class="col">

                                    <div
                                        class="bg-white
                                               bg-opacity-10
                                               rounded-4
                                               p-3
                                               text-center"
                                    >

                                        <i
                                            class="bi bi-bell
                                                   text-warning
                                                   fs-4"
                                        ></i>


                                        <small
                                            class="d-block
                                                   mt-2
                                                   text-white-50"
                                        >
                                            Notifications
                                        </small>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </section>


        {{-- ============================================================
             FEATURES
        ============================================================ --}}

        <section class="mt-5">

            <div
                class="text-center
                       mb-4"
            >

                <span
                    class="small
                           text-warning
                           fw-semibold
                           text-uppercase"
                >
                    Planned Live Pooja Capabilities
                </span>


                <h2
                    class="font-serif
                           display-6
                           mt-2"
                >

                    A complete live experience.

                </h2>

            </div>


            <div
                class="row
                       row-cols-1
                       row-cols-sm-2
                       row-cols-lg-3
                       g-3"
            >

                @foreach($features as $feature)

                    <div class="col">

                        <div
                            class="card
                                   bg-dark
                                   border-secondary
                                   rounded-4
                                   text-white
                                   h-100"
                        >

                            <div class="card-body p-4">

                                <div
                                    class="rounded-circle
                                           d-flex
                                           align-items-center
                                           justify-content-center
                                           bg-warning
                                           bg-opacity-10
                                           text-warning
                                           fs-5
                                           mb-3"
                                    style="width:50px;height:50px;"
                                >

                                    <i
                                        class="bi {{ $feature['icon'] }}"
                                    ></i>

                                </div>


                                <h3
                                    class="font-serif
                                           h5"
                                >

                                    {{ $feature['title'] }}

                                </h3>


                                <p
                                    class="small
                                           text-white-50
                                           mb-0"
                                >

                                    {{ $feature['text'] }}

                                </p>

                            </div>

                        </div>

                    </div>

                @endforeach

            </div>

        </section>


        {{-- ============================================================
             BEFORE LEAVING
        ============================================================ --}}

        <section class="mt-5">

            <div
                class="card
                       bg-dark
                       border-secondary
                       rounded-4
                       text-white"
            >

                <div class="card-body p-4 p-lg-5">

                    <div class="row g-5">


                        <div class="col-12 col-lg-5">

                            <span
                                class="small
                                       text-warning
                                       fw-semibold
                                       text-uppercase"
                            >

                                Helpful Guidelines

                            </span>


                            <h2
                                class="font-serif
                                       display-6
                                       mt-2
                                       mb-3"
                            >

                                Stay connected
                                with devotion.

                            </h2>


                            <p
                                class="text-white-50
                                       mb-0"
                            >

                                Follow these simple guidelines to help
                                maintain a smooth live experience.

                            </p>

                        </div>


                        <div class="col-12 col-lg-7">

                            <div class="vstack gap-3">

                                @foreach($guidelines as $guideline)

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
                                                   bg-success
                                                   bg-opacity-10
                                                   text-success
                                                   flex-shrink-0"
                                            style="width:38px;height:38px;"
                                        >

                                            <i
                                                class="bi bi-check-lg"
                                            ></i>

                                        </div>


                                        <p
                                            class="small
                                                   text-white-50
                                                   mb-0
                                                   pt-2"
                                        >

                                            {{ $guideline }}

                                        </p>

                                    </div>

                                @endforeach

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </section>


        {{-- ============================================================
             SESSION REFERENCE
        ============================================================ --}}

        <section class="mt-5 mb-4">

            <div
                class="row
                       row-cols-1
                       row-cols-md-2
                       g-3"
            >

                <div class="col">

                    <div
                        class="bg-dark
                               border
                               border-secondary
                               rounded-4
                               p-4"
                    >

                        <small
                            class="text-white-50
                                   d-block
                                   mb-1"
                        >
                            Booking ID
                        </small>


                        <strong>
                            {{ $session['booking_id'] }}
                        </strong>

                    </div>

                </div>


                <div class="col">

                    <div
                        class="bg-dark
                               border
                               border-secondary
                               rounded-4
                               p-4"
                    >

                        <small
                            class="text-white-50
                                   d-block
                                   mb-1"
                        >
                            Reference ID
                        </small>


                        <strong>
                            {{ $session['reference_id'] }}
                        </strong>

                    </div>

                </div>

            </div>

        </section>


        {{-- ============================================================
             LEAVE SESSION
        ============================================================ --}}

        <section class="pb-5">

            <div
                class="text-center"
            >

                <button
                    type="button"
                    class="btn
                           btn-outline-light
                           rounded-pill
                           px-4"
                >

                    <i
                        class="bi bi-box-arrow-right me-2"
                    ></i>

                    Leave Live Pooja

                </button>


                <p
                    class="small
                           text-white-50
                           mt-3
                           mb-0"
                >

                    Leaving the live session will not cancel your
                    booking. Recording availability will depend on
                    session completion and system processing.

                </p>

            </div>

        </section>

    </div>

</main>

@endsection