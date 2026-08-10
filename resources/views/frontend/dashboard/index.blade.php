@extends('layouts.app')

@section('title', 'My Dashboard | Pooja Nilayam')

@section(
    'meta_description',
    'Manage your Pooja Nilayam bookings, orders, digital poojas, wishlist, profile and notifications.'
)

@section('content')

@php

    /*
    |--------------------------------------------------------------------------
    | TEMPORARY UI DATA
    |--------------------------------------------------------------------------
    | These values will later come from the authenticated user,
    | bookings, orders, notifications and other database records.
    |--------------------------------------------------------------------------
    */

    $user = [
        'name' => 'Mahendra Varma',
        'email' => 'customer@example.com',
        'mobile' => '+91 XXXXX XXXXX',
        'initials' => 'MV'
    ];


    $stats = [
        [
            'title' => 'Pooja Bookings',
            'value' => 4,
            'description' => 'Total bookings',
            'icon' => 'bi-flower1',
            'color' => 'primary'
        ],
        [
            'title' => 'Digital Poojas',
            'value' => 2,
            'description' => 'Digital bookings',
            'icon' => 'bi-camera-video',
            'color' => 'success'
        ],
        [
            'title' => 'Orders',
            'value' => 6,
            'description' => 'Store orders',
            'icon' => 'bi-bag',
            'color' => 'warning'
        ],
        [
            'title' => 'Wishlist',
            'value' => 8,
            'description' => 'Saved items',
            'icon' => 'bi-heart',
            'color' => 'danger'
        ]
    ];


    $upcomingBookings = [

        [
            'type' => 'Pooja Booking',
            'name' => 'Ganapati Pooja',
            'date' => '15 August 2026',
            'time' => '10:00 AM',
            'status' => 'Confirmed',
            'icon' => 'bi-flower1'
        ],

        [
            'type' => 'Digital Pooja',
            'name' => 'Sri Satyanarayana Swamy Pooja',
            'date' => '18 August 2026',
            'time' => '6:00 PM',
            'status' => 'Scheduled',
            'icon' => 'bi-camera-video'
        ]

    ];


    $recentOrders = [

        [
            'number' => 'PN-ORD-2026-00124',
            'date' => '08 August 2026',
            'items' => 3,
            'amount' => 1447,
            'status' => 'Processing'
        ],

        [
            'number' => 'PN-ORD-2026-00098',
            'date' => '02 August 2026',
            'items' => 2,
            'amount' => 799,
            'status' => 'Delivered'
        ]

    ];


    $notifications = [

        [
            'title' => 'Your Ganapati Pooja is confirmed.',
            'time' => '2 hours ago',
            'icon' => 'bi-check-circle',
            'color' => 'success'
        ],

        [
            'title' => 'Your order has been shipped.',
            'time' => 'Yesterday',
            'icon' => 'bi-truck',
            'color' => 'primary'
        ],

        [
            'title' => 'A new digital pooja session is available.',
            'time' => '2 days ago',
            'icon' => 'bi-bell',
            'color' => 'warning'
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

                <li
                    class="breadcrumb-item active"
                    aria-current="page"
                >
                    My Dashboard
                </li>

            </ol>

        </nav>

    </div>

</section>


{{-- ============================================================
     DASHBOARD HEADER
============================================================ --}}

<section class="bg-pn-cream py-5">

    <div class="container">

        <div
            class="row
                   align-items-center
                   g-4"
        >

            {{-- Welcome --}}

            <div class="col-12 col-lg-8">

                <div
                    class="d-flex
                           align-items-center
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
                               fw-semibold
                               fs-4"
                        style="width:72px;height:72px;"
                    >

                        {{ $user['initials'] }}

                    </div>


                    <div>

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
                                   mt-1
                                   mb-2"
                        >

                            Welcome,
                            {{ $user['name'] }}

                        </h1>


                        <p
                            class="text-secondary
                                   mb-0"
                        >

                            Manage your bookings, orders,
                            digital poojas and account details
                            from one place.

                        </p>

                    </div>

                </div>

            </div>


            {{-- Profile Action --}}

            <div
                class="col-12 col-lg-4
                       text-lg-end"
            >

                <a
                    href="#"
                    class="btn
                           btn-pn
                           px-4"
                >

                    <i class="bi bi-person me-2"></i>

                    View My Profile

                </a>

            </div>

        </div>

    </div>

</section>


{{-- ============================================================
     DASHBOARD CONTENT
============================================================ --}}

<section class="py-5">

    <div class="container">

        <div class="row g-4 g-xl-5">

            {{-- ====================================================
                 LEFT SIDEBAR
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

                    {{-- User Profile Mini Card --}}

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

                            {{ $user['initials'] }}

                        </div>


                        <h2
                            class="font-serif
                                   h5
                                   text-pn-brown
                                   mb-1"
                        >

                            {{ $user['name'] }}

                        </h2>


                        <small
                            class="text-secondary
                                   text-break"
                        >

                            {{ $user['email'] }}

                        </small>

                    </div>


                    {{-- Navigation --}}

                    <div class="list-group list-group-flush">

                        <a
                            href="#"
                            class="list-group-item
                                   list-group-item-action
                                   active
                                   border-0
                                   py-3"
                        >

                            <i
                                class="bi bi-grid me-3"
                            ></i>

                            Dashboard

                        </a>


                        <a
                            href="#"
                            class="list-group-item
                                   list-group-item-action
                                   border-0
                                   py-3"
                        >

                            <i
                                class="bi bi-person me-3"
                            ></i>

                            My Profile

                        </a>


                        <a
                            href="#"
                            class="list-group-item
                                   list-group-item-action
                                   border-0
                                   py-3"
                        >

                            <i
                                class="bi bi-calendar-check me-3"
                            ></i>

                            My Bookings

                        </a>


                        <a
                            href="#"
                            class="list-group-item
                                   list-group-item-action
                                   border-0
                                   py-3"
                        >

                            <i
                                class="bi bi-camera-video me-3"
                            ></i>

                            Digital Bookings

                        </a>


                        <a
                            href="#"
                            class="list-group-item
                                   list-group-item-action
                                   border-0
                                   py-3"
                        >

                            <i
                                class="bi bi-bag me-3"
                            ></i>

                            Orders

                        </a>


                        <a
                            href="#"
                            class="list-group-item
                                   list-group-item-action
                                   border-0
                                   py-3"
                        >

                            <i
                                class="bi bi-heart me-3"
                            ></i>

                            Wishlist

                        </a>


                        <a
                            href="#"
                            class="list-group-item
                                   list-group-item-action
                                   border-0
                                   py-3"
                        >

                            <i
                                class="bi bi-geo-alt me-3"
                            ></i>

                            Address Book

                        </a>


                        <a
                            href="#"
                            class="list-group-item
                                   list-group-item-action
                                   border-0
                                   py-3"
                        >

                            <i
                                class="bi bi-bell me-3"
                            ></i>

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

                            <i
                                class="bi bi-shield-lock me-3"
                            ></i>

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
                 RIGHT MAIN CONTENT
            ===================================================== --}}

            <div class="col-12 col-lg-9">

                {{-- ==================================================
                     QUICK STATS
                =================================================== --}}

                <div
                    class="row
                           row-cols-1
                           row-cols-sm-2
                           g-3
                           mb-4"
                >

                    @foreach($stats as $stat)

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
                                           p-4"
                                >

                                    <div
                                        class="d-flex
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

                                                {{ $stat['title'] }}

                                            </small>


                                            <strong
                                                class="font-serif
                                                       display-6
                                                       text-pn-brown"
                                            >

                                                {{ $stat['value'] }}

                                            </strong>


                                            <small
                                                class="text-secondary
                                                       d-block
                                                       mt-1"
                                            >

                                                {{ $stat['description'] }}

                                            </small>

                                        </div>


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
                                                       {{ $stat['icon'] }}
                                                       fs-5"
                                            ></i>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    @endforeach

                </div>


                {{-- ==================================================
                     QUICK ACTIONS
                =================================================== --}}

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
                                    Quick Actions
                                </span>


                                <h2
                                    class="font-serif
                                           h3
                                           text-pn-brown
                                           mt-1
                                           mb-0"
                                >
                                    What would you like to do?
                                </h2>

                            </div>

                        </div>


                        <div
                            class="row
                                   row-cols-2
                                   row-cols-md-4
                                   g-3"
                        >

                            <div class="col">

                                <a
                                    href="#"
                                    class="text-decoration-none"
                                >

                                    <div
                                        class="border
                                               border-warning-subtle
                                               rounded-4
                                               p-3
                                               h-100
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
                                            style="width:48px;height:48px;"
                                        >

                                            <i
                                                class="bi bi-flower1"
                                            ></i>

                                        </div>


                                        <strong
                                            class="small
                                                   text-pn-brown"
                                        >
                                            Book a Pooja
                                        </strong>

                                    </div>

                                </a>

                            </div>


                            <div class="col">

                                <a
                                    href="#"
                                    class="text-decoration-none"
                                >

                                    <div
                                        class="border
                                               border-warning-subtle
                                               rounded-4
                                               p-3
                                               h-100
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
                                            style="width:48px;height:48px;"
                                        >

                                            <i
                                                class="bi bi-camera-video"
                                            ></i>

                                        </div>


                                        <strong
                                            class="small
                                                   text-pn-brown"
                                        >
                                            Digital Pooja
                                        </strong>

                                    </div>

                                </a>

                            </div>


                            <div class="col">

                                <a
                                    href="#"
                                    class="text-decoration-none"
                                >

                                    <div
                                        class="border
                                               border-warning-subtle
                                               rounded-4
                                               p-3
                                               h-100
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
                                            style="width:48px;height:48px;"
                                        >

                                            <i
                                                class="bi bi-bag"
                                            ></i>

                                        </div>


                                        <strong
                                            class="small
                                                   text-pn-brown"
                                        >
                                            Shop Pooja Items
                                        </strong>

                                    </div>

                                </a>

                            </div>


                            <div class="col">

                                <a
                                    href="#"
                                    class="text-decoration-none"
                                >

                                    <div
                                        class="border
                                               border-warning-subtle
                                               rounded-4
                                               p-3
                                               h-100
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
                                            style="width:48px;height:48px;"
                                        >

                                            <i
                                                class="bi bi-heart"
                                            ></i>

                                        </div>


                                        <strong
                                            class="small
                                                   text-pn-brown"
                                        >
                                            Make a Donation
                                        </strong>

                                    </div>

                                </a>

                            </div>

                        </div>

                    </div>

                </div>


                {{-- ==================================================
                     UPCOMING BOOKINGS
                =================================================== --}}

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
                                    Upcoming
                                </span>


                                <h2
                                    class="font-serif
                                           h3
                                           text-pn-brown
                                           mt-1
                                           mb-0"
                                >
                                    Upcoming Bookings
                                </h2>

                            </div>


                            <a
                                href="#"
                                class="small
                                       text-pn-primary
                                       fw-semibold
                                       text-decoration-none"
                            >

                                View All

                                <i
                                    class="bi bi-arrow-right ms-1"
                                ></i>

                            </a>

                        </div>


                        <div class="vstack gap-3">

                            @foreach(
                                $upcomingBookings as $booking
                            )

                                <div
                                    class="border
                                           border-warning-subtle
                                           rounded-4
                                           p-3"
                                >

                                    <div
                                        class="row
                                               align-items-center
                                               g-3"
                                    >

                                        <div class="col-auto">

                                            <div
                                                class="rounded-circle
                                                       bg-pn-cream
                                                       text-pn-primary
                                                       d-flex
                                                       align-items-center
                                                       justify-content-center"
                                                style="width:52px;height:52px;"
                                            >

                                                <i
                                                    class="bi
                                                           {{ $booking['icon'] }}"
                                                ></i>

                                            </div>

                                        </div>


                                        <div class="col">

                                            <small
                                                class="text-pn-gold
                                                       fw-semibold
                                                       d-block
                                                       mb-1"
                                            >

                                                {{ $booking['type'] }}

                                            </small>


                                            <strong
                                                class="d-block
                                                       text-pn-brown"
                                            >

                                                {{ $booking['name'] }}

                                            </strong>


                                            <small
                                                class="text-secondary"
                                            >

                                                {{ $booking['date'] }}
                                                &nbsp;•&nbsp;
                                                {{ $booking['time'] }}

                                            </small>

                                        </div>


                                        <div
                                            class="col-12
                                                   col-sm-auto"
                                        >

                                            <span
                                                class="badge
                                                       bg-success-subtle
                                                       text-success
                                                       rounded-pill
                                                       px-3
                                                       py-2"
                                            >

                                                {{ $booking['status'] }}

                                            </span>

                                        </div>

                                    </div>

                                </div>

                            @endforeach

                        </div>

                    </div>

                </div>


                {{-- ==================================================
                     ORDERS
                =================================================== --}}

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
                                    Store
                                </span>


                                <h2
                                    class="font-serif
                                           h3
                                           text-pn-brown
                                           mt-1
                                           mb-0"
                                >
                                    Recent Orders
                                </h2>

                            </div>


                            <a
                                href="#"
                                class="small
                                       text-pn-primary
                                       fw-semibold
                                       text-decoration-none"
                            >

                                View All

                                <i
                                    class="bi bi-arrow-right ms-1"
                                ></i>

                            </a>

                        </div>


                        <div class="table-responsive">

                            <table
                                class="table
                                       align-middle
                                       mb-0"
                            >

                                <thead>

                                    <tr>

                                        <th
                                            class="small
                                                   text-secondary
                                                   fw-semibold"
                                        >
                                            Order
                                        </th>


                                        <th
                                            class="small
                                                   text-secondary
                                                   fw-semibold"
                                        >
                                            Date
                                        </th>


                                        <th
                                            class="small
                                                   text-secondary
                                                   fw-semibold"
                                        >
                                            Items
                                        </th>


                                        <th
                                            class="small
                                                   text-secondary
                                                   fw-semibold"
                                        >
                                            Amount
                                        </th>


                                        <th
                                            class="small
                                                   text-secondary
                                                   fw-semibold"
                                        >
                                            Status
                                        </th>

                                    </tr>

                                </thead>


                                <tbody>

                                    @foreach(
                                        $recentOrders as $order
                                    )

                                        <tr>

                                            <td>

                                                <strong
                                                    class="small
                                                           text-pn-brown"
                                                >

                                                    {{ $order['number'] }}

                                                </strong>

                                            </td>


                                            <td>

                                                <small
                                                    class="text-secondary"
                                                >

                                                    {{ $order['date'] }}

                                                </small>

                                            </td>


                                            <td>

                                                <small
                                                    class="text-secondary"
                                                >

                                                    {{ $order['items'] }}

                                                </small>

                                            </td>


                                            <td>

                                                <strong
                                                    class="small
                                                           text-pn-brown"
                                                >

                                                    ₹{{ number_format(
                                                        $order['amount']
                                                    ) }}

                                                </strong>

                                            </td>


                                            <td>

                                                @if(
                                                    $order['status']
                                                    === 'Delivered'
                                                )

                                                    <span
                                                        class="badge
                                                               bg-success-subtle
                                                               text-success
                                                               rounded-pill"
                                                    >

                                                        Delivered

                                                    </span>

                                                @else

                                                    <span
                                                        class="badge
                                                               bg-warning-subtle
                                                               text-warning-emphasis
                                                               rounded-pill"
                                                    >

                                                        {{ $order['status'] }}

                                                    </span>

                                                @endif

                                            </td>

                                        </tr>

                                    @endforeach

                                </tbody>

                            </table>

                        </div>

                    </div>

                </div>


                {{-- ==================================================
                     NOTIFICATIONS
                =================================================== --}}

                <div
                    class="card
                           border
                           border-warning-subtle
                           rounded-5"
                >

                    <div class="card-body p-4">

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
                                    Updates
                                </span>


                                <h2
                                    class="font-serif
                                           h3
                                           text-pn-brown
                                           mt-1
                                           mb-0"
                                >
                                    Recent Notifications
                                </h2>

                            </div>


                            <a
                                href="#"
                                class="small
                                       text-pn-primary
                                       fw-semibold
                                       text-decoration-none"
                            >

                                View All

                                <i
                                    class="bi bi-arrow-right ms-1"
                                ></i>

                            </a>

                        </div>


                        <div class="vstack gap-3">

                            @foreach(
                                $notifications as $notification
                            )

                                <div
                                    class="d-flex
                                           align-items-start
                                           gap-3
                                           border-bottom
                                           pb-3"
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
                                            class="bi
                                                   {{ $notification['icon'] }}"
                                        ></i>

                                    </div>


                                    <div class="flex-grow-1">

                                        <strong
                                            class="d-block
                                                   small
                                                   text-pn-brown"
                                        >

                                            {{ $notification['title'] }}

                                        </strong>


                                        <small
                                            class="text-secondary"
                                        >

                                            {{ $notification['time'] }}

                                        </small>

                                    </div>

                                </div>

                            @endforeach

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

<section class="pb-5">

    <div class="container">

        <div
            class="pn-digital
                   rounded-5
                   overflow-hidden
                   text-white"
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
                                   display-6
                                   mt-2
                                   mb-2"
                        >

                            We're here to help with your
                            devotional journey.

                        </h2>


                        <p
                            class="text-white-50
                                   mb-0"
                        >

                            If you have questions about bookings,
                            orders, payments or other services,
                            our support team can assist you.

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

@endsection