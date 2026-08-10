@extends('layouts.app')

@section('title', 'Testimonials | Pooja Nilayam')

@section(
    'meta_description',
    'Read experiences and feedback shared by customers of Pooja Nilayam across pooja services, digital pooja, temples, astrology, donations and the Pooja Store.'
)

@section('content')

@php

    /*
    |--------------------------------------------------------------------------
    | TESTIMONIALS PAGE
    |--------------------------------------------------------------------------
    | IMPORTANT:
    |
    | The project documents confirm:
    |
    | - Testimonials is Frontend Screen 74.
    | - Testimonials are managed through Admin CMS.
    | - Customer Reviews are managed under User Management.
    | - Feedback & Rating follow successful service completion.
    |
    | The project documents do NOT provide actual customer reviews,
    | names, ratings or testimonials.
    |
    | Therefore the page uses dynamic data when available and does
    | NOT invent customer testimonials.
    |--------------------------------------------------------------------------
    */


    /*
    |--------------------------------------------------------------------------
    | Dynamic Testimonials
    |--------------------------------------------------------------------------
    |
    | Expected controller variable:
    |
    | $testimonials
    |
    | Recommended fields:
    |
    | name
    | city
    | rating
    | review
    | service
    | avatar
    | verified
    | featured
    |
    */

    $testimonials = $testimonials ?? collect();


    $testimonials =
        $testimonials instanceof \Illuminate\Support\Collection
            ? $testimonials
            : collect($testimonials);


    $featuredTestimonial =
        $testimonials
            ->where('featured', true)
            ->first();


    if (!$featuredTestimonial) {

        $featuredTestimonial =
            $testimonials->first();

    }


    $regularTestimonials =
        $testimonials
            ->when(
                $featuredTestimonial,
                function ($collection) use ($featuredTestimonial) {

                    return $collection->filter(
                        function ($testimonial) use ($featuredTestimonial) {

                            return data_get(
                                $testimonial,
                                'id'
                            ) !== data_get(
                                $featuredTestimonial,
                                'id'
                            );

                        }
                    );

                }
            )
            ->values();


    $serviceFilters = [

        'All',
        'Pooja',
        'Digital Pooja',
        'Temple',
        'Priest',
        'Astrology',
        'Pooja Store',
        'Donations'

    ];


    $stats = [

        [
            'icon' => 'bi-chat-heart',
            'title' => 'Customer Feedback',
            'text' => 'Experiences shared after using our services.'
        ],

        [
            'icon' => 'bi-star',
            'title' => 'Ratings',
            'text' => 'Customer ratings captured through the platform.'
        ],

        [
            'icon' => 'bi-shield-check',
            'title' => 'Verified Experiences',
            'text' => 'Reviews can be associated with completed services.'
        ],

        [
            'icon' => 'bi-flower1',
            'title' => 'Many Experiences',
            'text' => 'Feedback can span multiple Pooja Nilayam services.'
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
                    Testimonials
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
                   justify-content-center
                   text-center"
        >

            <div class="col-12 col-lg-9">

                <span
                    class="small
                           text-pn-gold
                           fw-semibold
                           text-uppercase"
                >
                    Devotee Experiences
                </span>


                <h1
                    class="font-serif
                           display-3
                           text-pn-brown
                           mt-2
                           mb-4"
                >

                    What Our Customers Say

                </h1>


                <p
                    class="lead
                           text-secondary
                           lh-lg
                           mb-4"
                >

                    Discover experiences and feedback shared by
                    customers across Pooja Nilayam's spiritual,
                    devotional and digital services.

                </p>


                <div
                    class="d-flex
                           flex-wrap
                           justify-content-center
                           gap-2"
                >

                    <a
                        href="#testimonials"
                        class="btn btn-pn btn-lg"
                    >

                        Read Testimonials

                        <i
                            class="bi bi-arrow-down ms-1"
                        ></i>

                    </a>


                    <a
                        href="{{ url('/contact-us') }}"
                        class="btn
                               btn-pn-outline
                               btn-lg"
                    >

                        Contact Us

                    </a>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- ============================================================
     INTRO / FEEDBACK PROCESS
============================================================ --}}

