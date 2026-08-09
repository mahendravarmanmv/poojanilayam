@extends('layouts.app')

@section('title', 'Pooja Store | Pooja Nilayam')

@section(
    'meta_description',
    'Explore pooja samagri, devotional products and spiritual essentials from Pooja Nilayam.'
)

@section('content')

@php

    /*
    |--------------------------------------------------------------------------
    | TEMPORARY PRODUCT LISTING DATA
    |--------------------------------------------------------------------------
    | UI prototype only.
    |
    | Actual products, categories, brands, pricing, stock,
    | reviews and images will come from the backend later.
    |--------------------------------------------------------------------------
    */


    $categories = [

        [
            'name' => 'Pooja Samagri',
            'icon' => 'bi-flower1'
        ],

        [
            'name' => 'Idols',
            'icon' => 'bi-stars'
        ],

        [
            'name' => 'Incense & Dhoop',
            'icon' => 'bi-fire'
        ],

        [
            'name' => 'Pooja Essentials',
            'icon' => 'bi-box-seam'
        ],

        [
            'name' => 'Books & Guides',
            'icon' => 'bi-book'
        ],

        [
            'name' => 'Spiritual Gifts',
            'icon' => 'bi-gift'
        ]

    ];


    $products = [

        [
            'name' => 'Brass Pooja Diya',
            'category' => 'Pooja Essentials',
            'description' => 'Traditional brass diya for daily worship.',
            'price' => 299,
            'old_price' => 399,
            'rating' => 4.8,
            'reviews' => 84,
            'image' => 'images/home/hero.jpg',
            'badge' => 'Bestseller',
            'stock' => true
        ],

        [
            'name' => 'Premium Kumkum Set',
            'category' => 'Pooja Samagri',
            'description' => 'A traditional kumkum set for devotional rituals.',
            'price' => 199,
            'old_price' => 249,
            'rating' => 4.7,
            'reviews' => 61,
            'image' => 'images/home/hero.jpg',
            'badge' => 'Popular',
            'stock' => true
        ],

        [
            'name' => 'Sandalwood Dhoop',
            'category' => 'Incense & Dhoop',
            'description' => 'Fragrant sandalwood dhoop for your prayer space.',
            'price' => 249,
            'old_price' => 299,
            'rating' => 4.9,
            'reviews' => 112,
            'image' => 'images/home/hero.jpg',
            'badge' => 'Top Rated',
            'stock' => true
        ],

        [
            'name' => 'Lord Ganesha Idol',
            'category' => 'Idols',
            'description' => 'Beautiful devotional Ganesha idol for your home.',
            'price' => 799,
            'old_price' => 999,
            'rating' => 4.9,
            'reviews' => 147,
            'image' => 'images/home/hero.jpg',
            'badge' => 'Featured',
            'stock' => true
        ],

        [
            'name' => 'Daily Pooja Kit',
            'category' => 'Pooja Samagri',
            'description' => 'A convenient collection of everyday pooja essentials.',
            'price' => 599,
            'old_price' => 699,
            'rating' => 4.6,
            'reviews' => 53,
            'image' => 'images/home/hero.jpg',
            'badge' => '',
            'stock' => true
        ],

        [
            'name' => 'Bhagavad Gita',
            'category' => 'Books & Guides',
            'description' => 'A devotional edition for spiritual learning.',
            'price' => 399,
            'old_price' => 449,
            'rating' => 4.9,
            'reviews' => 95,
            'image' => 'images/home/hero.jpg',
            'badge' => 'Recommended',
            'stock' => true
        ],

        [
            'name' => 'Brass Bell',
            'category' => 'Pooja Essentials',
            'description' => 'Traditional brass bell for your prayer space.',
            'price' => 449,
            'old_price' => 549,
            'rating' => 4.7,
            'reviews' => 46,
            'image' => 'images/home/hero.jpg',
            'badge' => '',
            'stock' => true
        ],

        [
            'name' => 'Spiritual Gift Box',
            'category' => 'Spiritual Gifts',
            'description' => 'A thoughtfully arranged devotional gift collection.',
            'price' => 899,
            'old_price' => 1099,
            'rating' => 4.8,
            'reviews' => 38,
            'image' => 'images/home/hero.jpg',
            'badge' => 'Gift Choice',
            'stock' => true
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
                        Store
                    </a>

                </li>


                <li
                    class="breadcrumb-item active"
                    aria-current="page"
                >

                    Products

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
                   g-5"
        >

            <div class="col-12 col-lg-7">

                <span
                    class="small
                           text-pn-gold
                           fw-semibold
                           text-uppercase"
                >

                    Pooja Store

                </span>


                <h1
                    class="font-serif
                           display-3
                           text-pn-brown
                           mt-2
                           mb-3"
                >

                    Bring devotion
                    <span class="text-pn-primary">
                        home.
                    </span>

                </h1>


                <p
                    class="lead
                           text-secondary
                           mb-4"
                >

                    Discover pooja samagri, devotional essentials,
                    idols, books and thoughtful spiritual products
                    for your home and celebrations.

                </p>


                <div
                    class="d-flex
                           flex-column
                           flex-sm-row
                           gap-2"
                >

                    <a
                        href="#products"
                        class="btn
                               btn-pn
                               btn-lg"
                    >

                        Explore Products

                        <i
                            class="bi bi-arrow-down ms-2"
                        ></i>

                    </a>


                    <a
                        href="#categories"
                        class="btn
                               btn-pn-outline
                               btn-lg"
                    >

                        Browse Categories

                    </a>

                </div>


                <div
                    class="d-flex
                           flex-wrap
                           gap-4
                           mt-4"
                >

                    <div
                        class="d-flex
                               align-items-center
                               gap-2"
                    >

                        <i
                            class="bi bi-box-seam
                                   text-pn-primary"
                        ></i>


                        <small class="text-secondary">

                            Devotional essentials

                        </small>

                    </div>


                    <div
                        class="d-flex
                               align-items-center
                               gap-2"
                    >

                        <i
                            class="bi bi-heart
                                   text-pn-primary"
                        ></i>


                        <small class="text-secondary">

                            Curated with devotion

                        </small>

                    </div>

                </div>

            </div>


            <div class="col-12 col-lg-5">

                <div
                    class="pn-digital
                           rounded-5
                           overflow-hidden
                           position-relative"
                >

                    <div class="ratio ratio-4x3">

                        <img
                            src="{{ asset('images/home/hero.jpg') }}"
                            class="object-fit-cover"
                            alt="Pooja store products"
                            loading="eager"
                        >

                    </div>


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

                            Sacred Essentials

                        </span>


                        <h2
                            class="font-serif
                                   h2
                                   mt-2
                                   mb-0"
                        >

                            Everything you need
                            for your sacred space.

                        </h2>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- ============================================================
     STORE TRUST BAR
============================================================ --}}

