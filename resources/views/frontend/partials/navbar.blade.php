<header id="frontend-navbar" class="frontend-navbar">

    <div class="frontend-navbar-container">

        <!-- Logo -->
        <a href="{{ url('/') }}" class="frontend-navbar-logo">

            <div class="frontend-navbar-logo-wrapper">
                <img
                    src="{{ asset('images/logo/logokkn.png') }}"
                    alt="Logo KKN"
                    class="frontend-navbar-logo-image">
            </div>

            <div class="frontend-navbar-logo-text">
                <small>Website Resmi KKN</small>
                <h2>Desa Karangduwet</h2>
            </div>

        </a>

        <!-- Menu Desktop -->
        <nav class="frontend-navbar-menu">

            <a href="#hero" class="frontend-navbar-link active">Home</a>

            <a href="#profil" class="frontend-navbar-link">Profil</a>

            <a href="#potensi" class="frontend-navbar-link">Potensi</a>

            <a href="#produk" class="frontend-navbar-link">Produk</a>

            <a href="#galeri" class="frontend-navbar-link">Galeri</a>

            <a href="#berita" class="frontend-navbar-link">Berita</a>

            <a href="{{ route('kkn') }}" class="frontend-navbar-link">Tentang KKN</a>

        </nav>

        <!-- Burger -->
        <button
            id="frontend-navbar-toggle"
            class="frontend-navbar-toggle">

            <i class="bi bi-list"></i>

        </button>

    </div>

</header>

<!-- ========================================= -->

<div
    id="frontend-overlay"
    class="frontend-overlay">
</div>

<!-- ========================================= -->

<aside
    id="frontend-drawer"
    class="frontend-drawer">

    <div class="frontend-drawer-header">

        <img
            src="{{ asset('images/logo/logokkn.png') }}"
            alt="Logo">

        <div>

            <small>Website Resmi KKN</small>

            <h3>Desa Karangduwet</h3>

        </div>

    </div>

    <nav class="frontend-drawer-menu">

        <a href="#hero">🏠 Home</a>

        <a href="#profil">🏡 Profil</a>

        <a href="#potensi">🌿 Potensi</a>

        <a href="#produk">🛍 Produk</a>

        <a href="#galeri">🖼 Galeri</a>

        <a href="#berita">📰 Berita</a>

        <a href="#kkn">👨‍🎓 Pengabdian</a>

    </nav>


</aside>