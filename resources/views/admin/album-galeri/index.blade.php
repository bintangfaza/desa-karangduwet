@extends('layouts.admin')

@section('title','Album Galeri')

@section('content')

<div class="page-header">

    <div>
        <h2>Album Galeri</h2>
        <p>
            Kelola album galeri yang ditampilkan pada website.
        </p>
    </div>

    <div class="header-action">
        <a
            href="{{ route('album-galeri.create') }}"
            class="btn btn-success d-inline-flex align-items-center justify-content-center">
            <i class="bi bi-plus-circle me-2"></i>
            Tambah Album
        </a>
    </div>
</div>

{{-- Search --}}
<div class="table-toolbar">
    <form
        action="{{ route('album-galeri.index') }}"
        method="GET">
        <div class="toolbar-search">
            <input
                type="text"
                name="search"
                class="form-control"
                placeholder="Cari judul album..."
                value="{{ request('search') }}">
        </div>

        <button
            class="btn btn-success"
            type="submit">
            <i class="bi bi-search me-2"></i>
            Cari
        </button>
    </form>
</div>

{{-- Table --}}
<div class="table-card">
    <table class="table align-middle">
        <thead>
            <tr>
                <th>Cover</th>
                <th>Judul Album</th>
                <th>Jumlah Foto</th>
                <th>Dibuat</th>
                <th width="170">Aksi</th>
            </tr>
        </thead>

        <tbody>
            @forelse($albums as $album)

            <tr>
                <td>
                    <img
                        src="{{ asset('storage/'.$album->cover) }}"
                        class="table-image"
                        alt="{{ $album->judul }}">
                </td>

                <td>
                    <strong class="text-truncate-2">
                        {{ $album->judul }}
                    </strong>
                </td>

                <td>
                    <span class="badge bg-success">
                        {{ $album->galeri_count }}
                    </span>
                </td>

                <td>
                    {{ $album->created_at->format('d M Y') }}
                </td>

                <td>
                    <div class="action-group">
                        <a
                            href="{{ route('album-galeri.galeri',$album) }}"
                            class="btn-action btn-view">
                            <i class="bi bi-images"></i>

                        </a>

                        <a
                            href="{{ route('album-galeri.edit',$album) }}"
                            class="btn-action btn-edit">
                            <i class="bi bi-pencil-square"></i>
                        </a>

                        <form
                            action="{{ route('album-galeri.destroy',$album) }}"
                            method="POST"
                            class="delete-form">

                            @csrf
                            @method('DELETE')

                            <button
                                type="submit"
                                class="btn btn-danger">
                                <i class="bi bi-trash"></i>
                            </button>

                        </form>
                    </div>
                </td>
            </tr>

            @empty

            <tr>
                <td colspan="5">
                    <div class="empty-data">
                        <i class="bi bi-images"></i>

                        @if(request()->filled('search'))

                        <h5>
                            Album Tidak Ditemukan
                        </h5>
                        <p>
                            Tidak ada album yang sesuai pencarian.
                        </p>

                        @else

                        <h5>
                            Belum Ada Album
                        </h5>
                        <p>
                            Silakan tambahkan album pertama.
                        </p>
                        @endif
                    </div>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
    <div class="p-3">
        {{ $albums->links() }}
    </div>
</div>

@endsection

@push('scripts')

<script>
    document.querySelectorAll('.delete-form').forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault();

            Swal.fire({
                title: 'Hapus Album?',
                text: 'Album beserta cover akan dihapus.',
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