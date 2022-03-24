<?php

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

use App\Http\Controllers\UsersController;

Route::get('/', function () {
    return view('main');
});

Route::get('login', [UsersController::class, 'showLogin']);
Route::post('login', [UsersController::class, 'login'])->name('users.login');

Route::get('register', [UsersController::class, 'create']);
Route::post('register', [UsersController::class, 'store'])->name('users.store');

Route::get('/discover', function () {
    return view('discover');
});

Route::get('/studies', function () {
    return view('studies');
});

Route::get('/game', function () {
    return view('game');
});