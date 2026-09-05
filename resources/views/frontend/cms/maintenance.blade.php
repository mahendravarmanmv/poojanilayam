@extends('layouts.app')

@section('title', 'Under Maintenance | Pooja Nilayam')

@section(
    'meta_description',
    'Pooja Nilayam is temporarily unavailable while we perform scheduled maintenance.'
)

@section('content')

{{-- ============================================================
     MAINTENANCE PAGE
============================================================ --}}

<main
    class="maintenance-page
           min-vh-100
           d-flex
           align-items-center
           position-relative
           overflow-hidden"
>

    {{-- Decorative Background Elements --}}

    <div
        class="maintenance-decoration
               maintenance-decoration-one"
        aria-hidden="true"
    ></div>


    <div
        class="maintenance-decoration
               maintenance-decoration-two"
        aria-hidden="true"
    ></div>


    <div
        class="maintenance-decoration
               maintenance-decoration-three"
        aria-hidden="true"
    ></div>


    <div class="container position-relative">

        <div
            class="row
                   justify-content-center
                   text-center"
        >

            <div class="col-12 col-md-10 col-lg-8 col-xl-7">


                {{-- ==================================================
                     BRAND
                =================================================== --}}

                <div
                    class="mb-4"
                >

                    @if(
                        file_exists(
                            public_path('images/logo.png')
                        )
                    )

                        <img
                            src="{{ asset('images/logo.png') }}"
                            alt="Pooja Nilayam"
                            class="maintenance-logo"
                        >

                    @else

                        <span
                            class="maintenance-brand
                                   font-serif
                                   text-pn-brown"
                        >

                            Pooja Nilayam

                        </span>

                    @endif

                </div>


                {{-- ==================================================
                     MAINTENANCE ICON
                =================================================== --}}

                <div
                    class="maintenance-icon
                           rounded-circle
                           bg-white
                           text-pn-primary
                           d-inline-flex
                           align-items-center
                           justify-content-center
                           mb-4"
                    aria-hidden="true"
                >

                    <i
                        class="bi bi-tools fs-2"
                    ></i>

                </div>


                {{-- ==================================================
                     STATUS
                =================================================== --}}

                <span
                    class="d-inline-block
                           small
                           text-pn-gold
                           fw-semibold
                           text-uppercase
                           mb-2"
                >

                    Temporarily Unavailable

                </span>


                {{-- ==================================================
                     TITLE
                =================================================== --}}

                <h1
                    class="font-serif
                           display-3
                           text-pn-brown
                           mb-4"
                >

                    We're Performing
                    <span class="text-pn-primary">
                        Maintenance
                    </span>

                </h1>


                {{-- ==================================================
                     DESCRIPTION
                =================================================== --}}

                <p
                    class="lead
                           text-secondary
                           lh-lg
                           mx-auto
                           mb-4"
                    style="max-width:680px;"
                >

                    Pooja Nilayam is temporarily unavailable while
                    we work on the platform. We are making improvements
                    to provide a better experience for our devotees.

                </p>


                {{-- ==================================================
                     STATUS CARD
                =================================================== --}}

                <div
                    class="maintenance-status-card
                           bg-white
                           border
                           border-warning-subtle
                           rounded-5
                           p-4
                           p-md-5
                           mb-4
                           text-start"
                >

                    <div
                        class="d-flex
                               align-items-center
                               gap-3"
                    >

                        <span
                            class="maintenance-status-icon
                                   rounded-circle
                                   bg-success-subtle
                                   text-success
                                   d-flex
                                   align-items-center
                                   justify-content-center"
                            style="width:48px;height:48px;"
                        >

                            <i
                                class="bi bi-check-circle-fill"
                            ></i>

                        </span>


                        <div>

                            <strong
                                class="d-block
                                       text-pn-brown
                                       mb-1"
                            >

                                Maintenance in Progress

                            </strong>


                            <small
                                class="text-secondary"
                            >

                                Our team is working to restore
                                normal service as soon as possible.

                            </small>

                        </div>

                    </div>

                </div>


                {{-- ==================================================
                     DIVIDER
                =================================================== --}}

                <div
                    class="d-flex
                           align-items-center
                           justify-content-center
                           gap-3
                           mb-4"
                    aria-hidden="true"
                >

                    <span
                        class="maintenance-line"
                    ></span>


                    <i
                        class="bi bi-flower1
                               text-pn-gold"
                    ></i>


                    <span
                        class="maintenance-line"
                    ></span>

                </div>


                {{-- ==================================================
                     MESSAGE
                =================================================== --}}

                <p
                    class="text-secondary
                           mb-4"
                >

                    Thank you for your patience and understanding.

                </p>


                {{-- ==================================================
                     ACTIONS
                =================================================== --}}

                <div
                    class="d-flex
                           flex-wrap
                           justify-content-center
                           gap-2"
                >

                    <button
                        type="button"
                        class="btn
                               btn-pn
                               btn-lg
                               px-4"
                        onclick="window.location.reload();"
                    >

                        <i
                            class="bi bi-arrow-clockwise me-1"
                        ></i>

                        Try Again

                    </button>


                    <a
                        href="{{ url('/contact-us') }}"
                        class="btn
                               btn-pn-outline
                               btn-lg
                               px-4"
                    >

                        Contact Us

                    </a>

                </div>


                {{-- ==================================================
                     SUPPORT INFORMATION
                =================================================== --}}

                <div
                    class="mt-5
                           pt-4
                           border-top
                           border-warning-subtle"
                >

                    <div
                        class="d-flex
                               flex-column
                               flex-sm-row
                               justify-content-center
                               align-items-center
                               gap-2"
                    >

                        <span
                            class="small
                                   text-secondary"
                        >

                            Need assistance?

                        </span>


                        <a
                            href="{{ url('/contact-us') }}"
                            class="small
                                   fw-semibold
                                   text-pn-primary
                                   text-decoration-none"
                        >

                            Contact Pooja Nilayam Support

                            <i
                                class="bi bi-arrow-right ms-1"
                            ></i>

                        </a>

                    </div>

                </div>


                {{-- ==================================================
                     FOOTER
                =================================================== --}}

                <div
                    class="mt-4"
                >

                    <p
                        class="small
                               text-secondary
                               mb-0"
                    >

                        © {{ date('Y') }}
                        Pooja Nilayam.
                        All rights reserved.

                    </p>

                </div>

            </div>

        </div>

    </div>

