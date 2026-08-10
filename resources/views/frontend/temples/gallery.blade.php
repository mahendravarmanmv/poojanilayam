@extends('layouts.app')

@section('title', 'Temple Gallery | Pooja Nilayam')

@section(
    'meta_description',
    'Explore the sacred beauty, temple spaces and devotional moments through the Pooja Nilayam Temple Gallery.'
)

@section('content')

@php

    /*
    |--------------------------------------------------------------------------
    | TEMPORARY TEMPLE DATA
    |--------------------------------------------------------------------------
    | These values will later come from the Temple model/controller.
    |--------------------------------------------------------------------------
    */

    $temple = [

        'name' => 'Sri Venkateswara Temple',

        'deity' => 'Lord Venkateswara',

        'location' => 'Tirumala, Andhra Pradesh',

        'image' => 'temple-1.jpg',

        'verified' => true

    ];


    /*
    |--------------------------------------------------------------------------
    | TEMPORARY GALLERY DATA
    |--------------------------------------------------------------------------
    | Actual gallery records will later come from the database.
    |--------------------------------------------------------------------------
    */

    $gallery = [

        [
            'image' => 'temple-1.jpg',
            'title' => 'Temple Entrance',
            'category' => 'Temple',
            'featured' => true
        ],

        [
            'image' => 'temple-2.jpg',
            'title' => 'Sacred Temple View',
            'category' => 'Temple',
            'featured' => true
        ],

        [
            'image' => 'temple-3.jpg',
            'title' => 'Main Shrine',
            'category' => 'Deity',
            'featured' => false
        ],

        [
            'image' => 'temple-4.jpg',
            'title' => 'Devotional Offering',
            'category' => 'Pooja',
            'featured' => false
        ],

        [
            'image' => 'temple-5.jpg',
            'title' => 'Sacred Courtyard',
            'category' => 'Temple',
            'featured' => false
        ],

        [
            'image' => 'temple-6.jpg',
            'title' => 'Evening Darshan',
            'category' => 'Darshan',
            'featured' => true
        ],

        [
            'image' => 'pooja-1.jpg',
            'title' => 'Pooja Ceremony',
            'category' => 'Pooja',
            'featured' => false
        ],

        [
            'image' => 'pooja-2.jpg',
            'title' => 'Devotional Ritual',
            'category' => 'Pooja',
            'featured' => false
        ],

        [
            'image' => 'pooja-3.jpg',
            'title' => 'Sacred Offering',
            'category' => 'Pooja',
            'featured' => false
        ],

        [
            'image' => 'temple-1.jpg',
            'title' => 'Temple Architecture',
            'category' => 'Architecture',
            'featured' => false
        ],

        [
            'image' => 'temple-2.jpg',
            'title' => 'Temple Details',
            'category' => 'Architecture',
            'featured' => false
        ],

        [
            'image' => 'temple-3.jpg',
            'title' => 'Divine Atmosphere',
            'category' => 'Darshan',
            'featured' => false
        ]

    ];


    /*
    |--------------------------------------------------------------------------
    | Gallery Categories
    |--------------------------------------------------------------------------
    */

    $categories = [

        'All',

        'Temple',

        'Deity',

        'Pooja',

        'Darshan',

        'Architecture'

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
                        Temples
                    </a>

                </li>


                <li class="breadcrumb-item">

                    <a
                        href="#"
                        class="text-pn-primary"
                    >
                        {{ $temple['name'] }}
                    </a>

                </li>


                <li
                    class="breadcrumb-item active"
                    aria-current="page"
                >
                    Gallery
                </li>

            </ol>

        </nav>

    </div>

</section>


{{-- ============================================================
     GALLERY HERO
============================================================ --}}

<section class="bg-pn-cream py-5">

    <div class="container">

        <div
            class="row
                   justify-content-center
                   text-center"
        >

            <div class="col-12 col-lg-9">

                @if($temple['verified'])

                    <span
                        class="badge
                               rounded-pill
                               bg-success-subtle
                               text-success-emphasis
                               border
                               border-success-subtle
                               px-3
                               py-2"
                    >

                        <i
                            class="bi bi-patch-check-fill me-1"
                        ></i>

                        Verified Temple

                    </span>

                @endif


                <h1
                    class="font-serif
                           display-4
                           text-pn-brown
                           mt-3
                           mb-3"
                >

                    {{ $temple['name'] }}

                    <span class="d-block">
                        Temple Gallery
                    </span>

                </h1>


                <p
                    class="lead
                           text-secondary
                           col-lg-9
                           mx-auto
                           mb-4"
                >

                    Explore the sacred spaces, devotional moments
                    and visual beauty of this temple.

                </p>


                <div
                    class="d-flex
                           justify-content-center
                           align-items-center
                           flex-wrap
                           gap-3
                           small
                           text-secondary"
                >

                    <span>

                        <i
                            class="bi bi-geo-alt
                                   text-pn-primary
                                   me-1"
                        ></i>

                        {{ $temple['location'] }}

                    </span>


                    <span class="text-warning">
                        •
                    </span>


                    <span>

                        <i
                            class="bi bi-images
                                   text-pn-primary
                                   me-1"
                        ></i>

                        {{ count($gallery) }} Photos

                    </span>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- ============================================================
     TEMPLE SUMMARY
============================================================ --}}

