@extends('layouts.app')

@section('title', 'Product Details | Pooja Go')
@section('meta_description', 'View product details, pricing and purchase options at the Pooja Go Store.')

@push('styles')
<style>
    .product-thumb.active { border-color: var(--bs-primary, #8a4b16) !important; border-width: 2px !important; }
    #productQuantity::-webkit-inner-spin-button, #productQuantity::-webkit-outer-spin-button { -webkit-appearance: none; margin: 0; }
    #productQuantity { -moz-appearance: textfield; }
    .thumbnail-scroller { scroll-snap-type: x mandatory; -webkit-overflow-scrolling: touch; }
    .thumbnail-scroller button { scroll-snap-align: start; }
</style>
@endpush

@section('content')

{{-- PRODUCT DETAILS --}}
<section class="py-4 py-md-5">
    <div class="container">
        <div class="row g-4 g-xl-5">

            {{-- GALLERY --}}
            <div class="col-12 col-lg-6">
                <div class="sticky-lg-top" style="top: 90px; z-index: 10;">
                    <div class="card border border-warning-subtle rounded-4 rounded-md-5 overflow-hidden shadow-sm">
                        <div class="position-relative bg-light">
                            <div class="ratio ratio-1x1">
                                <img id="productMainImage" src="{{ asset($product['main_image'] ?: 'images/home/hero.webp') }}" class="object-fit-cover w-100 h-100" alt="{{ $product['name'] }}" loading="eager">
                            </div>
                            <span class="position-absolute top-0 start-0 m-3 badge rounded-pill bg-pn-primary px-3 py-2 shadow-sm">Featured</span>
                            <button type="button" class="btn btn-light rounded-circle shadow-sm position-absolute top-0 end-0 m-3 d-flex align-items-center justify-content-center" style="width: 42px; height: 42px;" data-wishlist-add data-product-id="{{ $product['id'] }}" aria-label="Add product to wishlist">
                                <i class="bi bi-heart fs-5"></i>
                            </button>
                        </div>

                        {{-- Thumbnails --}}
                        <div class="card-body p-2 p-md-3">
                            <div class="d-flex gap-2 overflow-x-auto thumbnail-scroller pb-1">
                                @foreach($product['images'] as $index => $image)
                                    <button type="button" class="border {{ $index === 0 ? 'border-primary border-2 active' : 'border-warning-subtle' }} rounded-3 bg-white p-1 flex-shrink-0 product-thumb transition" style="width: 72px; height: 72px;" data-product-image="{{ asset($image) }}" aria-label="View product image {{ $index + 1 }}">
                                        <img src="{{ asset($image) }}" class="w-100 h-100 object-fit-cover rounded-2" alt="{{ $product['name'] }} image {{ $index + 1 }}" loading="lazy">
                                    </button>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    {{-- Delivery Info --}}
                    <div class="border border-warning-subtle rounded-4 bg-pn-cream p-3 mt-3 d-flex align-items-start gap-3">
                        <i class="bi bi-truck text-pn-primary fs-4 flex-shrink-0"></i>
                        <div>
                            <strong class="d-block small text-pn-brown">Check delivery availability</strong>
                            <small class="text-secondary">Enter your location during checkout to confirm shipping availability and timelines.</small>
                        </div>
                    </div>
                </div>
            </div>

            {{-- INFORMATION --}}
            <div class="col-12 col-lg-6">
                <div>
                    <a href="{{ route('store.category', ['slug' => $product['category_slug']]) }}" class="small text-pn-primary fw-semibold text-decoration-none text-uppercase tracking-wider">
                        {{ $product['category'] }}
                    </a>
                    <h1 class="font-serif display-6 display-md-5 text-pn-brown mt-1 mb-3">{{ $product['name'] }}</h1>

                    <div class="d-flex align-items-center flex-wrap gap-2 mb-3">
                        <span class="badge bg-warning-subtle text-dark rounded-pill px-2 py-1">
                            <i class="bi bi-star-fill text-warning me-1"></i>{{ $product['rating'] }}
                        </span>
                        <a href="#reviews" class="small text-secondary text-decoration-none">{{ $product['reviews'] }} reviews</a>
                        <span class="text-secondary">·</span>
                        <small class="text-secondary">SKU: {{ $product['sku'] }}</small>
                    </div>

                    <p class="lead fs-6 fs-md-5 text-secondary mb-4">{{ $product['short_description'] }}</p>

                    {{-- Pricing --}}
                    <div class="border-top border-bottom border-warning-subtle py-3 mb-4">
                        <div class="d-flex align-items-baseline flex-wrap gap-2 mb-1">
                            <strong class="display-6 text-pn-brown fw-bold">{{ $product['currency_symbol'] }}{{ number_format($product['price'], 2) }}</strong>
                            <del class="text-secondary fs-5">{{ $product['currency_symbol'] }}{{ number_format($product['mrp'], 2) }}</del>
                            <span class="badge rounded-pill bg-success-subtle text-success fs-7 ms-1">Save {{ $product['currency_symbol'] }}{{ number_format($product['mrp'] - $product['price'], 2) }}</span>
                        </div>
                        <small class="text-secondary">Price inclusive of applicable taxes, subject to final product configuration.</small>
                    </div>

                    {{-- Options --}}
                    @if(!empty($options))
                    <div class="mb-4">
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <h2 class="font-serif h5 text-pn-brown mb-0">Select Option</h2>
                            <small class="text-secondary">Choose one</small>
                        </div>
                        <div class="vstack gap-2">
                            @foreach($options as $index => $option)
                                <input type="radio" class="btn-check" name="product_option" id="productOption{{ $index }}" value="{{ $option['title'] }}" @checked($option['selected'])>
                                <label for="productOption{{ $index }}" class="border border-warning-subtle rounded-4 bg-white p-3 cursor-pointer">
                                    <div class="d-flex align-items-start gap-3">
                                        <div class="rounded-circle bg-pn-cream text-pn-primary d-flex align-items-center justify-content-center flex-shrink-0" style="width: 44px; height: 44px;">
                                            <i class="bi bi-box-seam fs-5"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <div class="d-flex justify-content-between align-items-start gap-2">
                                                <div>
                                                    <h3 class="font-serif h6 text-pn-brown mb-1">{{ $option['title'] }}</h3>
                                                    <p class="small text-secondary mb-0">{{ $option['description'] }}</p>
                                                </div>
                                                <span class="rounded-circle border border-secondary flex-shrink-0 mt-1" style="width: 18px; height: 18px;"></span>
                                            </div>
                                            <hr class="border-warning-subtle my-2">
                                            <strong class="text-pn-primary">{{ $product['currency_symbol'] }}{{ number_format($option['price'], 2) }}</strong>
                                        </div>
                                    </div>
                                </label>
                            @endforeach
                        </div>
                    </div>

                    {{-- Features / Benefits --}}
                    <div class="border-top border-bottom border-warning-subtle py-3 mb-4">
                        <div class="row row-cols-1 row-cols-sm-2 g-3">
                            @foreach($product['features'] as $feature)
                                <div class="col">
                                    <div class="d-flex align-items-start gap-2">
                                        <i class="bi {{ $feature['icon'] }} text-pn-primary fs-5 flex-shrink-0"></i>
                                        <div>
                                            <strong class="small d-block text-pn-brown">{{ $feature['title'] }}</strong>
                                            <small class="text-secondary">{{ $feature['description'] }}</small>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    @endif

                    {{-- Stock Status --}}
                    @if($product['stock_status'] === 'in_stock')
                        <div class="d-flex align-items-center gap-2 mb-3">
                            <span class="rounded-circle bg-success" style="width: 8px; height: 8px;"></span>
                            <small class="text-success fw-semibold">{{ $product['stock_text'] }}</small>
                        </div>
                    @else
                        <div class="alert alert-danger rounded-4 py-2 small mb-3">This product is currently unavailable.</div>
                    @endif

                    {{-- Quantity & Action Buttons --}}
                    <div class="d-flex flex-wrap gap-2 gap-sm-3 mb-3">
                        <div class="flex-shrink-0">
                            <label for="productQuantity" class="form-label small fw-semibold text-pn-brown mb-1 d-block">Quantity</label>
                            <div class="input-group" style="width: 130px;">
                                <button type="button" class="btn btn-outline-secondary px-2" id="quantityMinus" aria-label="Decrease quantity">
                                    <i class="bi bi-dash"></i>
                                </button>
                                <input type="number" id="productQuantity" name="quantity" class="form-control text-center px-1 fw-semibold text-dark bg-white" value="1" min="1" max="99" aria-label="Product quantity">
                                <button type="button" class="btn btn-outline-secondary px-2" id="quantityPlus" aria-label="Increase quantity">
                                    <i class="bi bi-plus"></i>
                                </button>
                            </div>
                        </div>

                        <div class="flex-grow-1 d-flex align-items-end">
                            <button type="button" id="addToCartButton" class="btn btn-pn btn-lg w-100" data-cart-add data-product-id="{{ $product['id'] }}" @disabled($product['stock_status'] !== 'in_stock')>
                                <i class="bi bi-bag-plus me-2"></i> Add to Cart
                            </button>
                        </div>

                        <div class="d-flex align-items-end">
                            <button type="button" class="btn btn-pn-outline btn-lg" data-wishlist-add data-product-id="{{ $product['id'] }}" aria-label="Add to wishlist">
                                <i class="bi bi-heart"></i>
                            </button>
                        </div>
                    </div>

                    <button type="button" id="buyNowButton" class="btn btn-outline-dark btn-lg w-100 mb-4" data-buy-now data-product-id="{{ $product['id'] }}" @disabled($product['stock_status'] !== 'in_stock')>
                        Buy Now
                    </button>

                    {{-- Accordion --}}
                    <div class="accordion accordion-flush border-top border-warning-subtle" id="productInformation">
                        <div class="accordion-item bg-transparent">
                            <h2 class="accordion-header">
                                <button class="accordion-button bg-transparent px-0 font-serif fw-semibold text-pn-brown" type="button" data-bs-toggle="collapse" data-bs-target="#productDescription" aria-expanded="true" aria-controls="productDescription">
                                    Product Description
                                </button>
                            </h2>
                            <div id="productDescription" class="accordion-collapse collapse show">
                                <div class="accordion-body px-0 text-secondary">{{ $product['description'] }}</div>
                            </div>
                        </div>

                        <div class="accordion-item bg-transparent">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed bg-transparent px-0 font-serif fw-semibold text-pn-brown" type="button" data-bs-toggle="collapse" data-bs-target="#productInformationDetails" aria-expanded="false" aria-controls="productInformationDetails">
                                    Product Information
                                </button>
                            </h2>
                            <div id="productInformationDetails" class="accordion-collapse collapse">
                                <div class="accordion-body px-0">
                                    <dl class="row mb-0 g-2">
                                        <dt class="col-4 small text-secondary">Category</dt>
                                        <dd class="col-8 small text-pn-brown mb-1">{{ $product['category'] }}</dd>
                                        <dt class="col-4 small text-secondary">SKU</dt>
                                        <dd class="col-8 small text-pn-brown mb-1">{{ $product['sku'] }}</dd>
                                        <dt class="col-4 small text-secondary">Availability</dt>
                                        <dd class="col-8 small text-pn-brown mb-0">{{ $product['stock_text'] }}</dd>
                                    </dl>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item bg-transparent">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed bg-transparent px-0 font-serif fw-semibold text-pn-brown" type="button" data-bs-toggle="collapse" data-bs-target="#shippingInformation" aria-expanded="false" aria-controls="shippingInformation">
                                    Delivery Information
                                </button>
                            </h2>
                            <div id="shippingInformation" class="accordion-collapse collapse">
                                <div class="accordion-body px-0 text-secondary">
                                    Delivery availability, estimated timeline, and shipping charges are calculated during checkout based on your exact pincode.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- REVIEWS --}}
