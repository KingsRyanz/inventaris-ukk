@extends('layouts.tamplate')

@section('content')
<div class="container">
    <h1>Edit Hitung Depresiasi</h1>
    <form action="{{ route('admin.hitung-depresiasi.update', $hitungDepresiasi->id_hitung_depresiasi) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="id_pengadaan" class="form-label">Pengadaan</label>
            <select class="form-control" id="id_pengadaan" name="id_pengadaan" required>
                @foreach($pengadaan as $peng)
                    <option value="{{ $peng->id_pengadaan }}" {{ $hitungDepresiasi->id_pengadaan == $peng->id_pengadaan ? 'selected' : '' }}>
                        {{ $peng->kode_pengadaan }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="tgl_hitung_depresiasi" class="form-label">Tanggal Hitung</label>
            <input type="date" class="form-control" id="tgl_hitung_depresiasi" name="tgl_hitung_depresiasi" value="{{ $hitungDepresiasi->tgl_hitung_depresiasi }}" required>
        </div>
        <div class="mb-3">
            <label for="bulan" class="form-label">Bulan</label>
            <input type="text" class="form-control" id="bulan" name="bulan" value="{{ $hitungDepresiasi->bulan }}" required>
        </div>
        <div class="mb-3">
            <label for="durasi" class="form-label">Durasi (Bulan)</label>
            <input type="number" class="form-control" id="durasi" name="durasi" value="{{ $hitungDepresiasi->durasi }}" required>
        </div>
        <div class="mb-3">
            <label for="nilai_barang" class="form-label">Nilai Barang</label>
            <input type="number" class="form-control" id="nilai_barang" name="nilai_barang" value="{{ $hitungDepresiasi->nilai_barang }}" required>
        </div>
        <div class="mb-3">
            <label for="depresiasi_per_bulan" class="form-label">Depresiasi per Bulan</label>
            <input type="text" class="form-control" id="depresiasi_per_bulan" name="depresiasi_per_bulan" value="{{ number_format($hitungDepresiasi->nilai_barang / $hitungDepresiasi->durasi, 2) }}" readonly>
        </div>
        <div class="mb-3">
            <label for="summary" class="form-label">Rincian Depresiasi per Bulan</label>
            <textarea class="form-control" id="summary" rows="5" readonly></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>

<script>
    const nilaiBarangInput = document.getElementById('nilai_barang');
    const durasiInput = document.getElementById('durasi');
    const depresiasiInput = document.getElementById('depresiasi_per_bulan');
    const summaryInput = document.getElementById('summary');

    function calculateDepresiasi() {
        const nilaiBarang = parseFloat(nilaiBarangInput.value) || 0;
        const durasi = parseInt(durasiInput.value) || 0;

        if (durasi > 0) {
            const depresiasiPerBulan = nilaiBarang / durasi;
            depresiasiInput.value = depresiasiPerBulan.toFixed(2);

            // Generate monthly depreciation summary
            let currentValue = nilaiBarang;
            let summary = '';
            for (let i = 1; i <= durasi; i++) {
                summary += `Bulan ${i}: ${currentValue.toFixed(2)}\n`;
                currentValue -= depresiasiPerBulan;
                if (currentValue < 0) currentValue = 0; // Avoid negative values
            }
            summaryInput.value = summary;
        } else {
            depresiasiInput.value = '';
            summaryInput.value = '';
        }
    }

    nilaiBarangInput.addEventListener('input', calculateDepresiasi);
    durasiInput.addEventListener('input', calculateDepresiasi);

    // Initial calculation on page load
    calculateDepresiasi();
</script>
@endsection
