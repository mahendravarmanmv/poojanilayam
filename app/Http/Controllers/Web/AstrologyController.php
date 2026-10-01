<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\AstrologerProfile;
use App\Models\AstrologyService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class AstrologyController extends Controller
{
    /**
     * Display the public astrology catalogue and approved astrologers.
     */
    public function index(Request $request): View
    {
        $services = AstrologyService::query()
            ->where('active', true)
            ->where('status', 'published')
            ->with('category:id,name,slug')
            ->orderBy('sort_order')
            ->orderBy('name')
            ->get()
            ->map(function (AstrologyService $service): array {
                $slug = $service->slug;

                $icon = match ($slug) {
                    'horoscope' => 'bi-stars',
                    'kundli' => 'bi-diagram-3',
                    'match-making' => 'bi-heart',
                    'numerology' => 'bi-123',
                    'palm-reading' => 'bi-hand-index-thumb',
                    'vastu-consultation' => 'bi-house-heart',
                    default => 'bi-stars',
                };

                return [
                    'id' => $service->id,
                    'title' => $service->name,
                    'subtitle' => $service->service_type,
                    'description' => $service->short_description ?: $service->description,
                    'icon' => $icon,
                    'color' => 'bg-pn-cream',
                    'slug' => $slug,
                ];
            })
            ->values();

        $astrologers = AstrologerProfile::query()
            ->where('status', 'active')
            ->where('verification_status', 'approved')
            ->with([
                'languages.language:id,name',
                'services' => fn ($query) => $query
                    ->where('active', true)
                    ->with('astrologyService:id,name,slug'),
            ])
            ->orderByDesc('approved_at')
            ->orderBy('display_name')
            ->limit(6)
            ->get()
            ->map(function (AstrologerProfile $astrologer): array {
                $specialization = $astrologer->specializations;

                if (is_string($specialization)) {
                    $decoded = json_decode($specialization, true);
                    $specialization = is_array($decoded) ? implode(', ', $decoded) : $specialization;
                }

                $languages = $astrologer->languages
                    ->map(fn ($item) => $item->language?->name)
                    ->filter()
                    ->implode(' · ');

                return [
                    'id' => $astrologer->id,
                    'name' => $astrologer->display_name,
                    'specialization' => $specialization ?: ($astrologer->headline ?: 'Astrology Consultation'),
                    'experience' => $astrologer->experience_years !== null
                        ? $astrologer->experience_years . '+ Years'
                        : 'Experience not specified',
                    'rating' => null,
                    'reviews' => 0,
                    'languages' => $languages ?: 'Languages not specified',
                    'image' => $astrologer->profile_photo,
                    'verified' => true,
                    'headline' => $astrologer->headline,
                ];
            })
            ->values();

        return view('frontend.astrology.index', [
            'services' => $services,
            'astrologers' => $astrologers,
            'consultationTypes' => [
                [
                    'title' => 'Video Consultation',
                    'icon' => 'bi-camera-video',
                    'description' => 'Connect with an astrologer through a video consultation.',
                ],
                [
                    'title' => 'Audio Consultation',
                    'icon' => 'bi-telephone',
                    'description' => 'Speak directly with an astrologer through an audio consultation.',
                ],
                [
                    'title' => 'Chat Consultation',
                    'icon' => 'bi-chat-dots',
                    'description' => 'Discuss your questions through a convenient chat consultation.',
                ],
            ],
            'topics' => [
                'Career',
                'Marriage',
                'Relationships',
                'Finance',
                'Family',
                'Education',
                'Health',
                'Business',
            ],
        ]);
    }
}
