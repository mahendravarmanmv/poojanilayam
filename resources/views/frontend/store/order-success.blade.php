@extends('layouts.app')

@section('title', 'Order Confirmed | Pooja Nilayam')

@section(
    'meta_description',
    'Your Pooja Nilayam order has been successfully placed.'
)

@section('content')

@php

    /*
    |--------------------------------------------------------------------------
    | TEMPORARY ORDER DATA
    |--------------------------------------------------------------------------
    | UI prototype only.
    |
    | Actual order information will later come from the
    | authenticated user's order / order confirmation response.
    |--------------------------------------------------------------------------
    */

    $order = [

        'number' => 'PN-2026-000124',

        'date' => '09 August 2026',

        'payment_status' => 'Payment Successful',

        'payment_method' => 'UPI',

        'subtotal' => 1547,

        'discount' => 100,

        'delivery' => 0,

        'tax' => 0,

        'total' => 1447

    ];


    $customer = [

        'name' => 'Mahendra Varma',

        'phone' => '+91 XXXXX XXXXX',

        'email' => 'customer@example.com'

    ];


    $deliveryAddress = [

        'name' => 'Mahendra Varma',

        'phone' => '+91 XXXXX XXXXX',

        'address' => 'Your selected delivery address',

        'city' => 'Hyderabad',

        'state' => 'Telangana',

        'pincode' => '500000'

    ];


    $orderItems = [

        [
            'name' => 'Premium Pooja Samagri Kit',
            'category' => 'Pooja Samagri',
            'price' => 999,
            'quantity' => 1,
            'image' => 'images/home/hero.jpg'
        ],

        [
            'name' => 'Premium Brass Diya',
            'category' => 'Pooja Essentials',
            'price' => 299,
            'quantity' => 2,
            'image' => 'images/home/hero.jpg'
        ],

        [
            'name' => 'Sandalwood Dhoop',
            'category' => 'Incense & Dhoop',
            'price' => 249,
            'quantity' => 1,
            'image' => 'images/home/hero.jpg'
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

                        Store

                    </a>

                </li>


                <li
                    class="breadcrumb-item active"
                    aria-current="page"
                >

                    Order Confirmation

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

        <div class="row justify-content-center">

            <div class="col-12 col-lg-9">

                <div class="text-center">

                    {{-- Success Icon --}}

                    <div
                        class="rounded-circle
                               bg-success-subtle
                               text-success
                               d-flex
                               align-items-center
                               justify-content-center
                               mx-auto
                               mb-4"
                        style="width:96px;height:96px;"
                    >

                        <i
                            class="bi bi-check-lg"
                            style="font-size:3rem;"
                        ></i>

                    </div>


                    <span
                        class="small
                               text-pn-gold
                               fw-semibold
                               text-uppercase"
                    >

                        Order Confirmed

                    </span>


                    <h1
                        class="font-serif
                               display-3
                               text-pn-brown
                               mt-2
                               mb-3"
                    >

                        Thank you for your order.

                    </h1>


                    <p
                        class="lead
                               text-secondary
                               col-lg-8
                               mx-auto
                               mb-4"
                    >

                        Your order has been successfully placed.
                        We will keep you informed about its
                        delivery progress.

                    </p>


                    {{-- Order Reference --}}

                    <div
                        class="d-inline-flex
                               flex-column
                               flex-sm-row
                               align-items-center
                               gap-2
                               gap-sm-3
                               bg-white
                               border
                               border-warning-subtle
                               rounded-pill
                               px-4
                               py-3"
                    >

                        <span
                            class="small
                                   text-secondary"
                        >

                            Order Number

                        </span>


                        <strong
                            class="text-pn-primary"
                        >

                            {{ $order['number'] }}

                        </strong>


                        <span
                            class="badge
                                   bg-success-subtle
                                   text-success
                                   rounded-pill"
                        >

                            Confirmed

                        </span>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- ============================================================
     ORDER PROGRESS
============================================================ --}}

