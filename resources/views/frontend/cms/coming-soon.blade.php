@extends('layouts.app')

@section('title', 'Coming Soon | Pooja Nilayam')

@section(
    'meta_description',
    'Pooja Nilayam is preparing something special. Stay connected for updates.'
)

@section('content')

{{-- ============================================================
     COMING SOON PAGE
============================================================ --}}

<main
    class="coming-soon-page
           min-vh-100
           d-flex
           align-items-center
           position-relative
           overflow-hidden"
>

    {{-- Decorative Background Elements --}}

    <div
        class="coming-soon-decoration
               coming-soon-decoration-one"
        aria-hidden="true"
    ></div>


    <div
        class="coming-soon-decoration
               coming-soon-decoration-two"
        aria-hidden="true"
    ></div>


    <div
        class="coming-soon-decoration
               coming-soon-decoration-three"
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
                     BRAND / LOGO
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
                            class="coming-soon-logo"
                        >

                    @else

                        <span
                            class="coming-soon-brand
                                   font-serif
                                   text-pn-brown"
                        >

                            Pooja Nilayam

                        </span>

                    @endif

                </a>


                {{-- ==================================================
                     ICON
                =================================================== --}}

                <div
                    class="coming-soon-icon
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
                        class="bi bi-stars fs-2"
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

                    Something Special Is Coming

                </span>


                {{-- ==================================================
                     TITLE
                =================================================== --}}

                <h1
                    class="font-serif
                           display-2
                           text-pn-brown
                           mb-4"
                >

                    Coming Soon

                </h1>


                {{-- ==================================================
                     DESCRIPTION
                =================================================== --}}

                <p
                    class="lead
                           text-secondary
                           lh-lg
                           mb-4
                           mx-auto"
                    style="max-width:680px;"
                >

                    We are preparing a meaningful experience for
                    devotees. Pooja Nilayam will be bringing spiritual,
                    devotional and digital experiences together in
                    one connected platform.

                </p>


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
                        class="coming-soon-line"
                    ></span>


                    <i
                        class="bi bi-flower1
                               text-pn-gold"
                    ></i>


                    <span
                        class="coming-soon-line"
                    ></span>

                </div>


                {{-- ==================================================
                     MESSAGE
                =================================================== --}}

                <p
                    class="text-secondary
                           mb-4"
                >

                    Thank you for your patience and continued
                    support.

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
                     SERVICE LINKS
                =================================================== --}}

                <div
                    class="mt-5"
                >

                    <p
                        class="small
                               text-secondary
                               mb-3"
                    >

                        Explore Pooja Nilayam

                    </p>


                    <div
                        class="d-flex
                               flex-wrap
                               justify-content-center
                               gap-2"
                    >

                        <a
                            href="{{ url('/pooja') }}"
                            class="coming-soon-service-link"
                        >
                            Pooja
                        </a>


                        <a
                            href="{{ url('/digital-pooja') }}"
                            class="coming-soon-service-link"
                        >
                            Digital Pooja
                        </a>


                        <a
                            href="{{ url('/temples') }}"
                            class="coming-soon-service-link"
                        >
                            Temples
                        </a>


                        <a
                            href="{{ url('/astrology') }}"
                            class="coming-soon-service-link"
                        >
                            Astrology
                        </a>


                        <a
                            href="{{ url('/shop') }}"
                            class="coming-soon-service-link"
                        >
                            Pooja Store
                        </a>


                        <a
                            href="{{ url('/donations') }}"
                            class="coming-soon-service-link"
                        >
                            Donations
                        </a>

                    </div>

                </div>


                {{-- ==================================================
                     FOOTER
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

    .coming-soon-page {
        background:
            radial-gradient(
                circle at 15% 20%,
                rgba(201, 155, 77, .12),
                transparent 28%
            ),
            radial-gradient(
                circle at 85% 75%,
                rgba(139, 94, 52, .10),
                transparent 30%
            ),
            #f8f1e4;
    }


    .coming-soon-logo {
        max-width: 190px;
        max-height: 70px;
        width: auto;
        height: auto;
        object-fit: contain;
    }


    .coming-soon-brand {
        font-size: 2rem;
        font-weight: 600;
    }


    .coming-soon-icon {
        width: 76px;
        height: 76px;

        box-shadow:
            0 .75rem 2rem rgba(91, 61, 35, .10);
    }


    .coming-soon-line {
        width: 70px;
        height: 1px;
        background-color: rgba(201, 155, 77, .45);
    }


    .coming-soon-service-link {
        color: #6f6a64;
        background-color: rgba(255, 255, 255, .70);
        border: 1px solid rgba(201, 155, 77, .22);
        border-radius: 999px;
        padding: .45rem .85rem;
        font-size: .875rem;
        text-decoration: none;

        transition:
            background-color .2s ease,
            color .2s ease,
            border-color .2s ease;
    }


    .coming-soon-service-link:hover {
        color: #fff;
        background-color: #8b5e34;
        border-color: #8b5e34;
    }


    .coming-soon-decoration {
        position: absolute;
        border-radius: 50%;
        pointer-events: none;
    }


    .coming-soon-decoration-one {
        width: 260px;
        height: 260px;

        top: -110px;
        left: -110px;

        border: 1px solid
            rgba(201, 155, 77, .20);
    }


    .coming-soon-decoration-two {
        width: 360px;
        height: 360px;

        right: -180px;
        bottom: -180px;

        border: 1px solid
            rgba(139, 94, 52, .14);
    }


    .coming-soon-decoration-three {
        width: 110px;
        height: 110px;

        top: 18%;
        right: 10%;

        background:
            rgba(201, 155, 77, .07);
    }


    @media (max-width: 767.98px) {

        .coming-soon-page {
            padding-top: 3rem;
            padding-bottom: 3rem;
        }


        .coming-soon-logo {
            max-width: 160px;
        }


        .coming-soon-brand {
            font-size: 1.7rem;
        }


        .coming-soon-icon {
            width: 64px;
            height: 64px;
        }


        .coming-soon-line {
            width: 45px;
        }


        .coming-soon-decoration-three {
            right: -25px;
        }

    }

</style>

@endpush

@endsection