<section class="py-4 bg-white border-bottom">

    <div class="container">

        <div
            class="row
                   align-items-center
                   g-3"
        >

            <div class="col-12 col-md-8">

                <div
                    class="d-flex
                           align-items-center
                           gap-3"
                >

                    <div
                        class="rounded-circle
                               d-flex
                               align-items-center
                               justify-content-center
                               bg-pn-cream
                               text-pn-primary
                               flex-shrink-0"
                        style="width:54px;height:54px;"
                    >

                        <i
                            class="bi bi-bank
                                   fs-5"
                        ></i>

                    </div>


                    <div>

                        <span
                            class="small
                                   text-secondary
                                   d-block"
                        >
                            Sacred Temple
                        </span>


                        <strong
                            class="text-pn-brown"
                        >

                            {{ $temple['name'] }}

                        </strong>


                        <small
                            class="text-secondary
                                   d-block"
                        >

                            Dedicated to
                            {{ $temple['deity'] }}

                        </small>

                    </div>

                </div>

            </div>


            <div
                class="col-12
                       col-md-4
                       text-md-end"
            >

                <a
                    href="#"
                    class="btn
                           btn-pn-outline"
                >

                    <i
                        class="bi bi-arrow-left me-2"
                    ></i>

                    Back to Temple

                </a>

            </div>

        </div>

    </div>

</section>


{{-- ============================================================
     FEATURED GALLERY
============================================================ --}}

