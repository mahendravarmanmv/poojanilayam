@extends('layouts.app')

@section('title', 'Pooja Nilayam | Modern Divine')

@section(
    'meta_description',
    'Discover authentic poojas, sacred temples, trusted priests, digital spiritual services, astrology and pooja samagri with Pooja Nilayam.'
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
            'icon' => 'bi-flower1',
            'title' => 'Poojas',
            'subtitle' => 'Book Poojas'
        ],
        [
            'icon' => 'bi-bank',
            'title' => 'Temples',
            'subtitle' => 'Explore Temples'
        ],
        [
            'icon' => 'bi-person-check',
            'title' => 'Priests',
            'subtitle' => 'Find Priests'
        ],
        [
            'icon' => 'bi-camera-video',
            'title' => 'Digital Pooja',
            'subtitle' => 'Join Online Pooja'
        ],
        [
            'icon' => 'bi-stars',
            'title' => 'Astrology',
            'subtitle' => 'Guidance & More'
        ],
        [
            'icon' => 'bi-bag-heart',
            'title' => 'Store',
            'subtitle' => 'Pooja Samagri'
        ]
    ];


    $poojas = [
        [
            'image' => 'ganapathi.jpg',
            'name' => 'Ganapathi Homam',
            'category' => 'Popular',
            'description' => 'For success and removal of obstacles.',
            'duration' => '60 Mins',
            'rating' => '4.9',
            'price' => '₹501'
        ],
        [
            'image' => 'rudrabhishekam.jpg',
            'name' => 'Rudrabhishekam',
            'category' => 'Popular',
            'description' => 'For peace, health and wellbeing.',
            'duration' => '90 Mins',
            'rating' => '4.8',
            'price' => '₹1,101'
        ],
        [
            'image' => 'lakshmi.jpg',
            'name' => 'Lakshmi Pooja',
            'category' => 'Popular',
            'description' => 'For prosperity and family happiness.',
            'duration' => '60 Mins',
            'rating' => '4.9',
            'price' => '₹501'
        ],
        [
            'image' => 'satyanarayana.jpg',
            'name' => 'Satyanarayana Pooja',
            'category' => 'Popular',
            'description' => 'For peace, blessings and harmony.',
            'duration' => '90 Mins',
            'rating' => '4.8',
            'price' => '₹601'
        ]
    ];


    $occasions = [
        [
            'icon' => 'bi-cake2',
            'title' => 'Birthday'
        ],
        [
            'icon' => 'bi-heart',
            'title' => 'Anniversary'
        ],
        [
            'icon' => 'bi-house-heart',
            'title' => 'House Warming'
        ],
        [
            'icon' => 'bi-mortarboard',
            'title' => 'Education'
        ],
        [
            'icon' => 'bi-heart-pulse',
            'title' => 'Health'
        ],
        [
            'icon' => 'bi-graph-up-arrow',
            'title' => 'Success'
        ]
    ];


    $temples = [
        [
            'image' => 'popular-temples/tirumala-tirupati.webp',
            'name' => 'Tirumala Tirupati',
            'location' => 'Tirupati, Andhra Pradesh'
        ],
        [
            'image' => 'popular-temples/srisilam.webp',
            'name' => 'Srisailam Mallikarjuna',
            'location' => 'Srisailam, Andhra Pradesh'
        ],
        [
            'image' => 'popular-temples/kanaka-durga.webp',
            'name' => 'Kanaka Durga Temple',
            'location' => 'Vijayawada, Andhra Pradesh'
        ],
        [
            'image' => 'popular-temples/yadadri-lakshmi-narasimha.webp',
            'name' => 'Yadadri Lakshmi Narasimha',
            'location' => 'Yadadri, Telangana'
        ]
    ];


    $priests = [
        [
            'image' => 'priests/priest-1.webp',
            'name' => 'Sri Venkatesh Sharma',
            'speciality' => 'Vedic Rituals',
            'experience' => '18+ Years',
            'rating' => '4.9'
        ],
        [
            'image' => 'priests/priest-2.webp',
            'name' => 'Sri Ramesh Shastri',
            'speciality' => 'Homams & Poojas',
            'experience' => '15+ Years',
            'rating' => '4.9'
        ],
        [
            'image' => 'priests/priest-3.webp',
            'name' => 'Sri Suresh Bhatt',
            'speciality' => 'Temple Rituals',
            'experience' => '20+ Years',
            'rating' => '4.8'
        ],
        [
            'image' => 'priests/priest-4.webp',
            'name' => 'Sri Anand Sharma',
            'speciality' => 'Vedic Astrology',
            'experience' => '16+ Years',
            'rating' => '4.9'
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


    $products = [
        [
            'image' => 'pooja-samagri/pooja-samagri.webp',
            'name' => 'Pooja Kit',
            'price' => '₹499'
        ],
        [
            'image' => 'pooja-samagri/brassdiya-set.webp',
            'name' => 'Brass Diya Set',
            'price' => '₹699'
        ],
        [
            'image' => 'pooja-samagri/pancha-patra-set.webp',
            'name' => 'Panchapatra Set',
            'price' => '₹899'
        ],
        [
            'image' => 'pooja-samagri/premium-pooja-box.webp',
            'name' => 'Premium Pooja Box',
            'price' => '₹1,299'
        ]
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
            'image' => 'blog-1.jpg',
            'title' => 'Why Ganapathi Homam Is Performed',
            'category' => 'Pooja Knowledge'
        ],
        [
            'image' => 'blog-2.jpg',
            'title' => 'Understanding the Importance of Ekadashi',
            'category' => 'Festivals'
        ],
        [
            'image' => 'blog-3.jpg',
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

    <div class="container py-5">

        <div class="row">

            <div class="col-12 col-lg-7">

                <span
                    class="badge
                           rounded-pill
                           bg-white
                           text-pn-primary
                           border
                           border-warning-subtle
                           px-3
                           py-2
                           mb-4"
                >

                    <i class="bi bi-stars me-1"></i>

                    A SIMPLER WAY TO EXPERIENCE DEVOTION

                </span>


                <h1
                    class="pn-hero-title
                           font-serif
                           fw-normal
                           text-pn-brown
                           mb-4"
                >

                    Your sacred journey,

                    <span
                        class="pn-hero-accent
                               d-block
                               fw-semibold"
                    >
                        beautifully connected.
                    </span>

                </h1>


                <p
                    class="lead
                           text-pn-brown
                           col-lg-10
                           mb-4"
                >

                    Discover authentic poojas, trusted priests,
                    sacred temples and meaningful digital
                    experiences — all in one place.

                </p>


                {{-- Search --}}

                <div class="pn-search">

                    <form
                        action="#"
                        method="GET"
                    >

                        <div
                            class="bg-white
                                   rounded-3
                                   border
                                   shadow-sm
                                   p-2"
                        >

                            <div class="row g-2">

                                <div class="col-12 col-md">

                                    <div
                                        class="input-group
                                               input-group-lg"
                                    >

                                        <span
                                            class="input-group-text
                                                   bg-transparent
                                                   border-0"
                                        >

                                            <i
                                                class="bi bi-search
                                                       text-pn-primary"
                                            ></i>

                                        </span>


                                        <input
                                            type="search"
                                            name="search"
                                            value="{{ request('search') }}"
                                            class="form-control
                                                   border-0
                                                   shadow-none"
                                            placeholder="Search pooja, temple, priest..."
                                            aria-label="Search"
                                        >

                                    </div>

                                </div>


                                <div class="col-12 col-md-auto">

                                    <button
                                        type="submit"
                                        class="btn
                                               btn-pn
                                               btn-lg
                                               w-100
                                               px-4"
                                    >

                                        Explore

                                        <i
                                            class="bi bi-arrow-right ms-2"
                                        ></i>

                                    </button>

                                </div>

                            </div>

                        </div>

                    </form>

                </div>


                {{-- Benefits --}}

                <div
                    class="d-flex
                           flex-wrap
                           gap-4
                           mt-4"
                >

                    <span class="small">

                        <i
                            class="bi bi-check-circle-fill
                                   text-pn-primary
                                   me-1"
                        ></i>

                        Authentic

                    </span>


                    <span class="small">

                        <i
                            class="bi bi-check-circle-fill
                                   text-pn-primary
                                   me-1"
                        ></i>

                        Trusted

                    </span>


                    <span class="small">

                        <i
                            class="bi bi-check-circle-fill
                                   text-pn-primary
                                   me-1"
                        ></i>

                        Convenient

                    </span>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- ============================================================
     SERVICE CATEGORIES
============================================================ --}}

<section class="py-5 bg-pn-cream">

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
                        href="#"
                        class="pn-service-card
                               card
                               border-0
                               rounded-4
                               bg-white
                               h-100
                               text-center
                               p-3
                               text-pn-brown"
                    >

                        <div class="card-body p-2">

                            <div
                                class="icon-circle-58
                                       mx-auto
                                       d-flex
                                       align-items-center
                                       justify-content-center
                                       rounded-circle
                                       bg-pn-beige
                                       text-pn-primary
                                       fs-3
                                       mb-3"
                            >

                                <i
                                    class="bi {{ $service['icon'] }}"
                                ></i>

                            </div>


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

<section class="py-5">

    <div class="container py-lg-4">

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
                    class="pn-section-label
                           text-uppercase
                           text-pn-gold
                           small
                           fw-semibold"
                >
                    Discover
                </span>


                <h2
                    class="font-serif
                           display-6
                           text-pn-brown
                           mt-2
                           mb-2"
                >
                    Popular Poojas
                </h2>


                <div class="pn-divider"></div>

            </div>


            <a
                href="#"
                class="btn btn-pn-outline"
            >

                View All

                <i class="bi bi-arrow-right ms-2"></i>

            </a>

        </div>


        <div class="row g-4">

            @foreach($poojas as $pooja)

                <div class="col-12 col-sm-6 col-lg-3">

                    <article
                        class="pn-pooja-card
                               card
                               h-100
                               border-0
                               rounded-4
                               overflow-hidden
                               bg-white"
                    >

                        <img
                            src="{{ asset('images/home/' . $pooja['image']) }}"
                            class="pn-pooja-image
                                   card-img-top"
                            alt="{{ $pooja['name'] }}"
                            loading="lazy"
                        >


                        <div class="card-body p-4">

                            <div
                                class="d-flex
                                       justify-content-between
                                       align-items-center
                                       mb-3"
                            >

                                <span
                                    class="small
                                           text-pn-primary
                                           fw-semibold"
                                >

                                    {{ $pooja['category'] }}

                                </span>


                                <span class="small">

                                    <i
                                        class="bi bi-star-fill
                                               text-pn-gold"
                                    ></i>

                                    {{ $pooja['rating'] }}

                                </span>

                            </div>


                            <h5
                                class="font-serif
                                       text-pn-brown
                                       fw-semibold"
                            >

                                {{ $pooja['name'] }}

                            </h5>


                            <p
                                class="small
                                       text-secondary
                                       mb-4"
                            >

                                {{ $pooja['description'] }}

                            </p>


                            <div
                                class="d-flex
                                       justify-content-between
                                       align-items-end
                                       gap-2"
                            >

                                <div>

                                    <small
                                        class="text-secondary
                                               d-block"
                                    >
                                        From
                                    </small>


                                    <strong
                                        class="fs-5
                                               text-pn-brown"
                                    >

                                        {{ $pooja['price'] }}

                                    </strong>

                                </div>


                                <div class="text-end">

                                    <small
                                        class="d-block
                                               text-secondary
                                               mb-2"
                                    >

                                        <i
                                            class="bi bi-clock me-1"
                                        ></i>

                                        {{ $pooja['duration'] }}

                                    </small>


                                    <a
                                        href="#"
                                        class="btn btn-pn btn-sm"
                                    >
                                        Book
                                    </a>

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
     OCCASIONS
============================================================ --}}

