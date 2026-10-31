@extends('layouts.app')

@section('title', 'Book Priest | Pooja Go')

@section(
    'meta_description',
    'Book a trusted priest for your sacred pooja or traditional ceremony through Pooja Go.'
)

@section('content')


{{-- ============================================================
     BOOKING HEADER
============================================================ --}}

<section class="bg-pn-cream py-4 py-lg-5">

    <div class="container">

        <div class="text-center">

            <span
                class="small
                       text-pn-gold
                       fw-semibold
                       text-uppercase"
            >
                Priest Booking
            </span>


            <h1
                class="font-serif
                       display-5
                       text-pn-brown
                       mt-2
                       mb-3"
            >

                Book Your Priest

            </h1>


            <p
                class="text-secondary
                       mx-auto
                       col-lg-7
                       mb-0"
            >

                Choose your preferred date and time, provide
                the required devotee details and review your
                booking before proceeding to payment.

            </p>

        </div>

    </div>

</section>


{{-- ============================================================
     BOOKING STEPS
============================================================ --}}

<section class="py-3 bg-white border-bottom">

    <div class="container">

        <div
            class="row
                   row-cols-4
                   g-0
                   justify-content-center"
        >

            {{-- Step 1 --}}

            <div class="col">

                <div
                    class="text-center
                           position-relative"
                >

                    <div
                        class="mx-auto
                               rounded-circle
                               bg-pn-primary
                               text-white
                               d-flex
                               align-items-center
                               justify-content-center
                               fw-semibold"
                        style="width:38px;height:38px;"
                    >
                        1
                    </div>


                    <small
                        class="d-block
                               mt-2
                               fw-semibold
                               text-pn-brown"
                    >

                        Select Slot

                    </small>

                </div>

            </div>


            {{-- Step 2 --}}

            <div class="col">

                <div
                    class="text-center
                           position-relative"
                >

                    <div
                        class="mx-auto
                               rounded-circle
                               bg-light
                               text-secondary
                               border
                               d-flex
                               align-items-center
                               justify-content-center
                               fw-semibold"
                        style="width:38px;height:38px;"
                    >
                        2
                    </div>


                    <small
                        class="d-block
                               mt-2
                               text-secondary"
                    >

                        Your Details

                    </small>

                </div>

            </div>


            {{-- Step 3 --}}

            <div class="col">

                <div
                    class="text-center
                           position-relative"
                >

                    <div
                        class="mx-auto
                               rounded-circle
                               bg-light
                               text-secondary
                               border
                               d-flex
                               align-items-center
                               justify-content-center
                               fw-semibold"
                        style="width:38px;height:38px;"
                    >
                        3
                    </div>


                    <small
                        class="d-block
                               mt-2
                               text-secondary"
                    >

                        Review

                    </small>

                </div>

            </div>


            {{-- Step 4 --}}

            <div class="col">

                <div
                    class="text-center
                           position-relative"
                >

                    <div
                        class="mx-auto
                               rounded-circle
                               bg-light
                               text-secondary
                               border
                               d-flex
                               align-items-center
                               justify-content-center
                               fw-semibold"
                        style="width:38px;height:38px;"
                    >
                        4
                    </div>


                    <small
                        class="d-block
                               mt-2
                               text-secondary"
                    >

                        Payment

                    </small>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- ============================================================
     MAIN BOOKING AREA
============================================================ --}}

