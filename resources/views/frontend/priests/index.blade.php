@extends('layouts.app')

@section('title', 'Priests | Pooja Nilayam')

@section(
    'meta_description',
    'Find trusted priests for poojas, rituals and devotional services through Pooja Nilayam.'
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
                    Priests
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

                <span
                    class="small
                           text-pn-gold
                           fw-semibold
                           text-uppercase"
                >
                    Trusted Priests
                </span>


                <h1
                    class="font-serif
                           display-4
                           text-pn-brown
                           mt-2
                           mb-3"
                >

                    Find the right priest
                    <span class="d-block">
                        for your sacred occasion.
                    </span>

                </h1>


                <p
                    class="lead
                           text-secondary
                           col-xl-10
                           mb-4"
                >

                    Discover verified priests with experience
                    in traditional poojas, rituals and devotional
                    services.

                </p>


                {{-- Search --}}

                <form action="{{ route('priest.index') }}" method="GET">
    <input type="hidden" name="location" value="{{ request('location') }}">
    <input type="hidden" name="specialization" value="{{ request('specialization') }}">
    <input type="hidden" name="language" value="{{ request('language') }}">

    {{-- Keep the existing search input and button here. --}}

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
                            type="search" value="{{ request('search') }}"
                            name="search"
                            class="form-control
                                   border-0
                                   shadow-none"
                            placeholder="Search priests, services or locations..."
                            aria-label="Search priests"
                        >


                        <button
                            type="submit"
                            class="btn
                                   btn-pn
                                   rounded-pill
                                   m-1
                                   px-4"
                        >

                            Search

                        </button>

                    </div>

                </form>

            </div>


            <div class="col-12 col-lg-5">

                <div
                    class="pn-digital
                           rounded-5
                           text-white
                           p-4
                           p-md-5
                           text-center"
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
                        style="width:100px;height:100px;"
                    >

                        <i
                            class="bi bi-person-badge
                                   display-5"
                        ></i>

                    </div>


                    <h2
                        class="font-serif
                               h2"
                    >

                        Experienced & Verified

                    </h2>


                    <p
                        class="text-white-50
                               small
                               mb-0"
                    >

                        Connect with priests who can help you
                        perform meaningful traditional rituals.

                    </p>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- ============================================================
     QUICK BENEFITS
============================================================ --}}

<section class="py-4 bg-white border-bottom">

    <div class="container">

        <div
            class="row
                   row-cols-2
                   row-cols-md-4
                   g-3"
        >

            <div class="col">

                <div
                    class="d-flex
                           align-items-center
                           gap-3
                           p-3
                           h-100"
                >

                    <div
                        class="rounded-circle
                               d-flex
                               align-items-center
                               justify-content-center
                               bg-pn-cream
                               text-pn-primary
                               flex-shrink-0"
                        style="width:48px;height:48px;"
                    >

                        <i class="bi bi-patch-check"></i>

                    </div>


                    <div>

                        <strong
                            class="small
                                   text-pn-brown
                                   d-block"
                        >

                            Verified Priests

                        </strong>


                        <small
                            class="text-secondary"
                        >

                            Trusted profiles

                        </small>

                    </div>

                </div>

            </div>


            <div class="col">

                <div
                    class="d-flex
                           align-items-center
                           gap-3
                           p-3
                           h-100"
                >

                    <div
                        class="rounded-circle
                               d-flex
                               align-items-center
                               justify-content-center
                               bg-pn-cream
                               text-pn-primary
                               flex-shrink-0"
                        style="width:48px;height:48px;"
                    >

                        <i class="bi bi-mortarboard"></i>

                    </div>


                    <div>

                        <strong
                            class="small
                                   text-pn-brown
                                   d-block"
                        >

                            Experienced

                        </strong>


                        <small
                            class="text-secondary"
                        >

                            Traditional knowledge

                        </small>

                    </div>

                </div>

            </div>


            <div class="col">

                <div
                    class="d-flex
                           align-items-center
                           gap-3
                           p-3
                           h-100"
                >

                    <div
                        class="rounded-circle
                               d-flex
                               align-items-center
                               justify-content-center
                               bg-pn-cream
                               text-pn-primary
                               flex-shrink-0"
                        style="width:48px;height:48px;"
                    >

                        <i class="bi bi-calendar-check"></i>

                    </div>


                    <div>

                        <strong
                            class="small
                                   text-pn-brown
                                   d-block"
                        >

                            Check Availability

                        </strong>


                        <small
                            class="text-secondary"
                        >

                            Choose suitable slots

                        </small>

                    </div>

                </div>

            </div>


            <div class="col">

                <div
                    class="d-flex
                           align-items-center
                           gap-3
                           p-3
                           h-100"
                >

                    <div
                        class="rounded-circle
                               d-flex
                               align-items-center
                               justify-content-center
                               bg-pn-cream
                               text-pn-primary
                               flex-shrink-0"
                        style="width:48px;height:48px;"
                    >

                        <i class="bi bi-star"></i>

                    </div>


                    <div>

                        <strong
                            class="small
                                   text-pn-brown
                                   d-block"
                        >

                            Rated by Devotees

                        </strong>


                        <small
                            class="text-secondary"
                        >

                            Community feedback

                        </small>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- ============================================================
     FILTER SECTION
