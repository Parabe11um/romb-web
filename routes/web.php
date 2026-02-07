<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');
Route::view('/services', 'services.index')->name('services.index');
Route::view('/services/detail', 'services.show')->name('services.show');
