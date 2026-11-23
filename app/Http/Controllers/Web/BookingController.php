<?php

namespace App\Http\Controllers\Web;

use App\Models\BookingPayment;
use App\Models\BookingStatusHistory;
use App\Services\CashfreePaymentService;
use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Currency;
use App\Models\FamilyMember;
use App\Models\Language;
use App\Models\Pooja;
use App\Models\PoojaExtra;
use App\Models\PujariProfile;
use App\Models\TemplePooja;
use App\Services\Booking\BookingAvailabilityService;
use App\Services\Booking\BookingService;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BookingController extends Controller
{
    public function __construct(
        private readonly BookingAvailabilityService $availability,
        private readonly BookingService $bookingService,
		private readonly CashfreePaymentService $cashfreePaymentService,
    ) {
    }

    public function create(Request $request, string $slug): View
    {
        $user = $request->user();

        $pooja = Pooja::query()
            ->where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();

        $templePooja = TemplePooja::query()
            ->where('pooja_id', $pooja->id)
            ->first();

        $basePoojaPrice = 0;
        $currencySymbol = '₹';
        $currencyCode = 'INR';

        if (!empty($pooja->starting_price)) {
            $basePoojaPrice = (float) $pooja->starting_price;
        } elseif (!empty($pooja->price)) {
            $basePoojaPrice = (float) $pooja->price;
        }

        if ($basePoojaPrice <= 0 && method_exists($pooja, 'pricing')) {
            $pricingRow = $pooja->pricing()->with('currency')->first();
            if ($pricingRow) {
                $basePoojaPrice = (float) ($pricingRow->price ?? $pricingRow->base_price ?? $pricingRow->amount ?? 0);
                if ($pricingRow->currency) {
                    $currencySymbol = $pricingRow->currency->symbol ?? '₹';
                    $currencyCode = $pricingRow->currency->code ?? 'INR';
                }
            }
        }

        $date = Carbon::parse($request->query('date', today()->toDateString()));
        $slots = collect();

        if ($templePooja) {
            $slots = $this->availability->slotsForDate($templePooja, $date);
        }

        // Fallback: If DB has no slots configured for this date, provide standard Vedic muhurtham slots
        if ($slots->isEmpty()) {
            $slots = $this->getDefaultMuhurthamSlots($templePooja, $date);
        }

        $currencies = Currency::query()->where('is_active', true)->orderBy('name')->get();
        $languages = Language::query()->where('is_active', true)->orderBy('name')->get();

        $familyMembers = FamilyMember::query()
            ->with('relation')
            ->where('customer_profile_id', $user->customerProfile?->id)
            ->where('is_active', true)
            ->orderBy('first_name')
            ->get();

        $addresses = Address::query()
            ->with(['city', 'state', 'country'])
            ->where('user_id', $user->id)
            ->orderByDesc('is_default')
            ->latest('id')
            ->get();

        $extras = PoojaExtra::query()
            ->with(['options' => function ($query) {
                $query->where('is_active', true)->orderBy('sort_order')->with('currency');
            }])
            ->where('pooja_id', $pooja->id)
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        $pujaris = PujariProfile::query()
            ->where('is_active', true)
            ->where('verification_status', 'approved')
            ->orderBy('display_name')
            ->get(['id', 'pujari_number', 'display_name', 'experience_years', 'bio']);

        return view('frontend.poojas.book', compact(
            'pooja',
            'templePooja',
            'basePoojaPrice',
            'currencySymbol',
            'currencyCode',
            'date',
            'slots',
            'currencies',
            'languages',
            'familyMembers',
            'addresses',
            'extras',
            'pujaris'
        ));
    }

    public function slots(Request $request, string $slug): JsonResponse
    {
        $validated = $request->validate([
            'date' => ['required', 'date_format:Y-m-d', 'after_or_equal:today'],
        ]);

        $pooja = Pooja::query()->where('slug', $slug)->where('is_active', true)->firstOrFail();
        $templePooja = TemplePooja::query()->where('pooja_id', $pooja->id)->first();
        $date = Carbon::createFromFormat('Y-m-d', $validated['date']);

        $slots = collect();
        if ($templePooja) {
            $slots = $this->availability->slotsForDate($templePooja, $date);
        }

        if ($slots->isEmpty()) {
            $slots = $this->getDefaultMuhurthamSlots($templePooja, $date);
        }

        return response()->json([
            'date' => $validated['date'],
            'slots' => $slots->map(fn ($slot) => [
                'id' => is_array($slot) ? $slot['id'] : $slot->id,
                'start_time' => is_array($slot) ? $slot['start_time'] : $slot->start_time,
                'end_time' => is_array($slot) ? $slot['end_time'] : $slot->end_time,
                'capacity' => 10,
                'remaining_capacity' => 10,
            ])->values(),
        ]);
    }

    /**
     * Helper to return standard Muhurtham slots or grab existing booking_slots.
     */
    private function getDefaultMuhurthamSlots(?TemplePooja $templePooja, Carbon $date): \Illuminate\Support\Collection
    {
        // Check if any booking_slots exist in the DB
        $existing = \App\Models\BookingSlot::query()->take(6)->get();
        if ($existing->isNotEmpty()) {
            return $existing;
        }

        // Fallback default slots collection
        return collect([
            (object) ['id' => 1, 'start_time' => '07:30:00', 'end_time' => '08:30:00', 'remaining_capacity' => 5],
            (object) ['id' => 2, 'start_time' => '09:30:00', 'end_time' => '10:30:00', 'remaining_capacity' => 5],
            (object) ['id' => 3, 'start_time' => '11:00:00', 'end_time' => '12:00:00', 'remaining_capacity' => 5],
            (object) ['id' => 4, 'start_time' => '16:30:00', 'end_time' => '17:30:00', 'remaining_capacity' => 5],
            (object) ['id' => 5, 'start_time' => '18:30:00', 'end_time' => '19:30:00', 'remaining_capacity' => 5],
        ]);
    }

    public function store(Request $request, string $slug): RedirectResponse
    {
        $pooja = Pooja::query()->where('slug', $slug)->where('is_active', true)->firstOrFail();

        $templePooja = TemplePooja::query()
            ->where('pooja_id', $pooja->id)
            ->first();

        $validated = $request->validate([
            'booking_slot_id' => ['required', 'integer'],
            'currency_code' => ['nullable', 'string', 'size:3'],
            'pujari_profile_id' => ['nullable', 'integer'],
            'customer_notes' => ['nullable', 'string', 'max:5000'],
            'devotee_name' => ['required', 'string', 'max:200'],
            'devotee_phone' => ['required', 'string', 'max:30'],
            'devotee_email' => ['required', 'email', 'max:255'],
            'devotee_dob' => ['nullable', 'date', 'before_or_equal:today'],
            'address_id' => ['nullable', 'integer'],
            'sankalpam' => ['nullable', 'array'],
            'sankalpam.language_id' => ['nullable', 'integer'],
            'sankalpam.purpose_type' => ['nullable', 'string', 'max:50'],
            'sankalpam.purpose_details' => ['nullable', 'string', 'max:255'],
            'sankalpam.gotram' => ['nullable', 'string', 'max:150'],
            'sankalpam.nakshatram' => ['nullable', 'string', 'max:150'],
            'sankalpam.special_instructions' => ['nullable', 'string', 'max:5000'],
            'sankalpam.sankalpam_text' => ['nullable', 'string', 'max:10000'],
            'sankalpam.generated_text' => ['nullable', 'string', 'max:10000'],
            'sankalpam.members' => ['nullable', 'array'],
            'sankalpam.members.*.family_member_id' => ['nullable', 'integer'],
            'sankalpam.members.*.name' => ['required', 'string', 'max:200'],
            'sankalpam.members.*.relationship' => ['nullable', 'string', 'max:100'],
            'extras' => ['nullable', 'array'],
            'extras.*.pooja_extra_option_id' => ['required', 'integer'],
            'extras.*.quantity' => ['nullable', 'integer', 'min:1', 'max:99'],
            'address.recipient_name' => ['nullable', 'string', 'max:200'],
            'address.phone' => ['nullable', 'string', 'max:30'],
            'address.address_line_1' => ['nullable', 'string', 'max:255'],
            'address.address_line_2' => ['nullable', 'string', 'max:255'],
            'address.landmark' => ['nullable', 'string', 'max:255'],
            'address.city' => ['nullable', 'string', 'max:150'],
            'address.state' => ['nullable', 'string', 'max:150'],
            'address.country' => ['nullable', 'string', 'max:150'],
            'address.postal_code' => ['nullable', 'string', 'max:30'],
            'address.latitude' => ['nullable', 'numeric'],
            'address.longitude' => ['nullable', 'numeric'],
        ]);

        // Pass the temple_pooja_id required by BookingService
        $validated['temple_pooja_id'] = $templePooja?->id ?? (int) $request->input('temple_pooja_id');
        $validated['currency_code'] = $validated['currency_code'] ?? 'INR';

        // Map primary devotee into Sankalpam Self entry
        $validated['sankalpam'] = $validated['sankalpam'] ?? [];
        $primaryName = trim($validated['devotee_name']);
        $members = $validated['sankalpam']['members'] ?? [];
        array_unshift($members, [
            'family_member_id' => null,
            'name' => $primaryName,
            'relationship' => 'Self',
        ]);
        $validated['sankalpam']['members'] = $members;
		
		$paymentCustomerDetails = [
		'customer_id' => 'POOJA_' . $request->user()->id,
		'customer_name' => $validated['devotee_name'],
		'customer_email' => $validated['devotee_email'],
		'customer_phone' => $validated['devotee_phone'],
		];

        unset($validated['devotee_name'], $validated['devotee_phone'], $validated['devotee_email'], $validated['devotee_dob'], $validated['booking_date']);

        try {
            $booking = $this->bookingService->createPendingBooking(
                $request->user()->id,
                $validated
            );
        } catch (\DomainException $exception) {
            return back()->withInput()->with('error', $exception->getMessage());
        }

		// Create Cashfree payment order
	$gatewayOrderId = 'POOJA_' . $booking->id . '_' . strtoupper(bin2hex(random_bytes(4)));

	$payment = BookingPayment::create([
	'booking_id' => $booking->id,
	'gateway' => 'cashfree',
	'gateway_order_id' => $gatewayOrderId,
	'amount' => $booking->total_amount,
	'currency' => 'INR',
	'payment_status' => 'pending',
	]);

	try {

	$returnUrl = route('pooja.booking.payment.return', [
		'order_id' => $gatewayOrderId,
	]);

	$notifyUrl = route('pooja.booking.cashfree.webhook');

	$cashfreeResponse = $this->cashfreePaymentService->createOrder(
		$gatewayOrderId,
		(float) $booking->total_amount,
		$paymentCustomerDetails,
		$returnUrl,
		$notifyUrl
	);

	$payment->update([
		'payment_session_id' => $cashfreeResponse['payment_session_id'],
		'gateway_response' => $cashfreeResponse,
	]);

	// Payment checkout page will be added in the next step
	return redirect()->route('pooja.booking.payment.checkout', [
		'payment' => $payment->id,
	]);

	} catch (\Throwable $exception) {

	report($exception);

	$payment->update([
		'payment_status' => 'failed',
		'gateway_response' => [
			'error' => $exception->getMessage(),
		],
	]);

	return redirect()
		->route('dashboard.bookings')
		->with('error', 'Unable to initiate payment. Please try again.');
	}
    }
	
	public function checkout(BookingPayment $payment): View
	{
    $payment->load('booking');

    // Verify this payment belongs to the logged-in customer
    if (
        $payment->booking->customer_profile_id !==
        auth()->user()->customerProfile?->id
    ) {
        abort(403);
    }

    // Only pending payments can proceed
    if ($payment->payment_status !== 'pending') {
        return redirect()
            ->route('dashboard.bookings')
            ->with('error', 'This payment is no longer pending.');
    }

    // Verify Cashfree payment session exists
    if (empty($payment->payment_session_id)) {
        return redirect()
            ->route('dashboard.bookings')
            ->with('error', 'Payment session is unavailable. Please try again.');
    }

    return view('frontend.poojas.payment-checkout', [
        'payment' => $payment,
        'cashfreeMode' => config('services.cashfree.environment', 'sandbox'),
    ]);
	}
	
	public function paymentReturn(Request $request): RedirectResponse
	{
    $gatewayOrderId = $request->query('order_id');

    if (!$gatewayOrderId) {
        return redirect()
            ->route('dashboard.bookings')
            ->with('error', 'Invalid payment response.');
    }

    $payment = BookingPayment::query()
        ->where('gateway_order_id', $gatewayOrderId)
        ->with('booking')
        ->first();

    if (!$payment) {
        return redirect()
            ->route('dashboard.bookings')
            ->with('error', 'Payment record not found.');
    }

    // Already processed successfully
    if ($payment->payment_status === 'paid') {
        return redirect()
            ->route('dashboard.bookings')
            ->with('success', 'Your booking payment has already been confirmed.');
    }

    try {

        // Verify payment directly with Cashfree
$cashfreeOrder = $this->cashfreePaymentService->fetchOrder(
    $gatewayOrderId
);

// Verify order ID, amount and currency
if (
    ($cashfreeOrder['order_id'] ?? null) !== $payment->gateway_order_id ||
    abs(
        (float) ($cashfreeOrder['order_amount'] ?? 0) -
        (float) $payment->amount
    ) > 0.001 ||
    ($cashfreeOrder['order_currency'] ?? '') !== $payment->currency
) {
    throw new \RuntimeException('Cashfree order details mismatch.');
}

if (($cashfreeOrder['order_status'] ?? '') === 'PAID') {

    // Verify successful payment attempt
    $payments = $this->cashfreePaymentService->fetchPayments(
        $gatewayOrderId
    );

    $successfulPayment = collect($payments)->first(
        function ($item) use ($payment, $gatewayOrderId) {
            return ($item['order_id'] ?? null) === $gatewayOrderId
                && ($item['payment_status'] ?? null) === 'SUCCESS'
                && ($item['payment_currency'] ?? '') === $payment->currency
                && abs(
                    (float) ($item['payment_amount'] ?? 0) -
                    (float) $payment->amount
                ) <= 0.001;
        }
    );

    if (!$successfulPayment) {
        throw new \RuntimeException(
            'No matching successful Cashfree payment found.'
        );
    }
	
	$gatewayPaymentId = (string) ($successfulPayment['cf_payment_id'] ?? '');

	if ($gatewayPaymentId === '') {
	throw new \RuntimeException('Cashfree payment ID is missing.');
	}

           \Illuminate\Support\Facades\DB::transaction(function () use ($payment, $cashfreeOrder, $successfulPayment, $gatewayPaymentId) {

                $payment = BookingPayment::query()
                    ->lockForUpdate()
                    ->findOrFail($payment->id);

                // Prevent duplicate confirmation
                if ($payment->payment_status === 'paid') {
                    return;
                }

				$booking = \App\Models\Booking::query()
				->lockForUpdate()
				->findOrFail($payment->booking_id);

                $oldStatus = $booking->status;
				
				$slot = \App\Models\BookingSlot::query()
				->lockForUpdate()
				->findOrFail($booking->booking_slot_id);

				$slot->increment('booked_count');

                $payment->update([
                    'payment_status' => 'paid',
					'gateway_payment_id' => $gatewayPaymentId,
					'gateway_response' => [
					'order' => $cashfreeOrder,
					'payment' => $successfulPayment,
					],
                    'paid_at' => now(),
                ]);

                $booking->update([
                    'status' => 'confirmed',
                    'payment_confirmed_at' => now(),
                    'confirmed_at' => now(),
                ]);

                BookingStatusHistory::query()->create([
                    'booking_id' => $booking->id,
                    'from_status' => $oldStatus,
                    'to_status' => 'confirmed',
                    'changed_by_user_id' => null,
                    'remarks' => 'Payment confirmed successfully through Cashfree.',
                    'changed_at' => now(),
                ]);

            });

            return redirect()
                ->route('dashboard.bookings')
                ->with('success', 'Payment successful! Your pooja booking is confirmed.');
        }

        // Payment is not yet confirmed
        $payment->update([
            'gateway_response' => $cashfreeOrder,
        ]);

        return redirect()
            ->route('dashboard.bookings')
            ->with('error', 'Your payment is not yet confirmed. Please check your booking status.');

    } catch (\Throwable $exception) {

        report($exception);

        return redirect()
            ->route('dashboard.bookings')
            ->with('error', 'Unable to verify your payment right now. Please check your booking status.');
    }
	}
	
	public function webhook(Request $request): JsonResponse
	{
    $rawBody = $request->getContent();

    $signature = (string) $request->header('x-webhook-signature');
    $timestamp = (string) $request->header('x-webhook-timestamp');

    // Verify Cashfree webhook signature
    if (!$this->cashfreePaymentService->verifyWebhookSignature(
        $rawBody,
        $timestamp,
        $signature
    )) {
        return response()->json([
            'success' => false,
            'message' => 'Invalid webhook signature.',
        ], 401);
    }

    $payload = json_decode($rawBody, true);

    if (!is_array($payload)) {
        return response()->json([
            'success' => false,
            'message' => 'Invalid webhook payload.',
        ], 400);
    }

    $gatewayOrderId = data_get($payload, 'data.order.order_id');

    if (!$gatewayOrderId) {
        return response()->json([
            'success' => false,
            'message' => 'Missing order ID.',
        ], 400);
    }

    $payment = BookingPayment::query()
        ->where('gateway_order_id', $gatewayOrderId)
        ->where('gateway', 'cashfree')
        ->first();

    if (!$payment) {
        return response()->json([
            'success' => false,
            'message' => 'Payment record not found.',
        ], 404);
    }

    try {
        // Verify the order directly with Cashfree
        $cashfreeOrder = $this->cashfreePaymentService->fetchOrder(
            $gatewayOrderId
        );

        // Verify order ID, amount and currency
        if (
            ($cashfreeOrder['order_id'] ?? null) !== $payment->gateway_order_id ||
            abs(
                (float) ($cashfreeOrder['order_amount'] ?? 0) -
                (float) $payment->amount
            ) > 0.001 ||
            ($cashfreeOrder['order_currency'] ?? '') !== $payment->currency
        ) {
            throw new \RuntimeException(
                'Cashfree order details mismatch.'
            );
        }

        // Process only successfully paid orders
        if (($cashfreeOrder['order_status'] ?? '') !== 'PAID') {
            return response()->json([
                'success' => true,
                'message' => 'Webhook received. Payment is not yet confirmed.',
            ]);
        }

        // Verify the successful payment attempt
        $payments = $this->cashfreePaymentService->fetchPayments(
            $gatewayOrderId
        );

        $successfulPayment = collect($payments)->first(
            function ($item) use ($payment, $gatewayOrderId) {
                return ($item['order_id'] ?? null) === $gatewayOrderId
                    && ($item['payment_status'] ?? null) === 'SUCCESS'
                    && ($item['payment_currency'] ?? '') === $payment->currency
                    && abs(
                        (float) ($item['payment_amount'] ?? 0) -
                        (float) $payment->amount
                    ) <= 0.001;
            }
        );

        if (!$successfulPayment) {
            throw new \RuntimeException(
                'No matching successful Cashfree payment found.'
            );
        }

        \Illuminate\Support\Facades\DB::transaction(function () use (
            $payment,
            $cashfreeOrder,
            $successfulPayment
        ) {
            $lockedPayment = BookingPayment::query()
                ->lockForUpdate()
                ->findOrFail($payment->id);

            // Prevent duplicate webhook processing
            if ($lockedPayment->payment_status === 'paid') {
                return;
            }

            $booking = \App\Models\Booking::query()
                ->lockForUpdate()
                ->findOrFail($lockedPayment->booking_id);

            $oldStatus = $booking->status;
			
			$slot = \App\Models\BookingSlot::query()
			->lockForUpdate()
			->findOrFail($booking->booking_slot_id);

			$slot->increment('booked_count');

            $gatewayPaymentId = (string) (
                $successfulPayment['cf_payment_id'] ?? ''
            );

            if ($gatewayPaymentId === '') {
                throw new \RuntimeException(
                    'Cashfree payment ID is missing.'
                );
            }

            $lockedPayment->update([
                'gateway_payment_id' => $gatewayPaymentId,
                'payment_status' => 'paid',
                'paid_at' => now(),
                'gateway_response' => [
                    'order' => $cashfreeOrder,
                    'payment' => $successfulPayment,
                ],
            ]);

            $booking->update([
                'status' => 'confirmed',
                'payment_confirmed_at' => now(),
                'confirmed_at' => now(),
            ]);

            BookingStatusHistory::query()->create([
                'booking_id' => $booking->id,
                'from_status' => $oldStatus,
                'to_status' => 'confirmed',
                'changed_by_user_id' => null,
                'remarks' => 'Payment confirmed successfully through Cashfree webhook.',
                'changed_at' => now(),
            ]);
        });

        return response()->json([
            'success' => true,
            'message' => 'Webhook processed successfully.',
        ]);

    } catch (\Throwable $exception) {
        report($exception);

        return response()->json([
            'success' => false,
            'message' => 'Webhook processing failed.',
        ], 500);
    }
	}
}