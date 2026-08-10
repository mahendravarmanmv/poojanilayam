@extends('layouts.app')

@section('title', 'Careers | Pooja Nilayam')

@section(
    'meta_description',
    'Explore career opportunities with Pooja Nilayam and learn about working with our spiritual and digital platform.'
)

@section('content')

@php

    /*
    |--------------------------------------------------------------------------
    | CAREERS PAGE
    |--------------------------------------------------------------------------
    | The project documentation identifies Careers as a required
    | frontend CMS page.
    |
    | The available project documents do NOT define:
    | - Actual job openings
    | - Job titles
    | - Departments
    | - Salary ranges
    | - Experience requirements
    | - Locations
    | - Application workflow
    |
    | Therefore the UI provides a professional careers structure
    | without inventing business-specific recruitment information.
    |--------------------------------------------------------------------------
    */

    $lastUpdated = 'To be updated by Pooja Nilayam';


    $careerAreas = [

        [
            'icon' => 'bi-code-slash',
            'title' => 'Technology',
            'description' =>
                'Technology roles supporting the digital platform, website, applications and technology-enabled experiences.'
        ],

        [
            'icon' => 'bi-palette',
            'title' => 'Design & Experience',
            'description' =>
                'Design and user-experience roles supporting intuitive and meaningful digital experiences.'
        ],

        [
            'icon' => 'bi-headset',
            'title' => 'Customer Support',
            'description' =>
                'Roles supporting customers across services, bookings, orders and support requests.'
        ],

        [
            'icon' => 'bi-megaphone',
            'title' => 'Marketing & Content',
            'description' =>
                'Roles supporting content, communication, campaigns and digital engagement.'
        ],

        [
            'icon' => 'bi-shop',
            'title' => 'Store & Operations',
            'description' =>
                'Operational roles supporting products, orders, vendors, shipping and related processes.'
        ],

        [
            'icon' => 'bi-flower1',
            'title' => 'Spiritual Services',
            'description' =>
                'Roles supporting the delivery and coordination of spiritual and devotional services.'
        ]

    ];


    $values = [

        [
            'icon' => 'bi-heart',
            'title' => 'Purpose',
            'text' =>
                'Contribute to a platform built around devotional, spiritual and meaningful experiences.'
        ],

        [
            'icon' => 'bi-people',
            'title' => 'Collaboration',
            'text' =>
                'Work across technology, operations, customer experience and service teams.'
        ],

        [
            'icon' => 'bi-lightbulb',
            'title' => 'Innovation',
            'text' =>
                'Help build digital experiences that bring traditional spiritual services into modern platforms.'
        ],

        [
            'icon' => 'bi-person-check',
            'title' => 'Customer Focus',
            'text' =>
                'Keep customer experience and service quality at the center of every interaction.'
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

                <li
                    class="breadcrumb-item active"
                    aria-current="page"
                >
                    Careers
                </li>

            </ol>

        </nav>

    </div>

</section>


{{-- ============================================================
     HERO
============================================================ --}}

<section class="bg-pn-cream py-5 py-lg-6">

    <div class="container">

        <div
            class="row
                   align-items-center
                   justify-content-between
                   g-5"
        >

            <div class="col-12 col-lg-7">

                <span
                    class="small
                           text-pn-gold
                           fw-semibold
                           text-uppercase"
                >
                    Careers at Pooja Nilayam
                </span>


                <h1
                    class="font-serif
                           display-3
                           text-pn-brown
                           mt-2
                           mb-4"
                >

                    Build Something
                    <span class="text-pn-primary">
                        Meaningful
                    </span>

                </h1>


                <p
                    class="lead
                           text-secondary
                           lh-lg
                           mb-4"
                >

                    Be part of a platform bringing spiritual,
                    devotional and digital experiences together
                    through technology and service.

                </p>


                <div
                    class="d-flex
                           flex-wrap
                           gap-2"
                >

                    <a
                        href="#openings"
                        class="btn btn-pn btn-lg"
                    >

                        Explore Opportunities

                        <i
                            class="bi bi-arrow-down ms-1"
                        ></i>

                    </a>


                    <a
                        href="#why-join"
                        class="btn
                               btn-pn-outline
                               btn-lg"
                    >

                        Why Join Us?

                    </a>

                </div>


                <div
                    class="d-flex
                           flex-wrap
                           gap-3
                           mt-4"
                >

                    <span
                        class="small
                               text-secondary"
                    >

                        <i
                            class="bi bi-heart-fill
                                   text-pn-gold
                                   me-1"
                        ></i>

                        Purpose-driven work

                    </span>


                    <span
                        class="small
                               text-secondary"
                    >

                        <i
                            class="bi bi-laptop
                                   text-pn-gold
                                   me-1"
                        ></i>

                        Digital innovation

                    </span>


                    <span
                        class="small
                               text-secondary"
                    >

                        <i
                            class="bi bi-people
                                   text-pn-gold
                                   me-1"
                        ></i>

                        Collaborative culture

                    </span>

                </div>

            </div>


            <div class="col-12 col-lg-5">

                <div
                    class="position-relative"
                >

                    <div
                        class="career-hero-card
                               bg-white
                               rounded-5
                               border
                               border-warning-subtle
                               p-4
                               p-md-5"
                    >

                        <div
                            class="career-hero-icon
                                   rounded-circle
                                   bg-pn-cream
                                   text-pn-primary
                                   d-flex
                                   align-items-center
                                   justify-content-center
                                   mb-4"
                            style="width:72px;height:72px;"
                        >

                            <i
                                class="bi bi-stars fs-3"
                            ></i>

                        </div>


                        <span
                            class="small
                                   text-pn-gold
                                   fw-semibold
                                   text-uppercase"
                        >
                            Our Opportunity
                        </span>


                        <h2
                            class="font-serif
                                   h3
                                   text-pn-brown
                                   mt-2
                                   mb-3"
                        >

                            Grow with a
                            Purpose-Driven Platform

                        </h2>


                        <p
                            class="text-secondary
                                   mb-0"
                        >

                            Explore opportunities across technology,
                            design, operations, customer experience,
                            content and spiritual services.

                        </p>

                    </div>


                    <div
                        class="career-floating-card
                               bg-pn-primary
                               text-white
                               rounded-4
                               p-3
                               position-absolute"
                    >

                        <i
                            class="bi bi-people-fill me-1"
                        ></i>

                        People First

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- ============================================================
     WHY JOIN US
============================================================ --}}

