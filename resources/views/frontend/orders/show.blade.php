@extends('layouts.app')

@section('title', 'Order Details | Pooja Nilayam')

@section('meta_description', 'View your Pooja Nilayam order details, items, payment information and order status.')

@section('content')

    <!-- Page Header -->
    <section class="py-5 bg-cream">
        <div class="container">
            <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3">

                <div>
                    <span class="text-uppercase small fw-semibold text-muted">
                        My Orders
                    </span>

                    <h1 class="display-6 fw-bold mt-2 mb-2">
                        Order Details
                    </h1>

                    <p class="text-muted mb-0">
                        Review your order, payment and delivery information.
                    </p>
                </div>

                <a href="{{ route('dashboard.orders') }}"
                   class="btn btn-outline-dark">
                    <i class="bi bi-arrow-left me-1"></i>
                    Back to Orders
                </a>

            </div>
        </div>
    </section>


    <!-- Order Details -->
    <section class="py-5">
        <div class="container">

            <!-- Order Summary -->
            <div class="card border-0 shadow-sm rounded-4 mb-4">
                <div class="card-body p-4">

                    <div class="row g-4 align-items-center">

                        <div class="col-md-4">
                            <span class="small text-muted d-block mb-1">
                                Order Number
                            </span>

                            <h5 class="fw-bold mb-0">
                                #PN20260001
                            </h5>
                        </div>

                        <div class="col-md-4">
                            <span class="small text-muted d-block mb-1">
                                Order Date
                            </span>

                            <div class="fw-semibold">
                                14 September 2026
                            </div>
                        </div>

                        <div class="col-md-4">
                            <span class="small text-muted d-block mb-1">
                                Order Status
                            </span>

                            <span class="badge bg-success-subtle text-success px-3 py-2 rounded-pill">
                                Confirmed
                            </span>
                        </div>

                    </div>

                </div>
            </div>


            <div class="row g-4">

                <!-- Left Column -->
                <div class="col-lg-8">

                    <!-- Ordered Items -->
                    <div class="card border-0 shadow-sm rounded-4 mb-4">

                        <div class="card-header bg-transparent border-0 p-4 pb-2">
                            <h5 class="fw-bold mb-0">
                                Ordered Items
                            </h5>
                        </div>

                        <div class="card-body p-4">

                            <!-- Product -->
                            <div class="d-flex gap-3 pb-4 mb-4 border-bottom">

                                <div class="flex-shrink-0">
                                    <div class="bg-light rounded-3 d-flex align-items-center justify-content-center"
                                         style="width: 90px; height: 90px;">
                                        <i class="bi bi-box-seam fs-2 text-muted"></i>
                                    </div>
                                </div>

                                <div class="flex-grow-1">

                                    <div class="d-flex flex-column flex-md-row justify-content-between gap-2">

                                        <div>
                                            <h6 class="fw-semibold mb-1">
                                                Rudrabhishekam Pooja
                                            </h6>

                                            <p class="small text-muted mb-1">
                                                Traditional Shiva Pooja
                                            </p>

                                            <span class="small text-muted">
                                                Quantity: 1
                                            </span>
                                        </div>

                                        <div class="fw-bold">
                                            ₹1,500
                                        </div>

                                    </div>

                                </div>

                            </div>


                            <!-- Product -->
                            <div class="d-flex gap-3">

                                <div class="flex-shrink-0">
                                    <div class="bg-light rounded-3 d-flex align-items-center justify-content-center"
                                         style="width: 90px; height: 90px;">
                                        <i class="bi bi-box-seam fs-2 text-muted"></i>
                                    </div>
                                </div>

                                <div class="flex-grow-1">

                                    <div class="d-flex flex-column flex-md-row justify-content-between gap-2">

                                        <div>
                                            <h6 class="fw-semibold mb-1">
                                                Pooja Samagri Kit
                                            </h6>

                                            <p class="small text-muted mb-1">
                                                Complete Pooja Essentials
                                            </p>

                                            <span class="small text-muted">
                                                Quantity: 1
                                            </span>
                                        </div>

                                        <div class="fw-bold">
                                            ₹750
                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>
                    </div>


                    <!-- Shipping Address -->
                    <div class="card border-0 shadow-sm rounded-4 mb-4">

                        <div class="card-header bg-transparent border-0 p-4 pb-2">
                            <h5 class="fw-bold mb-0">
                                Delivery Address
                            </h5>
                        </div>

                        <div class="card-body p-4">

                            <div class="d-flex gap-3">

                                <div>
                                    <div class="rounded-circle bg-light d-flex align-items-center justify-content-center"
                                         style="width: 45px; height: 45px;">
                                        <i class="bi bi-geo-alt text-primary"></i>
                                    </div>
                                </div>

                                <div>
                                    <h6 class="fw-semibold mb-1">
                                        Mahendra Varma
                                    </h6>

                                    <p class="text-muted mb-1">
                                        House No. 12-34, Main Road
                                    </p>

                                    <p class="text-muted mb-1">
                                        Hyderabad, Telangana - 500001
                                    </p>

                                    <p class="text-muted mb-0">
                                        India
                                    </p>

                                </div>

                            </div>

                        </div>
                    </div>


                    <!-- Payment Information -->
                    <div class="card border-0 shadow-sm rounded-4">

                        <div class="card-header bg-transparent border-0 p-4 pb-2">
                            <h5 class="fw-bold mb-0">
                                Payment Information
                            </h5>
                        </div>

                        <div class="card-body p-4">

                            <div class="row g-4">

                                <div class="col-md-6">

                                    <span class="small text-muted d-block mb-1">
                                        Payment Method
                                    </span>

                                    <div class="fw-semibold">
                                        Online Payment
                                    </div>

                                </div>

                                <div class="col-md-6">

                                    <span class="small text-muted d-block mb-1">
                                        Payment Status
                                    </span>

                                    <span class="badge bg-success-subtle text-success px-3 py-2 rounded-pill">
                                        Paid
                                    </span>

                                </div>

                            </div>

                        </div>
                    </div>

                </div>


                <!-- Right Column -->
                <div class="col-lg-4">

                    <!-- Order Summary -->
                    <div class="card border-0 shadow-sm rounded-4 mb-4">

                        <div class="card-header bg-transparent border-0 p-4 pb-2">
                            <h5 class="fw-bold mb-0">
                                Order Summary
                            </h5>
                        </div>

                        <div class="card-body p-4">

                            <div class="d-flex justify-content-between mb-3">
                                <span class="text-muted">
                                    Subtotal
                                </span>

                                <span>
                                    ₹2,250
                                </span>
                            </div>

                            <div class="d-flex justify-content-between mb-3">
                                <span class="text-muted">
                                    Delivery
                                </span>

                                <span>
                                    ₹100
                                </span>
                            </div>

                            <div class="d-flex justify-content-between mb-3">
                                <span class="text-muted">
                                    Discount
                                </span>

                                <span class="text-success">
                                    - ₹150
                                </span>
                            </div>

                            <hr>

                            <div class="d-flex justify-content-between align-items-center">

                                <span class="fw-bold">
                                    Total
                                </span>

                                <span class="fs-5 fw-bold">
                                    ₹2,200
                                </span>

                            </div>

                        </div>
                    </div>


                    <!-- Actions -->
                    <div class="card border-0 shadow-sm rounded-4">

                        <div class="card-body p-4">

                            <div class="d-grid gap-2">

                                <a href="{{ route('orders.track', ['order' => 1]) }}"
                                   class="btn btn-primary">
                                    <i class="bi bi-truck me-1"></i>
                                    Track Order
                                </a>

                                <a href="{{ route('orders.invoice', ['order' => 1]) }}"
                                   class="btn btn-outline-dark">
                                    <i class="bi bi-file-earmark-text me-1"></i>
                                    View Invoice
                                </a>

                                <a href="{{ route('store.index') }}"
                                   class="btn btn-outline-secondary">
                                    <i class="bi bi-bag me-1"></i>
                                    Continue Shopping
                                </a>

                            </div>

                        </div>
                    </div>

                </div>

            </div>

        </div>
    </section>

@endsection