</main>


{{-- ============================================================
     PAGE-SPECIFIC STYLE
============================================================ --}}

@push('styles')

<style>

    .maintenance-page {
        background:
            radial-gradient(
                circle at 12% 18%,
                rgba(201, 155, 77, .12),
                transparent 28%
            ),
            radial-gradient(
                circle at 88% 78%,
                rgba(139, 94, 52, .10),
                transparent 30%
            ),
            #f8f1e4;
    }


    .maintenance-logo {
        max-width: 190px;
        max-height: 70px;
        width: auto;
        height: auto;
        object-fit: contain;
    }


    .maintenance-brand {
        font-size: 2rem;
        font-weight: 600;
    }


    .maintenance-icon {
        width: 76px;
        height: 76px;

        box-shadow:
            0 .75rem 2rem rgba(91, 61, 35, .10);
    }


    .maintenance-status-card {
        box-shadow:
            0 .75rem 2rem rgba(91, 61, 35, .06);
    }


    .maintenance-line {
        width: 70px;
        height: 1px;
        background-color:
            rgba(201, 155, 77, .45);
    }


    .maintenance-decoration {
        position: absolute;
        border-radius: 50%;
        pointer-events: none;
    }


    .maintenance-decoration-one {
        width: 260px;
        height: 260px;

        top: -110px;
        left: -110px;

        border: 1px solid
            rgba(201, 155, 77, .20);
    }


    .maintenance-decoration-two {
        width: 360px;
        height: 360px;

        right: -180px;
        bottom: -180px;

        border: 1px solid
            rgba(139, 94, 52, .14);
    }


    .maintenance-decoration-three {
        width: 110px;
        height: 110px;

        top: 20%;
        right: 10%;

        background:
            rgba(201, 155, 77, .07);
    }


    @media (max-width: 767.98px) {

        .maintenance-page {
            padding-top: 3rem;
            padding-bottom: 3rem;
        }


        .maintenance-logo {
            max-width: 160px;
        }


        .maintenance-brand {
            font-size: 1.7rem;
        }


        .maintenance-icon {
            width: 64px;
            height: 64px;
        }


        .maintenance-line {
            width: 45px;
        }


        .maintenance-decoration-three {
            right: -25px;
        }

    }

</style>

@endpush

@endsection