<section
    id="why-join"
    class="py-5"
>

    <div class="container">

        <div
            class="row
                   justify-content-center
                   text-center
                   mb-5"
        >

            <div class="col-12 col-lg-8">

                <span
                    class="small
                           text-pn-gold
                           fw-semibold
                           text-uppercase"
                >
                    Why Pooja Nilayam
                </span>


                <h2
                    class="font-serif
                           display-6
                           text-pn-brown
                           mt-2
                           mb-3"
                >

                    Work With Purpose

                </h2>


                <p
                    class="text-secondary
                           mb-0"
                >

                    Build technology and services that help people
                    connect with spiritual and devotional experiences
                    in meaningful ways.

                </p>

            </div>

        </div>


        <div
            class="row
                   row-cols-1
                   row-cols-md-2
                   row-cols-lg-4
                   g-4"
        >

            @foreach($values as $value)

                <div class="col">

                    <article
                        class="card
                               border
                               border-warning-subtle
                               rounded-5
                               h-100"
                    >

                        <div
                            class="card-body
                                   p-4"
                        >

                            <span
                                class="d-inline-flex
                                       align-items-center
                                       justify-content-center
                                       rounded-circle
                                       bg-pn-cream
                                       text-pn-primary
                                       mb-4"
                                style="width:56px;height:56px;"
                            >

                                <i
                                    class="bi {{ $value['icon'] }}
                                           fs-5"
                                ></i>

                            </span>


                            <h3
                                class="font-serif
                                       h5
                                       text-pn-brown
                                       mb-2"
                            >

                                {{ $value['title'] }}

                            </h3>


                            <p
                                class="small
                                       text-secondary
                                       mb-0
                                       lh-lg"
                            >

                                {{ $value['text'] }}

                            </p>

                        </div>

                    </article>

                </div>

            @endforeach

        </div>

    </div>

</section>


{{-- ============================================================
     CAREER AREAS
============================================================ --}}

<section
    id="openings"
    class="bg-pn-beige py-5"
