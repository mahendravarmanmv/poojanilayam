<?php

namespace App\Http\Controllers\Web;

use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Models\PriestBooking;
use App\Models\PriestBookingPayment;
use App\Models\PujariProfile;
use App\Models\PujariService;
use App\Models\PujariAvailability;
use App\Models\Tax;
use App\Services\CashfreePaymentService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Throwable;

class PriestBookingController extends Controller
{
    /**
     * Store an independent priest booking and create Cashfree order.
     */
    public function store(
        Request $request,
        string $slug,
        CashfreePaymentService $cashfree
    ) {
        $validated = $request->validate([
            'service_choice' => ['required', 'integer'],
            'booking_date' => ['required', 'date', 'after_or_equal:today'],
            'availability_id' => ['required', 'integer'],
            'start_time' => ['required', 'date_format:H:i:s'],
            'end_time' => ['required', 'date_format:H:i:s'],

            'first_name' => ['required', 'string', 'max:100'],
            'last_name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email', 'max:255'],
            'mobile' => ['required', 'regex:/^[0-9]{10}$/'],
            'address' => ['required', 'string', 'max:2000'],
            'city' => ['required', 'string', 'max:100'],
            'state' => ['required', 'string', 'max:100'],
            'pincode' => ['required', 'string', 'max:15'],
            'terms_accepted' => ['required', 'accepted'],
        ]);

        // Use the same public visibility rules as PriestController.
        $priest = PujariProfile::query()
            ->where('is_active', true)
            ->where('profile_status', '!=', 'incomplete')
            ->where('verification_status', 'approved')
            ->where(function ($query) use ($slug) {
                $query->where('display_name', $slug)
                    ->orWhere('pujari_number', $slug)
                    ->orWhereRaw(
                        "LOWER(REPLACE(display_name, ' ', '-')) = ?",
                        [strtolower($slug)]
                    );
            })
            ->firstOrFail();

        // Always read service price and duration from the database.
        $service = PujariService::query()
            ->where('id', $validated['service_choice'])
            ->where('pujari_profile_id', $priest->id)
            ->where('is_active', true)
            ->firstOrFail();

        $bookingDate = Carbon::parse(
            $validated['booking_date']
        )->startOfDay();

        $start = Carbon::createFromFormat(
            'Y-m-d H:i:s',
            $validated['booking_date'] . ' ' . $validated['start_time']
        );

        $end = Carbon::createFromFormat(
            'Y-m-d H:i:s',
            $validated['booking_date'] . ' ' . $validated['end_time']
        );

        $duration = (int) $service->duration_minutes;

        if ($duration < 1 || !$end->equalTo($start->copy()->addMinutes($duration))) {
            throw ValidationException::withMessages([
                'start_time' => 'The selected time slot does not match the service duration.',
            ]);
        }

        if ($start->lte(now())) {
            throw ValidationException::withMessages([
                'start_time' => 'Please select a future time slot.',
            ]);
        }

        $serviceAmount = round((float) $service->price, 2);

        if ($serviceAmount <= 0) {
            throw ValidationException::withMessages([
                'service_choice' => 'This service currently has an invalid price.',
            ]);
        }

