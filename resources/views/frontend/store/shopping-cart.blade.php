@extends('layouts.app')

@section('title', 'Shopping Cart | Pooja Nilayam')
@section('meta_description', 'Review your selected devotional products before checkout at Pooja Nilayam.')

@push('styles')
<style>
    /* Remove default up/down arrows from number input to maximize visible area */
    .cart-quantity::-webkit-inner-spin-button,
    .cart-quantity::-webkit-outer-spin-button { -webkit-appearance: none; margin: 0; }
    .cart-quantity { -moz-appearance: textfield; }
</style>
@endpush

@section('content')

{{-- BREADCRUMB --}}
<section class="bg-pn-cream border-bottom">
    <div class="container py-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-pn-primary">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('store.index') }}" class="text-pn-primary">Store</a></li>
                <li class="breadcrumb-item active" aria-current="page">Shopping Cart</li>
            </ol>
        </nav>
    </div>
</section>

{{-- CART HEADER --}}
<section class="bg-pn-cream py-4 py-md-5">
    <div class="container">
        <div class="row align-items-center g-4">
            <div class="col-12 col-lg-8">
                <span class="small text-pn-gold fw-semibold text-uppercase">Pooja Store</span>
                <h1 class="font-serif display-5 display-md-4 text-pn-brown mt-2 mb-3">Your shopping cart</h1>
                <p class="lead text-secondary mb-0">Review your selected products before continuing to checkout.</p>
            </div>
            <div class="col-12 col-lg-4">
                <div class="border border-warning-subtle rounded-4 rounded-lg-5 bg-white p-3 p-md-4">
                    <div class="d-flex align-items-center gap-3">
                        <div class="rounded-circle bg-pn-cream text-pn-primary d-flex align-items-center justify-content-center flex-shrink-0" style="width:54px;height:54px;">
                            <i class="bi bi-bag fs-5"></i>
                        </div>
                        <div>
                            <strong class="d-block font-serif h5 text-pn-brown mb-0">{{ count($cartItems) }} Items</strong>
                            <small class="text-secondary">Ready for review</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- CHECKOUT PROGRESS --}}
<section class="py-3 py-md-4 border-bottom">
    <div class="container">
        <div class="d-flex align-items-center justify-content-center">
            <div class="d-flex align-items-center gap-2">
                <span class="rounded-circle bg-pn-primary text-white d-inline-flex align-items-center justify-content-center" style="width:32px;height:32px;">
                    <i class="bi bi-check"></i>
                </span>
                <small class="fw-semibold text-pn-primary d-none d-sm-inline">Cart</small>
            </div>
            <div class="bg-pn-primary mx-2 mx-sm-3" style="height:2px;width:35px;"></div>

            <div class="d-flex align-items-center gap-2">
                <span class="rounded-circle border border-secondary text-secondary d-inline-flex align-items-center justify-content-center" style="width:32px;height:32px;">2</span>
                <small class="text-secondary d-none d-sm-inline">Checkout</small>
            </div>
            <div class="bg-secondary-subtle mx-2 mx-sm-3" style="height:2px;width:35px;"></div>

            <div class="d-flex align-items-center gap-2">
                <span class="rounded-circle border border-secondary text-secondary d-inline-flex align-items-center justify-content-center" style="width:32px;height:32px;">3</span>
                <small class="text-secondary d-none d-sm-inline">Payment</small>
            </div>
        </div>
    </div>
</section>

