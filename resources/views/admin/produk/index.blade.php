@extends('layouts.admin')

@section('title','Produk Desa')

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
        <h2>Produk Desa</h2>
        <p>
            Kelola seluruh data produk desa yang ditampilkan pada website.
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
            href="{{ route('produk-desa.create') }}"
            class="btn btn-success d-inline-flex align-items-center justify-content-center">
            <i class="bi bi-plus-circle me-2"></i>
            Tambah Produk
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
                placeholder="Cari nama produk..."
                value="{{ request('search') }}">
        </div>

        <div class="toolbar-filter">
            <select
                name="kategori"
                class="form-select">

                <option value="">Semua Kategori</option>

                @foreach($kategoriProduks as $kategori)
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
                <th>Harga</th>
                <th>WhatsApp</th>
                <th>Dibuat</th>
                <th width="120">Aksi</th>
            </tr>
        </thead>

        <tbody>

            @forelse($produks as $produk)

            <tr>
                <td>
                    <img
                        src="{{ asset('storage/'.$produk->gambar) }}"
                        class="table-image"
                        alt="{{ $produk->nama_produk }}">
                </td>
                <td>
                    <strong class="table-title">
                        {{ $produk->nama_produk }}
                    </strong>
                </td>
                <td>
                    <span class="badge-kategori">
                        {{ $produk->kategoriProduk->nama_kategori }}
                    </span>
                </td>
                <td>
                    <strong class="text-success">
                        {{ number_format($produk->harga,0,',','.') }}
                    </strong>
                </td>
                <td>
                    @if($produk->no_whatsapp)

                    {{ $produk->no_whatsapp }}

                    @else

                    -

                    @endif
                </td>
                <td>
                    {{ $produk->created_at->format('d M Y') }}
                </td>

                <td>
                    <div class="action-group">
                        <a
                            href="{{ route('produk-desa.edit',$produk) }}"
                            class="btn-action btn-edit">
                            <i class="bi bi-pencil-square"></i>
                        </a>

                        <form
                            action="{{ route('produk-desa.destroy',$produk) }}"
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
                        <i class="bi bi-bag"></i>
                        @if(request()->filled('search') || request()->filled('kategori'))
                        <h5>
                            Produk Tidak Ditemukan
                        </h5>
                        <p>
                            Tidak ada produk desa yang sesuai dengan pencarian.
                        </p>
                        @else
                        <h5>
                            Belum Ada Produk Desa
                        </h5>
                        <p>
                            Silakan tambahkan produk desa pertama.
                        </p>
                        @endif
                    </div>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
    <div class="p-3">
        {{ $produks->links() }}
    </div>
</div>


<!-- Modal Kelola Kategori -->
<div class="modal-body">
    <div id="kategoriPanel" class="kategori-panel">
        <form action="{{ route('kategori-produk.store') }}" method="POST" class="mb-4">
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
                        <th width="170">Jumlah Produk</th>
                        <th width="110">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($kategoriProduks as $kategori)
                    <tr>
                        <td> {{ $loop->iteration }} </td>
                        <td> <strong> {{ $kategori->nama_kategori }} </strong> </td>
                        <td> <span class="badge bg-success"> {{ $kategori->produk_desa_count }} </span> </td>
                        <td>
                            <button
                                class="btn btn-warning btn-sm"
                                data-bs-toggle="modal"
                                data-bs-target="#editKategori{{ $kategori->id }}">
                                <i class="bi bi-pencil"></i>
                            </button>
                            <form
                                action="{{ route('kategori-produk.destroy',$kategori) }}"
                                method="POST"
                                class="d-inline deleteKategori">

                                @csrf
                                @method('DELETE')

                                <button
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
@foreach($kategoriProduks as $kategori)

<div
    class="modal fade"
    id="editKategori{{ $kategori->id }}"
    tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form
                action="{{ route('kategori-produk.update',$kategori) }}"
                method="POST">

                @csrf
                @method('PUT')

                <div class="modal-header">
                    <h5 class="modal-title">
                        Edit Kategori
                    </h5>
                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal">
                    </button>
                </div>

                <div class="modal-body">
                    <input
                        type="text"
                        name="nama_kategori"
                        class="form-control"
                        value="{{ $kategori->nama_kategori }}"
                        required>

                </div>

                <div class="modal-footer">
                    <button
                        type="button"
                        class="btn btn-secondary btn-sm"
                        data-bs-dismiss="modal">
                        Batal
                    </button>

                    <button
                        class="btn btn-success btn-sm">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@endforeach

@endsection

@push('scripts')

<script>
    document.querySelectorAll('.delete-form').forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Hapus Produk?',
                text: 'Data produk beserta gambar akan dihapus permanen.',
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
    document.querySelectorAll('.deleteKategori').forEach(form => {

        form.addEventListener('submit', function(e) {

            e.preventDefault();

            Swal.fire({

                title: 'Hapus Kategori?',
                text: 'Kategori akan dihapus permanen.',
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