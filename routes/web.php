<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\MapController;
use App\Http\Controllers\QuestionController;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/rmdetailpopup', function () {
//     return view('popup.rmdetailpopup');
// });

Route::get('/rmdetailpopup', [UserController::class, 'index']);

Route::get('/payment', function () {
    return view('payment');
});

Route::get('/register', function () {
    return view('register');
})->name('register'); 

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/profile', function () {
    return view('profile');
})->name('profile');

Route::get('/profileGajadi', function () {
    return view('profileGajadi');
})->name('profileGajadi');

Route::get('/searchPage', [SearchController::class, 'index'])->name('searchPage');
Route::get('/ajax/search-location', [MapController::class, 'ajaxSearch']);
Route::get('/ajax/search-nearby', [MapController::class, 'searchNearby']);


Route::get('/questionnaire/{id}', [QuestionController::class, 'show'])->name('questionnaire.show');
Route::post('/questionnaire/next', [QuestionController::class, 'next'])->name('questionnaire.next');