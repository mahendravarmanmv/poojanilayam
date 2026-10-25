<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Donation;
use App\Models\DonationCampaign;
use App\Models\DonationType;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class DonationController extends Controller
{
    private const SUGGESTED_AMOUNTS = [501, 1001, 2501, 5001];

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

        $campaigns = $this->publicCampaignQuery($now)
            ->with('donationType:id,name,slug')
            ->orderByDesc('featured')
            ->orderBy('name')
            ->get();


        return view('frontend.donations.index', [
            'donationTypes' => $donationTypes,
            'campaigns' => $campaigns,
            'suggestedAmounts' => self::SUGGESTED_AMOUNTS,
        ]);
    }

    public function show(string $slug): View
    {
        $campaign = $this->publicCampaignQuery(now())
            ->with('donationType:id,name,slug')
            ->where('slug', $slug)
            ->firstOrFail();

        return view('frontend.donations.show', [
            'campaign' => $campaign,
            'suggestedAmounts' => collect(self::SUGGESTED_AMOUNTS),
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

        $selectedCampaign = null;
        if ($campaignSlug = $request->query('campaign')) {
            $selectedCampaign = $this->publicCampaignQuery($now)
                ->with('donationType:id,name,slug')
                ->where('slug', $campaignSlug)
                ->first();
            abort_unless($selectedCampaign, 404);
        }

        $selectedDonationTypeId = $selectedCampaign?->donation_type_id
            ?? $request->query('donation_type_id');

        if ($selectedDonationTypeId && ! $donationTypes->contains(fn ($type) => (int) $type['id'] === (int) $selectedDonationTypeId)) {
            $selectedDonationTypeId = null;
        }

        $queryAmount = $request->query('amount', 1001);
        $selectedAmount = is_numeric($queryAmount)
            && (float) $queryAmount >= 1
            && (float) $queryAmount <= 9999999999999.99
                ? $queryAmount
                : 1001;

        return view('frontend.donations.donate', [
            'donationTypes' => $donationTypes,
            'suggestedAmounts' => self::SUGGESTED_AMOUNTS,
            'selectedCampaign' => $selectedCampaign,
            'selectedDonationTypeId' => $selectedDonationTypeId,
            'selectedAmount' => $selectedAmount,
        ]);
    }

    public function store(Request $request): RedirectResponse
{
    // Normalize field names if submitted under alternative names
    if (! $request->has('donor_message') && $request->has('message')) {
        $request->merge(['donor_message' => $request->input('message')]);
    }

    $validated = $request->validate([
        'donation_type_id'     => ['required', 'integer', 'exists:donation_types,id'],
        'donation_campaign_id' => ['nullable', 'integer', 'exists:donation_campaigns,id'],
        'amount'               => ['required', 'numeric', 'min:1', 'max:9999999999999.99'],
        'donor_name'           => ['required', 'string', 'max:191'],
        'donor_email'          => ['required', 'email', 'max:255'],
        'donor_mobile'         => ['required', 'string', 'max:15'],
        'pan'                  => ['nullable', 'string', 'max:10'],
        'address'              => ['nullable', 'string', 'max:500'],
        'donor_message'        => ['nullable', 'string', 'max:2000'],
        'is_anonymous'         => ['nullable', 'boolean'],
        'consent'              => ['accepted'],
    ]);

    $type = DonationType::query()
        ->whereKey($validated['donation_type_id'])
        ->where('status', 'active')
        ->first();

    if (! $type) {
        throw ValidationException::withMessages([
            'donation_type_id' => 'Please select an available donation purpose.',
        ]);
    }

    $campaign = null;
    if (! empty($validated['donation_campaign_id'])) {
        $campaign = $this->publicCampaignQuery(now())
            ->whereKey($validated['donation_campaign_id'])
            ->first();

        if (! $campaign) {
            throw ValidationException::withMessages([
                'donation_campaign_id' => 'This campaign is no longer accepting donation requests.',
            ]);
        }
    }

    $reference = $this->uniqueReference('PND');
    $donationNumber = $this->uniqueReference('DON');

    $donation = DB::transaction(function () use ($validated, $type, $campaign, $reference, $donationNumber) {
        $donation = Donation::create([
            'customer_profile_id'  => auth()->id(),
            'donation_type_id'     => $type->id,
            'donation_campaign_id' => $campaign?->id,
            'temple_id'            => $campaign?->temple_id ?? null,
            'donation_id'          => $donationNumber,
            'reference_id'         => $reference,
            'amount'               => $validated['amount'],
            'currency_code'        => 'INR',
            'status'               => 'pending',
            'donor_name'           => $validated['donor_name'],
            'donor_email'          => $validated['donor_email'],
            'donor_mobile'         => $validated['donor_mobile'],
            'pan'                  => $validated['pan'] ?? null,
            'address'              => $validated['address'] ?? null,
            'is_anonymous'         => (bool) ($validated['is_anonymous'] ?? false),
            'purpose'              => $type->name,
            'donor_message'        => $validated['donor_message'] ?? null,
        ]);

        DB::table('donation_status_histories')->insert([
            'donation_id'         => $donation->id,
            'changed_by_user_id'  => auth()->id(),
            'from_status'         => null,
            'to_status'           => 'pending',
            'source'              => 'frontend',
            'remarks'             => 'Offline donation request recorded (payment gateway bypass).',
            'changed_at'          => now(),
            'created_at'          => now(),
            'updated_at'          => now(),
        ]);

        return $donation;
    });

    return redirect()
        ->route('donation.success', ['reference' => $donation->reference_id])
        ->with('status', 'Your donation request has been recorded successfully.');
}

    public function success(Request $request): View
    {
        $reference = (string) $request->query('reference', '');

        abort_if($reference === '', 404);

        $donation = Donation::query()
            ->with(['donationType', 'donationCampaign'])
            ->where('reference_id', $reference)
            ->firstOrFail();

        return view('frontend.donations.success', compact('donation'));
    }

    private function publicCampaignQuery($now)
    {
        return DonationCampaign::query()
            ->where('active', true)
            ->where('status', 'active')
            ->where(function ($query) use ($now) {
                $query->whereNull('starts_at')->orWhere('starts_at', '<=', $now);
            })
            ->where(function ($query) use ($now) {
                $query->whereNull('ends_at')->orWhere('ends_at', '>=', $now);
            });
    }

    private function uniqueReference(string $prefix): string
    {
        do {
            $reference = $prefix . '-' . now()->format('ymd') . '-' . Str::upper(Str::random(12));
        } while (Donation::withTrashed()->where(function ($query) use ($reference) {
            $query->where('reference_id', $reference)
                ->orWhere('donation_id', $reference);
        })->exists());

        return $reference;
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

}
