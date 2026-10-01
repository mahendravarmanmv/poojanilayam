<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\DigitalPoojaTemplate;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DigitalPoojaController extends Controller
{
    private function baseTemplateQuery()
    {
        return DigitalPoojaTemplate::query()
            ->where('active', true)
            ->with([
                'pooja.category',
                'pooja.detail',
                'pooja.gods' => fn ($query) => $query
                    ->wherePivot('is_active', true)
                    ->orderByPivot('sort_order'),
                'pooja.media' => fn ($query) => $query
                    ->where('is_active', true)
                    ->orderBy('sort_order'),
                'pooja.pricing' => fn ($query) => $query
                    ->where('is_active', true)
                    ->orderByDesc('is_default')
                    ->orderByDesc('effective_from'),
                'steps' => fn ($query) => $query
                    ->where('active', true)
                    ->orderBy('sort_order'),
            ]);
    }

    public function index(Request $request): View
    {
        $templates = $this->baseTemplateQuery()
            ->whereHas('pooja', fn ($query) => $query
                ->where('is_active', true)
                ->where('status', 'active'))
            ->when($request->filled('search'), function ($query) use ($request) {
                $term = trim((string) $request->input('search'));

                $query->where(function ($query) use ($term) {
                    $query->where('name', 'like', "%{$term}%")
                        ->orWhere('description', 'like', "%{$term}%")
                        ->orWhereHas('pooja', function ($query) use ($term) {
                            $query->where('name', 'like', "%{$term}%")
                                ->orWhere('short_description', 'like', "%{$term}%")
                                ->orWhere('description', 'like', "%{$term}%")
                                ->orWhereHas('gods', fn ($query) => $query->where('name', 'like', "%{$term}%"));
                        });
                });
            })
            ->orderBy('name')
            ->get();

        $digitalPoojas = $templates
            ->sortByDesc(fn (DigitalPoojaTemplate $template) => (int) ($template->pooja?->is_featured ?? false))
            ->sortBy(fn (DigitalPoojaTemplate $template) => (int) ($template->pooja?->sort_order ?? 0))
            ->map(fn (DigitalPoojaTemplate $template) => $this->mapCard($template))
            ->values();

        $gods = $templates
            ->flatMap(fn (DigitalPoojaTemplate $template) => $template->pooja?->gods ?? collect())
            ->unique('id')
            ->sortBy('name')
            ->map(fn ($god) => [
                'name' => $god->name,
                'icon' => 'bi-stars',
            ])
            ->values();

        return view('frontend.digital-poojas.index', [
            'digitalPoojas' => $digitalPoojas,
            'gods' => $gods,
        ]);
    }

    public function show(string $slug): View
    {
        $template = $this->findPublicTemplate($slug);
        $pooja = $template->pooja;

        $relatedPoojas = $this->baseTemplateQuery()
            ->where('id', '!=', $template->getKey())
            ->whereHas('pooja', fn ($query) => $query
                ->where('is_active', true)
                ->where('status', 'active'))
            ->orderBy('name')
            ->limit(3)
            ->get()
            ->sortByDesc(fn (DigitalPoojaTemplate $item) => (int) ($item->pooja?->is_featured ?? false))
            ->sortBy(fn (DigitalPoojaTemplate $item) => (int) ($item->pooja?->sort_order ?? 0))
            ->map(fn (DigitalPoojaTemplate $item) => $this->mapCard($item))
            ->values();

        return view('frontend.digital-poojas.show', [
            'pooja' => $this->mapDetail($template),
            'relatedPoojas' => $relatedPoojas,
        ]);
    }

    public function schedule(string $slug): View
    {
        $template = $this->findPublicTemplate($slug);

        return view('frontend.digital-poojas.schedule', [
            'pooja' => $this->mapCard($template),
            'template' => $template,
        ]);
    }

    private function findPublicTemplate(string $slug): DigitalPoojaTemplate
    {
        return $this->baseTemplateQuery()
            ->whereHas('pooja', fn ($query) => $query
                ->where('is_active', true)
                ->where('status', 'active'))
            ->where(function ($query) use ($slug) {
                $query->where('template_code', $slug)
                    ->orWhereHas('pooja', fn ($query) => $query
                        ->where('slug', $slug));
            })
            ->firstOrFail();
    }

    private function mapCard(DigitalPoojaTemplate $template): array
    {
        $pooja = $template->pooja;
        $media = $pooja?->media?->first();
        $god = $pooja?->gods?->first();
        $pricing = $pooja?->pricing?->first();

        return [
            'name' => $pooja?->name ?? $template->name,
            'god' => $god?->name ?? 'Not specified',
            'image' => $media?->file_path,
            'description' => $pooja?->short_description ?: ($template->description ?: 'Digital Pooja details are being prepared.'),
            'price' => $pricing?->amount !== null ? (float) $pricing->amount : null,
            'duration' => $pooja?->duration_minutes ? $pooja->duration_minutes . ' Mins' : 'Not specified',
            'rating' => '—',
            'reviews' => '—',
            'language' => 'Configured during scheduling',
            'tag' => $pooja?->is_featured ? 'Featured' : null,
            'features' => $template->steps->pluck('title')->filter()->take(4)->values()->all(),
            'slug' => $pooja?->slug ?: $template->template_code,
        ];
    }

    private function mapDetail(DigitalPoojaTemplate $template): array
    {
        $pooja = $template->pooja;
        $card = $this->mapCard($template);
        $detail = $pooja?->detail;

        $benefits = collect(preg_split('/\r\n|\r|\n/', (string) ($detail?->benefits ?? '')))
            ->map(fn ($item) => trim($item))
            ->filter()
            ->values()
            ->all();

        return array_merge($card, [
            'category' => $pooja?->category?->name ?? 'Digital Pooja',
            'short_description' => $card['description'],
            'description' => $pooja?->description ?: ($template->description ?: 'Digital Pooja details are being prepared.'),
            'languages' => [],
            'benefits' => $benefits,
            'template_code' => $template->template_code,
            'template_version' => $template->version,
            'template_steps' => $template->steps->map(fn ($step) => [
                'title' => $step->title,
                'type' => $step->step_type,
                'content' => $step->content,
                'media_path' => $step->media_path,
            ])->values()->all(),
        ]);
    }
}
