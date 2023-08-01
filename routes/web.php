<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\processPayment;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('/register', function () {
    return view('register');
});

Route::post('/register', [LoginController::class, 'store']);

Route::get('/login', function () {
    return view('login');
});

Route::post('/login', [LoginController::class, 'login']);

Route::view('/payment', 'payment')->name('payment');
Route::post('/process-payment', [processPayment::class, 'processPayment'])->name('processPayment');

Route::get('/logout', [LoginController::class, 'logout']);

Route::get('/homeMan', function () {
    return view('man.home');
})->middleware('checkman');

Route::get('/homeWoman', function () {
    return view('woman.home');
})->middleware('checkwoman');

Route::group(['prefix' => 'homeMan', 'middleware' => 'checkman'], function(){
    Route::get('/matching', [UserController::class, 'userIndex']);
    Route::get('/matching-detail/{user_id}', [UserController::class, 'match']);
    Route::put('/top-up', [UserController::class, 'topup']);
});

Route::group(['prefix' => 'homeWoman', 'middleware' => 'checkwoman'], function(){
    Route::get('/matching', [UserController::class, 'userIndex1']);
    Route::get('/matching-detail/{user_id}', [UserController::class, 'match1']);
    Route::put('/top-up', [UserController::class, 'topup1']);
});

