<?php

use Illuminate\Support\Facades\Route;
use Egolive\Aperturly\Controllers\PortfolioController;
use Egolive\Aperturly\Controllers\GalleryController;
use Egolive\Aperturly\Controllers\SeriesController;
use Egolive\Aperturly\Controllers\ImageController;

// Spatie Laravel-Permission ist installiert
Route::middleware(['role:admin'])->group(function () {
    Route::resource('portfolios', PortfolioController::class);
    Route::resource('galleries', GalleryController::class);
});

Route::middleware(['role:photographer'])->group(function () {
    Route::resource('series', SeriesController::class);
    Route::resource('images', ImageController::class);
});
