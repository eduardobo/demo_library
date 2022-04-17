<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;

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

// Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/', function() {
    return redirect()->route('books.index');
})->name('home');

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.save');

Route::get('/sign-up', [AuthController::class, 'signUp'])->name('sign_up');
Route::post('/sign-up', [AuthController::class, 'createAccouint'])->name('create_account');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::group(['middleware' => 'auth'], function() {
    Route::resource('books', BookController::class, ['execpt' => ['show']]);
    Route::post('books/{book}/borrowing_user', [BookController::class, 'updateBorrowingUser'])->name('books.borrowing_user');

    Route::resource('categories', CategoryController::class, ['execpt' => ['create', 'show']]);
});
