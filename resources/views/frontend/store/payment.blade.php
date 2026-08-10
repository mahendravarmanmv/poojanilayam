@extends('layouts.app')

@section('title', 'Payment | Pooja Nilayam')

@section(
    'meta_description',
    'Complete your payment securely for your Pooja Nilayam order.'
)

@section('content')

@php

    /*
    |--------------------------------------------------------------------------
    | TEMPORARY PAYMENT DATA
    |--------------------------------------------------------------------------
    | UI prototype only.
    |
    | Actual payment gateway, order ID, payment status,
    | transaction reference and backend verification will be
    | connected later.
    |--------------------------------------------------------------------------
    */

    $order = [

        'order_number' => 'PN-2026-000124',

        'subtotal' => 1547,

        'discount' => 100,

        'delivery' => 0,

        'tax' => 0,

        'total' => 1447

    ];


    $cartItems = [

        [
            'name' => 'Premium Pooja Samagri Kit',
            'price' => 999,
            'quantity' => 1,
            'image' => 'images/home/hero.jpg'
        ],

        [
            'name' => 'Premium Brass Diya',
            'price' => 299,
            'quantity' => 2,
            'image' => 'images/home/hero.jpg'
        ],

        [
            'name' => 'Sandalwood Dhoop',
            'price' => 249,
            'quantity' => 1,
            'image' => 'images/home/hero.jpg'
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

                    Payment

                </li>

            </ol>

        </nav>

    </div>

</section>


{{-- ============================================================
     PAYMENT HEADER
============================================================ --}}

<section class="bg-pn-cream py-5">

    <div class="container">

        <div class="row">

            <div class="col-12 col-lg-8">

                <span
                    class="small
                           text-pn-gold
                           fw-semibold
                           text-uppercase"
                >

                    Secure Payment

                </span>


                <h1
                    class="font-serif
                           display-4
                           text-pn-brown
                           mt-2
                           mb-3"
                >

                    Complete your payment

                </h1>


                <p
                    class="lead
                           text-secondary
                           mb-0"
                >

                    Choose your preferred payment method and
                    securely complete your order.

                </p>

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
                style="height:2px;width:45px;"
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
                style="height:2px;width:45px;"
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

                    3

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

        </div>

    </div>

</section>


{{-- ============================================================
     PAYMENT CONTENT
============================================================ --}}

<section class="py-5">

    <div class="container">

        <div class="row g-4 g-xl-5">

            {{-- ====================================================
                 LEFT — PAYMENT METHODS
            ===================================================== --}}

            <div class="col-12 col-lg-7">

                {{-- Payment Method Card --}}

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

                                    Payment Method

                                </span>


                                <h2
                                    class="font-serif
                                           h3
                                           text-pn-brown
                                           mt-1
                                           mb-1"
                                >

                                    Choose how you'd like to pay

                                </h2>


                                <p
                                    class="small
                                           text-secondary
                                           mb-0"
                                >

                                    Select one of the available
                                    payment options.

                                </p>

                            </div>


                            <i
                                class="bi bi-credit-card
                                       text-pn-primary
                                       fs-3"
                            ></i>

                        </div>


                        {{-- ==================================================
                             UPI
                        =================================================== --}}

                        <input
                            type="radio"
                            class="btn-check"
                            name="payment_method"
                            id="paymentUpi"
                            value="upi"
                            checked
                        >


                        <label
                            for="paymentUpi"
                            class="payment-method
                                   border
                                   border-warning-subtle
                                   rounded-4
                                   p-4
                                   mb-3
                                   d-block"
                            style="cursor:pointer;"
                        >

                            <div
                                class="d-flex
                                       align-items-center
                                       gap-3"
                            >

                                <div
                                    class="rounded-3
                                           bg-pn-cream
                                           text-pn-primary
                                           d-flex
                                           align-items-center
                                           justify-content-center
                                           flex-shrink-0"
                                    style="width:52px;height:52px;"
                                >

                                    <i
                                        class="bi bi-phone fs-4"
                                    ></i>

                                </div>


                                <div class="flex-grow-1">

                                    <strong
                                        class="d-block
                                               text-pn-brown"
                                    >

                                        UPI

                                    </strong>


                                    <small class="text-secondary">

                                        Pay using Google Pay,
                                        PhonePe, Paytm or another
                                        UPI app.

                                    </small>

                                </div>


                                <span
                                    class="payment-radio
                                           rounded-circle
                                           border
                                           border-secondary
                                           d-inline-flex
                                           align-items-center
                                           justify-content-center"
                                    style="width:22px;height:22px;"
                                ></span>

                            </div>

                        </label>


                        {{-- UPI Details --}}

                        <div
                            id="upiPaymentDetails"
                            class="border
                                   border-warning-subtle
                                   rounded-4
                                   bg-pn-cream
                                   p-4
                                   mb-4"
                        >

                            <label
                                for="upiId"
                                class="form-label
                                       small
                                       fw-semibold
                                       text-pn-brown"
                            >

                                UPI ID

                            </label>


                            <div class="input-group">

                                <span class="input-group-text">

                                    <i class="bi bi-at"></i>

                                </span>


                                <input
                                    type="text"
                                    id="upiId"
                                    name="upi_id"
                                    class="form-control"
                                    placeholder="yourname@upi"
                                >

                            </div>


                            <small
                                class="text-secondary
                                       d-block
                                       mt-2"
                            >

                                You may also be redirected to your
                                selected UPI app during payment.

                            </small>

                        </div>


                        {{-- ==================================================
                             CARD
                        =================================================== --}}

                        <input
                            type="radio"
                            class="btn-check"
                            name="payment_method"
                            id="paymentCard"
                            value="card"
                        >


                        <label
                            for="paymentCard"
                            class="payment-method
                                   border
                                   border-warning-subtle
                                   rounded-4
                                   p-4
                                   mb-3
                                   d-block"
                            style="cursor:pointer;"
                        >

                            <div
                                class="d-flex
                                       align-items-center
                                       gap-3"
                            >

                                <div
                                    class="rounded-3
                                           bg-pn-cream
                                           text-pn-primary
                                           d-flex
                                           align-items-center
                                           justify-content-center
                                           flex-shrink-0"
                                    style="width:52px;height:52px;"
                                >

                                    <i
                                        class="bi bi-credit-card-2-front fs-4"
                                    ></i>

                                </div>


                                <div class="flex-grow-1">

                                    <strong
                                        class="d-block
                                               text-pn-brown"
                                    >

                                        Credit / Debit Card

                                    </strong>


                                    <small class="text-secondary">

                                        Pay securely using your
                                        debit or credit card.

                                    </small>

                                </div>


                                <span
                                    class="payment-radio
                                           rounded-circle
                                           border
                                           border-secondary
                                           d-inline-flex
                                           align-items-center
                                           justify-content-center"
                                    style="width:22px;height:22px;"
                                ></span>

                            </div>

                        </label>


                        {{-- Card Details --}}

                        <div
                            id="cardPaymentDetails"
                            class="border
                                   border-warning-subtle
                                   rounded-4
                                   bg-pn-cream
                                   p-4
                                   mb-4
                                   d-none"
                        >

                            <div class="mb-3">

                                <label
                                    for="cardNumber"
                                    class="form-label
                                           small
                                           fw-semibold
                                           text-pn-brown"
                                >

                                    Card Number

                                </label>


                                <div class="input-group">

                                    <span class="input-group-text">

                                        <i class="bi bi-credit-card"></i>

                                    </span>


                                    <input
                                        type="text"
                                        id="cardNumber"
                                        class="form-control"
                                        placeholder="XXXX XXXX XXXX XXXX"
                                        inputmode="numeric"
                                    >

                                </div>

                            </div>


                            <div class="row g-3">

                                <div class="col-7">

                                    <label
                                        for="cardExpiry"
                                        class="form-label
                                               small
                                               fw-semibold
                                               text-pn-brown"
                                    >

                                        Expiry Date

                                    </label>


                                    <input
                                        type="text"
                                        id="cardExpiry"
                                        class="form-control"
                                        placeholder="MM / YY"
                                    >

                                </div>


                                <div class="col-5">

                                    <label
                                        for="cardCvv"
                                        class="form-label
                                               small
                                               fw-semibold
                                               text-pn-brown"
                                    >

                                        CVV

                                    </label>


                                    <input
                                        type="password"
                                        id="cardCvv"
                                        class="form-control"
                                        placeholder="CVV"
                                        inputmode="numeric"
                                    >

                                </div>


                                <div class="col-12">

                                    <label
                                        for="cardName"
                                        class="form-label
                                               small
                                               fw-semibold
                                               text-pn-brown"
                                    >

                                        Name on Card

                                    </label>


                                    <input
                                        type="text"
                                        id="cardName"
                                        class="form-control"
                                        placeholder="Name as shown on card"
                                    >

                                </div>

                            </div>

                        </div>


                        {{-- ==================================================
                             NET BANKING
                        =================================================== --}}

                        <input
                            type="radio"
                            class="btn-check"
                            name="payment_method"
                            id="paymentNetBanking"
                            value="netbanking"
                        >


                        <label
                            for="paymentNetBanking"
                            class="payment-method
                                   border
                                   border-warning-subtle
                                   rounded-4
                                   p-4
                                   mb-3
                                   d-block"
                            style="cursor:pointer;"
                        >

                            <div
                                class="d-flex
                                       align-items-center
                                       gap-3"
                            >

                                <div
                                    class="rounded-3
                                           bg-pn-cream
                                           text-pn-primary
                                           d-flex
                                           align-items-center
                                           justify-content-center
                                           flex-shrink-0"
                                    style="width:52px;height:52px;"
                                >

                                    <i
                                        class="bi bi-bank fs-4"
                                    ></i>

                                </div>


                                <div class="flex-grow-1">

                                    <strong
                                        class="d-block
                                               text-pn-brown"
                                    >

                                        Net Banking

                                    </strong>


                                    <small class="text-secondary">

                                        Pay directly through your
                                        bank account.

                                    </small>

                                </div>


                                <span
                                    class="payment-radio
                                           rounded-circle
                                           border
                                           border-secondary
                                           d-inline-flex
                                           align-items-center
                                           justify-content-center"
                                    style="width:22px;height:22px;"
                                ></span>

                            </div>

                        </label>


                        {{-- Net Banking Details --}}

                        <div
                            id="netBankingDetails"
                            class="border
                                   border-warning-subtle
                                   rounded-4
                                   bg-pn-cream
                                   p-4
                                   mb-4
                                   d-none"
                        >

                            <label
                                for="bankName"
                                class="form-label
                                       small
                                       fw-semibold
                                       text-pn-brown"
                            >

                                Select Your Bank

                            </label>


                            <select
                                id="bankName"
                                class="form-select"
                            >

                                <option selected>
                                    Select Bank
                                </option>

                                <option>
                                    State Bank of India
                                </option>

                                <option>
                                    HDFC Bank
                                </option>

                                <option>
                                    ICICI Bank
                                </option>

                                <option>
                                    Axis Bank
                                </option>

                                <option>
                                    Other Bank
                                </option>

                            </select>

                        </div>


                        {{-- ==================================================
                             CASH ON DELIVERY
                        =================================================== --}}

                        <input
                            type="radio"
                            class="btn-check"
                            name="payment_method"
                            id="paymentCod"
                            value="cod"
                        >


                        <label
                            for="paymentCod"
                            class="payment-method
                                   border
                                   border-warning-subtle
                                   rounded-4
                                   p-4
                                   mb-0
                                   d-block"
                            style="cursor:pointer;"
                        >

                            <div
                                class="d-flex
                                       align-items-center
                                       gap-3"
                            >

                                <div
                                    class="rounded-3
                                           bg-pn-cream
                                           text-pn-primary
                                           d-flex
                                           align-items-center
                                           justify-content-center
                                           flex-shrink-0"
                                    style="width:52px;height:52px;"
                                >

                                    <i
                                        class="bi bi-cash-coin fs-4"
                                    ></i>

                                </div>


                                <div class="flex-grow-1">

                                    <strong
                                        class="d-block
                                               text-pn-brown"
                                    >

                                        Cash on Delivery

                                    </strong>


                                    <small class="text-secondary">

                                        Pay when your order is
                                        delivered, if available.

                                    </small>

                                </div>


                                <span
                                    class="payment-radio
                                           rounded-circle
                                           border
                                           border-secondary
                                           d-inline-flex
                                           align-items-center
                                           justify-content-center"
                                    style="width:22px;height:22px;"
                                ></span>

                            </div>

                        </label>


                        {{-- COD Information --}}

                        <div
                            id="codDetails"
                            class="alert
                                   alert-warning
                                   rounded-4
                                   mt-3
                                   mb-0
                                   d-none"
                        >

                            <div
                                class="d-flex
                                       align-items-start
                                       gap-2"
                            >

                                <i
                                    class="bi bi-info-circle-fill"
                                ></i>


                                <small>

                                    Cash on Delivery availability
                                    and any applicable charges will
                                    be confirmed before order
                                    placement.

                                </small>

                            </div>

                        </div>

                    </div>

                </div>


                {{-- ==================================================
                     BILLING INFORMATION
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
                                   gap-3"
                        >

                            <div>

                                <h2
                                    class="font-serif
                                           h4
                                           text-pn-brown
                                           mb-1"
                                >

                                    Billing Information

                                </h2>


                                <small class="text-secondary">

                                    Billing address will use the
                                    selected checkout address unless
                                    a different option is required.

                                </small>

                            </div>


                            <i
                                class="bi bi-receipt
                                       text-pn-primary
                                       fs-4"
                            ></i>

                        </div>


                        <div class="form-check mt-4">

                            <input
                                class="form-check-input"
                                type="checkbox"
                                id="sameBillingAddress"
                                checked
                            >


                            <label
                                class="form-check-label small"
                                for="sameBillingAddress"
                            >

                                My billing address is the same as
                                my delivery address

                            </label>

                        </div>

                    </div>

                </div>


                {{-- ==================================================
                     PAYMENT SECURITY
                =================================================== --}}

                <div
                    class="border
                           border-warning-subtle
                           rounded-5
                           bg-pn-cream
                           p-4
                           p-md-5"
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
                            style="width:54px;height:54px;"
                        >

                            <i
                                class="bi bi-shield-lock fs-5"
                            ></i>

                        </div>


                        <div>

                            <h2
                                class="font-serif
                                       h4
                                       text-pn-brown
                                       mb-2"
                            >

                                Your payment is protected

                            </h2>


                            <p
                                class="small
                                       text-secondary
                                       mb-0"
                            >

                                Payment processing and transaction
                                verification will be handled through
                                the configured payment gateway when
                                backend integration is implemented.

                            </p>

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

                        {{-- Order Number --}}

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
                                           text-secondary"
                                >

                                    Order Reference

                                </span>


                                <strong
                                    class="d-block
                                           text-pn-brown"
                                >

                                    {{ $order['order_number'] }}

                                </strong>

                            </div>


                            <span
                                class="badge
                                       bg-success-subtle
                                       text-success
                                       rounded-pill"
                            >

                                Ready for Payment

                            </span>

                        </div>


                        <h2
                            class="font-serif
                                   h3
                                   text-pn-brown
                                   mb-4"
                        >

                            Order Summary

                        </h2>


                        {{-- Products --}}

                        <div
                            class="vstack
                                   gap-3
                                   mb-4"
                        >

                            @foreach($cartItems as $item)

                                <div
                                    class="d-flex
                                           align-items-center
                                           gap-3"
                                >

                                    <div
                                        class="position-relative
                                               flex-shrink-0"
                                    >

                                        <div
                                            class="rounded-3
                                                   overflow-hidden"
                                            style="width:58px;height:58px;"
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


                                        <span
                                            class="position-absolute
                                                   top-0
                                                   start-100
                                                   translate-middle
                                                   badge
                                                   rounded-pill
                                                   bg-pn-primary"
                                        >

                                            {{ $item['quantity'] }}

                                        </span>

                                    </div>


                                    <div class="flex-grow-1">

                                        <strong
                                            class="d-block
                                                   small
                                                   text-pn-brown"
                                        >

                                            {{ $item['name'] }}

                                        </strong>


                                        <small class="text-secondary">

                                            Qty:
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


                        <hr
                            class="border-warning-subtle"
                        >


                        {{-- Subtotal --}}

                        <div
                            class="d-flex
                                   justify-content-between
                                   gap-3
                                   mb-3"
                        >

                            <span class="text-secondary">

                                Subtotal

                            </span>


                            <strong class="text-pn-brown">

                                ₹{{ number_format($order['subtotal']) }}

                            </strong>

                        </div>


                        {{-- Discount --}}

                        <div
                            class="d-flex
                                   justify-content-between
                                   gap-3
                                   mb-3"
                        >

                            <span class="text-secondary">

                                Discount

                            </span>


                            <strong class="text-success">

                                - ₹{{ number_format($order['discount']) }}

                            </strong>

                        </div>


                        {{-- Delivery --}}

                        <div
                            class="d-flex
                                   justify-content-between
                                   gap-3
                                   mb-3"
                        >

                            <span class="text-secondary">

                                Delivery

                            </span>


                            <span class="text-success">

                                FREE

                            </span>

                        </div>


                        {{-- Tax --}}

                        <div
                            class="d-flex
                                   justify-content-between
                                   gap-3
                                   mb-3"
                        >

                            <span class="text-secondary">

                                Taxes

                            </span>


                            <span class="text-secondary">

                                ₹{{ number_format($order['tax']) }}

                            </span>

                        </div>


                        <hr
                            class="border-warning-subtle"
                        >


                        {{-- Grand Total --}}

                        <div
                            class="d-flex
                                   align-items-center
                                   justify-content-between
                                   gap-3
                                   py-2
                                   mb-4"
                        >

                            <strong
                                class="font-serif
                                       h4
                                       text-pn-brown
                                       mb-0"
                            >

                                Payable Amount

                            </strong>


                            <strong
                                class="fs-3
                                       text-pn-primary"
                            >

                                ₹{{ number_format($order['total']) }}

                            </strong>

                        </div>


                        {{-- Delivery Address --}}

                        <div
                            class="border
                                   border-warning-subtle
                                   rounded-4
                                   bg-pn-cream
                                   p-4
                                   mb-4"
                        >

                            <div
                                class="d-flex
                                       align-items-start
                                       gap-3"
                            >

                                <i
                                    class="bi bi-geo-alt
                                           text-pn-primary
                                           fs-5"
                                ></i>


                                <div>

                                    <strong
                                        class="d-block
                                               small
                                               text-pn-brown
                                               mb-1"
                                    >

                                        Delivering To

                                    </strong>


                                    <span
                                        class="small
                                               fw-semibold
                                               text-pn-brown"
                                    >

                                        {{ $deliveryAddress['name'] }}

                                    </span>


                                    <small
                                        class="d-block
                                               text-secondary"
                                    >

                                        {{ $deliveryAddress['phone'] }}

                                    </small>


                                    <small
                                        class="d-block
                                               text-secondary
                                               mt-1"
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


                        {{-- Terms --}}

                        <div class="form-check mb-4">

                            <input
                                class="form-check-input"
                                type="checkbox"
                                id="paymentTerms"
                            >


                            <label
                                class="form-check-label
                                       small
                                       text-secondary"
                                for="paymentTerms"
                            >

                                I confirm that the order details
                                and delivery information are correct.

                            </label>

                        </div>


                        {{-- Pay Button --}}

                        <div class="d-grid">

                            <button
                                type="button"
                                id="payNowButton"
                                class="btn
                                       btn-pn
                                       btn-lg"
                            >

                                <i
                                    class="bi bi-lock-fill me-2"
                                ></i>

                                Pay ₹{{ number_format($order['total']) }}

                            </button>

                        </div>


                        <div
                            class="text-center
                                   mt-3"
                        >

                            <small
                                class="text-secondary"
                            >

                                <i
                                    class="bi bi-shield-check
                                           text-success
                                           me-1"
                                ></i>

                                Secure payment

                            </small>

                        </div>

                    </div>

                </aside>

            </div>

        </div>

    </div>

</section>


{{-- ============================================================
     PAYMENT TRUST SECTION
============================================================ --}}

<section class="py-5 bg-pn-cream">

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

                Safe & Secure

            </span>


            <h2
                class="font-serif
                       display-6
                       text-pn-brown
                       mt-2"
            >

                A simple and secure payment experience

            </h2>

        </div>


        <div
            class="row
                   row-cols-1
                   row-cols-sm-2
                   row-cols-lg-4
                   g-4"
        >

            <div class="col">

                <div
                    class="text-center
                           h-100"
                >

                    <div
                        class="rounded-circle
                               bg-white
                               text-pn-primary
                               d-flex
                               align-items-center
                               justify-content-center
                               mx-auto
                               mb-3"
                        style="width:58px;height:58px;"
                    >

                        <i
                            class="bi bi-shield-lock fs-5"
                        ></i>

                    </div>


                    <h3
                        class="font-serif
                               h5
                               text-pn-brown"
                    >

                        Secure Payment

                    </h3>


                    <p
                        class="small
                               text-secondary
                               mb-0"
                    >

                        Payment details are handled through the
                        configured payment process.

                    </p>

                </div>

            </div>


            <div class="col">

                <div
                    class="text-center
                           h-100"
                >

                    <div
                        class="rounded-circle
                               bg-white
                               text-pn-primary
                               d-flex
                               align-items-center
                               justify-content-center
                               mx-auto
                               mb-3"
                        style="width:58px;height:58px;"
                    >

                        <i
                            class="bi bi-credit-card fs-5"
                        ></i>

                    </div>


                    <h3
                        class="font-serif
                               h5
                               text-pn-brown"
                    >

                        Multiple Options

                    </h3>


                    <p
                        class="small
                               text-secondary
                               mb-0"
                    >

                        Choose the payment method available to you.

                    </p>

                </div>

            </div>


            <div class="col">

                <div
                    class="text-center
                           h-100"
                >

                    <div
                        class="rounded-circle
                               bg-white
                               text-pn-primary
                               d-flex
                               align-items-center
                               justify-content-center
                               mx-auto
                               mb-3"
                        style="width:58px;height:58px;"
                    >

                        <i
                            class="bi bi-check-circle fs-5"
                        ></i>

                    </div>


                    <h3
                        class="font-serif
                               h5
                               text-pn-brown"
                    >

                        Order Confirmation

                    </h3>


                    <p
                        class="small
                               text-secondary
                               mb-0"
                    >

                        A successful payment will lead to order
                        confirmation.

                    </p>

                </div>

            </div>


            <div class="col">

                <div
                    class="text-center
                           h-100"
                >

                    <div
                        class="rounded-circle
                               bg-white
                               text-pn-primary
                               d-flex
                               align-items-center
                               justify-content-center
                               mx-auto
                               mb-3"
                        style="width:58px;height:58px;"
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

                        Support

                    </h3>


                    <p
                        class="small
                               text-secondary
                               mb-0"
                    >

                        Assistance can be provided if you need help
                        with your order.

                    </p>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- ============================================================
     MINIMAL PAGE JS
============================================================ --}}

@push('scripts')

<script>
document.addEventListener('DOMContentLoaded', function () {

    const paymentMethods =
        document.querySelectorAll(
            'input[name="payment_method"]'
        );


    const upiDetails =
        document.getElementById(
            'upiPaymentDetails'
        );


    const cardDetails =
        document.getElementById(
            'cardPaymentDetails'
        );


    const netBankingDetails =
        document.getElementById(
            'netBankingDetails'
        );


    const codDetails =
        document.getElementById(
            'codDetails'
        );


    /*
    |--------------------------------------------------------------------------
    | Payment Method Visibility
    |--------------------------------------------------------------------------
    */

    function updatePaymentDetails() {

        const selected =
            document.querySelector(
                'input[name="payment_method"]:checked'
            );


        if (!selected) {
            return;
        }


        const method =
            selected.value;


        upiDetails?.classList.toggle(
            'd-none',
            method !== 'upi'
        );


        cardDetails?.classList.toggle(
            'd-none',
            method !== 'card'
        );


        netBankingDetails?.classList.toggle(
            'd-none',
            method !== 'netbanking'
        );


        codDetails?.classList.toggle(
            'd-none',
            method !== 'cod'
        );

    }


    paymentMethods.forEach(function (radio) {

        radio.addEventListener(
            'change',
            updatePaymentDetails
        );

    });


    updatePaymentDetails();


    /*
    |--------------------------------------------------------------------------
    | Terms Validation — UI Prototype
    |--------------------------------------------------------------------------
    */

    const terms =
        document.getElementById(
            'paymentTerms'
        );


    const payButton =
        document.getElementById(
            'payNowButton'
        );


    if (payButton) {

        payButton.addEventListener(
            'click',
            function () {

                if (
                    terms &&
                    !terms.checked
                ) {

                    terms.focus();

                    terms.classList.add(
                        'is-invalid'
                    );

                    return;

                }


                terms?.classList.remove(
                    'is-invalid'
                );


                /*
                |--------------------------------------------------------------------------
                | Payment gateway integration will be connected later.
                |--------------------------------------------------------------------------
                */

                const originalHTML =
                    this.innerHTML;


                this.innerHTML =
                    '<span class="spinner-border spinner-border-sm me-2"></span>' +
                    'Processing...';


                this.disabled = true;


                setTimeout(function () {

                    payButton.innerHTML =
                        originalHTML;

                    payButton.disabled =
                        false;

                }, 1500);

            }
        );

    }

});
</script>

@endpush

@endsection