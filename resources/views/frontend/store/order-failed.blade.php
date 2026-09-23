@extends('layouts.app')

@section('title', 'Payment Failed | Pooja Nilayam')

@section(
    'meta_description',
    'Your payment could not be completed. Review your order and try again.'
)

@section('content')

@php

    /*
    |--------------------------------------------------------------------------
    | TEMPORARY FAILED ORDER DATA
    |--------------------------------------------------------------------------
    | UI prototype only.
    |
    | Actual payment status, transaction reference, gateway response,
    | retry URL and order information will be supplied by the backend
    | after payment integration.
    |--------------------------------------------------------------------------
    */

    $order = [

        'number' => 'PN-2026-000124',

        'date' => '09 August 2026',

        'payment_method' => 'UPI',

        'amount' => 1447,

        'transaction_reference' => 'TXN-PENDING',

        'failure_reason' => 'The payment could not be completed.'

    ];


    $cartItems = [

        [
            'name' => 'Premium Pooja Samagri Kit',
            'category' => 'Pooja Samagri',
            'price' => 999,
            'quantity' => 1,
            'image' => 'images/home/hero.webp'
        ],

        [
            'name' => 'Premium Brass Diya',
            'category' => 'Pooja Essentials',
            'price' => 299,
            'quantity' => 2,
            'image' => 'images/home/hero.webp'
        ],

        [
            'name' => 'Sandalwood Dhoop',
            'category' => 'Incense & Dhoop',
            'price' => 249,
            'quantity' => 1,
            'image' => 'images/home/hero.webp'
        ]

    ];


    $deliveryAddress = [

        'name' => 'Mahendra Varma',

        'phone' => '+91 XXXXX XXXXX',

        'address' => 'Your selected delivery address',

        'city' => 'Hyderabad',

        'state' => 'Telangana',

        'pincode' => '500000'

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
                        Store
                    </a>

                </li>


                <li class="breadcrumb-item">

                    <a
                        href="#"
                        class="text-pn-primary"
                    >
                        Checkout
                    </a>

                </li>


                <li
                    class="breadcrumb-item active"
                    aria-current="page"
                >
                    Payment Failed
                </li>

            </ol>

        </nav>

    </div>

</section>


{{-- ============================================================
     FAILED PAYMENT HERO
============================================================ --}}

<section class="bg-pn-cream py-5">

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-12 col-lg-9">

                <div class="text-center">

                    {{-- Failure Icon --}}

                    <div
                        class="rounded-circle
                               bg-danger-subtle
                               text-danger
                               d-flex
                               align-items-center
                               justify-content-center
                               mx-auto
                               mb-4"
                        style="width:96px;height:96px;"
                    >

                        <i
                            class="bi bi-x-lg"
                            style="font-size:2.5rem;"
                        ></i>

                    </div>


                    <span
                        class="small
                               text-danger
                               fw-semibold
                               text-uppercase"
                    >
                        Payment Unsuccessful
                    </span>


                    <h1
                        class="font-serif
                               display-3
                               text-pn-brown
                               mt-2
                               mb-3"
                    >
                        We couldn't complete your payment.
                    </h1>


                    <p
                        class="lead
                               text-secondary
                               col-lg-8
                               mx-auto
                               mb-4"
                    >
                        Don't worry. Your order has not been
                        successfully completed. You can try the
                        payment again or return to your cart.
                    </p>


                    {{-- Error Message --}}

                    <div
                        class="alert
                               alert-danger
                               rounded-4
                               d-inline-flex
                               align-items-start
                               text-start
                               gap-3
                               mb-4"
                    >

                        <i
                            class="bi bi-exclamation-circle-fill
                                   mt-1"
                        ></i>


                        <div>

                            <strong
                                class="d-block
                                       small
                                       mb-1"
                            >
                                Payment could not be processed
                            </strong>


                            <small>
                                {{ $order['failure_reason'] }}
                            </small>

                        </div>

                    </div>


                    {{-- Primary Actions --}}

                    <div
                        class="d-flex
                               flex-column
                               flex-sm-row
                               justify-content-center
                               gap-2"
                    >

                        <a
                            href="#"
                            class="btn
                                   btn-pn
                                   btn-lg
                                   px-4"
                        >

                            <i
                                class="bi bi-arrow-repeat me-2"
                            ></i>

                            Try Payment Again

                        </a>


                        <a
                            href="#"
                            class="btn
                                   btn-pn-outline
                                   btn-lg
                                   px-4"
                        >

                            <i
                                class="bi bi-bag me-2"
                            ></i>

                            Return to Cart

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- ============================================================
     CHECKOUT PROGRESS
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
                           bg-danger
                           text-white
                           d-inline-flex
                           align-items-center
                           justify-content-center"
                    style="width:34px;height:34px;"
                >

                    <i class="bi bi-x-lg"></i>

                </span>


                <small
                    class="fw-semibold
                           text-danger
                           d-none
                           d-sm-inline"
                >
                    Payment
                </small>

            </div>


            <div
                class="bg-secondary-subtle
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
                           border
                           border-secondary
                           text-secondary
                           d-inline-flex
                           align-items-center
                           justify-content-center"
                    style="width:34px;height:34px;"
                >
                    4
                </span>


                <small
                    class="text-secondary
                           d-none
                           d-sm-inline"
                >
                    Confirmation
                </small>

            </div>

        </div>

    </div>

</section>


{{-- ============================================================
     FAILED PAYMENT INFORMATION
============================================================ --}}

<section class="py-5">

    <div class="container">

        <div class="row g-4 g-xl-5">

            {{-- ====================================================
                 LEFT CONTENT
            ===================================================== --}}

            <div class="col-12 col-lg-7">

                {{-- ==================================================
                     WHAT HAPPENED
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
                                   gap-3
                                   mb-4"
                        >

                            <div
                                class="rounded-circle
                                       bg-danger-subtle
                                       text-danger
                                       d-flex
                                       align-items-center
                                       justify-content-center
                                       flex-shrink-0"
                                style="width:52px;height:52px;"
                            >

                                <i
                                    class="bi bi-exclamation-lg
                                           fs-4"
                                ></i>

                            </div>


                            <div>

                                <span
                                    class="small
                                           text-pn-gold
                                           fw-semibold
                                           text-uppercase"
                                >
                                    Payment Status
                                </span>


                                <h2
                                    class="font-serif
                                           h3
                                           text-pn-brown
                                           mt-1
                                           mb-2"
                                >
                                    What happened?
                                </h2>


                                <p
                                    class="text-secondary
                                           mb-0"
                                >
                                    Your payment attempt could not
                                    be completed. This can happen due
                                    to a temporary payment gateway
                                    issue, bank decline, timeout or
                                    another transaction-related issue.
                                </p>

                            </div>

                        </div>


                        {{-- Status Details --}}

                        <div class="vstack gap-3">

                            <div
                                class="d-flex
                                       align-items-center
                                       justify-content-between
                                       gap-3
                                       border
                                       border-warning-subtle
                                       rounded-4
                                       p-3"
                            >

                                <span class="small text-secondary">
                                    Order Reference
                                </span>


                                <strong
                                    class="small
                                           text-pn-brown"
                                >
                                    {{ $order['number'] }}
                                </strong>

                            </div>


                            <div
                                class="d-flex
                                       align-items-center
                                       justify-content-between
                                       gap-3
                                       border
                                       border-warning-subtle
                                       rounded-4
                                       p-3"
                            >

                                <span class="small text-secondary">
                                    Payment Method
                                </span>


                                <strong
                                    class="small
                                           text-pn-brown"
                                >
                                    {{ $order['payment_method'] }}
                                </strong>

                            </div>


                            <div
                                class="d-flex
                                       align-items-center
                                       justify-content-between
                                       gap-3
                                       border
                                       border-warning-subtle
                                       rounded-4
                                       p-3"
                            >

                                <span class="small text-secondary">
                                    Amount
                                </span>


                                <strong
                                    class="small
                                           text-pn-brown"
                                >
                                    ₹{{ number_format($order['amount']) }}
                                </strong>

                            </div>


                            <div
                                class="d-flex
                                       align-items-center
                                       justify-content-between
                                       gap-3
                                       border
                                       border-warning-subtle
                                       rounded-4
                                       p-3"
                            >

                                <span class="small text-secondary">
                                    Transaction Reference
                                </span>


                                <strong
                                    class="small
                                           text-secondary
                                           text-break"
                                >
                                    {{ $order['transaction_reference'] }}
                                </strong>

                            </div>

                        </div>

                    </div>

                </div>


                {{-- ==================================================
                     TRY AGAIN
                =================================================== --}}

                <div
                    class="border
                           border-warning-subtle
                           rounded-5
                           bg-pn-cream
                           p-4
                           p-md-5
                           mb-4"
                >

                    <div
                        class="d-flex
                               align-items-start
                               gap-3"
                    >

                        <div
                            class="rounded-circle
                                   bg-white
                                   text-pn-primary
                                   d-flex
                                   align-items-center
                                   justify-content-center
                                   flex-shrink-0"
                            style="width:52px;height:52px;"
                        >

                            <i
                                class="bi bi-arrow-repeat
                                       fs-5"
                            ></i>

                        </div>


                        <div>

                            <h2
                                class="font-serif
                                       h4
                                       text-pn-brown
                                       mb-2"
                            >
                                Try your payment again
                            </h2>


                            <p
                                class="small
                                       text-secondary
                                       mb-3"
                            >
                                You can return to payment and choose
                                the same payment method or select
                                another available option.
                            </p>


                            <a
                                href="#"
                                class="btn
                                       btn-pn"
                            >

                                <i
                                    class="bi bi-credit-card me-2"
                                ></i>

                                Retry Payment

                            </a>

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
                                    Your Cart
                                </span>


                                <h2
                                    class="font-serif
                                           h3
                                           text-pn-brown
                                           mt-1
                                           mb-0"
                                >
                                    Items awaiting payment
                                </h2>

                            </div>


                            <span class="small text-secondary">

                                {{ count($cartItems) }}
                                items

                            </span>

                        </div>


                        <div class="vstack gap-3">

                            @foreach($cartItems as $item)

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
                                        style="width:68px;height:68px;"
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
                                                   text-pn-brown"
                                        >

                                            {{ $item['name'] }}

                                        </strong>


                                        <small
                                            class="d-block
                                                   text-secondary"
                                        >

                                            {{ $item['category'] }}

                                        </small>


                                        <small class="text-secondary">

                                            Quantity:
                                            {{ $item['quantity'] }}

                                        </small>

                                    </div>


                                    <strong
                                        class="small
                                               text-pn-brown"
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
                           rounded-5"
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
                                    class="bi bi-geo-alt
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
                                    Delivery Address
                                </span>


                                <h2
                                    class="font-serif
                                           h4
                                           text-pn-brown
                                           mt-1
                                           mb-2"
                                >
                                    Your selected address
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


                                <small class="text-secondary">

                                    {{ $deliveryAddress['city'] }},
                                    {{ $deliveryAddress['state'] }}
                                    -
                                    {{ $deliveryAddress['pincode'] }}

                                </small>

                            </div>

                        </div>

                    </div>

                </div>

            </div>


            {{-- ====================================================
                 RIGHT — PAYMENT SUMMARY
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
                            Payment Summary
                        </h2>


                        {{-- Amount --}}

                        <div
                            class="border
                                   border-warning-subtle
                                   rounded-4
                                   bg-pn-cream
                                   p-4
                                   mb-4"
                        >

                            <span
                                class="small
                                       text-secondary
                                       d-block
                                       mb-1"
                            >
                                Amount to Pay
                            </span>


                            <strong
                                class="font-serif
                                       display-6
                                       text-pn-primary"
                            >
                                ₹{{ number_format($order['amount']) }}
                            </strong>

                        </div>


                        {{-- Payment status --}}

                        <div
                            class="alert
                                   alert-danger
                                   rounded-4
                                   mb-4"
                        >

                            <div
                                class="d-flex
                                       align-items-start
                                       gap-2"
                            >

                                <i
                                    class="bi bi-x-circle-fill
                                           mt-1"
                                ></i>


                                <div>

                                    <strong
                                        class="d-block
                                               small
                                               mb-1"
                                    >
                                        Payment Failed
                                    </strong>


                                    <small>
                                        No successful payment
                                        confirmation was received.
                                    </small>

                                </div>

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
                                    class="bi bi-arrow-repeat me-2"
                                ></i>

                                Try Payment Again

                            </a>


                            <a
                                href="#"
                                class="btn
                                       btn-pn-outline"
                            >

                                <i
                                    class="bi bi-cart3 me-2"
                                ></i>

                                Review Cart

                            </a>


                            <a
                                href="{{ route('home') }}"
                                class="btn
                                       btn-link
                                       text-pn-primary"
                            >

                                Continue Shopping

                            </a>

                        </div>


                        <hr
                            class="border-warning-subtle
                                   my-4"
                        >


                        {{-- Help --}}

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
                                style="width:46px;height:46px;"
                            >

                                <i class="bi bi-headset"></i>

                            </div>


                            <div>

                                <strong
                                    class="d-block
                                           small
                                           text-pn-brown
                                           mb-1"
                                >
                                    Need Help?
                                </strong>


                                <small
                                    class="text-secondary
                                           d-block"
                                >
                                    If you continue to experience
                                    payment problems, our support
                                    team can help.
                                </small>


                                <a
                                    href="#"
                                    class="small
                                           text-pn-primary
                                           fw-semibold
                                           text-decoration-none"
                                >

                                    Contact Support

                                    <i
                                        class="bi bi-arrow-right ms-1"
                                    ></i>

                                </a>

                            </div>

                        </div>

                    </div>

                </aside>

            </div>

        </div>

    </div>

</section>


{{-- ============================================================
     COMMON PAYMENT ISSUES
============================================================ --}}

<section class="py-5 bg-pn-cream">

    <div class="container">

        <div class="text-center mb-5">

            <span
                class="small
                       text-pn-gold
                       fw-semibold
                       text-uppercase"
            >
                Payment Help
            </span>


            <h2
                class="font-serif
                       display-6
                       text-pn-brown
                       mt-2"
            >
                Having trouble completing your payment?
            </h2>


            <p
                class="text-secondary
                       col-lg-7
                       mx-auto"
            >
                A few simple checks may help you complete the
                payment successfully.
            </p>

        </div>


        <div
            class="row
                   row-cols-1
                   row-cols-md-3
                   g-4"
        >

            {{-- Check Bank --}}

            <div class="col">

                <div
                    class="card
                           border-0
                           rounded-5
                           h-100
                           bg-white"
                >

                    <div class="card-body p-4">

                        <div
                            class="rounded-circle
                                   bg-pn-cream
                                   text-pn-primary
                                   d-flex
                                   align-items-center
                                   justify-content-center
                                   mb-4"
                            style="width:54px;height:54px;"
                        >

                            <i class="bi bi-bank fs-5"></i>

                        </div>


                        <h3
                            class="font-serif
                                   h5
                                   text-pn-brown"
                        >
                            Check your bank
                        </h3>


                        <p
                            class="small
                                   text-secondary
                                   mb-0"
                        >
                            Make sure your account or card has
                            sufficient balance and is enabled for
                            online transactions.
                        </p>

                    </div>

                </div>

            </div>


            {{-- Try Another Method --}}

            <div class="col">

                <div
                    class="card
                           border-0
                           rounded-5
                           h-100
                           bg-white"
                >

                    <div class="card-body p-4">

                        <div
                            class="rounded-circle
                                   bg-pn-cream
                                   text-pn-primary
                                   d-flex
                                   align-items-center
                                   justify-content-center
                                   mb-4"
                            style="width:54px;height:54px;"
                        >

                            <i
                                class="bi bi-credit-card-2-front fs-5"
                            ></i>

                        </div>


                        <h3
                            class="font-serif
                                   h5
                                   text-pn-brown"
                        >
                            Try another method
                        </h3>


                        <p
                            class="small
                                   text-secondary
                                   mb-0"
                        >
                            If one payment method is unavailable,
                            try another available payment option.
                        </p>

                    </div>

                </div>

            </div>


            {{-- Contact Support --}}

            <div class="col">

                <div
                    class="card
                           border-0
                           rounded-5
                           h-100
                           bg-white"
                >

                    <div class="card-body p-4">

                        <div
                            class="rounded-circle
                                   bg-pn-cream
                                   text-pn-primary
                                   d-flex
                                   align-items-center
                                   justify-content-center
                                   mb-4"
                            style="width:54px;height:54px;"
                        >

                            <i
                                class="bi bi-headset fs-5"
                            ></i>

                        </div>


                        <h3
                            class="font-serif
                                   h5
                                   text-pn-brown"
                        >
                            Contact Support
                        </h3>


                        <p
                            class="small
                                   text-secondary
                                   mb-0"
                        >
                            If the issue continues, contact our
                            support team with your order reference.
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- ============================================================
     REASSURANCE CTA
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
                    class="bi bi-heart
                           display-5
                           text-warning"
                ></i>


                <h2
                    class="font-serif
                           display-6
                           mt-3"
                >
                    Your devotional journey continues.
                </h2>


                <p
                    class="text-white-50
                           col-lg-7
                           mx-auto
                           mb-4"
                >
                    Your cart is still available. You can return
                    whenever you're ready to complete your order.
                </p>


                <div
                    class="d-flex
                           flex-column
                           flex-sm-row
                           justify-content-center
                           gap-2"
                >

                    <a
                        href="#"
                        class="btn
                               btn-warning
                               text-dark
                               fw-semibold
                               px-4"
                    >

                        Return to Cart

                        <i
                            class="bi bi-arrow-right ms-2"
                        ></i>

                    </a>


                    <a
                        href="{{ route('home') }}"
                        class="btn
                               btn-outline-light
                               px-4"
                    >

                        Go to Home

                    </a>

                </div>

            </div>

        </div>

    </div>

</section>

@endsection