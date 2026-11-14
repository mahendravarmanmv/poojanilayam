@extends('layouts.app')

@section('title', 'Pooja Go | Modern Divine')

@section(
    'meta_description',
    'Discover authentic poojas, sacred temples, trusted priests, digital spiritual services, astrology and pooja samagri with Pooja Go.'
)

@section('content')

@php

    /*
    |--------------------------------------------------------------------------
    | Temporary UI Data
    |--------------------------------------------------------------------------
    | These arrays are currently used for frontend design/prototyping.
    | Later these will come from Controllers / Services / Database.
    |--------------------------------------------------------------------------
    */

    $services = [
        [
            'image' => 'images/services/poojas.png',
            'title' => 'Poojas',
            'subtitle' => 'Book Poojas'
        ],
        [
            'image' => 'images/services/priests.png',
            'title' => 'Priests',
            'subtitle' => 'Find Priests'
        ],
        [
            'image' => 'images/services/astrology.png',
            'title' => 'Astrology',
            'subtitle' => 'Guidance & More'
        ],
        [
            'image' => 'images/services/store.png',
            'title' => 'Store',
            'subtitle' => 'Pooja Samagri'
        ],
        [
            'image' => 'images/services/donations.png',
            'title' => 'Donations',
            'subtitle' => 'Support a Cause'
        ]
    ];

    $astrologyServices = [
        'Horoscope',
        'Kundli',
        'Match Making',
        'Numerology',
        'Palm Reading',
        'Vastu'
    ];

    $testimonials = [
        [
            'name' => 'Anita Rao',
            'city' => 'Hyderabad',
            'text' => 'The entire booking experience was simple and peaceful. The pooja was performed beautifully.'
        ],
        [
            'name' => 'Ramesh Kumar',
            'city' => 'Bengaluru',
            'text' => 'Very professional service. The priest was experienced and the prasadam arrived safely.'
        ],
        [
            'name' => 'Priya Sharma',
            'city' => 'Chennai',
            'text' => 'I loved the convenience of booking the pooja online and receiving updates throughout.'
        ]
    ];

    $blogs = [
        [
            'image' => 'from-our-blog/ganapathi-homam.webp',
            'title' => 'Why Ganapathi Homam Is Performed',
            'category' => 'Pooja Knowledge'
        ],
        [
            'image' => 'from-our-blog/ekadashi.webp',
            'title' => 'Understanding the Importance of Ekadashi',
            'category' => 'Festivals'
        ],
        [
            'image' => 'from-our-blog/traditional-pooja-preparation.webp',
            'title' => 'How to Prepare for a Traditional Pooja',
            'category' => 'Devotional Guide'
        ]
    ];

    $faqs = [
        [
            'question' => 'How can I book a pooja online?',
            'answer' => 'Choose your preferred pooja, select the available date and time, provide the required devotee details and complete the payment.'
        ],
        [
            'question' => 'Can I receive prasadam after the pooja?',
            'answer' => 'Prasadam availability depends on the selected pooja or temple service. Available delivery options will be shown during booking.'
        ],
        [
            'question' => 'Can I attend a pooja digitally?',
            'answer' => 'Yes. Digital Pooja services allow devotees to participate remotely and access available live or recorded experiences.'
        ],
        [
            'question' => 'Can I book a specific priest?',
            'answer' => 'Where priest selection is supported, available priests can be selected during the booking process.'
        ]
    ];
@endphp


{{-- ============================================================
     HERO
============================================================ --}}

