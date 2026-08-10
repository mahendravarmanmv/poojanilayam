@extends('layouts.app')

@section('title', 'My Wishlist | Pooja Nilayam')

@section(
    'meta_description',
    'View your saved pooja products and devotional items in your Pooja Nilayam wishlist.'
)

@section('content')

@php

    /*
    |--------------------------------------------------------------------------
    | TEMPORARY UI DATA
    |--------------------------------------------------------------------------
    | These products will later come from the authenticated customer's
    | wishlist records.
    |--------------------------------------------------------------------------
    */

    $wishlistItems = [

        [
            'id' => 1,
            'name' => 'Ganapathi Pooja Kit',
            'category' => 'Pooja Kits',
            'price' => 1201,
            'old_price' => 1450,
            'discount' => 17,
            'rating' => 4.8,
            'reviews' => 124,
            'stock' => 'In Stock',
            'stock_class' => 'success',
            'image' => null,
            'badge' => 'Popular',
            'description' =>
                'A complete pooja kit prepared for Ganapathi Pooja.'
        ],

        [
            'id' => 2,
            'name' => 'Brass Diya Set',
            'category' => 'Pooja Samagri',
            'price' => 699,
            'old_price' => 899,
            'discount' => 22,
            'rating' => 4.7,
            'reviews' => 86,
            'stock' => 'In Stock',
            'stock_class' => 'success',
            'image' => null,
            'badge' => 'Bestseller',
            'description' =>
                'Traditional brass diyas suitable for daily worship.'
        ],

        [
            'id' => 3,
            'name' => 'Sri Lakshmi Pooja Kit',
            'category' => 'Pooja Kits',
            'price' => 999,
            'old_price' => 1199,
            'discount' => 17,
            'rating' => 4.9,
            'reviews' => 91,
            'stock' => 'In Stock',
            'stock_class' => 'success',
            'image' => null,
            'badge' => 'Recommended',
            'description' =>
                'A devotional kit curated for Lakshmi Pooja.'
        ],

        [
            'id' => 4,
            'name' => 'Natural Incense Collection',
            'category' => 'Devotional Essentials',
            'price' => 449,
            'old_price' => 549,
            'discount' => 18,
            'rating' => 4.6,
            'reviews' => 53,
            'stock' => 'Only 3 Left',
            'stock_class' => 'warning',
            'image' => null,
            'badge' => null,
            'description' =>
                'A collection of naturally scented devotional incense.'
        ],

        [
            'id' => 5,
            'name' => 'Copper Kalash',
            'category' => 'Pooja Samagri',
            'price' => 849,
            'old_price' => null,
            'discount' => null,
            'rating' => 4.5,
            'reviews' => 37,
            'stock' => 'In Stock',
            'stock_class' => 'success',
            'image' => null,
            'badge' => null,
            'description' =>
                'Traditional copper kalash for auspicious rituals.'
        ],

        [
            'id' => 6,
            'name' => 'Panchapatra & Uddharini Set',
            'category' => 'Pooja Samagri',
            'price' => 599,
            'old_price' => 749,
            'discount' => 20,
            'rating' => 4.7,
            'reviews' => 41,
            'stock' => 'Out of Stock',
            'stock_class' => 'danger',
            'image' => null,
            'badge' => null,
            'description' =>
                'Traditional metal set for devotional rituals.'
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
                        My Dashboard
                    </a>

                </li>


                <li
                    class="breadcrumb-item active"
                    aria-current="page"
                >
                    Wishlist
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

        <div
            class="row
                   align-items-center
                   g-4"
        >

            <div class="col-12 col-lg-8">

                <span
                    class="small
                           text-pn-gold
                           fw-semibold
                           text-uppercase"
                >
                    My Account
                </span>


                <h1
                    class="font-serif
                           display-5
                           text-pn-brown
                           mt-2
                           mb-2"
                >
                    My Wishlist
                </h1>


                <p
                    class="text-secondary
                           mb-0"
                >
                    Keep your favourite pooja products saved for
                    whenever you are ready.
                </p>

            </div>


            <div
                class="col-12 col-lg-4
                       text-lg-end"
            >

                <a
                    href="#"
                    class="btn btn-pn"
                >

                    <i class="bi bi-shop me-2"></i>

                    Continue Shopping

                </a>

            </div>

        </div>

    </div>

</section>


{{-- ============================================================
     MAIN CONTENT
============================================================ --}}

<section class="py-5">

    <div class="container">

        <div class="row g-4 g-xl-5">


            {{-- ====================================================
                 ACCOUNT NAVIGATION
            ===================================================== --}}

            <div class="col-12 col-lg-3">

                <div
                    class="card
                           border
                           border-warning-subtle
                           rounded-5
                           overflow-hidden
                           sticky-lg-top"
                    style="top:90px;"
                >

                    <div
                        class="bg-pn-cream
                               p-4
                               text-center"
                    >

                        <div
                            class="rounded-circle
                                   bg-pn-primary
                                   text-white
                                   d-flex
                                   align-items-center
                                   justify-content-center
                                   mx-auto
                                   mb-3
                                   fw-semibold
                                   fs-5"
                            style="width:64px;height:64px;"
                        >
                            MV
                        </div>


                        <h2
                            class="font-serif
                                   h5
                                   text-pn-brown
                                   mb-1"
                        >
                            Mahendra Varma
                        </h2>


                        <small
                            class="text-secondary
                                   text-break"
                        >
                            customer@example.com
                        </small>

                    </div>


                    <div class="list-group list-group-flush">

                        <a
                            href="#"
                            class="list-group-item
                                   list-group-item-action
                                   border-0
                                   py-3"
                        >

                            <i class="bi bi-grid me-3"></i>

                            Dashboard

                        </a>


                        <a
                            href="#"
                            class="list-group-item
                                   list-group-item-action
                                   border-0
                                   py-3"
                        >

                            <i class="bi bi-person me-3"></i>

                            My Profile

                        </a>


                        <a
                            href="#"
                            class="list-group-item
                                   list-group-item-action
                                   border-0
                                   py-3"
                        >

                            <i class="bi bi-calendar-check me-3"></i>

                            My Bookings

                        </a>


                        <a
                            href="#"
                            class="list-group-item
                                   list-group-item-action
                                   border-0
                                   py-3"
                        >

                            <i class="bi bi-camera-video me-3"></i>

                            Digital Bookings

                        </a>


                        <a
                            href="#"
                            class="list-group-item
                                   list-group-item-action
                                   border-0
                                   py-3"
                        >

                            <i class="bi bi-bag me-3"></i>

                            Orders

                        </a>


                        <a
                            href="#"
                            class="list-group-item
                                   list-group-item-action
                                   active
                                   border-0
                                   py-3"
                        >

                            <i class="bi bi-heart me-3"></i>

                            Wishlist

                            <span
                                class="badge
                                       bg-danger
                                       rounded-pill
                                       float-end"
                            >
                                {{ count($wishlistItems) }}
                            </span>

                        </a>


                        <a
                            href="#"
                            class="list-group-item
                                   list-group-item-action
                                   border-0
                                   py-3"
                        >

                            <i class="bi bi-geo-alt me-3"></i>

                            Address Book

                        </a>


                        <a
                            href="#"
                            class="list-group-item
                                   list-group-item-action
                                   border-0
                                   py-3"
                        >

                            <i class="bi bi-bell me-3"></i>

                            Notifications

                            <span
                                class="badge
                                       bg-danger
                                       rounded-pill
                                       float-end"
                            >
                                3
                            </span>

                        </a>


                        <a
                            href="#"
                            class="list-group-item
                                   list-group-item-action
                                   border-0
                                   py-3"
                        >

                            <i class="bi bi-shield-lock me-3"></i>

                            Change Password

                        </a>


                        <div class="border-top"></div>


                        <a
                            href="#"
                            class="list-group-item
                                   list-group-item-action
                                   border-0
                                   py-3
                                   text-danger"
                        >

                            <i
                                class="bi bi-box-arrow-right me-3"
                            ></i>

                            Logout

                        </a>

                    </div>

                </div>

            </div>


            {{-- ====================================================
                 WISHLIST CONTENT
            ===================================================== --}}

            <div class="col-12 col-lg-9">


                {{-- ==================================================
                     WISHLIST SUMMARY
                =================================================== --}}

                <div
                    class="row
                           row-cols-2
                           row-cols-md-3
                           g-3
                           mb-4"
                >

                    <div class="col">

                        <div
                            class="card
                                   border
                                   border-warning-subtle
                                   rounded-4
                                   h-100"
                        >

                            <div class="card-body p-3 p-md-4">

                                <small
                                    class="text-secondary
                                           d-block
                                           mb-1"
                                >
                                    Saved Items
                                </small>


                                <strong
                                    class="font-serif
                                           display-6
                                           text-pn-brown"
                                >

                                    {{ count($wishlistItems) }}

                                </strong>


                                <small
                                    class="text-secondary
                                           d-block"
                                >
                                    Products

                                </small>

                            </div>

                        </div>

                    </div>


                    <div class="col">

                        <div
                            class="card
                                   border
                                   border-warning-subtle
                                   rounded-4
                                   h-100"
                        >

                            <div class="card-body p-3 p-md-4">

                                <small
                                    class="text-secondary
                                           d-block
                                           mb-1"
                                >
                                    In Stock
                                </small>


                                <strong
                                    class="font-serif
                                           display-6
                                           text-pn-brown"
                                >

                                    {{ count(
                                        array_filter(
                                            $wishlistItems,
                                            fn ($item) =>
                                                $item['stock']
                                                !== 'Out of Stock'
                                        )
                                    ) }}

                                </strong>


                                <small
                                    class="text-secondary
                                           d-block"
                                >
                                    Ready to Buy

                                </small>

                            </div>

                        </div>

                    </div>


                    <div class="col">

                        <div
                            class="card
                                   border
                                   border-warning-subtle
                                   rounded-4
                                   h-100"
                        >

                            <div class="card-body p-3 p-md-4">

                                <small
                                    class="text-secondary
                                           d-block
                                           mb-1"
                                >
                                    Current Value
                                </small>


                                <strong
                                    class="font-serif
                                           display-6
                                           text-pn-brown"
                                >

                                    ₹{{ number_format(
                                        array_sum(
                                            array_map(
                                                fn ($item) =>
                                                    $item['price'],
                                                $wishlistItems
                                            )
                                        )
                                    ) }}

                                </strong>


                                <small
                                    class="text-secondary
                                           d-block"
                                >
                                    Saved Products

                                </small>

                            </div>

                        </div>

                    </div>

                </div>


                {{-- ==================================================
                     TOOLBAR
                =================================================== --}}

                <div
                    class="card
                           border
                           border-warning-subtle
                           rounded-5
                           mb-4"
                >

                    <div class="card-body p-3 p-md-4">

                        <div
                            class="row
                                   align-items-center
                                   g-3"
                        >

                            <div class="col-12 col-md-7">

                                <label
                                    for="wishlistSearch"
                                    class="visually-hidden"
                                >
                                    Search wishlist
                                </label>


                                <div
                                    class="input-group"
                                >

                                    <span
                                        class="input-group-text
                                               bg-white"
                                    >

                                        <i
                                            class="bi bi-search
                                                   text-secondary"
                                        ></i>

                                    </span>


                                    <input
                                        type="search"
                                        id="wishlistSearch"
                                        class="form-control"
                                        placeholder="Search saved products..."
                                        autocomplete="off"
                                    >

                                </div>

                            </div>


                            <div class="col-12 col-sm-6 col-md-3">

                                <label
                                    for="wishlistSort"
                                    class="visually-hidden"
                                >
                                    Sort wishlist
                                </label>


                                <select
                                    id="wishlistSort"
                                    class="form-select"
                                >

                                    <option value="default">
                                        Recently Added
                                    </option>

                                    <option value="price-low">
                                        Price: Low to High
                                    </option>

                                    <option value="price-high">
                                        Price: High to Low
                                    </option>

                                    <option value="rating">
                                        Highest Rated
                                    </option>

                                </select>

                            </div>


                            <div class="col-12 col-sm-6 col-md-2">

                                <button
                                    type="button"
                                    id="moveAllToCart"
                                    class="btn
                                           btn-pn
                                           w-100"
                                >

                                    <i
                                        class="bi bi-cart-plus me-1"
                                    ></i>

                                    <span
                                        class="d-none d-xl-inline"
                                    >
                                        Add All
                                    </span>

                                    <span
                                        class="d-xl-none"
                                    >
                                        Add
                                    </span>

                                </button>

                            </div>

                        </div>

                    </div>

                </div>


                {{-- ==================================================
                     WISHLIST PRODUCTS
                =================================================== --}}

                <div
                    class="d-flex
                           align-items-center
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
                            Saved For Later
                        </span>


                        <h2
                            class="font-serif
                                   h3
                                   text-pn-brown
                                   mt-1
                                   mb-0"
                        >
                            Your Wishlist
                        </h2>

                    </div>


                    <button
                        type="button"
                        id="clearWishlist"
                        class="btn
                               btn-sm
                               btn-outline-danger"
                    >

                        <i
                            class="bi bi-trash3 me-1"
                        ></i>

                        Clear Wishlist

                    </button>

                </div>


                <div
                    id="wishlistGrid"
                    class="row
                           row-cols-1
                           row-cols-sm-2
                           row-cols-xl-3
                           g-4"
                >

                    @foreach(
                        $wishlistItems as $item
                    )

                        <div
                            class="col
                                   wishlist-item"
                            data-product-name="{{ strtolower($item['name']) }}"
                            data-product-price="{{ $item['price'] }}"
                            data-product-rating="{{ $item['rating'] }}"
                            data-product-id="{{ $item['id'] }}"
                        >

                            <article
                                class="card
                                       border
                                       border-warning-subtle
                                       rounded-5
                                       overflow-hidden
                                       h-100"
                            >

                                {{-- Product Visual --}}

                                <div
                                    class="position-relative
                                           bg-pn-cream"
                                >

                                    <div
                                        class="ratio
                                               ratio-1x1"
                                    >

                                        <div
                                            class="d-flex
                                                   align-items-center
                                                   justify-content-center
                                                   text-pn-primary"
                                        >

                                            <div
                                                class="text-center"
                                            >

                                                <i
                                                    class="bi bi-flower1"
                                                    style="font-size:3.5rem;"
                                                ></i>


                                                <small
                                                    class="d-block
                                                           mt-2
                                                           text-secondary"
                                                >
                                                    Product Image
                                                </small>

                                            </div>

                                        </div>

                                    </div>


                                    @if(
                                        $item['badge']
                                    )

                                        <span
                                            class="position-absolute
                                                   top-0
                                                   start-0
                                                   badge
                                                   bg-pn-primary
                                                   rounded-pill
                                                   m-3
                                                   px-3
                                                   py-2"
                                        >

                                            {{ $item['badge'] }}

                                        </span>

                                    @endif


                                    @if(
                                        $item['discount']
                                    )

                                        <span
                                            class="position-absolute
                                                   top-0
                                                   end-0
                                                   badge
                                                   bg-danger
                                                   rounded-pill
                                                   m-3
                                                   px-3
                                                   py-2"
                                        >

                                            -{{ $item['discount'] }}%

                                        </span>

                                    @endif


                                    {{-- Remove --}}

                                    <button
                                        type="button"
                                        class="btn
                                               btn-light
                                               rounded-circle
                                               position-absolute
                                               bottom-0
                                               end-0
                                               m-3
                                               shadow-sm
                                               remove-wishlist"
                                        data-product-id="{{ $item['id'] }}"
                                        data-product-name="{{ $item['name'] }}"
                                        title="Remove from wishlist"
                                        aria-label="Remove {{ $item['name'] }} from wishlist"
                                    >

                                        <i
                                            class="bi bi-heart-fill
                                                   text-danger"
                                        ></i>

                                    </button>

                                </div>


                                {{-- Product Information --}}

                                <div
                                    class="card-body
                                           p-4
                                           d-flex
                                           flex-column"
                                >

                                    <small
                                        class="text-pn-gold
                                               fw-semibold
                                               text-uppercase
                                               mb-2"
                                    >

                                        {{ $item['category'] }}

                                    </small>


                                    <h3
                                        class="font-serif
                                               h5
                                               text-pn-brown
                                               mb-2"
                                    >

                                        <a
                                            href="#"
                                            class="text-decoration-none
                                                   text-pn-brown"
                                        >

                                            {{ $item['name'] }}

                                        </a>

                                    </h3>


                                    <p
                                        class="small
                                               text-secondary
                                               mb-3"
                                    >

                                        {{ $item['description'] }}

                                    </p>


                                    {{-- Rating --}}

                                    <div
                                        class="d-flex
                                               align-items-center
                                               gap-2
                                               mb-3"
                                    >

                                        <span
                                            class="badge
                                                   bg-warning-subtle
                                                   text-warning-emphasis
                                                   rounded-pill"
                                        >

                                            <i
                                                class="bi bi-star-fill"
                                            ></i>

                                            {{ $item['rating'] }}

                                        </span>


                                        <small
                                            class="text-secondary"
                                        >

                                            ({{ $item['reviews'] }}
                                            reviews)

                                        </small>

                                    </div>


                                    {{-- Price --}}

                                    <div
                                        class="d-flex
                                               align-items-center
                                               flex-wrap
                                               gap-2
                                               mb-3"
                                    >

                                        <strong
                                            class="font-serif
                                                   h4
                                                   text-pn-brown
                                                   mb-0"
                                        >

                                            ₹{{ number_format(
                                                $item['price']
                                            ) }}

                                        </strong>


                                        @if(
                                            $item['old_price']
                                        )

                                            <del
                                                class="small
                                                       text-secondary"
                                            >

                                                ₹{{ number_format(
                                                    $item['old_price']
                                                ) }}

                                            </del>

                                        @endif

                                    </div>


                                    {{-- Stock --}}

                                    <div
                                        class="mb-4"
                                    >

                                        <small
                                            class="text-{{ $item['stock_class'] }}
                                                   fw-semibold"
                                        >

                                            <i
                                                class="bi
                                                       {{
                                                           $item['stock']
                                                           === 'In Stock'
                                                           ? 'bi-check-circle-fill'
                                                           : (
                                                               $item['stock']
                                                               === 'Out of Stock'
                                                               ? 'bi-x-circle-fill'
                                                               : 'bi-exclamation-circle-fill'
                                                           )
                                                       }}
                                                       me-1"
                                            ></i>

                                            {{ $item['stock'] }}

                                        </small>

                                    </div>


                                    {{-- Actions --}}

                                    <div
                                        class="mt-auto
                                               d-grid
                                               gap-2"
                                    >

                                        @if(
                                            $item['stock']
                                            !== 'Out of Stock'
                                        )

                                            <button
                                                type="button"
                                                class="btn
                                                       btn-pn
                                                       add-to-cart"
                                                data-product-id="{{ $item['id'] }}"
                                                data-product-name="{{ $item['name'] }}"
                                            >

                                                <i
                                                    class="bi bi-cart-plus me-2"
                                                ></i>

                                                Add to Cart

                                            </button>

                                        @else

                                            <button
                                                type="button"
                                                class="btn
                                                       btn-secondary"
                                                disabled
                                            >

                                                Currently Unavailable

                                            </button>

                                        @endif


                                        <a
                                            href="#"
                                            class="btn
                                                   btn-outline-secondary"
                                        >

                                            <i
                                                class="bi bi-eye me-1"
                                            ></i>

                                            View Product

                                        </a>

                                    </div>

                                </div>

                            </article>

                        </div>

                    @endforeach

                </div>


                {{-- ==================================================
                     EMPTY STATE
                =================================================== --}}

                <div
                    id="wishlistEmptyState"
                    class="d-none
                           border
                           border-warning-subtle
                           rounded-5
                           p-5
                           text-center
                           mt-4"
                >

                    <div
                        class="rounded-circle
                               bg-pn-cream
                               text-pn-primary
                               d-flex
                               align-items-center
                               justify-content-center
                               mx-auto
                               mb-4"
                        style="width:80px;height:80px;"
                    >

                        <i
                            class="bi bi-heart
                                   fs-2"
                        ></i>

                    </div>


                    <h2
                        class="font-serif
                               h3
                               text-pn-brown"
                    >
                        Your Wishlist is Empty
                    </h2>


                    <p
                        class="text-secondary
                               mb-4"
                    >
                        Save products you love and come back to
                        them whenever you are ready.
                    </p>


                    <a
                        href="#"
                        class="btn btn-pn"
                    >

                        Explore Pooja Products

                        <i
                            class="bi bi-arrow-right ms-2"
                        ></i>

                    </a>

                </div>


                {{-- ==================================================
                     WISHLIST INFORMATION
                =================================================== --}}

                <div
                    class="alert
                           bg-pn-cream
                           border-0
                           rounded-5
                           p-4
                           mt-5"
                >

                    <div
                        class="d-flex
                               align-items-start
                               gap-3"
                    >

                        <i
                            class="bi bi-heart
                                   text-pn-primary
                                   fs-4
                                   mt-1"
                        ></i>


                        <div>

                            <strong
                                class="d-block
                                       text-pn-brown
                                       mb-1"
                            >
                                Save now, decide later.
                            </strong>


                            <small
                                class="text-secondary"
                            >

                                Your wishlist helps you keep track
                                of products you may want to purchase
                                later. Availability and pricing may
                                change before purchase.

                            </small>

                        </div>

                    </div>

                </div>


                {{-- ==================================================
                     SHOPPING CTA
                =================================================== --}}

                <div
                    class="pn-digital
                           rounded-5
                           overflow-hidden
                           text-white
                           mt-4"
                >

                    <div
                        class="p-4
                               p-md-5"
                    >

                        <div
                            class="row
                                   align-items-center
                                   g-4"
                        >

                            <div class="col-12 col-lg-8">

                                <span
                                    class="small
                                           text-warning
                                           fw-semibold
                                           text-uppercase"
                                >
                                    Pooja Store
                                </span>


                                <h2
                                    class="font-serif
                                           h3
                                           mt-2
                                           mb-2"
                                >
                                    Discover more sacred essentials.
                                </h2>


                                <p
                                    class="text-white-50
                                           mb-0"
                                >

                                    Explore pooja kits, samagri and
                                    devotional products prepared for
                                    your spiritual needs.

                                </p>

                            </div>


                            <div
                                class="col-12 col-lg-4
                                       text-lg-end"
                            >

                                <a
                                    href="#"
                                    class="btn
                                           btn-warning
                                           text-dark
                                           fw-semibold
                                           px-4"
                                >

                                    Explore Store

                                    <i
                                        class="bi bi-arrow-right ms-2"
                                    ></i>

                                </a>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- ============================================================
     REMOVE WISHLIST MODAL
============================================================ --}}

