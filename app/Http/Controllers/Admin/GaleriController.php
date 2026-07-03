<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Galeri;
use App\Models\AlbumGaleri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GaleriController extends Controller
{
    public function store(Request $request, AlbumGaleri $albumGaleri)
    {
        $request->validate([

            'gambar' => [
                'required'
            ],

            'gambar.*' => [
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048'
            ]

        ]);

        foreach ($request->file('gambar') as $gambar) {
            $path = $gambar->store(
                'galeri',
                'public'
            );

            Galeri::create([
                'album_galeri_id' => $albumGaleri->id,
                'gambar' => $path
            ]);
        }

        return back()->with(
            'success',
            'Foto berhasil ditambahkan.'
        );
    }

    public function destroy(Galeri $galeri)
    {
        if (
            $galeri->gambar &&
            Storage::disk('public')->exists($galeri->gambar)
        ) {
            Storage::disk('public')->delete($galeri->gambar);
        }

        $galeri->delete();

        return back()->with(
            'success',
            'Foto berhasil dihapus.'
        );
    }
}
