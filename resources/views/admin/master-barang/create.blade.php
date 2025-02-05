@extends('layouts.tamplate')

@section('content')
<button class="btn btn-primary d-md-none menu-toggle">☰</button>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Tambah Barang</h1>
</div>

<!-- Success Notification -->
@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<!-- Form for Creating Master Barang -->
<div class="card shadow-lg border-0">
    <div class="card-header bg-gradient-primary text-dark d-flex align-items-center">
        <h4 class="mb-0"><i class="fas fa-plus-circle me-2"></i>Form Tambah Barang</h4>
    </div>

    <div class="card-body">
        <form action="{{ route('admin.master-barang.store') }}" method="POST">
            @csrf

            <!-- Kode Barang -->
            <div class="mb-3">
                <label for="kode_barang" class="form-label">Kode Barang</label>
                <input type="text" name="kode_barang" id="kode_barang" class="form-control @error('kode_barang') is-invalid @enderror" value="{{ old('kode_barang') }}" required maxlength="20" placeholder="Masukkan kode barang">
                @error('kode_barang')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Nama Barang -->
            <div class="mb-3">
                <label for="nama_barang" class="form-label">Nama Barang</label>
                <input type="text" name="nama_barang" id="nama_barang" class="form-control @error('nama_barang') is-invalid @enderror" value="{{ old('nama_barang') }}" required maxlength="100" placeholder="Masukkan nama barang">
                @error('nama_barang')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Spesifikasi Teknis -->
            <div class="mb-3">
                <label for="spesifikasi_teknis" class="form-label">Spesifikasi Teknis</label>
                <textarea name="spesifikasi_teknis" id="spesifikasi_teknis" class="form-control @error('spesifikasi_teknis') is-invalid @enderror" rows="3" maxlength="100" placeholder="Masukkan spesifikasi teknis">{{ old('spesifikasi_teknis') }}</textarea>
                @error('spesifikasi_teknis')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Action Buttons -->
            <div class="d-flex justify-content-between mt-4">
                <a href="{{ route('admin.master-barang.index') }}" class="btn btn-outline-secondary">
                    <i class="fas fa-arrow-left me-2"></i>Kembali
                </a>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save me-2"></i>Simpan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
