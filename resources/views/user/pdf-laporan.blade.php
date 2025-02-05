<!DOCTYPE html>
<html>
<head>
    <title>Laporan Depresiasi Aset</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        .header { text-align: center; margin-bottom: 20px; }
        .summary { margin-bottom: 20px; }
    </style>
</head>
<body>
    <div class="header">
        <h1>Laporan Depresiasi Aset</h1>
        <p>Tanggal Cetak: {{ date('d F Y') }}</p>
    </div>

    <div class="summary">
        <h3>Ringkasan</h3>
        <p>Total Aset: Rp {{ number_format($totalAset, 0, ',', '.') }}</p>
        <p>Total Depresiasi: Rp {{ number_format($totalDepresiasi, 0, ',', '.') }}</p>
        <p>Rata-rata Depresiasi/Bulan: Rp {{ number_format($rataDepresiasi, 0, ',', '.') }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Pengadaan</th>
                <th>Tanggal Hitung</th>
                <th>Bulan</th>
                <th>Durasi</th>
                <th>Nilai Barang</th>
                <th>Depresiasi/Bulan</th>
            </tr>
        </thead>
        <tbody>
            @foreach($hasilDepresiasi as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->pengadaan->kode_pengadaan }}</td>
                <td>{{ $item->tgl_hitung_depresiasi }}</td>
                <td>{{ $item->bulan }}</td>
                <td>{{ $item->durasi }}</td>
                <td>Rp {{ number_format($item->nilai_barang, 0, ',', '.') }}</td>
                <td>Rp {{ number_format($item->depresiasi_per_bulan, 0, ',', '.') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>