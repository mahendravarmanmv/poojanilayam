@extends('layouts.app')

@section('title', 'Product Details | Pooja Nilayam')

@section(
    'meta_description',
    'View product details, pricing and purchase options at the Pooja Nilayam Store.'
)

@section('content')

@php

    /*
    |--------------------------------------------------------------------------
    | TEMPORARY PRODUCT DETAIL DATA
    |--------------------------------------------------------------------------
    | UI prototype only.
    |
    | Actual product information will come from the Product model
    | and admin-managed Product Management module.
    |--------------------------------------------------------------------------
    */

    $product = [

        'name' => 'Premium Pooja Samagri Kit',

        'category' => 'Pooja Samagri',

        'sku' => 'PN-PSK-001',

        'short_description' =>
            'A thoughtfully assembled collection of essential
             pooja items for your daily worship and special
             devotional occasions.',

        'description' =>
            'This product is designed as a convenient collection
             of devotional essentials. The final product contents,
             specifications, pricing and availability will be
             managed through the Pooja Nilayam Store.',

        'price' => 999,

        'mrp' => 1299,

        'rating' => 4.8,

        'reviews' => 124,

        'stock' => true,

        'stock_text' => 'In Stock',

        'main_image' => 'images/home/hero.jpg',

        'images' => [

            'images/home/hero.jpg',
            'images/home/hero.jpg',
            'images/home/hero.jpg',
            'images/home/hero.jpg'

        ],

        'features' => [

            [
                'icon' => 'bi-shield-check',
                'title' => 'Quality Assured',
                'description' => 'Carefully selected products'
            ],

            [
                'icon' => 'bi-box-seam',
                'title' => 'Secure Packaging',
                'description' => 'Packed carefully for delivery'
            ],

            [
                'icon' => 'bi-truck',
                'title' => 'Reliable Delivery',
                'description' => 'Delivery based on location'
            ],

            [
                'icon' => 'bi-headset',
                'title' => 'Customer Support',
                'description' => 'Support when you need it'
            ]

        ]

    ];


    /*
    |--------------------------------------------------------------------------
    | TEMPORARY PRODUCT OPTIONS
    |--------------------------------------------------------------------------
    */

    $options = [

        [
            'title' => 'Standard Pack',
            'description' =>
                'Essential pooja items for everyday worship.',
            'price' => 999,
            'selected' => true
        ],

        [
            'title' => 'Premium Pack',
            'description' =>
                'An expanded collection for special occasions.',
            'price' => 1299,
            'selected' => false
        ]

    ];


    /*
    |--------------------------------------------------------------------------
    | TEMPORARY REVIEWS
    |--------------------------------------------------------------------------
    */

    $reviews = [

        [
            'name' => 'Priya',
            'rating' => 5,
            'date' => 'Recently',
            'comment' =>
                'The product arrived nicely packed and was
                 convenient for our pooja.'
        ],

        [
            'name' => 'Ramesh',
            'rating' => 5,
            'date' => 'Recently',
            'comment' =>
                'Good quality and neatly presented.'
        ],

        [
            'name' => 'Anita',
            'rating' => 4,
            'date' => 'Recently',
            'comment' =>
                'A useful collection for regular worship.'
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


                <li class="breadcrumb-item">

                    <a
                        href="#"
                        class="text-pn-primary"
                    >

                        {{ $product['category'] }}

                    </a>

                </li>


                <li
                    class="breadcrumb-item active"
                    aria-current="page"
                >

                    {{ $product['name'] }}

                </li>

            </ol>

        </nav>

    </div>

</section>


{{-- ============================================================
     PRODUCT DETAILS
============================================================ --}}

<section class="py-5">

    <div class="container">

        <div
            class="row
                   g-4
                   g-xl-5"
        >

            {{-- ====================================================
                 PRODUCT GALLERY
            ===================================================== --}}

            <div class="col-12 col-lg-6">

                <div
                    class="position-sticky"
                    style="top:90px;"
                >

                    <div
                        class="card
                               border
                               border-warning-subtle
                               rounded-5
                               overflow-hidden"
                    >

                        {{-- Main Image --}}

                        <div
                            class="position-relative
                                   bg-light"
                        >

                            <div class="ratio ratio-1x1">

                                <img
                                    id="productMainImage"
                                    src="{{ asset($product['main_image']) }}"
                                    class="object-fit-cover"
                                    alt="{{ $product['name'] }}"
                                    loading="eager"
                                >

                            </div>


                            <span
                                class="position-absolute
                                       top-0
                                       start-0
                                       m-3
                                       badge
                                       rounded-pill
                                       bg-pn-primary"
                            >

                                Featured

                            </span>


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
                                aria-label="Add product to wishlist"
                            >

                                <i class="bi bi-heart fs-5"></i>

                            </button>

                        </div>


                        {{-- Thumbnail Gallery --}}

                        <div
                            class="card-body
                                   p-3"
                        >

                            <div
                                class="d-flex
                                       gap-2
                                       overflow-auto"
                            >

                                @foreach($product['images'] as $index => $image)

                                    <button
                                        type="button"
                                        class="border
                                               {{ $index === 0
                                                    ? 'border-primary border-2'
                                                    : 'border-warning-subtle' }}
                                               rounded-3
                                               bg-white
                                               p-1
                                               flex-shrink-0"
                                        style="width:76px;height:76px;"
                                        data-product-image="{{ asset($image) }}"
                                        aria-label="View product image {{ $index + 1 }}"
                                    >

                                        <img
                                            src="{{ asset($image) }}"
                                            class="w-100
                                                   h-100
                                                   object-fit-cover
                                                   rounded-2"
                                            alt="{{ $product['name'] }} image {{ $index + 1 }}"
                                            loading="lazy"
                                        >

                                    </button>

                                @endforeach

                            </div>

                        </div>

                    </div>


                    {{-- Delivery Information --}}

                    <div
                        class="border
                               border-warning-subtle
                               rounded-4
                               bg-pn-cream
                               p-3
                               mt-3"
                    >

                        <div
                            class="d-flex
                                   align-items-start
                                   gap-3"
                        >

                            <i
                                class="bi bi-truck
                                       text-pn-primary
                                       fs-5"
                            ></i>


                            <div>

                                <strong
                                    class="d-block
                                           small
                                           text-pn-brown"
                                >

                                    Check delivery availability

                                </strong>


                                <small class="text-secondary">

                                    Enter your location during the
                                    shopping process to check delivery
                                    availability.

                                </small>

                            </div>

                        </div>

                    </div>

                </div>

            </div>


            {{-- ====================================================
                 PRODUCT INFORMATION
            ===================================================== --}}

            <div class="col-12 col-lg-6">

                <div>

                    {{-- Category --}}

                    <a
                        href="#"
                        class="small
                               text-pn-primary
                               fw-semibold
                               text-decoration-none
                               text-uppercase"
                    >

                        {{ $product['category'] }}

                    </a>


                    {{-- Product Name --}}

                    <h1
                        class="font-serif
                               display-5
                               text-pn-brown
                               mt-2
                               mb-3"
                    >

                        {{ $product['name'] }}

                    </h1>


                    {{-- Rating --}}

                    <div
                        class="d-flex
                               align-items-center
                               flex-wrap
                               gap-2
                               mb-3"
                    >

                        <span
                            class="badge
                                   bg-warning-subtle
                                   text-dark
                                   rounded-pill"
                        >

                            <i
                                class="bi bi-star-fill
                                       text-warning"
                            ></i>

                            {{ $product['rating'] }}

                        </span>


                        <a
                            href="#reviews"
                            class="small
                                   text-secondary
                                   text-decoration-none"
                        >

                            {{ $product['reviews'] }}
                            customer reviews

                        </a>


                        <span class="text-secondary">

                            ·

                        </span>


                        <small class="text-secondary">

                            SKU: {{ $product['sku'] }}

                        </small>

                    </div>


                    {{-- Short Description --}}

                    <p
                        class="lead
                               text-secondary
                               mb-4"
                    >

                        {{ $product['short_description'] }}

                    </p>


                    {{-- Price --}}

                    <div
                        class="border-top
                               border-bottom
                               border-warning-subtle
                               py-4
                               mb-4"
                    >

                        <div
                            class="d-flex
                                   align-items-end
                                   flex-wrap
                                   gap-2"
                        >

                            <strong
                                class="display-6
                                       text-pn-brown"
                            >

                                ₹{{ number_format($product['price']) }}

                            </strong>


                            <del
                                class="text-secondary
                                       mb-2"
                            >

                                ₹{{ number_format($product['mrp']) }}

                            </del>


                            <span
                                class="badge
                                       rounded-pill
                                       bg-success-subtle
                                       text-success
                                       mb-2"
                            >

                                Save
                                ₹{{ number_format($product['mrp'] - $product['price']) }}

                            </span>

                        </div>


                        <small class="text-secondary">

                            Price inclusive of applicable taxes,
                            subject to final product configuration.

                        </small>

                    </div>


                    {{-- ====================================================
                         PRODUCT OPTIONS
                    ===================================================== --}}

                    <div class="mb-4">

                        <div
                            class="d-flex
                                   align-items-center
                                   justify-content-between
                                   mb-3"
                        >

                            <h2
                                class="font-serif
                                       h4
                                       text-pn-brown
                                       mb-0"
                            >

                                Select Option

                            </h2>


                            <small class="text-secondary">

                                Choose one

                            </small>

                        </div>


                        <div
                            class="vstack
                                   gap-3"
                        >

                            @foreach($options as $index => $option)

                                <input
                                    type="radio"
                                    class="btn-check"
                                    name="product_option"
                                    id="productOption{{ $index }}"
                                    value="{{ $option['title'] }}"
                                    @checked($option['selected'])
                                >


                                <label
                                    for="productOption{{ $index }}"
                                    class="border
                                           border-warning-subtle
                                           rounded-4
                                           bg-white
                                           p-3
                                           p-md-4"
                                    style="cursor:pointer;"
                                >

                                    <div
                                        class="d-flex
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
                                            style="width:50px;height:50px;"
                                        >

                                            <i
                                                class="bi bi-box-seam
                                                       fs-5"
                                            ></i>

                                        </div>


                                        <div class="flex-grow-1">

                                            <div
                                                class="d-flex
                                                       justify-content-between
                                                       align-items-start
                                                       gap-3"
                                            >

                                                <div>

                                                    <h3
                                                        class="font-serif
                                                               h5
                                                               text-pn-brown
                                                               mb-1"
                                                    >

                                                        {{ $option['title'] }}

                                                    </h3>


                                                    <p
                                                        class="small
                                                               text-secondary
                                                               mb-0"
                                                    >

                                                        {{ $option['description'] }}

                                                    </p>

                                                </div>


                                                <span
                                                    class="rounded-circle
                                                           border
                                                           border-secondary
                                                           flex-shrink-0"
                                                    style="width:20px;height:20px;"
                                                ></span>

                                            </div>


                                            <hr
                                                class="border-warning-subtle
                                                       my-3"
                                            >


                                            <strong
                                                class="fs-5
                                                       text-pn-primary"
                                            >

                                                ₹{{ number_format($option['price']) }}

                                            </strong>

                                        </div>

                                    </div>

                                </label>

                            @endforeach

                        </div>

                    </div>


                    {{-- ====================================================
                         BENEFITS
                    ===================================================== --}}

                    <div
                        class="border-top
                               border-bottom
                               border-warning-subtle
                               py-3
                               mb-4"
                    >

                        <div
                            class="row
                                   row-cols-2
                                   g-3"
                        >

                            @foreach($product['features'] as $feature)

                                <div class="col">

                                    <div
                                        class="d-flex
                                               align-items-start
                                               gap-2"
                                    >

                                        <i
                                            class="bi {{ $feature['icon'] }}
                                                   text-pn-primary
                                                   fs-5"
                                        ></i>


                                        <div>

                                            <strong
                                                class="small
                                                       d-block
                                                       text-pn-brown"
                                            >

                                                {{ $feature['title'] }}

                                            </strong>


                                            <small
                                                class="text-secondary"
                                            >

                                                {{ $feature['description'] }}

                                            </small>

                                        </div>

                                    </div>

                                </div>

                            @endforeach

                        </div>

                    </div>


                    {{-- ====================================================
                         STOCK
                    ===================================================== --}}

                    @if($product['stock'])

                        <div
                            class="d-flex
                                   align-items-center
                                   gap-2
                                   mb-3"
                        >

                            <span
                                class="rounded-circle
                                       bg-success"
                                style="width:9px;height:9px;"
                            ></span>


                            <small
                                class="text-success
                                       fw-semibold"
                            >

                                {{ $product['stock_text'] }}

                            </small>

                        </div>

                    @else

                        <div
                            class="alert
                                   alert-danger
                                   rounded-4"
                        >

                            This product is currently unavailable.

                        </div>

                    @endif


                    {{-- ====================================================
                         QUANTITY + CART
                    ===================================================== --}}

                    <div
                        class="d-flex
                               flex-column
                               flex-sm-row
                               gap-3
                               mb-4"
                    >

                        {{-- Quantity --}}

                        <div>

                            <label
                                for="productQuantity"
                                class="form-label
                                       small
                                       fw-semibold
                                       text-pn-brown"
                            >

                                Quantity

                            </label>


                            <div
                                class="input-group"
                                style="width:150px;"
                            >

                                <button
                                    type="button"
                                    class="btn
                                           btn-outline-secondary"
                                    id="quantityMinus"
                                    aria-label="Decrease quantity"
                                >

                                    <i class="bi bi-dash"></i>

                                </button>


                                <input
                                    type="number"
                                    id="productQuantity"
                                    name="quantity"
                                    class="form-control
                                           text-center"
                                    value="1"
                                    min="1"
                                    max="99"
                                    aria-label="Product quantity"
                                >


                                <button
                                    type="button"
                                    class="btn
                                           btn-outline-secondary"
                                    id="quantityPlus"
                                    aria-label="Increase quantity"
                                >

                                    <i class="bi bi-plus"></i>

                                </button>

                            </div>

                        </div>


                        {{-- Add to Cart --}}

                        <div
                            class="flex-grow-1
                                   d-flex
                                   align-items-end"
                        >

                            <button
                                type="button"
                                class="btn
                                       btn-pn
                                       btn-lg
                                       w-100"
                                @disabled(!$product['stock'])
                            >

                                <i
                                    class="bi bi-bag-plus me-2"
                                ></i>

                                Add to Cart

                            </button>

                        </div>


                        {{-- Wishlist --}}

                        <div
                            class="d-flex
                                   align-items-end"
                        >

                            <button
                                type="button"
                                class="btn
                                       btn-pn-outline
                                       btn-lg"
                                aria-label="Add to wishlist"
                            >

                                <i class="bi bi-heart"></i>

                            </button>

                        </div>

                    </div>


                    {{-- Buy Now --}}

                    <button
                        type="button"
                        class="btn
                               btn-outline-dark
                               btn-lg
                               w-100
                               mb-4"
                        @disabled(!$product['stock'])
                    >

                        Buy Now

                    </button>


                    {{-- Description Accordion --}}

                    <div
                        class="accordion
                               accordion-flush
                               border-top
                               border-warning-subtle"
                        id="productInformation"
                    >

                        {{-- Description --}}

                        <div
                            class="accordion-item
                                   bg-transparent"
                        >

                            <h2 class="accordion-header">

                                <button
                                    class="accordion-button
                                           bg-transparent
                                           px-0"
                                    type="button"
                                    data-bs-toggle="collapse"
                                    data-bs-target="#productDescription"
                                    aria-expanded="true"
                                    aria-controls="productDescription"
                                >

                                    Product Description

                                </button>

                            </h2>


                            <div
                                id="productDescription"
                                class="accordion-collapse collapse show"
                            >

                                <div
                                    class="accordion-body
                                           px-0
                                           text-secondary"
                                >

                                    {{ $product['description'] }}

                                </div>

                            </div>

                        </div>


                        {{-- Product Information --}}

                        <div
                            class="accordion-item
                                   bg-transparent"
                        >

                            <h2 class="accordion-header">

                                <button
                                    class="accordion-button
                                           collapsed
                                           bg-transparent
                                           px-0"
                                    type="button"
                                    data-bs-toggle="collapse"
                                    data-bs-target="#productInformationDetails"
                                    aria-expanded="false"
                                    aria-controls="productInformationDetails"
                                >

                                    Product Information

                                </button>

                            </h2>


                            <div
                                id="productInformationDetails"
                                class="accordion-collapse collapse"
                            >

                                <div
                                    class="accordion-body
                                           px-0"
                                >

                                    <dl
                                        class="row
                                               mb-0"
                                    >

                                        <dt
                                            class="col-5
                                                   small
                                                   text-secondary"
                                        >

                                            Category

                                        </dt>


                                        <dd
                                            class="col-7
                                                   small
                                                   text-pn-brown"
                                        >

                                            {{ $product['category'] }}

                                        </dd>


                                        <dt
                                            class="col-5
                                                   small
                                                   text-secondary"
                                        >

                                            SKU

                                        </dt>


                                        <dd
                                            class="col-7
                                                   small
                                                   text-pn-brown"
                                        >

                                            {{ $product['sku'] }}

                                        </dd>


                                        <dt
                                            class="col-5
                                                   small
                                                   text-secondary"
                                        >

                                            Availability

                                        </dt>


                                        <dd
                                            class="col-7
                                                   small
                                                   text-pn-brown"
                                        >

                                            {{ $product['stock_text'] }}

                                        </dd>

                                    </dl>

                                </div>

                            </div>

                        </div>


                        {{-- Shipping --}}

                        <div
                            class="accordion-item
                                   bg-transparent"
                        >

                            <h2 class="accordion-header">

                                <button
                                    class="accordion-button
                                           collapsed
                                           bg-transparent
                                           px-0"
                                    type="button"
                                    data-bs-toggle="collapse"
                                    data-bs-target="#shippingInformation"
                                    aria-expanded="false"
                                    aria-controls="shippingInformation"
                                >

                                    Delivery Information

                                </button>

                            </h2>


                            <div
                                id="shippingInformation"
                                class="accordion-collapse collapse"
                            >

                                <div
                                    class="accordion-body
                                           px-0
                                           text-secondary"
                                >

                                    Delivery availability, estimated
                                    delivery time and applicable charges
                                    will be determined based on the
                                    customer's location and final
                                    shipping configuration.

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
     REVIEWS
============================================================ --}}

