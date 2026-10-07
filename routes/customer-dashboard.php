<?php

use App\Http\Controllers\Web\Customer\CustomerDashboardController;
use App\Http\Controllers\Web\Customer\CustomerDigitalBookingController;
use App\Http\Controllers\Web\Customer\CustomerOrderController;
use App\Http\Controllers\Web\Customer\CustomerWishlistController;
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

        Route::get('/orders', [CustomerOrderController::class, 'index'])
            ->name('orders');

        Route::get('/digital-bookings', [CustomerDigitalBookingController::class, 'index'])
            ->name('digital-bookings');

        Route::get('/wishlist', [CustomerWishlistController::class, 'index'])
            ->name('wishlist');

        // These dashboard pages remain UI-only until their respective data modules are implemented.
        Route::view('/reviews', 'frontend.dashboard.reviews')
            ->name('reviews');

        Route::view('/coupons', 'frontend.dashboard.coupons')
            ->name('coupons');
			
		Route::get('/addresses/cities', [CustomerDashboardController::class, 'cities'])
			->name('addresses.cities');

		Route::get('/addresses/add', [CustomerDashboardController::class, 'createAddress'])
		->name('addresses.add');

		Route::post('/addresses', [CustomerDashboardController::class, 'storeAddress'])
		->name('addresses.store');

		Route::get('/addresses/{address}/edit', [CustomerDashboardController::class, 'editAddress'])
		->name('addresses.edit');

		Route::put('/addresses/{address}', [CustomerDashboardController::class, 'updateAddress'])
		->name('addresses.update');

		Route::patch('/addresses/{address}/default', [CustomerDashboardController::class, 'makeDefaultAddress'])
		->name('addresses.default');

		Route::delete('/addresses/{address}', [CustomerDashboardController::class, 'destroyAddress'])
		->name('addresses.destroy');
			
		Route::get('/addresses/{address}/edit', [CustomerDashboardController::class, 'editAddress'])
		->name('addresses.edit');

		Route::put('/addresses/{address}', [CustomerDashboardController::class, 'updateAddress'])
		->name('addresses.update');

        

        

    });
