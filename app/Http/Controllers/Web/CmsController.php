<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\CmsFaq;
use App\Models\CmsPage;
use App\Models\CmsTestimonial;
use Illuminate\Support\Str;
use Illuminate\View\View;

class CmsController extends Controller
{
    public function about(): View
    {
        return $this->page('about-us', 'frontend.cms.about-us');
    }

    public function privacyPolicy(): View
    {
        return $this->page('privacy-policy', 'frontend.cms.privacy-policy');
    }

    public function termsConditions(): View
    {
        return $this->page('terms-conditions', 'frontend.cms.terms-conditions');
    }

    public function refundPolicy(): View
    {
        return $this->page('refund-policy', 'frontend.cms.refund-policy');
    }

    public function shippingPolicy(): View
    {
        return $this->page('shipping-policy', 'frontend.cms.shipping-policy');
    }

    public function disclaimer(): View
    {
        return $this->page('disclaimer', 'frontend.cms.disclaimer');
    }

    public function careers(): View
    {
        return $this->page('careers', 'frontend.cms.careers');
    }

    /**
     * Show a standard CMS page while preserving the existing frontend layout.
     */
    private function page(string $slug, string $view): View
    {
        $cmsPage = $this->publishedPage($slug);

        return view($view, compact('cmsPage'));
    }

    /**
     * FAQ page uses the dedicated CMS FAQ table when published records exist.
     * The Blade view retains its existing documented fallback content otherwise.
     */
    public function faq(): View
    {
        $cmsPage = $this->publishedPage('faq');

        $faqs = CmsFaq::query()
            ->where('active', true)
            ->where('status', 'published')
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get()
            ->map(function (CmsFaq $faq): array {
                return [
                    'category' => Str::slug($faq->category ?: 'general'),
                    'question' => $faq->question,
                    'answer' => $faq->answer,
                ];
            })
            ->values()
            ->all();

        $faqCategories = collect($faqs)
            ->pluck('category')
            ->filter()
            ->unique()
            ->values()
            ->map(function (string $key): array {
                $known = [
                    'general' => ['title' => 'General', 'icon' => 'bi-info-circle'],
                    'pooja' => ['title' => 'Pooja & Booking', 'icon' => 'bi-flower1'],
                    'digital' => ['title' => 'Digital Pooja', 'icon' => 'bi-stars'],
                    'temple' => ['title' => 'Temples & Priests', 'icon' => 'bi-building'],
                    'astrology' => ['title' => 'Astrology', 'icon' => 'bi-moon-stars'],
                    'store' => ['title' => 'Store & Orders', 'icon' => 'bi-bag'],
                    'donation' => ['title' => 'Donations', 'icon' => 'bi-heart'],
                    'support' => ['title' => 'Support', 'icon' => 'bi-headset'],
                ];

                return [
                    'key' => $key,
                    'title' => $known[$key]['title'] ?? Str::headline($key),
                    'icon' => $known[$key]['icon'] ?? 'bi-question-circle',
                ];
            })
            ->all();

        return view('frontend.cms.faq', compact('cmsPage', 'faqs', 'faqCategories'));
    }

    /**
     * Testimonials are sourced from the dedicated CMS testimonials table.
     * The existing UI's expected field shape is preserved.
     */
    public function testimonials(): View
    {
        $cmsPage = $this->publishedPage('testimonials');

        $testimonials = CmsTestimonial::query()
            ->where('active', true)
            ->where('status', 'published')
            ->where(function ($query): void {
                $query->whereNull('published_at')
                    ->orWhere('published_at', '<=', now());
            })
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get()
            ->map(function (CmsTestimonial $testimonial): array {
                return [
                    'id' => $testimonial->id,
                    'name' => $testimonial->name,
                    'city' => $testimonial->location,
                    'rating' => $testimonial->rating,
                    'review' => $testimonial->testimonial,
                    'service' => 'Pooja Nilayam',
                    'avatar' => $testimonial->photo_path,
                    'verified' => false,
                    'featured' => $testimonial->featured,
                ];
            })
            ->values()
            ->all();

        return view('frontend.cms.testimonials', compact('cmsPage', 'testimonials'));
    }

    private function publishedPage(string $slug): ?CmsPage
    {
        return CmsPage::query()
            ->with([
                'sections' => fn ($query) => $query
                    ->where('status', 'published')
                    ->orderBy('sort_order')
                    ->orderBy('id'),
                'media' => fn ($query) => $query
                    ->where('active', true)
                    ->orderBy('sort_order')
                    ->orderBy('id'),
            ])
            ->where('slug', $slug)
            ->where('active', true)
            ->where('status', 'published')
            ->where(function ($query): void {
                $query->whereNull('published_at')
                    ->orWhere('published_at', '<=', now());
            })
            ->where(function ($query): void {
                $query->whereNull('unpublished_at')
                    ->orWhere('unpublished_at', '>=', now());
            })
            ->first();
    }
}
