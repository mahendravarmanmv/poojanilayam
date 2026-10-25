@extends('layouts.app')

@section('title', 'Book ' . $pooja->name . ' | Pooja Nilayam')
@section('meta_description', 'Book your preferred pooja, select date and time, choose a priest, enter Sankalpam details, add services and securely complete your booking with Pooja Nilayam.')

@section('content')

@php
    $customer = auth()->user();
    $customerProfile = $customer->customerProfile ?? null;

    $poojaCategory = $pooja->category?->name ?? 'Pooja';

    // 1. Resolve Pooja Image
    $poojaImageUrl = null;
    if ($pooja->relationLoaded('media') && $pooja->media) {
        $poojaMedia = $pooja->media
            ->where('is_active', true)
            ->sortBy('sort_order')
            ->sortByDesc('is_featured');

        foreach ($poojaMedia as $media) {
            $storedPath = trim(str_replace('\\', '/', (string) $media->file_path));
            if ($storedPath === '') continue;

            $storedPath = preg_replace('#^https?://[^/]+/#i', '', $storedPath) ?? $storedPath;
            $storedPath = ltrim($storedPath, '/');
            $storedPath = preg_replace('#^(?:public/)+#', '', $storedPath) ?? $storedPath;

            if (str_starts_with($storedPath, 'images/poojas/')) {
                $relativePath = $storedPath;
            } elseif (str_starts_with($storedPath, 'poojas/')) {
                $relativePath = 'images/' . $storedPath;
            } else {
                $relativePath = 'images/poojas/' . basename($storedPath);
            }

            if (is_file(public_path($relativePath))) {
                $poojaImageUrl = asset($relativePath);
                break;
            }
        }
    }

    if ($poojaImageUrl === null && !empty($pooja->image)) {
        $poojaImageUrl = asset($pooja->image);
    }

    if ($poojaImageUrl === null) {
        $fallbackImage = 'images/poojas/pooja_6_primary_1792339607.jpg';
        if (is_file(public_path($fallbackImage))) {
            $poojaImageUrl = asset($fallbackImage);
        }
    }

    // 2. Base Price & Currency
    $finalBasePrice = (float) ($basePoojaPrice ?? $pooja->starting_price ?? $pooja->price ?? 0);
    $activeCurrencySymbol = $currencySymbol ?? '₹';
    $activeCurrencyCode = $currencyCode ?? 'INR';

    $poojaData = [
        'name' => $pooja->name,
        'image' => $poojaImageUrl,
        'category' => $poojaCategory,
        'duration' => $pooja->duration_minutes
            ? $pooja->duration_minutes . ' Mins'
            : ($pooja->duration ?? '40-60 Mins'),
        'base_price' => $finalBasePrice,
        'location' => 'Verified Vedic Pandits / Doorstep / Temple',
    ];

    $steps = [
        ['number' => 1, 'title' => 'Date & Time'],
        ['number' => 2, 'title' => 'Priest'],
        ['number' => 3, 'title' => 'Devotee & Sankalpam'],
        ['number' => 4, 'title' => 'Add-ons'],
        ['number' => 5, 'title' => 'Review & Confirmation'],
    ];

    $selectedDate = ($date ?? today())->toDateString();

    // 3. Group Slots by Period
    $slotsByPeriod = collect($slots ?? [])->groupBy(function ($slot) {
        $startTime = is_array($slot) ? ($slot['start_time'] ?? '00:00') : ($slot->start_time ?? '00:00');
        $hour = (int) substr($startTime, 0, 2);
        return $hour < 12 ? 'Morning' : ($hour < 17 ? 'Afternoon' : 'Evening');
    });

    $purposes = ['Health', 'Business', 'Marriage', 'Education', 'Birthday', 'Anniversary'];

    $addonOptions = collect($extras ?? [])->flatMap(function ($extra) {
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
    })->values();

    $paymentMethods = [
        ['id' => 'upi', 'name' => 'UPI (Google Pay, PhonePe, Paytm)', 'icon' => 'bi-qr-code-scan'],
        ['id' => 'cards', 'name' => 'Credit / Debit Cards', 'icon' => 'bi-credit-card-2-front'],
        ['id' => 'netbanking', 'name' => 'Net Banking', 'icon' => 'bi-bank'],
        ['id' => 'wallet', 'name' => 'Wallets', 'icon' => 'bi-wallet2'],
    ];

    $resolvedTemplePoojaId = $templePooja?->id ?? $selectedTemplePooja?->id ?? (isset($templePoojas) && $templePoojas->isNotEmpty() ? $templePoojas->first()->id : 1);
@endphp

{{-- ============================================================
     BREADCRUMB
============================================================ --}}
<section class="bg-pn-cream border-bottom">
    <div class="container py-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 small">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-pn-primary text-decoration-none">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ url('/poojas') }}" class="text-pn-primary text-decoration-none">Poojas</a></li>
                <li class="breadcrumb-item"><a href="{{ url('/poojas/' . $pooja->slug) }}" class="text-pn-primary text-decoration-none">{{ $poojaData['name'] }}</a></li>
                <li class="breadcrumb-item active text-secondary" aria-current="page">Book Pooja</li>
            </ol>
        </nav>
    </div>
