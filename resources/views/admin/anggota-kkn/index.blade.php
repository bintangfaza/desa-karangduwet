@extends('layouts.admin')

@section('title','Anggota KKN')

@section('content')

<div class="page-header">
    <div>
        <h2>Anggota KKN</h2>
        <p>
            Kelola seluruh data anggota KKN.
        </p>
    </div>

    <div>
        <a
            href="{{ route('anggota-kkn.create') }}"
            class="btn btn-success">
            <i class="bi bi-plus-circle me-2"></i>
            Tambah Anggota
        </a>
    </div>
</div>

<div class="table-toolbar mb-4">
    <form
        action="{{ route('anggota-kkn.index') }}"
        method="GET">
        <div class="toolbar-search">
            <input
                type="text"
                name="search"
                class="form-control"
                placeholder="Cari nama, NIM atau prodi..."
                value="{{ request('search') }}">
        </div>

        <button
            class="btn btn-success">
            <i class="bi bi-search me-2"></i>
            Cari
        </button>
    </form>
</div>

@if($anggotas->count())

<div class="row gy-3">
    @foreach($anggotas as $anggota)
    <div class="col-12">
        <div class="anggota-card">
            {{-- FOTO --}}
            <div class="anggota-left">
                @if($anggota->foto)
                <img
                    src="{{ asset('storage/'.$anggota->foto) }}"
                    alt="{{ $anggota->nama }}"
                    class="anggota-image">

                @else

                <div class="anggota-placeholder">
                    <i class="bi bi-person-circle"></i>
                </div>
                @endif
            </div>

            {{-- CONTENT --}}
            <div class="anggota-middle">
                <div class="anggota-title">
                    <h4>
                        {{ $anggota->nama }}
                    </h4>

                    <span class="anggota-jabatan">
                        {{ $anggota->jabatan }}
                    </span>
                </div>

                <div class="anggota-detail">
                    <div>
                        <i class="bi bi-mortarboard"></i>
                        {{ $anggota->prodi }}
                    </div>

                    <div>
                        <i class="bi bi-buildings"></i>
                        {{ $anggota->fakultas }}
                    </div>

                    <div>
                        <i class="bi bi-person-vcard"></i>
                        {{ $anggota->nim }}
                    </div>

                    @if($anggota->instagram)

                    <div>
                        <i class="bi bi-instagram"></i>
                        <a
                            href="{{ $anggota->instagram }}"
                            target="_blank">
                            Instagram
                        </a>
                    </div>
                    @endif
                </div>
            </div>

            {{-- RIGHT --}}
            <div class="anggota-right">
                <div class="program-box">
                    <small>Program Kerja</small>
                    <h3>
                        {{ $anggota->programKerja->count() }}
                    </h3>
                </div>

                <div class="anggota-action">
                    <a
                        href="{{ route('anggota-kkn.program-kerja.index',$anggota) }}"
                        class="btn btn-success">
                        <i class="bi bi-kanban me-2"></i>
                        Kelola Program
                    </a>

                    <a
                        href="{{ route('anggota-kkn.edit',$anggota) }}"
                        class="btn btn-edit">
                        <i class="bi bi-pencil"></i>
                        Edit
                    </a>

                    <form
                        action="{{ route('anggota-kkn.destroy',$anggota) }}"
                        method="POST"
                        class="delete-form">

                        @csrf
                        @method('DELETE')

                        <button
                            type="submit"
                            class="btn btn-delete">
                            <i class="bi bi-trash"></i>
                            Hapus
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @endforeach

</div>


<div class="mt-4">
    {{ $anggotas->links() }}
</div>

@else

<div class="empty-data">
    <i class="bi bi-people"></i>

    @if(request()->filled('search'))

    <h5>
        Anggota tidak ditemukan
    </h5>

    <p>
        Tidak ada anggota yang sesuai pencarian.
    </p>

    @else

    <h5>
        Belum ada anggota
    </h5>
    <p>
        Tambahkan anggota KKN pertama.
    </p>

    @endif

</div>

@endif

@endsection

@push('scripts')

<script>
    document.querySelectorAll('.delete-form').forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault();

            Swal.fire({
                title: 'Hapus Anggota?',
                text: 'Data anggota akan dihapus.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#dc3545',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Ya, Hapus',
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