<section id="reviews" class="py-5 bg-pn-cream">
    <div class="container">
        <div class="row g-4 align-items-start">
            <div class="col-12 col-lg-4">
                <div class="card border border-warning-subtle rounded-4 rounded-md-5 bg-white shadow-sm">
                    <div class="card-body p-4 text-center">
                        <span class="small text-pn-gold fw-semibold text-uppercase">Customer Reviews</span>
                        <div class="display-4 fw-semibold text-pn-brown mt-2">{{ $product['rating'] }}</div>
                        <div class="text-warning fs-5 mb-2">
                            @for($star = 1; $star <= 5; $star++)
                                <i class="bi bi-star{{ $star <= round($product['rating']) ? '-fill' : '' }}"></i>
                            @endfor
                        </div>
                        <p class="small text-secondary mb-4">Based on {{ $product['reviews'] }} reviews</p>
                        <button type="button" class="btn btn-pn-outline w-100">Write a Review</button>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-8">
                <div class="d-flex align-items-center justify-content-between gap-3 mb-3">
                    <h2 class="font-serif h4 text-pn-brown mb-0">What customers say</h2>
                    <select class="form-select form-select-sm w-auto">
                        <option selected>Most Recent</option>
                        <option>Highest Rated</option>
                        <option>Lowest Rated</option>
                    </select>
                </div>

                <div class="vstack gap-3">
                    @foreach($reviews as $review)
                        <article class="card border border-warning-subtle rounded-4 bg-white">
                            <div class="card-body p-3 p-md-4">
                                <div class="d-flex align-items-start justify-content-between gap-3">
                                    <div>
                                        <strong class="d-block text-pn-brown">{{ $review['name'] }}</strong>
                                        <div class="text-warning small mt-1">
                                            @for($star = 1; $star <= 5; $star++)
                                                <i class="bi bi-star{{ $star <= $review['rating'] ? '-fill' : '' }}"></i>
                                            @endfor
                                        </div>
                                    </div>
                                    <small class="text-secondary">{{ $review['date'] }}</small>
                                </div>
                                <p class="small text-secondary mt-2 mb-0">{{ $review['comment'] }}</p>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

