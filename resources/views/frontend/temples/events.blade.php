@extends('layouts.app')

@section('title', 'Temple Events | Pooja Nilayam')

@section(
    'meta_description',
    'Discover upcoming devotional events, temple celebrations and spiritual activities at Pooja Nilayam.'
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
    | TEMPORARY EVENT DATA
    |--------------------------------------------------------------------------
    | These records will later come from the database.
    |--------------------------------------------------------------------------
    */

    $events = [

        [
            'title' => 'Sri Venkateswara Brahmotsavam',

            'category' => 'Festival',

            'date' => '18 September 2026',

            'day' => 'Friday',

            'time' => '06:00 AM onwards',

            'location' => 'Temple Premises',

            'image' => 'temple-1.jpg',

            'description' =>
                'A special devotional celebration at the temple
                 with sacred rituals and spiritual activities.',

            'registration' => true,

            'payment' => false,

            'status' => 'Upcoming',

            'featured' => true

        ],

        [
            'title' => 'Special Abhishekam',

            'category' => 'Pooja',

            'date' => '25 September 2026',

            'day' => 'Friday',

            'time' => '07:30 AM',

            'location' => 'Main Shrine',

            'image' => 'pooja-1.jpg',

            'description' =>
                'Participate in a special devotional ceremony
                 conducted at the temple.',

            'registration' => true,

            'payment' => true,

            'status' => 'Upcoming',

            'featured' => false

        ],

        [
            'title' => 'Navaratri Celebrations',

            'category' => 'Festival',

            'date' => '10 October 2026',

            'day' => 'Saturday',

            'time' => '05:30 PM onwards',

            'location' => 'Temple Premises',

            'image' => 'temple-2.jpg',

            'description' =>
                'Experience devotional celebrations and sacred
                 activities during the festive season.',

            'registration' => true,

            'payment' => false,

            'status' => 'Upcoming',

            'featured' => true

        ],

        [
            'title' => 'Deepa Alankaram',

            'category' => 'Devotional',

            'date' => '22 October 2026',

            'day' => 'Thursday',

            'time' => '06:30 PM',

            'location' => 'Temple Courtyard',

            'image' => 'temple-3.jpg',

            'description' =>
                'A peaceful evening devotional experience
                 surrounded by sacred light.',

            'registration' => true,

            'payment' => false,

            'status' => 'Upcoming',

            'featured' => false

        ],

        [
            'title' => 'Special Darshan',

            'category' => 'Darshan',

            'date' => '01 November 2026',

            'day' => 'Sunday',

            'time' => '07:00 AM',

            'location' => 'Temple Premises',

            'image' => 'temple-4.jpg',

            'description' =>
                'Explore the available special darshan experience
                 and scheduled temple arrangements.',

            'registration' => true,

            'payment' => true,

            'status' => 'Upcoming',

            'featured' => false

        ],

        [
            'title' => 'Devotional Music Evening',

            'category' => 'Cultural',

            'date' => '14 November 2026',

            'day' => 'Saturday',

            'time' => '06:00 PM',

            'location' => 'Temple Hall',

            'image' => 'temple-5.jpg',

            'description' =>
                'An evening dedicated to devotional music and
                 spiritual reflection.',

            'registration' => true,

            'payment' => false,

            'status' => 'Upcoming',

            'featured' => false

        ]

    ];


    /*
    |--------------------------------------------------------------------------
    | EVENT CATEGORIES
    |--------------------------------------------------------------------------
    */

    $categories = [

        'All Events',

        'Festivals',

        'Poojas',

        'Darshan',

        'Devotional',

        'Cultural'

    ];


    /*
    |--------------------------------------------------------------------------
    | MONTHS
    |--------------------------------------------------------------------------
    */

    $months = [

        'All Months',

        'August 2026',

        'September 2026',

        'October 2026',

        'November 2026',

        'December 2026'

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
                    Events
                </li>

            </ol>

        </nav>

    </div>

</section>


{{-- ============================================================
     HERO
============================================================ --}}

<section class="bg-pn-cream py-5">

    <div class="container">

        <div
            class="row
                   align-items-center
                   g-4"
        >

            <div class="col-12 col-lg-7">

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


                <span
                    class="d-block
                           small
                           text-pn-gold
                           fw-semibold
                           text-uppercase
                           mt-3"
                >
                    Temple Events
                </span>


                <h1
                    class="font-serif
                           display-4
                           text-pn-brown
                           mt-2
                           mb-3"
                >

                    Sacred moments,
                    <span class="d-block">
                        shared together.
                    </span>

                </h1>


                <p
                    class="lead
                           text-secondary
                           col-xl-10
                           mb-4"
                >

                    Discover upcoming temple celebrations,
                    devotional activities and scheduled spiritual
                    experiences.

                </p>


                <div
                    class="d-flex
                           flex-wrap
                           gap-3
                           small
                           text-secondary"
                >

                    <span>

                        <i
                            class="bi bi-bank
                                   text-pn-primary
                                   me-1"
                        ></i>

                        {{ $temple['name'] }}

                    </span>


                    <span>

                        <i
                            class="bi bi-geo-alt
                                   text-pn-primary
                                   me-1"
                        ></i>

                        {{ $temple['location'] }}

                    </span>


                    <span>

                        <i
                            class="bi bi-calendar-event
                                   text-pn-primary
                                   me-1"
                        ></i>

                        {{ count($events) }} Upcoming Events

                    </span>

                </div>

            </div>


            <div class="col-12 col-lg-5">

                <div
                    class="pn-digital
                           rounded-5
                           overflow-hidden
                           text-white
                           p-4
                           p-md-5"
                >

                    <div
                        class="mx-auto
                               rounded-circle
                               d-flex
                               align-items-center
                               justify-content-center
                               bg-warning
                               text-dark
                               mb-4"
                        style="width:96px;height:96px;"
                    >

                        <i
                            class="bi bi-calendar-heart
                                   display-6"
                        ></i>

                    </div>


                    <h2
                        class="font-serif
                               h2
                               text-center"
                    >

                        Plan your temple visit.

                    </h2>


                    <p
                        class="text-white-50
                               small
                               text-center
                               mb-0"
                    >

                        Explore upcoming events and check the
                        available registration options.

                    </p>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- ============================================================
     TEMPLE NAVIGATION
============================================================ --}}

