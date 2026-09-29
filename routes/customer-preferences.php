<?php

use App\Http\Controllers\Web\Customer\CustomerPreferencesController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->prefix('dashboard')->name('dashboard.')->group(function () {
    Route::get('/preferences', [CustomerPreferencesController::class, 'edit'])
        ->name('preferences');

    Route::put('/preferences', [CustomerPreferencesController::class, 'update'])
        ->name('preferences.update');
});
