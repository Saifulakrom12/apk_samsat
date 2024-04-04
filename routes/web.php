<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\UserDashboardController;

//Middleware
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\UserMiddleware;

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

// login
Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/login-proses', [LoginController::class, 'login_proses'])->name('login-proses');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');


//middleware
Route::group(['middleware' => ['auth']], function () {
    Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => [AdminMiddleware::class]], function () {
        Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

        // user management routes
        Route::get('/users', [UserController::class, 'index'])->name('user.index');
        Route::get('/users/create', [UserController::class, 'user_create'])->name('user.create');
        Route::post('/users', [UserController::class, 'user_simpan'])->name('user.simpan');
        Route::get('/users/{id}/edit', [UserController::class, 'user_edit'])->name('user.edit');
        Route::put('/users/{id}', [UserController::class, 'user_update'])->name('user.update');
        Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('user.delete');

        // menampilkan data barang
        Route::get('/barang', [BarangController::class, 'barang'])->name('barang.index');
    });

    Route::group(['middleware' => [UserMiddleware::class]], function () {
        Route::get('/user/dashboard', [UserDashboardController::class, 'user_dashboard'])->name('user.dashboard');

        // barang routes
        Route::get('/barang', [BarangController::class, 'barang'])->name('barang.index');
        Route::get('/barang/create', [BarangController::class, 'create'])->name('barang.create');
        Route::post('/barang', [BarangController::class, 'simpan'])->name('barang.simpan');
        Route::get('/barang/{id}/edit', [BarangController::class, 'edit'])->name('barang.edit');
        Route::put('/barang/{id}', [BarangController::class, 'update'])->name('barang.update');
        Route::delete('/barang/{id}', [BarangController::class, 'delete'])->name('barang.delete');
    });
});