<section class="py-5">

    <div class="container">

        <form id="priestBookingForm" method="POST" action="#" novalidate>
            @csrf
            <input type="hidden" name="booking_date" id="selectedBookingDate" value="{{ $selectedDateValue ?? '' }}">
            <input type="hidden" name="availability_id" id="selectedAvailabilityId" value="">
            <input type="hidden" name="start_time" id="selectedBookingStartTime" value="">
            <input type="hidden" name="end_time" id="selectedBookingEndTime" value="">
            <input type="hidden" id="selectedPriestService" value="{{ $services->first()?->id ?? '' }}">
			<script type="application/json" id="priestServiceSlotData">
			@json($serviceSlotData)
			</script>
            <input type="hidden" name="terms_accepted" id="termsAcceptedValue" value="0">
            <div id="priestBookingReviewMessage" class="alert alert-warning d-none mt-3" role="alert" aria-live="polite"></div>

        <div
            class="row
                   g-4
                   align-items-start"
        >

            {{-- =================================================
                 LEFT SIDE
            ================================================== --}}

            <div class="col-12 col-lg-8">

                {{-- =============================================
                     SELECTED PRIEST
                ============================================== --}}

                <div
                    class="card
                           border
                           border-warning-subtle
                           rounded-5
                           mb-4"
                >

                    <div class="card-body p-4">

                        <div
                            class="d-flex
                                   flex-column
                                   flex-sm-row
                                   align-items-sm-center
                                   gap-3"
                        >

                            <img
                                src="{{ $priest['image'] ? (filter_var($priest['image'], FILTER_VALIDATE_URL) ? $priest['image'] : asset($priest['image'])) : asset('images/priests/default.jpg') }}"
                                width="92"
                                height="92"
                                class="rounded-4
                                       object-fit-cover
                                       flex-shrink-0"
                                alt="{{ $priest['name'] }}"
                            >


                            <div class="flex-grow-1">

                                <div
                                    class="d-flex
                                           flex-wrap
                                           align-items-center
                                           gap-2"
                                >

                                    <h2
                                        class="font-serif
                                               h3
                                               text-pn-brown
                                               mb-0"
                                    >

                                        {{ $priest['name'] }}

                                    </h2>


                                    <span
                                        class="badge
                                               rounded-pill
                                               bg-success"
                                    >

                                        <i
                                            class="bi bi-patch-check-fill me-1"
                                        ></i>

                                        Verified

                                    </span>

                                </div>


                                <p
                                    class="small
                                           text-pn-primary
                                           fw-semibold
                                           mb-1
                                           mt-1"
                                >

                                    {{ $priest['title'] }}

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
                                            class="bi bi-star-fill
                                                   text-warning
                                                   me-1"
                                        ></i>

                                        {{ $priest['rating'] }}

                                        ({{ $priest['reviews'] }})

                                    </span>


                                    <span>

                                        <i
                                            class="bi bi-award
                                                   text-pn-primary
                                                   me-1"
                                        ></i>

                                        {{ $priest['experience'] }}

                                    </span>


                                    <span>

                                        <i
                                            class="bi bi-geo-alt
                                                   text-pn-primary
                                                   me-1"
                                        ></i>

                                        {{ $priest['location'] }}

                                    </span>

                                </div>

                            </div>


                            <a
                                href="{{ route('priest.show', ['slug' => $priest['slug']]) }}"
                                class="btn
                                       btn-pn-outline
                                       btn-sm
                                       flex-shrink-0"
                            >

                                Change

                            </a>

                        </div>

                    </div>

                </div>


                {{-- =============================================
                     SELECT SERVICE
                ============================================== --}}

                <div class="card border border-warning-subtle rounded-5 mb-4">

    <div class="card-body p-4 p-md-5">

        <div class="d-flex align-items-start gap-3 mb-4">

            <div
                class="rounded-circle bg-pn-cream text-pn-primary d-flex align-items-center justify-content-center flex-shrink-0"
                style="width:48px;height:48px;"
            >
                <i class="bi bi-flower1"></i>
            </div>

            <div>
                <h2 class="font-serif h3 text-pn-brown mb-1">
                    Select Service
                </h2>

                <p class="small text-secondary mb-0">
                    Choose the service you would like the priest to perform.
                </p>
            </div>

        </div>

        <div class="row row-cols-1 row-cols-md-2 g-3">

            @forelse($services as $index => $service)

                <div class="col">

                    <label
                        class="card border {{ $index === 0 ? 'border-warning' : 'border-warning-subtle' }} rounded-4 h-100"
                        for="service_{{ $service->id }}"
                        style="cursor:pointer;"
                    >

                        <div class="card-body p-3">

                            <div class="form-check">

                                <input
                                    class="form-check-input"
                                    type="radio"
                                    name="service_choice"
                                    id="service_{{ $service->id }}"
                                    value="{{ $service->id }}"
                                    data-service-name="{{ $service->service_name }}"
                                    data-service-price="{{ $service->price }}"
									data-duration-minutes="{{ $service->duration_minutes }}"
                                    {{ $index === 0 ? 'checked' : '' }}
                                >

                                <span class="form-check-label d-block">

                                    <strong class="d-block text-pn-brown">
                                        {{ $service->service_name }}
                                    </strong>

                                    @if($service->description)
                                        <small class="text-secondary">
                                            {{ $service->description }}
                                        </small>
                                    @endif

                                    <strong class="d-block text-pn-primary mt-2">
                                        ₹{{ number_format((float) $service->price, 2) }}
                                    </strong>

                                </span>

                            </div>

                        </div>

                    </label>

                </div>

            @empty

                <div class="col-12">
                    <div class="alert alert-light border mb-0">
                        No services are currently available for this priest.
                    </div>
                </div>

            @endforelse

        </div>

    </div>

