<?php

namespace App\Http\Controllers;

use App\Models\Festival;
use Carbon\Carbon;
use Illuminate\View\View;

class FestivalController extends Controller
{
    public function index(): View
    {
        $today = Carbon::today();

        $festivals = Festival::query()
            ->where('active', true)
            ->where(function ($query) use ($today) {
                $query->whereNull('end_date')
                    ->orWhereDate('end_date', '>=', $today);
            })
            ->orderByRaw('COALESCE(start_date, end_date) ASC')
            ->orderBy('sort_order')
            ->limit(12)
            ->get();

        return view('frontend.festivals.index', compact('festivals'));
    }

    public function calendar(): View
    {
        $today = Carbon::today();
        $year = (int) request()->integer('year', $today->year);
        $year = max(2000, min($year, 2100));

        $months = [];

        $festivals = Festival::query()
            ->with(['occurrences' => function ($query) use ($year) {
                $query->where('active', true)
                    ->whereYear('occurrence_date', $year)
                    ->orderBy('occurrence_date');
            }])
            ->where('active', true)
            ->where(function ($query) use ($year) {
                $query->where(function ($q) use ($year) {
                    $q->whereYear('start_date', $year)
                        ->orWhereYear('end_date', $year);
                })->orWhereHas('occurrences', function ($q) use ($year) {
                    $q->where('active', true)->whereYear('occurrence_date', $year);
                });
            })
            ->orderBy('sort_order')
            ->orderBy('name')
            ->get();

        foreach ($festivals as $festival) {
            $occurrences = $festival->occurrences;

            if ($occurrences->isNotEmpty()) {
                foreach ($occurrences as $occurrence) {
                    $monthKey = $occurrence->occurrence_date->format('Y-m');
                    $months[$monthKey]['month'] ??= $occurrence->occurrence_date->format('F Y');
                    $months[$monthKey]['festivals'][] = [
                        'name' => $festival->name,
                        'slug' => $festival->slug,
                        'date' => $occurrence->occurrence_date->format('d M'),
                        'description' => $festival->short_description ?: $festival->description,
                    ];
                }
                continue;
            }

            if ($festival->start_date && (int) $festival->start_date->format('Y') === $year) {
                $monthKey = $festival->start_date->format('Y-m');
                $months[$monthKey]['month'] ??= $festival->start_date->format('F Y');
                $months[$monthKey]['festivals'][] = [
                    'name' => $festival->name,
                    'slug' => $festival->slug,
                    'date' => $festival->start_date->format('d M'),
                    'description' => $festival->short_description ?: $festival->description,
                ];
            }
        }

        ksort($months);

        return view('frontend.festivals.calendar', [
            'months' => array_values($months),
            'calendarYear' => $year,
        ]);
    }

    public function show(string $slug): View
    {
        $festival = Festival::query()
            ->with(['occurrences' => function ($query) {
                $query->where('active', true)
                    ->orderBy('occurrence_date')
                    ->orderBy('start_time');
            }])
            ->where('slug', $slug)
            ->where('active', true)
            ->firstOrFail();

        return view('frontend.festivals.show', [
            'festival' => $festival,
            'poojas' => collect(),
        ]);
    }
}
