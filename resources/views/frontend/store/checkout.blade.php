@extends('layouts.app')

@section('title', 'Checkout | Pooja Nilayam')

@section(
    'meta_description',
    'Complete your Pooja Nilayam order with secure checkout and delivery details.'
)

@section('content')

@php

    /*
    |--------------------------------------------------------------------------
    | TEMPORARY CHECKOUT DATA
    |--------------------------------------------------------------------------
    | UI prototype only.
    |
    | Actual customer details, addresses, cart values, delivery
    | charges, discounts and payment options will be connected
    | through controllers/models later.
    |--------------------------------------------------------------------------
    */

    $customer = [

        'name' => '',
        'email' => '',
        'phone' => ''

    ];


    $addresses = [

        [
            'id' => 1,
            'type' => 'Home',
            'name' => 'Mahendra Varma',
            'phone' => '+91 XXXXX XXXXX',
            'address' => 'Your saved address will appear here',
            'city' => 'Hyderabad',
            'state' => 'Telangana',
            'pincode' => '500000',
            'selected' => true
        ]

    ];


    $cartItems = [

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


    $subtotal = collect($cartItems)->sum(
        fn ($item) => $item['price'] * $item['quantity']
    );

    $discount = 100;

    $delivery = 0;

    $tax = 0;

    $total = $subtotal - $discount + $delivery + $tax;

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
                        Cart
                    </a>

                </li>


                <li
                    class="breadcrumb-item active"
                    aria-current="page"
                >

                    Checkout

                </li>

            </ol>

        </nav>

    </div>

</section>


{{-- ============================================================
     CHECKOUT HEADER
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

                    Secure Checkout

                </span>


                <h1
                    class="font-serif
                           display-4
                           text-pn-brown
                           mt-2
                           mb-3"
                >

                    Complete your order

                </h1>


                <p
                    class="lead
                           text-secondary
                           mb-0"
                >

                    Confirm your contact details, delivery address
                    and order before proceeding to payment.

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

                    2

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
                class="bg-secondary-subtle
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
                           border
                           border-secondary
                           text-secondary
                           d-inline-flex
                           align-items-center
                           justify-content-center"
                    style="width:34px;height:34px;"
                >

                    3

                </span>


                <small
                    class="text-secondary
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
     CHECKOUT CONTENT
============================================================ --}}

<section class="py-5">

    <div class="container">

        <div class="row g-4 g-xl-5">

            {{-- ====================================================
                 LEFT — CUSTOMER & DELIVERY
            ===================================================== --}}

            <div class="col-12 col-lg-7">

                {{-- ==================================================
                     CONTACT INFORMATION
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

                                    Step 1

                                </span>


                                <h2
                                    class="font-serif
                                           h3
                                           text-pn-brown
                                           mt-1
                                           mb-1"
                                >

                                    Contact Information

                                </h2>


                                <p
                                    class="small
                                           text-secondary
                                           mb-0"
                                >

                                    Enter the details we can use
                                    for order communication.

                                </p>

                            </div>


                            <i
                                class="bi bi-person-circle
                                       text-pn-primary
                                       fs-3"
                            ></i>

                        </div>


                        <div class="row g-3">

                            {{-- Name --}}

                            <div class="col-12">

                                <label
                                    for="customerName"
                                    class="form-label
                                           small
                                           fw-semibold
                                           text-pn-brown"
                                >

                                    Full Name
                                    <span class="text-danger">*</span>

                                </label>


                                <input
                                    type="text"
                                    id="customerName"
                                    name="name"
                                    class="form-control form-control-lg"
                                    value="{{ $customer['name'] }}"
                                    placeholder="Enter your full name"
                                    autocomplete="name"
                                    required
                                >

                            </div>


                            {{-- Email --}}

                            <div class="col-12 col-sm-6">

                                <label
                                    for="customerEmail"
                                    class="form-label
                                           small
                                           fw-semibold
                                           text-pn-brown"
                                >

                                    Email Address
                                    <span class="text-danger">*</span>

                                </label>


                                <input
                                    type="email"
                                    id="customerEmail"
                                    name="email"
                                    class="form-control form-control-lg"
                                    value="{{ $customer['email'] }}"
                                    placeholder="you@example.com"
                                    autocomplete="email"
                                    required
                                >

                            </div>


                            {{-- Phone --}}

                            <div class="col-12 col-sm-6">

                                <label
                                    for="customerPhone"
                                    class="form-label
                                           small
                                           fw-semibold
                                           text-pn-brown"
                                >

                                    Mobile Number
                                    <span class="text-danger">*</span>

                                </label>


                                <div class="input-group input-group-lg">

                                    <span class="input-group-text">

                                        +91

                                    </span>


                                    <input
                                        type="tel"
                                        id="customerPhone"
                                        name="phone"
                                        class="form-control"
                                        value="{{ $customer['phone'] }}"
                                        placeholder="Enter mobile number"
                                        autocomplete="tel"
                                        required
                                    >

                                </div>

                            </div>

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

                                    Step 2

                                </span>


                                <h2
                                    class="font-serif
                                           h3
                                           text-pn-brown
                                           mt-1
                                           mb-1"
                                >

                                    Delivery Address

                                </h2>


                                <p
                                    class="small
                                           text-secondary
                                           mb-0"
                                >

                                    Where should we deliver your order?

                                </p>

                            </div>


                            <i
                                class="bi bi-geo-alt
                                       text-pn-primary
                                       fs-3"
                            ></i>

                        </div>


                        {{-- Saved Address --}}

                        @foreach($addresses as $address)

                            <div class="mb-4">

                                <input
                                    type="radio"
                                    class="btn-check"
                                    name="delivery_address"
                                    id="address{{ $address['id'] }}"
                                    value="{{ $address['id'] }}"
                                    @checked($address['selected'])
                                >


                                <label
                                    for="address{{ $address['id'] }}"
                                    class="border
                                           border-warning-subtle
                                           rounded-4
                                           p-4
                                           w-100
                                           text-start"
                                    style="cursor:pointer;"
                                >

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
                                            style="width:48px;height:48px;"
                                        >

                                            <i
                                                class="bi bi-house"
                                            ></i>

                                        </div>


                                        <div class="flex-grow-1">

                                            <div
                                                class="d-flex
                                                       align-items-center
                                                       justify-content-between
                                                       gap-3"
                                            >

                                                <div>

                                                    <strong
                                                        class="text-pn-brown"
                                                    >

                                                        {{ $address['type'] }}

                                                    </strong>


                                                    @if($address['selected'])

                                                        <span
                                                            class="badge
                                                                   bg-success-subtle
                                                                   text-success
                                                                   rounded-pill
                                                                   ms-2"
                                                        >

                                                            Selected

                                                        </span>

                                                    @endif

                                                </div>


                                                <span
                                                    class="rounded-circle
                                                           border
                                                           border-secondary"
                                                    style="width:20px;height:20px;"
                                                ></span>

                                            </div>


                                            <div class="mt-2">

                                                <strong
                                                    class="d-block
                                                           small
                                                           text-pn-brown"
                                                >

                                                    {{ $address['name'] }}

                                                </strong>


                                                <small
                                                    class="text-secondary
                                                           d-block"
                                                >

                                                    {{ $address['phone'] }}

                                                </small>


                                                <small
                                                    class="text-secondary
                                                           d-block
                                                           mt-1"
                                                >

                                                    {{ $address['address'] }}

                                                </small>


                                                <small
                                                    class="text-secondary"
                                                >

                                                    {{ $address['city'] }},
                                                    {{ $address['state'] }}
                                                    -
                                                    {{ $address['pincode'] }}

                                                </small>

                                            </div>

                                        </div>

                                    </div>

                                </label>

                            </div>

                        @endforeach


                        {{-- Add New Address --}}

                        <button
                            type="button"
                            class="btn
                                   btn-pn-outline
                                   w-100"
                            data-bs-toggle="collapse"
                            data-bs-target="#newAddressForm"
                            aria-expanded="false"
                            aria-controls="newAddressForm"
                        >

                            <i
                                class="bi bi-plus-circle me-2"
                            ></i>

                            Add New Address

                        </button>


                        {{-- New Address Form --}}

                        <div
                            class="collapse
                                   mt-4"
                            id="newAddressForm"
                        >

                            <div
                                class="border
                                       border-warning-subtle
                                       rounded-4
                                       bg-pn-cream
                                       p-4"
                            >

                                <h3
                                    class="font-serif
                                           h4
                                           text-pn-brown
                                           mb-4"
                                >

                                    Add New Address

                                </h3>


                                <div class="row g-3">

                                    <div class="col-12">

                                        <label
                                            for="newAddressName"
                                            class="form-label small fw-semibold"
                                        >

                                            Address Name

                                        </label>


                                        <input
                                            type="text"
                                            id="newAddressName"
                                            class="form-control"
                                            placeholder="Home / Office"
                                        >

                                    </div>


                                    <div class="col-12">

                                        <label
                                            for="newAddressLine"
                                            class="form-label small fw-semibold"
                                        >

                                            Address

                                        </label>


                                        <textarea
                                            id="newAddressLine"
                                            class="form-control"
                                            rows="3"
                                            placeholder="House / Flat number, street, area"
                                        ></textarea>

                                    </div>


                                    <div class="col-12 col-sm-6">

                                        <label
                                            for="newAddressCity"
                                            class="form-label small fw-semibold"
                                        >

                                            City

                                        </label>


                                        <input
                                            type="text"
                                            id="newAddressCity"
                                            class="form-control"
                                            placeholder="City"
                                        >

                                    </div>


                                    <div class="col-12 col-sm-6">

                                        <label
                                            for="newAddressState"
                                            class="form-label small fw-semibold"
                                        >

                                            State

                                        </label>


                                        <select
                                            id="newAddressState"
                                            class="form-select"
                                        >

                                            <option selected>
                                                Select State
                                            </option>

                                            <option>
                                                Telangana
                                            </option>

                                            <option>
                                                Andhra Pradesh
                                            </option>

                                            <option>
                                                Karnataka
                                            </option>

                                            <option>
                                                Tamil Nadu
                                            </option>

                                        </select>

                                    </div>


                                    <div class="col-12 col-sm-6">

                                        <label
                                            for="newAddressPincode"
                                            class="form-label small fw-semibold"
                                        >

                                            Pincode

                                        </label>


                                        <input
                                            type="text"
                                            id="newAddressPincode"
                                            class="form-control"
                                            placeholder="Pincode"
                                            inputmode="numeric"
                                        >

                                    </div>


                                    <div class="col-12 col-sm-6">

                                        <label
                                            for="newAddressPhone"
                                            class="form-label small fw-semibold"
                                        >

                                            Contact Number

                                        </label>


                                        <input
                                            type="tel"
                                            id="newAddressPhone"
                                            class="form-control"
                                            placeholder="Mobile number"
                                        >

                                    </div>


                                    <div class="col-12">

                                        <div class="form-check">

                                            <input
                                                class="form-check-input"
                                                type="checkbox"
                                                id="saveAddress"
                                            >


                                            <label
                                                class="form-check-label small"
                                                for="saveAddress"
                                            >

                                                Save this address for future orders

                                            </label>

                                        </div>

                                    </div>


                                    <div class="col-12">

                                        <button
                                            type="button"
                                            class="btn btn-pn"
                                        >

                                            Save Address

                                        </button>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>


                {{-- ==================================================
                     DELIVERY INFORMATION
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
                                style="width:48px;height:48px;"
                            >

                                <i class="bi bi-truck"></i>

                            </div>


                            <div>

                                <h2
                                    class="font-serif
                                           h4
                                           text-pn-brown
                                           mb-1"
                                >

                                    Delivery Information

                                </h2>


                                <p
                                    class="small
                                           text-secondary
                                           mb-3"
                                >

                                    Delivery availability and charges
                                    will be confirmed based on your
                                    delivery location.

                                </p>


                                <div
                                    class="alert
                                           alert-success
                                           rounded-4
                                           mb-0"
                                >

                                    <div
                                        class="d-flex
                                               align-items-start
                                               gap-2"
                                    >

                                        <i
                                            class="bi bi-check-circle-fill"
                                        ></i>


                                        <small>

                                            Estimated delivery details
                                            will be displayed once the
                                            delivery address is confirmed.

                                        </small>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>


                {{-- ==================================================
                     ORDER NOTES
                =================================================== --}}

                <div
                    class="card
                           border
                           border-warning-subtle
                           rounded-5"
                >

                    <div class="card-body p-4 p-md-5">

                        <h2
                            class="font-serif
                                   h4
                                   text-pn-brown
                                   mb-3"
                        >

                            Order Notes

                        </h2>


                        <p
                            class="small
                                   text-secondary"
                        >

                            Optional instructions for your order.

                        </p>


                        <textarea
                            class="form-control"
                            rows="4"
                            name="order_notes"
                            placeholder="Add any special instructions..."
                        ></textarea>

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

                            Your Order

                        </h2>


                        {{-- Cart Products --}}

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
                                            style="width:64px;height:64px;"
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

                                            {{ $item['category'] }}

                                        </small>

                                    </div>


                                    <strong
                                        class="small
                                               text-pn-brown"
                                    >

                                        ₹{{ number_format(
                                            $item['price'] * $item['quantity']
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

                                ₹{{ number_format($subtotal) }}

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

                                - ₹{{ number_format($discount) }}

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


                        {{-- Taxes --}}

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

                                ₹{{ number_format($tax) }}

                            </span>

                        </div>


                        <hr
                            class="border-warning-subtle"
                        >


                        {{-- Total --}}

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

                                Order Total

                            </strong>


                            <strong
                                class="fs-3
                                       text-pn-primary"
                            >

                                ₹{{ number_format($total) }}

                            </strong>

                        </div>


                        {{-- Coupon --}}

                        <div class="mb-4">

                            <label
                                for="checkoutCoupon"
                                class="form-label
                                       small
                                       fw-semibold
                                       text-pn-brown"
                            >

                                Coupon Code

                            </label>


                            <div class="input-group">

                                <input
                                    type="text"
                                    id="checkoutCoupon"
                                    class="form-control"
                                    placeholder="Enter coupon code"
                                >


                                <button
                                    type="button"
                                    class="btn
                                           btn-outline-secondary"
                                >

                                    Apply

                                </button>

                            </div>

                        </div>


                        {{-- Continue Payment --}}

                        <div class="d-grid">

                            <a
                                href="#"
                                class="btn
                                       btn-pn
                                       btn-lg"
                            >

                                Continue to Payment

                                <i
                                    class="bi bi-arrow-right ms-2"
                                ></i>

                            </a>

                        </div>


                        {{-- Secure Checkout --}}

                        <div
                            class="border
                                   border-warning-subtle
                                   rounded-4
                                   bg-pn-cream
                                   p-3
                                   mt-4"
                        >

                            <div
                                class="d-flex
                                       align-items-start
                                       gap-2"
                            >

                                <i
                                    class="bi bi-shield-lock
                                           text-pn-primary
                                           fs-5"
                                ></i>


                                <div>

                                    <strong
                                        class="small
                                               d-block
                                               text-pn-brown"
                                    >

                                        Secure Checkout

                                    </strong>


                                    <small
                                        class="text-secondary"
                                    >

                                        Your information is protected
                                        during checkout.

                                    </small>

                                </div>

                            </div>

                        </div>

                    </div>

                </aside>

            </div>

        </div>

    </div>

</section>


{{-- ============================================================
     CHECKOUT INFORMATION
============================================================ --}}

<section class="py-5 bg-pn-cream">

    <div class="container">

        <div
            class="row
                   row-cols-1
                   row-cols-md-3
                   g-4"
        >

            <div class="col">

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
                        style="width:50px;height:50px;"
                    >

                        <i class="bi bi-shield-check fs-5"></i>

                    </div>


                    <div>

                        <strong
                            class="d-block
                                   text-pn-brown"
                        >

                            Secure Checkout

                        </strong>


                        <small class="text-secondary">

                            Your checkout information is handled
                            securely.

                        </small>

                    </div>

                </div>

            </div>


            <div class="col">

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
                        style="width:50px;height:50px;"
                    >

                        <i class="bi bi-truck fs-5"></i>

                    </div>


                    <div>

                        <strong
                            class="d-block
                                   text-pn-brown"
                        >

                            Reliable Delivery

                        </strong>


                        <small class="text-secondary">

                            Delivery details are confirmed before
                            payment.

                        </small>

                    </div>

                </div>

            </div>


            <div class="col">

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
                        style="width:50px;height:50px;"
                    >

                        <i class="bi bi-headset fs-5"></i>

                    </div>


                    <div>

                        <strong
                            class="d-block
                                   text-pn-brown"
                        >

                            Need Help?

                        </strong>


                        <small class="text-secondary">

                            Customer support can assist with your
                            shopping experience.

                        </small>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

@endsection