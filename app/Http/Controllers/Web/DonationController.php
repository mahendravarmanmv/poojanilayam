<?php

namespace App\Http\Controllers\Web;

use App\Models\DonationPayment;
use App\Services\CashfreePaymentService;
use Illuminate\Http\JsonResponse;
use Throwable;
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
            ->get(['id', 'name', 'slug', 'description', 'image_path'])
            ->map(fn (DonationType $type) => [
                'id' => $type->id,
                'title' => $type->name,
                'description' => $type->description,
				'image' => $type->image_path,
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

    
public function store(
    Request $request,
    CashfreePaymentService $cashfree
): JsonResponse {

    if (!$request->has('donor_message') && $request->has('message')) {
        $request->merge([
            'donor_message' => $request->input('message')
        ]);
    }

    $validated = $request->validate([
        'donation_type_id' => [
            'required',
            'integer',
            'exists:donation_types,id'
        ],
        'donation_campaign_id' => [
            'nullable',
            'integer',
            'exists:donation_campaigns,id'
        ],
        'amount' => [
            'required',
            'numeric',
            'min:1',
            'max:9999999999999.99'
        ],
        'donor_name' => [
            'required',
            'string',
            'max:191'
        ],
        'donor_email' => [
            'required',
            'email',
            'max:255'
        ],
        'donor_mobile' => [
            'required',
            'string',
            'max:15'
        ],
        'pan' => [
            'nullable',
            'string',
            'max:10'
        ],
        'address' => [
            'nullable',
            'string',
            'max:500'
        ],
        'donor_message' => [
            'nullable',
            'string',
            'max:2000'
        ],
        'is_anonymous' => [
            'nullable',
            'boolean'
        ],
        'consent' => [
            'accepted'
        ],
    ]);

    $type = DonationType::query()
        ->whereKey($validated['donation_type_id'])
        ->where('status', 'active')
        ->first();

    if (!$type) {
        throw ValidationException::withMessages([
            'donation_type_id' =>
                'Please select an available donation purpose.',
        ]);
    }

    $campaign = null;

    if (!empty($validated['donation_campaign_id'])) {

        $campaign = $this->publicCampaignQuery(now())
            ->whereKey($validated['donation_campaign_id'])
            ->first();

        if (!$campaign) {
            throw ValidationException::withMessages([
                'donation_campaign_id' =>
                    'This campaign is no longer accepting donations.',
            ]);
        }
    }

    $reference = $this->uniqueReference('PND');
    $donationNumber = $this->uniqueReference('DON');

    $donation = null;
    $payment = null;

    try {

        /*
        |--------------------------------------------------------------------------
        | 1. Create Donation and Payment Records
        |--------------------------------------------------------------------------
        */

        DB::transaction(function () use (
            $validated,
            $type,
            $campaign,
            $reference,
            $donationNumber,
            &$donation,
            &$payment
        ) {

            $donation = Donation::create([
                'customer_profile_id' => auth()->id(),
                'donation_type_id' => $type->id,
                'donation_campaign_id' => $campaign?->id,
                'temple_id' => $campaign?->temple_id,

                'donation_id' => $donationNumber,
                'reference_id' => $reference,

                'amount' => $validated['amount'],
                'currency_code' => 'INR',
                'status' => 'pending',

                'donor_name' => $validated['donor_name'],
                'donor_email' => $validated['donor_email'],
                'donor_mobile' => $validated['donor_mobile'],

                'pan' => $validated['pan'] ?? null,
                'address' => $validated['address'] ?? null,

                'is_anonymous' =>
                    (bool) ($validated['is_anonymous'] ?? false),

                'purpose' => $type->name,
                'donor_message' =>
                    $validated['donor_message'] ?? null,
            ]);

            $gatewayOrderId = 'DONATION_' .
                $donation->id . '_' .
                Str::upper(Str::random(8));

            $payment = DonationPayment::create([
                'donation_id' => $donation->id,
                'gateway' => 'cashfree',
                'gateway_order_id' => $gatewayOrderId,
                'amount' => $donation->amount,
                'currency' => 'INR',
                'payment_status' => 'pending',
            ]);

            DB::table('donation_status_histories')->insert([
                'donation_id' => $donation->id,
                'changed_by_user_id' => auth()->id(),
                'from_status' => null,
                'to_status' => 'pending',
                'source' => 'frontend',
                'remarks' =>
                    'Donation created. Awaiting Cashfree payment.',
                'changed_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);

        });

        /*
        |--------------------------------------------------------------------------
        | 2. Create Cashfree Order
        |--------------------------------------------------------------------------
        */

        $returnUrl = route('donation.payment.return', [
            'order_id' => $payment->gateway_order_id,
        ]);

        $notifyUrl = route('donation.cashfree.webhook');

        $cashfreeResponse = $cashfree->createOrder(
            $payment->gateway_order_id,
            (float) $donation->amount,
            [
                'customer_id' => 'DONOR' . $donation->id,
                'customer_name' => $donation->donor_name,
                'customer_email' => $donation->donor_email,
                'customer_phone' => $donation->donor_mobile,
            ],
            $returnUrl,
            $notifyUrl
        );

        /*
        |--------------------------------------------------------------------------
        | 3. Save Cashfree Response
        |--------------------------------------------------------------------------
        */

        $payment->update([
            'payment_session_id' =>
                $cashfreeResponse['payment_session_id'],

            'gateway_response' => $cashfreeResponse,
        ]);

        /*
        |--------------------------------------------------------------------------
        | 4. Return Payment Details to Frontend
        |--------------------------------------------------------------------------
        */

        return response()->json([
            'success' => true,
            'message' => 'Donation created. Proceed with payment.',

            'donation_id' => $donation->donation_id,
            'reference_id' => $donation->reference_id,

            'order_id' => $payment->gateway_order_id,

            'payment_session_id' =>
                $cashfreeResponse['payment_session_id'],

            'amount' => (float) $donation->amount,
            'currency' => 'INR',
        ]);

    } catch (Throwable $exception) {

        report($exception);

        /*
        |--------------------------------------------------------------------------
        | 5. Handle Cashfree Order Creation Failure
        |--------------------------------------------------------------------------
        */

        if ($donation) {

            DB::transaction(function () use ($donation, $payment, $exception) {

                if ($payment) {
                    $payment->update([
                        'payment_status' => 'failed',
                        'gateway_response' => [
                            'error' => $exception->getMessage(),
                        ],
                    ]);
                }

                $donation->update([
                    'status' => 'failed',
                ]);

                DB::table('donation_status_histories')->insert([
                    'donation_id' => $donation->id,
                    'changed_by_user_id' => auth()->id(),
                    'from_status' => 'pending',
                    'to_status' => 'failed',
                    'source' => 'frontend',
                    'remarks' =>
                        'Cashfree payment order creation failed.',
                    'changed_at' => now(),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);

            });
        }

        return response()->json([
            'success' => false,
            'message' =>
                'Unable to initiate payment. Please try again.',
        ], 422);
    }
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
	
	
/**
 * Verify Cashfree payment after customer returns.
 */
public function paymentReturn(
    Request $request,
    CashfreePaymentService $cashfree
) {
    $orderId = $request->query('order_id');

    if (!$orderId) {
        abort(400, 'Missing Cashfree order ID.');
    }

    $payment = DonationPayment::with('donation')
        ->where('gateway_order_id', $orderId)
        ->where('gateway', 'cashfree')
        ->firstOrFail();

    $donation = $payment->donation;

    try {

        // Fetch order directly from Cashfree.
        $order = $cashfree->fetchOrder($orderId);

        // Verify order ID.
        if (($order['order_id'] ?? null) !== $payment->gateway_order_id) {
            throw new \RuntimeException('Cashfree order ID mismatch.');
        }

        // Verify amount and currency.
        if (
            abs(
                (float) ($order['order_amount'] ?? 0)
                - (float) $payment->amount
            ) > 0.001
            ||
            ($order['order_currency'] ?? '') !== $payment->currency
        ) {
            throw new \RuntimeException(
                'Cashfree order amount or currency mismatch.'
            );
        }

        // Check whether Cashfree has marked the order as PAID.
        if (($order['order_status'] ?? '') === 'PAID') {

            $payments = $cashfree->fetchPayments($orderId);

            // Find matching successful payment.
            $successfulPayment = collect($payments)->first(
                function ($item) use ($payment, $orderId) {

                    return ($item['order_id'] ?? null) === $orderId
                        && ($item['payment_status'] ?? null) === 'SUCCESS'
                        && ($item['payment_currency'] ?? '') === $payment->currency
                        && abs(
                            (float) ($item['payment_amount'] ?? 0)
                            - (float) $payment->amount
                        ) <= 0.001;
                }
            );

            if (!$successfulPayment) {
                throw new \RuntimeException(
                    'Matching successful Cashfree payment not found.'
                );
            }

            // Update donation and payment records atomically.
            DB::transaction(function () use (
                $payment,
                $order,
                $successfulPayment
            ) {

                $lockedPayment = DonationPayment::query()
                    ->whereKey($payment->id)
                    ->lockForUpdate()
                    ->firstOrFail();

                $lockedDonation = Donation::query()
                    ->whereKey($lockedPayment->donation_id)
                    ->lockForUpdate()
                    ->firstOrFail();

                // Prevent duplicate payment processing.
                if ($lockedPayment->payment_status === 'success') {
                    return;
                }

                $gatewayPaymentId =
                    (string) $successfulPayment['cf_payment_id'];

                $lockedPayment->update([
                    'gateway_payment_id' => $gatewayPaymentId,
                    'payment_status' => 'success',
                    'paid_at' => now(),
                    'gateway_response' => [
                        'order' => $order,
                        'payment' => $successfulPayment,
                    ],
                ]);

                $previousStatus = $lockedDonation->status;

                $lockedDonation->update([
                    'status' => 'successful',
                    'payment_reference' => $gatewayPaymentId,
                    'paid_at' => now(),
                ]);

                if ($previousStatus !== 'successful') {

                    DB::table('donation_status_histories')->insert([
                        'donation_id' => $lockedDonation->id,
                        'changed_by_user_id' => null,
                        'from_status' => $previousStatus,
                        'to_status' => 'successful',
                        'source' => 'cashfree',
                        'remarks' => 'Cashfree payment verified successfully.',
                        'changed_at' => now(),
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }

            });

        } elseif (in_array(
            $order['order_status'] ?? '',
            ['EXPIRED', 'TERMINATED'],
            true
        )) {

            // Only mark failed when Cashfree confirms terminal order status.
            DB::transaction(function () use ($payment, $order) {

                $lockedPayment = DonationPayment::query()
                    ->whereKey($payment->id)
                    ->lockForUpdate()
                    ->firstOrFail();

                $lockedDonation = Donation::query()
                    ->whereKey($lockedPayment->donation_id)
                    ->lockForUpdate()
                    ->firstOrFail();

                if ($lockedPayment->payment_status === 'success') {
                    return;
                }

                $previousStatus = $lockedDonation->status;

                $lockedPayment->update([
                    'payment_status' => 'failed',
                    'gateway_response' => [
                        'order' => $order,
                    ],
                ]);

                $lockedDonation->update([
                    'status' => 'failed',
                ]);

                if ($previousStatus !== 'failed') {

                    DB::table('donation_status_histories')->insert([
                        'donation_id' => $lockedDonation->id,
                        'changed_by_user_id' => null,
                        'from_status' => $previousStatus,
                        'to_status' => 'failed',
                        'source' => 'cashfree',
                        'remarks' => 'Cashfree payment order expired or terminated.',
                        'changed_at' => now(),
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }

            });
        }

        $payment->refresh();

        $donation->refresh();

        return redirect()->route('donation.success', [
            'reference' => $donation->reference_id,
        ])->with(
            'payment_status',
            $payment->payment_status
        );

    } catch (Throwable $exception) {

        report($exception);

        return redirect()->route('donation.success', [
            'reference' => $donation->reference_id,
        ])->with(
            'payment_status',
            'pending'
        );
    }
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
