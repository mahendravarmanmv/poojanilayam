@extends('layouts.app')

@section('title', $campaign->name . ' | Donations | Pooja Go')
@section('meta_description', $campaign->short_description ?: 'Support this cause through Pooja Go.')

@section('content')
<section class="bg-pn-cream border-bottom">
    <div class="container py-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-pn-primary">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('donation.index') }}" class="text-pn-primary">Donations</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $campaign->name }}</li>
            </ol>
        </nav>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="row g-4 g-xl-5 align-items-start">
            <div class="col-lg-7">
                <div class="card border border-warning-subtle rounded-5 h-100">
                    <div class="card-body p-4 p-lg-5">
                        <span class="badge rounded-pill bg-pn-cream text-pn-primary mb-3">
                            {{ $campaign->donationType?->name ?? 'Donation' }}
                        </span>
                        <h1 class="font-serif display-6 text-pn-brown">{{ $campaign->name }}</h1>
                        @if($campaign->temple)
                            <p class="text-secondary"><i class="bi bi-bank2 me-2"></i>{{ $campaign->temple->name }}</p>
                        @endif
                        @if($campaign->short_description)
                            <p class="lead text-secondary">{{ $campaign->short_description }}</p>
                        @endif
                        <div class="text-secondary">
                            {!! nl2br(e($campaign->description ?: 'Your contribution supports this cause and its ongoing work.')) !!}
                        </div>
                        @if($campaign->target_amount)
                            <div class="border border-warning-subtle rounded-4 bg-pn-cream p-3 mt-4">
                                <small class="text-secondary d-block">Campaign target</small>
                                <strong class="fs-4 text-pn-primary">₹{{ number_format((float) $campaign->target_amount, 2) }}</strong>
                                <small class="text-secondary d-block mt-1">Collected amount shown: ₹{{ number_format((float) $campaign->collected_amount, 2) }}</small>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="card border border-warning-subtle rounded-5 shadow-sm">
                    <div class="card-body p-4 p-lg-5">
                        <span class="small text-pn-gold fw-semibold text-uppercase">Your contribution</span>
                        <h2 class="font-serif h3 text-pn-brown mt-2">Make a donation request</h2>
                        <p class="text-secondary">Select an amount on the next screen and provide your details.</p>
                        <div class="d-flex flex-wrap gap-2 mb-4">
                            @foreach($suggestedAmounts as $amount)
                                <span class="badge rounded-pill bg-pn-cream text-pn-brown px-3 py-2">₹{{ number_format($amount) }}</span>
                            @endforeach
                        </div>
                        <a href="{{ route('donation.donate', ['campaign' => $campaign->slug]) }}" class="btn btn-pn btn-lg w-100">
                            Continue to donor details <i class="bi bi-arrow-right ms-2"></i>
                        </a>
                        <p class="small text-secondary mt-3 mb-0"><i class="bi bi-info-circle me-1"></i>Payment processing is not enabled. Submitting the form records a pending donation request only.</p>
                    </div>
                </div>
                <a href="{{ route('donation.index') }}" class="d-inline-block mt-3 text-pn-primary"><i class="bi bi-arrow-left me-1"></i>Back to all donations</a>
            </div>
        </div>
    </div>
</section>
@endsection