<section class="py-5">

    <div class="container">

        <div
            class="d-flex
                   flex-column
                   flex-md-row
                   align-items-md-end
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
                    Featured
                </span>


                <h2
                    class="font-serif
                           display-6
                           text-pn-brown
                           mt-2
                           mb-0"
                >

                    Sacred Highlights

                </h2>

            </div>


            <span
                class="small
                       text-secondary"
            >

                A glimpse into the temple experience

            </span>

        </div>


        <div
            class="row
                   g-3"
        >

            {{-- Large Feature --}}

            <div class="col-12 col-lg-7">

                <div
                    class="position-relative
                           rounded-5
                           overflow-hidden
                           h-100"
                >

                    <img
                        src="{{ asset('images/temples/' . $gallery[0]['image']) }}"
                        class="img-fluid
                               w-100
                               h-100
                               object-fit-cover"
                        style="min-height:420px;"
                        alt="{{ $gallery[0]['title'] }}"
                        loading="eager"
                    >


                    <div
                        class="position-absolute
                               top-0
                               start-0
                               end-0
                               bottom-0
                               bg-dark
                               bg-opacity-25"
                    ></div>


                    <div
                        class="position-absolute
                               bottom-0
                               start-0
                               end-0
                               p-4
                               p-md-5
                               text-white"
                    >

                        <span
                            class="badge
                                   rounded-pill
                                   bg-warning
                                   text-dark
                                   mb-2"
                        >

                            Featured

                        </span>


                        <h3
                            class="font-serif
                                   display-6"
                        >

                            {{ $gallery[0]['title'] }}

                        </h3>


                        <button
                            type="button"
                            class="btn
                                   btn-light
                                   rounded-pill"
                            data-bs-toggle="modal"
                            data-bs-target="#galleryModal"
                            data-gallery-image="{{ asset('images/temples/' . $gallery[0]['image']) }}"
                            data-gallery-title="{{ $gallery[0]['title'] }}"
                        >

                            <i
                                class="bi bi-arrows-fullscreen me-2"
                            ></i>

                            View Image

                        </button>

                    </div>

                </div>

            </div>


            {{-- Small Featured Images --}}

            <div class="col-12 col-lg-5">

                <div
                    class="row
                           row-cols-2
                           g-3"
                >

                    @foreach(array_slice($gallery, 1, 4) as $item)

                        <div class="col">

                            <button
                                type="button"
                                class="border-0
                                       bg-transparent
                                       p-0
                                       w-100
                                       text-start"
                                data-bs-toggle="modal"
                                data-bs-target="#galleryModal"
                                data-gallery-image="{{ asset('images/temples/' . $item['image']) }}"
                                data-gallery-title="{{ $item['title'] }}"
                            >

                                <div
                                    class="position-relative
                                           rounded-4
                                           overflow-hidden"
                                >

                                    <img
                                        src="{{ asset('images/temples/' . $item['image']) }}"
                                        class="img-fluid
                                               w-100
                                               object-fit-cover"
                                        style="height:200px;"
                                        alt="{{ $item['title'] }}"
                                        loading="lazy"
                                    >


                                    <div
                                        class="position-absolute
                                               top-0
                                               start-0
                                               end-0
                                               bottom-0
                                               bg-dark
                                               bg-opacity-10"
                                    ></div>


                                    <div
                                        class="position-absolute
                                               bottom-0
                                               start-0
                                               end-0
                                               p-3
                                               text-white
                                               bg-gradient"
                                    >

                                        <small
                                            class="fw-semibold"
                                        >

                                            {{ $item['title'] }}

                                        </small>

                                    </div>

                                </div>

                            </button>

                        </div>

                    @endforeach

                </div>

            </div>

        </div>

    </div>

</section>


{{-- ============================================================
     GALLERY FILTER
============================================================ --}}

<section class="py-4 bg-light-subtle">

    <div class="container">

        <div
            class="d-flex
                   flex-column
                   flex-lg-row
                   align-items-lg-center
                   justify-content-between
                   gap-3"
        >

            <div>

                <span
                    class="small
                           text-pn-gold
                           fw-semibold
                           text-uppercase"
                >
                    Temple Collection
                </span>


                <h2
                    class="font-serif
                           h2
                           text-pn-brown
                           mt-2
                           mb-0"
                >

                    Explore Gallery

                </h2>

            </div>


            <div
                class="d-flex
                       flex-wrap
                       gap-2"
                role="group"
                aria-label="Gallery categories"
            >

                @foreach($categories as $index => $category)

                    <button
                        type="button"
                        class="btn
                               {{ $index === 0
                                   ? 'btn-pn'
                                   : 'btn-pn-outline' }}
                               btn-sm
                               rounded-pill
                               px-3"
                    >

                        {{ $category }}

                    </button>

                @endforeach

            </div>

        </div>

    </div>

</section>


{{-- ============================================================
     MAIN GALLERY
============================================================ --}}