<section class="py-4 border-bottom">

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
                           gap-2
                           justify-content-center
                           justify-content-md-start"
                >

                    <i
                        class="bi bi-shield-check
                               text-pn-primary
                               fs-5"
                    ></i>


                    <small class="text-secondary">

                        Trusted Shopping

                    </small>

                </div>

            </div>


            <div class="col">

                <div
                    class="d-flex
                           align-items-center
                           gap-2
                           justify-content-center
                           justify-content-md-start"
                >

                    <i
                        class="bi bi-truck
                               text-pn-primary
                               fs-5"
                    ></i>


                    <small class="text-secondary">

                        Reliable Delivery

                    </small>

                </div>

            </div>


            <div class="col">

                <div
                    class="d-flex
                           align-items-center
                           gap-2
                           justify-content-center
                           justify-content-md-start"
                >

                    <i
                        class="bi bi-credit-card
                               text-pn-primary
                               fs-5"
                    ></i>


                    <small class="text-secondary">

                        Secure Payment

                    </small>

                </div>

            </div>


            <div class="col">

                <div
                    class="d-flex
                           align-items-center
                           gap-2
                           justify-content-center
                           justify-content-md-start"
                >

                    <i
                        class="bi bi-headset
                               text-pn-primary
                               fs-5"
                    ></i>


                    <small class="text-secondary">

                        Customer Support

                    </small>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- ============================================================
     CATEGORIES
============================================================ --}}

