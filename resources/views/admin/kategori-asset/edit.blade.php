@extends('layouts.tamplate')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Kategori Aset</h1>
    </div>

    <!-- Form Edit Kategori Aset -->
    <div class="card shadow-lg border-0">
        <div class="card-header bg-gradient-primary text-dark d-flex align-items-center">
            <h4 class="mb-0"><i class="fas fa-edit me-2"></i>Form Edit Kategori Aset</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.kategori-asset.update', $kategoriAsset->id_kategori_asset) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Kode Kategori Aset -->
                <div class="mb-3">
                    <label for="kode_kategori_asset" class="form-label">Kode Kategori Aset</label>
                    <input type="text" name="kode_kategori_asset" id="kode_kategori_asset" class="form-control @error('kode_kategori_asset') is-invalid @enderror" value="{{ old('kode_kategori_asset', $kategoriAsset->kode_kategori_asset) }}" required placeholder="Masukkan kode kategori aset">
                    @error('kode_kategori_asset')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Nama Kategori Aset -->
                <div class="mb-3">
                    <label for="kategori_asset" class="form-label">Kategori Aset</label>
                    <input type="text" name="kategori_asset" id="kategori_asset" class="form-control @error('kategori_asset') is-invalid @enderror" value="{{ old('kategori_asset', $kategoriAsset->kategori_asset) }}" required placeholder="Masukkan nama kategori aset">
                    @error('kategori_asset')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Tombol Aksi -->
                <div class="d-flex justify-content-between mt-4">
                    <a href="{{ route('admin.kategori-asset.index') }}" class="btn btn-outline-secondary">
                        <i class="fas fa-arrow-left me-2"></i>Kembali
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-2"></i>Perbarui
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
