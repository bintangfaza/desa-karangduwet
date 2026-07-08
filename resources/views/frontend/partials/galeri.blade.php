<section id="galeri" class="frontend-gallery">

    <div class="container">

        {{-- ===========================
            HEADER
        ============================ --}}
        <div class="frontend-gallery-header">

            <span class="frontend-section-badge">
                📸 Dokumentasi Desa
            </span>

            <h2>
                Cerita Desa dalam
                <span>Setiap Album</span>
            </h2>

            <p>
                Berbagai momen kebersamaan, pembangunan, budaya,
                dan kegiatan masyarakat Desa Karangduwet yang
                terdokumentasi dalam bentuk album.
            </p>

        </div>

        @php

            $albums = [

                [
                    'judul'   => 'Penyambutan Kapanewon',
                    'cover'   => 'images/galeri/pentas.jpg',
                    'jumlah'  => 18,
                    'tanggal' => '12 Juni 2026'
                ],

                [
                    'judul'   => 'Perayaan 17 Agustus',
                    'cover'   => 'images/galeri/agustus.jpg',
                    'jumlah'  => 42,
                    'tanggal' => '17 Agustus 2026'
                ],

                [
                    'judul'   => 'Kerja Bakti Desa',
                    'cover'   => 'images/galeri/kerjabakti.jpg',
                    'jumlah'  => 24,
                    'tanggal' => '8 Mei 2026'
                ],

            ];

        @endphp

        {{-- ===========================
            GRID ALBUM
        ============================ --}}

        <div class="frontend-gallery-grid">

            @foreach($albums as $album)

                <a href="#" class="frontend-gallery-card">

                    <div class="frontend-gallery-frame">

                        <div class="frontend-gallery-image">

                            <img
                                src="{{ asset($album['cover']) }}"
                                alt="{{ $album['judul'] }}">

                            {{-- Badge Jumlah Foto --}}
                            <div class="frontend-gallery-badge">

                                <i class="bi bi-images"></i>

                                {{ $album['jumlah'] }} Foto

                            </div>

                            {{-- Overlay --}}
                            <div class="frontend-gallery-overlay">

                                <div class="frontend-gallery-info">

                                    <h3>

                                        {{ $album['judul'] }}

                                    </h3>

                                    <p>

                                        <i class="bi bi-calendar3"></i>

                                        {{ $album['tanggal'] }}

                                    </p>

                                </div>

                                <div class="frontend-gallery-arrow">

                                    <i class="bi bi-arrow-right"></i>

                                </div>

                            </div>

                        </div>

                    </div>

                </a>

            @endforeach

        </div>

        {{-- ===========================
            BUTTON
        ============================ --}}

        <div class="frontend-gallery-footer">

            <a href="#" class="frontend-gallery-more">

                Lihat Semua Album

                <i class="bi bi-arrow-right"></i>

            </a>

        </div>

    </div>

</section>