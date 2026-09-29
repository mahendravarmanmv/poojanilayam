@extends('layouts.app')

@section('title', 'My Support Tickets | Pooja Nilayam')
@section('meta_description', 'View your Pooja Nilayam support tickets and their current status.')

@section('content')
<section class="bg-pn-cream border-bottom">
    <div class="container py-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-pn-primary">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('support.index') }}" class="text-pn-primary">Help Center</a></li>
                <li class="breadcrumb-item active" aria-current="page">My Tickets</li>
            </ol>
        </nav>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3 mb-4">
            <div>
                <span class="small text-pn-gold fw-semibold text-uppercase">Support</span>
                <h1 class="font-serif text-pn-brown mt-2 mb-1">My Support Tickets</h1>
                <p class="text-secondary mb-0">Track your support requests and open a ticket when you need assistance.</p>
            </div>
            <a href="{{ route('support.raise-ticket') }}" class="btn btn-pn">Raise a Ticket</a>
        </div>

        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-body p-4">
                <div class="text-center py-5">
                    <i class="bi bi-ticket-perforated fs-1 text-pn-primary"></i>
                    <h2 class="font-serif h4 text-pn-brown mt-3">No support tickets yet</h2>
                    <p class="text-secondary">If you need help with a booking or service, our support team is here for you.</p>
                    <a href="{{ route('support.raise-ticket') }}" class="btn btn-pn-outline">Raise a Ticket</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
