@extends('layouts.app')

@section('title', 'Notification Details | Pooja Nilayam')
@section('meta_description', 'View your Pooja Nilayam notification details and important updates.')

@section('content')
<div class="bg-pn-cream py-3">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 small">
                <li class="breadcrumb-item">
                    <a href="{{ route('home') }}" class="text-pn-primary">Home</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('dashboard.notifications') }}" class="text-pn-primary">Notifications</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Notification Details</li>
            </ol>
        </nav>
    </div>
</div>

<section class="py-5">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm rounded-4">
                    <div class="card-body p-4 p-lg-5">
                        <div class="d-flex align-items-start gap-3 mb-4">
                            <div class="icon-circle-58 bg-pn-cream text-pn-primary flex-shrink-0">
                                <i class="bi bi-bell-fill fs-4"></i>
                            </div>
                            <div class="flex-grow-1">
                                <span class="badge rounded-pill bg-pn-cream text-pn-primary mb-2">
                                    Booking Update
                                </span>
                                <h1 class="h3 fw-bold mb-2">Your Pooja Booking is Confirmed</h1>
                                <p class="text-muted small mb-0">13 September 2026, 10:30 AM</p>
                            </div>
                        </div>

                        <hr class="my-4">

                        <p class="mb-3">
                            Your booking has been successfully confirmed. We have reserved your
                            selected pooja and schedule.
                        </p>

                        <div class="bg-pn-cream rounded-4 p-4 mb-4">
                            <div class="row g-3">
                                <div class="col-sm-6">
                                    <div class="small text-muted mb-1">Booking ID</div>
                                    <div class="fw-semibold">PNB-2026-00128</div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="small text-muted mb-1">Pooja</div>
                                    <div class="fw-semibold">Ganapathi Homam</div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="small text-muted mb-1">Date</div>
                                    <div class="fw-semibold">20 September 2026</div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="small text-muted mb-1">Time</div>
                                    <div class="fw-semibold">9:00 AM</div>
                                </div>
                            </div>
                        </div>

                        <h2 class="h5 fw-bold mb-3">Important Information</h2>
                        <ul class="mb-4 ps-3">
                            <li class="mb-2">Please be available a few minutes before the scheduled time.</li>
                            <li class="mb-2">Keep your booking details available for reference.</li>
                            <li>If you need assistance, please contact our support team.</li>
                        </ul>

                        <div class="d-flex flex-column flex-sm-row gap-2">
                            <a href="{{ route('pooja.booking.success', ['slug' => 'ganapathi-homam']) }}"
                               class="btn btn-pn">
                                <i class="bi bi-calendar-check me-2"></i>View Booking
                            </a>
                            <a href="{{ route('support.help-center') }}" class="btn btn-pn-outline">
                                <i class="bi bi-question-circle me-2"></i>Get Help
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card border-0 shadow-sm rounded-4 mb-4">
                    <div class="card-body p-4">
                        <h2 class="h5 fw-bold mb-3">Notification</h2>
                        <div class="d-flex align-items-center gap-3">
                            <div class="icon-circle-58 bg-pn-cream text-pn-primary">
                                <i class="bi bi-check2-circle fs-4"></i>
                            </div>
                            <div>
                                <div class="fw-semibold">Read</div>
                                <div class="small text-muted">Booking confirmation</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card border-0 shadow-sm rounded-4">
                    <div class="card-body p-4">
                        <h2 class="h5 fw-bold mb-3">Need Assistance?</h2>
                        <p class="text-muted small mb-3">
                            Our support team is available to help with your bookings and other services.
                        </p>
                        <a href="{{ route('support.help-center') }}" class="btn btn-pn-outline w-100">
                            Help Center
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
