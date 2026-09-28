@extends('layouts.app')

@section('title', 'Register | Pooja Nilayam')

@section('content')
<section class="bg-pn-cream py-5">
    <div class="container py-lg-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-9 col-lg-6">
                <div class="text-center mb-4">
                    <span class="small text-pn-gold fw-semibold text-uppercase pn-section-label">Join Pooja Nilayam</span>
                    <h1 class="font-serif display-5 text-pn-brown mt-2 mb-2">Create your account</h1>
                    <p class="text-secondary mb-0">Register once and manage your poojas, orders and spiritual activities.</p>
                </div>

                @include('frontend.auth._messages')

                <div class="card border-0 shadow-sm rounded-4">
                    <div class="card-body p-4 p-md-5">
                        <form method="POST" action="{{ route('auth.register.store') }}">
                            @csrf

                            <div class="mb-3">
                                <label for="name" class="form-label fw-semibold text-pn-brown">Full Name <span class="text-danger">*</span></label>
                                <input type="text" id="name" name="name" value="{{ old('name') }}" class="form-control form-control-lg" autocomplete="name" required>
                            </div>

                            <div class="row g-3">
                                <div class="col-12 col-md-6">
                                    <label for="email" class="form-label fw-semibold text-pn-brown">Email</label>
                                    <input type="email" id="email" name="email" value="{{ old('email') }}" class="form-control form-control-lg" autocomplete="email">
                                </div>
                                <div class="col-12 col-md-6">
                                    <label for="mobile" class="form-label fw-semibold text-pn-brown">Mobile</label>
                                    <input type="tel" id="mobile" name="mobile" value="{{ old('mobile') }}" class="form-control form-control-lg" inputmode="numeric" maxlength="10" autocomplete="tel">
                                </div>
                            </div>

                            <div class="form-text mb-3">Provide at least one of email or mobile.</div>

                            <div class="row g-3 mb-4">
                                <div class="col-12 col-md-6">
                                    <label for="password" class="form-label fw-semibold text-pn-brown">Password <span class="text-danger">*</span></label>
                                    <input type="password" id="password" name="password" class="form-control form-control-lg" autocomplete="new-password" minlength="8" required>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label for="password_confirmation" class="form-label fw-semibold text-pn-brown">Confirm Password <span class="text-danger">*</span></label>
                                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control form-control-lg" autocomplete="new-password" minlength="8" required>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-pn btn-lg w-100">Create Account</button>
                        </form>

                        <div class="text-center mt-4 small text-secondary">
                            Already registered?
                            <a href="{{ route('auth.login') }}" class="text-pn-primary fw-semibold">Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
