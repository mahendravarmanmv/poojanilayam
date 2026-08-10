@extends('layouts.app')

@section('title', 'Pooja Recording | Pooja Nilayam')

@section(
    'meta_description',
    'Watch and access your completed Digital Pooja recording, photos and devotional memories.'
)

@section('content')

@php

    /*
    |--------------------------------------------------------------------------
    | TEMPORARY FRONTEND DATA
    |--------------------------------------------------------------------------
    | These values will later come from the completed booking/session.
    |--------------------------------------------------------------------------
    */

    $pooja = [

        'booking_id' => 'PN-DP-20260811-1024',

        'reference_id' => 'PN-REF-784521',

        'name' => 'Ganapathi Live Pooja',

        'god' => 'Lord Ganesha',

        'temple' => 'Pooja Nilayam',

        'priest' => 'Sri Venkateshwara Sharma',

        'date' => '11 August 2026',

        'time' => '07:00 PM',

        'language' => 'Telugu',

        'duration' => '60 Minutes',

        'status' => 'Completed',

        'image' => 'ganapathi.jpg'

    ];


    /*
    |--------------------------------------------------------------------------
    | Media Items
    |--------------------------------------------------------------------------
    */

    $photos = [

        [
            'image' => 'ganapathi.jpg',
            'title' => 'Pooja Altar'
        ],

        [
            'image' => 'lakshmi.jpg',
            'title' => 'Devotional Offering'
        ],

        [
            'image' => 'shiva.jpg',
            'title' => 'Temple Moment'
        ],

        [
            'image' => 'hanuman.jpg',
            'title' => 'Blessings'
        ]

    ];


    /*
    |--------------------------------------------------------------------------
    | Recording Information
    |--------------------------------------------------------------------------
    */

    $recording = [

        'status' => 'Available',

        'duration' => '58:42',

        'quality' => '1080p',

        'size' => '1.2 GB',

        'format' => 'MP4',

        'expires' => '30 Days'

    ];


    /*
    |--------------------------------------------------------------------------
    | Completion Steps
    |--------------------------------------------------------------------------
    */

    $completionSteps = [

        [
            'icon' => 'bi-calendar-check',
            'title' => 'Pooja Completed',
            'text' => 'Your scheduled Live Pooja has been completed.'
        ],

        [
            'icon' => 'bi-record-circle',
            'title' => 'Recording Processed',
            'text' => 'The recorded session has been processed.'
        ],

        [
            'icon' => 'bi-images',
            'title' => 'Photos Available',
            'text' => 'Selected photos from the devotional experience are available.'
        ],

        [
            'icon' => 'bi-bell',
            'title' => 'Customer Notification',
            'text' => 'You can be notified when your content is ready.'
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
                    Recording
                </li>

            </ol>

        </nav>

    </div>

</section>


{{-- ============================================================
     PAGE HERO
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

                    Pooja Completed

                </span>


                <h1
                    class="font-serif
                           display-5
                           text-pn-brown
                           mt-3
                           mb-3"
                >

                    Your Pooja memories are ready.

                </h1>


                <p
                    class="lead
                           text-secondary
                           mb-0"
                >

                    Access your recording, photos and devotional
                    memories from your completed Pooja.

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
                 POoja SUMMARY
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


                        <div class="col-12 col-md-5">

                            <div
                                class="position-relative
                                       h-100"
                            >

                                <img
                                    src="{{ Vite::asset('resources/images/home/' . $pooja['image']) }}"
                                    class="img-fluid
                                           w-100
                                           h-100
                                           object-fit-cover"
                                    style="min-height:280px;"
                                    alt="{{ $pooja['name'] }}"
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

                                    COMPLETED

                                </span>

                            </div>

                        </div>


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
                                    Completed Live Pooja
                                </span>


                                <h2
                                    class="font-serif
                                           h2
                                           text-pn-brown
                                           mt-2
                                           mb-2"
                                >

                                    {{ $pooja['name'] }}

                                </h2>


                                <p
                                    class="text-secondary
                                           mb-4"
                                >

                                    Dedicated to {{ $pooja['god'] }}

                                </p>


                                <div class="vstack gap-3">

                                    <div
                                        class="d-flex
                                               justify-content-between
                                               gap-3"
                                    >

                                        <span
                                            class="small
                                                   text-secondary"
                                        >
                                            Date
                                        </span>


                                        <strong
                                            class="small
                                                   text-end"
                                        >
                                            {{ $pooja['date'] }}
                                        </strong>

                                    </div>


                                    <div
                                        class="d-flex
                                               justify-content-between
                                               gap-3"
                                    >

                                        <span
                                            class="small
                                                   text-secondary"
                                        >
                                            Time
                                        </span>


                                        <strong
                                            class="small
                                                   text-end"
                                        >
                                            {{ $pooja['time'] }}
                                        </strong>

                                    </div>


                                    <div
                                        class="d-flex
                                               justify-content-between
                                               gap-3"
                                    >

                                        <span
                                            class="small
                                                   text-secondary"
                                        >
                                            Priest
                                        </span>


                                        <strong
                                            class="small
                                                   text-end"
                                        >
                                            {{ $pooja['priest'] }}
                                        </strong>

                                    </div>


                                    <div
                                        class="d-flex
                                               justify-content-between
                                               gap-3"
                                    >

                                        <span
                                            class="small
                                                   text-secondary"
                                        >
                                            Language
                                        </span>


                                        <strong
                                            class="small
                                                   text-end"
                                        >
                                            {{ $pooja['language'] }}
                                        </strong>

                                    </div>


                                    <div
                                        class="d-flex
                                               justify-content-between
                                               gap-3"
                                    >

                                        <span
                                            class="small
                                                   text-secondary"
                                        >
                                            Duration
                                        </span>


                                        <strong
                                            class="small
                                                   text-end"
                                        >
                                            {{ $pooja['duration'] }}
                                        </strong>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>


            {{-- =================================================
                 RECORDING STATUS
            ================================================= --}}

            <div class="col-12 col-lg-4">

                <div
                    class="card
                           border-0
                           rounded-5
                           h-100
                           overflow-hidden"
                >

                    <div
                        class="pn-digital
                               h-100
                               text-white"
                    >

                        <div
                            class="card-body
                                   p-4
                                   p-md-5
                                   text-center
                                   d-flex
                                   flex-column
                                   justify-content-center"
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
                                    class="bi bi-play-fill
                                           display-5"
                                ></i>

                            </div>


                            <span
                                class="small
                                       text-warning
                                       fw-semibold
                                       text-uppercase"
                            >
                                Recording
                            </span>


                            <h2
                                class="font-serif
                                       h2
                                       mt-2"
                            >

                                {{ $recording['status'] }}

                            </h2>


                            <p
                                class="text-white-50
                                       small"
                            >

                                Your Live Pooja recording is ready
                                to view.

                            </p>


                            <div
                                class="row
                                       row-cols-2
                                       g-2
                                       my-3"
                            >

                                <div class="col">

                                    <div
                                        class="bg-white
                                               bg-opacity-10
                                               rounded-3
                                               p-3"
                                    >

                                        <strong
                                            class="d-block"
                                        >
                                            {{ $recording['duration'] }}
                                        </strong>


                                        <small
                                            class="text-white-50"
                                        >
                                            Duration
                                        </small>

                                    </div>

                                </div>


                                <div class="col">

                                    <div
                                        class="bg-white
                                               bg-opacity-10
                                               rounded-3
                                               p-3"
                                    >

                                        <strong
                                            class="d-block"
                                        >
                                            {{ $recording['quality'] }}
                                        </strong>


                                        <small
                                            class="text-white-50"
                                        >
                                            Quality
                                        </small>

                                    </div>

                                </div>

                            </div>


                            <button
                                type="button"
                                class="btn
                                       btn-warning
                                       text-dark
                                       fw-semibold
                                       btn-lg
                                       w-100"
                            >

                                <i
                                    class="bi bi-play-fill me-2"
                                ></i>

                                Watch Recording

                            </button>


                            <button
                                type="button"
                                class="btn
                                       btn-outline-light
                                       mt-2
                                       w-100"
                            >

                                <i
                                    class="bi bi-download me-2"
                                ></i>

                                Download Recording

                            </button>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- ============================================================
     RECORDING PLAYER
============================================================ --}}

<section class="py-5">

    <div class="container">

        <div
            class="row
                   justify-content-center"
        >

            <div class="col-12 col-xl-10">

                <div
                    class="card
                           border
                           border-warning-subtle
                           rounded-5
                           overflow-hidden"
                >

                    <div
                        class="card-body
                               p-0"
                    >

                        {{-- Video Area --}}

                        <div
                            class="ratio ratio-16x9
                                   bg-dark"
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
                                           text-white
                                           px-4"
                                >

                                    <div
                                        class="mx-auto
                                               rounded-circle
                                               d-flex
                                               align-items-center
                                               justify-content-center
                                               bg-white
                                               bg-opacity-10
                                               mb-3"
                                        style="width:90px;height:90px;"
                                    >

                                        <i
                                            class="bi bi-play-fill
                                                   display-5"
                                        ></i>

                                    </div>


                                    <h2
                                        class="font-serif
                                               h3"
                                    >

                                        {{ $pooja['name'] }}

                                    </h2>


                                    <p
                                        class="text-white-50
                                               small
                                               mb-0"
                                    >

                                        Recording player will be
                                        connected during backend
                                        integration.

                                    </p>

                                </div>

                            </div>

                        </div>


                        {{-- Player Information --}}

                        <div
                            class="p-4
                                   p-md-5"
                        >

                            <div
                                class="d-flex
                                       flex-column
                                       flex-md-row
                                       justify-content-between
                                       gap-3"
                            >

                                <div>

                                    <h3
                                        class="font-serif
                                               h4
                                               text-pn-brown
                                               mb-1"
                                    >

                                        {{ $pooja['name'] }}

                                    </h3>


                                    <p
                                        class="small
                                               text-secondary
                                               mb-0"
                                    >

                                        {{ $recording['format'] }}
                                        ·
                                        {{ $recording['quality'] }}
                                        ·
                                        {{ $recording['size'] }}

                                    </p>

                                </div>


                                <div
                                    class="d-flex
                                           gap-2"
                                >

                                    <button
                                        type="button"
                                        class="btn
                                               btn-pn-outline"
                                    >

                                        <i
                                            class="bi bi-download
                                                   me-1"
                                        ></i>

                                        Download

                                    </button>


                                    <button
                                        type="button"
                                        class="btn
                                               btn-pn"
                                    >

                                        <i
                                            class="bi bi-share
                                                   me-1"
                                        ></i>

                                        Share

                                    </button>

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
     PHOTOS
============================================================ --}}

