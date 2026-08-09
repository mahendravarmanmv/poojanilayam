@extends('layouts.app')

@section('title', 'Digital Bookings | Pooja Nilayam')

@section(
    'meta_description',
    'View your digital pooja bookings, scheduled poojas, completion updates and sacred media.'
)

@section('content')

@php

    /*
    |--------------------------------------------------------------------------
    | TEMPORARY UI DATA
    |--------------------------------------------------------------------------
    | These values will later come from the authenticated customer's
    | digital booking records.
    |--------------------------------------------------------------------------
    */

    $digitalBookings = [

        [
            'id' => 'PN-DIG-2026-00118',
            'pooja' => 'Ganapathi Homam',
            'date' => '15 August 2026',
            'time' => '10:00 AM',
            'status' => 'Scheduled',
            'status_class' => 'primary',
            'priest' => 'Sri Venkateswara Sharma',
            'sankalp' => 'Mahendra Varma & Family',
            'photo_video' => false,
            'meeting_available' => false,
            'amount' => 501,
            'icon' => 'bi-flower1'
        ],

        [
            'id' => 'PN-DIG-2026-00096',
            'pooja' => 'Rudrabhishekam',
            'date' => '05 August 2026',
            'time' => '8:00 AM',
            'status' => 'Completed',
            'status_class' => 'success',
            'priest' => 'Sri Siva Prasad',
            'sankalp' => 'Mahendra Varma',
            'photo_video' => true,
            'meeting_available' => false,
            'amount' => 1101,
            'icon' => 'bi-droplet'
        ],

        [
            'id' => 'PN-DIG-2026-00071',
            'pooja' => 'Lakshmi Pooja',
            'date' => '28 July 2026',
            'time' => '6:00 PM',
            'status' => 'Completed',
            'status_class' => 'success',
            'priest' => 'Sri Ramesh Sharma',
            'sankalp' => 'Mahendra Varma & Family',
            'photo_video' => true,
            'meeting_available' => false,
            'amount' => 501,
            'icon' => 'bi-stars'
        ],

        [
            'id' => 'PN-DIG-2026-00052',
            'pooja' => 'Navagraha Pooja',
            'date' => '18 July 2026',
            'time' => '11:00 AM',
            'status' => 'Cancelled',
            'status_class' => 'danger',
            'priest' => 'Not Assigned',
            'sankalp' => 'Mahendra Varma',
            'photo_video' => false,
            'meeting_available' => false,
            'amount' => 901,
            'icon' => 'bi-moon-stars'
        ]

    ];


    $scheduledBookings =
        array_values(
            array_filter(
                $digitalBookings,
                fn ($booking) =>
                    in_array(
                        $booking['status'],
                        ['Scheduled', 'Live']
                    )
            )
        );


    $completedBookings =
        array_values(
            array_filter(
                $digitalBookings,
                fn ($booking) =>
                    $booking['status'] === 'Completed'
            )
        );


    $mediaAvailable =
        array_values(
            array_filter(
                $digitalBookings,
                fn ($booking) =>
                    $booking['photo_video']
            )
        );

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
                        My Dashboard
                    </a>

                </li>


                <li
                    class="breadcrumb-item active"
                    aria-current="page"
                >
                    Digital Bookings
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

        <div
            class="row
                   align-items-center
                   g-4"
        >

            <div class="col-12 col-lg-8">

                <span
                    class="small
                           text-pn-gold
                           fw-semibold
                           text-uppercase"
                >
                    My Account
                </span>


                <h1
                    class="font-serif
                           display-5
                           text-pn-brown
                           mt-2
                           mb-2"
                >
                    Digital Bookings
                </h1>


                <p
                    class="text-secondary
                           mb-0"
                >
                    Follow your digital pooja journey, from
                    scheduling to completion and sacred memories.
                </p>

            </div>


            <div
                class="col-12 col-lg-4
                       text-lg-end"
            >

                <a
                    href="#"
                    class="btn btn-pn"
                >

                    <i class="bi bi-camera-video me-2"></i>

                    Explore Digital Pooja

                </a>

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


            {{-- ====================================================
                 ACCOUNT NAVIGATION
            ===================================================== --}}

            <div class="col-12 col-lg-3">

                <div
                    class="card
                           border
                           border-warning-subtle
                           rounded-5
                           overflow-hidden
                           sticky-lg-top"
                    style="top:90px;"
                >

                    <div
                        class="bg-pn-cream
                               p-4
                               text-center"
                    >

                        <div
                            class="rounded-circle
                                   bg-pn-primary
                                   text-white
                                   d-flex
                                   align-items-center
                                   justify-content-center
                                   mx-auto
                                   mb-3
                                   fw-semibold
                                   fs-5"
                            style="width:64px;height:64px;"
                        >
                            MV
                        </div>


                        <h2
                            class="font-serif
                                   h5
                                   text-pn-brown
                                   mb-1"
                        >
                            Mahendra Varma
                        </h2>


                        <small
                            class="text-secondary
                                   text-break"
                        >
                            customer@example.com
                        </small>

                    </div>


                    <div class="list-group list-group-flush">

                        <a
                            href="#"
                            class="list-group-item
                                   list-group-item-action
                                   border-0
                                   py-3"
                        >
                            <i class="bi bi-grid me-3"></i>
                            Dashboard
                        </a>


                        <a
                            href="#"
                            class="list-group-item
                                   list-group-item-action
                                   border-0
                                   py-3"
                        >
                            <i class="bi bi-person me-3"></i>
                            My Profile
                        </a>


                        <a
                            href="#"
                            class="list-group-item
                                   list-group-item-action
                                   border-0
                                   py-3"
                        >
                            <i class="bi bi-calendar-check me-3"></i>
                            My Bookings
                        </a>


                        <a
                            href="#"
                            class="list-group-item
                                   list-group-item-action
                                   active
                                   border-0
                                   py-3"
                        >
                            <i class="bi bi-camera-video me-3"></i>
                            Digital Bookings
                        </a>


                        <a
                            href="#"
                            class="list-group-item
                                   list-group-item-action
                                   border-0
                                   py-3"
                        >
                            <i class="bi bi-bag me-3"></i>
                            Orders
                        </a>


                        <a
                            href="#"
                            class="list-group-item
                                   list-group-item-action
                                   border-0
                                   py-3"
                        >
                            <i class="bi bi-heart me-3"></i>
                            Wishlist
                        </a>


                        <a
                            href="#"
                            class="list-group-item
                                   list-group-item-action
                                   border-0
                                   py-3"
                        >
                            <i class="bi bi-geo-alt me-3"></i>
                            Address Book
                        </a>


                        <a
                            href="#"
                            class="list-group-item
                                   list-group-item-action
                                   border-0
                                   py-3"
                        >
                            <i class="bi bi-bell me-3"></i>
                            Notifications

                            <span
                                class="badge
                                       bg-danger
                                       rounded-pill
                                       float-end"
                            >
                                3
                            </span>
                        </a>


                        <a
                            href="#"
                            class="list-group-item
                                   list-group-item-action
                                   border-0
                                   py-3"
                        >
                            <i class="bi bi-shield-lock me-3"></i>
                            Change Password
                        </a>


                        <div class="border-top"></div>


                        <a
                            href="#"
                            class="list-group-item
                                   list-group-item-action
                                   border-0
                                   py-3
                                   text-danger"
                        >
                            <i
                                class="bi bi-box-arrow-right me-3"
                            ></i>
                            Logout
                        </a>

                    </div>

                </div>

            </div>


            {{-- ====================================================
                 MAIN DIGITAL BOOKING CONTENT
            ===================================================== --}}

            <div class="col-12 col-lg-9">


                {{-- ==================================================
                     DIGITAL POoja INFO BANNER
                =================================================== --}}

                <div
                    class="pn-digital
                           rounded-5
                           overflow-hidden
                           text-white
                           mb-4"
                >

                    <div
                        class="p-4
                               p-md-5"
                    >

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
                                    Sacredly Connected
                                </span>


                                <h2
                                    class="font-serif
                                           display-6
                                           fw-normal
                                           mt-2
                                           mb-3"
                                >
                                    Your devotion,
                                    wherever you are.
                                </h2>


                                <p
                                    class="text-white-50
                                           mb-0"
                                >

                                    Your digital pooja can be
                                    performed by a priest while you
                                    remain connected to the sacred
                                    experience from wherever you are.

                                </p>

                            </div>


                            <div
                                class="col-12 col-lg-4
                                       text-lg-end"
                            >

                                <i
                                    class="bi bi-camera-video
                                           text-warning"
                                    style="font-size:4rem;"
                                ></i>

                            </div>

                        </div>

                    </div>

                </div>


                {{-- ==================================================
                     SUMMARY CARDS
                =================================================== --}}

                <div
                    class="row
                           row-cols-2
                           row-cols-md-4
                           g-3
                           mb-4"
                >

                    <div class="col">

                        <div
                            class="card
                                   border
                                   border-warning-subtle
                                   rounded-4
                                   h-100"
                        >

                            <div class="card-body p-3 p-md-4">

                                <small
                                    class="text-secondary
                                           d-block
                                           mb-1"
                                >
                                    Total
                                </small>


                                <strong
                                    class="font-serif
                                           display-6
                                           text-pn-brown"
                                >
                                    {{ count($digitalBookings) }}
                                </strong>


                                <small
                                    class="text-secondary
                                           d-block"
                                >
                                    Digital Poojas
                                </small>

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

                            <div class="card-body p-3 p-md-4">

                                <small
                                    class="text-secondary
                                           d-block
                                           mb-1"
                                >
                                    Scheduled
                                </small>


                                <strong
                                    class="font-serif
                                           display-6
                                           text-pn-brown"
                                >
                                    {{ count($scheduledBookings) }}
                                </strong>


                                <small
                                    class="text-secondary
                                           d-block"
                                >
                                    Upcoming
                                </small>

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

                            <div class="card-body p-3 p-md-4">

                                <small
                                    class="text-secondary
                                           d-block
                                           mb-1"
                                >
                                    Completed
                                </small>


                                <strong
                                    class="font-serif
                                           display-6
                                           text-pn-brown"
                                >
                                    {{ count($completedBookings) }}
                                </strong>


                                <small
                                    class="text-secondary
                                           d-block"
                                >
                                    Poojas
                                </small>

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

                            <div class="card-body p-3 p-md-4">

                                <small
                                    class="text-secondary
                                           d-block
                                           mb-1"
                                >
                                    Media
                                </small>


                                <strong
                                    class="font-serif
                                           display-6
                                           text-pn-brown"
                                >
                                    {{ count($mediaAvailable) }}
                                </strong>


                                <small
                                    class="text-secondary
                                           d-block"
                                >
                                    Available
                                </small>

                            </div>

                        </div>

                    </div>

                </div>


                {{-- ==================================================
                     DIGITAL BOOKING SEARCH / FILTER
                =================================================== --}}

                <div
                    class="card
                           border
                           border-warning-subtle
                           rounded-5
                           mb-4"
                >

                    <div class="card-body p-3 p-md-4">

                        <div class="row g-3">

                            <div class="col-12 col-md-7">

                                <label
                                    for="digitalBookingSearch"
                                    class="visually-hidden"
                                >
                                    Search digital bookings
                                </label>


                                <div
                                    class="input-group"
                                >

                                    <span
                                        class="input-group-text
                                               bg-white"
                                    >

                                        <i
                                            class="bi bi-search
                                                   text-secondary"
                                        ></i>

                                    </span>


                                    <input
                                        type="search"
                                        id="digitalBookingSearch"
                                        class="form-control"
                                        placeholder="Search digital pooja..."
                                        autocomplete="off"
                                    >

                                </div>

                            </div>


                            <div class="col-12 col-md-4">

                                <label
                                    for="digitalBookingStatus"
                                    class="visually-hidden"
                                >
                                    Booking status
                                </label>


                                <select
                                    id="digitalBookingStatus"
                                    class="form-select"
                                >

                                    <option value="all">
                                        All Status
                                    </option>

                                    <option value="scheduled">
                                        Scheduled
                                    </option>

                                    <option value="completed">
                                        Completed
                                    </option>

                                    <option value="cancelled">
                                        Cancelled
                                    </option>

                                </select>

                            </div>


                            <div class="col-12 col-md-1">

                                <button
                                    type="button"
                                    id="resetDigitalFilters"
                                    class="btn
                                           btn-light
                                           border
                                           w-100"
                                    title="Reset filters"
                                    aria-label="Reset filters"
                                >

                                    <i
                                        class="bi bi-arrow-counterclockwise"
                                    ></i>

                                </button>

                            </div>

                        </div>

                    </div>

                </div>


                {{-- ==================================================
                     SCHEDULED DIGITAL POOJAS
                =================================================== --}}

                <div
                    class="d-flex
                           align-items-center
                           justify-content-between
                           gap-3
                           mb-4"
                >

                    <div>

                        <span
                            class="small
                                   text-pn-gold
                                   fw-semibold
                                   text-uppercase"
                        >
                            Your Journey
                        </span>


                        <h2
                            class="font-serif
                                   h3
                                   text-pn-brown
                                   mt-1
                                   mb-0"
                        >
                            Digital Pooja Bookings
                        </h2>

                    </div>


                    <span
                        class="badge
                               bg-pn-cream
                               text-pn-primary
                               rounded-pill
                               px-3
                               py-2"
                    >

                        {{ count($digitalBookings) }}

                        {{ count($digitalBookings) === 1
                            ? 'Booking'
                            : 'Bookings'
                        }}

                    </span>

                </div>


                {{-- ==================================================
                     BOOKING CARDS
                =================================================== --}}

                <div
                    class="vstack
                           gap-4"
                    id="digitalBookingList"
                >

                    @foreach(
                        $digitalBookings as $booking
                    )

                        <article
                            class="digital-booking-card
                                   card
                                   border
                                   border-warning-subtle
                                   rounded-5"
                            data-booking-name="{{ strtolower($booking['pooja']) }}"
                            data-booking-status="{{ strtolower($booking['status']) }}"
                        >

                            <div
                                class="card-body
                                       p-4
                                       p-md-5"
                            >

                                {{-- Header --}}

                                <div
                                    class="d-flex
                                           flex-column
                                           flex-sm-row
                                           align-items-sm-start
                                           justify-content-between
                                           gap-3
                                           mb-4"
                                >

                                    <div
                                        class="d-flex
                                               align-items-center
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
                                            style="width:58px;height:58px;"
                                        >

                                            <i
                                                class="bi
                                                       {{ $booking['icon'] }}
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
                                                Digital Pooja
                                            </span>


                                            <h3
                                                class="font-serif
                                                       h4
                                                       text-pn-brown
                                                       mt-1
                                                       mb-1"
                                            >

                                                {{ $booking['pooja'] }}

                                            </h3>


                                            <small
                                                class="text-secondary"
                                            >

                                                Booking ID:
                                                {{ $booking['id'] }}

                                            </small>

                                        </div>

                                    </div>


                                    <span
                                        class="badge
                                               bg-{{ $booking['status_class'] }}-subtle
                                               text-{{ $booking['status_class'] }}
                                               rounded-pill
                                               px-3
                                               py-2"
                                    >

                                        {{ $booking['status'] }}

                                    </span>

                                </div>


                                {{-- Date / Time / Sankalp --}}

                                <div
                                    class="row
                                           row-cols-1
                                           row-cols-sm-2
                                           row-cols-xl-3
                                           g-3
                                           mb-4"
                                >

                                    <div class="col">

                                        <div
                                            class="border
                                                   border-warning-subtle
                                                   rounded-4
                                                   p-3
                                                   h-100"
                                        >

                                            <small
                                                class="text-secondary
                                                       d-block
                                                       mb-1"
                                            >
                                                Pooja Date
                                            </small>


                                            <strong
                                                class="small
                                                       text-pn-brown"
                                            >

                                                <i
                                                    class="bi bi-calendar3
                                                           text-pn-primary
                                                           me-1"
                                                ></i>

                                                {{ $booking['date'] }}

                                            </strong>

                                        </div>

                                    </div>


                                    <div class="col">

                                        <div
                                            class="border
                                                   border-warning-subtle
                                                   rounded-4
                                                   p-3
                                                   h-100"
                                        >

                                            <small
                                                class="text-secondary
                                                       d-block
                                                       mb-1"
                                            >
                                                Scheduled Time
                                            </small>


                                            <strong
                                                class="small
                                                       text-pn-brown"
                                            >

                                                <i
                                                    class="bi bi-clock
                                                           text-pn-primary
                                                           me-1"
                                                ></i>

                                                {{ $booking['time'] }}

                                            </strong>

                                        </div>

                                    </div>


                                    <div class="col">

                                        <div
                                            class="border
                                                   border-warning-subtle
                                                   rounded-4
                                                   p-3
                                                   h-100"
                                        >

                                            <small
                                                class="text-secondary
                                                       d-block
                                                       mb-1"
                                            >
                                                Sankalp For
                                            </small>


                                            <strong
                                                class="small
                                                       text-pn-brown"
                                            >

                                                <i
                                                    class="bi bi-person-heart
                                                           text-pn-primary
                                                           me-1"
                                                ></i>

                                                {{ $booking['sankalp'] }}

                                            </strong>

                                        </div>

                                    </div>

                                </div>


                                {{-- Priest --}}

                                <div
                                    class="border-top
                                           pt-4
                                           mb-4"
                                >

                                    <div
                                        class="row
                                               g-3"
                                    >

                                        <div
                                            class="col-12 col-sm-6"
                                        >

                                            <small
                                                class="text-secondary
                                                       d-block
                                                       mb-1"
                                            >
                                                Priest
                                            </small>


                                            <span
                                                class="small
                                                       text-pn-brown
                                                       fw-semibold"
                                            >

                                                <i
                                                    class="bi bi-person-badge
                                                           text-pn-primary
                                                           me-1"
                                                ></i>

                                                {{ $booking['priest'] }}

                                            </span>

                                        </div>


                                        <div
                                            class="col-12 col-sm-6"
                                        >

                                            <small
                                                class="text-secondary
                                                       d-block
                                                       mb-1"
                                            >
                                                Booking Amount
                                            </small>


                                            <span
                                                class="small
                                                       text-pn-brown
                                                       fw-semibold"
                                            >

                                                ₹{{ number_format(
                                                    $booking['amount']
                                                ) }}

                                            </span>

                                        </div>

                                    </div>

                                </div>


                                {{-- Completion / Media Notice --}}

                                @if(
                                    $booking['status'] === 'Completed'
                                )

                                    <div
                                        class="alert
                                               bg-success-subtle
                                               border-0
                                               rounded-4
                                               mb-4"
                                    >

                                        <div
                                            class="d-flex
                                                   align-items-start
                                                   gap-3"
                                        >

                                            <i
                                                class="bi bi-check-circle-fill
                                                       text-success
                                                       fs-5
                                                       mt-1"
                                            ></i>


                                            <div>

                                                <strong
                                                    class="d-block
                                                           text-success-emphasis
                                                           mb-1"
                                                >
                                                    Pooja Completed
                                                </strong>


                                                <small
                                                    class="text-secondary"
                                                >

                                                    Your digital pooja
                                                    has been completed
                                                    successfully.

                                                    @if(
                                                        $booking['photo_video']
                                                    )

                                                        Photos and
                                                        videos are
                                                        available.

                                                    @endif

                                                </small>

                                            </div>

                                        </div>

                                    </div>

                                @elseif(
                                    $booking['status'] === 'Scheduled'
                                )

                                    <div
                                        class="alert
                                               bg-primary-subtle
                                               border-0
                                               rounded-4
                                               mb-4"
                                    >

                                        <div
                                            class="d-flex
                                                   align-items-start
                                                   gap-3"
                                        >

                                            <i
                                                class="bi bi-calendar-event
                                                       text-primary
                                                       fs-5
                                                       mt-1"
                                            ></i>


                                            <div>

                                                <strong
                                                    class="d-block
                                                           text-primary-emphasis
                                                           mb-1"
                                                >
                                                    Your pooja is scheduled.
                                                </strong>


                                                <small
                                                    class="text-secondary"
                                                >

                                                    Please check your
                                                    booking details
                                                    before the scheduled
                                                    date.

                                                </small>

                                            </div>

                                        </div>

                                    </div>

                                @elseif(
                                    $booking['status'] === 'Cancelled'
                                )

                                    <div
                                        class="alert
                                               bg-danger-subtle
                                               border-0
                                               rounded-4
                                               mb-4"
                                    >

                                        <div
                                            class="d-flex
                                                   align-items-start
                                                   gap-3"
                                        >

                                            <i
                                                class="bi bi-x-circle-fill
                                                       text-danger
                                                       fs-5
                                                       mt-1"
                                            ></i>


                                            <div>

                                                <strong
                                                    class="d-block
                                                           text-danger-emphasis
                                                           mb-1"
                                                >
                                                    Booking Cancelled
                                                </strong>


                                                <small
                                                    class="text-secondary"
                                                >

                                                    This digital pooja
                                                    booking has been
                                                    cancelled.

                                                </small>

                                            </div>

                                        </div>

                                    </div>

                                @endif


                                {{-- Actions --}}

                                <div
                                    class="d-flex
                                           flex-column
                                           flex-sm-row
                                           justify-content-sm-end
                                           gap-2"
                                >

                                    <a
                                        href="#"
                                        class="btn
                                               btn-pn-outline"
                                    >

                                        <i
                                            class="bi bi-eye me-1"
                                        ></i>

                                        View Details

                                    </a>


                                    @if(
                                        $booking['status'] === 'Scheduled'
                                    )

                                        <a
                                            href="#"
                                            class="btn
                                                   btn-pn"
                                        >

                                            <i
                                                class="bi bi-camera-video me-1"
                                            ></i>

                                            View Session

                                        </a>

                                    @endif


                                    @if(
                                        $booking['photo_video']
                                    )

                                        <a
                                            href="#"
                                            class="btn
                                                   btn-outline-secondary"
                                        >

                                            <i
                                                class="bi bi-images me-1"
                                            ></i>

                                            View Photos & Videos

                                        </a>

                                    @endif

                                </div>

                            </div>

                        </article>

                    @endforeach

                </div>


                {{-- ==================================================
                     EMPTY STATE
                =================================================== --}}

                <div
                    id="digitalBookingEmptyState"
                    class="d-none
                           border
                           border-warning-subtle
                           rounded-5
                           p-5
                           text-center
                           mt-4"
                >

                    <i
                        class="bi bi-camera-video
                               display-5
                               text-pn-primary"
                    ></i>


                    <h2
                        class="font-serif
                               h3
                               text-pn-brown
                               mt-3"
                    >
                        No Digital Bookings Found
                    </h2>


                    <p
                        class="text-secondary"
                    >
                        Try changing your search or filter, or
                        explore our digital poojas.
                    </p>


                    <a
                        href="#"
                        class="btn btn-pn mt-2"
                    >

                        Explore Digital Pooja

                    </a>

                </div>


                {{-- ==================================================
                     HOW DIGITAL POOJA WORKS
                =================================================== --}}

                <div class="mt-5">

                    <div class="text-center mb-4">

                        <span
                            class="small
                                   text-pn-gold
                                   fw-semibold
                                   text-uppercase"
                        >
                            Simple & Sacred
                        </span>


                        <h2
                            class="font-serif
                                   h3
                                   text-pn-brown
                                   mt-2"
                        >
                            How Digital Pooja Works
                        </h2>

                    </div>


                    <div
                        class="row
                               row-cols-2
                               row-cols-md-4
                               g-3"
                    >

                        @foreach([
                            [
                                'icon' => 'bi-search',
                                'title' => 'Choose Pooja',
                                'text' => 'Select your desired digital pooja.'
                            ],
                            [
                                'icon' => 'bi-person-heart',
                                'title' => 'Add Sankalp',
                                'text' => 'Provide your sankalp details.'
                            ],
                            [
                                'icon' => 'bi-calendar-check',
                                'title' => 'Choose Date',
                                'text' => 'Select a suitable pooja date.'
                            ],
                            [
                                'icon' => 'bi-stars',
                                'title' => 'Receive Blessings',
                                'text' => 'Receive completion photos or videos.'
                            ]
                        ] as $step)

                            <div class="col">

                                <div
                                    class="card
                                           border
                                           border-warning-subtle
                                           rounded-4
                                           h-100
                                           text-center"
                                >

                                    <div class="card-body p-3 p-md-4">

                                        <div
                                            class="rounded-circle
                                                   bg-pn-cream
                                                   text-pn-primary
                                                   d-flex
                                                   align-items-center
                                                   justify-content-center
                                                   mx-auto
                                                   mb-3"
                                            style="width:54px;height:54px;"
                                        >

                                            <i
                                                class="bi
                                                       {{ $step['icon'] }}
                                                       fs-5"
                                            ></i>

                                        </div>


                                        <h3
                                            class="h6
                                                   fw-semibold
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

                        @endforeach

                    </div>

                </div>


                {{-- ==================================================
                     SUPPORT CTA
                =================================================== --}}

                <div
                    class="pn-digital
                           rounded-5
                           overflow-hidden
                           text-white
                           mt-5"
                >

                    <div
                        class="p-4
                               p-md-5"
                    >

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
                                    Need Assistance?
                                </span>


                                <h2
                                    class="font-serif
                                           h3
                                           mt-2
                                           mb-2"
                                >
                                    We're here to help with your
                                    digital pooja.
                                </h2>


                                <p
                                    class="text-white-50
                                           mb-0"
                                >

                                    If you have questions about your
                                    booking, session or completion
                                    media, our support team can help.

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

                                    Contact Support

                                    <i
                                        class="bi bi-arrow-right ms-2"
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
     PAGE SCRIPT