<section
    id="categories"
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
                   mb-4"
        >

            <div>

                <span
                    class="small
                           text-pn-gold
                           fw-semibold
                           text-uppercase"
                >

                    Shop by Category

                </span>


                <h2
                    class="font-serif
                           display-6
                           text-pn-brown
                           mt-2
                           mb-2"
                >

                    Explore sacred essentials

                </h2>


                <p
                    class="text-secondary
                           mb-0"
                >

                    Find products for your pooja, prayer space
                    and spiritual needs.

                </p>

            </div>


            <a
                href="#products"
                class="btn
                       btn-pn-outline
                       align-self-start
                       align-self-md-auto"
            >

                View All

                <i
                    class="bi bi-arrow-right ms-2"
                ></i>

            </a>

        </div>


        <div
            class="row
                   row-cols-2
                   row-cols-md-3
                   row-cols-lg-6
                   g-3"
        >

            @foreach($categories as $category)

                <div class="col">

                    <a
                        href="#products"
                        class="text-decoration-none"
                    >

                        <div
                            class="border
                                   border-warning-subtle
                                   rounded-4
                                   p-3
                                   p-md-4
                                   h-100
                                   text-center
                                   bg-white"
                        >

                            <div
                                class="rounded-circle
                                       bg-pn-cream
                                       text-pn-primary
                                       d-flex
                                       align-items-center
                                       justify-content-center
                                       mx-auto
                                       mb-3"
                                style="width:56px;height:56px;"
                            >

                                <i
                                    class="bi {{ $category['icon'] }}
                                           fs-5"
                                ></i>

                            </div>


                            <h3
                                class="font-serif
                                       h6
                                       text-pn-brown
                                       mb-0"
                            >

                                {{ $category['name'] }}

                            </h3>

                        </div>

                    </a>

                </div>

            @endforeach

        </div>

    </div>

</section>


{{-- ============================================================
     PRODUCT LISTING
============================================================ --}}

<section
    id="products"
    class="py-5 bg-pn-cream"
