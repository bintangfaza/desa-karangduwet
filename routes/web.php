<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\BeritaController;
use App\Http\Controllers\Admin\PotensiDesaController;
use App\Http\Controllers\Admin\KategoriPotensiController;
use App\Http\Controllers\Admin\ProdukDesaController;
use App\Http\Controllers\Admin\KategoriProdukController;
use App\Http\Controllers\Admin\AlbumGaleriController;
use App\Http\Controllers\Admin\GaleriController;
use App\Http\Controllers\Admin\AnggotaKknController;
use App\Http\Controllers\Admin\ProgramKerjaController;




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
    Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard');

    Route::post('/logout', [AuthController::class, 'destroy'])
        ->name('logout');

    Route::resource('berita', BeritaController::class)
        ->parameter('berita', 'berita');

    Route::resource('potensi-desa', PotensiDesaController::class);

    Route::resource('kategori-potensi', KategoriPotensiController::class)
        ->parameters([
            'kategori-potensi' => 'kategoriPotensi'
        ]);

    Route::resource('produk-desa', ProdukDesaController::class);
    Route::resource(
        'kategori-produk',
        KategoriProdukController::class
    );

    Route::resource(
        'album-galeri',
        AlbumGaleriController::class
    );
    Route::get(
        'album-galeri/{albumGaleri}/galeri',
        [AlbumGaleriController::class, 'show']
    )->name('album-galeri.galeri');

    Route::post(
        'album-galeri/{albumGaleri}/galeri',
        [GaleriController::class, 'store']
    )->name('galeri.store');

    Route::delete(
        'galeri/{galeri}',
        [GaleriController::class, 'destroy']
    )->name('galeri.destroy');

    Route::resource(
        'anggota-kkn',
        AnggotaKknController::class
    );
    
    Route::resource(
    'anggota-kkn.program-kerja',
    ProgramKerjaController::class
);
});
