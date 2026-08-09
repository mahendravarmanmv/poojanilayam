@extends('layouts.app')

@section('title', 'Schedule Digital Pooja | Pooja Nilayam')

@section(
    'meta_description',
    'Schedule your personalized Digital Pooja with Pooja Nilayam.'
)

@section('content')

@php

    /*
    |--------------------------------------------------------------------------
    | TEMPORARY FRONTEND DATA
    |--------------------------------------------------------------------------
    | These values will later come from the selected Digital Pooja
    | and authenticated/customer booking data.
    |--------------------------------------------------------------------------
    */

    $pooja = [
        'name' => 'Ganapathi Digital Pooja',
        'god' => 'Lord Ganesha',
        'image' => 'ganapathi.jpg',
        'duration' => '20 Minutes',
        'price' => 251,
        'language' => 'Telugu',
    ];


    /*
    |--------------------------------------------------------------------------
    | Available Dates
    |--------------------------------------------------------------------------
    */

    $dates = [
        [
            'day' => '11',
            'month' => 'AUG',
            'weekday' => 'Tuesday',
            'label' => 'Today',
        ],
        [
            'day' => '12',
            'month' => 'AUG',
            'weekday' => 'Wednesday',
            'label' => '',
        ],
        [
            'day' => '13',
            'month' => 'AUG',
            'weekday' => 'Thursday',
            'label' => '',
        ],
        [
            'day' => '14',
            'month' => 'AUG',
            'weekday' => 'Friday',
            'label' => '',
        ],
        [
            'day' => '15',
            'month' => 'AUG',
            'weekday' => 'Saturday',
            'label' => '',
        ],
    ];


    /*
    |--------------------------------------------------------------------------
    | Time Slots
    |--------------------------------------------------------------------------
    */

    $timeSlots = [
        '07:00 AM',
        '09:00 AM',
        '11:00 AM',
        '05:00 PM',
        '07:00 PM',
        '09:00 PM',
    ];


    /*
    |--------------------------------------------------------------------------
    | Flowers
    |--------------------------------------------------------------------------
    */

    $flowers = [
        [
            'name' => 'Lotus',
            'value' => 'lotus',
        ],
        [
            'name' => 'Jasmine',
            'value' => 'jasmine',
        ],
        [
            'name' => 'Rose',
            'value' => 'rose',
        ],
        [
            'name' => 'Marigold',
            'value' => 'marigold',
        ],
    ];


    /*
    |--------------------------------------------------------------------------
    | Deepams
    |--------------------------------------------------------------------------
    */

    $deepams = [
        [
            'name' => 'Traditional Deepam',
            'value' => 'traditional',
        ],
        [
            'name' => 'Brass Deepam',
            'value' => 'brass',
        ],
        [
            'name' => 'Lotus Deepam',
            'value' => 'lotus',
        ],
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
                        href="{{ url('/') }}"
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
                        Digital Pooja
                    </a>

                </li>

                <li class="breadcrumb-item">

                    <a
                        href="#"
                        class="text-pn-primary"
                    >
                        {{ $pooja['name'] }}
                    </a>

                </li>

                <li
                    class="breadcrumb-item active"
                    aria-current="page"
                >
                    Schedule
                </li>

            </ol>

        </nav>

    </div>

</section>


{{-- ============================================================
     PAGE HEADER
============================================================ --}}

<section class="bg-pn-cream py-5">

    <div class="container">

        <div class="row justify-content-center text-center">

            <div class="col-12 col-lg-8">

                <span
                    class="small
                           text-pn-gold
                           fw-semibold
                           text-uppercase"
                >
                    Personalize Your Experience
                </span>

                <h1
                    class="font-serif
                           display-5
                           text-pn-brown
                           mt-2
                           mb-3"
                >
                    Schedule Your Digital Pooja
                </h1>

                <p
                    class="lead
                           text-secondary
                           mb-0"
                >
                    Choose your date, time and devotional preferences
                    before continuing to secure payment.
                </p>

            </div>

        </div>

    </div>

</section>


{{-- ============================================================
     BOOKING PROGRESS
============================================================ --}}

<section class="bg-white border-bottom">

    <div class="container py-4">

        <div
            class="row
                   row-cols-4
                   g-2
                   text-center"
        >

            <div class="col">

                <div
                    class="d-flex
                           flex-column
                           align-items-center
                           gap-2"
                >

                    <span
                        class="rounded-circle
                               d-flex
                               align-items-center
                               justify-content-center
                               bg-pn-primary
                               text-white
                               fw-semibold"
                        style="width:40px;height:40px;"
                    >
                        1
                    </span>

                    <small
                        class="fw-semibold
                               text-pn-primary"
                    >
                        Pooja
                    </small>

                </div>

            </div>


            <div class="col">

                <div
                    class="d-flex
                           flex-column
                           align-items-center
                           gap-2"
                >

                    <span
                        class="rounded-circle
                               d-flex
                               align-items-center
                               justify-content-center
                               bg-pn-primary
                               text-white
                               fw-semibold"
                        style="width:40px;height:40px;"
                    >
                        2
                    </span>

                    <small
                        class="fw-semibold
                               text-pn-primary"
                    >
                        Schedule
                    </small>

                </div>

            </div>


            <div class="col">

                <div
                    class="d-flex
                           flex-column
                           align-items-center
                           gap-2"
                >

                    <span
                        class="rounded-circle
                               d-flex
                               align-items-center
                               justify-content-center
                               bg-light
                               text-secondary
                               border
                               fw-semibold"
                        style="width:40px;height:40px;"
                    >
                        3
                    </span>

                    <small
                        class="text-secondary"
                    >
                        Payment
                    </small>

                </div>

            </div>


            <div class="col">

                <div
                    class="d-flex
                           flex-column
                           align-items-center
                           gap-2"
                >

                    <span
                        class="rounded-circle
                               d-flex
                               align-items-center
                               justify-content-center
                               bg-light
                               text-secondary
                               border
                               fw-semibold"
                        style="width:40px;height:40px;"
                    >
                        4
                    </span>

                    <small
                        class="text-secondary"
                    >
                        Confirmation
                    </small>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- ============================================================
     MAIN BOOKING FORM
============================================================ --}}

