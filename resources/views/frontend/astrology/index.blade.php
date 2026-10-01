@extends('layouts.app')

@section('title', 'Astrology Services | Pooja Nilayam')

@section(
    'meta_description',
    'Explore astrology services including Horoscope, Kundli, Match Making, Numerology, Palm Reading and Vastu Consultation.'
)

@section('content')




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
                    Astrology
                </li>

            </ol>

        </nav>

    </div>

</section>


{{-- ============================================================
     ASTROLOGY HERO
============================================================ --}}

<section class="bg-pn-cream py-5 overflow-hidden">

    <div class="container">

        <div
            class="row
                   align-items-center
                   g-5"
        >

            {{-- =================================================
                 HERO CONTENT
            ================================================== --}}

            <div class="col-12 col-lg-6">

                <span
                    class="small
                           text-pn-gold
                           fw-semibold
                           text-uppercase"
                >

                    Astrology & Guidance

                </span>


                <h1
                    class="font-serif
                           display-3
                           text-pn-brown
                           mt-2
                           mb-3"
                >

                    Discover guidance
                    <span
                        class="text-pn-primary"
                    >
                        for your journey.
                    </span>

                </h1>


                <p
                    class="lead
                           text-secondary
                           col-xl-11
                           mb-4"
                >

                    Explore traditional astrology services,
                    connect with experienced astrologers and
                    choose a consultation that suits you.

                </p>


                {{-- Search --}}

                <form
                    action="{{ route('astrology.index') }}"
                    method="GET"
                >

                    <div
                        class="input-group
                               input-group-lg
                               bg-white
                               rounded-pill
                               shadow-sm
                               overflow-hidden"
                    >

                        <span
                            class="input-group-text
                                   bg-white
                                   border-0
                                   ps-4"
                        >

                            <i
                                class="bi bi-search
                                       text-pn-primary"
                            ></i>

                        </span>


                        <input
                            type="search"
                            name="search"
                            class="form-control
                                   border-0
                                   shadow-none"
                            placeholder="Search astrology services..."
                            aria-label="Search astrology services"
                        >


                        <button
                            type="submit"
                            class="btn
                                   btn-pn
                                   rounded-pill
                                   m-1
                                   px-4"
                        >

                            Explore

                            <i
                                class="bi bi-arrow-right ms-1"
                            ></i>

                        </button>

                    </div>

                </form>


                {{-- Trust Points --}}

                <div
                    class="row
                           row-cols-1
                           row-cols-sm-3
                           g-3
                           mt-4"
                >

                    <div class="col">

                        <div
                            class="d-flex
                                   align-items-center
                                   gap-2"
                        >

                            <div
                                class="rounded-circle
                                       bg-white
                                       text-pn-primary
                                       d-flex
                                       align-items-center
                                       justify-content-center
                                       flex-shrink-0"
                                style="width:42px;height:42px;"
                            >

                                <i
                                    class="bi bi-patch-check"
                                ></i>

                            </div>


                            <div>

                                <strong
                                    class="small
                                           d-block
                                           text-pn-brown"
                                >

                                    Trusted

                                </strong>


                                <small
                                    class="text-secondary"
                                >

                                    Astrologers

                                </small>

                            </div>

                        </div>

                    </div>


                    <div class="col">

                        <div
                            class="d-flex
                                   align-items-center
                                   gap-2"
                        >

                            <div
                                class="rounded-circle
                                       bg-white
                                       text-pn-primary
                                       d-flex
                                       align-items-center
                                       justify-content-center
                                       flex-shrink-0"
                                style="width:42px;height:42px;"
                            >

                                <i
                                    class="bi bi-calendar-check"
                                ></i>

                            </div>


                            <div>

                                <strong
                                    class="small
                                           d-block
                                           text-pn-brown"
                                >

                                    Flexible

                                </strong>


                                <small
                                    class="text-secondary"
                                >

                                    Consultation slots

                                </small>

                            </div>

                        </div>

                    </div>


                    <div class="col">

                        <div
                            class="d-flex
                                   align-items-center
                                   gap-2"
                        >

                            <div
                                class="rounded-circle
                                       bg-white
                                       text-pn-primary
                                       d-flex
                                       align-items-center
                                       justify-content-center
                                       flex-shrink-0"
                                style="width:42px;height:42px;"
                            >

                                <i
                                    class="bi bi-shield-check"
                                ></i>

                            </div>


                            <div>

                                <strong
                                    class="small
                                           d-block
                                           text-pn-brown"
                                >

                                    Secure

                                </strong>


                                <small
                                    class="text-secondary"
                                >

                                    Online booking

                                </small>

                            </div>

                        </div>

                    </div>

                </div>

            </div>


            {{-- =================================================
                 HERO VISUAL
            ================================================== --}}

            <div class="col-12 col-lg-6">

                <div
                    class="position-relative"
                >

                    {{-- Main visual --}}

                    <div
                        class="pn-digital
                               rounded-5
                               overflow-hidden
                               position-relative"
                    >

                        <div
                            class="ratio ratio-4x3"
                        >

                            <img
                                src="{{ asset('images/home/hero.webp') }}"
                                class="object-fit-cover"
                                alt="Astrology consultation"
                                loading="eager"
                            >

                        </div>


                        {{-- Overlay --}}

                        <div
                            class="position-absolute
                                   bottom-0
                                   start-0
                                   end-0
                                   p-4
                                   text-white"
                            style="background:linear-gradient(transparent,rgba(35,20,12,.9));"
                        >

                            <span
                                class="small
                                       text-warning
                                       fw-semibold
                                       text-uppercase"
                            >

                                Astrology Guidance

                            </span>


                            <h2
                                class="font-serif
                                       h2
                                       mt-2
                                       mb-1"
                            >

                                Explore your questions
                                with clarity.

                            </h2>


                            <small
                                class="text-white-50"
                            >

                                Traditional services,
                                thoughtfully presented.

                            </small>

                        </div>

                    </div>


                    {{-- Floating Card --}}

                    <div
                        class="position-absolute
                               bottom-0
                               start-0
                               translate-middle-y
                               ms-3
                               d-none
                               d-sm-block"
                    >

                        <div
                            class="bg-white
                                   rounded-4
                                   shadow-sm
                                   p-3"
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
                                           justify-content-center"
                                    style="width:48px;height:48px;"
                                >

                                    <i class="bi bi-stars"></i>

                                </div>


                                <div>

                                    <strong
                                        class="small
                                               d-block
                                               text-pn-brown"
                                    >

                                        Personalized Guidance

                                    </strong>


                                    <small
                                        class="text-secondary"
                                    >

                                        Choose what you need.

                                    </small>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- ============================================================
     ASTROLOGY SERVICE NAVIGATION