>

    <div class="container">

        {{-- Section Header --}}

        <div
            class="row
                   align-items-end
                   g-3
                   mb-4"
        >

            <div class="col-12 col-lg-7">

                <span
                    class="small
                           text-pn-gold
                           fw-semibold
                           text-uppercase"
                >

                    Our Collection

                </span>


                <h2
                    class="font-serif
                           display-6
                           text-pn-brown
                           mt-2
                           mb-2"
                >

                    Sacred products for every occasion

                </h2>


                <p
                    class="text-secondary
                           mb-0"
                >

                    Browse our collection of devotional products
                    and pooja essentials.

                </p>

            </div>


            <div class="col-12 col-lg-5">

                <div
                    class="d-flex
                           gap-2
                           justify-content-lg-end"
                >

                    <button
                        type="button"
                        class="btn
                               btn-pn-outline
                               d-lg-none"
                        data-bs-toggle="offcanvas"
                        data-bs-target="#productFilters"
                        aria-controls="productFilters"
                    >

                        <i class="bi bi-funnel me-1"></i>

                        Filters

                    </button>


                    <div
                        class="input-group
                               flex-grow-1
                               flex-lg-grow-0"
                        style="max-width:340px;"
                    >

                        <span class="input-group-text bg-white">

                            <i class="bi bi-search"></i>

                        </span>


                        <input
                            type="search"
                            class="form-control"
                            placeholder="Search products..."
                            aria-label="Search products"
                        >

                    </div>

                </div>

            </div>

        </div>


        <div class="row g-4">

            {{-- ====================================================
                 DESKTOP FILTER SIDEBAR
            ===================================================== --}}

            <div
                class="col-lg-3
                       d-none
                       d-lg-block"
            >

                <aside
                    class="card
                           border
                           border-warning-subtle
                           rounded-4
                           bg-white
                           sticky-top"
                    style="top:90px;"
                >

                    <div class="card-body p-4">

                        <div
                            class="d-flex
                                   align-items-center
                                   justify-content-between
                                   mb-4"
                        >

                            <h3
                                class="font-serif
                                       h5
                                       text-pn-brown
                                       mb-0"
                            >

                                Filters

                            </h3>


                            <button
                                type="button"
                                class="btn
                                       btn-link
                                       btn-sm
                                       text-pn-primary
                                       p-0"
                            >

                                Clear

                            </button>

                        </div>


                        {{-- Category Filter --}}

                        <div class="mb-4">

                            <h4
                                class="small
                                       fw-semibold
                                       text-pn-brown
                                       mb-3"
                            >

                                Category

                            </h4>


                            <div class="vstack gap-2">

                                @foreach($categories as $index => $category)

                                    <div class="form-check">

                                        <input
                                            class="form-check-input"
                                            type="checkbox"
                                            value="{{ $category['name'] }}"
                                            id="category{{ $index }}"
                                        >


                                        <label
                                            class="form-check-label
                                                   small
                                                   text-secondary"
                                            for="category{{ $index }}"
                                        >

                                            {{ $category['name'] }}

                                        </label>

                                    </div>

                                @endforeach

                            </div>

                        </div>


                        <hr
                            class="border-warning-subtle"
                        >


                        {{-- Price Filter --}}

                        <div class="mb-4">

                            <h4
                                class="small
                                       fw-semibold
                                       text-pn-brown
                                       mb-3"
                            >

                                Price Range

                            </h4>


                            <div
                                class="d-flex
                                       align-items-center
                                       gap-2"
                            >

                                <input
                                    type="number"
                                    class="form-control form-control-sm"
                                    placeholder="Min"
                                    aria-label="Minimum price"
                                >


                                <span class="text-secondary">

                                    –

                                </span>


                                <input
                                    type="number"
                                    class="form-control form-control-sm"
                                    placeholder="Max"
                                    aria-label="Maximum price"
                                >

                            </div>

                        </div>


                        <hr
                            class="border-warning-subtle"
                        >


                        {{-- Rating Filter --}}

                        <div>

                            <h4
                                class="small
                                       fw-semibold
                                       text-pn-brown
                                       mb-3"
                            >

                                Customer Rating

                            </h4>


                            <div class="vstack gap-2">

                                @foreach([4, 3, 2] as $rating)

                                    <div class="form-check">

                                        <input
                                            class="form-check-input"
                                            type="radio"
                                            name="rating"
                                            id="rating{{ $rating }}"
                                        >


                                        <label
                                            class="form-check-label
                                                   small"
                                            for="rating{{ $rating }}"
                                        >

                                            <span class="text-warning">

                                                @for($star = 1; $star <= 5; $star++)

                                                    @if($star <= $rating)

                                                        <i
                                                            class="bi bi-star-fill"
                                                        ></i>

                                                    @else

                                                        <i
                                                            class="bi bi-star"
                                                        ></i>

                                                    @endif

                                                @endfor

                                            </span>


                                            <span class="text-secondary">

                                                & up

                                            </span>

                                        </label>

                                    </div>

                                @endforeach

                            </div>

                        </div>

                    </div>

                </aside>

            </div>


            {{-- ====================================================
                 PRODUCTS
            ===================================================== --}}

            <div class="col-12 col-lg-9">

                <div
                    class="d-flex
                           align-items-center
                           justify-content-between
                           gap-3
                           mb-4"
                >

                    <small class="text-secondary">

                        Showing
                        <strong class="text-pn-brown">
                            {{ count($products) }}
                        </strong>
                        products

                    </small>


                    <div class="d-flex align-items-center gap-2">

                        <label
                            for="sortProducts"
                            class="small
                                   text-secondary
                                   d-none
                                   d-sm-block"
                        >

                            Sort by

                        </label>


                        <select
                            id="sortProducts"
                            class="form-select
                                   form-select-sm"
                            style="width:auto;"
                        >

                            <option selected>
                                Recommended
                            </option>

                            <option>
                                Newest
                            </option>

                            <option>
                                Price: Low to High
                            </option>

                            <option>
                                Price: High to Low
                            </option>

                            <option>
                                Top Rated
                            </option>

                        </select>

                    </div>

                </div>


                <div
                    class="row
                           row-cols-1
                           row-cols-sm-2
                           row-cols-xl-3
                           g-4"
                >

                    @foreach($products as $product)

                        <div class="col">

                            <article
                                class="card
                                       border
                                       border-warning-subtle
                                       rounded-4
                                       h-100
                                       overflow-hidden
                                       bg-white"
                            >

                                {{-- Product Image --}}

                                <div
                                    class="position-relative"
                                >

                                    <div class="ratio ratio-1x1">

                                        <img
                                            src="{{ asset($product['image']) }}"
                                            class="object-fit-cover"
                                            alt="{{ $product['name'] }}"
                                            loading="lazy"
                                        >

                                    </div>


                                    @if($product['badge'])

                                        <span
                                            class="position-absolute
                                                   top-0
                                                   start-0
                                                   m-3
                                                   badge
                                                   rounded-pill
                                                   bg-pn-primary"
                                        >

                                            {{ $product['badge'] }}

                                        </span>

                                    @endif


                                    {{-- Wishlist --}}

                                    <button
                                        type="button"
                                        class="btn
                                               btn-light
                                               rounded-circle
                                               shadow-sm
                                               position-absolute
                                               top-0
                                               end-0
                                               m-3"
                                        aria-label="Add {{ $product['name'] }} to wishlist"
                                    >

                                        <i class="bi bi-heart"></i>

                                    </button>

                                </div>


                                {{-- Product Content --}}

                                <div
                                    class="card-body
                                           p-4
                                           d-flex
                                           flex-column"
                                >

                                    <small
                                        class="text-pn-primary
                                               fw-semibold
                                               mb-2"
                                    >

                                        {{ $product['category'] }}

                                    </small>


                                    <h3
                                        class="font-serif
                                               h5
                                               text-pn-brown
                                               mb-2"
                                    >

                                        {{ $product['name'] }}

                                    </h3>


                                    <p
                                        class="small
                                               text-secondary
                                               mb-3"
                                    >

                                        {{ $product['description'] }}

                                    </p>


                                    {{-- Rating --}}

                                    <div
                                        class="d-flex
                                               align-items-center
                                               gap-2
                                               mb-3"
                                    >

                                        <span
                                            class="small
                                                   fw-semibold
                                                   text-pn-brown"
                                        >

                                            <i
                                                class="bi bi-star-fill
                                                       text-warning"
                                            ></i>

                                            {{ $product['rating'] }}

                                        </span>


                                        <small class="text-secondary">

                                            ({{ $product['reviews'] }})

                                        </small>

                                    </div>


                                    <div class="mt-auto">

                                        {{-- Price --}}

                                        <div
                                            class="d-flex
                                                   align-items-center
                                                   gap-2
                                                   mb-3"
                                        >

                                            <strong
                                                class="fs-5
                                                       text-pn-brown"
                                            >

                                                ₹{{ number_format($product['price']) }}

                                            </strong>


                                            <del
                                                class="small
                                                       text-secondary"
                                            >

                                                ₹{{ number_format($product['old_price']) }}

                                            </del>

                                        </div>


                                        {{-- Action --}}

                                        <div
                                            class="d-flex
                                                   gap-2"
                                        >

                                            <a
                                                href="#"
                                                class="btn
                                                       btn-pn-outline
                                                       flex-grow-1"
                                            >

                                                View

                                            </a>


                                            @if($product['stock'])

                                                <button
                                                    type="button"
                                                    class="btn
                                                           btn-pn
                                                           px-3"
                                                    aria-label="Add {{ $product['name'] }} to cart"
                                                >

                                                    <i
                                                        class="bi bi-bag-plus"
                                                    ></i>

                                                </button>

                                            @else

                                                <button
                                                    type="button"
                                                    class="btn
                                                           btn-secondary
                                                           px-3"
                                                    disabled
                                                >

                                                    Out of Stock

                                                </button>

                                            @endif

                                        </div>

                                    </div>

                                </div>

                            </article>

                        </div>

                    @endforeach

                </div>


                {{-- ====================================================
                     PAGINATION
                ===================================================== --}}

                <nav
                    class="mt-5"
                    aria-label="Product pagination"
                >

                    <ul
                        class="pagination
                               justify-content-center
                               mb-0"
                    >

                        <li class="page-item disabled">

                            <span class="page-link">

                                <i class="bi bi-chevron-left"></i>

                            </span>

                        </li>


                        <li
                            class="page-item active"
                            aria-current="page"
                        >

                            <span class="page-link">

                                1

                            </span>

                        </li>


                        <li class="page-item">

                            <a
                                class="page-link"
                                href="#"
                            >
                                2
                            </a>

                        </li>


                        <li class="page-item">

                            <a
                                class="page-link"
                                href="#"
                            >
                                3
                            </a>

                        </li>


                        <li class="page-item">

                            <a
                                class="page-link"
                                href="#"
                            >

                                <i class="bi bi-chevron-right"></i>

                            </a>

                        </li>

                    </ul>

                </nav>

            </div>

        </div>

    </div>