<section class="py-5 bg-pn-cream">

    <div class="container">

        <div
            class="d-flex
                   flex-column
                   flex-md-row
                   align-items-md-end
                   justify-content-between
                   gap-3
                   mb-5"
        >

            <div>

                <span
                    class="small
                           text-pn-gold
                           fw-semibold
                           text-uppercase"
                >
                    Devotional Memories
                </span>


                <h2
                    class="font-serif
                           display-6
                           text-pn-brown
                           mt-2
                           mb-0"
                >

                    Photos from your Pooja

                </h2>

            </div>


            <button
                type="button"
                class="btn btn-pn-outline"
            >

                <i
                    class="bi bi-download me-2"
                ></i>

                Download All

            </button>

        </div>


        <div
            class="row
                   row-cols-2
                   row-cols-md-4
                   g-3"
        >

            @foreach($photos as $photo)

                <div class="col">

                    <div
                        class="card
                               border-0
                               rounded-4
                               overflow-hidden
                               h-100"
                    >

                        <div
                            class="position-relative"
                        >

                            <img
                                src="{{ Vite::asset('resources/images/home/' . $photo['image']) }}"
                                class="img-fluid
                                       w-100
                                       object-fit-cover"
                                style="height:220px;"
                                alt="{{ $photo['title'] }}"
                                loading="lazy"
                            >


                            <button
                                type="button"
                                class="btn
                                       btn-light
                                       rounded-circle
                                       position-absolute
                                       top-0
                                       end-0
                                       m-2
                                       shadow-sm"
                                style="width:40px;height:40px;"
                                aria-label="Download photo"
                            >

                                <i
                                    class="bi bi-download"
                                ></i>

                            </button>

                        </div>


                        <div
                            class="card-body
                                   p-3"
                        >

                            <h3
                                class="font-serif
                                       h6
                                       text-pn-brown
                                       mb-0"
                            >

                                {{ $photo['title'] }}

                            </h3>

                        </div>

                    </div>

                </div>

            @endforeach

        </div>

    </div>

