<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KategoriProduk;

class KategoriProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
                'unique:kategori_produk,nama_kategori'
            ]
        ]);

        KategoriProduk::create($validated);

        return back()->with(
            'success',
            'Kategori berhasil ditambahkan.'
        );
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
    public function update(Request $request, KategoriProduk $kategoriProduk)
    {
        $validated = $request->validate([
            'nama_kategori' => [
                'required',
                'string',
                'max:100',
                'unique:kategori_produk,nama_kategori,' . $kategoriProduk->id
            ]
        ]);

        $kategoriProduk->update($validated);

        return back()->with(
            'success',
            'Kategori berhasil diperbarui.'
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(KategoriProduk $kategoriProduk)
    {
        if ($kategoriProduk->produkDesa()->count() > 0) {

            return back()->with(
                'error',
                'Kategori tidak dapat dihapus karena masih digunakan oleh produk.'
            );
        }

        $kategoriProduk->delete();

        return back()->with(
            'success',
            'Kategori berhasil dihapus.'
        );
    }
}
