@extends('layouts.app')

@section('title', 'Verify Email | Pooja Nilayam')

@section('content')
<section class="bg-pn-cream py-5">
    <div class="container py-lg-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-7 col-lg-5">
                <div class="card border-0 shadow-sm rounded-4 text-center">
                    <div class="card-body p-4 p-md-5">
                        <div class="rounded-circle bg-pn-primary text-white d-inline-flex align-items-center justify-content-center mb-4" style="width:64px;height:64px;">
                            <i class="bi bi-envelope-check fs-3"></i>
                        </div>
                        <h1 class="font-serif h2 text-pn-brown">Verify your contact</h1>
                        <p class="text-secondary">Pooja Nilayam uses OTP verification for registration. Please continue to the OTP verification page.</p>
                        <a href="{{ route('auth.otp-verification') }}" class="btn btn-pn px-4">Continue to OTP Verification</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
