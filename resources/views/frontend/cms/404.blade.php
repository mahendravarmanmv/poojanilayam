@extends('layouts.app')

@section('title', '404 - Page Not Found | Pooja Nilayam')

@section(
    'meta_description',
    'The page you are looking for could not be found on Pooja Nilayam.'
)

@section('content')

{{-- ============================================================
     404 PAGE NOT FOUND
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

            <div class="col-12 col-md-10 col-lg-9 col-xl-8">


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
                        class="bi bi-compass fs-2"
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

                    404

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

                    Page Not Found

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

                    The page you're looking for could not be found.

                </p>


                <p
                    class="small
                           text-secondary
                           mx-auto
                           mb-4"
                    style="max-width:620px;"
                >

                    The link may be incorrect, the page may have moved,
                    or the requested content may no longer be available.

                </p>


                {{-- ==================================================
                     SEARCH
                =================================================== --}}

                <form
                    action="{{ route('search') }}"
                    method="GET"
                    class="error-search-form
                           mx-auto
                           mb-4"
                    style="max-width:620px;"
                >

                    <label
                        for="errorSearch"
                        class="visually-hidden"
                    >
                        Search Pooja Nilayam
                    </label>


                    <div
                        class="input-group
                               input-group-lg"
                    >

                        <span
                            class="input-group-text
                                   bg-white
                                   border-end-0
                                   border-warning-subtle"
                        >

                            <i
                                class="bi bi-search
                                       text-pn-primary"
                            ></i>

                        </span>


                        <input
                            type="search"
                            id="errorSearch"
                            name="q"
                            class="form-control
                                   border-start-0
                                   border-end-0
                                   border-warning-subtle"
                            placeholder="Search Pooja Nilayam..."
                            autocomplete="off"
                        >


                        <button
                            type="submit"
                            class="btn btn-pn"
                        >

                            Search

                        </button>

                    </div>

                </form>


                {{-- ==================================================
                     PRIMARY ACTIONS
                =================================================== --}}

                <div
                    class="d-flex
                           flex-wrap
                           justify-content-center
                           gap-2
                           mb-5"
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
                     POPULAR DESTINATIONS
                =================================================== --}}

                <div
                    class="pt-4
                           border-top
                           border-warning-subtle"
                >

                    <p
                        class="small
                               text-secondary
                               mb-3"
                    >

                        You may want to explore

                    </p>


                    <div
                        class="row
                               row-cols-2
                               row-cols-md-3
                               g-2
                               g-md-3"
                    >

                        @foreach([

                            [
                                'icon' => 'bi-flower1',
                                'title' => 'Pooja',
                                'url' => '/pooja'
                            ],

                            [
                                'icon' => 'bi-stars',
                                'title' => 'Digital Pooja',
                                'url' => '/digital-pooja'
                            ],

                            [
                                'icon' => 'bi-building',
                                'title' => 'Temples',
                                'url' => '/temples'
                            ],

                            [
                                'icon' => 'bi-moon-stars',
                                'title' => 'Astrology',
                                'url' => '/astrology'
                            ],

                            [
                                'icon' => 'bi-shop',
                                'title' => 'Pooja Store',
                                'url' => '/shop'
                            ],

                            [
                                'icon' => 'bi-gift',
                                'title' => 'Donations',
                                'url' => '/donations'
                            ]

                        ] as $destination)

                            <div class="col">

                                <a
                                    href="{{ url($destination['url']) }}"
                                    class="error-destination
                                           d-flex
                                           align-items-center
                                           justify-content-center
                                           gap-2
                                           text-decoration-none
                                           rounded-4
                                           bg-white
                                           border
                                           border-warning-subtle
                                           p-3"
                                >

                                    <i
                                        class="bi {{ $destination['icon'] }}
                                               text-pn-primary"
                                    ></i>


                                    <span
                                        class="small
                                               fw-semibold
                                               text-pn-brown"
                                    >

                                        {{ $destination['title'] }}

                                    </span>

                                </a>

                            </div>

                        @endforeach

                    </div>

                </div>


                {{-- ==================================================
                     SUPPORT
                =================================================== --}}

                <div
                    class="mt-5"
                >

                    <p
                        class="small
                               text-secondary
                               mb-2"
                    >

                        Still can't find what you need?

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


    .error-search-form {
        position: relative;
    }


    .error-search-form
    .form-control:focus {

        border-color:
            rgba(201, 155, 77, .55);

        box-shadow:
            0 0 0 .15rem
            rgba(201, 155, 77, .12);

    }


    .error-destination {
        transition:
            transform .2s ease,
            background-color .2s ease,
            box-shadow .2s ease;
    }


    .error-destination:hover {

        transform: translateY(-2px);

        background-color:
            #f8f1e4 !important;

        box-shadow:
            0 .5rem 1.5rem
            rgba(91, 61, 35, .07);

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


    @media (max-width: 575.98px) {

        .error-search-form
        .input-group {

            flex-wrap: wrap;

        }


        .error-search-form
        .input-group-text {

            border-right: 0 !important;

        }


        .error-search-form
        .form-control {

            min-width: 0;

        }


        .error-search-form
        .btn {

            width: 100%;
            margin-top: .5rem;
            border-radius: .5rem !important;

        }

    }

</style>

@endpush

@endsection