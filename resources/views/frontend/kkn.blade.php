@extends('frontend.layouts.app')

@section('content')
<section class="kkn-hero">

    <div class="container">

        <div class="hero-card">

            <!-- =========================
                    LEFT
            ========================== -->

            <div class="hero-left">

                <p class="hero-script">
                    Bersama Belajar,<br>
                    Bersama Berkarya,
                </p>

                <h1>

                    Bersama

                    <span>Karangduwet.</span>

                </h1>

                <div class="yellow-line"></div>

                <p class="hero-description">

                    Kami hadir untuk berkontribusi,
                    berbagi ilmu, dan tumbuh bersama
                    masyarakat Desa Karangduwet.

                </p>

                <div class="hero-buttons">

                    <a href="#team" class="btn-primary">

                        Kenali Tim Kami

                    </a>

                    <a href="#journey" class="btn-secondary">

                        Lihat Kegiatan

                    </a>

                </div>

                <div class="hero-location">

                    <i class="bi bi-geo-alt"></i>

                    <span>

                        Desa Karangduwet,
                        Kec. Nglipar,

                        Kab. Gunungkidul,
                        Jawa Tengah

                    </span>

                </div>

            </div>

            <!-- =========================
                    RIGHT
            ========================== -->

            <div class="hero-right">

                <div class="photo-wrapper">

                    <img
                        src="{{ asset('images/kkn/tim.jpg') }}"
                        alt="Tim KKN">

                </div>

                <div class="sticky-note">

                    <p>

                        KKN itu bukan
                        sekadar tugas,

                        tapi pengalaman
                        seumur hidup.

                    </p>

                    <span>

                        ♡

                    </span>

                </div>

                <div class="leaf">

                    🌿

                </div>

            </div>

            <!-- =========================
                    FLOATING STAT
            ========================== -->

            <div class="hero-stat">

                <div class="stat">

                    <i class="bi bi-people"></i>

                    <div>

                        <h3>32</h3>

                        <small>Mahasiswa</small>

                    </div>

                </div>

                <div class="stat">

                    <i class="bi bi-briefcase"></i>

                    <div>

                        <h3>8</h3>

                        <small>Program Kerja</small>

                    </div>

                </div>

                <div class="stat">

                    <i class="bi bi-diagram-3"></i>

                    <div>

                        <h3>4</h3>

                        <small>Divisi</small>

                    </div>

                </div>

                <div class="stat">

                    <i class="bi bi-calendar-event"></i>

                    <div>

                        <h3>40</h3>

                        <small>Hari Pengabdian</small>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>



{{-- ======================================================
SECTION 2
ABOUT KKN
====================================================== --}}

<section class="about-kkn">

    <div class="container">

        <div class="about-wrapper">

            {{-- ===========================
            LEFT
            ============================ --}}
            <div class="about-left">

                <span class="section-subtitle">

                    <i class="bi bi-leaf-fill"></i>

                    Tentang Program KKN

                </span>

                <h2 class="section-title">

                    Tentang

                    <span>Program KKN</span>

                </h2>

                <div class="section-line"></div>

                <p>

                    KKN–PPM Universitas Gadjah Mada merupakan
                    bentuk pengabdian mahasiswa kepada masyarakat
                    melalui penerapan ilmu pengetahuan,
                    teknologi,
                    serta budaya guna mendukung pembangunan desa
                    yang berkelanjutan.

                </p>

                <div class="about-leaf">

                    <i class="bi bi-flower1"></i>

                </div>

            </div>

            {{-- ===========================
            RIGHT
            ============================ --}}

            <div class="about-right">

                <div class="timeline-title">

                    <span>Perjalanan Kami</span>

                    <div class="section-line small"></div>

                </div>
                <div class="timeline">

                    <div class="timeline-progress"></div>

                    <div class="timeline-item">

                        <div class="timeline-circle">

                            <i class="bi bi-search"></i>

                        </div>

                        <span>Hari 1–3</span>

                        <h5>Observasi</h5>

                        <p>Pengenalan desa dan observasi lapangan.</p>

                    </div>

                    <div class="timeline-item">

                        <div class="timeline-circle">

                            <i class="bi bi-people-fill"></i>

                        </div>

                        <span>Hari 4–10</span>

                        <h5>Identifikasi</h5>

                        <p>Analisis potensi dan kebutuhan masyarakat.</p>

                    </div>

                    <div class="timeline-item">

                        <div class="timeline-circle">

                            <i class="bi bi-pencil-square"></i>

                        </div>

                        <span>Hari 11–25</span>

                        <h5>Pelaksanaan</h5>

                        <p>Implementasi seluruh program kerja.</p>

                    </div>

                    <div class="timeline-item">

                        <div class="timeline-circle">

                            <i class="bi bi-bar-chart-fill"></i>

                        </div>

                        <span>Hari 26–35</span>

                        <h5>Evaluasi</h5>

                        <p>Monitoring dan evaluasi seluruh kegiatan.</p>

                    </div>

                    <div class="timeline-item">

                        <div class="timeline-circle">

                            <i class="bi bi-flag-fill"></i>

                        </div>

                        <span>Hari 36–40</span>

                        <h5>Penarikan</h5>

                        <p>Laporan akhir dan penutupan kegiatan.</p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>
{{-- ======================================================
MEET THE TEAM
====================================================== --}}

