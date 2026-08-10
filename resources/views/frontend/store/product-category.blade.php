@extends('layouts.app')

@section('title', 'Pooja Samagri | Pooja Nilayam Store')

@section(
    'meta_description',
    'Explore pooja samagri and devotional essentials from Pooja Nilayam.'
)

@section('content')

@php

    /*
    |--------------------------------------------------------------------------
    | TEMPORARY CATEGORY DATA
    |--------------------------------------------------------------------------
    | UI prototype only.
    | These values will later come from the Product Category model.
    |--------------------------------------------------------------------------
    */

    $category = [

        'name' => 'Pooja Samagri',

        'slug' => 'pooja-samagri',

        'description' =>
            'Discover thoughtfully selected pooja essentials
             for daily worship, festivals and sacred occasions.',

        'image' => 'images/home/hero.jpg',

        'product_count' => 48

    ];


    /*
    |--------------------------------------------------------------------------
    | TEMPORARY SUB-CATEGORIES
    |--------------------------------------------------------------------------
    */

    $subCategories = [

        [
            'name' => 'Daily Pooja Essentials',
            'icon' => 'bi-flower1',
            'count' => 14
        ],

        [
            'name' => 'Diyas & Lamps',
            'icon' => 'bi-lightbulb',
            'count' => 8
        ],

        [
            'name' => 'Kumkum & Chandan',
            'icon' => 'bi-droplet',
            'count' => 7
        ],

        [
            'name' => 'Incense & Dhoop',
            'icon' => 'bi-fire',
            'count' => 9
        ],

        [
            'name' => 'Pooja Accessories',
            'icon' => 'bi-box-seam',
            'count' => 6
        ],

        [
            'name' => 'Festival Pooja Kits',
            'icon' => 'bi-stars',
            'count' => 4
        ]

    ];


    /*
    |--------------------------------------------------------------------------
    | TEMPORARY PRODUCTS
    |--------------------------------------------------------------------------
    */

    $products = [

        [
            'name' => 'Premium Brass Diya',
            'category' => 'Diyas & Lamps',
            'price' => 299,
            'old_price' => 399,
            'rating' => 4.9,
            'reviews' => 84,
            'image' => 'images/home/hero.jpg',
            'badge' => 'Bestseller'
        ],

        [
            'name' => 'Daily Pooja Essentials Kit',
            'category' => 'Daily Pooja Essentials',
            'price' => 599,
            'old_price' => 699,
            'rating' => 4.8,
            'reviews' => 67,
            'image' => 'images/home/hero.jpg',
            'badge' => 'Popular'
        ],

        [
            'name' => 'Premium Kumkum Set',
            'category' => 'Kumkum & Chandan',
            'price' => 199,
            'old_price' => 249,
            'rating' => 4.7,
            'reviews' => 53,
            'image' => 'images/home/hero.jpg',
            'badge' => ''
        ],

        [
            'name' => 'Sandalwood Dhoop',
            'category' => 'Incense & Dhoop',
            'price' => 249,
            'old_price' => 299,
            'rating' => 4.9,
            'reviews' => 112,
            'image' => 'images/home/hero.jpg',
            'badge' => 'Top Rated'
        ],

        [
            'name' => 'Traditional Pooja Bell',
            'category' => 'Pooja Accessories',
            'price' => 449,
            'old_price' => 549,
            'rating' => 4.7,
            'reviews' => 46,
            'image' => 'images/home/hero.jpg',
            'badge' => ''
        ],

        [
            'name' => 'Festival Pooja Kit',
            'category' => 'Festival Pooja Kits',
            'price' => 799,
            'old_price' => 999,
            'rating' => 4.8,
            'reviews' => 91,
            'image' => 'images/home/hero.jpg',
            'badge' => 'Featured'
        ],

        [
            'name' => 'Brass Pooja Plate',
            'category' => 'Pooja Accessories',
            'price' => 699,
            'old_price' => 849,
            'rating' => 4.6,
            'reviews' => 38,
            'image' => 'images/home/hero.jpg',
            'badge' => ''
        ],

        [
            'name' => 'Natural Chandan Powder',
            'category' => 'Kumkum & Chandan',
            'price' => 179,
            'old_price' => 219,
            'rating' => 4.8,
            'reviews' => 74,
            'image' => 'images/home/hero.jpg',
            'badge' => 'Popular'
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
                        href="{{ route('home') }}"
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

                    {{ $category['name'] }}

                </li>

            </ol>

        </nav>

    </div>

</section>


{{-- ============================================================
     CATEGORY HERO
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

                    {{ $category['name'] }}

                </h1>


                <p
                    class="lead
                           text-secondary
                           mb-4"
                >

                    {{ $category['description'] }}

                </p>


                <div
                    class="d-flex
                           flex-wrap
                           gap-3"
                >

                    <a
                        href="#products"
                        class="btn
                               btn-pn
                               btn-lg"
                    >

                        Shop Collection

                        <i
                            class="bi bi-arrow-down ms-2"
                        ></i>

                    </a>


                    <span
                        class="d-flex
                               align-items-center
                               text-secondary
                               small"
                    >

                        <i
                            class="bi bi-box-seam
                                   text-pn-primary
                                   me-2"
                        ></i>

                        {{ $category['product_count'] }}
                        products

                    </span>

                </div>

            </div>


            <div class="col-12 col-lg-5">

                <div
                    class="pn-digital
                           rounded-5
                           overflow-hidden"
                >

                    <div class="ratio ratio-4x3">

                        <img
                            src="{{ asset($category['image']) }}"
                            class="object-fit-cover"
                            alt="{{ $category['name'] }}"
                            loading="eager"
                        >

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- ============================================================
     SUB CATEGORIES
============================================================ --}}

<section class="py-5">

    <div class="container">

        <div class="mb-4">

            <span
                class="small
                       text-pn-gold
                       fw-semibold
                       text-uppercase"
            >

                Explore Collection

            </span>


            <h2
                class="font-serif
                       display-6
                       text-pn-brown
                       mt-2
                       mb-2"
            >

                Shop by category

            </h2>


            <p
                class="text-secondary
                       mb-0"
            >

                Find the right essentials for your devotional needs.

            </p>

        </div>


        <div
            class="row
                   row-cols-2
                   row-cols-md-3
                   row-cols-lg-6
                   g-3"
        >

            @foreach($subCategories as $subCategory)

                <div class="col">

                    <a
                        href="#products"
                        class="text-decoration-none"
                    >

                        <div
                            class="border
                                   border-warning-subtle
                                   rounded-4
                                   h-100
                                   p-3
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
                                style="width:58px;height:58px;"
                            >

                                <i
                                    class="bi {{ $subCategory['icon'] }}
                                           fs-5"
                                ></i>

                            </div>


                            <h3
                                class="font-serif
                                       h6
                                       text-pn-brown
                                       mb-1"
                            >

                                {{ $subCategory['name'] }}

                            </h3>


                            <small class="text-secondary">

                                {{ $subCategory['count'] }}
                                products

                            </small>

                        </div>

                    </a>

                </div>

            @endforeach

        </div>

    </div>

</section>


{{-- ============================================================
     PRODUCT SECTION
============================================================ --}}

<section
    id="products"
    class="py-5 bg-pn-cream"
>

    <div class="container">

        {{-- Header --}}

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

                    {{ $category['name'] }}

                </span>


                <h2
                    class="font-serif
                           display-6
                           text-pn-brown
                           mt-2
                           mb-2"
                >

                    Products you'll love

                </h2>


                <p
                    class="text-secondary
                           mb-0"
                >

                    Browse the complete collection.

                </p>

            </div>


            <div class="col-12 col-lg-5">

                <div
                    class="d-flex
                           flex-column
                           flex-sm-row
                           gap-2
                           justify-content-lg-end"
                >

                    {{-- Mobile Filters --}}

                    <button
                        type="button"
                        class="btn
                               btn-pn-outline
                               d-lg-none"
                        data-bs-toggle="offcanvas"
                        data-bs-target="#categoryFilters"
                        aria-controls="categoryFilters"
                    >

                        <i class="bi bi-funnel me-1"></i>

                        Filters

                    </button>


                    {{-- Search --}}

                    <div
                        class="input-group
                               flex-grow-1
                               flex-lg-grow-0"
                        style="max-width:330px;"
                    >

                        <span class="input-group-text bg-white">

                            <i class="bi bi-search"></i>

                        </span>


                        <input
                            type="search"
                            class="form-control"
                            placeholder="Search this category..."
                            aria-label="Search products in category"
                        >

                    </div>

                </div>

            </div>

        </div>


        <div class="row g-4">

            {{-- ====================================================
                 FILTER SIDEBAR
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


                        {{-- Subcategory --}}

                        <div class="mb-4">

                            <h4
                                class="small
                                       fw-semibold
                                       text-pn-brown
                                       mb-3"
                            >

                                Subcategory

                            </h4>


                            <div class="vstack gap-2">

                                @foreach($subCategories as $index => $subCategory)

                                    <div class="form-check">

                                        <input
                                            class="form-check-input"
                                            type="checkbox"
                                            id="subCategory{{ $index }}"
                                            value="{{ $subCategory['name'] }}"
                                        >


                                        <label
                                            class="form-check-label
                                                   small
                                                   text-secondary"
                                            for="subCategory{{ $index }}"
                                        >

                                            {{ $subCategory['name'] }}

                                        </label>

                                    </div>

                                @endforeach

                            </div>

                        </div>


                        <hr
                            class="border-warning-subtle"
                        >


                        {{-- Price --}}

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


                        {{-- Rating --}}

                        <div class="mb-4">

                            <h4
                                class="small
                                       fw-semibold
                                       text-pn-brown
                                       mb-3"
                            >

                                Rating

                            </h4>


                            @foreach([4, 3, 2] as $rating)

                                <div
                                    class="form-check
                                           mb-2"
                                >

                                    <input
                                        class="form-check-input"
                                        type="radio"
                                        name="categoryRating"
                                        id="categoryRating{{ $rating }}"
                                    >


                                    <label
                                        class="form-check-label
                                               small"
                                        for="categoryRating{{ $rating }}"
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


                        <hr
                            class="border-warning-subtle"
                        >


                        {{-- Availability --}}

                        <div>

                            <h4
                                class="small
                                       fw-semibold
                                       text-pn-brown
                                       mb-3"
                            >

                                Availability

                            </h4>


                            <div class="form-check">

                                <input
                                    class="form-check-input"
                                    type="checkbox"
                                    id="inStock"
                                >


                                <label
                                    class="form-check-label
                                           small
                                           text-secondary"
                                    for="inStock"
                                >

                                    In Stock Only

                                </label>

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


                    <div
                        class="d-flex
                               align-items-center
                               gap-2"
                    >

                        <label
                            for="categorySort"
                            class="small
                                   text-secondary
                                   d-none
                                   d-sm-block"
                        >

                            Sort by

                        </label>


                        <select
                            id="categorySort"
                            class="form-select form-select-sm"
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

                                {{-- Image --}}

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


                                {{-- Content --}}

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


                                    <div
                                        class="mt-auto"
                                    >

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

                                                View Product

                                            </a>


                                            <button
                                                type="button"
                                                class="btn
                                                       btn-pn"
                                                aria-label="Add product to cart"
                                            >

                                                <i
                                                    class="bi bi-bag-plus"
                                                ></i>

                                            </button>

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
                    aria-label="Product category pagination"
                >

                    <ul
                        class="pagination
                               justify-content-center
                               mb-0"
                    >

                        <li class="page-item disabled">

                            <span class="page-link">

                                <i
                                    class="bi bi-chevron-left"
                                ></i>

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

                                <i
                                    class="bi bi-chevron-right"
                                ></i>

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
    id="categoryFilters"
    aria-labelledby="categoryFiltersLabel"
>

    <div class="offcanvas-header">

        <h2
            class="offcanvas-title
                   font-serif
                   h4
                   text-pn-brown"
            id="categoryFiltersLabel"
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

                Subcategory

            </h3>


            <div class="vstack gap-2">

                @foreach($subCategories as $index => $subCategory)

                    <div class="form-check">

                        <input
                            class="form-check-input"
                            type="checkbox"
                            id="mobileSubCategory{{ $index }}"
                        >


                        <label
                            class="form-check-label
                                   small"
                            for="mobileSubCategory{{ $index }}"
                        >

                            {{ $subCategory['name'] }}

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
                    aria-label="Minimum price"
                >


                <input
                    type="number"
                    class="form-control"
                    placeholder="Max"
                    aria-label="Maximum price"
                >

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

                Rating

            </h3>


            @foreach([4, 3, 2] as $rating)

                <div class="form-check mb-2">

                    <input
                        class="form-check-input"
                        type="radio"
                        name="mobileCategoryRating"
                        id="mobileCategoryRating{{ $rating }}"
                    >


                    <label
                        class="form-check-label
                               small"
                        for="mobileCategoryRating{{ $rating }}"
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

                        <span class="text-secondary">

                            & up

                        </span>

                    </label>

                </div>

            @endforeach

        </div>


        <hr>


        <div class="form-check">

            <input
                class="form-check-input"
                type="checkbox"
                id="mobileInStock"
            >


            <label
                class="form-check-label
                       small"
                for="mobileInStock"
            >

                In Stock Only

            </label>

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
     CATEGORY INFORMATION
============================================================ --}}

<section class="py-5">

    <div class="container">

        <div
            class="row
                   align-items-center
                   g-5"
        >

            <div class="col-12 col-lg-6">

                <span
                    class="small
                           text-pn-gold
                           fw-semibold
                           text-uppercase"
                >

                    About This Collection

                </span>


                <h2
                    class="font-serif
                           display-6
                           text-pn-brown
                           mt-2
                           mb-3"
                >

                    Essentials for your
                    sacred space

                </h2>


                <div
                    class="pn-divider
                           mb-4"
                ></div>


                <p
                    class="text-secondary
                           mb-0"
                >

                    Our {{ $category['name'] }} collection is
                    designed to make it convenient to discover
                    devotional essentials in one place.

                </p>

            </div>


            <div class="col-12 col-lg-6">

                <div class="vstack gap-3">

                    <div
                        class="border
                               border-warning-subtle
                               rounded-4
                               p-4
                               d-flex
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
                            style="width:48px;height:48px;"
                        >

                            <i class="bi bi-stars"></i>

                        </div>


                        <div>

                            <strong
                                class="d-block
                                       text-pn-brown"
                            >

                                Curated Collection

                            </strong>


                            <small class="text-secondary">

                                Products organized to make
                                devotional shopping simple.

                            </small>

                        </div>

                    </div>


                    <div
                        class="border
                               border-warning-subtle
                               rounded-4
                               p-4
                               d-flex
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
                            style="width:48px;height:48px;"
                        >

                            <i class="bi bi-box-seam"></i>

                        </div>


                        <div>

                            <strong
                                class="d-block
                                       text-pn-brown"
                            >

                                Easy Shopping

                            </strong>


                            <small class="text-secondary">

                                Browse products, view details
                                and add them to your cart.

                            </small>

                        </div>

                    </div>


                    <div
                        class="border
                               border-warning-subtle
                               rounded-4
                               p-4
                               d-flex
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
                            style="width:48px;height:48px;"
                        >

                            <i class="bi bi-heart"></i>

                        </div>


                        <div>

                            <strong
                                class="d-block
                                       text-pn-brown"
                            >

                                Devotional Choices

                            </strong>


                            <small class="text-secondary">

                                Discover products for everyday
                                worship and special occasions.

                            </small>

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

<section class="pb-5">

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

                    Continue exploring Pooja Nilayam Store

                </h2>


                <p
                    class="text-white-50
                           col-lg-7
                           mx-auto
                           mb-4"
                >

                    Find more devotional products and spiritual
                    essentials for your home.

                </p>


                <a
                    href="#"
                    class="btn
                           btn-warning
                           text-dark
                           fw-semibold
                           px-4"
                >

                    Browse All Products

                    <i
                        class="bi bi-arrow-right ms-2"
                    ></i>

                </a>

            </div>

        </div>

    </div>

</section>

@endsection