============================================================ --}}

<section class="py-4 bg-white border-bottom">

    <div class="container">

        <div
            class="row
                   row-cols-2
                   row-cols-md-3
                   row-cols-lg-6
                   g-3"
        >

            @foreach($services as $service)

                <div class="col">

                    <a
                        href="{{ match (Str::slug($service['title'])) { 'horoscope' => route('astrology.horoscope'), 'kundli' => route('astrology.kundli'), 'match-making' => route('astrology.match-making'), 'numerology' => route('astrology.numerology'), 'palm-reading' => route('astrology.palm-reading'), 'vastu-consultation' => route('astrology.vastu'), default => route('astrology.index') } }}"
                        class="card
                               border
                               border-warning-subtle
                               rounded-4
                               h-100
                               text-center
                               text-decoration-none
                               text-pn-brown"
                    >

                        <div
                            class="card-body
                                   p-3"
                        >

                            <div
                                class="rounded-circle
                                       bg-pn-cream
                                       text-pn-primary
                                       d-flex
                                       align-items-center
                                       justify-content-center
                                       mx-auto"
                                style="width:58px;height:58px;"
                            >

                                <i
                                    class="bi {{ $service['icon'] }}
                                           fs-4"
                                ></i>

                            </div>


                            <h2
                                class="h6
                                       fw-semibold
                                       mt-3
                                       mb-1"
                            >

                                {{ $service['title'] }}

                            </h2>


                            <small
                                class="text-secondary"
                            >

                                {{ $service['subtitle'] }}

                            </small>

                        </div>

                    </a>

                </div>

            @endforeach

        </div>

    </div>

</section>


{{-- ============================================================
     INTRODUCTION
============================================================ --}}

