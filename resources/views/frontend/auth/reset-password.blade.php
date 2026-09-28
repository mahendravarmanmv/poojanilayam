@extends('layouts.app')

@section('title', 'Reset Password | Pooja Nilayam')

@section('content')
<section class="bg-pn-cream py-5">
    <div class="container py-lg-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-6">
                <div class="text-center mb-4">
                    <span class="small text-pn-gold fw-semibold text-uppercase pn-section-label">Account Recovery</span>
                    <h1 class="font-serif display-5 text-pn-brown mt-2 mb-2">Set a new password</h1>
                    <p class="text-secondary mb-0">Use the reset token from your password-reset message.</p>
                </div>

                @include('frontend.auth._messages')

                <div class="card border-0 shadow-sm rounded-4">
                    <div class="card-body p-4 p-md-5">
                        <form method="POST" action="{{ route('auth.reset-password.store') }}">
                            @csrf

                            <div class="mb-3">
                                <label for="email" class="form-label fw-semibold text-pn-brown">Email</label>
                                <input type="email" id="email" name="email" value="{{ old('email', $email) }}" class="form-control form-control-lg" autocomplete="email" required>
                            </div>

                            <div class="mb-3">
                                <label for="token" class="form-label fw-semibold text-pn-brown">Reset Token</label>
                                <input type="text" id="token" name="token" value="{{ old('token') }}" class="form-control form-control-lg" autocomplete="off" required>
                            </div>

                            <div class="row g-3 mb-4">
                                <div class="col-12 col-md-6">
                                    <label for="password" class="form-label fw-semibold text-pn-brown">New Password</label>
                                    <input type="password" id="password" name="password" class="form-control form-control-lg" minlength="8" autocomplete="new-password" required>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label for="password_confirmation" class="form-label fw-semibold text-pn-brown">Confirm Password</label>
                                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control form-control-lg" minlength="8" autocomplete="new-password" required>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-pn btn-lg w-100">Reset Password</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
