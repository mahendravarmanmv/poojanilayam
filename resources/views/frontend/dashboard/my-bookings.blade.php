@extends('layouts.app')

@section('title', 'My Bookings | Pooja Nilayam')

@section(
    'meta_description',
    'View and manage your Pooja Nilayam bookings, upcoming poojas and booking history.'
)

@section('content')

@php

    /*
    |--------------------------------------------------------------------------
    | TEMPORARY UI DATA
    |--------------------------------------------------------------------------
    | These values will later come from the authenticated customer's
    | booking records.
    |--------------------------------------------------------------------------
    */

    $bookings = [

        [
            'id' => 'PN-BKG-2026-00124',
            'type' => 'Online Pooja',
            'name' => 'Ganapathi Homam',
            'date' => '15 August 2026',
            'time' => '10:00 AM',
            'duration' => '60 Mins',
            'status' => 'Confirmed',
            'status_class' => 'success',
            'icon' => 'bi-flower1',
            'priest' => 'Assigned Priest',
            'location' => 'Online',
            'amount' => 501,
            'is_upcoming' => true
        ],

        [
            'id' => 'PN-BKG-2026-00108',
            'type' => 'Temple Pooja',
            'name' => 'Sri Satyanarayana Pooja',
            'date' => '21 August 2026',
            'time' => '9:30 AM',
            'duration' => '90 Mins',
            'status' => 'Pending Confirmation',
            'status_class' => 'warning',
            'icon' => 'bi-building',
            'priest' => 'To be assigned',
            'location' => 'Temple',
            'amount' => 601,
            'is_upcoming' => true
        ],

        [
            'id' => 'PN-BKG-2026-00087',
            'type' => 'Online Pooja',
            'name' => 'Rudrabhishekam',
            'date' => '02 August 2026',
            'time' => '8:00 AM',
            'duration' => '90 Mins',
            'status' => 'Completed',
            'status_class' => 'success',
            'icon' => 'bi-flower1',
            'priest' => 'Assigned Priest',
            'location' => 'Online',
            'amount' => 1101,
            'is_upcoming' => false
        ],

        [
            'id' => 'PN-BKG-2026-00061',
            'type' => 'Temple Pooja',
            'name' => 'Lakshmi Pooja',
            'date' => '25 July 2026',
            'time' => '6:00 PM',
            'duration' => '60 Mins',
            'status' => 'Completed',
            'status_class' => 'success',
            'icon' => 'bi-building',
            'priest' => 'Assigned Priest',
            'location' => 'Temple',
            'amount' => 501,
            'is_upcoming' => false
        ],

        [
            'id' => 'PN-BKG-2026-00042',
            'type' => 'Online Pooja',
            'name' => 'Navagraha Pooja',
            'date' => '18 July 2026',
            'time' => '11:00 AM',
            'duration' => '90 Mins',
            'status' => 'Cancelled',
            'status_class' => 'danger',
            'icon' => 'bi-flower1',
            'priest' => 'Not Assigned',
            'location' => 'Online',
            'amount' => 901,
            'is_upcoming' => false
        ]

    ];


    $upcomingBookings =
        array_values(
            array_filter(
                $bookings,
                fn ($booking) => $booking['is_upcoming']
            )
        );


    $pastBookings =
        array_values(
            array_filter(
                $bookings,
                fn ($booking) => !$booking['is_upcoming']
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
                        My Dashboard
                    </a>

                </li>


                <li
                    class="breadcrumb-item active"
                    aria-current="page"
                >
                    My Bookings
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
                    My Bookings
                </h1>


                <p
                    class="text-secondary
                           mb-0"
                >
                    View your upcoming poojas and booking history
                    in one place.
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

                    <i class="bi bi-flower1 me-2"></i>

                    Book a Pooja

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

                    {{-- User --}}

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


                    {{-- Navigation --}}

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
                                   active
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
                 BOOKINGS CONTENT
            ===================================================== --}}

            <div class="col-12 col-lg-9">


                {{-- ==================================================
                     BOOKING SUMMARY
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
                                    {{ count($bookings) }}
                                </strong>


                                <small
                                    class="text-secondary
                                           d-block"
                                >
                                    Bookings
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
                                    Upcoming
                                </small>


                                <strong
                                    class="font-serif
                                           display-6
                                           text-pn-brown"
                                >
                                    {{ count($upcomingBookings) }}
                                </strong>


                                <small
                                    class="text-secondary
                                           d-block"
                                >
                                    Scheduled
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

                                    {{ count(
                                        array_filter(
                                            $bookings,
                                            fn ($booking) =>
                                                $booking['status']
                                                === 'Completed'
                                        )
                                    ) }}

                                </strong>


                                <small
                                    class="text-secondary
                                           d-block"
                                >
                                    Services
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
                                    Cancelled
                                </small>


                                <strong
                                    class="font-serif
                                           display-6
                                           text-pn-brown"
                                >

                                    {{ count(
                                        array_filter(
                                            $bookings,
                                            fn ($booking) =>
                                                $booking['status']
                                                === 'Cancelled'
                                        )
                                    ) }}

                                </strong>


                                <small
                                    class="text-secondary
                                           d-block"
                                >
                                    Bookings
                                </small>

                            </div>

                        </div>

                    </div>

                </div>


                {{-- ==================================================
                     BOOKING FILTERS
                =================================================== --}}

                <div
                    class="card
                           border
                           border-warning-subtle
                           rounded-5
                           mb-4"
                >

                    <div class="card-body p-3 p-md-4">

                        <div
                            class="row
                                   align-items-center
                                   g-3"
                        >

                            {{-- Search --}}

                            <div class="col-12 col-md-5">

                                <label
                                    for="bookingSearch"
                                    class="visually-hidden"
                                >
                                    Search bookings
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
                                        id="bookingSearch"
                                        class="form-control"
                                        placeholder="Search booking..."
                                        autocomplete="off"
                                    >

                                </div>

                            </div>


                            {{-- Type --}}

                            <div class="col-12 col-sm-6 col-md-3">

                                <label
                                    for="bookingType"
                                    class="visually-hidden"
                                >
                                    Booking type
                                </label>


                                <select
                                    id="bookingType"
                                    class="form-select"
                                >

                                    <option value="all">
                                        All Types
                                    </option>

                                    <option value="online">
                                        Online Pooja
                                    </option>

                                    <option value="temple">
                                        Temple Pooja
                                    </option>

                                </select>

                            </div>


                            {{-- Status --}}

                            <div class="col-12 col-sm-6 col-md-3">

                                <label
                                    for="bookingStatus"
                                    class="visually-hidden"
                                >
                                    Booking status
                                </label>


                                <select
                                    id="bookingStatus"
                                    class="form-select"
                                >

                                    <option value="all">
                                        All Status
                                    </option>

                                    <option value="confirmed">
                                        Confirmed
                                    </option>

                                    <option value="pending">
                                        Pending
                                    </option>

                                    <option value="completed">
                                        Completed
                                    </option>

                                    <option value="cancelled">
                                        Cancelled
                                    </option>

                                </select>

                            </div>


                            {{-- Reset --}}

                            <div
                                class="col-12 col-md-1"
                            >

                                <button
                                    type="button"
                                    id="resetBookingFilters"
                                    class="btn
                                           btn-light
                                           border
                                           w-100"
                                    title="Reset filters"
                                    aria-label="Reset filters"
                                >

                                    <i class="bi bi-arrow-counterclockwise"></i>

                                </button>

                            </div>

                        </div>

                    </div>

                </div>


                {{-- ==================================================
                     TABS
                =================================================== --}}

                <ul
                    class="nav
                           nav-pills
                           nav-fill
                           bg-pn-cream
                           rounded-4
                           p-1
                           mb-4"
                    id="bookingTabs"
                    role="tablist"
                >

                    <li
                        class="nav-item"
                        role="presentation"
                    >

                        <button
                            class="nav-link
                                   active
                                   rounded-3
                                   fw-semibold"
                            id="upcoming-tab"
                            data-bs-toggle="pill"
                            data-bs-target="#upcomingBookings"
                            type="button"
                            role="tab"
                            aria-controls="upcomingBookings"
                            aria-selected="true"
                        >

                            Upcoming

                            <span
                                class="badge
                                       bg-white
                                       text-pn-primary
                                       rounded-pill
                                       ms-1"
                            >
                                {{ count($upcomingBookings) }}
                            </span>

                        </button>

                    </li>


                    <li
                        class="nav-item"
                        role="presentation"
                    >

                        <button
                            class="nav-link
                                   rounded-3
                                   fw-semibold"
                            id="history-tab"
                            data-bs-toggle="pill"
                            data-bs-target="#bookingHistory"
                            type="button"
                            role="tab"
                            aria-controls="bookingHistory"
                            aria-selected="false"
                        >

                            Booking History

                            <span
                                class="badge
                                       bg-white
                                       text-pn-primary
                                       rounded-pill
                                       ms-1"
                            >
                                {{ count($pastBookings) }}
                            </span>

                        </button>

                    </li>

                </ul>


                <div
                    class="tab-content"
                    id="bookingTabsContent"
                >

                    {{-- ==================================================
                         UPCOMING BOOKINGS
                    =================================================== --}}

                    <div
                        class="tab-pane
                               fade
                               show
                               active"
                        id="upcomingBookings"
                        role="tabpanel"
                        aria-labelledby="upcoming-tab"
                        tabindex="0"
                    >

                        @if(
                            count($upcomingBookings) > 0
                        )

                            <div
                                class="vstack
                                       gap-4"
                                id="upcomingBookingList"
                            >

                                @foreach(
                                    $upcomingBookings as $booking
                                )

                                    <article
                                        class="booking-card
                                               card
                                               border
                                               border-warning-subtle
                                               rounded-5"
                                        data-booking-name="{{ strtolower($booking['name']) }}"
                                        data-booking-type="{{ strtolower($booking['type']) }}"
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
                                                            {{ $booking['type'] }}
                                                        </span>


                                                        <h2
                                                            class="font-serif
                                                                   h4
                                                                   text-pn-brown
                                                                   mt-1
                                                                   mb-1"
                                                        >
                                                            {{ $booking['name'] }}
                                                        </h2>


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


                                            {{-- Booking Details --}}

                                            <div
                                                class="row
                                                       row-cols-1
                                                       row-cols-sm-2
                                                       row-cols-xl-4
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
                                                            Date
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
                                                            Time
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
                                                            Duration
                                                        </small>


                                                        <strong
                                                            class="small
                                                                   text-pn-brown"
                                                        >

                                                            <i
                                                                class="bi bi-hourglass-split
                                                                       text-pn-primary
                                                                       me-1"
                                                            ></i>

                                                            {{ $booking['duration'] }}

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
                                                            Amount
                                                        </small>


                                                        <strong
                                                            class="small
                                                                   text-pn-brown"
                                                        >

                                                            ₹{{ number_format(
                                                                $booking['amount']
                                                            ) }}

                                                        </strong>

                                                    </div>

                                                </div>

                                            </div>


                                            {{-- Priest / Location --}}

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
                                                            Location
                                                        </small>


                                                        <span
                                                            class="small
                                                                   text-pn-brown
                                                                   fw-semibold"
                                                        >

                                                            <i
                                                                class="bi bi-geo-alt
                                                                       text-pn-primary
                                                                       me-1"
                                                            ></i>

                                                            {{ $booking['location'] }}

                                                        </span>

                                                    </div>

                                                </div>

                                            </div>


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
                                                    $booking['status']
                                                    === 'Confirmed'
                                                )

                                                    <button
                                                        type="button"
                                                        class="btn
                                                               btn-outline-danger
                                                               cancel-booking"
                                                        data-booking-id="{{ $booking['id'] }}"
                                                        data-booking-name="{{ $booking['name'] }}"
                                                    >

                                                        <i
                                                            class="bi bi-x-circle me-1"
                                                        ></i>

                                                        Cancel Booking

                                                    </button>

                                                @endif

                                            </div>

                                        </div>

                                    </article>

                                @endforeach

                            </div>

                        @else

                            <div
                                class="border
                                       border-warning-subtle
                                       rounded-5
                                       p-5
                                       text-center"
                            >

                                <i
                                    class="bi bi-calendar-x
                                           display-5
                                           text-pn-primary"
                                ></i>


                                <h2
                                    class="font-serif
                                           h3
                                           text-pn-brown
                                           mt-3"
                                >
                                    No Upcoming Bookings
                                </h2>


                                <p
                                    class="text-secondary"
                                >
                                    You currently don't have any
                                    upcoming bookings.
                                </p>


                                <a
                                    href="#"
                                    class="btn btn-pn mt-2"
                                >
                                    Book a Pooja
                                </a>

                            </div>

                        @endif

                    </div>


                    {{-- ==================================================
                         BOOKING HISTORY
                    =================================================== --}}

                    <div
                        class="tab-pane
                               fade"
                        id="bookingHistory"
                        role="tabpanel"
                        aria-labelledby="history-tab"
                        tabindex="0"
                    >

                        @if(
                            count($pastBookings) > 0
                        )

                            <div
                                class="vstack
                                       gap-3"
                                id="bookingHistoryList"
                            >

                                @foreach(
                                    $pastBookings as $booking
                                )

                                    <article
                                        class="booking-card
                                               card
                                               border
                                               border-warning-subtle
                                               rounded-5"
                                        data-booking-name="{{ strtolower($booking['name']) }}"
                                        data-booking-type="{{ strtolower($booking['type']) }}"
                                        data-booking-status="{{ strtolower($booking['status']) }}"
                                    >

                                        <div class="card-body p-4">

                                            <div
                                                class="row
                                                       align-items-center
                                                       g-4"
                                            >

                                                {{-- Icon --}}

                                                <div class="col-auto">

                                                    <div
                                                        class="rounded-circle
                                                               bg-pn-cream
                                                               text-pn-primary
                                                               d-flex
                                                               align-items-center
                                                               justify-content-center"
                                                        style="width:56px;height:56px;"
                                                    >

                                                        <i
                                                            class="bi
                                                                   {{ $booking['icon'] }}
                                                                   fs-5"
                                                        ></i>

                                                    </div>

                                                </div>


                                                {{-- Details --}}

                                                <div
                                                    class="col"
                                                >

                                                    <span
                                                        class="small
                                                               text-pn-gold
                                                               fw-semibold
                                                               text-uppercase"
                                                    >
                                                        {{ $booking['type'] }}
                                                    </span>


                                                    <h2
                                                        class="font-serif
                                                               h5
                                                               text-pn-brown
                                                               mt-1
                                                               mb-1"
                                                    >
                                                        {{ $booking['name'] }}
                                                    </h2>


                                                    <div
                                                        class="small
                                                               text-secondary"
                                                    >

                                                        {{ $booking['date'] }}

                                                        <span class="mx-1">
                                                            •
                                                        </span>

                                                        {{ $booking['time'] }}

                                                        <span class="mx-1">
                                                            •
                                                        </span>

                                                        {{ $booking['id'] }}

                                                    </div>

                                                </div>


                                                {{-- Amount / Status --}}

                                                <div
                                                    class="col-12
                                                           col-sm-auto"
                                                >

                                                    <div
                                                        class="d-flex
                                                               flex-sm-column
                                                               align-items-center
                                                               align-items-sm-end
                                                               gap-2"
                                                    >

                                                        <strong
                                                            class="text-pn-brown"
                                                        >

                                                            ₹{{ number_format(
                                                                $booking['amount']
                                                            ) }}

                                                        </strong>


                                                        <span
                                                            class="badge
                                                                   bg-{{ $booking['status_class'] }}-subtle
                                                                   text-{{ $booking['status_class'] }}
                                                                   rounded-pill"
                                                        >

                                                            {{ $booking['status'] }}

                                                        </span>

                                                    </div>

                                                </div>


                                                {{-- View --}}

                                                <div
                                                    class="col-12
                                                           col-sm-auto"
                                                >

                                                    <a
                                                        href="#"
                                                        class="btn
                                                               btn-light
                                                               border
                                                               rounded-circle
                                                               d-flex
                                                               align-items-center
                                                               justify-content-center
                                                               ms-sm-auto"
                                                        style="width:42px;height:42px;"
                                                        aria-label="View booking details"
                                                    >

                                                        <i
                                                            class="bi bi-chevron-right"
                                                        ></i>

                                                    </a>

                                                </div>

                                            </div>

                                        </div>

                                    </article>

                                @endforeach

                            </div>

                        @else

                            <div
                                class="border
                                       border-warning-subtle
                                       rounded-5
                                       p-5
                                       text-center"
                            >

                                <i
                                    class="bi bi-calendar-check
                                           display-5
                                           text-pn-primary"
                                ></i>


                                <h2
                                    class="font-serif
                                           h3
                                           text-pn-brown
                                           mt-3"
                                >
                                    No Booking History
                                </h2>


                                <p
                                    class="text-secondary"
                                >
                                    Your completed bookings will
                                    appear here.
                                </p>

                            </div>

                        @endif

                    </div>

                </div>


                {{-- ==================================================
                     BOOKING INFORMATION
                =================================================== --}}

                <div
                    class="alert
                           bg-pn-cream
                           border-0
                           rounded-5
                           p-4
                           mt-4"
                >

                    <div
                        class="d-flex
                               align-items-start
                               gap-3"
                    >

                        <i
                            class="bi bi-info-circle
                                   text-pn-primary
                                   fs-5
                                   mt-1"
                        ></i>


                        <div>

                            <strong
                                class="d-block
                                       text-pn-brown
                                       mb-1"
                            >
                                About your bookings
                            </strong>


                            <small
                                class="text-secondary"
                            >

                                Booking confirmations and important
                                service updates may be sent through
                                the notification channels configured
                                for your account.

                            </small>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- ============================================================
     CANCEL BOOKING MODAL
============================================================ --}}

