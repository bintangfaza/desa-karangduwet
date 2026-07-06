<footer class="footer">
    <div class="container">
        <div class="row gy-5">

            {{-- Informasi Desa --}}
            <div class="col-lg-5">
                <div class="footer-brand">
                    <img
                        src="{{ asset('images/logo-desa.png') }}"
                        alt="Logo Desa">
                    <h4>Desa Karangduwet</h4>
                </div>

                <p class="footer-desc">
                    Website resmi Desa Karangduwet sebagai media informasi,
                    pelayanan, dan promosi potensi desa.
                </p>

                <ul class="footer-contact">
                    <li>
                        <i class="bi bi-geo-alt-fill"></i>
                        Jl. Karangduwet, Kecamatan ...
                    </li>

                    <li>
                        <i class="bi bi-telephone-fill"></i>
                        08xxxxxxxxxx
                    </li>

                    <li>
                        <i class="bi bi-envelope-fill"></i>
                        esa@email.com
                    </li>
                </ul>
            </div>

            {{-- Menu --}}
            <div class="col-lg-3">
                <h5>Menu</h5>

                <ul class="footer-menu">
                    <li><a href="#hero">Beranda</a></li>
                    <li><a href="#profil">Profil Desa</a></li>
                    <li><a href="#potensi">Potensi Desa</a></li>
                    <li><a href="#produk">Produk Desa</a></li>
                    <li><a href="#galeri">Galeri</a></li>
                    <li><a href="#berita">Berita</a></li>
                </ul>
            </div>

            {{-- Sosial --}}
            <div class="col-lg-4">
                <h5>Ikuti Kami</h5>

                <div class="social-group">
                    <a href="#">
                        <i class="bi bi-facebook"></i>
                    </a>
                    <a href="#">
                        <i class="bi bi-instagram"></i>
                    </a>
                    <a href="#">
                        <i class="bi bi-youtube"></i>
                    </a>
                </div>
            </div>
        </div>

        <hr>

        <div class="footer-bottom">
            <p>
                © {{ date('Y') }}
                Desa Karangduwet.
                All Rights Reserved.
            </p>
            <p>
                Developed by Tim KKN ❤️
            </p>
        </div>
    </div>
</footer>