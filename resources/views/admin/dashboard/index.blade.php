@extends('layouts.tamplate')

@section('content')

<style>
    /* Core Layout & Variables */
    :root {
        --primary-gradient: linear-gradient(135deg, #4f46e5 0%, #3b82f6 100%);
        --shadow-sm: 0 1px 3px rgba(0, 0, 0, 0.1);
        --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.12);
        --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.15);
        --border-radius: 1rem;
    }

    /* Welcome Section Enhancements */
    .welcome-section {
        background: var(--primary-gradient);
        color: white;
        padding: 3rem 2rem;
        border-radius: var(--border-radius);
        margin-bottom: 2.5rem;
        position: relative;
        overflow: hidden;
    }

    .welcome-section::before {
        content: '';
        position: absolute;
        top: 0;
        right: 0;
        width: 300px;
        height: 300px;
        background: url("data:image/svg+xml,%3Csvg width='100' height='100' viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M11 18c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm48 25c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm-43-7c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm63 31c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM34 90c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm56-76c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM12 86c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm28-65c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm23-11c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-6 60c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4z' fill='%23ffffff' fill-opacity='0.1'/%3E%3C/svg%3E") repeat;
        opacity: 0.2;
        animation: movePattern 20s linear infinite;
    }

    @keyframes movePattern {
        0% {
            transform: translateX(0) translateY(0);
        }

        100% {
            transform: translateX(-100px) translateY(-100px);
        }
    }

    .welcome-content {
        max-width: 1200px;
        margin: 0 auto;
        position: relative;
        z-index: 1;
    }

    .welcome-text h1 {
        font-size: 2.75rem;
        font-weight: 800;
        margin-bottom: 0.75rem;
        text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .welcome-text p {
        font-size: 1.25rem;
        opacity: 0.9;
        max-width: 600px;
    }

    .welcome-actions {
        display: flex;
        gap: 1rem;
        margin-top: 2rem;
    }

    .action-button {
        display: inline-flex;
        align-items: center;
        gap: 0.75rem;
        padding: 1rem 1.75rem;
        background: rgba(255, 255, 255, 0.15);
        border-radius: 0.75rem;
        color: white;
        text-decoration: none;
        transition: all 0.3s ease;
        backdrop-filter: blur(10px);
    }

    .action-button:hover {
        background: rgba(255, 255, 255, 0.25);
        transform: translateY(-3px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    /* Enhanced Alert Styles */
    .alerts-container {
        margin-bottom: 2.5rem;
    }

    .alert-box {
        padding: 1.5rem;
        border-radius: var(--border-radius);
        margin-bottom: 1.25rem;
        transition: transform 0.3s ease;
    }

    .alert-box:hover {
        transform: translateX(5px);
    }

    .alert-warning {
        background: linear-gradient(to right, #fff7ed, #ffedd5);
        border-left: 4px solid #f97316;
    }

    .alert-danger {
        background: linear-gradient(to right, #fef2f2, #fee2e2);
        border-left: 4px solid #ef4444;
    }

    /* Enhanced Stats Cards */
    .stats-container {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 1.5rem;
        margin-bottom: 2.5rem;
    }

    .stat-card {
        background: white;
        padding: 2rem;
        border-radius: var(--border-radius);
        box-shadow: var(--shadow-sm);
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: var(--shadow-lg);
    }

    .stat-card::after {
        content: '';
        position: absolute;
        top: 0;
        right: 0;
        width: 100px;
        height: 100px;
        background: var(--primary-gradient);
        opacity: 0.1;
        border-radius: 50%;
        transform: translate(50%, -50%);
        transition: all 0.3s ease;
    }

    .stat-card:hover::after {
        transform: translate(30%, -30%) scale(1.2);
    }

    .stat-content {
        position: relative;
        z-index: 1;
    }

    .stat-value {
        font-size: 2.5rem;
        font-weight: 700;
        color: #1f2937;
        margin-bottom: 0.5rem;
    }

    .stat-label {
        color: #6b7280;
        font-size: 1rem;
        font-weight: 500;
    }

    /* Enhanced Table Styles */
    .data-card {
        background: white;
        border-radius: var(--border-radius);
        box-shadow: var(--shadow-md);
        overflow: hidden;
        margin-bottom: 2rem;
    }

    .card-header {
        padding: 1.5rem 2rem;
        background: #f8fafc;
        border-bottom: 1px solid #e5e7eb;
    }

    .card-header h5 {
        font-size: 1.25rem;
        font-weight: 600;
        color: #1f2937;
        margin: 0;
    }

    .data-table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0;
    }

    .data-table th {
        background: #f9fafb;
        padding: 1.25rem 1.5rem;
        font-weight: 600;
        color: #4b5563;
        text-transform: uppercase;
        font-size: 0.875rem;
        letter-spacing: 0.05em;
    }

    .data-table td {
        padding: 1.25rem 1.5rem;
        border-top: 1px solid #e5e7eb;
        color: #1f2937;
    }

    .data-table tbody tr {
        transition: all 0.2s ease;
    }

    .data-table tbody tr:hover {
        background: #f8fafc;
    }

    /* Enhanced Activity Cards */
    .activity-container {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
        gap: 2rem;
        margin-top: 2.5rem;
    }

    .activity-card {
        background: white;
        border-radius: var(--border-radius);
        box-shadow: var(--shadow-md);
        overflow: hidden;
    }

    .activity-item {
        display: flex;
        align-items: center;
        gap: 1.25rem;
        padding: 1.5rem;
        border-bottom: 1px solid #e5e7eb;
        transition: all 0.2s ease;
    }

    .activity-item:hover {
        background: #f8fafc;
        transform: translateX(5px);
    }

    .activity-icon {
        width: 3rem;
        height: 3rem;
        border-radius: 0.75rem;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.25rem;
        box-shadow: var(--shadow-sm);
    }

    .item-title {
        font-weight: 600;
        color: #1f2937;
        margin: 0;
    }

    .item-subtitle {
        color: #4b5563;
        margin: 0.25rem 0;
        font-size: 0.95rem;
    }

    .item-info {
        font-size: 0.875rem;
        color: #6b7280;
        margin: 0;
    }

    /* Custom Color Classes */
    .blue {
        background: linear-gradient(135deg, #3b82f6, #2563eb);
    }

    .yellow {
        background: linear-gradient(135deg, #f59e0b, #d97706);
    }

    .green {
        background: linear-gradient(135deg, #10b981, #059669);
    }

    .purple {
        background: linear-gradient(135deg, #8b5cf6, #7c3aed);
    }

    /* Responsive Adjustments */
    @media (max-width: 768px) {
        .welcome-section {
            padding: 2rem 1.5rem;
        }

        .welcome-text h1 {
            font-size: 2rem;
        }

        .welcome-actions {
            flex-direction: column;
        }

        .stats-container {
            grid-template-columns: 1fr;
        }

        .activity-container {
            grid-template-columns: 1fr;
        }

        .data-table {
            display: block;
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }
    }

    .alerts-container {
    margin-top: 20px;
}

.alert-box {
    padding: 15px;
    border-radius: 5px;
    margin-bottom: 20px;
}

.alert-icon {
    font-size: 24px;
    margin-right: 10px;
}

.alert-message {
    display: inline-block;
    font-size: 16px;
}

.alert-message ul {
    list-style-type: none;
    padding-left: 0;
}

.alert-message li {
    margin-bottom: 10px;
}

.alert-success {
    background-color: #d4edda;
    border-color: #c3e6cb;
    color: #155724;
}

.alert-icon {
    font-size: 24px;
    margin-right: 10px;
}

.alert-message {
    display: inline-block;
    font-size: 16px;
}

.alert-message ul {
    list-style-type: none;
    padding-left: 0;
}

.alert-message li {
    margin-bottom: 10px;
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

<!-- Kondisi Baik -->
<div class="stat-card">
    <div class="stat-content">
        <div>
            <p class="stat-label">Barang Kondisi Baik</p>
            <h3 class="stat-value">{{ $totalGoodConditionItems }}</h3>
        </div>
        <div class="stat-icon green">
            <i class="fas fa-check-circle"></i>
        </div>
    </div>
</div>

<!-- Barang Bermasalah -->
<div class="stat-card">
    <div class="stat-content">
        <div>
            <p class="stat-label">Barang Bermasalah</p>
            <h3 class="stat-value">{{ $totalProblematicItems }}</h3>
        </div>
        <div class="stat-icon red">
            <i class="fas fa-times-circle"></i>
        </div>
    </div>
</div>

<!-- Barang dengan Status Baik -->
@if($goodConditionItems->count())
    <div class="alerts-container">
        <div class="alert-box alert-success">
            <div class="alert-content">
                <div class="alert-icon">
                    <i class="fas fa-check-circle"></i>
                </div>
                <div class="alert-message">
                    <h3>Barang dalam Kondisi Baik</h3>
                    <ul>
                        @foreach($goodConditionItems as $item)
                            <li>
                                {{ $item->pengadaan->masterBarang->nama_barang }} - Status: {{ $item->status_barang }}
                                <br>
                                Keterangan: {{ $item->keterangan ?? 'Tidak ada keterangan' }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endif


<!-- Barang dengan Masalah -->
@if($problematicItems->count())
    <div class="alerts-container">
        <div class="alert-box alert-danger">
            <div class="alert-content">
                <div class="alert-icon">
                    <i class="fas fa-exclamation-circle"></i>
                </div>
                <div class="alert-message">
                    <h3>Pemberitahuan: Barang dengan Masalah</h3>
                    <ul>
                        @foreach($problematicItems as $item)
                            <li>
                                {{ $item->pengadaan->masterBarang->nama_barang }} - Status: {{ $item->status_barang }}
                                <br>
                                Keterangan: {{ $item->keterangan ?? 'Tidak ada keterangan' }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endif



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
                            <p class="item-subtitle">status_barang: {{ $opname->status_barang }}</p>
                            <p class="item-info">{{ $opname->tgl_opname }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @endsection