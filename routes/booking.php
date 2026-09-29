<?php

use App\Http\Controllers\Web\BookingController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'customer.profile.complete'])
    ->group(function () {
        Route::get('/poojas/{slug}/book', [BookingController::class, 'create'])
            ->name('pooja.book');

        Route::get('/poojas/{slug}/book/slots', [BookingController::class, 'slots'])
            ->name('pooja.book.slots');

        Route::post('/poojas/{slug}/book', [BookingController::class, 'store'])
            ->name('pooja.book.store');
    });
