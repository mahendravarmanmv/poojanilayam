@extends('layouts.app')

@section('title', '403 - Access Forbidden | Pooja Nilayam')

@section(
    'meta_description',
    'You do not have permission to access this page on Pooja Nilayam.'
)

@section('content')

{{-- ============================================================
     403 FORBIDDEN PAGE
============================================================ --}}

<main
    class="error-page
           error-403-page
           min-vh-100
           d-flex
           align-items-center
           position-relative
           overflow-hidden"
>

    {{-- Decorative Background Elements --}}

    <div
        class="error-decoration
               error-decoration-one"
        aria-hidden="true"
    ></div>


    <div
        class="error-decoration
               error-decoration-two"
        aria-hidden="true"
    ></div>


    <div
        class="error-decoration
               error-decoration-three"
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
                        class="bi bi-shield-lock fs-2"
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
                >

                    403

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

                    Access Forbidden

                </h1>


                {{-- ==================================================
                     MESSAGE
                =================================================== --}}

                <p
                    class="lead
                           text-secondary
                           lh-lg
                           mx-auto
                           mb-4"
                    style="max-width:650px;"
                >

                    You do not have permission to access this page
                    or resource.

                </p>


                <p
                    class="small
                           text-secondary
                           mx-auto
                           mb-4"
                    style="max-width:600px;"
                >

                    Please make sure you are signed in with an account
                    that has the required access, or return to the
                    homepage and continue browsing.

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

                    <a
                        href="{{ route('home') }}"
                        class="btn
                               btn-pn
                               btn-lg
                               px-4"
                    >

                        <i
                            class="bi bi-house me-1"
                        ></i>

                        Back to Home

                    </a>


                    @auth

                        <a
                            href="{{ url('/dashboard') }}"
                            class="btn
                                   btn-pn-outline
                                   btn-lg
                                   px-4"
                        >

                            <i
                                class="bi bi-person-circle me-1"
                            ></i>

                            My Account

                        </a>

                    @else

                        <a
                            href="{{ url('/login') }}"
                            class="btn
                                   btn-pn-outline
                                   btn-lg
                                   px-4"
                        >

                            <i
                                class="bi bi-box-arrow-in-right me-1"
                            ></i>

                            Sign In

                        </a>

                    @endauth

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

                        If you believe you should have access to this
                        resource, please contact our support team.

                    </p>


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