<section class="pn-hero d-flex align-items-center">
    <div class="container-md py-4">
        <div class="row align-items-center">
            <div class="col-12 col-lg-7">                
				<span class="small text-pn-gold fw-bold text-uppercase"><i class="bi bi-stars me-1"></i> A SIMPLER WAY TO EXPERIENCE DEVOTION</span>

                <h1 class="pn-hero-title font-serif fw-normal text-pn-brown mb-3">
                    Your sacred journey,
                    <span class="pn-hero-home d-block fw-semibold">
                        beautifully connected.
                    </span>
                </h1>

                <p class="col-lg-10 mb-3 fs-6 text-white">
                    Discover authentic poojas, trusted priests,
                    sacred temples and meaningful digital
                    experiences — all in one place.
                </p>

                {{-- Benefits --}}
                <div class="d-flex align-items-stretch mt-3">
                    <div class="d-flex flex-column align-items-start justify-content-center pe-4 border-end border-warning">
                        <i class="bi bi-shield-fill-check fs-2 pn-hero-home rounded-circle border border-warning d-inline-flex align-items-center justify-content-center p-2 mb-1"></i>
                        <small class="text-white">Authentic</small>
                    </div>

                    <div class="d-flex flex-column align-items-center justify-content-center px-4 border-end border-warning">
                        <i class="bi bi-people-fill fs-2 pn-hero-home rounded-circle border border-warning d-inline-flex align-items-center justify-content-center p-2 mb-1"></i>
                        <small class="text-center text-white">Trusted Priests</small>
                    </div>

                    <div class="d-flex flex-column align-items-center justify-content-center px-4 border-end border-warning">
                        <i class="bi bi-flower1 fs-2 pn-hero-home rounded-circle border border-warning d-inline-flex align-items-center justify-content-center p-2 mb-1"></i>
                        <small class="text-center text-white">Safe &amp; Secure</small>
                    </div>

                    <div class="d-flex flex-column align-items-center justify-content-center ps-4">
                        <i class="bi bi-headset fs-2 pn-hero-home rounded-circle border border-warning d-inline-flex align-items-center justify-content-center p-2 mb-1"></i>
                        <small class="text-center text-white">24/7 Support</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


{{-- ============================================================
     SERVICE CATEGORIES
============================================================ --}}

<section class="py-1">
    <div class="container-fluid px-3 px-md-4 px-lg-5">
        <div class="row row-cols-2 row-cols-md-3 row-cols-lg-6 g-3">
            @foreach($services as $service)

                <div class="col">
                    <a
                        href="{{ match (Str::slug($service['title'])) { 'poojas' => route('pooja.index'), 'temples' => route('temple.index'), 'priests' => route('priest.index'), 'digital-pooja' => route('digital-pooja.index'), 'astrology' => route('astrology.index'), 'store' => route('store.index'), default => route('home') } }}"
                        class="pn-service-card card border-0 rounded-4 bg-white h-100 text-center p-3 text-pn-brown"
                    >

                        <div class="card-body p-2">
                            <img
                                src="{{ asset($service['image']) }}"
                                alt="{{ $service['title'] }}"
                                class="service-image d-block mx-auto mb-3"
                                loading="lazy"
                            >

                            <h6 class="fw-semibold mb-1">
                                {{ $service['title'] }}
                            </h6>

                            <small class="text-secondary">
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
     POPULAR POOJAS
============================================================ --}}

