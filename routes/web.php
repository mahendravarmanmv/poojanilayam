<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('frontend.home');
});
Route::get('/home1', function () {
    return view('frontend.home1');
});
Route::get('/poojas/ganapathi-homam', function () {
    return view('frontend.poojas.show');
});