</section>

{{-- ============================================================
     BOOKING HEADER
============================================================ --}}
<section class="bg-pn-cream py-4 border-bottom shadow-sm">
    <div class="container">
        <div class="row align-items-center g-3">
            <div class="col-12 col-md-8">
                <div class="d-flex align-items-center gap-3">
                    <div class="ratio ratio-1x1 rounded-4 overflow-hidden shadow-sm border border-white flex-shrink-0" style="max-width: 76px;">
                        <img src="{{ $poojaData['image'] ?? asset('images/home/ganapathi.jpg') }}" class="w-100 h-100 object-fit-cover" alt="{{ $poojaData['name'] }}">
                    </div>
                    <div>
                        <span class="badge bg-warning-subtle text-pn-brown text-uppercase fw-bold rounded-pill px-3 py-1 mb-1">{{ $poojaData['category'] }}</span>
                        <h1 class="font-serif text-pn-brown h3 mb-1">Book {{ $poojaData['name'] }}</h1>
                        <div class="small text-secondary d-flex flex-wrap align-items-center gap-2">
                            <span><i class="bi bi-clock me-1 text-pn-primary"></i>{{ $poojaData['duration'] }}</span>
                            <span>•</span>
                            <span><i class="bi bi-shield-check me-1 text-pn-primary"></i>Verified Vedic Rituals</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4 text-md-end">
                <span class="text-secondary small d-block">Starting Dakshina</span>
                <span class="display-6 font-serif fw-bold text-pn-primary">
                    {{ $activeCurrencySymbol }}{{ number_format($poojaData['base_price'], 2) }}
                </span>
            </div>
        </div>
    </div>
</section>

