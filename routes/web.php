<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\PageController;

// Home page
Route::get('/', [HomeController::class, 'index'])->name('home');

// Car routes
Route::prefix('cars')->name('cars.')->group(function () {
    Route::get('/', [CarController::class, 'index'])->name('index');
    Route::get('/compare', [CarController::class, 'compare'])->name('compare');
    Route::post('/compare', [CarController::class, 'addToCompare'])->name('addToCompare');
    Route::delete('/compare/{car}', [CarController::class, 'removeFromCompare'])->name('removeFromCompare');
    Route::get('/{car}', [CarController::class, 'show'])->name('show');
});

// Static pages
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::post('/contact', [PageController::class, 'sendMessage'])->name('contact.send');
