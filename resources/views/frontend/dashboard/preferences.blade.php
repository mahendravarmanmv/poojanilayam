@extends('layouts.app')

@section('title', 'Preferences - Pooja Nilayam')

@section('content')
<div class="container py-4 py-lg-5">
    <div class="row justify-content-center">
        <div class="col-12 col-xl-10">
            <div class="mb-4">
                <h1 class="h3 mb-1">Preferences</h1>
                <p class="text-muted mb-0">Manage your language, timezone, currency and notification preferences.</p>
            </div>

            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('dashboard.preferences.update') }}">
                @csrf
                @method('PUT')

                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body p-4">
                        <h2 class="h5 mb-3">General Preferences</h2>

                        <div class="row g-3">
                            <div class="col-md-4">
                                <label for="language_id" class="form-label">Language</label>
                                <select id="language_id" name="language_id" class="form-select">
                                    <option value="">Select language</option>
                                    @foreach ($languages as $language)
                                        <option value="{{ $language->id }}" @selected(old('language_id', $preference?->language_id) == $language->id)>
                                            {{ $language->name }}{{ $language->native_name ? ' - ' . $language->native_name : '' }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-4">
                                <label for="timezone_id" class="form-label">Timezone</label>
                                <select id="timezone_id" name="timezone_id" class="form-select">
                                    <option value="">Select timezone</option>
                                    @foreach ($timezones as $timezone)
                                        <option value="{{ $timezone->id }}" @selected(old('timezone_id', $preference?->timezone_id) == $timezone->id)>
                                            {{ $timezone->name }}{{ $timezone->utc_offset ? ' (' . $timezone->utc_offset . ')' : '' }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-4">
                                <label for="currency_code" class="form-label">Currency</label>
                                <select id="currency_code" name="currency_code" class="form-select">
                                    <option value="">Select currency</option>
                                    @foreach ($currencies as $currency)
                                        <option value="{{ $currency->code }}" @selected(old('currency_code', $preference?->currency_code) === $currency->code)>
                                            {{ $currency->code }} - {{ $currency->name }}{{ $currency->symbol ? ' (' . $currency->symbol . ')' : '' }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body p-4">
                        <h2 class="h5 mb-2">Notification Preferences</h2>
                        <p class="text-muted small mb-4">Choose the communication channels for notification events configured by the platform.</p>

                        @if ($notificationTypes->isEmpty())
                            <div class="alert alert-info mb-0">
                                Notification event types will appear here after notification templates are configured by the platform.
                            </div>
                        @else
                            <div class="table-responsive">
                                <table class="table align-middle mb-0">
                                    <thead>
                                        <tr>
                                            <th>Notification</th>
                                            <th class="text-center">Email</th>
                                            <th class="text-center">SMS</th>
                                            <th class="text-center">WhatsApp</th>
                                            <th class="text-center">Push</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($notificationTypes as $type => $notificationPreference)
                                            <tr>
                                                <td class="fw-medium">{{ str($type)->replace('_', ' ')->headline() }}</td>
                                                @foreach (['email' => 'email_enabled', 'sms' => 'sms_enabled', 'whatsapp' => 'whatsapp_enabled', 'push' => 'push_enabled'] as $channel => $field)
                                                    <td class="text-center">
                                                        <input
                                                            class="form-check-input"
                                                            type="checkbox"
                                                            name="notifications[{{ $type }}][{{ $channel }}]"
                                                            value="1"
                                                            @checked($notificationPreference?->{$field} ?? true)
                                                        >
                                                    </td>
                                                @endforeach
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary px-4">Save Preferences</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
