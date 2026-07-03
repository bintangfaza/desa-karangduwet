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
                {{-- Nama Produk --}}
                <div class="mb-4">
                    <label class="form-label">
                        Nama Produk
                    </label>

                    <input
                        type="text"
                        name="nama_produk"
                        class="form-control @error('nama_produk') is-invalid @enderror"
                        value="{{ old('nama_produk', $produk->nama_produk ?? '') }}"
                        placeholder="Masukkan nama produk">

                    @error('nama_produk')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror

                </div>

                {{-- Kategori --}}
                <div class="mb-4">

                    <label class="form-label">
                        Kategori Produk
                    </label>

                    <select
                        name="kategori_produk_id"
                        class="form-select @error('kategori_produk_id') is-invalid @enderror">

                        <option value="">
                            -- Pilih Kategori --
                        </option>

                        @foreach($kategoriProduks as $kategori)

                        <option
                            value="{{ $kategori->id }}"
                            {{ old('kategori_produk_id', $produk->kategori_produk_id ?? '') == $kategori->id ? 'selected' : '' }}>

                            {{ $kategori->nama_kategori }}

                        </option>

                        @endforeach
                    </select>

                    @error('kategori_produk_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                {{-- Harga --}}
                <div class="mb-4">
                    <label class="form-label">
                        Harga
                    </label>

                    <input
                        type="number"
                        name="harga"
                        class="form-control @error('harga') is-invalid @enderror"
                        value="{{ old('harga', $produk->harga ?? '') }}"
                        placeholder="Masukkan harga">

                    @error('harga')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                {{-- WhatsApp --}}
                <div class="mb-4">
                <label class="form-label">
                        Nomor WhatsApp
                    </label>
                    <input
                        type="text"
                        name="no_whatsapp"
                        class="form-control @error('no_whatsapp') is-invalid @enderror"
                        value="{{ old('no_whatsapp', $produk->no_whatsapp ?? '') }}"
                        placeholder="Contoh : 081234567890">

                    @error('no_whatsapp')
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
                        class="form-control @error('deskripsi') is-invalid @enderror">{{ old('deskripsi', $produk->deskripsi ?? '') }}</textarea>

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
                        Gambar Produk
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
                    @isset($produk)

                    <img
                        id="previewImage"
                        src="{{ asset('storage/'.$produk->gambar) }}"
                        class="preview-image">

                    @else

                    <img
                        id="previewImage"
                        class="preview-image d-none">

                    @endisset

                    <div
                        id="previewPlaceholder"
                        @isset($produk)
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
                        href="{{ route('produk-desa.index') }}"
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