<section class="py-5 bg-light-subtle">

    <div class="container">

        <div class="row g-4 align-items-start">


            {{-- =================================================
                 LEFT FORM
            ================================================= --}}

            <div class="col-12 col-lg-8">


                {{-- =================================================
                     DATE
                ================================================= --}}

                <div
                    class="card
                           border
                           border-warning-subtle
                           rounded-4
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
                                       d-flex
                                       align-items-center
                                       justify-content-center
                                       bg-pn-beige
                                       text-pn-primary
                                       flex-shrink-0"
                                style="width:48px;height:48px;"
                            >

                                <i class="bi bi-calendar3 fs-5"></i>

                            </div>


                            <div>

                                <span
                                    class="small
                                           text-pn-primary
                                           fw-semibold
                                           text-uppercase"
                                >
                                    Step 1
                                </span>

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
                                    Choose when you would like to
                                    experience your Digital Pooja.
                                </p>

                            </div>

                        </div>


                        <div
                            class="row
                                   row-cols-2
                                   row-cols-sm-3
                                   row-cols-md-5
                                   g-2"
                        >

                            @foreach($dates as $index => $date)

                                <div class="col">

                                    <input
                                        type="radio"
                                        class="btn-check"
                                        name="pooja_date"
                                        id="date{{ $index }}"
                                        value="{{ $date['day'] }} {{ $date['month'] }}"
                                        {{ $index === 0 ? 'checked' : '' }}
                                    >

                                    <label
                                        for="date{{ $index }}"
                                        class="btn
                                               btn-outline-secondary
                                               w-100
                                               rounded-4
                                               py-3"
                                    >

                                        @if($date['label'])

                                            <small
                                                class="d-block
                                                       text-pn-primary
                                                       fw-semibold"
                                            >
                                                {{ $date['label'] }}
                                            </small>

                                        @endif

                                        <strong
                                            class="d-block
                                                   fs-4
                                                   text-pn-brown"
                                        >
                                            {{ $date['day'] }}
                                        </strong>

                                        <small
                                            class="d-block"
                                        >
                                            {{ $date['month'] }}
                                        </small>

                                        <small
                                            class="d-block
                                                   text-secondary
                                                   mt-1"
                                        >
                                            {{ $date['weekday'] }}
                                        </small>

                                    </label>

                                </div>

                            @endforeach

                        </div>

                    </div>

                </div>


                {{-- =================================================
                     TIME
                ================================================= --}}

                <div
                    class="card
                           border
                           border-warning-subtle
                           rounded-4
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
                                       d-flex
                                       align-items-center
                                       justify-content-center
                                       bg-pn-beige
                                       text-pn-primary
                                       flex-shrink-0"
                                style="width:48px;height:48px;"
                            >

                                <i class="bi bi-clock fs-5"></i>

                            </div>


                            <div>

                                <span
                                    class="small
                                           text-pn-primary
                                           fw-semibold
                                           text-uppercase"
                                >
                                    Step 2
                                </span>

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
                                    Choose an available time for your
                                    Digital Pooja.
                                </p>

                            </div>

                        </div>


                        <div
                            class="row
                                   row-cols-2
                                   row-cols-sm-3
                                   g-2"
                        >

                            @foreach($timeSlots as $index => $time)

                                <div class="col">

                                    <input
                                        type="radio"
                                        class="btn-check"
                                        name="pooja_time"
                                        id="time{{ $index }}"
                                        value="{{ $time }}"
                                        {{ $index === 0 ? 'checked' : '' }}
                                    >

                                    <label
                                        for="time{{ $index }}"
                                        class="btn
                                               btn-outline-secondary
                                               w-100
                                               rounded-3
                                               py-3"
                                    >

                                        <i
                                            class="bi bi-clock
                                                   me-1"
                                        ></i>

                                        {{ $time }}

                                    </label>

                                </div>

                            @endforeach

                        </div>


                        <div
                            class="alert
                                   alert-light
                                   border
                                   mt-4
                                   mb-0"
                        >

                            <i
                                class="bi bi-info-circle
                                       text-pn-primary
                                       me-2"
                            ></i>

                            Time availability will be validated against
                            the actual Digital Pooja schedule when booking
                            is connected to the backend.

                        </div>

                    </div>

                </div>


                {{-- =================================================
                     LANGUAGE
                ================================================= --}}

                <div
                    class="card
                           border
                           border-warning-subtle
                           rounded-4
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
                                       d-flex
                                       align-items-center
                                       justify-content-center
                                       bg-pn-beige
                                       text-pn-primary
                                       flex-shrink-0"
                                style="width:48px;height:48px;"
                            >

                                <i class="bi bi-translate fs-5"></i>

                            </div>


                            <div>

                                <span
                                    class="small
                                           text-pn-primary
                                           fw-semibold
                                           text-uppercase"
                                >
                                    Personalization
                                </span>

                                <h2
                                    class="font-serif
                                           h3
                                           text-pn-brown
                                           mb-1"
                                >
                                    Choose Language
                                </h2>

                                <p
                                    class="small
                                           text-secondary
                                           mb-0"
                                >
                                    Select your preferred language for
                                    the devotional experience.
                                </p>

                            </div>

                        </div>


                        <div
                            class="row
                                   row-cols-1
                                   row-cols-sm-2
                                   g-3"
                        >

                            <div class="col">

                                <input
                                    type="radio"
                                    class="btn-check"
                                    name="language"
                                    id="languageTelugu"
                                    value="Telugu"
                                    checked
                                >

                                <label
                                    for="languageTelugu"
                                    class="btn
                                           btn-outline-secondary
                                           w-100
                                           text-start
                                           rounded-3
                                           p-3"
                                >

                                    <i
                                        class="bi bi-check-circle
                                               me-2"
                                    ></i>

                                    Telugu

                                </label>

                            </div>


                            <div class="col">

                                <input
                                    type="radio"
                                    class="btn-check"
                                    name="language"
                                    id="languageEnglish"
                                    value="English"
                                >

                                <label
                                    for="languageEnglish"
                                    class="btn
                                           btn-outline-secondary
                                           w-100
                                           text-start
                                           rounded-3
                                           p-3"
                                >

                                    <i
                                        class="bi bi-check-circle
                                               me-2"
                                    ></i>

                                    English

                                </label>

                            </div>

                        </div>

                    </div>

                </div>


                {{-- =================================================
                     FAMILY DETAILS
                ================================================= --}}

                <div
                    class="card
                           border
                           border-warning-subtle
                           rounded-4
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
                                       d-flex
                                       align-items-center
                                       justify-content-center
                                       bg-pn-beige
                                       text-pn-primary
                                       flex-shrink-0"
                                style="width:48px;height:48px;"
                            >

                                <i class="bi bi-people fs-5"></i>

                            </div>


                            <div>

                                <span
                                    class="small
                                           text-pn-primary
                                           fw-semibold
                                           text-uppercase"
                                >
                                    Personalization
                                </span>

                                <h2
                                    class="font-serif
                                           h3
                                           text-pn-brown
                                           mb-1"
                                >
                                    Family & Sankalp Details
                                </h2>

                                <p
                                    class="small
                                           text-secondary
                                           mb-0"
                                >
                                    These details help create your
                                    personalized Sankalpam.
                                </p>

                            </div>

                        </div>


                        <div class="row g-3">

                            <div class="col-12 col-md-6">

                                <label
                                    for="devoteeName"
                                    class="form-label fw-semibold"
                                >
                                    Devotee Name
                                    <span class="text-danger">*</span>
                                </label>

                                <input
                                    type="text"
                                    id="devoteeName"
                                    name="devotee_name"
                                    class="form-control form-control-lg"
                                    placeholder="Enter your full name"
                                    value="Mahendra Varma"
                                    required
                                >

                            </div>


                            <div class="col-12 col-md-6">

                                <label
                                    for="phone"
                                    class="form-label fw-semibold"
                                >
                                    Mobile Number
                                    <span class="text-danger">*</span>
                                </label>

                                <input
                                    type="tel"
                                    id="phone"
                                    name="phone"
                                    class="form-control form-control-lg"
                                    placeholder="Enter mobile number"
                                    required
                                >

                            </div>


                            <div class="col-12">

                                <label
                                    for="familyNames"
                                    class="form-label fw-semibold"
                                >
                                    Family Member Names
                                </label>

                                <input
                                    type="text"
                                    id="familyNames"
                                    name="family_names"
                                    class="form-control form-control-lg"
                                    placeholder="Example: Lakshmi, Varun, Ananya"
                                >

                                <div
                                    class="form-text"
                                >

                                    Add the family members you would like
                                    to include in the Sankalpam.

                                </div>

                            </div>


                            <div class="col-12">

                                <label
                                    for="purpose"
                                    class="form-label fw-semibold"
                                >
                                    Purpose / Sankalpam
                                    <span class="text-danger">*</span>
                                </label>

                                <textarea
                                    id="purpose"
                                    name="purpose"
                                    class="form-control"
                                    rows="4"
                                    placeholder="Enter your prayer intention or purpose"
                                    required
                                ></textarea>

                                <div
                                    class="form-text"
                                >

                                    Example: Health, prosperity, family
                                    wellbeing, success, peace or another
                                    personal intention.

                                </div>

                            </div>

                        </div>

                    </div>

                </div>


                {{-- =================================================
                     FLOWERS
                ================================================= --}}

                <div
                    class="card
                           border
                           border-warning-subtle
                           rounded-4
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
                                       d-flex
                                       align-items-center
                                       justify-content-center
                                       bg-pn-beige
                                       text-pn-primary
                                       flex-shrink-0"
                                style="width:48px;height:48px;"
                            >

                                <i class="bi bi-flower1 fs-5"></i>

                            </div>


                            <div>

                                <h2
                                    class="font-serif
                                           h3
                                           text-pn-brown
                                           mb-1"
                                >
                                    Choose Flowers
                                </h2>

                                <p
                                    class="small
                                           text-secondary
                                           mb-0"
                                >
                                    Select the flower you would like to
                                    offer during your Digital Pooja.
                                </p>

                            </div>

                        </div>


                        <div
                            class="row
                                   row-cols-2
                                   row-cols-sm-4
                                   g-3"
                        >

                            @foreach($flowers as $index => $flower)

                                <div class="col">

                                    <input
                                        type="radio"
                                        class="btn-check"
                                        name="flower"
                                        id="flower{{ $index }}"
                                        value="{{ $flower['value'] }}"
                                        {{ $index === 0 ? 'checked' : '' }}
                                    >

                                    <label
                                        for="flower{{ $index }}"
                                        class="btn
                                               btn-outline-secondary
                                               w-100
                                               rounded-4
                                               py-3
                                               h-100"
                                    >

                                        <i
                                            class="bi bi-flower1
                                                   d-block
                                                   fs-3
                                                   mb-2"
                                        ></i>

                                        <span
                                            class="small
                                                   fw-semibold"
                                        >
                                            {{ $flower['name'] }}
                                        </span>

                                    </label>

                                </div>

                            @endforeach

                        </div>

                    </div>

                </div>


                {{-- =================================================
                     DEEPAM
                ================================================= --}}

                <div
                    class="card
                           border
                           border-warning-subtle
                           rounded-4
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
                                       d-flex
                                       align-items-center
                                       justify-content-center
                                       bg-pn-beige
                                       text-pn-primary
                                       flex-shrink-0"
                                style="width:48px;height:48px;"
                            >

                                <i
                                    class="bi bi-brightness-high fs-5"
                                ></i>

                            </div>


                            <div>

                                <h2
                                    class="font-serif
                                           h3
                                           text-pn-brown
                                           mb-1"
                                >
                                    Choose Deepam
                                </h2>

                                <p
                                    class="small
                                           text-secondary
                                           mb-0"
                                >
                                    Personalize your sacred deepam.
                                </p>

                            </div>

                        </div>


                        <div
                            class="row
                                   row-cols-1
                                   row-cols-sm-3
                                   g-3"
                        >

                            @foreach($deepams as $index => $deepam)

                                <div class="col">

                                    <input
                                        type="radio"
                                        class="btn-check"
                                        name="deepam"
                                        id="deepam{{ $index }}"
                                        value="{{ $deepam['value'] }}"
                                        {{ $index === 0 ? 'checked' : '' }}
                                    >

                                    <label
                                        for="deepam{{ $index }}"
                                        class="btn
                                               btn-outline-secondary
                                               w-100
                                               rounded-4
                                               p-3
                                               h-100"
                                    >

                                        <i
                                            class="bi bi-brightness-high
                                                   d-block
                                                   fs-3
                                                   mb-2"
                                        ></i>

                                        <span
                                            class="small
                                                   fw-semibold"
                                        >
                                            {{ $deepam['name'] }}
                                        </span>

                                    </label>

                                </div>

                            @endforeach

                        </div>

                    </div>

                </div>


                {{-- =================================================
                     AI SANKALPAM PREVIEW
                ================================================= --}}

                <div
                    class="card
                           border-0
                           rounded-4
                           mb-4
                           overflow-hidden"
                >

                    <div
                        class="pn-digital
                               text-white"
                    >

                        <div class="card-body p-4 p-md-5">

                            <div
                                class="d-flex
                                       align-items-start
                                       gap-3"
                            >

                                <div
                                    class="rounded-circle
                                           d-flex
                                           align-items-center
                                           justify-content-center
                                           bg-warning
                                           text-dark
                                           flex-shrink-0"
                                    style="width:52px;height:52px;"
                                >

                                    <i class="bi bi-stars fs-5"></i>

                                </div>


                                <div>

                                    <span
                                        class="small
                                               text-warning
                                               fw-semibold
                                               text-uppercase"
                                    >
                                        AI Personalized
                                    </span>

                                    <h2
                                        class="font-serif
                                               h3
                                               mt-1
                                               mb-2"
                                    >
                                        Your Sankalpam
                                    </h2>

                                    <p
                                        class="small
                                               text-white-50
                                               mb-0"
                                    >
                                        Your Sankalpam will be generated
                                        from the details you provide above.
                                    </p>

                                </div>

                            </div>


                            <div
                                class="bg-white
                                       bg-opacity-10
                                       rounded-4
                                       p-4
                                       mt-4"
                            >

                                <p
                                    class="small
                                           text-white-50
                                           mb-2"
                                >
                                    Preview
                                </p>

                                <p
                                    class="mb-0
                                           fst-italic"
                                >

                                    Your personalized Sankalpam will
                                    appear here after the required
                                    details are completed.

                                </p>

                            </div>

                        </div>

                    </div>

                </div>


                {{-- =================================================
                     TERMS
                ================================================= --}}

                <div
                    class="card
                           border
                           border-warning-subtle
                           rounded-4"
                >

                    <div class="card-body p-4">

                        <div class="form-check">

                            <input
                                class="form-check-input"
                                type="checkbox"
                                value="1"
                                id="terms"
                                required
                            >

                            <label
                                class="form-check-label
                                       small
                                       text-secondary"
                                for="terms"
                            >

                                I confirm that the information provided
                                above is correct and I agree to the
                                Pooja Nilayam booking terms and applicable
                                policies.

                            </label>

                        </div>

                    </div>

                </div>

            </div>


            {{-- =================================================
                 RIGHT SUMMARY
            ================================================= --}}

            <div class="col-12 col-lg-4">

                <div
                    class="position-sticky"
                    style="top:100px;"
                >


                    {{-- Booking Summary --}}

                    <div
                        class="card
                               border
                               border-warning-subtle
                               rounded-4
                               mb-3"
                    >

                        <div class="card-body p-4">

                            <h2
                                class="font-serif
                                       h4
                                       text-pn-brown
                                       mb-4"
                            >
                                Booking Summary
                            </h2>


                            <div
                                class="d-flex
                                       align-items-center
                                       gap-3
                                       mb-4"
                            >

                                <img
                                    src="{{ Vite::asset('resources/images/home/' . $pooja['image']) }}"
                                    class="rounded-3
                                           object-fit-cover"
                                    style="width:72px;height:72px;"
                                    alt="{{ $pooja['name'] }}"
                                    loading="lazy"
                                >


                                <div>

                                    <h3
                                        class="h6
                                               fw-semibold
                                               text-pn-brown
                                               mb-1"
                                    >
                                        {{ $pooja['name'] }}
                                    </h3>

                                    <small
                                        class="text-secondary"
                                    >
                                        {{ $pooja['god'] }}
                                    </small>

                                </div>

                            </div>


                            <div
                                class="d-flex
                                       justify-content-between
                                       mb-3"
                            >

                                <span
                                    class="small
                                           text-secondary"
                                >
                                    Date
                                </span>

                                <strong
                                    class="small"
                                >
                                    11 August 2026
                                </strong>

                            </div>


                            <div
                                class="d-flex
                                       justify-content-between
                                       mb-3"
                            >

                                <span
                                    class="small
                                           text-secondary"
                                >
                                    Time
                                </span>

                                <strong
                                    class="small"
                                >
                                    07:00 AM
                                </strong>

                            </div>


                            <div
                                class="d-flex
                                       justify-content-between
                                       mb-3"
                            >

                                <span
                                    class="small
                                           text-secondary"
                                >
                                    Duration
                                </span>

                                <strong
                                    class="small"
                                >
                                    {{ $pooja['duration'] }}
                                </strong>

                            </div>


                            <div
                                class="d-flex
                                       justify-content-between
                                       mb-3"
                            >

                                <span
                                    class="small
                                           text-secondary"
                                >
                                    Language
                                </span>

                                <strong
                                    class="small"
                                >
                                    {{ $pooja['language'] }}
                                </strong>

                            </div>


                            <hr
                                class="border-warning-subtle"
                            >


                            <div
                                class="d-flex
                                       justify-content-between
                                       align-items-center"
                            >

                                <span
                                    class="text-secondary"
                                >
                                    Pooja Amount
                                </span>

                                <strong
                                    class="font-serif
                                           fs-4
                                           text-pn-primary"
                                >
                                    ₹{{ number_format($pooja['price']) }}
                                </strong>

                            </div>

                        </div>

                    </div>


                    {{-- Payment CTA --}}

                    <div
                        class="card
                               border
                               border-warning-subtle
                               rounded-4
                               mb-3"
                    >

                        <div class="card-body p-4">

                            <div
                                class="alert
                                       alert-light
                                       border
                                       small"
                            >

                                <i
                                    class="bi bi-shield-check
                                           text-pn-primary
                                           me-2"
                                ></i>

                                You will be redirected to secure payment
                                after reviewing your booking.

                            </div>


                            <button
                                type="button"
                                class="btn
                                       btn-pn
                                       btn-lg
                                       w-100"
                            >

                                Continue to Payment

                                <i
                                    class="bi bi-arrow-right ms-2"
                                ></i>

                            </button>


                            <p
                                class="small
                                       text-secondary
                                       text-center
                                       mt-3
                                       mb-0"
                            >

                                Your booking is not confirmed until
                                payment is successfully completed.

                            </p>

                        </div>

                    </div>


                    {{-- Support --}}

                    <div
                        class="card
                               border
                               border-warning-subtle
                               rounded-4"
                    >

                        <div class="card-body p-4">

                            <div
                                class="d-flex
                                       align-items-start
                                       gap-3"
                            >

                                <i
                                    class="bi bi-headset
                                           text-pn-primary
                                           fs-4"
                                ></i>


                                <div>

                                    <h6
                                        class="fw-semibold
                                               text-pn-brown"
                                    >
                                        Need Help?
                                    </h6>

                                    <p
                                        class="small
                                               text-secondary
                                               mb-2"
                                    >
                                        Our support team can help you
                                        with your Digital Pooja booking.
                                    </p>

                                    <a
                                        href="#"
                                        class="btn
                                               btn-pn-outline
                                               btn-sm"
                                    >
                                        Contact Support
                                    </a>

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
     SECURITY / TRUST