{{-- ============================================================
     BOOKING STEPPER
============================================================ --}}
<section class="bg-white border-bottom sticky-top shadow-sm py-2 z-3">
    <div class="container">
        <div class="d-flex overflow-auto py-1 gap-3 align-items-center justify-content-between">
            @foreach($steps as $step)
                <div class="d-flex align-items-center flex-shrink-0 gap-2">
                    <span class="badge rounded-circle bg-pn-primary text-white p-2 d-inline-flex align-items-center justify-content-center" style="width: 28px; height: 28px;">
                        {{ $step['number'] }}
                    </span>
                    <span class="small fw-semibold text-pn-brown">{{ $step['title'] }}</span>
                </div>
                @if(!$loop->last)
                    <i class="bi bi-chevron-right text-muted small flex-shrink-0"></i>
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

            {{-- LEFT COLUMN: FORM --}}
            <div class="col-12 col-lg-8">
                <form id="bookingForm" method="POST" action="{{ route('pooja.book.store', ['slug' => $pooja->slug]) }}"
                      data-slug="{{ $pooja->slug }}" 
                      data-booking-base="{{ url('/') }}"
                      data-slots-url="{{ route('pooja.book.slots', ['slug' => $pooja->slug]) }}"
                      data-pujaris-url="{{ route('pooja.book.pujaris', ['slug' => $pooja->slug]) }}"
                      data-base-amount="{{ (float) $poojaData['base_price'] }}"
                      data-currency-symbol="{{ $activeCurrencySymbol }}">
                    @csrf

                    {{-- Background Temple ID hidden to satisfy DB relations --}}
                    <input type="hidden" name="temple_pooja_id" id="templePoojaId" value="{{ $resolvedTemplePoojaId }}">
                    <input type="hidden" name="currency_code" id="currencyCode" value="{{ $activeCurrencyCode }}">

                    @if(session('error'))
                        <div class="alert alert-danger rounded-4 shadow-sm border-0 mb-4">{{ session('error') }}</div>
                    @endif
                    @if($errors->any())
                        <div class="alert alert-danger rounded-4 shadow-sm border-0 mb-4">
                            <strong>Please correct the following:</strong>
                            <ul class="mb-0 mt-2">
                                @foreach($errors->all() as $error) <li>{{ $error }}</li> @endforeach
                            </ul>
                        </div>
                    @endif

                    {{-- STEP 1 : DATE & TIME --}}
                    <div class="card border-0 shadow-sm rounded-4 mb-4">
                        <div class="card-body p-4 p-md-5">
                            <div class="d-flex align-items-center gap-3 mb-4">
                                <span class="badge rounded-circle bg-pn-beige text-pn-primary p-3 fs-5">
                                    <i class="bi bi-calendar-check"></i>
                                </span>
                                <div>
                                    <span class="text-uppercase small fw-bold text-pn-primary tracking-wide">Step 01</span>
                                    <h2 class="font-serif h4 text-pn-brown mb-0">Choose Date & Time</h2>
                                </div>
                            </div>

                            <div class="mb-4">
                                <label for="bookingCalendarInput" class="form-label small fw-bold text-pn-brown text-uppercase">Select Date <span class="text-danger">*</span></label>
                                <input type="date" id="bookingCalendarInput" name="booking_date" class="form-control form-control-lg rounded-3 border-warning-subtle" min="{{ today()->toDateString() }}" value="{{ $selectedDate }}" required aria-label="Choose booking date">
                            </div>

                            <label class="form-label small fw-bold text-pn-brown text-uppercase mb-3">Available Muhurtham / Time Slots <span class="text-danger">*</span></label>
                            @foreach(['Morning', 'Afternoon', 'Evening'] as $period)
                                <div class="p-3 rounded-4 bg-light mb-3 border">
                                    <div class="d-flex align-items-center gap-2 mb-2">
                                        <i class="bi {{ $period === 'Morning' ? 'bi-sunrise text-warning' : ($period === 'Afternoon' ? 'bi-sun text-warning' : 'bi-sunset text-danger') }} fs-6"></i>
                                        <span class="small fw-bold text-pn-brown">{{ $period }}</span>
                                    </div>
                                    <div class="d-flex flex-wrap gap-2 booking-slots" data-period="{{ $period }}">
                                        @forelse($slotsByPeriod->get($period, collect()) as $slot)
                                            @php
                                                $slotId = is_array($slot) ? $slot['id'] : $slot->id;
                                                $sStart = is_array($slot) ? $slot['start_time'] : $slot->start_time;
                                                $sEnd = is_array($slot) ? $slot['end_time'] : $slot->end_time;
                                                $sRem = is_array($slot) ? ($slot['remaining_capacity'] ?? 1) : ($slot->remaining_capacity ?? 1);
                                            @endphp
                                            <div>
                                                <input type="radio" class="btn-check booking-slot" name="booking_slot_id" id="slot{{ $slotId }}" value="{{ $slotId }}" data-start="{{ $sStart }}" data-end="{{ $sEnd }}" {{ $sRem <= 0 ? 'disabled' : '' }}>
                                                <label for="slot{{ $slotId }}" class="btn btn-outline-secondary rounded-pill px-3">{{ \Carbon\Carbon::parse($sStart)->format('h:i A') }}</label>
                                            </div>
                                        @empty
                                            <div class="small text-muted slot-empty py-1">No available slots for this period.</div>
                                        @endforelse
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    {{-- STEP 2 : SELECT PRIEST --}}
                    <div class="card border-0 shadow-sm rounded-4 mb-4">
                        <div class="card-body p-4 p-md-5">
                            <div class="d-flex align-items-center gap-3 mb-4">
                                <span class="badge rounded-circle bg-pn-beige text-pn-primary p-3 fs-5">
                                    <i class="bi bi-person-check"></i>
                                </span>
                                <div>
                                    <span class="text-uppercase small fw-bold text-pn-primary tracking-wide">Step 02</span>
                                    <h2 class="font-serif h4 text-pn-brown mb-0">Select Priest</h2>
                                </div>
                            </div>

                            <div class="mb-3">
                                <input type="radio" class="btn-check pujari-option" name="pujari_profile_id" id="priestAny" value="" checked>
                                <label for="priestAny" class="card border border-warning-subtle rounded-4 p-3 w-100 shadow-sm" style="cursor: pointer;">
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="rounded-circle bg-pn-cream text-pn-primary p-3 fs-4 d-flex align-items-center justify-content-center">
                                            <i class="bi bi-people"></i>
                                        </div>
                                        <div>
                                            <strong class="text-pn-brown d-block">No Preference (Auto Assigned)</strong>
                                            <small class="text-muted">Let Pooja Nilayam assign an experienced verified Vedic pandit for your pooja.</small>
                                        </div>
                                    </div>
                                </label>
                            </div>

                            <div class="vstack gap-3" id="pujariOptions">
                                @forelse($pujaris as $priest)
                                    <div>
                                        <input type="radio" class="btn-check pujari-option" name="pujari_profile_id" id="priest{{ $priest->id }}" value="{{ $priest->id }}">
                                        <label for="priest{{ $priest->id }}" class="card border border-warning-subtle rounded-4 p-3 w-100" style="cursor: pointer;">
                                            <div class="d-flex flex-column flex-sm-row align-items-start gap-3">
                                                <div class="rounded-circle bg-pn-beige text-pn-primary p-3 fs-3 flex-shrink-0 d-flex align-items-center justify-content-center">
                                                    <i class="bi bi-person"></i>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <div class="d-flex flex-wrap align-items-center gap-2">
                                                        <h5 class="font-serif text-pn-brown mb-0">{{ $priest->display_name }}</h5>
                                                        <span class="badge rounded-pill bg-success-subtle text-success small">Verified Pandit</span>
                                                    </div>
                                                    <div class="small text-secondary mt-1">
                                                        <i class="bi bi-award me-1"></i>{{ $priest->experience_years ? $priest->experience_years . '+ Years Experience' : 'Vedic Certified' }}
                                                    </div>
                                                    @if($priest->bio)
                                                        <div class="small text-muted mt-2 border-top pt-2">{{ \Illuminate\Support\Str::limit($priest->bio, 140) }}</div>
                                                    @endif
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                @empty
                                    <div class="alert alert-light border rounded-3 mb-0">No specific priests listed. You can proceed with <strong>No Preference</strong>.</div>
                                @endforelse
                            </div>
                        </div>
                    </div>

                    {{-- STEP 3 : DEVOTEE DETAILS & SANKALPAM --}}
                    <div class="card border-0 shadow-sm rounded-4 mb-4">
                        <div class="card-body p-4 p-md-5">
                            <div class="d-flex align-items-center gap-3 mb-4">
                                <span class="badge rounded-circle bg-pn-beige text-pn-primary p-3 fs-5">
                                    <i class="bi bi-person-vcard"></i>
                                </span>
                                <div>
                                    <span class="text-uppercase small fw-bold text-pn-primary tracking-wide">Step 03</span>
                                    <h2 class="font-serif h4 text-pn-brown mb-0">Devotee & Sankalpam Details</h2>
                                </div>
                            </div>

                            <div class="row g-3 mb-4">
                                <div class="col-12 col-md-6">
                                    <label for="devoteeName" class="form-label small fw-bold text-pn-brown">Yajamana / Devotee Name <span class="text-danger">*</span></label>
                                    <input type="text" id="devoteeName" name="devotee_name" value="{{ old('devotee_name', $customerProfile?->first_name ? ($customerProfile->first_name . ' ' . $customerProfile->last_name) : $customer->name) }}" class="form-control form-control-lg rounded-3" placeholder="Enter full name" required>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label for="devoteePhone" class="form-label small fw-bold text-pn-brown">Mobile Number <span class="text-danger">*</span></label>
                                    <input type="tel" id="devoteePhone" name="devotee_phone" value="{{ old('devotee_phone', $customer->phone ?? $customerProfile?->phone ?? '') }}" class="form-control form-control-lg rounded-3" placeholder="Enter mobile number" required>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label for="devoteeEmail" class="form-label small fw-bold text-pn-brown">Email Address <span class="text-danger">*</span></label>
                                    <input type="email" id="devoteeEmail" name="devotee_email" value="{{ old('devotee_email', $customer->email ?? '') }}" class="form-control form-control-lg rounded-3" placeholder="Enter email address" required>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label for="devoteeDob" class="form-label small fw-bold text-pn-brown">Date of Birth</label>
                                    <input type="date" id="devoteeDob" name="devotee_dob" value="{{ old('devotee_dob', $customerProfile?->date_of_birth ?? '') }}" class="form-control form-control-lg rounded-3">
                                </div>
                                <div class="col-12 col-md-6">
                                    <label for="gotram" class="form-label small fw-bold text-pn-brown">Gotram</label>
                                    <input type="text" id="gotram" name="sankalpam[gotram]" value="{{ old('sankalpam.gotram') }}" class="form-control form-control-lg rounded-3" placeholder="Enter gotram (e.g. Kasyapa, Bharadwaja)">
                                </div>
                                <div class="col-12 col-md-6">
                                    <label for="nakshatram" class="form-label small fw-bold text-pn-brown">Nakshatram</label>
                                    <select id="nakshatram" name="sankalpam[nakshatram]" class="form-select form-select-lg rounded-3">
                                        <option value="">Select Nakshatram</option>
                                        @foreach(['Ashwini', 'Bharani', 'Krittika', 'Rohini', 'Mrigashira', 'Ardra', 'Punarvasu', 'Pushya', 'Ashlesha', 'Magha', 'Purva Phalguni', 'Uttara Phalguni', 'Hasta', 'Chitra', 'Swati', 'Vishakha', 'Anuradha', 'Jyeshtha', 'Mula', 'Purva Ashadha', 'Uttara Ashadha', 'Shravana', 'Dhanishta', 'Shatabhisha', 'Purva Bhadrapada', 'Uttara Bhadrapada', 'Revati'] as $nak)
                                            <option value="{{ $nak }}" {{ old('sankalpam.nakshatram') == $nak ? 'selected' : '' }}>{{ $nak }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label for="language" class="form-label small fw-bold text-pn-brown">Preferred Language</label>
                                    <select id="language" name="sankalpam[language_id]" class="form-select form-select-lg rounded-3">
                                        <option value="">Any Language</option>
                                        @foreach($languages as $language)
                                            <option value="{{ $language->id }}" {{ old('sankalpam.language_id') == $language->id ? 'selected' : '' }}>{{ $language->native_name ?: $language->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label for="bookingAddress" class="form-label small fw-bold text-pn-brown">Prasadam / Delivery Address</label>
                                    <select id="bookingAddress" name="address_id" class="form-select form-select-lg rounded-3">
                                        <option value="">Select Address (Optional)</option>
                                        @foreach($addresses as $address)
                                            <option value="{{ $address->id }}" {{ $address->is_default ? 'selected' : '' }}>
                                                {{ $address->recipient_name ?: $address->address_line_1 }} — {{ $address->city?->name ?? $address->city }} ({{ $address->postal_code }})
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            {{-- Family members --}}
                            <div class="border-top border-warning-subtle pt-4 mb-4">
                                <label class="form-label small fw-bold text-pn-brown text-uppercase d-block mb-1">Family Members in Sankalpam</label>
                                <span class="small text-secondary d-block mb-3">Include saved family members for chanting during Vedic mantras.</span>
                                <div class="row g-2">
                                    @forelse($familyMembers as $memberIndex => $member)
                                        <div class="col-12 col-md-6">
                                            <input class="btn-check family-member" type="checkbox" id="family{{ $member->id }}" name="sankalpam[members][{{ $memberIndex }}][family_member_id]" value="{{ $member->id }}">
                                            <label for="family{{ $member->id }}" class="btn btn-outline-secondary rounded-3 w-100 text-start py-2 px-3">
                                                <span class="fw-semibold d-block text-pn-brown">{{ trim($member->first_name . ' ' . $member->last_name) }}</span>
                                                @if($member->relation?->name)<small class="text-secondary">{{ $member->relation->name }}</small>@endif
                                            </label>
                                            <input type="hidden" class="family-member-dependent" name="sankalpam[members][{{ $memberIndex }}][name]" value="{{ trim($member->first_name . ' ' . $member->last_name) }}" disabled>
                                            <input type="hidden" class="family-member-dependent" name="sankalpam[members][{{ $memberIndex }}][relationship]" value="{{ $member->relation?->name ?? '' }}" disabled>
                                        </div>
                                    @empty
                                        <div class="col-12"><div class="alert alert-light border rounded-3 small mb-0">No saved family members found. You can add them in your customer profile.</div></div>
                                    @endforelse
                                </div>
                            </div>

                            {{-- Purpose --}}
                            <div class="border-top border-warning-subtle pt-4">
                                <label class="form-label small fw-bold text-pn-brown text-uppercase d-block mb-2">Purpose of the Pooja</label>
                                <div class="row row-cols-2 row-cols-md-3 g-2 mb-3">
                                    @foreach($purposes as $index => $purpose)
                                        <div class="col">
                                            <input type="radio" class="btn-check" name="sankalpam[purpose_type]" id="purpose{{ $index }}" value="{{ $purpose }}" {{ $index === 0 ? 'checked' : '' }}>
                                            <label for="purpose{{ $index }}" class="btn btn-outline-secondary rounded-3 w-100 py-3 text-center">
                                                <i class="bi {{ match($purpose) {
                                                    'Health' => 'bi-heart-pulse',
                                                    'Business' => 'bi-briefcase',
                                                    'Marriage' => 'bi-heart',
                                                    'Education' => 'bi-mortarboard',
                                                    'Birthday' => 'bi-cake2',
                                                    'Anniversary' => 'bi-calendar-heart',
                                                    default => 'bi-stars'
                                                } }} fs-5 d-block mb-1"></i>
                                                <span class="small fw-semibold">{{ $purpose }}</span>
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="mb-3">
                                    <label for="familyNames" class="form-label small fw-semibold text-pn-brown">Purpose Specifics (Optional)</label>
                                    <textarea id="familyNames" name="sankalpam[purpose_details]" rows="2" class="form-control rounded-3" placeholder="Enter additional details for the selected Sankalpam purpose">{{ old('sankalpam.purpose_details') }}</textarea>
                                </div>
                                <div>
                                    <label for="specialInstructions" class="form-label small fw-semibold text-pn-brown">Special Instructions</label>
                                    <textarea id="specialInstructions" name="sankalpam[special_instructions]" rows="3" class="form-control rounded-3" placeholder="Enter any special traditions, gotram details, or requests">{{ old('sankalpam.special_instructions') }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- STEP 4 : ADD-ON SERVICES --}}
                    <div class="card border-0 shadow-sm rounded-4 mb-4">
                        <div class="card-body p-4 p-md-5">
                            <div class="d-flex align-items-center gap-3 mb-4">
                                <span class="badge rounded-circle bg-pn-beige text-pn-primary p-3 fs-5">
                                    <i class="bi bi-plus-circle"></i>
                                </span>
                                <div>
                                    <span class="text-uppercase small fw-bold text-pn-primary tracking-wide">Step 04</span>
                                    <h2 class="font-serif h4 text-pn-brown mb-0">Add-on Offerings & Samagri</h2>
                                </div>
                            </div>

                            <div class="row g-3">
                                @forelse($addonOptions as $addonIndex => $addon)
                                    <div class="col-12 col-md-6">
                                        <input type="checkbox" class="btn-check addon-checkbox" name="extras[{{ $addonIndex }}][pooja_extra_option_id]" id="addon{{ $addon['id'] }}" value="{{ $addon['id'] }}" data-price="{{ $addon['price'] }}">
                                        <label for="addon{{ $addon['id'] }}" class="card border border-warning-subtle rounded-4 p-3 h-100" style="cursor: pointer;">
                                            <div class="d-flex align-items-start gap-3">
                                                <div class="rounded-circle bg-pn-beige text-pn-primary p-2 flex-shrink-0">
                                                    <i class="bi {{ $addon['icon'] }} fs-5"></i>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <div class="d-flex align-items-start justify-content-between gap-2">
                                                        <strong class="text-pn-brown small">{{ $addon['name'] }}</strong>
                                                        <span class="badge bg-pn-primary text-white">+{{ $activeCurrencySymbol }}{{ number_format($addon['price'], 2) }}</span>
                                                    </div>
                                                    <p class="small text-secondary mb-0 mt-1">{{ $addon['description'] }}</p>
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                @empty
                                    <div class="col-12"><div class="alert alert-light border rounded-3 small mb-0">No optional add-ons available for this pooja.</div></div>
                                @endforelse
                            </div>
                        </div>
                    </div>

                    {{-- STEP 5 : PAYMENT SELECTION --}}
                    <div class="card border-0 shadow-sm rounded-4 mb-4">
                        <div class="card-body p-4 p-md-5">
                            <div class="d-flex align-items-center gap-3 mb-4">
                                <span class="badge rounded-circle bg-pn-beige text-pn-primary p-3 fs-5">
                                    <i class="bi bi-credit-card"></i>
                                </span>
                                <div>
                                    <span class="text-uppercase small fw-bold text-pn-primary tracking-wide">Step 05</span>
                                    <h2 class="font-serif h4 text-pn-brown mb-0">Review & Payment Method</h2>
                                </div>
                            </div>

                            <div class="row g-3 mb-4">
                                @foreach($paymentMethods as $index => $method)
                                    <div class="col-12 col-sm-6">
                                        <input type="radio" class="btn-check" name="payment_method" id="payment{{ $method['id'] }}" value="{{ $method['id'] }}" required {{ old('payment_method', 'upi') === $method['id'] ? 'checked' : '' }}>
                                        <label for="payment{{ $method['id'] }}" class="card border rounded-3 p-3 w-100" style="cursor: pointer;">
                                            <div class="d-flex align-items-center gap-2">
                                                <i class="bi {{ $method['icon'] }} text-pn-primary fs-5"></i>
                                                <span class="small fw-semibold text-pn-brown">{{ $method['name'] }}</span>
                                            </div>
                                        </label>
                                    </div>
                                @endforeach
                            </div>

                            <div class="alert alert-warning-subtle text-pn-brown border-0 rounded-3 small d-flex align-items-center gap-2 mb-0">
                                <i class="bi bi-shield-check fs-5 text-pn-primary"></i>
                                <span>Secure payment processing. Your booking will be confirmed after successful payment.</span>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="customer_notes" id="customerNotes" value="">

                    {{-- Terms & Mobile CTA --}}
                    <div class="form-check mb-4">
                        <input class="form-check-input" type="checkbox" id="bookingTerms" name="booking_terms" value="1" required checked>
                        <label class="form-check-label small text-secondary" for="bookingTerms">
                            I confirm that the booking information provided is correct and agree to the applicable Pooja Nilayam terms and policies.
                        </label>
                    </div>

                    <div class="d-lg-none">
                        <button type="submit" class="btn btn-pn btn-lg w-100 shadow-sm">
                            Create Booking <i class="bi bi-arrow-right ms-2"></i>
                        </button>
                    </div>
                </form>
            </div>

            {{-- RIGHT COLUMN: STICKY SUMMARY --}}
            <div class="col-12 col-lg-4">
                <div class="sticky-top" style="top: 85px;">
                    <div class="card border-0 shadow-sm rounded-4 overflow-hidden mb-3">
                        <div class="bg-pn-cream border-bottom p-3">
                            <span class="small text-uppercase fw-bold text-pn-gold tracking-wide">Summary</span>
                            <h3 class="font-serif h5 text-pn-brown mb-0">Booking Summary</h3>
                        </div>

                        <div class="card-body p-4">
                            <div class="d-flex align-items-center gap-3 pb-3 border-bottom">
                                <div class="ratio ratio-1x1 rounded-3 overflow-hidden" style="max-width: 56px;">
                                    <img src="{{ $poojaData['image'] ?? asset('images/home/ganapathi.jpg') }}" class="w-100 h-100 object-fit-cover" alt="{{ $poojaData['name'] }}">
                                </div>
                                <div>
                                    <h6 class="fw-bold text-pn-brown mb-0">{{ $poojaData['name'] }}</h6>
                                    <small class="text-muted">{{ $poojaData['duration'] }}</small>
                                </div>
                            </div>

                            <div class="py-3 border-bottom small vstack gap-2">
                                <div class="d-flex justify-content-between">
                                    <span class="text-secondary"><i class="bi bi-calendar3 text-pn-primary me-2"></i>Date:</span>
                                    <strong id="summaryDate">{{ \Carbon\Carbon::parse($selectedDate)->format('d M Y') }}</strong>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <span class="text-secondary"><i class="bi bi-clock text-pn-primary me-2"></i>Time:</span>
                                    <strong id="summaryTime">--</strong>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <span class="text-secondary"><i class="bi bi-person-check text-pn-primary me-2"></i>Priest:</span>
                                    <strong id="summaryPriest">No Preference</strong>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <span class="text-secondary"><i class="bi bi-geo-alt text-pn-primary me-2"></i>Ritual Type:</span>
                                    <strong class="text-end">Vedic Traditional</strong>
                                </div>
                            </div>

                            <div class="py-3 border-bottom small vstack gap-2">
                                <div class="d-flex justify-content-between">
                                    <span class="text-secondary">Pooja Dakshina</span>
                                    <span id="summaryPoojaFee">{{ $activeCurrencySymbol }}{{ number_format($poojaData['base_price'], 2) }}</span>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <span class="text-secondary">Add-ons</span>
                                    <span id="summaryAddons">{{ $activeCurrencySymbol }}0.00</span>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <span class="text-secondary">Taxes / Charges</span>
                                    <span class="text-secondary">Included</span>
                                </div>
                            </div>

                            <div class="pt-3 d-flex align-items-center justify-content-between">
                                <div>
                                    <small class="text-muted d-block">Grand Total</small>
                                    <strong class="font-serif h4 text-pn-primary mb-0" id="summaryTotal">
                                        {{ $activeCurrencySymbol }}{{ number_format($poojaData['base_price'], 2) }}
                                    </strong>
                                </div>
                                <span class="badge bg-success-subtle text-success rounded-pill px-3 py-2">Best Price</span>
                            </div>
                        </div>

                        <div class="card-footer bg-light p-3 border-top-0">
                            <button type="submit" form="bookingForm" class="btn btn-pn btn-lg w-100 rounded-3 shadow-sm d-none d-lg-block">
                                Create Booking <i class="bi bi-arrow-right ms-2"></i>
                            </button>
                        </div>
                    </div>

                    {{-- Payment Hold Info --}}
                    <div class="card border-0 bg-white shadow-sm rounded-4 p-3 mb-3">
                        <div class="d-flex align-items-start gap-3">
                            <i class="bi bi-shield-lock text-pn-primary fs-4"></i>
                            <div>
                                <h6 class="fw-semibold text-pn-brown mb-1">Payment Protection</h6>
                                <p class="small text-secondary mb-0">The platform holds the payment until the pooja is completed according to authentic Vedic rituals.</p>
                            </div>
                        </div>
                    </div>

                    {{-- Post-Booking Details --}}
                    <div class="card border-0 bg-white shadow-sm rounded-4 p-3">
                        <h6 class="fw-semibold text-pn-brown mb-2">After Booking</h6>
                        <ul class="list-unstyled small text-secondary mb-0 vstack gap-2">
                            <li class="d-flex gap-2"><i class="bi bi-check-circle-fill text-pn-primary"></i>Instant booking confirmation</li>
                            <li class="d-flex gap-2"><i class="bi bi-check-circle-fill text-pn-primary"></i>Booking ID & priest assignment</li>
                            <li class="d-flex gap-2"><i class="bi bi-check-circle-fill text-pn-primary"></i>SMS / WhatsApp notification with muhurtham details</li>
                            <li class="d-flex gap-2"><i class="bi bi-check-circle-fill text-pn-primary"></i>Prasadam dispatch tracking</li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

