<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;

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



Route::get('/login', [UserController::class, 'login'])->name('user.login');
Route::post('/login', [UserController::class, 'truthLogin'])->name('user.truthLogin');
Route::get('/', [PostController::class, 'index'])->middleware('auth')->name('post.index');

Route::middleware(['auth'])->group(function () {
    Route::prefix('user')->group(function () {
        Route::get('/logout', [UserController::class, 'logout'])->name('user.logout');
        Route::get('/users', [UserController::class, 'index'])->name('user.index');
        Route::get('/show', [UserController::class, 'show'])->name('user.show');
        Route::get('/create', [UserController::class, 'create'])->name('user.create');
        Route::post('/create_confirm', [UserController::class, 'create_confirm'])->name('user.create_confirm');
        Route::post('/store', [UserController::class, 'store'])->name('user.store');
        Route::get('/user_detail/{id}', [UserController::class, 'user_detail'])->name('user.user_detail');
    });
    Route::prefix('post')->group(function () {
        Route::get('/create', [PostController::class, 'create'])->name('post.create');
        Route::post('/create_confirm', [PostController::class, 'create_confirm'])->name('post.create_confirm');
        Route::post('/store', [PostController::class, 'store'])->name('post.store');
    });
});
