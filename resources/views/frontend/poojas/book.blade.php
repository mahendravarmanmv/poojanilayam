@extends('layouts.app')

@section('title', 'Book Pooja | Pooja Nilayam')

@section(
    'meta_description',
    'Book your preferred pooja, select date and time, choose a priest, enter Sankalpam details, add services and securely complete your booking with Pooja Nilayam.'
)

@section('content')

@php

    /*
    |--------------------------------------------------------------------------
    | TEMPORARY UI DATA
    |--------------------------------------------------------------------------
    | Frontend prototype only.
    | These values will later come from Controllers / Services / Database.
    |--------------------------------------------------------------------------
    */

    $pooja = [
        'name' => 'Ganapathi Homam',
        'image' => 'ganapathi.jpg',
        'category' => 'Homam',
        'duration' => '60 Mins',
        'base_price' => 501,
        'location' => 'Hyderabad'
    ];


    /*
    |--------------------------------------------------------------------------
    | Booking Steps
    |--------------------------------------------------------------------------
    */

    $steps = [
        [
            'number' => 1,
            'title' => 'Date & Time',
            'icon' => 'bi-calendar-check'
        ],
        [
            'number' => 2,
            'title' => 'Priest',
            'icon' => 'bi-person-check'
        ],
        [
            'number' => 3,
            'title' => 'Devotee Details',
            'icon' => 'bi-person-vcard'
        ],
        [
            'number' => 4,
            'title' => 'Extras',
            'icon' => 'bi-plus-circle'
        ],
        [
            'number' => 5,
            'title' => 'Review & Payment',
            'icon' => 'bi-credit-card'
        ]
    ];


    /*
    |--------------------------------------------------------------------------
    | Available Priests
    |--------------------------------------------------------------------------
    */

    $priests = [
        [
            'id' => 1,
            'name' => 'Sri Venkatesh Sharma',
            'image' => 'priest-1.jpg',
            'experience' => '18+ Years',
            'rating' => '4.9',
            'languages' => 'Telugu, Sanskrit, English',
            'available_slots' => 'Morning, Evening',
            'temple' => 'Sri Venkateswara Temple',
            'live_available' => true,
            'recording_available' => true,
            'prasadam_available' => true
        ],

        [
            'id' => 2,
            'name' => 'Sri Ramesh Shastri',
            'image' => 'priest-2.jpg',
            'experience' => '15+ Years',
            'rating' => '4.9',
            'languages' => 'Telugu, Sanskrit',
            'available_slots' => 'Morning, Afternoon',
            'temple' => 'Sri Ganapathi Temple',
            'live_available' => true,
            'recording_available' => true,
            'prasadam_available' => true
        ],

        [
            'id' => 3,
            'name' => 'Sri Suresh Bhatt',
            'image' => 'priest-3.jpg',
            'experience' => '20+ Years',
            'rating' => '4.8',
            'languages' => 'Telugu, Kannada, Sanskrit',
            'available_slots' => 'Afternoon, Evening',
            'temple' => 'Sri Shiva Temple',
            'live_available' => true,
            'recording_available' => false,
            'prasadam_available' => true
        ]
    ];


    /*
    |--------------------------------------------------------------------------
    | Date Options
    |--------------------------------------------------------------------------
    */

    $dates = [
        [
            'day' => '10',
            'weekday' => 'MON',
            'month' => 'AUG'
        ],
        [
            'day' => '11',
            'weekday' => 'TUE',
            'month' => 'AUG'
        ],
        [
            'day' => '12',
            'weekday' => 'WED',
            'month' => 'AUG'
        ],
        [
            'day' => '13',
            'weekday' => 'THU',
            'month' => 'AUG'
        ],
        [
            'day' => '14',
            'weekday' => 'FRI',
            'month' => 'AUG'
        ],
        [
            'day' => '15',
            'weekday' => 'SAT',
            'month' => 'AUG'
        ],
        [
            'day' => '16',
            'weekday' => 'SUN',
            'month' => 'AUG'
        ]
    ];


    /*
    |--------------------------------------------------------------------------
    | Time Slots
    |--------------------------------------------------------------------------
    */

    $timeSlots = [
        'Morning' => [
            '06:00 AM',
            '07:00 AM',
            '08:00 AM',
            '09:00 AM'
        ],

        'Afternoon' => [
            '12:00 PM',
            '01:00 PM',
            '02:00 PM',
            '03:00 PM'
        ],

        'Evening' => [
            '05:00 PM',
            '06:00 PM',
            '07:00 PM',
            '08:00 PM'
        ]
    ];


    /*
    |--------------------------------------------------------------------------
    | Sankalpam Purposes
    |--------------------------------------------------------------------------
    */

    $purposes = [
        'Health',
        'Business',
        'Marriage',
        'Education',
        'Birthday',
        'Anniversary'
    ];


    /*
    |--------------------------------------------------------------------------
    | Add-on Services
    |--------------------------------------------------------------------------
    */

    $addons = [
        [
            'id' => 'premium_flowers',
            'icon' => 'bi-flower1',
            'name' => 'Premium Flowers',
            'description' => 'Premium flower offering for the pooja.',
            'price' => 101
        ],

        [
            'id' => 'extra_deepams',
            'icon' => 'bi-brightness-high',
            'name' => 'Extra Deepams',
            'description' => 'Additional traditional deepam offering.',
            'price' => 51
        ],

        [
            'id' => 'premium_prasadam',
            'icon' => 'bi-gift',
            'name' => 'Premium Prasadam',
            'description' => 'Premium prasadam package after the pooja.',
            'price' => 201
        ],

        [
            'id' => 'extra_family_members',
            'icon' => 'bi-people',
            'name' => 'Extra Family Members',
            'description' => 'Include additional family members in Sankalpam.',
            'price' => 101
        ],

        [
            'id' => 'live_recording',
            'icon' => 'bi-camera-video',
            'name' => 'Live Recording',
            'description' => 'Receive a recording of the live pooja.',
            'price' => 151
        ],

        [
            'id' => 'premium_camera',
            'icon' => 'bi-camera',
            'name' => 'Premium Camera',
            'description' => 'Enhanced camera experience for the pooja.',
            'price' => 251
        ]
    ];


    /*
    |--------------------------------------------------------------------------
    | Payment Methods
    |--------------------------------------------------------------------------
    */

    $paymentMethods = [
        [
            'id' => 'upi',
            'name' => 'UPI',
            'icon' => 'bi-phone'
        ],

        [
            'id' => 'cards',
            'name' => 'Cards',
            'icon' => 'bi-credit-card'
        ],

        [
            'id' => 'netbanking',
            'name' => 'Net Banking',
            'icon' => 'bi-bank'
        ],

        [
            'id' => 'wallet',
            'name' => 'Wallet',
            'icon' => 'bi-wallet2'
        ],

        [
            'id' => 'international',
            'name' => 'International Cards',
            'icon' => 'bi-globe'
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
                        Poojas
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
                    Book Pooja
                </li>

            </ol>

        </nav>

    </div>

</section>


{{-- ============================================================
     BOOKING HEADER
============================================================ --}}

<section class="bg-pn-cream py-4 border-bottom">

    <div class="container">

        <div class="row align-items-center g-3">

            <div class="col-12 col-lg-7">

                <div
                    class="d-flex
                           align-items-center
                           gap-3"
                >

                    <img
                        src="{{ Vite::asset('resources/images/home/' . $pooja['image']) }}"
                        class="rounded-3
                               object-fit-cover"
                        style="width:72px;height:72px;"
                        alt="{{ $pooja['name'] }}"
                    >


                    <div>

                        <span
                            class="small
                                   text-pn-primary
                                   fw-semibold"
                        >
                            {{ $pooja['category'] }}
                        </span>


                        <h1
                            class="font-serif
                                   text-pn-brown
                                   h3
                                   mb-1"
                        >
                            Book {{ $pooja['name'] }}
                        </h1>


                        <div
                            class="small
                                   text-secondary"
                        >

                            <i class="bi bi-clock me-1"></i>

                            {{ $pooja['duration'] }}

                            <span class="mx-2">•</span>

                            <i class="bi bi-geo-alt me-1"></i>

                            {{ $pooja['location'] }}

                        </div>

                    </div>

                </div>

            </div>


            <div class="col-12 col-lg-5 text-lg-end">

                <small
                    class="text-secondary
                           d-block"
                >
                    Starting from
                </small>


                <strong
                    class="fs-3
                           font-serif
                           text-pn-primary"
                >
                    ₹{{ number_format($pooja['base_price']) }}
                </strong>

            </div>

        </div>

    </div>

</section>


{{-- ============================================================
     BOOKING STEPPER
============================================================ --}}

<section class="bg-white border-bottom sticky-top">

    <div class="container">

        <div
            class="d-flex
                   overflow-auto
                   py-3
                   gap-2"
        >

            @foreach($steps as $step)

                <div
                    class="d-flex
                           align-items-center
                           flex-shrink-0
                           gap-2"
                >

                    <div
                        class="rounded-circle
                               d-flex
                               align-items-center
                               justify-content-center
                               bg-pn-primary
                               text-white
                               fw-semibold"
                        style="width:34px;height:34px;"
                    >

                        {{ $step['number'] }}

                    </div>


                    <span
                        class="small
                               fw-semibold
                               text-pn-brown"
                    >

                        {{ $step['title'] }}

                    </span>

                </div>


                @if(!$loop->last)

                    <i
                        class="bi bi-chevron-right
                               text-secondary
                               align-self-center
                               flex-shrink-0"
                    ></i>

                @endif

            @endforeach

        </div>

    </div>

</section>


{{-- ============================================================
     MAIN BOOKING AREA
============================================================ --}}

<section class="py-5 bg-light-subtle">

    <div class="container">

        <div class="row g-4 align-items-start">


            {{-- =================================================
                 LEFT BOOKING FORM
            ================================================= --}}

            <div class="col-12 col-lg-8">


                {{-- =================================================
                     STEP 1 : DATE & TIME
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
                                       text-pn-primary"
                                style="width:46px;height:46px;"
                            >

                                <i
                                    class="bi bi-calendar-check fs-5"
                                ></i>

                            </div>


                            <div>

                                <span
                                    class="small
                                           text-pn-primary
                                           fw-semibold"
                                >
                                    STEP 1
                                </span>


                                <h2
                                    class="font-serif
                                           h3
                                           text-pn-brown
                                           mb-1"
                                >
                                    Choose Date & Time
                                </h2>


                                <p
                                    class="small
                                           text-secondary
                                           mb-0"
                                >
                                    Select your preferred date and available
                                    time slot.
                                </p>

                            </div>

                        </div>


                        {{-- Date --}}

                        <h6
                            class="fw-semibold
                                   text-pn-brown
                                   mb-3"
                        >
                            Select Date
                        </h6>


                        <div
                            class="row
                                   row-cols-3
                                   row-cols-sm-4
                                   row-cols-md-7
                                   g-2
                                   mb-4"
                        >

                            @foreach($dates as $index => $date)

                                <div class="col">

                                    <input
                                        type="radio"
                                        class="btn-check"
                                        name="booking_date"
                                        id="date{{ $index }}"
                                        value="{{ $date['day'] }} {{ $date['month'] }}"
                                        {{ $index === 1 ? 'checked' : '' }}
                                    >


                                    <label
                                        for="date{{ $index }}"
                                        class="btn
                                               btn-outline-secondary
                                               w-100
                                               py-3"
                                    >

                                        <small
                                            class="d-block
                                                   text-uppercase"
                                        >
                                            {{ $date['weekday'] }}
                                        </small>


                                        <strong
                                            class="d-block
                                                   fs-4"
                                        >
                                            {{ $date['day'] }}
                                        </strong>


                                        <small>
                                            {{ $date['month'] }}
                                        </small>

                                    </label>

                                </div>

                            @endforeach

                        </div>


                        {{-- Calendar button --}}

                        <button
                            type="button"
                            class="btn
                                   btn-pn-outline
                                   btn-sm
                                   mb-4"
                        >

                            <i class="bi bi-calendar3 me-2"></i>

                            Open Calendar

                        </button>


                        {{-- Time --}}

                        <h6
                            class="fw-semibold
                                   text-pn-brown
                                   mb-3"
                        >
                            Available Time Slots
                        </h6>


                        @foreach($timeSlots as $period => $slots)

                            <div class="mb-4">

                                <div
                                    class="d-flex
                                           align-items-center
                                           gap-2
                                           mb-2"
                                >

                                    <i
                                        class="bi
                                            {{ $period === 'Morning'
                                                ? 'bi-sunrise'
                                                : ($period === 'Afternoon'
                                                    ? 'bi-sun'
                                                    : 'bi-sunset') }}
                                            text-pn-primary"
                                    ></i>


                                    <span
                                        class="small
                                               fw-semibold
                                               text-pn-brown"
                                    >

                                        {{ $period }}

                                    </span>

                                </div>


                                <div
                                    class="d-flex
                                           flex-wrap
                                           gap-2"
                                >

                                    @foreach($slots as $slotIndex => $slot)

                                        <div>

                                            <input
                                                type="radio"
                                                class="btn-check"
                                                name="booking_time"
                                                id="time{{ $period }}{{ $slotIndex }}"
                                                value="{{ $slot }}"
                                                {{ $period === 'Morning' && $slotIndex === 1 ? 'checked' : '' }}
                                            >


                                            <label
                                                for="time{{ $period }}{{ $slotIndex }}"
                                                class="btn
                                                       btn-outline-secondary"
                                            >

                                                {{ $slot }}

                                            </label>

                                        </div>

                                    @endforeach

                                </div>

                            </div>

                        @endforeach

                    </div>

                </div>


                {{-- =================================================
                     STEP 2 : PRIEST
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
                                       text-pn-primary"
                                style="width:46px;height:46px;"
                            >

                                <i
                                    class="bi bi-person-check fs-5"
                                ></i>

                            </div>


                            <div>

                                <span
                                    class="small
                                           text-pn-primary
                                           fw-semibold"
                                >
                                    STEP 2
                                </span>


                                <h2
                                    class="font-serif
                                           h3
                                           text-pn-brown
                                           mb-1"
                                >
                                    Select Priest
                                </h2>


                                <p
                                    class="small
                                           text-secondary
                                           mb-0"
                                >
                                    Priest selection is optional. You may
                                    continue without selecting a specific priest.
                                </p>

                            </div>

                        </div>


                        {{-- No preference --}}

                        <div class="mb-3">

                            <input
                                type="radio"
                                class="btn-check"
                                name="priest_id"
                                id="priestAny"
                                value=""
                                checked
                            >


                            <label
                                for="priestAny"
                                class="card
                                       border
                                       border-warning-subtle
                                       rounded-4
                                       p-3
                                       w-100"
                            >

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
                                               bg-pn-beige
                                               text-pn-primary"
                                        style="width:50px;height:50px;"
                                    >

                                        <i class="bi bi-people fs-5"></i>

                                    </div>


                                    <div>

                                        <strong
                                            class="d-block
                                                   text-pn-brown"
                                        >
                                            No Preference
                                        </strong>


                                        <small
                                            class="text-secondary"
                                        >
                                            Let Pooja Nilayam assign an
                                            available priest.
                                        </small>

                                    </div>

                                </div>

                            </label>

                        </div>


                        {{-- Priests --}}

                        <div class="vstack gap-3">

                            @foreach($priests as $priest)

                                <div>

                                    <input
                                        type="radio"
                                        class="btn-check"
                                        name="priest_id"
                                        id="priest{{ $priest['id'] }}"
                                        value="{{ $priest['id'] }}"
                                    >


                                    <label
                                        for="priest{{ $priest['id'] }}"
                                        class="card
                                               border
                                               border-warning-subtle
                                               rounded-4
                                               p-3
                                               w-100"
                                    >

                                        <div
                                            class="d-flex
                                                   flex-column
                                                   flex-sm-row
                                                   align-items-start
                                                   gap-3"
                                        >

                                            <img
                                                src="{{ Vite::asset('resources/images/home/' . $priest['image']) }}"
                                                class="rounded-circle
                                                       object-fit-cover
                                                       flex-shrink-0"
                                                style="width:72px;height:72px;"
                                                alt="{{ $priest['name'] }}"
                                            >


                                            <div class="flex-grow-1">

                                                <div
                                                    class="d-flex
                                                           flex-wrap
                                                           align-items-center
                                                           gap-2"
                                                >

                                                    <h5
                                                        class="font-serif
                                                               text-pn-brown
                                                               mb-0"
                                                    >

                                                        {{ $priest['name'] }}

                                                    </h5>


                                                    <span
                                                        class="badge
                                                               rounded-pill
                                                               bg-pn-beige
                                                               text-pn-primary"
                                                    >

                                                        Verified

                                                    </span>

                                                </div>


                                                <div
                                                    class="small
                                                           text-secondary
                                                           mt-1"
                                                >

                                                    {{ $priest['experience'] }}

                                                    <span class="mx-1">•</span>

                                                    <i
                                                        class="bi bi-star-fill
                                                               text-pn-gold"
                                                    ></i>

                                                    {{ $priest['rating'] }}

                                                </div>


                                                <div
                                                    class="small
                                                           text-secondary
                                                           mt-2"
                                                >

                                                    <i
                                                        class="bi bi-translate
                                                               text-pn-primary
                                                               me-1"
                                                    ></i>

                                                    {{ $priest['languages'] }}

                                                </div>


                                                <div
                                                    class="d-flex
                                                           flex-wrap
                                                           gap-2
                                                           mt-3"
                                                >

                                                    <span
                                                        class="badge
                                                               bg-light
                                                               text-secondary
                                                               border"
                                                    >
                                                        {{ $priest['available_slots'] }}
                                                    </span>


                                                    <span
                                                        class="badge
                                                               bg-light
                                                               text-secondary
                                                               border"
                                                    >
                                                        {{ $priest['temple'] }}
                                                    </span>


                                                    @if($priest['live_available'])

                                                        <span
                                                            class="badge
                                                                   bg-light
                                                                   text-success
                                                                   border"
                                                        >

                                                            <i
                                                                class="bi bi-camera-video me-1"
                                                            ></i>

                                                            Live Available

                                                        </span>

                                                    @endif


                                                    @if($priest['recording_available'])

                                                        <span
                                                            class="badge
                                                                   bg-light
                                                                   text-success
                                                                   border"
                                                        >

                                                            <i
                                                                class="bi bi-record-circle me-1"
                                                            ></i>

                                                            Recording

                                                        </span>

                                                    @endif


                                                    @if($priest['prasadam_available'])

                                                        <span
                                                            class="badge
                                                                   bg-light
                                                                   text-success
                                                                   border"
                                                        >

                                                            <i
                                                                class="bi bi-gift me-1"
                                                            ></i>

                                                            Prasadam

                                                        </span>

                                                    @endif

                                                </div>

                                            </div>

                                        </div>

                                    </label>

                                </div>

                            @endforeach

                        </div>

                    </div>

                </div>


                {{-- =================================================
                     STEP 3 : DEVOTEE DETAILS
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
                                       text-pn-primary"
                                style="width:46px;height:46px;"
                            >

                                <i
                                    class="bi bi-person-vcard fs-5"
                                ></i>

                            </div>


                            <div>

                                <span
                                    class="small
                                           text-pn-primary
                                           fw-semibold"
                                >
                                    STEP 3
                                </span>


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
                                    Enter the devotee information required
                                    for the Sankalpam.
                                </p>

                            </div>

                        </div>


                        <div class="row g-3">

                            {{-- Name --}}

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
                                    class="form-control
                                           form-control-lg"
                                    placeholder="Enter full name"
                                    required
                                >

                            </div>


                            {{-- Phone --}}

                            <div class="col-12 col-md-6">

                                <label
                                    for="devoteePhone"
                                    class="form-label fw-semibold"
                                >
                                    Mobile Number
                                    <span class="text-danger">*</span>
                                </label>


                                <input
                                    type="tel"
                                    id="devoteePhone"
                                    name="devotee_phone"
                                    class="form-control
                                           form-control-lg"
                                    placeholder="Enter mobile number"
                                    required
                                >

                            </div>


                            {{-- Email --}}

                            <div class="col-12 col-md-6">

                                <label
                                    for="devoteeEmail"
                                    class="form-label fw-semibold"
                                >
                                    Email Address
                                    <span class="text-danger">*</span>
                                </label>


                                <input
                                    type="email"
                                    id="devoteeEmail"
                                    name="devotee_email"
                                    class="form-control
                                           form-control-lg"
                                    placeholder="Enter email address"
                                    required
                                >

                            </div>


                            {{-- DOB --}}

                            <div class="col-12 col-md-6">

                                <label
                                    for="devoteeDob"
                                    class="form-label fw-semibold"
                                >
                                    Date of Birth
                                </label>


                                <input
                                    type="date"
                                    id="devoteeDob"
                                    name="devotee_dob"
                                    class="form-control
                                           form-control-lg"
                                >

                            </div>


                            {{-- Nakshatram --}}

                            <div class="col-12 col-md-6">

                                <label
                                    for="nakshatram"
                                    class="form-label fw-semibold"
                                >
                                    Nakshatram
                                </label>


                                <select
                                    id="nakshatram"
                                    name="nakshatram"
                                    class="form-select
                                           form-select-lg"
                                >

                                    <option value="">
                                        Select Nakshatram
                                    </option>

                                    <option>Ashwini</option>
                                    <option>Bharani</option>
                                    <option>Krittika</option>
                                    <option>Rohini</option>
                                    <option>Mrigashira</option>
                                    <option>Ardra</option>
                                    <option>Punarvasu</option>
                                    <option>Pushya</option>
                                    <option>Ashlesha</option>
                                    <option>Magha</option>
                                    <option>Purva Phalguni</option>
                                    <option>Uttara Phalguni</option>

                                </select>

                            </div>


                            {{-- Gotram --}}

                            <div class="col-12 col-md-6">

                                <label
                                    for="gotram"
                                    class="form-label fw-semibold"
                                >
                                    Gotram
                                </label>


                                <input
                                    type="text"
                                    id="gotram"
                                    name="gotram"
                                    class="form-control
                                           form-control-lg"
                                    placeholder="Enter gotram"
                                >

                            </div>


                            {{-- Address --}}

                            <div class="col-12">

                                <label
                                    for="devoteeAddress"
                                    class="form-label fw-semibold"
                                >
                                    Address
                                </label>


                                <textarea
                                    id="devoteeAddress"
                                    name="devotee_address"
                                    rows="3"
                                    class="form-control"
                                    placeholder="Enter your address"
                                ></textarea>

                            </div>


                            {{-- Language --}}

                            <div class="col-12 col-md-6">

                                <label
                                    for="language"
                                    class="form-label fw-semibold"
                                >
                                    Preferred Language
                                </label>


                                <select
                                    id="language"
                                    name="language"
                                    class="form-select
                                           form-select-lg"
                                >

                                    <option value="">
                                        Select Language
                                    </option>

                                    <option>Telugu</option>
                                    <option>English</option>
                                    <option>Hindi</option>
                                    <option>Sanskrit</option>

                                </select>

                            </div>

                        </div>


                        {{-- Family Members --}}

                        <div
                            class="border-top
                                   border-warning-subtle
                                   mt-4
                                   pt-4"
                        >

                            <div
                                class="d-flex
                                       align-items-center
                                       justify-content-between
                                       mb-3"
                            >

                                <div>

                                    <h6
                                        class="fw-semibold
                                               text-pn-brown
                                               mb-1"
                                    >

                                        Family Members

                                    </h6>


                                    <small
                                        class="text-secondary"
                                    >

                                        Optionally include family members
                                        in the Sankalpam.

                                    </small>

                                </div>


                                <button
                                    type="button"
                                    class="btn
                                           btn-pn-outline
                                           btn-sm"
                                >

                                    <i class="bi bi-plus me-1"></i>

                                    Add Member

                                </button>

                            </div>


                            <div
                                class="alert
                                       alert-light
                                       border
                                       mb-0"
                            >

                                <i
                                    class="bi bi-info-circle
                                           text-pn-primary
                                           me-2"
                                ></i>

                                Additional family members can be added
                                during booking.

                            </div>

                        </div>

                    </div>

                </div>


                {{-- =================================================
                     SANKALPAM
                ================================================= --}}

                <div
                    class="card
                           border
                           border-warning-subtle
                           rounded-4
                           mb-4"
                >

                    <div class="card-body p-4 p-md-5">

                        <div class="mb-4">

                            <span
                                class="small
                                       text-pn-primary
                                       fw-semibold"
                            >
                                SANKALPAM
                            </span>


                            <h2
                                class="font-serif
                                       h3
                                       text-pn-brown
                                       mb-1"
                            >

                                Purpose of the Pooja

                            </h2>


                            <p
                                class="small
                                       text-secondary
                                       mb-0"
                            >

                                Select the primary purpose for which
                                the pooja is being performed.

                            </p>

                        </div>


                        <div
                            class="row
                                   row-cols-2
                                   row-cols-md-3
                                   g-2
                                   mb-4"
                        >

                            @foreach($purposes as $index => $purpose)

                                <div class="col">

                                    <input
                                        type="radio"
                                        class="btn-check"
                                        name="purpose"
                                        id="purpose{{ $index }}"
                                        value="{{ $purpose }}"
                                    >


                                    <label
                                        for="purpose{{ $index }}"
                                        class="btn
                                               btn-outline-secondary
                                               w-100
                                               py-3"
                                    >

                                        <i
                                            class="bi
                                                   {{
                                                        match($purpose) {
                                                            'Health' => 'bi-heart-pulse',
                                                            'Business' => 'bi-briefcase',
                                                            'Marriage' => 'bi-heart',
                                                            'Education' => 'bi-mortarboard',
                                                            'Birthday' => 'bi-cake2',
                                                            'Anniversary' => 'bi-calendar-heart',
                                                            default => 'bi-stars'
                                                        }
                                                   }}
                                                   d-block
                                                   mb-1"
                                        ></i>

                                        {{ $purpose }}

                                    </label>

                                </div>

                            @endforeach

                        </div>


                        {{-- Family names --}}

                        <div class="mb-3">

                            <label
                                for="familyNames"
                                class="form-label fw-semibold"
                            >
                                Family Names
                            </label>


                            <textarea
                                id="familyNames"
                                name="family_names"
                                rows="3"
                                class="form-control"
                                placeholder="Enter family names to be included in the Sankalpam"
                            ></textarea>

                        </div>


                        {{-- Special Instructions --}}

                        <div>

                            <label
                                for="specialInstructions"
                                class="form-label fw-semibold"
                            >
                                Special Instructions
                            </label>


                            <textarea
                                id="specialInstructions"
                                name="special_instructions"
                                rows="4"
                                class="form-control"
                                placeholder="Enter any special instructions or requests"
                            ></textarea>

                        </div>

                    </div>

                </div>


                {{-- =================================================
                     STEP 4 : ADD-ONS
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
                                       text-pn-primary"
                                style="width:46px;height:46px;"
                            >

                                <i
                                    class="bi bi-plus-circle fs-5"
                                ></i>

                            </div>


                            <div>

                                <span
                                    class="small
                                           text-pn-primary
                                           fw-semibold"
                                >
                                    STEP 4
                                </span>


                                <h2
                                    class="font-serif
                                           h3
                                           text-pn-brown
                                           mb-1"
                                >
                                    Add-on Services
                                </h2>


                                <p
                                    class="small
                                           text-secondary
                                           mb-0"
                                >
                                    Enhance your pooja with optional services.
                                </p>

                            </div>

                        </div>


                        <div class="row g-3">

                            @foreach($addons as $addon)

                                <div class="col-12 col-md-6">

                                    <input
                                        type="checkbox"
                                        class="btn-check addon-checkbox"
                                        name="addons[]"
                                        id="{{ $addon['id'] }}"
                                        value="{{ $addon['id'] }}"
                                    >


                                    <label
                                        for="{{ $addon['id'] }}"
                                        class="card
                                               border
                                               border-warning-subtle
                                               rounded-4
                                               p-3
                                               h-100"
                                    >

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
                                                       bg-pn-beige
                                                       text-pn-primary
                                                       flex-shrink-0"
                                                style="width:46px;height:46px;"
                                            >

                                                <i
                                                    class="bi {{ $addon['icon'] }}"
                                                ></i>

                                            </div>


                                            <div class="flex-grow-1">

                                                <div
                                                    class="d-flex
                                                           align-items-start
                                                           justify-content-between
                                                           gap-2"
                                                >

                                                    <h6
                                                        class="fw-semibold
                                                               text-pn-brown
                                                               mb-1"
                                                    >

                                                        {{ $addon['name'] }}

                                                    </h6>


                                                    <strong
                                                        class="small
                                                               text-pn-primary
                                                               text-nowrap"
                                                    >

                                                        +₹{{ number_format($addon['price']) }}

                                                    </strong>

                                                </div>


                                                <p
                                                    class="small
                                                           text-secondary
                                                           mb-0"
                                                >

                                                    {{ $addon['description'] }}

                                                </p>

                                            </div>

                                        </div>

                                    </label>

                                </div>

                            @endforeach

                        </div>

                    </div>

                </div>


                {{-- =================================================
                     CONTACT / NOTIFICATION PREFERENCE
                ================================================= --}}

                <div
                    class="card
                           border
                           border-warning-subtle
                           rounded-4
                           mb-4"
                >

                    <div class="card-body p-4 p-md-5">

                        <h3
                            class="font-serif
                                   h4
                                   text-pn-brown
                                   mb-3"
                        >

                            Booking Notifications

                        </h3>


                        <p
                            class="small
                                   text-secondary"
                        >

                            Booking confirmation and updates can be sent
                            through the available notification channels.

                        </p>


                        <div
                            class="row
                                   row-cols-2
                                   row-cols-md-4
                                   g-2"
                        >

                            @foreach([
                                ['name' => 'Email', 'icon' => 'bi-envelope'],
                                ['name' => 'SMS', 'icon' => 'bi-chat-text'],
                                ['name' => 'WhatsApp', 'icon' => 'bi-whatsapp'],
                                ['name' => 'Push', 'icon' => 'bi-bell']
                            ] as $notification)

                                <div class="col">

                                    <div
                                        class="border
                                               rounded-3
                                               p-3
                                               text-center"
                                    >

                                        <i
                                            class="bi {{ $notification['icon'] }}
                                                   text-pn-primary
                                                   fs-5"
                                        ></i>


                                        <small
                                            class="d-block
                                                   mt-1
                                                   fw-semibold"
                                        >

                                            {{ $notification['name'] }}

                                        </small>

                                    </div>

                                </div>

                            @endforeach

                        </div>

                    </div>

                </div>


                {{-- =================================================
                     PAYMENT
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
                                       text-pn-primary"
                                style="width:46px;height:46px;"
                            >

                                <i
                                    class="bi bi-credit-card fs-5"
                                ></i>

                            </div>


                            <div>

                                <span
                                    class="small
                                           text-pn-primary
                                           fw-semibold"
                                >
                                    STEP 5
                                </span>


                                <h2
                                    class="font-serif
                                           h3
                                           text-pn-brown
                                           mb-1"
                                >
                                    Review & Payment
                                </h2>


                                <p
                                    class="small
                                           text-secondary
                                           mb-0"
                                >
                                    Review your booking and select a
                                    secure payment method.
                                </p>

                            </div>

                        </div>


                        {{-- Payment methods --}}

                        <h6
                            class="fw-semibold
                                   text-pn-brown
                                   mb-3"
                        >
                            Select Payment Method
                        </h6>


                        <div class="row g-2 mb-4">

                            @foreach($paymentMethods as $index => $method)

                                <div class="col-12 col-sm-6">

                                    <input
                                        type="radio"
                                        class="btn-check"
                                        name="payment_method"
                                        id="payment{{ $method['id'] }}"
                                        value="{{ $method['id'] }}"
                                        {{ $index === 0 ? 'checked' : '' }}
                                    >


                                    <label
                                        for="payment{{ $method['id'] }}"
                                        class="btn
                                               btn-outline-secondary
                                               w-100
                                               text-start
                                               p-3"
                                    >

                                        <i
                                            class="bi {{ $method['icon'] }}
                                                   text-pn-primary
                                                   me-2"
                                        ></i>

                                        {{ $method['name'] }}

                                    </label>

                                </div>

                            @endforeach

                        </div>


                        {{-- Payment security notice --}}

                        <div
                            class="alert
                                   alert-light
                                   border
                                   mb-0"
                        >

                            <i
                                class="bi bi-shield-check
                                       text-pn-primary
                                       me-2"
                            ></i>

                            Secure payment processing. Your booking
                            will be confirmed after successful payment.

                        </div>

                    </div>

                </div>


                {{-- Terms --}}

                <div class="form-check mb-4">

                    <input
                        class="form-check-input"
                        type="checkbox"
                        id="bookingTerms"
                        required
                    >


                    <label
                        class="form-check-label
                               small
                               text-secondary"
                        for="bookingTerms"
                    >

                        I confirm that the booking information provided
                        is correct and agree to the applicable
                        Pooja Nilayam terms and policies.

                    </label>

                </div>


                {{-- Mobile payment CTA --}}

                <div class="d-lg-none">

                    <button
                        type="button"
                        class="btn
                               btn-pn
                               btn-lg
                               w-100"
                    >

                        Proceed to Payment

                        <i
                            class="bi bi-arrow-right ms-2"
                        ></i>

                    </button>

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

                    <div
                        class="card
                               border
                               border-warning-subtle
                               rounded-4
                               mb-3"
                    >

                        <div class="card-body p-4">

                            <h3
                                class="font-serif
                                       h4
                                       text-pn-brown
                                       mb-4"
                            >

                                Booking Summary

                            </h3>


                            {{-- Pooja --}}

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
                                    style="width:64px;height:64px;"
                                    alt="{{ $pooja['name'] }}"
                                >


                                <div>

                                    <h6
                                        class="fw-semibold
                                               text-pn-brown
                                               mb-1"
                                    >

                                        {{ $pooja['name'] }}

                                    </h6>


                                    <small
                                        class="text-secondary"
                                    >

                                        {{ $pooja['duration'] }}

                                    </small>

                                </div>

                            </div>


                            <hr
                                class="border-warning-subtle"
                            >


                            {{-- Date --}}

                            <div
                                class="d-flex
                                       justify-content-between
                                       gap-3
                                       mb-3"
                            >

                                <span class="small text-secondary">

                                    <i
                                        class="bi bi-calendar3
                                               text-pn-primary
                                               me-1"
                                    ></i>

                                    Date

                                </span>


                                <strong class="small text-end">

                                    11 Aug 2026

                                </strong>

                            </div>


                            {{-- Time --}}

                            <div
                                class="d-flex
                                       justify-content-between
                                       gap-3
                                       mb-3"
                            >

                                <span class="small text-secondary">

                                    <i
                                        class="bi bi-clock
                                               text-pn-primary
                                               me-1"
                                    ></i>

                                    Time

                                </span>


                                <strong class="small">

                                    07:00 AM

                                </strong>

                            </div>


                            {{-- Priest --}}

                            <div
                                class="d-flex
                                       justify-content-between
                                       gap-3
                                       mb-3"
                            >

                                <span class="small text-secondary">

                                    <i
                                        class="bi bi-person-check
                                               text-pn-primary
                                               me-1"
                                    ></i>

                                    Priest

                                </span>


                                <strong
                                    class="small
                                           text-end"
                                >

                                    No Preference

                                </strong>

                            </div>


                            {{-- Location --}}

                            <div
                                class="d-flex
                                       justify-content-between
                                       gap-3
                                       mb-3"
                            >

                                <span class="small text-secondary">

                                    <i
                                        class="bi bi-geo-alt
                                               text-pn-primary
                                               me-1"
                                    ></i>

                                    Location

                                </span>


                                <strong class="small">

                                    {{ $pooja['location'] }}

                                </strong>

                            </div>


                            <hr
                                class="border-warning-subtle"
                            >


                            {{-- Price --}}

                            <div
                                class="d-flex
                                       justify-content-between
                                       mb-2"
                            >

                                <span
                                    class="small
                                           text-secondary"
                                >
                                    Pooja Fee
                                </span>


                                <span class="small">

                                    ₹{{ number_format($pooja['base_price']) }}

                                </span>

                            </div>


                            <div
                                class="d-flex
                                       justify-content-between
                                       mb-2"
                            >

                                <span
                                    class="small
                                           text-secondary"
                                >
                                    Add-ons
                                </span>


                                <span class="small">

                                    ₹0

                                </span>

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
                                    Taxes / Charges
                                </span>


                                <span class="small">

                                    Calculated at checkout

                                </span>

                            </div>


                            <hr
                                class="border-warning-subtle"
                            >


                            <div
                                class="d-flex
                                       align-items-center
                                       justify-content-between"
                            >

                                <strong
                                    class="text-pn-brown"
                                >
                                    Total
                                </strong>


                                <strong
                                    class="fs-4
                                           font-serif
                                           text-pn-primary"
                                >

                                    ₹{{ number_format($pooja['base_price']) }}

                                </strong>

                            </div>

                        </div>

                    </div>


                    {{-- Payment Hold Information --}}

                    <div
                        class="card
                               border
                               border-warning-subtle
                               rounded-4
                               mb-3"
                    >

                        <div class="card-body p-4">

                            <div
                                class="d-flex
                                       gap-3"
                            >

                                <i
                                    class="bi bi-shield-lock
                                           text-pn-primary
                                           fs-4"
                                ></i>


                                <div>

                                    <h6
                                        class="fw-semibold
                                               text-pn-brown"
                                    >

                                        Payment Protection

                                    </h6>


                                    <p
                                        class="small
                                               text-secondary
                                               mb-0"
                                    >

                                        The project payment flow specifies
                                        that the platform holds the payment
                                        until the pooja is completed and
                                        applicable completion processing
                                        takes place.

                                    </p>

                                </div>

                            </div>

                        </div>

                    </div>


                    {{-- Notification Information --}}

                    <div
                        class="card
                               border
                               border-warning-subtle
                               rounded-4"
                    >

                        <div class="card-body p-4">

                            <h6
                                class="fw-semibold
                                       text-pn-brown
                                       mb-3"
                            >

                                After Booking

                            </h6>


                            <ul
                                class="list-unstyled
                                       small
                                       text-secondary
                                       mb-0"
                            >

                                <li class="d-flex gap-2 mb-2">

                                    <i
                                        class="bi bi-check-circle-fill
                                               text-pn-primary"
                                    ></i>

                                    Booking confirmation

                                </li>


                                <li class="d-flex gap-2 mb-2">

                                    <i
                                        class="bi bi-check-circle-fill
                                               text-pn-primary"
                                    ></i>

                                    Booking ID & Reference ID

                                </li>


                                <li class="d-flex gap-2 mb-2">

                                    <i
                                        class="bi bi-check-circle-fill
                                               text-pn-primary"
                                    ></i>

                                    Email / SMS / WhatsApp notification

                                </li>


                                <li class="d-flex gap-2">

                                    <i
                                        class="bi bi-check-circle-fill
                                               text-pn-primary"
                                    ></i>

                                    Calendar / meeting information where applicable

                                </li>

                            </ul>

                        </div>

                    </div>


                    {{-- Desktop CTA --}}

                    <div class="d-none d-lg-block mt-3">

                        <button
                            type="button"
                            class="btn
                                   btn-pn
                                   btn-lg
                                   w-100"
                        >

                            Proceed to Payment

                            <i
                                class="bi bi-arrow-right ms-2"
                            ></i>

                        </button>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- ============================================================
     BOOKING INFORMATION
============================================================ --}}

<section class="bg-pn-cream py-5">

    <div class="container">

        <div class="row g-4">

            <div class="col-12 col-md-4">

                <div
                    class="text-center"
                >

                    <div
                        class="mx-auto
                               rounded-circle
                               d-flex
                               align-items-center
                               justify-content-center
                               bg-white
                               text-pn-primary
                               fs-4
                               mb-3"
                        style="width:58px;height:58px;"
                    >

                        <i class="bi bi-shield-check"></i>

                    </div>


                    <h6
                        class="fw-semibold
                               text-pn-brown"
                    >

                        Secure Booking

                    </h6>


                    <p
                        class="small
                               text-secondary
                               mb-0"
                    >

                        Your booking information is handled through
                        a secure booking process.

                    </p>

                </div>

            </div>


            <div class="col-12 col-md-4">

                <div
                    class="text-center"
                >

                    <div
                        class="mx-auto
                               rounded-circle
                               d-flex
                               align-items-center
                               justify-content-center
                               bg-white
                               text-pn-primary
                               fs-4
                               mb-3"
                        style="width:58px;height:58px;"
                    >

                        <i class="bi bi-bell"></i>

                    </div>


                    <h6
                        class="fw-semibold
                               text-pn-brown"
                    >

                        Booking Notifications

                    </h6>


                    <p
                        class="small
                               text-secondary
                               mb-0"
                    >

                        Confirmation and applicable updates are
                        communicated through supported channels.

                    </p>

                </div>

            </div>


            <div class="col-12 col-md-4">

                <div
                    class="text-center"
                >

                    <div
                        class="mx-auto
                               rounded-circle
                               d-flex
                               align-items-center
                               justify-content-center
                               bg-white
                               text-pn-primary
                               fs-4
                               mb-3"
                        style="width:58px;height:58px;"
                    >

                        <i class="bi bi-person-check"></i>

                    </div>


                    <h6
                        class="fw-semibold
                               text-pn-brown"
                    >

                        Trusted Priests

                    </h6>


                    <p
                        class="small
                               text-secondary
                               mb-0"
                    >

                        Select a preferred priest where priest
                        selection is available.

                    </p>

                </div>

            </div>

        </div>

    </div>

</section>

@endsection