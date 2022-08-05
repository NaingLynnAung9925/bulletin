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
        Route::get('/users', [UserController::class, 'index'])->name('user.index')->middleware('is.admin');
        Route::get('/create', [UserController::class, 'create'])->name('user.create')->middleware('is.admin');
        Route::post('/create_confirm', [UserController::class, 'createConfirm'])->name('user.create_confirm')->middleware('is.admin');
        Route::post('/store', [UserController::class, 'store'])->name('user.store');
        Route::get('/user_detail/{id}', [UserController::class, 'userDetail'])->name('user.user_detail');
        Route::get('/destroy/{id}', [UserController::class, 'destroy'])->name('user.destroy');
        Route::get('/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
        Route::post('/edit_confirm', [UserController::class, 'editConfirm'])->name('user.edit_confirm');
        Route::put('/update/{id}', [UserController::class, 'update'])->name('user.update');
        Route::get('/change_password', [UserController::class, 'password'])->name('user.password');
        Route::post('/confirm_password', [UserController::class, 'confirmPassword'])->name('user.confirm_password');
        Route::get('/search', [UserController::class, 'search'])->name('user.search');
    });
    Route::prefix('post')->group(function () {
        Route::get('/create', [PostController::class, 'create'])->name('post.create');
        Route::post('/create_confirm', [PostController::class, 'create_confirm'])->name('post.create_confirm');
        Route::post('/store', [PostController::class, 'store'])->name('post.store');
        Route::get('/destroy/{id}', [PostController::class, 'destroy'])->name('post.destroy');
        Route::get('/edit/{id}', [PostController::class, 'edit'])->name('post.edit');
        Route::post('/edit_confirm', [PostController::class, 'edit_confirm'])->name('post.edit_confirm');
        Route::put('/update/{id}', [PostController::class, 'update'])->name('post.update');
        Route::get('/restoreAll', [PostController::class, 'restoreAll'])->name('post.restoreAll')->middleware('is.admin');
        Route::get('/restore/{id}', [PostController::class, 'restoreItem'])->name('post.restoreItem')->middleware('is.admin');
    });
});
