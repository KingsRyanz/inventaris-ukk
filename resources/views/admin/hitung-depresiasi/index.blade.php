@extends('layouts.tamplate')

@section('content')
<style>
    /* Custom Styles */
    .page-header {
        background: linear-gradient(135deg, #4f46e5, #3730a3);
        padding: 2.5rem 2rem;
        border-radius: 1rem;
        margin-bottom: 2rem;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        color: white;
    }

    .card {
        border: none;
        border-radius: 1rem;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
        transition: transform 0.2s ease;
    }

    .card:hover {
        transform: translateY(-2px);
    }

    .table th {
        background: #f8fafc;
        color: #1e293b;
        font-weight: 600;
        text-transform: uppercase;
        font-size: 0.875rem;
        letter-spacing: 0.05em;
    }

    .table td {
        vertical-align: middle;
    }

    .btn-primary,
    .btn-light,
    .btn-warning,
    .btn-danger,
    .btn-info {
        border-radius: 0.5rem;
        transition: all 0.3s ease;
    }

    .btn-primary:hover,
    .btn-light:hover,
    .btn-warning:hover,
    .btn-danger:hover,
    .btn-info:hover {
        transform: translateY(-2px);
    }

    .alert-success {
        background: linear-gradient(135deg, #10b981, #059669);
        color: white;
    }

    .empty-state {
        padding: 3rem;
        text-align: center;
        color: #64748b;
    }
</style>

<!-- Menu Toggle Button -->
<button class="btn btn-primary d-md-none menu-toggle">
    <i class="fas fa-bars"></i>
</button>

<!-- Page Header -->
<div class="page-header">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h1 class="h2 mb-1">Data Hitung Depresiasi</h1>
            <p class="mb-0 text-white-50">Mengelola perhitungan depresiasi aset perusahaan.</p>
        </div>
        <a href="{{ route('admin.hitung-depresiasi.create') }}" class="btn btn-light">
            <i class="fas fa-plus-circle me-2"></i>Tambah Depresiasi
        </a>
    </div>
</div>

<!-- Success Notification -->
@if(session('success'))
<div class="alert alert-success d-flex align-items-center">
    <i class="fas fa-check-circle me-2"></i>
    {{ session('success') }}
</div>
@endif

<!-- Main Card -->
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h4 class="mb-0">
            <i class="fas fa-chart-line me-2 text-primary"></i>
            Daftar Hitung Depresiasi
        </h4>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Kode Pengadaan</th>
                        <th>Tanggal Hitung</th>
                        <th>Bulan</th>
                        <th>Durasi</th>
                        <th>Nilai Barang (Awal)</th>
                        <th>Depresiasi per Bulan</th>
                        <th>Nilai Barang (Setelah Depresiasi)</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($hitungDepresiasi as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->pengadaan->kode_pengadaan }}</td>
                        <td>{{ $item->tgl_hitung_depresiasi }}</td>
                        <td>{{ $item->bulan }}</td>
                        <td>{{ $item->durasi }}</td>
                        <td>{{ number_format($item->nilai_barang, 0, ',', '.') }}</td>
                        <td>{{ number_format($item->depresiasi_per_bulan, 0, ',', '.') }}</td>
                        <td>{{ number_format($item->nilai_barang_manual, 0, ',', '.') }}</td>
                        <td class="text-center">
                            <a href="{{ route('admin.hitung-depresiasi.detail', $item->id_hitung_depresiasi) }}" class="btn btn-info btn-sm">
                                <i class="fas fa-info-circle"></i> Detail
                            </a>
                            <a href="{{ route('admin.hitung-depresiasi.edit', $item->id_hitung_depresiasi) }}" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <form action="{{ route('admin.hitung-depresiasi.destroy', $item->id_hitung_depresiasi) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">
                                    <i class="fas fa-trash-alt"></i> Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="9" class="empty-state">
                            <i class="fas fa-box-open fa-2x mb-3"></i>
                            <p>Data depresiasi belum tersedia.</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
    