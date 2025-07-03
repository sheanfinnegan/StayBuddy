<?php

use App\Http\Controllers\loginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\MapController;
use App\Http\Controllers\profileController;
use App\Http\Controllers\RegisterController;
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

Route::get('/register', [RegisterController::class, 'index'])->name('register'); 
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/login', [loginController::class, 'index'])->name('login');
Route::post('/login', [loginController::class, 'login'])->name('doLogin');
Route::post('/logout', [loginController::class, 'logout'])->name('logout');

Route::get('/profile/history', function () {
    return view('history');
})->name('profile.history');

Route::get('/profile', [profileController::class, 'index'])->name('profile');
Route::post('/user/{id}', [profileController::class, 'update'])->name('user.update');


Route::get('/preference', function () {
    return view('preference');
})->name('preference');

Route::get('/searchPage', [SearchController::class, 'index'])->name('searchPage');
Route::get('/ajax/search-location', [MapController::class, 'ajaxSearch']);
Route::get('/ajax/search-nearby', [MapController::class, 'searchNearby']);

Route::get('/questionnaire/{id}', [QuestionController::class, 'show'])->name('questionnaire.show');
Route::post('/questionnaire/next', [QuestionController::class, 'next'])->name('questionnaire.next');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [profileController::class, 'index'])->name('profile');
    
});