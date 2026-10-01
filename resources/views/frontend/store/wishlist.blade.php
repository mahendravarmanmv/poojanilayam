@extends('layouts.app')

@section('title', 'My Wishlist | Pooja Nilayam')

@section(
    'meta_description',
    'View and manage your saved devotional products at Pooja Nilayam.'
)

@section('content')

@php
    // Wishlist data is supplied by StoreWishlistController.
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
                        href="{{ route('store.index') }}"
                        class="text-pn-primary"
                    >
                        Store
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
     WISHLIST HERO
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

                    My Wishlist

                </span>


                <h1
                    class="font-serif
                           display-3
                           text-pn-brown
                           mt-2
                           mb-3"
                >

                    Saved with
                    <span class="text-pn-primary">
                        devotion.
                    </span>

                </h1>


                <p
                    class="lead
                           text-secondary
                           mb-0"
                >

                    Keep your favourite devotional products
                    together and return to them whenever you
                    are ready.

                </p>

            </div>


            <div class="col-12 col-lg-4">

                <div
                    class="border
                           border-warning-subtle
                           rounded-5
                           bg-white
                           p-4
                           text-center"
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
                        style="width:64px;height:64px;"
                    >

                        <i class="bi bi-heart-fill fs-4"></i>

                    </div>


                    <strong
                        class="d-block
                               display-6
                               font-serif
                               text-pn-brown"
                    >

                        <span data-wishlist-count>{{ count($wishlistProducts) }}</span>

                    </strong>


                    <span class="text-secondary">

                        Saved Products

                    </span>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- ============================================================
     LOGIN / ACCOUNT INFORMATION
============================================================ --}}

<section class="py-4">

    <div class="container">

        <div
            class="alert
                   alert-light
                   border
                   border-warning-subtle
                   rounded-4
                   d-flex
                   flex-column
                   flex-sm-row
                   align-items-start
                   align-items-sm-center
                   justify-content-between
                   gap-3
                   mb-0"
        >

            <div
                class="d-flex
                       align-items-start
                       gap-3"
            >

                <i
                    class="bi bi-person-circle
                           text-pn-primary
                           fs-4"
                ></i>


                <div>

                    <strong
                        class="d-block
                               text-pn-brown"
                    >

                        Sign in to keep your wishlist with you.

                    </strong>


                    <small class="text-secondary">

                        Your saved products can be associated with
                        your account when wishlist functionality is
                        connected.

                    </small>

                </div>

            </div>


            <a
                href="{{ route('auth.login') }}"
                class="btn
                       btn-pn
                       btn-sm
                       flex-shrink-0"
            >

                Sign In

            </a>

        </div>

    </div>

</section>


{{-- ============================================================
     WISHLIST PRODUCTS
============================================================ --}}

