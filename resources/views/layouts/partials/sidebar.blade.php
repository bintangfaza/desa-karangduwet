<aside id="sidebar" class="sidebar">

    {{-- =========================
            MENU
    ========================== --}}
    <div class="sidebar-menu">
        <div class="sidebar-title">
            MENU UTAMA
        </div>

        <a href="{{ route('dashboard') }}"
            class="menu-item {{ request()->routeIs('dashboard') ? 'active' : '' }}"
            data-title="Dashboard">

            <i class="bi bi-speedometer2"></i>

            <span>Dashboard</span>

        </a>

        <a href="{{ route('berita.index') }}"
            class="menu-item {{ request()->routeIs('berita.*') ? 'active' : '' }}"
            data-title="Berita">

            <i class="bi bi-newspaper"></i>
            <span>Berita</span>

        </a>

        <a href="{{ route('potensi-desa.index') }}"
            class="menu-item {{ request()->routeIs('potensi-desa.*') ? 'active' : '' }}"
            data-title="Potensi Desa">

            <i class="bi bi-tree"></i>
            <span>Potensi Desa</span>

        </a>
        <a href="{{ route('produk-desa.index') }}"
            class="menu-item {{ request()->routeIs('produk-desa.*') ? 'active' : '' }}"
            data-title="Produk Desa">

            <i class="bi bi-bag"></i>
            <span>Produk Desa</span>

        </a>

        <a href="{{ route('album-galeri.index') }}"
            class="menu-item {{ request()->routeIs('album-galeri.*') ? 'active' : '' }}"
            data-title="Galeri">

            <i class="bi bi-images"></i>
            <span>Galeri</span>

        </a>

        <a href="#"
            class="menu-item {{ request()->routeIs('lokasi-desa.*') ? 'active' : '' }}"
            data-title="Lokasi Desa">

            <i class="bi bi-geo-alt"></i>
            <span>Lokasi Desa</span>

        </a>
        <a href="{{ route('anggota-kkn.index') }}"
            class="menu-item {{ request()->routeIs('anggota-kkn.*') ? 'active' : '' }}"
            data-title="Anggota KKN">
            <i class="bi bi-people"></i>
            <span>Anggota</span>
        </a>

    </div>


    {{-- =========================
                     FOOTER
        ========================== --}}
    <div class="sidebar-footer">

        <form
            action="{{ route('logout') }}"
            method="POST">

            @csrf

            <button
                type="submit"
                class="btn-logout"
                data-title="Logout">

                <i class="bi bi-box-arrow-right"></i>

                <span>Logout</span>

            </button>

        </form>

    </div>

</aside>