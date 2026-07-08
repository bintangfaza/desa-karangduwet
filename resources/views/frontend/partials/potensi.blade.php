<section id="potensi" class="frontend-potensi">
    <div class="container">
        {{-- ========================= --}}
        {{-- Header --}}
        {{-- ========================= --}}
        <div class="frontend-potensi-header">
            <span class="frontend-section-badge">
                🌿 Potensi Desa
            </span>
            <h2>
                Apa yang Membuat
                <span>Karangduwet Istimewa?</span>
            </h2>
            <p>
                Desa Karangduwet memiliki berbagai potensi unggulan mulai dari sektor pertanian,
                UMKM, hingga wisata alam yang menjadi kekuatan ekonomi sekaligus identitas desa.
            </p>
        </div>

        @php

        $potensis = [

        [
        'judul' => 'Pertanian',
        'kategori' => 'Sektor Pertanian',
        'deskripsi' => 'Mayoritas masyarakat Desa Karangduwet bekerja sebagai petani dengan komoditas utama padi, jagung, dan palawija.',
        'gambar' => 'images/potensi/pertanian.jpg',
        'slug' => '#'
        ],

        [
        'judul' => 'UMKM',
        'kategori' => 'Usaha Mikro',
        'deskripsi' => 'Berbagai produk olahan pangan dan kerajinan lokal terus berkembang menjadi potensi ekonomi masyarakat.',
        'gambar' => 'images/potensi/umkm.png',
        'slug' => '#'
        ],

        [
        'judul' => 'Wisata Alam',
        'kategori' => 'Pariwisata',
        'deskripsi' => 'Keindahan persawahan serta panorama alam menjadi daya tarik yang dapat dikembangkan sebagai wisata desa.',
        'gambar' => 'images/potensi/wisata.jpg',
        'slug' => '#'
        ]

        ];

        @endphp

        {{-- ========================= --}}
        {{-- Grid --}}
        {{-- ========================= --}}
        <div class="frontend-potensi-grid">
            @foreach($potensis as $potensi)
            <a href="{{ $potensi['slug'] }}" class="frontend-potensi-card">
                <div class="frontend-potensi-image">
                    <img
                        src="{{ asset($potensi['gambar']) }}"
                        alt="{{ $potensi['judul'] }}">
                </div>
                <div class="frontend-potensi-content">
                    <small>
                        <i class="bi bi-stars"></i>
                        {{ $potensi['kategori'] }}
                    </small>
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
        {{-- Button --}}
        {{-- ========================= --}}
        <div class="frontend-potensi-footer">
            <a href="#" class="frontend-potensi-more">
                Lihat Semua Potensi
                <i class="bi bi-arrow-right"></i>
            </a>
        </div>
    </div>
</section>