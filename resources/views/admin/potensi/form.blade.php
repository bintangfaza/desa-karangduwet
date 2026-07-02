<form
    action="{{ $action }}"
    method="POST"
    enctype="multipart/form-data">

    @csrf

    @isset($method)
        @method($method)
    @endisset

    <div class="row g-4">

        {{-- =========================
                FORM KIRI
        ========================== --}}
        <div class="col-lg-8">

            <div class="form-card">

                {{-- Nama Potensi --}}
                <div class="mb-4">

                    <label class="form-label">
                        Nama Potensi
                    </label>

                    <input
                        type="text"
                        name="nama_potensi"
                        class="form-control @error('nama_potensi') is-invalid @enderror"
                        value="{{ old('nama_potensi', $potensi->nama_potensi ?? '') }}"
                        placeholder="Masukkan nama potensi">

                    @error('nama_potensi')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                {{-- Kategori --}}
                <div class="mb-4">

                    <label class="form-label">
                        Kategori Potensi
                    </label>

                    <select
                        name="kategori_potensi_id"
                        class="form-select @error('kategori_potensi_id') is-invalid @enderror">

                        <option value="">
                            -- Pilih Kategori --
                        </option>

                        @foreach($kategoriPotensis as $kategori)

                            <option
                                value="{{ $kategori->id }}"
                                {{ old('kategori_potensi_id', $potensi->kategori_potensi_id ?? '') == $kategori->id ? 'selected' : '' }}>

                                {{ $kategori->nama_kategori }}

                            </option>

                        @endforeach

                    </select>

                    @error('kategori_potensi_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                {{-- Deskripsi --}}
                <div class="mb-4">

                    <label class="form-label">
                        Deskripsi
                    </label>

                    <textarea
                        id="editor"
                        name="deskripsi"
                        rows="18"
                        class="form-control @error('deskripsi') is-invalid @enderror">{{ old('deskripsi', $potensi->deskripsi ?? '') }}</textarea>

                    @error('deskripsi')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

            </div>

        </div>

        {{-- =========================
                FORM KANAN
        ========================== --}}
        <div class="col-lg-4">

            <div class="form-card">

                {{-- Upload --}}
                <div class="mb-4">

                    <label class="form-label">
                        Gambar Potensi
                    </label>

                    <input
                        id="gambarInput"
                        type="file"
                        name="gambar"
                        class="form-control @error('gambar') is-invalid @enderror">

                    <small class="text-muted">
                        Format JPG, PNG, WEBP.
                        Maksimal 2 MB.
                    </small>

                    @error('gambar')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                {{-- Preview --}}
                <div class="preview-box">

                    @isset($potensi)

                        <img
                            id="previewImage"
                            src="{{ asset('storage/'.$potensi->gambar) }}"
                            class="preview-image">
                    @else
                        <img
                            id="previewImage"
                            class="preview-image d-none">
                    @endisset

                    <div
                        id="previewPlaceholder"
                        @isset($potensi)
                            style="display:none;"
                        @endisset>
                        <i class="bi bi-image"></i>
                        <p>
                        Preview gambar akan muncul di sini
                        </p>
                    </div>
                </div>

                {{-- Button --}}
                <div class="form-action mt-4">
                    <button
                        type="submit"
                        class="btn btn-success flex-fill">
                        <i class="bi bi-check-circle me-2"></i>
                        {{ $button }}
                    </button>
                    <a
                        href="{{ route('potensi-desa.index') }}"
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

if(input){
    input.addEventListener('change',function(){
        const file = this.files[0];
        if(!file) return;
        preview.src = URL.createObjectURL(file);
        preview.classList.remove('d-none');
        placeholder.style.display='none';
    });
}
</script>

<script>
document.addEventListener('DOMContentLoaded',()=>{
    if(document.querySelector('#editor')){
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error=>console.error(error));

    }

});
</script>

@endpush