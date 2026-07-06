@extends('layouts.admin')
@section('title', 'Dashboard')
@section('content')
<div class="dashboard-header">
    <div class="dashboard-title">
        <h2>Dashboard</h2>
        <p>
            Halo
            <strong>{{ auth()->user()->nama }}</strong> 👋
            <br>
            Selamat datang di Sistem Informasi Desa Karangduwet.
        </p>
    </div>
    <div class="dashboard-date">
        <i class="bi bi-calendar-event me-2"></i>
        {{ now()->translatedFormat('l, d F Y') }}
    </div>
</div>
<div class="row g-4 mb-4">
    <div class="col-lg-6">
        <div class="stats-card">
            <div class="stats-icon bg-success">
                <i class="bi bi-newspaper"></i>
            </div>
            <div class="stats-content">
                <h6>Total Berita</h6>
                <h2>12</h2>
                <p>Total data berita desa</p>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="stats-card">
            <div class="stats-icon bg-primary">
                <i class="bi bi-bag"></i>
            </div>
            <div class="stats-content">
                <h6>Total Produk</h6>
                <h2>8</h2>
                <p>Total produk desa</p>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="stats-card">
            <div class="stats-icon bg-warning">
                <i class="bi bi-images"></i>
            </div>
            <div class="stats-content">
                <h6>Total Galeri</h6>
                <h2>24</h2>
                <p>Total foto galeri</p>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="stats-card">
            <div class="stats-icon bg-purple">
                <i class="bi bi-tree"></i>
            </div>
            <div class="stats-content">
                <h6>Potensi Desa</h6>
                <h2>10</h2>
                <p>Total potensi desa</p>
            </div>
        </div>
    </div>
</div>
<div class="row g-4">
    <div class="col-lg-8">
        <div class="content-card">
            <div class="content-header">
                <h5>Aktivitas Terbaru</h5>
                <a href="#" class="see-all">
                    Lihat Semua
                </a>
            </div>
            <div class="activity-list">
                <div class="activity-item">
                    <div class="activity-icon bg-success">
                        <i class="bi bi-newspaper"></i>
                    </div>
                    <div class="activity-content">
                        <h6>Berita "Gotong Royong" ditambahkan</h6>
                        <small>2 jam yang lalu</small>
                    </div>
                </div>
                <div class="activity-item">
                    <div class="activity-icon bg-primary">
                        <i class="bi bi-bag"></i>
                    </div>
                    <div class="activity-content">
                        <h6>Produk "Keripik Pisang" diperbarui</h6>
                        <small>Kemarin</small>
                    </div>
                </div>
                <div class="activity-item">
                    <div class="activity-icon bg-warning">
                        <i class="bi bi-images"></i>
                    </div>
                    <div class="activity-content">
                        <h6>Galeri berhasil ditambahkan</h6>
                        <small>3 hari yang lalu</small>
                    </div>
                </div>
                <div class="activity-item">
                    <div class="activity-icon bg-purple">
                        <i class="bi bi-tree"></i>
                    </div>
                    <div class="activity-content">
                        <h6>Potensi Desa diperbarui</h6>
                        <small>1 minggu yang lalu</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="content-card">
            <div class="content-header">
                <h5>Statistik Bulanan</h5>
            </div>
            <canvas id="dashboardChart"></canvas>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const ctx = document.getElementById('dashboardChart');
new Chart(ctx,{
    type:'bar',
    data:{
        labels:['Jan','Feb','Mar','Apr','Mei','Jun'],
        datasets:[{
            label:'Jumlah Konten',
            data:[8,12,15,10,18,22],
            borderRadius:8,
            backgroundColor:[
                '#198754',
                '#198754',
                '#198754',
                '#198754',
                '#198754',
                '#198754'
            ]
        }]
    },

    options:{
        responsive:true,
        maintainAspectRatio:false,
        plugins:{
            legend:{
                display:false
            }
        },
        scales:{
            x:{

                grid:{
                    display:false
                }
            },
            y:{

                beginAtZero:true,

                ticks:{
                    stepSize:5
                },
                grid:{
                   color:'#eef2f5'
                }
            }
        }
    }
});

</script>

@endpush