<section
    id="reviews"
    class="py-5 bg-pn-cream"
>

    <div class="container">

        <div
            class="row
                   g-4
                   align-items-start"
        >

            {{-- Review Summary --}}

            <div class="col-12 col-lg-4">

                <div
                    class="card
                           border
                           border-warning-subtle
                           rounded-5
                           bg-white"
                >

                    <div
                        class="card-body
                               p-4
                               p-md-5
                               text-center"
                    >

                        <span
                            class="small
                                   text-pn-gold
                                   fw-semibold
                                   text-uppercase"
                        >

                            Customer Reviews

                        </span>


                        <div
                            class="display-4
                                   fw-semibold
                                   text-pn-brown
                                   mt-3"
                        >

                            {{ $product['rating'] }}

                        </div>


                        <div
                            class="text-warning
                                   fs-5
                                   mb-2"
                        >

                            @for($star = 1; $star <= 5; $star++)

                                @if($star <= round($product['rating']))

                                    <i class="bi bi-star-fill"></i>

                                @else

                                    <i class="bi bi-star"></i>

                                @endif

                            @endfor

                        </div>


                        <p
                            class="small
                                   text-secondary
                                   mb-4"
                        >

                            Based on
                            {{ $product['reviews'] }}
                            reviews

                        </p>


                        <button
                            type="button"
                            class="btn
                                   btn-pn-outline
                                   w-100"
                        >

                            Write a Review

                        </button>

                    </div>

                </div>

            </div>


            {{-- Reviews --}}

            <div class="col-12 col-lg-8">

                <div
                    class="d-flex
                           align-items-center
                           justify-content-between
                           gap-3
                           mb-3"
                >

                    <h2
                        class="font-serif
                               h3
                               text-pn-brown
                               mb-0"
                    >

                        What customers say

                    </h2>


                    <select
                        class="form-select
                               form-select-sm"
                        style="width:auto;"
                    >

                        <option selected>
                            Most Recent
                        </option>

                        <option>
                            Highest Rated
                        </option>

                        <option>
                            Lowest Rated
                        </option>

                    </select>

                </div>


                <div class="vstack gap-3">

                    @foreach($reviews as $review)

                        <article
                            class="card
                                   border
                                   border-warning-subtle
                                   rounded-4
                                   bg-white"
                        >

                            <div class="card-body p-4">

                                <div
                                    class="d-flex
                                           align-items-start
                                           justify-content-between
                                           gap-3"
                                >

                                    <div>

                                        <strong
                                            class="d-block
                                                   text-pn-brown"
                                        >

                                            {{ $review['name'] }}

                                        </strong>


                                        <div
                                            class="text-warning
                                                   small
                                                   mt-1"
                                        >

                                            @for($star = 1; $star <= 5; $star++)

                                                @if($star <= $review['rating'])

                                                    <i
                                                        class="bi bi-star-fill"
                                                    ></i>

                                                @else

                                                    <i
                                                        class="bi bi-star"
                                                    ></i>

                                                @endif

                                            @endfor

                                        </div>

                                    </div>


                                    <small class="text-secondary">

                                        {{ $review['date'] }}

                                    </small>

                                </div>


                                <p
                                    class="small
                                           text-secondary
                                           mt-3
                                           mb-0"
                                >

                                    {{ $review['comment'] }}

                                </p>

                            </div>

                        </article>

                    @endforeach

                </div>

            </div>

        </div>

    </div>

