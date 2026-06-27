@extends('layouts.admin')

@section('title','Dashboard')

@section('content')

<div class="card border-0 shadow-sm">

    <div class="card-body">

        <h2>

            Selamat Datang 👋

        </h2>

        <p class="text-muted">

            Halo <strong>{{ auth()->user()->nama }}</strong>,
            selamat datang di Dashboard Website Desa Karangduwet.

        </p>

    </div>

</div>

@endsection