<section class="py-5">

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
                    Customer Feedback
                </span>


                <h2
                    class="font-serif
                           display-6
                           text-pn-brown
                           mt-2
                           mb-3"
                >

                    Experiences That Matter

                </h2>


                <p
                    class="text-secondary
                           mb-0"
                >

                    Customer feedback and ratings are an important
                    part of the Pooja Nilayam experience. The project
                    flow includes feedback and rating after successful
                    service completion.

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

            @foreach($stats as $stat)

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
                                    class="bi {{ $stat['icon'] }}
                                           fs-5"
                                ></i>

                            </span>


                            <h3
                                class="font-serif
                                       h5
                                       text-pn-brown
                                       mb-2"
                            >

                                {{ $stat['title'] }}

                            </h3>


                            <p
                                class="small
                                       text-secondary
                                       lh-lg
                                       mb-0"
                            >

                                {{ $stat['text'] }}

                            </p>

                        </div>

                    </article>

                </div>

            @endforeach

        </div>

    </div>

</section>


{{-- ============================================================
     FEATURED TESTIMONIAL
============================================================ --}}

@if($featuredTestimonial)

<section class="bg-pn-beige py-5">

    <div class="container">

        <div
            class="row
                   justify-content-center"
        >

            <div class="col-12 col-xl-10">

                <div
                    class="featured-testimonial
                           bg-white
                           rounded-5
                           border
                           border-warning-subtle
                           overflow-hidden"
                >

                    <div class="row g-0 align-items-stretch">


                        {{-- Quote Area --}}

                        <div
                            class="col-12 col-lg-8"
                        >

                            <div
                                class="p-4
                                       p-md-5"
                            >

                                <div
                                    class="d-flex
                                           justify-content-between
                                           align-items-start
                                           gap-3
                                           mb-4"
                                >

                                    <span
                                        class="badge
                                               bg-pn-cream
                                               text-pn-primary
                                               rounded-pill
                                               px-3
                                               py-2"
                                    >

                                        Featured Experience

                                    </span>


                                    <i
                                        class="bi bi-quote
                                               text-pn-gold
                                               display-6"
                                    ></i>

                                </div>


                                {{-- Rating --}}

                                <div
                                    class="d-flex
                                           align-items-center
                                           gap-1
                                           mb-3"
                                    aria-label="Rating"
                                >

                                    @for(
                                        $star = 1;
                                        $star <= 5;
                                        $star++
                                    )

                                        <i
                                            class="bi
                                            {{ $star <= (int) data_get($featuredTestimonial, 'rating', 0)
                                                ? 'bi-star-fill text-warning'
                                                : 'bi-star text-secondary' }}"
                                        ></i>

                                    @endfor

                                </div>


                                <blockquote
                                    class="mb-4"
                                >

                                    <p
                                        class="font-serif
                                               fs-3
                                               text-pn-brown
                                               lh-base
                                               mb-0"
                                    >

                                        “{{ data_get($featuredTestimonial, 'review') }}”

                                    </p>

                                </blockquote>


                                <div
                                    class="d-flex
                                           align-items-center
                                           gap-3"
                                >

                                    @if(
                                        data_get(
                                            $featuredTestimonial,
                                            'avatar'
                                        )
                                    )

                                        <img
                                            src="{{ asset(data_get($featuredTestimonial, 'avatar')) }}"
                                            alt="{{ data_get($featuredTestimonial, 'name') }}"
                                            class="rounded-circle object-fit-cover"
                                            width="56"
                                            height="56"
                                        >

                                    @else

                                        <span
                                            class="rounded-circle
                                                   bg-pn-primary
                                                   text-white
                                                   d-flex
                                                   align-items-center
                                                   justify-content-center
                                                   fw-semibold"
                                            style="width:56px;height:56px;"
                                        >

                                            {{ strtoupper(
                                                substr(
                                                    data_get(
                                                        $featuredTestimonial,
                                                        'name',
                                                        'C'
                                                    ),
                                                    0,
                                                    1
                                                )
                                            ) }}

                                        </span>

                                    @endif


                                    <div>

                                        <strong
                                            class="d-block
                                                   text-pn-brown"
                                        >

                                            {{ data_get(
                                                $featuredTestimonial,
                                                'name',
                                                'Customer'
                                            ) }}

                                        </strong>


                                        @if(
                                            data_get(
                                                $featuredTestimonial,
                                                'city'
                                            )
                                        )

                                            <small
                                                class="text-secondary"
                                            >

                                                {{ data_get(
                                                    $featuredTestimonial,
                                                    'city'
                                                ) }}

                                            </small>

                                        @endif

                                    </div>


                                    @if(
                                        data_get(
                                            $featuredTestimonial,
                                            'verified',
                                            false
                                        )
                                    )

                                        <span
                                            class="badge
                                                   bg-success-subtle
                                                   text-success-emphasis
                                                   rounded-pill
                                                   ms-auto"
                                        >

                                            <i
                                                class="bi bi-patch-check-fill me-1"
                                            ></i>

                                            Verified

                                        </span>

                                    @endif

                                </div>

                            </div>

                        </div>


                        {{-- Service Info --}}

                        <div
                            class="col-12 col-lg-4
                                   bg-pn-primary
                                   text-white"
                        >

                            <div
                                class="p-4
                                       p-md-5
                                       h-100
                                       d-flex
                                       flex-column
                                       justify-content-center"
                            >

                                <span
                                    class="small
                                           text-warning
                                           fw-semibold
                                           text-uppercase"
                                >
                                    Service
                                </span>


                                <h3
                                    class="font-serif
                                           h3
                                           mt-2
                                           mb-3"
                                >

                                    {{ data_get(
                                        $featuredTestimonial,
                                        'service',
                                        'Pooja Nilayam'
                                    ) }}

                                </h3>


                                <p
                                    class="text-white-50
                                           small
                                           lh-lg
                                           mb-0"
                                >

                                    Customer experiences can be
                                    associated with the service or
                                    experience they reviewed.

                                </p>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

