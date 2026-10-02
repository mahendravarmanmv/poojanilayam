<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $now = now();

        $categories = BlogCategory::query()
            ->where('active', true)
            ->orderBy('sort_order')
            ->orderBy('name')
            ->pluck('name')
            ->prepend('All')
            ->values();

        $baseQuery = $this->publishedQuery($now)
            ->with([
                'category:id,name,slug',
                'author:id,name',
                'media' => fn ($query) => $query
                    ->where('active', true)
                    ->orderByDesc('featured')
                    ->orderBy('sort_order'),
            ]);

        $featured = (clone $baseQuery)
            ->where('featured', true)
            ->orderByDesc('published_at')
            ->first();

        if (! $featured) {
            $featured = (clone $baseQuery)
                ->orderByDesc('published_at')
                ->first();
        }

        $postsQuery = (clone $baseQuery)
            ->when($request->filled('category') && strtolower($request->category) !== 'all', function ($query) use ($request) {
                $query->whereHas('category', function ($categoryQuery) use ($request) {
                    $categoryQuery->where('slug', $request->category)
                        ->orWhereRaw('LOWER(name) = ?', [strtolower($request->category)]);
                });
            })
            ->when($featured, fn ($query) => $query->where('id', '<>', $featured->getKey()))
            ->orderByDesc('published_at')
            ->orderByDesc('id');

        $posts = $postsQuery->get();

        return view('frontend.blog.index', [
            'featuredPost' => $featured ? $this->mapPost($featured) : null,
            'posts' => $posts->map(fn (Blog $blog) => $this->mapPost($blog))->values(),
            'categories' => $categories,
            'selectedCategory' => $request->category,
        ]);
    }

    public function show(string $slug)
    {
        $now = now();

        $post = $this->publishedQuery($now)
            ->with([
                'category:id,name,slug',
                'author:id,name',
                'tags:id,name,slug',
                'media' => fn ($query) => $query
                    ->where('active', true)
                    ->orderByDesc('featured')
                    ->orderBy('sort_order'),
            ])
            ->where('slug', $slug)
            ->firstOrFail();

        $relatedQuery = $this->publishedQuery($now)
            ->with(['category:id,name,slug', 'author:id,name', 'media' => fn ($query) => $query
                ->where('active', true)
                ->orderByDesc('featured')
                ->orderBy('sort_order')])
            ->where('id', '<>', $post->getKey())
            ->when($post->blog_category_id, fn ($query) => $query->where('blog_category_id', $post->blog_category_id))
            ->orderByDesc('published_at')
            ->orderByDesc('id')
            ->limit(3)
            ->get();

        if ($relatedQuery->isEmpty()) {
            $relatedQuery = $this->publishedQuery($now)
                ->with(['category:id,name,slug', 'author:id,name', 'media' => fn ($query) => $query
                    ->where('active', true)
                    ->orderByDesc('featured')
                    ->orderBy('sort_order')])
                ->where('id', '<>', $post->getKey())
                ->orderByDesc('published_at')
                ->orderByDesc('id')
                ->limit(3)
                ->get();
        }

        return view('frontend.blog.show', [
            'post' => $this->mapPost($post, true),
            'relatedPosts' => $relatedQuery->map(fn (Blog $blog) => $this->mapPost($blog))->values(),
        ]);
    }

    private function publishedQuery(Carbon $now)
    {
        return Blog::query()
            ->where('active', true)
            ->whereIn('status', ['published', 'publish'])
            ->where(function ($query) use ($now) {
                $query->whereNull('published_at')
                    ->orWhere('published_at', '<=', $now);
            })
            ->where(function ($query) use ($now) {
                $query->whereNull('unpublished_at')
                    ->orWhere('unpublished_at', '>', $now);
            });
    }

    private function mapPost(Blog $blog, bool $withContent = false): array
    {
        $contentText = trim(strip_tags((string) $blog->content));
        $imagePath = $blog->featured_image_path;

        if (! $imagePath) {
            $media = $blog->media->first();
            $imagePath = $media?->file_path;
        }

        $image = $this->assetUrl($imagePath);
        $author = $blog->author?->name ?: 'Pooja Nilayam';
        $date = $blog->published_at
            ? Carbon::parse($blog->published_at)->format('d F Y')
            : ($blog->created_at ? Carbon::parse($blog->created_at)->format('d F Y') : '');

        $data = [
            'id' => $blog->id,
            'title' => $blog->title,
            'excerpt' => $blog->excerpt ?: Str::limit($contentText, 180),
            'category' => $blog->category?->name ?: 'Spirituality',
            'category_slug' => $blog->category?->slug,
            'date' => $date,
            'author' => $author,
            'read_time' => $this->readTime($contentText),
            'image' => $image,
            'slug' => $blog->slug,
            'meta_title' => $blog->meta_title ?: $blog->title,
            'meta_description' => $blog->meta_description ?: ($blog->excerpt ?: Str::limit($contentText, 160)),
        ];

        if ($withContent) {
            $data['content'] = $this->contentSections($blog->content);
            $data['tags'] = $blog->tags->pluck('name')->values()->all();
            $data['canonical_url'] = $blog->canonical_url;
        }

        return $data;
    }

    private function contentSections(?string $content): array
    {
        if (! $content) {
            return [];
        }

        $decoded = json_decode($content, true);
        if (is_array($decoded)) {
            return collect($decoded)
                ->filter(fn ($section) => is_array($section) && isset($section['type'], $section['text']))
                ->map(fn ($section) => [
                    'type' => in_array($section['type'], ['paragraph', 'heading', 'quote'], true) ? $section['type'] : 'paragraph',
                    'text' => (string) $section['text'],
                ])
                ->values()
                ->all();
        }

        return collect(preg_split('/\R\s*\R/', trim(strip_tags($content))))
            ->filter(fn ($paragraph) => trim($paragraph) !== '')
            ->map(fn ($paragraph) => ['type' => 'paragraph', 'text' => trim($paragraph)])
            ->values()
            ->all();
    }

    private function readTime(string $content): string
    {
        $words = str_word_count($content);
        return max(1, (int) ceil($words / 200)) . ' min read';
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
