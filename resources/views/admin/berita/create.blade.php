@extends('layouts.admin')

@section('title', 'Tambah Berita')

@section('content')

<div class="page-header">

    <div>

        <h2>Tambah Berita</h2>

        <p>
            Tambahkan berita baru yang akan ditampilkan pada website desa.
        </p>

    </div>

</div>

<form
    action="{{ route('berita.store') }}"
    method="POST"
    enctype="multipart/form-data">

    @csrf

    <div class="row g-4">

        {{-- ===========================
                FORM KIRI
        ============================ --}}
        <div class="col-lg-8">

            <div class="form-card">

                <div class="mb-4">

                    <label class="form-label">
                        Judul Berita
                    </label>

                    <input
                        type="text"
                        name="judul"
                        class="form-control @error('judul') is-invalid @enderror"
                        value="{{ old('judul') }}"
                        placeholder="Masukkan judul berita">

                    @error('judul')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror

                </div>

                <div>

                    <label class="form-label">
                        Isi Berita
                    </label>

                    <textarea
                        name="isi"
                        rows="18"
                        class="form-control @error('isi') is-invalid @enderror"
                        placeholder="Tulis isi berita...">{{ old('isi') }}</textarea>

                    @error('isi')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror

                </div>

            </div>

        </div>

        {{-- ===========================
                SIDEBAR KANAN
        ============================ --}}
        <div class="col-lg-4">

            <div class="form-card">

                <h5 class="card-title">

                    <i class="bi bi-sliders me-2"></i>

                    Pengaturan Berita

                </h5>

                <hr>

                {{-- Upload --}}
                <div class="mb-4">

                    <label class="form-label">

                        Upload Gambar

                    </label>

                    <input
                        id="gambarInput"
                        type="file"
                        name="gambar"
                        class="form-control @error('gambar') is-invalid @enderror">

                    <small class="form-text">

                        JPG, PNG, WEBP (Maks. 2 MB)

                    </small>

                    @error('gambar')

                    <div class="invalid-feedback">

                        {{ $message }}

                    </div>

                    @enderror

                </div>

                {{-- Preview --}}
                <div class="preview-box mb-4">

                    <img
                        id="previewImage"
                        class="preview-image d-none">

                    <div id="previewPlaceholder">

                        <i class="bi bi-image"></i>

                        <p>

                            Belum ada gambar

                        </p>

                    </div>

                </div>

                {{-- Status --}}
                <div class="mb-4">

                    <label class="form-label">

                        Status

                    </label>

                    <select
                        name="status"
                        class="form-select">

                        <option value="draft">

                            Draft

                        </option>

                        <option value="publish">

                            Publish

                        </option>

                    </select>

                </div>

                {{-- Informasi --}}
                <div class="info-box">

                    <div class="info-item">

                        <span>

                            <i class="bi bi-person-circle me-2"></i>

                            Penulis

                        </span>

                        <strong>

                            {{ auth()->user()->nama }}

                        </strong>

                    </div>

                    <div class="info-item">

                        <span>

                            <i class="bi bi-calendar-event me-2"></i>

                            Dibuat

                        </span>

                        <strong>

                            {{ now()->format('d M Y') }}

                        </strong>

                    </div>

                </div>

                <button
                    type="submit"
                    class="btn btn-success btn-save w-100">

                    <i class="bi bi-check-circle me-2"></i>

                    Simpan Berita

                </button>

            </div>

        </div>

    </div>

</form>

@endsection

@push('scripts')

<script>
    const input = document.getElementById('gambarInput');
    const preview = document.getElementById('previewImage');
    const placeholder = document.getElementById('previewPlaceholder');

    input.addEventListener('change', function() {

        const file = this.files[0];

        if (!file) {

            preview.classList.add('d-none');
            placeholder.style.display = "flex";
            return;

        }

        preview.src = URL.createObjectURL(file);

        preview.classList.remove('d-none');

        placeholder.style.display = "none";

    });
</script>

@endpush