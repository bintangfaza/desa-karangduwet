@extends('layouts.admin')

@section('title','Potensi Desa')

@section('content')

@if(session('success'))

<script>
    Swal.fire({
        icon: 'success',
        title: 'Berhasil',
        text: '{{ session("success") }}',
        timer: 1800,
        showConfirmButton: false
    });
</script>

@endif
{{-- Header --}}
<div class="page-header">
    <div>
        <h2>Potensi Desa</h2>
        <p>
            Kelola seluruh data potensi desa yang ditampilkan pada website.
        </p>
    </div>

    <div class="header-action">
        <button
            class="btn btn-outline-success"
            id="toggleKategori">
            <i class="bi bi-tags me-2"></i>
            Kelola Kategori
        </button>

        <a
            href="{{ route('potensi-desa.create') }}"
            class="btn btn-success d-inline-flex align-items-center justify-content-center">
            <i class="bi bi-plus-circle me-2"></i>
            Tambah Potensi
        </a>
    </div>
</div>

{{-- Search & Filter --}}
<div class="table-toolbar">

    <form action="{{ route('potensi-desa.index') }}" method="GET">

        <div class="toolbar-search">
            <input
                type="text"
                name="search"
                class="form-control"
                placeholder="Cari nama potensi..."
                value="{{ request('search') }}">
        </div>

        <div class="toolbar-filter">
            <select
                name="kategori"
                class="form-select">

                <option value="">Semua Kategori</option>

                @foreach($kategoriPotensis as $kategori)
                <option
                    value="{{ $kategori->id }}"
                    {{ request('kategori') == $kategori->id ? 'selected' : '' }}>
                    {{ $kategori->nama_kategori }}
                </option>
                @endforeach

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

{{-- Table --}}
<div class="table-card">
    <table class="table align-middle">

        <thead>
            <tr>
                <th>Gambar</th>
                <th>Nama Potensi</th>
                <th>Kategori</th>
                <th>Penulis</th>
                <th>Dibuat</th>
                <th width="120">Aksi</th>
            </tr>
        </thead>

        <tbody>

            @forelse($potensis as $potensi)

            <tr>
                <td>
                    <img
                        src="{{ asset('storage/'.$potensi->gambar) }}"
                        class="table-image"
                        alt="{{ $potensi->nama_potensi }}">
                </td>
                <td>
                    <strong>
                        {{ $potensi->nama_potensi }}
                    </strong>
                </td>
                <td>
                    <span class="badge-kategori">
                        {{ $potensi->kategoriPotensi->nama_kategori }}
                    </span>
                </td>
                <td>
                    {{ $potensi->user->nama }}
                </td>
                <td>
                    {{ $potensi->created_at->format('d M Y') }}
                </td>

                <td>
                    <div class="action-group">
                        <a
                            href="{{ route('potensi-desa.edit',$potensi) }}"
                            class="btn-action btn-edit">
                            <i class="bi bi-pencil-square"></i>
                        </a>

                        <form
                            action="{{ route('potensi-desa.destroy',$potensi) }}"
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
                <td colspan="6">
                    <div class="empty-data">
                        <i class="bi bi-tree"></i>
                        @if(request()->filled('search') || request()->filled('kategori'))
                        <h5>
                            Potensi Tidak Ditemukan
                        </h5>
                        <p>
                            Tidak ada potensi desa yang sesuai dengan pencarian.
                        </p>
                        @else
                        <h5>
                            Belum Ada Potensi Desa
                        </h5>
                        <p>
                            Silakan tambahkan potensi desa pertama.
                        </p>
                        @endif
                    </div>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
    <div class="p-3">
        {{ $potensis->links() }}
    </div>
</div>


