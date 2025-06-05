<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\MapController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', function () {
    return view('register');
})->name('register'); 

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/searchPage', [SearchController::class, 'index'])->name('searchPage');
Route::get('/ajax/search-location', [MapController::class, 'ajaxSearch']);
Route::get('/ajax/search-nearby', [MapController::class, 'searchNearby']);