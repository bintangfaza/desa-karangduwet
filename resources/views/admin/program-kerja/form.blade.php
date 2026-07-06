<div class="row">
    {{-- Judul --}}
    <div class="col-lg-12 mb-3">
        <label class="form-label">
            Judul Program
        </label>

        <input
            type="text"
            name="judul"
            class="form-control @error('judul') is-invalid @enderror"
            value="{{ old('judul',$programKerja->judul ?? '') }}"
            placeholder="Masukkan judul program">
        @error('judul')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>

    {{-- Thumbnail --}}
    <div class="col-lg-12 mb-3">
        <label class="form-label">
            Thumbnail
        </label>

        <input
            type="file"
            name="thumbnail"
            class="form-control @error('thumbnail') is-invalid @enderror"
            accept="image/*">


        @error('thumbnail')

        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="mt-3">

        <img
            id="previewThumbnail"
            src="{{ isset($programKerja) && $programKerja->thumbnail ? asset('storage/'.$programKerja->thumbnail) : '' }}"
            class="img-thumbnail {{ isset($programKerja) && $programKerja->thumbnail ? '' : 'd-none' }}"
            style="max-width:220px;">

    </div>


    {{-- Tanggal --}}
    <div class="col-md-6 mb-3">
        <label class="form-label">
            Tanggal Mulai
        </label>

        <input
            type="date"
            name="tanggal_mulai"
            class="form-control"
            value="{{ old('tanggal_mulai', isset($programKerja) ? optional($programKerja->tanggal_mulai)->format('Y-m-d') : '') }}">
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label">
            Tanggal Selesai
        </label>

        <input
            type="date"
            name="tanggal_selesai"
            class="form-control"
            value="{{ old('tanggal_selesai', isset($programKerja) ? optional($programKerja->tanggal_selesai)->format('Y-m-d') : '') }}">
    </div>

    {{-- Deskripsi --}}
    <div class="col-lg-12 mb-4">
        <label class="form-label">
            Deskripsi
        </label>

        <textarea
            name="deskripsi"
            rows="8"
            class="form-control @error('deskripsi') is-invalid @enderror"
            placeholder="Masukkan deskripsi program kerja">{{ old('deskripsi',$programKerja->deskripsi ?? '') }}</textarea>
        @error('deskripsi')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
</div>

<div class="d-flex justify-content-end gap-2">
    <a
        href="{{ route('anggota-kkn.program-kerja.index',$anggotaKkn) }}"
        class="btn btn-secondary">
        Batal
    </a>

    <button
        type="submit"
        class="btn btn-success">

        <i class="bi bi-check-circle me-2"></i>
        Simpan
    </button>

</div>

@push('scripts')

<script>
    const inputThumbnail = document.querySelector('input[name="thumbnail"]');
    const preview = document.getElementById('previewThumbnail');

    if (inputThumbnail) {

        inputThumbnail.addEventListener('change', function(e) {

            const file = e.target.files[0];

            if (!file) return;

            preview.src = URL.createObjectURL(file);

            preview.classList.remove('d-none');

        });

    }

    
</script>

@endpush