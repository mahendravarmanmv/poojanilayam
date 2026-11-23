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
		Route::get('/pooja-booking/payment/{payment}', [BookingController::class, 'checkout'])
			->name('pooja.booking.payment.checkout');
    });

// Pooja Booking Cashfree Payment Routes

Route::get('/pooja-booking/payment-return', [BookingController::class, 'paymentReturn'])
    ->name('pooja.booking.payment.return');

Route::post('/pooja-booking/cashfree/webhook', [BookingController::class, 'webhook'])
    ->name('pooja.booking.cashfree.webhook');