<section class="py-2">
    <div class="container py-lg-4">
        <div class="d-flex flex-column flex-md-row align-items-md-end justify-content-between gap-3 mb-4">
            <div>
                <h2 class="font-serif display-6 text-pn-brown my-2">
                    Popular Poojas
                </h2>

                <div class="pn-divider"></div>
            </div>

            <a href="{{ route('pooja.index') }}" class="btn btn-pn-outline">
                View All

                <i class="bi bi-arrow-right ms-2"></i>
            </a>
        </div>

        <div class="row g-4">
            @forelse($featuredPoojas as $pooja)

                <div class="col-12 col-sm-6 col-lg-3">
                    <article class="pn-pooja-card card h-100 border-0 rounded-4 overflow-hidden bg-white">
                        <img
                            src="{{ $pooja['image'] ?: asset('images/home/ganapathi.jpg') }}"
                            class="pn-pooja-image card-img-top"
                            alt="{{ $pooja['name'] }}"
                            loading="lazy"
                        >

                        <div class="card-body p-4">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span class="small text-pn-primary fw-semibold">
                                    {{ $pooja['category'] }}
                                </span>

                                <span class="small">
                                    @if(isset($pooja['reviews']) && $pooja['reviews'] > 0)
                                        <i class="bi bi-star-fill text-pn-gold"></i>
                                        <strong>{{ $pooja['rating'] }}</strong>

                                        <span class="text-secondary">
                                            ({{ $pooja['reviews'] }}
                                            {{ $pooja['reviews'] == 1 ? 'review' : 'reviews' }})
                                        </span>
                                    @else
                                        <span class="text-secondary">
                                            <i class="bi bi-chat-left-text me-1"></i>
                                            No reviews yet
                                        </span>
                                    @endif
                                </span>
                            </div>

                            <h5 class="font-serif text-pn-brown fw-semibold">
                                {{ $pooja['name'] }}
                            </h5>

                            <p class="small text-secondary mb-4">
                                {{ $pooja['description'] }}
                            </p>

                            <div class="d-flex justify-content-between align-items-end gap-2">
                                <div>
                                    <small class="text-secondary d-block">
                                        From
                                    </small>

                                    <strong class="fs-5 text-pn-brown">
                                        {{ $pooja['price'] }}
                                    </strong>
                                </div>

                                <div class="text-end">
                                    <small class="d-block text-secondary mb-2">
                                        <i class="bi bi-clock me-1"></i>

                                        {{ $pooja['duration'] }}
                                    </small>

                                    <a
                                        href="{{ route('pooja.show', ['slug' => $pooja['slug']]) }}"
                                        class="btn btn-pn btn-sm"
                                    >
                                        View Details
                                    </a>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
            @empty
                <div class="col-12">
                    <div class="text-center text-secondary py-4">
                        Popular poojas will be displayed here soon.
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</section>


{{-- ============================================================
     POPULAR TEMPLES
============================================================ --}}

{{-- <section class="bg-pn-cream py-5">

    <div class="container py-lg-4">
        <div class="d-flex flex-column flex-md-row align-items-md-end justify-content-between gap-3 mb-4">
            <div>
                <span class="pn-section-label text-uppercase text-pn-gold small fw-semibold">
                    Sacred Destinations
                </span>

                <h2 class="font-serif display-6 text-pn-brown my-2">
                    Popular Temples
                </h2>

                <div class="pn-divider"></div>
            </div>

            <a href="{{ route('temple.index') }}" class="btn btn-pn-outline">
                Explore Temples

                <i class="bi bi-arrow-right ms-2"></i>
            </a>
        </div>

        <div class="row g-4">
            @foreach($temples as $temple)

                <div class="col-12 col-sm-6 col-lg-3">
                    <article class="card border-0 rounded-4 overflow-hidden bg-white h-100">
                        <img
                            src="{{ asset('images/home/' . $temple['image']) }}"
                            class="pn-temple-image card-img-top"
                            alt="{{ $temple['name'] }}"
                            loading="lazy"
                        >

                        <div class="card-body p-4">
                            <h5 class="font-serif text-pn-brown mb-2">
                                {{ $temple['name'] }}
                            </h5>

                            <p class="small text-secondary mb-3">
                                <i class="bi bi-geo-alt text-pn-primary me-1"></i>

                                {{ $temple['location'] }}
                            </p>

                            <a
                                href="{{ route('temple.index', ['search' => $temple['name']]) }}"
                                class="small fw-semibold text-pn-primary"
                            >
                                Find Temple
                                <i class="bi bi-arrow-right ms-1"></i>
                            </a>
                        </div>
                    </article>
                </div>
            @endforeach
        </div>
    </div>
</section>  --}}


{{-- ============================================================
     POPULAR PRIESTS
============================================================ --}}