<!--==================================================
MEET THE TEAM
===================================================-->

<section class="team-section" id="team">

    <div class="container">

        <!--==========================
        HEADER
        ===========================-->

        <div class="team-header">

            <span class="team-subtitle">

                <i class="bi bi-people-fill"></i>

                Tim KKN Karangduwet

            </span>

            <h2>

                Meet

                <span>The Team</span>

            </h2>

            <div class="section-line"></div>

            <p>

                Orang-orang hebat yang bersama-sama mengabdi,
                belajar, dan tumbuh bersama masyarakat
                Desa Karangduwet.

            </p>

        </div>

        <!--==========================
        GRID
        ===========================-->

        <div class="team-grid" id="teamGrid">
            <!--==========================
            CARD
            ===========================-->

            <div class="team-card">
                <div class="team-cover">

                    <div class="cover-pattern"></div>

                    <div class="photo-frame">

                        <img src="{{ asset('images/team/1.jpg') }}" alt="">

                    </div>

                    <span class="name-sticker">

                        Bintang

                    </span>

                    <span class="division-sticker">

                        Web Developer

                    </span>

                </div>

                <!--==========================
                BOTTOM
                ===========================-->

                <div class="team-content">

                    <h4>

                        Bintang Faza Amudoyo

                    </h4>

                    <span class="nim">

                        22/2670/SV/19530

                    </span>

                    <p>

                        Teknik Informatika

                    </p>

                    <div class="team-footer">

                        <span class="major">

                            TI

                        </span>

                    </div>

                </div>

            </div>
            <div class="team-card">

                <div class="team-cover">

                    <div class="cover-pattern"></div>

                    <div class="photo-frame">

                        <img src="{{ asset('images/team/2.jpg') }}">

                    </div>

                    <span class="name-sticker">

                        Nadya

                    </span>

                    <span class="division-sticker">

                        Wakil Koordinator

                    </span>

                </div>

                <div class="team-content">

                    <h4>

                        Nadya Putri

                    </h4>

                    <span class="nim">

                        22/4567/SV/19451

                    </span>

                    <p>

                        Teknik Industri

                    </p>

                    <div class="team-footer">

                        <span class="major">

                            TI

                        </span>

                    </div>

                </div>

            </div>
            <div class="team-card">

                <div class="team-cover">

                    <div class="cover-pattern"></div>

                    <div class="photo-frame">

                        <img src="{{ asset('images/team/2.jpg') }}">

                    </div>

                    <span class="name-sticker">

                        Nadya

                    </span>

                    <span class="division-sticker">

                        Wakil Koordinator

                    </span>

                </div>

                <div class="team-content">

                    <h4>

                        Nadya Putri

                    </h4>

                    <span class="nim">

                        22/4567/SV/19451

                    </span>

                    <p>

                        Teknik Industri

                    </p>

                    <div class="team-footer">

                        <span class="major">

                            TI

                        </span>

                    </div>

                </div>

            </div>
            <div class="team-card">

                <div class="team-cover">

                    <div class="cover-pattern"></div>

                    <div class="photo-frame">

                        <img src="{{ asset('images/team/2.jpg') }}">

                    </div>

                    <span class="name-sticker">

                        Nadya

                    </span>

                    <span class="division-sticker">

                        Wakil Koordinator

                    </span>

                </div>

                <div class="team-content">

                    <h4>

                        Nadya Putri

                    </h4>

                    <span class="nim">

                        22/4567/SV/19451

                    </span>

                    <p>

                        Teknik Industri

                    </p>

                    <div class="team-footer">

                        <span class="major">

                            TI

                        </span>

                    </div>

                </div>

            </div>
            <div class="team-card">

                <div class="team-cover">

                    <div class="cover-pattern"></div>

                    <div class="photo-frame">

                        <img src="{{ asset('images/team/2.jpg') }}">

                    </div>

                    <span class="name-sticker">

                        Nadya

                    </span>

                    <span class="division-sticker">

                        Wakil Koordinator

                    </span>

                </div>

                <div class="team-content">

                    <h4>

                        Nadya Putri

                    </h4>

                    <span class="nim">

                        22/4567/SV/19451

                    </span>

                    <p>

                        Teknik Industri

                    </p>

                    <div class="team-footer">

                        <span class="major">

                            TI

                        </span>

                    </div>

                </div>

            </div>
            <div class="team-card">

                <div class="team-cover">

                    <div class="cover-pattern"></div>

                    <div class="photo-frame">

                        <img src="{{ asset('images/team/2.jpg') }}">

                    </div>

                    <span class="name-sticker">

                        Nadya

                    </span>

                    <span class="division-sticker">

                        Wakil Koordinator

                    </span>

                </div>

                <div class="team-content">

                    <h4>

                        Nadya Putri

                    </h4>

                    <span class="nim">

                        22/4567/SV/19451

                    </span>

                    <p>

                        Teknik Industri

                    </p>

                    <div class="team-footer">

                        <span class="major">

                            TI

                        </span>

                    </div>

                </div>

            </div>
            <div class="team-card">

                <div class="team-cover">

                    <div class="cover-pattern"></div>

                    <div class="photo-frame">

                        <img src="{{ asset('images/team/2.jpg') }}">

                    </div>

                    <span class="name-sticker">

                        Nadya

                    </span>

                    <span class="division-sticker">

                        Wakil Koordinator

                    </span>

                </div>

                <div class="team-content">

                    <h4>

                        Nadya Putri

                    </h4>

                    <span class="nim">

                        22/4567/SV/19451

                    </span>

                    <p>

                        Teknik Industri

                    </p>

                    <div class="team-footer">

                        <span class="major">

                            TI

                        </span>

                    </div>

                </div>

            </div>
            <div class="team-card">

                <div class="team-cover">

                    <div class="cover-pattern"></div>

                    <div class="photo-frame">

                        <img src="{{ asset('images/team/2.jpg') }}">

                    </div>

                    <span class="name-sticker">

                        Nadya

                    </span>

                    <span class="division-sticker">

                        Wakil Koordinator

                    </span>

                </div>

                <div class="team-content">

                    <h4>

                        Nadya Putri

                    </h4>

                    <span class="nim">

                        22/4567/SV/19451

                    </span>

                    <p>

                        Teknik Industri

                    </p>

                    <div class="team-footer">

                        <span class="major">

                            TI

                        </span>

                    </div>

                </div>

            </div>
        </div>

    </div>
    <div class="team-action">
        <button class="team-button" id="showMoreTeam">
            <span>
                + 12 Anggota Lainnya
            </span>
            <i class="bi bi-chevron-down"></i>
        </button>
    </div>
    </div>
