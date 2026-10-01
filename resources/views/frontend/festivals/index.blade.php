@extends('layouts.app')

@section('title', 'Festivals | Pooja Nilayam')
@section('meta_description', 'Explore upcoming Hindu festivals, their significance, and sacred pooja services with Pooja Nilayam.')

@section('content')
<section class="bg-pn-cream border-bottom">
    <div class="container py-3"><nav aria-label="breadcrumb"><ol class="breadcrumb mb-0 small">
        <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-pn-primary">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Festivals</li>
    </ol></nav></div>
</section>

<section class="py-5 bg-white">
    <div class="container"><div class="row align-items-center g-4">
        <div class="col-12 col-lg-8">
            <span class="pn-section-label text-uppercase text-pn-gold fw-semibold small">Sacred Calendar</span>
            <h1 class="display-5 font-serif text-pn-brown mt-2 mb-3">Festivals & Sacred Occasions</h1>
            <div class="pn-divider mb-3"></div>
            <p class="text-secondary mb-0 col-lg-10">Discover important festivals and auspicious occasions throughout the year. Explore their significance and find suitable pooja services for your family.</p>
        </div>
        <div class="col-12 col-lg-4"><div class="bg-pn-cream rounded-4 p-4 text-center">
            <i class="bi bi-calendar-heart display-4 text-pn-primary"></i>
            <h2 class="h5 font-serif text-pn-brown mt-3">Plan Your Devotion</h2>
            <p class="small text-secondary mb-3">View upcoming festivals and plan your sacred observances in advance.</p>
            <a href="{{ route('festival.calendar') }}" class="btn btn-pn btn-sm">View Festival Calendar</a>
        </div></div>
    </div></div>
</section>

<section class="py-5 bg-pn-cream">
    <div class="container">
        <div class="text-center mb-5">
            <span class="pn-section-label text-uppercase text-pn-gold fw-semibold small">Upcoming</span>
            <h2 class="font-serif display-6 text-pn-brown mt-2">Upcoming Festivals</h2>
            <div class="pn-divider mx-auto my-3"></div>
            <p class="text-secondary mb-0 mx-auto col-lg-7">Keep track of upcoming sacred occasions and discover meaningful ways to celebrate them with your family.</p>
        </div>

        <div class="row g-4">
            @forelse($festivals as $festival)
                @php
                    $date = $festival->start_date ?: $festival->end_date;
                @endphp
                <div class="col-12 col-md-6 col-lg-4">
                    <article class="card h-100 border-0 rounded-4 shadow-sm overflow-hidden">
                        <div class="bg-white p-4"><div class="d-flex align-items-center gap-3">
                            <div class="bg-pn-cream rounded-3 text-center p-2 flex-shrink-0" style="min-width:68px;">
                                <span class="d-block small fw-semibold text-pn-primary">{{ $date?->format('M') ?: '—' }}</span>
                                <strong class="d-block fs-4 font-serif text-pn-brown lh-1">{{ $date?->format('d') ?: '—' }}</strong>
                            </div>
                            <div>
                                <span class="small text-secondary">{{ $date?->format('d M Y') ?: 'Date to be announced' }}</span>
                                <h3 class="h5 font-serif text-pn-brown mb-0 mt-1">{{ $festival->name }}</h3>
                            </div>
                        </div></div>
                        <div class="card-body p-4 d-flex flex-column">
                            <div class="mb-3"><div class="rounded-circle bg-pn-cream d-inline-flex align-items-center justify-content-center" style="width:58px;height:58px;">
                                <i class="bi bi-flower1 fs-4 text-pn-primary"></i>
                            </div></div>
                            <p class="text-secondary small mb-4">{{ $festival->short_description ?: $festival->description ?: 'Festival details will be updated soon.' }}</p>
                            <div class="mt-auto"><a href="{{ route('festival.show', ['slug' => $festival->slug]) }}" class="btn btn-pn-outline btn-sm w-100">View Festival Details <i class="bi bi-arrow-right ms-2"></i></a></div>
                        </div>
                    </article>
                </div>
            @empty
                <div class="col-12"><div class="card border-0 rounded-4 shadow-sm"><div class="card-body p-5 text-center">
                    <i class="bi bi-calendar-x display-5 text-pn-primary"></i>
                    <h3 class="h5 font-serif text-pn-brown mt-3">No upcoming festivals are currently listed</h3>
                    <p class="text-secondary mb-0">Please check the festival calendar again later.</p>
                </div></div></div>
            @endforelse
        </div>
    </div>
</section>

<section class="py-5 bg-white"><div class="container"><div class="bg-pn-brown text-white rounded-4 p-4 p-lg-5"><div class="row align-items-center g-4">
    <div class="col-12 col-lg"><span class="small text-uppercase text-warning fw-semibold">Plan Ahead</span><h2 class="font-serif mt-2 mb-2">Explore the complete festival calendar</h2><p class="text-white-50 mb-0">Find festivals by month and plan your poojas and devotional occasions.</p></div>
    <div class="col-12 col-lg-auto"><a href="{{ route('festival.calendar') }}" class="btn btn-warning">Open Festival Calendar <i class="bi bi-calendar3 ms-2"></i></a></div>
</div></div></div></section>
@endsection
