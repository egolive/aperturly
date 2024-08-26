<?php

use Egolive\Aperturly\Controllers\PortfolioController;
use Egolive\Aperturly\Controllers\GalleryController;
use Egolive\Aperturly\Controllers\SeriesController;
use Egolive\Aperturly\Controllers\ImageController;

Route::resource('portfolios', PortfolioController::class);
Route::resource('galleries', GalleryController::class);
Route::resource('images', ImageController::class);
Route::resource('series', SeriesController::class);
