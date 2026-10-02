<?php

namespace App\Http\Controllers\Web\Customer;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CustomerOrderController extends Controller
{
    public function index(Request $request): View
    {
        $customerProfileId = $request->user()->customerProfile?->id;

        abort_unless($customerProfileId, 403, 'Customer profile not found.');

        $orders = Order::query()
            ->with(['items.product', 'addresses'])
            ->where('customer_profile_id', $customerProfileId)
            ->latest('id')
            ->paginate(10)
            ->withQueryString();

        $mappedOrders = $orders->getCollection()->map(function (Order $order): array {
            $address = $order->addresses->first();

            return [
                'id' => $order->order_id,
                'date' => optional($order->placed_at)->format('d F Y') ?? $order->created_at?->format('d F Y'),
                'status' => $this->statusLabel($order->status),
                'status_class' => $this->statusClass($order->status),
                'items' => $order->items->sum('quantity'),
                'total' => (float) $order->total_amount,
                'payment' => $this->paymentLabel($order->payment_status),
                'payment_class' => $this->paymentClass($order->payment_status),
                'delivery' => $this->deliveryLabel($order),
                'address' => $address?->city ?? $address?->address_line_1 ?? 'Address not available',
                'tracking' => null,
                'products' => $order->items->map(fn ($item) => [
                    'name' => $item->product_name,
                    'qty' => (int) $item->quantity,
                    'price' => (float) $item->unit_price,
                ])->values()->all(),
            ];
        });

        $orders->setCollection($mappedOrders);

        return view('frontend.dashboard.orders', [
            'orders' => $orders,
            'activeOrders' => $orders->getCollection()->whereNotIn('status', ['Delivered', 'Cancelled']),
            'deliveredOrders' => $orders->getCollection()->where('status', 'Delivered'),
        ]);
    }

    private function statusLabel(?string $status): string
    {
        return str($status ?: 'pending')->replace('_', ' ')->title()->toString();
    }

    private function statusClass(?string $status): string
    {
        return match ($status) {
            'delivered', 'completed' => 'success',
            'cancelled', 'failed' => 'danger',
            'dispatched', 'shipped' => 'primary',
            default => 'warning',
        };
    }

    private function paymentLabel(?string $status): string
    {
        return str($status ?: 'pending')->replace('_', ' ')->title()->toString();
    }

    private function paymentClass(?string $status): string
    {
        return match ($status) {
            'paid', 'captured', 'completed' => 'success',
            'failed', 'refunded' => 'secondary',
            default => 'warning',
        };
    }

    private function deliveryLabel(Order $order): string
    {
        return match ($order->fulfillment_status) {
            'delivered' => $order->delivered_at
                ? 'Delivered on '.$order->delivered_at->format('d F Y')
                : 'Delivered',
            'dispatched', 'shipped' => 'Shipped',
            'processing' => 'Preparing for shipment',
            'cancelled' => 'Cancelled',
            default => 'Order placed',
        };
    }
}