@endif


{{-- ============================================================
     TESTIMONIAL LISTING
============================================================ --}}

<section
    id="testimonials"
    class="py-5"
>

    <div class="container">

        <div
            class="row
                   align-items-end
                   g-4
                   mb-4"
        >

            <div class="col-12 col-lg-7">

                <span
                    class="small
                           text-pn-gold
                           fw-semibold
                           text-uppercase"
                >
                    Customer Stories
                </span>


                <h2
                    class="font-serif
                           display-6
                           text-pn-brown
                           mt-2
                           mb-2"
                >

                    Experiences From Our Community

                </h2>


                <p
                    class="text-secondary
                           mb-0"
                >

                    Browse feedback by service to discover what
                    customers have shared.

                </p>

            </div>


            <div
                class="col-12 col-lg-5"
            >

                <div
                    class="d-flex
                           flex-wrap
                           justify-content-lg-end
                           gap-2"
                    id="testimonialFilters"
                >

                    @foreach($serviceFilters as $filter)

                        <button
                            type="button"
                            class="btn
                                   btn-sm
                                   {{ $loop->first
                                        ? 'btn-pn'
                                        : 'btn-light border' }}
                                   testimonial-filter"
                            data-filter="{{ $filter }}"
                        >

                            {{ $filter }}

                        </button>

                    @endforeach

                </div>

            </div>

        </div>


        @if($regularTestimonials->count())

            <div
                id="testimonialGrid"
                class="row
                       row-cols-1
                       row-cols-md-2
                       row-cols-lg-3
                       g-4"
            >

                @foreach(
                    $regularTestimonials as $testimonial
                )

                    @php

                        $service =
                            data_get(
                                $testimonial,
                                'service',
                                'Pooja Nilayam'
                            );

                        $rating =
                            (int) data_get(
                                $testimonial,
                                'rating',
                                0
                            );

                        $verified =
                            (bool) data_get(
                                $testimonial,
                                'verified',
                                false
                            );

                    @endphp


                    <div
                        class="col testimonial-item"
                        data-service="{{ $service }}"
                    >

                        <article
                            class="card
                                   border
                                   border-warning-subtle
                                   rounded-5
                                   h-100
                                   testimonial-card"
                        >

                            <div
                                class="card-body
                                       p-4
                                       d-flex
                                       flex-column"
                            >

                                <div
                                    class="d-flex
                                           justify-content-between
                                           align-items-start
                                           gap-3
                                           mb-3"
                                >

                                    <span
                                        class="testimonial-quote
                                               d-inline-flex
                                               align-items-center
                                               justify-content-center
                                               rounded-circle
                                               bg-pn-cream
                                               text-pn-primary"
                                        style="width:46px;height:46px;"
                                    >

                                        <i
                                            class="bi bi-quote
                                                   fs-5"
                                        ></i>

                                    </span>


                                    @if($verified)

                                        <span
                                            class="badge
                                                   bg-success-subtle
                                                   text-success-emphasis
                                                   rounded-pill"
                                        >

                                            <i
                                                class="bi bi-patch-check-fill me-1"
                                            ></i>

                                            Verified

                                        </span>

                                    @endif

                                </div>


                                {{-- Rating --}}

                                <div
                                    class="d-flex
                                           align-items-center
                                           gap-1
                                           mb-3"
                                    aria-label="{{ $rating }} out of 5 stars"
                                >

                                    @for(
                                        $star = 1;
                                        $star <= 5;
                                        $star++
                                    )

                                        <i
                                            class="bi
                                            {{ $star <= $rating
                                                ? 'bi-star-fill text-warning'
                                                : 'bi-star text-secondary' }}"
                                        ></i>

                                    @endfor

                                </div>


                                {{-- Review --}}

                                <p
                                    class="text-secondary
                                           lh-lg
                                           mb-4
                                           flex-grow-1"
                                >

                                    “{{ data_get(
                                        $testimonial,
                                        'review',
                                        ''
                                    ) }}”

                                </p>


                                {{-- Service --}}

                                <div
                                    class="mb-4"
                                >

                                    <span
                                        class="badge
                                               bg-pn-cream
                                               text-pn-primary
                                               rounded-pill"
                                    >

                                        {{ $service }}

                                    </span>

                                </div>


                                {{-- Customer --}}

                                <div
                                    class="d-flex
                                           align-items-center
                                           gap-3
                                           pt-3
                                           border-top"
                                >

                                    @if(
                                        data_get(
                                            $testimonial,
                                            'avatar'
                                        )
                                    )

                                        <img
                                            src="{{ asset(
                                                data_get(
                                                    $testimonial,
                                                    'avatar'
                                                )
                                            ) }}"
                                            alt="{{ data_get(
                                                $testimonial,
                                                'name',
                                                'Customer'
                                            ) }}"
                                            class="rounded-circle object-fit-cover"
                                            width="48"
                                            height="48"
                                        >

                                    @else

                                        <span
                                            class="rounded-circle
                                                   bg-pn-primary
                                                   text-white
                                                   d-flex
                                                   align-items-center
                                                   justify-content-center
                                                   fw-semibold"
                                            style="width:48px;height:48px;"
                                        >

                                            {{ strtoupper(
                                                substr(
                                                    data_get(
                                                        $testimonial,
                                                        'name',
                                                        'C'
                                                    ),
                                                    0,
                                                    1
                                                )
                                            ) }}

                                        </span>

                                    @endif


                                    <div>

                                        <strong
                                            class="d-block
                                                   small
                                                   text-pn-brown"
                                        >

                                            {{ data_get(
                                                $testimonial,
                                                'name',
                                                'Customer'
                                            ) }}

                                        </strong>


                                        @if(
                                            data_get(
                                                $testimonial,
                                                'city'
                                            )
                                        )

                                            <small
                                                class="text-secondary"
                                            >

                                                {{ data_get(
                                                    $testimonial,
                                                    'city'
                                                ) }}

                                            </small>

                                        @endif

                                    </div>

                                </div>

                            </div>

                        </article>

                    </div>

                @endforeach

            </div>


            {{-- No Filter Results --}}

            <div
                id="testimonialNoResults"
                class="d-none
                       text-center
                       py-5"
            >

                <div
                    class="rounded-circle
                           bg-pn-cream
                           text-pn-primary
                           d-inline-flex
                           align-items-center
                           justify-content-center
                           mb-3"
                    style="width:64px;height:64px;"
                >

                    <i
                        class="bi bi-chat-heart fs-4"
                    ></i>

                </div>


                <h3
                    class="font-serif
                           h4
                           text-pn-brown"
                >

                    No Testimonials Found

                </h3>


                <p
                    class="text-secondary
                           mb-0"
                >

                    There are no testimonials available for the
                    selected service.

                </p>

            </div>

        @else

            {{-- ==================================================
                 EMPTY STATE
            =================================================== --}}

            <div
                class="row
                       justify-content-center"
            >

                <div class="col-12 col-lg-8">

                    <div
                        class="testimonial-empty-state
                               bg-pn-cream
                               rounded-5
                               text-center
                               p-5"
                    >

                        <span
                            class="d-inline-flex
                                   align-items-center
                                   justify-content-center
                                   rounded-circle
                                   bg-white
                                   text-pn-primary
                                   mb-4"
                            style="width:76px;height:76px;"
                        >

                            <i
                                class="bi bi-chat-heart
                                       fs-2"
                            ></i>

                        </span>


                        <h3
                            class="font-serif
                                   h3
                                   text-pn-brown
                                   mb-3"
                        >

                            Customer Experiences Coming Soon

                        </h3>


                        <p
                            class="text-secondary
                                   lh-lg
                                   mb-4"
                        >

                            Customer testimonials and ratings will
                            appear here once they are published
                            through the Pooja Nilayam testimonial
                            management process.

                        </p>


                        <a
                            href="{{ url('/contact-us') }}"
                            class="btn btn-pn"
                        >

                            Explore Pooja Nilayam

                            <i
                                class="bi bi-arrow-right ms-1"
                            ></i>

                        </a>

                    </div>

                </div>

            </div>

        @endif

    </div>

