@extends('layouts.tamplate')

@section('content')
<style>
    /* Main Layout */
    .welcome-section {
        background: linear-gradient(135deg, #4f46e5, #3b82f6);
        color: white;
        padding: 2rem;
        border-radius: 1rem;
        margin-bottom: 2rem;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
    }

    .welcome-content {
        max-width: 1200px;
        margin: 0 auto;
    }

    .welcome-text h1 {
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: 0.5rem;
    }

    .welcome-text p {
        font-size: 1.1rem;
        opacity: 0.9;
    }

    .welcome-actions {
        display: flex;
        gap: 1rem;
        margin-top: 1.5rem;
    }

    .action-button {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.75rem 1.5rem;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 0.5rem;
        color: white;
        text-decoration: none;
        transition: all 0.2s;
    }

    .action-button:hover {
        background: rgba(255, 255, 255, 0.2);
        transform: translateY(-2px);
    }

    /* Alerts Section */
    .alerts-container {
        margin-bottom: 2rem;
    }

    .alert-box {
        padding: 1.25rem;
        border-radius: 0.75rem;
        margin-bottom: 1rem;
    }

    .alert-warning {
        background: #fff7ed;
        border-left: 4px solid #f97316;
    }

    .alert-danger {
        background: #fef2f2;
        border-left: 4px solid #ef4444;
    }

    .alert-content {
        display: flex;
        gap: 1rem;
        align-items: flex-start;
    }

    .alert-icon {
        font-size: 1.5rem;
        color: #f97316;
    }

    .alert-danger .alert-icon {
        color: #ef4444;
    }

    .alert-message h3 {
        font-size: 1.1rem;
        font-weight: 600;
        margin-bottom: 0.5rem;
        color: #1f2937;
    }

    .alert-message ul {
        margin: 0;
        padding-left: 1.25rem;
        color: #4b5563;
    }

    /* Stats Cards */
    .stats-container {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
        gap: 1.5rem;
        margin-bottom: 2rem;
    }

    .stat-card {
        background: white;
        padding: 1.5rem;
        border-radius: 1rem;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
    }

    .stat-content {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .stat-label {
        color: #6b7280;
        font-size: 0.875rem;
        margin-bottom: 0.5rem;
    }

    .stat-value {
        font-size: 1.875rem;
        font-weight: 700;
        color: #1f2937;
        margin: 0;
    }

    .stat-icon {
        width: 3rem;
        height: 3rem;
        border-radius: 0.75rem;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.25rem;
        color: white;
    }

    .stat-icon.blue {
        background: #3b82f6;
    }

    .stat-icon.yellow {
        background: #f59e0b;
    }

    .stat-icon.green {
        background: #10b981;
    }

    .stat-icon.purple {
        background: #8b5cf6;
    }

    /* Data Tables */
    .tables-container {
        display: grid;
        gap: 1.5rem;
        margin-bottom: 2rem;
    }

    .data-card {
        background: white;
        border-radius: 1rem;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        overflow: hidden;
    }

    .card-header {
        padding: 1.5rem;
        border-bottom: 1px solid #e5e7eb;
    }

    .card-header h5 {
        font-size: 1.25rem;
        font-weight: 600;
        color: #1f2937;
        margin: 0;
    }

    .search-container {
        margin-top: 1rem;
    }

    .search-input {
        padding: 0.5rem 1rem;
        border: 1px solid #e5e7eb;
        border-radius: 0.5rem;
        width: 100%;
        max-width: 300px;
    }

    .data-table {
        width: 100%;
        border-collapse: collapse;
    }

    .data-table th {
        background: #f9fafb;
        padding: 1rem;
        text-align: left;
        font-weight: 600;
        color: #4b5563;
    }

    .data-table td {
        padding: 1rem;
        border-top: 1px solid #e5e7eb;
        color: #1f2937;
    }

    /* Activity Cards */
    .activity-container {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 1.5rem;
    }

    .activity-card {
        background: white;
        border-radius: 1rem;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        overflow: hidden;
    }

    .activity-item {
        display: flex;
        align-items: center;
        gap: 1rem;
        padding: 1rem;
        border-bottom: 1px solid #e5e7eb;
    }

    .activity-icon {
        width: 2.5rem;
        height: 2.5rem;
        border-radius: 0.5rem;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
    }

    .activity-details {
        flex: 1;
    }

    .item-title {
        font-weight: 600;
        color: #1f2937;
        margin: 0;
    }

    .item-subtitle {
        color: #4b5563;
        margin: 0.25rem 0;
    }

    .item-info {
        font-size: 0.875rem;
        color: #6b7280;
        margin: 0;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .welcome-section {
            padding: 1.5rem;
        }

        .welcome-actions {
            flex-direction: column;
        }

        .stats-container {
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        }

        .activity-container {
            grid-template-columns: 1fr;
        }
    }
</style>

<!-- Welcome Section -->
<div class="welcome-section">
    <div class="welcome-content">
        <div class="welcome-text">
            <h1>Welcome Back</h1>
            <p>Here's what's happening with your inventory today.</p>
        </div>
        <div class="welcome-actions">
            <a href="{{ route('admin.master-barang.index') }}" class="action-button">
                <i class="fas fa-boxes"></i>
                Master Barang
            </a>
            <a href="{{ route('admin.kategori-asset.index') }}" class="action-button">
                <i class="fas fa-tags"></i>
                Kategori Aset
            </a>
        </div>
    </div>
</div>

<!-- Alert Section -->
@if($nearDepreciationItems->count() || $poorConditionItems->count())
<div class="alerts-container">
    @if($nearDepreciationItems->count())
    <div class="alert-box alert-warning">
        <div class="alert-content">
            <div class="alert-icon">
                <i class="fas fa-exclamation-triangle"></i>
            </div>
            <div class="alert-message">
                <h3>Pemberitahuan: Barang Mendekati Depresiasi</h3>
                <ul>
                    @foreach($nearDepreciationItems as $item)
                    <li>{{ $item->pengadaan->masterBarang->nama_barang }}
                        (Depresiasi akan berakhir pada {{ $item->tgl_hitung_depresiasi }})
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    @endif

    @if($poorConditionItems->count())
    <div class="alert-box alert-danger">
        <div class="alert-content">
            <div class="alert-icon">
                <i class="fas fa-exclamation-circle"></i>
            </div>
            <div class="alert-message">
                <h3>Pemberitahuan: Barang dengan Kondisi Buruk</h3>
                <ul>
                    @foreach($poorConditionItems as $item)
                    <li>{{ $item->pengadaan->masterBarang->nama_barang }}
                        (Kondisi: {{ $item->kondisi }})
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    @endif
</div>
@endif

<!-- Stats Cards -->
<div class="stats-container">
    <!-- Total Barang -->
    <div class="stat-card" style="border: 2px solid #4f46e5; transition: transform 0.2s;">
        <div class="stat-content">
            <div>
                <p class="stat-label">Total Barang</p>
                <h3 class="stat-value">{{ $totalBarang }}</h3>
            </div>
            <div class="stat-icon blue">
                <i class="fas fa-box"></i>
            </div>
        </div>
    </div>

    <!-- Total Kategori -->
    <div class="stat-card">
        <div class="stat-content">
            <div>
                <p class="stat-label">Total Kategori</p>
                <h3 class="stat-value">{{ $totalKategori }}</h3>
            </div>
            <div class="stat-icon yellow">
                <i class="fas fa-tags"></i>
            </div>
        </div>
    </div>

    <!-- Total Sub Kategori -->
    <div class="stat-card">
        <div class="stat-content">
            <div>
                <p class="stat-label">Total Sub Kategori</p>
                <h3 class="stat-value">{{ $totalSubKategori }}</h3>
            </div>
            <div class="stat-icon green">
                <i class="fas fa-cogs"></i>
            </div>
        </div>
    </div>

    <!-- Total Distributor -->
    <div class="stat-card">
        <div class="stat-content">
            <div>
                <p class="stat-label">Total Distributor</p>
                <h3 class="stat-value">{{ $totalDistributor }}</h3>
            </div>
            <div class="stat-icon purple">
                <i class="fas fa-truck"></i>
            </div>
        </div>
    </div>
</div>

<!-- Data Tables -->
<div class="tables-container">
    <!-- Total Barang Table -->
    <div class="data-card">
        <div class="card-header">
            <h5>Total Barang</h5>
            <div class="search-container" style="margin-bottom: 1rem;">
                <form action="{{ route('admin.dashboard.index') }}" method="GET" class="search-form">
                    <div class="input-group">
                    </div>
                </form>
            </div>
        </div>
        <div class="card-body">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Kode Barang</th>
                        <th>Kategori</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($masterBarangs as $index => $barang)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $barang->nama_barang }}</td>
                        <td>{{ $barang->kode_barang }}</td>
                        <td>{{ $barang->spesifikasi_teknis }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="tables-container">
        <!-- Total Distributor Table -->
        <div class="data-card">
            <div class="card-header">
                <h5>Total Distributor</h5>
                <div class="search-container" style="margin-bottom: 1rem;">
                    <form action="{{ route('admin.dashboard.index') }}" method="GET" class="search-form">
                    </form>
                </div>
            </div>
            <div class="card-body">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Distributor</th>
                            <th>Alamat</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($distributors as $index => $distributor)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $distributor->nama_distributor }}</td>
                            <td>{{ $distributor->alamat }}</td>
                            <td>{{ $distributor->keterangan }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Recent Activity Cards -->
        <div class="activity-container">
            <!-- Pengadaan Terbaru -->
            <div class="activity-card">
                <div class="card-header">
                    <h5>Pengadaan Terbaru</h5>
                </div>
                <div class="card-body">
                    @foreach($pengadaans as $pengadaan)
                    <div class="activity-item">
                        <div class="activity-icon blue">
                            <i class="fas fa-box"></i>
                        </div>
                        <div class="activity-details">
                            <p class="item-title">{{ $pengadaan->kode_pengadaan }}</p>
                            <p class="item-subtitle">{{ $pengadaan->masterBarang->nama_barang }}</p>
                            <p class="item-info">{{ $pengadaan->tgl_pengadaan }} - {{ $pengadaan->distributor->nama }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Mutasi Lokasi -->
            <div class="activity-card">
                <div class="card-header">
                    <h5>Mutasi Lokasi Terbaru</h5>
                </div>
                <div class="card-body">
                    @foreach($mutasiLokasi as $mutasi)
                    <div class="activity-item">
                        <div class="activity-icon green">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div class="activity-details">
                            <p class="item-title">{{ $mutasi->pengadaan->kode_pengadaan }}</p>
                            <p class="item-subtitle">{{ $mutasi->lokasi->nama_lokasi }}</p>
                            <p class="item-info">Pindah ke: {{ $mutasi->flag_pindah }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Hasil Opname -->
            <div class="activity-card">
                <div class="card-header">
                    <h5>Hasil Opname Terbaru</h5>
                </div>
                <div class="card-body">
                    @foreach($opnames as $opname)
                    <div class="activity-item">
                        <div class="activity-icon purple">
                            <i class="fas fa-clipboard-check"></i>
                        </div>
                        <div class="activity-details">
                            <p class="item-title">{{ $opname->pengadaan->kode_pengadaan }}</p>
                            <p class="item-subtitle">Kondisi: {{ $opname->kondisi }}</p>
                            <p class="item-info">{{ $opname->tgl_opname }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @endsection