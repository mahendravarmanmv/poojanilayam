@extends('layouts.app')

@section('title', 'Change Password | Pooja Nilayam')

@section(
    'meta_description',
    'Securely change your Pooja Nilayam account password.'
)

@section('content')

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
                        My Dashboard
                    </a>

                </li>

                <li
                    class="breadcrumb-item active"
                    aria-current="page"
                >
                    Change Password
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
                    Account Security
                </span>

                <h1
                    class="font-serif
                           display-5
                           text-pn-brown
                           mt-2
                           mb-2"
                >
                    Change Password
                </h1>

                <p
                    class="text-secondary
                           mb-0"
                >
                    Update your password regularly to help keep
                    your Pooja Nilayam account secure.
                </p>

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
                        </a>


                        <a
                            href="#"
                            class="list-group-item
                                   list-group-item-action
                                   active
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
                 CHANGE PASSWORD CONTENT
            ===================================================== --}}

            <div class="col-12 col-lg-9">

                <div class="row g-4">

                    {{-- ==================================================
                         PASSWORD FORM
                    =================================================== --}}

                    <div class="col-12 col-xl-8">

                        <div
                            class="card
                                   border
                                   border-warning-subtle
                                   rounded-5
                                   h-100"
                        >

                            <div
                                class="card-body
                                       p-4
                                       p-md-5"
                            >

                                <div class="mb-4">

                                    <div
                                        class="rounded-circle
                                               bg-pn-cream
                                               text-pn-primary
                                               d-flex
                                               align-items-center
                                               justify-content-center
                                               mb-3"
                                        style="width:58px;height:58px;"
                                    >

                                        <i
                                            class="bi bi-shield-lock fs-4"
                                        ></i>

                                    </div>


                                    <span
                                        class="small
                                               text-pn-gold
                                               fw-semibold
                                               text-uppercase"
                                    >
                                        Password Security
                                    </span>


                                    <h2
                                        class="font-serif
                                               h3
                                               text-pn-brown
                                               mt-1
                                               mb-2"
                                    >
                                        Update Your Password
                                    </h2>


                                    <p
                                        class="small
                                               text-secondary
                                               mb-0"
                                    >
                                        Enter your current password
                                        and choose a new secure
                                        password for your account.
                                    </p>

                                </div>


                                {{-- Success Alert --}}

                                <div
                                    id="passwordSuccess"
                                    class="alert
                                           alert-success
                                           d-none
                                           rounded-4"
                                    role="alert"
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
                                            Your password has been
                                            updated successfully.
                                        </div>

                                    </div>

                                </div>


                                {{-- Error Alert --}}

                                <div
                                    id="passwordError"
                                    class="alert
                                           alert-danger
                                           d-none
                                           rounded-4"
                                    role="alert"
                                >

                                    <div
                                        class="d-flex
                                               align-items-start
                                               gap-2"
                                    >

                                        <i
                                            class="bi bi-exclamation-circle-fill
                                                   mt-1"
                                        ></i>

                                        <div
                                            id="passwordErrorMessage"
                                        >
                                            Please review the password
                                            fields.
                                        </div>

                                    </div>

                                </div>


                                <form
                                    id="changePasswordForm"
                                    method="POST"
                                    action="#"
                                    novalidate
                                >

                                    @csrf


                                    {{-- Current Password --}}

                                    <div class="mb-4">

                                        <label
                                            for="currentPassword"
                                            class="form-label
                                                   fw-semibold
                                                   text-pn-brown"
                                        >

                                            Current Password

                                            <span
                                                class="text-danger"
                                            >
                                                *
                                            </span>

                                        </label>


                                        <div
                                            class="input-group"
                                        >

                                            <span
                                                class="input-group-text
                                                       bg-white"
                                            >

                                                <i
                                                    class="bi bi-lock
                                                           text-secondary"
                                                ></i>

                                            </span>


                                            <input
                                                type="password"
                                                id="currentPassword"
                                                name="current_password"
                                                class="form-control"
                                                placeholder="Enter current password"
                                                autocomplete="current-password"
                                                required
                                            >


                                            <button
                                                type="button"
                                                class="btn
                                                       btn-outline-secondary
                                                       toggle-password"
                                                data-target="currentPassword"
                                                aria-label="Show current password"
                                            >

                                                <i
                                                    class="bi bi-eye"
                                                ></i>

                                            </button>

                                        </div>


                                        <div
                                            class="invalid-feedback"
                                        >
                                            Please enter your current
                                            password.
                                        </div>

                                    </div>


                                    {{-- New Password --}}

                                    <div class="mb-3">

                                        <label
                                            for="newPassword"
                                            class="form-label
                                                   fw-semibold
                                                   text-pn-brown"
                                        >

                                            New Password

                                            <span
                                                class="text-danger"
                                            >
                                                *
                                            </span>

                                        </label>


                                        <div
                                            class="input-group"
                                        >

                                            <span
                                                class="input-group-text
                                                       bg-white"
                                            >

                                                <i
                                                    class="bi bi-key
                                                           text-secondary"
                                                ></i>

                                            </span>


                                            <input
                                                type="password"
                                                id="newPassword"
                                                name="new_password"
                                                class="form-control"
                                                placeholder="Enter new password"
                                                autocomplete="new-password"
                                                required
                                                minlength="8"
                                            >


                                            <button
                                                type="button"
                                                class="btn
                                                       btn-outline-secondary
                                                       toggle-password"
                                                data-target="newPassword"
                                                aria-label="Show new password"
                                            >

                                                <i
                                                    class="bi bi-eye"
                                                ></i>

                                            </button>

                                        </div>


                                        <div
                                            class="invalid-feedback"
                                        >
                                            Please enter a valid new
                                            password.
                                        </div>

                                    </div>


                                    {{-- Password Strength --}}

                                    <div class="mb-4">

                                        <div
                                            class="d-flex
                                                   align-items-center
                                                   justify-content-between
                                                   mb-2"
                                        >

                                            <small
                                                class="text-secondary"
                                            >
                                                Password strength
                                            </small>


                                            <small
                                                id="passwordStrengthText"
                                                class="fw-semibold
                                                       text-secondary"
                                            >
                                                Not entered
                                            </small>

                                        </div>


                                        <div
                                            class="progress"
                                            style="height:6px;"
                                        >

                                            <div
                                                id="passwordStrengthBar"
                                                class="progress-bar"
                                                role="progressbar"
                                                style="width:0%;"
                                                aria-valuenow="0"
                                                aria-valuemin="0"
                                                aria-valuemax="100"
                                            ></div>

                                        </div>

                                    </div>


                                    {{-- Confirm Password --}}

                                    <div class="mb-4">

                                        <label
                                            for="confirmPassword"
                                            class="form-label
                                                   fw-semibold
                                                   text-pn-brown"
                                        >

                                            Confirm New Password

                                            <span
                                                class="text-danger"
                                            >
                                                *
                                            </span>

                                        </label>


                                        <div
                                            class="input-group"
                                        >

                                            <span
                                                class="input-group-text
                                                       bg-white"
                                            >

                                                <i
                                                    class="bi bi-shield-check
                                                           text-secondary"
                                                ></i>

                                            </span>


                                            <input
                                                type="password"
                                                id="confirmPassword"
                                                name="new_password_confirmation"
                                                class="form-control"
                                                placeholder="Confirm new password"
                                                autocomplete="new-password"
                                                required
                                            >


                                            <button
                                                type="button"
                                                class="btn
                                                       btn-outline-secondary
                                                       toggle-password"
                                                data-target="confirmPassword"
                                                aria-label="Show confirm password"
                                            >

                                                <i
                                                    class="bi bi-eye"
                                                ></i>

                                            </button>

                                        </div>


                                        <div
                                            id="confirmPasswordFeedback"
                                            class="small
                                                   mt-2"
                                        ></div>

                                    </div>


                                    {{-- Password Requirements --}}

                                    <div
                                        class="bg-pn-cream
                                               rounded-4
                                               p-3
                                               p-md-4
                                               mb-4"
                                    >

                                        <strong
                                            class="d-block
                                                   small
                                                   text-pn-brown
                                                   mb-3"
                                        >
                                            Password requirements
                                        </strong>


                                        <div
                                            class="row
                                                   row-cols-1
                                                   row-cols-sm-2
                                                   g-2"
                                        >

                                            <div class="col">

                                                <small
                                                    id="requirementLength"
                                                    class="text-secondary"
                                                >

                                                    <i
                                                        class="bi bi-circle me-2"
                                                    ></i>

                                                    At least 8 characters

                                                </small>

                                            </div>


                                            <div class="col">

                                                <small
                                                    id="requirementUpper"
                                                    class="text-secondary"
                                                >

                                                    <i
                                                        class="bi bi-circle me-2"
                                                    ></i>

                                                    One uppercase letter

                                                </small>

                                            </div>


                                            <div class="col">

                                                <small
                                                    id="requirementLower"
                                                    class="text-secondary"
                                                >

                                                    <i
                                                        class="bi bi-circle me-2"
                                                    ></i>

                                                    One lowercase letter

                                                </small>

                                            </div>


                                            <div class="col">

                                                <small
                                                    id="requirementNumber"
                                                    class="text-secondary"
                                                >

                                                    <i
                                                        class="bi bi-circle me-2"
                                                    ></i>

                                                    One number

                                                </small>

                                            </div>


                                            <div class="col">

                                                <small
                                                    id="requirementSpecial"
                                                    class="text-secondary"
                                                >

                                                    <i
                                                        class="bi bi-circle me-2"
                                                    ></i>

                                                    One special character

                                                </small>

                                            </div>

                                        </div>

                                    </div>


                                    {{-- Actions --}}

                                    <div
                                        class="d-flex
                                               flex-column
                                               flex-sm-row
                                               gap-2"
                                    >

                                        <button
                                            type="submit"
                                            class="btn
                                                   btn-pn
                                                   px-4"
                                            id="updatePasswordButton"
                                        >

                                            <i
                                                class="bi bi-shield-check me-2"
                                            ></i>

                                            Update Password

                                        </button>


                                        <button
                                            type="reset"
                                            class="btn
                                                   btn-outline-secondary
                                                   px-4"
                                            id="resetPasswordForm"
                                        >

                                            Reset

                                        </button>

                                    </div>

                                </form>

                            </div>

                        </div>

                    </div>


                    {{-- ==================================================
                         SECURITY INFORMATION
                    =================================================== --}}

                    <div class="col-12 col-xl-4">

                        <div
                            class="card
                                   border
                                   border-warning-subtle
                                   rounded-5
                                   mb-4"
                        >

                            <div class="card-body p-4">

                                <div
                                    class="d-flex
                                           align-items-center
                                           gap-3
                                           mb-4"
                                >

                                    <div
                                        class="rounded-circle
                                               bg-success-subtle
                                               text-success
                                               d-flex
                                               align-items-center
                                               justify-content-center"
                                        style="width:48px;height:48px;"
                                    >

                                        <i
                                            class="bi bi-shield-check fs-5"
                                        ></i>

                                    </div>


                                    <div>

                                        <span
                                            class="small
                                                   text-pn-gold
                                                   fw-semibold
                                                   text-uppercase"
                                        >
                                            Security
                                        </span>


                                        <h2
                                            class="font-serif
                                                   h5
                                                   text-pn-brown
                                                   mb-0"
                                        >
                                            Keep Your Account Safe
                                        </h2>

                                    </div>

                                </div>


                                <div
                                    class="vstack
                                           gap-3"
                                >

                                    <div
                                        class="d-flex
                                               align-items-start
                                               gap-3"
                                    >

                                        <i
                                            class="bi bi-check-circle-fill
                                                   text-success
                                                   mt-1"
                                        ></i>


                                        <small
                                            class="text-secondary"
                                        >
                                            Use a unique password that
                                            you do not use on other
                                            websites.
                                        </small>

                                    </div>


                                    <div
                                        class="d-flex
                                               align-items-start
                                               gap-3"
                                    >

                                        <i
                                            class="bi bi-check-circle-fill
                                                   text-success
                                                   mt-1"
                                        ></i>


                                        <small
                                            class="text-secondary"
                                        >
                                            Avoid sharing your password
                                            with anyone.
                                        </small>

                                    </div>


                                    <div
                                        class="d-flex
                                               align-items-start
                                               gap-3"
                                    >

                                        <i
                                            class="bi bi-check-circle-fill
                                                   text-success
                                                   mt-1"
                                        ></i>


                                        <small
                                            class="text-secondary"
                                        >
                                            Never enter your password
                                            into suspicious links or
                                            messages.
                                        </small>

                                    </div>


                                    <div
                                        class="d-flex
                                               align-items-start
                                               gap-3"
                                    >

                                        <i
                                            class="bi bi-check-circle-fill
                                                   text-success
                                                   mt-1"
                                        ></i>


                                        <small
                                            class="text-secondary"
                                        >
                                            Change your password if you
                                            believe your account may
                                            have been compromised.
                                        </small>

                                    </div>

                                </div>

                            </div>

                        </div>


                        {{-- Password Recovery --}}

                        <div
                            class="card
                                   border
                                   border-warning-subtle
                                   rounded-5"
                        >

                            <div class="card-body p-4">

                                <i
                                    class="bi bi-question-circle
                                           text-pn-primary
                                           fs-3"
                                ></i>


                                <h2
                                    class="font-serif
                                           h5
                                           text-pn-brown
                                           mt-3
                                           mb-2"
                                >
                                    Forgot Your Password?
                                </h2>


                                <p
                                    class="small
                                           text-secondary"
                                >

                                    Use the password recovery process
                                    if you cannot remember your current
                                    password.

                                </p>


                                <a
                                    href="#"
                                    class="btn
                                           btn-sm
                                           btn-outline-secondary"
                                >

                                    Reset Password

                                    <i
                                        class="bi bi-arrow-right ms-1"
                                    ></i>

                                </a>

                            </div>

                        </div>

                    </div>

                </div>


                {{-- ==================================================
                     SECURITY NOTICE
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
                            class="bi bi-info-circle
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
                                Security reminder
                            </strong>


                            <small
                                class="text-secondary"
                            >

                                Pooja Nilayam will never ask you to
                                share your password through email,
                                phone calls or messages.

                            </small>

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

    const form =
        document.getElementById(
            'changePasswordForm'
        );


    const currentPassword =
        document.getElementById(
            'currentPassword'
        );


    const newPassword =
        document.getElementById(
            'newPassword'
        );


    const confirmPassword =
        document.getElementById(
            'confirmPassword'
        );


    const successAlert =
        document.getElementById(
            'passwordSuccess'
        );


    const errorAlert =
        document.getElementById(
            'passwordError'
        );


    const errorMessage =
        document.getElementById(
            'passwordErrorMessage'
        );


    const strengthBar =
        document.getElementById(
            'passwordStrengthBar'
        );


    const strengthText =
        document.getElementById(
            'passwordStrengthText'
        );


    const confirmFeedback =
        document.getElementById(
            'confirmPasswordFeedback'
        );


    /*
    |--------------------------------------------------------------------------
    | Password Visibility
    |--------------------------------------------------------------------------
    */

    document
        .querySelectorAll('.toggle-password')
        .forEach(
            function (button) {

                button.addEventListener(
                    'click',
                    function () {

                        const target =
                            document.getElementById(
                                this.dataset.target
                            );


                        const icon =
                            this.querySelector(
                                'i'
                            );


                        if (!target) {

                            return;

                        }


                        if (
                            target.type === 'password'
                        ) {

                            target.type =
                                'text';


                            icon.classList.remove(
                                'bi-eye'
                            );


                            icon.classList.add(
                                'bi-eye-slash'
                            );

                        } else {

                            target.type =
                                'password';


                            icon.classList.remove(
                                'bi-eye-slash'
                            );


                            icon.classList.add(
                                'bi-eye'
                            );

                        }

                    }
                );

            }
        );


    /*
    |--------------------------------------------------------------------------
    | Password Requirements
    |--------------------------------------------------------------------------
    */

    const requirements = {

        length:
            document.getElementById(
                'requirementLength'
            ),

        upper:
            document.getElementById(
                'requirementUpper'
            ),

        lower:
            document.getElementById(
                'requirementLower'
            ),

        number:
            document.getElementById(
                'requirementNumber'
            ),

        special:
            document.getElementById(
                'requirementSpecial'
            )

    };


    function updateRequirement(
        element,
        valid
    ) {

        if (!element) {

            return;

        }


        const icon =
            element.querySelector(
                'i'
            );


        element.classList.toggle(
            'text-success',
            valid
        );


        element.classList.toggle(
            'text-secondary',
            !valid
        );


        if (icon) {

            icon.className =
                valid
                    ? 'bi bi-check-circle-fill me-2'
                    : 'bi bi-circle me-2';

        }

    }


    /*
    |--------------------------------------------------------------------------
    | Password Strength
    |--------------------------------------------------------------------------
    */

    function evaluatePassword(
        password
    ) {

        const checks = {

            length:
                password.length >= 8,

            upper:
                /[A-Z]/.test(password),

            lower:
                /[a-z]/.test(password),

            number:
                /[0-9]/.test(password),

            special:
                /[^A-Za-z0-9]/.test(password)

        };


        updateRequirement(
            requirements.length,
            checks.length
        );


        updateRequirement(
            requirements.upper,
            checks.upper
        );


        updateRequirement(
            requirements.lower,
            checks.lower
        );


        updateRequirement(
            requirements.number,
            checks.number
        );


        updateRequirement(
            requirements.special,
            checks.special
        );


        const score =
            Object.values(checks)
                .filter(Boolean)
                .length;


        let width = 0;

        let text =
            'Not entered';

        let color =
            '';


        if (!password) {

            width = 0;

        } else if (score <= 2) {

            width = 30;

            text = 'Weak';

            color = 'bg-danger';

        } else if (score === 3) {

            width = 50;

            text = 'Fair';

            color = 'bg-warning';

        } else if (score === 4) {

            width = 75;

            text = 'Good';

            color = 'bg-info';

        } else {

            width = 100;

            text = 'Strong';

            color = 'bg-success';

        }


        if (strengthBar) {

            strengthBar.style.width =
                width + '%';

            strengthBar.className =
                'progress-bar ' + color;

            strengthBar.setAttribute(
                'aria-valuenow',
                width
            );

        }


        if (strengthText) {

            strengthText.textContent =
                text;


            strengthText.className =
                'fw-semibold ' +
                (
                    score >= 5
                        ? 'text-success'
                        : score >= 4
                            ? 'text-info'
                            : score >= 3
                                ? 'text-warning-emphasis'
                                : password
                                    ? 'text-danger'
                                    : 'text-secondary'
                );

        }


        return checks;

    }


    newPassword?.addEventListener(
        'input',
        function () {

            evaluatePassword(
                this.value
            );


            validatePasswordMatch();

        }
    );


    /*
    |--------------------------------------------------------------------------
    | Confirm Password
    |--------------------------------------------------------------------------
    */

    function validatePasswordMatch() {

        if (!confirmPassword) {

            return false;

        }


        const password =
            newPassword?.value
            || '';


        const confirmation =
            confirmPassword.value;


        if (!confirmation) {

            confirmFeedback.textContent =
                '';


            confirmPassword.classList.remove(
                'is-valid',
                'is-invalid'
            );


            return false;

        }


        const matches =
            password === confirmation;


        confirmPassword.classList.toggle(
            'is-valid',
            matches
        );


        confirmPassword.classList.toggle(
            'is-invalid',
            !matches
        );


        if (confirmFeedback) {

            confirmFeedback.textContent =
                matches
                    ? 'Passwords match.'
                    : 'Passwords do not match.';


            confirmFeedback.className =
                matches
                    ? 'small mt-2 text-success'
                    : 'small mt-2 text-danger';

        }


        return matches;

    }


    confirmPassword?.addEventListener(
        'input',
        validatePasswordMatch
    );


    /*
    |--------------------------------------------------------------------------
    | Form Validation
    |--------------------------------------------------------------------------
    */

    form?.addEventListener(
        'submit',
        function (event) {

            event.preventDefault();


            successAlert?.classList.add(
                'd-none'
            );


            errorAlert?.classList.add(
                'd-none'
            );


            const password =
                newPassword?.value
                || '';


            const confirmation =
                confirmPassword?.value
                || '';


            const checks =
                evaluatePassword(
                    password
                );


            let errors = [];


            if (
                !currentPassword?.value
            ) {

                errors.push(
                    'Enter your current password.'
                );

                currentPassword?.classList.add(
                    'is-invalid'
                );

            } else {

                currentPassword?.classList.remove(
                    'is-invalid'
                );

            }


            if (
                !password
            ) {

                errors.push(
                    'Enter a new password.'
                );

            } else if (
                Object.values(checks)
                    .some(
                        check => !check
                    )
            ) {

                errors.push(
                    'Your new password does not meet all requirements.'
                );

            }


            if (
                !confirmation
            ) {

                errors.push(
                    'Confirm your new password.'
                );

            } else if (
                password !== confirmation
            ) {

                errors.push(
                    'The new passwords do not match.'
                );

            }


            if (errors.length > 0) {

                if (errorMessage) {

                    errorMessage.textContent =
                        errors.join(' ');

                }


                errorAlert?.classList.remove(
                    'd-none'
                );


                return;

            }


            const submitButton =
                document.getElementById(
                    'updatePasswordButton'
                );


            const originalHTML =
                submitButton?.innerHTML;


            if (submitButton) {

                submitButton.disabled =
                    true;


                submitButton.innerHTML =
                    '<span class="spinner-border spinner-border-sm me-2"></span>' +
                    'Updating...';

            }


            /*
            |--------------------------------------------------------------------------
            | Backend password update will be connected later.
            |--------------------------------------------------------------------------
            */

            setTimeout(
                function () {

                    if (submitButton) {

                        submitButton.disabled =
                            false;

                        submitButton.innerHTML =
                            originalHTML;

                    }


                    successAlert?.classList.remove(
                        'd-none'
                    );


                    form.reset();


                    currentPassword?.classList.remove(
                        'is-invalid'
                    );


                    confirmPassword?.classList.remove(
                        'is-valid',
                        'is-invalid'
                    );


                    if (strengthBar) {

                        strengthBar.style.width =
                            '0%';

                        strengthBar.className =
                            'progress-bar';

                    }


                    if (strengthText) {

                        strengthText.textContent =
                            'Not entered';

                        strengthText.className =
                            'fw-semibold text-secondary';

                    }


                    Object.values(requirements)
                        .forEach(
                            function (element) {

                                updateRequirement(
                                    element,
                                    false
                                );

                            }
                        );


                    if (confirmFeedback) {

                        confirmFeedback.textContent =
                            '';

                    }

                },
                700
            );

        }
    );


    /*
    |--------------------------------------------------------------------------
    | Reset Form
    |--------------------------------------------------------------------------
    */

    document
        .getElementById('resetPasswordForm')
        ?.addEventListener(
            'click',
            function () {

                setTimeout(
                    function () {

                        successAlert?.classList.add(
                            'd-none'
                        );


                        errorAlert?.classList.add(
                            'd-none'
                        );


                        confirmPassword?.classList.remove(
                            'is-valid',
                            'is-invalid'
                        );


                        if (confirmFeedback) {

                            confirmFeedback.textContent =
                                '';

                        }


                        if (strengthBar) {

                            strengthBar.style.width =
                                '0%';

                            strengthBar.className =
                                'progress-bar';

                        }


                        if (strengthText) {

                            strengthText.textContent =
                                'Not entered';

                            strengthText.className =
                                'fw-semibold text-secondary';

                        }


                        Object.values(requirements)
                            .forEach(
                                function (element) {

                                    updateRequirement(
                                        element,
                                        false
                                    );

                                }
                            );

                    },
                    0
                );

            }
        );

});
</script>

@endpush

@endsection