        /*
         * Lock the priest row while checking availability and creating
         * the booking, preventing simultaneous requests from taking
         * the same slot.
         */
        $booking = DB::transaction(function () use (
            $priest,
            $service,
            $validated,
            $bookingDate,
            $start,
            $end,
            $duration,
            $serviceAmount
        ) {
            PujariProfile::query()
                ->whereKey($priest->id)
                ->lockForUpdate()
                ->firstOrFail();

            $availability = PujariAvailability::query()
                ->whereKey($validated['availability_id'])
                ->where('pujari_profile_id', $priest->id)
                ->where('status', 'available')
                ->first();

            if (!$availability) {
                throw ValidationException::withMessages([
                    'start_time' => 'This availability is no longer valid. Please select another slot.',
                ]);
            }

            // Verify that the availability record applies to this date.
            $dateMatches = false;

            if ($availability->availability_type === 'specific') {
                $dateMatches = $availability->availability_date
                    && $availability->availability_date->format('Y-m-d')
                        === $bookingDate->format('Y-m-d');
            } elseif ($availability->availability_type === 'recurring') {
                $dateMatches = (int) $availability->day_of_week
                    === (int) $bookingDate->dayOfWeek;
            }

            if (!$dateMatches) {
                throw ValidationException::withMessages([
                    'booking_date' => 'The selected availability does not apply to this date.',
                ]);
            }

            $windowStart = Carbon::parse(
                $bookingDate->format('Y-m-d') . ' ' . $availability->start_time
            );

            $windowEnd = Carbon::parse(
                $bookingDate->format('Y-m-d') . ' ' . $availability->end_time
            );

			if (
			$start->lt($windowStart) ||
			$end->gt($windowEnd) ||
			$windowEnd->lte($windowStart) ||
			$duration < 1 ||
			($windowStart->diffInMinutes($start) % $duration) !== 0
			) {
			throw ValidationException::withMessages([
			'start_time' => 'The selected slot is invalid. Please select an available time slot.',
			]);
			}

            // Check unavailable windows for this date.
            $unavailableWindows = PujariAvailability::query()
                ->where('pujari_profile_id', $priest->id)
                ->where('status', 'unavailable')
                ->where(function ($query) use ($bookingDate) {
                    $query->where(function ($specific) use ($bookingDate) {
                        $specific->where('availability_type', 'specific')
                            ->whereDate(
                                'availability_date',
                                $bookingDate->format('Y-m-d')
                            );
                    })->orWhere(function ($recurring) use ($bookingDate) {
                        $recurring->where('availability_type', 'recurring')
                            ->where('day_of_week', $bookingDate->dayOfWeek);
                    });
                })
                ->get();

            foreach ($unavailableWindows as $blocked) {
                if (!$blocked->start_time || !$blocked->end_time) {
                    continue;
                }

                $blockedStart = Carbon::parse(
                    $bookingDate->format('Y-m-d') . ' ' . $blocked->start_time
                );

                $blockedEnd = Carbon::parse(
                    $bookingDate->format('Y-m-d') . ' ' . $blocked->end_time
                );

                if ($start->lt($blockedEnd) && $end->gt($blockedStart)) {
                    throw ValidationException::withMessages([
                        'start_time' => 'This slot is blocked. Please select another time.',
                    ]);
                }
            }

            // Check existing confirmed bookings and unexpired payment holds.
            $overlappingBooking = PriestBooking::query()
                ->where('pujari_profile_id', $priest->id)
                ->whereDate('booking_date', $bookingDate->format('Y-m-d'))
                ->where('start_time', '<', $end->format('H:i:s'))
                ->where('end_time', '>', $start->format('H:i:s'))
                ->where(function ($query) {
                    $query->where('booking_status', 'confirmed')
                        ->orWhere(function ($pending) {
                            $pending->where('booking_status', 'pending_payment')
                                ->where('payment_expires_at', '>', now());
                        });
                })
                ->lockForUpdate()
                ->exists();

            if ($overlappingBooking) {
                throw ValidationException::withMessages([
                    'start_time' => 'Sorry, this slot has just been booked. Please select another slot.',
                ]);
            }

            // Calculate only taxes enabled for the Priest module.
            $taxes = Tax::query()
                ->where('is_active', true)
                ->whereHas('modules', function ($query) {
                    $query->where('module', 'priests')
                        ->where('is_enabled', true);
                })
                ->orderBy('name')
                ->get(['id', 'name', 'code', 'percentage']);

            $taxDetails = [];
            $taxAmount = 0;

            foreach ($taxes as $tax) {
                $percentage = (float) $tax->percentage;
                $amount = round($serviceAmount * $percentage / 100, 2);

                $taxAmount += $amount;

                $taxDetails[] = [
                    'tax_id' => $tax->id,
                    'name' => $tax->name,
                    'code' => $tax->code,
                    'percentage' => $percentage,
                    'amount' => $amount,
                ];
            }

            $taxAmount = round($taxAmount, 2);
            $totalAmount = round($serviceAmount + $taxAmount, 2);

            $bookingNumber = 'PRB-' . now()->format('Ymd') . '-'
                . strtoupper(Str::random(8));

            return PriestBooking::create([
                'booking_number' => $bookingNumber,
                'pujari_profile_id' => $priest->id,
                'pujari_service_id' => $service->id,
                'pujari_availability_id' => $availability->id,

                'booking_date' => $bookingDate->format('Y-m-d'),
                'start_time' => $start->format('H:i:s'),
                'end_time' => $end->format('H:i:s'),
                'duration_minutes' => $duration,

                'first_name' => $validated['first_name'],
                'last_name' => $validated['last_name'],
                'email' => $validated['email'] ?? null,
                'mobile' => $validated['mobile'],
                'address' => $validated['address'],
                'city' => $validated['city'],
                'state' => $validated['state'],
                'pincode' => $validated['pincode'],

                'service_name' => $service->service_name,
                'service_amount' => $serviceAmount,
                'tax_details' => $taxDetails,
                'tax_amount' => $taxAmount,
                'total_amount' => $totalAmount,

                'booking_status' => 'pending_payment',
                'payment_status' => 'pending',
                'payment_expires_at' => now()->addMinutes(15),
                'terms_accepted_at' => now(),
            ]);
        });

