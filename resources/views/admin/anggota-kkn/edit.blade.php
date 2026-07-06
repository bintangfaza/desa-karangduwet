@extends('layouts.admin')

@section('title','Edit Anggota KKN')

@section('content')

<div class="page-header">

    <div>
        <h2>Edit Anggota KKN</h2>
        <p>
            Perbarui data anggota KKN.
        </p>
    </div>

</div>

@include('admin.anggota-kkn.form',[
    'action'=>route('anggota-kkn.update',$anggota),
    'method'=>'PUT',
    'button'=>'Perbarui'
])

@endsection