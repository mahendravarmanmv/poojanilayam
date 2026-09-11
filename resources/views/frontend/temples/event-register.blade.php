@extends('layouts.app')

@section('title', 'Event Registration | Pooja Nilayam')

@section(
    'meta_description',
    'Register for a sacred temple event with Pooja Nilayam.'
)

@section('content')

{{-- ============================================================
     BREADCRUMB
============================================================ --}}
<section class="bg-pn-cream border-bottom">
    <div class="container py-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 small">
                <li class="breadcrumb-item">
                    <a href="{{ route('home') }}" class="text-pn-primary">Home</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('temple.index') }}" class="text-pn-primary">Temples</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('temple.events', ['slug' => 'sri-venkateswara-temple']) }}"
                       class="text-pn-primary">
                        Temple Events
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    Event Registration
                </li>
            </ol>
        </nav>
    </div>
</section>


{{-- ============================================================
     PAGE INTRO
============================================================ --}}
<section class="py-5">
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-12 col-lg-9 text-center">

                <span class="pn-section-label text-uppercase text-pn-gold small fw-semibold">
                    Temple Event
                </span>

                <h1 class="font-serif display-5 text-pn-brown mt-2 mb-3">
                    Event Registration
                </h1>

                <div class="pn-divider mx-auto mb-3"></div>

                <p class="text-secondary mb-0">
                    Reserve your participation for this sacred temple gathering.
                    Please provide the details below to complete your registration.
                </p>

            </div>
        </div>

    </div>
</section>


