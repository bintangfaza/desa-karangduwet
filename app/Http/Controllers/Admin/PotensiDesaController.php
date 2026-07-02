<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PotensiDesa;
use Illuminate\Http\Request;
use App\Models\KategoriPotensi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PotensiDesaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = PotensiDesa::with([
            'user',
            'kategoriPotensi'
        ]);

        // Search
        if ($request->filled('search')) {

            $query->where(
                'nama_potensi',
                'like',
                '%' . $request->search . '%'
            );
        }

        // Filter kategori
        if ($request->filled('kategori')) {

            $query->where(
                'kategori_potensi_id',
                $request->kategori
            );
        }

        $potensis = $query
            ->latest()
            ->paginate(10)
            ->withQueryString();

        $kategoriPotensis = KategoriPotensi::withCount('potensiDesa')
            ->orderBy('nama_kategori')
            ->get();

        return view(
            'admin.potensi.index',
            compact(
                'potensis',
                'kategoriPotensis'
            )
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategoriPotensis = KategoriPotensi::orderBy('nama_kategori')->get();

        return view(
            'admin.potensi.create',
            compact('kategoriPotensis')
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([

            'nama_potensi' => [
                'required',
                'string',
                'max:150'
            ],

            'kategori_potensi_id' => [
                'required',
                'exists:kategori_potensi,id'
            ],

            'gambar' => [
                'required',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048'
            ],

            'deskripsi' => [
                'required'
            ],

        ]);

        $gambar = $request
            ->file('gambar')
            ->store('potensi', 'public');

        PotensiDesa::create([

            'user_id' => Auth::id(),

            'kategori_potensi_id' => $validated['kategori_potensi_id'],

            'nama_potensi' => $validated['nama_potensi'],

            'slug' => Str::slug($validated['nama_potensi']),

            'gambar' => $gambar,

            'deskripsi' => $validated['deskripsi'],

        ]);

        return redirect()
            ->route('potensi-desa.index')
            ->with('success', 'Potensi desa berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(PotensiDesa $potensiDesa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PotensiDesa $potensiDesa)
    {
        $kategoriPotensis = KategoriPotensi::orderBy('nama_kategori')->get();

        return view('admin.potensi.edit', compact(
            'potensiDesa',
            'kategoriPotensis'
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PotensiDesa $potensiDesa)
    {
        $validated = $request->validate([

            'nama_potensi' => 'required|max:150',

            'kategori_potensi_id' => 'required|exists:kategori_potensi,id',

            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

            'deskripsi' => 'required',

        ]);

        if ($request->hasFile('gambar')) {

            Storage::disk('public')->delete($potensiDesa->gambar);

            $validated['gambar'] = $request
                ->file('gambar')
                ->store('potensi', 'public');
        }

        $validated['slug'] = Str::slug($validated['nama_potensi']);

        $potensiDesa->update($validated);

        return redirect()
            ->route('potensi-desa.index')
            ->with('success', 'Potensi berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PotensiDesa $potensiDesa)
    {
        // Hapus gambar jika ada
        if ($potensiDesa->gambar && Storage::disk('public')->exists($potensiDesa->gambar)) {
            Storage::disk('public')->delete($potensiDesa->gambar);
        }

        // Hapus data
        $potensiDesa->delete();

        return redirect()
            ->route('potensi-desa.index')
            ->with('success', 'Potensi desa berhasil dihapus.');
    }
}