<section class="bg-pn-cream py-5">

    <div class="container py-lg-4">

        <div class="text-center mb-5">

            <span
                class="pn-section-label
                       text-uppercase
                       text-pn-gold
                       fw-semibold
                       small"
            >
                Special Moments
            </span>


            <h2
                class="font-serif
                       display-6
                       text-pn-brown
                       mt-2"
            >
                Poojas for Every Occasion
            </h2>


            <div class="pn-divider mx-auto my-3"></div>


            <p
                class="text-secondary
                       mx-auto
                       col-lg-6"
            >
                Mark life's meaningful moments with prayers,
                blessings and beautiful traditions.
            </p>

        </div>


        <div
            class="row
                   row-cols-2
                   row-cols-md-3
                   row-cols-lg-6
                   g-3"
        >

            @foreach($occasions as $occasion)

                <div class="col">

                    <a
                        href="#"
                        class="card
                               border-0
                               bg-white
                               rounded-4
                               h-100
                               text-center
                               p-3
                               text-pn-brown"
                    >

                        <div class="card-body">

                            <div
                                class="pn-occasion-icon
                                       mx-auto
                                       d-flex
                                       align-items-center
                                       justify-content-center
                                       rounded-circle
                                       bg-pn-beige
                                       text-pn-primary
                                       fs-3
                                       mb-3"
                            >

                                <i
                                    class="bi {{ $occasion['icon'] }}"
                                ></i>

                            </div>


                            <h6 class="fw-semibold mb-0">

                                {{ $occasion['title'] }}

                            </h6>

                        </div>

                    </a>

                </div>

            @endforeach

        </div>

    </div>