</section>


{{-- ============================================================
     SHARE / FEEDBACK CTA
============================================================ --}}

<section class="bg-pn-beige py-5">

    <div class="container">

        <div
            class="row
                   justify-content-center"
        >

            <div class="col-12 col-lg-9">

                <div
                    class="bg-white
                           border
                           border-warning-subtle
                           rounded-5
                           p-4
                           p-md-5
                           text-center"
                >

                    <span
                        class="d-inline-flex
                               align-items-center
                               justify-content-center
                               rounded-circle
                               bg-pn-cream
                               text-pn-primary
                               mb-3"
                        style="width:58px;height:58px;"
                    >

                        <i
                            class="bi bi-chat-square-heart
                                   fs-5"
                        ></i>

                    </span>


                    <h2
                        class="font-serif
                               h2
                               text-pn-brown
                               mb-3"
                    >

                        Share Your Experience

                    </h2>


                    <p
                        class="text-secondary
                               mx-auto
                               mb-4"
                        style="max-width:650px;"
                    >

                        After completing a service, customers can
                        share feedback and ratings through the
                        applicable Pooja Nilayam experience.

                    </p>


                    <div
                        class="d-flex
                               flex-wrap
                               justify-content-center
                               gap-2"
                    >

                        <a
                            href="{{ url('/dashboard') }}"
                            class="btn btn-pn"
                        >

                            Go to My Account

                            <i
                                class="bi bi-arrow-right ms-1"
                            ></i>

                        </a>


                        <a
                            href="{{ url('/help-center') }}"
                            class="btn btn-pn-outline"
                        >

                            Help Center

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- ============================================================
     EXPLORE SERVICES
