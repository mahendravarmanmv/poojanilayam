<?php

use App\Http\Controllers\Web\Auth\AuthenticationController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Compatibility login route
|--------------------------------------------------------------------------
|
| Laravel's default Authenticate middleware redirects guests to the route
| named `login`. The application uses `auth.login` as the canonical login
| route, so keep this named alias to avoid RouteNotFoundException on any
| authenticated page.
|
*/
Route::get('/login', fn () => redirect()->route('auth.login'))
    ->name('login');

Route::prefix('auth')->name('auth.')->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('/login', [AuthenticationController::class, 'showLogin'])->name('login');
        Route::post('/login', [AuthenticationController::class, 'login'])->name('login.store');

        Route::get('/register', [AuthenticationController::class, 'showRegister'])->name('register');
        Route::post('/register', [AuthenticationController::class, 'register'])->name('register.store');

        Route::get('/forgot-password', [AuthenticationController::class, 'showForgotPassword'])->name('forgot-password');
        Route::post('/forgot-password', [AuthenticationController::class, 'forgotPassword'])->name('forgot-password.store');

        Route::get('/reset-password', [AuthenticationController::class, 'showResetPassword'])->name('reset-password');
        Route::post('/reset-password', [AuthenticationController::class, 'resetPassword'])->name('reset-password.store');

        Route::get('/otp-verification', [AuthenticationController::class, 'showOtpVerification'])->name('otp-verification');
        Route::post('/otp-verification', [AuthenticationController::class, 'verifyOtp'])->name('otp-verification.store');

        Route::get('/verify-email', [AuthenticationController::class, 'showVerifyEmail'])->name('verify-email');
    });

    Route::post('/logout', [AuthenticationController::class, 'logout'])
        ->middleware('auth')
        ->name('logout');
});