        // Create a unique Cashfree order for this booking.
        $gatewayOrderId = 'PRIEST_' . $booking->id . '_'
            . strtoupper(Str::random(8));
			
			$payment = null;

			try {
			$payment = PriestBookingPayment::create([
			'priest_booking_id' => $booking->id,
			'gateway' => 'cashfree',
			'gateway_order_id' => $gatewayOrderId,
			'amount' => $booking->total_amount,
			'currency' => 'INR',
			'payment_status' => 'pending',
			]);

			$returnUrl = route('priest.booking.payment.return', [
			'order_id' => $gatewayOrderId,
			]);

            $notifyUrl = route('priest.booking.cashfree.webhook');

            $cashfreeResponse = $cashfree->createOrder(
                $gatewayOrderId,
                (float) $booking->total_amount,
                [
                    'customer_id' => 'PRIEST' . $booking->id,
                    'customer_name' => trim(
                        $booking->first_name . ' ' . $booking->last_name
                    ),
                    'customer_email' => $booking->email ?? '',
                    'customer_phone' => $booking->mobile,
                ],
                $returnUrl,
                $notifyUrl
            );

            $payment->update([
                'payment_session_id' => $cashfreeResponse['payment_session_id'],
                'gateway_response' => $cashfreeResponse,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Booking created. Please proceed with payment.',
                'booking_number' => $booking->booking_number,
                'payment_session_id' => $cashfreeResponse['payment_session_id'],
                'order_id' => $gatewayOrderId,
                'amount' => (float) $booking->total_amount,
            ]);
        } catch (Throwable $exception) {
            report($exception);

			DB::transaction(function () use ($booking, $payment, $exception) {

			if ($payment) {
			$payment->update([
			'payment_status' => 'failed',
			'gateway_response' => [
			'error' => $exception->getMessage(),
			],
			]);
			}

			$booking->update([
			'booking_status' => 'payment_failed',
			'payment_status' => 'failed',
			'payment_expires_at' => now(),
			]);
			});

            return response()->json([
                'success' => false,
                'message' => 'Unable to initiate payment. Please try booking again.',
            ], 422);
        }
    }
	
    /**
     * Verify Cashfree payment after customer returns to the website.
     */
    public function paymentReturn(
        Request $request,
        CashfreePaymentService $cashfree
    ) {
        $orderId = $request->query('order_id');

        if (!$orderId) {
            abort(400, 'Missing payment order ID.');
        }

        $payment = PriestBookingPayment::with(
            'priestBooking.pujariProfile'
        )
            ->where('gateway_order_id', $orderId)
            ->where('gateway', 'cashfree')
            ->firstOrFail();

        try {
            $order = $cashfree->fetchOrder($orderId);

            $this->processVerifiedCashfreeOrder(
                $payment,
                $order,
                $cashfree
            );

            $payment->refresh();

            if ($payment->payment_status === 'success') {
                return $this->paymentResultRedirect(
                    $payment->priestBooking,
                    'success'
                );
            }

            if ($payment->payment_status === 'failed') {
                return $this->paymentResultRedirect(
                    $payment->priestBooking,
                    'failed'
                );
            }

            return $this->paymentResultRedirect(
                $payment->priestBooking,
                'pending'
            );

        } catch (Throwable $exception) {
            report($exception);

            return $this->paymentResultRedirect(
                $payment->priestBooking,
                'pending'
            );
        }
    }

    /**
     * Handle Cashfree webhook notifications.
     */
    public function webhook(
        Request $request,
        CashfreePaymentService $cashfree
    ) {
        $rawBody = $request->getContent();

        $signature = (string) $request->header(
            'x-webhook-signature'
        );

        $timestamp = (string) $request->header(
            'x-webhook-timestamp'
        );

        if (!$cashfree->verifyWebhookSignature(
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

        $orderId = data_get(
            $payload,
            'data.order.order_id'
        );

        if (!$orderId) {
            return response()->json([
                'success' => false,
                'message' => 'Missing order ID.',
            ], 400);
        }

        $payment = PriestBookingPayment::where(
            'gateway_order_id',
            $orderId
        )
            ->where('gateway', 'cashfree')
            ->first();

        if (!$payment) {
            return response()->json([
                'success' => false,
                'message' => 'Payment record not found.',
            ], 404);
        }

        try {
            $order = $cashfree->fetchOrder($orderId);

            $this->processVerifiedCashfreeOrder(
                $payment,
                $order,
                $cashfree
            );

            return response()->json([
                'success' => true,
                'message' => 'Webhook processed.',
            ]);

        } catch (Throwable $exception) {
            report($exception);

            return response()->json([
                'success' => false,
                'message' => 'Webhook processing failed.',
            ], 500);
        }
    }

    /**
     * Verify the order and successful payment directly with Cashfree.
     */
    private function processVerifiedCashfreeOrder(
        PriestBookingPayment $payment,
        array $order,
        CashfreePaymentService $cashfree
    ): void {
        $orderId = $payment->gateway_order_id;

        if (($order['order_id'] ?? null) !== $orderId) {
            throw new \RuntimeException(
                'Cashfree order ID mismatch.'
            );
        }

        $expectedAmount = (float) $payment->amount;
        $actualAmount = (float) ($order['order_amount'] ?? 0);

        if (
            abs($expectedAmount - $actualAmount) > 0.001 ||
            ($order['order_currency'] ?? '') !== $payment->currency
        ) {
            throw new \RuntimeException(
                'Cashfree order amount or currency mismatch.'
            );
        }

        if (($order['order_status'] ?? '') === 'PAID') {
            $payments = $cashfree->fetchPayments($orderId);

            $successfulPayment = collect($payments)->first(
                function ($item) use ($orderId, $expectedAmount, $payment) {
                    return ($item['order_id'] ?? null) === $orderId
                        && ($item['payment_status'] ?? null) === 'SUCCESS'
                        && ($item['payment_currency'] ?? '') === $payment->currency
                        && abs(
                            (float) ($item['payment_amount'] ?? 0)
                            - $expectedAmount
                        ) <= 0.001;
                }
            );

            if (!$successfulPayment) {
                throw new \RuntimeException(
                    'No matching successful Cashfree payment was found.'
                );
            }

            $this->markPriestBookingPaid(
                $payment,
                $order,
                $successfulPayment
            );

            return;
        }

        if (in_array(
            $order['order_status'] ?? '',
            ['EXPIRED', 'TERMINATED'],
            true
        )) {
            $this->markPriestBookingPaymentFailed(
                $payment,
                $order
            );
        }
    }

    /**
     * Confirm a booking only after successful server-side verification.
     */
    private function markPriestBookingPaid(
        PriestBookingPayment $payment,
        array $order,
        array $successfulPayment
    ): void {
        DB::transaction(function () use (
            $payment,
            $order,
            $successfulPayment
        ) {
            // Use the same lock order as store(): priest first, then booking.
            // This serializes payment confirmation against new slot reservations.
            $priestId = PriestBooking::query()
                ->whereKey($payment->priest_booking_id)
                ->value('pujari_profile_id');

            PujariProfile::query()
                ->whereKey($priestId)
                ->lockForUpdate()
                ->firstOrFail();

            $lockedPayment = PriestBookingPayment::query()
                ->whereKey($payment->id)
                ->lockForUpdate()
                ->firstOrFail();

            $booking = PriestBooking::query()
                ->whereKey($lockedPayment->priest_booking_id)
                ->lockForUpdate()
                ->firstOrFail();

            // Do not process duplicate successful notifications again.
            if ($lockedPayment->payment_status === 'success') {
                return;
            }

            $gatewayPaymentId = (string) (
                $successfulPayment['cf_payment_id'] ?? ''
            );

            if ($gatewayPaymentId === '') {
                throw new \RuntimeException(
                    'Cashfree payment ID is missing.'
                );
            }

            $paymentIdExists = PriestBookingPayment::query()
                ->where('gateway_payment_id', $gatewayPaymentId)
                ->where('id', '!=', $lockedPayment->id)
                ->exists();

            if ($paymentIdExists) {
                throw new \RuntimeException(
                    'Cashfree payment ID is already linked to another record.'
                );
            }

            // Check whether another booking has taken this slot.
            $overlapExists = PriestBooking::query()
                ->where('pujari_profile_id', $booking->pujari_profile_id)
                ->whereDate('booking_date', $booking->booking_date)
                ->where('id', '!=', $booking->id)
                ->where('start_time', '<', $booking->end_time)
                ->where('end_time', '>', $booking->start_time)
                ->where(function ($query) {
                    $query->where('booking_status', 'confirmed')
                        ->orWhere(function ($pending) {
                            $pending->where('booking_status', 'pending_payment')
                                ->where('payment_expires_at', '>', now());
                        });
                })
                ->exists();

            $lockedPayment->update([
                'gateway_payment_id' => $gatewayPaymentId,
                'payment_status' => 'success',
                'paid_at' => now(),
                'gateway_response' => [
                    'order' => $order,
                    'payment' => $successfulPayment,
                ],
            ]);

            $booking->update([
                'payment_status' => 'paid',
                'booking_status' => $overlapExists
                    ? 'payment_review'
                    : 'confirmed',
                'payment_expires_at' => null,
            ]);
        });
    }

    /**
     * Mark an expired or terminated Cashfree order as failed.
     */
    private function markPriestBookingPaymentFailed(
        PriestBookingPayment $payment,
        array $order
    ): void {
        DB::transaction(function () use ($payment, $order) {
            $lockedPayment = PriestBookingPayment::query()
                ->whereKey($payment->id)
                ->lockForUpdate()
                ->firstOrFail();

            if ($lockedPayment->payment_status === 'success') {
                return;
            }

            $booking = PriestBooking::query()
                ->whereKey($lockedPayment->priest_booking_id)
                ->lockForUpdate()
                ->firstOrFail();

            $lockedPayment->update([
                'payment_status' => 'failed',
                'gateway_response' => [
                    'order' => $order,
                ],
            ]);

            if ($booking->payment_status !== 'paid') {
                $booking->update([
                    'payment_status' => 'failed',
                    'booking_status' => 'payment_failed',
                    'payment_expires_at' => now(),
                ]);
            }
        });
    }
	
	/**
 * Display the successfully paid Priest Booking.
 */
public function success(string $slug)
{
    $bookingNumber = session('priest_booking_number');
    $paymentStatus = session('priest_booking_payment_status');

    if (!$bookingNumber || $paymentStatus !== 'success') {
        return redirect()->route('priest.book', [
            'slug' => $slug,
        ]);
    }

    $booking = PriestBooking::with([
        'pujariProfile',
        'pujariService',
        'pujariAvailability',
        'payments',
    ])
        ->where('booking_number', $bookingNumber)
        ->where('payment_status', 'paid')
        ->first();

    if (!$booking) {
        abort(404);
    }

    $actualSlug = $booking->pujariProfile->pujari_number
        ?: Str::slug($booking->pujariProfile->display_name);

    if ($actualSlug !== $slug) {
        abort(404);
    }

    return view('frontend.priests.booking-success', compact('booking'));
}

    /**
     * Redirect the customer to the relevant Priest Booking page.
     */
    private function paymentResultRedirect(
        PriestBooking $booking,
        string $status
    ) {
        // Prefer the stable priest number to avoid duplicate-name slug collisions.
        $slug = $booking->pujariProfile->pujari_number
            ?: Str::slug($booking->pujariProfile->display_name);

        $route = $status === 'success'
            ? 'priest.booking.success'
            : 'priest.book';

        return redirect()->route($route, [
            'slug' => $slug,
        ])->with([
            'priest_booking_payment_status' => $status,
            'priest_booking_number' => $booking->booking_number,
        ]);
    }

}