{{-- ============================================================
     REGISTRATION
============================================================ --}}
<section class="pb-5">
    <div class="container">

        <div class="row g-4 g-lg-5 justify-content-center">

            {{-- Event Summary --}}
            <div class="col-12 col-lg-4">

                <div class="card border-0 shadow-sm rounded-4 overflow-hidden h-100">

                    <div class="bg-pn-brown text-white p-4">
                        <span class="small text-white-50">
                            You are registering for
                        </span>

                        <h2 class="font-serif h3 mt-2 mb-0">
                            Ganesh Chaturthi Celebration
                        </h2>
                    </div>

                    <div class="card-body p-4">

                        <div class="d-flex gap-3 mb-4">
                            <div class="icon-circle-58 rounded-circle bg-pn-cream d-flex align-items-center justify-content-center">
                                <i class="bi bi-calendar-event fs-4 text-pn-primary"></i>
                            </div>

                            <div>
                                <div class="small text-secondary">
                                    Date
                                </div>
                                <div class="fw-semibold text-pn-brown">
                                    27 August 2026
                                </div>
                            </div>
                        </div>

                        <div class="d-flex gap-3 mb-4">
                            <div class="icon-circle-58 rounded-circle bg-pn-cream d-flex align-items-center justify-content-center">
                                <i class="bi bi-clock fs-4 text-pn-primary"></i>
                            </div>

                            <div>
                                <div class="small text-secondary">
                                    Time
                                </div>
                                <div class="fw-semibold text-pn-brown">
                                    6:00 PM – 8:00 PM
                                </div>
                            </div>
                        </div>

                        <div class="d-flex gap-3">
                            <div class="icon-circle-58 rounded-circle bg-pn-cream d-flex align-items-center justify-content-center">
                                <i class="bi bi-bank fs-4 text-pn-primary"></i>
                            </div>

                            <div>
                                <div class="small text-secondary">
                                    Temple
                                </div>
                                <div class="fw-semibold text-pn-brown">
                                    Sri Venkateswara Temple
                                </div>
                            </div>
                        </div>

                        <hr class="my-4">

                        <p class="small text-secondary mb-0">
                            Registration helps the temple prepare for devotees
                            attending the event.
                        </p>

                    </div>

                </div>

            </div>


            {{-- Registration Form --}}
            <div class="col-12 col-lg-7">

                <div class="card border-0 shadow-sm rounded-4">

                    <div class="card-body p-4 p-md-5">

                        <div class="mb-4">
                            <span class="small text-pn-gold fw-semibold text-uppercase">
                                Registration Details
                            </span>

                            <h2 class="font-serif h3 text-pn-brown mt-2 mb-1">
                                Tell us about yourself
                            </h2>

                            <p class="small text-secondary mb-0">
                                Fields marked with <span class="text-danger">*</span> are required.
                            </p>
                        </div>

                        {{-- UI-only form --}}
                        <form action="#" method="post">

                            <div class="row g-4">

                                <div class="col-12 col-md-6">
                                    <label for="name" class="form-label fw-semibold">
                                        Full Name <span class="text-danger">*</span>
                                    </label>

                                    <input
                                        type="text"
                                        class="form-control form-control-lg rounded-3"
                                        id="name"
                                        name="name"
                                        placeholder="Enter your full name"
                                    >
                                </div>

                                <div class="col-12 col-md-6">
                                    <label for="phone" class="form-label fw-semibold">
                                        Phone Number <span class="text-danger">*</span>
                                    </label>

                                    <input
                                        type="tel"
                                        class="form-control form-control-lg rounded-3"
                                        id="phone"
                                        name="phone"
                                        placeholder="Enter your phone number"
                                    >
                                </div>

                                <div class="col-12 col-md-6">
                                    <label for="email" class="form-label fw-semibold">
                                        Email Address <span class="text-danger">*</span>
                                    </label>

                                    <input
                                        type="email"
                                        class="form-control form-control-lg rounded-3"
                                        id="email"
                                        name="email"
                                        placeholder="you@example.com"
                                    >
                                </div>

                                <div class="col-12 col-md-6">
                                    <label for="attendees" class="form-label fw-semibold">
                                        Number of Attendees <span class="text-danger">*</span>
                                    </label>

                                    <select
                                        class="form-select form-select-lg rounded-3"
                                        id="attendees"
                                        name="attendees"
                                    >
                                        <option selected disabled>Select attendees</option>
                                        <option value="1">1 Person</option>
                                        <option value="2">2 People</option>
                                        <option value="3">3 People</option>
                                        <option value="4">4 People</option>
                                        <option value="5">5 People</option>
                                    </select>
                                </div>

                                <div class="col-12">
                                    <label for="message" class="form-label fw-semibold">
                                        Additional Message
                                        <span class="text-secondary fw-normal">(Optional)</span>
                                    </label>

                                    <textarea
                                        class="form-control rounded-3"
                                        id="message"
                                        name="message"
                                        rows="4"
                                        placeholder="Any special note or requirement?"
                                    ></textarea>
                                </div>

                                <div class="col-12">

                                    <div class="form-check">
                                        <input
                                            class="form-check-input"
                                            type="checkbox"
                                            value="1"
                                            id="consent"
                                        >

                                        <label class="form-check-label small" for="consent">
                                            I confirm that the information provided is correct
                                            and agree to the event registration terms.
                                        </label>
                                    </div>

                                </div>

                                <div class="col-12 pt-2">

                                    <button
                                        type="submit"
                                        class="btn btn-pn btn-lg w-100 py-3"
                                    >
                                        Register for Event
                                        <i class="bi bi-arrow-right ms-2"></i>
                                    </button>

                                    <p class="small text-secondary text-center mt-3 mb-0">
                                        This is a frontend UI preview. Registration processing
                                        will be connected during backend implementation.
                                    </p>

                                </div>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>
</section>


{{-- ============================================================
     TRUST NOTE
============================================================ --}}
<section class="pb-5">
    <div class="container">

        <div class="bg-pn-cream rounded-4 p-4 p-md-5">

            <div class="row align-items-center g-4">

                <div class="col-12 col-md-auto text-center text-md-start">
                    <div class="icon-circle-58 rounded-circle bg-white d-inline-flex align-items-center justify-content-center">
                        <i class="bi bi-shield-check fs-4 text-pn-primary"></i>
                    </div>
                </div>

                <div class="col">

                    <h3 class="font-serif h5 text-pn-brown mb-2">
                        Your details are handled with care
                    </h3>

                    <p class="small text-secondary mb-0">
                        Your registration information is collected only to help
                        coordinate your participation in the selected temple event.
                    </p>

                </div>

            </div>

        </div>

    </div>
</section>

@endsection
