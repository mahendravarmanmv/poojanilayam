@extends('layouts.app')

@section('title', 'Edit Profile | Pooja Nilayam')

@section(
    'meta_description',
    'Update your personal information and profile details on Pooja Nilayam.'
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
        'first_name' => 'Mahendra',
        'last_name' => 'Varma',
        'email' => 'customer@example.com',
        'mobile' => '9876543210',
        'gender' => '',
        'date_of_birth' => '',
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


                <li class="breadcrumb-item">

                    <a
                        href="#"
                        class="text-pn-primary"
                    >
                        My Profile
                    </a>

                </li>


                <li
                    class="breadcrumb-item active"
                    aria-current="page"
                >
                    Edit Profile
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
                    Edit Profile
                </h1>


                <p
                    class="text-secondary
                           mb-0"
                >
                    Keep your personal information up to date so we
                    can provide a better experience.
                </p>

            </div>

        </div>

    </div>

</section>


{{-- ============================================================
     EDIT PROFILE CONTENT
============================================================ --}}

<section class="py-5">

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-12 col-xl-9">


                {{-- ==================================================
                     PROFILE FORM
                =================================================== --}}

                <form
                    method="POST"
                    action="#"
                    id="editProfileForm"
                    class="needs-validation"
                    novalidate
                >

                    @csrf

                    @method('PUT')


                    {{-- ==================================================
                         PERSONAL INFORMATION
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
                                        class="bi bi-person fs-5"
                                    ></i>

                                </div>


                                <div>

                                    <span
                                        class="small
                                               text-pn-gold
                                               fw-semibold
                                               text-uppercase"
                                    >
                                        Personal Information
                                    </span>


                                    <h2
                                        class="font-serif
                                               h3
                                               text-pn-brown
                                               mt-1
                                               mb-1"
                                    >
                                        Tell us about you
                                    </h2>


                                    <p
                                        class="small
                                               text-secondary
                                               mb-0"
                                    >
                                        Update the personal details
                                        associated with your account.
                                    </p>

                                </div>

                            </div>


                            <div class="row g-4">

                                {{-- First Name --}}

                                <div class="col-12 col-md-6">

                                    <label
                                        for="firstName"
                                        class="form-label
                                               fw-semibold
                                               text-pn-brown"
                                    >

                                        First Name

                                        <span class="text-danger">
                                            *
                                        </span>

                                    </label>


                                    <input
                                        type="text"
                                        id="firstName"
                                        name="first_name"
                                        value="{{ $user['first_name'] }}"
                                        class="form-control
                                               form-control-lg"
                                        placeholder="Enter first name"
                                        autocomplete="given-name"
                                        required
                                    >


                                    <div class="invalid-feedback">
                                        Please enter your first name.
                                    </div>

                                </div>


                                {{-- Last Name --}}

                                <div class="col-12 col-md-6">

                                    <label
                                        for="lastName"
                                        class="form-label
                                               fw-semibold
                                               text-pn-brown"
                                    >

                                        Last Name

                                        <span class="text-danger">
                                            *
                                        </span>

                                    </label>


                                    <input
                                        type="text"
                                        id="lastName"
                                        name="last_name"
                                        value="{{ $user['last_name'] }}"
                                        class="form-control
                                               form-control-lg"
                                        placeholder="Enter last name"
                                        autocomplete="family-name"
                                        required
                                    >


                                    <div class="invalid-feedback">
                                        Please enter your last name.
                                    </div>

                                </div>


                                {{-- Gender --}}

                                <div class="col-12 col-md-6">

                                    <label
                                        for="gender"
                                        class="form-label
                                               fw-semibold
                                               text-pn-brown"
                                    >
                                        Gender
                                    </label>


                                    <select
                                        id="gender"
                                        name="gender"
                                        class="form-select
                                               form-select-lg"
                                    >

                                        <option
                                            value=""
                                            selected
                                        >
                                            Prefer not to say
                                        </option>


                                        <option value="male">
                                            Male
                                        </option>


                                        <option value="female">
                                            Female
                                        </option>


                                        <option value="other">
                                            Other
                                        </option>

                                    </select>

                                </div>


                                {{-- Date of Birth --}}

                                <div class="col-12 col-md-6">

                                    <label
                                        for="dateOfBirth"
                                        class="form-label
                                               fw-semibold
                                               text-pn-brown"
                                    >
                                        Date of Birth
                                    </label>


                                    <input
                                        type="date"
                                        id="dateOfBirth"
                                        name="date_of_birth"
                                        value="{{ $user['date_of_birth'] }}"
                                        class="form-control
                                               form-control-lg"
                                        autocomplete="bday"
                                    >

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
                                        Contact Information
                                    </span>


                                    <h2
                                        class="font-serif
                                               h3
                                               text-pn-brown
                                               mt-1
                                               mb-1"
                                    >
                                        How can we reach you?
                                    </h2>


                                    <p
                                        class="small
                                               text-secondary
                                               mb-0"
                                    >
                                        Your contact information may
                                        be used for booking, order and
                                        account notifications.
                                    </p>

                                </div>

                            </div>


                            <div class="row g-4">

                                {{-- Email --}}

                                <div class="col-12">

                                    <label
                                        for="email"
                                        class="form-label
                                               fw-semibold
                                               text-pn-brown"
                                    >

                                        Email Address

                                        <span class="text-danger">
                                            *
                                        </span>

                                    </label>


                                    <input
                                        type="email"
                                        id="email"
                                        name="email"
                                        value="{{ $user['email'] }}"
                                        class="form-control
                                               form-control-lg"
                                        placeholder="you@example.com"
                                        autocomplete="email"
                                        required
                                    >


                                    <div class="invalid-feedback">
                                        Please enter a valid email
                                        address.
                                    </div>


                                    <div
                                        class="form-text"
                                    >

                                        We'll use this email for
                                        important account and service
                                        notifications.

                                    </div>

                                </div>


                                {{-- Mobile --}}

                                <div class="col-12">

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
                                            id="mobile"
                                            name="mobile"
                                            value="{{ $user['mobile'] }}"
                                            class="form-control"
                                            placeholder="Enter 10-digit mobile number"
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


                                    <div
                                        class="form-text"
                                    >

                                        Your mobile number may be used
                                        for booking and service
                                        communication.

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>


                    {{-- ==================================================
                         PROFILE PHOTO
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
                                        class="bi bi-image fs-5"
                                    ></i>

                                </div>


                                <div>

                                    <span
                                        class="small
                                               text-pn-gold
                                               fw-semibold
                                               text-uppercase"
                                    >
                                        Profile Photo
                                    </span>


                                    <h2
                                        class="font-serif
                                               h3
                                               text-pn-brown
                                               mt-1
                                               mb-1"
                                    >
                                        Update your photo
                                    </h2>


                                    <p
                                        class="small
                                               text-secondary
                                               mb-0"
                                    >
                                        Add a profile photo to
                                        personalize your account.
                                    </p>

                                </div>

                            </div>


                            <div
                                class="d-flex
                                       flex-column
                                       flex-sm-row
                                       align-items-sm-center
                                       gap-4"
                            >

                                {{-- Current Avatar --}}

                                <div
                                    class="rounded-circle
                                           bg-pn-primary
                                           text-white
                                           d-flex
                                           align-items-center
                                           justify-content-center
                                           flex-shrink-0
                                           fw-semibold
                                           fs-3"
                                    style="width:96px;height:96px;"
                                    id="profilePreview"
                                >

                                    MV

                                </div>


                                <div class="flex-grow-1">

                                    <label
                                        for="profilePhoto"
                                        class="form-label
                                               fw-semibold
                                               text-pn-brown"
                                    >
                                        Choose a new photo
                                    </label>


                                    <input
                                        type="file"
                                        id="profilePhoto"
                                        name="profile_photo"
                                        class="form-control
                                               form-control-lg"
                                        accept="image/jpeg,image/png,image/webp"
                                    >


                                    <small
                                        class="text-secondary
                                               d-block
                                               mt-2"
                                    >

                                        JPG, PNG or WebP.
                                        Recommended square image.

                                    </small>


                                    <button
                                        type="button"
                                        class="btn
                                               btn-sm
                                               btn-outline-danger
                                               mt-3"
                                        id="removePhotoButton"
                                    >

                                        <i
                                            class="bi bi-trash me-1"
                                        ></i>

                                        Remove Photo

                                    </button>

                                </div>

                            </div>

                        </div>

                    </div>


                    {{-- ==================================================
                         NOTIFICATION PREFERENCES
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
                                        class="bi bi-bell fs-5"
                                    ></i>

                                </div>


                                <div>

                                    <span
                                        class="small
                                               text-pn-gold
                                               fw-semibold
                                               text-uppercase"
                                    >
                                        Preferences
                                    </span>


                                    <h2
                                        class="font-serif
                                               h3
                                               text-pn-brown
                                               mt-1
                                               mb-1"
                                    >
                                        Communication Preferences
                                    </h2>


                                    <p
                                        class="small
                                               text-secondary
                                               mb-0"
                                    >
                                        Choose the types of updates
                                        you would like to receive.
                                    </p>

                                </div>

                            </div>


                            <div class="vstack gap-3">

                                {{-- Booking Updates --}}

                                <div
                                    class="border
                                           border-warning-subtle
                                           rounded-4
                                           p-3"
                                >

                                    <div
                                        class="d-flex
                                               align-items-start
                                               justify-content-between
                                               gap-3"
                                    >

                                        <div>

                                            <strong
                                                class="d-block
                                                       text-pn-brown
                                                       mb-1"
                                            >
                                                Booking Updates
                                            </strong>


                                            <small
                                                class="text-secondary"
                                            >
                                                Receive important
                                                updates about your
                                                pooja and digital
                                                bookings.
                                            </small>

                                        </div>


                                        <div
                                            class="form-check
                                                   form-switch
                                                   flex-shrink-0"
                                        >

                                            <input
                                                class="form-check-input"
                                                type="checkbox"
                                                role="switch"
                                                id="bookingNotifications"
                                                name="booking_notifications"
                                                checked
                                            >

                                        </div>

                                    </div>

                                </div>


                                {{-- Order Updates --}}

                                <div
                                    class="border
                                           border-warning-subtle
                                           rounded-4
                                           p-3"
                                >

                                    <div
                                        class="d-flex
                                               align-items-start
                                               justify-content-between
                                               gap-3"
                                    >

                                        <div>

                                            <strong
                                                class="d-block
                                                       text-pn-brown
                                                       mb-1"
                                            >
                                                Order Updates
                                            </strong>


                                            <small
                                                class="text-secondary"
                                            >
                                                Receive updates about
                                                your orders and
                                                deliveries.
                                            </small>

                                        </div>


                                        <div
                                            class="form-check
                                                   form-switch
                                                   flex-shrink-0"
                                        >

                                            <input
                                                class="form-check-input"
                                                type="checkbox"
                                                role="switch"
                                                id="orderNotifications"
                                                name="order_notifications"
                                                checked
                                            >

                                        </div>

                                    </div>

                                </div>


                                {{-- Offers --}}

                                <div
                                    class="border
                                           border-warning-subtle
                                           rounded-4
                                           p-3"
                                >

                                    <div
                                        class="d-flex
                                               align-items-start
                                               justify-content-between
                                               gap-3"
                                    >

                                        <div>

                                            <strong
                                                class="d-block
                                                       text-pn-brown
                                                       mb-1"
                                            >
                                                Offers & Updates
                                            </strong>


                                            <small
                                                class="text-secondary"
                                            >
                                                Receive information
                                                about relevant
                                                services and offers.
                                            </small>

                                        </div>


                                        <div
                                            class="form-check
                                                   form-switch
                                                   flex-shrink-0"
                                        >

                                            <input
                                                class="form-check-input"
                                                type="checkbox"
                                                role="switch"
                                                id="offerNotifications"
                                                name="offer_notifications"
                                            >

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>


                    {{-- ==================================================
                         FORM ACTIONS
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
                                   g-3"
                        >

                            <div class="col-12 col-md-7">

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
                                            Your information is
                                            protected.
                                        </strong>


                                        <small
                                            class="text-secondary"
                                        >
                                            Changes will be saved to
                                            your Pooja Nilayam account
                                            after submission.
                                        </small>

                                    </div>

                                </div>

                            </div>


                            <div
                                class="col-12 col-md-5
                                       text-md-end"
                            >

                                <div
                                    class="d-flex
                                           flex-column
                                           flex-sm-row
                                           justify-content-md-end
                                           gap-2"
                                >

                                    <a
                                        href="#"
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
                                        id="saveProfileButton"
                                    >

                                        <i
                                            class="bi bi-check-lg me-2"
                                        ></i>

                                        Save Changes

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
                       p-md-5
                       text-center"
            >

                <i
                    class="bi bi-stars
                           display-6
                           text-warning"
                ></i>


                <h2
                    class="font-serif
                           display-6
                           mt-3
                           mb-2"
                >
                    Your devotional journey, your way.
                </h2>


                <p
                    class="text-white-50
                           col-lg-7
                           mx-auto
                           mb-0"
                >
                    Keep your profile information updated so your
                    bookings, orders and services can reach you
                    smoothly.

                </p>

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
    | Bootstrap Client-Side Validation
    |--------------------------------------------------------------------------
    */

    const form =
        document.getElementById(
            'editProfileForm'
        );


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
    | Mobile Number - Numbers Only
    |--------------------------------------------------------------------------
    */

    const mobile =
        document.getElementById(
            'mobile'
        );


    mobile?.addEventListener(
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
    | Profile Photo Preview
    |--------------------------------------------------------------------------
    */

    const profilePhoto =
        document.getElementById(
            'profilePhoto'
        );


    const profilePreview =
        document.getElementById(
            'profilePreview'
        );


    profilePhoto?.addEventListener(
        'change',
        function () {

            const file =
                this.files?.[0];


            if (!file) {

                return;

            }


            if (
                !file.type.startsWith(
                    'image/'
                )
            ) {

                this.value = '';

                return;

            }


            const reader =
                new FileReader();


            reader.onload =
                function (event) {

                    profilePreview.innerHTML =
                        '<img src="' +
                        event.target.result +
                        '" ' +
                        'class="w-100 h-100 rounded-circle object-fit-cover" ' +
                        'alt="Profile photo preview">';

                };


            reader.readAsDataURL(
                file
            );

        }
    );


    /*
    |--------------------------------------------------------------------------
    | Remove Profile Photo
    |--------------------------------------------------------------------------
    */

    const removePhotoButton =
        document.getElementById(
            'removePhotoButton'
        );


    removePhotoButton?.addEventListener(
        'click',
        function () {

            profilePhoto.value = '';


            profilePreview.innerHTML =
                'MV';

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
                    'saveProfileButton'
                );


            saveButton.disabled =
                true;


            saveButton.innerHTML =
                '<span class="spinner-border spinner-border-sm me-2"></span>' +
                'Saving...';

        }
    );

});
</script>

@endpush

@endsection