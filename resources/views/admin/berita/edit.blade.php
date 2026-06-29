@extends('layouts.admin')

@section('title','Edit Berita')

@section('content')

<div class="page-header">
    <div>
        <h2>Edit Berita</h2>
        <p>Perbarui data berita.</p>
    </div>
</div>

@include('admin.berita.form',[
    'action' => route('berita.update',$berita),
    'method' => 'PUT',
    'button' => 'Simpan',
    'berita' => $berita
])

@endsection