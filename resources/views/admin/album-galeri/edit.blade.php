@extends('layouts.admin')

@section('title','Edit Album')

@section('content')

<div class="page-header">
    <div>
        <h2>Edit Album Galeri</h2>
        <p>Perbarui data album galeri.</p>
    </div>
</div>

@include('admin.album-galeri.form',[
    'action' => route('album-galeri.update',$album),
    'method' => 'PUT',
    'button' => 'Update',
])

@endsection