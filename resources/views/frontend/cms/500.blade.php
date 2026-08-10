@extends('layouts.app')

@section('title', '500 - Server Error | Pooja Nilayam')

@section(
    'meta_description',
    'Something went wrong while processing your request. Please try again later.'
)

@section('content')

{{-- ============================================================
     500 SERVER ERROR PAGE
============================================================ --}}

<main
    class="error-page
           min-vh-100
           d-flex
           align-items-center
           position-relative
           overflow-hidden"
>

    {{-- Decorative Background Elements --}}

    <div
        class="error-decoration error-decoration-one"
        aria-hidden="true"
    ></div>


    <div
        class="error-decoration error-decoration-two"
        aria-hidden="true"
    ></div>


    <div
        class="error-decoration error-decoration-three"
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

                <a
                    href="{{ route('home') }}"
                    class="d-inline-flex
                           align-items-center
                           justify-content-center
                           text-decoration-none
                           mb-4"
                    aria-label="Pooja Nilayam Home"
                >

                    @if(
                        file_exists(
                            public_path('images/logo.png')
                        )
                    )

                        <img
                            src="{{ asset('images/logo.png') }}"
                            alt="Pooja Nilayam"
                            class="error-logo"
                        >

                    @else

                        <span
                            class="error-brand
                                   font-serif
                                   text-pn-brown"
                        >

                            Pooja Nilayam

                        </span>

                    @endif

                </a>


                {{-- ==================================================
                     ERROR ICON
                =================================================== --}}

                <div
                    class="error-icon
                           bg-white
                           text-pn-primary
                           rounded-circle
                           d-inline-flex
                           align-items-center
                           justify-content-center
                           mb-4"
                    aria-hidden="true"
                >

                    <i
                        class="bi bi-exclamation-triangle fs-2"
                    ></i>

                </div>


                {{-- ==================================================
                     ERROR CODE
                =================================================== --}}

                <div
                    class="error-code
                           font-serif
                           text-pn-gold
                           fw-semibold"
                    aria-hidden="true"
                >

                    500

                </div>


                {{-- ==================================================
                     TITLE
                =================================================== --}}

                <h1
                    class="font-serif
                           display-5
                           text-pn-brown
                           mt-2
                           mb-3"
                >

                    Something Went Wrong

                </h1>


                {{-- ==================================================
                     MESSAGE
                =================================================== --}}

                <p
                    class="lead
                           text-secondary
                           lh-lg
                           mx-auto
                           mb-3"
                    style="max-width:680px;"
                >

                    We couldn't complete your request right now.

                </p>


                <p
                    class="small
                           text-secondary
                           mx-auto
                           mb-4"
                    style="max-width:620px;"
                >

                    Please try again in a moment. If the problem
                    continues, our support team can help you.

                </p>


                {{-- ==================================================
                     STATUS CARD
                =================================================== --}}

                <div
                    class="error-status-card
                           bg-white
                           border
                           border-warning-subtle
                           rounded-5
                           p-4
                           mb-4
                           text-start"
                >

                    <div
                        class="d-flex
                               align-items-center
                               gap-3"
                    >

                        <span
                            class="error-status-icon
                                   rounded-circle
                                   bg-warning-subtle
                                   text-warning-emphasis
                                   d-flex
                                   align-items-center
                                   justify-content-center"
                            style="width:48px;height:48px;"
                        >

                            <i
                                class="bi bi-arrow-repeat"
                            ></i>

                        </span>


                        <div>

                            <strong
                                class="d-block
                                       text-pn-brown
                                       mb-1"
                            >

                                Please Try Again

                            </strong>


                            <small
                                class="text-secondary"
                            >

                                The issue may be temporary. You can
                                retry the request or return to the
                                homepage.

                            </small>

                        </div>

                    </div>

                </div>


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
                        href="{{ route('home') }}"
                        class="btn
                               btn-pn-outline
                               btn-lg
                               px-4"
                    >

                        <i
                            class="bi bi-house me-1"
                        ></i>

                        Back to Home

                    </a>

                </div>


                {{-- ==================================================
                     SUPPORT
                =================================================== --}}

                <div
                    class="mt-5
                           pt-4
                           border-top
                           border-warning-subtle"
                >

                    <p
                        class="small
                               text-secondary
                               mb-2"
                    >

                        If the problem continues, please contact
                        Pooja Nilayam Support.

                    </p>


                    <a
                        href="{{ url('/contact-us') }}"
                        class="small
                               fw-semibold
                               text-pn-primary
                               text-decoration-none"
                    >

                        Contact Support

                        <i
                            class="bi bi-arrow-right ms-1"
                        ></i>

                    </a>

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

    .error-page {
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


    .error-logo {
        max-width: 190px;
        max-height: 70px;
        width: auto;
        height: auto;
        object-fit: contain;
    }


    .error-brand {
        font-size: 2rem;
        font-weight: 600;
    }


    .error-icon {
        width: 76px;
        height: 76px;

        box-shadow:
            0 .75rem 2rem rgba(91, 61, 35, .10);
    }


    .error-code {
        font-size: clamp(
            4rem,
            10vw,
            7rem
        );

        line-height: 1;

        letter-spacing: .04em;
    }


    .error-status-card {
        box-shadow:
            0 .75rem 2rem rgba(91, 61, 35, .06);
    }


    .error-decoration {
        position: absolute;
        border-radius: 50%;
        pointer-events: none;
    }


    .error-decoration-one {
        width: 260px;
        height: 260px;

        top: -110px;
        left: -110px;

        border: 1px solid
            rgba(201, 155, 77, .20);
    }


    .error-decoration-two {
        width: 360px;
        height: 360px;

        right: -180px;
        bottom: -180px;

        border: 1px solid
            rgba(139, 94, 52, .14);
    }


    .error-decoration-three {
        width: 110px;
        height: 110px;

        top: 20%;
        right: 10%;

        background:
            rgba(201, 155, 77, .07);
    }


    @media (max-width: 767.98px) {

        .error-page {
            padding-top: 3rem;
            padding-bottom: 3rem;
        }


        .error-logo {
            max-width: 160px;
        }


        .error-brand {
            font-size: 1.7rem;
        }


        .error-icon {
            width: 64px;
            height: 64px;
        }


        .error-decoration-three {
            right: -25px;
        }

    }

</style>

@endpush

@endsection