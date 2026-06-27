<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title') | Desa Karangduwet</title>

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Bootstrap Icons --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" rel="stylesheet">

    @vite([
    'resources/css/app.css',
    'resources/js/app.js'
    ])

</head>

<body class="bg-light">

    <div class="d-flex">

        {{-- ================= SIDEBAR ================= --}}
        <aside
            id="sidebar"
            class="bg-success text-white vh-100 shadow"
            style="width:260px;">

            <div class="mt-4">

                <a href="{{ route('dashboard') }}"
                    class="nav-link text-white px-4 py-3">

                    <i class="bi bi-house-door-fill me-2"></i>

                    Dashboard

                </a>

                <a href="#"
                    class="nav-link text-white px-4 py-3">

                    <i class="bi bi-newspaper me-2"></i>

                    Berita

                </a>

                <a href="#"
                    class="nav-link text-white px-4 py-3">

                    <i class="bi bi-tree me-2"></i>

                    Potensi Desa

                </a>

                <a href="#"
                    class="nav-link text-white px-4 py-3">

                    <i class="bi bi-bag me-2"></i>

                    Produk Desa

                </a>

                <a href="#"
                    class="nav-link text-white px-4 py-3">

                    <i class="bi bi-images me-2"></i>

                    Galeri

                </a>

                <a href="#"
                    class="nav-link text-white px-4 py-3">

                    <i class="bi bi-geo-alt me-2"></i>

                    Lokasi Desa

                </a>

            </div>

        </aside>

        {{-- ================= CONTENT ================= --}}
        <div class="flex-grow-1">

            {{-- NAVBAR --}}
            <nav class="navbar navbar-expand-lg bg-white shadow-sm">

                <div class="container-fluid">

                    {{-- Kiri --}}
                    <div class="d-flex align-items-center">

                        {{-- Tombol Sidebar --}}
                        <button id="toggleSidebar" class="btn btn-light me-3">

                            <i class="bi bi-list fs-4"></i>

                        </button>

                        {{-- Logo --}}
                        <img
                            src="{{ asset('assets/logo/logo.png') }}"
                            width="45"
                            class="me-3">

                        <div>

                            <h6 class="mb-0 fw-bold">

                                Desa Karangduwet

                            </h6>

                            <small class="text-muted">

                                Admin Panel

                            </small>

                        </div>

                    </div>

                    {{-- User --}}
                    <div class="dropdown">

                        <a
                            href="#"
                            class="text-decoration-none dropdown-toggle d-flex align-items-center"
                            data-bs-toggle="dropdown">

                            <i class="bi bi-person-circle fs-2 text-success me-2"></i>

                            <div>

                                <div class="fw-semibold text-dark">

                                    {{ auth()->user()->nama }}

                                </div>

                                <small class="text-muted">

                                    Administrator

                                </small>

                            </div>

                        </a>

                        <ul class="dropdown-menu dropdown-menu-end shadow">

                            <li>

                                <a class="dropdown-item" href="#">

                                    <i class="bi bi-person me-2"></i>

                                    Profil

                                </a>

                            </li>

                            <li>

                                <a class="dropdown-item" href="#">

                                    <i class="bi bi-gear me-2"></i>

                                    Pengaturan

                                </a>

                            </li>

                            <li>
                                <hr class="dropdown-divider">
                            </li>

                            <li>

                                <form action="{{ route('logout') }}" method="POST">

                                    @csrf

                                    <button class="dropdown-item text-danger">

                                        <i class="bi bi-box-arrow-right me-2"></i>

                                        Logout

                                    </button>

                                </form>

                            </li>

                        </ul>

                    </div>

                </div>

            </nav>
            {{-- CONTENT --}}
            <main class="p-4">

                @yield('content')

            </main>

            {{-- FOOTER --}}
            <footer class="text-center py-3 text-muted">

                © {{ date('Y') }} Website Desa Karangduwet

            </footer>

        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>