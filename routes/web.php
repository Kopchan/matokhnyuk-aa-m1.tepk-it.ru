<?php

use App\Http\Controllers\PartnerController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home')->name('home');

Route::resource('partners', PartnerController::class);