</div>


                {{-- =============================================
                     SELECT DATE
                ============================================== --}}

                <div
                    class="card
                           border
                           border-warning-subtle
                           rounded-5
                           mb-4"
                >

                    <div class="card-body p-4 p-md-5">

                        <div
                            class="d-flex
                                   align-items-start
                                   gap-3
                                   mb-4"
                        >

                            <div
                                class="rounded-circle
                                       bg-pn-cream
                                       text-pn-primary
                                       d-flex
                                       align-items-center
                                       justify-content-center
                                       flex-shrink-0"
                                style="width:48px;height:48px;"
                            >

                                <i class="bi bi-calendar3"></i>

                            </div>


                            <div>

                                <h2
                                    class="font-serif
                                           h3
                                           text-pn-brown
                                           mb-1"
                                >

                                    Select Date

                                </h2>


                                <p
                                    class="small
                                           text-secondary
                                           mb-0"
                                >

                                    Choose a date from the available
                                    booking calendar.

                                </p>

                            </div>

                        </div>


						<div
						id="bookingDateOptions"
						class="row
						row-cols-2
						row-cols-sm-3
						row-cols-md-5
						g-2"
						>

                            @foreach($availableDates as $date)

                                <div class="col">

                                    <button
    type="button"
    data-booking-date="{{ $date['date_value'] }}"
    data-booking-day="{{ $date['day_name'] }}"
    class="btn {{ $date['active'] ? 'btn-pn' : 'btn-pn-outline' }} w-100 py-3 booking-date-option"
    aria-pressed="{{ $date['active'] ? 'true' : 'false' }}"
>
    <strong class="d-block fs-5">
        {{ $date['date'] }}
    </strong>

    <small class="d-block">
        {{ $date['month'] }}
    </small>

    <small>
        {{ $date['day'] }}
    </small>