>

    <div class="container">

        <div
            class="row
                   align-items-end
                   g-4
                   mb-5"
        >

            <div class="col-12 col-lg-8">

                <span
                    class="small
                           text-pn-gold
                           fw-semibold
                           text-uppercase"
                >
                    Career Areas
                </span>


                <h2
                    class="font-serif
                           display-6
                           text-pn-brown
                           mt-2
                           mb-3"
                >

                    Find Your Place

                </h2>


                <p
                    class="text-secondary
                           mb-0"
                >

                    Explore the areas that contribute to the Pooja
                    Nilayam platform and its customer experiences.

                </p>

            </div>


            <div
                class="col-12 col-lg-4 text-lg-end"
            >

                <span
                    class="badge
                           bg-white
                           text-pn-primary
                           border
                           border-warning-subtle
                           rounded-pill
                           px-3
                           py-2"
                >

                    Career Opportunities

                </span>

            </div>

        </div>


        <div
            class="row
                   row-cols-1
                   row-cols-md-2
                   row-cols-lg-3
                   g-4"
        >

            @foreach($careerAreas as $area)

                <div class="col">

                    <article
                        class="card
                               bg-white
                               border
                               border-warning-subtle
                               rounded-5
                               h-100
                               career-area-card"
                    >

                        <div
                            class="card-body
                                   p-4
                                   p-lg-5"
                        >

                            <div
                                class="d-flex
                                       justify-content-between
                                       align-items-start
                                       mb-4"
                            >

                                <span
                                    class="d-inline-flex
                                           align-items-center
                                           justify-content-center
                                           rounded-4
                                           bg-pn-cream
                                           text-pn-primary"
                                    style="width:58px;height:58px;"
                                >

                                    <i
                                        class="bi {{ $area['icon'] }}
                                               fs-5"
                                    ></i>

                                </span>


                                <i
                                    class="bi bi-arrow-up-right
                                           text-pn-gold"
                                ></i>

                            </div>


                            <h3
                                class="font-serif
                                       h5
                                       text-pn-brown
                                       mb-3"
                            >

                                {{ $area['title'] }}

                            </h3>


                            <p
                                class="small
                                       text-secondary
                                       lh-lg
                                       mb-0"
                            >

                                {{ $area['description'] }}

                            </p>

                        </div>

                    </article>

                </div>

            @endforeach

        </div>

    </div>

</section>


{{-- ============================================================
     OUR WORK
============================================================ --}}

<section class="py-5">

    <div class="container">

        <div
            class="row
                   align-items-center
                   g-5"
        >

            <div class="col-12 col-lg-6">

                <span
                    class="small
                           text-pn-gold
                           fw-semibold
                           text-uppercase"
                >
                    What We Build
                </span>


                <h2
                    class="font-serif
                           display-6
                           text-pn-brown
                           mt-2
                           mb-4"
                >

                    Technology Meets
                    Spiritual Experience

                </h2>


                <p
                    class="text-secondary
                           lh-lg"
                >

                    Pooja Nilayam is designed as a comprehensive
                    platform bringing together spiritual services,
                    digital experiences, temple services, astrology,
                    devotional content, donations, a Pooja Store and
                    customer support.

                </p>


                <p
                    class="text-secondary
                           lh-lg
                           mb-0"
                >

                    Our teams work across these experiences to create
                    a connected and accessible platform for devotees.

                </p>

            </div>


            <div class="col-12 col-lg-6">

                <div
                    class="row
                           row-cols-2
                           g-3"
                >

                    @foreach([

                        [
                            'icon' => 'bi-flower1',
                            'title' => 'Pooja Services'
                        ],

                        [
                            'icon' => 'bi-stars',
                            'title' => 'Digital Pooja'
                        ],

                        [
                            'icon' => 'bi-moon-stars',
                            'title' => 'Astrology'
                        ],

                        [
                            'icon' => 'bi-shop',
                            'title' => 'Pooja Store'
                        ],

                        [
                            'icon' => 'bi-gift',
                            'title' => 'Donations'
                        ],

                        [
                            'icon' => 'bi-headset',
                            'title' => 'Customer Support'
                        ]

                    ] as $item)

                        <div class="col">

                            <div
                                class="bg-pn-cream
                                       rounded-4
                                       p-4
                                       h-100"
                            >

                                <i
                                    class="bi {{ $item['icon'] }}
                                           text-pn-primary
                                           fs-4"
                                ></i>


                                <span
                                    class="d-block
                                           text-pn-brown
                                           fw-semibold
                                           mt-3"
                                >

                                    {{ $item['title'] }}

                                </span>

                            </div>

                        </div>

                    @endforeach

                </div>

            </div>

        </div>

    </div>