<section class="py-4 border-bottom">

    <div class="container">

        <div
            class="d-flex
                   align-items-center
                   justify-content-center"
        >

            {{-- Cart --}}

            <div
                class="d-flex
                       align-items-center
                       gap-2"
            >

                <span
                    class="rounded-circle
                           bg-pn-primary
                           text-white
                           d-inline-flex
                           align-items-center
                           justify-content-center"
                    style="width:34px;height:34px;"
                >

                    <i class="bi bi-check"></i>

                </span>


                <small
                    class="fw-semibold
                           text-pn-primary
                           d-none
                           d-sm-inline"
                >

                    Cart

                </small>

            </div>


            <div
                class="bg-pn-primary
                       mx-2
                       mx-sm-3"
                style="height:2px;width:35px;"
            ></div>


            {{-- Checkout --}}

            <div
                class="d-flex
                       align-items-center
                       gap-2"
            >

                <span
                    class="rounded-circle
                           bg-pn-primary
                           text-white
                           d-inline-flex
                           align-items-center
                           justify-content-center"
                    style="width:34px;height:34px;"
                >

                    <i class="bi bi-check"></i>

                </span>


                <small
                    class="fw-semibold
                           text-pn-primary
                           d-none
                           d-sm-inline"
                >

                    Checkout

                </small>

            </div>


            <div
                class="bg-pn-primary
                       mx-2
                       mx-sm-3"
                style="height:2px;width:35px;"
            ></div>


            {{-- Payment --}}

            <div
                class="d-flex
                       align-items-center
                       gap-2"
            >

                <span
                    class="rounded-circle
                           bg-pn-primary
                           text-white
                           d-inline-flex
                           align-items-center
                           justify-content-center"
                    style="width:34px;height:34px;"
                >

                    <i class="bi bi-check"></i>

                </span>


                <small
                    class="fw-semibold
                           text-pn-primary
                           d-none
                           d-sm-inline"
                >

                    Payment

                </small>

            </div>


            <div
                class="bg-pn-primary
                       mx-2
                       mx-sm-3"
                style="height:2px;width:35px;"
            ></div>


            {{-- Confirmation --}}

            <div
                class="d-flex
                       align-items-center
                       gap-2"
            >

                <span
                    class="rounded-circle
                           bg-success
                           text-white
                           d-inline-flex
                           align-items-center
                           justify-content-center"
                    style="width:34px;height:34px;"
                >

                    <i class="bi bi-check-lg"></i>

                </span>


                <small
                    class="fw-semibold
                           text-success
                           d-none
                           d-sm-inline"
                >

                    Confirmed

                </small>

            </div>

        </div>

    </div>

</section>


{{-- ============================================================
     ORDER INFORMATION
============================================================ --}}

