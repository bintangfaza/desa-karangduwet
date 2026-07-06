<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AnggotaKkn;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AnggotaKknController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = AnggotaKkn::with('programKerja');

        // Search
        if ($request->filled('search')) {

            $query->where(function ($q) use ($request) {
                $q->where('nama', 'like', '%' . $request->search . '%')
                    ->orWhere('nim', 'like', '%' . $request->search . '%')
                    ->orWhere('prodi', 'like', '%' . $request->search . '%');
            });
        }

        $anggotas = $query
            ->orderBy('nama')
            ->paginate(9)
            ->withQueryString();

        return view(
            'admin.anggota-kkn.index',
            compact('anggotas')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.anggota-kkn.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:150',
            'nim' => 'required|string|max:30|unique:anggota_kkn,nim',
            'prodi' => 'required|string|max:100',
            'fakultas' => 'required|string|max:100',
            'jabatan' => 'required|string',
            'instagram' => 'nullable|url',
            'deskripsi' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $validated['slug'] = Str::slug($validated['nama']);

        // memastikan slug unik
        $slug = $validated['slug'];
        $i = 1;

        while (\App\Models\AnggotaKkn::where('slug', $validated['slug'])->exists()) {
            $validated['slug'] = $slug . '-' . $i++;
        }

        if ($request->hasFile('foto')) {

            $validated['foto'] = $request
                ->file('foto')
                ->store('anggota-kkn', 'public');
        }

        \App\Models\AnggotaKkn::create($validated);

        return redirect()
            ->route('anggota-kkn.index')
            ->with('success', 'Anggota berhasil ditambahkan.');
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
    public function edit(AnggotaKkn $anggotaKkn)
    {
        return view(
            'admin.anggota-kkn.edit',
            [
                'anggota' => $anggotaKkn
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AnggotaKkn $anggotaKkn)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:150',
            'nim' => 'required|string|max:30|unique:anggota_kkn,nim,' . $anggotaKkn->id,
            'prodi' => 'required|string|max:100',
            'fakultas' => 'required|string|max:100',
            'jabatan' => 'required|string',
            'instagram' => 'nullable|url',
            'deskripsi' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($validated['nama'] != $anggotaKkn->nama) {

            $validated['slug'] = Str::slug($validated['nama']);

            $slug = $validated['slug'];
            $i = 1;

            while (
                AnggotaKkn::where('slug', $validated['slug'])
                ->where('id', '!=', $anggotaKkn->id)
                ->exists()
            ) {

                $validated['slug'] = $slug . '-' . $i++;
            }
        }

        if ($request->hasFile('foto')) {

            if (
                $anggotaKkn->foto &&
                Storage::disk('public')->exists($anggotaKkn->foto)
            ) {

                Storage::disk('public')->delete($anggotaKkn->foto);
            }

            $validated['foto'] = $request
                ->file('foto')
                ->store('anggota-kkn', 'public');
        }

        $anggotaKkn->update($validated);

        return redirect()
            ->route('anggota-kkn.index')
            ->with('success', 'Anggota berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AnggotaKkn $anggotaKkn)
    {
        if (
            $anggotaKkn->foto &&
            Storage::disk('public')->exists($anggotaKkn->foto)
        ) {

            Storage::disk('public')->delete($anggotaKkn->foto);
        }

        $anggotaKkn->delete();

        return redirect()
            ->route('anggota-kkn.index')
            ->with('success', 'Anggota berhasil dihapus.');
    }
}