{{-- CART CONTENT --}}
<section class="py-4 py-md-5">
    <div class="container">
        <div class="row g-4 g-xl-5">

            {{-- CART ITEMS --}}
            <div class="col-12 col-lg-8">
                <div class="d-flex align-items-center justify-content-between gap-3 mb-4">
                    <div>
                        <h2 class="font-serif h3 text-pn-brown mb-0">Cart Items</h2>
                        <small class="text-secondary">{{ count($cartItems) }} products selected</small>
                    </div>
                    <button type="button" class="btn btn-link text-danger p-0 small text-decoration-none" id="clearCart">
                        <i class="bi bi-trash3 me-1"></i> Clear Cart
                    </button>
                </div>

                <div class="vstack gap-3" id="cartItemsContainer">
                    @foreach($cartItems as $item)
                        <article class="card border border-warning-subtle rounded-4 cart-item position-relative" data-cart-item data-item-id="{{ $item['id'] }}" data-price="{{ $item['price'] }}">
    <!-- Remove Button pinned to card top-right -->
    <button type="button" 
            class="btn btn-sm btn-light rounded-circle cart-remove position-absolute top-0 end-0 m-3 z-1" 
            aria-label="Remove {{ $item['name'] }}">
        <i class="bi bi-x fs-5"></i>
    </button>

    <div class="card-body p-3 p-md-4">
        <div class="row align-items-center g-3">
            {{-- Image --}}
            <div class="col-3 col-sm-3 col-md-2">
                <div class="ratio ratio-1x1 rounded-3 overflow-hidden bg-light">
                    <img src="{{ $item['image'] ? asset($item['image']) : asset('images/home/hero.webp') }}" class="object-fit-cover" alt="{{ $item['name'] }}" loading="lazy">
                </div>
            </div>

            {{-- Details --}}
            <div class="col-9 col-sm-9 col-md-5 pe-md-4">
                <small class="text-pn-primary fw-semibold">{{ $item['category'] }}</small>
                <h3 class="font-serif h6 h5-md text-pn-brown mt-1 mb-1">{{ $item['name'] }}</h3>
                <p class="small text-secondary mb-1 d-none d-sm-block">{{ $item['description'] }}</p>
                @if($item['stock'])
                    <small class="text-success fw-semibold"><i class="bi bi-check-circle-fill me-1"></i>In Stock</small>
                @else
                    <small class="text-danger fw-semibold">Currently unavailable</small>
                @endif
            </div>

            {{-- Quantity --}}
            <div class="col-6 col-sm-6 col-md-3">
                <label class="form-label small text-secondary mb-1 d-block">Quantity</label>
                <div class="input-group input-group-sm flex-nowrap cart-quantity-group" style="max-width: 130px;">
                    <button type="button" class="btn btn-outline-secondary cart-minus px-2" aria-label="Decrease quantity">
                        <i class="bi bi-dash"></i>
                    </button>
                    <input type="number" 
                           class="form-control text-center cart-quantity px-1 fw-semibold text-dark bg-white" 
                           value="{{ (int) $item['quantity'] }}" 
                           min="1" max="99" step="1" inputmode="numeric" 
                           aria-label="Quantity for {{ $item['name'] }}" 
                           style="min-width: 38px;">
                    <button type="button" class="btn btn-outline-secondary cart-plus px-2" aria-label="Increase quantity">
                        <i class="bi bi-plus"></i>
                    </button>
                </div>
            </div>

            {{-- Price --}}
            <div class="col-6 col-sm-6 col-md-2 text-end">
                <small class="text-secondary d-block d-md-none">Total</small>
                <strong class="fs-5 text-pn-brown cart-item-total">
                    ₹{{ number_format($item['price'] * $item['quantity'], 2) }}
                </strong>
            </div>
        </div>
    </div>
