@extends('layouts.app')

@section('title', 'OTP Verification | Pooja Nilayam')

@section('content')
<section class="bg-pn-cream py-5">
    <div class="container py-lg-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-7 col-lg-5">
                <div class="text-center mb-4">
                    <span class="small text-pn-gold fw-semibold text-uppercase pn-section-label">Verification</span>
                    <h1 class="font-serif display-5 text-pn-brown mt-2 mb-2">Verify your OTP</h1>
                    <p class="text-secondary mb-0">Enter the 6-digit OTP sent to <strong>{{ $destination ?: 'your registered contact' }}</strong>.</p>
                </div>

                @include('frontend.auth._messages')

                @if (app()->environment('local') && session('dev_otp'))
                    <div class="alert alert-info border-0 shadow-sm" role="alert">
                        <div class="fw-semibold mb-1">Development OTP</div>
                        <div class="small mb-2">SMS/email delivery is not connected yet. Use this OTP for local development:</div>
                        <div class="fs-3 fw-bold text-center letter-spacing-2">{{ session('dev_otp') }}</div>
                        <div class="small text-secondary mt-2">This value is shown only when <code>APP_ENV=local</code>.</div>
                    </div>
                @endif

                <div class="card border-0 shadow-sm rounded-4">
                    <div class="card-body p-4 p-md-5">
                        <form method="POST" action="{{ route('auth.otp-verification.store') }}">
                            @csrf
                            <input type="hidden" name="destination" value="{{ $destination }}">
                            <input type="hidden" name="purpose" value="{{ $purpose }}">

                            <div class="mb-4">
                                <label for="otp" class="form-label fw-semibold text-pn-brown">6-digit OTP</label>
                                <input type="text" id="otp" name="otp" value="{{ old('otp') }}" class="form-control form-control-lg text-center letter-spacing-2" inputmode="numeric" maxlength="6" pattern="[0-9]{6}" autocomplete="one-time-code" required autofocus>
                            </div>

                            <button type="submit" class="btn btn-pn btn-lg w-100">Verify OTP</button>
                        </form>

                        <div class="text-center mt-4 small text-secondary">
                            <a href="{{ route('auth.login') }}" class="text-pn-primary">Back to Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
