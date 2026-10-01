@extends('layouts.app')
@section('title', ($festival->name ?? 'Festival Details') . ' | Pooja Nilayam')
@section('meta_description', $festival->short_description ?: 'Learn about the significance, traditions and upcoming observances associated with this sacred festival.')
@section('content')
<section class="bg-pn-cream border-bottom"><div class="container py-3"><nav aria-label="breadcrumb"><ol class="breadcrumb mb-0 small">
    <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-pn-primary">Home</a></li><li class="breadcrumb-item"><a href="{{ route('festival.index') }}" class="text-pn-primary">Festivals</a></li><li class="breadcrumb-item active">{{ $festival->name }}</li>
</ol></nav></div></section>
<section class="py-5 bg-white"><div class="container"><div class="row align-items-center g-4">
    <div class="col-12 col-lg-7"><span class="pn-section-label text-uppercase text-pn-gold fw-semibold small">Sacred Festival</span><h1 class="display-5 font-serif text-pn-brown mt-2 mb-3">{{ $festival->name }}</h1><div class="pn-divider mb-3"></div><p class="text-secondary mb-4">{{ $festival->description ?: $festival->short_description ?: 'Festival details will be updated soon.' }}</p>
        @php $date = $festival->start_date ?: $festival->end_date; @endphp
        <div class="d-flex flex-wrap gap-3">@if($date)<span class="badge rounded-pill bg-pn-cream text-pn-primary px-3 py-2"><i class="bi bi-calendar-event me-1"></i>{{ $date->format('d M Y') }}</span>@endif @if($festival->end_date && $festival->end_date->ne($date))<span class="badge rounded-pill bg-pn-cream text-pn-primary px-3 py-2"><i class="bi bi-calendar-range me-1"></i>Ends {{ $festival->end_date->format('d M Y') }}</span>@endif</div>
    </div>
    <div class="col-12 col-lg-5"><div class="bg-pn-cream rounded-4 p-4 p-lg-5 text-center"><div class="rounded-circle bg-white d-inline-flex align-items-center justify-content-center" style="width:120px;height:120px;"><i class="bi bi-flower1 display-4 text-pn-primary"></i></div><h2 class="h4 font-serif text-pn-brown mt-4 mb-2">Celebrate with Devotion</h2><p class="small text-secondary mb-0">Plan a sacred observance for this auspicious occasion with your family.</p></div></div>
</div></div></section>
<section class="py-5 bg-pn-cream"><div class="container"><div class="row g-4 align-items-start">
    <div class="col-12 col-lg-7"><span class="pn-section-label text-uppercase text-pn-gold fw-semibold small">About the Festival</span><h2 class="font-serif display-6 text-pn-brown mt-2 mb-3">Significance & Traditions</h2><div class="pn-divider mb-4"></div><p class="text-secondary mb-0">{{ $festival->description ?: $festival->short_description ?: 'More information about this festival will be published soon.' }}</p></div>
    <div class="col-12 col-lg-5"><div class="card border-0 rounded-4 shadow-sm h-100"><div class="card-body p-4"><h3 class="h5 font-serif text-pn-brown mb-4">Festival Schedule</h3>
        @forelse($festival->occurrences as $occurrence)
            <div class="d-flex gap-3 {{ !$loop->last ? 'mb-3' : '' }}"><i class="bi bi-calendar-event text-pn-primary mt-1"></i><div><strong class="d-block text-pn-brown">{{ $occurrence->occurrence_date->format('d M Y') }}</strong><span class="small text-secondary">@if($occurrence->start_time){{ $occurrence->start_time ? \Illuminate\Support\Carbon::parse($occurrence->start_time)->format('g:i A') : '' }}@if($occurrence->end_time) – {{ \Illuminate\Support\Carbon::parse($occurrence->end_time)->format('g:i A') }}@endif @else Time to be announced @endif</span>@if($occurrence->location)<span class="small text-secondary d-block">{{ $occurrence->location }}</span>@endif</div></div>
        @empty
            <p class="small text-secondary mb-0">Specific festival occurrences have not been published yet.</p>
        @endforelse
    </div></div></div>
</div></div></section>
<section class="py-5 bg-white"><div class="container"><div class="text-center"><span class="pn-section-label text-uppercase text-pn-gold fw-semibold small">Festival Poojas</span><h2 class="font-serif display-6 text-pn-brown mt-2">Plan Your Festival Pooja</h2><div class="pn-divider mx-auto my-3"></div><p class="text-secondary mx-auto col-lg-7 mb-4">Festival-specific Pooja recommendations are managed through the Pooja catalogue. Explore the available services rather than displaying unverified festival-to-Pooja mappings.</p><a href="{{ route('pooja.index') }}" class="btn btn-pn">Explore Poojas <i class="bi bi-arrow-right ms-2"></i></a></div></div></section>
<section class="py-5 bg-pn-cream"><div class="container"><div class="text-center"><h2 class="font-serif text-pn-brown mb-2">Explore more sacred occasions</h2><p class="text-secondary mb-4">Return to the festival calendar or browse all festivals.</p><div class="d-flex flex-column flex-sm-row justify-content-center gap-2"><a href="{{ route('festival.calendar') }}" class="btn btn-pn">View Festival Calendar</a><a href="{{ route('festival.index') }}" class="btn btn-pn-outline">Back to Festivals</a></div></div></div></section>
@endsection
