@extends('layouts.app')

@section('title', 'Booking Payment Failed | Pooja Nilayam')

@section(
    'meta_description',
    'Your Pooja Nilayam payment could not be completed. Review the booking details and retry your payment.'
)

@section('content')

@php

    /*
    |--------------------------------------------------------------------------
    | TEMPORARY UI DATA
    |--------------------------------------------------------------------------
    | Frontend prototype only.
    | These values will later come from the booking/payment response.
    |--------------------------------------------------------------------------
    */

    $booking = [

        'booking_id' => 'PN202608110001',

        'reference_id' => 'REF-PN-8A72K4',

        'pooja' => 'Ganapathi Homam',

        'category' => 'Homam',

        'date' => '11 August 2026',

        'time' => '07:00 AM',

        'duration' => '60 Minutes',

        'location' => 'Hyderabad',

        'mode' => 'Online',

        'priest' => 'Sri Venkatesh Sharma',

        'amount' => '₹501',

        'devotee' => 'Mahendra Varma',

        'payment_method' => 'UPI',

        'error_code' => 'PAYMENT_FAILED'

    ];


    /*
    |--------------------------------------------------------------------------
    | Common Payment Failure Reasons
    |--------------------------------------------------------------------------
    */

    $failureReasons = [

        [
            'icon' => 'bi-credit-card-2-front',
            'title' => 'Payment could not be completed',
            'text' => 'The payment gateway was unable to complete the transaction.'
        ],

        [
            'icon' => 'bi-wifi-off',
            'title' => 'Connection interrupted',
            'text' => 'Your payment may have been interrupted because of a temporary connection issue.'
        ],

        [
            'icon' => 'bi-shield-exclamation',
            'title' => 'Bank or gateway declined the transaction',
            'text' => 'Your bank or payment provider may have declined the transaction.'
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
                        href="#"
                        class="text-pn-primary"
                    >
                        Poojas
                    </a>

                </li>


                <li class="breadcrumb-item">

                    <a
                        href="#"
                        class="text-pn-primary"
                    >
                        {{ $booking['pooja'] }}
                    </a>

                </li>


                <li
                    class="breadcrumb-item active"
                    aria-current="page"
                >
                    Booking Failed
                </li>

            </ol>

        </nav>

    </div>

</section>


{{-- ============================================================
     FAILURE HERO
============================================================ --}}

<section class="bg-pn-cream py-5">

    <div class="container">

        <div
            class="row
                   justify-content-center
                   text-center"
        >

            <div class="col-12 col-md-10 col-lg-8">


                {{-- Failure Icon --}}

                <div
                    class="mx-auto
                           rounded-circle
                           d-flex
                           align-items-center
                           justify-content-center
                           bg-danger-subtle
                           text-danger"
                    style="width:92px;height:92px;"
                >

                    <i
                        class="bi bi-x-lg"
                        style="font-size:2.75rem;"
                    ></i>

                </div>


                <span
                    class="badge
                           rounded-pill
                           bg-danger-subtle
                           text-danger-emphasis
                           px-3
                           py-2
                           mt-4"
                >

                    Payment Unsuccessful

                </span>


                <h1
                    class="font-serif
                           display-5
                           text-pn-brown
                           mt-3
                           mb-3"
                >

                    We Couldn't Complete Your Payment

                </h1>


                <p
                    class="lead
                           text-secondary
                           mb-2"
                >

                    Your payment for
                    <strong>{{ $booking['pooja'] }}</strong>
                    could not be completed.

                </p>


                <p
                    class="small
                           text-secondary
                           mb-0"
                >

                    Don't worry. You can retry the payment or cancel
                    the booking and return to the Pooja details.

                </p>

            </div>

        </div>

    </div>

</section>


{{-- ============================================================
     ACTIONS
============================================================ --}}

<section class="py-4 bg-white border-bottom">

    <div class="container">

        <div
            class="row
                   justify-content-center"
        >

            <div class="col-12 col-sm-10 col-md-8 col-lg-6">

                <div
                    class="d-grid
                           d-sm-flex
                           gap-2"
                >

                    {{-- Retry --}}

                    <a
                        href="#"
                        class="btn
                               btn-pn
                               btn-lg
                               flex-sm-fill"
                    >

                        <i
                            class="bi bi-arrow-repeat me-2"
                        ></i>

                        Retry Payment

                    </a>


                    {{-- Cancel --}}

                    <a
                        href="#"
                        class="btn
                               btn-pn-outline
                               btn-lg
                               flex-sm-fill"
                    >

                        <i
                            class="bi bi-x-circle me-2"
                        ></i>

                        Cancel Booking

                    </a>

                </div>


                <p
                    class="small
                           text-center
                           text-secondary
                           mt-3
                           mb-0"
                >

                    Retry the payment to continue with this booking.

                </p>

            </div>

        </div>

    </div>

</section>


{{-- ============================================================
     MAIN CONTENT
============================================================ --}}

<section class="py-5 bg-light-subtle">

    <div class="container">

        <div class="row g-4 align-items-start">


            {{-- =================================================
                 LEFT CONTENT
            ================================================= --}}

            <div class="col-12 col-lg-8">


                {{-- =================================================
                     PAYMENT ERROR
                ================================================= --}}

                <div
                    class="card
                           border
                           border-danger-subtle
                           rounded-4
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
                                       d-flex
                                       align-items-center
                                       justify-content-center
                                       bg-danger-subtle
                                       text-danger
                                       flex-shrink-0"
                                style="width:48px;height:48px;"
                            >

                                <i class="bi bi-exclamation-triangle fs-5"></i>

                            </div>


                            <div>

                                <span
                                    class="small
                                           text-danger
                                           fw-semibold
                                           text-uppercase"
                                >

                                    Payment Error

                                </span>


                                <h2
                                    class="font-serif
                                           h3
                                           text-pn-brown
                                           mt-1
                                           mb-2"
                                >

                                    Your payment was not successful

                                </h2>


                                <p
                                    class="text-secondary
                                           mb-3"
                                >

                                    The payment gateway could not complete
                                    your transaction. Your booking has not
                                    been confirmed.

                                </p>


                                <div
                                    class="alert
                                           alert-light
                                           border
                                           mb-0"
                                >

                                    <div
                                        class="d-flex
                                               justify-content-between
                                               gap-3"
                                    >

                                        <span
                                            class="small
                                                   text-secondary"
                                        >
                                            Payment Reference
                                        </span>


                                        <strong
                                            class="small"
                                        >

                                            {{ $booking['reference_id'] }}

                                        </strong>

                                    </div>


                                    <div
                                        class="d-flex
                                               justify-content-between
                                               gap-3
                                               mt-2"
                                    >

                                        <span
                                            class="small
                                                   text-secondary"
                                        >
                                            Error Code
                                        </span>


                                        <strong
                                            class="small
                                                   text-danger"
                                        >

                                            {{ $booking['error_code'] }}

                                        </strong>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>


                {{-- =================================================
                     POSSIBLE REASONS
                ================================================= --}}

                <div
                    class="card
                           border
                           border-warning-subtle
                           rounded-4
                           mb-4"
                >

                    <div class="card-body p-4 p-md-5">

                        <div class="mb-4">

                            <span
                                class="small
                                       text-pn-primary
                                       fw-semibold
                                       text-uppercase"
                            >

                                What Happened?

                            </span>


                            <h2
                                class="font-serif
                                       h3
                                       text-pn-brown
                                       mt-1
                                       mb-1"
                            >

                                Possible Reasons

                            </h2>


                            <p
                                class="small
                                       text-secondary
                                       mb-0"
                            >

                                A payment can fail for several reasons.
                                Please check the following before retrying.

                            </p>

                        </div>


                        <div class="row g-3">

                            @foreach($failureReasons as $reason)

                                <div class="col-12">

                                    <div
                                        class="border
                                               rounded-4
                                               p-3
                                               d-flex
                                               align-items-start
                                               gap-3"
                                    >

                                        <div
                                            class="rounded-circle
                                                   d-flex
                                                   align-items-center
                                                   justify-content-center
                                                   bg-pn-beige
                                                   text-pn-primary
                                                   flex-shrink-0"
                                            style="width:44px;height:44px;"
                                        >

                                            <i
                                                class="bi {{ $reason['icon'] }}"
                                            ></i>

                                        </div>


                                        <div>

                                            <h6
                                                class="fw-semibold
                                                       text-pn-brown
                                                       mb-1"
                                            >

                                                {{ $reason['title'] }}

                                            </h6>


                                            <p
                                                class="small
                                                       text-secondary
                                                       mb-0"
                                            >

                                                {{ $reason['text'] }}

                                            </p>

                                        </div>

                                    </div>

                                </div>

                            @endforeach

                        </div>

                    </div>

                </div>


                {{-- =================================================
                     BEFORE RETRY
                ================================================= --}}

                <div
                    class="card
                           border
                           border-warning-subtle
                           rounded-4
                           mb-4"
                >

                    <div class="card-body p-4 p-md-5">

                        <div class="mb-4">

                            <span
                                class="small
                                       text-pn-primary
                                       fw-semibold
                                       text-uppercase"
                            >

                                Before Retrying

                            </span>


                            <h2
                                class="font-serif
                                       h3
                                       text-pn-brown
                                       mt-1"
                            >

                                Please Check

                            </h2>

                        </div>


                        <div class="vstack gap-3">

                            <div
                                class="d-flex
                                       align-items-start
                                       gap-3"
                            >

                                <i
                                    class="bi bi-check-circle-fill
                                           text-pn-primary
                                           mt-1"
                                ></i>


                                <div>

                                    <strong
                                        class="d-block
                                               text-pn-brown"
                                    >

                                        Payment details

                                    </strong>


                                    <small
                                        class="text-secondary"
                                    >

                                        Make sure your selected payment
                                        method and details are correct.

                                    </small>

                                </div>

                            </div>


                            <div
                                class="d-flex
                                       align-items-start
                                       gap-3"
                            >

                                <i
                                    class="bi bi-check-circle-fill
                                           text-pn-primary
                                           mt-1"
                                ></i>


                                <div>

                                    <strong
                                        class="d-block
                                               text-pn-brown"
                                    >

                                        Bank / wallet balance

                                    </strong>


                                    <small
                                        class="text-secondary"
                                    >

                                        Confirm that your bank account,
                                        card or wallet is available for
                                        the transaction.

                                    </small>

                                </div>

                            </div>


                            <div
                                class="d-flex
                                       align-items-start
                                       gap-3"
                            >

                                <i
                                    class="bi bi-check-circle-fill
                                           text-pn-primary
                                           mt-1"
                                ></i>


                                <div>

                                    <strong
                                        class="d-block
                                               text-pn-brown"
                                    >

                                        Internet connection

                                    </strong>


                                    <small
                                        class="text-secondary"
                                    >

                                        Ensure you have a stable internet
                                        connection before retrying.

                                    </small>

                                </div>

                            </div>


                            <div
                                class="d-flex
                                       align-items-start
                                       gap-3"
                            >

                                <i
                                    class="bi bi-check-circle-fill
                                           text-pn-primary
                                           mt-1"
                                ></i>


                                <div>

                                    <strong
                                        class="d-block
                                               text-pn-brown"
                                    >

                                        Avoid refreshing during payment

                                    </strong>


                                    <small
                                        class="text-secondary"
                                    >

                                        Keep the payment window open until
                                        the gateway responds.

                                    </small>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>


                {{-- =================================================
                     BOOKING DETAILS
                ================================================= --}}

                <div
                    class="card
                           border
                           border-warning-subtle
                           rounded-4
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
                                       d-flex
                                       align-items-center
                                       justify-content-center
                                       bg-pn-beige
                                       text-pn-primary"
                                style="width:48px;height:48px;"
                            >

                                <i class="bi bi-flower1 fs-5"></i>

                            </div>


                            <div>

                                <span
                                    class="small
                                           text-pn-primary
                                           fw-semibold
                                           text-uppercase"
                                >

                                    Saved Booking Information

                                </span>


                                <h2
                                    class="font-serif
                                           h3
                                           text-pn-brown
                                           mb-0"
                                >

                                    {{ $booking['pooja'] }}

                                </h2>

                            </div>

                        </div>


                        <div class="row g-3">

                            <div class="col-12 col-sm-6">

                                <div
                                    class="border
                                           rounded-3
                                           p-3
                                           h-100"
                                >

                                    <small
                                        class="text-secondary
                                               d-block"
                                    >

                                        <i
                                            class="bi bi-calendar3
                                                   text-pn-primary
                                                   me-1"
                                        ></i>

                                        Date

                                    </small>


                                    <strong
                                        class="d-block
                                               mt-1
                                               text-pn-brown"
                                    >

                                        {{ $booking['date'] }}

                                    </strong>

                                </div>

                            </div>


                            <div class="col-12 col-sm-6">

                                <div
                                    class="border
                                           rounded-3
                                           p-3
                                           h-100"
                                >

                                    <small
                                        class="text-secondary
                                               d-block"
                                    >

                                        <i
                                            class="bi bi-clock
                                                   text-pn-primary
                                                   me-1"
                                        ></i>

                                        Time

                                    </small>


                                    <strong
                                        class="d-block
                                               mt-1
                                               text-pn-brown"
                                    >

                                        {{ $booking['time'] }}

                                    </strong>

                                </div>

                            </div>


                            <div class="col-12 col-sm-6">

                                <div
                                    class="border
                                           rounded-3
                                           p-3
                                           h-100"
                                >

                                    <small
                                        class="text-secondary
                                               d-block"
                                    >

                                        <i
                                            class="bi bi-person-check
                                                   text-pn-primary
                                                   me-1"
                                        ></i>

                                        Priest

                                    </small>


                                    <strong
                                        class="d-block
                                               mt-1
                                               text-pn-brown"
                                    >

                                        {{ $booking['priest'] }}

                                    </strong>

                                </div>

                            </div>


                            <div class="col-12 col-sm-6">

                                <div
                                    class="border
                                           rounded-3
                                           p-3
                                           h-100"
                                >

                                    <small
                                        class="text-secondary
                                               d-block"
                                    >

                                        <i
                                            class="bi bi-camera-video
                                                   text-pn-primary
                                                   me-1"
                                        ></i>

                                        Mode

                                    </small>


                                    <strong
                                        class="d-block
                                               mt-1
                                               text-pn-brown"
                                    >

                                        {{ $booking['mode'] }}

                                    </strong>

                                </div>

                            </div>


                            <div class="col-12 col-sm-6">

                                <div
                                    class="border
                                           rounded-3
                                           p-3
                                           h-100"
                                >

                                    <small
                                        class="text-secondary
                                               d-block"
                                    >

                                        <i
                                            class="bi bi-person
                                                   text-pn-primary
                                                   me-1"
                                        ></i>

                                        Devotee

                                    </small>


                                    <strong
                                        class="d-block
                                               mt-1
                                               text-pn-brown"
                                    >

                                        {{ $booking['devotee'] }}

                                    </strong>

                                </div>

                            </div>


                            <div class="col-12 col-sm-6">

                                <div
                                    class="border
                                           rounded-3
                                           p-3
                                           h-100"
                                >

                                    <small
                                        class="text-secondary
                                               d-block"
                                    >

                                        <i
                                            class="bi bi-credit-card
                                                   text-pn-primary
                                                   me-1"
                                        ></i>

                                        Payment Method

                                    </small>


                                    <strong
                                        class="d-block
                                               mt-1
                                               text-pn-brown"
                                    >

                                        {{ $booking['payment_method'] }}

                                    </strong>

                                </div>

                            </div>

                        </div>


                        <div
                            class="border-top
                                   mt-4
                                   pt-4
                                   d-flex
                                   align-items-center
                                   justify-content-between"
                        >

                            <span
                                class="text-secondary"
                            >
                                Attempted Amount
                            </span>


                            <strong
                                class="fs-4
                                       font-serif
                                       text-pn-brown"
                            >

                                {{ $booking['amount'] }}

                            </strong>

                        </div>

                    </div>

                </div>


                {{-- =================================================
                     SUPPORT
                ================================================= --}}

                <div
                    class="card
                           border
                           border-warning-subtle
                           rounded-4"
                >

                    <div class="card-body p-4 p-md-5">

                        <div
                            class="d-flex
                                   align-items-start
                                   gap-3"
                        >

                            <div
                                class="rounded-circle
                                       d-flex
                                       align-items-center
                                       justify-content-center
                                       bg-pn-beige
                                       text-pn-primary
                                       flex-shrink-0"
                                style="width:48px;height:48px;"
                            >

                                <i
                                    class="bi bi-headset fs-5"
                                ></i>

                            </div>


                            <div>

                                <span
                                    class="small
                                           text-pn-primary
                                           fw-semibold
                                           text-uppercase"
                                >

                                    Need Assistance?

                                </span>


                                <h2
                                    class="font-serif
                                           h3
                                           text-pn-brown
                                           mt-1
                                           mb-2"
                                >

                                    We're Here to Help

                                </h2>


                                <p
                                    class="text-secondary"
                                >

                                    If your payment continues to fail,
                                    contact Pooja Nilayam support with
                                    your Booking ID or Reference ID.

                                </p>


                                <div
                                    class="d-flex
                                           flex-wrap
                                           gap-2
                                           mb-3"
                                >

                                    <span
                                        class="badge
                                               bg-light
                                               text-secondary
                                               border"
                                    >

                                        Booking ID:
                                        {{ $booking['booking_id'] }}

                                    </span>


                                    <span
                                        class="badge
                                               bg-light
                                               text-secondary
                                               border"
                                    >

                                        Reference:
                                        {{ $booking['reference_id'] }}

                                    </span>

                                </div>


                                <a
                                    href="#"
                                    class="btn btn-pn-outline"
                                >

                                    <i
                                        class="bi bi-headset me-2"
                                    ></i>

                                    Contact Support

                                </a>

                            </div>

                        </div>

                    </div>

                </div>

            </div>


            {{-- =================================================
                 RIGHT SIDEBAR
            ================================================= --}}

            <div class="col-12 col-lg-4">

                <div
                    class="position-sticky"
                    style="top:100px;"
                >


                    {{-- Payment Status --}}

                    <div
                        class="card
                               border
                               border-danger-subtle
                               rounded-4
                               mb-3"
                    >

                        <div class="card-body p-4">

                            <div
                                class="text-center"
                            >

                                <div
                                    class="mx-auto
                                           rounded-circle
                                           d-flex
                                           align-items-center
                                           justify-content-center
                                           bg-danger-subtle
                                           text-danger"
                                    style="width:60px;height:60px;"
                                >

                                    <i
                                        class="bi bi-x-lg fs-4"
                                    ></i>

                                </div>


                                <h5
                                    class="font-serif
                                           text-pn-brown
                                           mt-3"
                                >

                                    Payment Failed

                                </h5>


                                <p
                                    class="small
                                           text-secondary
                                           mb-0"
                                >

                                    The booking has not been confirmed.

                                </p>

                            </div>

                        </div>

                    </div>


                    {{-- Booking Summary --}}

                    <div
                        class="card
                               border
                               border-warning-subtle
                               rounded-4
                               mb-3"
                    >

                        <div class="card-body p-4">

                            <h3
                                class="font-serif
                                       h4
                                       text-pn-brown
                                       mb-4"
                            >

                                Booking Summary

                            </h3>


                            <div
                                class="d-flex
                                       align-items-center
                                       gap-3
                                       mb-4"
                            >

                                <div
                                    class="rounded-3
                                           d-flex
                                           align-items-center
                                           justify-content-center
                                           bg-pn-beige
                                           text-pn-primary
                                           fs-4"
                                    style="width:64px;height:64px;"
                                >

                                    <i class="bi bi-flower1"></i>

                                </div>


                                <div>

                                    <h6
                                        class="fw-semibold
                                               text-pn-brown
                                               mb-1"
                                    >

                                        {{ $booking['pooja'] }}

                                    </h6>


                                    <small
                                        class="text-secondary"
                                    >

                                        {{ $booking['category'] }}

                                    </small>

                                </div>

                            </div>


                            <div
                                class="d-flex
                                       justify-content-between
                                       mb-3"
                            >

                                <span class="small text-secondary">
                                    Date
                                </span>


                                <strong class="small">

                                    {{ $booking['date'] }}

                                </strong>

                            </div>


                            <div
                                class="d-flex
                                       justify-content-between
                                       mb-3"
                            >

                                <span class="small text-secondary">
                                    Time
                                </span>


                                <strong class="small">

                                    {{ $booking['time'] }}

                                </strong>

                            </div>


                            <div
                                class="d-flex
                                       justify-content-between
                                       mb-3"
                            >

                                <span class="small text-secondary">
                                    Priest
                                </span>


                                <strong
                                    class="small
                                           text-end"
                                >

                                    {{ $booking['priest'] }}

                                </strong>

                            </div>


                            <div
                                class="d-flex
                                       justify-content-between
                                       mb-3"
                            >

                                <span class="small text-secondary">
                                    Amount
                                </span>


                                <strong class="small">

                                    {{ $booking['amount'] }}

                                </strong>

                            </div>


                            <hr
                                class="border-warning-subtle"
                            >


                            <a
                                href="#"
                                class="btn
                                       btn-pn
                                       w-100"
                            >

                                <i
                                    class="bi bi-arrow-repeat me-2"
                                ></i>

                                Retry Payment

                            </a>

                        </div>

                    </div>


                    {{-- Cancellation --}}

                    <div
                        class="card
                               border
                               border-warning-subtle
                               rounded-4"
                    >

                        <div class="card-body p-4">

                            <h6
                                class="fw-semibold
                                       text-pn-brown"
                            >

                                Don't want to retry?

                            </h6>


                            <p
                                class="small
                                       text-secondary"
                            >

                                You can cancel this payment attempt
                                and return to the Pooja details.

                            </p>


                            <a
                                href="#"
                                class="btn
                                       btn-light
                                       border
                                       w-100"
                            >

                                Cancel & Return

                            </a>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- ============================================================
     FINAL HELP CTA
============================================================ --}}

<section class="py-5">

    <div class="container">

        <div
            class="bg-pn-cream
                   border
                   border-warning-subtle
                   rounded-5
                   text-center
                   p-4
                   p-md-5"
        >

            <i
                class="bi bi-flower1
                       display-5
                       text-pn-primary"
            ></i>


            <h2
                class="font-serif
                       display-6
                       text-pn-brown
                       mt-3"
            >

                Your booking can still continue.

            </h2>


            <p
                class="text-secondary
                       col-lg-7
                       mx-auto"
            >

                Retry your payment to continue with the selected
                Pooja, date and time, or cancel and choose another
                Pooja or schedule.

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
                    class="btn btn-pn px-4"
                >

                    Retry Payment

                    <i
                        class="bi bi-arrow-repeat ms-2"
                    ></i>

                </a>


                <a
                    href="#"
                    class="btn btn-pn-outline px-4"
                >

                    Explore Other Poojas

                    <i
                        class="bi bi-arrow-right ms-2"
                    ></i>

                </a>

            </div>

        </div>

    </div>

</section>

@endsection