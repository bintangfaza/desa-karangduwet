<section id="hero" class="frontend-hero">
    <i class="bi bi-flower1 frontend-leaf leaf-1"></i>
    <i class="bi bi-flower1 frontend-leaf leaf-2"></i>
    <i class="bi bi-flower1 frontend-leaf leaf-3"></i>
    <div class="container">
        <div class="frontend-hero-wrapper">
            {{-- Kiri --}}
            <div class="frontend-hero-content">
                <span class="frontend-badge">
                    🌿 Website Informasi Desa
                </span>
                <h1>
                    Selamat Datang di
                    <span>Desa Karangduwet</span>
                </h1>
                <p>
                    Mengenal lebih dekat potensi alam, produk unggulan,
                    budaya, serta kegiatan masyarakat Desa Karangduwet
                    melalui satu website yang mudah diakses siapa saja.
                </p>

                <div class="frontend-hero-button">
                    <a href="#profil" class="btn-primary">
                        Jelajahi Desa
                    </a>
                    <a href="#potensi" class="btn-outline">
                        Lihat Potensi
                    </a>
                </div>
            </div>
            {{-- Kanan --}}
            <div class="frontend-hero-image">
                <!-- Card 1 -->
                <div class="frontend-floating-card card-top">
                    <div class="floating-icon">
                        <i class="bi bi-tree-fill"></i>
                    </div>
                    <div>
                        <small>Potensi Desa</small>
                        <h5>12 Potensi</h5>
                    </div>
                </div>

                <!-- Foto -->
                <div class="frontend-image-card">
                    <img
                        src="{{ asset('images/hero/pesawahan.jpg') }}"
                        alt="Hero Desa">
                </div>

                <!-- Card 2 -->
                <div class="frontend-floating-card card-bottom">
                    <div class="floating-icon">
                        <i class="bi bi-shop"></i>
                    </div>

                    <div>
                        <small>Produk UMKM</small>
                        <h5>24 Produk</h5>
                    </div>
                </div>
                <!-- Card 3 -->
                <div class="frontend-floating-card card-left">
                    <div class="floating-icon">
                        <i class="bi bi-people-fill"></i>
                    </div>

                    <div>
                        <small>Jumlah Penduduk</small>
                        <h5>4.250 Jiwa</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>