</section>


{{-- ============================================================
     MOBILE FILTER OFFCANVAS
============================================================ --}}

<div
    class="offcanvas
           offcanvas-start"
    tabindex="-1"
    id="productFilters"
    aria-labelledby="productFiltersLabel"
>

    <div class="offcanvas-header">

        <h2
            class="offcanvas-title
                   font-serif
                   h4
                   text-pn-brown"
            id="productFiltersLabel"
        >

            Filters

        </h2>


        <button
            type="button"
            class="btn-close"
            data-bs-dismiss="offcanvas"
            aria-label="Close"
        ></button>

    </div>


    <div class="offcanvas-body">

        <div class="mb-4">

            <h3
                class="small
                       fw-semibold
                       text-pn-brown
                       mb-3"
            >

                Category

            </h3>


            <div class="vstack gap-2">

                @foreach($categories as $index => $category)

                    <div class="form-check">

                        <input
                            class="form-check-input"
                            type="checkbox"
                            id="mobileCategory{{ $index }}"
                        >


                        <label
                            class="form-check-label
                                   small"
                            for="mobileCategory{{ $index }}"
                        >

                            {{ $category['name'] }}

                        </label>

                    </div>

                @endforeach

            </div>

        </div>


        <hr>


        <div class="mb-4">

            <h3
                class="small
                       fw-semibold
                       text-pn-brown
                       mb-3"
            >

                Price Range

            </h3>


            <div
                class="d-flex
                       gap-2"
            >

                <input
                    type="number"
                    class="form-control"
                    placeholder="Min"
                >


                <input
                    type="number"
                    class="form-control"
                    placeholder="Max"
                >

            </div>

        </div>


        <hr>


        <div>

            <h3
                class="small
                       fw-semibold
                       text-pn-brown
                       mb-3"
            >

                Customer Rating

            </h3>


            <div class="vstack gap-2">

                @foreach([4, 3, 2] as $rating)

                    <div class="form-check">

                        <input
                            class="form-check-input"
                            type="radio"
                            name="mobileRating"
                            id="mobileRating{{ $rating }}"
                        >


                        <label
                            class="form-check-label
                                   small"
                            for="mobileRating{{ $rating }}"
                        >

                            <span class="text-warning">

                                @for($star = 1; $star <= 5; $star++)

                                    @if($star <= $rating)

                                        <i class="bi bi-star-fill"></i>

                                    @else

                                        <i class="bi bi-star"></i>

                                    @endif

                                @endfor

                            </span>


                            & up

                        </label>

                    </div>

                @endforeach

            </div>

        </div>


        <div class="d-grid mt-5">

            <button
                type="button"
                class="btn btn-pn"
                data-bs-dismiss="offcanvas"
            >

                Apply Filters

            </button>

        </div>

    </div>

</div>


{{-- ============================================================
     SHOPPING CTA
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
                    class="bi bi-bag-heart
                           display-5
                           text-warning"
                ></i>


                <h2
                    class="font-serif
                           display-6
                           mt-3"
                >

                    Find something meaningful
                    for your sacred space.

                </h2>


                <p
                    class="text-white-50
                           col-lg-7
                           mx-auto
                           mb-4"
                >

                    Explore devotional essentials selected for
                    everyday worship, festivals and thoughtful
                    spiritual gifting.

                </p>


                <a
                    href="#products"
                    class="btn
                           btn-warning
                           text-dark
                           fw-semibold
                           px-4"
                >

                    Continue Shopping

                    <i
                        class="bi bi-arrow-right ms-2"
                    ></i>

                </a>

            </div>

        </div>

    </div>

</section>

@endsection