<section class="py-5">
    <div class="container py-lg-4">
	
	<div class="d-flex flex-column flex-md-row align-items-md-end justify-content-between gap-3 mb-4">
            <div>
                <h2 class="font-serif display-6 text-pn-brown my-2">
                    Our Trusted Priests
                </h2>

                <div class="pn-divider"></div>
            </div>

            <a href="{{ route('priest.index') }}" class="btn btn-pn-outline">
                View All Priests

                <i class="bi bi-arrow-right ms-2"></i>
            </a>
        </div>	
        

        <div class="row g-4">
            @forelse($priests as $priest)

                <div class="col-12 col-sm-6 col-lg-3">
                    <article class="card border border-warning-subtle rounded-4 h-100 text-center p-3">
                        @if (!empty($priest['image']))
                            <div class="row g-0 justify-content-center">
                                <div class="col-5 col-sm-6 col-md-5 col-lg-7 col-xxl-5">
                                    <div class="ratio ratio-1x1">
                                        <img
                                            src="{{ filter_var($priest['image'], FILTER_VALIDATE_URL) ? $priest['image'] : asset($priest['image']) }}"
                                            class="rounded-circle object-fit-cover"
                                            alt="{{ $priest['name'] }}"
                                            loading="lazy"
                                        >
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="row g-0 justify-content-center">
                                <div class="col-5 col-sm-6 col-md-5 col-lg-7 col-xxl-5">
                                    <div
                                        class="ratio ratio-1x1 rounded-circle bg-pn-cream text-pn-primary"
                                        aria-label="Priest photo unavailable"
                                    >
                                        <div class="d-flex align-items-center justify-content-center">
                                            <i class="bi bi-person fs-1"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <div class="card-body">
                            <h5 class="font-serif text-pn-brown">
                                {{ $priest['name'] }}
                            </h5>

                            <p class="small text-secondary mb-2">
                                {{ $priest['speciality'] }}
                            </p>

                            <span class="badge rounded-pill bg-pn-beige text-pn-primary">
                                {{ $priest['experience'] }}
                            </span>

                            <div class="mt-3">
                                <span class="small">
                                    <i class="bi bi-star-fill text-pn-gold"></i>

                                    {{ $priest['rating'] ?? '—' }}
                                </span>
                            </div>
                        </div>
                    </article>
                </div>
            @empty
                <div class="col-12">
                    <div class="text-center text-secondary py-4">
                        Trusted priest profiles will be displayed here soon.
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</section>


{{-- ============================================================
     DIGITAL POOJA
============================================================ --}}

{{-- <section class="py-5">

    <div class="container py-lg-4">
        <div class="pn-digital rounded-5 overflow-hidden text-white">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="p-4 p-md-5">
                        <span class="small text-warning fw-semibold text-uppercase">
                            Digital Pooja
                        </span>

                        <h2 class="font-serif display-6 fw-normal mt-3 mb-3">
                            Devotion,
                            wherever you are.
                        </h2>

                        <p class="text-white-50 mb-4">
                            Participate in sacred rituals,
                            receive blessings and stay connected
                            to your spiritual journey.
                        </p>

                        <a
                            href="{{ route('digital-pooja.index') }}"
                            class="btn btn-warning text-dark fw-semibold px-4"
                        >

                            Explore Digital Pooja

                            <i class="bi bi-arrow-right ms-2"></i>
                        </a>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="w-100 h-100">
                        <img
                            src="{{ asset('images/home/hero2.jpg') }}"
                            class="w-100 h-100 digital-pooja-image"
                            alt="Digital Pooja"
                            loading="lazy"
                        >
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> --}}


{{-- ============================================================
     ASTROLOGY
============================================================ --}}

<section class="py-2 bg-pn-beige">
    <div class="container py-lg-4">
        <div class="text-center mb-5">
            <span class="pn-section-label text-uppercase text-pn-gold small fw-semibold">
                Divine Guidance
            </span>

            <h2 class="font-serif display-6 text-pn-brown mt-2">
                Explore Astrology
            </h2>

            <div class="pn-divider mx-auto my-3"></div>

            <p class="text-secondary col-lg-6 mx-auto">
                Discover traditional astrology services for
                guidance, clarity and meaningful decisions.
            </p>
        </div>

        <div class="row row-cols-2 row-cols-md-3 row-cols-lg-6 g-3">
            @foreach($astrologyServices as $service)

                <div class="col">
                    <a
                        href="{{ match (Str::slug($service)) { 'horoscope' => route('astrology.horoscope'), 'kundli' => route('astrology.kundli'), 'match-making' => route('astrology.match-making'), 'numerology' => route('astrology.numerology'), 'palm-reading' => route('astrology.palm-reading'), 'vastu' => route('astrology.vastu'), default => route('astrology.index') } }}"
                        class="card border-0 rounded-4 bg-white h-100 text-center p-3 text-pn-brown"
                    >

                        <div class="card-body">
                            <i class="bi bi-stars display-6 text-pn-primary"></i>

                            <h6 class="fw-semibold mt-3 mb-0">
                                {{ $service }}
                            </h6>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>


