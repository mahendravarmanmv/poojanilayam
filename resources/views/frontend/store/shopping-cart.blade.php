@extends('layouts.app')

@section('title', 'Shopping Cart | Pooja Nilayam')

@section(
    'meta_description',
    'Review your selected devotional products before checkout at Pooja Nilayam.'
)

@section('content')

@php
    // Cart data and totals are supplied by StoreCartController.
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
                    Shopping Cart
                </li>

            </ol>

        </nav>

    </div>

</section>


{{-- ============================================================
     CART HEADER
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

                    Pooja Store

                </span>


                <h1
                    class="font-serif
                           display-4
                           text-pn-brown
                           mt-2
                           mb-3"
                >

                    Your shopping cart

                </h1>


                <p
                    class="lead
                           text-secondary
                           mb-0"
                >

                    Review your selected products before
                    continuing to checkout.

                </p>

            </div>


            <div class="col-12 col-lg-4">

                <div
                    class="border
                           border-warning-subtle
                           rounded-5
                           bg-white
                           p-4"
                >

                    <div
                        class="d-flex
                               align-items-center
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
                            style="width:58px;height:58px;"
                        >

                            <i
                                class="bi bi-bag
                                       fs-5"
                            ></i>

                        </div>


                        <div>

                            <strong
                                class="d-block
                                       font-serif
                                       h5
                                       text-pn-brown
                                       mb-1"
                            >

                                {{ count($cartItems) }}
                                Items

                            </strong>


                            <small class="text-secondary">

                                Ready for review

                            </small>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- ============================================================
     CHECKOUT PROGRESS
============================================================ --}}

<section class="py-4 border-bottom">

    <div class="container">

        <div
            class="d-flex
                   align-items-center
                   justify-content-center"
        >

            {{-- Cart --}}

            <div
                class="d-flex
                       align-items-center
                       gap-2"
            >

                <span
                    class="rounded-circle
                           bg-pn-primary
                           text-white
                           d-inline-flex
                           align-items-center
                           justify-content-center"
                    style="width:34px;height:34px;"
                >

                    <i class="bi bi-check"></i>

                </span>


                <small
                    class="fw-semibold
                           text-pn-primary
                           d-none
                           d-sm-inline"
                >

                    Cart

                </small>

            </div>


            <div
                class="bg-pn-primary
                       mx-2
                       mx-sm-3"
                style="height:2px;width:45px;"
            ></div>


            {{-- Checkout --}}

            <div
                class="d-flex
                       align-items-center
                       gap-2"
            >

                <span
                    class="rounded-circle
                           border
                           border-secondary
                           text-secondary
                           d-inline-flex
                           align-items-center
                           justify-content-center"
                    style="width:34px;height:34px;"
                >

                    2

                </span>


                <small
                    class="text-secondary
                           d-none
                           d-sm-inline"
                >

                    Checkout

                </small>

            </div>


            <div
                class="bg-secondary-subtle
                       mx-2
                       mx-sm-3"
                style="height:2px;width:45px;"
            ></div>


            {{-- Payment --}}

            <div
                class="d-flex
                       align-items-center
                       gap-2"
            >

                <span
                    class="rounded-circle
                           border
                           border-secondary
                           text-secondary
                           d-inline-flex
                           align-items-center
                           justify-content-center"
                    style="width:34px;height:34px;"
                >

                    3

                </span>


                <small
                    class="text-secondary
                           d-none
                           d-sm-inline"
                >

                    Payment

                </small>

            </div>

        </div>

    </div>

</section>


{{-- ============================================================
     CART CONTENT
============================================================ --}}

