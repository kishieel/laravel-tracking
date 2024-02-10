<?php

use App\Http\Controllers\ImpressionController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

Route::get('/', fn() => view('welcome'));

Route::any('/pixels/{uuid}.png', [ImpressionController::class, 'pixel'])
    ->name('impression.view');

Route::any('/clicks/{uuid}', [ImpressionController::class, 'click'])
    ->name('impression.click');

