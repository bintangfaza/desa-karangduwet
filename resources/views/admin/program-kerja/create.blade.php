@extends('layouts.admin')

@section('title','Tambah Program Kerja')

@section('content')

<div class="page-header">
    <div>

        <a
            href="{{ route('anggota-kkn.program-kerja.index',$anggotaKkn) }}"
            class="btn btn-outline-secondary btn-sm mb-3">
            <i class="bi bi-arrow-left me-2"></i>
            Kembali
        </a>

        <h2>
            Tambah Program Kerja
        </h2>

        <p>
            {{ $anggotaKkn->nama }}
        </p>
    </div>
</div>

<div class="card shadow-sm border-0">
    <div class="card-body p-4">
        <form
            action="{{ route('anggota-kkn.program-kerja.store',$anggotaKkn) }}"
            method="POST"
            enctype="multipart/form-data">

            @csrf

            @include('admin.program-kerja.form')
        </form>
    </div>
</div>

@endsection