<section class="py-5">

    <div class="container">

        <div
            class="d-flex
                   flex-column
                   flex-md-row
                   align-items-md-center
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

                    Your Saved Items

                </span>


                <h2
                    class="font-serif
                           display-6
                           text-pn-brown
                           mt-2
                           mb-0"
                >

                    Wishlist Products

                </h2>

            </div>


            <div
                class="d-flex
                       flex-wrap
                       gap-2"
            >

                <button
                    type="button"
                    class="btn
                           btn-pn-outline"
                >

                    <i
                        class="bi bi-cart-plus me-1"
                    ></i>

                    Add All to Cart

                </button>


                <button
                    type="button"
                    class="btn
                           btn-outline-secondary"
                >

                    <i
                        class="bi bi-trash3 me-1"
                    ></i>

                    Clear Wishlist

                </button>

            </div>

        </div>


        {{-- ====================================================
             PRODUCT GRID
        ===================================================== --}}

        <div
            class="row
                   row-cols-1
                   row-cols-sm-2
                   row-cols-lg-3
                   row-cols-xl-4
                   g-4"
        >

            @foreach($wishlistProducts as $index => $product)

                <div class="col">

                    <article
                        class="card
                               border
                               border-warning-subtle
                               rounded-4
                               overflow-hidden
                               h-100"
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


                            {{-- Remove Wishlist --}}

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
                                data-wishlist-remove
                                data-product-id="{{ $product['id'] }}"
                                aria-label="Remove {{ $product['name'] }} from wishlist"
                            >

                                <i class="bi bi-heart-fill text-danger"></i>

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

                                    {{ $product['rating'] !== null ? number_format($product['rating'], 1) : '—' }}

                                </span>


                                <small class="text-secondary">

                                    @if($product['reviews'] !== null)({{ $product['reviews'] }})@endif

                                </small>

                            </div>


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

                                    {{ $product['price'] !== null ? $product['currency_symbol'] . number_format($product['price'], 2) : 'Price not available' }}

                                </strong>


                                <del
                                    class="small
                                           text-secondary"
                                >

                                    @if($product['old_price'] !== null){{ $product['currency_symbol'] . number_format($product['old_price'], 2) }}@endif

                                </del>

                            </div>


                            {{-- Stock --}}

                            <div class="mb-3">

                                @if($product['stock'])

                                    <small
                                        class="text-success
                                               fw-semibold"
                                    >

                                        <i
                                            class="bi bi-check-circle-fill me-1"
                                        ></i>

                                        {{ $product['stock_text'] }}

                                    </small>

                                @else

                                    <small
                                        class="text-danger
                                               fw-semibold"
                                    >

                                        <i
                                            class="bi bi-x-circle-fill me-1"
                                        ></i>

                                        {{ $product['stock_text'] }}

                                    </small>

                                @endif

                            </div>


                            {{-- Actions --}}

                            <div
                                class="d-flex
                                       gap-2
                                       mt-auto"
                            >

                                <a
                                    href="{{ route('store.product', ['slug' => $product['slug']]) }}"
                                    class="btn
                                           btn-pn-outline
                                           flex-grow-1"
                                >

                                    View Product

                                </a>


                                @if($product['stock'])

                                    <button
                                        type="button"
                                        class="btn
                                               btn-pn"
                                        data-add-cart
                                        data-product-id="{{ $product['id'] }}"
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
                                               btn-secondary"
                                        disabled
                                    >

                                        <i
                                            class="bi bi-bag"
                                        ></i>

                                    </button>

                                @endif

                            </div>

                        </div>

                    </article>

                </div>

            @endforeach

        </div>

    </div>

</section>


{{-- ============================================================
     WISHLIST EMPTY STATE
============================================================ --}}

<section
    id="wishlist-empty-state"
    class="py-5 d-none"
>

    <div class="container">

        <div
            class="border
                   border-warning-subtle
                   rounded-5
                   bg-pn-cream
                   p-5
                   text-center"
        >

            <div
                class="rounded-circle
                       bg-white
                       text-pn-primary
                       d-flex
                       align-items-center
                       justify-content-center
                       mx-auto
                       mb-4"
                style="width:80px;height:80px;"
            >

                <i class="bi bi-heart fs-3"></i>

            </div>


            <h2
                class="font-serif
                       display-6
                       text-pn-brown"
            >

                Your wishlist is empty.

            </h2>


            <p
                class="text-secondary
                       col-lg-6
                       mx-auto"
            >

                Save products you love and they will appear here
                for easy access later.

            </p>


            <a
                href="{{ route('store.index') }}"
                class="btn btn-pn"
            >

                Explore Store

                <i
                    class="bi bi-arrow-right ms-2"
                ></i>

            </a>

        </div>

    </div>

</section>


{{-- ============================================================
     WISHLIST BENEFITS
============================================================ --}}

