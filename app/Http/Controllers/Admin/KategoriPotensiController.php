<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KategoriPotensi;
use Illuminate\Http\Request;

class KategoriPotensiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = KategoriPotensi::query();

        if ($request->filled('search')) {

            $query->where(
                'nama_kategori',
                'like',
                '%' . $request->search . '%'
            );
        }

        $kategoriPotensis = $query
            ->withCount('potensiDesa')
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view(
            'admin.kategori-potensi.index',
            compact('kategoriPotensis')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_kategori' => [
                'required',
                'string',
                'max:100',
                'unique:kategori_potensi,nama_kategori'
            ]
        ]);

        KategoriPotensi::create($validated);

        return redirect()
            ->route('potensi-desa.index')
            ->with('success', 'Kategori berhasil ditambahkan.');
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, KategoriPotensi $kategoriPotensi)
    {
        $validated = $request->validate([
            'nama_kategori' => [
                'required',
                'max:100',
                'unique:kategori_potensi,nama_kategori,' . $kategoriPotensi->id
            ]
        ]);

        $kategoriPotensi->update($validated);

        return redirect()
            ->route('potensi-desa.index')
            ->with(
                'success',
                'Kategori berhasil diperbarui.'
            );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(KategoriPotensi $kategoriPotensi)
    {
        if ($kategoriPotensi->potensiDesa()->exists()) {

            return redirect()
                ->route('potensi-desa.index')
                ->with(
                    'error',
                    'Kategori tidak dapat dihapus karena masih digunakan.'
                );
        }

        $kategoriPotensi->delete();

        return redirect()
            ->route('potensi-desa.index')
            ->with(
                'success',
                'Kategori berhasil dihapus.'
            );
    }
}
