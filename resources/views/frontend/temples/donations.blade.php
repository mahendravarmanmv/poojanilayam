@extends('layouts.app')

@section('title', 'Temple Donations | Pooja Nilayam')
@section('meta_description', 'Support temple activities and sacred services through Pooja Nilayam.')

@section('content')
<section class="bg-pn-cream border-bottom">
    <div class="container py-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-pn-primary">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('temple.index') }}" class="text-pn-primary">Temples</a></li>
                <li class="breadcrumb-item active" aria-current="page">Temple Donations</li>
            </ol>
        </nav>
    </div>
</section>

<section class="bg-pn-cream py-5">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-12 col-lg-8">
                <span class="small text-pn-gold fw-semibold text-uppercase">Temple Seva</span>
                <h1 class="font-serif display-5 text-pn-brown mt-2 mb-3">Temple Donations</h1>
                <p class="lead text-secondary mb-0">
                    Support temple activities, rituals and community services.
                </p>
            </div>
        </div>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8">
                <div class="card border-0 shadow-sm rounded-4">
                    <div class="card-body p-4 p-md-5 text-center">
                        <div class="rounded-circle bg-pn-cream text-pn-primary d-inline-flex align-items-center justify-content-center mb-4"
                             style="width:72px;height:72px;">
                            <i class="bi bi-heart fs-2"></i>
                        </div>
                        <h2 class="font-serif h3 text-pn-brown">Support a Temple</h2>
                        <p class="text-secondary mb-4">
                            Temple-specific donation options will be displayed here once donation
                            campaigns and temple records are connected to the frontend.
                        </p>
                        <a href="{{ route('donation.index') }}" class="btn btn-pn px-4">
                            Explore Donations
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
