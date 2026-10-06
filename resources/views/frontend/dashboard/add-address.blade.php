@extends('layouts.app')

@section('title', 'Add Address | Pooja Nilayam')

@section(
    'meta_description',
    'Add a new address to your Pooja Nilayam account for bookings and orders.'
)

@section('content')

@php

	/*
	|--------------------------------------------------------------------------
	| ADDRESS FORM DATA
	|--------------------------------------------------------------------------
	| Address type options used by the customer address form.
	| Country, state and city data are supplied by the controller.
	|--------------------------------------------------------------------------
	*/

    $addressTypes = [
        'home' => 'Home',
        'office' => 'Office',
        'other' => 'Other'
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
                        href="{{ route('dashboard.index') }}"
                        class="text-pn-primary"
                    >
                        My Dashboard
                    </a>

                </li>


                <li class="breadcrumb-item">

                    <a
                        href="{{ route('dashboard.addresses') }}"
                        class="text-pn-primary"
                    >
                        Address Book
                    </a>

                </li>


                <li
                    class="breadcrumb-item active"
                    aria-current="page"
                >
                    Add Address
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

        <div class="row">

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
                    Add New Address
                </h1>


                <p
                    class="text-secondary
                           mb-0"
                >
                    Save an address for faster checkout, bookings and
                    applicable services.
                </p>

            </div>

        </div>

    </div>

</section>


{{-- ============================================================
     FORM CONTENT
============================================================ --}}

<section class="py-5">

    <div class="container">

        <div class="row g-4 g-xl-5">

            {{-- ====================================================
                 LEFT ACCOUNT NAVIGATION
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
                            href="{{ route('dashboard.index') }}"
                            class="list-group-item
                                   list-group-item-action
                                   border-0
                                   py-3"
                        >

                            <i class="bi bi-grid me-3"></i>

                            Dashboard

                        </a>


                        <a
                            href="{{ route('dashboard.profile') }}"
                            class="list-group-item
                                   list-group-item-action
                                   border-0
                                   py-3"
                        >

                            <i class="bi bi-person me-3"></i>

                            My Profile

                        </a>


                        <a
                            href="{{ route('dashboard.bookings') }}"
                            class="list-group-item
                                   list-group-item-action
                                   border-0
                                   py-3"
                        >

                            <i class="bi bi-calendar-check me-3"></i>

                            My Bookings

                        </a>


                        <a
                            href="{{ route('dashboard.digital-bookings') }}"
                            class="list-group-item
                                   list-group-item-action
                                   border-0
                                   py-3"
                        >

                            <i class="bi bi-camera-video me-3"></i>

                            Digital Bookings

                        </a>


                        <a
                            href="{{ route('dashboard.orders') }}"
                            class="list-group-item
                                   list-group-item-action
                                   border-0
                                   py-3"
                        >

                            <i class="bi bi-bag me-3"></i>

                            Orders

                        </a>


                        <a
                            href="{{ route('dashboard.wishlist') }}"
                            class="list-group-item
                                   list-group-item-action
                                   border-0
                                   py-3"
                        >

                            <i class="bi bi-heart me-3"></i>

                            Wishlist

                        </a>


                        <a
                            href="{{ route('dashboard.addresses') }}"
                            class="list-group-item
                                   list-group-item-action
                                   active
                                   border-0
                                   py-3"
                        >

                            <i class="bi bi-geo-alt me-3"></i>

                            Address Book

                        </a>


                        <a
                            href="{{ route('dashboard.notifications') }}"
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
                            href="{{ route('dashboard.change-password') }}"
                            class="list-group-item
                                   list-group-item-action
                                   border-0
                                   py-3"
                        >

                            <i class="bi bi-shield-lock me-3"></i>

                            Change Password

                        </a>


                        <div class="border-top"></div>


                        <form method="POST" action="{{ route('auth.logout') }}" class="m-0">

                            @csrf

                            <button
                                type="submit"
                                class="list-group-item
                                       list-group-item-action
                                       border-0
                                       py-3
                                       text-danger
                                       w-100
                                       text-start
                                       bg-transparent"
                            >

                                <i
                                    class="bi bi-box-arrow-right me-3"
                                ></i>

                                Logout

                            </button>

                        </form>

                    </div>

                </div>

            </div>


            {{-- ====================================================
                 MAIN FORM
            ===================================================== --}}

            <div class="col-12 col-lg-9">

                <form
                    id="addAddressForm"
                    method="POST"
                    action="{{ route('dashboard.addresses.store') }}"
                    class="needs-validation"
                    novalidate
                >

                    @csrf


                    {{-- ==================================================
                         ADDRESS TYPE
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
                                        class="bi bi-tag fs-5"
                                    ></i>

                                </div>


                                <div>

                                    <span
                                        class="small
                                               text-pn-gold
                                               fw-semibold
                                               text-uppercase"
                                    >
                                        Address Type
                                    </span>


                                    <h2
                                        class="font-serif
                                               h3
                                               text-pn-brown
                                               mt-1
                                               mb-1"
                                    >
                                        Where should we save this?
                                    </h2>


                                    <p
                                        class="small
                                               text-secondary
                                               mb-0"
                                    >
                                        Choose a label that helps you
                                        identify this address quickly.
                                    </p>

                                </div>

                            </div>


                            <div
                                class="row
                                       row-cols-1
                                       row-cols-sm-3
                                       g-3"
                            >

                                @foreach(
                                    $addressTypes as $value => $label
                                )

                                    <div class="col">

                                        <input
                                            type="radio"
                                            class="btn-check"
                                            name="address_type"
                                            id="addressType{{ ucfirst($value) }}"
                                            value="{{ $value }}"
                                            {{ $value === 'home'
                                                ? 'checked'
                                                : ''
                                            }}
                                            required
                                        >


                                        <label
                                            for="addressType{{ ucfirst($value) }}"
                                            class="border
                                                   border-warning-subtle
                                                   rounded-4
                                                   p-3
                                                   h-100
                                                   d-block
                                                   text-center"
                                            style="cursor:pointer;"
                                        >

                                            <i
                                                class="
                                                    bi
                                                    {{
                                                        $value === 'home'
                                                        ? 'bi-house'
                                                        : (
                                                            $value === 'office'
                                                            ? 'bi-building'
                                                            : 'bi-geo-alt'
                                                        )
                                                    }}
                                                    text-pn-primary
                                                    fs-4
                                                    d-block
                                                    mb-2
                                                "
                                            ></i>


                                            <strong
                                                class="small
                                                       text-pn-brown"
                                            >
                                                {{ $label }}
                                            </strong>

                                        </label>

                                    </div>

                                @endforeach

                            </div>

                        </div>

                    </div>


                    {{-- ==================================================
                         CONTACT DETAILS
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
                                        class="bi bi-person-lines-fill
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
                                        Contact Details
                                    </span>


                                    <h2
                                        class="font-serif
                                               h3
                                               text-pn-brown
                                               mt-1
                                               mb-1"
                                    >
                                        Who should we contact?
                                    </h2>


                                    <p
                                        class="small
                                               text-secondary
                                               mb-0"
                                    >
                                        Enter the name and phone
                                        number associated with this
                                        address.
                                    </p>

                                </div>

                            </div>


                            <div class="row g-4">

                                {{-- Full Name --}}

                                <div class="col-12 col-md-6">

                                    <label
                                        for="fullName"
                                        class="form-label
                                               fw-semibold
                                               text-pn-brown"
                                    >

                                        Full Name

                                        <span class="text-danger">
                                            *
                                        </span>

                                    </label>


                                    <input
                                        type="text"
                                        id="fullName"
                                        name="name"
                                        class="form-control
                                               form-control-lg"
                                        value="{{ old('name', $user->name) }}"
                                        placeholder="Enter full name"
                                        autocomplete="name"
                                        required
                                    >


                                    <div class="invalid-feedback">
                                        Please enter the full name.
                                    </div>

                                </div>


                                {{-- Mobile --}}

                                <div class="col-12 col-md-6">

                                    <label
                                        for="mobile"
                                        class="form-label
                                               fw-semibold
                                               text-pn-brown"
                                    >

                                        Mobile Number

                                        <span class="text-danger">
                                            *
                                        </span>

                                    </label>


                                    <div
                                        class="input-group
                                               input-group-lg"
                                    >

                                        <span
                                            class="input-group-text
                                                   bg-pn-cream
                                                   text-pn-primary"
                                        >
                                            +91
                                        </span>


                                        <input
                                            type="tel"
                                            id="phone"
                                            name="phone"
											value="{{ old('phone', $user->mobile) }}"
                                            class="form-control"
                                            placeholder="Enter 10-digit number"
                                            inputmode="numeric"
                                            autocomplete="tel"
                                            maxlength="10"
                                            pattern="[0-9]{10}"
                                            required
                                        >

                                    </div>


                                    <div class="invalid-feedback">
                                        Please enter a valid 10-digit
                                        mobile number.
                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>


                    {{-- ==================================================
                         ADDRESS DETAILS
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
                                        class="bi bi-geo-alt fs-5"
                                    ></i>

                                </div>


                                <div>

                                    <span
                                        class="small
                                               text-pn-gold
                                               fw-semibold
                                               text-uppercase"
                                    >
                                        Address Details
                                    </span>


                                    <h2
                                        class="font-serif
                                               h3
                                               text-pn-brown
                                               mt-1
                                               mb-1"
                                    >
                                        Enter your address
                                    </h2>


                                    <p
                                        class="small
                                               text-secondary
                                               mb-0"
                                    >
                                        Provide the complete address
                                        for delivery or applicable
                                        service requirements.
                                    </p>

                                </div>

                            </div>


                            <div class="row g-4">

                                {{-- Address Line 1 --}}

                                <div class="col-12">

                                    <label
                                        for="addressLine1"
                                        class="form-label
                                               fw-semibold
                                               text-pn-brown"
                                    >

                                        Address Line 1

                                        <span class="text-danger">
                                            *
                                        </span>

                                    </label>


                                    <input
                                        type="text"
                                        id="addressLine1"
                                        name="address_line_1"
										value="{{ old('address_line_1') }}"
                                        class="form-control
                                               form-control-lg"
                                        placeholder="Flat / House No. / Building"
                                        autocomplete="address-line1"
                                        required
                                    >


                                    <div class="invalid-feedback">
                                        Please enter your address.
                                    </div>

                                </div>


                                {{-- Address Line 2 --}}

                                <div class="col-12">

                                    <label
                                        for="addressLine2"
                                        class="form-label
                                               fw-semibold
                                               text-pn-brown"
                                    >

                                        Address Line 2

                                        <span
                                            class="text-secondary
                                                   fw-normal"
                                        >
                                            (Optional)
                                        </span>

                                    </label>


                                    <input
                                        type="text"
                                        id="addressLine2"
                                        name="address_line_2"
										value="{{ old('address_line_2') }}"
                                        class="form-control
                                               form-control-lg"
                                        placeholder="Street / Area / Landmark"
                                        autocomplete="address-line2"
                                    >

                                </div>


                                {{-- Landmark --}}

                                <div class="col-12">

                                    <label
                                        for="landmark"
                                        class="form-label
                                               fw-semibold
                                               text-pn-brown"
                                    >

                                        Landmark

                                        <span
                                            class="text-secondary
                                                   fw-normal"
                                        >
                                            (Optional)
                                        </span>

                                    </label>


                                    <input
                                        type="text"
                                        id="landmark"
                                        name="landmark"
										value="{{ old('landmark') }}"
                                        class="form-control
                                               form-control-lg"
                                        placeholder="Nearby landmark"
                                    >

                                </div>


                                {{-- Country --}}

                                <div class="col-12 col-md-6">

                                    <label
                                        for="country"
                                        class="form-label
                                               fw-semibold
                                               text-pn-brown"
                                    >

                                        Country

                                        <span class="text-danger">
                                            *
                                        </span>

                                    </label>


									<select
									id="country_id"
									name="country_id"
									class="form-select form-select-lg"
									required
									>
									<option value="">Select country</option>

									@foreach($countries as $country)
									<option
									value="{{ $country->id }}"
									{{ old('country_id') == $country->id ? 'selected' : '' }}
									>
									{{ $country->name }}
									</option>
									@endforeach
									</select>

									<div class="invalid-feedback">
									Please select your country.
									</div>

                                </div>


                                {{-- State --}}

                                <div class="col-12 col-md-6">

                                    <label
                                        for="state"
                                        class="form-label
                                               fw-semibold
                                               text-pn-brown"
                                    >

                                        State

                                        <span class="text-danger">
                                            *
                                        </span>

                                    </label>


									<select
									id="state_id"
									name="state_id"
									class="form-select form-select-lg"
									required
									>
									<option value="">Select state</option>

									@foreach($states as $state)
									<option
									value="{{ $state->id }}"
									data-country-id="{{ $state->country_id }}"
									{{ old('state_id') == $state->id ? 'selected' : '' }}
									>
									{{ $state->name }}
									</option>
									@endforeach
									</select>

									<div class="invalid-feedback">
									Please select your state.
									</div>

                                </div>


                                {{-- City --}}

                                <div class="col-12 col-md-6">

                                    <label
                                        for="city"
                                        class="form-label
                                               fw-semibold
                                               text-pn-brown"
                                    >

                                        City

                                        <span class="text-danger">
                                            *
                                        </span>

                                    </label>


									<select
									id="city_id"
									name="city_id"
									class="form-select form-select-lg"
									required
									disabled
									>
									<option value="">Select city</option>
									</select>


                                    <div class="invalid-feedback">
                                        Please select your city.
                                    </div>

                                </div>


                                {{-- Pincode --}}

                                <div class="col-12 col-md-6">

                                    <label
                                        for="pincode"
                                        class="form-label
                                               fw-semibold
                                               text-pn-brown"
                                    >

                                        Pincode

                                        <span class="text-danger">
                                            *
                                        </span>

                                    </label>


                                    <input
                                        type="text"
                                        id="postal_code"
                                        name="postal_code"
										value="{{ old('postal_code') }}"
                                        class="form-control
                                               form-control-lg"
                                        placeholder="Enter 6-digit pincode"
                                        inputmode="numeric"
                                        autocomplete="postal-code"
                                        maxlength="6"
                                        pattern="[0-9]{6}"
                                        required
                                    >


                                    <div class="invalid-feedback">
                                        Please enter a valid 6-digit
                                        pincode.
                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>


                    {{-- ==================================================
                         DEFAULT ADDRESS
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

                                    <i
                                        class="bi bi-check-circle fs-5"
                                    ></i>

                                </div>


                                <div class="flex-grow-1">

                                    <span
                                        class="small
                                               text-pn-gold
                                               fw-semibold
                                               text-uppercase"
                                    >
                                        Address Preference
                                    </span>


                                    <h2
                                        class="font-serif
                                               h4
                                               text-pn-brown
                                               mt-1
                                               mb-2"
                                    >
                                        Make this my default address
                                    </h2>


                                    <p
                                        class="small
                                               text-secondary
                                               mb-3"
                                    >

                                        Use this address automatically
                                        when a default address is
                                        required.

                                    </p>


                                    <div class="form-check form-switch">

                                        <input
                                            class="form-check-input"
                                            type="checkbox"
                                            role="switch"
                                            id="isDefault"
                                            name="is_default"
                                        >


                                        <label
                                            class="form-check-label
                                                   small
                                                   text-secondary"
                                            for="isDefault"
                                        >
                                            Set as default address
                                        </label>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>


                    {{-- ==================================================
                         PRIVACY / ACTIONS
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

                            <div class="col-12 col-lg-7">

                                <div
                                    class="d-flex
                                           align-items-start
                                           gap-3"
                                >

                                    <i
                                        class="bi bi-shield-check
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
                                            Your address is secure.
                                        </strong>


                                        <small
                                            class="text-secondary"
                                        >

                                            Your saved address will
                                            only be used for relevant
                                            Pooja Nilayam services,
                                            bookings and orders.

                                        </small>

                                    </div>

                                </div>

                            </div>


                            <div
                                class="col-12 col-lg-5"
                            >

                                <div
                                    class="d-flex
                                           flex-column
                                           flex-sm-row
                                           justify-content-lg-end
                                           gap-2"
                                >

                                    <a
                                        href="{{ route('dashboard.addresses') }}"
                                        class="btn
                                               btn-outline-secondary
                                               px-4"
                                    >

                                        Cancel

                                    </a>


                                    <button
                                        type="submit"
                                        class="btn
                                               btn-pn
                                               px-4"
                                        id="saveAddressButton"
                                    >

                                        <i
                                            class="bi bi-check-lg me-2"
                                        ></i>

                                        Save Address

                                    </button>

                                </div>

                            </div>

                        </div>

                    </div>

                </form>

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

    const form =
        document.getElementById(
            'addAddressForm'
        );


    /*
    |--------------------------------------------------------------------------
    | Bootstrap Validation
    |--------------------------------------------------------------------------
    */

    form?.addEventListener(
        'submit',
        function (event) {

            if (!form.checkValidity()) {

                event.preventDefault();
                event.stopPropagation();

            }


            form.classList.add(
                'was-validated'
            );

        }
    );


    /*
    |--------------------------------------------------------------------------
    | Mobile Number
    |--------------------------------------------------------------------------
    */

	const phone =
	document.getElementById(
		'phone'
	);

	phone?.addEventListener(
	'input',
	function () {

		this.value =
			this.value
				.replace(/\D/g, '')
				.slice(0, 10);

	}
	);


    /*
    |--------------------------------------------------------------------------
    | Pincode
    |--------------------------------------------------------------------------
    */

	const postalCode =
	document.getElementById(
		'postal_code'
	);

	postalCode?.addEventListener(
	'input',
	function () {

		this.value =
			this.value
				.replace(/\D/g, '')
				.slice(0, 6);

	}
	);


    /*
    |--------------------------------------------------------------------------
    | Save Button Loading State
    |--------------------------------------------------------------------------
    */

    form?.addEventListener(
        'submit',
        function () {

            if (!form.checkValidity()) {

                return;

            }


            const saveButton =
                document.getElementById(
                    'saveAddressButton'
                );


            saveButton.disabled =
                true;


            saveButton.innerHTML =
                '<span class="spinner-border spinner-border-sm me-2"></span>' +
                'Saving Address...';

        }
    );


    /*
    |--------------------------------------------------------------------------
    | Address Type Visual Selection
    |--------------------------------------------------------------------------
    */

    const addressTypes =
        document.querySelectorAll(
            'input[name="address_type"]'
        );


    function updateAddressTypeStyles() {

        addressTypes.forEach(
            function (radio) {

                const label =
                    document.querySelector(
                        'label[for="' +
                        radio.id +
                        '"]'
                    );


                if (!label) {

                    return;

                }


                if (radio.checked) {

                    label.classList.add(
                        'border-warning',
                        'bg-pn-cream'
                    );

                    label.classList.remove(
                        'border-warning-subtle'
                    );

                } else {

                    label.classList.remove(
                        'border-warning',
                        'bg-pn-cream'
                    );

                    label.classList.add(
                        'border-warning-subtle'
                    );

                }

            }
        );

    }


    addressTypes.forEach(
        function (radio) {

            radio.addEventListener(
                'change',
                updateAddressTypeStyles
            );

        }
    );


    updateAddressTypeStyles();

});
</script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const countrySelect = document.getElementById('country_id');
    const stateSelect = document.getElementById('state_id');
    const citySelect = document.getElementById('city_id');

    function filterStates() {
        const countryId = countrySelect.value;

        Array.from(stateSelect.options).forEach(function (option, index) {
            if (index === 0) {
                return;
            }

            const optionCountryId = option.dataset.countryId;

            option.hidden = countryId !== '' && optionCountryId !== countryId;
        });

        const selectedState = stateSelect.options[stateSelect.selectedIndex];

        if (
            selectedState &&
            selectedState.dataset.countryId &&
            selectedState.dataset.countryId !== countryId
        ) {
            stateSelect.value = '';
        }

        citySelect.innerHTML = '<option value="">Select city</option>';
        citySelect.disabled = true;
    }

    async function loadCities() {
        const stateId = stateSelect.value;

        citySelect.innerHTML = '<option value="">Loading cities...</option>';
        citySelect.disabled = true;

        if (!stateId) {
            citySelect.innerHTML = '<option value="">Select city</option>';
            return;
        }

        try {
            const response = await fetch(
                '{{ route('dashboard.addresses.cities') }}?state_id=' +
                encodeURIComponent(stateId),
                {
                    headers: {
                        'Accept': 'application/json'
                    }
                }
            );

            if (!response.ok) {
                throw new Error('Unable to load cities.');
            }

            const cities = await response.json();

            citySelect.innerHTML = '<option value="">Select city</option>';

			const oldCityId = @json(old('city_id'));

			cities.forEach(function (city) {
			const option = document.createElement('option');

			option.value = city.id;
			option.textContent = city.name;

			if (String(city.id) === String(oldCityId)) {
			option.selected = true;
			}

			citySelect.appendChild(option);
			});

			citySelect.disabled = cities.length === 0;

            if (cities.length === 0) {
                citySelect.innerHTML =
                    '<option value="">No cities available for this state</option>';
            }
        } catch (error) {
            citySelect.innerHTML =
                '<option value="">Unable to load cities</option>';
            citySelect.disabled = true;
        }
    }

    countrySelect?.addEventListener('change', filterStates);
    stateSelect?.addEventListener('change', loadCities);

    filterStates();

    if (stateSelect.value) {
        loadCities();
    }
});
</script>

@endpush

@endsection