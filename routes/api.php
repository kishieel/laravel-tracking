<?php

use App\Http\Controllers\AdvertisementController;
use Illuminate\Support\Facades\Route;

Route::get('/advertisements', [AdvertisementController::class, 'random'])
    ->name('advertisements.random');
