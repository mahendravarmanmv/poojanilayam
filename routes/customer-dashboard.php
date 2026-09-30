<?php

use App\Http\Controllers\Web\Customer\CustomerDashboardController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Customer Dashboard
|--------------------------------------------------------------------------
|
| Phase 24.4: replace static dashboard/profile/address views with
| authenticated, user-scoped controller actions.
| Existing route names are preserved.
|--------------------------------------------------------------------------
*/

Route::prefix('dashboard')
    ->name('dashboard.')
    ->middleware('auth')
    ->group(function () {
        Route::get('/', [CustomerDashboardController::class, 'index'])
            ->name('index');

        Route::get('/profile', [CustomerDashboardController::class, 'profile'])
            ->name('profile');

        Route::get('/profile/edit', [CustomerDashboardController::class, 'editProfile'])
            ->name('profile.edit');

        Route::put('/profile', [CustomerDashboardController::class, 'updateProfile'])
            ->name('profile.update');

        Route::get('/addresses', [CustomerDashboardController::class, 'addresses'])
            ->name('addresses');

        // Frontend order-history UI is currently a static prototype page.
        // It will be replaced with a customer-scoped order controller later.
        Route::view('/orders', 'frontend.dashboard.orders')
            ->name('orders');

        // Additional frontend dashboard pages already present in the UI layer.
        Route::view('/digital-bookings', 'frontend.dashboard.digital-bookings')
            ->name('digital-bookings');

        Route::view('/wishlist', 'frontend.dashboard.wishlist')
            ->name('wishlist');

        Route::view('/reviews', 'frontend.dashboard.reviews')
            ->name('reviews');

        Route::view('/coupons', 'frontend.dashboard.coupons')
            ->name('coupons');

        Route::view('/notifications/details', 'frontend.dashboard.notification-details')
            ->name('notification-details');

        Route::get('/addresses/add', [CustomerDashboardController::class, 'createAddress'])
            ->name('addresses.add');

        Route::post('/addresses', [CustomerDashboardController::class, 'storeAddress'])
            ->name('addresses.store');

        Route::patch('/addresses/{address}/default', [CustomerDashboardController::class, 'makeDefaultAddress'])
            ->name('addresses.default');

        Route::delete('/addresses/{address}', [CustomerDashboardController::class, 'destroyAddress'])
            ->name('addresses.destroy');

    });
