@extends('layouts.auth')

@section('title','Login Admin')

@section('content')

<div class="login-wrapper">

    <div class="login-left">
        <div class="overlay"></div>
        <div class="hero-content">
            <img src="{{ asset('assets/logo/logo.png') }}" class="logo">
            <h1>Website Desa Karangduwet</h1>
            <p>
                Sistem Informasi Desa untuk memberikan pelayanan
                dan informasi kepada masyarakat secara cepat
            </p>
        </div>
    </div>

    <div class="login-right">
        <div class="login-card">
            <h2>Login Admin</h2>
            <p class="subtitle">
                Silakan login untuk mengelola website desa.
            </p>
            <form method="POST" action="{{ route('login.store') }}">
                @csrf
                <div class="mb-3">
                    <label>Username</label>
                    <input
                        type="text"
                        name="username"
                        value="{{ old('username') }}"
                        class="form-control @error('username') is-invalid @enderror"
                        placeholder="Masukkan username">

                    @error('username')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label>Password</label>
                    <input
                        type="password"
                        name="password"
                        class="form-control @error('password') is-invalid @enderror"
                        placeholder="Masukkan password">

                    @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-check mb-4">
                    <input
                        class="form-check-input"
                        type="checkbox">
                    <label class="form-check-label">
                        Ingat saya
                    </label>
                </div>
                <button class="btn btn-success w-100">
                    Login
                </button>
            </form>
        </div>
    </div>
</div>

@endsection