============================================================ --}}

<section class="py-5 bg-pn-cream">

    <div class="container">

        <div
            class="row
                   row-cols-1
                   row-cols-sm-3
                   g-4
                   text-center"
        >

            <div class="col">

                <i
                    class="bi bi-shield-check
                           display-6
                           text-pn-primary"
                ></i>

                <h5
                    class="font-serif
                           text-pn-brown
                           mt-3"
                >
                    Secure Booking
                </h5>

                <p
                    class="small
                           text-secondary
                           mb-0"
                >
                    Your booking details are handled securely.
                </p>

            </div>


            <div class="col">

                <i
                    class="bi bi-credit-card
                           display-6
                           text-pn-primary"
                ></i>

                <h5
                    class="font-serif
                           text-pn-brown
                           mt-3"
                >
                    Secure Payment
                </h5>

                <p
                    class="small
                           text-secondary
                           mb-0"
                >
                    Payment is completed through the secure
                    payment flow.
                </p>

            </div>


            <div class="col">

                <i
                    class="bi bi-bell
                           display-6
                           text-pn-primary"
                ></i>

                <h5
                    class="font-serif
                           text-pn-brown
                           mt-3"
                >
                    Booking Updates
                </h5>

                <p
                    class="small
                           text-secondary
                           mb-0"
                >
                    Booking notifications will be sent through
                    supported channels.
                </p>

            </div>

        </div>

    </div>

</section>

@endsection