@extends('layouts.app')
@section('title', 'Festival Calendar | Pooja Nilayam')
@section('meta_description', 'Browse the Pooja Nilayam festival calendar and explore important upcoming sacred occasions throughout the year.')
@section('content')
<section class="bg-pn-cream border-bottom"><div class="container py-3"><nav aria-label="breadcrumb"><ol class="breadcrumb mb-0 small">
    <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-pn-primary">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('festival.index') }}" class="text-pn-primary">Festivals</a></li>
    <li class="breadcrumb-item active">Calendar</li>
</ol></nav></div></section>
<section class="py-5 bg-white"><div class="container"><div class="row align-items-center g-4">
    <div class="col-12 col-lg-8"><span class="pn-section-label text-uppercase text-pn-gold fw-semibold small">Sacred Calendar</span><h1 class="display-5 font-serif text-pn-brown mt-2 mb-3">Festival Calendar</h1><div class="pn-divider mb-3"></div><p class="text-secondary mb-0 col-lg-10">Keep track of important festivals and sacred occasions throughout the year. Use the calendar to plan your family poojas and devotional celebrations.</p></div>
    <div class="col-12 col-lg-4"><div class="bg-pn-cream rounded-4 p-4 text-center"><i class="bi bi-calendar3 display-4 text-pn-primary"></i><h2 class="h5 font-serif text-pn-brown mt-3">Plan Ahead</h2><p class="small text-secondary mb-0">Mark important occasions and prepare your pooja plans in advance.</p></div></div>
</div></div></section>
<section class="py-4 bg-pn-cream border-top border-bottom"><div class="container"><div class="card border-0 shadow-sm rounded-4"><div class="card-body p-3 p-lg-4"><div class="d-flex align-items-center justify-content-center gap-4">
    <a href="{{ route('festival.calendar', ['year' => $calendarYear - 1]) }}" class="btn btn-light border" aria-label="Previous year"><i class="bi bi-chevron-left"></i></a>
    <div class="text-center"><span class="small text-secondary d-block">Festival Year</span><strong class="fs-5 text-pn-brown">{{ $calendarYear }}</strong></div>
    <a href="{{ route('festival.calendar', ['year' => $calendarYear + 1]) }}" class="btn btn-light border" aria-label="Next year"><i class="bi bi-chevron-right"></i></a>
</div></div></div></div></section>
<section class="py-5 bg-white"><div class="container">
    <div class="text-center mb-5"><span class="pn-section-label text-uppercase text-pn-gold fw-semibold small">{{ $calendarYear }}</span><h2 class="font-serif display-6 text-pn-brown mt-2">Upcoming Sacred Occasions</h2><div class="pn-divider mx-auto my-3"></div><p class="text-secondary mb-0 mx-auto col-lg-7">Explore the festivals currently listed in the devotional calendar.</p></div>
    <div class="row g-4">
        @forelse($months as $month)
            <div class="col-12 col-lg-4"><div class="card h-100 border-0 rounded-4 shadow-sm overflow-hidden"><div class="bg-pn-cream px-4 py-3 border-bottom"><h3 class="h5 font-serif text-pn-brown mb-0">{{ $month['month'] }}</h3></div><div class="card-body p-0">
                @foreach($month['festivals'] as $festival)
                    <div class="p-4 {{ !$loop->last ? 'border-bottom' : '' }}"><div class="d-flex gap-3"><div class="bg-pn-cream rounded-3 text-center px-2 py-2 flex-shrink-0" style="min-width:68px;"><span class="small fw-semibold text-pn-primary">{{ $festival['date'] }}</span></div><div><h4 class="h6 font-serif text-pn-brown mb-1"><a href="{{ route('festival.show', ['slug' => $festival['slug']]) }}" class="text-pn-brown text-decoration-none">{{ $festival['name'] }}</a></h4><p class="small text-secondary mb-0">{{ $festival['description'] ?: 'Festival details will be updated soon.' }}</p></div></div></div>
                @endforeach
            </div></div></div>
        @empty
            <div class="col-12"><div class="card border-0 rounded-4 shadow-sm"><div class="card-body p-5 text-center"><i class="bi bi-calendar-x display-5 text-pn-primary"></i><h3 class="h5 font-serif text-pn-brown mt-3">No festivals are currently listed for {{ $calendarYear }}</h3><p class="text-secondary mb-0">Please check another year or return to the festival list.</p></div></div></div>
        @endforelse
    </div>
</div></section>
<section class="py-5 bg-pn-cream"><div class="container"><div class="text-center"><h2 class="font-serif text-pn-brown mb-2">Celebrate every sacred occasion</h2><p class="text-secondary mb-4">Explore festival-specific poojas and plan your devotional services.</p><div class="d-flex flex-column flex-sm-row justify-content-center gap-2"><a href="{{ route('pooja.index') }}" class="btn btn-pn">Explore Poojas <i class="bi bi-arrow-right ms-2"></i></a><a href="{{ route('festival.index') }}" class="btn btn-pn-outline">Back to Festivals</a></div></div></div></section>
@endsection