<section class="py-5">

    <div class="container">

        <div class="row g-4 g-xl-5">

            {{-- ====================================================
                 CART ITEMS
            ===================================================== --}}

            <div class="col-12 col-lg-8">

                <div
                    class="d-flex
                           align-items-center
                           justify-content-between
                           gap-3
                           mb-4"
                >

                    <div>

                        <h2
                            class="font-serif
                                   h3
                                   text-pn-brown
                                   mb-1"
                        >

                            Cart Items

                        </h2>


                        <small class="text-secondary">

                            {{ count($cartItems) }}
                            products selected

                        </small>

                    </div>


                    <button
                        type="button"
                        class="btn
                               btn-link
                               text-danger
                               p-0
                               small"
                        id="clearCart"
                    >

                        <i
                            class="bi bi-trash3 me-1"
                        ></i>

                        Clear Cart

                    </button>

                </div>


                {{-- Cart Items --}}

                <div
                    class="vstack
                           gap-3"
                    id="cartItemsContainer"
                >

                    @foreach($cartItems as $item)

                        <article
                            class="card
                                   border
                                   border-warning-subtle
                                   rounded-4
                                   cart-item"
                            data-cart-item
                            data-item-id="{{ $item['id'] }}"
                            data-price="{{ $item['price'] }}"
                        >

                            <div class="card-body p-3 p-md-4">

                                <div
                                    class="row
                                           align-items-center
                                           g-3"
                                >

                                    {{-- Image --}}

                                    <div class="col-4 col-sm-3">

                                        <div
                                            class="ratio ratio-1x1
                                                   rounded-3
                                                   overflow-hidden
                                                   bg-light"
                                        >

                                            <img
                                                src="{{ $item['image'] ? asset($item['image']) : asset('images/home/hero.webp') }}"
                                                class="object-fit-cover"
                                                alt="{{ $item['name'] }}"
                                                loading="lazy"
                                            >

                                        </div>

                                    </div>


                                    {{-- Product Details --}}

                                    <div class="col-8 col-sm-9 col-lg-5">

                                        <div
                                            class="d-flex
                                                   align-items-start
                                                   justify-content-between
                                                   gap-2"
                                        >

                                            <div>

                                                <small
                                                    class="text-pn-primary
                                                           fw-semibold"
                                                >

                                                    {{ $item['category'] }}

                                                </small>


                                                <h3
                                                    class="font-serif
                                                           h5
                                                           text-pn-brown
                                                           mt-1
                                                           mb-2"
                                                >

                                                    {{ $item['name'] }}

                                                </h3>


                                                <p
                                                    class="small
                                                           text-secondary
                                                           mb-2
                                                           d-none
                                                           d-sm-block"
                                                >

                                                    {{ $item['description'] }}

                                                </p>


                                                @if($item['stock'])

                                                    <small
                                                        class="text-success
                                                               fw-semibold"
                                                    >

                                                        <i
                                                            class="bi bi-check-circle-fill me-1"
                                                        ></i>

                                                        In Stock

                                                    </small>

                                                @else

                                                    <small
                                                        class="text-danger
                                                               fw-semibold"
                                                    >

                                                        Currently unavailable

                                                    </small>

                                                @endif

                                            </div>


                                            {{-- Remove --}}

                                            <button
                                                type="button"
                                                class="btn
                                                       btn-sm
                                                       btn-light
                                                       rounded-circle
                                                       cart-remove"
                                                aria-label="Remove {{ $item['name'] }}"
                                            >

                                                <i
                                                    class="bi bi-x"
                                                ></i>

                                            </button>

                                        </div>

                                    </div>


                                    {{-- Quantity --}}

                                    <div
                                        class="col-7
                                               col-sm-6
                                               col-lg-2"
                                    >

                                        <label
                                            class="form-label
                                                   small
                                                   text-secondary
                                                   mb-2"
                                        >

                                            Quantity

                                        </label>


                                        <div
                                            class="input-group"
                                        >

                                            <button
                                                type="button"
                                                class="btn
                                                       btn-outline-secondary
                                                       cart-minus"
                                                aria-label="Decrease quantity"
                                            >

                                                <i
                                                    class="bi bi-dash"
                                                ></i>

                                            </button>


                                            <input
                                                type="number"
                                                class="form-control
                                                       text-center
                                                       cart-quantity"
                                                value="{{ $item['quantity'] }}"
                                                min="1"
                                                max="99"
                                                aria-label="Quantity"
                                            >


                                            <button
                                                type="button"
                                                class="btn
                                                       btn-outline-secondary
                                                       cart-plus"
                                                aria-label="Increase quantity"
                                            >

                                                <i
                                                    class="bi bi-plus"
                                                ></i>

                                            </button>

                                        </div>

                                    </div>


                                    {{-- Price --}}

                                    <div
                                        class="col-5
                                               col-sm-6
                                               col-lg-2
                                               text-end"
                                    >

                                        <small
                                            class="text-secondary
                                                   d-block
                                                   d-sm-none"
                                        >

                                            Total

                                        </small>


                                        <strong
                                            class="fs-5
                                                   text-pn-brown
                                                   cart-item-total"
                                        >

                                            {{ number_format($item['price'] * $item['quantity'], 2) }}

                                        </strong>


                                        

                                    </div>

                                </div>

                            </div>

                        </article>

                    @endforeach

                </div>


                {{-- Continue Shopping --}}

                <div class="mt-4">

                    <a
                        href="{{ route('store.index') }}"
                        class="btn
                               btn-pn-outline"
                    >

                        <i
                            class="bi bi-arrow-left me-2"
                        ></i>

                        Continue Shopping

                    </a>

                </div>


                {{-- ====================================================
                     CART NOTE
                ===================================================== --}}

                <div
                    class="border
                           border-warning-subtle
                           rounded-4
                           bg-pn-cream
                           p-4
                           mt-4"
                >

                    <div
                        class="d-flex
                               align-items-start
                               gap-3"
                    >

                        <i
                            class="bi bi-info-circle
                                   text-pn-primary
                                   fs-5"
                        ></i>


                        <div>

                            <strong
                                class="d-block
                                       text-pn-brown
                                       mb-1"
                            >

                                Before you checkout

                            </strong>


                            <small class="text-secondary">

                                Product availability, delivery
                                charges, applicable taxes and final
                                order pricing will be confirmed
                                during checkout.

                            </small>

                        </div>

                    </div>

                </div>

            </div>


            {{-- ====================================================
                 ORDER SUMMARY
            ===================================================== --}}

            <div class="col-12 col-lg-4">

                <aside
                    class="card
                           border
                           border-warning-subtle
                           rounded-5
                           sticky-lg-top"
                    style="top:90px;"
                >

                    <div class="card-body p-4 p-md-5">

                        <h2
                            class="font-serif
                                   h3
                                   text-pn-brown
                                   mb-4"
                        >

                            Order Summary

                        </h2>


                        {{-- Subtotal --}}

                        <div
                            class="d-flex
                                   justify-content-between
                                   gap-3
                                   mb-3"
                        >

                            <span class="text-secondary">

                                Subtotal

                            </span>


                            <strong
                                class="text-pn-brown"
                                id="cartSubtotal"
                            >

                                ₹{{ number_format($subtotal) }}

                            </strong>

                        </div>


                        {{-- Discount --}}

                        <div
                            class="d-flex
                                   justify-content-between
                                   gap-3
                                   mb-3"
                        >

                            <span class="text-secondary">

                                Product Discount

                            </span>


                            <strong
                                class="text-success"
                                id="cartDiscount"
                            >

                                - ₹{{ number_format($discount) }}

                            </strong>

                        </div>


                        {{-- Delivery --}}

                        <div
                            class="d-flex
                                   justify-content-between
                                   gap-3
                                   mb-3"
                        >

                            <span class="text-secondary">

                                Delivery

                            </span>


                            <span
                                class="text-success"
                                id="cartDelivery"
                            >

                                FREE

                            </span>

                        </div>


                        <hr
                            class="border-warning-subtle"
                        >


                        {{-- Total --}}

                        <div
                            class="d-flex
                                   justify-content-between
                                   align-items-center
                                   gap-3
                                   py-2
                                   mb-4"
                        >

                            <strong
                                class="font-serif
                                       h4
                                       text-pn-brown
                                       mb-0"
                            >

                                Total

                            </strong>


                            <strong
                                class="fs-4
                                       text-pn-primary"
                                id="cartTotal"
                            >

                                ₹{{ number_format($total) }}

                            </strong>

                        </div>


                        {{-- Coupon --}}

                        <div class="mb-4">

                            <label
                                for="couponCode"
                                class="form-label
                                       small
                                       fw-semibold
                                       text-pn-brown"
                            >

                                Have a coupon?

                            </label>


                            <div class="input-group">

                                <input
                                    type="text"
                                    id="couponCode"
                                    class="form-control"
                                    placeholder="Enter coupon code"
                                >


                                <button
                                    type="button"
                                    class="btn
                                           btn-outline-secondary"
                                    id="applyCoupon"
                                >

                                    Apply

                                </button>

                            </div>


                            <small
                                id="couponMessage"
                                class="text-secondary
                                       d-block
                                       mt-2"
                            >

                                Coupon discounts will be validated
                                during checkout.

                            </small>

                        </div>


                        {{-- Checkout --}}

                        <div class="d-grid">

                            <a
                                href="{{ route('store.checkout') }}"
                                class="btn
                                       btn-pn
                                       btn-lg"
                            >

                                Proceed to Checkout

                                <i
                                    class="bi bi-arrow-right ms-2"
                                ></i>

                            </a>

                        </div>


                        {{-- Security --}}

                        <div
                            class="d-flex
                                   align-items-start
                                   gap-2
                                   mt-4"
                        >

                            <i
                                class="bi bi-shield-check
                                       text-pn-primary"
                            ></i>


                            <small
                                class="text-secondary"
                            >

                                Secure checkout with protected
                                payment processing.

                            </small>

                        </div>

                    </div>

                </aside>

            </div>

        </div>

    </div>

