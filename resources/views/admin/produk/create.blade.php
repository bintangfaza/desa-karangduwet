@extends('layouts.admin')

@section('title','Tambah Produk')

@section('content')

<div class="page-header">
    <div>
        <h2>Tambah Produk Desa</h2>
        <p>Tambahkan produk desa.</p>
    </div>
</div>

@include('admin.produk.form',[
    'action' => route('produk-desa.store'),
    'button' => 'Simpan'
])

@endsection