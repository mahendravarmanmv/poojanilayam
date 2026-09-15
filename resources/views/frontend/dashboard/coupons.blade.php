@extends('layouts.app')

@section('title', 'My Coupons | Pooja Nilayam')
@section('meta_description', 'View your available coupons and offers on Pooja Nilayam.')

@section('content')

<section class="bg-pn-cream border-bottom">
    <div class="container py-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 small">
                <li class="breadcrumb-item">
                    <a href="{{ route('home') }}" class="text-pn-primary">Home</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('dashboard.index') }}" class="text-pn-primary">My Account</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">My Coupons</li>
            </ol>
        </nav>
    </div>
</section>

<section class="py-5">
    <div class="container">

        <div class="row justify-content-center text-center mb-5">
            <div class="col-12 col-lg-8">
                <span class="pn-section-label text-uppercase text-pn-gold small fw-semibold">
                    Special Offers
                </span>
                <h1 class="font-serif display-5 text-pn-brown mt-2 mb-3">
                    My Coupons
                </h1>
                <div class="pn-divider mx-auto mb-3"></div>
                <p class="text-secondary mb-0">
                    Discover your available offers and use them on eligible purchases.
                </p>
            </div>
        </div>

        <div class="row g-4">

            <div class="col-12 col-lg-4">
                <div class="card border-0 shadow-sm rounded-4 h-100">
                    <div class="card-body p-4 p-md-5 text-center">

                        <div class="icon-circle-58 rounded-circle bg-pn-cream d-inline-flex align-items-center justify-content-center mb-3">
                            <i class="bi bi-ticket-perforated fs-4 text-pn-primary"></i>
                        </div>

                        <h2 class="font-serif h4 text-pn-brown mb-2">
                            Available Coupons
                        </h2>

                        <div class="display-6 fw-semibold text-pn-primary">3</div>

                        <p class="small text-secondary mb-4">
                            Offers available for you
                        </p>

                        <a href="{{ route('store.index') }}" class="btn btn-pn px-4">
                            Shop Now
                            <i class="bi bi-arrow-right ms-2"></i>
                        </a>

                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-8">

                <div class="d-flex flex-column flex-sm-row justify-content-between align-items-sm-center gap-2 mb-3">
                    <div>
                        <h2 class="font-serif h4 text-pn-brown mb-1">Available Offers</h2>
                        <p class="small text-secondary mb-0">
                            Apply an eligible coupon during checkout.
                        </p>
                    </div>

                    <select class="form-select form-select-sm rounded-3"
                            style="max-width: 170px;"
                            aria-label="Filter coupons">
                        <option selected>All Coupons</option>
                        <option>Available</option>
                        <option>Used</option>
                        <option>Expired</option>
                    </select>
                </div>

                <div class="card border-0 shadow-sm rounded-4 mb-3 overflow-hidden">
                    <div class="card-body p-4">

                        <div class="row align-items-center g-4">

                            <div class="col-12 col-md">
                                <div class="d-flex align-items-start gap-3">
                                    <div class="icon-circle-58 rounded-3 bg-pn-cream d-flex align-items-center justify-content-center flex-shrink-0">
                                        <i class="bi bi-percent fs-4 text-pn-primary"></i>
                                    </div>

                                    <div>
                                        <span class="badge rounded-pill bg-success-subtle text-success px-3 py-2 mb-2">
                                            Available
                                        </span>

                                        <h3 class="h5 fw-semibold text-pn-brown mb-1">
                                            10% Off on Your Next Order
                                        </h3>

                                        <p class="small text-secondary mb-2">
                                            Get 10% off on eligible devotional products.
                                        </p>

                                        <div class="small text-secondary">
                                            Valid until 30 September 2026
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-md-auto text-md-end">
                                <div class="bg-pn-cream rounded-3 px-3 py-2 mb-2">
                                    <span class="fw-semibold text-pn-brown">POOJA10</span>
                                </div>
                                <span class="small text-secondary">Min. order ₹999</span>
                            </div>

                        </div>

                    </div>
                </div>

                <div class="card border-0 shadow-sm rounded-4 mb-3 overflow-hidden">
                    <div class="card-body p-4">

                        <div class="row align-items-center g-4">

                            <div class="col-12 col-md">
                                <div class="d-flex align-items-start gap-3">
                                    <div class="icon-circle-58 rounded-3 bg-pn-cream d-flex align-items-center justify-content-center flex-shrink-0">
                                        <i class="bi bi-gift fs-4 text-pn-primary"></i>
                                    </div>

                                    <div>
                                        <span class="badge rounded-pill bg-success-subtle text-success px-3 py-2 mb-2">
                                            Available
                                        </span>

                                        <h3 class="h5 fw-semibold text-pn-brown mb-1">
                                            ₹200 Off Festival Special
                                        </h3>

                                        <p class="small text-secondary mb-2">
                                            Save ₹200 on selected festival and pooja products.
                                        </p>

                                        <div class="small text-secondary">
                                            Valid until 15 October 2026
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-md-auto text-md-end">
                                <div class="bg-pn-cream rounded-3 px-3 py-2 mb-2">
                                    <span class="fw-semibold text-pn-brown">FESTIVE200</span>
                                </div>
                                <span class="small text-secondary">Min. order ₹1,499</span>
                            </div>

                        </div>

                    </div>
                </div>

                <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                    <div class="card-body p-4">

                        <div class="row align-items-center g-4">

                            <div class="col-12 col-md">
                                <div class="d-flex align-items-start gap-3">
                                    <div class="icon-circle-58 rounded-3 bg-pn-cream d-flex align-items-center justify-content-center flex-shrink-0">
                                        <i class="bi bi-truck fs-4 text-pn-primary"></i>
                                    </div>

                                    <div>
                                        <span class="badge rounded-pill bg-success-subtle text-success px-3 py-2 mb-2">
                                            Available
                                        </span>

                                        <h3 class="h5 fw-semibold text-pn-brown mb-1">
                                            Free Shipping
                                        </h3>

                                        <p class="small text-secondary mb-2">
                                            Enjoy free standard delivery on eligible orders.
                                        </p>

                                        <div class="small text-secondary">
                                            Valid until 31 October 2026
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-md-auto text-md-end">
                                <div class="bg-pn-cream rounded-3 px-3 py-2 mb-2">
                                    <span class="fw-semibold text-pn-brown">FREESHIP</span>
                                </div>
                                <span class="small text-secondary">Min. order ₹799</span>
                            </div>

                        </div>

                    </div>
                </div>

            </div>
        </div>

        <div class="bg-pn-cream rounded-4 p-4 p-md-5 mt-5">
            <div class="row align-items-center g-4">

                <div class="col-12 col-md">
                    <span class="small text-pn-gold fw-semibold text-uppercase">
                        How to Use
                    </span>

                    <h2 class="font-serif h4 text-pn-brown mt-2 mb-2">
                        Apply your coupon at checkout
                    </h2>

                    <p class="small text-secondary mb-0">
                        Choose your products, proceed to checkout, and enter an eligible
                        coupon code in the offers section before placing your order.
                    </p>
                </div>

                <div class="col-12 col-md-auto">
                    <a href="{{ route('store.index') }}" class="btn btn-pn-outline px-4">
                        Explore Store
                        <i class="bi bi-arrow-right ms-2"></i>
                    </a>
                </div>

            </div>
        </div>

    </div>
</section>

@endsection
