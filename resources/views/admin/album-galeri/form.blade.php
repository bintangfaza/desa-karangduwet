<form
    action="{{ $action }}"
    method="POST"
    enctype="multipart/form-data">

    @csrf

    @isset($method)
        @method($method)
    @endisset

    <div class="row g-4">
        {{-- FORM --}}
        <div class="col-lg-8">
            <div class="form-card">
                <div class="mb-4">

                    <label class="form-label">
                        Judul Album
                    </label>

                    <input
                        type="text"
                        name="judul"
                        class="form-control @error('judul') is-invalid @enderror"
                        value="{{ old('judul',$album->judul ?? '') }}"
                        placeholder="Masukkan judul album">

                    @error('judul')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
        </div>

        {{-- COVER --}}
        <div class="col-lg-4">
            <div class="form-card">
                <div class="mb-4">

                    <label class="form-label">
                        Cover Album
                    </label>

                    <input
                        id="coverInput"
                        type="file"
                        name="cover"
                        class="form-control @error('cover') is-invalid @enderror">
                    <small class="text-muted">
                        JPG, PNG, WEBP (Max 2MB)
                    </small>
                    @error('cover')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="preview-box">
                    @isset($album)

                        <img
                            id="previewImage"
                            src="{{ asset('storage/'.$album->cover) }}"
                            class="preview-image">

                    @else

                        <img
                            id="previewImage"
                            class="preview-image d-none">

                    @endisset

                    <div
                        id="previewPlaceholder"
                        @isset($album)
                            style="display:none;"
                        @endisset>
                        <i class="bi bi-image"></i>
                        <p>
                            Preview cover akan muncul di sini
                        </p>
                    </div>
                </div>

                <div class="form-action mt-4">
                    <button
                        class="btn btn-success flex-fill"
                        type="submit">
                        <i class="bi bi-check-circle me-2"></i>
                        {{ $button }}
                    </button>

                    <a
                        href="{{ route('album-galeri.index') }}"
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

const input=document.getElementById('coverInput');
const preview=document.getElementById('previewImage');
const placeholder=document.getElementById('previewPlaceholder');

if(input){
    input.addEventListener('change',function(){
        const file=this.files[0];
        if(!file) return;
        preview.src=URL.createObjectURL(file);
        preview.classList.remove('d-none');
        placeholder.style.display='none';
    });
}

</script>

@endpush