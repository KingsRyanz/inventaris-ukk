@extends('layouts.tamplate')

@section('content')
<style>
    .page-header {
        background: linear-gradient(135deg, #4f46e5, #3730a3);
        padding: 3rem;
        border-radius: 1.5rem;
        margin-bottom: 2.5rem;
        box-shadow: 0 10px 30px rgba(79, 70, 229, 0.15);
        position: relative;
        overflow: hidden;
    }
    
    .page-header::before {
        content: '';
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        background: url("data:image/svg+xml,%3Csvg width='100' height='100' viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M11 18c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm48 25c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm-43-7c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm63 31c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM34 90c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm56-76c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM12 86c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm28-65c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm23-11c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-6 60c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm29 22c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zM32 63c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm57-13c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-9-21c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM60 91c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM35 41c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM12 60c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2z' fill='%23ffffff' fill-opacity='0.1' fill-rule='evenodd'/%3E%3C/svg%3E");
        opacity: 0.1;
    }

    .card {
        border: none;
        border-radius: 1.5rem;
        box-shadow: 0 4px 25px rgba(0, 0, 0, 0.05);
        transition: transform 0.3s ease;
    }

    .card:hover {
        transform: translateY(-5px);
    }

    .card-header {
        background: transparent;
        border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        padding: 1.5rem 2rem;
    }

    .card-body {
        padding: 2rem;
    }

    .detail-item {
        padding: 1rem;
        margin-bottom: 1rem;
        background: #f8fafc;
        border-radius: 1rem;
        transition: background-color 0.3s ease;
    }

    .detail-item:hover {
        background: #f1f5f9;
    }

    .detail-label {
        color: #64748b;
        font-size: 0.875rem;
        font-weight: 500;
        margin-bottom: 0.25rem;
    }

    .detail-value {
        color: #1e293b;
        font-size: 1.125rem;
        font-weight: 600;
    }

    .table {
        margin-top: 2rem;
    }

    .table thead th {
        background: #f8fafc;
        border: none;
        padding: 1rem;
        font-weight: 600;
        color: #64748b;
    }

    .table tbody td {
        padding: 1rem;
        border-bottom: 1px solid #f1f5f9;
        vertical-align: middle;
    }

    .btn-back {
        padding: 0.75rem 1.5rem;
        font-weight: 500;
        border-radius: 0.75rem;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
    }

    .btn-back:hover {
        transform: translateX(-5px);
    }
</style>

<!-- Page Header -->
<div class="page-header">
    <div class="container">
        <h1 class="display-5 fw-bold mb-2">Detail Perhitungan Depresiasi</h1>
        <p class="fs-5 text-white-50 mb-0">Informasi lengkap perhitungan depresiasi aset</p>
    </div>
</div>

<!-- Detail Depresiasi -->
<div class="container">
    <div class="card">
        <div class="card-header">
            <h4 class="mb-0">Informasi Depresiasi</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="detail-item">
                        <div class="detail-label">Kode Pengadaan</div>
                        <div class="detail-value">{{ $depresiasi->pengadaan->kode_pengadaan }}</div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="detail-item">
                        <div class="detail-label">Nilai Barang</div>
                        <div class="detail-value">Rp {{ number_format($depresiasi->nilai_barang, 0, ',', '.') }}</div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="detail-item">
                        <div class="detail-label">Durasi</div>
                        <div class="detail-value">{{ $depresiasi->durasi }} Bulan</div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="detail-item">
                        <div class="detail-label">Depresiasi per Bulan</div>
                        <div class="detail-value">Rp {{ number_format($depresiasi->depresiasi_per_bulan, 0, ',', '.') }}</div>
                    </div>
                </div>
            </div>

            <!-- Tabel Perhitungan -->
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Bulan ke</th>
                            <th>Depresiasi Bulan</th>
                            <th>Sisa Nilai</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($detailDepresiasi as $detail)
                            <tr>
                                <td>{{ $detail['bulan_ke'] }}</td>
                                <td>Rp {{ number_format($detail['depresiasi_bulan'], 0, ',', '.') }}</td>
                                <td>Rp {{ number_format($detail['sisa_nilai'], 0, ',', '.') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="mt-4 mb-5">
        <a href="{{ route('admin.hitung-depresiasi.index') }}" class="btn btn-primary btn-back">
            <i class="fas fa-arrow-left"></i>
            <span>Kembali ke Daftar</span>
        </a>
    </div>
</div>
@endsection