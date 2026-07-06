<div class="dashboard-card">
    <div class="dashboard-card-header">
        <div class="dashboard-card-header">
            <h5>
                <i class="bi bi-pie-chart-fill text-success"></i>
                Statistik Website
            </h5>
            <p>
                Distribusi seluruh data website yang telah dikelola.
            </p>
        </div>

        <div class="chart-wrapper">
            <div class="chart-canvas">
                <canvas
                    id="dashboardChart"
                    data-chart='@json($chart["data"])'
                    data-labels='@json($chart["labels"])'>
                </canvas>

                <div class="chart-center">
                    
                    <h2
                        class="counter"
                        data-value="{{ array_sum($chart['data']) }}">
                        0
                    </h2>
                    <span>Total Data</span>
                </div>
            </div>

            <div class="chart-legend">
                <div class="legend-item">
                    <span class="legend-color bg-success"></span>
                    <span>Berita</span>
                    <strong>{{ $statistics['berita'] }}</strong>
                </div>

                <div class="legend-item">
                    <span class="legend-color bg-primary"></span>
                    <span>Produk</span>
                    <strong>{{ $statistics['produk'] }}</strong>
                </div>

                <div class="legend-item">
                    <span class="legend-color bg-info"></span>
                    <span>Album</span>
                    <strong>{{ $statistics['album'] }}</strong>
                </div>

                <div class="legend-item">
                    <span class="legend-color bg-warning"></span>
                    <span>Potensi</span>
                    <strong>{{ $statistics['potensi'] }}</strong>
                </div>

                <div class="legend-item">
                    <span class="legend-color bg-secondary"></span>
                    <span>Anggota</span>
                    <strong>{{ $statistics['anggota'] }}</strong>
                </div>

                <div class="legend-item">
                    <span class="legend-color bg-danger"></span>
                    <span>Program</span>
                    <strong>{{ $statistics['program'] }}</strong>
                </div>
            </div>
        </div>
    </div>