<div
    class="modal fade"
    id="cancelBookingModal"
    tabindex="-1"
    aria-labelledby="cancelBookingModalLabel"
    aria-hidden="true"
>

    <div
        class="modal-dialog
               modal-dialog-centered
               modal-sm"
    >

        <div class="modal-content border-0 rounded-5">

            <div class="modal-body p-4 text-center">

                <div
                    class="rounded-circle
                           bg-danger-subtle
                           text-danger
                           d-flex
                           align-items-center
                           justify-content-center
                           mx-auto
                           mb-3"
                    style="width:60px;height:60px;"
                >

                    <i class="bi bi-calendar-x fs-5"></i>

                </div>


                <h2
                    class="font-serif
                           h4
                           text-pn-brown
                           mb-2"
                    id="cancelBookingModalLabel"
                >
                    Cancel Booking?
                </h2>


                <p
                    class="small
                           text-secondary
                           mb-4"
                    id="cancelBookingMessage"
                >
                    Are you sure you want to cancel this booking?
                </p>


                <div
                    class="d-flex
                           flex-column
                           flex-sm-row
                           gap-2"
                >

                    <button
                        type="button"
                        class="btn
                               btn-outline-secondary
                               flex-fill"
                        data-bs-dismiss="modal"
                    >
                        Keep Booking
                    </button>


                    <button
                        type="button"
                        class="btn
                               btn-danger
                               flex-fill"
                        id="confirmCancelBooking"
                    >
                        Cancel Booking
                    </button>

                </div>

            </div>

        </div>

    </div>

