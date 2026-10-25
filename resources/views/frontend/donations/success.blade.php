@extends('layouts.app')

@section('title', 'Donation Request | Pooja Nilayam')
@section('meta_description', 'View your donation request reference and pending status.')

@section('content')
<section class="bg-pn-cream border-bottom">
    <div class="container py-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-pn-primary">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('donation.index') }}" class="text-pn-primary">Donations</a></li>
                <li class="breadcrumb-item active" aria-current="page">Request confirmation</li>
            </ol>
        </nav>
    </div>
</section>

<section class="bg-pn-cream py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8 text-center">
                <div class="rounded-circle bg-warning-subtle text-warning-emphasis d-flex align-items-center justify-content-center mx-auto mb-4" style="width:88px;height:88px">
                    <i class="bi bi-hourglass-split display-5"></i>
                </div>
                <span class="small text-pn-gold fw-semibold text-uppercase">Request recorded</span>
                <h1 class="font-serif display-5 text-pn-brown mt-2 mb-3">Thank you for your intention to donate.</h1>
                <p class="lead text-secondary">Your donation request has been saved. <strong>No payment has been processed</strong> because the payment gateway is not enabled yet.</p>
                <div class="d-inline-flex flex-column flex-sm-row align-items-center gap-2 gap-sm-3 bg-white border border-warning-subtle rounded-4 px-4 py-3 mt-3">
                    <span class="small text-secondary">Reference</span>
                    <strong class="text-pn-primary">{{ $donation->reference_id }}</strong>
                    <span class="badge rounded-pill bg-warning-subtle text-warning-emphasis">Pending</span>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8">
                <div class="card border border-warning-subtle rounded-5">
                    <div class="card-body p-4 p-md-5">
                        <h2 class="font-serif h3 text-pn-brown mb-4">Donation request details</h2>
                        <div class="row g-3">
                            <div class="col-sm-6">
                                <small class="text-secondary d-block mb-1">Donor</small>
                                <strong>{{ $donation->is_anonymous ? 'Anonymous donor' : $donation->donor_name }}</strong>
                            </div>
                            <div class="col-sm-6">
                                <small class="text-secondary d-block mb-1">Amount requested</small>
                                <strong class="text-pn-primary">₹{{ number_format((float) $donation->amount, 2) }}</strong>
                            </div>
                            <div class="col-sm-6">
                                <small class="text-secondary d-block mb-1">Donation purpose</small>
                                <strong>{{ $donation->donationType?->name ?? $donation->purpose ?? 'Donation' }}</strong>
                            </div>
                            @if($donation->donationCampaign)
                                <div class="col-12">
                                    <small class="text-secondary d-block mb-1">Campaign</small>
                                    <strong>{{ $donation->donationCampaign->name }}</strong>
                                </div>
                            @endif
                            <div class="col-sm-6">
                                <small class="text-secondary d-block mb-1">Request date</small>
                                <strong>{{ $donation->created_at?->format('d M Y, h:i A') }}</strong>
                            </div>
                            <div class="col-sm-6">
                                <small class="text-secondary d-block mb-1">Status</small>
                                <strong class="text-warning-emphasis">{{ ucfirst($donation->status) }}</strong>
                            </div>
                        </div>
                        <div class="alert alert-info mt-4 mb-0" role="status">
                            This is not a payment confirmation or tax receipt. A receipt should only be issued after a future payment integration confirms successful payment.
                        </div>
                        <div class="d-flex flex-column flex-sm-row gap-2 mt-4">
                            <a href="{{ route('donation.index') }}" class="btn btn-pn">Back to Donations</a>
                            <a href="{{ route('home') }}" class="btn btn-pn-outline">Return Home</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
