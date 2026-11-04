<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use RuntimeException;

class CashfreePaymentService
{
    private const API_VERSION = '2023-08-01';

    private string $clientId;
    private string $clientSecret;
    private string $environment;
    private string $baseUrl;

    public function __construct()
    {
        $this->clientId = (string) config('services.cashfree.client_id');
        $this->clientSecret = (string) config('services.cashfree.client_secret');
        $this->environment = (string) config(
            'services.cashfree.environment',
            'sandbox'
        );

        if ($this->clientId === '' || $this->clientSecret === '') {
            throw new RuntimeException(
                'Cashfree API credentials are not configured.'
            );
        }

        $this->baseUrl = $this->environment === 'production'
            ? 'https://api.cashfree.com/pg'
            : 'https://sandbox.cashfree.com/pg';
    }

    /**
     * Create a Cashfree payment order.
     */
    public function createOrder(
        string $orderId,
        float $amount,
        array $customerDetails,
        string $returnUrl,
        ?string $notifyUrl = null
    ): array {
        $payload = [
            'order_id' => $orderId,
            'order_amount' => round($amount, 2),
            'order_currency' => 'INR',
            'customer_details' => [
                'customer_id' => (string) $customerDetails['customer_id'],
                'customer_name' => $customerDetails['customer_name'] ?? '',
                'customer_email' => $customerDetails['customer_email'] ?? '',
                'customer_phone' => (string) $customerDetails['customer_phone'],
            ],
            'order_meta' => [
                'return_url' => $returnUrl,
            ],
        ];

        if ($notifyUrl) {
            $payload['order_meta']['notify_url'] = $notifyUrl;
        }

        $response = Http::baseUrl($this->baseUrl)
            ->withHeaders($this->headers())
            ->acceptJson()
            ->timeout(30)
            ->post('/orders', $payload);

        if (!$response->successful()) {
            throw new RuntimeException(
                'Cashfree order creation failed: ' .
                $this->errorMessage($response->json())
            );
        }

        $data = $response->json();

        if (
            empty($data['order_id']) ||
            empty($data['payment_session_id'])
        ) {
            throw new RuntimeException(
                'Cashfree returned an incomplete order response.'
            );
        }

        return $data;
    }

    /**
     * Fetch an existing Cashfree order.
     */
    public function fetchOrder(string $orderId): array
    {
        $response = Http::baseUrl($this->baseUrl)
            ->withHeaders($this->headers())
            ->acceptJson()
            ->timeout(30)
            ->get('/orders/' . rawurlencode($orderId));

        if (!$response->successful()) {
            throw new RuntimeException(
                'Cashfree order verification failed: ' .
                $this->errorMessage($response->json())
            );
        }

        return $response->json();
    }
	
	
    /**
     * Fetch all payment attempts for a Cashfree order.
     */
    public function fetchPayments(string $orderId): array
    {
        $response = Http::baseUrl($this->baseUrl)
            ->withHeaders($this->headers())
            ->acceptJson()
            ->timeout(30)
            ->get('/orders/' . rawurlencode($orderId) . '/payments');

        if (!$response->successful()) {
            throw new RuntimeException(
                'Cashfree payment verification failed: ' .
                $this->errorMessage($response->json())
            );
        }

        $data = $response->json();

        if (!is_array($data)) {
            throw new RuntimeException(
                'Invalid Cashfree payments response.'
            );
        }

        return $data;
    }

    /**
     * Verify Cashfree webhook signature using the original request body.
     */
    public function verifyWebhookSignature(
        string $rawBody,
        string $timestamp,
        string $signature
    ): bool {
        if (
            $rawBody === '' ||
            $timestamp === '' ||
            $signature === ''
        ) {
            return false;
        }

        $expectedSignature = base64_encode(
            hash_hmac(
                'sha256',
                $timestamp . $rawBody,
                $this->clientSecret,
                true
            )
        );

        return hash_equals($expectedSignature, $signature);
    }

    /**
     * Common Cashfree API headers.
     */
    private function headers(): array
    {
        return [
            'x-client-id' => $this->clientId,
            'x-client-secret' => $this->clientSecret,
            'x-api-version' => self::API_VERSION,
        ];
    }

    /**
     * Extract a readable API error.
     */
    private function errorMessage(?array $data): string
    {
        return $data['message']
            ?? $data['message_code']
            ?? 'Unknown Cashfree API error.';
    }
}
