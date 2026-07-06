@extends('layouts.admin')

@section('title','Tambah Anggota KKN')

@section('content')

<div class="page-header">

    <div>
        <h2>Tambah Anggota KKN</h2>
        <p>
            Tambahkan data anggota KKN beserta informasi profilnya.
        </p>
    </div>

</div>

@include('admin.anggota-kkn.form',[
    'action'=>route('anggota-kkn.store'),
    'button'=>'Simpan'
])

@endsection