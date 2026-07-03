@extends('layouts.admin')

@section('title','Edit Produk')

@section('content')

<div class="page-header">

    <div>

        <h2>Edit Produk Desa</h2>

        <p>
            Perbarui data produk desa.
        </p>

    </div>

</div>

@include('admin.produk.form',[
    'action' => route('produk-desa.update',$produk),
    'method' => 'PUT',
    'button' => 'Update'
])

@endsection