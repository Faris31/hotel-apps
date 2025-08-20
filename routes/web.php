<?php

use Faker\Guesser\Name;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// get, post, put, delete (melihat/read, insert/create, update, delete)

Route::get('belajar', [\App\Http\Controllers\BelajarController::class, 'index']);

Route::get("callName", [\App\Http\Controllers\BelajarController::class, 'getCallName']);

// route untuk tambah
Route::get("tambah", [\App\Http\Controllers\BelajarController::class, 'tambah'])->name('tambah');
Route::post('store_tambah', [\App\Http\Controllers\BelajarController::class, 'storeTambah'])->name('store_tambah');

// route untuk kurang
Route::post('store_kurang', [\App\Http\Controllers\BelajarController::class, 'storeKurang'])->name('store_kurang');
Route::get("kurang", [\App\Http\Controllers\BelajarController::class, 'kurang'])->name('kurang');

// route untuk kali
Route::post('store_kali', [\App\Http\Controllers\BelajarController::class, 'storeKali'])->name('store_kali');
Route::get("kali", [\App\Http\Controllers\BelajarController::class, 'kali'])->name('kali');

// route untuk bagi
Route::post('store_bagi', [\App\Http\Controllers\BelajarController::class, 'storeBagi'])->name('store_bagi');
Route::get("bagi", [\App\Http\Controllers\BelajarController::class, 'bagi'])->name('bagi');

// route untuk login
Route::get('login', [\App\Http\Controllers\LoginController::class, 'index']);
Route::get('login', [\App\Http\Controllers\LoginController::class, 'login'])->name('login');
Route::post('login_action', [\App\Http\Controllers\LoginController::class, 'loginAction'])->name('login_action');

// route untuk user
Route::resource('user', \App\Http\Controllers\UserController::class);

// route dashboard
Route::resource('dashboard', \App\Http\Controllers\DashboardController::class);

// route categories
Route::resource('categories', \App\Http\Controllers\CategoriesController::class);

//route rooms
Route::resource('room', \App\Http\Controllers\RoomController::class);