<section class="py-4 bg-white border-bottom">

    <div class="container">

        <div
            class="d-flex
                   flex-wrap
                   justify-content-center
                   gap-2"
        >

            <a
                href="#"
                class="btn
                       btn-pn-outline
                       btn-sm
                       rounded-pill"
            >

                <i
                    class="bi bi-bank me-1"
                ></i>

                Temple Details

            </a>


            <a
                href="#"
                class="btn
                       btn-pn-outline
                       btn-sm
                       rounded-pill"
            >

                <i
                    class="bi bi-images me-1"
                ></i>

                Gallery

            </a>


            <span
                class="btn
                       btn-pn
                       btn-sm
                       rounded-pill"
            >

                <i
                    class="bi bi-calendar-event me-1"
                ></i>

                Events

            </span>


            <a
                href="#"
                class="btn
                       btn-pn-outline
                       btn-sm
                       rounded-pill"
            >

                <i
                    class="bi bi-calendar-check me-1"
                ></i>

                Poojas

            </a>

        </div>

    </div>

</section>


{{-- ============================================================
     FEATURED EVENTS
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
                   mb-5"
        >

            <div>

                <span
                    class="small
                           text-pn-gold
                           fw-semibold
                           text-uppercase"
                >
                    Featured Events
                </span>


                <h2
                    class="font-serif
                           display-6
                           text-pn-brown
                           mt-2
                           mb-0"
                >

                    Upcoming Sacred Celebrations

                </h2>

            </div>


            <span
                class="small
                       text-secondary"
            >

                Plan ahead for your temple visit.

            </span>

        </div>


        <div
            class="row
                   g-4"
        >

            @foreach(
                array_filter(
                    $events,
                    fn($event) => $event['featured']
                )
                as $event
            )

                <div class="col-12 col-lg-6">

                    <article
                        class="card
                               border
                               border-warning-subtle
                               rounded-5
                               overflow-hidden
                               h-100"
                    >

                        <div class="row g-0">

                            {{-- Image --}}

                            <div class="col-12 col-sm-5">

                                <div
                                    class="position-relative
                                           h-100"
                                >

                                    <img
                                        src="{{ asset('images/temples/' . $event['image']) }}"
                                        class="img-fluid
                                               w-100
                                               h-100
                                               object-fit-cover"
                                        style="min-height:280px;"
                                        alt="{{ $event['title'] }}"
                                        loading="lazy"
                                    >


                                    <span
                                        class="position-absolute
                                               top-0
                                               start-0
                                               m-3
                                               badge
                                               rounded-pill
                                               bg-warning
                                               text-dark"
                                    >

                                        {{ $event['category'] }}

                                    </span>

                                </div>

                            </div>


                            {{-- Content --}}

                            <div class="col-12 col-sm-7">

                                <div
                                    class="card-body
                                           p-4"
                                >

                                    <span
                                        class="small
                                               text-success
                                               fw-semibold"
                                    >

                                        {{ $event['status'] }}

                                    </span>


                                    <h3
                                        class="font-serif
                                               h3
                                               text-pn-brown
                                               mt-2"
                                    >

                                        {{ $event['title'] }}

                                    </h3>


                                    <p
                                        class="small
                                               text-secondary"
                                    >

                                        {{ $event['description'] }}

                                    </p>


                                    <div
                                        class="vstack
                                               gap-2
                                               small
                                               text-secondary
                                               mb-4"
                                    >

                                        <div>

                                            <i
                                                class="bi bi-calendar3
                                                       text-pn-primary
                                                       me-2"
                                            ></i>

                                            {{ $event['date'] }}

                                        </div>


                                        <div>

                                            <i
                                                class="bi bi-clock
                                                       text-pn-primary
                                                       me-2"
                                            ></i>

                                            {{ $event['time'] }}

                                        </div>


                                        <div>

                                            <i
                                                class="bi bi-geo-alt
                                                       text-pn-primary
                                                       me-2"
                                            ></i>

                                            {{ $event['location'] }}

                                        </div>

                                    </div>


                                    <div
                                        class="d-flex
                                               flex-column
                                               gap-2"
                                    >

                                        <a
                                            href="#"
                                            class="btn
                                                   btn-pn"
                                        >

                                            View Event Details

                                            <i
                                                class="bi bi-arrow-right ms-2"
                                            ></i>

                                        </a>


                                        @if($event['registration'])

                                            <a
                                                href="#"
                                                class="btn
                                                       btn-pn-outline"
                                            >

                                                Register

                                            </a>

                                        @endif

                                    </div>

                                </div>

                            </div>

                        </div>

                    </article>

                </div>

            @endforeach

        </div>

    </div>

</section>


{{-- ============================================================
     FILTERS
============================================================ --}}

<section class="py-4 bg-light-subtle">

    <div class="container">

        <div
            class="card
                   border
                   border-warning-subtle
                   rounded-4"
        >

            <div class="card-body p-3 p-md-4">

                <form>

                    <div
                        class="row
                               g-3
                               align-items-end"
                    >

                        {{-- Search --}}

                        <div class="col-12 col-lg-4">

                            <label
                                for="eventSearch"
                                class="form-label
                                       small
                                       fw-semibold
                                       text-pn-brown"
                            >

                                Search Events

                            </label>


                            <div class="input-group">

                                <span
                                    class="input-group-text
                                           bg-white"
                                >

                                    <i
                                        class="bi bi-search
                                               text-pn-primary"
                                    ></i>

                                </span>


                                <input
                                    type="search"
                                    id="eventSearch"
                                    name="search"
                                    class="form-control"
                                    placeholder="Search events..."
                                >

                            </div>

                        </div>


                        {{-- Category --}}

                        <div class="col-12 col-sm-6 col-lg-3">

                            <label
                                for="eventCategory"
                                class="form-label
                                       small
                                       fw-semibold
                                       text-pn-brown"
                            >

                                Category

                            </label>


                            <select
                                id="eventCategory"
                                name="category"
                                class="form-select"
                            >

                                @foreach($categories as $category)

                                    <option>
                                        {{ $category }}
                                    </option>

                                @endforeach

                            </select>

                        </div>


                        {{-- Month --}}

                        <div class="col-12 col-sm-6 col-lg-3">

                            <label
                                for="eventMonth"
                                class="form-label
                                       small
                                       fw-semibold
                                       text-pn-brown"
                            >

                                Month

                            </label>


                            <select
                                id="eventMonth"
                                name="month"
                                class="form-select"
                            >

                                @foreach($months as $month)

                                    <option>
                                        {{ $month }}
                                    </option>

                                @endforeach

                            </select>

                        </div>


                        {{-- Filter --}}

                        <div class="col-12 col-lg-2">

                            <button
                                type="submit"
                                class="btn
                                       btn-pn
                                       w-100"
                            >

                                <i
                                    class="bi bi-funnel me-1"
                                ></i>

                                Filter

                            </button>

                        </div>

                    </div>

                </form>

            </div>

        </div>

    </div>

</section>


{{-- ============================================================
     EVENT LIST
============================================================ --}}

<section class="py-5 bg-light-subtle">

    <div class="container">

        <div
            class="d-flex
                   align-items-center
                   justify-content-between
                   mb-4"
        >

            <div>

                <span
                    class="small
                           text-pn-gold
                           fw-semibold
                           text-uppercase"
                >
                    Event Calendar
                </span>


                <h2
                    class="font-serif
                           h2
                           text-pn-brown
                           mt-2
                           mb-0"
                >

                    Upcoming Events

                </h2>

            </div>


            <span
                class="small
                       text-secondary"
            >

                {{ count($events) }} events

            </span>

        </div>


        <div
            class="row
                   row-cols-1
                   row-cols-md-2
                   row-cols-xl-3
                   g-4"
        >

            @foreach($events as $event)

                <div class="col">

                    <article
                        class="card
                               border
                               border-warning-subtle
                               rounded-5
                               overflow-hidden
                               h-100"
                    >

                        {{-- Image --}}

                        <div
                            class="position-relative"
                        >

                            <img
                                src="{{ asset('images/temples/' . $event['image']) }}"
                                class="card-img-top
                                       object-fit-cover"
                                style="height:230px;"
                                alt="{{ $event['title'] }}"
                                loading="lazy"
                            >


                            <span
                                class="position-absolute
                                       top-0
                                       start-0
                                       m-3
                                       badge
                                       rounded-pill
                                       bg-warning
                                       text-dark
                                       px-3
                                       py-2"
                            >

                                {{ $event['category'] }}

                            </span>


                            <span
                                class="position-absolute
                                       top-0
                                       end-0
                                       m-3
                                       badge
                                       rounded-pill
                                       bg-success"
                            >

                                {{ $event['status'] }}

                            </span>

                        </div>


                        {{-- Content --}}

                        <div class="card-body p-4">

                            <h3
                                class="font-serif
                                       h4
                                       text-pn-brown
                                       mb-3"
                            >

                                {{ $event['title'] }}

                            </h3>


                            <p
                                class="small
                                       text-secondary
                                       mb-4"
                            >

                                {{ $event['description'] }}

                            </p>


                            {{-- Date --}}

                            <div
                                class="d-flex
                                       align-items-start
                                       gap-3
                                       mb-3"
                            >

                                <div
                                    class="rounded-3
                                           d-flex
                                           align-items-center
                                           justify-content-center
                                           bg-pn-cream
                                           text-pn-primary
                                           flex-shrink-0"
                                    style="width:44px;height:44px;"
                                >

                                    <i
                                        class="bi bi-calendar3"
                                    ></i>

                                </div>


                                <div>

                                    <small
                                        class="text-secondary
                                               d-block"
                                    >
                                        Date
                                    </small>


                                    <strong
                                        class="small
                                               text-pn-brown"
                                    >

                                        {{ $event['date'] }}

                                    </strong>


                                    <small
                                        class="text-secondary
                                               d-block"
                                    >

                                        {{ $event['day'] }}

                                    </small>

                                </div>

                            </div>


                            {{-- Time --}}

                            <div
                                class="d-flex
                                       align-items-center
                                       gap-3
                                       mb-3"
                            >

                                <div
                                    class="rounded-3
                                           d-flex
                                           align-items-center
                                           justify-content-center
                                           bg-pn-cream
                                           text-pn-primary
                                           flex-shrink-0"
                                    style="width:44px;height:44px;"
                                >

                                    <i
                                        class="bi bi-clock"
                                    ></i>

                                </div>


                                <div>

                                    <small
                                        class="text-secondary
                                               d-block"
                                    >
                                        Time
                                    </small>


                                    <strong
                                        class="small
                                               text-pn-brown"
                                    >

                                        {{ $event['time'] }}

                                    </strong>

                                </div>

                            </div>


                            {{-- Location --}}

                            <div
                                class="d-flex
                                       align-items-center
                                       gap-3
                                       mb-4"
                            >

                                <div
                                    class="rounded-3
                                           d-flex
                                           align-items-center
                                           justify-content-center
                                           bg-pn-cream
                                           text-pn-primary
                                           flex-shrink-0"
                                    style="width:44px;height:44px;"
                                >

                                    <i
                                        class="bi bi-geo-alt"
                                    ></i>

                                </div>


                                <div>

                                    <small
                                        class="text-secondary
                                               d-block"
                                    >
                                        Location
                                    </small>


                                    <strong
                                        class="small
                                               text-pn-brown"
                                    >

                                        {{ $event['location'] }}

                                    </strong>

                                </div>

                            </div>


                            {{-- Registration Status --}}

                            @if($event['registration'])

                                <div
                                    class="alert
                                           alert-light
                                           border
                                           small
                                           mb-3"
                                >

                                    <i
                                        class="bi bi-person-check
                                               text-pn-primary
                                               me-1"
                                    ></i>

                                    Registration available

                                    @if($event['payment'])

                                        <span
                                            class="text-secondary"
                                        >
                                            · Payment may apply
                                        </span>

                                    @else

                                        <span
                                            class="text-secondary"
                                        >
                                            · No payment shown
                                        </span>

                                    @endif

                                </div>

                            @endif


                            {{-- Actions --}}

                            <div
                                class="d-flex
                                       flex-column
                                       gap-2"
                            >

                                <a
                                    href="#"
                                    class="btn
                                           btn-pn-outline"
                                >

                                    View Event Details

                                </a>


                                @if($event['registration'])

                                    <a
                                        href="#"
                                        class="btn
                                               btn-pn"
                                    >

                                        Register for Event

                                        <i
                                            class="bi bi-arrow-right ms-2"
                                        ></i>

                                    </a>

                                @endif

                            </div>

                        </div>

                    </article>

                </div>

            @endforeach

        </div>

    </div>

</section>


{{-- ============================================================
     EVENT REGISTRATION INFORMATION
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
                            Event Registration
                        </span>


                        <h2
                            class="font-serif
                                   display-6
                                   text-pn-brown
                                   mt-2
                                   mb-3"
                        >

                            Join a devotional experience.

                        </h2>


                        <div
                            class="pn-divider
                                   mb-4"
                        ></div>


                        <p
                            class="text-secondary"
                        >

                            For events that support registration,
                            you can continue from the event listing
                            to provide the required participant details.

                        </p>


                        <div
                            class="vstack
                                   gap-3
                                   mt-4"
                        >

                            <div
                                class="d-flex
                                       align-items-start
                                       gap-3"
                            >

                                <span
                                    class="badge
                                           rounded-pill
                                           bg-pn-cream
                                           text-pn-primary
                                           px-3
                                           py-2"
                                >
                                    01
                                </span>


                                <div>

                                    <h3
                                        class="font-serif
                                               h5
                                               text-pn-brown"
                                    >

                                        Choose an Event

                                    </h3>


                                    <p
                                        class="small
                                               text-secondary
                                               mb-0"
                                    >

                                        Browse the available temple
                                        events and select the event
                                        you wish to attend.

                                    </p>

                                </div>

                            </div>


                            <div
                                class="d-flex
                                       align-items-start
                                       gap-3"
                            >

                                <span
                                    class="badge
                                           rounded-pill
                                           bg-pn-cream
                                           text-pn-primary
                                           px-3
                                           py-2"
                                >
                                    02
                                </span>


                                <div>

                                    <h3
                                        class="font-serif
                                               h5
                                               text-pn-brown"
                                    >

                                        Register

                                    </h3>


                                    <p
                                        class="small
                                               text-secondary
                                               mb-0"
                                    >

                                        Enter the participant details
                                        requested for the selected event.

                                    </p>

                                </div>

                            </div>


                            <div
                                class="d-flex
                                       align-items-start
                                       gap-3"
                            >

                                <span
                                    class="badge
                                           rounded-pill
                                           bg-pn-cream
                                           text-pn-primary
                                           px-3
                                           py-2"
                                >
                                    03
                                </span>


                                <div>

                                    <h3
                                        class="font-serif
                                               h5
                                               text-pn-brown"
                                    >

                                        Payment, if applicable

                                    </h3>


                                    <p
                                        class="small
                                               text-secondary
                                               mb-0"
                                    >

                                        Some events may require
                                        payment before registration
                                        is confirmed.

                                    </p>

                                </div>

                            </div>


                            <div
                                class="d-flex
                                       align-items-start
                                       gap-3"
                            >

                                <span
                                    class="badge
                                           rounded-pill
                                           bg-pn-cream
                                           text-pn-primary
                                           px-3
                                           py-2"
                                >
                                    04
                                </span>


                                <div>

                                    <h3
                                        class="font-serif
                                               h5
                                               text-pn-brown"
                                    >

                                        Registration Confirmation

                                    </h3>


                                    <p
                                        class="small
                                               text-secondary
                                               mb-0"
                                    >

                                        After successful registration,
                                        a confirmation will be provided.

                                    </p>

                                </div>

                            </div>

                        </div>

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
                            class="bi bi-calendar-heart
                                   fs-4"
                        ></i>

                    </div>


                    <span
                        class="small
                               text-warning
                               fw-semibold
                               text-uppercase"
                    >
                        Sacred Gatherings
                    </span>


                    <h2
                        class="font-serif
                               h2
                               mt-2"
                    >

                        Experience the temple together.

                    </h2>


                    <p
                        class="text-white-50
                               small"
                    >

                        Stay connected with temple celebrations,
                        devotional activities and upcoming events.

                    </p>


                    <div
                        class="d-flex
                               align-items-center
                               gap-3
                               mt-4"
                    >

                        <div
                            class="rounded-circle
                                   bg-white
                                   bg-opacity-10
                                   d-flex
                                   align-items-center
                                   justify-content-center"
                            style="width:48px;height:48px;"
                        >

                            <i
                                class="bi bi-bell
                                       text-warning"
                            ></i>

                        </div>


                        <div>

                            <strong
                                class="d-block"
                            >

                                Stay Updated

                            </strong>


                            <small
                                class="text-white-50"
                            >

                                Follow temple event notifications.

                            </small>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- ============================================================
     TEMPLE EVENT SUPPORT
============================================================ --}}

<section class="py-5 bg-pn-cream">

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
                Temple Experience
            </span>


            <h2
                class="font-serif
                       display-6
                       text-pn-brown
                       mt-2"
            >

                Explore more from this temple.

            </h2>

        </div>


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
                                   fs-3
                                   text-pn-primary"
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

                            View the temple profile, location and
                            available services.

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
                            class="bi bi-images
                                   fs-3
                                   text-pn-primary"
                        ></i>


                        <h3
                            class="font-serif
                                   h5
                                   text-pn-brown
                                   mt-3"
                        >

                            Temple Gallery

                        </h3>


                        <p
                            class="small
                                   text-secondary
                                   mb-0"
                        >

                            Explore photographs and sacred moments
                            from the temple.

                        </p>


                        <span
                            class="small
                                   text-pn-primary
                                   fw-semibold
                                   d-block
                                   mt-3"
                        >

                            View Gallery

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
                                   fs-3
                                   text-pn-primary"
                        ></i>


                        <h3
                            class="font-serif
                                   h5
                                   text-pn-brown
                                   mt-3"
                        >

                            Temple Poojas

                        </h3>


                        <p
                            class="small
                                   text-secondary
                                   mb-0"
                        >

                            Explore available Pooja services
                            associated with the temple.

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

                    May every sacred gathering bring blessings.

                </h2>


                <p
                    class="text-white-50
                           col-lg-7
                           mx-auto"
                >

                    Continue exploring the temple, its Poojas,
                    gallery and upcoming events.

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

                        Back to Temple

                    </a>

                </div>

            </div>

        </div>

    </div>

</section>

@endsection