</section>


{{-- ============================================================
     RECORDING DETAILS
============================================================ --}}

<section class="py-5">

    <div class="container">

        <div
            class="row
                   g-4"
        >

            <div class="col-12 col-lg-7">

                <div
                    class="card
                           border
                           border-warning-subtle
                           rounded-4
                           h-100"
                >

                    <div class="card-body p-4 p-md-5">

                        <span
                            class="small
                                   text-pn-gold
                                   fw-semibold
                                   text-uppercase"
                        >
                            Recording Details
                        </span>


                        <h2
                            class="font-serif
                                   display-6
                                   text-pn-brown
                                   mt-2
                                   mb-4"
                        >

                            Your recording information.

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
                                               d-block"
                                    >
                                        Format
                                    </small>


                                    <strong
                                        class="text-pn-brown"
                                    >
                                        {{ $recording['format'] }}
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
                                               d-block"
                                    >
                                        Video Quality
                                    </small>


                                    <strong
                                        class="text-pn-brown"
                                    >
                                        {{ $recording['quality'] }}
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
                                               d-block"
                                    >
                                        File Size
                                    </small>


                                    <strong
                                        class="text-pn-brown"
                                    >
                                        {{ $recording['size'] }}
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
                                               d-block"
                                    >
                                        Available For
                                    </small>


                                    <strong
                                        class="text-pn-brown"
                                    >
                                        {{ $recording['expires'] }}
                                    </strong>

                                </div>

                            </div>

                        </div>


                        <div
                            class="alert
                                   alert-light
                                   border
                                   mt-4
                                   mb-0"
                        >

                            <i
                                class="bi bi-info-circle
                                       text-pn-primary
                                       me-2"
                            ></i>

                            Recording availability and retention will
                            be controlled by the booking and media
                            management system.

                        </div>

                    </div>

                </div>

            </div>


            {{-- =================================================
                 NOTIFICATION
            ================================================= --}}

            <div class="col-12 col-lg-5">

                <div
                    class="card
                           border
                           border-warning-subtle
                           rounded-4
                           bg-pn-cream
                           h-100"
                >

                    <div class="card-body p-4 p-md-5">

                        <div
                            class="rounded-circle
                                   d-flex
                                   align-items-center
                                   justify-content-center
                                   bg-white
                                   text-pn-primary
                                   mb-4"
                            style="width:64px;height:64px;"
                        >

                            <i
                                class="bi bi-bell
                                       fs-4"
                            ></i>

                        </div>


                        <span
                            class="small
                                   text-pn-gold
                                   fw-semibold
                                   text-uppercase"
                        >
                            Notifications
                        </span>


                        <h2
                            class="font-serif
                                   h2
                                   text-pn-brown
                                   mt-2
                                   mb-3"
                        >

                            Never miss your memories.

                        </h2>


                        <p
                            class="small
                                   text-secondary"
                        >

                            You can receive notifications when your
                            recording, photos or videos become available.

                        </p>


                        <div
                            class="form-check
                                   form-switch
                                   mt-4"
                        >

                            <input
                                class="form-check-input"
                                type="checkbox"
                                role="switch"
                                id="mediaNotifications"
                                checked
                            >


                            <label
                                class="form-check-label
                                       fw-semibold
                                       text-pn-brown"
                                for="mediaNotifications"
                            >

                                Notify me about media availability

                            </label>

                        </div>


                        <button
                            type="button"
                            class="btn
                                   btn-pn
                                   w-100
                                   mt-4"
                        >

                            Save Notification Preference

                        </button>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- ============================================================
     COMPLETION TIMELINE
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
                Your Pooja Journey
            </span>


            <h2
                class="font-serif
                       display-6
                       text-pn-brown
                       mt-2"
            >

                From live ceremony to lasting memories.

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
                   row-cols-md-2
                   g-3"
        >

            @foreach($completionSteps as $index => $step)

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

                            <div
                                class="rounded-circle
                                       d-flex
                                       align-items-center
                                       justify-content-center
                                       bg-pn-beige
                                       text-pn-primary
                                       flex-shrink-0"
                                style="width:52px;height:52px;"
                            >

                                <i
                                    class="bi {{ $step['icon'] }}"
                                ></i>

                            </div>


                            <div>

                                <span
                                    class="small
                                           text-success
                                           fw-semibold"
                                >

                                    Completed

                                </span>


                                <h3
                                    class="font-serif
                                           h5
                                           text-pn-brown
                                           mt-1"
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
                           rounded-4"
                >

                    <div class="card-body p-4">

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
                            {{ $pooja['booking_id'] }}
                        </strong>

                    </div>

                </div>

            </div>


            <div class="col">

                <div
                    class="card
                           border
                           border-warning-subtle
                           rounded-4"
                >

                    <div class="card-body p-4">

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
                            {{ $pooja['reference_id'] }}
                        </strong>

                    </div>

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
                    class="bi bi-heart-fill
                           display-5
                           text-warning"
                ></i>


                <h2
                    class="font-serif
                           display-6
                           mt-3"
                >

                    May the blessings of Lord Ganesha
                    remain with you.

                </h2>


                <p
                    class="text-white-50
                           col-lg-7
                           mx-auto"
                >

                    Thank you for choosing Pooja Nilayam for your
                    devotional journey.

                </p>


                <div
                    class="d-flex
                           flex-column
                           flex-sm-row
                           justify-content-center
                           gap-2"
                >

                    <button
                        type="button"
                        class="btn
                               btn-warning
                               text-dark
                               fw-semibold"
                    >

                        <i
                            class="bi bi-play-fill me-2"
                        ></i>

                        Watch Recording

                    </button>


                    <a
                        href="{{ route('home') }}"
                        class="btn
                               btn-outline-light"
                    >

                        Back to Home

                    </a>

                </div>

            </div>

        </div>

    </div>

</section>

@endsection