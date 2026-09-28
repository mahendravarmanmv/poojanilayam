@extends('layouts.app')

@section('title', 'Login | Pooja Nilayam')

@section('content')
<section class="bg-pn-cream py-5 py-lg-6">
    <div class="container py-lg-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-5">
                <div class="text-center mb-4">
                    <span class="small text-pn-gold fw-semibold text-uppercase pn-section-label">Welcome back</span>
                    <h1 class="font-serif display-5 text-pn-brown mt-2 mb-2">Login to Pooja Nilayam</h1>
                    <p class="text-secondary mb-0">Continue your spiritual journey with us.</p>
                </div>

                @include('frontend.auth._messages')

                <div class="card border-0 shadow-sm rounded-4">
                    <div class="card-body p-4 p-md-5">
                        <form method="POST" action="{{ route('auth.login.store') }}" novalidate>
                            @csrf

                            <div class="mb-3">
                                <label for="identifier" class="form-label fw-semibold text-pn-brown">Email or Mobile</label>
                                <input type="text" id="identifier" name="identifier" value="{{ old('identifier') }}" class="form-control form-control-lg" autocomplete="username" required autofocus>
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label fw-semibold text-pn-brown">Password</label>
                                <input type="password" id="password" name="password" class="form-control form-control-lg" autocomplete="current-password" required>
                            </div>

                            <div class="d-flex align-items-center justify-content-between gap-3 mb-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" value="1" id="remember">
                                    <label class="form-check-label small" for="remember">Remember me</label>
                                </div>
                                <a href="{{ route('auth.forgot-password') }}" class="small text-pn-primary">Forgot password?</a>
                            </div>

                            <button type="submit" class="btn btn-pn btn-lg w-100">Login</button>
                        </form>

                        <div class="text-center mt-4 small text-secondary">
                            Don't have an account?
                            <a href="{{ route('auth.register') }}" class="text-pn-primary fw-semibold">Create an account</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
