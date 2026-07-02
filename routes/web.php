<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Admin\BeritaController;
use App\Http\Controllers\Admin\PotensiDesaController;
use App\Http\Controllers\Admin\KategoriPotensiController;


Route::get('/', function () {
    return view('welcome');
});

//Login
Route::middleware('guest')->group(function () {

    Route::get('/login', [AuthController::class, 'create'])
        ->name('login');

    Route::post('/login', [AuthController::class, 'store'])
        ->name('login.store');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::post('/logout', [AuthController::class, 'destroy'])
        ->name('logout');

    Route::resource('berita', BeritaController::class)
    ->parameter('berita', 'berita');

    Route::resource('potensi-desa', PotensiDesaController::class);

    Route::resource('kategori-potensi', KategoriPotensiController::class)
    ->parameters([
        'kategori-potensi' => 'kategoriPotensi'
    ]);
});

// Routing fitur admin
