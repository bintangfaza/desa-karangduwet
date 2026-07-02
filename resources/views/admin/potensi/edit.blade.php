@extends('layouts.admin')

@section('title','Edit Potensi')

@section('content')

<div class="page-header">
    <div>
        <h2>Edit Potensi Desa</h2>
        <p>Perbarui data potensi desa.</p>
    </div>
</div>

@include('admin.potensi.form',[
    'action' => route('potensi-desa.update',$potensiDesa),
    'method' => 'PUT',
    'button' => 'Simpan',
    'potensi' => $potensiDesa
])

@endsection