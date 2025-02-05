@extends('layouts.tamplate')

@section('content')
<div class="container-fluid">
    <div class="card shadow-lg border-light mt-4">
        <div class="card-header bg-gradient text-dark">
            <h4><i class="fas fa-edit"></i> Edit Lokasi</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.lokasi.update', $lokasi->id_lokasi) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="form-group mb-3">
                    <label for="kode_lokasi" class="form-label">Kode Lokasi</label>
                    <input type="text" name="kode_lokasi" id="kode_lokasi" 
                           class="form-control @error('kode_lokasi') is-invalid @enderror"
                           value="{{ old('kode_lokasi', $lokasi->kode_lokasi) }}" required>
                    @error('kode_lokasi')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="nama_lokasi" class="form-label">Nama Lokasi</label>
                    <input type="text" name="nama_lokasi" id="nama_lokasi" 
                           class="form-control @error('nama_lokasi') is-invalid @enderror"
                           value="{{ old('nama_lokasi', $lokasi->nama_lokasi) }}" required>
                    @error('nama_lokasi')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group mb-4">
                    <label for="keterangan" class="form-label">Keterangan</label>
                    <textarea name="keterangan" id="keterangan" 
                              class="form-control @error('keterangan') is-invalid @enderror"
                              rows="4">{{ old('keterangan', $lokasi->keterangan) }}</textarea>
                    @error('keterangan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('admin.lokasi.index') }}" class="btn btn-outline-dark rounded-pill px-4 py-2">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                    <button type="submit" class="btn btn-primary rounded-pill px-4 py-2">
                        <i class="fas fa-save"></i> Update
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
