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
    $poojaImage = $pooja->media()->where('is_active', true)->orderByDesc('is_featured')->orderBy('sort_order')->value('file_path');
    $poojaData = [
        'name' => $pooja->name,
        'image' => $poojaImage,
        'category' => $poojaCategory,
        'duration' => $pooja->duration_minutes ? $pooja->duration_minutes . ' Mins' : 'Duration not specified',
        'base_price' => $selectedTemplePooja?->pricing->where('is_active', true)->sortByDesc('is_default')->first()?->amount ?? 0,
        'location' => $selectedTemplePooja?->temple?->name ?? 'Select a temple',
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
        return ['value' => $d->toDateString(), 'day' => $d->format('d'), 'weekday' => strtoupper($d->format('D')), 'month' => strtoupper($d->format('M'))];
    });
    $selectedDate = ($date ?? today())->toDateString();
    $slotsByPeriod = collect($slots ?? [])->groupBy(function ($slot) {
        $hour = (int) substr($slot->start_time, 0, 2);
        return $hour < 12 ? 'Morning' : ($hour < 17 ? 'Afternoon' : 'Evening');
    });
    $purposes = ['Health', 'Business', 'Marriage', 'Education', 'Birthday', 'Anniversary'];
    $addonOptions = collect($extras ?? [])->flatMap(function ($extra) {
        return $extra->options->map(function ($option) use ($extra) {
            return ['id' => $option->id, 'extra_id' => $extra->id, 'icon' => 'bi-plus-circle', 'name' => $option->name, 'description' => $option->description, 'price' => (float) $option->price];
        });
    })->values();
    $defaultCurrency = $selectedTemplePooja?->pricing->where('is_active', true)->sortByDesc('is_default')->first()?->currency;
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
                        src="{{ $poojaData['image'] ? asset($poojaData['image']) : Vite::asset('resources/images/home/ganapathi.jpg') }}"
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
                <form id="bookingForm" method="POST" action="{{ route('pooja.book.store', ['slug' => $pooja->slug]) }}" data-slug="{{ $pooja->slug }}" data-booking-base="{{ url('/') }}" data-base-amount="{{ (float) $poojaData['base_price'] }}" data-currency-symbol="{{ $defaultCurrency?->symbol ?? '₹' }}">
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
                                <option value="{{ $templePooja->id }}" data-currency="{{ $templePooja->pricing->where('is_active', true)->sortByDesc('is_default')->first()?->currency?->code }}" {{ $selectedTemplePooja?->id === $templePooja->id ? 'selected' : '' }}>
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
                            class="btn
                                   btn-pn-outline
                                   btn-sm
                                   mb-4"
                        >

                            <i class="bi bi-calendar3 me-2"></i>

                            Open Calendar

                        </button>


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
                                    src="{{ $poojaData['image'] ? asset($poojaData['image']) : Vite::asset('resources/images/home/ganapathi.jpg') }}"
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

@endsection