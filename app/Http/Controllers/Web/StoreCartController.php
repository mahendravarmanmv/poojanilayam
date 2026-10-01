<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class StoreCartController extends Controller
{
    public function index(Request $request): View
    {
        $cart = $this->cart($request);
        $cart->load([
            'items.product.category',
            'items.product.images' => fn ($query) => $query->orderBy('sort_order')->orderBy('id'),
        ]);

        $cartItems = $cart->items->map(function ($item) {
            $product = $item->product;
            $available = $product->inventories()->where('active', true)->sum('quantity_available');
            $trackInventory = $product->inventories()->where('active', true)->where('track_inventory', true)->exists();

            return [
                'id' => $item->id,
                'product_id' => $product->id,
                'slug' => $product->slug,
                'name' => $item->product_name,
                'category' => $product->category?->name ?? 'Devotional Products',
                'description' => $product->short_description ?? $product->description ?? '',
                'price' => (float) $item->unit_price,
                'old_price' => null,
                'quantity' => (int) $item->quantity,
                'image' => $product->images->first()?->image_url,
                'stock' => ! $trackInventory || $available >= $item->quantity,
                'available_quantity' => $trackInventory ? $available : null,
            ];
        })->values();

        $subtotal = $cartItems->sum(fn ($item) => $item['price'] * $item['quantity']);
        $discount = 0;
        $delivery = 0;
        $tax = $cart->items->sum(fn ($item) => (float) $item->tax_amount);
        $total = $subtotal + $tax + $delivery;

        return view('frontend.store.shopping-cart', compact(
            'cartItems', 'subtotal', 'discount', 'delivery', 'tax', 'total'
        ));
    }

    public function add(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'product_id' => ['required', 'integer', 'exists:products,id'],
            'quantity' => ['required', 'integer', 'min:1', 'max:999'],
        ]);

        $product = Product::query()
            ->where('active', true)
            ->with(['prices' => fn ($query) => $query->where('active', true)->with('currency')])
            ->findOrFail($validated['product_id']);

        $price = $this->activePrice($product);
        abort_if(! $price, 422, 'This product does not have an active price.');

        $cart = $this->cart($request);
        if (! $cart->currency_code && $price->currency?->code) {
            $cart->update(['currency_code' => $price->currency->code]);
        }
        $existing = $cart->items()->where('product_id', $product->id)->first();
        $newQuantity = ($existing?->quantity ?? 0) + (int) $validated['quantity'];
        $this->assertStock($product, $newQuantity);

        DB::transaction(function () use ($cart, $product, $price, $existing, $newQuantity) {
            $tax = $product->taxRules()->where('active', true)->first();
            $taxPercentage = $tax ? (float) $tax->tax_percentage : 0;
            $lineSubtotal = (float) $price->amount * $newQuantity;
            $taxAmount = $tax && ! $tax->is_inclusive
                ? round($lineSubtotal * $taxPercentage / 100, 2)
                : 0;

            $data = [
                'product_name' => $product->name,
                'sku' => $product->sku ?? $product->product_code ?? (string) $product->id,
                'quantity' => $newQuantity,
                'unit_price' => $price->amount,
                'tax_percentage' => $taxPercentage,
                'tax_amount' => $taxAmount,
                'line_total' => $lineSubtotal + $taxAmount,
            ];

            if ($existing) {
                $existing->update($data);
            } else {
                $cart->items()->create(array_merge(['product_id' => $product->id], $data));
            }
        });

        return response()->json([
            'success' => true,
            'message' => 'Product added to your cart.',
            'cart_count' => $cart->items()->count(),
        ]);
    }

    public function update(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'item_id' => ['required', 'integer', 'exists:cart_items,id'],
            'quantity' => ['required', 'integer', 'min:1', 'max:999'],
        ]);

        $cart = $this->cart($request);
        $item = $cart->items()->with('product')->findOrFail($validated['item_id']);
        $this->assertStock($item->product, (int) $validated['quantity']);

        $tax = $item->product->taxRules()->where('active', true)->first();
        $lineSubtotal = (float) $item->unit_price * (int) $validated['quantity'];
        $taxAmount = $tax && ! $tax->is_inclusive
            ? round($lineSubtotal * (float) $tax->tax_percentage / 100, 2)
            : 0;

        $item->update([
            'quantity' => (int) $validated['quantity'],
            'tax_percentage' => $tax ? $tax->tax_percentage : 0,
            'tax_amount' => $taxAmount,
            'line_total' => $lineSubtotal + $taxAmount,
        ]);

        return response()->json(['success' => true, 'message' => 'Cart updated.']);
    }

    public function remove(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'item_id' => ['required', 'integer', 'exists:cart_items,id'],
        ]);

        $this->cart($request)->items()->findOrFail($validated['item_id'])->delete();

        return response()->json(['success' => true, 'message' => 'Item removed from your cart.']);
    }

    public function clear(Request $request): JsonResponse
    {
        $this->cart($request)->items()->delete();
        return response()->json(['success' => true, 'message' => 'Your cart is empty.']);
    }

    private function cart(Request $request): Cart
    {
        return Cart::query()->firstOrCreate(
            ['user_id' => $request->user()->id, 'status' => 'active'],
            ['cart_token' => bin2hex(random_bytes(32)), 'currency_code' => null]
        );
    }

    private function assertStock(Product $product, int $quantity): void
    {
        $inventories = $product->inventories()->where('active', true)->get();
        $tracked = $inventories->filter(fn ($inventory) => $inventory->track_inventory);

        if ($tracked->isNotEmpty() && ! $product->is_digital) {
            $available = $tracked->sum('quantity_available');
            abort_if($available < $quantity, 422, 'Requested quantity is not available.');
        }
    }

    private function activePrice(Product $product)
    {
        return $product->prices
            ->filter(fn ($price) => $price->active)
            ->filter(function ($price) {
                $now = now();
                return (! $price->effective_from || $price->effective_from <= $now)
                    && (! $price->effective_until || $price->effective_until >= $now);
            })
            ->sortByDesc(fn ($price) => [$price->is_default, $price->pricing_type === 'sale'])
            ->first();
    }
}
