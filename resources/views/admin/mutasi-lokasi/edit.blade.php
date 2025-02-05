@extends('layouts.tamplate')

@section('content')
<div class="container">
    <h1>Edit Mutasi Lokasi</h1>
    <form action="{{ route('admin.mutasi-lokasi.update', $mutasiLokasi->id_mutasi_lokasi) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="id_lokasi" class="form-label">Lokasi</label>
            <select class="form-control" id="id_lokasi" name="id_lokasi" required>
                @foreach($lokasi as $lok)
                    <option value="{{ $lok->id_lokasi }}" {{ $mutasiLokasi->id_lokasi == $lok->id_lokasi ? 'selected' : '' }}>
                        {{ $lok->nama_lokasi }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="id_pengadaan" class="form-label">Pengadaan</label>
            <select class="form-control" id="id_pengadaan" name="id_pengadaan" required>
                @foreach($pengadaan as $peng)
                    <option value="{{ $peng->id_pengadaan }}" {{ $mutasiLokasi->id_pengadaan == $peng->id_pengadaan ? 'selected' : '' }}>
                        {{ $peng->kode_pengadaan }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="flag_lokasi" class="form-label">Flag Lokasi</label>
            <input type="text" class="form-control" id="flag_lokasi" name="flag_lokasi" value="{{ $mutasiLokasi->flag_lokasi }}" required>
        </div>
        <div class="mb-3">
            <label for="flag_pindah" class="form-label">Flag Pindah</label>
            <input type="text" class="form-control" id="flag_pindah" name="flag_pindah" value="{{ $mutasiLokasi->flag_pindah }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
