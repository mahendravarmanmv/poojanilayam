@extends('layouts.app')

@section('title', 'My Orders | Pooja Nilayam')

@section(
    'meta_description',
    'View your Pooja Nilayam orders, shipment status, delivery information and order history.'
)

@section('content')

@php

    /*
    |--------------------------------------------------------------------------
    | TEMPORARY UI DATA
    |--------------------------------------------------------------------------
    | This data will later come from the authenticated customer's
    | order records.
    |--------------------------------------------------------------------------
    */

    $orders = [

        [
            'id' => 'PN-ORD-2026-00482',
            'date' => '08 August 2026',
            'status' => 'Shipped',
            'status_class' => 'primary',
            'items' => 3,
            'total' => 1450,
            'payment' => 'Paid',
            'payment_class' => 'success',
            'delivery' => 'Expected 12 August 2026',
            'address' => 'Hyderabad, Telangana',
            'tracking' => 'TRKPN842019',
            'products' => [
                [
                    'name' => 'Pooja Samagri Kit',
                    'qty' => 1,
                    'price' => 850
                ],
                [
                    'name' => 'Brass Diya',
                    'qty' => 2,
                    'price' => 300
                ]
            ]
        ],

        [
            'id' => 'PN-ORD-2026-00431',
            'date' => '28 July 2026',
            'status' => 'Delivered',
            'status_class' => 'success',
            'items' => 2,
            'total' => 999,
            'payment' => 'Paid',
            'payment_class' => 'success',
            'delivery' => 'Delivered on 02 August 2026',
            'address' => 'Hyderabad, Telangana',
            'tracking' => 'TRKPN731582',
            'products' => [
                [
                    'name' => 'Lakshmi Pooja Kit',
                    'qty' => 1,
                    'price' => 699
                ],
                [
                    'name' => 'Incense Pack',
                    'qty' => 1,
                    'price' => 300
                ]
            ]
        ],

        [
            'id' => 'PN-ORD-2026-00398',
            'date' => '16 July 2026',
            'status' => 'Processing',
            'status_class' => 'warning',
            'items' => 1,
            'total' => 1201,
            'payment' => 'Paid',
            'payment_class' => 'success',
            'delivery' => 'Preparing for shipment',
            'address' => 'Hyderabad, Telangana',
            'tracking' => null,
            'products' => [
                [
                    'name' => 'Ganapathi Pooja Kit',
                    'qty' => 1,
                    'price' => 1201
                ]
            ]
        ],

        [
            'id' => 'PN-ORD-2026-00352',
            'date' => '05 July 2026',
            'status' => 'Cancelled',
            'status_class' => 'danger',
            'items' => 1,
            'total' => 750,
            'payment' => 'Refunded',
            'payment_class' => 'secondary',
            'delivery' => 'Order cancelled',
            'address' => 'Hyderabad, Telangana',
            'tracking' => null,
            'products' => [
                [
                    'name' => 'Pooja Essentials Kit',
                    'qty' => 1,
                    'price' => 750
                ]
            ]
        ]

    ];


    $activeOrders =
        array_values(
            array_filter(
                $orders,
                fn ($order) =>
                    in_array(
                        $order['status'],
                        ['Processing', 'Shipped']
                    )
            )
        );


    $deliveredOrders =
        array_values(
            array_filter(
                $orders,
                fn ($order) =>
                    $order['status'] === 'Delivered'
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
                    Orders
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
                    My Orders
                </h1>


                <p
                    class="text-secondary
                           mb-0"
                >
                    View your purchases, track shipments and manage
                    your order history.
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

                    <i class="bi bi-bag me-2"></i>

                    Continue Shopping

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
                                   active
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
                 ORDERS CONTENT
            ===================================================== --}}

            <div class="col-12 col-lg-9">


                {{-- ==================================================
                     ORDER SUMMARY
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
                                    {{ count($orders) }}
                                </strong>


                                <small
                                    class="text-secondary
                                           d-block"
                                >
                                    Orders
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
                                    Active
                                </small>


                                <strong
                                    class="font-serif
                                           display-6
                                           text-pn-brown"
                                >
                                    {{ count($activeOrders) }}
                                </strong>


                                <small
                                    class="text-secondary
                                           d-block"
                                >
                                    In Progress
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
                                    Delivered
                                </small>


                                <strong
                                    class="font-serif
                                           display-6
                                           text-pn-brown"
                                >
                                    {{ count($deliveredOrders) }}
                                </strong>


                                <small
                                    class="text-secondary
                                           d-block"
                                >
                                    Orders
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
                                    Products
                                </small>


                                <strong
                                    class="font-serif
                                           display-6
                                           text-pn-brown"
                                >

                                    {{ array_sum(
                                        array_map(
                                            fn ($order) =>
                                                $order['items'],
                                            $orders
                                        )
                                    ) }}

                                </strong>


                                <small
                                    class="text-secondary
                                           d-block"
                                >
                                    Items Purchased
                                </small>

                            </div>

                        </div>

                    </div>

                </div>


                {{-- ==================================================
                     SEARCH / FILTER
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
                                    for="orderSearch"
                                    class="visually-hidden"
                                >
                                    Search orders
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
                                        id="orderSearch"
                                        class="form-control"
                                        placeholder="Search order or product..."
                                        autocomplete="off"
                                    >

                                </div>

                            </div>


                            <div class="col-12 col-md-4">

                                <label
                                    for="orderStatus"
                                    class="visually-hidden"
                                >
                                    Order status
                                </label>


                                <select
                                    id="orderStatus"
                                    class="form-select"
                                >

                                    <option value="all">
                                        All Orders
                                    </option>

                                    <option value="processing">
                                        Processing
                                    </option>

                                    <option value="shipped">
                                        Shipped
                                    </option>

                                    <option value="delivered">
                                        Delivered
                                    </option>

                                    <option value="cancelled">
                                        Cancelled
                                    </option>

                                </select>

                            </div>


                            <div class="col-12 col-md-1">

                                <button
                                    type="button"
                                    id="resetOrderFilters"
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
                     ORDER LIST
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
                            Purchase History
                        </span>


                        <h2
                            class="font-serif
                                   h3
                                   text-pn-brown
                                   mt-1
                                   mb-0"
                        >
                            Your Orders
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

                        {{ count($orders) }}

                        {{ count($orders) === 1
                            ? 'Order'
                            : 'Orders'
                        }}

                    </span>

                </div>


                <div
                    class="vstack
                           gap-4"
                    id="orderList"
                >

                    @foreach(
                        $orders as $order
                    )

                        <article
                            class="order-card
                                   card
                                   border
                                   border-warning-subtle
                                   rounded-5"
                            data-order-status="{{ strtolower($order['status']) }}"
                            data-order-search="{{ strtolower(
                                $order['id']
                                . ' '
                                . implode(
                                    ' ',
                                    array_map(
                                        fn ($product) =>
                                            $product['name'],
                                        $order['products']
                                    )
                                )
                            ) }}"
                        >

                            <div
                                class="card-body
                                       p-4
                                       p-md-5"
                            >

                                {{-- Order Header --}}

                                <div
                                    class="d-flex
                                           flex-column
                                           flex-sm-row
                                           align-items-sm-start
                                           justify-content-between
                                           gap-3
                                           mb-4"
                                >

                                    <div>

                                        <div
                                            class="d-flex
                                                   align-items-center
                                                   flex-wrap
                                                   gap-2
                                                   mb-2"
                                        >

                                            <span
                                                class="small
                                                       text-pn-gold
                                                       fw-semibold
                                                       text-uppercase"
                                            >
                                                Order
                                            </span>


                                            <span
                                                class="badge
                                                       bg-{{ $order['status_class'] }}-subtle
                                                       text-{{ $order['status_class'] }}
                                                       rounded-pill"
                                            >

                                                {{ $order['status'] }}

                                            </span>

                                        </div>


                                        <h3
                                            class="font-serif
                                                   h4
                                                   text-pn-brown
                                                   mb-1"
                                        >

                                            {{ $order['id'] }}

                                        </h3>


                                        <small
                                            class="text-secondary"
                                        >

                                            Placed on
                                            {{ $order['date'] }}

                                        </small>

                                    </div>


                                    <div
                                        class="text-sm-end"
                                    >

                                        <small
                                            class="text-secondary
                                                   d-block
                                                   mb-1"
                                        >
                                            Order Total
                                        </small>


                                        <strong
                                            class="font-serif
                                                   h4
                                                   text-pn-brown"
                                        >

                                            ₹{{ number_format(
                                                $order['total']
                                            ) }}

                                        </strong>

                                    </div>

                                </div>


                                {{-- Product Items --}}

                                <div
                                    class="border
                                           border-warning-subtle
                                           rounded-4
                                           overflow-hidden
                                           mb-4"
                                >

                                    @foreach(
                                        $order['products'] as $product
                                    )

                                        <div
                                            class="p-3
                                                   p-md-4
                                                   {{ !$loop->last
                                                       ? 'border-bottom'
                                                       : ''
                                                   }}"
                                        >

                                            <div
                                                class="row
                                                       align-items-center
                                                       g-3"
                                            >

                                                <div class="col-auto">

                                                    <div
                                                        class="rounded-3
                                                               bg-pn-cream
                                                               text-pn-primary
                                                               d-flex
                                                               align-items-center
                                                               justify-content-center"
                                                        style="width:58px;height:58px;"
                                                    >

                                                        <i
                                                            class="bi bi-box-seam
                                                                   fs-5"
                                                        ></i>

                                                    </div>

                                                </div>


                                                <div class="col">

                                                    <strong
                                                        class="d-block
                                                               small
                                                               text-pn-brown
                                                               mb-1"
                                                    >

                                                        {{ $product['name'] }}

                                                    </strong>


                                                    <small
                                                        class="text-secondary"
                                                    >

                                                        Quantity:
                                                        {{ $product['qty'] }}

                                                    </small>

                                                </div>


                                                <div
                                                    class="col-auto"
                                                >

                                                    <strong
                                                        class="small
                                                               text-pn-brown"
                                                    >

                                                        ₹{{ number_format(
                                                            $product['price']
                                                        ) }}

                                                    </strong>

                                                </div>

                                            </div>

                                        </div>

                                    @endforeach

                                </div>


                                {{-- Order Information --}}

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
                                                Payment
                                            </small>


                                            <strong
                                                class="small
                                                       text-pn-brown"
                                            >

                                                <i
                                                    class="bi bi-check-circle
                                                           text-success
                                                           me-1"
                                                ></i>

                                                {{ $order['payment'] }}

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
                                                Delivery
                                            </small>


                                            <strong
                                                class="small
                                                       text-pn-brown"
                                            >

                                                <i
                                                    class="bi bi-truck
                                                           text-pn-primary
                                                           me-1"
                                                ></i>

                                                {{ $order['delivery'] }}

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
                                                Delivery Address
                                            </small>


                                            <strong
                                                class="small
                                                       text-pn-brown"
                                            >

                                                <i
                                                    class="bi bi-geo-alt
                                                           text-pn-primary
                                                           me-1"
                                                ></i>

                                                {{ $order['address'] }}

                                            </strong>

                                        </div>

                                    </div>

                                </div>


                                {{-- Tracking --}}

                                @if(
                                    $order['tracking']
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
                                                   flex-column
                                                   flex-sm-row
                                                   align-items-sm-center
                                                   justify-content-between
                                                   gap-3"
                                        >

                                            <div
                                                class="d-flex
                                                       align-items-start
                                                       gap-3"
                                            >

                                                <i
                                                    class="bi bi-truck
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
                                                        Shipment in progress
                                                    </strong>


                                                    <small
                                                        class="text-secondary"
                                                    >

                                                        Tracking ID:
                                                        {{ $order['tracking'] }}

                                                    </small>

                                                </div>

                                            </div>


                                            <a
                                                href="#"
                                                class="btn
                                                       btn-sm
                                                       btn-primary"
                                            >

                                                Track Order

                                                <i
                                                    class="bi bi-arrow-right ms-1"
                                                ></i>

                                            </a>

                                        </div>

                                    </div>

                                @elseif(
                                    $order['status'] === 'Processing'
                                )

                                    <div
                                        class="alert
                                               bg-warning-subtle
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
                                                class="bi bi-box-seam
                                                       text-warning-emphasis
                                                       fs-5
                                                       mt-1"
                                            ></i>


                                            <div>

                                                <strong
                                                    class="d-block
                                                           text-warning-emphasis
                                                           mb-1"
                                                >
                                                    Order is being prepared
                                                </strong>


                                                <small
                                                    class="text-secondary"
                                                >

                                                    Your order is currently
                                                    being prepared for
                                                    shipment.

                                                </small>

                                            </div>

                                        </div>

                                    </div>

                                @elseif(
                                    $order['status'] === 'Delivered'
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
                                                    Order Delivered
                                                </strong>


                                                <small
                                                    class="text-secondary"
                                                >

                                                    Your order has been
                                                    successfully
                                                    delivered.

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

                                        View Order

                                    </a>


                                    @if(
                                        $order['tracking']
                                    )

                                        <a
                                            href="#"
                                            class="btn
                                                   btn-outline-primary"
                                        >

                                            <i
                                                class="bi bi-truck me-1"
                                            ></i>

                                            Track Order

                                        </a>

                                    @endif


                                    <a
                                        href="#"
                                        class="btn
                                               btn-outline-secondary"
                                    >

                                        <i
                                            class="bi bi-file-earmark-pdf me-1"
                                        ></i>

                                        Invoice

                                    </a>


                                    @if(
                                        $order['status'] === 'Delivered'
                                    )

                                        <a
                                            href="#"
                                            class="btn
                                                   btn-outline-success"
                                        >

                                            <i
                                                class="bi bi-arrow-repeat me-1"
                                            ></i>

                                            Reorder

                                        </a>

                                    @endif

                                </div>

                            </div>

                        </article>

                    @endforeach

                </div>


                {{-- ==================================================
                     EMPTY FILTER STATE
                =================================================== --}}

                <div
                    id="orderEmptyState"
                    class="d-none
                           border
                           border-warning-subtle
                           rounded-5
                           p-5
                           text-center
                           mt-4"
                >

                    <i
                        class="bi bi-search
                               display-5
                               text-pn-primary"
                    ></i>


                    <h2
                        class="font-serif
                               h3
                               text-pn-brown
                               mt-3"
                    >
                        No Orders Found
                    </h2>


                    <p
                        class="text-secondary"
                    >
                        Try changing your search or order status
                        filter.
                    </p>


                    <button
                        type="button"
                        class="btn btn-pn"
                        id="clearOrderSearch"
                    >
                        Clear Filters
                    </button>

                </div>


                {{-- ==================================================
                     PRASADAM / DELIVERY NOTICE
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
                            class="bi bi-box-seam
                                   text-pn-primary
                                   fs-4
                                   mt-1"
                        ></i>


                        <div>

                            <strong
                                class="d-block
                                       text-pn-brown
                                       mb-1"
                            >
                                Prasadam & Order Delivery
                            </strong>


                            <small
                                class="text-secondary"
                            >

                                For eligible temple and pooja
                                services, prasadam dispatch and
                                delivery information will be shown
                                with the relevant order or booking.

                            </small>

                        </div>

                    </div>

                </div>


                {{-- ==================================================
                     SHOPPING CTA
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
                                    Pooja Store
                                </span>


                                <h2
                                    class="font-serif
                                           h3
                                           mt-2
                                           mb-2"
                                >
                                    Find everything you need for
                                    your devotional journey.
                                </h2>


                                <p
                                    class="text-white-50
                                           mb-0"
                                >

                                    Explore pooja samagri, pooja kits
                                    and other devotional products.

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

                                    Visit Store

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
    | Order Search + Status Filter
    |--------------------------------------------------------------------------
    */

    const searchInput =
        document.getElementById(
            'orderSearch'
        );


    const statusFilter =
        document.getElementById(
            'orderStatus'
        );


    const resetButton =
        document.getElementById(
            'resetOrderFilters'
        );


    const clearButton =
        document.getElementById(
            'clearOrderSearch'
        );


    const orderCards =
        document.querySelectorAll(
            '.order-card'
        );


    const emptyState =
        document.getElementById(
            'orderEmptyState'
        );


    function filterOrders() {

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


        orderCards.forEach(
            function (card) {

                const orderSearch =
                    card.dataset.orderSearch
                    || '';


                const orderStatus =
                    card.dataset.orderStatus
                    || '';


                const matchesSearch =
                    !search
                    ||
                    orderSearch.includes(
                        search
                    );


                const matchesStatus =
                    status === 'all'
                    ||
                    orderStatus.includes(
                        status
                    );


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


        emptyState?.classList.toggle(
            'd-none',
            visibleCount !== 0
        );

    }


    searchInput?.addEventListener(
        'input',
        filterOrders
    );


    statusFilter?.addEventListener(
        'change',
        filterOrders
    );


    function resetFilters() {

        if (searchInput) {

            searchInput.value = '';

        }


        if (statusFilter) {

            statusFilter.value = 'all';

        }


        filterOrders();

    }


    resetButton?.addEventListener(
        'click',
        resetFilters
    );


    clearButton?.addEventListener(
        'click',
        resetFilters
    );

});
</script>

@endpush

@endsection