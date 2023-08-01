<?php

use App\Http\Controllers\LoginController;
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

Route::get('/homeMan', function () {
    return view('man.home');
})->middleware('checkman');

Route::get('/homeWoman', function () {
    return view('woman.home');
})->middleware('checkwoman');

