@extends('layouts.app')

@section('title', 'Track Order | Pooja Nilayam')
@section('meta_description', 'Track your Pooja Nilayam order and view its current delivery status.')

@section('content')

<section class="bg-pn-cream border-bottom">
    <div class="container py-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 small">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-pn-primary">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('store.index') }}" class="text-pn-primary">Store</a></li>
                <li class="breadcrumb-item active" aria-current="page">Track Order</li>
            </ol>
        </nav>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-12 col-lg-8">
                <span class="pn-section-label text-uppercase text-pn-gold small fw-semibold">Order Tracking</span>
                <h1 class="font-serif display-5 text-pn-brown mt-2 mb-3">Track Your Order</h1>
                <div class="pn-divider mx-auto mb-3"></div>
                <p class="text-secondary mb-0">
                    Enter your order details below to view the current status of your Pooja Nilayam order.
                </p>
            </div>
        </div>
    </div>
</section>

<section class="pb-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-7">
                <div class="card border-0 shadow-sm rounded-4">
                    <div class="card-body p-4 p-md-5">
                        <div class="text-center mb-4">
                            <div class="icon-circle-58 rounded-circle bg-pn-cream d-inline-flex align-items-center justify-content-center mb-3">
                                <i class="bi bi-box-seam fs-4 text-pn-primary"></i>
                            </div>
                            <h2 class="font-serif h3 text-pn-brown mb-2">Find Your Order</h2>
                            <p class="small text-secondary mb-0">Use your order number and registered email address.</p>
                        </div>

                        <form action="#" method="get">
                            <div class="mb-4">
                                <label for="order_number" class="form-label fw-semibold">
                                    Order Number <span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control form-control-lg rounded-3"
                                       id="order_number" name="order_number" placeholder="Example: PN-2026-00125">
                            </div>

                            <div class="mb-4">
                                <label for="email" class="form-label fw-semibold">
                                    Email Address <span class="text-danger">*</span>
                                </label>
                                <input type="email" class="form-control form-control-lg rounded-3"
                                       id="email" name="email" placeholder="you@example.com">
                            </div>

                            <button type="submit" class="btn btn-pn btn-lg w-100 py-3">
                                Track Order <i class="bi bi-arrow-right ms-2"></i>
                            </button>
                        </form>

                        <p class="small text-secondary text-center mt-4 mb-0">
                            You can find your order number in your order confirmation email.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="pb-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-xl-9">
                <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                    <div class="card-header bg-white border-0 p-4 p-md-5 pb-3">
                        <div class="d-flex flex-column flex-md-row justify-content-between gap-3">
                            <div>
                                <span class="small text-secondary">Sample Order</span>
                                <h2 class="font-serif h4 text-pn-brown mb-0 mt-1">PN-2026-00125</h2>
                            </div>
                            <div class="text-md-end">
                                <span class="badge rounded-pill bg-success-subtle text-success px-3 py-2">In Transit</span>
                                <div class="small text-secondary mt-2">Expected delivery: 12 September 2026</div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body p-4 p-md-5 pt-3">
                        <div class="row g-0">
                            <div class="col-12 col-md-3 text-center">
                                <div class="icon-circle-58 rounded-circle bg-pn-cream d-inline-flex align-items-center justify-content-center">
                                    <i class="bi bi-check-lg fs-4 text-pn-primary"></i>
                                </div>
                                <h3 class="h6 fw-semibold text-pn-brown mt-3 mb-1">Order Confirmed</h3>
                                <p class="small text-secondary mb-4 mb-md-0">08 Sep 2026</p>
                            </div>

                            <div class="col-12 col-md-3 text-center">
                                <div class="icon-circle-58 rounded-circle bg-pn-cream d-inline-flex align-items-center justify-content-center">
                                    <i class="bi bi-box2 fs-4 text-pn-primary"></i>
                                </div>
                                <h3 class="h6 fw-semibold text-pn-brown mt-3 mb-1">Packed</h3>
                                <p class="small text-secondary mb-4 mb-md-0">09 Sep 2026</p>
                            </div>

                            <div class="col-12 col-md-3 text-center">
                                <div class="icon-circle-58 rounded-circle bg-pn-primary d-inline-flex align-items-center justify-content-center">
                                    <i class="bi bi-truck fs-4 text-white"></i>
                                </div>
                                <h3 class="h6 fw-semibold text-pn-brown mt-3 mb-1">In Transit</h3>
                                <p class="small text-secondary mb-4 mb-md-0">10 Sep 2026</p>
                            </div>

                            <div class="col-12 col-md-3 text-center">
                                <div class="icon-circle-58 rounded-circle bg-light d-inline-flex align-items-center justify-content-center">
                                    <i class="bi bi-house-check fs-4 text-secondary"></i>
                                </div>
                                <h3 class="h6 fw-semibold text-secondary mt-3 mb-1">Delivered</h3>
                                <p class="small text-secondary mb-0">Pending</p>
                            </div>
                        </div>

                        <hr class="my-4">

                        <div class="row g-4">
                            <div class="col-12 col-md-6">
                                <span class="small text-secondary d-block mb-1">Shipping To</span>
                                <span class="fw-semibold text-pn-brown">Hyderabad, Telangana</span>
                            </div>
                            <div class="col-12 col-md-6">
                                <span class="small text-secondary d-block mb-1">Courier Status</span>
                                <span class="fw-semibold text-pn-brown">Shipment is on the way</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="pb-5">
    <div class="container">
        <div class="bg-pn-cream rounded-4 p-4 p-md-5">
            <div class="row align-items-center g-4">
                <div class="col-12 col-md">
                    <span class="small text-pn-gold fw-semibold text-uppercase">Need Assistance?</span>
                    <h2 class="font-serif h4 text-pn-brown mt-2 mb-2">Having trouble tracking your order?</h2>
                    <p class="small text-secondary mb-0">
                        Our support team can help you with order and delivery related questions.
                    </p>
                </div>
                <div class="col-12 col-md-auto">
                    <a href="{{ route('support.help-center') }}" class="btn btn-pn-outline px-4">
                        Visit Help Center <i class="bi bi-arrow-right ms-2"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
