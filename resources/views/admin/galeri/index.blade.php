@extends('layouts.admin')

@section('title', 'Galeri Album')

@section('content')

<div class="page-header">
    <div>
        <h2>{{ $album->judul }}</h2>
        <p>
            Kelola seluruh foto pada album ini.
        </p>
    </div>
    <div class="header-action">

        <a
            href="{{ route('album-galeri.index') }}"
            class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left me-2"></i>
            Kembali
        </a>
    </div>
</div>


{{-- Upload --}}
<div class="form-card mb-4">
    <h4 class="mb-4">
        Tambah Foto
    </h4>

    <form
        id="uploadForm"
        action="{{ route('galeri.store',$album) }}"
        method="POST"
        enctype="multipart/form-data">

        @csrf

        <div class="row g-3 align-items-center">
            <div class="col">

                <input
                    type="file"
                    name="gambar[]"
                    multiple
                    class="form-control">
            </div>
            <div class="col-auto">
                <button
                    class="btn btn-success">
                    <i class="bi bi-upload me-2"></i>
                    Upload Foto
                </button>
            </div>
        </div>

        <small class="text-muted mt-3 d-block">

            Bisa memilih banyak gambar sekaligus.
            Format JPG, PNG, WEBP.
        </small>
    </form>
</div>


{{-- Daftar Foto --}}
<div class="form-card">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="mb-0">
            Daftar Foto
            <span class="text-success">
                ({{ $album->galeri->count() }})
            </span>
        </h4>
    </div>

    @if($album->galeri->count())

    <div class="row g-4">
        @foreach($album->galeri as $foto)
        <div class="col-xl-3 col-lg-4 col-md-6">
            <div class="gallery-card">

                <img
                    src="{{ asset('storage/'.$foto->gambar) }}"
                    class="gallery-image">
                <div class="gallery-delete">

                    <form
                        action="{{ route('galeri.destroy',$foto) }}"
                        method="POST"
                        class="delete-gallery-form">

                        @csrf
                        @method('DELETE')

                        <button
                            type="submit"
                            class="btn btn-danger btn-sm rounded-circle">
                            <i class="bi bi-trash"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>

        @endforeach

    </div>

    @else
    <div class="empty-data py-5">
        <i class="bi bi-images"></i>
        <h5 class="mt-3">
            Belum Ada Foto
        </h5>
        <p>
            Upload foto pertama untuk album ini.
        </p>
    </div>

    @endif

</div>

@endsection


@push('scripts')

<script>
    document.querySelectorAll('.delete-gallery-form').forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault();

            Swal.fire({
                title: 'Hapus Foto?',
                text: 'Foto akan dihapus permanen.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#dc3545',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });
</script>

@endpush