============================================================ --}}

<section class="py-5 bg-light-subtle">

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
                    Priest Directory
                </span>


                <h2
                    class="font-serif
                           display-6
                           text-pn-brown
                           mt-2
                           mb-0"
                >

                    Find a Priest

                </h2>

            </div>


            <span
                class="small
                       text-secondary"
            >

                Showing
                <strong>
    {{ $priests instanceof \Illuminate\Pagination\LengthAwarePaginator
        ? $priests->total()
        : count($priests) }}
</strong>
                priests

            </span>

        </div>


        <div
            class="card
                   border
                   border-warning-subtle
                   rounded-4
                   mb-5"
        >

            <div class="card-body p-3 p-md-4">

                <form action="{{ route('priest.index') }}" method="GET">
    <input type="hidden" name="search" value="{{ request('search') }}">

                    <div
                        class="row
                               g-3
                               align-items-end"
                    >

                        {{-- Location --}}

                        <div class="col-12 col-md-4">

                            <label
                                for="location"
                                class="form-label
                                       small
                                       fw-semibold
                                       text-pn-brown"
                            >

                                Location

                            </label>


							<select id="location" name="location" class="form-select">
							<option value="">All locations</option>

							@foreach ($locations as $location)
							<option
							value="{{ $location }}"
							@selected(request('location') === $location)
							>
							{{ $location }}
							</option>
							@endforeach
							</select>

                        </div>


                        {{-- Specialization --}}

                        <div class="col-12 col-md-3">

                            <label
                                for="specialization"
                                class="form-label
                                       small
                                       fw-semibold
                                       text-pn-brown"
                            >

                                Specialization

                            </label>


							<select id="specialization" name="specialization" class="form-select">
							<option value="">All specializations</option>

							@foreach ($specializations as $specialization)
							<option
							value="{{ $specialization }}"
							@selected(request('specialization') === $specialization)
							>
							{{ $specialization }}
							</option>
							@endforeach
							</select>

                        </div>


                        {{-- Language --}}

                        <div class="col-12 col-md-3">

                            <label
                                for="language"
                                class="form-label
                                       small
                                       fw-semibold
                                       text-pn-brown"
                            >

                                Language

                            </label>


						<select id="language" name="language" class="form-select">
						<option value="">All languages</option>

						@foreach ($languages as $language)
						<option
						value="{{ $language }}"
						@selected(request('language') === $language)
						>
						{{ $language }}
						</option>
						@endforeach
						</select>

                        </div>


                        {{-- Filter --}}

                        <div class="col-12 col-md-2">

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


        {{-- ====================================================
             PRIEST CARDS
        ===================================================== --}}

        
<div
    class="row row-cols-1 row-cols-md-2 row-cols-xl-3 g-4"
    data-pn-listing="priests"
>


            @foreach($priests as $index => $priest)

                <div class="col pn-listing-item"
                     data-pn-item
                     data-name="{{ $priest['name'] }}"
                     data-location="{{ $priest['location'] }}"
                     data-specializations="{{ implode(' ', $priest['specializations']) }}"
                     data-languages="{{ implode(' ', $priest['languages']) }}"
                     data-rating="{{ $priest['rating'] }}"
                     data-reviews="{{ $priest['reviews'] }}"
                     data-available="{{ $priest['available'] ? '1' : '0' }}"
                     data-search="{{ $priest['search_text'] ?? ($priest['name'] . ' ' . $priest['title'] . ' ' . $priest['location'] . ' ' . implode(' ', $priest['specializations']) . ' ' . implode(' ', $priest['languages'])) }}">

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

                            
@php
    $defaultPriestImages = [
        'images/home/priests/priest-1.webp',
        'images/home/priests/priest-2.webp',
        'images/home/priests/priest-3.webp',
        'images/home/priests/priest-4.webp',
    ];

    $priestImage = $priest['image']
        ?: $defaultPriestImages[$index % count($defaultPriestImages)];