</button>

                                </div>

                            @endforeach

                        </div>

                    </div>

                </div>


                {{-- =============================================
                     SELECT TIME
                ============================================== --}}

                <div
                    class="card
                           border
                           border-warning-subtle
                           rounded-5
                           mb-4"
                >

                    <div class="card-body p-4 p-md-5">

                        <div
                            class="d-flex
                                   align-items-start
                                   gap-3
                                   mb-4"
                        >

                            <div
                                class="rounded-circle
                                       bg-pn-cream
                                       text-pn-primary
                                       d-flex
                                       align-items-center
                                       justify-content-center
                                       flex-shrink-0"
                                style="width:48px;height:48px;"
                            >

                                <i class="bi bi-clock"></i>

                            </div>


                            <div>

                                <h2
                                    class="font-serif
                                           h3
                                           text-pn-brown
                                           mb-1"
                                >

                                    Select Time

                                </h2>


                                <p
                                    class="small
                                           text-secondary
                                           mb-0"
                                >

								Available times for
								<span id="bookingSelectedDateLabel">{{ $selectedDate }}</span>.

                                </p>

                            </div>

                        </div>


						<div
						id="bookingTimeOptions"
						class="d-flex
						flex-wrap
						gap-2"
						>

                            @foreach($timeSlots as $slot)

                                @if($slot['available'])

                                    
						<button
							type="button"
							data-availability-id="{{ $slot['availability_id'] }}"
							data-available="true"
                            data-booking-date="{{ $slot['date_value'] }}"
							data-start-time="{{ $slot['start_time'] }}"
							data-end-time="{{ $slot['end_time'] }}"
							class="btn
								   {{ $slot['active']
										? 'btn-pn'
										: 'btn-pn-outline' }}
								   booking-time-option"
						>


                                        <i
                                            class="bi bi-clock me-1"
                                        ></i>

                                        {{ $slot['time'] }}

                                    </button>

                                @else

                                    <button
                                        type="button"
                                        class="btn
                                               btn-light
                                               border
                                               text-muted"
                                        disabled
                                    >

                                        {{ $slot['time'] }}

                                    </button>

                                @endif

                            @endforeach

                        </div>


                        <div
                            class="alert
                                   alert-light
                                   border
                                   small
                                   mt-4
                                   mb-0"
                        >

                            <i
                                class="bi bi-info-circle
                                       text-pn-primary
                                       me-1"
                            ></i>

                            Available slots may change based on
                            priest availability.

                        </div>

                    </div>

                </div>


                {{-- =============================================
                     DEVOTEE DETAILS
                ============================================== --}}

                <div
                    class="card
                           border
                           border-warning-subtle
                           rounded-5
                           mb-4"
                >

                    <div class="card-body p-4 p-md-5">

                        <div
                            class="d-flex
                                   align-items-start
                                   gap-3
                                   mb-4"
                        >

                            <div
                                class="rounded-circle
                                       bg-pn-cream
                                       text-pn-primary
                                       d-flex
                                       align-items-center
                                       justify-content-center
                                       flex-shrink-0"
                                style="width:48px;height:48px;"
                            >

                                <i class="bi bi-person"></i>

                            </div>


                            <div>

                                <h2
                                    class="font-serif
                                           h3
                                           text-pn-brown
                                           mb-1"
                                >

                                    Devotee Details

                                </h2>


                                <p
                                    class="small
                                           text-secondary
                                           mb-0"
                                >

                                    Enter the details required
                                    for your booking.

                                </p>

                            </div>

                        </div>


                        <div
                            class="row
                                   g-3"
                        >

                            {{-- First Name --}}

                            <div class="col-12 col-md-6">

                                <label
                                    for="firstName"
                                    class="form-label
                                           small
                                           fw-semibold
                                           text-pn-brown"
                                >

                                    First Name
                                    <span class="text-danger">*</span>

                                </label>


                                <input
                                    type="text"
                                    id="firstName"
                                    name="first_name"
                                    class="form-control"
                                    placeholder="Enter first name"
                                    autocomplete="given-name"
                                    required
                                >

                            </div>


                            {{-- Last Name --}}

                            <div class="col-12 col-md-6">

                                <label
                                    for="lastName"
                                    class="form-label
                                           small
                                           fw-semibold
                                           text-pn-brown"
                                >

                                    Last Name
                                    <span class="text-danger">*</span>

                                </label>


                                <input
                                    type="text"
                                    id="lastName"
                                    name="last_name"
                                    class="form-control"
                                    placeholder="Enter last name"
                                    autocomplete="family-name"
                                    required
                                >

                            </div>


                            {{-- Mobile --}}

                            <div class="col-12 col-md-6">

                                <label
                                    for="mobile"
                                    class="form-label
                                           small
                                           fw-semibold
                                           text-pn-brown"
                                >

                                    Mobile Number
                                    <span class="text-danger">*</span>

                                </label>


                                <input
                                    type="tel"
                                    id="mobile"
                                    name="mobile"
                                    class="form-control"
                                    placeholder="Enter mobile number"
                                    autocomplete="tel"
                                    required
                                >

                            </div>


                            {{-- Email --}}

                            <div class="col-12 col-md-6">

                                <label
                                    for="email"
                                    class="form-label
                                           small
                                           fw-semibold
                                           text-pn-brown"
                                >

                                    Email Address
                                    <span class="text-danger">*</span>

                                </label>


                                <input
                                    type="email"
                                    id="email"
                                    name="email"
                                    class="form-control"
                                    placeholder="Enter email address"
                                    autocomplete="email"
                                    required
                                >

                            </div>


                            {{-- Address --}}

                            <div class="col-12">

                                <label
                                    for="address"
                                    class="form-label
                                           small
                                           fw-semibold
                                           text-pn-brown"
                                >

                                    Address

                                </label>


                                <textarea
                                    id="address"
                                    name="address"
                                    rows="3"
                                    class="form-control"
                                    placeholder="Enter your address"
                                ></textarea>

                            </div>


                            {{-- City --}}

                            <div class="col-12 col-md-4">

                                <label
                                    for="city"
                                    class="form-label
                                           small
                                           fw-semibold
                                           text-pn-brown"
                                >

                                    City

                                </label>


                                <input
                                    type="text"
                                    id="city"
                                    name="city"
                                    class="form-control"
                                    placeholder="City"
                                >

                            </div>


                            {{-- State --}}

                            <div class="col-12 col-md-4">

                                <label
                                    for="state"
                                    class="form-label
                                           small
                                           fw-semibold
                                           text-pn-brown"
                                >

                                    State

                                </label>


                                <select
                                    id="state"
                                    name="state"
                                    class="form-select"
                                >

                                    <option selected>
                                        Select State
                                    </option>

                                    <option>
                                        Telangana
                                    </option>

                                    <option>
                                        Andhra Pradesh
                                    </option>

                                    <option>
                                        Karnataka
                                    </option>

                                    <option>
                                        Tamil Nadu
                                    </option>

                                </select>

                            </div>


                            {{-- Pincode --}}

                            <div class="col-12 col-md-4">

                                <label
                                    for="pincode"
                                    class="form-label
                                           small
                                           fw-semibold
                                           text-pn-brown"
                                >

                                    Pincode

                                </label>


                                <input
                                    type="text"
                                    id="pincode"
                                    name="pincode"
                                    class="form-control"
                                    placeholder="Pincode"
                                    inputmode="numeric"
                                >

                            </div>


                            {{-- Special Instructions --}}

                            <div class="col-12">

                                <label
                                    for="instructions"
                                    class="form-label
                                           small
                                           fw-semibold
                                           text-pn-brown"
                                >

                                    Special Instructions

                                </label>


                                <textarea
                                    id="instructions"
                                    name="instructions"
                                    rows="3"
                                    class="form-control"
                                    placeholder="Any specific requirements or instructions..."
                                ></textarea>


                                <div
                                    class="form-text"
                                >

                                    Optional. Please mention any
                                    relevant requirements.

                                </div>

                            </div>

                        </div>

                    </div>

                </div>


                {{-- =============================================
                     ADDITIONAL OPTIONS
                ============================================== --}}

                <div
                    class="card
                           border
                           border-warning-subtle
                           rounded-5
                           mb-4"
                >

                    <div class="card-body p-4 p-md-5">

                        <div
                            class="d-flex
                                   align-items-start
                                   gap-3
                                   mb-4"
                        >

                            <div
                                class="rounded-circle
                                       bg-pn-cream
                                       text-pn-primary
                                       d-flex
                                       align-items-center
                                       justify-content-center
                                       flex-shrink-0"
                                style="width:48px;height:48px;"
                            >

                                <i class="bi bi-plus-circle"></i>

                            </div>


                            <div>

                                <h2
                                    class="font-serif
                                           h3
                                           text-pn-brown
                                           mb-1"
                                >

                                    Additional Options

                                </h2>


                                <p
                                    class="small
                                           text-secondary
                                           mb-0"
                                >

                                    Select any additional options
                                    available for this booking.

                                </p>

                            </div>

                        </div>


                        <div class="vstack gap-3">

                            {{-- Live --}}

                            <label
                                class="border
                                       border-warning-subtle
                                       rounded-4
                                       p-3"
                            >

                                <div
                                    class="form-check"
                                >

                                    <input
                                        class="form-check-input"
                                        type="checkbox"
                                        id="liveSession"
                                        name="live_session"
                                        value="1"
                                    >


                                    <span
                                        class="form-check-label"
                                        for="liveSession"
                                    >

                                        <strong
                                            class="d-block
                                                   text-pn-brown"
                                        >

                                            Live Session

                                        </strong>


                                        <small
                                            class="text-secondary"
                                        >

                                            Join the service remotely
                                            where supported.

                                        </small>

                                    </span>

                                </div>

                            </label>


                            {{-- Recording --}}

                            <label
                                class="border
                                       border-warning-subtle
                                       rounded-4
                                       p-3"
                            >

                                <div
                                    class="form-check"
                                >

                                    <input
                                        class="form-check-input"
                                        type="checkbox"
                                        id="recording"
                                        name="recording"
                                        value="1"
                                    >


                                    <span
                                        class="form-check-label"
                                        for="recording"
                                    >

                                        <strong
                                            class="d-block
                                                   text-pn-brown"
                                        >

                                            Recording

                                        </strong>


                                        <small
                                            class="text-secondary"
                                        >

                                            Recording option where
                                            supported.

                                        </small>

                                    </span>

                                </div>

                            </label>


                            {{-- Prasadam --}}

                            <label
                                class="border
                                       border-warning-subtle
                                       rounded-4
                                       p-3"
                            >

                                <div
                                    class="form-check"
                                >

                                    <input
                                        class="form-check-input"
                                        type="checkbox"
                                        id="prasadam"
                                        name="prasadam"
                                        value="1"
                                    >


                                    <span
                                        class="form-check-label"
                                        for="prasadam"
                                    >

                                        <strong
                                            class="d-block
                                                   text-pn-brown"
                                        >

                                            Prasadam

                                        </strong>


                                        <small
                                            class="text-secondary"
                                        >

                                            Prasadam option where
                                            available.

                                        </small>

                                    </span>

                                </div>

                            </label>

                        </div>

                    </div>

                </div>


                {{-- =============================================
                     TERMS
                ============================================== --}}

                <div
                    class="form-check
                           mb-4"
                >

                    <input
                        class="form-check-input"
                        type="checkbox"
                        id="terms"
                        name="terms"
                        value="1"
                        required
                    >


                    <label
                        class="form-check-label
                               small
                               text-secondary"
                        for="terms"
                    >

                        I confirm that the information provided
                        is correct and agree to the applicable
                        booking terms and conditions.

                        <span class="text-danger">*</span>

                    </label>

                </div>


                {{-- Mobile Continue Button --}}

                <div
                    class="d-lg-none
                           d-grid"
                >

                    <button
                        type="button"
                        data-priest-booking-review
                        class="btn
                               btn-pn
                               btn-lg"
                    >

                        Continue to Review

                        <i
                            class="bi bi-arrow-right ms-2"
                        ></i>

                    </button>

                </div>

            </div>


            {{-- =================================================
                 RIGHT SIDE BOOKING SUMMARY
            ================================================== --}}

            <div class="col-12 col-lg-4">

                <div
                    class="position-sticky"
                    style="top:1.5rem;"
                >

                    <div
                        class="card
                               border-0
                               rounded-5
                               shadow-sm
                               overflow-hidden"
                    >

                        {{-- Header --}}

                        <div
                            class="pn-digital
                                   text-white
                                   p-4"
                        >

                            <span
                                class="small
                                       text-warning
                                       fw-semibold
                                       text-uppercase"
                            >

                                Booking Summary

                            </span>


                            <h2
                                class="font-serif
                                       h3
                                       mt-2
                                       mb-0"
                            >

                                {{ $priest['name'] }}

                            </h2>

                        </div>


                        <div class="card-body p-4">

                            {{-- Service --}}

                            <div
                                class="d-flex
                                       justify-content-between
                                       gap-3
                                       mb-3"
                            >

                                <span
                                    class="small
                                           text-secondary"
                                >

                                    Service

                                </span>


							<strong
							class="small
							text-pn-brown
							text-end"
							id="priestBookingSummaryService"
							>
							{{ $services->first()?->service_name ?? 'No service selected' }}
							</strong>

                            </div>


                            {{-- Date --}}

                            <div
                                class="d-flex
                                       justify-content-between
                                       gap-3
                                       mb-3"
                            >

                                <span
                                    class="small
                                           text-secondary"
                                >

                                    Date

                                </span>


                                <strong
    class="small text-pn-brown text-end"
    id="priestBookingSummaryDate"
