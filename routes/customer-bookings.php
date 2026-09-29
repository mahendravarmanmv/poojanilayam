<?php

use App\Http\Controllers\Web\Customer\CustomerBookingController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')
    ->prefix('dashboard')
    ->name('dashboard.')
    ->group(function () {
        Route::get('/bookings', [CustomerBookingController::class, 'index'])
            ->name('bookings');
    });
