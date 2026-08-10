@extends('layouts.app')

@section('title', 'Address Book | Pooja Nilayam')

@section(
    'meta_description',
    'Manage your saved addresses for Pooja Nilayam bookings and orders.'
)

@section('content')

@php

    /*
    |--------------------------------------------------------------------------
    | TEMPORARY UI DATA
    |--------------------------------------------------------------------------
    | These values will later come from the authenticated user's
    | saved addresses.
    |--------------------------------------------------------------------------
    */

    $addresses = [

        [
            'id' => 1,
            'type' => 'Home',
            'name' => 'Mahendra Varma',
            'mobile' => '+91 XXXXX XXXXX',
            'address_line_1' => 'Flat 201, Example Residency',
            'address_line_2' => 'Pragathi Nagar',
            'city' => 'Hyderabad',
            'state' => 'Telangana',
            'pincode' => '500090',
            'is_default' => true
        ],

        [
            'id' => 2,
            'type' => 'Office',
            'name' => 'Mahendra Varma',
            'mobile' => '+91 XXXXX XXXXX',
            'address_line_1' => 'Business Park, Main Road',
            'address_line_2' => 'Kukatpally',
            'city' => 'Hyderabad',
            'state' => 'Telangana',
            'pincode' => '500072',
            'is_default' => false
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
                        My Dashboard
                    </a>

                </li>


                <li
                    class="breadcrumb-item active"
                    aria-current="page"
                >
                    Address Book
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
                    Address Book
                </h1>


                <p
                    class="text-secondary
                           mb-0"
                >
                    Manage your saved addresses for faster and
                    easier bookings and checkout.
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

                    <i class="bi bi-plus-lg me-2"></i>

                    Add New Address

                </a>

            </div>

        </div>

    </div>

</section>


{{-- ============================================================
     ADDRESS CONTENT
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

                    {{-- User --}}

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


                    {{-- Navigation --}}

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
                                   active
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
                 MAIN ADDRESS CONTENT
            ===================================================== --}}

            <div class="col-12 col-lg-9">

                {{-- ==================================================
                     INFORMATION MESSAGE
                =================================================== --}}

                <div
                    class="alert
                           bg-pn-cream
                           border-0
                           rounded-5
                           p-4
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
                            style="width:46px;height:46px;"
                        >

                            <i class="bi bi-info-circle"></i>

                        </div>


                        <div>

                            <strong
                                class="d-block
                                       text-pn-brown
                                       mb-1"
                            >
                                Your saved addresses
                            </strong>


                            <small class="text-secondary">

                                Save frequently used addresses so
                                you can select them quickly when
                                placing orders or using applicable
                                services.

                            </small>

                        </div>

                    </div>

                </div>


                {{-- ==================================================
                     ADDRESS HEADER
                =================================================== --}}

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
                            Saved Addresses
                        </span>


                        <h2
                            class="font-serif
                                   h3
                                   text-pn-brown
                                   mt-1
                                   mb-0"
                        >
                            Your Addresses
                        </h2>

                    </div>


                    <span
                        class="badge
                               bg-pn-cream
                               text-pn-primary
                               rounded-pill
                               px-3
                               py-2"
                    >

                        {{ count($addresses) }}

                        {{ count($addresses) === 1
                            ? 'Address'
                            : 'Addresses'
                        }}

                    </span>

                </div>


                {{-- ==================================================
                     ADDRESS CARDS
                =================================================== --}}

                <div class="vstack gap-4">

                    @foreach($addresses as $address)

                        <div
                            class="card
                                   border
                                   border-warning-subtle
                                   rounded-5"
                        >

                            <div class="card-body p-4 p-md-5">

                                {{-- Address Header --}}

                                <div
                                    class="d-flex
                                           flex-column
                                           flex-sm-row
                                           align-items-sm-start
                                           justify-content-between
                                           gap-3
                                           mb-4"
                                >

                                    <div
                                        class="d-flex
                                               align-items-center
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

                                            @if(
                                                strtolower(
                                                    $address['type']
                                                ) === 'office'
                                            )

                                                <i
                                                    class="bi bi-building"
                                                ></i>

                                            @else

                                                <i
                                                    class="bi bi-house"
                                                ></i>

                                            @endif

                                        </div>


                                        <div>

                                            <div
                                                class="d-flex
                                                       align-items-center
                                                       flex-wrap
                                                       gap-2"
                                            >

                                                <h3
                                                    class="font-serif
                                                           h4
                                                           text-pn-brown
                                                           mb-0"
                                                >

                                                    {{ $address['type'] }}

                                                </h3>


                                                @if(
                                                    $address['is_default']
                                                )

                                                    <span
                                                        class="badge
                                                               bg-success-subtle
                                                               text-success
                                                               rounded-pill"
                                                    >

                                                        Default

                                                    </span>

                                                @endif

                                            </div>


                                            <small
                                                class="text-secondary"
                                            >

                                                Saved address

                                            </small>

                                        </div>

                                    </div>


                                    {{-- Actions --}}

                                    <div
                                        class="dropdown"
                                    >

                                        <button
                                            type="button"
                                            class="btn
                                                   btn-light
                                                   border
                                                   rounded-circle
                                                   d-flex
                                                   align-items-center
                                                   justify-content-center"
                                            data-bs-toggle="dropdown"
                                            aria-expanded="false"
                                            style="width:42px;height:42px;"
                                            aria-label="Address actions"
                                        >

                                            <i
                                                class="bi bi-three-dots-vertical"
                                            ></i>

                                        </button>


                                        <ul
                                            class="dropdown-menu
                                                   dropdown-menu-end
                                                   shadow-sm
                                                   border-0"
                                        >

                                            <li>

                                                <a
                                                    class="dropdown-item"
                                                    href="#"
                                                >

                                                    <i
                                                        class="bi bi-pencil me-2"
                                                    ></i>

                                                    Edit Address

                                                </a>

                                            </li>


                                            @if(
                                                !$address['is_default']
                                            )

                                                <li>

                                                    <button
                                                        type="button"
                                                        class="dropdown-item
                                                               make-default-address"
                                                        data-address-id="{{ $address['id'] }}"
                                                    >

                                                        <i
                                                            class="bi bi-check-circle me-2"
                                                        ></i>

                                                        Make Default

                                                    </button>

                                                </li>

                                            @endif


                                            <li>

                                                <hr
                                                    class="dropdown-divider"
                                                >

                                            </li>


                                            <li>

                                                <button
                                                    type="button"
                                                    class="dropdown-item
                                                           text-danger
                                                           delete-address"
                                                    data-address-id="{{ $address['id'] }}"
                                                    data-address-type="{{ $address['type'] }}"
                                                >

                                                    <i
                                                        class="bi bi-trash me-2"
                                                    ></i>

                                                    Delete Address

                                                </button>

                                            </li>

                                        </ul>

                                    </div>

                                </div>


                                {{-- Address Information --}}

                                <div
                                    class="row
                                           g-4"
                                >

                                    <div
                                        class="col-12 col-md-8"
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
                                                       align-items-start
                                                       gap-3"
                                            >

                                                <i
                                                    class="bi bi-geo-alt
                                                           text-pn-primary
                                                           fs-5
                                                           mt-1"
                                                ></i>


                                                <div>

                                                    <strong
                                                        class="d-block
                                                               text-pn-brown
                                                               mb-2"
                                                    >

                                                        {{ $address['name'] }}

                                                    </strong>


                                                    <div
                                                        class="small
                                                               text-secondary
                                                               lh-lg"
                                                    >

                                                        {{ $address['address_line_1'] }}

                                                        <br>

                                                        {{ $address['address_line_2'] }}

                                                        <br>

                                                        {{ $address['city'] }},
                                                        {{ $address['state'] }}
                                                        -
                                                        {{ $address['pincode'] }}

                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                    </div>


                                    {{-- Mobile --}}

                                    <div
                                        class="col-12 col-md-4"
                                    >

                                        <div
                                            class="border
                                                   border-warning-subtle
                                                   rounded-4
                                                   p-4
                                                   h-100"
                                        >

                                            <small
                                                class="text-secondary
                                                       d-block
                                                       mb-2"
                                            >
                                                Contact Number
                                            </small>


                                            <div
                                                class="d-flex
                                                       align-items-center
                                                       gap-2"
                                            >

                                                <i
                                                    class="bi bi-phone
                                                           text-pn-primary"
                                                ></i>


                                                <strong
                                                    class="small
                                                           text-pn-brown"
                                                >

                                                    {{ $address['mobile'] }}

                                                </strong>

                                            </div>

                                        </div>

                                    </div>

                                </div>


                                {{-- Default Address Notice --}}

                                @if(
                                    $address['is_default']
                                )

                                    <div
                                        class="border-top
                                               mt-4
                                               pt-4"
                                    >

                                        <div
                                            class="d-flex
                                                   align-items-center
                                                   gap-2"
                                        >

                                            <i
                                                class="bi bi-check-circle-fill
                                                       text-success"
                                            ></i>


                                            <small
                                                class="text-secondary"
                                            >

                                                This is your default
                                                address.

                                            </small>

                                        </div>

                                    </div>

                                @endif

                            </div>

                        </div>

                    @endforeach

                </div>


                {{-- ==================================================
                     ADD ADDRESS CTA
                =================================================== --}}

                <div
                    class="border
                           border-warning-subtle
                           border-dashed
                           rounded-5
                           mt-4
                           p-4
                           p-md-5
                           text-center"
                >

                    <div
                        class="rounded-circle
                               bg-pn-cream
                               text-pn-primary
                               d-flex
                               align-items-center
                               justify-content-center
                               mx-auto
                               mb-3"
                        style="width:60px;height:60px;"
                    >

                        <i class="bi bi-plus-lg fs-5"></i>

                    </div>


                    <h2
                        class="font-serif
                               h4
                               text-pn-brown
                               mb-2"
                    >
                        Add another address
                    </h2>


                    <p
                        class="small
                               text-secondary
                               col-lg-7
                               mx-auto
                               mb-4"
                    >
                        Save another delivery or service address to
                        make future transactions faster.
                    </p>


                    <a
                        href="#"
                        class="btn btn-pn"
                    >

                        <i class="bi bi-plus-lg me-2"></i>

                        Add New Address

                    </a>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- ============================================================
     SECURITY / HELP CTA
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

                        <div
                            class="d-flex
                                   align-items-start
                                   gap-3"
                        >

                            <i
                                class="bi bi-shield-check
                                       text-warning
                                       fs-2"
                            ></i>


                            <div>

                                <span
                                    class="small
                                           text-warning
                                           fw-semibold
                                           text-uppercase"
                                >
                                    Your Privacy Matters
                                </span>


                                <h2
                                    class="font-serif
                                           display-6
                                           mt-2
                                           mb-2"
                                >
                                    Your address information is
                                    kept secure.
                                </h2>


                                <p
                                    class="text-white-50
                                           mb-0"
                                >

                                    Saved addresses are used to make
                                    your bookings and applicable
                                    orders easier to complete.

                                </p>

                            </div>

                        </div>

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

                            Need Help?

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


{{-- ============================================================
     DELETE CONFIRMATION MODAL
============================================================ --}}

<div
    class="modal fade"
    id="deleteAddressModal"
    tabindex="-1"
    aria-labelledby="deleteAddressModalLabel"
    aria-hidden="true"
>

    <div
        class="modal-dialog
               modal-dialog-centered
               modal-sm"
    >

        <div class="modal-content border-0 rounded-5">

            <div class="modal-body p-4 text-center">

                <div
                    class="rounded-circle
                           bg-danger-subtle
                           text-danger
                           d-flex
                           align-items-center
                           justify-content-center
                           mx-auto
                           mb-3"
                    style="width:60px;height:60px;"
                >

                    <i class="bi bi-trash fs-5"></i>

                </div>


                <h2
                    class="font-serif
                           h4
                           text-pn-brown
                           mb-2"
                    id="deleteAddressModalLabel"
                >
                    Delete Address?
                </h2>


                <p
                    class="small
                           text-secondary
                           mb-4"
                    id="deleteAddressMessage"
                >
                    Are you sure you want to delete this address?
                </p>


                <div
                    class="d-flex
                           flex-column
                           flex-sm-row
                           gap-2"
                >

                    <button
                        type="button"
                        class="btn
                               btn-outline-secondary
                               flex-fill"
                        data-bs-dismiss="modal"
                    >
                        Cancel
                    </button>


                    <button
                        type="button"
                        class="btn
                               btn-danger
                               flex-fill"
                        id="confirmDeleteAddress"
                    >
                        Delete
                    </button>

                </div>

            </div>

        </div>

    </div>

</div>


{{-- ============================================================
     PAGE SCRIPT
============================================================ --}}

@push('scripts')

<script>
document.addEventListener('DOMContentLoaded', function () {

    /*
    |--------------------------------------------------------------------------
    | Delete Address
    |--------------------------------------------------------------------------
    */

    const deleteButtons =
        document.querySelectorAll(
            '.delete-address'
        );


    const deleteModalElement =
        document.getElementById(
            'deleteAddressModal'
        );


    const deleteModal =
        deleteModalElement
            ? new bootstrap.Modal(
                deleteModalElement
            )
            : null;


    const deleteMessage =
        document.getElementById(
            'deleteAddressMessage'
        );


    const confirmDelete =
        document.getElementById(
            'confirmDeleteAddress'
        );


    let selectedAddressId =
        null;


    deleteButtons.forEach(
        function (button) {

            button.addEventListener(
                'click',
                function () {

                    selectedAddressId =
                        this.dataset.addressId;


                    const addressType =
                        this.dataset.addressType
                        || 'address';


                    deleteMessage.textContent =
                        'Are you sure you want to delete your ' +
                        addressType.toLowerCase() +
                        ' address?';


                    deleteModal?.show();

                }
            );

        }
    );


    confirmDelete?.addEventListener(
        'click',
        function () {

            if (!selectedAddressId) {

                return;

            }


            /*
            |--------------------------------------------------------------------------
            | Backend delete route will be connected later.
            |--------------------------------------------------------------------------
            */

            this.disabled = true;


            this.innerHTML =
                '<span class="spinner-border spinner-border-sm me-2"></span>' +
                'Deleting...';


            setTimeout(
                function () {

                    deleteModal?.hide();


                    confirmDelete.disabled =
                        false;


                    confirmDelete.innerHTML =
                        'Delete';


                    selectedAddressId =
                        null;

                },
                800
            );

        }
    );


    /*
    |--------------------------------------------------------------------------
    | Make Default Address
    |--------------------------------------------------------------------------
    */

    const defaultButtons =
        document.querySelectorAll(
            '.make-default-address'
        );


    defaultButtons.forEach(
        function (button) {

            button.addEventListener(
                'click',
                function () {

                    /*
                    |--------------------------------------------------------------------------
                    | Backend default-address route will be connected later.
                    |--------------------------------------------------------------------------
                    */

                    const originalHTML =
                        this.innerHTML;


                    this.disabled =
                        true;


                    this.innerHTML =
                        '<span class="spinner-border spinner-border-sm me-2"></span>' +
                        'Updating...';


                    setTimeout(
                        function () {

                            button.disabled =
                                false;


                            button.innerHTML =
                                originalHTML;

                        },
                        800
                    );

                }
            );

        }
    );

});
</script>

@endpush

@endsection