>
    {{ $selectedDate }}
</strong>

                            </div>


                            {{-- Day --}}

                            <div
                                class="d-flex
                                       justify-content-between
                                       gap-3
                                       mb-3"
                            >

                                <span
                                    class="small
                                           text-secondary"
                                >

                                    Day

                                </span>


                                <strong
                                    class="small
                                           text-pn-brown
                                           text-end"
                                 id="priestBookingSummaryDay">

                                    {{ $selectedDay }}

                                </strong>

                            </div>


                            {{-- Time --}}

                            <div
                                class="d-flex
                                       justify-content-between
                                       gap-3
                                       mb-3"
                            >

                                <span
                                    class="small
                                           text-secondary"
                                >

                                    Time

                                </span>


                                <strong
                                    class="small
                                           text-pn-brown
                                           text-end"
                                 id="priestBookingSummaryTime">

                                    {{ $selectedTime }}

                                </strong>

                            </div>


                            {{-- Temple --}}

                            <div
                                class="d-flex
                                       justify-content-between
                                       gap-3
                                       mb-4"
                            >

                                <span
                                    class="small
                                           text-secondary"
                                >

                                    Temple

                                </span>


                                <strong
                                    class="small
                                           text-pn-brown
                                           text-end"
                                >

                                    {{ $priest['temple'] }}

                                </strong>

                            </div>


                            <hr>


                            {{-- Price --}}

                            <div
                                class="d-flex
                                       justify-content-between
                                       gap-3
                                       mt-4
                                       mb-2"
                            >

                                <span
                                    class="small
                                           text-secondary"
                                >

                                    Priest Service

                                </span>


                                <span
                                    class="small
                                           text-pn-brown"
                                >

                                    {{ $priest['price_from'] }}

                                </span>

                            </div>


                            {{-- Platform Fee --}}

                            <div
                                class="d-flex
                                       justify-content-between
                                       gap-3
                                       mb-2"
                            >

                                <span
                                    class="small
                                           text-secondary"
                                >

                                    Platform Fee

                                </span>


                                <span
                                    class="small
                                           text-pn-brown"
                                >

                                    Not specified

                                </span>

                            </div>


                            {{-- Tax --}}

                            <div
                                class="d-flex
                                       justify-content-between
                                       gap-3
                                       mb-3"
                            >

                                <span
                                    class="small
                                           text-secondary"
                                >

                                    Taxes

                                </span>


                                <span
                                    class="small
                                           text-pn-brown"
                                >

                                    Not specified

                                </span>

                            </div>


                            <hr>


                            {{-- Total --}}

                            <div
                                class="d-flex
                                       justify-content-between
                                       align-items-center
                                       gap-3
                                       mt-3
                                       mb-4"
                            >

                                <strong
                                    class="text-pn-brown"
                                >

                                    Total Amount

                                </strong>


                                <strong
                                    class="fs-4
                                           text-pn-primary"
                                >

                                    Calculated at booking

                                </strong>

                            </div>


                            {{-- Continue --}}

                            <button
                                type="button"
                        data-priest-booking-review
                                class="btn
                                       btn-pn
                                       btn-lg
                                       w-100
                                       d-none
                                       d-lg-block"
                            >

                                Continue to Review

                                <i
                                    class="bi bi-arrow-right ms-2"
                                ></i>

                            </button>


                            {{-- Secure --}}

                            <div
                                class="d-flex
                                       justify-content-center
                                       align-items-center
                                       gap-2
                                       small
                                       text-secondary
                                       mt-3"
                            >

                                <i
                                    class="bi bi-shield-check
                                           text-success"
                                ></i>

                                Secure Booking

                            </div>

                        </div>

                    </div>


                    {{-- Help Card --}}

                    <div
                        class="card
                               border
                               border-warning-subtle
                               rounded-4
                               mt-3"
                    >

                        <div class="card-body p-4">

                            <div
                                class="d-flex
                                       align-items-start
                                       gap-3"
                            >

                                <i
                                    class="bi bi-headset
                                           fs-4
                                           text-pn-primary"
                                ></i>


                                <div>

                                    <strong
                                        class="d-block
                                               text-pn-brown"
                                    >

                                        Need help?

                                    </strong>


                                    <small
                                        class="text-secondary"
                                    >

                                        Contact support if you
                                        need assistance with
                                        your booking.

                                    </small>


                                    <a
                                        href="{{ route('support.contact') }}"
                                        class="small
                                               text-pn-primary
                                               fw-semibold
                                               d-block
                                               mt-2"
                                    >

                                        Contact Support

                                        <i
                                            class="bi bi-arrow-right ms-1"
                                        ></i>

                                    </a>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>
        </form>

    </div>

