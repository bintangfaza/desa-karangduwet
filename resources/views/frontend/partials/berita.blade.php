<section id="berita" class="frontend-berita">
    <div class="news-blob blob-green"></div>
    <div class="news-blob blob-orange"></div>
    <div class="news-editorial"></div>
    <div class="news-ring"></div>
    <div class="news-bubble bubble1"></div>
    <div class="news-bubble bubble2"></div>
    <div class="news-bubble bubble3"></div>
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

        {{-- =============================== --}}
        {{-- HEADER --}}
        {{-- =============================== --}}

        <div class="frontend-berita-header reveal">

            <span class="frontend-section-badge">
                📰 Berita Desa
            </span>

            <h2>
                Berita &
                <span>Kegiatan Desa</span>
            </h2>

            <p>
                Ikuti informasi terbaru mengenai pembangunan,
                kegiatan masyarakat, UMKM hingga berbagai program
                yang sedang berlangsung di Desa Karangduwet.
            </p>

        </div>

        @php

        $beritas=[

        [
        'judul'=>'Festival Budaya Karangduwet 2026 Meriahkan Desa',
        'kategori'=>'Budaya',
        'tanggal'=>'12 Juni 2026',
        'gambar'=>'images/berita/festival.jpg',
        'deskripsi'=>'Festival budaya tahunan kembali digelar dengan berbagai pertunjukan seni, kirab budaya serta pameran UMKM yang menjadi daya tarik masyarakat.',
        'slug'=>'#'
        ],

        [
        'judul'=>'Gerakan Tanam Pohon di Sepanjang Jalan Desa',
        'kategori'=>'Lingkungan',
        'tanggal'=>'10 Juni 2026',
        'gambar'=>'images/berita/kerjabakti.jpg',
        'slug'=>'#'
        ],

        [
        'judul'=>'Pelatihan UMKM Tingkatkan Produk Lokal',
        'kategori'=>'UMKM',
        'tanggal'=>'8 Juni 2026',
        'gambar'=>'images/berita/umkm.jpg',
        'slug'=>'#'
        ],

        [
        'judul'=>'Musyawarah Desa Bahas Pembangunan',
        'kategori'=>'Pemerintahan',
        'tanggal'=>'6 Juni 2026',
        'gambar'=>'images/berita/musyawarah.jpg',
        'slug'=>'#'
        ],

        [
        'judul'=>'Panen Raya Petani Karangduwet',
        'kategori'=>'Pertanian',
        'tanggal'=>'4 Juni 2026',
        'gambar'=>'images/berita/panen.jpg',
        'slug'=>'#'
        ],

        [
        'judul'=>'Karang Taruna Gelar Turnamen Voli',
        'kategori'=>'Pemuda',
        'tanggal'=>'2 Juni 2026',
        'gambar'=>'images/berita/voli.jpg',
        'slug'=>'#'
        ]

        ];

        @endphp

        {{-- =============================== --}}
        {{-- LAYOUT --}}
        {{-- =============================== --}}

        <div class="frontend-berita-layout">
            {{-- =============================== --}}
            {{-- HEADLINE --}}
            {{-- =============================== --}}

            <a href="{{ $beritas[0]['slug'] }}"
                class="frontend-headline reveal-left-ori">

                <div class="frontend-headline-image">

                    <img
                        src="{{ asset($beritas[0]['gambar']) }}"
                        alt="{{ $beritas[0]['judul'] }}">

                </div>

                <div class="frontend-headline-content">

                    <span class="frontend-news-category">

                        {{ $beritas[0]['kategori'] }}

                    </span>

                    <div class="frontend-news-meta">

                        <i class="bi bi-calendar3"></i>

                        {{ $beritas[0]['tanggal'] }}

                    </div>

                    <h3>

                        {{ $beritas[0]['judul'] }}

                    </h3>

                    <p>

                        {{ $beritas[0]['deskripsi'] }}

                    </p>

                    <div class="frontend-headline-button">
                        Baca Selengkapnya
                        <i class="bi bi-arrow-right"></i>
                    </div>
                </div>

            </a>
            {{-- =============================== --}}
            {{-- LIST BERITA --}}
            {{-- =============================== --}}

            <div class="frontend-news-list reveal-right">

                @foreach(array_slice($beritas,1) as $berita)

                <a
                    href="{{ $berita['slug'] }}"
                    class="frontend-news-item">

                    <div class="frontend-news-thumb">
                        <img
                            src="{{ asset($berita['gambar']) }}"
                            alt="{{ $berita['judul'] }}">
                    </div>
                    <div class="frontend-news-info">
                        <span>
                            {{ $berita['kategori'] }}
                        </span>
                        <h4>
                            {{ $berita['judul'] }}
                        </h4>
                        <div class="frontend-news-meta-row">
                            <small>
                                <i class="bi bi-calendar3"></i>
                                {{ $berita['tanggal'] }}
                            </small>
                            <div class="frontend-news-arrow">
                                <i class="bi bi-arrow-right"></i>
                            </div>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
        </div>

        {{-- =============================== --}}
        {{-- FOOTER --}}
        {{-- =============================== --}}

        <div class="frontend-berita-footer">
            <a href="#"
                class="frontend-potensi-button">
                <span class="frontend-potensi-button-icon">
                    <i class="bi bi-newspaper"></i>
                </span>
                Lihat Semua Berita
            </a>
        </div>
    </div>
</section>