<section class="py-5 bg-light-subtle">

    <div class="container">

        <div
            class="row
                   row-cols-1
                   row-cols-sm-2
                   row-cols-lg-3
                   row-cols-xl-4
                   g-4"
        >

            @foreach($gallery as $index => $item)

                <div class="col">

                    <article
                        class="card
                               border
                               border-warning-subtle
                               rounded-4
                               overflow-hidden
                               h-100"
                    >

                        <button
                            type="button"
                            class="border-0
                                   bg-transparent
                                   p-0
                                   w-100
                                   text-start"
                            data-bs-toggle="modal"
                            data-bs-target="#galleryModal"
                            data-gallery-image="{{ asset('images/temples/' . $item['image']) }}"
                            data-gallery-title="{{ $item['title'] }}"
                        >

                            <div
                                class="position-relative
                                       overflow-hidden"
                            >

                                <img
                                    src="{{ asset('images/temples/' . $item['image']) }}"
                                    class="img-fluid
                                           w-100
                                           object-fit-cover"
                                    style="height:260px;"
                                    alt="{{ $item['title'] }}"
                                    loading="lazy"
                                >


                                <div
                                    class="position-absolute
                                           top-0
                                           end-0
                                           m-3
                                           rounded-circle
                                           d-flex
                                           align-items-center
                                           justify-content-center
                                           bg-white
                                           bg-opacity-75
                                           text-pn-primary"
                                    style="width:42px;height:42px;"
                                >

                                    <i
                                        class="bi bi-arrows-fullscreen"
                                    ></i>

                                </div>

                            </div>

                        </button>


                        <div
                            class="card-body
                                   p-3
                                   p-md-4"
                        >

                            <div
                                class="d-flex
                                       justify-content-between
                                       align-items-center
                                       gap-2"
                            >

                                <h3
                                    class="font-serif
                                           h5
                                           text-pn-brown
                                           mb-0"
                                >

                                    {{ $item['title'] }}

                                </h3>


                                <span
                                    class="badge
                                           rounded-pill
                                           bg-pn-cream
                                           text-pn-brown
                                           border
                                           border-warning-subtle"
                                >

                                    {{ $item['category'] }}

                                </span>

                            </div>

                        </div>

                    </article>

                </div>

            @endforeach

        </div>


        {{-- Load More --}}

        <div
            class="text-center
                   mt-5"
        >

            <button
                type="button"
                class="btn
                       btn-pn-outline
                       px-4"
            >

                <i
                    class="bi bi-images me-2"
                ></i>

                Load More Photos

            </button>

        </div>

    </div>

</section>


{{-- ============================================================
     TEMPLE GALLERY INFORMATION
============================================================ --}}

<section class="py-5">

    <div class="container">

        <div
            class="row
                   g-4
                   align-items-stretch"
        >

            <div class="col-12 col-lg-7">

                <div
                    class="card
                           border
                           border-warning-subtle
                           rounded-5
                           h-100"
                >

                    <div class="card-body p-4 p-md-5">

                        <span
                            class="small
                                   text-pn-gold
                                   fw-semibold
                                   text-uppercase"
                        >
                            Temple Gallery
                        </span>


                        <h2
                            class="font-serif
                                   display-6
                                   text-pn-brown
                                   mt-2
                                   mb-3"
                        >

                            Moments of devotion.

                        </h2>


                        <div
                            class="pn-divider
                                   mb-4"
                        ></div>


                        <p
                            class="text-secondary"
                        >

                            Explore the temple through a collection
                            of images representing its sacred spaces,
                            devotional atmosphere and temple
                            experiences.

                        </p>


                        <p
                            class="text-secondary
                                   mb-0"
                        >

                            Gallery content will be managed through
                            the temple gallery system and displayed
                            here according to its publication status.

                        </p>

                    </div>

                </div>

            </div>


            <div class="col-12 col-lg-5">

                <div
                    class="pn-digital
                           rounded-5
                           text-white
                           h-100
                           p-4
                           p-md-5"
                >

                    <div
                        class="rounded-circle
                               d-flex
                               align-items-center
                               justify-content-center
                               bg-warning
                               text-dark
                               mb-4"
                        style="width:64px;height:64px;"
                    >

                        <i
                            class="bi bi-camera
                                   fs-4"
                        ></i>

                    </div>


                    <h2
                        class="font-serif
                               h2"
                    >

                        Keep exploring.

                    </h2>


                    <p
                        class="text-white-50
                               small"
                    >

                        Discover the temple's available Poojas,
                        upcoming events and other devotional services.

                    </p>


                    <div
                        class="d-flex
                               flex-column
                               gap-2
                               mt-4"
                    >

                        <a
                            href="#"
                            class="btn
                                   btn-warning
                                   text-dark
                                   fw-semibold"
                        >

                            Explore Poojas

                            <i
                                class="bi bi-arrow-right ms-2"
                            ></i>

                        </a>


                        <a
                            href="#"
                            class="btn
                                   btn-outline-light"
                        >

                            View Temple Events

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- ============================================================
     RELATED TEMPLE NAVIGATION
