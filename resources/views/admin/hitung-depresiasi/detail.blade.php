@extends('layouts.tamplate')

@section('content')
<style>
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
    }
</style>

<!-- Page Header -->
<div class="page-header">
    <h1 class="h2 mb-1">Detail Perhitungan Depresiasi</h1>
    <p class="mb-0 text-white-50">Perhitungan depresiasi untuk aset.</p>
</div>

<!-- Detail Depresiasi -->
<div class="card">
    <div class="card-header">
        <h4>Detail Depresiasi</h4>
    </div>
    <div class="card-body">
        <p><strong>Kode Pengadaan:</strong> {{ $depresiasi->pengadaan->kode_pengadaan }}</p>
        <p><strong>Nilai Barang:</strong> {{ number_format($depresiasi->nilai_barang, 0, ',', '.') }}</p>
        <p><strong>Durasi (Bulan):</strong> {{ $depresiasi->durasi }}</p>
        <p><strong>Depresiasi per Bulan:</strong> {{ number_format($depresiasi->depresiasi_per_bulan, 0, ',', '.') }}</p>

        <!-- Tabel Perhitungan -->
        <div class="table-responsive">
            <table class="table table-striped">
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
                            <td>{{ number_format($detail['depresiasi_bulan'], 0, ',', '.') }}</td>
                            <td>{{ number_format($detail['sisa_nilai'], 0, ',', '.') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="mt-4">
    <a href="{{ route('admin.hitung-depresiasi.index') }}" class="btn btn-primary">
        <i class="fas fa-arrow-left"></i> Kembali ke Daftar
    </a>
</div>
@endsection
