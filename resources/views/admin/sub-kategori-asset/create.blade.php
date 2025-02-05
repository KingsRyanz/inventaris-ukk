@extends('layouts.tamplate')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Tambah Sub Kategori Asset</h1>
    </div>

    <!-- Form Tambah Sub Kategori Asset -->
    <div class="card shadow-lg border-0">
        <div class="card-header bg-gradient-primary text-dark d-flex align-items-center">
            <h4 class="mb-0"><i class="fas fa-plus-circle me-2"></i>Form Tambah Sub Kategori Asset</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.sub-kategori-asset.store') }}" method="POST">
                @csrf

                <!-- Kategori Asset -->
                <div class="mb-3">
                    <label for="id_kategori_asset" class="form-label">Kategori Asset</label>
                    <select name="id_kategori_asset" id="id_kategori_asset" class="form-control @error('id_kategori_asset') is-invalid @enderror" required>
                        <option value="">Pilih Kategori Asset</option>
                        @foreach($kategoriAsset as $kategori)
                            <option value="{{ $kategori->id_kategori_asset }}" {{ old('id_kategori_asset') == $kategori->id_kategori_asset ? 'selected' : '' }}>
                                {{ $kategori->kategori_asset }}
                            </option>
                        @endforeach
                    </select>
                    @error('id_kategori_asset')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Kode Sub Kategori -->
                <div class="mb-3">
                    <label for="kode_sub_kategori_asset" class="form-label">Kode Sub Kategori</label>
                    <input type="text" name="kode_sub_kategori_asset" id="kode_sub_kategori_asset" class="form-control @error('kode_sub_kategori_asset') is-invalid @enderror" value="{{ old('kode_sub_kategori_asset') }}" required placeholder="Masukkan kode sub kategori">
                    @error('kode_sub_kategori_asset')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Nama Sub Kategori -->
                <div class="mb-3">
                    <label for="sub_kategori_asset" class="form-label">Nama Sub Kategori</label>
                    <input type="text" name="sub_kategori_asset" id="sub_kategori_asset" class="form-control @error('sub_kategori_asset') is-invalid @enderror" value="{{ old('sub_kategori_asset') }}" required placeholder="Masukkan nama sub kategori">
                    @error('sub_kategori_asset')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Tombol Aksi -->
                <div class="d-flex justify-content-between mt-4">
                    <a href="{{ route('admin.sub-kategori-asset.index') }}" class="btn btn-outline-secondary">
                        <i class="fas fa-arrow-left me-2"></i>Kembali
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-2"></i>Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