<section class="py-5">

    <div class="container">

        <div class="row g-4 g-xl-5">

            {{-- ====================================================
                 LEFT CONTENT
            ===================================================== --}}

            <div class="col-12 col-lg-7">

                {{-- ==================================================
                     ORDER DETAILS
                =================================================== --}}

                <div
                    class="card
                           border
                           border-warning-subtle
                           rounded-5
                           mb-4"
                >

                    <div class="card-body p-4 p-md-5">

                        <div
                            class="d-flex
                                   align-items-start
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

                                    Order Details

                                </span>


                                <h2
                                    class="font-serif
                                           h3
                                           text-pn-brown
                                           mt-1
                                           mb-0"
                                >

                                    {{ $order['number'] }}

                                </h2>

                            </div>


                            <span
                                class="badge
                                       bg-success-subtle
                                       text-success
                                       rounded-pill
                                       px-3
                                       py-2"
                            >

                                Confirmed

                            </span>

                        </div>


                        <div
                            class="row
                                   row-cols-1
                                   row-cols-sm-3
                                   g-3"
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

                                        Order Date

                                    </small>


                                    <strong
                                        class="small
                                               text-pn-brown"
                                    >

                                        {{ $order['date'] }}

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

                                        Payment

                                    </small>


                                    <strong
                                        class="small
                                               text-success"
                                    >

                                        {{ $order['payment_status'] }}

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

                                        Method

                                    </small>


                                    <strong
                                        class="small
                                               text-pn-brown"
                                    >

                                        {{ $order['payment_method'] }}

                                    </strong>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>


                {{-- ==================================================
                     ORDER ITEMS
                =================================================== --}}

                <div
                    class="card
                           border
                           border-warning-subtle
                           rounded-5
                           mb-4"
                >

                    <div class="card-body p-4 p-md-5">

                        <div
                            class="d-flex
                                   align-items-center
                                   justify-content-between
                                   mb-4"
                        >

                            <div>

                                <span
                                    class="small
                                           text-pn-gold
                                           fw-semibold
                                           text-uppercase"
                                >

                                    Your Purchase

                                </span>


                                <h2
                                    class="font-serif
                                           h3
                                           text-pn-brown
                                           mt-1
                                           mb-0"
                                >

                                    Ordered Items

                                </h2>

                            </div>


                            <span class="text-secondary small">

                                {{ count($orderItems) }}
                                items

                            </span>

                        </div>


                        <div class="vstack gap-3">

                            @foreach($orderItems as $item)

                                <div
                                    class="d-flex
                                           align-items-center
                                           gap-3
                                           border-bottom
                                           pb-3"
                                >

                                    <div
                                        class="rounded-3
                                               overflow-hidden
                                               flex-shrink-0"
                                        style="width:72px;height:72px;"
                                    >

                                        <img
                                            src="{{ asset($item['image']) }}"
                                            class="w-100
                                                   h-100
                                                   object-fit-cover"
                                            alt="{{ $item['name'] }}"
                                            loading="lazy"
                                        >

                                    </div>


                                    <div class="flex-grow-1">

                                        <strong
                                            class="d-block
                                                   font-serif
                                                   text-pn-brown"
                                        >

                                            {{ $item['name'] }}

                                        </strong>


                                        <small
                                            class="text-secondary
                                                   d-block"
                                        >

                                            {{ $item['category'] }}

                                        </small>


                                        <small class="text-secondary">

                                            Quantity:
                                            {{ $item['quantity'] }}

                                        </small>

                                    </div>


                                    <strong
                                        class="text-pn-brown"
                                    >

                                        ₹{{ number_format(
                                            $item['price'] *
                                            $item['quantity']
                                        ) }}

                                    </strong>

                                </div>

                            @endforeach

                        </div>

                    </div>

                </div>


                {{-- ==================================================
                     DELIVERY ADDRESS
                =================================================== --}}

                <div
                    class="card
                           border
                           border-warning-subtle
                           rounded-5
                           mb-4"
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

                                <i class="bi bi-geo-alt fs-5"></i>

                            </div>


                            <div class="flex-grow-1">

                                <span
                                    class="small
                                           text-pn-gold
                                           fw-semibold
                                           text-uppercase"
                                >

                                    Delivery Address

                                </span>


                                <h2
                                    class="font-serif
                                           h4
                                           text-pn-brown
                                           mt-1
                                           mb-2"
                                >

                                    Delivering to

                                </h2>


                                <strong
                                    class="d-block
                                           small
                                           text-pn-brown"
                                >

                                    {{ $deliveryAddress['name'] }}

                                </strong>


                                <small
                                    class="d-block
                                           text-secondary"
                                >

                                    {{ $deliveryAddress['phone'] }}

                                </small>


                                <small
                                    class="d-block
                                           text-secondary
                                           mt-2"
                                >

                                    {{ $deliveryAddress['address'] }}

                                </small>


                                <small
                                    class="text-secondary"
                                >

                                    {{ $deliveryAddress['city'] }},
                                    {{ $deliveryAddress['state'] }}
                                    -
                                    {{ $deliveryAddress['pincode'] }}

                                </small>

                            </div>

                        </div>

                    </div>

                </div>


                {{-- ==================================================
                     WHAT HAPPENS NEXT
                =================================================== --}}

                <div
                    class="border
                           border-warning-subtle
                           rounded-5
                           bg-pn-cream
                           p-4
                           p-md-5"
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
                               h3
                               text-pn-brown
                               mt-1
                               mb-4"
                    >

                        Your order journey

                    </h2>


                    <div class="vstack gap-4">

                        {{-- Confirmed --}}

                        <div
                            class="d-flex
                                   align-items-start
                                   gap-3"
                        >

                            <div
                                class="rounded-circle
                                       bg-success
                                       text-white
                                       d-flex
                                       align-items-center
                                       justify-content-center
                                       flex-shrink-0"
                                style="width:40px;height:40px;"
                            >

                                <i class="bi bi-check-lg"></i>

                            </div>


                            <div>

                                <strong
                                    class="d-block
                                           text-pn-brown"
                                >

                                    Order Confirmed

                                </strong>


                                <small class="text-secondary">

                                    Your order has been successfully
                                    placed.

                                </small>

                            </div>

                        </div>


                        {{-- Processing --}}

                        <div
                            class="d-flex
                                   align-items-start
                                   gap-3"
                        >

                            <div
                                class="rounded-circle
                                       bg-white
                                       border
                                       border-warning-subtle
                                       text-pn-primary
                                       d-flex
                                       align-items-center
                                       justify-content-center
                                       flex-shrink-0"
                                style="width:40px;height:40px;"
                            >

                                <i class="bi bi-box-seam"></i>

                            </div>


                            <div>

                                <strong
                                    class="d-block
                                           text-pn-brown"
                                >

                                    Order Processing

                                </strong>


                                <small class="text-secondary">

                                    Your order will move through
                                    preparation and processing.

                                </small>

                            </div>

                        </div>


                        {{-- Shipment --}}

                        <div
                            class="d-flex
                                   align-items-start
                                   gap-3"
                        >

                            <div
                                class="rounded-circle
                                       bg-white
                                       border
                                       border-warning-subtle
                                       text-pn-primary
                                       d-flex
                                       align-items-center
                                       justify-content-center
                                       flex-shrink-0"
                                style="width:40px;height:40px;"
                            >

                                <i class="bi bi-truck"></i>

                            </div>


                            <div>

                                <strong
                                    class="d-block
                                           text-pn-brown"
                                >

                                    Shipment

                                </strong>


                                <small class="text-secondary">

                                    Tracking information will become
                                    available once your order ships.

                                </small>

                            </div>

                        </div>


                        {{-- Delivered --}}

                        <div
                            class="d-flex
                                   align-items-start
                                   gap-3"
                        >

                            <div
                                class="rounded-circle
                                       bg-white
                                       border
                                       border-warning-subtle
                                       text-pn-primary
                                       d-flex
                                       align-items-center
                                       justify-content-center
                                       flex-shrink-0"
                                style="width:40px;height:40px;"
                            >

                                <i class="bi bi-house-check"></i>

                            </div>


                            <div>

                                <strong
                                    class="d-block
                                           text-pn-brown"
                                >

                                    Delivered

                                </strong>


                                <small class="text-secondary">

                                    Your order will be delivered to
                                    the selected address.

                                </small>

                            </div>

                        </div>

                    </div>

                </div>

            </div>


            {{-- ====================================================
                 RIGHT — ORDER SUMMARY
            ===================================================== --}}

            <div class="col-12 col-lg-5">

                <aside
                    class="card
                           border
                           border-warning-subtle
                           rounded-5
                           sticky-lg-top"
                    style="top:90px;"
                >

                    <div class="card-body p-4 p-md-5">

                        <h2
                            class="font-serif
                                   h3
                                   text-pn-brown
                                   mb-4"
                        >

                            Order Summary

                        </h2>


                        {{-- Amount Details --}}

                        <div
                            class="vstack
                                   gap-3"
                        >

                            <div
                                class="d-flex
                                       justify-content-between
                                       gap-3"
                            >

                                <span class="text-secondary">

                                    Subtotal

                                </span>


                                <strong class="text-pn-brown">

                                    ₹{{ number_format(
                                        $order['subtotal']
                                    ) }}

                                </strong>

                            </div>


                            <div
                                class="d-flex
                                       justify-content-between
                                       gap-3"
                            >

                                <span class="text-secondary">

                                    Discount

                                </span>


                                <strong class="text-success">

                                    - ₹{{ number_format(
                                        $order['discount']
                                    ) }}

                                </strong>

                            </div>


                            <div
                                class="d-flex
                                       justify-content-between
                                       gap-3"
                            >

                                <span class="text-secondary">

                                    Delivery

                                </span>


                                <span class="text-success">

                                    FREE

                                </span>

                            </div>


                            <div
                                class="d-flex
                                       justify-content-between
                                       gap-3"
                            >

                                <span class="text-secondary">

                                    Taxes

                                </span>


                                <span class="text-secondary">

                                    ₹{{ number_format(
                                        $order['tax']
                                    ) }}

                                </span>

                            </div>

                        </div>


                        <hr
                            class="border-warning-subtle
                                   my-4"
                        >


                        <div
                            class="d-flex
                                   align-items-center
                                   justify-content-between
                                   gap-3
                                   mb-4"
                        >

                            <strong
                                class="font-serif
                                       h4
                                       text-pn-brown"
                            >

                                Total Paid

                            </strong>


                            <strong
                                class="fs-3
                                       text-pn-primary"
                            >

                                ₹{{ number_format(
                                    $order['total']
                                ) }}

                            </strong>

                        </div>


                        {{-- Payment Status --}}

                        <div
                            class="alert
                                   alert-success
                                   rounded-4
                                   mb-4"
                        >

                            <div
                                class="d-flex
                                       align-items-start
                                       gap-2"
                            >

                                <i
                                    class="bi bi-check-circle-fill
                                           mt-1"
                                ></i>


                                <div>

                                    <strong
                                        class="d-block
                                               small"
                                    >

                                        {{ $order['payment_status'] }}

                                    </strong>


                                    <small>

                                        Paid using
                                        {{ $order['payment_method'] }}.

                                    </small>

                                </div>

                            </div>

                        </div>


                        {{-- Customer Information --}}

                        <div
                            class="border
                                   border-warning-subtle
                                   rounded-4
                                   p-4
                                   mb-4"
                        >

                            <h3
                                class="font-serif
                                       h5
                                       text-pn-brown
                                       mb-3"
                            >

                                Contact Details

                            </h3>


                            <div
                                class="d-flex
                                       align-items-start
                                       gap-3
                                       mb-3"
                            >

                                <i
                                    class="bi bi-person
                                           text-pn-primary"
                                ></i>


                                <span
                                    class="small
                                           text-secondary"
                                >

                                    {{ $customer['name'] }}

                                </span>

                            </div>


                            <div
                                class="d-flex
                                       align-items-start
                                       gap-3
                                       mb-3"
                            >

                                <i
                                    class="bi bi-envelope
                                           text-pn-primary"
                                ></i>


                                <span
                                    class="small
                                           text-secondary
                                           text-break"
                                >

                                    {{ $customer['email'] }}

                                </span>

                            </div>


                            <div
                                class="d-flex
                                       align-items-start
                                       gap-3"
                            >

                                <i
                                    class="bi bi-phone
                                           text-pn-primary"
                                ></i>


                                <span
                                    class="small
                                           text-secondary"
                                >

                                    {{ $customer['phone'] }}

                                </span>

                            </div>

                        </div>


                        {{-- Actions --}}

                        <div
                            class="d-grid
                                   gap-2"
                        >

                            <a
                                href="#"
                                class="btn
                                       btn-pn
                                       btn-lg"
                            >

                                <i
                                    class="bi bi-receipt me-2"
                                ></i>

                                View Order Details

                            </a>


                            <a
                                href="#"
                                class="btn
                                       btn-pn-outline"
                            >

                                <i
                                    class="bi bi-bag me-2"
                                ></i>

                                Continue Shopping

                            </a>

                        </div>


                        {{-- Support --}}

                        <div
                            class="text-center
                                   mt-4"
                        >

                            <small class="text-secondary">

                                Need help with your order?

                                <a
                                    href="#"
                                    class="text-pn-primary
                                           fw-semibold
                                           text-decoration-none"
                                >

                                    Contact Support

                                </a>

                            </small>

                        </div>

                    </div>

                </aside>

            </div>

        </div>

    </div>

</section>


{{-- ============================================================
     THANK YOU CTA
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
                       p-md-5
                       text-center"
            >

                <i
                    class="bi bi-stars
                           display-5
                           text-warning"
                ></i>


                <h2
                    class="font-serif
                           display-6
                           mt-3"
                >

                    Thank you for choosing Pooja Nilayam.

                </h2>


                <p
                    class="text-white-50
                           col-lg-7
                           mx-auto
                           mb-4"
                >

                    We are grateful to be part of your devotional
                    journey.

                </p>


                <a
                    href="#"
                    class="btn
                           btn-warning
                           text-dark
                           fw-semibold
                           px-4"
                >

                    Explore More

                    <i
                        class="bi bi-arrow-right ms-2"
                    ></i>

                </a>

            </div>

        </div>

    </div>

</section>

@endsection