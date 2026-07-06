@extends('layouts.admin')

@section('title','Edit Program Kerja')

@section('content')

<div class="page-header">

    <div>

        <h2>Edit Program Kerja</h2>

        <p>

            {{ $anggotaKkn->nama }}
            •
            {{ $anggotaKkn->jabatan }}

        </p>

    </div>

    <a
        href="{{ route('anggota-kkn.program-kerja.index',$anggotaKkn) }}"
        class="btn btn-outline-secondary">

        <i class="bi bi-arrow-left me-2"></i>

        Kembali

    </a>

</div>

<form
    action="{{ route('anggota-kkn.program-kerja.update',[$anggotaKkn,$programKerja]) }}"
    method="POST"
    enctype="multipart/form-data">

    @csrf
    @method('PUT')

    @include('admin.program-kerja.form')

</form>

@endsection