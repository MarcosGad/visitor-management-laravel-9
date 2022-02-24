<?php 
use Illuminate\Support\Facades\Route;

// How to structure and generate external URLs in Laravel
// https://dev.to/rapdev/how-to-structure-and-generate-external-urls-in-laravel-27bn


Route::name('trustpilot.')->domain('https://www.truspilot.com')->group(function () {
    Route::get('/review/acme.com')
        ->name('reviews');

    Route::get('/evaluate/acme.com')
        ->name('evaluate');
});

Route::name('facebook.')->domain('https://www.facebook.com')->group(function () {
    Route::get('/AcmeCorp/reviews')
        ->name('reviews');

    Route::get('/AcmeCorp/about')
        ->name('about');
});