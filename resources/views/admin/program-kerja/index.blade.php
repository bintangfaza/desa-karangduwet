@extends('layouts.admin')

@section('title','Program Kerja')

@section('content')

<div class="page-header">
    <div>

        <a
            href="{{ route('anggota-kkn.index') }}"
            class="btn btn-outline-secondary btn-sm mb-3">
            <i class="bi bi-arrow-left me-2"></i>
            Kembali
        </a>

        <h2>
            Program Kerja
        </h2>

        <p>
            {{ $anggotaKkn->nama }}
            •
            {{ $anggotaKkn->jabatan }}
        </p>
    </div>

    <div>
        <a
            href="{{ route('anggota-kkn.program-kerja.create',$anggotaKkn) }}"
            class="btn btn-success">
            <i class="bi bi-plus-circle me-2"></i>
            Tambah Program
        </a>
    </div>
</div>

@if($programKerjas->count())

<div class="program-list">
    @foreach($programKerjas as $program)

    <div class="program-item">
        <div class="program-thumb">
            @if($program->thumbnail)

            <img
                src="{{ asset('storage/'.$program->thumbnail) }}"
                alt="{{ $program->judul }}">

            @else

            <div class="thumb-placeholder">
                <i class="bi bi-image"></i>
            </div>

            @endif

        </div>

        <div class="program-content">
            <div class="program-header">
                <h5>
                    {{ $program->judul }}
                </h5>

                <div class="program-action">
                    <a
                        href="{{ route('anggota-kkn.program-kerja.edit',[$anggotaKkn,$program]) }}"
                        class="btn btn-warning btn-sm">
                        <i class="bi bi-pencil-square"></i>
                    </a>

                    <form
                        action="{{ route('anggota-kkn.program-kerja.destroy',[$anggotaKkn,$program]) }}"
                        method="POST"
                        class="delete-form">

                        @csrf
                        @method('DELETE')

                        <button class="btn btn-danger btn-sm">
                            <i class="bi bi-trash"></i>
                        </button>
                    </form>
                </div>
            </div>

            <div class="program-date">

                <i class="bi bi-calendar-event"></i>

                @if($program->tanggal_mulai)

                {{ $program->tanggal_mulai->format('d M Y') }}

                @endif

                @if($program->tanggal_mulai && $program->tanggal_selesai)

                -

                @endif

                @if($program->tanggal_selesai)

                {{ $program->tanggal_selesai->format('d M Y') }}

                @endif

            </div>

            <div class="program-description">
                {{ Str::limit($program->deskripsi,120) }}
            </div>
        </div>
    </div>
    @endforeach
</div>

<div class="mt-4">
    {{ $programKerjas->links() }}
</div>

@else

<div class="empty-data">
    <i class="bi bi-kanban"></i>
    <h5>
        Belum ada Program Kerja
    </h5>
    <p>
        Tambahkan program kerja pertama untuk anggota ini.
    </p>
</div>

@endif

@endsection

@push('scripts')

<script>
    document.querySelectorAll('.delete-form').forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            const nama = form.dataset.name;

            Swal.fire({
                title: 'Hapus Program?',

                html: `
                Program <b>${nama}</b><br><br>
                Thumbnail juga akan dihapus dari server.
            `,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, Hapus',
                cancelButtonText: 'Batal',
                confirmButtonColor: '#dc3545',
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