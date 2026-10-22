<?php

namespace App\Http\Controllers\Web\Customer;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CustomerOrderController extends Controller
{
    public function index(Request $request): View
    {
        $customerProfileId = $request->user()->customerProfile?->id;

        abort_unless($customerProfileId, 403, 'Customer profile not found.');

        $baseOrders = Order::query()->where('customer_profile_id', $customerProfileId);

        $totalOrdersCount = (clone $baseOrders)->count();
        $activeOrdersCount = (clone $baseOrders)
            ->whereRaw("LOWER(COALESCE(fulfillment_status, status, 'pending')) NOT IN (?, ?)", ['delivered', 'cancelled'])
            ->count();
        $deliveredOrdersCount = (clone $baseOrders)
            ->whereRaw("LOWER(COALESCE(fulfillment_status, status, 'pending')) = ?", ['delivered'])
            ->count();
        $productsPurchasedCount = \App\Models\OrderItem::query()
            ->whereHas('order', fn ($query) => $query->where('customer_profile_id', $customerProfileId))
            ->sum('quantity');

        $orders = (clone $baseOrders)
            ->with(['items.product', 'addresses', 'shipments'])
            ->latest('id')
            ->paginate(10)
            ->withQueryString();

        $mappedOrders = $orders->getCollection()->map(function (Order $order): array {
            $address = $order->addresses->first();
            $status = $order->fulfillment_status ?: $order->status;
            $shipment = $order->shipments->sortByDesc('id')->first();

            return [
                'id' => $order->order_id,
                'date' => optional($order->placed_at)->format('d F Y') ?? $order->created_at?->format('d F Y'),
                'status' => $this->statusLabel($status),
                'status_key' => strtolower((string) ($status ?: 'pending')),
                'status_class' => $this->statusClass($status),
                'items' => (int) $order->items->sum('quantity'),
                'total' => (float) $order->total_amount,
                'payment' => $this->paymentLabel($order->payment_status),
                'payment_class' => $this->paymentClass($order->payment_status),
                'delivery' => $this->deliveryLabel($order),
                'address' => $address?->city ?? $address?->address_line_1 ?? 'Address not available',
                'tracking' => $shipment?->tracking_number,
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
            'totalOrdersCount' => $totalOrdersCount,
            'activeOrdersCount' => $activeOrdersCount,
            'deliveredOrdersCount' => $deliveredOrdersCount,
            'productsPurchasedCount' => (int) $productsPurchasedCount,
        ]);
    }


    public function show(Request $request, string $order): View
    {
        return view('frontend.orders.show', ['order' => $this->ownedOrder($request, $order)]);
    }

    public function track(Request $request, string $order): View
    {
        return view('frontend.orders.track', [
            'order' => $this->ownedOrder($request, $order),
            'trackingLookup' => false,
        ]);
    }

    public function invoice(Request $request, string $order): View
    {
        return view('frontend.orders.invoice', ['order' => $this->ownedOrder($request, $order)]);
    }

    /** Public lookup requires both the exact order number and registered account email. */
    public function trackLookup(Request $request): View|RedirectResponse
    {
        $validated = $request->validate([
            'order_number' => ['required', 'string', 'max:80'],
            'email' => ['required', 'email:rfc', 'max:254'],
        ]);

        $order = Order::query()
            ->where('order_id', trim($validated['order_number']))
            ->whereHas('customerProfile.user', function ($query) use ($validated) {
                $query->whereRaw('LOWER(email) = ?', [mb_strtolower(trim($validated['email']))]);
            })
            ->with(['items', 'addresses', 'statusHistories' => fn ($q) => $q->orderBy('changed_at')->orderBy('id'), 'shipments.trackingEvents'])
            ->first();

        if (! $order) {
            return redirect()->route('store.track-order')
                ->withInput($request->only('order_number', 'email'))
                ->withErrors(['order_number' => 'We could not find an order matching those details. Please check the order number and registered email.']);
        }

        return view('frontend.orders.track', ['order' => $order, 'trackingLookup' => true]);
    }

    private function ownedOrder(Request $request, string $orderId): Order
    {
        $customerProfileId = $request->user()->customerProfile?->id;
        abort_unless($customerProfileId, 403, 'Customer profile not found.');

        return Order::query()
            ->where('order_id', $orderId)
            ->where('customer_profile_id', $customerProfileId)
            ->with([
                'currency', 'items', 'addresses',
                'statusHistories' => fn ($q) => $q->orderBy('changed_at')->orderBy('id'),
                'shipments.trackingEvents',
            ])
            ->firstOrFail();
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
        $status = strtolower((string) ($order->fulfillment_status ?: $order->status));

        return match ($status) {
            'delivered', 'completed' => $order->delivered_at
                ? 'Delivered on '.$order->delivered_at->format('d F Y')
                : 'Delivered',
            'dispatched', 'shipped' => 'Shipped',
            'processing' => 'Preparing for shipment',
            'cancelled' => 'Cancelled',
            default => 'Order placed',
        };
    }
}
