<?php

use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Frontend Routes
|--------------------------------------------------------------------------
| Static UI routes for the Pooja Nilayam frontend.
| Dynamic functionality will be connected later.
|--------------------------------------------------------------------------
*/


/*
|--------------------------------------------------------------------------
| Home
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('frontend.home');
})->name('home');


Route::get('/home1', function () {
    return view('frontend.home1');
})->name('home1');


/*
|--------------------------------------------------------------------------
| Pooja
|--------------------------------------------------------------------------
*/

Route::get('/poojas/ganapathi-homam', function () {
    return view('frontend.poojas.show');
})->name('pooja.ganapathi-homam');


/*
|--------------------------------------------------------------------------
| CMS Pages
|--------------------------------------------------------------------------
*/

Route::get('/about-us', function () {
    return view('frontend.cms.about-us');
})->name('about');


Route::get('/faq', function () {
    return view('frontend.cms.faq');
})->name('faq');


Route::get('/privacy-policy', function () {
    return view('frontend.cms.privacy-policy');
})->name('privacy');


Route::get('/terms-and-conditions', function () {
    return view('frontend.cms.terms-conditions');
})->name('terms');


Route::get('/refund-policy', function () {
    return view('frontend.cms.refund-policy');
})->name('refund');


Route::get('/shipping-policy', function () {
    return view('frontend.cms.shipping-policy');
})->name('shipping');


Route::get('/disclaimer', function () {
    return view('frontend.cms.disclaimer');
})->name('disclaimer');


Route::get('/careers', function () {
    return view('frontend.cms.careers');
})->name('careers');


Route::get('/testimonials', function () {
    return view('frontend.cms.testimonials');
})->name('testimonials');


/*
|--------------------------------------------------------------------------
| Search
|--------------------------------------------------------------------------
*/

Route::get('/search', function () {
    return view('frontend.search.results');
})->name('search');


/*
|--------------------------------------------------------------------------
| Utility Pages
|--------------------------------------------------------------------------
*/

Route::get('/coming-soon', function () {
    return view('frontend.utility.coming-soon');
})->name('coming-soon');


Route::get('/maintenance', function () {
    return view('frontend.utility.maintenance');
})->name('maintenance');


/*
|--------------------------------------------------------------------------
| Error Pages - Static Preview Routes
|--------------------------------------------------------------------------
|
| IMPORTANT:
| Laravel normally handles 403/404/500 automatically.
| These routes are only useful during UI development/testing.
|
|--------------------------------------------------------------------------
*/

Route::get('/preview/403', function () {
    return response()
        ->view('errors.403', [], 403);
})->name('preview.403');


Route::get('/preview/404', function () {
    return response()
        ->view('errors.404', [], 404);
})->name('preview.404');


Route::get('/preview/500', function () {
    return response()
        ->view('errors.500', [], 500);
})->name('preview.500');