@extends('layouts.app')

@section('title', 'Shipping Policy | Pooja Nilayam')

@section(
    'meta_description',
    'Read the Pooja Nilayam Shipping Policy covering order processing, packing, shipment, delivery, tracking and delivery support.'
)

@section('content')

@php

    /*
    |--------------------------------------------------------------------------
    | SHIPPING POLICY
    |--------------------------------------------------------------------------
    | Source-supported order flow:
    |
    | Browse Products
    |      ↓
    | View Product
    |      ↓
    | Add to Cart
    |      ↓
    | Review Cart
    |      ↓
    | Checkout
    |      ↓
    | Address Selection
    |      ↓
    | Payment
    |      ↓
    | Order Confirmation
    |      ↓
    | Shipment
    |      ↓
    | Delivered
    |
    | Vendor flow:
    |
    | Customer Places Order
    |      ↓
    | Admin Receives Order
    |      ↓
    | Assign Vendor / Warehouse
    |      ↓
    | Packing
    |      ↓
    | Shipping
    |      ↓
    | Delivery
    |      ↓
    | Order Closed
    |
    | Exact delivery timelines, charges, courier details and
    | serviceability rules are NOT defined in the project documents.
    |--------------------------------------------------------------------------
    */

    $lastUpdated = 'To be updated by Pooja Nilayam';


    $sections = [

        [
            'id' => 'overview',
            'number' => '01',
            'title' => 'Shipping Policy Overview'
        ],

        [
            'id' => 'order-processing',
            'number' => '02',
            'title' => 'Order Processing'
        ],

        [
            'id' => 'address',
            'number' => '03',
            'title' => 'Delivery Address'
        ],

        [
            'id' => 'packing',
            'number' => '04',
            'title' => 'Packing & Preparation'
        ],

        [
            'id' => 'shipment',
            'number' => '05',
            'title' => 'Shipment'
        ],

        [
            'id' => 'delivery',
            'number' => '06',
            'title' => 'Delivery'
        ],

        [
            'id' => 'tracking',
            'number' => '07',
            'title' => 'Delivery Status & Tracking'
        ],

        [
            'id' => 'failed-delivery',
            'number' => '08',
            'title' => 'Delivery Issues'
        ],

        [
            'id' => 'returns',
            'number' => '09',
            'title' => 'Returns'
        ],

        [
            'id' => 'cancellations',
            'number' => '10',
            'title' => 'Cancellations'
        ],

        [
            'id' => 'order-closure',
            'number' => '11',
            'title' => 'Order Closure'
        ],

        [
            'id' => 'charges',
            'number' => '12',
            'title' => 'Shipping Charges & Timelines'
        ],

        [
            'id' => 'support',
            'number' => '13',
            'title' => 'Shipping Support'
        ],

        [
            'id' => 'changes',
            'number' => '14',
            'title' => 'Changes to Shipping Policy'
        ],

        [
            'id' => 'contact',
            'number' => '15',
            'title' => 'Contact Us'
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
                        href="{{ url('/terms-conditions') }}"
                        class="text-pn-primary"
                    >
                        Legal
                    </a>

                </li>

                <li
                    class="breadcrumb-item active"
                    aria-current="page"
                >
                    Shipping Policy
                </li>

            </ol>

        </nav>

    </div>

</section>


{{-- ============================================================
     HERO
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
                    class="small
                           text-pn-gold
                           fw-semibold
                           text-uppercase"
                >
                    Store & Delivery
                </span>


                <h1
                    class="font-serif
                           display-4
                           text-pn-brown
                           mt-2
                           mb-3"
                >
                    Shipping Policy
                </h1>


                <p
                    class="lead
                           text-secondary
                           mb-3"
                >

                    Understand how Pooja Store orders move from
                    confirmation through packing, shipment and
                    delivery.

                </p>


                <div
                    class="d-flex
                           flex-wrap
                           justify-content-center
                           align-items-center
                           gap-2"
                >

                    <span
                        class="badge
                               bg-white
                               text-pn-primary
                               border
                               border-warning-subtle
                               rounded-pill
                               px-3
                               py-2"
                    >

                        <i
                            class="bi bi-truck me-1"
                        ></i>

                        Shipping Policy

                    </span>


                    <span
                        class="small
                               text-secondary"
                    >

                        Last Updated:
                        {{ $lastUpdated }}

                    </span>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- ============================================================
     IMPORTANT NOTICE
============================================================ --}}

<section class="py-4">

    <div class="container">

        <div
            class="alert
                   alert-warning
                   border-warning-subtle
                   rounded-4
                   mb-0"
            role="alert"
        >

            <div
                class="d-flex
                       align-items-start
                       gap-3"
            >

                <i
                    class="bi bi-info-circle-fill
                           text-warning
                           fs-5
                           mt-1"
            ></i>


                <div>

                    <strong
                        class="d-block
                               text-pn-brown
                               mb-1"
                    >
                        Final Shipping Rules Require Business Approval
                    </strong>


                    <p
                        class="small
                               text-secondary
                               mb-0"
                    >

                        The project documents define the order,
                        packing, shipping and delivery workflow.
                        Exact delivery timelines, shipping charges,
                        courier/partner details and serviceability
                        rules are not specified and should be
                        maintained through the approved CMS content.

                    </p>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- ============================================================
     SHIPPING PROCESS
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
                Order Journey
            </span>


            <h2
                class="font-serif
                       display-6
                       text-pn-brown
                       mt-2
                       mb-3"
            >
                From Order to Delivery
            </h2>


            <p
                class="text-secondary
                       mx-auto
                       mb-0"
                style="max-width:760px;"
            >

                The documented Pooja Store process takes an order
                through confirmation, shipment and final delivery.

            </p>

        </div>


        <div
            class="row
                   row-cols-2
                   row-cols-md-3
                   row-cols-lg-6
                   g-3"
        >

            @foreach([

                [
                    'number' => '01',
                    'icon' => 'bi-cart-check',
                    'title' => 'Order',
                    'text' => 'Customer places an order.'
                ],

                [
                    'number' => '02',
                    'icon' => 'bi-person-check',
                    'title' => 'Received',
                    'text' => 'Admin receives the order.'
                ],

                [
                    'number' => '03',
                    'icon' => 'bi-box-seam',
                    'title' => 'Packing',
                    'text' => 'Order is assigned and packed.'
                ],

                [
                    'number' => '04',
                    'icon' => 'bi-truck',
                    'title' => 'Shipping',
                    'text' => 'Order moves to shipment.'
                ],

                [
                    'number' => '05',
                    'icon' => 'bi-geo-alt',
                    'title' => 'Delivery',
                    'text' => 'Order reaches the delivery stage.'
                ],

                [
                    'number' => '06',
                    'icon' => 'bi-check2-circle',
                    'title' => 'Closed',
                    'text' => 'Order is closed after completion.'
                ]

            ] as $step)

                <div class="col">

                    <article
                        class="card
                               border
                               border-warning-subtle
                               rounded-5
                               h-100"
                    >

                        <div
                            class="card-body
                                   p-3
                                   p-md-4
                                   text-center"
                        >

                            <span
                                class="d-inline-flex
                                       align-items-center
                                       justify-content-center
                                       rounded-circle
                                       bg-pn-cream
                                       text-pn-primary
                                       mb-3"
                                style="width:54px;height:54px;"
                            >

                                <i
                                    class="bi {{ $step['icon'] }}
                                           fs-5"
                                ></i>

                            </span>


                            <span
                                class="d-block
                                       small
                                       text-pn-gold
                                       fw-semibold
                                       mb-1"
                            >

                                {{ $step['number'] }}

                            </span>


                            <h3
                                class="font-serif
                                       h6
                                       text-pn-brown
                                       mb-2"
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

                    </article>

                </div>

            @endforeach

        </div>

    </div>

</section>


{{-- ============================================================
     MAIN CONTENT
============================================================ --}}

<section class="bg-pn-beige py-5">

    <div class="container">

        <div class="row g-4 g-xl-5">


            {{-- ==================================================
                 TABLE OF CONTENTS
            =================================================== --}}

            <div class="col-12 col-lg-3">

                <div
                    class="position-sticky"
                    style="top:100px;"
                >

                    <div
                        class="card
                               border
                               border-warning-subtle
                               rounded-5"
                    >

                        <div
                            class="card-body
                                   p-3"
                        >

                            <div
                                class="px-2
                                       mb-3"
                            >

                                <span
                                    class="small
                                           text-pn-gold
                                           fw-semibold
                                           text-uppercase"
                                >
                                    On This Page
                                </span>


                                <h2
                                    class="font-serif
                                           h5
                                           text-pn-brown
                                           mt-1
                                           mb-0"
                                >
                                    Shipping Policy
                                </h2>

                            </div>


                            <nav
                                id="shippingNavigation"
                                class="vstack
                                       gap-1"
                                aria-label="Shipping Policy sections"
                            >

                                @foreach(
                                    $sections as $section
                                )

                                    <a
                                        href="#{{ $section['id'] }}"
                                        class="shipping-nav-link
                                               d-flex
                                               align-items-center
                                               gap-2
                                               text-decoration-none
                                               rounded-3
                                               px-3
                                               py-2"
                                    >

                                        <span
                                            class="small
                                                   text-pn-gold
                                                   fw-semibold"
                                        >

                                            {{ $section['number'] }}

                                        </span>


                                        <span
                                            class="small
                                                   text-secondary"
                                        >

                                            {{ $section['title'] }}

                                        </span>

                                    </a>

                                @endforeach

                            </nav>

                        </div>

                    </div>


                    {{-- Support Card --}}

                    <div
                        class="bg-white
                               rounded-5
                               p-4
                               mt-4
                               border
                               border-warning-subtle"
                    >

                        <div
                            class="rounded-circle
                                   bg-pn-cream
                                   text-pn-primary
                                   d-flex
                                   align-items-center
                                   justify-content-center
                                   mb-3"
                            style="width:52px;height:52px;"
                        >

                            <i
                                class="bi bi-headset
                                       fs-5"
                            ></i>

                        </div>


                        <h3
                            class="font-serif
                                   h5
                                   text-pn-brown"
                        >
                            Delivery Help?
                        </h3>


                        <p
                            class="small
                                   text-secondary"
                        >

                            Need assistance with an order or
                            delivery? Contact support.

                        </p>


                        <div
                            class="d-grid
                                   gap-2"
                        >

                            <a
                                href="{{ url('/raise-ticket') }}"
                                class="btn btn-pn"
                            >

                                Raise a Ticket

                            </a>


                            <a
                                href="{{ url('/contact-us') }}"
                                class="btn
                                       btn-light
                                       border"
                            >

                                Contact Us

                            </a>

                        </div>

                    </div>

                </div>

            </div>


            {{-- ==================================================
                 POLICY CONTENT
            =================================================== --}}

            <div class="col-12 col-lg-9">

                <article
                    class="card
                           border
                           border-warning-subtle
                           rounded-5"
                >

                    <div
                        class="card-body
                               p-4
                               p-md-5"
                    >


                        {{-- 01 Overview --}}

                        <section
                            id="overview"
                            class="shipping-section
                                   pb-4
                                   mb-4
                                   border-bottom
                                   border-warning-subtle"
                        >

                            <div
                                class="d-flex
                                       align-items-start
                                       gap-3"
                            >

                                <span
                                    class="shipping-number
                                           text-pn-gold
                                           fw-semibold"
                                >
                                    01
                                </span>


                                <div>

                                    <h2
                                        class="font-serif
                                               h3
                                               text-pn-brown
                                               mb-3"
                                    >
                                        Shipping Policy Overview
                                    </h2>


                                    <p
                                        class="text-secondary
                                               lh-lg"
                                    >

                                        The Pooja Store includes an
                                        end-to-end order journey from
                                        checkout and payment through
                                        shipment and delivery.

                                    </p>


                                    <p
                                        class="small
                                               text-secondary
                                               mb-0"
                                    >

                                        This page presents the
                                        documented shipping workflow.
                                        Final commercial shipping
                                        conditions will be maintained
                                        through CMS.

                                    </p>

                                </div>

                            </div>

                        </section>


                        {{-- 02 Order Processing --}}

                        <section
                            id="order-processing"
                            class="shipping-section
                                   pb-4
                                   mb-4
                                   border-bottom
                                   border-warning-subtle"
                        >

                            <div
                                class="d-flex
                                       align-items-start
                                       gap-3"
                            >

                                <span
                                    class="shipping-number
                                           text-pn-gold
                                           fw-semibold"
                                >
                                    02
                                </span>


                                <div>

                                    <h2
                                        class="font-serif
                                               h3
                                               text-pn-brown
                                               mb-3"
                                    >
                                        Order Processing
                                    </h2>


                                    <p
                                        class="text-secondary
                                               lh-lg"
                                    >

                                        The documented product purchase
                                        flow begins with product
                                        browsing and continues through
                                        cart review, checkout, address
                                        selection, payment and order
                                        confirmation.

                                    </p>


                                    <div
                                        class="bg-pn-cream
                                               rounded-4
                                               p-4"
                                    >

                                        <div
                                            class="d-flex
                                                   flex-wrap
                                                   align-items-center
                                                   gap-2"
                                        >

                                            @foreach([
                                                'Browse Products',
                                                'View Product',
                                                'Add to Cart',
                                                'Review Cart',
                                                'Checkout',
                                                'Address Selection',
                                                'Payment',
                                                'Order Confirmation'
                                            ] as $index => $item)

                                                <span
                                                    class="badge
                                                           bg-white
                                                           text-pn-brown
                                                           border
                                                           border-warning-subtle
                                                           rounded-pill
                                                           px-3
                                                           py-2"
                                                >

                                                    {{ $item }}

                                                </span>

                                                @if(
                                                    $index <
                                                    7
                                                )

                                                    <i
                                                        class="bi bi-arrow-right
                                                               text-pn-gold
                                                               d-none d-md-inline"
                                                    ></i>

                                                @endif

                                            @endforeach

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </section>


                        {{-- 03 Address --}}

                        <section
                            id="address"
                            class="shipping-section
                                   pb-4
                                   mb-4
                                   border-bottom
                                   border-warning-subtle"
                        >

                            <div
                                class="d-flex
                                       align-items-start
                                       gap-3"
                            >

                                <span
                                    class="shipping-number
                                           text-pn-gold
                                           fw-semibold"
                                >
                                    03
                                </span>


                                <div>

                                    <h2
                                        class="font-serif
                                               h3
                                               text-pn-brown
                                               mb-3"
                                    >
                                        Delivery Address
                                    </h2>


                                    <p
                                        class="text-secondary
                                               lh-lg"
                                    >

                                        Address selection is a defined
                                        step in the product checkout
                                        process. Customers should
                                        provide the delivery details
                                        required by the platform
                                        before payment and order
                                        confirmation.

                                    </p>


                                    <div
                                        class="alert
                                               alert-light
                                               border
                                               rounded-4
                                               mb-0"
                                    >

                                        <small
                                            class="text-secondary"
                                        >

                                            Exact address-validation
                                            and serviceability rules
                                            are to be configured by
                                            the business.

                                        </small>

                                    </div>

                                </div>

                            </div>

                        </section>


                        {{-- 04 Packing --}}

                        <section
                            id="packing"
                            class="shipping-section
                                   pb-4
                                   mb-4
                                   border-bottom
                                   border-warning-subtle"
                        >

                            <div
                                class="d-flex
                                       align-items-start
                                       gap-3"
                            >

                                <span
                                    class="shipping-number
                                           text-pn-gold
                                           fw-semibold"
                                >
                                    04
                                </span>


                                <div>

                                    <h2
                                        class="font-serif
                                               h3
                                               text-pn-brown
                                               mb-3"
                                    >
                                        Packing & Preparation
                                    </h2>


                                    <p
                                        class="text-secondary
                                               lh-lg"
                                    >

                                        The documented vendor order
                                        flow includes assignment to a
                                        vendor or warehouse followed
                                        by packing before shipment.

                                    </p>


                                    <div
                                        class="row
                                               g-3"
                                    >

                                        <div class="col-12 col-md-6">

                                            <div
                                                class="bg-pn-cream
                                                       rounded-4
                                                       p-4
                                                       h-100"
                                            >

                                                <i
                                                    class="bi bi-building
                                                           text-pn-primary
                                                           fs-4"
                                                ></i>


                                                <h3
                                                    class="font-serif
                                                           h6
                                                           text-pn-brown
                                                           mt-3"
                                                >
                                                    Vendor / Warehouse
                                                    Assignment
                                                </h3>


                                                <p
                                                    class="small
                                                           text-secondary
                                                           mb-0"
                                                >

                                                    Admin assigns the
                                                    order to the
                                                    appropriate vendor
                                                    or warehouse.

                                                </p>

                                            </div>

                                        </div>


                                        <div class="col-12 col-md-6">

                                            <div
                                                class="bg-pn-cream
                                                       rounded-4
                                                       p-4
                                                       h-100"
                                            >

                                                <i
                                                    class="bi bi-box-seam
                                                           text-pn-primary
                                                           fs-4"
                                                ></i>


                                                <h3
                                                    class="font-serif
                                                           h6
                                                           text-pn-brown
                                                           mt-3"
                                                >
                                                    Packing
                                                </h3>


                                                <p
                                                    class="small
                                                           text-secondary
                                                           mb-0"
                                                >

                                                    The order is packed
                                                    before it proceeds
                                                    to shipping.

                                                </p>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </section>


                        {{-- 05 Shipment --}}

                        <section
                            id="shipment"
                            class="shipping-section
                                   pb-4
                                   mb-4
                                   border-bottom
                                   border-warning-subtle"
                        >

                            <div
                                class="d-flex
                                       align-items-start
                                       gap-3"
                            >

                                <span
                                    class="shipping-number
                                           text-pn-gold
                                           fw-semibold"
                                >
                                    05
                                </span>


                                <div>

                                    <h2
                                        class="font-serif
                                               h3
                                               text-pn-brown
                                               mb-3"
                                    >
                                        Shipment
                                    </h2>


                                    <p
                                        class="text-secondary
                                               lh-lg"
                                    >

                                        Once the order has been packed,
                                        the documented process moves
                                        the order into the shipping
                                        stage.

                                    </p>


                                    <div
                                        class="bg-pn-cream
                                               rounded-4
                                               p-4"
                                    >

                                        <div
                                            class="d-flex
                                                   align-items-center
                                                   gap-3"
                                        >

                                            <div
                                                class="rounded-circle
                                                       bg-white
                                                       text-pn-primary
                                                       d-flex
                                                       align-items-center
                                                       justify-content-center"
                                                style="width:52px;height:52px;"
                                            >

                                                <i
                                                    class="bi bi-truck
                                                           fs-5"
                                                ></i>

                                            </div>


                                            <div>

                                                <strong
                                                    class="d-block
                                                           text-pn-brown"
                                                >
                                                    Shipping Stage
                                                </strong>


                                                <small
                                                    class="text-secondary"
                                                >

                                                    The order proceeds
                                                    from packing to
                                                    shipment and then
                                                    delivery.

                                                </small>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </section>


                        {{-- 06 Delivery --}}

                        <section
                            id="delivery"
                            class="shipping-section
                                   pb-4
                                   mb-4
                                   border-bottom
                                   border-warning-subtle"
                        >

                            <div
                                class="d-flex
                                       align-items-start
                                       gap-3"
                            >

                                <span
                                    class="shipping-number
                                           text-pn-gold
                                           fw-semibold"
                                >
                                    06
                                </span>


                                <div>

                                    <h2
                                        class="font-serif
                                               h3
                                               text-pn-brown
                                               mb-3"
                                    >
                                        Delivery
                                    </h2>


                                    <p
                                        class="text-secondary
                                               lh-lg"
                                    >

                                        The documented product
                                        purchase process ends in
                                        delivery after the shipment
                                        stage.

                                    </p>


                                    <div
                                        class="bg-success-subtle
                                               rounded-4
                                               p-4"
                                    >

                                        <div
                                            class="d-flex
                                                   align-items-center
                                                   gap-3"
                                        >

                                            <div
                                                class="rounded-circle
                                                       bg-success
                                                       text-white
                                                       d-flex
                                                       align-items-center
                                                       justify-content-center"
                                                style="width:50px;height:50px;"
                                            >

                                                <i
                                                    class="bi bi-check-lg"
                                                ></i>

                                            </div>


                                            <div>

                                                <strong
                                                    class="d-block
                                                           text-success-emphasis"
                                                >
                                                    Delivered
                                                </strong>


                                                <small
                                                    class="text-success-emphasis"
                                                >

                                                    Successful delivery
                                                    is followed by
                                                    order closure in
                                                    the documented
                                                    vendor workflow.

                                                </small>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </section>


                        {{-- 07 Tracking --}}

                        <section
                            id="tracking"
                            class="shipping-section
                                   pb-4
                                   mb-4
                                   border-bottom
                                   border-warning-subtle"
                        >

                            <div
                                class="d-flex
                                       align-items-start
                                       gap-3"
                            >

                                <span
                                    class="shipping-number
                                           text-pn-gold
                                           fw-semibold"
                                >
                                    07
                                </span>


                                <div>

                                    <h2
                                        class="font-serif
                                               h3
                                               text-pn-brown
                                               mb-3"
                                    >
                                        Delivery Status & Tracking
                                    </h2>


                                    <p
                                        class="text-secondary
                                               lh-lg"
                                    >

                                        Delivery Status is explicitly
                                        included in the Admin Order
                                        Management module. The customer
                                        order experience should reflect
                                        the applicable order/delivery
                                        status when the functionality
                                        is connected.

                                    </p>


                                    <a
                                        href="{{ url('/dashboard/orders') }}"
                                        class="btn btn-pn"
                                    >

                                        View My Orders

                                        <i
                                            class="bi bi-arrow-right ms-1"
                                        ></i>

                                    </a>

                                </div>

                            </div>

                        </section>


                        {{-- 08 Failed Delivery --}}

                        <section
                            id="failed-delivery"
                            class="shipping-section
                                   pb-4
                                   mb-4
                                   border-bottom
                                   border-warning-subtle"
                        >

                            <div
                                class="d-flex
                                       align-items-start
                                       gap-3"
                            >

                                <span
                                    class="shipping-number
                                           text-pn-gold
                                           fw-semibold"
                                >
                                    08
                                </span>


                                <div>

                                    <h2
                                        class="font-serif
                                               h3
                                               text-pn-brown
                                               mb-3"
                                    >
                                        Delivery Issues
                                    </h2>


                                    <p
                                        class="text-secondary
                                               lh-lg"
                                    >

                                        If an order encounters a
                                        delivery-related issue, the
                                        customer can use the available
                                        support workflow for assistance.

                                    </p>


                                    <div
                                        class="alert
                                               alert-light
                                               border
                                               rounded-4
                                               mb-0"
                                    >

                                        <div
                                            class="d-flex
                                                   gap-2"
                                        >

                                            <i
                                                class="bi bi-exclamation-circle
                                                       text-pn-primary
                                                       mt-1"
                                            ></i>


                                            <small
                                                class="text-secondary"
                                            >

                                                Specific failed-delivery,
                                                re-delivery and
                                                undeliverable-order
                                                rules are not defined
                                                in the current project
                                                documents.

                                            </small>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </section>


                        {{-- 09 Returns --}}

                        <section
                            id="returns"
                            class="shipping-section
                                   pb-4
                                   mb-4
                                   border-bottom
                                   border-warning-subtle"
                        >

                            <div
                                class="d-flex
                                       align-items-start
                                       gap-3"
                            >

                                <span
                                    class="shipping-number
                                           text-pn-gold
                                           fw-semibold"
                                >
                                    09
                                </span>


                                <div>

                                    <h2
                                        class="font-serif
                                               h3
                                               text-pn-brown
                                               mb-3"
                                    >
                                        Returns
                                    </h2>


                                    <p
                                        class="text-secondary
                                               lh-lg"
                                    >

                                        Returns are explicitly
                                        included in the Admin Order
                                        Management module. The final
                                        customer-facing return rules
                                        should be maintained in the
                                        approved policy content.

                                    </p>


                                    <div
                                        class="bg-pn-cream
                                               rounded-4
                                               p-4"
                                    >

                                        <div
                                            class="d-flex
                                                   align-items-start
                                                   gap-3"
                                        >

                                            <i
                                                class="bi bi-arrow-return-left
                                                       text-pn-primary
                                                       fs-4"
                                            ></i>


                                            <div>

                                                <strong
                                                    class="d-block
                                                           text-pn-brown
                                                           mb-1"
                                                >
                                                    Return Process
                                                </strong>


                                                <small
                                                    class="text-secondary"
                                                >

                                                    Final eligibility,
                                                    timelines and
                                                    return conditions
                                                    require business
                                                    approval.

                                                </small>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </section>


                        {{-- 10 Cancellations --}}

                        <section
                            id="cancellations"
                            class="shipping-section
                                   pb-4
                                   mb-4
                                   border-bottom
                                   border-warning-subtle"
                        >

                            <div
                                class="d-flex
                                       align-items-start
                                       gap-3"
                            >

                                <span
                                    class="shipping-number
                                           text-pn-gold
                                           fw-semibold"
                                >
                                    10
                                </span>


                                <div>

                                    <h2
                                        class="font-serif
                                               h3
                                               text-pn-brown
                                               mb-3"
                                    >
                                        Cancellations
                                    </h2>


                                    <p
                                        class="text-secondary
                                               lh-lg"
                                    >

                                        Order cancellations are also
                                        explicitly included in the
                                        Admin Order Management module.

                                    </p>


                                    <a
                                        href="{{ url('/refund-policy') }}"
                                        class="btn
                                               btn-sm
                                               btn-pn-outline"
                                    >

                                        View Refund Policy

                                        <i
                                            class="bi bi-arrow-right ms-1"
                                        ></i>

                                    </a>

                                </div>

                            </div>

                        </section>


                        {{-- 11 Order Closure --}}

                        <section
                            id="order-closure"
                            class="shipping-section
                                   pb-4
                                   mb-4
                                   border-bottom
                                   border-warning-subtle"
                        >

                            <div
                                class="d-flex
                                       align-items-start
                                       gap-3"
                            >

                                <span
                                    class="shipping-number
                                           text-pn-gold
                                           fw-semibold"
                                >
                                    11
                                </span>


                                <div>

                                    <h2
                                        class="font-serif
                                               h3
                                               text-pn-brown
                                               mb-3"
                                    >
                                        Order Closure
                                    </h2>


                                    <p
                                        class="text-secondary
                                               lh-lg"
                                    >

                                        The documented vendor order
                                        flow ends with delivery
                                        followed by order closure.

                                    </p>


                                    <div
                                        class="bg-pn-cream
                                               rounded-4
                                               p-4"
                                    >

                                        <div
                                            class="d-flex
                                                   flex-wrap
                                                   align-items-center
                                                   gap-2"
                                        >

                                            <span
                                                class="badge
                                                       bg-white
                                                       text-pn-brown
                                                       border
                                                       border-warning-subtle
                                                       rounded-pill
                                                       px-3
                                                       py-2"
                                            >

                                                Shipping

                                            </span>


                                            <i
                                                class="bi bi-arrow-right
                                                       text-pn-gold"
                                            ></i>


                                            <span
                                                class="badge
                                                       bg-white
                                                       text-pn-brown
                                                       border
                                                       border-warning-subtle
                                                       rounded-pill
                                                       px-3
                                                       py-2"
                                            >

                                                Delivery

                                            </span>


                                            <i
                                                class="bi bi-arrow-right
                                                       text-pn-gold"
                                            ></i>


                                            <span
                                                class="badge
                                                       bg-success
                                                       text-white
                                                       rounded-pill
                                                       px-3
                                                       py-2"
                                            >

                                                Order Closed

                                            </span>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </section>


                        {{-- 12 Charges --}}

                        <section
                            id="charges"
                            class="shipping-section
                                   pb-4
                                   mb-4
                                   border-bottom
                                   border-warning-subtle"
                        >

                            <div
                                class="d-flex
                                       align-items-start
                                       gap-3"
                            >

                                <span
                                    class="shipping-number
                                           text-pn-gold
                                           fw-semibold"
                                >
                                    12
                                </span>


                                <div>

                                    <h2
                                        class="font-serif
                                               h3
                                               text-pn-brown
                                               mb-3"
                                    >
                                        Shipping Charges & Timelines
                                    </h2>


                                    <p
                                        class="text-secondary
                                               lh-lg"
                                    >

                                        The current project documents
                                        do not define the final
                                        shipping charges, delivery
                                        timelines, courier partners or
                                        serviceability rules.

                                    </p>


                                    <div
                                        class="row
                                               row-cols-1
                                               row-cols-md-3
                                               g-3"
                                    >

                                        @foreach([
                                            [
                                                'icon' => 'bi-currency-rupee',
                                                'title' => 'Shipping Charges',
                                                'text' => 'To be configured.'
                                            ],
                                            [
                                                'icon' => 'bi-clock',
                                                'title' => 'Delivery Timeline',
                                                'text' => 'To be configured.'
                                            ],
                                            [
                                                'icon' => 'bi-geo-alt',
                                                'title' => 'Serviceability',
                                                'text' => 'To be configured.'
                                            ]
                                        ] as $item)

                                            <div class="col">

                                                <div
                                                    class="bg-pn-cream
                                                           rounded-4
                                                           p-3
                                                           h-100"
                                                >

                                                    <i
                                                        class="bi {{ $item['icon'] }}
                                                               text-pn-primary
                                                               fs-5"
                                                    ></i>


                                                    <h3
                                                        class="font-serif
                                                               h6
                                                               text-pn-brown
                                                               mt-2"
                                                    >

                                                        {{ $item['title'] }}

                                                    </h3>


                                                    <p
                                                        class="small
                                                               text-secondary
                                                               mb-0"
                                                    >

                                                        {{ $item['text'] }}

                                                    </p>

                                                </div>

                                            </div>

                                        @endforeach

                                    </div>

                                </div>

                            </div>

                        </section>


                        {{-- 13 Support --}}

                        <section
                            id="support"
                            class="shipping-section
                                   pb-4
                                   mb-4
                                   border-bottom
                                   border-warning-subtle"
                        >

                            <div
                                class="d-flex
                                       align-items-start
                                       gap-3"
                            >

                                <span
                                    class="shipping-number
                                           text-pn-gold
                                           fw-semibold"
                                >
                                    13
                                </span>


                                <div>

                                    <h2
                                        class="font-serif
                                               h3
                                               text-pn-brown
                                               mb-3"
                                    >
                                        Shipping Support
                                    </h2>


                                    <p
                                        class="text-secondary
                                               lh-lg
                                               mb-4"
                                    >

                                        Customers can use the
                                        documented support and ticket
                                        workflow for assistance with
                                        orders and delivery issues.

                                    </p>


                                    <div
                                        class="d-flex
                                               flex-wrap
                                               gap-2"
                                    >

                                        <a
                                            href="{{ url('/raise-ticket') }}"
                                            class="btn btn-pn"
                                        >

                                            Raise a Ticket

                                        </a>


                                        <a
                                            href="{{ url('/contact-us') }}"
                                            class="btn btn-pn-outline"
                                        >

                                            Contact Us

                                        </a>

                                    </div>

                                </div>

                            </div>

                        </section>


                        {{-- 14 Changes --}}

                        <section
                            id="changes"
                            class="shipping-section
                                   pb-4
                                   mb-4
                                   border-bottom
                                   border-warning-subtle"
                        >

                            <div
                                class="d-flex
                                       align-items-start
                                       gap-3"
                            >

                                <span
                                    class="shipping-number
                                           text-pn-gold
                                           fw-semibold"
                                >
                                    14
                                </span>


                                <div>

                                    <h2
                                        class="font-serif
                                               h3
                                               text-pn-brown
                                               mb-3"
                                    >
                                        Changes to Shipping Policy
                                    </h2>


                                    <p
                                        class="text-secondary
                                               lh-lg
                                               mb-0"
                                    >

                                        Any future changes to shipping
                                        rules should be maintained
                                        through the Pooja Nilayam CMS
                                        and reflected on this page.

                                    </p>

                                </div>

                            </div>

                        </section>


                        {{-- 15 Contact --}}

                        <section
                            id="contact"
                            class="shipping-section"
                        >

                            <div
                                class="d-flex
                                       align-items-start
                                       gap-3"
                            >

                                <span
                                    class="shipping-number
                                           text-pn-gold
                                           fw-semibold"
                                >
                                    15
                                </span>


                                <div>

                                    <h2
                                        class="font-serif
                                               h3
                                               text-pn-brown
                                               mb-3"
                                    >
                                        Contact Us
                                    </h2>


                                    <p
                                        class="text-secondary
                                               lh-lg
                                               mb-4"
                                    >

                                        For questions concerning
                                        shipping, delivery or an
                                        existing order, contact the
                                        Pooja Nilayam support team.

                                    </p>


                                    <a
                                        href="{{ url('/contact-us') }}"
                                        class="btn btn-pn"
                                    >

                                        Contact Pooja Nilayam

                                        <i
                                            class="bi bi-arrow-right ms-1"
                                        ></i>

                                    </a>

                                </div>

                            </div>

                        </section>

                    </div>

                </article>

            </div>

        </div>

    </div>

</section>


{{-- ============================================================
     LEGAL PAGE NAVIGATION
============================================================ --}}

<section class="bg-pn-cream py-4">

    <div class="container">

        <div
            class="d-flex
                   flex-column
                   flex-md-row
                   justify-content-between
                   align-items-md-center
                   gap-3"
        >

            <div>

                <small
                    class="text-secondary"
                >
                    Other Legal Pages
                </small>

            </div>


            <div
                class="d-flex
                       flex-wrap
                       gap-2"
            >

                <a
                    href="{{ url('/privacy-policy') }}"
                    class="btn
                           btn-sm
                           btn-pn-outline"
                >
                    Privacy Policy
                </a>


                <a
                    href="{{ url('/terms-conditions') }}"
                    class="btn
                           btn-sm
                           btn-pn-outline"
                >
                    Terms & Conditions
                </a>


                <a
                    href="{{ url('/refund-policy') }}"
                    class="btn
                           btn-sm
                           btn-pn-outline"
                >
                    Refund Policy
                </a>


                <a
                    href="{{ url('/disclaimer') }}"
                    class="btn
                           btn-sm
                           btn-pn-outline"
                >
                    Disclaimer
                </a>

            </div>

        </div>

    </div>

</section>


{{-- ============================================================
     PAGE-SPECIFIC STYLE
============================================================ --}}

@push('styles')

<style>

    .shipping-nav-link {
        transition:
            background-color .2s ease,
            color .2s ease;
    }


    .shipping-nav-link:hover,
    .shipping-nav-link.active {
        background-color: #f8f1e4;
    }


    .shipping-nav-link:hover span:last-child,
    .shipping-nav-link.active span:last-child {
        color: #8b5e34 !important;
    }


    .shipping-section {
        scroll-margin-top: 110px;
    }


    .shipping-number {
        min-width: 32px;
        padding-top: 3px;
    }


    @media (max-width: 991.98px) {

        .shipping-section {
            scroll-margin-top: 90px;
        }

    }

</style>

@endpush


{{-- ============================================================
     PAGE SCRIPT
============================================================ --}}

@push('scripts')

<script>
document.addEventListener('DOMContentLoaded', function () {

    const navLinks =
        document.querySelectorAll(
            '.shipping-nav-link'
        );


    const sections =
        document.querySelectorAll(
            '.shipping-section'
        );


    /*
    |--------------------------------------------------------------------------
    | Highlight Current Section
    |--------------------------------------------------------------------------
    */

    if (
        'IntersectionObserver'
        in window
    ) {

        const observer =
            new IntersectionObserver(
                function (entries) {

                    entries.forEach(
                        function (entry) {

                            if (
                                entry.isIntersecting
                            ) {

                                navLinks.forEach(
                                    function (link) {

                                        link.classList.toggle(
                                            'active',
                                            link.getAttribute(
                                                'href'
                                            ) ===
                                            '#' +
                                            entry.target.id
                                        );

                                    }
                                );

                            }

                        }
                    );

                },
                {
                    rootMargin:
                        '-100px 0px -65% 0px'
                }
            );


        sections.forEach(
            function (section) {

                observer.observe(
                    section
                );

            }
        );

    }


    /*
    |--------------------------------------------------------------------------
    | Smooth Scroll
    |--------------------------------------------------------------------------
    */

    navLinks.forEach(
        function (link) {

            link.addEventListener(
                'click',
                function (event) {

                    const targetId =
                        this.getAttribute(
                            'href'
                        );


                    const target =
                        document.querySelector(
                            targetId
                        );


                    if (!target) {

                        return;

                    }


                    event.preventDefault();


                    target.scrollIntoView({

                        behavior: 'smooth',

                        block: 'start'

                    });


                    history.replaceState(
                        null,
                        '',
                        targetId
                    );

                }
            );

        }
    );

});
</script>

@endpush

@endsection