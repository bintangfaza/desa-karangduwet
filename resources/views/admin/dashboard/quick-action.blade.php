<div class="dashboard-card">
    <div class="dashboard-card-header">
        <h5>
            <i class="bi bi-lightning-charge text-success me-2"></i>
            Quick Action
        </h5>
    </div>

    <div class="quick-action-list">
        <a href="{{ route('berita.create') }}" class="quick-action-item">
            <div class="quick-action-icon bg-success-subtle text-success">
                <i class="bi bi-newspaper"></i>
            </div>
            <div class="quick-action-content">
                <h6>Tambah Berita</h6>
                <p>Buat artikel berita baru</p>
            </div>
            <i class="bi bi-chevron-right quick-arrow"></i>
        </a>

        <a href="{{ route('produk-desa.create') }}" class="quick-action-item">
            <div class="quick-action-icon bg-primary-subtle text-primary">
                <i class="bi bi-bag"></i>
            </div>

            <div class="quick-action-content">
                <h6>Tambah Produk</h6>
                <p>Tambah produk UMKM desa</p>
            </div>
            <i class="bi bi-chevron-right quick-arrow"></i>
        </a>

        <a href="{{ route('album-galeri.create') }}" class="quick-action-item">
            <div class="quick-action-icon bg-info-subtle text-info">
                <i class="bi bi-images"></i>
            </div>

            <div class="quick-action-content">
                <h6>Tambah Galeri</h6>
                <p>Upload album dokumentasi</p>
            </div>
            <i class="bi bi-chevron-right quick-arrow"></i>
        </a>

        <a href="{{ route('potensi-desa.create') }}" class="quick-action-item">
            <div class="quick-action-icon bg-warning-subtle text-warning">
                <i class="bi bi-tree"></i>
            </div>

            <div class="quick-action-content">
                <h6>Tambah Potensi</h6>
                <p>Tambah potensi desa</p>
            </div>
            <i class="bi bi-chevron-right quick-arrow"></i>
        </a>

        <a href="{{ route('anggota-kkn.create') }}" class="quick-action-item">
            <div class="quick-action-icon bg-secondary-subtle text-secondary">
                <i class="bi bi-people"></i>
            </div>

            <div class="quick-action-content">
                <h6>Tambah Anggota</h6>
                <p>Tambah anggota KKN</p>
            </div>
            <i class="bi bi-chevron-right quick-arrow"></i>
        </a>
    </div>
</div>