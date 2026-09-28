@extends('layouts.app')

@section('title', 'Forgot Password | Pooja Nilayam')

@section('content')
<section class="bg-pn-cream py-5">
    <div class="container py-lg-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-7 col-lg-5">
                <div class="text-center mb-4">
                    <span class="small text-pn-gold fw-semibold text-uppercase pn-section-label">Account Recovery</span>
                    <h1 class="font-serif display-5 text-pn-brown mt-2 mb-2">Forgot password?</h1>
                    <p class="text-secondary mb-0">Enter your registered email to start the password reset process.</p>
                </div>

                @include('frontend.auth._messages')

                <div class="card border-0 shadow-sm rounded-4">
                    <div class="card-body p-4 p-md-5">
                        <form method="POST" action="{{ route('auth.forgot-password.store') }}">
                            @csrf
                            <div class="mb-4">
                                <label for="email" class="form-label fw-semibold text-pn-brown">Email</label>
                                <input type="email" id="email" name="email" value="{{ old('email') }}" class="form-control form-control-lg" autocomplete="email" required autofocus>
                            </div>
                            <button type="submit" class="btn btn-pn btn-lg w-100">Send Reset Instructions</button>
                        </form>

                        <div class="text-center mt-4 small">
                            <a href="{{ route('auth.login') }}" class="text-pn-primary">Back to Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