{{-- RELATED PRODUCTS --}}
<section class="py-5">
    <div class="container">
        <div class="d-flex flex-column flex-md-row align-items-md-end justify-content-between gap-3 mb-4">
            <div>
                <span class="small text-pn-gold fw-semibold text-uppercase">You May Also Like</span>
                <h2 class="font-serif display-6 text-pn-brown mt-1 mb-0">Complete your pooja essentials</h2>
            </div>
            <a href="{{ route('store.products') }}" class="btn btn-pn-outline align-self-start align-self-md-auto">
                View All Products <i class="bi bi-arrow-right ms-2"></i>
            </a>
        </div>

        <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-4 g-4">
            @foreach($related as $relatedItem)
                <div class="col">
                    <article class="card border border-warning-subtle rounded-4 overflow-hidden h-100 shadow-sm transition hover-shadow">
                        <div class="ratio ratio-1x1 bg-light">
                            <img src="{{ asset($relatedItem['image'] ?: 'images/home/hero.webp') }}" class="object-fit-cover" alt="{{ $relatedItem['name'] }}" loading="lazy">
                        </div>
                        <div class="card-body p-3 d-flex flex-column">
                            <small class="text-pn-primary fw-semibold">{{ $relatedItem['category'] }}</small>
                            <h3 class="font-serif h6 text-pn-brown mt-1 mb-2 text-truncate">{{ $relatedItem['name'] }}</h3>
                            <div class="d-flex align-items-center justify-content-between gap-2 mt-auto pt-2">
                                <strong class="text-pn-brown">{{ $relatedItem['currency_symbol'] }}{{ number_format($relatedItem['price'], 2) }}</strong>
                                <button type="button" class="btn btn-pn btn-sm rounded-circle d-flex align-items-center justify-content-center" style="width: 32px; height: 32px;" aria-label="Add to cart">
                                    <i class="bi bi-bag-plus"></i>
                                </button>
                            </div>
                        </div>
                    </article>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- FINAL CTA --}}