{{-- ============================================================
     ONLINE STORE
============================================================ --}}

<section class="py-2">
    <div class="container py-lg-4">
        <div class="d-flex flex-column flex-md-row align-items-md-end justify-content-between gap-3 mb-4">
            <div>
                <h2 class="font-serif display-6 text-pn-brown my-2">
                    Pooja Samagri
                </h2>

                <div class="pn-divider"></div>
            </div>

            <a href="{{ route('store.index') }}" class="btn btn-pn-outline">
                Visit Store

                <i class="bi bi-arrow-right ms-2"></i>
            </a>
        </div>

        <div class="row g-4">
            @forelse($products as $product)

                <div class="col-6 col-lg-3">
                    <article class="card border border-warning-subtle rounded-4 overflow-hidden h-100">
                        @if (!empty($product['image']))
                            <img
                                src="{{ filter_var($product['image'], FILTER_VALIDATE_URL) ? $product['image'] : asset($product['image']) }}"
                                class="pn-pooja-image card-img-top"
                                alt="{{ $product['name'] }}"
                                loading="lazy"
                            >
                        @else
                            <div class="pn-pooja-image card-img-top d-flex align-items-center justify-content-center bg-pn-cream text-pn-primary">
                                <i class="bi bi-box-seam display-4"></i>
                            </div>
                        @endif

                        <div class="card-body">
                            <h6 class="fw-semibold">
                                {{ $product['name'] }}
                            </h6>

                            <strong class="text-pn-primary">
                                {{ $product['price'] }}
                            </strong>
                        </div>
                    </article>
                </div>
            @empty
                <div class="col-12">
                    <div class="text-center text-secondary py-4">
                        Pooja samagri products will be displayed here soon.
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</section>


{{-- ============================================================
     FESTIVAL OFFERS
============================================================ --}}

{{-- <section class="bg-pn-cream py-5">

    <div class="container">
        <div class="row align-items-center g-4">
            <div class="col-lg-6">
                <span class="badge rounded-pill bg-pn-beige text-pn-primary px-3 py-2">
                    FESTIVAL SPECIAL
                </span>

                <h2 class="font-serif display-6 text-pn-brown mt-3">
                    Celebrate every occasion
                    with divine blessings.
                </h2>

                <p class="text-secondary">
                    Explore special poojas and festive offerings
                    created for meaningful celebrations.
                </p>

                <a href="{{ route('festival.index') }}" class="btn btn-pn mt-2">
                    Explore Festival Poojas

                    <i class="bi bi-arrow-right ms-2"></i>
                </a>
            </div>

            <div class="col-lg-6">
                <div class="rounded-5 overflow-hidden">
                    <img
                        src="{{ asset('images/home/festival.jpg') }}"
                        class="img-fluid w-100"
                        alt="Festival Pooja"
                        loading="lazy"
                    >
                </div>
            </div>
        </div>
    </div>
</section> --}}


{{-- ============================================================
     TESTIMONIALS
============================================================ --}}

<section class="py-5">
    <div class="container py-lg-4">
        <div class="text-center mb-5">
            <span class="pn-section-label text-uppercase text-pn-gold small fw-semibold">
                Devotee Experiences
            </span>

            <h2 class="font-serif display-6 text-pn-brown mt-2">
                What Our Devotees Say
            </h2>

            <div class="pn-divider mx-auto my-3"></div>
        </div>

        <div class="row g-4">
            @foreach($testimonials as $testimonial)

                <div class="col-12 col-md-4">
                    <article class="card h-100 border border-warning-subtle rounded-4 p-3">
                        <div class="card-body">
                            <div class="mb-3">
                                @for($i = 0; $i < 5; $i++)

                                    <i class="bi bi-star-fill text-pn-gold"></i>
                                @endfor
                            </div>

                            <p class="text-secondary">
                                “{{ $testimonial['text'] }}”
                            </p>

                            <div class="mt-4">
                                <strong class="d-block">
                                    {{ $testimonial['name'] }}
                                </strong>

                                <small class="text-secondary">
                                    {{ $testimonial['city'] }}
                                </small>
                            </div>
                        </div>
                    </article>
                </div>
            @endforeach
        </div>
    </div>
