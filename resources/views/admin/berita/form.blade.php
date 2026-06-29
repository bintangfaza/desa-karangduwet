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

                <div class="mb-4">

                    <label class="form-label">
                        Judul Berita
                    </label>

                    <input
                        type="text"
                        name="judul"
                        class="form-control @error('judul') is-invalid @enderror"
                        value="{{ old('judul', $berita->judul ?? '') }}"
                        placeholder="Masukkan judul berita">

                    @error('judul')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror

                </div>

                <div class="mb-4">

                    <label class="form-label">
                        Isi Berita
                    </label>

                    <textarea
                        id="editor"
                        name="isi"
                        rows="18"
                        class="form-control">
                    {{ old('isi', $berita->isi ?? '') }}
                    </textarea>

                    @error('isi')
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

                <div class="mb-4">

                    <label class="form-label">
                        Gambar Berita
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

                <div class="preview-box">

                    @if(isset($berita))

                    <img
                        id="previewImage"
                        src="{{ asset('storage/'.$berita->gambar) }}"
                        class="preview-image">

                    @else

                    <img
                        id="previewImage"
                        class="preview-image d-none">

                    @endif

                    <div
                        id="previewPlaceholder"
                        @isset($berita)
                        style="display:none;"
                        @endisset>

                        <i class="bi bi-image"></i>

                        <p>
                            Preview gambar akan muncul di sini
                        </p>

                    </div>

                </div>

                <div class="mt-4">

                    <label class="form-label">
                        Status
                    </label>

                    <select
                        name="status"
                        class="form-select">

                        <option
                            value="draft"
                            {{ old('status', $berita->status ?? '') == 'draft' ? 'selected' : '' }}>
                            Draft
                        </option>

                        <option
                            value="publish"
                            {{ old('status', $berita->status ?? '') == 'publish' ? 'selected' : '' }}>
                            Publish
                        </option>

                    </select>

                </div>

                <div class="form-action mt-4">

                    <button
                        type="submit"
                        class="btn btn-success flex-fill">

                        <i class="bi bi-check-circle me-2"></i>

                        {{ $button }}

                    </button>

                    <a
                        href="{{ route('berita.index') }}"
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
document.addEventListener('DOMContentLoaded', function () {

    const editor = document.querySelector('#editor');

    if (editor) {
        ClassicEditor
            .create(editor)
            .catch(error => {
                console.error(error);
            });
    }

});
</script>
@endpush