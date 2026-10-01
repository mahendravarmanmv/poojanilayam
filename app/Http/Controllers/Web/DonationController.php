<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\DonationCampaign;
use App\Models\DonationType;
use App\Models\Temple;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DonationController extends Controller
{
    public function index(): View
    {
        $now = now();

        $donationTypes = DonationType::query()
            ->where('status', 'active')
            ->orderBy('sort_order')
            ->orderBy('name')
            ->get(['id', 'name', 'slug', 'description'])
            ->map(fn (DonationType $type) => [
                'id' => $type->id,
                'title' => $type->name,
                'description' => $type->description,
                'icon' => $this->donationTypeIcon($type->slug),
            ])
            ->values();

        $campaigns = DonationCampaign::query()
            ->where('active', true)
            ->where('status', 'active')
            ->where(function ($query) use ($now) {
                $query->whereNull('starts_at')->orWhere('starts_at', '<=', $now);
            })
            ->where(function ($query) use ($now) {
                $query->whereNull('ends_at')->orWhere('ends_at', '>=', $now);
            })
            ->with('donationType:id,name,slug')
            ->orderByDesc('featured')
            ->orderBy('name')
            ->get();

        $temples = Temple::query()
            ->where('status', 'active')
            ->where('verification_status', 'approved')
            ->with(['profile.address.city:id,name', 'profile.address.state:id,name'])
            ->orderBy('name')
            ->get()
            ->map(function (Temple $temple) use ($campaigns) {
                $campaign = $campaigns->firstWhere('temple_id', $temple->id);
                $address = $temple->profile?->address;

                return [
                    'id' => $temple->id,
                    'name' => $temple->name,
                    'location' => $this->formatTempleLocation($address),
                    'description' => $campaign?->short_description
                        ?: $temple->profile?->short_description
                        ?: $temple->description
                        ?: 'Support temple worship, seva and spiritual activities.',
                    'image' => 'images/home/hero.webp',
                    'tag' => $campaign?->name
                        ?: 'Temple Support',
                    'slug' => $temple->slug,
                ];
            })
            ->values();

        return view('frontend.donations.index', [
            'donationTypes' => $donationTypes,
            'temples' => $temples,
            'suggestedAmounts' => [501, 1001, 2501, 5001],
        ]);
    }

    public function donate(Request $request): View
    {
        $now = now();

        $donationTypes = DonationType::query()
            ->where('status', 'active')
            ->orderBy('sort_order')
            ->orderBy('name')
            ->get(['id', 'name', 'slug', 'description'])
            ->map(fn (DonationType $type) => [
                'id' => $type->id,
                'name' => $type->name,
                'description' => $type->description,
            ])
            ->values();

        $temples = Temple::query()
            ->where('status', 'active')
            ->where('verification_status', 'approved')
            ->with(['profile.address.city:id,name', 'profile.address.state:id,name'])
            ->orderBy('name')
            ->get()
            ->map(function (Temple $temple) {
                $address = $temple->profile?->address;

                return [
                    'id' => $temple->id,
                    'name' => $temple->name,
                    'location' => $this->formatTempleLocation($address),
                    'slug' => $temple->slug,
                ];
            })
            ->values();

        $selectedTemple = null;
        $templeSlug = $request->query('temple');

        if ($templeSlug) {
            $selectedTemple = Temple::query()
                ->where('slug', $templeSlug)
                ->where('status', 'active')
                ->where('verification_status', 'approved')
                ->first();
        }

        $selectedCampaign = null;
        $campaignSlug = $request->query('campaign');

        if ($campaignSlug) {
            $selectedCampaign = DonationCampaign::query()
                ->where('slug', $campaignSlug)
                ->where('active', true)
                ->where('status', 'active')
                ->where(function ($query) use ($now) {
                    $query->whereNull('starts_at')->orWhere('starts_at', '<=', $now);
                })
                ->where(function ($query) use ($now) {
                    $query->whereNull('ends_at')->orWhere('ends_at', '>=', $now);
                })
                ->with('donationType:id,name,slug')
                ->first();
        }

        if ($selectedCampaign?->temple_id && ! $selectedTemple) {
            $selectedTemple = Temple::query()
                ->whereKey($selectedCampaign->temple_id)
                ->where('status', 'active')
                ->where('verification_status', 'approved')
                ->first();
        }

        $selectedDonationTypeId = $selectedCampaign?->donation_type_id;

        return view('frontend.donations.donate', [
            'temples' => $temples,
            'donationTypes' => $donationTypes,
            'suggestedAmounts' => [501, 1001, 2501, 5001],
            'selectedTemple' => $selectedTemple,
            'selectedCampaign' => $selectedCampaign,
            'selectedDonationTypeId' => $selectedDonationTypeId,
        ]);
    }

    private function donationTypeIcon(?string $slug): string
    {
        return match ($slug) {
            'temple-support' => 'bi-bank2',
            'annadanam' => 'bi-people',
            'pooja-seva' => 'bi-flower1',
            'temple-development' => 'bi-building',
            default => 'bi-heart',
        };
    }

    private function formatTempleLocation($address): string
    {
        if (! $address) {
            return 'Location details not available';
        }

        $parts = array_filter([
            $address->city?->name,
            $address->state?->name,
        ]);

        return $parts ? implode(', ', $parts) : 'Location details not available';
    }
}