<section class="py-5">

    <div class="container">

        <div
            class="row
                   justify-content-center"
        >

            <div class="col-12 col-lg-8">

                <div
                    class="text-center"
                >

                    <span
                        class="small
                               text-pn-gold
                               fw-semibold
                               text-uppercase"
                    >

                        Astrology Services

                    </span>


                    <h2
                        class="font-serif
                               display-6
                               text-pn-brown
                               mt-2"
                    >

                        Guidance for the questions
                        that matter to you.

                    </h2>


                    <div
                        class="pn-divider
                               mx-auto
                               my-3"
                    ></div>


                    <p
                        class="text-secondary
                               mb-0"
                    >

                        Choose from a range of astrology-related
                        services available through Pooja Nilayam.
                        Each service has its own dedicated experience.

                    </p>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- ============================================================
     SERVICE CARDS
============================================================ --}}

<section class="pb-5">

    <div class="container">

        <div
            class="row
                   row-cols-1
                   row-cols-md-2
                   row-cols-lg-3
                   g-4"
        >

            @foreach($services as $index => $service)

                <div class="col">

                    <article
                        class="card
                               border
                               border-warning-subtle
                               rounded-5
                               h-100"
                    >

                        <div class="card-body p-4 p-md-5">

                            {{-- Number --}}

                            <div
                                class="d-flex
                                       align-items-center
                                       justify-content-between
                                       mb-4"
                            >

                                <div
                                    class="rounded-circle
                                           bg-pn-cream
                                           text-pn-primary
                                           d-flex
                                           align-items-center
                                           justify-content-center"
                                    style="width:62px;height:62px;"
                                >

                                    <i
                                        class="bi {{ $service['icon'] }}
                                               fs-4"
                                    ></i>

                                </div>


                                <span
                                    class="small
                                           text-secondary"
                                >

                                    0{{ $index + 1 }}

                                </span>

                            </div>


                            <h2
                                class="font-serif
                                       h3
                                       text-pn-brown
                                       mb-1"
                            >

                                {{ $service['title'] }}

                            </h2>


                            <span
                                class="small
                                       text-pn-primary
                                       fw-semibold"
                            >

                                {{ $service['subtitle'] }}

                            </span>


                            <p
                                class="small
                                       text-secondary
                                       mt-3
                                       mb-4"
                            >

                                {{ $service['description'] }}

                            </p>


                            <a
                                href="{{ match (Str::slug($service['title'])) { 'horoscope' => route('astrology.horoscope'), 'kundli' => route('astrology.kundli'), 'match-making' => route('astrology.match-making'), 'numerology' => route('astrology.numerology'), 'palm-reading' => route('astrology.palm-reading'), 'vastu-consultation' => route('astrology.vastu'), default => route('astrology.index') } }}"
                                class="btn
                                       btn-pn-outline
                                       w-100"
                            >

                                Explore {{ $service['title'] }}

                                <i
                                    class="bi bi-arrow-right ms-2"
                                ></i>

                            </a>

                        </div>

                    </article>

                </div>

            @endforeach

        </div>

    </div>

</section>


{{-- ============================================================
     CONSULTATION TYPES
============================================================ --}}

<section class="py-5 bg-pn-cream">

    <div class="container">

        <div
            class="row
                   align-items-center
                   g-5"
        >

            <div class="col-12 col-lg-5">

                <span
                    class="small
                           text-pn-gold
                           fw-semibold
                           text-uppercase"
                >

                    Consultation Options

                </span>


                <h2
                    class="font-serif
                           display-6
                           text-pn-brown
                           mt-2
                           mb-3"
                >

                    Choose how you want
                    to connect.

                </h2>


                <div
                    class="pn-divider
                           mb-4"
                ></div>


                <p
                    class="text-secondary"
                >

                    The documented astrology consultation flow
                    supports three consultation types:
                    Video, Audio and Chat.

                </p>


                <a
                    href="#astrologers"
                    class="btn
                           btn-pn"
                >

                    Find an Astrologer

                    <i
                        class="bi bi-arrow-right ms-2"
                    ></i>

                </a>

            </div>


            <div class="col-12 col-lg-7">

                <div
                    class="row
                           row-cols-1
                           row-cols-md-3
                           g-3"
                >

                    @foreach($consultationTypes as $type)

                        <div class="col">

                            <div
                                class="card
                                       border
                                       border-warning-subtle
                                       rounded-4
                                       bg-white
                                       h-100"
                            >

                                <div
                                    class="card-body
                                           p-4
                                           text-center"
                                >

                                    <div
                                        class="rounded-circle
                                               bg-pn-cream
                                               text-pn-primary
                                               d-flex
                                               align-items-center
                                               justify-content-center
                                               mx-auto"
                                        style="width:58px;height:58px;"
                                    >

                                        <i
                                            class="bi {{ $type['icon'] }}
                                                   fs-4"
                                        ></i>

                                    </div>


                                    <h3
                                        class="font-serif
                                               h5
                                               text-pn-brown
                                               mt-3"
                                    >

                                        {{ $type['title'] }}

                                    </h3>


                                    <p
                                        class="small
                                               text-secondary
                                               mb-0"
                                    >

                                        {{ $type['description'] }}

                                    </p>

                                </div>

                            </div>

                        </div>

                    @endforeach

                </div>

            </div>

        </div>

    </div>

