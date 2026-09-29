<?php

use App\Http\Controllers\Web\Customer\CustomerProfileCompletionController;
use Illuminate\Support\Facades\Route;

Route::prefix('dashboard')
    ->name('dashboard.')
    ->middleware('auth')
    ->group(function () {
        Route::get('/profile-completion', [CustomerProfileCompletionController::class, 'status'])
            ->name('profile-completion');

        Route::post('/profile-completion/refresh', [CustomerProfileCompletionController::class, 'refresh'])
            ->name('profile-completion.refresh');
    });