{{-- ============================================================
     BOOKING INFORMATION STRIP
============================================================ --}}
<section class="bg-pn-cream py-5">
    <div class="container">
        <div class="row g-4 text-center">
            <div class="col-12 col-md-4">
                <div class="mx-auto rounded-circle d-flex align-items-center justify-content-center bg-white text-pn-primary fs-4 mb-3 shadow-sm" style="width: 58px; height: 58px;">
                    <i class="bi bi-shield-check"></i>
                </div>
                <h6 class="fw-semibold text-pn-brown">100% Authentic Rituals</h6>
                <p class="small text-secondary mb-0">Conducted strictly in adherence to Vedic Shastras & scriptures.</p>
            </div>
            <div class="col-12 col-md-4">
                <div class="mx-auto rounded-circle d-flex align-items-center justify-content-center bg-white text-pn-primary fs-4 mb-3 shadow-sm" style="width: 58px; height: 58px;">
                    <i class="bi bi-bell"></i>
                </div>
                <h6 class="fw-semibold text-pn-brown">Timely Notifications</h6>
                <p class="small text-secondary mb-0">Receive timely muhurtham reminders and pandit arrival details.</p>
            </div>
            <div class="col-12 col-md-4">
                <div class="mx-auto rounded-circle d-flex align-items-center justify-content-center bg-white text-pn-primary fs-4 mb-3 shadow-sm" style="width: 58px; height: 58px;">
                    <i class="bi bi-person-check"></i>
                </div>
                <h6 class="fw-semibold text-pn-brown">Experienced Pandits</h6>
                <p class="small text-secondary mb-0">Experienced priests verified for expertise in Vedic homams & poojas.</p>
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

    if (!document.getElementById('booking-payment-selection-style')) {
        const style = document.createElement('style');
        style.id = 'booking-payment-selection-style';
        style.textContent = '#bookingForm input[name="payment_method"]:checked + label { border-color: var(--bs-warning, #b04b2b) !important; box-shadow: 0 0 0 .15rem rgba(176,75,43,.14); background-color: rgba(176,75,43,.035); }';
        document.head.appendChild(style);
    }
    form.dataset.bookingIntegrationReady = '1';

    const calendarInput = document.getElementById('bookingCalendarInput');
    const slotContainers = Array.from(document.querySelectorAll('.booking-slots'));
    const summaryDate = document.getElementById('summaryDate');
    const summaryTime = document.getElementById('summaryTime');
    const summaryPriest = document.getElementById('summaryPriest');
    const currencySymbol = () => form.dataset.currencySymbol || '₹';
    const money = (value) => currencySymbol() + Number(value || 0).toLocaleString('en-IN', {minimumFractionDigits: 2, maximumFractionDigits: 2});
    const selectedDate = () => calendarInput?.value || '';

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
            container.innerHTML = '<div class="small text-secondary slot-empty py-1">' + message + '</div>';
        });
        if (summaryTime) summaryTime.textContent = '--';
    }

    function renderSlots(slots) {
        slotContainers.forEach(container => {
            const period = container.dataset.period;
            const matching = slots.filter(slot => periodFor(slot.start_time) === period);
            if (!matching.length) {
                container.innerHTML = '<div class="small text-secondary slot-empty py-1">No available slots for this period.</div>';
                return;
            }
            container.innerHTML = matching.map(slot => {
                const id = 'slot' + slot.id;
                const time = new Date('2000-01-01T' + slot.start_time).toLocaleTimeString('en-IN', {hour:'2-digit', minute:'2-digit', hour12:true});
                return '<div><input type="radio" class="btn-check booking-slot" name="booking_slot_id" id="' + id + '" value="' + Number(slot.id) + '" data-start="' + slot.start_time + '" data-end="' + slot.end_time + '" required><label for="' + id + '" class="btn btn-outline-secondary rounded-pill px-3">' + time + '</label></div>';
            }).join('');
        });
    }

    async function refreshSlots() {
        const date = selectedDate();
        if (!date) return;
        clearSlots('Checking available slots…');
        try {
            const url = new URL(form.dataset.slotsUrl, window.location.origin);
            url.searchParams.set('date', date);
            const response = await fetch(url.toString(), {headers:{'Accept':'application/json','X-Requested-With':'XMLHttpRequest'}});
            if (!response.ok) throw new Error('Unable to load slots.');
            const payload = await response.json();
            renderSlots(Array.isArray(payload.slots) ? payload.slots : []);
        } catch (error) {
            clearSlots('Could not load slots. Please select another date.');
        }
    }

    function updatePriceSummary() {
        const amount = Number(form.dataset.baseAmount || 0);
        const addonTotal = Array.from(document.querySelectorAll('.addon-checkbox:checked')).reduce((total, checkbox) => total + Number(checkbox.dataset.price || 0), 0);
        const fee = document.getElementById('summaryPoojaFee');
        const addons = document.getElementById('summaryAddons');
        const total = document.getElementById('summaryTotal');
        if (fee) fee.textContent = money(amount);
        if (addons) addons.textContent = money(addonTotal);
        if (total) total.textContent = money(amount + addonTotal);
    }

    document.addEventListener('change', function (event) {
        if (event.target.matches('.family-member')) {
            const memberWrap = event.target.closest('.col-12');
            memberWrap?.querySelectorAll('.family-member-dependent').forEach(function (field) {
                field.disabled = !event.target.checked;
            });
        }
        if (event.target.matches('.booking-slot')) {
            const label = event.target.dataset.start ? new Date('2000-01-01T' + event.target.dataset.start).toLocaleTimeString('en-IN', {hour:'2-digit', minute:'2-digit', hour12:true}) : '--';
            if (summaryTime) summaryTime.textContent = label;
        }
        if (event.target.matches('.pujari-option')) {
            const label = document.querySelector('label[for="' + event.target.id + '"] strong, label[for="' + event.target.id + '"] h5');
            if (summaryPriest) summaryPriest.textContent = label?.textContent || 'No Preference';
        }
        if (event.target.matches('.addon-checkbox')) updatePriceSummary();
    });

    calendarInput?.addEventListener('change', function () {
        if (!this.value) return;
        updateDateSummary(this.value);
        refreshSlots();
    });

    form.addEventListener('submit', function (event) {
        if (!selectedDate()) {
            event.preventDefault();
            alert('Please select a booking date.');
            return;
        }
        if (!form.querySelector('input[name="booking_slot_id"]:checked')) {
            event.preventDefault();
            alert('Please select an available time slot.');
            return;
        }
        if (!form.querySelector('input[name="payment_method"]:checked')) {
            event.preventDefault();
            alert('Please select a payment method.');
        }
    });

    updateDateSummary(selectedDate());
    updatePriceSummary();
})();
</script>
@endpush

@endsection