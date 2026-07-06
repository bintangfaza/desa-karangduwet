<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AlbumGaleri;
use App\Models\AnggotaKkn;
use App\Models\Berita;
use App\Models\PotensiDesa;
use App\Models\ProdukDesa;
use App\Models\ProgramKerja;

class DashboardController extends Controller
{
    public function index()
    {
        /*
        |--------------------------------------------------------------------------
        | Statistik
        |--------------------------------------------------------------------------
        */

        $statistics = [
            'berita'  => Berita::count(),
            'produk'  => ProdukDesa::count(),
            'album'   => AlbumGaleri::count(),
            'potensi' => PotensiDesa::count(),
            'anggota' => AnggotaKkn::count(),
            'program' => ProgramKerja::count(),
        ];

        /*
        |--------------------------------------------------------------------------
        | Aktivitas Terbaru
        |--------------------------------------------------------------------------
        */

        $aktivitas = collect();

        // Berita
        $aktivitas = $aktivitas->merge(
            Berita::latest()->take(5)->get()->map(function ($item) {
                return [
                    'judul'   => $item->judul,
                    'tipe'    => 'Berita',
                    'icon'    => 'bi-newspaper',
                    'color'   => 'success',
                    'tanggal' => $item->created_at,
                ];
            })
        );

        // Produk
        $aktivitas = $aktivitas->merge(
            ProdukDesa::latest()->take(5)->get()->map(function ($item) {
                return [
                    'judul'   => $item->nama,
                    'tipe'    => 'Produk Desa',
                    'icon'    => 'bi-bag',
                    'color'   => 'primary',
                    'tanggal' => $item->created_at,
                ];
            })
        );

        // Album Galeri
        $aktivitas = $aktivitas->merge(
            AlbumGaleri::latest()->take(5)->get()->map(function ($item) {
                return [
                    'judul'   => $item->nama,
                    'tipe'    => 'Album Galeri',
                    'icon'    => 'bi-images',
                    'color'   => 'info',
                    'tanggal' => $item->created_at,
                ];
            })
        );

        // Potensi Desa
        $aktivitas = $aktivitas->merge(
            PotensiDesa::latest()->take(5)->get()->map(function ($item) {
                return [
                    'judul'   => $item->nama,
                    'tipe'    => 'Potensi Desa',
                    'icon'    => 'bi-tree',
                    'color'   => 'warning',
                    'tanggal' => $item->created_at,
                ];
            })
        );

        // Anggota KKN
        $aktivitas = $aktivitas->merge(
            AnggotaKkn::latest()->take(5)->get()->map(function ($item) {
                return [
                    'judul'   => $item->nama,
                    'tipe'    => 'Anggota KKN',
                    'icon'    => 'bi-people',
                    'color'   => 'secondary',
                    'tanggal' => $item->created_at,
                ];
            })
        );

        // Program Kerja
        $aktivitas = $aktivitas->merge(
            ProgramKerja::latest()->take(5)->get()->map(function ($item) {
                return [
                    'judul'   => $item->judul,
                    'tipe'    => 'Program Kerja',
                    'icon'    => 'bi-kanban',
                    'color'   => 'danger',
                    'tanggal' => $item->created_at,
                ];
            })
        );


        $aktivitas = $aktivitas
            ->sortByDesc('tanggal')
            ->take(5)
            ->values();

        $chart = [
            'labels' => [
                'Berita',
                'Produk',
                'Album',
                'Potensi',
                'Anggota',
                'Program'
            ],

            'data' => [
                $statistics['berita'],
                $statistics['produk'],
                $statistics['album'],
                $statistics['potensi'],
                $statistics['anggota'],
                $statistics['program']
            ]
        ];

        return view('admin.dashboard.index', compact(
            'statistics',
            'aktivitas',
            'chart'
        ));
    }
}