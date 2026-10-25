<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Pooja;
use App\Models\Product;
use App\Models\PujariProfile;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    /**
     * Display the homepage with featured, active poojas from the catalogue.
     */
    public function index(): View
    {
        $featuredPoojas = Pooja::query()
            ->with(['category', 'media', 'pricing.currency'])
            ->where('is_active', true)
            ->where('status', 'active')
            // Featured poojas appear first, but regular active poojas are also shown.
            ->orderByDesc('is_featured')
            ->orderBy('sort_order')
            ->orderBy('name')
            ->limit(8)
            ->get()
            ->map(function (Pooja $pooja): array {
                $media = $pooja->media
                    ->where('is_active', true)
                    ->sortByDesc('is_featured')
                    ->sortBy('sort_order')
                    ->first();

                $image = $this->normalizePoojaImagePath($media?->file_path);

                $price = $pooja->pricing
                    ->where('is_active', true)
                    ->sortByDesc('is_default')
                    ->first();

                $currencySymbol = $price?->currency?->symbol ?? '₹';

                return [
                    'slug' => $pooja->slug,
                    'name' => $pooja->name,
                    'category' => $pooja->category?->name ?? 'Pooja',
                    'description' => $pooja->short_description
                        ?: $pooja->description
                        ?: 'Discover this sacred pooja and its traditional significance.',
                    'duration' => $pooja->duration_minutes
                        ? $pooja->duration_minutes . ' Mins'
                        : 'As per ritual',
                    'rating' => '—',
                    'price' => $price
                        ? $currencySymbol . number_format((float) $price->amount, 2)
                        : 'Contact for pricing',
                    'image' => $image,
                ];
            })
            ->values();

        // Reuse the same public visibility rules as PriestController.
        $priests = PujariProfile::query()
            ->where('is_active', true)
            ->where('profile_status', '!=', 'incomplete')
            ->where('verification_status', 'approved')
            ->with(['user.profile', 'experiences'])
            ->orderByDesc('experience_years')
            ->orderBy('display_name')
            ->limit(4)
            ->get()
            ->map(function (PujariProfile $priest): array {
                $profile = $priest->user?->profile;
                $speciality = $priest->experiences
                    ->pluck('title')
                    ->filter()
                    ->unique()
                    ->first();

                return [
                    'name' => $priest->display_name,
                    'speciality' => $speciality ?: 'Traditional Rituals',
                    'experience' => $priest->experience_years !== null
                        ? $priest->experience_years . '+ Years'
                        : 'Experience not specified',
                    // The existing PriestController has no real rating data.
                    'rating' => '—',
                    'image' => $profile?->profile_photo,
                ];
            })
            ->values();

        // Reuse the Store catalogue's product model, visibility, image and pricing rules.
        $products = Product::query()
            ->where('active', true)
            ->with([
                'category',
                'images' => fn ($query) => $query->where('active', true)->orderBy('sort_order'),
                'prices' => fn ($query) => $query->where('active', true)->with('currency'),
            ])
            ->orderByDesc('featured')
            ->orderBy('sort_order')
            ->orderBy('name')
            ->limit(4)
            ->get()
            ->map(function (Product $product): array {
                $price = $product->prices
                    ->filter(fn ($item) => $item->currency?->is_active !== false)
                    ->sortByDesc(fn ($item) => (int) $item->is_default)
                    ->first();

                $image = $product->images->first()?->file_path;
                $image = $image ? trim(str_replace('\\\\', '/', $image)) : null;

                return [
                    'name' => $product->name,
                    'image' => $image,
                    'price' => $price
                        ? (($price->currency?->symbol ?? '') . number_format((float) $price->amount, 2))
                        : 'Price unavailable',
                ];
            })
            ->values();

        return view('frontend.home', compact('featuredPoojas', 'priests', 'products'));
    }

    /**
     * Admin-managed pooja media is stored under public/images/poojas.
     * Normalize legacy values without generating links to arbitrary paths.
     */
    private function normalizePoojaImagePath(?string $storedPath): ?string
    {
        $path = trim(str_replace('\\', '/', (string) $storedPath));

        if ($path === '') {
            return null;
        }

        $path = preg_replace('#^https?://[^/]+/#i', '', $path) ?? $path;
        $path = ltrim($path, '/');
        $path = preg_replace('#^(?:public/)+#', '', $path) ?? $path;

        if (str_starts_with($path, 'images/poojas/')) {
            $relativePath = $path;
        } elseif (str_starts_with($path, 'poojas/')) {
            $relativePath = 'images/' . $path;
        } else {
            $relativePath = 'images/poojas/' . basename($path);
        }

        return is_file(public_path($relativePath)) ? $relativePath : null;
    }
}
