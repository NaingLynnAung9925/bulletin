<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ImportExportController;
use App\Http\Controllers\ImportController;
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



Route::get('/login', [UserController::class, 'login'])->name('user.login');
Route::post('/login', [UserController::class, 'truthLogin'])->name('user.truthLogin');
Route::get('/', [PostController::class, 'index'])->middleware('auth')->name('post.index');
Route::post('/', [PostController::class, 'search'])->middleware('auth')->name('post.search');
Route::middleware(['auth'])->group(function () {
    Route::prefix('user')->group(function () {
        Route::controller(UserController::class)->group(function(){
            Route::get('/logout', 'logout')->name('user.logout');
            Route::get('/users', 'index')->name('user.index')->middleware('is.admin');
            Route::get('/create', 'create')->name('user.create')->middleware('is.admin');
            Route::post('/create_confirm', 'createConfirm')->name('user.create_confirm')->middleware('is.admin');
            Route::post('/store', 'store')->name('user.store');
            Route::get('/user_detail/{id}', 'userDetail')->name('user.user_detail');
            Route::get('/destroy/{id}', 'destroy')->name('user.destroy');
            Route::get('/edit/{id}', 'edit')->name('user.edit');
            Route::post('/edit_confirm', 'editConfirm')->name('user.edit_confirm');
            Route::put('/update/{id}', 'update')->name('user.update');
            Route::get('/change_password', 'password')->name('user.password');
            Route::post('/confirm_password', 'confirmPassword')->name('user.confirm_password');
            Route::post('/users', 'search')->name('user.search');
        });
    });
    Route::prefix('post')->group(function () {
        Route::controller(PostController::class)->group(function(){
            Route::get('/create', 'create')->name('post.create');
            Route::post('/create_confirm', 'create_confirm')->name('post.create_confirm');
            Route::post('/store', 'store')->name('post.store');
            Route::get('/destroy/{id}', 'destroy')->name('post.destroy');
            Route::get('/edit/{id}', 'edit')->name('post.edit');
            Route::post('/edit_confirm', 'edit_confirm')->name('post.edit_confirm');
            Route::put('/update/{id}', 'update')->name('post.update');
            Route::get('/restoreAll', 'restoreAll')->name('post.restoreAll')->middleware('is.admin');
            Route::get('/restore/{id}', 'restoreItem')->name('post.restoreItem')->middleware('is.admin');
            Route::get('/delete/{id}', 'delete')->name('post.delete')->middleware('is.admin');
            Route::get('/import-file', 'importFile')->name('post.importFile');
            Route::post('/import', 'import')->name('post.import');
        });
        Route::get('/export', [ImportExportController::class, 'export'])->name('post.export');
    });

    Route::prefix('category')->group(function(){
        Route::controller(CategoryController::class)->group(function(){
            Route::get('/categories', 'index')->name('category.index');
            Route::get('/create', 'create')->name('category.create');
            Route::post('/create_confirm', 'createConfirm')->name('category.createConfirm');
            Route::post('/store', 'store')->name('category.store');
            Route::get('/edit/{id}', 'edit')->name('category.edit');
            Route::post('/edit_confirm', 'editConfirm')->name('category.editConfirm');
            Route::put('/update/{id}', 'update')->name('category.update');
            Route::get('/delete/{id}', 'destroy')->name('category.destroy');
        });
    });
});

