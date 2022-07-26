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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'admin'], function () {
    Route::group(['prefix' => 'user'], function () {
        Route::get('/login', \App\Http\Controllers\Admin\User\LoginController::class)->name('admin.user.login');
        Route::get('/register', \App\Http\Controllers\Admin\User\RegisterController::class)->name('admin.user.register');
        Route::post('/register', \App\Http\Controllers\Admin\User\StoreController::class)->name('admin.user.store');
    });
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Auth::routes();
