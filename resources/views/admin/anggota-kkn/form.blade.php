<form
    action="{{ $action }}"
    method="POST"
    enctype="multipart/form-data">

    @csrf

    @isset($method)
    @method($method)
    @endisset

    <div class="row g-4">
        <div class="col-lg-8">
            <div class="form-card">

                {{-- Nama --}}
                <div class="mb-4">
                    <label class="form-label">
                        Nama Lengkap
                    </label>

                    <input
                        type="text"
                        name="nama"
                        class="form-control @error('nama') is-invalid @enderror"
                        value="{{ old('nama',$anggota->nama ?? '') }}">

                    @error('nama')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                {{-- NIM --}}
                <div class="mb-4">
                    <label class="form-label">
                        NIM
                    </label>

                    <input
                        type="text"
                        name="nim"
                        class="form-control @error('nim') is-invalid @enderror"
                        value="{{ old('nim',$anggota->nim ?? '') }}">
                </div>

                {{-- Prodi --}}
                <div class="mb-4">
                    <label class="form-label">
                        Program Studi
                    </label>

                    <input
                        type="text"
                        name="prodi"
                        class="form-control"
                        value="{{ old('prodi',$anggota->prodi ?? '') }}">
                </div>

                {{-- Fakultas --}}
                <div class="mb-4">
                    <label class="form-label">
                        Fakultas
                    </label>

                    <input
                        type="text"
                        name="fakultas"
                        class="form-control"
                        value="{{ old('fakultas',$anggota->fakultas ?? '') }}">
                </div>

                {{-- Jabatan --}}
                <div class="mb-4">
                    <label class="form-label">
                        Jabatan
                    </label>

                    <select
                        name="jabatan"
                        class="form-select">

                        @php
                        $jabatans=[
                        'Koordinator Mahasiswa Unit',
                        'Koordinator Mahasiswa Sub Unit',
                        'Bendahara',
                        'Humas & Publikasi',
                        'Perlengkapan Logistik & Konsumsi',
                        'Safety Health Environment',
                        'Design & Dokumentasi',
                        'Anggota'
                        ];

                        @endphp

                        @foreach($jabatans as $jabatan)

                        <option
                            value="{{ $jabatan }}"
                            {{ old('jabatan',$anggota->jabatan ?? '')==$jabatan ? 'selected' : '' }}>
                            {{ $jabatan }}
                        </option>
                        @endforeach
                    </select>
                </div>

                {{-- Instagram --}}
                <div class="mb-4">
                    <label class="form-label">
                        Instagram
                    </label>
                    <input
                        type="text"
                        name="instagram"
                        class="form-control"
                        placeholder="https://instagram.com/..."
                        value="{{ old('instagram',$anggota->instagram ?? '') }}">

                </div>

                {{-- Deskripsi --}}
                <div class="mb-4">
                    <label class="form-label">
                        Deskripsi
                    </label>

                    <textarea
                        id="editor"
                        name="deskripsi"
                        rows="10"
                        class="form-control">{{ old('deskripsi',$anggota->deskripsi ?? '') }}</textarea>
                </div>
            </div>
        </div>

        {{-- FOTO --}}
        <div class="col-lg-4">
            <div class="form-card">
                <div class="mb-4">
                    <label class="form-label">
                        Foto Anggota
                    </label>

                    <input
                        id="gambarInput"
                        type="file"
                        name="foto"
                        class="form-control">
                </div>

                <div class="preview-box">
                    @isset($anggota)

                    <img
                        id="previewImage"
                        src="{{ asset('storage/'.$anggota->foto) }}"
                        class="preview-image">

                    @else

                    <img
                        id="previewImage"
                        class="preview-image d-none">

                    @endisset

                    <div
                        id="previewPlaceholder"
                        @isset($anggota)
                        style="display:none"
                        @endisset>
                        <i class="bi bi-person-circle"></i>
                        <p>
                            Preview foto anggota
                        </p>
                    </div>
                </div>

                <div class="form-action mt-4">
                    <button
                        class="btn btn-success flex-fill">
                        <i class="bi bi-check-circle me-2"></i>
                        {{ $button }}
                    </button>

                    <a
                        href="{{ route('anggota-kkn.index') }}"
                        class="btn btn-outline-secondary flex-fill">
                        Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>
</form>

@push('scripts')

<script>
    const input = document.getElementById('gambarInput');
    const preview = document.getElementById('previewImage');
    const placeholder = document.getElementById('previewPlaceholder');

    if (input) {

        input.addEventListener('change', function() {

            const file = this.files[0];

            if (!file) return;

            preview.src = URL.createObjectURL(file);

            preview.classList.remove('d-none');

            placeholder.style.display = 'none';

        });

    }
</script>

<script>
    document.addEventListener('DOMContentLoaded', () => {

        if (document.querySelector('#editor')) {

            ClassicEditor

                .create(document.querySelector('#editor'))

                .catch(error => console.error(error));

        }

    });
</script>

@endpush