</article>
                    @endforeach
                </div>

                {{-- Continue Shopping --}}
                <div class="mt-4">
                    <a href="{{ route('store.index') }}" class="btn btn-pn-outline">
                        <i class="bi bi-arrow-left me-2"></i> Continue Shopping
                    </a>
                </div>

                {{-- Note --}}
                <div class="border border-warning-subtle rounded-4 bg-pn-cream p-3 p-md-4 mt-4">
                    <div class="d-flex align-items-start gap-3">
                        <i class="bi bi-info-circle text-pn-primary fs-5 mt-1"></i>
                        <div>
                            <strong class="d-block text-pn-brown mb-1">Before you checkout</strong>
                            <small class="text-secondary">Product availability, delivery charges, applicable taxes, and final order pricing will be confirmed during checkout.</small>
                        </div>
                    </div>
                </div>
            </div>

            {{-- ORDER SUMMARY --}}
            <div class="col-12 col-lg-4">
                <aside class="card border border-warning-subtle rounded-4 rounded-lg-5 sticky-lg-top" style="top:90px;">
                    <div class="card-body p-4 p-md-5">
                        <h2 class="font-serif h3 text-pn-brown mb-4">Order Summary</h2>

                        <div class="d-flex justify-content-between gap-3 mb-3">
                            <span class="text-secondary">Subtotal</span>
                            <strong class="text-pn-brown" id="cartSubtotal">₹{{ number_format($subtotal) }}</strong>
                        </div>

                        <div class="d-flex justify-content-between gap-3 mb-3">
                            <span class="text-secondary">Product Discount</span>
                            <strong class="text-success" id="cartDiscount">- ₹{{ number_format($discount) }}</strong>
                        </div>

                        <div class="d-flex justify-content-between gap-3 mb-3">
                            <span class="text-secondary">Delivery</span>
                            <span class="text-success" id="cartDelivery">FREE</span>
                        </div>

                        <hr class="border-warning-subtle my-3">

                        <div class="d-flex justify-content-between align-items-center gap-3 py-2 mb-4">
                            <strong class="font-serif h4 text-pn-brown mb-0">Total</strong>
                            <strong class="fs-4 text-pn-primary" id="cartTotal">₹{{ number_format($total) }}</strong>
                        </div>

                        {{-- Coupon --}}
                        <div class="mb-4">
                            <label for="couponCode" class="form-label small fw-semibold text-pn-brown">Have a coupon?</label>
                            <div class="input-group">
                                <input type="text" id="couponCode" class="form-control" placeholder="Enter coupon code">
                                <button type="button" class="btn btn-outline-secondary" id="applyCoupon">Apply</button>
                            </div>
                            <small id="couponMessage" class="text-secondary d-block mt-2">Coupon discounts will be validated during checkout.</small>
                        </div>

                        <div class="d-grid">
                            <a href="{{ route('store.checkout') }}" class="btn btn-pn btn-lg">
                                Proceed to Checkout <i class="bi bi-arrow-right ms-2"></i>
                            </a>
                        </div>

                        <div class="d-flex align-items-start gap-2 mt-4">
                            <i class="bi bi-shield-check text-pn-primary fs-6 mt-1"></i>
                            <small class="text-secondary">Secure checkout with protected payment processing.</small>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</section>

{{-- SHOPPING BENEFITS --}}
<section class="py-5 bg-pn-cream">
    <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-4 g-4">
            <div class="col">
                <div class="d-flex align-items-start gap-3">
                    <div class="rounded-circle bg-white text-pn-primary d-flex align-items-center justify-content-center flex-shrink-0" style="width:48px;height:48px;">
                        <i class="bi bi-shield-check"></i>
                    </div>
                    <div>
                        <strong class="d-block text-pn-brown">Secure Shopping</strong>
                        <small class="text-secondary">Safe and protected shopping experience.</small>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="d-flex align-items-start gap-3">
                    <div class="rounded-circle bg-white text-pn-primary d-flex align-items-center justify-content-center flex-shrink-0" style="width:48px;height:48px;">
                        <i class="bi bi-truck"></i>
                    </div>
                    <div>
                        <strong class="d-block text-pn-brown">Reliable Delivery</strong>
                        <small class="text-secondary">Delivery details shown during checkout.</small>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="d-flex align-items-start gap-3">
                    <div class="rounded-circle bg-white text-pn-primary d-flex align-items-center justify-content-center flex-shrink-0" style="width:48px;height:48px;">
                        <i class="bi bi-credit-card"></i>
                    </div>
                    <div>
                        <strong class="d-block text-pn-brown">Secure Payment</strong>
                        <small class="text-secondary">Protected payment processing.</small>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="d-flex align-items-start gap-3">
                    <div class="rounded-circle bg-white text-pn-primary d-flex align-items-center justify-content-center flex-shrink-0" style="width:48px;height:48px;">
                        <i class="bi bi-headset"></i>
                    </div>
                    <div>
                        <strong class="d-block text-pn-brown">Customer Support</strong>
                        <small class="text-secondary">Help when you need it.</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- EMPTY CART STATE --}}
