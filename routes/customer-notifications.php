<?php

use App\Http\Controllers\Web\Customer\CustomerNotificationController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->prefix('dashboard')->name('dashboard.')->group(function () {
    Route::get('/notifications', [CustomerNotificationController::class, 'index'])
        ->name('notifications');

    Route::get('/notifications/{notification}', [CustomerNotificationController::class, 'show'])
        ->name('notifications.show');

    Route::post('/notifications/{notification}/read', [CustomerNotificationController::class, 'markAsRead'])
        ->name('notifications.read');

    Route::post('/notifications/read-all', [CustomerNotificationController::class, 'markAllAsRead'])
        ->name('notifications.read-all');
});