</section>


{{-- ============================================================
     POPULAR TEMPLES
============================================================ --}}

<section class="bg-pn-cream py-5">

    <div class="container py-lg-4">

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
                    class="pn-section-label
                           text-uppercase
                           text-pn-gold
                           small
                           fw-semibold"
                >
                    Sacred Destinations
                </span>


                <h2
                    class="font-serif
                           display-6
                           text-pn-brown
                           mt-2
                           mb-2"
                >
                    Popular Temples
                </h2>


                <div class="pn-divider"></div>

            </div>


            <a
                href="#"
                class="btn btn-pn-outline"
            >

                Explore Temples

                <i class="bi bi-arrow-right ms-2"></i>

            </a>

        </div>


        <div class="row g-4">

            @foreach($temples as $temple)

                <div class="col-12 col-sm-6 col-lg-3">

                    <article
                        class="card
                               border-0
                               rounded-4
                               overflow-hidden
                               bg-white
                               h-100"
                    >

                        <img
                            src="{{ asset('images/home/' . $temple['image']) }}"
                            class="pn-temple-image
                                   card-img-top"
                            alt="{{ $temple['name'] }}"
                            loading="lazy"
                        >


                        <div class="card-body p-4">

                            <h5
                                class="font-serif
                                       text-pn-brown
                                       mb-2"
                            >

                                {{ $temple['name'] }}

                            </h5>


                            <p
                                class="small
                                       text-secondary
                                       mb-3"
                            >

                                <i
                                    class="bi bi-geo-alt
                                           text-pn-primary
                                           me-1"
                                ></i>

                                {{ $temple['location'] }}

                            </p>


                            <a
                                href="#"
                                class="small
                                       fw-semibold
                                       text-pn-primary"
                            >

                                View Temple

                                <i
                                    class="bi bi-arrow-right ms-1"
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
     POPULAR PRIESTS