</section>


{{-- ============================================================
     SHOPPING BENEFITS
============================================================ --}}

<section class="py-5 bg-pn-cream">

    <div class="container">

        <div
            class="row
                   row-cols-1
                   row-cols-sm-2
                   row-cols-lg-4
                   g-4"
        >

            <div class="col">

                <div
                    class="d-flex
                           align-items-start
                           gap-3"
                >

                    <div
                        class="rounded-circle
                               bg-white
                               text-pn-primary
                               d-flex
                               align-items-center
                               justify-content-center
                               flex-shrink-0"
                        style="width:48px;height:48px;"
                    >

                        <i class="bi bi-shield-check"></i>

                    </div>


                    <div>

                        <strong
                            class="d-block
                                   text-pn-brown"
                        >

                            Secure Shopping

                        </strong>


                        <small class="text-secondary">

                            Safe and protected shopping experience.

                        </small>

                    </div>

                </div>

            </div>


            <div class="col">

                <div
                    class="d-flex
                           align-items-start
                           gap-3"
                >

                    <div
                        class="rounded-circle
                               bg-white
                               text-pn-primary
                               d-flex
                               align-items-center
                               justify-content-center
                               flex-shrink-0"
                        style="width:48px;height:48px;"
                    >

                        <i class="bi bi-truck"></i>

                    </div>


                    <div>

                        <strong
                            class="d-block
                                   text-pn-brown"
                        >

                            Reliable Delivery

                        </strong>


                        <small class="text-secondary">

                            Delivery details shown during checkout.

                        </small>

                    </div>

                </div>

            </div>


            <div class="col">

                <div
                    class="d-flex
                           align-items-start
                           gap-3"
                >

                    <div
                        class="rounded-circle
                               bg-white
                               text-pn-primary
                               d-flex
                               align-items-center
                               justify-content-center
                               flex-shrink-0"
                        style="width:48px;height:48px;"
                    >

                        <i class="bi bi-credit-card"></i>

                    </div>


                    <div>

                        <strong
                            class="d-block
                                   text-pn-brown"
                        >

                            Secure Payment

                        </strong>


                        <small class="text-secondary">

                            Protected payment processing.

                        </small>

                    </div>

                </div>

            </div>


            <div class="col">

                <div
                    class="d-flex
                           align-items-start
                           gap-3"
                >

                    <div
                        class="rounded-circle
                               bg-white
                               text-pn-primary
                               d-flex
                               align-items-center
                               justify-content-center
                               flex-shrink-0"
                        style="width:48px;height:48px;"
                    >

                        <i class="bi bi-headset"></i>

                    </div>


                    <div>

                        <strong
                            class="d-block
                                   text-pn-brown"
                        >

                            Customer Support

                        </strong>


                        <small class="text-secondary">

                            Help when you need it.

                        </small>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- ============================================================
     EMPTY CART STATE
