
@extends('layouts.app')

@section('title', 'Book Pooja | Pooja Nilayam')

@section(
    'meta_description',
    'Book your preferred pooja, select date and time, choose a priest, enter Sankalpam details, add services and securely complete your booking with Pooja Nilayam.'
)

@section('content')

@php
    $customer = auth()->user();
    $poojaCategory = $pooja->category?->name ?? 'Pooja';

    /*
     * Resolve the image using the same path conventions as
     * PoojaController, without changing the booking workflow.
     */
    $poojaImageUrl = null;

    $poojaMedia = $pooja->media
        ->where('is_active', true)
        ->sortBy('sort_order')
        ->sortByDesc('is_featured');

    foreach ($poojaMedia as $media) {
        $storedPath = trim(
            str_replace('\\', '/', (string) $media->file_path)
        );

        if ($storedPath === '') {
            continue;
        }

        // Remove the domain from absolute URLs.
        $storedPath = preg_replace(
            '#^https?://[^/]+/#i',
            '',
            $storedPath
        ) ?? $storedPath;

        $storedPath = ltrim($storedPath, '/');

        // Remove a public directory prefix.
        $storedPath = preg_replace(
            '#^(?:public/)+#',
            '',
            $storedPath
        ) ?? $storedPath;

        // Normalize the path to the public pooja images directory.
        if (str_starts_with($storedPath, 'images/poojas/')) {
            $relativePath = $storedPath;
        } elseif (str_starts_with($storedPath, 'poojas/')) {
            $relativePath = 'images/' . $storedPath;
        } else {
            $relativePath = 'images/poojas/' . basename($storedPath);
        }

        // Select the first active image that exists on the server.
        if (is_file(public_path($relativePath))) {
            $poojaImageUrl = asset($relativePath);
            break;
        }
    }

    // Use the same fallback configured in PoojaController.
    if ($poojaImageUrl === null) {
        $fallbackImage = 'images/poojas/pooja_6_primary_1792339607.jpg';

        if (is_file(public_path($fallbackImage))) {
            $poojaImageUrl = asset($fallbackImage);
        }
    }

    $poojaData = [
        'name' => $pooja->name,
        'image' => $poojaImageUrl,
        'category' => $poojaCategory,
        'duration' => $pooja->duration_minutes
            ? $pooja->duration_minutes . ' Mins'
            : 'Duration not specified',
        'base_price' => $selectedTemplePooja?->pricing
            ->where('is_active', true)
            ->sortByDesc('is_default')
            ->first()?->amount ?? 0,
        'location' => $selectedTemplePooja?->temple?->name
            ?? 'Select a temple',
    ];

    $steps = [
        ['number' => 1, 'title' => 'Date & Time', 'icon' => 'bi-calendar-check'],
        ['number' => 2, 'title' => 'Priest', 'icon' => 'bi-person-check'],
        ['number' => 3, 'title' => 'Devotee Details', 'icon' => 'bi-person-vcard'],
        ['number' => 4, 'title' => 'Extras', 'icon' => 'bi-plus-circle'],
        ['number' => 5, 'title' => 'Review & Payment', 'icon' => 'bi-credit-card'],
    ];

    $dates = collect(range(0, 13))->map(function ($offset) {
        $d = today()->addDays($offset);

        return [
            'value' => $d->toDateString(),
            'day' => $d->format('d'),
            'weekday' => strtoupper($d->format('D')),
            'month' => strtoupper($d->format('M')),
        ];
    });

    $selectedDate = ($date ?? today())->toDateString();

    $slotsByPeriod = collect($slots ?? [])->groupBy(function ($slot) {
        $hour = (int) substr($slot->start_time, 0, 2);

        return $hour < 12
            ? 'Morning'
            : ($hour < 17 ? 'Afternoon' : 'Evening');
    });

    $purposes = [
        'Health',
        'Business',
        'Marriage',
        'Education',
        'Birthday',
        'Anniversary',
    ];

    $addonOptions = collect($extras ?? [])
        ->flatMap(function ($extra) {
            return $extra->options->map(function ($option) use ($extra) {
                return [
                    'id' => $option->id,
                    'extra_id' => $extra->id,
                    'icon' => 'bi-plus-circle',
                    'name' => $option->name,
                    'description' => $option->description,
                    'price' => (float) $option->price,
                ];
            });
        })
        ->values();

    $defaultCurrency = $selectedTemplePooja?->pricing
        ->where('is_active', true)
        ->sortByDesc('is_default')
        ->first()?->currency;

    $paymentMethods = [
        ['id' => 'upi', 'name' => 'UPI', 'icon' => 'bi-phone'],
        ['id' => 'cards', 'name' => 'Cards', 'icon' => 'bi-credit-card'],
        ['id' => 'netbanking', 'name' => 'Net Banking', 'icon' => 'bi-bank'],
        ['id' => 'wallet', 'name' => 'Wallet', 'icon' => 'bi-wallet2'],
        ['id' => 'international', 'name' => 'International Cards', 'icon' => 'bi-globe'],
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
                        href="{{ route('pooja.index') }}"
                        class="text-pn-primary"
                    >
                        Poojas
                    </a>

                </li>

                <li class="breadcrumb-item">

                    <a
                        href="{{ route('pooja.show', ['slug' => Str::slug($poojaData['name'])]) }}"
                        class="text-pn-primary"
                    >
                        {{ $poojaData['name'] }}
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
                        src="{{ $poojaData['image'] ?? Vite::asset('resources/images/home/ganapathi.jpg') }}"
                        class="rounded-3
                               object-fit-cover"
                        style="width:72px;height:72px;"
                        alt="{{ $poojaData['name'] }}"
                    >


                    <div>

                        <span
                            class="small
                                   text-pn-primary
                                   fw-semibold"
                        >
                            {{ $poojaData['category'] }}
                        </span>


                        <h1
                            class="font-serif
                                   text-pn-brown
                                   h3
                                   mb-1"
                        >
                            Book {{ $poojaData['name'] }}
                        </h1>


                        <div
                            class="small
                                   text-secondary"
                        >

                            <i class="bi bi-clock me-1"></i>

                            {{ $poojaData['duration'] }}

                            <span class="mx-2">•</span>

                            <i class="bi bi-geo-alt me-1"></i>

                            {{ $poojaData['location'] }}

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
                    ₹{{ number_format($poojaData['base_price']) }}
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
                <form id="bookingForm" method="POST" action="{{ route('pooja.book.store', ['slug' => $pooja->slug]) }}" data-slug="{{ $pooja->slug }}" data-booking-base="{{ url('/') }}" data-slots-url="{{ route('pooja.book.slots', ['slug' => $pooja->slug]) }}" data-pujaris-url="{{ route('pooja.book.pujaris', ['slug' => $pooja->slug]) }}" data-base-amount="{{ (float) $poojaData['base_price'] }}" data-currency-symbol="{{ $defaultCurrency?->symbol ?? '₹' }}">
                    @csrf
                    @if(session('error'))<div class="alert alert-danger">{{ session('error') }}</div>@endif
                    @if($errors->any())<div class="alert alert-danger"><strong>Please correct the following:</strong><ul class="mb-0 mt-2">@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>@endif


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

                        <h6 class="fw-semibold text-pn-brown mb-3">Select Temple</h6>
                        <select class="form-select form-select-lg mb-4" name="temple_pooja_id" id="templePoojaId" required>
                            <option value="">Select Temple</option>
                            @foreach($templePoojas as $templePooja)
                                @php($templeDefaultPricing = $templePooja->pricing->where('is_active', true)->sortByDesc('is_default')->first())
                                <option value="{{ $templePooja->id }}" data-currency="{{ $templeDefaultPricing?->currency?->code }}" data-symbol="{{ $templeDefaultPricing?->currency?->symbol ?? '₹' }}" data-amount="{{ $templeDefaultPricing ? max(0, (float) $templeDefaultPricing->amount - (float) $templeDefaultPricing->discount_amount) : 0 }}" {{ $selectedTemplePooja?->id === $templePooja->id ? 'selected' : '' }}>
                                    {{ $templePooja->temple?->name }}
                                </option>
                            @endforeach
                        </select>

                        <h6 class="fw-semibold text-pn-brown mb-3">Select Date</h6>
                        <div class="row row-cols-3 row-cols-sm-4 row-cols-md-7 g-2 mb-4">
                            @foreach($dates as $index => $dateOption)
                                <div class="col">
                                    <input type="radio" class="btn-check booking-date" name="booking_date" id="date{{ $index }}" value="{{ $dateOption['value'] }}" {{ $dateOption['value'] === $selectedDate ? 'checked' : '' }}>
                                    <label for="date{{ $index }}" class="btn btn-outline-secondary w-100 py-3">
                                        <small class="d-block text-uppercase">{{ $dateOption['weekday'] }}</small>
                                        <strong class="d-block fs-4">{{ $dateOption['day'] }}</strong>
                                        <small>{{ $dateOption['month'] }}</small>
                                    </label>
                                </div>
                            @endforeach
                        </div>

                        {{-- Calendar button --}}

                        <button
                            type="button"
                            id="openBookingCalendar"
                            class="btn btn-pn-outline btn-sm mb-4"
                        >
                            <i class="bi bi-calendar3 me-2"></i>
                            Open Calendar
                        </button>
                        <input type="date" id="bookingCalendarInput" class="form-control mb-4 d-none" min="{{ today()->toDateString() }}" value="{{ $selectedDate }}" aria-label="Choose booking date">


                        {{-- Time --}}

                        <h6 class="fw-semibold text-pn-brown mb-3">Available Time Slots</h6>
                        @foreach(['Morning', 'Afternoon', 'Evening'] as $period)
                            <div class="mb-4">
                                <div class="d-flex align-items-center gap-2 mb-2">
                                    <i class="bi {{ $period === 'Morning' ? 'bi-sunrise' : ($period === 'Afternoon' ? 'bi-sun' : 'bi-sunset') }} text-pn-primary"></i>
                                    <span class="small fw-semibold text-pn-brown">{{ $period }}</span>
                                </div>
                                <div class="d-flex flex-wrap gap-2 booking-slots" data-period="{{ $period }}">
                                    @forelse($slotsByPeriod->get($period, collect()) as $slot)
                                        <div>
                                            <input type="radio" class="btn-check booking-slot" name="booking_slot_id" id="slot{{ $slot->id }}" value="{{ $slot->id }}" data-start="{{ $slot->start_time }}" data-end="{{ $slot->end_time }}">
                                            <label for="slot{{ $slot->id }}" class="btn btn-outline-secondary">{{ \Carbon\Carbon::parse($slot->start_time)->format('h:i A') }}</label>
                                        </div>
                                    @empty
                                        <div class="small text-secondary slot-empty">No available slots for this period.</div>
                                    @endforelse
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

                            <div id="pujariOptions">
                            @forelse($pujaris as $priest)
                                <div>
                                    <input type="radio" class="btn-check pujari-option" name="pujari_profile_id" id="priest{{ $priest->id }}" value="{{ $priest->id }}">
                                    <label for="priest{{ $priest->id }}" class="card border border-warning-subtle rounded-4 p-3 w-100">
                                        <div class="d-flex flex-column flex-sm-row align-items-start gap-3">
                                            <div class="rounded-circle d-flex align-items-center justify-content-center bg-pn-beige text-pn-primary flex-shrink-0" style="width:72px;height:72px;"><i class="bi bi-person fs-3"></i></div>
                                            <div class="flex-grow-1">
                                                <div class="d-flex flex-wrap align-items-center gap-2"><h5 class="font-serif text-pn-brown mb-0">{{ $priest->display_name }}</h5><span class="badge rounded-pill bg-pn-beige text-pn-primary">Verified</span></div>
                                                <div class="small text-secondary mt-1">{{ $priest->experience_years ? $priest->experience_years . '+ Years' : 'Experience not specified' }}</div>
                                                @if($priest->bio)<div class="small text-secondary mt-2">{{ \Illuminate\Support\Str::limit($priest->bio, 140) }}</div>@endif
                                            </div>
                                        </div>
                                    </label>
                                </div>
                            @empty
                                <div class="alert alert-light border mb-0">No approved priests are currently assigned to the selected temple. You can continue with <strong>No Preference</strong>.</div>
                            @endforelse
                            </div>

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
                                    value="{{ old('devotee_name', $customer->name ?? '') }}"
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
                                    value="{{ old('devotee_phone', $customer->mobile ?? '') }}"
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
                                    value="{{ old('devotee_email', $customer->email ?? '') }}"
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
                                    name="sankalpam[nakshatram]"
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
                                    name="sankalpam[gotram]"
                                    class="form-control
                                           form-control-lg"
                                    placeholder="Enter gotram"
                                >

                            </div>


                            {{-- Address --}}

                            <div class="col-12">
                                <label for="bookingAddress" class="form-label fw-semibold">Booking Address</label>
                                <select id="bookingAddress" name="address_id" class="form-select form-select-lg">
                                    <option value="">No address selected</option>
                                    @foreach($addresses as $address)
                                        <option value="{{ $address->id }}" {{ $address->is_default ? 'selected' : '' }}>
                                            {{ $address->name ?: $address->address_line_1 }} — {{ $address->postal_code }}
                                        </option>
                                    @endforeach
                                </select>
                                <small class="text-secondary d-block mt-2">Select a saved address from your Address Book.</small>
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
                                    name="sankalpam[language_id]"
                                    class="form-select
                                           form-select-lg"
                                >

                                    <option value="">Select Language</option>
                                    @foreach($languages as $language)
                                        <option value="{{ $language->id }}">{{ $language->native_name ?: $language->name }}</option>
                                    @endforeach

                                </select>

                            </div>

                        </div>


                        {{-- Family Members --}}

                        <div class="border-top border-warning-subtle mt-4 pt-4">
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <div><h6 class="fw-semibold text-pn-brown mb-1">Family Members</h6><small class="text-secondary">Optionally include saved family members in the Sankalpam.</small></div>
                            </div>
                            <div class="row g-2">
                                @forelse($familyMembers as $memberIndex => $member)
                                    <div class="col-12 col-md-6">
                                        <input class="btn-check family-member" type="checkbox" id="family{{ $member->id }}" name="sankalpam[members][{{ $memberIndex }}][family_member_id]" value="{{ $member->id }}">
                                        <label for="family{{ $member->id }}" class="btn btn-outline-secondary w-100 text-start">{{ trim($member->first_name . ' ' . $member->last_name) }} @if($member->relation?->name)<small class="d-block text-secondary">{{ $member->relation->name }}</small>@endif</label>
                                        <input type="hidden" class="family-member-dependent" name="sankalpam[members][{{ $memberIndex }}][name]" value="{{ trim($member->first_name . ' ' . $member->last_name) }}" disabled>
                                        <input type="hidden" class="family-member-dependent" name="sankalpam[members][{{ $memberIndex }}][relationship]" value="{{ $member->relation?->name ?? '' }}" disabled>
                                    </div>
                                @empty
                                    <div class="col-12"><div class="alert alert-light border mb-0">No saved family members found. Add them from your dashboard if needed.</div></div>
                                @endforelse
                            </div>
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
                                        name="sankalpam[purpose_type]"
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
                                Purpose Details
                            </label>


                            <textarea
                                id="familyNames"
                                name="sankalpam[purpose_details]"
                                rows="3"
                                class="form-control"
                                placeholder="Enter additional details for the selected Sankalpam purpose"
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
                                name="sankalpam[special_instructions]"
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

                            @foreach($addonOptions as $addonIndex => $addon)
                                <div class="col-12 col-md-6">
                                    <input type="checkbox" class="btn-check addon-checkbox" name="extras[{{ $addonIndex }}][pooja_extra_option_id]" id="addon{{ $addon['id'] }}" value="{{ $addon['id'] }}" data-price="{{ $addon['price'] }}">
                                    <label for="addon{{ $addon['id'] }}" class="card border border-warning-subtle rounded-4 p-3 h-100">
                                        <div class="d-flex align-items-start gap-3">
                                            <div class="rounded-circle d-flex align-items-center justify-content-center bg-pn-beige text-pn-primary flex-shrink-0" style="width:46px;height:46px;"><i class="bi {{ $addon['icon'] }}"></i></div>
                                            <div class="flex-grow-1"><div class="d-flex align-items-start justify-content-between gap-2"><h6 class="fw-semibold text-pn-brown mb-1">{{ $addon['name'] }}</h6><strong class="small text-pn-primary text-nowrap">+{{ $defaultCurrency?->symbol ?? '₹' }}{{ number_format($addon['price'], 2) }}</strong></div><p class="small text-secondary mb-0">{{ $addon['description'] }}</p></div>
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
                                        disabled
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


                <input type="hidden" name="currency_code" id="currencyCode" value="{{ $defaultCurrency?->code }}">
                <input type="hidden" name="customer_notes" id="customerNotes" value="">

                {{-- Terms --}}

                <div class="form-check mb-4">

                    <input
                        class="form-check-input"
                        type="checkbox"
                        id="bookingTerms"
                        name="booking_terms"
                        value="1"
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
                        type="submit"
                        class="btn
                               btn-pn
                               btn-lg
                               w-100"
                    >

                        Create Booking

                        <i
                            class="bi bi-arrow-right ms-2"
                        ></i>

                    </button>

                </div>

            </div>


                </form>

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
                                    src="{{ $poojaData['image'] ?? Vite::asset('resources/images/home/ganapathi.jpg') }}"
                                    class="rounded-3
                                           object-fit-cover"
                                    style="width:64px;height:64px;"
                                    alt="{{ $poojaData['name'] }}"
                                >


                                <div>

                                    <h6
                                        class="fw-semibold
                                               text-pn-brown
                                               mb-1"
                                    >

                                        {{ $poojaData['name'] }}

                                    </h6>


                                    <small
                                        class="text-secondary"
                                    >

                                        {{ $poojaData['duration'] }}

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


                                <strong class="small text-end" id="summaryDate">{{ \Carbon\Carbon::parse($selectedDate)->format('d M Y') }}</strong>

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


                                <strong class="small" id="summaryTime">--</strong>

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


                                <strong class="small text-end" id="summaryPriest">No Preference</strong>

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

                                    {{ $poojaData['location'] }}

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


                                <span class="small" id="summaryPoojaFee">{{ $defaultCurrency?->symbol ?? '₹' }}{{ number_format((float) $poojaData['base_price'], 2) }}</span>

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


                                <span class="small" id="summaryAddons">{{ $defaultCurrency?->symbol ?? '₹' }}0.00</span>

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


                                <strong class="fs-4 font-serif text-pn-primary" id="summaryTotal">{{ $defaultCurrency?->symbol ?? '₹' }}{{ number_format((float) $poojaData['base_price'], 2) }}</strong>

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
                            type="submit"
                            form="bookingForm"
                            class="btn
                                   btn-pn
                                   btn-lg
                                   w-100"
                        >

                            Create Booking

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



@push('scripts')
<script>
(function () {
    'use strict';

    const form = document.getElementById('bookingForm');
    if (!form || form.dataset.bookingIntegrationReady === '1') return;
    form.dataset.bookingIntegrationReady = '1';

    const templeSelect = document.getElementById('templePoojaId');
    const calendarButton = document.getElementById('openBookingCalendar');
    const calendarInput = document.getElementById('bookingCalendarInput');
    const currencyInput = document.getElementById('currencyCode');
    const slotContainers = Array.from(document.querySelectorAll('.booking-slots'));
    const summaryDate = document.getElementById('summaryDate');
    const summaryTime = document.getElementById('summaryTime');
    const summaryPriest = document.getElementById('summaryPriest');
    const currencySymbol = () => templeSelect?.selectedOptions[0]?.dataset.symbol || form.dataset.currencySymbol || '₹';
    const money = (value) => currencySymbol() + Number(value || 0).toLocaleString('en-IN', {minimumFractionDigits: 2, maximumFractionDigits: 2});
    const selectedDate = () => document.querySelector('input[name="booking_date"]:checked')?.value || calendarInput?.value || '';

    function periodFor(time) {
        const hour = Number(String(time || '00:00').split(':')[0]);
        return hour < 12 ? 'Morning' : (hour < 17 ? 'Afternoon' : 'Evening');
    }

    function updateDateSummary(date) {
        if (summaryDate && date) {
            const parsed = new Date(date + 'T00:00:00');
            summaryDate.textContent = parsed.toLocaleDateString('en-GB', {day:'2-digit', month:'short', year:'numeric'});
        }
        if (calendarInput && date) calendarInput.value = date;
    }

    function clearSlots(message) {
        slotContainers.forEach(container => {
            container.innerHTML = '<div class="small text-secondary slot-empty">' + message + '</div>';
        });
        if (summaryTime) summaryTime.textContent = '--';
    }

    function renderSlots(slots) {
        slotContainers.forEach(container => {
            const period = container.dataset.period;
            const matching = slots.filter(slot => periodFor(slot.start_time) === period);
            if (!matching.length) {
                container.innerHTML = '<div class="small text-secondary slot-empty">No available slots for this period.</div>';
                return;
            }
            container.innerHTML = matching.map(slot => {
                const id = 'slot' + slot.id;
                const time = new Date('2000-01-01T' + slot.start_time).toLocaleTimeString('en-IN', {hour:'2-digit', minute:'2-digit', hour12:true});
                return '<div><input type="radio" class="btn-check booking-slot" name="booking_slot_id" id="' + id + '" value="' + Number(slot.id) + '" data-start="' + slot.start_time + '" data-end="' + slot.end_time + '" required><label for="' + id + '" class="btn btn-outline-secondary">' + time + '</label></div>';
            }).join('');
        });
    }

    async function refreshSlots() {
        const templeId = templeSelect?.value;
        const date = selectedDate();
        if (!templeId || !date) {
            clearSlots('Select a temple and date to view available slots.');
            return;
        }
        clearSlots('Checking available slots…');
        try {
            const url = new URL(form.dataset.slotsUrl, window.location.origin);
            url.searchParams.set('temple_pooja_id', templeId);
            url.searchParams.set('date', date);
            const response = await fetch(url.toString(), {headers:{'Accept':'application/json','X-Requested-With':'XMLHttpRequest'}});
            if (!response.ok) throw new Error('Unable to load slots. Please try again.');
            const payload = await response.json();
            renderSlots(Array.isArray(payload.slots) ? payload.slots : []);
        } catch (error) {
            clearSlots('Could not load slots. Please refresh or try another date.');
        }
    }

    async function refreshPujaris() {
        const templeId = templeSelect?.value;
        const container = document.getElementById('pujariOptions');
        if (!container || !templeId) {
            if (container) container.innerHTML = '<p class="small text-secondary">Select a temple to view available priests.</p>';
            if (summaryPriest) summaryPriest.textContent = 'No Preference';
            return;
        }
        container.innerHTML = '<p class="small text-secondary">Loading available priests…</p>';
        try {
            const url = new URL(form.dataset.pujarisUrl, window.location.origin);
            url.searchParams.set('temple_pooja_id', templeId);
            const response = await fetch(url.toString(), {headers:{'Accept':'application/json','X-Requested-With':'XMLHttpRequest'}});
            if (!response.ok) throw new Error('Unable to load priests.');
            const payload = await response.json();
            const priests = Array.isArray(payload.pujaris) ? payload.pujaris : [];
            if (!priests.length) {
                container.innerHTML = '<p class="small text-secondary">No approved priests are currently listed for this temple. You can continue without selecting a priest.</p>';
                if (summaryPriest) summaryPriest.textContent = 'No Preference';
                return;
            }
            container.innerHTML = '<div class="row g-3">' + priests.map(priest => {
                const id = 'priest' + Number(priest.id);
                const experience = priest.experience_years ? Number(priest.experience_years) + '+ years experience' : 'Experience not specified';
                return '<div class="col-12 col-md-6"><input type="radio" class="btn-check pujari-option" name="pujari_profile_id" id="' + id + '" value="' + Number(priest.id) + '"><label class="card p-3 h-100" for="' + id + '"><strong>' + escapeHtml(priest.display_name || 'Priest') + '</strong><span class="small text-secondary">' + escapeHtml(experience) + '</span>' + (priest.bio ? '<span class="small mt-2">' + escapeHtml(priest.bio) + '</span>' : '') + '</label></div>';
            }).join('') + '</div>';
        } catch (error) {
            container.innerHTML = '<p class="small text-danger">Unable to load priests. You may continue without selecting a priest.</p>';
        }
    }

    function escapeHtml(value) {
        return String(value).replace(/[&<>"']/g, character => ({'&':'&amp;','<':'&lt;','>':'&gt;','"':'&quot;',"'":'&#039;'}[character]));
    }

    function updatePriceSummary() {
        const option = templeSelect?.selectedOptions[0];
        if (option && currencyInput) currencyInput.value = option.dataset.currency || '';
        const amount = Number(option?.dataset.amount ?? form.dataset.baseAmount ?? 0);
        const addonTotal = Array.from(document.querySelectorAll('.addon-checkbox:checked')).reduce((total, checkbox) => total + Number(checkbox.dataset.price || 0), 0);
        const fee = document.getElementById('summaryPoojaFee');
        const addons = document.getElementById('summaryAddons');
        const total = document.getElementById('summaryTotal');
        if (fee) fee.textContent = money(amount);
        if (addons) addons.textContent = money(addonTotal);
        if (total) total.textContent = money(amount + addonTotal);
    }

    document.addEventListener('change', function (event) {
        if (event.target.matches('.booking-date')) {
            updateDateSummary(event.target.value);
            refreshSlots();
        }
        if (event.target.matches('.booking-slot')) {
            const label = event.target.dataset.start ? new Date('2000-01-01T' + event.target.dataset.start).toLocaleTimeString('en-IN', {hour:'2-digit', minute:'2-digit', hour12:true}) : '--';
            if (summaryTime) summaryTime.textContent = label;
        }
        if (event.target.matches('.pujari-option')) {
            const label = document.querySelector('label[for="' + event.target.id + '"] strong');
            if (summaryPriest) summaryPriest.textContent = label?.textContent || 'No Preference';
        }
        if (event.target.matches('.addon-checkbox')) updatePriceSummary();
    });

    templeSelect?.addEventListener('change', function () {
        updatePriceSummary();
        refreshSlots();
        refreshPujaris();
    });

    calendarButton?.addEventListener('click', function () {
        if (!calendarInput) return;
        calendarInput.classList.remove('d-none');
        calendarInput.focus();
        if (typeof calendarInput.showPicker === 'function') calendarInput.showPicker();
    });

    calendarInput?.addEventListener('change', function () {
        if (!this.value) return;
        let radio = Array.from(document.querySelectorAll('.booking-date')).find(item => item.value === this.value);
        if (radio) radio.checked = true;
        else {
            document.querySelectorAll('.booking-date').forEach(item => item.checked = false);
            const dateWrap = document.querySelector('.booking-date')?.closest('.row');
            if (dateWrap) {
                const existing = document.getElementById('customBookingDateWrap');
                if (existing) existing.remove();
                const wrap = document.createElement('div');
                wrap.id = 'customBookingDateWrap';
                wrap.className = 'col';
                const date = new Date(this.value + 'T00:00:00');
                const id = 'customBookingDate';
                wrap.innerHTML = '<input type="radio" class="btn-check booking-date" name="booking_date" id="' + id + '" value="' + this.value + '" checked><label for="' + id + '" class="btn btn-outline-secondary w-100 py-3"><small class="d-block text-uppercase">' + date.toLocaleDateString('en-US',{weekday:'short'}).toUpperCase() + '</small><strong class="d-block fs-4">' + date.getDate() + '</strong><small>' + date.toLocaleDateString('en-US',{month:'short'}).toUpperCase() + '</small></label>';
                dateWrap.appendChild(wrap);
            }
        }
        updateDateSummary(this.value);
        refreshSlots();
    });

    form.addEventListener('submit', function (event) {
        if (!templeSelect?.value) {
            event.preventDefault();
            alert('Please select a temple before continuing.');
            templeSelect?.focus();
            return;
        }
        if (!selectedDate()) {
            event.preventDefault();
            alert('Please select a booking date.');
            return;
        }
        if (!form.querySelector('input[name="booking_slot_id"]:checked')) {
            event.preventDefault();
            alert('Please select an available time slot.');
        }
    });

    updateDateSummary(selectedDate());
    updatePriceSummary();
    if (templeSelect?.value) {
        refreshSlots();
        refreshPujaris();
    } else {
        clearSlots('Select a temple and date to view available slots.');
    }
})();
</script>
@endpush

@endsection