</div>


{{-- ============================================================
     PAGE SCRIPT
============================================================ --}}

@push('scripts')

<script>
document.addEventListener('DOMContentLoaded', function () {

    /*
    |--------------------------------------------------------------------------
    | Booking Search + Filters
    |--------------------------------------------------------------------------
    */

    const searchInput =
        document.getElementById(
            'bookingSearch'
        );


    const typeFilter =
        document.getElementById(
            'bookingType'
        );


    const statusFilter =
        document.getElementById(
            'bookingStatus'
        );


    const resetButton =
        document.getElementById(
            'resetBookingFilters'
        );


    const bookingCards =
        document.querySelectorAll(
            '.booking-card'
        );


    function filterBookings() {

        const search =
            (
                searchInput?.value
                || ''
            )
                .trim()
                .toLowerCase();


        const type =
            (
                typeFilter?.value
                || 'all'
            )
                .toLowerCase();


        const status =
            (
                statusFilter?.value
                || 'all'
            )
                .toLowerCase();


        bookingCards.forEach(
            function (card) {

                const name =
                    card.dataset.bookingName
                    || '';


                const cardType =
                    card.dataset.bookingType
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


                const matchesType =
                    type === 'all'
                    ||
                    cardType.includes(type);


                let matchesStatus =
                    status === 'all'
                    ||
                    cardStatus.includes(status);


                card.classList.toggle(
                    'd-none',
                    !(
                        matchesSearch
                        &&
                        matchesType
                        &&
                        matchesStatus
                    )
                );

            }
        );

    }


    searchInput?.addEventListener(
        'input',
        filterBookings
    );


    typeFilter?.addEventListener(
        'change',
        filterBookings
    );


    statusFilter?.addEventListener(
        'change',
        filterBookings
    );


    resetButton?.addEventListener(
        'click',
        function () {

            if (searchInput) {

                searchInput.value = '';

            }


            if (typeFilter) {

                typeFilter.value = 'all';

            }


            if (statusFilter) {

                statusFilter.value = 'all';

            }


            filterBookings();

        }
    );


    /*
    |--------------------------------------------------------------------------
    | Cancel Booking
    |--------------------------------------------------------------------------
    */

    const cancelButtons =
        document.querySelectorAll(
            '.cancel-booking'
        );


    const cancelModalElement =
        document.getElementById(
            'cancelBookingModal'
        );


    const cancelModal =
        cancelModalElement
            ? new bootstrap.Modal(
                cancelModalElement
            )
            : null;


    const cancelMessage =
        document.getElementById(
            'cancelBookingMessage'
        );


    const confirmCancel =
        document.getElementById(
            'confirmCancelBooking'
        );


    let selectedBookingId =
        null;


    cancelButtons.forEach(
        function (button) {

            button.addEventListener(
                'click',
                function () {

                    selectedBookingId =
                        this.dataset.bookingId;


                    const bookingName =
                        this.dataset.bookingName
                        || 'this booking';


                    if (cancelMessage) {

                        cancelMessage.textContent =
                            'Are you sure you want to cancel ' +
                            bookingName +
                            '?';

                    }


                    cancelModal?.show();

                }
            );

        }
    );


    confirmCancel?.addEventListener(
        'click',
        function () {

            if (!selectedBookingId) {

                return;

            }


            /*
            |--------------------------------------------------------------------------
            | Backend cancellation route will be connected later.
            |--------------------------------------------------------------------------
            */

            this.disabled =
                true;


            this.innerHTML =
                '<span class="spinner-border spinner-border-sm me-2"></span>' +
                'Cancelling...';


            setTimeout(
                function () {

                    cancelModal?.hide();


                    confirmCancel.disabled =
                        false;


                    confirmCancel.innerHTML =
                        'Cancel Booking';


                    selectedBookingId =
                        null;

                },
                800
            );

        }
    );

});
</script>

@endpush

@endsection