<section id="emptyCartState" class="py-5 d-none">
    <div class="container">
        <div class="border border-warning-subtle rounded-5 bg-pn-cream p-5 text-center">
            <div class="rounded-circle bg-white text-pn-primary d-flex align-items-center justify-content-center mx-auto mb-4" style="width:84px;height:84px;">
                <i class="bi bi-bag-x fs-2"></i>
            </div>
            <h2 class="font-serif display-6 text-pn-brown">Your cart is empty.</h2>
            <p class="text-secondary col-lg-6 mx-auto mb-4">Discover pooja samagri, devotional essentials and spiritual products for your sacred space.</p>
            <a href="{{ route('store.index') }}" class="btn btn-pn">
                Explore Store <i class="bi bi-arrow-right ms-2"></i>
            </a>
        </div>
    </div>
</section>

{{-- MINIMAL PAGE JS --}}
@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const csrf = document.querySelector('meta[name="csrf-token"]')?.content || '';
    const updateUrl = @json(route('store.cart.update'));
    const removeUrl = @json(route('store.cart.remove'));
    const clearUrl = @json(route('store.cart.clear'));

    const cartContainer = document.getElementById('cartItemsContainer');
    const emptyCartState = document.getElementById('emptyCartState');
    const subtotalElement = document.getElementById('cartSubtotal');
    const totalElement = document.getElementById('cartTotal');
    const clearButton = document.getElementById('clearCart');

    async function request(url, method, body) {
        const headers = { 'Accept': 'application/json', 'X-Requested-With': 'XMLHttpRequest', 'X-CSRF-TOKEN': csrf };
        const options = { method, credentials: 'same-origin', headers };
        if (body !== undefined) {
            headers['Content-Type'] = 'application/json';
            options.body = JSON.stringify(body);
        }
        const response = await fetch(url, options);
        const contentType = response.headers.get('content-type') || '';
        const data = contentType.includes('application/json') ? await response.json() : {};

        if (!response.ok) {
            const validationMessage = data.errors ? Object.values(data.errors).flat()[0] : null;
            if (response.status === 419) throw new Error('Your session expired. Refresh the page and try again.');
            if (response.status === 401 || response.status === 403) throw new Error('Please log in again to update your cart.');
            throw new Error(validationMessage || data.message || `Request failed (${response.status}).`);
        }
        return data;
    }

    function formatCurrency(value) {
        return '₹' + Number(value || 0).toLocaleString('en-IN', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
    }

    function updateHeaderCount() {
        const quantityCount = Array.from(document.querySelectorAll('[data-cart-item]'))
            .reduce((sum, item) => sum + (Number(item.querySelector('.cart-quantity')?.value) || 0), 0);
        document.querySelectorAll('[data-cart-count]').forEach(el => el.textContent = quantityCount);
    }

    function updateSummary() {
        let subtotal = 0;
        const items = document.querySelectorAll('[data-cart-item]');

        items.forEach(item => {
            const price = Number(item.dataset.price) || 0;
            const quantity = Math.max(1, Number(item.querySelector('.cart-quantity')?.value) || 1);
            subtotal += price * quantity;
            const itemTotal = item.querySelector('.cart-item-total');
            if (itemTotal) itemTotal.textContent = formatCurrency(price * quantity);
        });

        if (subtotalElement) subtotalElement.textContent = formatCurrency(subtotal);
        if (totalElement) totalElement.textContent = formatCurrency(subtotal);

        const hasItems = items.length > 0;
        cartContainer?.classList.toggle('d-none', !hasItems);
        emptyCartState?.classList.toggle('d-none', hasItems);
        document.querySelectorAll('[data-cart-products-count]').forEach(el => el.textContent = items.length);
        updateHeaderCount();
    }

    document.querySelectorAll('[data-cart-item]').forEach(item => {
        const input = item.querySelector('.cart-quantity');
        const minusBtn = item.querySelector('.cart-minus');
        const plusBtn = item.querySelector('.cart-plus');
        const removeBtn = item.querySelector('.cart-remove');
        let savedQuantity = Math.max(1, Number(input?.value) || 1);
        let updating = false;

        async function changeQuantity(requestedQuantity) {
            if (!input || updating) return;
            const quantity = Math.max(1, Math.min(999, Number.parseInt(requestedQuantity, 10) || 1));
            if (quantity === savedQuantity) { input.value = savedQuantity; return; }

            updating = true;
            [input, minusBtn, plusBtn, removeBtn].forEach(el => { if (el) el.disabled = true; });

            try {
                await request(updateUrl, 'PATCH', { item_id: Number(item.dataset.itemId), quantity });
                savedQuantity = quantity;
                input.value = quantity;
                updateSummary();
            } catch (error) {
                input.value = savedQuantity;
                alert(error.message || 'Unable to update the cart quantity.');
            } finally {
                updating = false;
                [input, minusBtn, plusBtn, removeBtn].forEach(el => { if (el) el.disabled = false; });
            }
        }

        minusBtn?.addEventListener('click', async () => {
            if (!input || updating) return;

            const currentQuantity = Number.parseInt(input.value, 10) || savedQuantity;

            // At quantity 1, clicking minus removes this cart item.
            if (currentQuantity <= 1) {
                updating = true;
                [input, minusBtn, plusBtn, removeBtn].forEach(el => {
                    if (el) el.disabled = true;
                });

                try {
                    await request(removeUrl, 'DELETE', {
                        item_id: Number(item.dataset.itemId)
                    });
                    item.remove();
                    updateSummary();
                } catch (error) {
                    alert(error.message || 'Unable to remove this item.');
                } finally {
                    updating = false;
                    // The item may have been removed from the DOM; re-enable only if it remains.
                    if (item.isConnected) {
                        [input, minusBtn, plusBtn, removeBtn].forEach(el => {
                            if (el) el.disabled = false;
                        });
                    }
                }
                return;
            }

            await changeQuantity(currentQuantity - 1);
        });
        plusBtn?.addEventListener('click', () => changeQuantity((Number(input?.value) || savedQuantity) + 1));
        input?.addEventListener('change', () => changeQuantity(input.value));

        removeBtn?.addEventListener('click', async () => {
            if (updating) return;
            removeBtn.disabled = true;
            try {
                await request(removeUrl, 'DELETE', { item_id: Number(item.dataset.itemId) });
                item.remove();
                updateSummary();
            } catch (error) {
                removeBtn.disabled = false;
                alert(error.message || 'Unable to remove this item.');
            }
        });
    });

    clearButton?.addEventListener('click', async () => {
        if (!document.querySelector('[data-cart-item]')) { updateSummary(); return; }
        if (!window.confirm('Are you sure you want to clear your cart?')) return;

        clearButton.disabled = true;
        try {
            await request(clearUrl, 'DELETE');
            if (cartContainer) cartContainer.innerHTML = '';
            updateSummary();
        } catch (error) {
            alert(error.message || 'Unable to clear your cart.');
        } finally {
            clearButton.disabled = false;
        }
    });

    updateSummary();
});
</script>
@endpush

@endsection