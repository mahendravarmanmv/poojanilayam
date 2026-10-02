<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\AstrologyService;
use App\Models\Blog;
use App\Models\DigitalPoojaTemplate;
use App\Models\Pooja;
use App\Models\Product;
use App\Models\PujariProfile;
use App\Models\Temple;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class SearchController extends Controller
{
    public function index(Request $request): View
    {
        $keyword = trim((string) $request->input('q', ''));

        $results = $keyword === ''
            ? collect()
            : $this->search($keyword);

        $categories = [
            'All',
            'Pooja',
            'Digital Pooja',
            'Temples',
            'Priests',
            'Astrology',
            'Products',
            'Blogs',
        ];

        return view('frontend.search.results', [
            'keyword' => $keyword,
            'results' => $results,
            'categories' => $categories,
        ]);
    }

    private function search(string $keyword)
    {
        $now = now();
        $results = collect();

        $results = $results->merge(
            Pooja::query()
                ->where('is_active', true)
                ->where('status', 'active')
                ->where(function ($query) use ($keyword) {
                    $this->matchColumns($query, $keyword, ['name', 'short_description', 'description']);
                })
                ->with(['media' => fn ($query) => $query
                    ->where('is_active', true)
                    ->orderByDesc('is_featured')
                    ->orderBy('sort_order')])
                ->orderBy('name')
                ->limit(10)
                ->get()
                ->map(fn (Pooja $item) => $this->result(
                    'Pooja',
                    'bi-flower1',
                    $item->name,
                    $item->short_description ?: $item->description,
                    route('pooja.show', ['slug' => $item->slug]),
                    $item->media->first()?->file_path,
                    $item->created_at,
                    $keyword
                ))
        );

        $results = $results->merge(
            DigitalPoojaTemplate::query()
                ->where('active', true)
                ->whereHas('pooja', function ($query) use ($keyword) {
                    $query->where('is_active', true)
                        ->where('status', 'active');
                })
                ->where(function ($query) use ($keyword) {
                    $query->where('name', 'like', "%{$keyword}%")
                        ->orWhere('description', 'like', "%{$keyword}%")
                        ->orWhereHas('pooja', function ($pooja) use ($keyword) {
                            $this->matchColumns($pooja, $keyword, ['name', 'short_description', 'description']);
                        });
                })
                ->with(['pooja.media' => fn ($query) => $query
                    ->where('is_active', true)
                    ->orderByDesc('is_featured')
                    ->orderBy('sort_order')])
                ->orderBy('name')
                ->limit(10)
                ->get()
                ->map(fn (DigitalPoojaTemplate $item) => $this->result(
                    'Digital Pooja',
                    'bi-camera-video',
                    $item->pooja?->name ?: $item->name,
                    $item->pooja?->short_description ?: $item->description,
                    route('digital-pooja.show', ['slug' => $item->pooja?->slug ?: $item->template_code]),
                    $item->pooja?->media?->first()?->file_path,
                    $item->created_at,
                    $keyword
                ))
        );

        $results = $results->merge(
            Temple::query()
                ->where('status', 'active')
                ->where('verification_status', 'approved')
                ->where(function ($query) use ($keyword) {
                    $query->where('name', 'like', "%{$keyword}%")
                        ->orWhere('description', 'like', "%{$keyword}%")
                        ->orWhereHas('profile', function ($profile) use ($keyword) {
                            $profile->where('short_description', 'like', "%{$keyword}%")
                                ->orWhere('full_description', 'like', "%{$keyword}%");
                        });
                })
                ->with('profile')
                ->orderBy('name')
                ->limit(10)
                ->get()
                ->map(fn (Temple $item) => $this->result(
                    'Temples',
                    'bi-building',
                    $item->name,
                    $item->profile?->short_description ?: $item->description,
                    route('temple.show', ['slug' => $item->slug]),
                    null,
                    $item->created_at,
                    $keyword
                ))
        );

        $results = $results->merge(
            PujariProfile::query()
                ->where('is_active', true)
                ->where('profile_status', '!=', 'incomplete')
                ->where('verification_status', 'approved')
                ->where(function ($query) use ($keyword) {
                    $query->where('display_name', 'like', "%{$keyword}%")
                        ->orWhere('bio', 'like', "%{$keyword}%")
                        ->orWhereHas('experiences', function ($experience) use ($keyword) {
                            $experience->where('title', 'like', "%{$keyword}%")
                                ->orWhere('description', 'like', "%{$keyword}%")
                                ->orWhere('temple_or_organization', 'like', "%{$keyword}%");
                        })
                        ->orWhereHas('languages.language', function ($language) use ($keyword) {
                            $language->where('name', 'like', "%{$keyword}%");
                        });
                })
                ->with('experiences')
                ->orderBy('display_name')
                ->limit(10)
                ->get()
                ->map(fn (PujariProfile $item) => $this->result(
                    'Priests',
                    'bi-person-badge',
                    $item->display_name,
                    $item->bio ?: ($item->experiences->pluck('title')->filter()->first() ?: 'Pooja priest profile'),
                    route('priest.show', ['slug' => Str::slug($item->display_name)]),
                    null,
                    $item->created_at,
                    $keyword
                ))
        );

        $results = $results->merge(
            AstrologyService::query()
                ->where('active', true)
                ->where('status', 'published')
                ->where(function ($query) use ($keyword) {
                    $this->matchColumns($query, $keyword, ['name', 'short_description', 'description']);
                })
                ->orderByDesc('featured')
                ->orderBy('sort_order')
                ->orderBy('name')
                ->limit(10)
                ->get()
                ->map(fn (AstrologyService $item) => $this->result(
                    'Astrology',
                    'bi-stars',
                    $item->name,
                    $item->short_description ?: $item->description,
                    route('astrology.index'),
                    $item->image_path,
                    $item->created_at,
                    $keyword
                ))
        );

        $results = $results->merge(
            Product::query()
                ->where('active', true)
                ->where(function ($query) use ($keyword) {
                    $this->matchColumns($query, $keyword, ['name', 'sku', 'short_description', 'description']);
                })
                ->with(['category', 'images' => fn ($query) => $query
                    ->where('active', true)
                    ->orderByDesc('featured')
                    ->orderBy('sort_order')])
                ->orderByDesc('featured')
                ->orderBy('sort_order')
                ->orderBy('name')
                ->limit(10)
                ->get()
                ->map(fn (Product $item) => $this->result(
                    'Products',
                    'bi-bag',
                    $item->name,
                    $item->short_description ?: $item->description,
                    route('store.product', ['slug' => $item->slug]),
                    $item->images->first()?->file_path,
                    $item->created_at,
                    $keyword
                ))
        );

        $results = $results->merge(
            Blog::query()
                ->where('active', true)
                ->whereIn('status', ['published', 'publish'])
                ->where(function ($query) use ($now) {
                    $query->whereNull('published_at')
                        ->orWhere('published_at', '<=', $now);
                })
                ->where(function ($query) use ($now) {
                    $query->whereNull('unpublished_at')
                        ->orWhere('unpublished_at', '>', $now);
                })
                ->where(function ($query) use ($keyword) {
                    $this->matchColumns($query, $keyword, ['title', 'excerpt', 'content']);
                })
                ->with(['media' => fn ($query) => $query
                    ->where('active', true)
                    ->orderByDesc('featured')
                    ->orderBy('sort_order')])
                ->orderByDesc('published_at')
                ->limit(10)
                ->get()
                ->map(fn (Blog $item) => $this->result(
                    'Blogs',
                    'bi-journal-text',
                    $item->title,
                    $item->excerpt ?: Str::limit(strip_tags((string) $item->content), 180),
                    route('blog.show', ['slug' => $item->slug]),
                    $item->featured_image_path ?: $item->media->first()?->file_path,
                    $item->published_at ?: $item->created_at,
                    $keyword
                ))
        );

        return $results
            ->sort(function (array $a, array $b) {
                $scoreCompare = $b['score'] <=> $a['score'];
                return $scoreCompare !== 0
                    ? $scoreCompare
                    : strcasecmp($a['title'], $b['title']);
            })
            ->values()
            ->map(function (array $result, int $index) {
                $result['index'] = $index;
                unset($result['score']);
                return $result;
            });
    }

    private function matchColumns($query, string $keyword, array $columns): void
    {
        foreach ($columns as $column) {
            $query->orWhere($column, 'like', "%{$keyword}%");
        }
    }

    private function result(
        string $type,
        string $icon,
        string $title,
        ?string $description,
        string $url,
        ?string $image,
        $date,
        string $keyword
    ): array {
        $title = trim($title);
        $description = trim(strip_tags((string) $description));
        $term = Str::lower($keyword);
        $titleLower = Str::lower($title);

        $score = strcasecmp($title, $keyword) === 0 ? 100 : 0;
        $score += Str::startsWith($titleLower, $term) ? 60 : 0;
        $score += Str::contains($titleLower, $term) ? 35 : 0;
        $score += Str::contains(Str::lower($description), $term) ? 10 : 0;

        return [
            'type' => $type,
            'icon' => $icon,
            'title' => $title,
            'description' => Str::limit($description ?: 'Explore this section of Pooja Nilayam.', 220),
            'url' => $url,
            'image' => $this->assetUrl($image),
            'date' => $date ? $date->timestamp : 0,
            'score' => $score,
        ];
    }

    private function assetUrl(?string $path): ?string
    {
        if (! $path) {
            return null;
        }

        if (Str::startsWith($path, ['http://', 'https://', '//', 'data:'])) {
            return $path;
        }

        return asset(ltrim($path, '/'));
    }
}