<div
    class="modal fade"
    id="removeWishlistModal"
    tabindex="-1"
    aria-labelledby="removeWishlistModalLabel"
    aria-hidden="true"
>

    <div
        class="modal-dialog
               modal-dialog-centered
               modal-sm"
    >

        <div
            class="modal-content
                   border-0
                   rounded-5"
        >

            <div
                class="modal-body
                       p-4
                       text-center"
            >

                <div
                    class="rounded-circle
                           bg-danger-subtle
                           text-danger
                           d-flex
                           align-items-center
                           justify-content-center
                           mx-auto
                           mb-3"
                    style="width:60px;height:60px;"
                >

                    <i class="bi bi-heartbreak fs-5"></i>

                </div>


                <h2
                    class="font-serif
                           h4
                           text-pn-brown
                           mb-2"
                    id="removeWishlistModalLabel"
                >
                    Remove from Wishlist?
                </h2>


                <p
                    class="small
                           text-secondary
                           mb-4"
                    id="removeWishlistMessage"
                >
                    Are you sure you want to remove this product?
                </p>


                <div
                    class="d-flex
                           flex-column
                           flex-sm-row
                           gap-2"
                >

                    <button
                        type="button"
                        class="btn
                               btn-outline-secondary
                               flex-fill"
                        data-bs-dismiss="modal"
                    >
                        Keep Item
                    </button>


                    <button
                        type="button"
                        class="btn
                               btn-danger
                               flex-fill"
                        id="confirmRemoveWishlist"
                    >
                        Remove
                    </button>

                </div>

            </div>

        </div>

    </div>

