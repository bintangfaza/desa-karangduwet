@extends('layouts.admin')
@section('title','Berita')
@section('content')

{{-- Header --}}
<div class="page-header">
    <div>
        <h2>Berita Desa</h2>
        <p>
            Kelola seluruh berita yang ditampilkan pada website desa.
        </p>
    </div>

    <a
        href="{{ route('berita.create') }}"
        class="btn btn-success d-inline-flex align-items-center justify-content-center">
        <i class="bi bi-plus-circle me-2"></i>
        Tambah Potensi
    </a>

</div>

{{-- Search and Filter --}}
<div class="table-toolbar">
    <form
        action="{{ route('berita.index') }}"
        method="GET">

        <div class="toolbar-search">

            <input
                type="text"
                name="search"
                class="form-control"
                placeholder="Cari judul berita..."
                value="{{ request('search') }}">

        </div>

        <div class="toolbar-filter">
            <select
                name="status"
                class="form-select">
                <option value="">
                    Semua Status
                </option>

                <option
                    value="publish"
                    {{ request('status') == 'publish' ? 'selected' : '' }}>
                    Publish
                </option>
                <option
                    value="draft"
                    {{ request('status') == 'draft' ? 'selected' : '' }}>
                    Draft
                </option>
            </select>

        </div>

        <button
            type="submit"
            class="btn btn-success">
            <i class="bi bi-search me-2"></i>
            Cari
        </button>
    </form>
</div>

{{-- Table Card --}}
<div class="table-card">
    <table class="table align-middle">
        <thead>
            <tr>
                <th>Gambar</th>
                <th>Judul</th>
                <th>Penulis</th>
                <th>Status</th>
                <th>Views</th>
                <th>Dibuat</th>
                <th width="120">Aksi</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($beritas as $berita)
            <tr>
                <td>
                    <img
                        src="{{ asset('storage/' . $berita->gambar) }}"
                        class="table-image"
                        alt="{{ $berita->judul }}">
                </td>

                <td>
                    <strong>
                        {{ $berita->judul }}
                    </strong>
                </td>
                <td>
                    {{ $berita->user->nama }}
                </td>
                <td>
                    @if($berita->status == 'publish')
                    <span class="badge-status badge-publish">
                        Publish
                    </span>
                    @else
                    <span class="badge-status badge-draft">
                        Draft
                    </span>
                    @endif
                </td>
                <td>
                    <i class="bi bi-eye me-1"></i>
                    {{ number_format($berita->views) }}
                </td>
                <td>
                    {{ $berita->created_at->format('d M Y') }}
                </td>
                <td>
                    <div class="action-group">
                        <a
                            href="{{ route('berita.edit',$berita) }}"
                            class="btn-action btn-edit">
                            <i class="bi bi-pencil-square"></i>
                        </a>

                        <form
                            action="{{ route('berita.destroy',$berita) }}"
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
                <td colspan="7">
                    <div class="empty-data">
                        <i class="bi bi-newspaper"></i>
                        <h5>Belum Ada Berita</h5>
                        <p>
                            Silakan tambahkan berita pertama.
                        </p>
                    </div>
                </td>
            </tr>

            @endforelse

        </tbody>
    </table>
    <div class="p-3">
        {{ $beritas->links() }}
    </div>
</div>


@endsection

@push('scripts')

<script>
    document.querySelectorAll('.delete-form').forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Hapus Berita?',
                text: 'Berita yang dihapus tidak dapat dikembalikan.',
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