<section class="pb-5">
    <div class="container">
        <div class="pn-digital rounded-5 overflow-hidden text-white p-4 p-md-5 text-center shadow">
            <i class="bi bi-bag-heart display-5 text-warning mb-2 d-inline-block"></i>
            <h2 class="font-serif display-6">Continue your devotional shopping.</h2>
            <p class="text-white-50 col-lg-7 mx-auto mb-4">Explore more pooja essentials, spiritual products and handcrafted collections.</p>
            <a href="{{ route('store.index') }}" class="btn btn-warning text-dark fw-semibold px-4 py-2">
                Explore Store <i class="bi bi-arrow-right ms-2"></i>
            </a>
        </div>
    </div>
</section>

@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const csrf = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '';
    const addCartUrl = @json(route('store.cart.add'));
    const wishlistAddUrl = @json(route('store.wishlist.add'));
    const checkoutUrl = @json(route('store.checkout'));

    /* --- Gallery Thumbnails --- */
    const mainImage = document.getElementById('productMainImage');
    const thumbnails = document.querySelectorAll('[data-product-image]');

    thumbnails.forEach(thumb => {
        thumb.addEventListener('click', function () {
            if (mainImage && this.dataset.productImage) {
                mainImage.src = this.dataset.productImage;
            }
            thumbnails.forEach(t => {
                t.classList.remove('border-primary', 'border-2', 'active');
                t.classList.add('border-warning-subtle');
            });
            this.classList.remove('border-warning-subtle');
            this.classList.add('border-primary', 'border-2', 'active');
        });
    });

    /* --- Quantity Controls --- */
    const qtyInput = document.getElementById('productQuantity');
    const btnMinus = document.getElementById('quantityMinus');
    const btnPlus = document.getElementById('quantityPlus');

    if (qtyInput && btnMinus && btnPlus) {
        btnMinus.addEventListener('click', () => {
            const current = parseInt(qtyInput.value, 10) || 1;
            qtyInput.value = Math.max(1, current - 1);
        });
        btnPlus.addEventListener('click', () => {
            const current = parseInt(qtyInput.value, 10) || 1;
            qtyInput.value = Math.min(99, current + 1);
        });
        qtyInput.addEventListener('change', function () {
            let val = parseInt(this.value, 10) || 1;
            this.value = Math.min(99, Math.max(1, val));
        });
    }

    /* --- AJAX Operations --- */
    async function postJson(url, payload) {
        const response = await fetch(url, {
            method: 'POST',
            credentials: 'same-origin',
            headers: {
                'X-CSRF-TOKEN': csrf,
                'Accept': 'application/json',
                'Content-Type': 'application/json',
                'X-Requested-With': 'XMLHttpRequest'
            },
            body: JSON.stringify(payload)
        });

        if (response.redirected) {
            window.location.href = response.url;
            return null;
        }

        const data = await response.json().catch(() => ({}));
        if (!response.ok) {
            const msg = data.errors ? Object.values(data.errors).flat()[0] : null;
            throw new Error(msg || data.message || 'The request could not be completed.');
        }
        return data;
    }

    function setBusy(button, busy, busyText) {
        if (!button) return;
        if (busy) {
            button.dataset.originalHtml = button.innerHTML;
            button.disabled = true;
            button.innerHTML = busyText;
        } else {
            button.disabled = false;
            if (button.dataset.originalHtml) {
                button.innerHTML = button.dataset.originalHtml;
                delete button.dataset.originalHtml;
            }
        }
    }

    /* --- Wishlist Click --- */
    document.querySelectorAll('[data-wishlist-add]').forEach(btn => {
        btn.addEventListener('click', async function () {
            const original = this.innerHTML;
            this.disabled = true;
            try {
                const result = await postJson(wishlistAddUrl, { product_id: Number(this.dataset.productId) });
                if (!result) return;
                document.querySelectorAll(`[data-wishlist-add][data-product-id="${this.dataset.productId}"]`).forEach(el => {
                    el.innerHTML = '<i class="bi bi-heart-fill text-danger"></i>';
                    el.setAttribute('aria-pressed', 'true');
                });
                alert(result.message || 'Added to your wishlist.');
            } catch (err) {
                alert(err.message);
                this.innerHTML = original;
            } finally {
                if (this.isConnected) this.disabled = false;
            }
        });
    });

    /* --- Cart & Buy Now --- */
    const addBtn = document.querySelector('[data-cart-add]');
    const buyNowBtn = document.querySelector('[data-buy-now]');

    async function addSelectedProduct(button, destination) {
        if (!button) return;
        const quantity = Math.max(1, Math.min(99, Number.parseInt(qtyInput?.value, 10) || 1));
        let navigatingAway = false;
        setBusy(button, true, destination === 'checkout' ? 'Preparing checkout…' : 'Adding…');

        try {
            const result = await postJson(addCartUrl, { product_id: Number(button.dataset.productId), quantity });
            if (!result) return;

            if (destination === 'checkout') {
                navigatingAway = true;
                window.location.href = checkoutUrl;
                return;
            }

            alert(result.message || 'Product added to your cart.');
            document.querySelectorAll('[data-cart-count]').forEach(el => {
                el.textContent = result.cart_count ?? el.textContent;
            });
        } catch (err) {
            alert(err.message);
        } finally {
            if (button.isConnected && !navigatingAway) {
                setBusy(button, false);
            }
        }
    }

    addBtn?.addEventListener('click', () => addSelectedProduct(addBtn, 'cart'));
    buyNowBtn?.addEventListener('click', () => addSelectedProduct(buyNowBtn, 'checkout'));
});
</script>
@endpush