@extends('layouts.app')

@section('title', 'HTML Sitemap | Pooja Nilayam')
@section('meta_description', 'Explore the main pages and services available on Pooja Nilayam.')

@section('content')
<div class="bg-pn-cream py-3">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 small">
                <li class="breadcrumb-item">
                    <a href="{{ route('home') }}" class="text-pn-primary">Home</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Sitemap</li>
            </ol>
        </nav>
    </div>
</div>

<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <span class="pn-section-label">Explore Pooja Nilayam</span>
            <h1 class="display-6 fw-bold mt-2 mb-3">HTML Sitemap</h1>
            <p class="text-muted mx-auto mb-0" style="max-width: 760px;">
                Quickly find the main pages, spiritual services, shopping and support
                sections available across Pooja Nilayam.
            </p>
        </div>

        <div class="row g-4">

            <div class="col-md-6 col-lg-4">
                <div class="card h-100 border-0 shadow-sm rounded-4">
                    <div class="card-body p-4">
                        <h2 class="h5 fw-bold mb-3">
                            <i class="bi bi-house-door-fill text-pn-primary me-2"></i>Main Pages
                        </h2>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-2"><a href="{{ route('home') }}" class="text-pn-brown">Home</a></li>
                            <li class="mb-2"><a href="{{ route('search') }}" class="text-pn-brown">Search</a></li>
                            <li class="mb-2"><a href="{{ route('about') }}" class="text-pn-brown">About Us</a></li>
                            <li class="mb-2"><a href="{{ route('faq') }}" class="text-pn-brown">FAQs</a></li>
                            <li class="mb-2"><a href="{{ route('testimonials') }}" class="text-pn-brown">Testimonials</a></li>
                            <li><a href="{{ route('contact') }}" class="text-pn-brown">Contact Us</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="card h-100 border-0 shadow-sm rounded-4">
                    <div class="card-body p-4">
                        <h2 class="h5 fw-bold mb-3">
                            <i class="bi bi-flower1 text-pn-primary me-2"></i>Poojas & Festivals
                        </h2>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-2"><a href="{{ route('pooja.index') }}" class="text-pn-brown">All Poojas</a></li>
                            <li class="mb-2"><a href="{{ route('pooja.categories') }}" class="text-pn-brown">Pooja Categories</a></li>
                            <li class="mb-2"><a href="{{ route('festival.index') }}" class="text-pn-brown">Festivals</a></li>
                            <li class="mb-2"><a href="{{ route('festival.calendar') }}" class="text-pn-brown">Festival Calendar</a></li>
                            <li><a href="{{ route('digital-pooja.index') }}" class="text-pn-brown">Digital Pooja</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="card h-100 border-0 shadow-sm rounded-4">
                    <div class="card-body p-4">
                        <h2 class="h5 fw-bold mb-3">
                            <i class="bi bi-building text-pn-primary me-2"></i>Temples & Priests
                        </h2>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-2"><a href="{{ route('temple.index') }}" class="text-pn-brown">Temples</a></li>
                            <li class="mb-2"><a href="{{ route('priest.index') }}" class="text-pn-brown">Priests</a></li>
                            <li class="mb-2"><a href="{{ route('temple.show', ['slug' => 'sri-venkateswara-temple']) }}" class="text-pn-brown">Temple Details</a></li>
                            <li><a href="{{ route('priest.show', ['slug' => 'sri-anantha-sharma']) }}" class="text-pn-brown">Priest Profile</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="card h-100 border-0 shadow-sm rounded-4">
                    <div class="card-body p-4">
                        <h2 class="h5 fw-bold mb-3">
                            <i class="bi bi-stars text-pn-primary me-2"></i>Astrology
                        </h2>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-2"><a href="{{ route('astrology.index') }}" class="text-pn-brown">Astrology Services</a></li>
                            <li class="mb-2"><a href="{{ route('astrology.horoscope') }}" class="text-pn-brown">Horoscope</a></li>
                            <li class="mb-2"><a href="{{ route('astrology.kundli') }}" class="text-pn-brown">Kundli</a></li>
                            <li class="mb-2"><a href="{{ route('astrology.match-making') }}" class="text-pn-brown">Match Making</a></li>
                            <li class="mb-2"><a href="{{ route('astrology.numerology') }}" class="text-pn-brown">Numerology</a></li>
                            <li class="mb-2"><a href="{{ route('astrology.palm-reading') }}" class="text-pn-brown">Palm Reading</a></li>
                            <li><a href="{{ route('astrology.vastu') }}" class="text-pn-brown">Vastu Consultation</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="card h-100 border-0 shadow-sm rounded-4">
                    <div class="card-body p-4">
                        <h2 class="h5 fw-bold mb-3">
                            <i class="bi bi-bag-heart-fill text-pn-primary me-2"></i>Store
                        </h2>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-2"><a href="{{ route('store.index') }}" class="text-pn-brown">Store</a></li>
                            <li class="mb-2"><a href="{{ route('store.products') }}" class="text-pn-brown">Products</a></li>
                            <li class="mb-2"><a href="{{ route('store.cart') }}" class="text-pn-brown">Shopping Cart</a></li>
                            <li class="mb-2"><a href="{{ route('store.wishlist') }}" class="text-pn-brown">Wishlist</a></li>
                            <li><a href="{{ route('store.checkout') }}" class="text-pn-brown">Checkout</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="card h-100 border-0 shadow-sm rounded-4">
                    <div class="card-body p-4">
                        <h2 class="h5 fw-bold mb-3">
                            <i class="bi bi-heart-fill text-pn-primary me-2"></i>Donations & Support
                        </h2>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-2"><a href="{{ route('donation.index') }}" class="text-pn-brown">Donations</a></li>
                            <li class="mb-2"><a href="{{ route('donation.donate') }}" class="text-pn-brown">Donate Now</a></li>
                            <li class="mb-2"><a href="{{ route('support.help-center') }}" class="text-pn-brown">Help Center</a></li>
                            <li class="mb-2"><a href="{{ route('support.contact') }}" class="text-pn-brown">Contact Support</a></li>
                            <li><a href="{{ route('support.feedback') }}" class="text-pn-brown">Feedback</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="card h-100 border-0 shadow-sm rounded-4">
                    <div class="card-body p-4">
                        <h2 class="h5 fw-bold mb-3">
                            <i class="bi bi-person-circle text-pn-primary me-2"></i>My Account
                        </h2>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-2"><a href="{{ route('auth.login') }}" class="text-pn-brown">Login</a></li>
                            <li class="mb-2"><a href="{{ route('auth.register') }}" class="text-pn-brown">Register</a></li>
                            <li class="mb-2"><a href="{{ route('dashboard.index') }}" class="text-pn-brown">Dashboard</a></li>
                            <li class="mb-2"><a href="{{ route('dashboard.bookings') }}" class="text-pn-brown">My Bookings</a></li>
                            <li class="mb-2"><a href="{{ route('dashboard.orders') }}" class="text-pn-brown">My Orders</a></li>
                            <li><a href="{{ route('dashboard.notifications') }}" class="text-pn-brown">Notifications</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="card h-100 border-0 shadow-sm rounded-4">
                    <div class="card-body p-4">
                        <h2 class="h5 fw-bold mb-3">
                            <i class="bi bi-shield-check text-pn-primary me-2"></i>Policies
                        </h2>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-2"><a href="{{ route('privacy') }}" class="text-pn-brown">Privacy Policy</a></li>
                            <li class="mb-2"><a href="{{ route('terms') }}" class="text-pn-brown">Terms & Conditions</a></li>
                            <li class="mb-2"><a href="{{ route('refund') }}" class="text-pn-brown">Refund Policy</a></li>
                            <li class="mb-2"><a href="{{ route('shipping') }}" class="text-pn-brown">Shipping Policy</a></li>
                            <li><a href="{{ route('disclaimer') }}" class="text-pn-brown">Disclaimer</a></li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>

        <div class="text-center mt-5">
            <a href="{{ route('home') }}" class="btn btn-pn px-4">
                <i class="bi bi-house-door me-2"></i>Back to Home
            </a>
        </div>
    </div>
</section>
@endsection
