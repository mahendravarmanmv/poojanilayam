<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Currency;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Review;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class StoreCatalogController extends Controller
{
    public function index(Request $request)
    {
        $categories = ProductCategory::query()
            ->where('active', true)
            ->whereNull('parent_id')
            ->withCount(['products as active_products_count' => fn (Builder $query) => $query->where('active', true)])
            ->orderByDesc('featured')
            ->orderBy('sort_order')
            ->orderBy('name')
            ->get()
            ->map(fn (ProductCategory $category) => $this->categoryCard($category))
            ->values();

        $products = $this->productsQuery($request)
            ->with(['category', 'images' => fn ($query) => $query->where('active', true)->orderBy('sort_order')])
            ->with(['prices' => fn ($query) => $query->where('active', true)->with('currency')])
            ->with(['inventories' => fn ($query) => $query->where('active', true)])
            ->withCount(['wishlistItems', 'cartItems'])
            ->withAvg(['reviews as published_rating' => fn (Builder $query) => $query->where('customer_visible', true)->whereNotNull('published_at')->whereNull('hidden_at')->whereIn('status', ['approved', 'published'])], 'rating')
            ->withCount(['reviews as published_reviews_count' => fn (Builder $query) => $query->where('customer_visible', true)->whereNotNull('published_at')->whereNull('hidden_at')->whereIn('status', ['approved', 'published'])])
            ->orderByDesc('featured')
            ->orderBy('sort_order')
            ->orderBy('name')
            ->get()
            ->map(fn (Product $product) => $this->productCard($product))
            ->values();

        return view('frontend.store.product-listing', compact('categories', 'products'));
    }

    public function category(Request $request, string $slug)
    {
        $category = ProductCategory::query()
            ->where('slug', $slug)
            ->where('active', true)
            ->withCount(['products as active_products_count' => fn (Builder $query) => $query->where('active', true)])
            ->firstOrFail();

        $subCategories = $category->children()
            ->where('active', true)
            ->withCount(['products as active_products_count' => fn (Builder $query) => $query->where('active', true)])
            ->orderBy('sort_order')
            ->orderBy('name')
            ->get()
            ->map(fn (ProductCategory $child) => $this->categoryCard($child, true))
            ->values();

        $products = Product::query()
            ->where('active', true)
            ->where('product_category_id', $category->id)
            ->when($request->filled('search'), function (Builder $query) use ($request) {
                $search = trim((string) $request->string('search'));
                $query->where(function (Builder $query) use ($search) {
                    $query->where('name', 'like', "%{$search}%")
                        ->orWhere('sku', 'like', "%{$search}%")
                        ->orWhere('short_description', 'like', "%{$search}%");
                });
            })
            ->with(['category', 'images' => fn ($query) => $query->where('active', true)->orderBy('sort_order')])
            ->with(['prices' => fn ($query) => $query->where('active', true)->with('currency')])
            ->with(['inventories' => fn ($query) => $query->where('active', true)])
            ->withAvg(['reviews as published_rating' => fn (Builder $query) => $query->where('customer_visible', true)->whereNotNull('published_at')->whereNull('hidden_at')->whereIn('status', ['approved', 'published'])], 'rating')
            ->withCount(['reviews as published_reviews_count' => fn (Builder $query) => $query->where('customer_visible', true)->whereNotNull('published_at')->whereNull('hidden_at')->whereIn('status', ['approved', 'published'])])
            ->orderByDesc('featured')
            ->orderBy('sort_order')
            ->orderBy('name')
            ->get()
            ->map(fn (Product $product) => $this->productCard($product))
            ->values();

        $categoryData = $this->categoryCard($category);

        return view('frontend.store.product-category', [
            'category' => $categoryData,
            'subCategories' => $subCategories,
            'products' => $products,
        ]);
    }

    public function show(string $slug)
    {
        $product = Product::query()
            ->where('slug', $slug)
            ->where('active', true)
            ->with([
                'category',
                'images' => fn ($query) => $query->where('active', true)->orderBy('sort_order'),
                'prices' => fn ($query) => $query->where('active', true)->with('currency'),
                'inventories' => fn ($query) => $query->where('active', true),
            ])
            ->withAvg(['reviews as published_rating' => fn (Builder $query) => $query->where('customer_visible', true)->whereNotNull('published_at')->whereNull('hidden_at')->whereIn('status', ['approved', 'published'])], 'rating')
            ->withCount(['reviews as published_reviews_count' => fn (Builder $query) => $query->where('customer_visible', true)->whereNotNull('published_at')->whereNull('hidden_at')->whereIn('status', ['approved', 'published'])])
            ->firstOrFail();

        $productData = $this->productDetail($product);

        $reviews = Review::query()
            ->where('reviewable_type', Product::class)
            ->where('reviewable_id', $product->id)
            ->where('customer_visible', true)
            ->whereNotNull('published_at')
            ->whereNull('hidden_at')
            ->whereIn('status', ['approved', 'published'])
            ->with('customerProfile.user')
            ->latest('published_at')
            ->limit(10)
            ->get()
            ->map(function (Review $review) {
                return [
                    'name' => $review->customerProfile?->user?->name ?? 'Customer',
                    'rating' => (int) $review->rating,
                    'date' => optional($review->published_at)->format('d M Y'),
                    'comment' => $review->review_text ?? '',
                ];
            })
            ->values();

        $related = Product::query()
            ->where('active', true)
            ->where('id', '!=', $product->id)
            ->when($product->product_category_id, fn (Builder $query) => $query->where('product_category_id', $product->product_category_id))
            ->with(['category', 'images' => fn ($query) => $query->where('active', true)->orderBy('sort_order'), 'prices' => fn ($query) => $query->where('active', true)->with('currency')])
            ->withAvg(['reviews as published_rating' => fn (Builder $query) => $query->where('customer_visible', true)->whereNotNull('published_at')->whereNull('hidden_at')->whereIn('status', ['approved', 'published'])], 'rating')
            ->withCount(['reviews as published_reviews_count' => fn (Builder $query) => $query->where('customer_visible', true)->whereNotNull('published_at')->whereNull('hidden_at')->whereIn('status', ['approved', 'published'])])
            ->orderByDesc('featured')
            ->orderBy('sort_order')
            ->orderBy('name')
            ->limit(4)
            ->get()
            ->map(fn (Product $item) => $this->productCard($item))
            ->values();

        return view('frontend.store.product-details', [
            'product' => $productData,
            'options' => [],
            'reviews' => $reviews,
            'related' => $related,
        ]);
    }

    private function productsQuery(Request $request): Builder
    {
        return Product::query()
            ->where('active', true)
            ->when($request->filled('search'), function (Builder $query) use ($request) {
                $search = trim((string) $request->string('search'));
                $query->where(function (Builder $query) use ($search) {
                    $query->where('name', 'like', "%{$search}%")
                        ->orWhere('sku', 'like', "%{$search}%")
                        ->orWhere('short_description', 'like', "%{$search}%")
                        ->orWhere('description', 'like', "%{$search}%");
                });
            })
            ->when($request->filled('category'), function (Builder $query) use ($request) {
                $query->whereHas('category', fn (Builder $category) => $category
                    ->where('active', true)
                    ->where('slug', (string) $request->string('category')));
            });
    }

    private function categoryCard(ProductCategory $category, bool $child = false): array
    {
        return [
            'name' => $category->name,
            'slug' => $category->slug,
            'description' => $category->description ?? '',
            'image' => $category->image_path,
            'product_count' => (int) ($category->active_products_count ?? 0),
            'count' => (int) ($category->active_products_count ?? 0),
            'icon' => $this->categoryIcon($category->name),
        ];
    }

    private function productCard(Product $product): array
    {
        $price = $this->selectedPrice($product);
        $inventory = $product->inventories->sum('quantity_available');
        $hasInventory = $product->inventories->isNotEmpty();
        $stockStatus = !$hasInventory
            ? 'unknown'
            : ($inventory > 0 ? 'in_stock' : 'out_of_stock');

        return [
			'id' => $product->id,
            'name' => $product->name,
            'slug' => $product->slug,
            'category' => $product->category?->name ?? 'Uncategorized',
            'category_slug' => $product->category?->slug,
            'description' => $product->short_description ?? '',
            'price' => $price['amount'],
            'old_price' => $price['compare_at_amount'],
            'currency_symbol' => $price['symbol'],
            'currency_code' => $price['code'],
            'price_available' => $price['available'],
            'rating' => $product->published_rating !== null ? (float) $product->published_rating : 0,
            'reviews' => (int) ($product->published_reviews_count ?? 0),
            'image' => $product->images->first()?->file_path,
            'badge' => $product->featured ? 'Featured' : '',
            'stock' => $stockStatus === 'in_stock',
            'stock_status' => $stockStatus,
            'stock_text' => match ($stockStatus) {
                'in_stock' => 'In Stock',
                'out_of_stock' => 'Out of Stock',
                default => 'Availability not specified',
            },
        ];
    }

    private function productDetail(Product $product): array
    {
        $card = $this->productCard($product);
        $images = $product->images->pluck('file_path')->filter()->values()->all();

        $card['sku'] = $product->sku;
        $card['mrp'] = $card['old_price'] ?? $card['price'];
        $card['short_description'] = $product->short_description ?? '';
        $card['description'] = $product->description ?? '';
        $card['main_image'] = $images[0] ?? null;
        $card['images'] = $images;
        $card['features'] = [
            ['icon' => 'bi-shield-check', 'title' => 'Quality Assured', 'description' => 'Product information managed by Pooja Nilayam.'],
            ['icon' => 'bi-box-seam', 'title' => 'Secure Packaging', 'description' => 'Packaging details are managed with the product.'],
            ['icon' => 'bi-truck', 'title' => 'Reliable Delivery', 'description' => 'Delivery availability is subject to the configured service area.'],
            ['icon' => 'bi-headset', 'title' => 'Customer Support', 'description' => 'Support is available through the website support channels.'],
        ];

        return $card;
    }

    private function selectedPrice(Product $product): array
    {
        $price = $product->prices
            ->filter(fn ($item) => $item->currency?->is_active !== false)
            ->sortByDesc(fn ($item) => (int) $item->is_default)
            ->first();

        if (!$price) {
            return [
                'amount' => 0,
                'compare_at_amount' => null,
                'symbol' => '',
                'code' => '',
                'available' => false,
            ];
        }

        return [
            'amount' => (float) $price->amount,
            'compare_at_amount' => $price->compare_at_amount !== null ? (float) $price->compare_at_amount : null,
            'symbol' => $price->currency?->symbol ?? '',
            'code' => $price->currency?->code ?? '',
            'available' => true,
        ];
    }

    private function categoryIcon(string $name): string
    {
        $name = Str::lower($name);

        return match (true) {
            Str::contains($name, ['idol', 'murti']) => 'bi-stars',
            Str::contains($name, ['incense', 'dhoop']) => 'bi-fire',
            Str::contains($name, ['book', 'guide']) => 'bi-book',
            Str::contains($name, ['gift']) => 'bi-gift',
            Str::contains($name, ['diya', 'lamp']) => 'bi-lightbulb',
            default => 'bi-box-seam',
        };
    }
}
