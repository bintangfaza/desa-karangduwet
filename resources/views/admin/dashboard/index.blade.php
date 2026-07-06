@extends('layouts.admin')

@section('title','Dashboard')

@section('content')

@include('admin.dashboard.statistics')

<div class="row g-4 mt-2">

    <div class="col-lg-7">

        @include('admin.dashboard.activity')

    </div>

    <div class="col-lg-5">

        @include('admin.dashboard.quick-action')

    </div>

</div>

<div class="mt-4">

    @include('admin.dashboard.chart')

</div>

@endsection