============================================================ --}}

<section class="py-5">

    <div class="container">

        <div
            class="text-center
                   mb-5"
        >

            <span
                class="small
                       text-pn-gold
                       fw-semibold
                       text-uppercase"
            >
                Explore Pooja Nilayam
            </span>


            <h2
                class="font-serif
                       display-6
                       text-pn-brown
                       mt-2
                       mb-3"
            >

                Discover Our Services

            </h2>

        </div>


        <div
            class="row
                   row-cols-2
                   row-cols-md-3
                   row-cols-lg-6
                   g-3"
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

            ] as $service)

                <div class="col">

                    <a
                        href="{{ url($service['url']) }}"
                        class="service-explore-card
                               d-block
                               text-decoration-none
                               bg-pn-cream
                               rounded-4
                               p-3
                               p-md-4
                               text-center
                               h-100"
                    >

                        <span
                            class="d-inline-flex
                                   align-items-center
                                   justify-content-center
                                   rounded-circle
                                   bg-white
                                   text-pn-primary"
                            style="width:52px;height:52px;"
                        >

                            <i
                                class="bi {{ $service['icon'] }}
                                       fs-5"
                            ></i>

                        </span>


                        <span
                            class="d-block
                                   text-pn-brown
                                   fw-semibold
                                   small
                                   mt-3"
                        >

                            {{ $service['title'] }}

                        </span>

                    </a>

                </div>

            @endforeach

        </div>

    </div>