============================================================ --}}

<section class="py-5 bg-pn-cream">

    <div class="container">

        <div
            class="row
                   row-cols-1
                   row-cols-md-3
                   g-3"
        >

            <div class="col">

                <a
                    href="#"
                    class="card
                           border
                           border-warning-subtle
                           rounded-4
                           h-100
                           text-decoration-none"
                >

                    <div class="card-body p-4">

                        <i
                            class="bi bi-bank
                                   text-pn-primary
                                   fs-3"
                        ></i>


                        <h3
                            class="font-serif
                                   h5
                                   text-pn-brown
                                   mt-3"
                        >

                            Temple Details

                        </h3>


                        <p
                            class="small
                                   text-secondary
                                   mb-0"
                        >

                            Return to the temple profile and
                            available information.

                        </p>


                        <span
                            class="small
                                   text-pn-primary
                                   fw-semibold
                                   d-block
                                   mt-3"
                        >

                            View Temple

                            <i
                                class="bi bi-arrow-right ms-1"
                            ></i>

                        </span>

                    </div>

                </a>

            </div>


            <div class="col">

                <a
                    href="#"
                    class="card
                           border
                           border-warning-subtle
                           rounded-4
                           h-100
                           text-decoration-none"
                >

                    <div class="card-body p-4">

                        <i
                            class="bi bi-calendar-event
                                   text-pn-primary
                                   fs-3"
                        ></i>


                        <h3
                            class="font-serif
                                   h5
                                   text-pn-brown
                                   mt-3"
                        >

                            Temple Events

                        </h3>


                        <p
                            class="small
                                   text-secondary
                                   mb-0"
                        >

                            Explore upcoming devotional events
                            at this temple.

                        </p>


                        <span
                            class="small
                                   text-pn-primary
                                   fw-semibold
                                   d-block
                                   mt-3"
                        >

                            View Events

                            <i
                                class="bi bi-arrow-right ms-1"
                            ></i>

                        </span>

                    </div>

                </a>

            </div>


            <div class="col">

                <a
                    href="#"
                    class="card
                           border
                           border-warning-subtle
                           rounded-4
                           h-100
                           text-decoration-none"
                >

                    <div class="card-body p-4">

                        <i
                            class="bi bi-calendar-check
                                   text-pn-primary
                                   fs-3"
                        ></i>


                        <h3
                            class="font-serif
                                   h5
                                   text-pn-brown
                                   mt-3"
                        >

                            Book a Pooja

                        </h3>


                        <p
                            class="small
                                   text-secondary
                                   mb-0"
                        >

                            Explore temple Pooja booking
                            opportunities.

                        </p>


                        <span
                            class="small
                                   text-pn-primary
                                   fw-semibold
                                   d-block
                                   mt-3"
                        >

                            Explore Poojas

                            <i
                                class="bi bi-arrow-right ms-1"
                            ></i>

                        </span>

                    </div>

                </a>

            </div>

        </div>

    </div>

