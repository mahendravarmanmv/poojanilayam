<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\City;
use App\Models\Country;
use App\Models\State;
use App\Models\Cart;
use App\Models\CartCheckoutSnapshot;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\OrderAddress;
use App\Models\OrderStatusHistory;
use App\Models\Inventory;
use App\Models\InventoryTransaction;
use App\Models\Currency;
use App\Models\Payment;
use App\Models\PaymentStatusHistory;
use Illuminate\Support\Str;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class StoreCheckoutController extends Controller
{
    public function index(Request $request): View|RedirectResponse
    {
        $user = $request->user()->loadMissing([
            'profile',
            'customerProfile',
        ]);

        if (! $user->customerProfile) {
            return redirect()
                ->route('dashboard.profile')
                ->with(
                    'error',
                    'Your customer profile is not available. Please complete your account setup before checkout.'
                );
        }

        $cart = $this->activeCart($request);

        if (! $cart || ! $cart->items->count()) {
            return redirect()
                ->route('store.cart')
                ->with(
                    'error',
                    'Your cart is empty. Please add a product before checkout.'
                );
        }

        try {
            $calculation = $this->calculateCart($cart);
        } catch (ValidationException $exception) {
            return redirect()
                ->route('store.cart')
                ->withErrors($exception->errors());
        }

        $addresses = $user->addresses()
            ->with([
                'city',
                'state',
                'country',
            ])
            ->orderByDesc('is_default')
            ->latest('id')
            ->get();

        $selectedAddressId = $request->session()
            ->get('store_checkout.address_id');

        if (
            ! $selectedAddressId ||
            ! $addresses->contains('id', $selectedAddressId)
        ) {
            $selectedAddressId = $addresses
                ->firstWhere('is_default', true)
                ?->id;
        }

        $addresses = $addresses
            ->map(function (Address $address) use (
                $user,
                $selectedAddressId
            ) {
                return [
                    'id' => $address->id,

                    'type' => str($address->address_type)
                        ->replace('_', ' ')
                        ->title()
                        ->toString(),

                    'name' => $address->name
                        ?: ($user->profile?->display_name ?: $user->name),

                    'phone' => $address->phone ?: $user->mobile,

                    'address' => collect([
                        $address->address_line_1,
                        $address->address_line_2,
                        $address->landmark,
                    ])
                        ->filter()
                        ->implode(', '),

                    'city' => $address->city?->name,

                    'state' => $address->state?->name,

                    'country' => $address->country?->name,

                    'pincode' => $address->postal_code,

                    'selected' => (int) $address->id === (int) $selectedAddressId,
                ];
            })
            ->values();

        return view('frontend.store.checkout', [
            'customer' => [
                'name' => $user->profile?->display_name ?: $user->name,
                'email' => $user->email,
                'phone' => $user->mobile,
            ],

            'addresses' => $addresses,

            'cartItems' => $calculation['cartItems'],

            'subtotal' => $calculation['subtotal'],

            'discount' => $calculation['discount'],

            'delivery' => $calculation['delivery'],

            'tax' => $calculation['tax'],

            'total' => $calculation['total'],

            'currencyCode' => $calculation['currency_code'],

            'currencySymbol' => Currency::query()
                ->where('code', $calculation['currency_code'])
                ->value('symbol') ?: '₹',
        ]);
    }

    /**
     * Save a new address from checkout and select it for the current checkout.
     */
    public function storeCheckoutAddress(Request $request)
    {
        $validated = $request->validate([
            'address_type' => ['required', 'string', 'max:30'],
            'address_line_1' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:150'],
            'state' => ['required', 'string', 'max:150'],
            'postal_code' => ['required', 'string', 'max:20'],
            'phone' => ['required', 'string', 'max:20'],
            'name' => ['required', 'string', 'max:150'],
            'save_for_future' => ['nullable', 'boolean'],
        ]);

        $country = Country::query()
            ->where('name', 'India')
            ->where('is_active', true)
            ->first();

        if (! $country) {
            return response()->json([
                'success' => false,
                'message' => 'India is not configured as an active country. Please contact support.',
            ], 422);
        }

        $state = State::query()
            ->where('country_id', $country->id)
            ->where('is_active', true)
            ->whereRaw('LOWER(name) = ?', [mb_strtolower(trim($validated['state']))])
            ->first();

        if (! $state) {
            return response()->json([
                'success' => false,
                'message' => 'The selected state was not found. Please select a valid state.',
            ], 422);
        }

        $city = City::query()
            ->where('state_id', $state->id)
            ->where('is_active', true)
            ->whereRaw('LOWER(name) = ?', [mb_strtolower(trim($validated['city']))])
            ->first();

        if (! $city) {
            return response()->json([
                'success' => false,
                'message' => 'The entered city was not found for the selected state. Please check the city name.',
            ], 422);
        }

        $user = $request->user();

        $address = DB::transaction(function () use ($user, $validated, $country, $state, $city) {
            $makeDefault = ! $user->addresses()->exists();

            $typeText = mb_strtolower(trim($validated['address_type']));
            $type = str_contains($typeText, 'office') ? 'office'
                : (str_contains($typeText, 'other') ? 'other' : 'home');

            return $user->addresses()->create([
                'address_type' => $type,
                'name' => $validated['name'],
                'phone' => $validated['phone'],
                'address_line_1' => $validated['address_line_1'],
                'address_line_2' => null,
                'landmark' => null,
                'country_id' => $country->id,
                'state_id' => $state->id,
                'city_id' => $city->id,
                'postal_code' => $validated['postal_code'],
                'is_default' => $makeDefault,
            ]);
        });

        $request->session()->put('store_checkout.address_id', $address->id);

        return response()->json([
            'success' => true,
            'message' => 'Address saved and selected for this checkout.',
            'redirect' => route('store.checkout'),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'delivery_address' => [
                'required',
                'integer',
            ],

            'order_notes' => [
                'nullable',
                'string',
                'max:2000',
            ],
        ]);

        $user = $request->user()->loadMissing([
            'profile',
            'customerProfile',
        ]);

        if (! $user->customerProfile) {
            throw ValidationException::withMessages([
                'delivery_address' =>
                    'Your customer profile is not available. Please complete your account setup before checkout.',
            ]);
        }

        /*
        |--------------------------------------------------------------------------
        | Validate the selected address belongs to the logged-in user.
        |--------------------------------------------------------------------------
        */

        $address = $user->addresses()
            ->with([
                'city',
                'state',
                'country',
            ])
            ->find($validated['delivery_address']);

        if (! $address) {
            throw ValidationException::withMessages([
                'delivery_address' =>
                    'Please select a valid saved delivery address.',
            ]);
        }

        $this->assertDeliveryAddressReady($address);

        /*
        |--------------------------------------------------------------------------
        | Load the user's active cart.
        |--------------------------------------------------------------------------
        */

        $cart = $this->activeCart($request);

        if (! $cart || ! $cart->items->count()) {
            return redirect()
                ->route('store.cart')
                ->with(
                    'error',
                    'Your cart is empty. Please add a product before checkout.'
                );
        }

        /*
        |--------------------------------------------------------------------------
        | Revalidate cart and create/update checkout snapshot atomically.
        |--------------------------------------------------------------------------
        */

        $snapshot = DB::transaction(function () use (
            $cart,
            $user
        ) {
            /*
            |--------------------------------------------------------------------------
            | IMPORTANT:
            | Recalculate everything again here.
            |
            | The GET request is never trusted as the final price/stock check.
            |--------------------------------------------------------------------------
            */

            $calculation = $this->calculateCart($cart);

            /*
            |--------------------------------------------------------------------------
            | Synchronize cart item snapshots with current catalog values.
            |--------------------------------------------------------------------------
            */

            foreach ($calculation['lines'] as $line) {
                $line['cart_item']->update([
                    'product_name' => $line['name'],
                    'sku' => $line['sku'],
                    'unit_price' => $line['unit_price'],
                    'tax_percentage' => $line['tax_percentage'],
                    'tax_amount' => $line['tax_amount'],
                    'line_total' => $line['line_total'],
                ]);
            }

            if (
                $cart->currency_code !==
                $calculation['currency_code']
            ) {
                $cart->update([
                    'currency_code' => $calculation['currency_code'],
                ]);
            }

            /*
            |--------------------------------------------------------------------------
            | Reuse the latest active checkout snapshot for this cart.
            |--------------------------------------------------------------------------
            */

            $snapshot = CartCheckoutSnapshot::query()
                ->where('cart_id', $cart->id)
                ->where('status', 'active')
                ->latest('id')
                ->first();

            $payload = [
                'customer_profile_id' =>
                    $user->customerProfile->id,

                'status' => 'active',

                'currency_code' =>
                    $calculation['currency_code'],

                'subtotal' =>
                    $calculation['subtotal'],

                'discount_amount' =>
                    $calculation['discount'],

                'tax_amount' =>
                    $calculation['tax'],

                'shipping_amount' =>
                    $calculation['delivery'],

                'total_amount' =>
                    $calculation['total'],

                'cart_snapshot' =>
                    $calculation['cart_snapshot'],

                'pricing_snapshot' =>
                    $calculation['pricing_snapshot'],

                'tax_snapshot' =>
                    $calculation['tax_snapshot'],
            ];

            if ($snapshot) {
                $snapshot->update($payload);
            } else {
                $snapshot = CartCheckoutSnapshot::create(
                    array_merge(
                        $payload,
                        [
                            'cart_id' => $cart->id,

                            'checkout_token' =>
                                bin2hex(random_bytes(32)),
                        ]
                    )
                );
            }

            return $snapshot->fresh();
        });

        /*
        |--------------------------------------------------------------------------
        | Keep checkout context for the next step.
        |
        | The actual payment integration is NOT implemented here.
        |--------------------------------------------------------------------------
        */

        $request->session()->put([
            'store_checkout.checkout_token' =>
                $snapshot->checkout_token,

            'store_checkout.address_id' =>
                $address->id,

            'store_checkout.order_notes' =>
                $validated['order_notes'] ?? null,
        ]);

        return redirect()->route('store.payment');
    }


    /**
     * Show payment review for the current, authenticated checkout snapshot.
     * Online payment methods remain unavailable until a gateway is configured.
     */
    public function payment(Request $request): View|RedirectResponse
    {
        $user = $request->user()->loadMissing(['profile', 'customerProfile']);
        $token = $request->session()->get('store_checkout.checkout_token');
        $addressId = $request->session()->get('store_checkout.address_id');

        if (! $user->customerProfile || ! $token || ! $addressId) {
            return redirect()->route('store.checkout')
                ->with('error', 'Please complete checkout before proceeding to payment.');
        }

        $snapshot = CartCheckoutSnapshot::query()
            ->where('checkout_token', $token)
            ->where('customer_profile_id', $user->customerProfile->id)
            ->where('status', 'active')
            ->where(function ($query) {
                $query->whereNull('expires_at')->orWhere('expires_at', '>', now());
            })
            ->first();

        if (! $snapshot) {
            return redirect()->route('store.checkout')
                ->with('error', 'Your checkout session has expired. Please review your cart again.');
        }

        $address = $user->addresses()
            ->with(['city', 'state', 'country'])
            ->find($addressId);

        if (! $address) {
            return redirect()->route('store.checkout')
                ->with('error', 'Please select a valid delivery address.');
        }

        $cart = Cart::query()
            ->whereKey($snapshot->cart_id)
            ->where('user_id', $user->id)
            ->where('status', 'active')
            ->with([
                'items.product.category',
                'items.product.images' => fn ($query) => $query->orderBy('sort_order')->orderBy('id'),
                'items.product.prices' => fn ($query) => $query->where('active', true)->with('currency'),
                'items.product.taxRules' => fn ($query) => $query->where('active', true),
                'items.product.inventories' => fn ($query) => $query->where('active', true),
            ])->first();

        if (! $cart || $cart->items->isEmpty()) {
            return redirect()->route('store.cart')->with('error', 'Your cart is empty.');
        }

        try {
            $calculation = $this->calculateCart($cart);
        } catch (ValidationException $exception) {
            return redirect()->route('store.cart')->withErrors($exception->errors());
        }

        $addressText = collect([
            $address->address_line_1,
            $address->address_line_2,
            $address->landmark,
        ])->filter()->implode(', ');

        $currency = Currency::query()->where('code', $calculation['currency_code'])->first();

        return view('frontend.store.payment', [
            'order' => [
                'order_number' => 'CHK-' . $snapshot->id,
                'subtotal' => $calculation['subtotal'],
                'discount' => $calculation['discount'],
                'delivery' => $calculation['delivery'],
                'tax' => $calculation['tax'],
                'total' => $calculation['total'],
            ],
            'cartItems' => $calculation['lines'] ? collect($calculation['lines'])->map(fn ($line) => [
                'name' => $line['name'],
                'price' => $line['unit_price'],
                'quantity' => $line['quantity'],
                'image' => $line['image'],
            ])->values() : collect(),
            'deliveryAddress' => [
                'name' => $address->name ?: ($user->profile?->display_name ?: $user->name),
                'phone' => $address->phone ?: $user->mobile,
                'address' => $addressText,
                'city' => $address->city?->name ?? '',
                'state' => $address->state?->name ?? '',
                'pincode' => $address->postal_code,
            ],
            'currencySymbol' => $currency?->symbol ?: '₹',
        ]);
    }

    /**
     * Place an order using Cash on Delivery only. Online methods must not be
     * accepted until a real payment gateway and server-side verification exist.
     */
    public function placeOrder(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'payment_method' => ['required', 'in:cod'],
        ]);

        $user = $request->user()->loadMissing(['profile', 'customerProfile']);
        $token = $request->session()->get('store_checkout.checkout_token');
        $addressId = $request->session()->get('store_checkout.address_id');

        if (! $user->customerProfile || ! $token || ! $addressId) {
            return redirect()->route('store.checkout')
                ->with('error', 'Your checkout session is incomplete. Please start checkout again.');
        }

        try {
            $order = DB::transaction(function () use ($request, $user, $token, $addressId, $validated) {
                $snapshot = CartCheckoutSnapshot::query()
                    ->where('checkout_token', $token)
                    ->where('customer_profile_id', $user->customerProfile->id)
                    ->lockForUpdate()
                    ->first();

                if (! $snapshot || $snapshot->status !== 'active' ||
                    ($snapshot->expires_at && $snapshot->expires_at->isPast())) {
                    throw ValidationException::withMessages([
                        'checkout' => 'This checkout has already been completed or has expired. Please review your cart again.',
                    ]);
                }

                $address = $user->addresses()->with(['city', 'state', 'country'])->find($addressId);
                if (! $address) {
                    throw ValidationException::withMessages([
                        'delivery_address' => 'Please select a valid delivery address.',
                    ]);
                }
                $this->assertDeliveryAddressReady($address);

                $cart = Cart::query()
                    ->whereKey($snapshot->cart_id)
                    ->where('user_id', $user->id)
                    ->where('status', 'active')
                    ->with([
                        'items.product.category',
                        'items.product.images' => fn ($query) => $query->orderBy('sort_order')->orderBy('id'),
                        'items.product.prices' => fn ($query) => $query->where('active', true)->with('currency'),
                        'items.product.taxRules' => fn ($query) => $query->where('active', true),
                        'items.product.inventories' => fn ($query) => $query->where('active', true),
                    ])->lockForUpdate()->first();

                if (! $cart || $cart->items->isEmpty()) {
                    throw ValidationException::withMessages([
                        'cart' => 'Your cart is empty. Please add products before placing an order.',
                    ]);
                }

                // Recalculate current catalog pricing and tax, never trust browser totals.
                $calculation = $this->calculateCart($cart);
                $currency = Currency::query()->where('code', $calculation['currency_code'])->first();

                $order = Order::create([
                    'customer_profile_id' => $user->customerProfile->id,
                    'order_id' => $this->uniqueOrderId(),
                    'reference_id' => 'PNR-' . strtoupper(Str::random(16)),
                    'status' => 'pending',
                    'fulfillment_status' => 'pending',
                    'currency_code' => $calculation['currency_code'],
                    'currency_id' => $currency?->id,
                    'subtotal' => $calculation['subtotal'],
                    'discount_amount' => $calculation['discount'],
                    'tax_amount' => $calculation['tax'],
                    'shipping_amount' => $calculation['delivery'],
                    'total_amount' => $calculation['total'],
                    'payment_status' => 'pending',
                    'placed_at' => now(),
                    'customer_notes' => $request->session()->get('store_checkout.order_notes'),
                ]);

                foreach ($calculation['lines'] as $line) {
                    OrderItem::create([
                        'order_id' => $order->id,
                        'product_id' => $line['product_id'],
                        'product_name' => $line['name'],
                        'product_sku' => $line['sku'],
                        'quantity' => $line['quantity'],
                        'unit_price' => $line['unit_price'],
                        'discount_amount' => 0,
                        'tax_percentage' => $line['tax_percentage'],
                        'tax_amount' => $line['tax_amount'],
                        'shipping_amount' => 0,
                        'line_total' => $line['line_total'],
                        'product_snapshot' => [
                            'name' => $line['name'],
                            'sku' => $line['sku'],
                            'category' => $line['category'],
                            'image' => $line['image'],
                            'currency_code' => $calculation['currency_code'],
                        ],
                    ]);

                    // Lock and deduct tracked physical inventory consistently.
                    $product = Product::query()->findOrFail($line['product_id']);
                    if (! $product->is_digital) {
                        $inventories = Inventory::query()
                            ->where('product_id', $product->id)
                            ->where('active', true)
                            ->where('track_inventory', true)
                            ->orderBy('id')
                            ->lockForUpdate()
                            ->get();

                        if ($inventories->isNotEmpty()) {
                            $available = (int) $inventories->sum('quantity_available');
                            $remaining = (int) $line['quantity'];
                            if ($available < $remaining) {
                                throw ValidationException::withMessages([
                                    'cart' => "Insufficient stock for '{$line['name']}'. Please update your cart.",
                                ]);
                            }

                            foreach ($inventories as $inventory) {
                                if ($remaining <= 0) {
                                    break;
                                }
                                $deduct = min((int) $inventory->quantity_available, $remaining);
                                if ($deduct <= 0) {
                                    continue;
                                }
                                $before = (int) $inventory->quantity_on_hand;
                                $inventory->quantity_on_hand = max(0, $before - $deduct);
                                $inventory->quantity_available = max(0, (int) $inventory->quantity_available - $deduct);
                                $inventory->save();

                                InventoryTransaction::create([
                                    'inventory_id' => $inventory->id,
                                    'performed_by_user_id' => $user->id,
                                    'transaction_type' => 'sale',
                                    'quantity_change' => -$deduct,
                                    'quantity_before' => $before,
                                    'quantity_after' => (int) $inventory->quantity_on_hand,
                                    'reference_type' => Order::class,
                                    'reference_id' => $order->id,
                                    'reference_number' => $order->order_id,
                                    'reason' => 'Stock deducted when order was placed (Cash on Delivery).',
                                ]);
                                $remaining -= $deduct;
                            }
                        }
                    }
                }

                $addressText = [
                    'address_type' => 'shipping',
                    'name' => $address->name ?: ($user->profile?->display_name ?: $user->name),
                    'phone' => $address->phone ?: $user->mobile,
                    'address_line_1' => $address->address_line_1,
                    'address_line_2' => $address->address_line_2,
                    'landmark' => $address->landmark,
                    'city' => $address->city?->name ?? '',
                    'state' => $address->state?->name ?? '',
                    'country' => $address->country?->name ?? 'India',
                    'postal_code' => $address->postal_code,
                ];
                OrderAddress::create(array_merge(['order_id' => $order->id], $addressText));

                $payment = Payment::create([
                    'payment_id' => 'PAY-' . strtoupper(Str::random(16)),
                    'reference_id' => 'PAYREF-' . strtoupper(Str::random(16)),
                    'payable_type' => Order::class,
                    'payable_id' => $order->id,
                    'customer_profile_id' => $user->customerProfile->id,
                    'currency_code' => $calculation['currency_code'],
                    'currency_id' => $currency?->id,
                    'amount' => $calculation['total'],
                    'status' => 'pending',
                    'payment_context' => 'order',
                    'initiated_at' => now(),
                    'metadata' => ['method' => $validated['payment_method']],
                ]);
                $order->update(['payment_reference' => $payment->reference_id]);

                PaymentStatusHistory::create([
                    'payment_id' => $payment->id,
                    'from_status' => null,
                    'to_status' => 'pending',
                    'changed_by_user_id' => $user->id,
                    'source' => 'customer',
                    'remarks' => 'Cash on Delivery selected; payment is due upon delivery.',
                    'changed_at' => now(),
                ]);

                OrderStatusHistory::create([
                    'order_id' => $order->id,
                    'changed_by_user_id' => $user->id,
                    'from_status' => null,
                    'to_status' => 'pending',
                    'source' => 'customer',
                    'remarks' => 'Order placed with Cash on Delivery.',
                    'changed_at' => now(),
                ]);

                $cart->update(['status' => 'converted']);
                $snapshot->update(['status' => 'completed', 'completed_at' => now()]);
                return $order;
            });
        } catch (ValidationException $exception) {
            return redirect()->route('store.checkout')->withErrors($exception->errors())->withInput();
        }

        $request->session()->put('store_checkout.order_id', $order->id);
        $request->session()->forget([
            'store_checkout.checkout_token',
            'store_checkout.address_id',
            'store_checkout.order_notes',
        ]);

        return redirect()->route('store.order.success');
    }

    public function success(Request $request): View|RedirectResponse
    {
        $user = $request->user()->loadMissing(['profile', 'customerProfile']);
        $orderId = $request->session()->get('store_checkout.order_id');

        if (! $user->customerProfile || ! $orderId) {
            return redirect()->route('store.index')
                ->with('error', 'No recent order was found for this session.');
        }

        $order = Order::query()
            ->whereKey($orderId)
            ->where('customer_profile_id', $user->customerProfile->id)
            ->with(['items', 'addresses'])
            ->first();

        if (! $order) {
            return redirect()->route('store.index')
                ->with('error', 'The requested order could not be found.');
        }

        $address = $order->addresses->firstWhere('address_type', 'shipping');
        $addressText = collect([
            $address?->address_line_1,
            $address?->address_line_2,
            $address?->landmark,
        ])->filter()->implode(', ');

        $currency = Currency::query()->where('code', $order->currency_code)->first();

        return view('frontend.store.order-success', [
            'order' => [
                'number' => $order->order_id,
                'date' => optional($order->placed_at)->format('d F Y') ?? $order->created_at->format('d F Y'),
                'payment_status' => 'Cash on Delivery — Payment Pending',
                'payment_method' => 'Cash on Delivery',
                'subtotal' => (float) $order->subtotal,
                'discount' => (float) $order->discount_amount,
                'delivery' => (float) $order->shipping_amount,
                'tax' => (float) $order->tax_amount,
                'total' => (float) $order->total_amount,
            ],
            'customer' => [
                'name' => $user->profile?->display_name ?: $user->name,
                'phone' => $user->mobile ?: ($address?->phone ?? ''),
                'email' => $user->email,
            ],
            'deliveryAddress' => [
                'name' => $address?->name ?? '',
                'phone' => $address?->phone ?? '',
                'address' => $addressText,
                'city' => $address?->city ?? '',
                'state' => $address?->state ?? '',
                'pincode' => $address?->postal_code ?? '',
            ],
            'orderItems' => $order->items->map(fn ($item) => [
                'name' => $item->product_name,
                'category' => data_get($item->product_snapshot, 'category', 'Devotional Products'),
                'price' => (float) $item->unit_price,
                'quantity' => $item->quantity,
                'image' => data_get($item->product_snapshot, 'image'),
            ])->values(),
            'currencySymbol' => $currency?->symbol ?: '₹',
        ]);
    }

    private function uniqueOrderId(): string
    {
        do {
            $orderId = 'PN-' . now()->format('Ymd') . '-' . strtoupper(Str::random(6));
        } while (Order::withTrashed()->where('order_id', $orderId)->exists());

        return $orderId;
    }

    private function activeCart(Request $request): ?Cart
    {
        return Cart::query()
            ->where(
                'user_id',
                $request->user()->id
            )
            ->where(
                'status',
                'active'
            )
            ->with([
                'items.product.category',

                'items.product.images' => function ($query) {
                    $query
                        ->orderBy('sort_order')
                        ->orderBy('id');
                },

                'items.product.prices' => function ($query) {
                    $query
                        ->where('active', true)
                        ->with('currency');
                },

                'items.product.taxRules' => function ($query) {
                    $query->where('active', true);
                },

                'items.product.inventories' => function ($query) {
                    $query->where('active', true);
                },
            ])
            ->latest('id')
            ->first();
    }

    private function calculateCart(Cart $cart): array
    {
        $currencyCode = $cart->currency_code
            ? strtoupper($cart->currency_code)
            : null;

        $lines = [];

        $subtotal = 0.0;
        $taxTotal = 0.0;

        foreach ($cart->items as $item) {
            $product = $item->product;

            /*
            |--------------------------------------------------------------------------
            | Product must still be active.
            |--------------------------------------------------------------------------
            */

            if (! $product || ! $product->active) {
                throw ValidationException::withMessages([
                    'cart' =>
                        "The product '{$item->product_name}' is no longer available.",
                ]);
            }

            /*
            |--------------------------------------------------------------------------
            | Get the current active catalog price.
            |--------------------------------------------------------------------------
            */

            $price = $this->activePrice($product);

            if (! $price || ! $price->currency) {
                throw ValidationException::withMessages([
                    'cart' =>
                        "The current price for '{$product->name}' is unavailable.",
                ]);
            }

            if (! $price->currency->is_active) {
                throw ValidationException::withMessages([
                    'cart' =>
                        "The currency configured for '{$product->name}' is currently unavailable.",
                ]);
            }

            $priceCurrency =
                strtoupper($price->currency->code);

            /*
            |--------------------------------------------------------------------------
            | All products in one cart must use the same currency.
            |--------------------------------------------------------------------------
            */

            if (
                $currencyCode &&
                $currencyCode !== $priceCurrency
            ) {
                throw ValidationException::withMessages([
                    'cart' =>
                        'The products in your cart use different currencies. Please review your cart before checkout.',
                ]);
            }

            $currencyCode ??= $priceCurrency;

            /*
            |--------------------------------------------------------------------------
            | Re-check inventory.
            |--------------------------------------------------------------------------
            */

            $quantity = (int) $item->quantity;

            $this->assertStock(
                $product,
                $quantity
            );

            /*
            |--------------------------------------------------------------------------
            | Current pricing.
            |--------------------------------------------------------------------------
            */

            $unitPrice = (float) $price->amount;

            $lineSubtotal = round(
                $unitPrice * $quantity,
                2
            );

            /*
            |--------------------------------------------------------------------------
            | Current tax rule.
            |--------------------------------------------------------------------------
            */

            $tax = $product->taxRules->first();

            $taxPercentage = $tax
                ? (float) $tax->tax_percentage
                : 0.0;

            $taxAmount =
                $tax && ! $tax->is_inclusive
                    ? round(
                        $lineSubtotal *
                        $taxPercentage /
                        100,
                        2
                    )
                    : 0.0;

            $lineTotal = round(
                $lineSubtotal + $taxAmount,
                2
            );

            $subtotal += $lineSubtotal;
            $taxTotal += $taxAmount;

            $lines[] = [
                'cart_item' => $item,

                'cart_item_id' => $item->id,

                'product_id' => $product->id,

                'name' => $product->name,

                'sku' =>
                    $product->sku
                    ?? $product->product_code
                    ?? (string) $product->id,

                'category' =>
                    $product->category?->name
                    ?? 'Devotional Products',

                'quantity' => $quantity,

                'unit_price' => $unitPrice,

                'line_subtotal' => $lineSubtotal,

                'tax_percentage' => $taxPercentage,

                'tax_amount' => $taxAmount,

                'line_total' => $lineTotal,

                'tax_code' => $tax?->tax_code,

                'tax_name' => $tax?->tax_name,

                'tax_inclusive' =>
                    (bool) ($tax?->is_inclusive ?? false),

                'image' =>
                    $product->images->first()?->file_path
                    ?? $product->images->first()?->image_url,
            ];
        }

        $subtotal = round($subtotal, 2);

        $taxTotal = round($taxTotal, 2);

        /*
        |--------------------------------------------------------------------------
        | Discount and shipping are intentionally zero for now.
        |
        | We are NOT inventing coupon or shipping rules in Phase 9.
        |--------------------------------------------------------------------------
        */

        $discount = 0.0;

        $delivery = 0.0;

        $total = round(
            $subtotal -
            $discount +
            $delivery +
            $taxTotal,
            2
        );

        return [
            'currency_code' => $currencyCode,

            'lines' => $lines,

            'cartItems' => collect($lines)
                ->map(fn ($line) => [
                    'id' => $line['cart_item_id'],
                    'product_id' => $line['product_id'],
                    'name' => $line['name'],
                    'category' => $line['category'],
                    'price' => $line['unit_price'],
                    'quantity' => $line['quantity'],
                    'image' => $line['image'],
                ])
                ->values(),

            'subtotal' => $subtotal,

            'discount' => $discount,

            'delivery' => $delivery,

            'tax' => $taxTotal,

            'total' => $total,

            /*
            |--------------------------------------------------------------------------
            | Historical cart snapshot.
            |--------------------------------------------------------------------------
            */

            'cart_snapshot' => collect($lines)
                ->map(fn ($line) => [
                    'cart_item_id' => $line['cart_item_id'],
                    'product_id' => $line['product_id'],
                    'name' => $line['name'],
                    'sku' => $line['sku'],
                    'quantity' => $line['quantity'],
                ])
                ->values()
                ->all(),

            /*
            |--------------------------------------------------------------------------
            | Historical pricing snapshot.
            |--------------------------------------------------------------------------
            */

            'pricing_snapshot' => collect($lines)
                ->map(fn ($line) => [
                    'product_id' => $line['product_id'],
                    'currency_code' => $currencyCode,
                    'unit_price' => $line['unit_price'],
                    'line_subtotal' => $line['line_subtotal'],
                    'line_total' => $line['line_total'],
                ])
                ->values()
                ->all(),

            /*
            |--------------------------------------------------------------------------
            | Historical tax snapshot.
            |--------------------------------------------------------------------------
            */

            'tax_snapshot' => collect($lines)
                ->map(fn ($line) => [
                    'product_id' => $line['product_id'],
                    'tax_code' => $line['tax_code'],
                    'tax_name' => $line['tax_name'],
                    'tax_percentage' => $line['tax_percentage'],
                    'is_inclusive' => $line['tax_inclusive'],
                    'tax_amount' => $line['tax_amount'],
                ])
                ->values()
                ->all(),
        ];
    }

    private function activePrice(Product $product)
    {
        return $product->prices
            ->filter(fn ($price) => $price->active)
            ->filter(function ($price) {
                $now = now();

                return (
                    ! $price->effective_from ||
                    $price->effective_from <= $now
                ) && (
                    ! $price->effective_until ||
                    $price->effective_until >= $now
                );
            })
            ->sortByDesc(
                fn ($price) => [
                    $price->is_default,
                    $price->pricing_type === 'sale',
                ]
            )
            ->first();
    }

    private function assertStock(
        Product $product,
        int $quantity
    ): void {
        $tracked = $product->inventories
            ->filter(
                fn ($inventory) =>
                    $inventory->track_inventory
            );

        if (
            $tracked->isNotEmpty() &&
            ! $product->is_digital
        ) {
            $available =
                $tracked->sum('quantity_available');

            if ($available < $quantity) {
                throw ValidationException::withMessages([
                    'cart' =>
                        "The requested quantity for '{$product->name}' is no longer available.",
                ]);
            }
        }
    }

    private function assertDeliveryAddressReady(
        Address $address
    ): void {
        $missing = [];

        if (! filled($address->address_line_1)) {
            $missing[] = 'address';
        }

        if (! filled($address->postal_code)) {
            $missing[] = 'postal code';
        }

        if (! $address->city) {
            $missing[] = 'city';
        }

        if (! $address->state) {
            $missing[] = 'state';
        }

        if (! $address->country) {
            $missing[] = 'country';
        }

        if ($missing) {
            throw ValidationException::withMessages([
                'delivery_address' =>
                    'The selected address is incomplete. Please update it before continuing: '
                    . implode(', ', $missing)
                    . '.',
            ]);
        }
    }
}