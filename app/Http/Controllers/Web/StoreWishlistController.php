<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class StoreWishlistController extends Controller
{
    public function index(Request $request): View
    {
        $wishlist = $this->wishlist($request);

        $items = $wishlist->items()
            ->with([
                'product.category',
                'product.images' => fn ($query) => $query->orderBy('sort_order')->orderBy('id'),
                'product.prices' => fn ($query) => $query->where('active', true)->with('currency'),
                'product.wishlistItems',
            ])
            ->latest('id')
            ->get();

        $wishlistProducts = $items->map(function ($item) {
            $product = $item->product;
            $price = $this->activePrice($product);
            $inventory = $product->inventories()
                ->where('active', true)
                ->get();
            $available = $inventory->sum('quantity_available');
            $trackInventory = $inventory->contains(fn ($row) => $row->track_inventory);

            return [
                'id' => $product->id,
                'slug' => $product->slug,
                'name' => $product->name,
                'category' => $product->category?->name ?? 'Devotional Products',
                'price' => $price?->amount !== null ? (float) $price->amount : null,
                'old_price' => $price?->compare_at_amount !== null ? (float) $price->compare_at_amount : null,
                'currency_symbol' => $price?->currency?->symbol ?? '₹',
                'rating' => null,
                'reviews' => null,
                'image' => $product->images->first()?->image_url,
                'stock' => ! $trackInventory || $available > 0,
                'stock_text' => ! $trackInventory || $available > 0 ? 'In Stock' : 'Currently Unavailable',
                'badge' => $product->featured ? 'Featured' : '',
            ];
        })->values();

        return view('frontend.store.wishlist', compact('wishlistProducts'));
    }

    public function add(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'product_id' => ['required', 'integer', 'exists:products,id'],
        ]);

        $product = Product::query()
            ->where('active', true)
            ->findOrFail($validated['product_id']);

        $wishlist = $this->wishlist($request);

        $wishlist->items()->firstOrCreate([
            'product_id' => $product->id,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Product added to your wishlist.',
            'wishlist_count' => $wishlist->items()->count(),
        ]);
    }

    public function remove(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'product_id' => ['required', 'integer', 'exists:products,id'],
        ]);

        $wishlist = $this->wishlist($request);
        $wishlist->items()->where('product_id', $validated['product_id'])->delete();

        return response()->json([
            'success' => true,
            'message' => 'Product removed from your wishlist.',
            'wishlist_count' => $wishlist->items()->count(),
        ]);
    }

    private function wishlist(Request $request): Wishlist
    {
        return Wishlist::query()->firstOrCreate(
            [
                'user_id' => $request->user()->id,
                'is_default' => true,
            ],
            [
                'name' => 'My Wishlist',
                'active' => true,
            ]
        );
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
