<?php

namespace App\Http\Controllers\Web\Customer;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Country;
use App\Models\CustomerProfile;
use App\Models\Booking;
use App\Models\DigitalPooja;
use App\Models\Notification;
use App\Models\Order;
use App\Models\Language;
use App\Models\State;
use App\Models\City;
use App\Models\Timezone;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class CustomerDashboardController extends Controller
{
    public function index(Request $request): View
    {
        $user = $request->user()->loadMissing(['profile', 'customerProfile', 'addresses']);
        $customerProfileId = $user->customerProfile?->id;

        $bookingQuery = Booking::query()
            ->where('customer_profile_id', $customerProfileId);

        $digitalQuery = DigitalPooja::query()
            ->where('customer_profile_id', $customerProfileId);

        $orderQuery = Order::query()
            ->where('customer_profile_id', $customerProfileId);

        $stats = [
            ['title' => 'Pooja Bookings', 'value' => $customerProfileId ? (clone $bookingQuery)->count() : 0, 'description' => 'Total bookings', 'icon' => 'bi-flower1', 'color' => 'primary'],
            ['title' => 'Digital Poojas', 'value' => $customerProfileId ? (clone $digitalQuery)->count() : 0, 'description' => 'Digital bookings', 'icon' => 'bi-camera-video', 'color' => 'success'],
            ['title' => 'Orders', 'value' => $customerProfileId ? (clone $orderQuery)->count() : 0, 'description' => 'Store orders', 'icon' => 'bi-bag', 'color' => 'warning'],
            ['title' => 'Wishlist', 'value' => $user->wishlists()->where('active', true)->withCount('items')->get()->sum('items_count'), 'description' => 'Saved items', 'icon' => 'bi-heart', 'color' => 'danger'],
        ];

        $upcomingBookings = $customerProfileId
            ? (clone $bookingQuery)->with(['templePooja.pooja', 'bookingSlot'])->whereIn('status', ['pending', 'confirmed', 'scheduled'])->orderBy('booking_date')->orderBy('start_time')->limit(3)->get()->map(fn ($booking) => [
                'type' => 'Pooja Booking',
                'name' => $booking->templePooja?->pooja?->name ?? 'Pooja Booking',
                'date' => $booking->booking_date?->format('d F Y') ?? 'Date not scheduled',
                'time' => $booking->start_time ? date('h:i A', strtotime($booking->start_time)) : 'Time not scheduled',
                'status' => str($booking->status)->replace('_', ' ')->title()->toString(),
                'icon' => 'bi-flower1',
            ])->values()->all() : [];

        $recentOrders = $customerProfileId
            ? (clone $orderQuery)->withCount('items')->latest('id')->limit(3)->get()->map(fn ($order) => [
                'number' => $order->order_id,
                'date' => optional($order->placed_at ?? $order->created_at)->format('d F Y'),
                'items' => $order->items_count,
                'amount' => (float) $order->total_amount,
                'status' => str($order->status ?: 'pending')->replace('_', ' ')->title()->toString(),
            ])->values()->all() : [];

        $notifications = Notification::query()
            ->where('user_id', $user->id)
            ->latest('created_at')
            ->limit(3)
            ->get()
            ->map(fn ($notification) => [
                'title' => $notification->title,
                'time' => optional($notification->created_at)->diffForHumans(),
                'icon' => $notification->is_read ? 'bi-bell' : 'bi-bell-fill',
                'color' => $notification->is_read ? 'secondary' : 'primary',
            ])->values()->all();

        return view('frontend.dashboard.index', [
            'user' => [
                'name' => $user->profile?->display_name ?: $user->name,
                'email' => $user->email,
                'mobile' => $user->mobile,
                'initials' => collect(preg_split('/\s+/', trim($user->profile?->display_name ?: $user->name)))->filter()->map(fn ($part) => strtoupper(substr($part, 0, 1)))->take(2)->implode(''),
            ],
            'profile' => $user->profile,
            'customerProfile' => $user->customerProfile,
            'addresses' => $user->addresses()->latest()->get(),
            'stats' => $stats,
            'upcomingBookings' => $upcomingBookings,
            'recentOrders' => $recentOrders,
            'notifications' => $notifications,
        ]);
    }

    public function profile(Request $request): View
    {
        $user = $request->user()->loadMissing(['profile', 'customerProfile', 'addresses']);

        return view('frontend.dashboard.profile', [
            'user' => $user,
            'profile' => $user->profile,
            'customerProfile' => $user->customerProfile,
            'defaultAddress' => $user->addresses()->where('is_default', true)->first(),
        ]);
    }

    public function editProfile(Request $request): View
    {
        $user = $request->user()->loadMissing(['profile', 'customerProfile']);

        $notificationPreferences = DB::table('notification_preferences')
            ->where('user_id', $user->id)
            ->get()
            ->mapWithKeys(function ($preference) {
                $enabled = (bool) ($preference->email_enabled || $preference->sms_enabled || $preference->whatsapp_enabled || $preference->push_enabled);
                $type = strtolower((string) $preference->notification_type);

                if (str_contains($type, 'booking')) {
                    return ['booking' => $enabled];
                }
                if (str_contains($type, 'order')) {
                    return ['order' => $enabled];
                }
                if (str_contains($type, 'offer') || str_contains($type, 'promo')) {
                    return ['offers' => $enabled];
                }

                return [];
            })
            ->all();

        return view('frontend.dashboard.edit-profile', [
            'user' => $user,
            'profile' => $user->profile,
            'customerProfile' => $user->customerProfile,
            'notificationPreferences' => $notificationPreferences,
            'languages' => Language::where('is_active', true)->orderBy('name')->get(),
            'timezones' => Timezone::where('is_active', true)->orderBy('name')->get(),
        ]);
    }

    public function updateProfile(Request $request): RedirectResponse
    {
        $user = $request->user();

        $validated = $request->validate([
            'first_name' => ['required', 'string', 'max:100'],
            'last_name' => ['nullable', 'string', 'max:100'],
            'display_name' => ['nullable', 'string', 'max:150'],
            'date_of_birth' => ['nullable', 'date', 'before:today'],
            'gender' => ['nullable', 'in:male,female,other'],
            'preferred_language_id' => ['required', 'integer', 'exists:languages,id'],
            'timezone_id' => ['nullable', 'integer', 'exists:timezones,id'],
            'email' => ['required', 'email:rfc', 'max:255', \Illuminate\Validation\Rule::unique('users', 'email')->ignore($user->id)],
            'mobile' => ['required', 'regex:/^[0-9]{10}$/', \Illuminate\Validation\Rule::unique('users', 'mobile')->ignore($user->id)],
            'profile_photo' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'remove_profile_photo' => ['nullable', 'boolean'],
            'booking_notifications' => ['nullable', 'boolean'],
            'order_notifications' => ['nullable', 'boolean'],
            'offer_notifications' => ['nullable', 'boolean'],
        ], [
            'mobile.regex' => 'Please enter a valid 10-digit mobile number.',
            'profile_photo.max' => 'The profile photo must not exceed 2 MB.',
        ]);

        $firstName = trim($validated['first_name']);
        $lastName = trim($validated['last_name'] ?? '');
        $displayName = trim($validated['display_name'] ?? '') ?: trim($firstName . ' ' . $lastName);
        $profile = $user->profile()->firstOrNew([]);
        $oldPhoto = $profile->profile_photo;
        $newPhotoPath = null;

        if ($request->hasFile('profile_photo')) {
            $newPhotoPath = $request->file('profile_photo')->store('profile-photos', 'public');
        }

        $removePhoto = $request->boolean('remove_profile_photo') && ! $request->hasFile('profile_photo');

        try {
            DB::transaction(function () use ($user, $profile, $validated, $firstName, $lastName, $displayName, $newPhotoPath, $removePhoto): void {
                $profile->first_name = $firstName;
                $profile->last_name = $lastName !== '' ? $lastName : null;
                $profile->display_name = $displayName;
                $profile->date_of_birth = $validated['date_of_birth'] ?? null;
                $profile->gender = $validated['gender'] ?? null;
                $profile->preferred_language_id = $validated['preferred_language_id'];
                $profile->timezone_id = $validated['timezone_id'] ?? null;

                if ($newPhotoPath !== null) {
                    $profile->profile_photo = $newPhotoPath;
                } elseif ($removePhoto) {
                    $profile->profile_photo = null;
                }

                $profile->user_id = $user->id;
                $profile->save();

                $user->name = $displayName;
                $user->email = trim($validated['email']);
                $user->mobile = trim($validated['mobile']);
                $user->save();

                if ($user->customerProfile) {
                    $user->customerProfile->preferred_language_id = $validated['preferred_language_id'];
                    $user->customerProfile->save();
                }

                // The existing schema stores preferences as one row per notification type.
                $preferenceTypes = [
                    'booking' => (bool) ($validated['booking_notifications'] ?? false),
                    'order' => (bool) ($validated['order_notifications'] ?? false),
                    'offers' => (bool) ($validated['offer_notifications'] ?? false),
                ];

                foreach ($preferenceTypes as $type => $enabled) {
                    $existingPreference = DB::table('notification_preferences')
                        ->where('user_id', $user->id)
                        ->where('notification_type', $type)
                        ->exists();

                    $preferenceValues = [
                        'email_enabled' => $enabled,
                        'sms_enabled' => $enabled,
                        'whatsapp_enabled' => $enabled,
                        'push_enabled' => $enabled,
                        'updated_at' => now(),
                    ];

                    if (! $existingPreference) {
                        $preferenceValues['created_at'] = now();
                    }

                    DB::table('notification_preferences')->updateOrInsert(
                        ['user_id' => $user->id, 'notification_type' => $type],
                        $preferenceValues
                    );
                }
            });
        } catch (\Throwable $exception) {
            if ($newPhotoPath !== null) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($newPhotoPath);
            }
            throw $exception;
        }

        if (($newPhotoPath !== null || $removePhoto) && $oldPhoto && $oldPhoto !== $newPhotoPath) {
            \Illuminate\Support\Facades\Storage::disk('public')->delete($oldPhoto);
        }

        return redirect()
            ->route('dashboard.profile')
            ->with('success', 'Profile updated successfully.');
    }

    public function addresses(Request $request): View
    {
        $user = $request->user();

        return view('frontend.dashboard.address-book', [
            'user' => $user,
            'addresses' => $user->addresses()
                ->with(['city', 'state', 'country'])
                ->orderByDesc('is_default')
                ->latest('id')
                ->get(),
        ]);
    }

	public function createAddress(Request $request): View
	{
	return view('frontend.dashboard.add-address', [
		'user' => $request->user(),

		'countries' => Country::query()
			->where('is_active', true)
			->orderBy('name')
			->get(),

		'states' => State::query()
			->where('is_active', true)
			->orderBy('name')
			->get(),		

		'addressTypes' => [
			'home' => 'Home',
			'office' => 'Office',
			'other' => 'Other',
		],
	]);
	}
	
	public function cities(Request $request)
	{
	$validated = $request->validate([
		'state_id' => ['required', 'integer', 'exists:states,id'],
	]);

	return response()->json(
		City::query()
			->where('state_id', $validated['state_id'])
			->where('is_active', true)
			->orderBy('name')
			->get(['id', 'name'])
	);
	}

	public function storeAddress(Request $request): RedirectResponse
	{
	$validated = $request->validate([
		'address_type' => ['required', 'string', 'max:30'],
		'name' => ['required', 'string', 'max:150'],
		'phone' => ['required', 'string', 'max:20'],

		'address_line_1' => ['required', 'string', 'max:255'],
		'address_line_2' => ['nullable', 'string', 'max:255'],
		'landmark' => ['nullable', 'string', 'max:255'],

		'country_id' => [
			'required',
			'integer',
			'exists:countries,id',
		],

		'state_id' => [
			'required',
			'integer',
			'exists:states,id',
		],

		'city_id' => [
			'required',
			'integer',
			'exists:cities,id',
		],

		'postal_code' => [
			'required',
			'string',
			'max:20',
		],

		'latitude' => ['nullable', 'numeric', 'between:-90,90'],
		'longitude' => ['nullable', 'numeric', 'between:-180,180'],
		'is_default' => ['nullable', 'boolean'],
	]);

	/*
	|--------------------------------------------------------------------------
	| Validate Country
	|--------------------------------------------------------------------------
	*/

	$country = Country::query()
		->whereKey($validated['country_id'])
		->where('is_active', true)
		->first();

	if (!$country) {
		return back()
			->withErrors([
				'country_id' => 'The selected country is not available.',
			])
			->withInput();
	}

	/*
	|--------------------------------------------------------------------------
	| Validate State belongs to Country
	|--------------------------------------------------------------------------
	*/

	$state = State::query()
		->whereKey($validated['state_id'])
		->where('country_id', $country->id)
		->where('is_active', true)
		->first();

	if (!$state) {
		return back()
			->withErrors([
				'state_id' => 'The selected state does not belong to the selected country.',
			])
			->withInput();
	}

	/*
	|--------------------------------------------------------------------------
	| Validate City belongs to State
	|--------------------------------------------------------------------------
	*/

	$city = City::query()
		->whereKey($validated['city_id'])
		->where('state_id', $state->id)
		->where('is_active', true)
		->first();

	if (!$city) {
		return back()
			->withErrors([
				'city_id' => 'The selected city does not belong to the selected state.',
			])
			->withInput();
	}

	/*
	|--------------------------------------------------------------------------
	| Create Address
	|--------------------------------------------------------------------------
	*/

	$user = $request->user();

	DB::transaction(function () use ($user, $validated): void {

		$makeDefault = (bool) ($validated['is_default'] ?? false)
			|| !$user->addresses()->exists();

		if ($makeDefault) {
			$user->addresses()->update([
				'is_default' => false,
			]);
		}

		$validated['is_default'] = $makeDefault;

		$user->addresses()->create($validated);
	});

	return redirect()
		->route('dashboard.addresses')
		->with('success', 'Address added successfully.');
	}
	
	public function editAddress(Request $request, Address $address): View {
    abort_unless(
        $address->user_id === $request->user()->id,
        404
    );

    return view('frontend.dashboard.edit-address', [
        'user' => $request->user(),
        'address' => $address,

        'countries' => Country::query()
            ->where('is_active', true)
            ->orderBy('name')
            ->get(),

        'states' => State::query()
            ->where('is_active', true)
            ->orderBy('name')
            ->get(),

        'cities' => City::query()
            ->where('is_active', true)
            ->orderBy('name')
            ->get(),

        'addressTypes' => [
            'home' => 'Home',
            'office' => 'Office',
            'other' => 'Other',
        ],
    ]);
}

	public function updateAddress(
    Request $request,
    Address $address
): RedirectResponse {
    abort_unless(
        $address->user_id === $request->user()->id,
        404
    );

    $validated = $request->validate([
        'address_type' => [
            'required',
            'string',
            'max:30',
        ],

        'name' => [
            'required',
            'string',
            'max:150',
        ],

        'phone' => [
            'required',
            'string',
            'max:20',
        ],

        'address_line_1' => [
            'required',
            'string',
            'max:255',
        ],

        'address_line_2' => [
            'nullable',
            'string',
            'max:255',
        ],

        'landmark' => [
            'nullable',
            'string',
            'max:255',
        ],

        'country_id' => [
            'required',
            'integer',
            'exists:countries,id',
        ],

        'state_id' => [
            'required',
            'integer',
            'exists:states,id',
        ],

        'city_id' => [
            'required',
            'integer',
            'exists:cities,id',
        ],

        'postal_code' => [
            'required',
            'string',
            'max:20',
        ],

        'latitude' => [
            'nullable',
            'numeric',
            'between:-90,90',
        ],

        'longitude' => [
            'nullable',
            'numeric',
            'between:-180,180',
        ],

        'is_default' => [
            'nullable',
            'boolean',
        ],
    ]);

    /*
    |--------------------------------------------------------------------------
    | Validate Country
    |--------------------------------------------------------------------------
    */

    $country = Country::query()
        ->whereKey($validated['country_id'])
        ->where('is_active', true)
        ->first();

    if (!$country) {
        return back()
            ->withErrors([
                'country_id' =>
                    'The selected country is not available.',
            ])
            ->withInput();
    }

    /*
    |--------------------------------------------------------------------------
    | Validate State belongs to Country
    |--------------------------------------------------------------------------
    */

    $state = State::query()
        ->whereKey($validated['state_id'])
        ->where('country_id', $country->id)
        ->where('is_active', true)
        ->first();

    if (!$state) {
        return back()
            ->withErrors([
                'state_id' =>
                    'The selected state does not belong to the selected country.',
            ])
            ->withInput();
    }

    /*
    |--------------------------------------------------------------------------
    | Validate City belongs to State
    |--------------------------------------------------------------------------
    */

    $city = City::query()
        ->whereKey($validated['city_id'])
        ->where('state_id', $state->id)
        ->where('is_active', true)
        ->first();

    if (!$city) {
        return back()
            ->withErrors([
                'city_id' =>
                    'The selected city does not belong to the selected state.',
            ])
            ->withInput();
    }

    /*
    |--------------------------------------------------------------------------
    | Update Address
    |--------------------------------------------------------------------------
    */

    DB::transaction(function () use (
        $request,
        $address,
        $validated
    ): void {

        /*
        | Keep an existing default address as default unless
        | another address is explicitly being made default.
        */
        $makeDefault =
            (bool) ($validated['is_default'] ?? false)
            || $address->is_default;

        if ($makeDefault) {
            $request->user()
                ->addresses()
                ->whereKey('!=', $address->id)
                ->update([
                    'is_default' => false,
                ]);
        }

        $validated['is_default'] = $makeDefault;

        $address->update($validated);
    });

    return redirect()
        ->route('dashboard.addresses')
        ->with('success', 'Address updated successfully.');
}

    public function destroyAddress(Request $request, Address $address): RedirectResponse
    {
        abort_unless($address->user_id === $request->user()->id, 404);

        $wasDefault = $address->is_default;
        $address->delete();

        if ($wasDefault) {
            $request->user()->addresses()->latest('id')->first()?->update(['is_default' => true]);
        }

        return redirect()
            ->route('dashboard.addresses')
            ->with('success', 'Address removed successfully.');
    }

    public function makeDefaultAddress(Request $request, Address $address): RedirectResponse
    {
        abort_unless($address->user_id === $request->user()->id, 404);

        DB::transaction(function () use ($request, $address): void {
            $request->user()->addresses()->update(['is_default' => false]);
            $address->update(['is_default' => true]);
        });

        return redirect()
            ->route('dashboard.addresses')
            ->with('success', 'Default address updated successfully.');
    }
	
}