</section>


<!--==================================================
DIVISION
===================================================-->

<section class="division-section" id="division">

    <div class="container">

        <!--==========================
        HEADER
        ==========================-->

        <div class="division-header">

            <span class="division-subtitle">

                <i class="bi bi-diagram-3"></i>

                Divisi Kami

            </span>

            <h2>

                Tim Dibagi Menjadi

                <span>7 Divisi</span>

            </h2>

            <p>

                Seluruh anggota KKN dibagi ke dalam tujuh divisi yang saling
                berkolaborasi untuk menjalankan program kerja di Desa
                Karangduwet.

            </p>

        </div>

        <!--==========================
        WRAPPER
        ==========================-->

        <div class="division-wrapper">

            <!-- LEFT BUTTON -->

            <button class="division-prev">

                <i class="bi bi-chevron-left"></i>

            </button>

            <!--==========================
            SLIDER
            ==========================-->

            <div class="division-slider" id="divisionSlider">
                <!--==========================
                CARD
                ==========================-->

                <div class="division-card">
                    <div class="division-number">

                        01

                    </div>
                    <div class="division-icon green">

                        <i class="bi bi-person-badge"></i>

                    </div>

                    <div class="division-content">

                        <h4>

                            Koordinator Mahasiswa Unit

                        </h4>

                        <p>

                            Memimpin, mengoordinasikan dan bertanggung jawab
                            terhadap seluruh kegiatan KKN.

                        </p>

                        <span>

                            1 Anggota

                        </span>

                    </div>

                </div>
                <div class="division-card">
                    <div class="division-number">

                        02

                    </div>
                    <div class="division-icon blue">

                        <i class="bi bi-people"></i>

                    </div>

                    <div class="division-content">

                        <h4>

                            Koordinator Mahasiswa Sub Unit

                        </h4>

                        <p>

                            Membantu koordinasi setiap divisi dan memastikan seluruh
                            program kerja berjalan dengan baik.

                        </p>

                        <span>

                            1 Anggota

                        </span>

                    </div>

                </div>
                <div class="division-card">
                    <div class="division-number">

                        03

                    </div>
                    <div class="division-icon yellow">

                        <i class="bi bi-wallet2"></i>

                    </div>

                    <div class="division-content">

                        <h4>

                            Bendahara

                        </h4>

                        <p>

                            Mengelola administrasi keuangan serta menyusun laporan
                            penggunaan dana kegiatan.

                        </p>

                        <span>

                            1 Anggota

                        </span>

                    </div>

                </div>
                <div class="division-card">
                    <div class="division-number">

                        04

                    </div>
                    <div class="division-icon orange">

                        <i class="bi bi-megaphone"></i>

                    </div>

                    <div class="division-content">

                        <h4>

                            Humas & Publikasi

                        </h4>

                        <p>

                            Menjalin komunikasi dengan masyarakat serta mengelola
                            publikasi seluruh kegiatan KKN.

                        </p>

                        <span>

                            3 Anggota

                        </span>

                    </div>

                </div>
                <div class="division-card">
                    <div class="division-number">

                        05

                    </div>
                    <div class="division-icon brown">

                        <i class="bi bi-box-seam"></i>

                    </div>

                    <div class="division-content">

                        <h4>

                            Perlengkapan, Logistik & Konsumsi

                        </h4>

                        <p>

                            Menyiapkan perlengkapan, logistik serta kebutuhan konsumsi
                            selama kegiatan berlangsung.

                        </p>

                        <span>

                            4 Anggota

                        </span>

                    </div>

                </div>
                <div class="division-card">
                    <div class="division-number">

                        06

                    </div>
                    <div class="division-icon red">

                        <i class="bi bi-shield-check"></i>

                    </div>

                    <div class="division-content">

                        <h4>

                            Safety Health Environment

                        </h4>

                        <p>

                            Menjaga keamanan, kesehatan dan keselamatan seluruh anggota
                            selama pelaksanaan KKN.

                        </p>

                        <span>

                            2 Anggota

                        </span>

                    </div>

                </div>
                <div class="division-card">
                    <div class="division-number">

                        07

                    </div>
                    <div class="division-icon purple">

                        <i class="bi bi-palette"></i>

                    </div>

                    <div class="division-content">

                        <h4>

                            Design & Dokumentasi

                        </h4>

                        <p>

                            Bertanggung jawab terhadap desain visual, dokumentasi foto,
                            video dan media sosial.

                        </p>

                        <span>

                            8 Anggota

                        </span>

                    </div>

                </div>
            </div>

            <!-- RIGHT BUTTON -->

            <button class="division-next">

                <i class="bi bi-chevron-right"></i>

            </button>

        </div>

    </div>

