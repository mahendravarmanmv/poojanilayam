<?php

namespace App\Http\Controllers\Web\Customer;

use App\Http\Controllers\Controller;
use App\Models\Currency;
use App\Models\Language;
use App\Models\NotificationPreference;
use App\Models\NotificationTemplate;
use App\Models\Timezone;
use App\Models\UserPreference;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class CustomerPreferencesController extends Controller
{
    public function edit(Request $request): View
    {
        $user = $request->user();

        $preference = $user->preferences;

        $languages = Language::query()
            ->where('is_active', true)
            ->orderBy('name')
            ->get(['id', 'name', 'code', 'native_name']);

        $timezones = Timezone::query()
            ->where('is_active', true)
            ->orderBy('name')
            ->get(['id', 'name', 'utc_offset']);

        $currencies = Currency::query()
            ->where('is_active', true)
            ->orderBy('code')
            ->get(['code', 'name', 'symbol']);

        $templateTypes = NotificationTemplate::query()
            ->where('active', true)
            ->whereNotNull('event_type')
            ->distinct()
            ->orderBy('event_type')
            ->pluck('event_type');

        $savedPreferences = NotificationPreference::query()
            ->where('user_id', $user->id)
            ->orderBy('notification_type')
            ->get()
            ->keyBy('notification_type');

        $notificationTypes = $templateTypes
            ->merge($savedPreferences->keys())
            ->unique()
            ->sort()
            ->values()
            ->mapWithKeys(function (string $type) use ($savedPreferences) {
                return [$type => $savedPreferences->get($type)];
            });

        return view('frontend.dashboard.preferences', compact(
            'preference',
            'languages',
            'timezones',
            'currencies',
            'notificationTypes'
        ));
    }

    public function update(Request $request): RedirectResponse
    {
        $user = $request->user();

        $validated = $request->validate([
            'language_id' => ['nullable', 'integer', 'exists:languages,id'],
            'timezone_id' => ['nullable', 'integer', 'exists:timezones,id'],
            'currency_code' => ['nullable', 'string', 'size:3'],
            'preferences' => ['nullable', 'array'],
            'notifications' => ['nullable', 'array'],
            'notifications.*' => ['nullable', 'array'],
            'notifications.*.email' => ['nullable', 'boolean'],
            'notifications.*.sms' => ['nullable', 'boolean'],
            'notifications.*.whatsapp' => ['nullable', 'boolean'],
            'notifications.*.push' => ['nullable', 'boolean'],
        ]);

        if (!empty($validated['language_id'])) {
            abort_unless(
                Language::whereKey($validated['language_id'])->where('is_active', true)->exists(),
                422,
                'Selected language is not active.'
            );
        }

        if (!empty($validated['timezone_id'])) {
            abort_unless(
                Timezone::whereKey($validated['timezone_id'])->where('is_active', true)->exists(),
                422,
                'Selected timezone is not active.'
            );
        }

        if (!empty($validated['currency_code'])) {
            $validated['currency_code'] = strtoupper($validated['currency_code']);
            abort_unless(
                Currency::where('code', $validated['currency_code'])->where('is_active', true)->exists(),
                422,
                'Selected currency is not active.'
            );
        }

        DB::transaction(function () use ($user, $validated) {
            UserPreference::updateOrCreate(
                ['user_id' => $user->id],
                [
                    'language_id' => $validated['language_id'] ?? null,
                    'timezone_id' => $validated['timezone_id'] ?? null,
                    'currency_code' => $validated['currency_code'] ?? null,
                    'preferences' => $validated['preferences'] ?? ($user->preferences?->preferences ?? null),
                ]
            );

            $notificationTypes = NotificationTemplate::query()
                ->where('active', true)
                ->whereNotNull('event_type')
                ->distinct()
                ->pluck('event_type');

            foreach ($notificationTypes as $type) {
                $channels = $validated['notifications'][$type] ?? null;

                NotificationPreference::updateOrCreate(
                    [
                        'user_id' => $user->id,
                        'notification_type' => $type,
                    ],
                    [
                        'email_enabled' => (bool) ($channels['email'] ?? true),
                        'sms_enabled' => (bool) ($channels['sms'] ?? true),
                        'whatsapp_enabled' => (bool) ($channels['whatsapp'] ?? true),
                        'push_enabled' => (bool) ($channels['push'] ?? true),
                    ]
                );
            }

            // Update already-saved preference types even when no active template currently exists.
            foreach (($validated['notifications'] ?? []) as $type => $channels) {
                if (!is_array($channels) || !is_string($type)) {
                    continue;
                }

                NotificationPreference::updateOrCreate(
                    [
                        'user_id' => $user->id,
                        'notification_type' => $type,
                    ],
                    [
                        'email_enabled' => (bool) ($channels['email'] ?? true),
                        'sms_enabled' => (bool) ($channels['sms'] ?? true),
                        'whatsapp_enabled' => (bool) ($channels['whatsapp'] ?? true),
                        'push_enabled' => (bool) ($channels['push'] ?? true),
                    ]
                );
            }
        });

        return back()->with('success', 'Your preferences have been updated successfully.');
    }
}
