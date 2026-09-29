<?php

use App\Http\Controllers\Web\BookingController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'customer.profile.complete'])
    ->group(function () {
        Route::get('/poojas/{slug}/book', [BookingController::class, 'create'])
            ->name('pooja.book');

        Route::get('/poojas/{slug}/book/slots', [BookingController::class, 'slots'])
            ->name('pooja.book.slots');

        Route::get('/poojas/{slug}/book/pujaris', [BookingController::class, 'pujaris'])
            ->name('pooja.book.pujaris');

        Route::post('/poojas/{slug}/book', [BookingController::class, 'store'])
            ->name('pooja.book.store');
    });