<section class="py-5 bg-pn-cream">

    <div class="container">

        <div
            class="text-center
                   mb-5"
        >

            <span
                class="small
                       text-pn-gold
                       fw-semibold
                       text-uppercase"
            >

                Your Saved Collection

            </span>


            <h2
                class="font-serif
                       display-6
                       text-pn-brown
                       mt-2"
            >

                Why use your wishlist?

            </h2>

        </div>


        <div
            class="row
                   row-cols-1
                   row-cols-md-3
                   g-4"
        >

            <div class="col">

                <div
                    class="card
                           border
                           border-warning-subtle
                           rounded-5
                           bg-white
                           h-100"
                >

                    <div
                        class="card-body
                               p-4
                               text-center"
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
                            style="width:60px;height:60px;"
                        >

                            <i class="bi bi-heart fs-4"></i>

                        </div>


                        <h3
                            class="font-serif
                                   h4
                                   text-pn-brown"
                        >

                            Save Favourites

                        </h3>


                        <p
                            class="small
                                   text-secondary
                                   mb-0"
                        >

                            Keep products you love in one
                            convenient place.

                        </p>

                    </div>

                </div>

            </div>


            <div class="col">

                <div
                    class="card
                           border
                           border-warning-subtle
                           rounded-5
                           bg-white
                           h-100"
                >

                    <div
                        class="card-body
                               p-4
                               text-center"
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
                            style="width:60px;height:60px;"
                        >

                            <i class="bi bi-bag-plus fs-4"></i>

                        </div>


                        <h3
                            class="font-serif
                                   h4
                                   text-pn-brown"
                        >

                            Shop When Ready

                        </h3>


                        <p
                            class="small
                                   text-secondary
                                   mb-0"
                        >

                            Move saved products to your cart
                            whenever you are ready.

                        </p>

                    </div>

                </div>

            </div>


            <div class="col">

                <div
                    class="card
                           border
                           border-warning-subtle
                           rounded-5
                           bg-white
                           h-100"
                >

                    <div
                        class="card-body
                               p-4
                               text-center"
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
                            style="width:60px;height:60px;"
                        >

                            <i class="bi bi-stars fs-4"></i>

                        </div>


                        <h3
                            class="font-serif
                                   h4
                                   text-pn-brown"
                        >

                            Keep Your Choices

                        </h3>


                        <p
                            class="small
                                   text-secondary
                                   mb-0"
                        >

                            Quickly return to products you
                            are considering.

                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- ============================================================
     STORE CTA
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

                    Discover more devotional essentials.

                </h2>


                <p
                    class="text-white-50
                           col-lg-7
                           mx-auto
                           mb-4"
                >

                    Explore the Pooja Nilayam Store and find
                    products for your daily worship and special
                    occasions.

                </p>


                <a
                    href="{{ route('store.index') }}"
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


{{-- ============================================================
     MINIMAL PAGE JS
============================================================ --}}

@push('scripts')

<script>
document.addEventListener('DOMContentLoaded', function () {
    const csrf = document.querySelector('meta[name=\"csrf-token\"]')?.getAttribute('content');
    const request = (url, method, body) => fetch(url, {
        method,
        headers: { 'X-CSRF-TOKEN': csrf, 'Accept': 'application/json', 'Content-Type': 'application/json' },
        body: body ? JSON.stringify(body) : undefined
    }).then(async response => {
        const data = await response.json().catch(() => ({}));
        if (!response.ok) throw new Error(data.message || 'Request failed.');
        return data;
    });

    document.querySelectorAll('[data-wishlist-remove]').forEach(button => {
        button.addEventListener('click', async function () {
            try {
                await request('{{ route('store.wishlist.remove') }}', 'DELETE', { product_id: this.dataset.productId });
                this.closest('.col')?.remove();
                const count = document.querySelectorAll('[data-wishlist-remove]').length;
                const counter = document.querySelector('[data-wishlist-count]');
                if (counter) counter.textContent = count;
                if (!count) document.getElementById('wishlist-empty-state')?.classList.remove('d-none');
            } catch (error) { alert(error.message); }
        });
    });

    document.querySelectorAll('[data-add-cart]').forEach(button => {
        button.addEventListener('click', async function () {
            const original = this.innerHTML;
            this.disabled = true;
            try {
                await request('{{ route('store.cart.add') }}', 'POST', { product_id: this.dataset.productId, quantity: 1 });
                this.innerHTML = '<i class="bi bi-check-lg"></i>';
            } catch (error) {
                alert(error.message);
            } finally {
                setTimeout(() => { this.innerHTML = original; this.disabled = false; }, 1000);
            }
        });
    });
});
</script>

@endpush

@endsection