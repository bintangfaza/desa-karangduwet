<section id="potensi" class="frontend-potensi">
    <div class="frontend-potensi-circle"></div>
    <div class="frontend-potensi-dots"></div>
    <div class="frontend-potensi-bubble"></div>
    <div class="frontend-potensi-bubble2"></div>
    <div class="container">

        {{-- ========================= --}}
        {{-- Header --}}
        {{-- ========================= --}}

        <div class="frontend-potensi-header reveal">
            <span class="frontend-section-badge">
                🌿 Potensi Desa
            </span>

            <h2>
                Potensi Desa
                <span>Karangduwet</span>
            </h2>
            <p>
                Berbagai potensi unggulan yang menjadi kekuatan,
                kebanggaan serta identitas masyarakat Desa Karangduwet.
            </p>
        </div>


        @php

        $potensis = [

        [
        'judul'=>'Pertanian',
        'kategori'=>'Sektor Pertanian',
        'deskripsi'=>'Mayoritas masyarakat bekerja sebagai petani dengan komoditas padi, jagung dan palawija.',
        'gambar'=>'images/potensi/pertanian.jpg',
        'slug'=>'#'
        ],

        [
        'judul'=>'UMKM',
        'kategori'=>'Usaha Mikro',
        'deskripsi'=>'Berbagai produk olahan pangan serta kerajinan lokal yang terus berkembang.',
        'gambar'=>'images/potensi/umkm.png',
        'slug'=>'#'
        ],

        [
        'judul'=>'Wisata Alam',
        'kategori'=>'Pariwisata',
        'deskripsi'=>'Hamparan sawah dan panorama alam menjadi daya tarik wisata desa.',
        'gambar'=>'images/potensi/wisata.jpg',
        'slug'=>'#'
        ],

        [
        'judul'=>'Budaya',
        'kategori'=>'Kesenian',
        'deskripsi'=>'Tradisi budaya lokal yang masih dilestarikan hingga saat ini.',
        'gambar'=>'images/potensi/budaya.jpg',
        'slug'=>'#'
        ],

        [
        'judul'=>'Peternakan',
        'kategori'=>'Peternakan',
        'deskripsi'=>'Pengembangan ternak kambing, sapi serta unggas masyarakat.',
        'gambar'=>'images/potensi/ternak.jpg',
        'slug'=>'#'
        ],

        [
        'judul'=>'Perikanan',
        'kategori'=>'Perikanan',
        'deskripsi'=>'Budidaya ikan air tawar yang mulai berkembang menjadi usaha desa.',
        'gambar'=>'images/potensi/nelayan.jpg',
        'slug'=>'#'
        ]

        ];

        @endphp


        {{-- ========================= --}}
        {{-- GRID --}}
        {{-- ========================= --}}

        <div class="frontend-potensi-grid">
            @foreach($potensis as $potensi)

            <a
                href="{{ $potensi['slug'] }}"
                class="frontend-potensi-card reveal">

                <img
                    src="{{ asset($potensi['gambar']) }}"
                    alt="{{ $potensi['judul'] }}">
                <div class="frontend-potensi-overlay">
                    <span class="frontend-potensi-category">
                        {{ $potensi['kategori'] }}
                    </span>
                    <h3>
                        {{ $potensi['judul'] }}
                    </h3>
                    <p>
                        {{ $potensi['deskripsi'] }}
                    </p>
                </div>
            </a>
            @endforeach
        </div>
        {{-- ========================= --}}
        {{-- BUTTON --}}
        {{-- ========================= --}}
        <div class="frontend-potensi-footer">
            <a href="#" class="frontend-potensi-button">
                <span class="frontend-potensi-button-icon">
                    <i class="bi bi-arrow-right"></i>
                </span>
                <span>
                    Jelajahi Potensi Desa
                </span>
            </a>
        </div>
    </div>
</section>