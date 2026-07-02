<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Berita;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Berita::with('user');

        // Search judul
        if ($request->filled('search')) {

            $query->where('judul', 'like', '%' . $request->search . '%');
        }

        // Filter status
        if ($request->filled('status')) {

            $query->where('status', $request->status);
        }

        $beritas = $query
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('admin.berita.index', compact('beritas'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.berita.create');
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
                'max:255'
            ],

            'isi' => [
                'required'
            ],

            'gambar' => [
                'required',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048'
            ],

            'status' => [
                'required',
                'in:draft,publish'
            ],

        ]);

        $gambar = $request->file('gambar')
            ->store('berita', 'public');

        Berita::create([

            'user_id' => Auth::id(),

            'judul' => $validated['judul'],

            'slug' => Str::slug($validated['judul']),

            'gambar' => $gambar,

            'isi' => $validated['isi'],

            'status' => $validated['status'],

            'views' => 0,

        ]);

        return redirect()
            ->route('berita.index')
            ->with('success', 'Berita berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Berita $berita)
    {
        return view('admin.berita.edit', compact('berita'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Berita $berita)
    {
        $validated = $request->validate([

            'judul' => [
                'required',
                'string',
                'max:255',
            ],

            'isi' => [
                'required',
            ],

            'gambar' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048',
            ],

            'status' => [
                'required',
                'in:draft,publish',
            ],

        ]);

        $gambar = $berita->gambar;

        if ($request->hasFile('gambar')) {

            if ($berita->gambar && Storage::disk('public')->exists($berita->gambar)) {

                Storage::disk('public')->delete($berita->gambar);
            }

            $gambar = $request->file('gambar')
                ->store('berita', 'public');
        }

        $berita->update([

            'judul' => $validated['judul'],

            'slug' => Str::slug($validated['judul']),

            'gambar' => $gambar,

            'isi' => $validated['isi'],

            'status' => $validated['status'],

        ]);

        return redirect()
            ->route('berita.index')
            ->with('success', 'Berita berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Berita $berita)
    {
        if (
            $berita->gambar &&
            Storage::disk('public')->exists($berita->gambar)
        ) {
            Storage::disk('public')->delete($berita->gambar);
        }

        $berita->delete();

        return redirect()
            ->route('berita.index')
            ->with('success', 'Berita berhasil dihapus.');
    }
}
