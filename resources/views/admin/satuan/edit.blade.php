@extends('layouts.tamplate')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">
                <i class="fas fa-edit"></i> Edit Satuan
            </h4>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.satuan.update', $satuan->id_satuan) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="satuan" class="form-label">Nama Satuan</label>
                    <input type="text" class="form-control @error('satuan') is-invalid @enderror" id="satuan" name="satuan" value="{{ old('satuan', $satuan->satuan) }}" required>
                    @error('satuan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('admin.satuan.index') }}" class="btn btn-secondary">
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
