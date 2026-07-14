{{-- =========================================================
FOOTER
========================================================= --}}
<footer class="frontend-footer">
    <div class="footer-wave">

        <svg viewBox="0 0 1440 120" preserveAspectRatio="none">

            <path
                fill="#214532"

                d="M0,96L120,85.3C240,75,480,53,720,58.7C960,64,1200,96,1320,112L1440,128L1440,160L1320,160C1200,160,960,160,720,160C480,160,240,160,120,160L0,160Z">

            </path>

        </svg>

    </div>
    <div class="footer-pattern"></div>

    <div class="footer-glow glow-left"></div>

    <div class="footer-glow glow-right"></div>

    <div class="footer-bubble bubble1"></div>

    <div class="footer-bubble bubble2"></div>

    <div class="footer-bubble bubble3"></div>

    <div class="footer-bubble bubble4"></div>
    <div class="footer-icon icon-house">
        <i class="bi bi-house-door-fill"></i>
    </div>

    <div class="footer-icon icon-tree">
        <i class="bi bi-tree-fill"></i>
    </div>

    <div class="footer-icon icon-sun">
        <i class="bi bi-brightness-high-fill"></i>
    </div>

    <div class="footer-icon icon-leaf">
        <i class="bi bi-flower1"></i>
    </div>

    <div class="container">

        <div class="frontend-footer-grid">

            {{-- =========================================
            Logo & Deskripsi
            ========================================= --}}
            <div class="footer-col footer-brand">

                <div class="footer-logo">

                    <img src="{{ asset('images/logo/logokkn.png') }}" alt="Logo Desa">

                    <div>

                        <h3>Desa Karangduwet</h3>
                        <span>Website Resmi Desa</span>

                    </div>

                </div>

                <p>
                    Website resmi Desa Karangduwet sebagai media informasi,
                    pelayanan publik, promosi potensi desa, produk UMKM,
                    serta berbagai kegiatan masyarakat secara terbuka dan
                    mudah diakses oleh seluruh masyarakat.
                </p>

                <div class="footer-social">

                    <a href="#">
                        <i class="bi bi-facebook"></i>
                    </a>

                    <a href="#">
                        <i class="bi bi-instagram"></i>
                    </a>

                    <a href="#">
                        <i class="bi bi-youtube"></i>
                    </a>

                    <a href="#">
                        <i class="bi bi-tiktok"></i>
                    </a>

                </div>

            </div>

            {{-- =========================================
            Menu
            ========================================= --}}
            <div class="footer-col">

                <h4>
                    <i class="bi bi-link-45deg"></i>
                    Menu Utama
                </h4>

                <ul>
                    <li><a href="#hero">Beranda</a></li>
                    <li><a href="#profil">Profil Desa</a></li>
                    <li><a href="#potensi">Potensi</a></li>
                    <li><a href="#produk">Produk UMKM</a></li>
                    <li><a href="#galeri">Galeri</a></li>
                    <li><a href="#berita">Berita</a></li>
                </ul>

            </div>

            {{-- =========================================
            Lokasi
            ========================================= --}}
            <div class="footer-col">
                <h4>
                    <i class="bi bi-geo-alt"></i>
                    Informasi Desa
                </h4>

                <ul class="footer-info">
                    <li>
                        <i class="bi bi-house-door-fill"></i>
                        Desa Karangduwet
                    </li>

                    <li>
                        <i class="bi bi-geo"></i>
                        Kecamatan Paliyan
                    </li>

                    <li>
                        <i class="bi bi-map"></i>
                        Kabupaten Gunungkidul
                    </li>

                    <li>
                        <i class="bi bi-globe2"></i>
                        Daerah Istimewa Yogyakarta
                    </li>
                </ul>
            </div>

            {{-- =========================================
            Kontak
            ========================================= --}}
            <div class="footer-col">
                <h4>
                    <i class="bi bi-chat-dots"></i>
                    Hubungi Kami
                </h4>

                <div class="footer-contact">
                    <div>
                        <span>Email</span>
                        <a href="mailto:karangduwet@email.com">
                            karangduwet@email.com
                        </a>
                    </div>

                    <div>
                        <span>Telepon</span>
                        <a href="#">
                            (0274) 000000
                        </a>
                    </div>

                    <div>
                        <span>Jam Pelayanan</span>
                        <p>
                            Senin - Jumat
                            <br>
                            08.00 - 15.00 WIB
                        </p>
                    </div>
                </div>
            </div>
        </div>

        {{-- =========================================
        Bottom Footer
        ========================================= --}}

        <div class="frontend-footer-bottom">
            <div class="footer-copy">
                <p>
                    © {{ date('Y') }}

                    <strong>Desa Karangduwet</strong>
                    Seluruh hak cipta dilindungi.
                </p>

                <span>
                    Website Resmi Desa Karangduwet
                </span>
            </div>

            <div class="footer-powered">

                <img
                    src="{{ asset('images/logo/logokkn.png') }}"
                    alt="Logo">
                <div>
                    <strong>
                        Desa Karangduwet
                    </strong>
                    <span>
                        Kabupaten Gunungkidul
                    </span>
                </div>
            </div>
        </div>
    </div>
</footer>