<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AnggotaKkn;
use App\Models\ProgramKerja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProgramKerjaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(AnggotaKkn $anggotaKkn)
    {
        $programKerjas = $anggotaKkn
            ->programKerja()
            ->latest()
            ->paginate(10);

        return view(
            'admin.program-kerja.index',
            compact('anggotaKkn', 'programKerjas')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(AnggotaKkn $anggotaKkn)
    {
        return view(
            'admin.program-kerja.create',
            compact('anggotaKkn')
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, AnggotaKkn $anggotaKkn)
    {
        $validated = $request->validate([
            'judul'             => 'required|max:150',
            'deskripsi'         => 'required',
            'thumbnail'         => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'tanggal_mulai'     => 'nullable|date',
            'tanggal_selesai'   => 'nullable|date|after_or_equal:tanggal_mulai',
        ]);

        if ($request->hasFile('thumbnail')) {

            $validated['thumbnail'] = $request
                ->file('thumbnail')
                ->store('program-kerja', 'public');
        }

        $validated['slug'] = Str::slug($validated['judul']);

        $anggotaKkn
            ->programKerja()
            ->create($validated);

        return redirect()
            ->route('anggota-kkn.program-kerja.index', $anggotaKkn)
            ->with('success', 'Program kerja berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(AnggotaKkn $anggotaKkn, ProgramKerja $programKerja)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AnggotaKkn $anggotaKkn, ProgramKerja $programKerja)
    {
        return view(
            'admin.program-kerja.edit',
            compact('anggotaKkn', 'programKerja')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AnggotaKkn $anggotaKkn, ProgramKerja $programKerja)
    {
        $validated = $request->validate([
            'judul'             => 'required|string|max:150',
            'deskripsi'         => 'required|string',
            'thumbnail'         => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'tanggal_mulai'     => 'nullable|date',
            'tanggal_selesai'   => 'nullable|date|after_or_equal:tanggal_mulai',
        ]);

        // Update slug jika judul berubah
        if ($programKerja->judul != $validated['judul']) {

            $validated['slug'] = Str::slug($validated['judul']);

            $originalSlug = $validated['slug'];
            $counter = 1;

            while (
                ProgramKerja::where('slug', $validated['slug'])
                ->where('id', '!=', $programKerja->id)
                ->exists()
            ) {
                $validated['slug'] = $originalSlug . '-' . $counter++;
            }
        }

        // Upload thumbnail baru
        if ($request->hasFile('thumbnail')) {

            // hapus thumbnail lama
            if (
                $programKerja->thumbnail &&
                Storage::disk('public')->exists($programKerja->thumbnail)
            ) {
                Storage::disk('public')->delete($programKerja->thumbnail);
            }

            $validated['thumbnail'] = $request
                ->file('thumbnail')
                ->store('program-kerja', 'public');
        }

        $programKerja->update($validated);

        return redirect()
            ->route('anggota-kkn.program-kerja.index', $anggotaKkn)
            ->with('success', 'Program kerja berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AnggotaKkn $anggotaKkn, ProgramKerja $programKerja)
    {
        // Hapus thumbnail jika ada
        if (
            $programKerja->thumbnail &&
            Storage::disk('public')->exists($programKerja->thumbnail)
        ) {
            Storage::disk('public')->delete($programKerja->thumbnail);
        }

        // Hapus data
        $programKerja->delete();

        return redirect()
            ->route('anggota-kkn.program-kerja.index', $anggotaKkn)
            ->with('success', 'Program kerja berhasil dihapus.');
    }
}