============================================================ --}}

<section class="py-5">

    <div class="container py-lg-4">

        <div class="text-center mb-5">

            <span
                class="pn-section-label
                       text-uppercase
                       text-pn-gold
                       small
                       fw-semibold"
            >
                Experienced & Trusted
            </span>


            <h2
                class="font-serif
                       display-6
                       text-pn-brown
                       mt-2"
            >
                Our Trusted Priests
            </h2>


            <div class="pn-divider mx-auto my-3"></div>


            <p
                class="text-secondary
                       col-lg-6
                       mx-auto"
            >

                Experienced priests committed to performing
                every ritual with devotion and authenticity.

            </p>

        </div>


        <div class="row g-4">

            @foreach($priests as $priest)

                <div class="col-12 col-sm-6 col-lg-3">

                    <article
                        class="card
                               border
                               border-warning-subtle
                               rounded-4
                               h-100
                               text-center
                               p-3"
                    >

                        <img
                            src="{{ asset('images/home/' . $priest['image']) }}"
                            class="rounded-circle
                                   mx-auto
                                   object-fit-cover"
                            style="width:120px;height:120px;"
                            alt="{{ $priest['name'] }}"
                            loading="lazy"
                        >


                        <div class="card-body">

                            <h5
                                class="font-serif
                                       text-pn-brown"
                            >

                                {{ $priest['name'] }}

                            </h5>


                            <p
                                class="small
                                       text-secondary
                                       mb-2"
                            >

                                {{ $priest['speciality'] }}

                            </p>


                            <span
                                class="badge
                                       rounded-pill
                                       bg-pn-beige
                                       text-pn-primary"
                            >

                                {{ $priest['experience'] }}

                            </span>


                            <div class="mt-3">

                                <span class="small">

                                    <i
                                        class="bi bi-star-fill
                                               text-pn-gold"
                                    ></i>

                                    {{ $priest['rating'] }}

                                </span>

                            </div>

                        </div>

                    </article>

                </div>

            @endforeach

        </div>

    </div>