</section>


{{-- ============================================================
     APPLICATION CTA
============================================================ --}}

<section class="bg-pn-primary py-5">

    <div class="container">

        <div
            class="row
                   justify-content-center
                   text-center"
        >

            <div class="col-12 col-lg-8">

                <i
                    class="bi bi-envelope-paper
                           text-pn-gold
                           fs-1"
                ></i>


                <h2
                    class="font-serif
                           display-6
                           text-white
                           mt-3
                           mb-3"
                >

                    Interested in Joining Us?

                </h2>


                <p
                    class="text-white-50
                           lh-lg
                           mb-4"
                >

                    If you would like to explore opportunities with
                    Pooja Nilayam, contact our team or submit your
                    details through the approved careers process.

                </p>


                <div
                    class="d-flex
                           flex-wrap
                           justify-content-center
                           gap-2"
                >

                    <a
                        href="{{ url('/contact-us') }}"
                        class="btn
                               btn-warning
                               text-dark
                               px-4"
                    >

                        Contact Us

                        <i
                            class="bi bi-arrow-right ms-1"
                        ></i>

                    </a>


                    <a
                        href="{{ url('/raise-ticket') }}"
                        class="btn
                               btn-outline-light
                               px-4"
                    >

                        Submit Enquiry

                    </a>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- ============================================================
     CAREER FAQ / INFORMATION
============================================================ --}}

<section class="py-5">

    <div class="container">

        <div
            class="row
                   justify-content-center"
        >

            <div class="col-12 col-lg-9">

                <div
                    class="text-center
                           mb-4"
                >

                    <span
                        class="small
                               text-pn-gold
                               fw-semibold
                               text-uppercase"
                    >
                        Careers Information
                    </span>


                    <h2
                        class="font-serif
                               h2
                               text-pn-brown
                               mt-2"
                    >

                        Frequently Asked Questions

                    </h2>

                </div>


                <div
                    class="accordion
                           accordion-flush"
                    id="careersAccordion"
                >


                    {{-- FAQ 1 --}}

                    <div
                        class="accordion-item
                               border
                               border-warning-subtle
                               rounded-4
                               mb-3
                               overflow-hidden"
                    >

                        <h3
                            class="accordion-header"
                        >

                            <button
                                class="accordion-button
                                       collapsed
                                       bg-white
                                       text-pn-brown
                                       fw-semibold"
                                type="button"
                                data-bs-toggle="collapse"
                                data-bs-target="#careerFaqOne"
                                aria-expanded="false"
                                aria-controls="careerFaqOne"
                            >

                                What types of roles are available?

                            </button>

                        </h3>


                        <div
                            id="careerFaqOne"
                            class="accordion-collapse
                                   collapse"
                            data-bs-parent="#careersAccordion"
                        >

                            <div
                                class="accordion-body
                                       text-secondary"
                            >

                                Career opportunities may span
                                technology, design, customer support,
                                marketing and content, store and
                                operations, and spiritual services.
                                Specific openings should be published
                                through the approved Careers CMS
                                content.

                            </div>

                        </div>

                    </div>


                    {{-- FAQ 2 --}}

                    <div
                        class="accordion-item
                               border
                               border-warning-subtle
                               rounded-4
                               mb-3
                               overflow-hidden"
                    >

                        <h3
                            class="accordion-header"
                        >

                            <button
                                class="accordion-button
                                       collapsed
                                       bg-white
                                       text-pn-brown
                                       fw-semibold"
                                type="button"
                                data-bs-toggle="collapse"
                                data-bs-target="#careerFaqTwo"
                                aria-expanded="false"
                                aria-controls="careerFaqTwo"
                            >

                                Where are current openings published?

                            </button>

                        </h3>


                        <div
                            id="careerFaqTwo"
                            class="accordion-collapse
                                   collapse"
                            data-bs-parent="#careersAccordion"
                        >

                            <div
                                class="accordion-body
                                       text-secondary"
                            >

                                The current project documents do not
                                define a specific recruitment or job
                                listing system. Current openings
                                should therefore be published through
                                the approved Careers page/CMS process.

                            </div>

                        </div>

                    </div>


                    {{-- FAQ 3 --}}

                    <div
                        class="accordion-item
                               border
                               border-warning-subtle
                               rounded-4
                               mb-3
                               overflow-hidden"
                    >

                        <h3
                            class="accordion-header"
                        >

                            <button
                                class="accordion-button
                                       collapsed
                                       bg-white
                                       text-pn-brown
                                       fw-semibold"
                                type="button"
                                data-bs-toggle="collapse"
                                data-bs-target="#careerFaqThree"
                                aria-expanded="false"
                                aria-controls="careerFaqThree"
                            >

                                How can I contact the team about a role?

                            </button>

                        </h3>


                        <div
                            id="careerFaqThree"
                            class="accordion-collapse
                                   collapse"
                            data-bs-parent="#careersAccordion"
                        >

                            <div
                                class="accordion-body
                                       text-secondary"
                            >

                                Until a dedicated recruitment
                                workflow is defined, visitors can
                                use the Contact Us page to enquire
                                about career opportunities.

                            </div>

                        </div>

                    </div>


                    {{-- FAQ 4 --}}

                    <div
                        class="accordion-item
                               border
                               border-warning-subtle
                               rounded-4
                               overflow-hidden"
                    >

                        <h3
                            class="accordion-header"
                        >

                            <button
                                class="accordion-button
                                       collapsed
                                       bg-white
                                       text-pn-brown
                                       fw-semibold"
                                type="button"
                                data-bs-toggle="collapse"
                                data-bs-target="#careerFaqFour"
                                aria-expanded="false"
                                aria-controls="careerFaqFour"
                            >

                                Will specific job requirements be shown?

                            </button>

                        </h3>


                        <div
                            id="careerFaqFour"
                            class="accordion-collapse
                                   collapse"
                            data-bs-parent="#careersAccordion"
                        >

                            <div
                                class="accordion-body
                                       text-secondary"
                            >

                                Yes, once actual job openings and
                                recruitment requirements are defined,
                                the approved Careers content can
                                include role-specific qualifications,
                                experience and application information.

                            </div>

                        </div>

                    </div>


                </div>

            </div>

        </div>

    </div>

