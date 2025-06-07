<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'home')->name('home');

Route::resource('products', ProductController::class);
Route::resource('partners', PartnerController::class);