</section>


{{-- ============================================================
     DIGITAL POOJA
============================================================ --}}

<section class="py-5">

    <div class="container py-lg-4">

        <div
            class="pn-digital
                   rounded-5
                   overflow-hidden
                   text-white"
        >

            <div class="row align-items-center">

                <div class="col-lg-6">

                    <div class="p-4 p-md-5">

                        <span
                            class="small
                                   text-warning
                                   fw-semibold
                                   text-uppercase"
                        >
                            Digital Pooja
                        </span>


                        <h2
                            class="font-serif
                                   display-6
                                   fw-normal
                                   mt-3
                                   mb-3"
                        >

                            Devotion,
                            wherever you are.

                        </h2>


                        <p
                            class="text-white-50
                                   mb-4"
                        >

                            Participate in sacred rituals,
                            receive blessings and stay connected
                            to your spiritual journey.

                        </p>


                        <a
                            href="#"
                            class="btn btn-warning
                                   text-dark
                                   fw-semibold
                                   px-4"
                        >

                            Explore Digital Pooja

                            <i
                                class="bi bi-arrow-right ms-2"
                            ></i>

                        </a>

                    </div>

                </div>


                <div class="col-lg-6">

                   <div class="w-100 h-100">

    <img
        src="{{ asset('images/home/hero.webp') }}"
        class="w-100 h-100 digital-pooja-image"
        alt="Digital Pooja"
        loading="lazy"
    >

</div>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- ============================================================
     ASTROLOGY
============================================================ --}}

<section class="py-5 bg-pn-beige">

    <div class="container py-lg-4">

        <div class="text-center mb-5">

            <span
                class="pn-section-label
                       text-uppercase
                       text-pn-gold
                       small
                       fw-semibold"
            >
                Divine Guidance
            </span>


            <h2
                class="font-serif
                       display-6
                       text-pn-brown
                       mt-2"
            >
                Explore Astrology
            </h2>


            <div class="pn-divider mx-auto my-3"></div>


            <p
                class="text-secondary
                       col-lg-6
                       mx-auto"
            >

                Discover traditional astrology services for
                guidance, clarity and meaningful decisions.

            </p>

        </div>


        <div
            class="row
                   row-cols-2
                   row-cols-md-3
                   row-cols-lg-6
                   g-3"
        >

            @foreach($astrologyServices as $service)

                <div class="col">

                    <a
                        href="#"
                        class="card
                               border-0
                               rounded-4
                               bg-white
                               h-100
                               text-center
                               p-3
                               text-pn-brown"
                    >

                        <div class="card-body">

                            <i
                                class="bi bi-stars
                                       display-6
                                       text-pn-primary"
                            ></i>


                            <h6
                                class="fw-semibold
                                       mt-3
                                       mb-0"
                            >

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

