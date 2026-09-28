<?php

use App\Http\Controllers\Web\Customer\CustomerSecurityController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Customer Security
|--------------------------------------------------------------------------
|
| Phase 24.5: authenticated customer password management.
| The existing dashboard.change-password route name is preserved.
|--------------------------------------------------------------------------
*/

Route::prefix('dashboard')
    ->name('dashboard.')
    ->middleware('auth')
    ->group(function () {
        Route::get('/change-password', [CustomerSecurityController::class, 'changePassword'])
            ->name('change-password');

        Route::put('/change-password', [CustomerSecurityController::class, 'updatePassword'])
            ->name('change-password.update');
    });