</section>


{{-- ============================================================
     ASTROLOGERS
============================================================ --}}

<section
    id="astrologers"
    class="py-5"
>

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

                    Experienced Guidance

                </span>


                <h2
                    class="font-serif
                           display-6
                           text-pn-brown
                           mt-2
                           mb-0"
                >

                    Meet Our Astrologers

                </h2>

            </div>


            <a
                href="{{ route('astrology.index') }}"
                class="btn
                       btn-pn-outline
                       align-self-start
                       align-self-md-auto"
            >

                View All Astrologers

                <i
                    class="bi bi-arrow-right ms-2"
                ></i>

            </a>

        </div>


        <div
            class="row
                   row-cols-1
                   row-cols-md-2
                   row-cols-lg-3
                   g-4"
        >

            @foreach($astrologers as $astrologer)

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

                            @if(!empty($astrologer['image']))

                                <img
                                    src="{{ asset($astrologer['image']) }}"
                                    class="card-img-top
                                           object-fit-cover"
                                    style="height:280px;"
                                    alt="{{ $astrologer['name'] }}"
                                    loading="lazy"
                                >

                            @else

                                <div
                                    class="d-flex
                                           align-items-center
                                           justify-content-center
                                           bg-pn-cream
                                           text-pn-primary"
                                    style="height:280px;"
                                    aria-label="Astrologer image unavailable"
                                >
                                    <i class="bi bi-person-circle display-1"></i>
                                </div>

                            @endif


                            @if($astrologer['verified'])

                                <span
                                    class="position-absolute
                                           top-0
                                           start-0
                                           m-3
                                           badge
                                           rounded-pill
                                           bg-success
                                           px-3
                                           py-2"
                                >

                                    <i
                                        class="bi bi-patch-check-fill me-1"
                                    ></i>

                                    Verified

                                </span>

                            @endif

                        </div>


                        <div
                            class="card-body
                                   p-4
                                   d-flex
                                   flex-column"
                        >

                            <div
                                class="d-flex
                                       align-items-center
                                       justify-content-between
                                       gap-2
                                       mb-2"
                            >

                                <span
                                    class="small
                                           text-pn-primary
                                           fw-semibold"
                                >

                                    {{ $astrologer['specialization'] }}

                                </span>


                                @if($astrologer['rating'] !== null)

                                    <span
                                        class="small
                                               text-secondary"
                                    >

                                        <i
                                            class="bi bi-star-fill
                                                   text-warning"
                                        ></i>

                                        {{ $astrologer['rating'] }}

                                    </span>

                                @endif

                            </div>


                            <h3
                                class="font-serif
                                       h4
                                       text-pn-brown"
                            >

                                {{ $astrologer['name'] }}

                            </h3>


                            <div
                                class="vstack
                                       gap-2
                                       mb-4"
                            >

                                <small
                                    class="text-secondary"
                                >

                                    <i
                                        class="bi bi-award
                                               text-pn-primary
                                               me-1"
                                    ></i>

                                    {{ $astrologer['experience'] }}

                                </small>


                                <small
                                    class="text-secondary"
                                >

                                    <i
                                        class="bi bi-translate
                                               text-pn-primary
                                               me-1"
                                    ></i>

                                    {{ $astrologer['languages'] }}

                                </small>


                                <small
                                    class="text-secondary"
                                >

                                    <i
                                        class="bi bi-people
                                               text-pn-primary
                                               me-1"
                                    ></i>

                                    @if($astrologer['reviews'] > 0)
                                        {{ $astrologer['reviews'] }} reviews
                                    @else
                                        No reviews yet
                                    @endif

                                </small>

                            </div>


                            <div
                                class="mt-auto
                                       d-grid
                                       gap-2"
                            >

                                <a
                                    href="{{ route('astrology.index') }}"
                                    class="btn
                                           btn-pn-outline"
                                >

                                    View Profile

                                </a>


                                <a
                                    href="{{ route('astrology.booking') }}"
                                    class="btn
                                           btn-pn"
                                >

                                    Book Consultation

                                    <i
                                        class="bi bi-arrow-right ms-2"
                                    ></i>

                                </a>

                            </div>

                        </div>

                    </article>

                </div>

            @endforeach

        </div>

    </div>

