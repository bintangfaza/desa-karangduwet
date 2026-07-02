@extends('layouts.admin')

@section('title','Tambah Potensi')

@section('content')

<div class="page-header">
    <div>
        <h2>Tambah Potensi Desa</h2>
        <p>Tambahkan data potensi desa.</p>
    </div>
</div>

@include('admin.potensi.form',[
    'action' => route('potensi-desa.store'),
    'button' => 'Simpan',
    'potensi' => null
])

@endsection