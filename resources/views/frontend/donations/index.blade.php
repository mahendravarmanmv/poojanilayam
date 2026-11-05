@extends('layouts.app')

@section('title', 'Donate | Pooja Go')

@section(
    'meta_description',
    'Support spiritual initiatives and devotional activities through Pooja Go.'
)

@section('content')

{{-- Donation data is supplied by DonationController@index. --}}


{{-- ============================================================
     DONATION TYPES
============================================================ --}}

<section
    id="donationTypes"
    class="py-5"
>

    <div class="container">

        <div
            class="row
                   align-items-end
                   g-4
                   mb-5"
        >

            <div class="col-12 col-lg-8">

                <span
                    class="small
                           text-pn-gold
                           fw-semibold
                           text-uppercase"
                >

                    Choose Your Purpose

                </span>


                <h2
                    class="font-serif
                           display-6
                           text-pn-brown
                           mt-2
                           mb-2"
                >

                    Ways you can contribute

                </h2>


                <p
                    class="text-secondary
                           mb-0"
                >

                    Select the donation purpose that best matches
                    your intention.

                </p>

            </div>

        </div>


        <div
            class="row
                   row-cols-1
                   row-cols-sm-2
                   row-cols-lg-4
                   g-4"
        >

            @foreach($donationTypes as $type)

                <div class="col">

                    <div
                        class="card
                               border
                               border-warning-subtle
                               rounded-5
                               h-100"
                    >

                        <div class="card-body p-4">

                            <div
                                class="rounded-circle
                                       bg-pn-cream
                                       text-pn-primary
                                       d-flex
                                       align-items-center
                                       justify-content-center
                                       mb-4"
                                style="width:58px;height:58px;"
                            >

                                <i
                                    class="bi
                                           {{ $type['icon'] }}
                                           fs-5"
                                ></i>

                            </div>


                            <h3
                                class="font-serif
                                       h4
                                       text-pn-brown
                                       mb-2"
                            >

                                {{ $type['title'] }}

                            </h3>


                            <p
                                class="small
                                       text-secondary
                                       mb-0"
                            >

                                {{ $type['description'] }}

                            </p>

                            <a href="{{ route('donation.donate', ['donation_type_id' => $type['id']]) }}" class="btn btn-pn-outline w-100 mt-3">Donate for this purpose <i class="bi bi-arrow-right ms-1"></i></a>

                        </div>

                    </div>

                </div>

            @endforeach

        </div>

    </div>

</section>


{{-- ============================================================
     ACTIVE DONATION CAMPAIGNS
============================================================ --}}

@if($campaigns->isNotEmpty())
<section id="donationCampaigns" class="py-5">
    <div class="container">
        <div class="row align-items-end g-4 mb-4">
            <div class="col-12 col-lg-8">
                <span class="small text-pn-gold fw-semibold text-uppercase">Current Initiatives</span>
                <h2 class="font-serif display-6 text-pn-brown mt-2 mb-2">Support an active campaign</h2>
                <p class="text-secondary mb-0">Choose a published campaign to see its details and submit a donation request.</p>
            </div>
        </div>
        <div class="row row-cols-1 row-cols-md-2 row-cols-xl-3 g-4">
            @foreach($campaigns as $campaign)
                <div class="col">
                    <article class="card border border-warning-subtle rounded-5 h-100">
                        <div class="card-body p-4 d-flex flex-column">
                            <span class="badge rounded-pill bg-pn-cream text-pn-primary align-self-start mb-3">
                                {{ $campaign->donationType?->name ?? 'Donation' }}
                            </span>
                            <h3 class="font-serif h4 text-pn-brown">{{ $campaign->name }}</h3>
                            <p class="small text-secondary flex-grow-1">
                                {{ $campaign->short_description ?: \Illuminate\Support\Str::limit(strip_tags($campaign->description ?? 'Support this devotional initiative.'), 160) }}
                            </p>
                            @if($campaign->target_amount)
                                <div class="small text-secondary mb-3">
                                    Target: <strong class="text-pn-brown">₹{{ number_format((float) $campaign->target_amount, 2) }}</strong>
                                </div>
                            @endif
                            <div class="d-grid gap-2">
                                <a href="{{ route('donation.show', $campaign->slug) }}" class="btn btn-pn-outline">View Campaign</a>
                                <a href="{{ route('donation.donate', ['campaign' => $campaign->slug]) }}" class="btn btn-pn">Donate to Campaign</a>
                            </div>
                        </div>
                    </article>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- ============================================================
     SUGGESTED DONATION AMOUNTS
============================================================ --}}

<section class="py-5 bg-pn-cream">

    <div class="container">

        <div
            class="row
                   align-items-center
                   g-5"
        >

            <div class="col-12 col-lg-6">

                <span
                    class="small
                           text-pn-gold
                           fw-semibold
                           text-uppercase"
                >

                    Give What Feels Right

                </span>


                <h2
                    class="font-serif
                           display-6
                           text-pn-brown
                           mt-2
                           mb-3"
                >

                    Choose your donation amount.

                </h2>


                <p
                    class="text-secondary
                           mb-4"
                >

                    You can choose from a suggested amount or enter
                    a custom amount when you continue to donate.

                </p>


                <div
                    class="d-flex
                           flex-wrap
                           gap-2"
                >

                    @foreach($suggestedAmounts as $amount)

                        <a href="{{ route('donation.donate', ['amount' => $amount]) }}" class="btn btn-outline-secondary rounded-pill px-4">₹{{ number_format($amount) }}</a>

                    @endforeach

                </div>

            </div>


            <div class="col-12 col-lg-6">

                <div
                    class="border
                           border-warning-subtle
                           rounded-5
                           bg-white
                           p-4
                           p-md-5"
                >

                    <div
                        class="d-flex
                               align-items-start
                               gap-3
                               mb-4"
                    >

                        <div
                            class="rounded-circle
                                   bg-pn-cream
                                   text-pn-primary
                                   d-flex
                                   align-items-center
                                   justify-content-center
                                   flex-shrink-0"
                            style="width:54px;height:54px;"
                        >

                            <i class="bi bi-heart-fill"></i>

                        </div>


                        <div>

                            <h3
                                class="font-serif
                                       h4
                                       text-pn-brown
                                       mb-1"
                            >

                                Your contribution matters

                            </h3>


                            <p
                                class="small
                                       text-secondary
                                       mb-0"
                            >

                                Every donation can be made with a
                                purpose and devotion.

                            </p>

                        </div>

                    </div>


                    <div
                        class="border
                               border-warning-subtle
                               rounded-4
                               p-3"
                    >

                        <div
                            class="d-flex
                                   align-items-center
                                   justify-content-between
                                   gap-3"
                        >

                            <span
                                class="small
                                       text-secondary"
                            >

                                Suggested contribution

                            </span>


                            <strong
                                class="fs-4
                                       text-pn-primary"
                            >

                                ₹1,001

                            </strong>

                        </div>

                    </div>


                    <div class="d-grid mt-3">

                        <a
                            href="{{ route('donation.donate', ['amount' => 1001]) }}"
                            class="btn
                                   btn-pn
                                   btn-lg"
                        >

                            Continue to Donate

                            <i
                                class="bi bi-arrow-right ms-2"
                            ></i>

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

@endsection