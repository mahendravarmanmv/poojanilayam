@extends('layouts.app')

@section('title', 'Resources | Pooja Nilayam')
@section('meta_description', 'Explore useful devotional resources, guides and downloadable materials from Pooja Nilayam.')

@section('content')
<div class="bg-pn-cream py-3">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 small">
                <li class="breadcrumb-item">
                    <a href="{{ route('home') }}" class="text-pn-primary">Home</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Resources</li>
            </ol>
        </nav>
    </div>
</div>

<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <span class="pn-section-label">Devotional Library</span>
            <h1 class="display-6 fw-bold mt-2 mb-3">Resources</h1>
            <p class="text-muted mx-auto mb-0" style="max-width: 760px;">
                Explore useful devotional guides and reference materials to help you
                prepare for your poojas and spiritual practices.
            </p>
        </div>

        <div class="row g-4">
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 border-0 shadow-sm rounded-4">
                    <div class="card-body p-4 d-flex flex-column">
                        <div class="icon-circle-58 bg-pn-cream text-pn-primary mb-4">
                            <i class="bi bi-book-half fs-4"></i>
                        </div>
                        <span class="badge rounded-pill bg-pn-cream text-pn-primary align-self-start mb-2">
                            Guide
                        </span>
                        <h2 class="h5 fw-bold mb-2">Pooja Preparation Guide</h2>
                        <p class="text-muted small mb-4">
                            A simple guide to help devotees prepare before attending or
                            booking a pooja.
                        </p>
                        <div class="mt-auto">
                            <div class="small text-muted mb-3">
                                <i class="bi bi-file-earmark-pdf me-1"></i> PDF • 1.2 MB
                            </div>
                            <a href="#" class="btn btn-pn w-100">
                                <i class="bi bi-download me-2"></i>Download Guide
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="card h-100 border-0 shadow-sm rounded-4">
                    <div class="card-body p-4 d-flex flex-column">
                        <div class="icon-circle-58 bg-pn-cream text-pn-primary mb-4">
                            <i class="bi bi-journal-text fs-4"></i>
                        </div>
                        <span class="badge rounded-pill bg-pn-cream text-pn-primary align-self-start mb-2">
                            Reference
                        </span>
                        <h2 class="h5 fw-bold mb-2">Sankalpam Reference</h2>
                        <p class="text-muted small mb-4">
                            Helpful reference material for devotees preparing their
                            sankalpam details for a pooja.
                        </p>
                        <div class="mt-auto">
                            <div class="small text-muted mb-3">
                                <i class="bi bi-file-earmark-pdf me-1"></i> PDF • 850 KB
                            </div>
                            <a href="#" class="btn btn-pn w-100">
                                <i class="bi bi-download me-2"></i>Download Reference
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="card h-100 border-0 shadow-sm rounded-4">
                    <div class="card-body p-4 d-flex flex-column">
                        <div class="icon-circle-58 bg-pn-cream text-pn-primary mb-4">
                            <i class="bi bi-stars fs-4"></i>
                        </div>
                        <span class="badge rounded-pill bg-pn-cream text-pn-primary align-self-start mb-2">
                            Astrology
                        </span>
                        <h2 class="h5 fw-bold mb-2">Astrology Basics</h2>
                        <p class="text-muted small mb-4">
                            An introductory reference for devotees exploring the
                            astrology services available on Pooja Nilayam.
                        </p>
                        <div class="mt-auto">
                            <div class="small text-muted mb-3">
                                <i class="bi bi-file-earmark-pdf me-1"></i> PDF • 980 KB
                            </div>
                            <a href="#" class="btn btn-pn w-100">
                                <i class="bi bi-download me-2"></i>Download Guide
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-pn-cream rounded-4 p-4 p-lg-5 mt-5 text-center">
            <i class="bi bi-folder2-open text-pn-primary display-6"></i>
            <h2 class="h4 fw-bold mt-3 mb-2">More Resources Coming Soon</h2>
            <p class="text-muted mb-4 mx-auto" style="max-width: 650px;">
                We will continue adding useful devotional resources and guides to the
                Pooja Nilayam library.
            </p>
            <a href="{{ route('pooja.index') }}" class="btn btn-pn">
                <i class="bi bi-flower1 me-2"></i>Explore Poojas
            </a>
        </div>
    </div>
</section>
@endsection