</section>


{{-- ============================================================
     TOPICS
============================================================ --}}

<section class="py-5 bg-light-subtle">

    <div class="container">

        <div class="text-center mb-5">

            <span
                class="small
                       text-pn-gold
                       fw-semibold
                       text-uppercase"
            >

                Explore Guidance

            </span>


            <h2
                class="font-serif
                       display-6
                       text-pn-brown
                       mt-2"
            >

                What would you like guidance on?

            </h2>


            <p
                class="text-secondary
                       col-lg-7
                       mx-auto
                       mb-0"
            >

                Start with a topic that is important to you
                and explore the available astrology services.

            </p>

        </div>


        <div
            class="row
                   row-cols-2
                   row-cols-sm-3
                   row-cols-md-4
                   g-3
                   justify-content-center"
        >

            @foreach($topics as $topic)

                <div class="col">

                    <a
                        href="#"
                        class="d-flex
                               align-items-center
                               gap-3
                               border
                               border-warning-subtle
                               rounded-4
                               bg-white
                               p-3
                               text-decoration-none
                               text-pn-brown
                               h-100"
                    >

                        <div
                            class="rounded-circle
                                   bg-pn-cream
                                   text-pn-primary
                                   d-flex
                                   align-items-center
                                   justify-content-center
                                   flex-shrink-0"
                            style="width:44px;height:44px;"
                        >

                            <i class="bi bi-stars"></i>

                        </div>


                        <span
                            class="small
                                   fw-semibold"
                        >

                            {{ $topic }}

                        </span>

                    </a>

                </div>

            @endforeach

        </div>

    </div>

</section>