</section>


{{-- ============================================================
     BLOGS
============================================================ --}}

{{-- <section class="bg-pn-cream py-5">

    <div class="container py-lg-4">
        <div class="d-flex flex-column flex-md-row align-items-md-end justify-content-between gap-3 mb-4">
            <div>
                <span class="pn-section-label text-uppercase text-pn-gold small fw-semibold">
                    Spiritual Knowledge
                </span>

                <h2 class="font-serif display-6 text-pn-brown my-2">
                    From Our Blog
                </h2>

                <div class="pn-divider"></div>
            </div>

            <a href="{{ route('blog.index') }}" class="btn btn-pn-outline">
                View All Articles
            </a>
        </div>

        <div class="row g-4">
            @foreach($blogs as $blog)

                <div class="col-12 col-md-4">
                    <article class="card border-0 rounded-4 overflow-hidden h-100">
                        <img
                            src="{{ asset('images/home/' . $blog['image']) }}"
                            class="pn-pooja-image card-img-top"
                            alt="{{ $blog['title'] }}"
                            loading="lazy"
                        >

                        <div class="card-body p-4">
                            <small class="text-pn-primary fw-semibold">
                                {{ $blog['category'] }}
                            </small>

                            <h5 class="font-serif text-pn-brown mt-2">
                                {{ $blog['title'] }}
                            </h5>

                            <span class="small fw-semibold text-pn-primary">
                            Article coming soon
                            </span>
                        </div>
                    </article>
                </div>
            @endforeach
        </div>
    </div>
</section> --}}


{{-- ============================================================
     FAQ
============================================================ --}}

<section class="py-5">
    <div class="container py-lg-4">
        <div class="row justify-content-center">
            <div class="col-lg-9">
                <div class="text-center mb-5">
                    <span class="pn-section-label text-uppercase text-pn-gold small fw-semibold">
                        Need Help?
                    </span>

                    <h2 class="font-serif display-6 text-pn-brown mt-2">
                        Frequently Asked Questions
                    </h2>

                    <div class="pn-divider mx-auto my-3"></div>
                </div>

                <div class="accordion" id="homeFaq">
                    @foreach($faqs as $index => $faq)

                        <div
                            class="accordion-item border border-warning-subtle rounded-3 mb-3 overflow-hidden"
                        >

                            <h2 class="accordion-header" id="faqHeading{{ $index }}">
                                <button
                                    class="accordion-button {{ $index !== 0 ? 'collapsed' : '' }} bg-white fw-semibold"
                                    type="button"
                                    data-bs-toggle="collapse"
                                    data-bs-target="#faq{{ $index }}"
                                    aria-expanded="{{ $index === 0 ? 'true' : 'false' }}"
                                    aria-controls="faq{{ $index }}"
                                >

                                    {{ $faq['question'] }}
                                </button>
                            </h2>

                            <div
                                id="faq{{ $index }}"
                                class="accordion-collapse collapse {{ $index === 0 ? 'show' : '' }}"
                                data-bs-parent="#homeFaq"
                            >

                                <div class="accordion-body text-secondary">
                                    {{ $faq['answer'] }}
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
     FINAL CTA
============================================================ --}}

<section class="py-5">
    <div class="container py-lg-4">
        <div class="bg-pn-cream border border-warning-subtle rounded-5 text-center p-4 p-md-5">
            <i class="bi bi-flower1 display-5 text-pn-primary"></i>

            <h2 class="font-serif display-6 text-pn-brown mt-3">
                Make every moment meaningful.
            </h2>

            <p class="text-secondary col-lg-6 mx-auto">
                Discover authentic spiritual experiences
                designed around your needs.
            </p>

            <a href="{{ route('pooja.index') }}" class="btn btn-pn px-4">
                Explore Poojas

                <i class="bi bi-arrow-right ms-2"></i>
            </a>
        </div>
    </div>
</section>

@endsection
