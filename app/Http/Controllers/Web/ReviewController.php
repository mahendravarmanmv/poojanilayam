<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Pooja;
use App\Models\Review;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ReviewController extends Controller
{
    public function store(Request $request, string $slug): RedirectResponse
    {
        $validated = $request->validate([
            'rating' => ['required', 'integer', 'min:1', 'max:5'],
            'title' => ['nullable', 'string', 'max:255'],
            'review_text' => ['nullable', 'string', 'max:5000'],
        ]);

        $pooja = Pooja::query()
            ->where('slug', $slug)
            ->where('is_active', true)
            ->where('status', 'active')
            ->firstOrFail();

        $customerProfile = $request->user()->customerProfile;

        if (!$customerProfile) {
            return back()->with(
                'error',
                'Please complete your customer profile before submitting a review.'
            );
        }

        $alreadyReviewed = Review::query()
            ->where('customer_profile_id', $customerProfile->id)
            ->where('reviewable_type', Pooja::class)
            ->where('reviewable_id', $pooja->id)
            ->exists();

        if ($alreadyReviewed) {
            return back()->with(
                'error',
                'You have already submitted a review for this pooja.'
            );
        }

        Review::create([
            'review_id' => 'REV-' . Str::upper(Str::random(12)),
            'customer_profile_id' => $customerProfile->id,
            'reviewable_type' => Pooja::class,
            'reviewable_id' => $pooja->id,
            'rating' => $validated['rating'],
            'title' => $validated['title'] ?? null,
            'review_text' => $validated['review_text'] ?? null,
            'status' => 'pending',
            'is_verified' => false,
            'is_featured' => false,
            'customer_visible' => false,
            'submitted_at' => now(),
            'published_at' => null,
            'hidden_at' => null,
        ]);

        return back()->with(
            'success',
            'Thank you! Your review has been submitted and is awaiting approval.'
        );
    }
}