<!-- Modal Kelola Kategori -->
<div class="modal-body">
    <div id="kategoriPanel" class="kategori-panel">
        <form action="{{ route('kategori-potensi.store') }}" method="POST" class="mb-4">
            @csrf
            <div class="row g-2">
                <div class="col">
                    <input
                        type="text"
                        name="nama_kategori"
                        class="form-control @error('nama_kategori') is-invalid @enderror"
                        placeholder="Masukkan nama kategori"
                        value="{{ old('nama_kategori') }}">
                    @error('nama_kategori')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="col-auto">
                    <button class="btn btn-success">
                        <i class="bi bi-plus-circle me-2"></i>
                        Tambah
                    </button>
                </div>
            </div>
        </form>
        <div class="table-responsive">
            <table class="table align-middle">
                <thead>
                    <tr>
                        <th width="60">No</th>
                        <th>Nama Kategori</th>
                        <th width="170">Jumlah Potensi</th>
                        <th width="110">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($kategoriPotensis as $kategori)
                    <tr>
                        <td> {{ $loop->iteration }} </td>
                        <td> <strong> {{ $kategori->nama_kategori }} </strong> </td>
                        <td> <span class="badge bg-success"> {{ $kategori->potensi_desa_count }} </span> </td>
                        <td> <button
                                type="button"
                                class="btn btn-warning btn-sm btn-edit-kategori"

                                data-id="{{ $kategori->id }}"
                                data-nama="{{ $kategori->nama_kategori }}"

                                data-bs-toggle="modal"
                                data-bs-target="#editKategoriModal">

                                <i class="bi bi-pencil"></i>

                            </button>
                            <form
                                action="{{ route('kategori-potensi.destroy', $kategori) }}"
                                method="POST"
                                class="delete-kategori-form d-inline">

                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="btn btn-danger btn-sm">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center text-muted py-4"> Belum ada kategori. </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>


<!-- Modal Edit Kategori -->
<div
    class="modal fade"
    id="editKategoriModal"
    tabindex="-1">

    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <form
                id="editKategoriForm"
                method="POST">

                @csrf
                @method('PUT')

                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="bi bi-pencil-square me-2"></i>
                        Edit Kategori
                    </h5>

                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal">
                    </button>
                </div>

                <div class="modal-body">
                    <label class="form-label">
                        Nama Kategori
                    </label>

                    <input
                        type="text"
                        id="editNamaKategori"
                        name="nama_kategori"
                        class="form-control">
                </div>

                <div class="modal-footer">
                    <button
                        type="button"
                        class="btn btn-secondary"
                        data-bs-dismiss="modal">
                        Batal
                    </button>

                    <button class="btn btn-success btn-sm">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@push('scripts')

<script>
    document.querySelectorAll('.delete-form').forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Hapus Potensi?',
                text: 'Data potensi beserta gambar akan dihapus permanen.',
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
    // Toggle Kategori Panel
    const btn = document.getElementById('toggleKategori');
    const panel = document.getElementById('kategoriPanel');

    btn.addEventListener('click', function() {

        panel.classList.toggle('show');

        if (panel.classList.contains('show')) {

            btn.innerHTML =
                '<i class="bi bi-x-circle me-2"></i>Tutup Kategori';

        } else {

            btn.innerHTML =
                '<i class="bi bi-tags me-2"></i>Kelola Kategori';

        }

    });

    // Edit Kategori Modal
    document.querySelectorAll('.btn-edit-kategori').forEach(button => {
        button.addEventListener('click', function() {
            const id = this.dataset.id;
            const nama = this.dataset.nama;

            document
                .getElementById('editNamaKategori')
                .value = nama;
            document
                .getElementById('editKategoriForm')
                .action = `/kategori-potensi/${id}`;
        });

    });

    // Delete Kategori Confirmation
    document.querySelectorAll('.delete-kategori-form').forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Hapus Kategori?',
                text: 'Kategori akan dihapus secara permanen.',
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

@if(session('success'))

<script>
    Swal.fire({
        icon: 'success',
        title: 'Berhasil',
        text: "{{ session('success') }}",
        timer: 1800,
        showConfirmButton: false
    });
</script>

@endif

@if(session('error'))

<script>
    Swal.fire({
        icon: 'error',
        title: 'Gagal',
        text: "{{ session('error') }}"
    });
</script>

@endif
@endpush