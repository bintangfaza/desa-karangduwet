<div class="dashboard-card">
    <div class="dashboard-card-header">
        <div>
            <h5>
                <i class="bi bi-clock-history text-success me-2"></i>
                Aktivitas Terbaru
            </h5>
        </div>
        <a href="#" class="btn-view-all">
            Lihat Semua
        </a>
    </div>
    <div class="activity-modern">
        @forelse($aktivitas as $item)
        <div class="activity-modern-item">
            <div class="activity-modern-icon bg-{{ $item['color'] }}">
                <i class="bi {{ $item['icon'] }}"></i>
            </div>
            <div class="activity-modern-content">
                <h6>
                    {{ $item['judul'] }}
                </h6>
                <p>
                    {{ $item['tipe'] }}
                </p>
            </div>
            <div class="activity-modern-time">
                {{ $item['tanggal']->diffForHumans() }}
            </div>
        </div>
        @empty
        <div class="activity-empty">
            <i class="bi bi-clock-history"></i>
            <h6>Belum Ada Aktivitas</h6>
            <p>
                Aktivitas terbaru akan muncul di sini.
            </p>
        </div>
        @endforelse
    </div>
</div>