</section>


{{-- ============================================================
     RELATED PRODUCTS
============================================================ --}}

<section class="py-5">

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

                    You May Also Like

                </span>


                <h2
                    class="font-serif
                           display-6
                           text-pn-brown
                           mt-2
                           mb-0"
                >

                    Complete your pooja essentials

                </h2>

            </div>


            <a
                href="#"
                class="btn
                       btn-pn-outline
                       align-self-start
                       align-self-md-auto"
            >

                View All Products

                <i
                    class="bi bi-arrow-right ms-2"
                ></i>

            </a>

        </div>


        <div
            class="row
                   row-cols-1
                   row-cols-sm-2
                   row-cols-lg-4
                   g-4"
        >

            @foreach([

                [
                    'name' => 'Brass Diya',
                    'price' => 299
                ],

                [
                    'name' => 'Sandalwood Dhoop',
                    'price' => 249
                ],

                [
                    'name' => 'Pooja Kumkum Set',
                    'price' => 199
                ],

                [
                    'name' => 'Brass Bell',
                    'price' => 449
                ]

            ] as $related)

                <div class="col">

                    <article
                        class="card
                               border
                               border-warning-subtle
                               rounded-4
                               overflow-hidden
                               h-100"
                    >

                        <div class="ratio ratio-1x1">

                            <img
                                src="{{ asset('images/home/hero.jpg') }}"
                                class="object-fit-cover"
                                alt="{{ $related['name'] }}"
                                loading="lazy"
                            >

                        </div>


                        <div class="card-body p-3">

                            <small
                                class="text-pn-primary
                                       fw-semibold"
                            >

                                Pooja Essentials

                            </small>


                            <h3
                                class="font-serif
                                       h5
                                       text-pn-brown
                                       mt-1"
                            >

                                {{ $related['name'] }}

                            </h3>


                            <div
                                class="d-flex
                                       align-items-center
                                       justify-content-between
                                       gap-2"
                            >

                                <strong
                                    class="text-pn-brown"
                                >

                                    ₹{{ number_format($related['price']) }}

                                </strong>


                                <button
                                    type="button"
                                    class="btn
                                           btn-pn
                                           btn-sm"
                                >

                                    <i
                                        class="bi bi-bag-plus"
                                    ></i>

                                </button>

                            </div>

                        </div>

                    </article>

                </div>

            @endforeach

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

                    Continue your devotional shopping.

                </h2>


                <p
                    class="text-white-50
                           col-lg-7
                           mx-auto
                           mb-4"
                >

                    Explore more pooja essentials, spiritual
                    products and devotional collections.

                </p>


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

