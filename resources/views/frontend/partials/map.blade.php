<section id="peta" class="frontend-map">
    <div class="frontend-map-circle"></div>
    <div class="frontend-map-dots"></div>
    <div class="frontend-map-bubble"></div>
    <div class="frontend-map-topography">
        <svg
            viewBox="0 0 600 400"
            preserveAspectRatio="none">

            <path d="M10 40
                 C120 20,180 70,290 45
                 S480 60,590 40" />

            <path d="M0 90
                 C120 70,220 120,340 95
                 S520 110,620 85" />

            <path d="M30 145
                 C150 120,250 180,360 150
                 S510 165,620 140" />

            <path d="M0 210
                 C120 185,220 235,360 205
                 S520 230,620 200" />

            <path d="M40 285
                 C170 255,250 310,390 280
                 S530 300,620 275" />
        </svg>
    </div>
    <div class="container">

        <div class="frontend-map-wrapper">

            {{-- =========================
                 LEFT CONTENT
            ========================== --}}
            <div class="frontend-map-content reveal">

                <span class="frontend-map-badge">
                    📍 Lokasi Desa
                </span>

                <h2>
                    Temukan
                    <span>Desa Karangduwet</span>
                </h2>

                <p>
                    Desa Karangduwet terletak di Kabupaten Gunungkidul,
                    Daerah Istimewa Yogyakarta. Desa ini memiliki akses
                    yang mudah dijangkau serta dikelilingi berbagai potensi
                    alam dan budaya yang menarik untuk dikunjungi.
                </p>

                <a href="#"
                    class="frontend-map-button"
                    target="_blank">
                    <i class="bi bi-geo-alt-fill"></i>
                    Buka Google Maps
                </a>

                {{-- INFO CARD --}}
                <div class="frontend-location-info">
                    <div class="frontend-location-card reveal">
                        <i class="bi bi-building"></i>
                        <div>
                            <h5>Kabupaten</h5>
                            <span>Gunungkidul</span>
                        </div>
                    </div>

                    <div class="frontend-location-card reveal">
                        <i class="bi bi-signpost-2-fill"></i>
                        <div>
                            <h5>Kecamatan</h5>
                            <span>Karangmojo</span>
                        </div>
                    </div>

                    <div class="frontend-location-card reveal">
                        <i class="bi bi-tree-fill"></i>
                        <div>
                            <h5>Luas Wilayah</h5>
                            <span>850 Ha</span>
                        </div>
                    </div>

                    <div class="frontend-location-card reveal">
                        <i class="bi bi-car-front-fill"></i>
                        <div>
                            <h5>Akses</h5>
                            <span>Mudah Dijangkau</span>
                        </div>
                    </div>
                </div>

            </div>

            {{-- =========================
                 GOOGLE MAP
            ========================== --}}

            <div class="frontend-map-view reveal">
                <iframe
                    src="https://www.google.com/maps?q=Karangduwet,Gunungkidul&output=embed"
                    loading="lazy"
                    allowfullscreen>
                </iframe>

                {{-- Floating Card --}}
                <div class="frontend-map-floating reveal">
                    <i class="bi bi-geo-alt-fill"></i>
                    <div>
                        <strong>Desa Karangduwet</strong>
                        <small>Gunungkidul, DIY</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>