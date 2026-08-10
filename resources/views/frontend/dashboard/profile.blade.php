@extends('layouts.app')

@section('title', 'My Profile | Pooja Nilayam')

@section(
    'meta_description',
    'View and manage your Pooja Nilayam profile information.'
)

@section('content')

@php

    /*
    |--------------------------------------------------------------------------
    | TEMPORARY UI DATA
    |--------------------------------------------------------------------------
    | These values will later come from the authenticated user.
    |--------------------------------------------------------------------------
    */

    $user = [
        'name' => 'Mahendra Varma',
        'email' => 'customer@example.com',
        'mobile' => '+91 XXXXX XXXXX',
        'gender' => 'Prefer not to say',
        'date_of_birth' => 'Not provided',
        'member_since' => 'August 2026',
        'initials' => 'MV'
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
                        My Dashboard
                    </a>

                </li>


                <li
                    class="breadcrumb-item active"
                    aria-current="page"
                >
                    My Profile
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
                    My Profile
                </h1>


                <p
                    class="text-secondary
                           mb-0"
                >
                    View your personal information and account
                    details.
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

                    <i class="bi bi-pencil-square me-2"></i>

                    Edit Profile

                </a>

            </div>

        </div>

    </div>

</section>


{{-- ============================================================
     PROFILE CONTENT
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
                                   active
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
                 MAIN PROFILE
            ===================================================== --}}

            <div class="col-12 col-lg-9">

                {{-- ==================================================
                     PROFILE OVERVIEW
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
                                   flex-column
                                   flex-sm-row
                                   align-items-sm-center
                                   justify-content-between
                                   gap-4
                                   mb-5"
                        >

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
                                    style="width:82px;height:82px;"
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
                                        Profile
                                    </span>


                                    <h2
                                        class="font-serif
                                               h3
                                               text-pn-brown
                                               mt-1
                                               mb-1"
                                    >
                                        {{ $user['name'] }}
                                    </h2>


                                    <small
                                        class="text-secondary"
                                    >
                                        Member since
                                        {{ $user['member_since'] }}
                                    </small>

                                </div>

                            </div>


                            <div>

                                <span
                                    class="badge
                                           bg-success-subtle
                                           text-success
                                           rounded-pill
                                           px-3
                                           py-2"
                                >

                                    <i
                                        class="bi bi-check-circle me-1"
                                    ></i>

                                    Account Active

                                </span>

                            </div>

                        </div>


                        {{-- Profile Information --}}

                        <div
                            class="row
                                   row-cols-1
                                   row-cols-md-2
                                   g-3"
                        >

                            {{-- Full Name --}}

                            <div class="col">

                                <div
                                    class="border
                                           border-warning-subtle
                                           rounded-4
                                           p-4
                                           h-100"
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
                                            style="width:44px;height:44px;"
                                        >

                                            <i
                                                class="bi bi-person"
                                            ></i>

                                        </div>


                                        <div>

                                            <small
                                                class="text-secondary
                                                       d-block
                                                       mb-1"
                                            >
                                                Full Name
                                            </small>


                                            <strong
                                                class="text-pn-brown"
                                            >
                                                {{ $user['name'] }}
                                            </strong>

                                        </div>

                                    </div>

                                </div>

                            </div>


                            {{-- Email --}}

                            <div class="col">

                                <div
                                    class="border
                                           border-warning-subtle
                                           rounded-4
                                           p-4
                                           h-100"
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
                                            style="width:44px;height:44px;"
                                        >

                                            <i
                                                class="bi bi-envelope"
                                            ></i>

                                        </div>


                                        <div class="min-w-0">

                                            <small
                                                class="text-secondary
                                                       d-block
                                                       mb-1"
                                            >
                                                Email Address
                                            </small>


                                            <strong
                                                class="text-pn-brown
                                                       text-break"
                                            >
                                                {{ $user['email'] }}
                                            </strong>

                                        </div>

                                    </div>

                                </div>

                            </div>


                            {{-- Mobile --}}

                            <div class="col">

                                <div
                                    class="border
                                           border-warning-subtle
                                           rounded-4
                                           p-4
                                           h-100"
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
                                            style="width:44px;height:44px;"
                                        >

                                            <i
                                                class="bi bi-phone"
                                            ></i>

                                        </div>


                                        <div>

                                            <small
                                                class="text-secondary
                                                       d-block
                                                       mb-1"
                                            >
                                                Mobile Number
                                            </small>


                                            <strong
                                                class="text-pn-brown"
                                            >
                                                {{ $user['mobile'] }}
                                            </strong>

                                        </div>

                                    </div>

                                </div>

                            </div>


                            {{-- Gender --}}

                            <div class="col">

                                <div
                                    class="border
                                           border-warning-subtle
                                           rounded-4
                                           p-4
                                           h-100"
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
                                            style="width:44px;height:44px;"
                                        >

                                            <i
                                                class="bi bi-person-badge"
                                            ></i>

                                        </div>


                                        <div>

                                            <small
                                                class="text-secondary
                                                       d-block
                                                       mb-1"
                                            >
                                                Gender
                                            </small>


                                            <strong
                                                class="text-pn-brown"
                                            >
                                                {{ $user['gender'] }}
                                            </strong>

                                        </div>

                                    </div>

                                </div>

                            </div>


                            {{-- Date of Birth --}}

                            <div class="col">

                                <div
                                    class="border
                                           border-warning-subtle
                                           rounded-4
                                           p-4
                                           h-100"
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
                                            style="width:44px;height:44px;"
                                        >

                                            <i
                                                class="bi bi-calendar3"
                                            ></i>

                                        </div>


                                        <div>

                                            <small
                                                class="text-secondary
                                                       d-block
                                                       mb-1"
                                            >
                                                Date of Birth
                                            </small>


                                            <strong
                                                class="text-pn-brown"
                                            >
                                                {{ $user['date_of_birth'] }}
                                            </strong>

                                        </div>

                                    </div>

                                </div>

                            </div>


                            {{-- Member Since --}}

                            <div class="col">

                                <div
                                    class="border
                                           border-warning-subtle
                                           rounded-4
                                           p-4
                                           h-100"
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
                                            style="width:44px;height:44px;"
                                        >

                                            <i
                                                class="bi bi-calendar-check"
                                            ></i>

                                        </div>


                                        <div>

                                            <small
                                                class="text-secondary
                                                       d-block
                                                       mb-1"
                                            >
                                                Member Since
                                            </small>


                                            <strong
                                                class="text-pn-brown"
                                            >
                                                {{ $user['member_since'] }}
                                            </strong>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>


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
                                    Contact
                                </span>


                                <h2
                                    class="font-serif
                                           h3
                                           text-pn-brown
                                           mt-1
                                           mb-0"
                                >
                                    Contact Information
                                </h2>

                            </div>


                            <a
                                href="#"
                                class="btn
                                       btn-sm
                                       btn-pn-outline"
                            >

                                <i
                                    class="bi bi-pencil me-1"
                                ></i>

                                Edit

                            </a>

                        </div>


                        <div
                            class="alert
                                   bg-pn-cream
                                   border-0
                                   rounded-4
                                   d-flex
                                   align-items-start
                                   gap-3"
                        >

                            <i
                                class="bi bi-info-circle
                                       text-pn-primary
                                       mt-1"
                            ></i>


                            <small class="text-secondary">

                                Keeping your email address and mobile
                                number updated helps us send important
                                booking, order and payment
                                notifications.

                            </small>

                        </div>


                        <div
                            class="row
                                   row-cols-1
                                   row-cols-md-2
                                   g-4"
                        >

                            <div class="col">

                                <label
                                    class="form-label
                                           small
                                           text-secondary"
                                >
                                    Email Address
                                </label>


                                <div
                                    class="form-control
                                           bg-light
                                           py-3"
                                >

                                    {{ $user['email'] }}

                                </div>

                            </div>


                            <div class="col">

                                <label
                                    class="form-label
                                           small
                                           text-secondary"
                                >
                                    Mobile Number
                                </label>


                                <div
                                    class="form-control
                                           bg-light
                                           py-3"
                                >

                                    {{ $user['mobile'] }}

                                </div>

                            </div>

                        </div>

                    </div>

                </div>


                {{-- ==================================================
                     ACCOUNT SECURITY
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
                                       bg-pn-cream
                                       text-pn-primary
                                       d-flex
                                       align-items-center
                                       justify-content-center
                                       flex-shrink-0"
                                style="width:52px;height:52px;"
                            >

                                <i
                                    class="bi bi-shield-lock fs-5"
                                ></i>

                            </div>


                            <div>

                                <span
                                    class="small
                                           text-pn-gold
                                           fw-semibold
                                           text-uppercase"
                                >
                                    Account Security
                                </span>


                                <h2
                                    class="font-serif
                                           h3
                                           text-pn-brown
                                           mt-1
                                           mb-2"
                                >
                                    Keep your account secure
                                </h2>


                                <p
                                    class="small
                                           text-secondary
                                           mb-0"
                                >
                                    Manage your password and protect
                                    access to your Pooja Nilayam
                                    account.
                                </p>

                            </div>

                        </div>


                        <div
                            class="row
                                   row-cols-1
                                   row-cols-md-2
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
                                               p-4
                                               h-100"
                                    >

                                        <div
                                            class="d-flex
                                                   align-items-center
                                                   justify-content-between
                                                   gap-3"
                                        >

                                            <div>

                                                <strong
                                                    class="d-block
                                                           text-pn-brown
                                                           mb-1"
                                                >
                                                    Change Password
                                                </strong>


                                                <small
                                                    class="text-secondary"
                                                >
                                                    Update your account
                                                    password.
                                                </small>

                                            </div>


                                            <i
                                                class="bi bi-chevron-right
                                                       text-pn-primary"
                                            ></i>

                                        </div>

                                    </div>

                                </a>

                            </div>


                            <div class="col">

                                <div
                                    class="border
                                           border-warning-subtle
                                           rounded-4
                                           p-4
                                           h-100"
                                >

                                    <div
                                        class="d-flex
                                               align-items-center
                                               gap-3"
                                    >

                                        <div
                                            class="rounded-circle
                                                   bg-success-subtle
                                                   text-success
                                                   d-flex
                                                   align-items-center
                                                   justify-content-center
                                                   flex-shrink-0"
                                            style="width:42px;height:42px;"
                                        >

                                            <i
                                                class="bi bi-shield-check"
                                            ></i>

                                        </div>


                                        <div>

                                            <strong
                                                class="d-block
                                                       text-pn-brown
                                                       mb-1"
                                            >
                                                Account Protected
                                            </strong>


                                            <small
                                                class="text-secondary"
                                            >
                                                Your account is active
                                                and protected.
                                            </small>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>


                {{-- ==================================================
                     ADDRESS BOOK SHORTCUT
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
                        class="row
                               align-items-center
                               g-4"
                    >

                        <div class="col-12 col-md-8">

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
                                        class="bi bi-geo-alt fs-5"
                                    ></i>

                                </div>


                                <div>

                                    <h2
                                        class="font-serif
                                               h4
                                               text-pn-brown
                                               mb-2"
                                    >
                                        Manage Your Addresses
                                    </h2>


                                    <p
                                        class="small
                                               text-secondary
                                               mb-0"
                                    >
                                        Save delivery and billing
                                        addresses for faster
                                        checkout and booking.
                                    </p>

                                </div>

                            </div>

                        </div>


                        <div
                            class="col-12 col-md-4
                                   text-md-end"
                        >

                            <a
                                href="#"
                                class="btn btn-pn"
                            >

                                Address Book

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
                            Need Help?
                        </span>


                        <h2
                            class="font-serif
                                   display-6
                                   mt-2
                                   mb-2"
                        >
                            We're here to assist you.
                        </h2>


                        <p
                            class="text-white-50
                                   mb-0"
                        >
                            Contact our support team if you need
                            assistance with your profile, bookings,
                            orders or other services.
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

</section>

@endsection