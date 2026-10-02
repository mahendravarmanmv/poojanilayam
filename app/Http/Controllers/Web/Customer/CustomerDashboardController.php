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

        return view('frontend.dashboard.edit-profile', [
            'user' => $user,
            'profile' => $user->profile,
            'customerProfile' => $user->customerProfile,
            'languages' => Language::where('is_active', true)->orderBy('name')->get(),
            'timezones' => Timezone::where('is_active', true)->orderBy('name')->get(),
        ]);
    }

    public function updateProfile(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'first_name' => ['required', 'string', 'max:100'],
            'last_name' => ['nullable', 'string', 'max:100'],
            'display_name' => ['nullable', 'string', 'max:150'],
            'date_of_birth' => ['nullable', 'date', 'before:today'],
            'gender' => ['nullable', 'string', 'max:30'],
            'preferred_language_id' => ['nullable', 'integer', 'exists:languages,id'],
            'timezone_id' => ['nullable', 'integer', 'exists:timezones,id'],
        ]);

        $user = $request->user();
        $profile = $user->profile()->firstOrCreate([], [
            'display_name' => $user->name,
        ]);

        $profile->update($validated);

        $displayName = $validated['display_name']
            ?: trim($validated['first_name'] . ' ' . ($validated['last_name'] ?? ''));

        $user->update(['name' => $displayName]);

        if ($user->customerProfile) {
            $user->customerProfile->update([
                'preferred_language_id' => $validated['preferred_language_id'] ?? null,
            ]);
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
            'countries' => Country::orderBy('name')->get(),
            'states' => State::orderBy('name')->get(),
        ]);
    }

    public function storeAddress(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'address_type' => ['required', 'string', 'max:30'],
            'name' => ['nullable', 'string', 'max:150'],
            'phone' => ['nullable', 'string', 'max:20'],
            'address_line_1' => ['required', 'string', 'max:255'],
            'address_line_2' => ['nullable', 'string', 'max:255'],
            'landmark' => ['nullable', 'string', 'max:255'],
            'city_id' => ['nullable', 'integer', 'exists:cities,id'],
            'state_id' => ['nullable', 'integer', 'exists:states,id'],
            'country_id' => ['nullable', 'integer', 'exists:countries,id'],
            'postal_code' => ['required', 'string', 'max:20'],
            'latitude' => ['nullable', 'numeric', 'between:-90,90'],
            'longitude' => ['nullable', 'numeric', 'between:-180,180'],
            'is_default' => ['nullable', 'boolean'],
        ]);

        $user = $request->user();

        DB::transaction(function () use ($user, $validated): void {
            $makeDefault = (bool) ($validated['is_default'] ?? false)
                || !$user->addresses()->exists();

            if ($makeDefault) {
                $user->addresses()->update(['is_default' => false]);
            }

            $validated['is_default'] = $makeDefault;
            $user->addresses()->create($validated);
        });

        return redirect()
            ->route('dashboard.addresses')
            ->with('success', 'Address added successfully.');
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