</div>


{{-- ============================================================
     PAGE SCRIPT
============================================================ --}}

@push('scripts')

<script>
document.addEventListener('DOMContentLoaded', function () {

    /*
    |--------------------------------------------------------------------------
    | Wishlist Search
    |--------------------------------------------------------------------------
    */

    const searchInput =
        document.getElementById(
            'wishlistSearch'
        );


    const sortSelect =
        document.getElementById(
            'wishlistSort'
        );


    const wishlistItems =
        document.querySelectorAll(
            '.wishlist-item'
        );


    const emptyState =
        document.getElementById(
            'wishlistEmptyState'
        );


    function filterWishlist() {

        const search =
            (
                searchInput?.value
                || ''
            )
                .trim()
                .toLowerCase();


        let visibleCount =
            0;


        wishlistItems.forEach(
            function (item) {

                const name =
                    item.dataset.productName
                    || '';


                const visible =
                    !search
                    ||
                    name.includes(search);


                item.classList.toggle(
                    'd-none',
                    !visible
                );


                if (visible) {

                    visibleCount++;

                }

            }
        );


        emptyState?.classList.toggle(
            'd-none',
            visibleCount !== 0
        );

    }


    searchInput?.addEventListener(
        'input',
        filterWishlist
    );


    /*
    |--------------------------------------------------------------------------
    | Wishlist Sorting
    |--------------------------------------------------------------------------
    */

    sortSelect?.addEventListener(
        'change',
        function () {

            const grid =
                document.getElementById(
                    'wishlistGrid'
                );


            if (!grid) {

                return;

            }


            const items =
                Array.from(
                    grid.querySelectorAll(
                        '.wishlist-item'
                    )
                );


            const sort =
                this.value;


            items.sort(
                function (a, b) {

                    const priceA =
                        Number(
                            a.dataset.productPrice
                        );


                    const priceB =
                        Number(
                            b.dataset.productPrice
                        );


                    const ratingA =
                        Number(
                            a.dataset.productRating
                        );


                    const ratingB =
                        Number(
                            b.dataset.productRating
                        );


                    if (
                        sort === 'price-low'
                    ) {

                        return priceA - priceB;

                    }


                    if (
                        sort === 'price-high'
                    ) {

                        return priceB - priceA;

                    }


                    if (
                        sort === 'rating'
                    ) {

                        return ratingB - ratingA;

                    }


                    return 0;

                }
            );


            items.forEach(
                function (item) {

                    grid.appendChild(
                        item
                    );

                }
            );

        }
    );


    /*
    |--------------------------------------------------------------------------
    | Add To Cart
    |--------------------------------------------------------------------------
    */

    const addToCartButtons =
        document.querySelectorAll(
            '.add-to-cart'
        );


    addToCartButtons.forEach(
        function (button) {

            button.addEventListener(
                'click',
                function () {

                    const productName =
                        this.dataset.productName
                        || 'Product';


                    const originalHTML =
                        this.innerHTML;


                    this.disabled =
                        true;


                    this.innerHTML =
                        '<span class="spinner-border spinner-border-sm me-2"></span>' +
                        'Adding...';


                    /*
                    |--------------------------------------------------------------------------
                    | Backend cart request will be connected later.
                    |--------------------------------------------------------------------------
                    */

                    setTimeout(
                        function () {

                            button.disabled =
                                false;


                            button.innerHTML =
                                '<i class="bi bi-check-lg me-2"></i>' +
                                'Added to Cart';


                            setTimeout(
                                function () {

                                    button.innerHTML =
                                        originalHTML;

                                },
                                1500
                            );

                        },
                        600
                    );

                }
            );

        }
    );


    /*
    |--------------------------------------------------------------------------
    | Remove From Wishlist
    |--------------------------------------------------------------------------
    */

    const removeButtons =
        document.querySelectorAll(
            '.remove-wishlist'
        );


    const removeModalElement =
        document.getElementById(
            'removeWishlistModal'
        );


    const removeModal =
        removeModalElement
            ? new bootstrap.Modal(
                removeModalElement
            )
            : null;


    const removeMessage =
        document.getElementById(
            'removeWishlistMessage'
        );


    const confirmRemove =
        document.getElementById(
            'confirmRemoveWishlist'
        );


    let selectedWishlistItem =
        null;


    removeButtons.forEach(
        function (button) {

            button.addEventListener(
                'click',
                function () {

                    selectedWishlistItem =
                        this.closest(
                            '.wishlist-item'
                        );


                    const productName =
                        this.dataset.productName
                        || 'this product';


                    if (removeMessage) {

                        removeMessage.textContent =
                            'Are you sure you want to remove ' +
                            productName +
                            ' from your wishlist?';

                    }


                    removeModal?.show();

                }
            );

        }
    );


    confirmRemove?.addEventListener(
        'click',
        function () {

            if (
                !selectedWishlistItem
            ) {

                return;

            }


            this.disabled =
                true;


            this.innerHTML =
                '<span class="spinner-border spinner-border-sm me-2"></span>' +
                'Removing...';


            /*
            |--------------------------------------------------------------------------
            | Backend wishlist deletion will be connected later.
            |--------------------------------------------------------------------------
            */

            setTimeout(
                function () {

                    selectedWishlistItem.remove();


                    removeModal?.hide();


                    confirmRemove.disabled =
                        false;


                    confirmRemove.innerHTML =
                        'Remove';


                    selectedWishlistItem =
                        null;


                    filterWishlist();

                },
                500
            );

        }
    );


    /*
    |--------------------------------------------------------------------------
    | Add All To Cart
    |--------------------------------------------------------------------------
    */

    const moveAllToCart =
        document.getElementById(
            'moveAllToCart'
        );


    moveAllToCart?.addEventListener(
        'click',
        function () {

            const availableButtons =
                document.querySelectorAll(
                    '.add-to-cart:not(:disabled)'
                );


            if (
                availableButtons.length === 0
            ) {

                return;

            }


            const originalHTML =
                this.innerHTML;


            this.disabled =
                true;


            this.innerHTML =
                '<span class="spinner-border spinner-border-sm me-1"></span>' +
                'Adding...';


            /*
            |--------------------------------------------------------------------------
            | Backend bulk cart request will be connected later.
            |--------------------------------------------------------------------------
            */

            setTimeout(
                function () {

                    moveAllToCart.disabled =
                        false;


                    moveAllToCart.innerHTML =
                        '<i class="bi bi-check-lg me-1"></i>' +
                        'Added';


                    setTimeout(
                        function () {

                            moveAllToCart.innerHTML =
                                originalHTML;

                        },
                        1500
                    );

                },
                800
            );

        }
    );


    /*
    |--------------------------------------------------------------------------
    | Clear Wishlist
    |--------------------------------------------------------------------------
    */

    const clearWishlist =
        document.getElementById(
            'clearWishlist'
        );


    clearWishlist?.addEventListener(
        'click',
        function () {

            if (
                !confirm(
                    'Are you sure you want to clear your wishlist?'
                )
            ) {

                return;

            }


            wishlistItems.forEach(
                function (item) {

                    item.remove();

                }
            );


            emptyState?.classList.remove(
                'd-none'
            );

        }
    );

});
</script>

@endpush

@endsection