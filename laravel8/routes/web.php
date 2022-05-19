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
use App\Http\Controllers\DiscoverController;
use App\Http\Controllers\StudiesController;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('main');
});

Route::middleware(['admin.auth'])->group(function () {
    Route::post('/admin/{action}', [AdminController::class, 'delete']);
    Route::get('/admin/new/{action}', [AdminController::class, 'new']);
    Route::post('/admin/new/{action}', [AdminController::class, 'new']);
    Route::get('/admin/edit/{action}', [AdminController::class, 'edit']);
    Route::post('/admin/edit/{action}', [AdminController::class, 'edit']);    
    Route::get('/admin/{page}', [AdminController::class, 'show']);
});

Route::get('login', [UsersController::class, 'showLogin'])->name('login');

Route::get('register', [UsersController::class, 'create']);
Route::post('register', [UsersController::class, 'store'])->name('users.store');

Route::get('discover', [DiscoverController::class, 'show']);

Route::get('studies', [StudiesController::class, 'studies']);

Route::get('/game', function () {
    return view('game');
});