<section class="py-5">

    <div class="container py-lg-4">

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
                    class="pn-section-label
                           text-uppercase
                           text-pn-gold
                           small
                           fw-semibold"
                >
                    Sacred Essentials
                </span>


                <h2
                    class="font-serif
                           display-6
                           text-pn-brown
                           mt-2
                           mb-2"
                >
                    Pooja Samagri
                </h2>


                <div class="pn-divider"></div>

            </div>


            <a
                href="#"
                class="btn btn-pn-outline"
            >

                Visit Store

                <i class="bi bi-arrow-right ms-2"></i>

            </a>

        </div>


        <div class="row g-4">

            @foreach($products as $product)

                <div class="col-6 col-lg-3">

                    <article
                        class="card
                               border
                               border-warning-subtle
                               rounded-4
                               overflow-hidden
                               h-100"
                    >

                        <img
                            src="{{ asset('images/home/' . $product['image']) }}"
                            class="pn-pooja-image
                                   card-img-top"
                            alt="{{ $product['name'] }}"
                            loading="lazy"
                        >


                        <div class="card-body">

                            <h6 class="fw-semibold">

                                {{ $product['name'] }}

                            </h6>


                            <strong
                                class="text-pn-primary"
                            >

                                {{ $product['price'] }}

                            </strong>

                        </div>

                    </article>

                </div>

            @endforeach

        </div>

    </div>

</section>


{{-- ============================================================
     FESTIVAL OFFERS
============================================================ --}}

<section class="bg-pn-cream py-5">

    <div class="container">

        <div
            class="row
                   align-items-center
                   g-4"
        >

            <div class="col-lg-6">

                <span
                    class="badge
                           rounded-pill
                           bg-pn-beige
                           text-pn-primary
                           px-3
                           py-2"
                >

                    FESTIVAL SPECIAL

                </span>


                <h2
                    class="font-serif
                           display-6
                           text-pn-brown
                           mt-3"
                >

                    Celebrate every occasion
                    with divine blessings.

                </h2>


                <p class="text-secondary">

                    Explore special poojas and festive offerings
                    created for meaningful celebrations.

                </p>


                <a
                    href="#"
                    class="btn btn-pn mt-2"
                >

                    Explore Festival Poojas

                    <i
                        class="bi bi-arrow-right ms-2"
                    ></i>

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

</section>


{{-- ============================================================
     TESTIMONIALS
============================================================ --}}

<section class="py-5">

    <div class="container py-lg-4">

        <div class="text-center mb-5">

            <span
                class="pn-section-label
                       text-uppercase
                       text-pn-gold
                       small
                       fw-semibold"
            >

                Devotee Experiences

            </span>


            <h2
                class="font-serif
                       display-6
                       text-pn-brown
                       mt-2"
            >

                What Our Devotees Say

            </h2>


            <div class="pn-divider mx-auto my-3"></div>

        </div>


        <div class="row g-4">

            @foreach($testimonials as $testimonial)

                <div class="col-12 col-md-4">

                    <article
                        class="card
                               h-100
                               border
                               border-warning-subtle
                               rounded-4
                               p-3"
                    >

                        <div class="card-body">

                            <div class="mb-3">

                                @for($i = 0; $i < 5; $i++)

                                    <i
                                        class="bi bi-star-fill
                                               text-pn-gold"
                                    ></i>

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

<section class="bg-pn-cream py-5">

    <div class="container py-lg-4">

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
                    class="pn-section-label
                           text-uppercase
                           text-pn-gold
                           small
                           fw-semibold"
                >

                    Spiritual Knowledge

                </span>


                <h2
                    class="font-serif
                           display-6
                           text-pn-brown
                           mt-2
                           mb-2"
                >

                    From Our Blog

                </h2>


                <div class="pn-divider"></div>

            </div>


            <a
                href="#"
                class="btn btn-pn-outline"
            >

                View All Articles

            </a>

        </div>


        <div class="row g-4">

            @foreach($blogs as $blog)

                <div class="col-12 col-md-4">

                    <article
                        class="card
                               border-0
                               rounded-4
                               overflow-hidden
                               h-100"
                    >

                        <img
                            src="{{ asset('images/home/' . $blog['image']) }}"
                            class="pn-pooja-image
                                   card-img-top"
                            alt="{{ $blog['title'] }}"
                            loading="lazy"
                        >


                        <div class="card-body p-4">

                            <small
                                class="text-pn-primary
                                       fw-semibold"
                            >

                                {{ $blog['category'] }}

                            </small>


                            <h5
                                class="font-serif
                                       text-pn-brown
                                       mt-2"
                            >

                                {{ $blog['title'] }}

                            </h5>


                            <a
                                href="#"
                                class="small
                                       fw-semibold
                                       text-pn-primary"
                            >

                                Read Article

                                <i
                                    class="bi bi-arrow-right ms-1"
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
     FAQ
