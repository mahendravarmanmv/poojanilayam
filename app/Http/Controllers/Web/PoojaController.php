<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Pooja;
use App\Models\PoojaCategory;
use App\Models\PujariTempleAssignment;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PoojaController extends Controller
{
    public function index(Request $request): View
    {
        $query = Pooja::query()
            ->with(['category', 'media', 'pricing.currency', 'templePoojas.temple'])
            ->where('is_active', true)
            ->where('status', 'active');

        if ($request->filled('search')) {
            $search = trim((string) $request->string('search'));

            if ($search !== '') {
                $query->where(function ($query) use ($search) {
                    $query->where('name', 'like', "%{$search}%")
                        ->orWhere('short_description', 'like', "%{$search}%")
                        ->orWhere('description', 'like', "%{$search}%");
                });
            }
        }

        if ($request->filled('category')) {
            $query->whereHas('category', function ($query) use ($request) {
                $query->where('slug', $request->string('category'))
                    ->where('is_active', true);
            });
        }
		
		
		if ($request->filled('occasion')) {
			$occasion = trim(
				str_replace('-', ' ', (string) $request->input('occasion'))
			);

			if ($occasion !== '') {
				$query->where(function ($query) use ($occasion) {
					$query->where('name', 'like', "%{$occasion}%")
						->orWhere('short_description', 'like', "%{$occasion}%")
						->orWhere('description', 'like', "%{$occasion}%")
						->orWhereHas('detail', function ($detailQuery) use ($occasion) {
							$detailQuery->where(
								'benefits',
								'like',
								"%{$occasion}%"
							);
						});
				});
			}
		}


        $paginator = $query
            ->orderByDesc('is_featured')
            ->orderBy('sort_order')
            ->orderBy('name')
            ->paginate(12)
            ->withQueryString();

        $poojas = $paginator->through(fn (Pooja $pooja) => $this->poojaCardData($pooja));

        $categories = PoojaCategory::query()
            ->where('is_active', true)
            ->withCount(['poojas' => function ($query) {
                $query->where('is_active', true)->where('status', 'active');
            }])
            ->orderBy('sort_order')
            ->orderBy('name')
            ->get()
            ->map(fn (PoojaCategory $category) => [
                'icon' => $this->categoryIcon($category->slug),
                'name' => $category->name,
                'count' => (int) $category->poojas_count,
                'slug' => $category->slug,
            ]);

        $categories->prepend([
            'icon' => 'bi-flower1',
            'name' => 'All Poojas',
            'count' => Pooja::query()->where('is_active', true)->where('status', 'active')->count(),
            'slug' => null,
        ]);

        $locations = Pooja::query()
            ->where('is_active', true)
            ->where('status', 'active')
            ->with(['templePoojas.temple'])
            ->get()
            ->flatMap(fn (Pooja $pooja) => $pooja->templePoojas->map(fn ($tp) => $tp->temple?->name))
            ->filter()
            ->unique()
            ->sort()
            ->values()
            ->all();

        $occasions = ['Health', 'Prosperity', 'Success', 'Peace', 'Marriage', 'Education', 'House Warming', 'Birthday'];

        return view('frontend.poojas.index', compact('poojas', 'categories', 'occasions', 'locations'));
    }

    public function categories(): View
    {
        $categories = PoojaCategory::query()
            ->where('is_active', true)
            ->withCount(['poojas' => function ($query) {
                $query->where('is_active', true)->where('status', 'active');
            }])
            ->orderBy('sort_order')
            ->orderBy('name')
            ->get()
            ->map(fn (PoojaCategory $category) => [
                'icon' => $this->categoryIcon($category->slug),
                'name' => $category->name,
                'description' => $category->description,
                'count' => $category->poojas_count . ' Poojas',
                'slug' => $category->slug,
            ]);

        return view('frontend.poojas.categories', compact('categories'));
    }

    public function category(string $slug, Request $request): View
    {
        $category = PoojaCategory::query()
            ->where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();

        $poojas = Pooja::query()
            ->with(['category', 'media', 'pricing.currency'])
            ->where('pooja_category_id', $category->id)
            ->where('is_active', true)
            ->where('status', 'active')
            ->when($request->filled('search'), function ($query) use ($request) {
                $search = trim((string) $request->string('search'));

                if ($search !== '') {
                    $query->where(function ($query) use ($search) {
                        $query->where('name', 'like', "%{$search}%")
                            ->orWhere('short_description', 'like', "%{$search}%")
                            ->orWhere('description', 'like', "%{$search}%");
                    });
                }
            })
            ->orderByDesc('is_featured')
            ->orderBy('sort_order')
            ->orderBy('name')
            ->get()
            ->map(fn (Pooja $pooja) => $this->poojaCardData($pooja));

        return view('frontend.poojas.category', [
            'category' => $category,
            'categoryName' => $category->name,
            'poojas' => $poojas,
        ]);
    }

    public function show(string $slug): View
    {
        $poojaModel = Pooja::query()
            ->with([
                'category',
                'detail',
                'gods',
                'media',
                'requirements',
                'extras.options.currency',
                'pricing.currency',
                'templePoojas.temple.profile',
                'templePoojas.pricing.currency',
            ])
            ->where('slug', $slug)
            ->where('is_active', true)
            ->where('status', 'active')
            ->firstOrFail();

        $pooja = $this->poojaDetailData($poojaModel);

        $relatedPoojas = Pooja::query()
            ->with(['category', 'media', 'pricing.currency'])
            ->where('id', '!=', $poojaModel->id)
            ->where('pooja_category_id', $poojaModel->pooja_category_id)
            ->where('is_active', true)
            ->where('status', 'active')
            ->orderByDesc('is_featured')
            ->orderBy('sort_order')
            ->orderBy('name')
            ->limit(3)
            ->get()
            ->map(fn (Pooja $related) => [
                'image' => $this->imagePath($related),
                'name' => $related->name,
                'description' => $related->short_description ?: $related->description ?: 'Traditional devotional service.',
                'price' => $this->displayPrice($related),
                'rating' => '—',
                'slug' => $related->slug,
            ])->all();

        return view('frontend.poojas.show', compact('pooja', 'relatedPoojas'));
    }

    private function poojaCardData(Pooja $pooja): array
    {
        $temple = $pooja->templePoojas
            ->where('status', 'active')
            ->map(fn ($tp) => $tp->temple)
            ->filter()
            ->first();

        return [
            'slug' => $pooja->slug,
            'name' => $pooja->name,
            'image' => $this->imagePath($pooja),
            'category' => $pooja->category?->name ?? 'Pooja',
            'description' => $pooja->short_description ?: $pooja->description ?: 'Traditional devotional service.',
            'duration' => $pooja->duration_minutes ? $pooja->duration_minutes . ' Mins' : 'As per ritual',
            'rating' => '—',
            'reviews' => '0',
            'price' => $this->displayPrice($pooja),
            'location' => $temple?->name ?? 'Multiple locations',
            'featured' => (bool) $pooja->is_featured,
        ];
    }

    private function poojaDetailData(Pooja $pooja): array
    {
        $temple = $pooja->templePoojas
            ->where('status', 'active')
            ->map(fn ($tp) => $tp->temple)
            ->filter()
            ->first();

        $mode = $pooja->templePoojas
            ->where('status', 'active')
            ->pluck('service_mode')
            ->filter()
            ->unique()
            ->implode(' / ');

        $assignment = $temple
            ? PujariTempleAssignment::query()
                ->with('pujariProfile')
                ->where('temple_id', $temple->id)
                ->where('status', 'active')
                ->where(function ($query) {
                    $query->whereNull('ended_at')->orWhere('ended_at', '>=', now());
                })
                ->whereHas('pujariProfile', function ($query) {
                    $query->where('is_active', true)->where('verification_status', 'approved');
                })
                ->orderBy('assigned_at')
                ->first()
            : null;

        $priestProfile = $assignment?->pujariProfile;
        $priest = $priestProfile ? [
            'name' => $priestProfile->display_name,
            'image' => 'images/home/ganapathi.jpg',
            'experience' => $priestProfile->experience_years ? $priestProfile->experience_years . '+ Years' : 'Experience not specified',
            'speciality' => 'Vedic Rituals',
            'rating' => '—',
            'slug' => $priestProfile->pujari_number ?: $priestProfile->display_name,
        ] : null;

        return [
            'slug' => $pooja->slug,
            'name' => $pooja->name,
            'category' => $pooja->category?->name ?? 'Pooja',
            'image' => $this->imagePath($pooja),
            'short_description' => $pooja->short_description ?: '',
            'description' => $pooja->description ?: $pooja->short_description ?: '',
            'rating' => '—',
            'reviews' => '0',
            'duration' => $pooja->duration_minutes ? $pooja->duration_minutes . ' Mins' : 'As per ritual',
            'starting_price' => $this->displayPrice($pooja),
            'location' => $temple?->name ?? 'Multiple locations',
            'language' => 'As per selected service',
            'mode' => $mode ?: 'As per selected service',
            'priest' => $priest,
        ];
    }

    private function displayPrice(Pooja $pooja): string
    {
        $price = $pooja->pricing
            ->where('is_active', true)
            ->sortByDesc('is_default')
            ->first();

        return $price
            ? (($price->currency?->symbol ?? '') . number_format((float) $price->amount, 2))
            : 'Contact for pricing';
    }

    private function imagePath(Pooja $pooja): string
    {
        $media = $pooja->media
            ->where('is_active', true)
            ->sortByDesc('is_featured')
            ->sortBy('sort_order')
            ->first();

        return $media?->file_path ?: 'images/home/ganapathi.jpg';
    }

    private function categoryIcon(string $slug): string
    {
        return match (true) {
            str_contains($slug, 'festival') => 'bi-stars',
            str_contains($slug, 'ganap') || str_contains($slug, 'vinay') => 'bi-flower1',
            str_contains($slug, 'lakshmi') || str_contains($slug, 'prosper') => 'bi-coin',
            str_contains($slug, 'shiva') || str_contains($slug, 'rudra') => 'bi-moon-stars',
            str_contains($slug, 'vishnu') => 'bi-brightness-high',
            str_contains($slug, 'navagraha') => 'bi-circle-half',
            str_contains($slug, 'homam') || str_contains($slug, 'havan') => 'bi-fire',
            str_contains($slug, 'marriage') || str_contains($slug, 'family') => 'bi-people',
            str_contains($slug, 'health') || str_contains($slug, 'wellbeing') => 'bi-heart-pulse',
            str_contains($slug, 'special') => 'bi-gift',
            str_contains($slug, 'daily') => 'bi-sunrise',
            default => 'bi-flower1',
        };
    }
}
