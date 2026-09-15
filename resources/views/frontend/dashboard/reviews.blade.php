@extends('layouts.app')

@section('title', 'My Reviews | Pooja Nilayam')
@section('meta_description', 'View and manage your reviews on Pooja Nilayam.')

@section('content')
<section class="bg-pn-cream border-bottom">
    <div class="container py-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 small">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-pn-primary">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}" class="text-pn-primary">My Account</a></li>
                <li class="breadcrumb-item active" aria-current="page">My Reviews</li>
            </ol>
        </nav>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="row justify-content-center text-center mb-5">
            <div class="col-12 col-lg-8">
                <span class="pn-section-label text-uppercase text-pn-gold small fw-semibold">Your Feedback</span>
                <h1 class="font-serif display-5 text-pn-brown mt-2 mb-3">My Reviews</h1>
                <div class="pn-divider mx-auto mb-3"></div>
                <p class="text-secondary mb-0">View the reviews you have shared and continue helping other devotees make informed choices.</p>
            </div>
        </div>

        <div class="row g-4">
            <div class="col-12 col-lg-4">
                <div class="card border-0 shadow-sm rounded-4 h-100">
                    <div class="card-body p-4 p-md-5 text-center">
                        <div class="icon-circle-58 rounded-circle bg-pn-cream d-inline-flex align-items-center justify-content-center mb-3">
                            <i class="bi bi-star-fill fs-4 text-pn-gold"></i>
                        </div>
                        <h2 class="font-serif h4 text-pn-brown mb-2">Your Reviews</h2>
                        <div class="display-6 fw-semibold text-pn-primary">3</div>
                        <p class="small text-secondary mb-4">Reviews shared so far</p>
                        <a href="{{ route('store.index') }}" class="btn btn-pn-outline px-4">Explore Store <i class="bi bi-arrow-right ms-2"></i></a>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-8">
                <div class="d-flex flex-column flex-sm-row justify-content-between align-items-sm-center gap-2 mb-3">
                    <div>
                        <h2 class="font-serif h4 text-pn-brown mb-1">Recent Reviews</h2>
                        <p class="small text-secondary mb-0">Your latest product feedback.</p>
                    </div>
                    <select class="form-select form-select-sm rounded-3" style="max-width: 170px;" aria-label="Filter reviews">
                        <option selected>All Reviews</option>
                        <option>Published</option>
                        <option>Pending</option>
                    </select>
                </div>

                <div class="card border-0 shadow-sm rounded-4 mb-3">
                    <div class="card-body p-4">
                        <div class="d-flex flex-column flex-sm-row justify-content-between gap-3">
                            <div class="d-flex gap-3">
                                <div class="icon-circle-58 rounded-3 bg-pn-cream d-flex align-items-center justify-content-center flex-shrink-0"><i class="bi bi-flower1 fs-4 text-pn-primary"></i></div>
                                <div>
                                    <h3 class="h6 fw-semibold text-pn-brown mb-1">Brass Diya Set</h3>
                                    <div class="text-pn-gold small mb-2" aria-label="5 out of 5 stars"><i class="bi bi-star-fill"></i> <i class="bi bi-star-fill"></i> <i class="bi bi-star-fill"></i> <i class="bi bi-star-fill"></i> <i class="bi bi-star-fill"></i></div>
                                    <p class="small text-secondary mb-0">Beautiful and suitable for daily pooja. The finish is very nice and the set arrived safely.</p>
                                </div>
                            </div>
                            <div class="text-sm-end"><span class="badge rounded-pill bg-success-subtle text-success px-3 py-2">Published</span><div class="small text-secondary mt-2">05 Sep 2026</div></div>
                        </div>
                    </div>
                </div>

                <div class="card border-0 shadow-sm rounded-4 mb-3">
                    <div class="card-body p-4">
                        <div class="d-flex flex-column flex-sm-row justify-content-between gap-3">
                            <div class="d-flex gap-3">
                                <div class="icon-circle-58 rounded-3 bg-pn-cream d-flex align-items-center justify-content-center flex-shrink-0"><i class="bi bi-grid-3x3-gap fs-4 text-pn-primary"></i></div>
                                <div>
                                    <h3 class="h6 fw-semibold text-pn-brown mb-1">Pooja Thali</h3>
                                    <div class="text-pn-gold small mb-2" aria-label="4 out of 5 stars"><i class="bi bi-star-fill"></i> <i class="bi bi-star-fill"></i> <i class="bi bi-star-fill"></i> <i class="bi bi-star-fill"></i> <i class="bi bi-star"></i></div>
                                    <p class="small text-secondary mb-0">Good quality and elegant design. Packaging was also neat.</p>
                                </div>
                            </div>
                            <div class="text-sm-end"><span class="badge rounded-pill bg-success-subtle text-success px-3 py-2">Published</span><div class="small text-secondary mt-2">01 Sep 2026</div></div>
                        </div>
                    </div>
                </div>

                <div class="card border-0 shadow-sm rounded-4">
                    <div class="card-body p-4">
                        <div class="d-flex flex-column flex-sm-row justify-content-between gap-3">
                            <div class="d-flex gap-3">
                                <div class="icon-circle-58 rounded-3 bg-pn-cream d-flex align-items-center justify-content-center flex-shrink-0"><i class="bi bi-handbag fs-4 text-pn-primary"></i></div>
                                <div>
                                    <h3 class="h6 fw-semibold text-pn-brown mb-1">Camphor Holder</h3>
                                    <div class="text-pn-gold small mb-2" aria-label="5 out of 5 stars"><i class="bi bi-star-fill"></i> <i class="bi bi-star-fill"></i> <i class="bi bi-star-fill"></i> <i class="bi bi-star-fill"></i> <i class="bi bi-star-fill"></i></div>
                                    <p class="small text-secondary mb-0">Simple, useful and exactly as described.</p>
                                </div>
                            </div>
                            <div class="text-sm-end"><span class="badge rounded-pill bg-warning-subtle text-warning-emphasis px-3 py-2">Pending</span><div class="small text-secondary mt-2">30 Aug 2026</div></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-pn-cream rounded-4 p-4 p-md-5 mt-5">
            <div class="row align-items-center g-4">
                <div class="col-12 col-md">
                    <span class="small text-pn-gold fw-semibold text-uppercase">Share Your Experience</span>
                    <h2 class="font-serif h4 text-pn-brown mt-2 mb-2">Your feedback helps fellow devotees</h2>
                    <p class="small text-secondary mb-0">After purchasing a product, share your experience to help others discover useful devotional products.</p>
                </div>
                <div class="col-12 col-md-auto">
                    <a href="{{ route('store.index') }}" class="btn btn-pn px-4">Shop Products <i class="bi bi-arrow-right ms-2"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