============================================================ --}}

<section class="py-5">

    <div class="container py-lg-4">

        <div class="row justify-content-center">

            <div class="col-lg-9">

                <div class="text-center mb-5">

                    <span
                        class="pn-section-label
                               text-uppercase
                               text-pn-gold
                               small
                               fw-semibold"
                    >

                        Need Help?

                    </span>


                    <h2
                        class="font-serif
                               display-6
                               text-pn-brown
                               mt-2"
                    >

                        Frequently Asked Questions

                    </h2>


                    <div class="pn-divider mx-auto my-3"></div>

                </div>


                <div
                    class="accordion"
                    id="homeFaq"
                >

                    @foreach($faqs as $index => $faq)

                        <div
                            class="accordion-item
                                   border
                                   border-warning-subtle
                                   rounded-3
                                   mb-3
                                   overflow-hidden"
                        >

                            <h2
                                class="accordion-header"
                                id="faqHeading{{ $index }}"
                            >

                                <button
                                    class="accordion-button
                                           {{ $index !== 0 ? 'collapsed' : '' }}
                                           bg-white
                                           fw-semibold"
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
                                class="accordion-collapse
                                       collapse
                                       {{ $index === 0 ? 'show' : '' }}"
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
     NEWSLETTER
============================================================ --}}

<section class="bg-pn-brown py-5">

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-lg-8 text-center text-white">

                <i
                    class="bi bi-envelope-paper
                           display-5
                           text-warning"
                ></i>


                <h2
                    class="font-serif
                           display-6
                           mt-3"
                >

                    Stay Connected With Divine Moments

                </h2>


                <p class="text-white-50">

                    Receive festival updates, spiritual articles,
                    special pooja offerings and more.

                </p>


                <form
                    action="#"
                    method="POST"
                    class="mt-4"
                >

                    <div
                        class="row
                               g-2
                               justify-content-center"
                    >

                        <div class="col-12 col-md-7">

                            <label
                                for="newsletterEmail"
                                class="visually-hidden"
                            >
                                Email address
                            </label>


                            <input
                                type="email"
                                id="newsletterEmail"
                                name="email"
                                class="form-control
                                       form-control-lg
                                       rounded-3"
                                placeholder="Enter your email address"
                                required
                            >

                        </div>


                        <div class="col-12 col-md-auto">

                            <button
                                type="submit"
                                class="btn
                                       btn-warning
                                       btn-lg
                                       w-100
                                       px-4"
                            >

                                Subscribe

                            </button>

                        </div>

                    </div>

                </form>

            </div>

        </div>

    </div>

</section>


{{-- ============================================================
     FINAL CTA
============================================================ --}}

<section class="py-5">

    <div class="container py-lg-4">

        <div
            class="bg-pn-cream
                   border
                   border-warning-subtle
                   rounded-5
                   text-center
                   p-4
                   p-md-5"
        >

            <i
                class="bi bi-flower1
                       display-5
                       text-pn-primary"
            ></i>


            <h2
                class="font-serif
                       display-6
                       text-pn-brown
                       mt-3"
            >

                Make every moment meaningful.

            </h2>


            <p
                class="text-secondary
                       col-lg-6
                       mx-auto"
            >

                Discover authentic spiritual experiences
                designed around your needs.

            </p>


            <a
                href="#"
                class="btn btn-pn px-4"
            >

                Explore Poojas

                <i
                    class="bi bi-arrow-right ms-2"
                ></i>

            </a>

        </div>

    </div>

</section>


@endsection