<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProdukDesa;
use App\Models\KategoriProduk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProdukDesaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = ProdukDesa::with([
            'user',
            'kategoriProduk'
        ]);

        // Search
        if ($request->filled('search')) {

            $query->where(
                'nama_produk',
                'like',
                '%' . $request->search . '%'
            );
        }

        // Filter kategori
        if ($request->filled('kategori')) {

            $query->where(
                'kategori_produk_id',
                $request->kategori
            );
        }

        $produks = $query
            ->latest()
            ->paginate(10)
            ->withQueryString();

        $kategoriProduks = KategoriProduk::withCount('produkDesa')
            ->orderBy('nama_kategori')
            ->get();

        return view(
            'admin.produk.index',
            compact(
                'produks',
                'kategoriProduks'
            )
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategoriProduks = KategoriProduk::orderBy('nama_kategori')->get();

        return view(
            'admin.produk.create',
            compact('kategoriProduks')
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_produk' => [
                'required',
                'string',
                'max:150'
            ],
            'kategori_produk_id' => [
                'required',
                'exists:kategori_produk,id'
            ],
            'gambar' => [
                'required',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048'
            ],
            'harga' => [
                'required',
                'numeric',
                'min:0'
            ],
            'deskripsi' => [
                'required'
            ],
            'no_whatsapp' => [
                'nullable',
                'string',
                'max:20'
            ],
        ]);

        // Upload gambar
        $gambar = $request
            ->file('gambar')
            ->store('produk', 'public');
        ProdukDesa::create([
            'user_id' => Auth::id(),
            'kategori_produk_id' => $validated['kategori_produk_id'],
            'nama_produk' => $validated['nama_produk'],
            'slug' => Str::slug($validated['nama_produk']),
            'gambar' => $gambar,
            'harga' => $validated['harga'],
            'deskripsi' => $validated['deskripsi'],
            'no_whatsapp' => $validated['no_whatsapp'],
        ]);

        return redirect()
            ->route('produk-desa.index')
            ->with(
                'success',
                'Produk desa berhasil ditambahkan.'
            );
    }

    /**
     * Display the specified resource.
     */
    public function show(ProdukDesa $produkDesa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProdukDesa $produkDesa)
    {
        $kategoriProduks = KategoriProduk::orderBy('nama_kategori')->get();

        return view(
            'admin.produk.edit',
            [
                'produk' => $produkDesa,
                'kategoriProduks' => $kategoriProduks
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProdukDesa $produkDesa)
    {
        $validated = $request->validate([

            'nama_produk' => [
                'required',
                'string',
                'max:150'
            ],

            'kategori_produk_id' => [
                'required',
                'exists:kategori_produk,id'
            ],

            'harga' => [
                'required',
                'numeric',
                'min:0'
            ],

            'deskripsi' => [
                'required'
            ],

            'no_whatsapp' => [
                'nullable',
                'string',
                'max:20'
            ],

            'gambar' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048'
            ]

        ]);

        // upload gambar baru
        if ($request->hasFile('gambar')) {

            if (
                $produkDesa->gambar &&
                Storage::disk('public')->exists($produkDesa->gambar)
            ) {
                Storage::disk('public')->delete($produkDesa->gambar);
            }

            $validated['gambar'] = $request
                ->file('gambar')
                ->store('produk', 'public');
        }

        $validated['slug'] = Str::slug($validated['nama_produk']);

        $produkDesa->update($validated);

        return redirect()
            ->route('produk-desa.index')
            ->with(
                'success',
                'Produk berhasil diperbarui.'
            );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProdukDesa $produkDesa)
{
    // Hapus gambar jika ada
    if (
        $produkDesa->gambar &&
        Storage::disk('public')->exists($produkDesa->gambar)
    ) {
        Storage::disk('public')->delete($produkDesa->gambar);
    }

    // Hapus data produk
    $produkDesa->delete();

    return redirect()
        ->route('produk-desa.index')
        ->with(
            'success',
            'Produk berhasil dihapus.'
        );
}
}
