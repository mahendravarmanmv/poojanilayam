@extends('layouts.app')

@section('title', 'Pooja Categories | Pooja Go')
@section('meta_description', 'Explore Pooja Go categories and discover sacred poojas for devotion, festivals, prosperity, health and special occasions.')

@section('content')

<section class="py-3">
    <div class="container">

        <div class="text-center py-1">           
            <h1 class="font-serif display-5 text-pn-brown mt-2 mb-3">Explore Pooja Categories</h1>
            <div class="pn-divider mx-auto my-3"></div>           
        </div>
    </div>
</section>

<section class="py-3 border-bottom bg-white">
    <div class="container">
        <div class="pn-search mx-auto">
            <div class="input-group input-group-lg border rounded-3 shadow-sm overflow-hidden">
                <span class="input-group-text bg-white border-0 ps-3">
                    <i class="bi bi-search text-pn-primary"></i>
                </span>
                <input type="search" class="form-control border-0 shadow-none"
                       placeholder="Search pooja categories..." aria-label="Search pooja categories">
            </div>
        </div>
    </div>
</section>

<section class="py-5">
    <div class="container py-lg-3">
        

        <div class="row g-4">
            @foreach($categories as $category)
                <div class="col-12 col-sm-6 col-lg-4 col-xl-3">
                    <article class="pn-service-card card h-100 border rounded-4 bg-white">
                        <div class="card-body p-4 d-flex flex-column">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <div class="d-flex align-items-center justify-content-center rounded-circle bg-pn-cream text-pn-primary"
                                     style="width:64px;height:64px;">
                                    <i class="bi {{ $category['icon'] }} fs-3"></i>
                                </div>
                                <span class="badge rounded-pill bg-pn-cream text-pn-brown">{{ $category['count'] }}</span>
                            </div>

                            <h2 class="h5 font-serif text-pn-brown fw-semibold mb-2">{{ $category['name'] }}</h2>
                            <p class="small text-secondary mb-4">{{ $category['description'] }}</p>

                            <a href="{{ route('pooja.category', ['slug' => $category['slug']]) }}"
                               class="btn btn-pn-outline mt-auto">
                                Explore Poojas <i class="bi bi-arrow-right ms-2"></i>
                            </a>
                        </div>
                    </article>
                </div>
            @endforeach
        </div>
    </div>
</section>

@endsection