============================================================ --}}

@push('scripts')

<script>
document.addEventListener('DOMContentLoaded', function () {

    /*
    |--------------------------------------------------------------------------
    | Digital Booking Search / Filter
    |--------------------------------------------------------------------------
    */

    const searchInput =
        document.getElementById(
            'digitalBookingSearch'
        );


    const statusFilter =
        document.getElementById(
            'digitalBookingStatus'
        );


    const resetButton =
        document.getElementById(
            'resetDigitalFilters'
        );


    const bookingCards =
        document.querySelectorAll(
            '.digital-booking-card'
        );


    const emptyState =
        document.getElementById(
            'digitalBookingEmptyState'
        );


    function filterDigitalBookings() {

        const search =
            (
                searchInput?.value
                || ''
            )
                .trim()
                .toLowerCase();


        const status =
            (
                statusFilter?.value
                || 'all'
            )
                .toLowerCase();


        let visibleCount =
            0;


        bookingCards.forEach(
            function (card) {

                const name =
                    card.dataset.bookingName
                    || '';


                const cardStatus =
                    card.dataset.bookingStatus
                    || '';


                const matchesSearch =
                    !search
                    ||
                    name.includes(search)
                    ||
                    card.textContent
                        .toLowerCase()
                        .includes(search);


                const matchesStatus =
                    status === 'all'
                    ||
                    cardStatus.includes(status);


                const visible =
                    matchesSearch
                    &&
                    matchesStatus;


                card.classList.toggle(
                    'd-none',
                    !visible
                );


                if (visible) {

                    visibleCount++;

                }

            }
        );


        if (emptyState) {

            emptyState.classList.toggle(
                'd-none',
                visibleCount !== 0
            );

        }

    }


    searchInput?.addEventListener(
        'input',
        filterDigitalBookings
    );


    statusFilter?.addEventListener(
        'change',
        filterDigitalBookings
    );


    resetButton?.addEventListener(
        'click',
        function () {

            if (searchInput) {

                searchInput.value = '';

            }


            if (statusFilter) {

                statusFilter.value = 'all';

            }


            filterDigitalBookings();

        }
    );

});
</script>

@endpush

@endsection