<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Cart;
use App\Models\CartCheckoutSnapshot;
use App\Models\Product;
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