@endphp

<img
    src="{{ filter_var($priestImage, FILTER_VALIDATE_URL)
        ? $priestImage
        : asset($priestImage) }}"
    class="card-img-top object-fit-cover"
    style="height:300px;"
    alt="{{ $priest['name'] }}"
    loading="lazy"
>



                            {{-- Verification --}}

                            @if($priest['verified'])

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


                            {{-- Availability --}}

                            <span
                                class="position-absolute
                                       bottom-0
                                       start-0
                                       m-3
                                       badge
                                       rounded-pill
                                       {{ $priest['available']
                                            ? 'bg-success'
                                            : 'bg-secondary' }}"
                            >

                                <i
                                    class="bi bi-circle-fill me-1"
                                    style="font-size:7px;"
                                ></i>

                                {{ $priest['available']
                                    ? 'Available'
                                    : 'Currently Unavailable' }}

                            </span>


                            {{-- Favorite --}}

                            <button
                                type="button"
                                class="btn
                                       btn-light
                                       rounded-circle
                                       position-absolute
                                       top-0
                                       end-0
                                       m-3
                                       shadow-sm"
                                style="width:42px;height:42px;"
                                aria-label="Add {{ $priest['name'] }} to wishlist"
                            >

                                <i class="bi bi-heart"></i>

                            </button>

                        </div>


                        {{-- Content --}}

                        <div
                            class="card-body
                                   p-4
                                   d-flex
                                   flex-column"
                        >

                            {{-- Rating --}}

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

                                    {{ $priest['title'] }}

                                </span>


                                <span
                                    class="small
                                           text-secondary"
                                >

                                    <i
                                        class="bi bi-star-fill
                                               text-warning"
                                    ></i>

                                    {{ $priest['rating'] }}

                                    <span class="text-muted">

                                        ({{ $priest['reviews'] }})

                                    </span>

                                </span>

                            </div>


                            {{-- Name --}}

                            <h3
                                class="font-serif
                                       h4
                                       text-pn-brown
                                       mb-2"
                            >

                                {{ $priest['name'] }}

                            </h3>


                            {{-- Location --}}

                            <p
                                class="small
                                       text-secondary
                                       mb-2"
                            >

                                <i
                                    class="bi bi-geo-alt
                                           text-pn-primary
                                           me-1"
                                ></i>

                                {{ $priest['location'] }}

                            </p>


                            {{-- Experience --}}

                            <p
                                class="small
                                       text-secondary
                                       mb-3"
                            >

                                <i
                                    class="bi bi-award
                                           text-pn-primary
                                           me-1"
                                ></i>

                                {{ $priest['experience'] }}
                                experience

                            </p>


                            {{-- Specializations --}}

                            <div
                                class="d-flex
                                       flex-wrap
                                       gap-2
                                       mb-3"
                            >

                                @foreach(
                                    $priest['specializations']
                                    as $specialization
                                )

                                    <span
                                        class="badge
                                               rounded-pill
                                               bg-pn-cream
                                               text-pn-brown
                                               border
                                               border-warning-subtle
                                               px-3
                                               py-2"
                                    >

                                        {{ $specialization }}

                                    </span>

                                @endforeach

                            </div>


                            {{-- Languages --}}

                            <div
                                class="d-flex
                                       align-items-start
                                       gap-2
                                       mb-4"
                            >

                                <i
                                    class="bi bi-translate
                                           text-pn-primary
                                           mt-1"
                                ></i>


                                <div>

                                    <small
                                        class="text-secondary
                                               d-block"
                                    >

                                        Languages

                                    </small>


                                    <small
                                        class="text-pn-brown"
                                    >

                                        {{ implode(
                                            ' · ',
                                            $priest['languages']
                                        ) }}

                                    </small>

                                </div>

                            </div>


                            {{-- Actions --}}

                            <div
                                class="mt-auto
                                       d-flex
                                       flex-column
                                       gap-2"
                            >

                                <a
                                    href="{{ route('priest.show', ['slug' => $priest['slug']]) }}"
                                    class="btn
                                           btn-pn-outline
                                           w-100"
                                >

                                    View Profile

                                    <i
                                        class="bi bi-arrow-right ms-2"
                                    ></i>

                                </a>


                                @if($priest['available'])

                                    <a
                                        href="{{ route('priest.book', ['slug' => $priest['slug']]) }}"
                                        class="btn
                                               btn-pn
                                               w-100"
                                    >

                                        Book Priest

                                        <i
                                            class="bi bi-calendar-check ms-2"
                                        ></i>

                                    </a>

                                @else

                                    <button
                                        type="button"
                                        class="btn
                                               btn-secondary
                                               w-100"
                                        disabled
                                    >

                                        Currently Unavailable

                                    </button>

                                @endif

                            </div>

                        </div>

                    </article>

                </div>

            @endforeach

        </div>


        
{{-- ====================================================
     PAGINATION
===================================================== --}}

