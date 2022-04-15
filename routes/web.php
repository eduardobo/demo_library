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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/login', [App\Http\Controllers\Auth\AuthController::class, 'index'])->name('login');
Route::post('/login', [App\Http\Controllers\Auth\AuthController::class, 'login'])->name('login.save');

Route::get('/sign-up', [App\Http\Controllers\Auth\AuthController::class, 'signUp'])->name('sign_up');
Route::post('/sign-up', [App\Http\Controllers\Auth\AuthController::class, 'createAccouint'])->name('create_account');

Route::post('/logout', [App\Http\Controllers\Auth\AuthController::class, 'logout'])->name('logout');

Route::group(['middleware' => 'auth'], function() {
    Route::resource('books', App\Http\Controllers\BookController::class);

    Route::resource('categories', App\Http\Controllers\CategoryController::class, ['execpt' => ['create', 'show']]);
});