</section>


{{-- ============================================================
     FOOTER CTA
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
                    class="bi bi-flower1
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

                    Begin Your Pooja Nilayam Journey

                </h2>


                <p
                    class="text-white-50
                           lh-lg
                           mb-4"
                >

                    Explore our services, devotional experiences,
                    temples, astrology offerings and Pooja Store.

                </p>


                <div
                    class="d-flex
                           flex-wrap
                           justify-content-center
                           gap-2"
                >

                    <a
                        href="{{ route('home') }}"
                        class="btn
                               btn-warning
                               text-dark
                               px-4"
                    >

                        Explore Services

                    </a>


                    <a
                        href="{{ url('/contact-us') }}"
                        class="btn
                               btn-outline-light
                               px-4"
                    >

                        Contact Us

                    </a>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- ============================================================
     PAGE-SPECIFIC STYLE
============================================================ --}}

@push('styles')

<style>

    .featured-testimonial {
        box-shadow:
            0 1rem 3rem rgba(91, 61, 35, .08);
    }


    .testimonial-card {
        transition:
            transform .2s ease,
            box-shadow .2s ease;
    }


    .testimonial-card:hover {
        transform: translateY(-4px);

        box-shadow:
            0 1rem 2.5rem rgba(91, 61, 35, .08);
    }


    .testimonial-quote {
        transition:
            background-color .2s ease,
            color .2s ease;
    }


    .testimonial-card:hover .testimonial-quote {
        background-color: #8b5e34 !important;
        color: #fff !important;
    }


    .service-explore-card {
        transition:
            transform .2s ease,
            background-color .2s ease,
            box-shadow .2s ease;
    }


    .service-explore-card:hover {
        transform: translateY(-3px);

        background-color: #f3e8d5 !important;

        box-shadow:
            0 .75rem 2rem rgba(91, 61, 35, .08);
    }


    .testimonial-filter {
        transition:
            background-color .2s ease,
            color .2s ease;
    }


    .testimonial-empty-state {
        border: 1px solid
            rgba(201, 155, 77, .25);
    }


    @media (max-width: 767.98px) {

        .featured-testimonial
        blockquote p {
            font-size: 1.35rem !important;
        }

    }

</style>

@endpush


{{-- ============================================================
     PAGE SCRIPT
============================================================ --}}

@push('scripts')

<script>
document.addEventListener('DOMContentLoaded', function () {

    /*
    |--------------------------------------------------------------------------
    | Testimonial Filters
    |--------------------------------------------------------------------------
    */

    const filterButtons =
        document.querySelectorAll(
            '.testimonial-filter'
        );


    const testimonialItems =
        document.querySelectorAll(
            '.testimonial-item'
        );


    const noResults =
        document.getElementById(
            'testimonialNoResults'
        );


    if (
        filterButtons.length &&
        testimonialItems.length
    ) {

        filterButtons.forEach(
            function (button) {

                button.addEventListener(
                    'click',
                    function () {

                        const filter =
                            this.dataset.filter;


                        /*
                        |--------------------------------------------------------------------------
                        | Button State
                        |--------------------------------------------------------------------------
                        */

                        filterButtons.forEach(
                            function (item) {

                                item.classList.remove(
                                    'btn-pn'
                                );

                                item.classList.add(
                                    'btn-light',
                                    'border'
                                );

                            }
                        );


                        this.classList.remove(
                            'btn-light',
                            'border'
                        );

                        this.classList.add(
                            'btn-pn'
                        );


                        /*
                        |--------------------------------------------------------------------------
                        | Filter Cards
                        |--------------------------------------------------------------------------
                        */

                        let visibleCount = 0;


                        testimonialItems.forEach(
                            function (item) {

                                const service =
                                    item.dataset.service;


                                const show =
                                    filter === 'All' ||
                                    service === filter;


                                item.classList.toggle(
                                    'd-none',
                                    !show
                                );


                                if (show) {

                                    visibleCount++;

                                }

                            }
                        );


                        if (noResults) {

                            noResults.classList.toggle(
                                'd-none',
                                visibleCount !== 0
                            );

                        }

                    }
                );

            }
        );

    }

});
</script>

@endpush


@endsection