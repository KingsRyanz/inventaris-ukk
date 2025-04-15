@extends('layouts.tamplate')

@section('content')
<div class="container">
    <h2>Tambah Opname</h2>
    <form action="{{ route('admin.opname.store') }}" method="POST">
        @csrf

        <!-- Pengadaan -->
        <div class="mb-3">
            <label for="id_pengadaan" class="form-label">Pengadaan</label>
            <select name="id_pengadaan" id="id_pengadaan" class="form-select">
                <option value="">Pilih Pengadaan</option>
                @foreach($pengadaan as $peng)
                    <option value="{{ $peng->id_pengadaan }}">{{ $peng->kode_pengadaan }}</option>
                @endforeach
            </select>
            @error('id_pengadaan')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Tanggal Opname -->
        <div class="mb-3">
            <label for="tgl_opname" class="form-label">Tanggal Opname</label>
            <input type="date" name="tgl_opname" id="tgl_opname" class="form-control">
            @error('tgl_opname')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Jumlah Rusak -->
        <div class="mb-3">
            <label for="jumlah_barang_rusak" class="form-label">Jumlah Rusak</label>
            <input type="number" name="jumlah_barang_rusak" id="jumlah_barang_rusak" class="form-control" min="0">
            @error('jumlah_barang_rusak')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Status Barang -->
        <div class="mb-3">
            <label class="form-label">Status Barang</label>
            <div>
                <div class="form-check">
                    <input type="radio" name="status_barang" id="status_baik" value="baik" class="form-check-input" onclick="toggleKeterangan()">
                    <label for="status_baik" class="form-check-label">Baik</label>
                </div>
                <div class="form-check">
                    <input type="radio" name="status_barang" id="status_rusak" value="rusak" class="form-check-input" onclick="toggleKeterangan()">
                    <label for="status_rusak" class="form-check-label">Rusak</label>
                </div>
                <div class="form-check">
                    <input type="radio" name="status_barang" id="status_hilang" value="hilang" class="form-check-input" onclick="toggleKeterangan()">
                    <label for="status_hilang" class="form-check-label">Hilang</label>
                </div>
                <div class="form-check">
                    <input type="radio" name="status_barang" id="status_perbaikan" value="perbaikan" class="form-check-input" onclick="toggleKeterangan()">
                    <label for="status_perbaikan" class="form-check-label">Perbaikan</label>
                </div>
            </div>
            @error('status_barang')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Keterangan (disembunyikan jika status adalah 'baik') -->
        <div class="mb-3" id="keteranganContainer" style="display: none;">
            <label for="keterangan" class="form-label">Keterangan</label>
            <textarea name="keterangan" id="keterangan" class="form-control"></textarea>
            @error('keterangan')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Tombol Simpan -->
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>

<script>
    // Fungsi untuk menampilkan atau menyembunyikan input keterangan
    function toggleKeterangan() {
        const statusBaik = document.getElementById('status_baik').checked;
        const keteranganContainer = document.getElementById('keteranganContainer');
        if (statusBaik) {
            keteranganContainer.style.display = 'none';
        } else {
            keteranganContainer.style.display = 'block';
        }
    }

    // Panggil fungsi untuk memeriksa apakah status awalnya "Baik"
    window.onload = toggleKeterangan;
</script>
@endsection