{{-- ============================================================
     HOW ASTROLOGY CONSULTATION WORKS
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

                Simple Process

            </span>


            <h2
                class="font-serif
                       display-6
                       text-pn-brown
                       mt-2"
            >

                How Astrology Consultation Works

            </h2>


            <div
                class="pn-divider
                       mx-auto
                       my-3"
            ></div>

        </div>


        <div
            class="row
                   row-cols-1
                   row-cols-md-3
                   row-cols-lg-6
                   g-4"
        >

            {{-- Step 1 --}}

            <div class="col">

                <div
                    class="text-center
                           h-100"
                >

                    <div
                        class="mx-auto
                               rounded-circle
                               bg-pn-cream
                               text-pn-primary
                               d-flex
                               align-items-center
                               justify-content-center
                               fw-semibold
                               fs-5"
                        style="width:62px;height:62px;"
                    >
                        01
                    </div>


                    <h3
                        class="font-serif
                               h6
                               text-pn-brown
                               mt-3"
                    >

                        Browse Astrologers

                    </h3>


                    <p
                        class="small
                               text-secondary
                               mb-0"
                    >

                        Explore available astrologers.

                    </p>

                </div>

            </div>


            {{-- Step 2 --}}

            <div class="col">

                <div
                    class="text-center
                           h-100"
                >

                    <div
                        class="mx-auto
                               rounded-circle
                               bg-pn-cream
                               text-pn-primary
                               d-flex
                               align-items-center
                               justify-content-center
                               fw-semibold
                               fs-5"
                        style="width:62px;height:62px;"
                    >
                        02
                    </div>


                    <h3
                        class="font-serif
                               h6
                               text-pn-brown
                               mt-3"
                    >

                        Select Astrologer

                    </h3>


                    <p
                        class="small
                               text-secondary
                               mb-0"
                    >

                        Choose the astrologer you prefer.

                    </p>

                </div>

            </div>


            {{-- Step 3 --}}

            <div class="col">

                <div
                    class="text-center
                           h-100"
                >

                    <div
                        class="mx-auto
                               rounded-circle
                               bg-pn-cream
                               text-pn-primary
                               d-flex
                               align-items-center
                               justify-content-center
                               fw-semibold
                               fs-5"
                        style="width:62px;height:62px;"
                    >
                        03
                    </div>


                    <h3
                        class="font-serif
                               h6
                               text-pn-brown
                               mt-3"
                    >

                        Choose Type

                    </h3>


                    <p
                        class="small
                               text-secondary
                               mb-0"
                    >

                        Video, Audio or Chat.

                    </p>

                </div>

            </div>


            {{-- Step 4 --}}

            <div class="col">

                <div
                    class="text-center
                           h-100"
                >

                    <div
                        class="mx-auto
                               rounded-circle
                               bg-pn-cream
                               text-pn-primary
                               d-flex
                               align-items-center
                               justify-content-center
                               fw-semibold
                               fs-5"
                        style="width:62px;height:62px;"
                    >
                        04
                    </div>


                    <h3
                        class="font-serif
                               h6
                               text-pn-brown
                               mt-3"
                    >

                        Select Slot

                    </h3>


                    <p
                        class="small
                               text-secondary
                               mb-0"
                    >

                        Choose an available time.

                    </p>

                </div>

            </div>


            {{-- Step 5 --}}

            <div class="col">

                <div
                    class="text-center
                           h-100"
                >

                    <div
                        class="mx-auto
                               rounded-circle
                               bg-pn-cream
                               text-pn-primary
                               d-flex
                               align-items-center
                               justify-content-center
                               fw-semibold
                               fs-5"
                        style="width:62px;height:62px;"
                    >
                        05
                    </div>


                    <h3
                        class="font-serif
                               h6
                               text-pn-brown
                               mt-3"
                    >

                        Payment

                    </h3>


                    <p
                        class="small
                               text-secondary
                               mb-0"
                    >

                        Complete secure payment.

                    </p>

                </div>

            </div>


            {{-- Step 6 --}}

            <div class="col">

                <div
                    class="text-center
                           h-100"
                >

                    <div
                        class="mx-auto
                               rounded-circle
                               bg-success-subtle
                               text-success
                               d-flex
                               align-items-center
                               justify-content-center
                               fw-semibold
                               fs-5"
                        style="width:62px;height:62px;"
                    >
                        <i class="bi bi-check-lg"></i>
                    </div>


                    <h3
                        class="font-serif
                               h6
                               text-pn-brown
                               mt-3"
                    >

                        Confirmed

                    </h3>


                    <p
                        class="small
                               text-secondary
                               mb-0"
                    >

                        Consultation is confirmed.

                    </p>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- ============================================================
     IMPORTANT NOTE
============================================================ --}}

<section class="pb-5">

    <div class="container">

        <div
            class="alert
                   alert-light
                   border
                   border-warning-subtle
                   rounded-4
                   d-flex
                   align-items-start
                   gap-3"
        >

            <i
                class="bi bi-info-circle
                       text-pn-primary
                       fs-5"
            ></i>


            <div>

                <strong
                    class="d-block
                           text-pn-brown
                           mb-1"
                >

                    Astrology consultations are provided
                    as a guidance service.

                </strong>


                <small
                    class="text-secondary"
                >

                    The available consultation type, astrologer
                    and appointment slot will depend on the
                    services configured on the platform.

                </small>

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
                    class="bi bi-stars
                           display-5
                           text-warning"
                ></i>


                <h2
                    class="font-serif
                           display-6
                           mt-3"
                >

                    Find the guidance you are looking for.

                </h2>


                <p
                    class="text-white-50
                           col-lg-7
                           mx-auto"
                >

                    Explore astrology services and connect
                    with an astrologer through the consultation
                    option that suits you.

                </p>


                <a
                    href="#astrologers"
                    class="btn
                           btn-warning
                           text-dark
                           fw-semibold
                           px-4"
                >

                    Find an Astrologer

                    <i
                        class="bi bi-arrow-right ms-2"
                    ></i>

                </a>

            </div>

        </div>

    </div>

</section>

@endsection