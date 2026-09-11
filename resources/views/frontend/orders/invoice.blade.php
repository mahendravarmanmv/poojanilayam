@extends('layouts.app')

@section('title', 'Order Invoice | Pooja Nilayam')
@section('meta_description', 'View your Pooja Nilayam order invoice and download a copy for your records.')

@section('content')
<section class="bg-pn-cream border-bottom">
    <div class="container py-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 small">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-pn-primary">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('store.index') }}" class="text-pn-primary">Store</a></li>
                <li class="breadcrumb-item"><a href="{{ route('dashboard.orders') }}" class="text-pn-primary">My Orders</a></li>
                <li class="breadcrumb-item active" aria-current="page">Invoice</li>
            </ol>
        </nav>
    </div>
</section>

<section class="py-5">
    <div class="container">

        <div class="row align-items-center g-3 mb-4">
            <div class="col">
                <span class="pn-section-label text-uppercase text-pn-gold small fw-semibold">Order Invoice</span>
                <h1 class="font-serif display-6 text-pn-brown mt-2 mb-1">Invoice #PN-2026-00125</h1>
                <p class="small text-secondary mb-0">Order placed on 08 September 2026</p>
            </div>
            <div class="col-12 col-md-auto">
                <button type="button" class="btn btn-pn px-4">
                    <i class="bi bi-download me-2"></i>Download Invoice
                </button>
            </div>
        </div>

        <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
            <div class="card-body p-4 p-md-5">

                <div class="row justify-content-between g-4 mb-5">
                    <div class="col-12 col-md-6">
                        <div class="d-flex align-items-center gap-2 mb-3">
                            <span class="icon-circle-58 rounded-circle bg-pn-cream d-inline-flex align-items-center justify-content-center">
                                <i class="bi bi-flower1 fs-4 text-pn-primary"></i>
                            </span>
                            <div>
                                <h2 class="font-serif h4 text-pn-brown mb-0">Pooja Nilayam</h2>
                                <span class="small text-secondary">Sacred services, thoughtfully delivered.</span>
                            </div>
                        </div>
                        <p class="small text-secondary mb-0">Hyderabad, Telangana<br>India</p>
                    </div>

                    <div class="col-12 col-md-5">
                        <div class="bg-pn-cream rounded-4 p-4">
                            <div class="row g-3 small">
                                <div class="col-6"><span class="text-secondary d-block">Invoice No.</span><span class="fw-semibold text-pn-brown">PN-INV-00125</span></div>
                                <div class="col-6"><span class="text-secondary d-block">Invoice Date</span><span class="fw-semibold text-pn-brown">08 Sep 2026</span></div>
                                <div class="col-6"><span class="text-secondary d-block">Order No.</span><span class="fw-semibold text-pn-brown">PN-2026-00125</span></div>
                                <div class="col-6"><span class="text-secondary d-block">Payment</span><span class="fw-semibold text-success">Paid</span></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row g-4 mb-5">
                    <div class="col-12 col-md-6">
                        <h3 class="h6 fw-semibold text-pn-brown mb-3">Billing Address</h3>
                        <div class="small text-secondary">
                            <strong class="text-pn-brown">Sample Customer</strong><br>
                            12 Example Street<br>
                            Hyderabad, Telangana 500001<br>
                            India<br>
                            +91 90000 00000<br>
                            customer@example.com
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <h3 class="h6 fw-semibold text-pn-brown mb-3">Shipping Address</h3>
                        <div class="small text-secondary">
                            <strong class="text-pn-brown">Sample Customer</strong><br>
                            12 Example Street<br>
                            Hyderabad, Telangana 500001<br>
                            India
                        </div>
                    </div>
                </div>

                <div class="table-responsive mb-4">
                    <table class="table align-middle">
                        <thead class="bg-pn-cream">
                            <tr>
                                <th class="border-0 py-3">Item</th>
                                <th class="border-0 py-3 text-center">Qty</th>
                                <th class="border-0 py-3 text-end">Price</th>
                                <th class="border-0 py-3 text-end">Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="py-3"><div class="fw-semibold text-pn-brown">Brass Diya Set</div><div class="small text-secondary">Traditional devotional diya set</div></td>
                                <td class="text-center">1</td>
                                <td class="text-end">₹899.00</td>
                                <td class="text-end fw-semibold">₹899.00</td>
                            </tr>
                            <tr>
                                <td class="py-3"><div class="fw-semibold text-pn-brown">Pooja Thali</div><div class="small text-secondary">Decorative pooja thali</div></td>
                                <td class="text-center">1</td>
                                <td class="text-end">₹649.00</td>
                                <td class="text-end fw-semibold">₹649.00</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="row justify-content-end">
                    <div class="col-12 col-md-6 col-lg-5">
                        <div class="d-flex justify-content-between py-2 small"><span class="text-secondary">Subtotal</span><span>₹1,548.00</span></div>
                        <div class="d-flex justify-content-between py-2 small"><span class="text-secondary">Shipping</span><span>₹80.00</span></div>
                        <div class="d-flex justify-content-between py-2 small"><span class="text-secondary">Tax</span><span>₹154.80</span></div>
                        <hr>
                        <div class="d-flex justify-content-between align-items-center py-2">
                            <span class="fw-semibold text-pn-brown">Total</span>
                            <span class="font-serif h4 text-pn-primary mb-0">₹1,782.80</span>
                        </div>
                    </div>
                </div>

                <hr class="my-5">

                <div class="row g-4">
                    <div class="col-12 col-md-7">
                        <h3 class="h6 fw-semibold text-pn-brown mb-2">Payment Information</h3>
                        <p class="small text-secondary mb-0">
                            Payment Status: <span class="fw-semibold text-success">Paid</span><br>
                            Payment Method: Online Payment<br>
                            Transaction ID: PN-TXN-784512
                        </p>
                    </div>
                    <div class="col-12 col-md-5 text-md-end">
                        <h3 class="h6 fw-semibold text-pn-brown mb-2">Thank You</h3>
                        <p class="small text-secondary mb-0">Thank you for shopping with Pooja Nilayam. We are grateful to serve your devotional journey.</p>
                    </div>
                </div>

            </div>
        </div>

        <div class="d-flex flex-column flex-sm-row justify-content-center gap-2 mt-4">
            <a href="{{ route('dashboard.orders') }}" class="btn btn-pn-outline px-4">
                <i class="bi bi-arrow-left me-2"></i>Back to My Orders
            </a>
            <a href="{{ route('store.track-order') }}" class="btn btn-light border px-4">
                <i class="bi bi-truck me-2"></i>Track Order
            </a>
        </div>

    </div>
</section>
@endsection
