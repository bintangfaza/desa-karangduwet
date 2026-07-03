@extends('layouts.admin')

@section('title','Tambah Album')

@section('content')

<div class="page-header">
    <div>
        <h2>Tambah Album Galeri</h2>
        <p>Tambahkan album galeri baru.</p>
    </div>
</div>

@include('admin.album-galeri.form',[
    'action'=>route('album-galeri.store'),
    'button'=>'Simpan'
])

@endsection