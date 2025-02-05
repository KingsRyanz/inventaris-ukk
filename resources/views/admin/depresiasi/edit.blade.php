@extends('layouts.tamplate')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">
                <i class="fas fa-edit"></i> Edit Depresiasi
            </h4>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.depresiasi.update', $depresiasi->id_depresiasi) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="lama_depresiasi" class="form-label">Lama Depresiasi</label>
                    <input type="number" class="form-control @error('lama_depresiasi') is-invalid @enderror" id="lama_depresiasi" name="lama_depresiasi" value="{{ old('lama_depresiasi', $depresiasi->lama_depresiasi) }}" required>
                    @error('lama_depresiasi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="keterangan" class="form-label">Keterangan</label>
                    <input type="text" class="form-control @error('keterangan') is-invalid @enderror" id="keterangan" name="keterangan" value="{{ old('keterangan', $depresiasi->keterangan) }}">
                    @error('keterangan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="d-flex justify-content-between">
                    <a href="{{ route('admin.depresiasi.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
