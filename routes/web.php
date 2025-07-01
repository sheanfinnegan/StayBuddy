<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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