</section>


{{-- ============================================================
     INFORMATION SECTION
============================================================ --}}

<section class="py-5 bg-light-subtle">

    <div class="container">

        <div
            class="row
                   row-cols-1
                   row-cols-md-3
                   g-4"
        >

            <div class="col">

                <div
                    class="d-flex
                           align-items-start
                           gap-3"
                >

                    <div
                        class="rounded-circle
                               bg-pn-cream
                               text-pn-primary
                               d-flex
                               align-items-center
                               justify-content-center
                               flex-shrink-0"
                        style="width:50px;height:50px;"
                    >

                        <i class="bi bi-patch-check"></i>

                    </div>


                    <div>

                        <h3
                            class="font-serif
                                   h5
                                   text-pn-brown"
                        >

                            Verified Profiles

                        </h3>


                        <p
                            class="small
                                   text-secondary
                                   mb-0"
                        >

                            Priest profiles go through the
                            platform's verification process.

                        </p>

                    </div>

                </div>

            </div>


            <div class="col">

                <div
                    class="d-flex
                           align-items-start
                           gap-3"
                >

                    <div
                        class="rounded-circle
                               bg-pn-cream
                               text-pn-primary
                               d-flex
                               align-items-center
                               justify-content-center
                               flex-shrink-0"
                        style="width:50px;height:50px;"
                    >

                        <i class="bi bi-calendar-check"></i>

                    </div>


                    <div>

                        <h3
                            class="font-serif
                                   h5
                                   text-pn-brown"
                        >

                            Availability Based

                        </h3>


                        <p
                            class="small
                                   text-secondary
                                   mb-0"
                        >

                            Available dates and time slots depend
                            on the priest's schedule.

                        </p>

                    </div>

                </div>

            </div>


            <div class="col">

                <div
                    class="d-flex
                           align-items-start
                           gap-3"
                >

                    <div
                        class="rounded-circle
                               bg-pn-cream
                               text-pn-primary
                               d-flex
                               align-items-center
                               justify-content-center
                               flex-shrink-0"
                        style="width:50px;height:50px;"
                    >

                        <i class="bi bi-shield-check"></i>

                    </div>


                    <div>

                        <h3
                            class="font-serif
                                   h5
                                   text-pn-brown"
                        >

                            Secure Payment

                        </h3>


                        <p
                            class="small
                                   text-secondary
                                   mb-0"
                        >

                            Payment is completed securely after
                            reviewing your booking.

                        </p>

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

                    Your sacred ceremony starts here.

                </h2>


                <p
                    class="text-white-50
                           col-lg-7
                           mx-auto"
                >

                    Review your details carefully before
                    continuing to the booking confirmation.

                </p>


                <button
                    type="button"
                        data-priest-booking-review
                    class="btn
                           btn-warning
                           text-dark
                           fw-semibold
                           px-4"
                >

                    Continue to Review

                    <i
                        class="bi bi-arrow-right ms-2"
                    ></i>

                </button>

            </div>

        </div>

    </div>

</section>

@endsection