</section>


{{-- ============================================================
     MINIMAL PAGE JS
============================================================ --}}

@push('scripts')

<script>
document.addEventListener('DOMContentLoaded', function () {

    /*
    |--------------------------------------------------------------------------
    | Product Thumbnail Gallery
    |--------------------------------------------------------------------------
    */

    const mainImage = document.getElementById('productMainImage');

    document
        .querySelectorAll('[data-product-image]')
        .forEach(function (thumbnail) {

            thumbnail.addEventListener('click', function () {

                const image = this.dataset.productImage;

                if (mainImage && image) {
                    mainImage.src = image;
                }

                document
                    .querySelectorAll('[data-product-image]')
                    .forEach(function (item) {
                        item.classList.remove(
                            'border-primary',
                            'border-2'
                        );

                        item.classList.add(
                            'border-warning-subtle'
                        );
                    });

                this.classList.remove(
                    'border-warning-subtle'
                );

                this.classList.add(
                    'border-primary',
                    'border-2'
                );

            });

        });


    /*
    |--------------------------------------------------------------------------
    | Quantity Controls
    |--------------------------------------------------------------------------
    */

    const quantityInput =
        document.getElementById('productQuantity');

    const quantityMinus =
        document.getElementById('quantityMinus');

    const quantityPlus =
        document.getElementById('quantityPlus');


    if (quantityInput && quantityMinus && quantityPlus) {

        quantityMinus.addEventListener('click', function () {

            const current =
                parseInt(quantityInput.value, 10) || 1;

            quantityInput.value =
                Math.max(1, current - 1);

        });


        quantityPlus.addEventListener('click', function () {

            const current =
                parseInt(quantityInput.value, 10) || 1;

            quantityInput.value =
                Math.min(99, current + 1);

        });


        quantityInput.addEventListener('change', function () {

            let value =
                parseInt(this.value, 10) || 1;

            value =
                Math.min(99, Math.max(1, value));

            this.value = value;

        });

    }

});
</script>

@endpush

@endsection