</section>


{{-- ============================================================
     CMS / CONTENT NOTICE
============================================================ --}}

<section class="bg-pn-cream py-4">

    <div class="container">

        <div
            class="d-flex
                   flex-column
                   flex-md-row
                   justify-content-between
                   align-items-md-center
                   gap-3"
        >

            <div>

                <small
                    class="text-secondary"
                >

                    Careers content is intended to be maintained
                    through the approved CMS process.

                </small>

            </div>


            <a
                href="{{ url('/contact-us') }}"
                class="btn
                       btn-sm
                       btn-pn-outline"
            >

                Contact Us

                <i
                    class="bi bi-arrow-right ms-1"
                ></i>

            </a>

        </div>

    </div>

</section>


{{-- ============================================================
     PAGE-SPECIFIC STYLE
============================================================ --}}

@push('styles')

<style>

    .career-hero-card {
        box-shadow:
            0 1rem 3rem rgba(91, 61, 35, .08);
    }


    .career-hero-icon {
        box-shadow:
            0 .5rem 1.5rem rgba(91, 61, 35, .08);
    }


    .career-floating-card {
        right: -12px;
        bottom: 24px;
        box-shadow:
            0 .75rem 2rem rgba(91, 61, 35, .16);
    }


    .career-area-card {
        transition:
            transform .2s ease,
            box-shadow .2s ease;
    }


    .career-area-card:hover {
        transform: translateY(-4px);

        box-shadow:
            0 1rem 2.5rem rgba(91, 61, 35, .08);
    }


    .accordion-button:not(.collapsed) {
        background-color: #f8f1e4;
        color: #7a4d2a;
        box-shadow: none;
    }


    .accordion-button:focus {
        box-shadow:
            0 0 0 .15rem
            rgba(201, 155, 77, .15);
    }


    @media (max-width: 991.98px) {

        .career-floating-card {
            right: 12px;
            bottom: 18px;
        }

    }


    @media (max-width: 575.98px) {

        .career-floating-card {
            position: static !important;
            display: inline-block;
            margin-top: 16px;
        }

    }

</style>

@endpush


@endsection