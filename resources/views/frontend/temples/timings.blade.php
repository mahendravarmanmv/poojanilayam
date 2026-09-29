@extends('layouts.app')

@section('title', 'Temple Timings | Pooja Nilayam')
@section('meta_description', 'View temple opening hours, pooja timings and daily schedules.')

@section('content')
<section class="bg-pn-cream border-bottom">
    <div class="container py-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-pn-primary">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('temple.index') }}" class="text-pn-primary">Temples</a></li>
                <li class="breadcrumb-item active" aria-current="page">Temple Timings</li>
            </ol>
        </nav>
    </div>
</section>

<section class="bg-pn-cream py-5">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-12 col-lg-8">
                <span class="small text-pn-gold fw-semibold text-uppercase">Temple Information</span>
                <h1 class="font-serif display-5 text-pn-brown mt-2 mb-3">Temple Timings</h1>
                <p class="lead text-secondary mb-0">
                    View daily temple opening hours and pooja schedules.
                </p>
            </div>
        </div>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8">
                <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                    <div class="card-body p-0">
                        @foreach([
                            'Monday' => '6:00 AM – 12:00 PM, 4:00 PM – 9:00 PM',
                            'Tuesday' => '6:00 AM – 12:00 PM, 4:00 PM – 9:00 PM',
                            'Wednesday' => '6:00 AM – 12:00 PM, 4:00 PM – 9:00 PM',
                            'Thursday' => '6:00 AM – 12:00 PM, 4:00 PM – 9:00 PM',
                            'Friday' => '6:00 AM – 12:00 PM, 4:00 PM – 9:00 PM',
                            'Saturday' => '6:00 AM – 12:30 PM, 4:00 PM – 9:30 PM',
                            'Sunday' => '6:00 AM – 1:00 PM, 4:00 PM – 9:30 PM',
                        ] as $day => $timing)
                            <div class="d-flex flex-column flex-sm-row justify-content-between gap-2 px-4 py-3 border-bottom">
                                <span class="fw-semibold text-pn-brown">{{ $day }}</span>
                                <span class="text-secondary">{{ $timing }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>
                <p class="small text-secondary mt-3 mb-0">
                    Timings shown here are frontend placeholder content and should be replaced with
                    temple-specific data from the backend.
                </p>
            </div>
        </div>
    </div>
</section>
@endsection