</section>

<!--==================================================
CLOSING SECTION
===================================================-->

<section class="closing-section" id="closing">

    <div class="container">

        <div class="closing-card">

            <!--========================================
            LEFT
            =========================================-->

            <div class="closing-left">

                <div class="polaroid">
                    <span class="tape tape-left"></span>

                    <span class="tape tape-right"></span>

                    <img src="{{ asset('images/profile/balai.jpg') }}" alt="Kegiatan KKN">

                </div>

            </div>

            <!--========================================
            CENTER
            =========================================-->

            <div class="closing-center">

                <i class="bi bi-quote quote-icon"></i>

                <blockquote>

                    KKN bukan hanya tentang memberi,

                    tetapi juga belajar, bertumbuh,

                    dan menjadi bagian dari perubahan

                    kecil yang berarti bagi masyarakat.

                </blockquote>

                <div class="quote-line"></div>

                <p class="closing-message">

                    Terima kasih kepada seluruh masyarakat

                    Desa Karangduwet atas sambutan,

                    kebersamaan, dan pengalaman yang

                    tidak akan pernah kami lupakan.

                </p>

                <span class="closing-sign">

                    — Kelompok KKN PPM UGM 2026 —

                </span>

            </div>

            <!--========================================
            RIGHT
            =========================================-->

            <div class="closing-right">

                <div class="dpl-photo">

                    <img src="{{ asset('images/team/2.jpg') }}" alt="DPL">

                </div>

                <div class="dpl-info">

                    <small>Dosen Pembimbing Lapangan</small>

                    <h4>

                        Dr. Ir. Agus Moryono, M.P.

                    </h4>

                    <span>NIP. 196349900</span>

                    <p>

                        Fakultas Pertanian

                        <br>

                        Universitas Gadjah Mada

                    </p>

                </div>

            </div>

            <!--========================================
            DECORATION
            =========================================-->

            <!-- Decorative Icons -->

            <i class="bi bi-flower1 closing-flower"></i>

            <i class="bi bi-heart closing-heart"></i>

        </div>

    </div>

</section>
@endsection