============================================================ --}}

<section
    id="emptyCartState"
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
                style="width:84px;height:84px;"
            >

                <i class="bi bi-bag-x fs-2"></i>

            </div>


            <h2
                class="font-serif
                       display-6
                       text-pn-brown"
            >

                Your cart is empty.

            </h2>


            <p
                class="text-secondary
                       col-lg-6
                       mx-auto
                       mb-4"
            >

                Discover pooja samagri, devotional essentials
                and spiritual products for your sacred space.

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
     MINIMAL PAGE JS
============================================================ --}}

@push('scripts')

<script>
document.addEventListener('DOMContentLoaded', function () {
    const csrf = document.querySelector('meta[name=\"csrf-token\"]')?.getAttribute('content');
    const request = (url, method, body) => fetch(url, {
        method, headers: { 'X-CSRF-TOKEN': csrf, 'Accept': 'application/json', 'Content-Type': 'application/json' },
        body: body ? JSON.stringify(body) : undefined
    }).then(async response => {
        const data = await response.json().catch(() => ({}));
        if (!response.ok) throw new Error(data.message || 'Request failed.');
        return data;
    });

    const cartContainer = document.getElementById('cartItemsContainer');
    const emptyCartState = document.getElementById('emptyCartState');
    const subtotalElement = document.getElementById('cartSubtotal');
    const totalElement = document.getElementById('cartTotal');

    function formatCurrency(value) { return '₹' + Number(value).toLocaleString('en-IN', { minimumFractionDigits: 2, maximumFractionDigits: 2 }); }

    function updateSummary() {
        let subtotal = 0;
        document.querySelectorAll('[data-cart-item]').forEach(item => {
            const price = Number(item.dataset.price) || 0;
            const qty = Number(item.querySelector('.cart-quantity')?.value) || 1;
            subtotal += price * qty;
            const total = item.querySelector('.cart-item-total');
            if (total) total.textContent = formatCurrency(price * qty);
        });
        if (subtotalElement) subtotalElement.textContent = formatCurrency(subtotal);
        if (totalElement) totalElement.textContent = formatCurrency(subtotal);
        const hasItems = document.querySelectorAll('[data-cart-item]').length > 0;
        cartContainer?.classList.toggle('d-none', !hasItems);
        emptyCartState?.classList.toggle('d-none', hasItems);
    }

    document.querySelectorAll('[data-cart-item]').forEach(item => {
        const input = item.querySelector('.cart-quantity');
        const change = async quantity => {
            quantity = Math.max(1, Math.min(999, Number(quantity) || 1));
            try {
                await request('{{ route('store.cart.update') }}', 'PATCH', { item_id: item.dataset.itemId, quantity });
                input.value = quantity;
                updateSummary();
            } catch (error) { alert(error.message); }
        };
        item.querySelector('.cart-minus')?.addEventListener('click', () => change((Number(input.value) || 1) - 1));
        item.querySelector('.cart-plus')?.addEventListener('click', () => change((Number(input.value) || 1) + 1));
        input?.addEventListener('change', () => change(input.value));
        item.querySelector('.cart-remove')?.addEventListener('click', async () => {
            try { await request('{{ route('store.cart.remove') }}', 'DELETE', { item_id: item.dataset.itemId }); item.remove(); updateSummary(); }
            catch (error) { alert(error.message); }
        });
    });

    document.getElementById('clearCart')?.addEventListener('click', async () => {
        try { await request('{{ route('store.cart.clear') }}', 'DELETE'); if (cartContainer) cartContainer.innerHTML = ''; updateSummary(); }
        catch (error) { alert(error.message); }
    });
});
</script>

@endpush

@endsection