@if ($priests instanceof \Illuminate\Pagination\LengthAwarePaginator)
    <div class="d-flex justify-content-center mt-5">
        {{ $priests->withQueryString()->links() }}
    </div>
@endif


    </div>

</section>


{{-- ============================================================
     HOW IT WORKS
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

                Book a Priest with confidence.

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
                   g-4"
        >

            {{-- Step 1 --}}

            <div class="col">

                <div
                    class="card
                           border
                           border-warning-subtle
                           rounded-4
                           h-100
                           text-center"
                >

                    <div class="card-body p-4 p-md-5">

                        <div
                            class="mx-auto
                                   rounded-circle
                                   d-flex
                                   align-items-center
                                   justify-content-center
                                   bg-pn-cream
                                   text-pn-primary
                                   fs-4
                                   mb-4"
                            style="width:68px;height:68px;"
                        >

                            01

                        </div>


                        <h3
                            class="font-serif
                                   h4
                                   text-pn-brown"
                        >

                            Find Your Priest

                        </h3>


                        <p
                            class="small
                                   text-secondary
                                   mb-0"
                        >

                            Search by location, language or
                            specialization to find a suitable priest.

                        </p>

                    </div>

                </div>

            </div>


            {{-- Step 2 --}}

            <div class="col">

                <div
                    class="card
                           border
                           border-warning-subtle
                           rounded-4
                           h-100
                           text-center"
                >

                    <div class="card-body p-4 p-md-5">

                        <div
                            class="mx-auto
                                   rounded-circle
                                   d-flex
                                   align-items-center
                                   justify-content-center
                                   bg-pn-cream
                                   text-pn-primary
                                   fs-4
                                   mb-4"
                            style="width:68px;height:68px;"
                        >

                            02

                        </div>


                        <h3
                            class="font-serif
                                   h4
                                   text-pn-brown"
                        >

                            Check Availability

                        </h3>


                        <p
                            class="small
                                   text-secondary
                                   mb-0"
                        >

                            Review the priest profile and
                            choose an available booking option.

                        </p>

                    </div>

                </div>

            </div>


            {{-- Step 3 --}}

            <div class="col">

                <div
                    class="card
                           border
                           border-warning-subtle
                           rounded-4
                           h-100
                           text-center"
                >

                    <div class="card-body p-4 p-md-5">

                        <div
                            class="mx-auto
                                   rounded-circle
                                   d-flex
                                   align-items-center
                                   justify-content-center
                                   bg-pn-cream
                                   text-pn-primary
                                   fs-4
                                   mb-4"
                            style="width:68px;height:68px;"
                        >

                            03

                        </div>


                        <h3
                            class="font-serif
                                   h4
                                   text-pn-brown"
                        >

                            Book Your Priest

                        </h3>


                        <p
                            class="small
                                   text-secondary
                                   mb-0"
                        >

                            Provide the required details and
                            continue with the priest booking.

                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- ============================================================
     PRIEST SPECIALIZATIONS
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
                    Traditional Expertise
                </span>


                <h2
                    class="font-serif
                           display-6
                           text-pn-brown
                           mt-2
                           mb-3"
                >

                    Find expertise suited to your occasion.

                </h2>


                <div
                    class="pn-divider
                           mb-4"
                ></div>


                <p
                    class="text-secondary"
                >

                    Different priests may specialize in different
                    traditional rituals and devotional services.
                    Explore their profiles to find the right fit.

                </p>


                <a
                    href="{{ route('priest.index') }}"
                    class="btn btn-pn"
                >

                    Explore Priests

                    <i
                        class="bi bi-arrow-right ms-2"
                    ></i>

                </a>

            </div>


            <div class="col-12 col-lg-7">

                <div
                    class="row
                           row-cols-2
                           row-cols-sm-3
                           g-3"
                >

                    <div class="col">

                        <div
                            class="card
                                   border
                                   border-warning-subtle
                                   rounded-4
                                   h-100"
                        >

                            <div
                                class="card-body
                                       p-3
                                       p-md-4
                                       text-center"
                            >

                                <i
                                    class="bi bi-fire
                                           fs-3
                                           text-pn-primary"
                                ></i>


                                <h3
                                    class="font-serif
                                           h6
                                           text-pn-brown
                                           mt-3
                                           mb-0"
                                >

                                    Homam

                                </h3>

                            </div>

                        </div>

                    </div>


                    <div class="col">

                        <div
                            class="card
                                   border
                                   border-warning-subtle
                                   rounded-4
                                   h-100"
                        >

                            <div
                                class="card-body
                                       p-3
                                       p-md-4
                                       text-center"
                            >

                                <i
                                    class="bi bi-flower1
                                           fs-3
                                           text-pn-primary"
                                ></i>


                                <h3
                                    class="font-serif
                                           h6
                                           text-pn-brown
                                           mt-3
                                           mb-0"
                                >

                                    Pooja

                                </h3>

                            </div>

                        </div>

                    </div>


                    <div class="col">

                        <div
                            class="card
                                   border
                                   border-warning-subtle
                                   rounded-4
                                   h-100"
                        >

                            <div
                                class="card-body
                                       p-3
                                       p-md-4
                                       text-center"
                            >

                                <i
                                    class="bi bi-droplet
                                           fs-3
                                           text-pn-primary"
                                ></i>


                                <h3
                                    class="font-serif
                                           h6
                                           text-pn-brown
                                           mt-3
                                           mb-0"
                                >

                                    Abhishekam

                                </h3>

                            </div>

                        </div>

                    </div>


                    <div class="col">

                        <div
                            class="card
                                   border
                                   border-warning-subtle
                                   rounded-4
                                   h-100"
                        >

                            <div
                                class="card-body
                                       p-3
                                       p-md-4
                                       text-center"
                            >

                                <i
                                    class="bi bi-house-heart
                                           fs-3
                                           text-pn-primary"
                                ></i>


                                <h3
                                    class="font-serif
                                           h6
                                           text-pn-brown
                                           mt-3
                                           mb-0"
                                >

                                    Griha Pooja

                                </h3>

                            </div>

                        </div>

                    </div>


                    <div class="col">

                        <div
                            class="card
                                   border
                                   border-warning-subtle
                                   rounded-4
                                   h-100"
                        >

                            <div
                                class="card-body
                                       p-3
                                       p-md-4
                                       text-center"
                            >

                                <i
                                    class="bi bi-people
                                           fs-3
                                           text-pn-primary"
                                ></i>


                                <h3
                                    class="font-serif
                                           h6
                                           text-pn-brown
                                           mt-3
                                           mb-0"
                                >

                                    Marriage Rituals

                                </h3>

                            </div>

                        </div>

                    </div>


                    <div class="col">

                        <div
                            class="card
                                   border
                                   border-warning-subtle
                                   rounded-4
                                   h-100"
                        >

                            <div
                                class="card-body
                                       p-3
                                       p-md-4
                                       text-center"
                            >

                                <i
                                    class="bi bi-building
                                           fs-3
                                           text-pn-primary"
                                ></i>


                                <h3
                                    class="font-serif
                                           h6
                                           text-pn-brown
                                           mt-3
                                           mb-0"
                                >

                                    Temple Poojas

                                </h3>

                            </div>

                        </div>

                    </div>

                </div>

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

                    Find someone you can trust with your sacred rituals.

                </h2>


                <p
                    class="text-white-50
                           col-lg-7
                           mx-auto"
                >

                    Explore priest profiles, experience,
                    specializations and availability.

                </p>


                <a
                    href="{{ route('priest.index') }}"
                    class="btn
                           btn-warning
                           text-dark
                           fw-semibold
                           px-4"
                >

                    Explore Priests

                    <i
                        class="bi bi-arrow-right ms-2"
                    ></i>

                </a>

            </div>

        </div>

    </div>

</section>

@endsection