</section>


{{-- ============================================================
     GALLERY MODAL
============================================================ --}}

<div
    class="modal
           fade"
    id="galleryModal"
    tabindex="-1"
    aria-labelledby="galleryModalLabel"
    aria-hidden="true"
>

    <div
        class="modal-dialog
               modal-dialog-centered
               modal-xl"
    >

        <div
            class="modal-content
                   border-0
                   rounded-4
                   overflow-hidden
                   bg-dark"
        >

            <div
                class="modal-header
                       border-0
                       position-absolute
                       top-0
                       start-0
                       end-0
                       z-3"
            >

                <h2
                    class="modal-title
                           visually-hidden"
                    id="galleryModalLabel"
                >

                    Temple Gallery Image

                </h2>


                <button
                    type="button"
                    class="btn
                           btn-light
                           rounded-circle
                           ms-auto
                           shadow"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                    style="width:42px;height:42px;"
                >

                    <i class="bi bi-x-lg"></i>

                </button>

            </div>


            <div class="modal-body p-0">

                <div
                    class="position-relative"
                >

                    <img
                        id="galleryModalImage"
                        src=""
                        class="img-fluid
                               w-100
                               object-fit-contain"
                        style="max-height:80vh;"
                        alt=""
                    >


                    <div
                        class="position-absolute
                               bottom-0
                               start-0
                               end-0
                               p-3
                               p-md-4
                               text-white
                               bg-dark
                               bg-opacity-75"
                    >

                        <h3
                            id="galleryModalTitle"
                            class="font-serif
                                   h4
                                   mb-0"
                        ></h3>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>


{{-- ============================================================
     FINAL CTA
============================================================ --}}

<section class="py-5">

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
                    class="bi bi-flower1
                           display-5
                           text-warning"
                ></i>


                <h2
                    class="font-serif
                           display-6
                           mt-3"
                >

                    Continue your temple journey.

                </h2>


                <p
                    class="text-white-50
                           col-lg-7
                           mx-auto"
                >

                    Explore Poojas, discover upcoming events and
                    experience the spiritual offerings available
                    through Pooja Nilayam.

                </p>


                <div
                    class="d-flex
                           flex-column
                           flex-sm-row
                           justify-content-center
                           gap-2"
                >

                    <a
                        href="#"
                        class="btn
                               btn-warning
                               text-dark
                               fw-semibold
                               px-4"
                    >

                        Explore Poojas

                        <i
                            class="bi bi-arrow-right ms-2"
                        ></i>

                    </a>


                    <a
                        href="#"
                        class="btn
                               btn-outline-light
                               px-4"
                    >

                        View Temple Events

                    </a>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- ============================================================
     MINIMAL GALLERY JAVASCRIPT
============================================================ --}}

@push('scripts')

<script>

document.addEventListener('DOMContentLoaded', function () {

    const galleryModal =
        document.getElementById('galleryModal');

    if (!galleryModal) {
        return;
    }


    galleryModal.addEventListener(
        'show.bs.modal',
        function (event) {

            const button = event.relatedTarget;

            if (!button) {
                return;
            }


            const image =
                button.getAttribute(
                    'data-gallery-image'
                );


            const title =
                button.getAttribute(
                    'data-gallery-title'
                );


            const modalImage =
                document.getElementById(
                    'galleryModalImage'
                );


            const modalTitle =
                document.getElementById(
                    'galleryModalTitle'
                );


            if (modalImage) {

                modalImage.src = image || '';

                modalImage.alt = title || 'Temple Gallery';

            }


            if (modalTitle) {

                modalTitle.textContent =
                    title || 'Temple Gallery';

            }

        }
    );

});

</script>

@endpush

@endsection