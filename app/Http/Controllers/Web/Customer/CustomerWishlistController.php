<?php

namespace App\Http\Controllers\Web\Customer;

use App\Http\Controllers\Controller;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CustomerWishlistController extends Controller
{
    public function index(Request $request): View
    {
        $wishlist = Wishlist::query()
            ->where('user_id', $request->user()->id)
            ->where('active', true)
            ->where('is_default', true)
            ->with(['items.product.category', 'items.product.prices' => function ($query) {
                $query->where('active', true)->orderByDesc('is_default')->orderByDesc('effective_from');
            }])
            ->first();

        $wishlistItems = $wishlist?->items->map(function ($item): array {
            $product = $item->product;
            $price = $product?->prices->first();

            return [
                'id' => $product?->id,
                'name' => $product?->name ?? 'Product',
                'category' => $product?->category?->name ?? 'Pooja Essentials',
                'description' => $product?->short_description ?? '',
                'price' => (float) ($price?->amount ?? 0),
                'old_price' => (float) ($price?->compare_at_amount ?? 0),
                'discount' => $price && $price->compare_at_amount > $price->amount
                    ? round((1 - ($price->amount / $price->compare_at_amount)) * 100)
                    : 0,
                'rating' => null,
                'reviews' => 0,
                'stock' => null,
                'stock_class' => 'secondary',
                'badge' => $product?->featured ? 'Featured' : null,
            ];
        })->values()->all() ?? [];

        return view('frontend.dashboard.wishlist', compact('wishlistItems'));
    }
}
