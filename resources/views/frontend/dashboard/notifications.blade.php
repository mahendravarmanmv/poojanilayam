@extends('layouts.app')

@section('title', 'Notifications | Pooja Nilayam')

@section(
    'meta_description',
    'View your latest Pooja Nilayam booking, pooja, order and account notifications.'
)

@section('content')

@php

    /*
    |--------------------------------------------------------------------------
    | TEMPORARY UI DATA
    |--------------------------------------------------------------------------
    | These notifications will later come from the authenticated
    | customer's notification records.
    |--------------------------------------------------------------------------
    */

    $notifications = [

        [
            'id' => 1,
            'type' => 'booking',
            'title' => 'Your Ganapathi Homam is confirmed',
            'message' =>
                'Your online Ganapathi Homam has been confirmed for 15 August 2026 at 10:00 AM.',
            'time' => '10 minutes ago',
            'date' => '10 August 2026',
            'icon' => 'bi-calendar-check',
            'color' => 'primary',
            'read' => false,
            'action' => 'View Booking',
            'link' => '#'
        ],

        [
            'id' => 2,
            'type' => 'digital',
            'title' => 'Digital Pooja scheduled',
            'message' =>
                'Your Rudrabhishekam digital pooja is scheduled. Your completion photos and video will be available after the pooja.',
            'time' => '2 hours ago',
            'date' => '10 August 2026',
            'icon' => 'bi-camera-video',
            'color' => 'primary',
            'read' => false,
            'action' => 'View Digital Booking',
            'link' => '#'
        ],

        [
            'id' => 3,
            'type' => 'order',
            'title' => 'Your order has been shipped',
            'message' =>
                'Order PN-ORD-2026-00482 has been shipped and is on its way.',
            'time' => 'Yesterday',
            'date' => '09 August 2026',
            'icon' => 'bi-truck',
            'color' => 'success',
            'read' => false,
            'action' => 'Track Order',
            'link' => '#'
        ],

        [
            'id' => 4,
            'type' => 'payment',
            'title' => 'Payment successful',
            'message' =>
                'Your payment of ₹501 for Ganapathi Homam was completed successfully.',
            'time' => 'Yesterday',
            'date' => '09 August 2026',
            'icon' => 'bi-credit-card',
            'color' => 'success',
            'read' => true,
            'action' => 'View Details',
            'link' => '#'
        ],

        [
            'id' => 5,
            'type' => 'pooja',
            'title' => 'Your pooja has been completed',
            'message' =>
                'Your Lakshmi Pooja has been completed. Photos and videos are now available.',
            'time' => '3 days ago',
            'date' => '07 August 2026',
            'icon' => 'bi-stars',
            'color' => 'warning',
            'read' => true,
            'action' => 'View Photos & Videos',
            'link' => '#'
        ],

        [
            'id' => 6,
            'type' => 'order',
            'title' => 'Your order was delivered',
            'message' =>
                'Order PN-ORD-2026-00431 was successfully delivered.',
            'time' => '5 days ago',
            'date' => '05 August 2026',
            'icon' => 'bi-box-seam',
            'color' => 'success',
            'read' => true,
            'action' => 'View Order',
            'link' => '#'
        ],

        [
            'id' => 7,
            'type' => 'account',
            'title' => 'Profile updated successfully',
            'message' =>
                'Your customer profile information has been updated successfully.',
            'time' => '1 week ago',
            'date' => '03 August 2026',
            'icon' => 'bi-person-check',
            'color' => 'secondary',
            'read' => true,
            'action' => 'View Profile',
            'link' => '#'
        ]

    ];


    $unreadCount =
        count(
            array_filter(
                $notifications,
                fn ($notification) =>
                    !$notification['read']
            )
        );


    $readCount =
        count(
            array_filter(
                $notifications,
                fn ($notification) =>
                    $notification['read']
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
                    Notifications
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
                    Notifications
                </h1>


                <p
                    class="text-secondary
                           mb-0"
                >
                    Stay informed about your bookings, poojas,
                    orders, payments and account activity.
                </p>

            </div>


            <div
                class="col-12 col-lg-4
                       text-lg-end"
            >

                <button
                    type="button"
                    class="btn btn-pn-outline"
                    id="markAllReadTop"
                >

                    <i
                        class="bi bi-check2-all me-2"
                    ></i>

                    Mark All as Read

                </button>

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
                                   active
                                   border-0
                                   py-3"
                        >

                            <i class="bi bi-bell me-3"></i>

                            Notifications

                            @if($unreadCount > 0)

                                <span
                                    id="sidebarNotificationCount"
                                    class="badge
                                           bg-danger
                                           rounded-pill
                                           float-end"
                                >
                                    {{ $unreadCount }}
                                </span>

                            @endif

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
                 NOTIFICATIONS CONTENT
            ===================================================== --}}

            <div class="col-12 col-lg-9">


                {{-- ==================================================
                     SUMMARY CARDS
                =================================================== --}}

                <div
                    class="row
                           row-cols-2
                           row-cols-md-3
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
                                    id="totalNotificationCount"
                                >
                                    {{ count($notifications) }}
                                </strong>


                                <small
                                    class="text-secondary
                                           d-block"
                                >
                                    Notifications
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
                                    Unread
                                </small>


                                <strong
                                    class="font-serif
                                           display-6
                                           text-pn-brown"
                                    id="unreadNotificationCount"
                                >
                                    {{ $unreadCount }}
                                </strong>


                                <small
                                    class="text-secondary
                                           d-block"
                                >
                                    Need Attention
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
                                    Read
                                </small>


                                <strong
                                    class="font-serif
                                           display-6
                                           text-pn-brown"
                                    id="readNotificationCount"
                                >
                                    {{ $readCount }}
                                </strong>


                                <small
                                    class="text-secondary
                                           d-block"
                                >
                                    Notifications
                                </small>

                            </div>

                        </div>

                    </div>

                </div>


                {{-- ==================================================
                     FILTER BAR
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

                            <div class="col-12 col-md-6">

                                <label
                                    for="notificationSearch"
                                    class="visually-hidden"
                                >
                                    Search notifications
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
                                        id="notificationSearch"
                                        class="form-control"
                                        placeholder="Search notifications..."
                                        autocomplete="off"
                                    >

                                </div>

                            </div>


                            <div class="col-12 col-sm-6 col-md-3">

                                <label
                                    for="notificationType"
                                    class="visually-hidden"
                                >
                                    Notification type
                                </label>


                                <select
                                    id="notificationType"
                                    class="form-select"
                                >

                                    <option value="all">
                                        All Types
                                    </option>

                                    <option value="booking">
                                        Bookings
                                    </option>

                                    <option value="digital">
                                        Digital Pooja
                                    </option>

                                    <option value="pooja">
                                        Pooja
                                    </option>

                                    <option value="order">
                                        Orders
                                    </option>

                                    <option value="payment">
                                        Payments
                                    </option>

                                    <option value="account">
                                        Account
                                    </option>

                                </select>

                            </div>


                            <div class="col-12 col-sm-6 col-md-2">

                                <label
                                    for="notificationStatus"
                                    class="visually-hidden"
                                >
                                    Notification status
                                </label>


                                <select
                                    id="notificationStatus"
                                    class="form-select"
                                >

                                    <option value="all">
                                        All
                                    </option>

                                    <option value="unread">
                                        Unread
                                    </option>

                                    <option value="read">
                                        Read
                                    </option>

                                </select>

                            </div>


                            <div class="col-12 col-md-1">

                                <button
                                    type="button"
                                    id="resetNotificationFilters"
                                    class="btn
                                           btn-light
                                           border
                                           w-100"
                                    title="Reset filters"
                                    aria-label="Reset notification filters"
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
                     NOTIFICATION HEADER
                =================================================== --}}

                <div
                    class="d-flex
                           flex-column
                           flex-sm-row
                           align-items-sm-center
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
                            Activity Center
                        </span>


                        <h2
                            class="font-serif
                                   h3
                                   text-pn-brown
                                   mt-1
                                   mb-0"
                        >
                            Your Notifications
                        </h2>

                    </div>


                    <button
                        type="button"
                        id="markAllRead"
                        class="btn
                               btn-sm
                               btn-outline-secondary"
                    >

                        <i
                            class="bi bi-check2-all me-1"
                        ></i>

                        Mark All as Read

                    </button>

                </div>


                {{-- ==================================================
                     NOTIFICATION LIST
                =================================================== --}}

                <div
                    id="notificationList"
                    class="vstack gap-3"
                >

                    @foreach(
                        $notifications as $notification
                    )

                        <article
                            class="notification-item
                                   card
                                   border
                                   border-warning-subtle
                                   rounded-5
                                   {{ !$notification['read']
                                       ? 'notification-unread'
                                       : ''
                                   }}"
                            data-notification-id="{{ $notification['id'] }}"
                            data-notification-type="{{ $notification['type'] }}"
                            data-notification-read="{{ $notification['read'] ? 'read' : 'unread' }}"
                            data-notification-search="{{ strtolower(
                                $notification['title']
                                . ' '
                                . $notification['message']
                            ) }}"
                        >

                            <div
                                class="card-body
                                       p-4"
                            >

                                <div
                                    class="row
                                           align-items-start
                                           g-3"
                                >

                                    {{-- Icon --}}

                                    <div class="col-auto">

                                        <div
                                            class="
                                                rounded-circle
                                                bg-{{ $notification['color'] }}-subtle
                                                text-{{ $notification['color'] }}
                                                d-flex
                                                align-items-center
                                                justify-content-center
                                            "
                                            style="width:52px;height:52px;"
                                        >

                                            <i
                                                class="bi
                                                       {{ $notification['icon'] }}
                                                       fs-5"
                                            ></i>

                                        </div>

                                    </div>


                                    {{-- Content --}}

                                    <div
                                        class="col
                                               min-w-0"
                                    >

                                        <div
                                            class="d-flex
                                                   flex-column
                                                   flex-sm-row
                                                   align-items-sm-start
                                                   justify-content-between
                                                   gap-2"
                                        >

                                            <div>

                                                <div
                                                    class="d-flex
                                                           align-items-center
                                                           flex-wrap
                                                           gap-2
                                                           mb-1"
                                                >

                                                    <span
                                                        class="small
                                                               text-pn-gold
                                                               fw-semibold
                                                               text-uppercase"
                                                    >

                                                        {{ ucfirst(
                                                            $notification['type']
                                                        ) }}

                                                    </span>


                                                    @if(
                                                        !$notification['read']
                                                    )

                                                        <span
                                                            class="badge
                                                                   bg-danger
                                                                   rounded-pill"
                                                        >
                                                            New
                                                        </span>

                                                    @endif

                                                </div>


                                                <h3
                                                    class="h6
                                                           fw-semibold
                                                           text-pn-brown
                                                           mb-1"
                                                >

                                                    {{ $notification['title'] }}

                                                </h3>

                                            </div>


                                            <small
                                                class="text-secondary
                                                       text-nowrap"
                                            >

                                                {{ $notification['time'] }}

                                            </small>

                                        </div>


                                        <p
                                            class="small
                                                   text-secondary
                                                   mb-3"
                                        >

                                            {{ $notification['message'] }}

                                        </p>


                                        <div
                                            class="d-flex
                                                   flex-column
                                                   flex-sm-row
                                                   align-items-sm-center
                                                   gap-2"
                                        >

                                            @if(
                                                $notification['action']
                                            )

                                                <a
                                                    href="{{ $notification['link'] }}"
                                                    class="btn
                                                           btn-sm
                                                           btn-pn-outline"
                                                >

                                                    {{ $notification['action'] }}

                                                    <i
                                                        class="bi bi-arrow-right ms-1"
                                                    ></i>

                                                </a>

                                            @endif


                                            @if(
                                                !$notification['read']
                                            )

                                                <button
                                                    type="button"
                                                    class="btn
                                                           btn-sm
                                                           btn-light
                                                           border
                                                           mark-notification-read"
                                                >

                                                    <i
                                                        class="bi bi-check2 me-1"
                                                    ></i>

                                                    Mark as Read

                                                </button>

                                            @else

                                                <span
                                                    class="small
                                                           text-success"
                                                >

                                                    <i
                                                        class="bi bi-check2-all me-1"
                                                    ></i>

                                                    Read

                                                </span>

                                            @endif

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </article>

                    @endforeach

                </div>


                {{-- ==================================================
                     EMPTY STATE
                =================================================== --}}

                <div
                    id="notificationEmptyState"
                    class="d-none
                           border
                           border-warning-subtle
                           rounded-5
                           p-5
                           text-center
                           mt-4"
                >

                    <div
                        class="rounded-circle
                               bg-pn-cream
                               text-pn-primary
                               d-flex
                               align-items-center
                               justify-content-center
                               mx-auto
                               mb-4"
                        style="width:80px;height:80px;"
                    >

                        <i
                            class="bi bi-bell-slash
                                   fs-2"
                        ></i>

                    </div>


                    <h2
                        class="font-serif
                               h3
                               text-pn-brown"
                    >
                        No Notifications Found
                    </h2>


                    <p
                        class="text-secondary
                               mb-0"
                    >

                        There are no notifications matching your
                        current filters.

                    </p>

                </div>


                {{-- ==================================================
                     NOTIFICATION CHANNEL INFO
                =================================================== --}}

                <div
                    class="card
                           border
                           border-warning-subtle
                           rounded-5
                           mt-5"
                >

                    <div class="card-body p-4 p-md-5">

                        <div
                            class="d-flex
                                   align-items-start
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
                                    class="bi bi-broadcast-pin fs-5"
                                ></i>

                            </div>


                            <div>

                                <span
                                    class="small
                                           text-pn-gold
                                           fw-semibold
                                           text-uppercase"
                                >
                                    Stay Connected
                                </span>


                                <h2
                                    class="font-serif
                                           h4
                                           text-pn-brown
                                           mt-1
                                           mb-2"
                                >
                                    Important updates reach you
                                    through multiple channels.
                                </h2>


                                <p
                                    class="small
                                           text-secondary
                                           mb-4"
                                >

                                    Important booking, payment,
                                    service and order updates may be
                                    communicated through the
                                    notification channels configured
                                    for your account.

                                </p>


                                <div
                                    class="row
                                           row-cols-2
                                           row-cols-sm-4
                                           g-3"
                                >

                                    <div class="col">

                                        <div
                                            class="border
                                                   border-warning-subtle
                                                   rounded-4
                                                   p-3
                                                   text-center
                                                   h-100"
                                        >

                                            <i
                                                class="bi bi-phone
                                                       text-pn-primary
                                                       fs-4"
                                            ></i>


                                            <small
                                                class="d-block
                                                       text-secondary
                                                       mt-2"
                                            >
                                                SMS
                                            </small>

                                        </div>

                                    </div>


                                    <div class="col">

                                        <div
                                            class="border
                                                   border-warning-subtle
                                                   rounded-4
                                                   p-3
                                                   text-center
                                                   h-100"
                                        >

                                            <i
                                                class="bi bi-envelope
                                                       text-pn-primary
                                                       fs-4"
                                            ></i>


                                            <small
                                                class="d-block
                                                       text-secondary
                                                       mt-2"
                                            >
                                                Email
                                            </small>

                                        </div>

                                    </div>


                                    <div class="col">

                                        <div
                                            class="border
                                                   border-warning-subtle
                                                   rounded-4
                                                   p-3
                                                   text-center
                                                   h-100"
                                        >

                                            <i
                                                class="bi bi-whatsapp
                                                       text-pn-primary
                                                       fs-4"
                                            ></i>


                                            <small
                                                class="d-block
                                                       text-secondary
                                                       mt-2"
                                            >
                                                WhatsApp
                                            </small>

                                        </div>

                                    </div>


                                    <div class="col">

                                        <div
                                            class="border
                                                   border-warning-subtle
                                                   rounded-4
                                                   p-3
                                                   text-center
                                                   h-100"
                                        >

                                            <i
                                                class="bi bi-bell
                                                       text-pn-primary
                                                       fs-4"
                                            ></i>


                                            <small
                                                class="d-block
                                                       text-secondary
                                                       mt-2"
                                            >
                                                Push
                                            </small>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

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
                           mt-4"
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
                                    Didn't receive an important
                                    update?
                                </h2>


                                <p
                                    class="text-white-50
                                           mb-0"
                                >

                                    Our support team can help you
                                    with booking, order or account
                                    related questions.

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
    | Elements
    |--------------------------------------------------------------------------
    */

    const searchInput =
        document.getElementById(
            'notificationSearch'
        );


    const typeFilter =
        document.getElementById(
            'notificationType'
        );


    const statusFilter =
        document.getElementById(
            'notificationStatus'
        );


    const resetButton =
        document.getElementById(
            'resetNotificationFilters'
        );


    const notificationItems =
        document.querySelectorAll(
            '.notification-item'
        );


    const emptyState =
        document.getElementById(
            'notificationEmptyState'
        );


    /*
    |--------------------------------------------------------------------------
    | Filter Notifications
    |--------------------------------------------------------------------------
    */

    function filterNotifications() {

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


        let visibleCount =
            0;


        notificationItems.forEach(
            function (item) {

                const itemType =
                    item.dataset.notificationType
                    || '';


                const itemStatus =
                    item.dataset.notificationRead
                    || '';


                const itemSearch =
                    item.dataset.notificationSearch
                    || '';


                const matchesSearch =
                    !search
                    ||
                    itemSearch.includes(
                        search
                    );


                const matchesType =
                    type === 'all'
                    ||
                    itemType === type;


                const matchesStatus =
                    status === 'all'
                    ||
                    itemStatus === status;


                const visible =
                    matchesSearch
                    &&
                    matchesType
                    &&
                    matchesStatus;


                item.classList.toggle(
                    'd-none',
                    !visible
                );


                if (visible) {

                    visibleCount++;

                }

            }
        );


        emptyState?.classList.toggle(
            'd-none',
            visibleCount !== 0
        );

    }


    searchInput?.addEventListener(
        'input',
        filterNotifications
    );


    typeFilter?.addEventListener(
        'change',
        filterNotifications
    );


    statusFilter?.addEventListener(
        'change',
        filterNotifications
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


            filterNotifications();

        }
    );


    /*
    |--------------------------------------------------------------------------
    | Update Counters
    |--------------------------------------------------------------------------
    */

    function updateNotificationCounters() {

        const unreadItems =
            document.querySelectorAll(
                '.notification-item.notification-unread'
            );


        const unreadCount =
            unreadItems.length;


        const readCount =
            notificationItems.length
            - unreadCount;


        const unreadCounter =
            document.getElementById(
                'unreadNotificationCount'
            );


        const readCounter =
            document.getElementById(
                'readNotificationCount'
            );


        const sidebarCounter =
            document.getElementById(
                'sidebarNotificationCount'
            );


        if (unreadCounter) {

            unreadCounter.textContent =
                unreadCount;

        }


        if (readCounter) {

            readCounter.textContent =
                readCount;

        }


        if (sidebarCounter) {

            if (unreadCount > 0) {

                sidebarCounter.textContent =
                    unreadCount;

                sidebarCounter.classList.remove(
                    'd-none'
                );

            } else {

                sidebarCounter.classList.add(
                    'd-none'
                );

            }

        }

    }


    /*
    |--------------------------------------------------------------------------
    | Mark Individual Notification as Read
    |--------------------------------------------------------------------------
    */

    const markReadButtons =
        document.querySelectorAll(
            '.mark-notification-read'
        );


    markReadButtons.forEach(
        function (button) {

            button.addEventListener(
                'click',
                function () {

                    const notification =
                        this.closest(
                            '.notification-item'
                        );


                    if (!notification) {

                        return;

                    }


                    notification.classList.remove(
                        'notification-unread'
                    );


                    notification.dataset.notificationRead =
                        'read';


                    const newBadge =
                        notification.querySelector(
                            '.badge.bg-danger'
                        );


                    newBadge?.remove();


                    this.outerHTML =
                        '<span class="small text-success">' +
                        '<i class="bi bi-check2-all me-1"></i>' +
                        'Read' +
                        '</span>';


                    updateNotificationCounters();


                    filterNotifications();

                }
            );

        }
    );


    /*
    |--------------------------------------------------------------------------
    | Mark All As Read
    |--------------------------------------------------------------------------
    */

    function markAllNotificationsRead() {

        notificationItems.forEach(
            function (notification) {

                notification.classList.remove(
                    'notification-unread'
                );


                notification.dataset.notificationRead =
                    'read';


                const newBadge =
                    notification.querySelector(
                        '.badge.bg-danger'
                    );


                newBadge?.remove();


                const markButton =
                    notification.querySelector(
                        '.mark-notification-read'
                    );


                if (markButton) {

                    markButton.outerHTML =
                        '<span class="small text-success">' +
                        '<i class="bi bi-check2-all me-1"></i>' +
                        'Read' +
                        '</span>';

                }

            }
        );


        updateNotificationCounters();


        filterNotifications();

    }


    document
        .getElementById('markAllRead')
        ?.addEventListener(
            'click',
            markAllNotificationsRead
        );


    document
        .getElementById('markAllReadTop')
        ?.addEventListener(
            'click',
            markAllNotificationsRead
        );

});
</script>

@endpush

@endsection