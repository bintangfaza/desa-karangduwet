<div class="welcome-card">

    <div class="welcome-left">

        <span class="welcome-badge">

            Dashboard Admin

        </span>

        <h2>

            Selamat Datang,
            <strong>{{ auth()->user()->nama }}</strong>


        </h2>

        <p>

            Kelola seluruh informasi Website Desa
            Karangduwet melalui dashboard admin.

        </p>

    </div>

    <div class="welcome-right">

        <div class="today">

            <i class="bi bi-calendar-event"></i>

            {{ now()->translatedFormat('l') }}

        </div>

        <div class="date">

            {{ now()->translatedFormat('d F Y') }}

        </div>

    </div>

</div>

<div class="row g-4">

    {{-- Berita --}}
    <div class="col-xl-4 col-md-6">
        <div class="stats-card">

            <div class="stats-icon bg-success">
                <i class="bi bi-newspaper"></i>
            </div>

            <div class="stats-content">
                <span>Total Berita</span>

                <h3
                    class="counter"
                    data-value="{{ $statistics['berita'] }}">
                    0
                </h3>
                <small>Artikel yang telah dipublikasikan</small>
            </div>

        </div>
    </div>

    {{-- Produk --}}
    <div class="col-xl-4 col-md-6">
        <div class="stats-card">

            <div class="stats-icon bg-primary">
                <i class="bi bi-bag"></i>
            </div>

            <div class="stats-content">
                <span>Produk Desa</span>

                <h3
                    class="counter"
                    data-value="{{ $statistics['produk'] }}">
                    0
                </h3>

                <small>Produk UMKM Desa</small>
            </div>

        </div>
    </div>

    {{-- Album --}}
    <div class="col-xl-4 col-md-6">
        <div class="stats-card">

            <div class="stats-icon bg-warning">
                <i class="bi bi-images"></i>
            </div>

            <div class="stats-content">
                <span>Album Galeri</span>

                <h3
                    class="counter"
                    data-value="{{ $statistics['album'] }}">
                    0
                </h3>

                <small>Album dokumentasi kegiatan</small>
            </div>

        </div>
    </div>

    {{-- Potensi --}}
    <div class="col-xl-4 col-md-6">
        <div class="stats-card">

            <div class="stats-icon bg-purple">
                <i class="bi bi-tree"></i>
            </div>

            <div class="stats-content">
                <span>Potensi Desa</span>

                <h3
                    class="counter"
                    data-value="{{ $statistics['potensi'] }}">
                    0
                </h3>

                <small>Potensi yang ditampilkan</small>
            </div>

        </div>
    </div>

    {{-- Anggota --}}
    <div class="col-xl-4 col-md-6">
        <div class="stats-card">

            <div class="stats-icon bg-info">
                <i class="bi bi-people"></i>
            </div>

            <div class="stats-content">
                <span>Anggota KKN</span>

                <h3
                    class="counter"
                    data-value="{{ $statistics['anggota'] }}">
                    0
                </h3>

                <small>Total anggota KKN</small>
            </div>

        </div>
    </div>

    {{-- Program --}}
    <div class="col-xl-4 col-md-6">
        <div class="stats-card">

            <div class="stats-icon bg-danger">
                <i class="bi bi-kanban"></i>
            </div>

            <div class="stats-content">
                <span>Program Kerja</span>

                <h3
                    class="counter"
                    data-value="{{ $statistics['program'] }}">
                    0
                </h3>

                <small>Program kerja yang dibuat</small>
            </div>

        </div>
    </div>

</div>