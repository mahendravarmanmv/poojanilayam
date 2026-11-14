@extends('layouts.app')

@section('title', 'Astrology Services | Pooja Go')

@section(
    'meta_description',
    'Explore astrology services including Horoscope, Kundli, Match Making, Numerology, Palm Reading and Vastu Consultation.'
)

@section('content')

{{-- ============================================================
     HERO
============================================================ --}}

<section class="thankyou-hero d-flex align-items-center">
    <div class="container-fluid px-3 px-md-4 px-lg-5 position-relative py-5" style="z-index: 1;">
        <div class="row">
            <div class="col-12 col-sm-8 col-md-6 col-lg-5 astrology-hero-content text-start">                

                <h1 class="font-serif display-5 fw-semibold text-pn-brown pn-hero-accent mt-2 mb-3">
				Your<br>Special Occasion<br>Can Create Smiles
				</h1>

                <p class="text-dark mb-4">
                    Celebrate your special moments by supporting a child's education, food and well-being.
                </p>
				
				<div class="d-flex align-items-stretch mt-3">
				<!-- Real Impact -->
				<div class="d-flex flex-column align-items-start justify-content-start pe-4 border-end border-warning">
				<i class="bi bi-heart fs-2 pn-hero-accent rounded-circle border border-warning d-inline-flex align-items-center justify-content-center p-2 mb-1"></i>
				<small class="text-dark">Real Impact</small>
				</div>

				<!-- Photos & Videos -->
				<div class="d-flex flex-column align-items-center justify-content-start px-4 border-end border-warning">
				<i class="bi bi-camera fs-2 pn-hero-accent rounded-circle border border-warning d-inline-flex align-items-center justify-content-center p-2 mb-1"></i>
				<small class="text-center text-dark">Photos &amp; Videos<br>of Your Contribution</small>
				</div>

				<!-- Donation Certificate -->
				<div class="d-flex flex-column align-items-center justify-content-start px-4 border-end border-warning">
				<i class="bi bi-file-earmark-check fs-2 pn-hero-accent rounded-circle border border-warning d-inline-flex align-items-center justify-content-center p-2 mb-1"></i>
				<small class="text-center text-dark">Donation<br>Certificate</small>
				</div>
				</div>
               
            </div>
        </div>
    </div>
</section>

<section class="pt-4">
    <div class="container-fluid px-3 px-md-4 px-lg-5">
        <div class="bg-pn-cream border border-warning-subtle rounded-4 p-3 p-md-4">

            <div class="text-center">

                <h2 class="section-title font-serif fw-bold text-pn-red mb-1">
                    Donate for Your Special Occasion
                </h2>

                {{-- Decorative Divider --}}
                <div class="d-none d-sm-flex align-items-center justify-content-center gap-1 my-2">
                        <span class="border-top border-warning px-5"></span>
                        <span class="text-warning lh-1 small">◆</span>
                        <span class="border-top border-warning px-5"></span>
                    </div>

                <p class="text-secondary mb-0">
                    Make your celebrations more meaningful. Support a noble cause and create a positive impact.
                </p>
				
				
            <div class="row row-cols-2 row-cols-sm-5 g-2 mt-1">
                @foreach($donationTypes as $type)
                    <div class="col">
                        <a href="{{ route('donation.donate', ['donation_type_id' => $type['id']]) }}" class="d-block h-100">
                            <div class="occasion-card pn-service-card h-100 bg-donation-card border border-warning-subtle rounded-3 shadow-sm overflow-hidden text-center">
							<div class="ratio ratio-4x3 overflow-hidden">
							<img src="{{ asset($type['image']) }}" alt="{{ $type['title'] }}" class="w-100 h-100 object-fit-cover" loading="lazy" >
							</div>
                                <div class="occasion-icon rounded-circle bg-donation-card border text-pn-primary d-flex align-items-center justify-content-center mx-auto position-relative z-2">
                                   
                                </div>
                                <div class="px-1 pb-2 pt-1">
                                    <h3 class="font-serif fs-12 fw-bold text-pn-red text-truncate mb-1" title="{{ $type['title'] }}">
                                        {{ $type['title'] }}
                                    </h3>
                                    <p class="occasion-desc fs-9 text-secondary mb-1">
                                        {{ $type['description'] }}
                                    </p>
                                    <i class="bi bi-arrow-right text-pn-primary small"></i>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>

            </div>

        </div>
    </div>
</section>

<section class="pt-4">
    <div class="container-fluid px-3 px-md-4 px-lg-5">
        <div class="bg-pn-cream border border-warning-subtle rounded-4 p-3 p-md-4">

            <div class="text-center">

                <h2 class="section-title font-serif fw-bold text-pn-red mb-1">
                    Choose Your Donation Amount
                </h2>

                {{-- Decorative Divider --}}
                <div class="d-none d-sm-flex align-items-center justify-content-center gap-1 my-2">
                        <span class="border-top border-warning px-5"></span>
                        <span class="text-warning lh-1 small">◆</span>
                        <span class="border-top border-warning px-5"></span>
                    </div>

                <p class="text-secondary mb-0">
                    You can choose from a suggested amount or enter a custom amount.
                </p>
				
				<div class="row g-2 justify-content-center mt-2">
				@foreach($suggestedAmounts as $amount)
					<div class="col-6 col-sm-4 col-md-3 col-lg-2">
						<a href="{{ route('donation.donate', ['amount' => $amount]) }}"
						   class="btn btn-outline-secondary rounded-pill w-100">
							₹{{ number_format($amount) }}
						</a>
					</div>
				@endforeach
				</div>				
				
            

            </div>

        </div>
    </div>
</section>


{{-- ============================================================
     EXPERT ASTROLOGERS CTA
============================================================ --}}

<section class="d-flex align-items-center">
    <div class="container-fluid px-3 px-md-4 px-lg-5 position-relative py-5" style="z-index: 1;">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-10 col-md-8 col-lg-7 astrology-hero-content text-center">

                <h1 class="font-serif display-5 fw-semibold text-pn-brown pn-hero-accent mt-2 mb-3">
                    Your Contribution Matters
                </h1>

                <p class="text-dark mb-4">
                    Your donation helps provide food, education and essential support to children in need.
                </p>

                <a href="{{ route('donation.donate', ['amount' => 1001]) }}" class="btn btn-pn px-4">
                    Continue to Donate
                    <i class="bi bi-arrow-right ms-2"></i>
                </a>

            </div>
        </div>
    </div>
</section>

@endsection