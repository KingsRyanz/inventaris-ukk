@extends('layouts.tamplate')

@section('content')
<div class="container">
    <h1 class="my-4">Tambah Hitung Depresiasi</h1>
    <form action="{{ route('admin.hitung-depresiasi.store') }}" method="POST">
        @csrf
        <!-- Pilih Pengadaan -->
        <div class="mb-3">
            <label for="id_pengadaan" class="form-label">Pengadaan</label>
            <select class="form-control" id="id_pengadaan" name="id_pengadaan" required>
                <option value="">Pilih Pengadaan</option>
                @foreach($pengadaan as $peng)
                    <option value="{{ $peng->id_pengadaan }}">{{ $peng->kode_pengadaan }}</option>
                @endforeach
            </select>
        </div>

        <!-- Tanggal Hitung -->
        <div class="mb-3">
            <label for="tgl_hitung_depresiasi" class="form-label">Tanggal Hitung</label>
            <input type="date" class="form-control" id="tgl_hitung_depresiasi" name="tgl_hitung_depresiasi" required>
        </div>

        <!-- Bulan -->
        <div class="mb-3">
            <label for="bulan" class="form-label">Bulan</label>
            <input type="number" class="form-control" id="bulan" name="bulan" min="1" required>
        </div>

        <!-- Durasi -->
        <div class="mb-3">
            <label for="durasi" class="form-label">Durasi (Bulan)</label>
            <input type="number" class="form-control" id="durasi" name="durasi" min="1" required>
        </div>

        <!-- Nilai Barang -->
        <div class="mb-3">
            <label for="nilai_barang" class="form-label">Nilai Barang</label>
            <input type="number" class="form-control" id="nilai_barang" name="nilai_barang" min="1" required>
        </div>

        <!-- Depresiasi per Bulan -->
        <div class="mb-3">
            <label for="depresiasi_per_bulan" class="form-label">Depresiasi per Bulan</label>
            <input type="text" class="form-control" id="depresiasi_per_bulan" name="depresiasi_per_bulan" readonly>
        </div>

        <!-- Hasil Depresiasi -->
        <div id="hasilDepresiasi"></div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>

<script>
    const nilaiBarangInput = document.getElementById('nilai_barang');
    const durasiInput = document.getElementById('durasi');
    const depresiasiInput = document.getElementById('depresiasi_per_bulan');
    const hasilDepresiasiDiv = document.getElementById('hasilDepresiasi');

    // Tambahkan Event Listener
    nilaiBarangInput.addEventListener('input', calculateDepresiasi);
    durasiInput.addEventListener('input', calculateDepresiasi);

    function calculateDepresiasi() {
        const nilaiBarang = parseFloat(nilaiBarangInput.value) || 0;
        const durasi = parseInt(durasiInput.value) || 0;

        if (nilaiBarang > 0 && durasi > 0) {
            const depresiasiPerBulan = (nilaiBarang / durasi).toFixed(2);
            depresiasiInput.value = depresiasiPerBulan;

            // Perhitungan Depresiasi Setiap Bulan
            let sisaNilaiBarang = nilaiBarang;
            let hasilDepresiasi = `<h5 class="mt-3">Perhitungan Depresiasi</h5><ul>`;
            for (let bulan = 1; bulan <= durasi; bulan++) {
                hasilDepresiasi += `<li>Bulan ${bulan}: Rp ${sisaNilaiBarang.toFixed(2)}</li>`;
                sisaNilaiBarang -= depresiasiPerBulan;
                if (sisaNilaiBarang <= 0) {
                    sisaNilaiBarang = 0;
                    break;
                }
            }
            hasilDepresiasi += `</ul>`;
            hasilDepresiasiDiv.innerHTML = hasilDepresiasi;
        } else {
            depresiasiInput.value = '';
            hasilDepresiasiDiv.innerHTML = '';
        }
    }
</script>
@endsection
