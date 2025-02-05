@extends('layouts.tamplate')

@section('content')
<div class="container">
    <h1>Tambah Mutasi Lokasi</h1>
    <form action="{{ route('admin.mutasi-lokasi.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="id_lokasi" class="form-label">Lokasi</label>
            <select class="form-control" id="id_lokasi" name="id_lokasi" required>
                <option value="">Pilih Lokasi</option>
                @foreach($lokasi as $lok)
                    <option value="{{ $lok->id_lokasi }}">{{ $lok->nama_lokasi }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="id_pengadaan" class="form-label">Pengadaan</label>
            <select class="form-control" id="id_pengadaan" name="id_pengadaan" required>
                <option value="">Pilih Pengadaan</option>
                @foreach($pengadaan as $peng)
                    <option value="{{ $peng->id_pengadaan }}">{{ $peng->kode_pengadaan }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="flag_lokasi" class="form-label">Flag Lokasi</label>
            <input type="text" class="form-control" id="flag_lokasi" name="flag_lokasi" required>
        </div>
        <div class="mb-3">
            <label for="flag_pindah" class="form-label">Flag Pindah</label>
            <input type="text" class="form-control" id="flag_pindah" name="flag_pindah" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
