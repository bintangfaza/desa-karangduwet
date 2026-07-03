<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AlbumGaleri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AlbumGaleriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = AlbumGaleri::with('user')
            ->withCount('galeri');

        if ($request->filled('search')) {
            $query->where(
                'judul',
                'like',
                '%' . $request->search . '%'
            );
        }

        $albums = $query
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view(
            'admin.album-galeri.index',
            compact('albums')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.album-galeri.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([

            'judul' => [
                'required',
                'string',
                'max:150'
            ],

            'cover' => [
                'required',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048'
            ],

        ]);

        $cover = $request
            ->file('cover')
            ->store('album-galeri', 'public');

        AlbumGaleri::create([
            'user_id' => Auth::id(),
            'judul' => $validated['judul'],
            'slug' => Str::slug($validated['judul']),
            'cover' => $cover,

        ]);

        return redirect()
            ->route('album-galeri.index')
            ->with(
                'success',
                'Album berhasil ditambahkan.'
            );
    }

    /**
     * Display the specified resource.
     */
    public function show(AlbumGaleri $albumGaleri)
    {
        $albumGaleri->load('galeri');

        return view(
            'admin.galeri.index',
            [
                'album' => $albumGaleri
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AlbumGaleri $albumGaleri)
    {
        return view(
            'admin.album-galeri.edit',
            [
                'album' => $albumGaleri
            ]
        );
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AlbumGaleri $albumGaleri)
    {
        $validated = $request->validate([

            'judul' => [
                'required',
                'string',
                'max:150'
            ],

            'cover' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048'
            ],

        ]);

        $data = [

            'judul' => $validated['judul'],
            'slug' => Str::slug($validated['judul']),

        ];

        if ($request->hasFile('cover')) {

            if (
                $albumGaleri->cover &&
                Storage::disk('public')->exists($albumGaleri->cover)
            ) {
                Storage::disk('public')->delete($albumGaleri->cover);
            }

            $data['cover'] = $request
                ->file('cover')
                ->store('album-galeri', 'public');
        }

        $albumGaleri->update($data);

        return redirect()
            ->route('album-galeri.index')
            ->with(
                'success',
                'Album berhasil diperbarui.'
            );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AlbumGaleri $albumGaleri)
    {
        // Hapus cover album
        if (
            $albumGaleri->cover &&
            Storage::disk('public')->exists($albumGaleri->cover)
        ) {
            Storage::disk('public')->delete($albumGaleri->cover);
        }

        // Hapus album (galeri akan ikut terhapus karena cascade)
        $albumGaleri->delete();

        return redirect()
            ->route('album-galeri.index')
            ->with(
                'success',
                'Album berhasil dihapus.'
            );
    }
}
