@extends('layouts.app')

@section('title', 'Pooja Categories | Pooja Nilayam')
@section('meta_description', 'Explore Pooja Nilayam categories and discover sacred poojas for devotion, festivals, prosperity, health and special occasions.')

@section('content')

<section class="bg-pn-cream py-4">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-3">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-pn-primary">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('pooja.index') }}" class="text-pn-primary">Poojas</a></li>
                <li class="breadcrumb-item active" aria-current="page">Categories</li>
            </ol>
        </nav>

        <div class="text-center py-4">
            <span class="pn-section-label text-uppercase text-pn-gold fw-semibold small">Sacred Collections</span>
            <h1 class="font-serif display-5 text-pn-brown mt-2 mb-3">Explore Pooja Categories</h1>
            <div class="pn-divider mx-auto my-3"></div>
            <p class="text-secondary mx-auto mb-0 col-lg-7">
                Discover meaningful rituals and traditional poojas organised by purpose, deity, festival and special occasion.
            </p>
        </div>
    </div>
</section>

<section class="py-4 border-bottom bg-white">
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
        @php
            $categories = [
                ['icon'=>'bi-sunrise','name'=>'Daily Poojas','description'=>'Begin your day with traditional prayers and divine blessings.','count'=>'8 Poojas','slug'=>'daily-poojas'],
                ['icon'=>'bi-stars','name'=>'Festival Poojas','description'=>'Celebrate sacred festivals with traditional rituals and offerings.','count'=>'12 Poojas','slug'=>'festival-poojas'],
                ['icon'=>'bi-flower1','name'=>'Ganapathi Poojas','description'=>'Seek the blessings of Lord Ganesha for auspicious beginnings.','count'=>'6 Poojas','slug'=>'ganapathi-poojas'],
                ['icon'=>'bi-heart','name'=>'Lakshmi Poojas','description'=>'Traditional worship dedicated to prosperity, abundance and wellbeing.','count'=>'7 Poojas','slug'=>'lakshmi-poojas'],
                ['icon'=>'bi-moon-stars','name'=>'Shiva Poojas','description'=>'Sacred rituals devoted to Lord Shiva and spiritual wellbeing.','count'=>'9 Poojas','slug'=>'shiva-poojas'],
                ['icon'=>'bi-brightness-high','name'=>'Vishnu Poojas','description'=>'Traditional prayers seeking protection, peace and divine grace.','count'=>'6 Poojas','slug'=>'vishnu-poojas'],
                ['icon'=>'bi-circle-half','name'=>'Navagraha Poojas','description'=>'Rituals traditionally performed for planetary blessings and harmony.','count'=>'5 Poojas','slug'=>'navagraha-poojas'],
                ['icon'=>'bi-fire','name'=>'Homam & Havan','description'=>'Sacred fire rituals performed with traditional offerings and mantras.','count'=>'8 Poojas','slug'=>'homam-havan'],
                ['icon'=>'bi-gift','name'=>'Special Occasions','description'=>'Mark important milestones and family occasions with sacred rituals.','count'=>'10 Poojas','slug'=>'special-occasions'],
                ['icon'=>'bi-heart-pulse','name'=>'Health & Wellbeing','description'=>'Traditional prayers performed with wishes for health and wellbeing.','count'=>'6 Poojas','slug'=>'health-wellbeing'],
                ['icon'=>'bi-coin','name'=>'Prosperity & Wealth','description'=>'Poojas associated with prosperity, abundance and financial wellbeing.','count'=>'7 Poojas','slug'=>'prosperity-wealth'],
                ['icon'=>'bi-people','name'=>'Marriage & Family','description'=>'Sacred rituals for harmony, relationships and family blessings.','count'=>'6 Poojas','slug'=>'marriage-family'],
            ];
        @endphp

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

<section class="bg-pn-cream py-5">
    <div class="container text-center py-lg-3">
        <span class="text-pn-gold text-uppercase small fw-semibold pn-section-label">Need Help Choosing?</span>
        <h2 class="font-serif text-pn-brown mt-2 mb-3">Find a Pooja that feels right for you</h2>
        <p class="text-secondary mx-auto col-lg-6 mb-4">
            Browse our Pooja collection or explore the available services to find a ritual suited to your occasion and purpose.
        </p>
        <a href="{{ route('pooja.index') }}" class="btn btn-pn px-4">
            Browse All Poojas <i class="bi bi-arrow-right ms-2"></i>
        </a>
    </div>
</section>

@endsection
