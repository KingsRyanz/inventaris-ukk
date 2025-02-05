<!-- resources/views/pengadaan/form.blade.php -->
@extends('layouts.tamplate')

@section('content')
<div class="container py-4">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white py-3">
            <h4 class="card-title mb-0">
                <i class="fas fa-{{ isset($pengadaan) ? 'edit' : 'plus-circle' }} me-2"></i>
                {{ isset($pengadaan) ? 'Edit' : 'Tambah' }} Pengadaan
            </h4>
        </div>
        
        <div class="card-body p-4">
            @if($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <form action="{{ isset($pengadaan) ? route('admin.pengadaan.update', $pengadaan->id_pengadaan) : route('pengadaan.store') }}" 
                  method="POST" class="needs-validation" novalidate>
                @csrf
                @if(isset($pengadaan))
                    @method('PUT')
                @endif
                
                <div class="row g-4">
                    <!-- Left Column -->
                    <div class="col-md-6">
                        <div class="card bg-light h-100">
                            <div class="card-body">
                                <h5 class="card-title mb-4 text-primary">Informasi Dasar</h5>
                                
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Kode Pengadaan</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-barcode"></i></span>
                                        <input type="text" name="kode_pengadaan" class="form-control" 
                                               value="{{ isset($pengadaan) ? $pengadaan->kode_pengadaan : old('kode_pengadaan') }}" required>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fw-bold">Barang</label>
                                    <select name="id_master_barang" class="form-select" required>
                                        <option value="">Pilih Barang</option>
                                        @foreach($masterBarangs as $barang)
                                            <option value="{{ $barang->id_barang }}" 
                                                {{ (isset($pengadaan) && $pengadaan->id_master_barang == $barang->id_barang) ? 'selected' : '' }}>
                                                {{ $barang->nama_barang }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fw-bold">Merk</label>
                                    <select name="id_merk" class="form-select" required>
                                        <option value="">Pilih Merk</option>
                                        @foreach($merks as $merk)
                                            <option value="{{ $merk->id_merk }}"
                                                {{ (isset($pengadaan) && $pengadaan->id_merk == $merk->id_merk) ? 'selected' : '' }}>
                                                {{ $merk->merk }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fw-bold">Depresiasi</label>
                                    <select name="id_depresiasi" class="form-select" required>
                                        <option value="">Pilih Depresiasi</option>
                                        @foreach($depresiasis as $depresiasi)
                                            <option value="{{ $depresiasi->id_depresiasi }}"
                                                {{ (isset($pengadaan) && $pengadaan->id_depresiasi == $depresiasi->id_depresiasi) ? 'selected' : '' }}>
                                                {{ $depresiasi->keterangan }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fw-bold">Satuan</label>
                                    <select name="id_satuan" class="form-select" required>
                                        <option value="">Pilih Satuan</option>
                                        @foreach($satuans as $satuan)
                                            <option value="{{ $satuan->id_satuan }}"
                                                {{ (isset($pengadaan) && $pengadaan->id_satuan == $satuan->id_satuan) ? 'selected' : '' }}>
                                                {{ $satuan->satuan }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fw-bold">Sub Kategori Asset</label>
                                    <select name="id_sub_kategori_asset" class="form-select" required>
                                        <option value="">Pilih Sub Kategori</option>
                                        @foreach($subKategoriAssets as $subKategori)
                                            <option value="{{ $subKategori->id_sub_kategori_asset }}"
                                                {{ (isset($pengadaan) && $pengadaan->id_sub_kategori_asset == $subKategori->id_sub_kategori_asset) ? 'selected' : '' }}>
                                                {{ $subKategori->sub_kategori_asset }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Right Column -->
                    <div class="col-md-6">
                        <div class="card bg-light h-100">
                            <div class="card-body">
                                <h5 class="card-title mb-4 text-primary">Detail Pengadaan</h5>

                                <div class="mb-3">
                                    <label class="form-label fw-bold">Distributor</label>
                                    <select name="id_distributor" class="form-select" required>
                                        <option value="">Pilih Distributor</option>
                                        @foreach($distributors as $distributor)
                                            <option value="{{ $distributor->id_distributor }}"
                                                {{ (isset($pengadaan) && $pengadaan->id_distributor == $distributor->id_distributor) ? 'selected' : '' }}>
                                                {{ $distributor->nama_distributor }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fw-bold">No Invoice</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-file-invoice"></i></span>
                                        <input type="text" name="no_invoice" class="form-control"
                                               value="{{ isset($pengadaan) ? $pengadaan->no_invoice : old('no_invoice') }}" required>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fw-bold">No Seri Barang</label>
                                    <input type="text" name="no_seri_barang" class="form-control"
                                           value="{{ isset($pengadaan) ? $pengadaan->no_seri_barang : old('no_seri_barang') }}" required>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fw-bold">Tahun Produksi</label>
                                    <input type="text" name="tahun_produksi" class="form-control"
                                           value="{{ isset($pengadaan) ? $pengadaan->tahun_produksi : old('tahun_produksi') }}" required>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fw-bold">Tanggal Pengadaan</label>
                                    <input type="date" name="tgl_pengadaan" class="form-control"
                                           value="{{ isset($pengadaan) ? $pengadaan->tgl_pengadaan : old('tgl_pengadaan') }}" required>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fw-bold">Harga Barang</label>
                                    <div class="input-group">
                                        <span class="input-group-text">Rp</span>
                                        <input type="number" name="harga_barang" class="form-control"
                                               value="{{ isset($pengadaan) ? $pengadaan->harga_barang : old('harga_barang') }}" required>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fw-bold">Nilai Barang</label>
                                    <div class="input-group">
                                        <span class="input-group-text">Rp</span>
                                        <input type="number" name="nilai_barang" class="form-control"
                                               value="{{ isset($pengadaan) ? $pengadaan->nilai_barang : old('nilai_barang') }}" required>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fw-bold">FB</label>
                                    <select name="fb" class="form-select" required>
                                        <option value="">Pilih FB</option>
                                        <option value="0" {{ (isset($pengadaan) && $pengadaan->fb == '0') ? 'selected' : '' }}>0</option>
                                        <option value="1" {{ (isset($pengadaan) && $pengadaan->fb == '1') ? 'selected' : '' }}>1</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fw-bold">Keterangan</label>
                                    <textarea name="keterangan" class="form-control" rows="3">{{ isset($pengadaan) ? $pengadaan->keterangan : old('keterangan') }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Submit Buttons -->
                <div class="d-flex justify-content-end gap-2 mt-4">
                    <a href="{{ route('admin.pengadaan.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left me-2"></i>Kembali
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-2"></i>{{ isset($pengadaan) ? 'Update' : 'Simpan' }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('styles')
<style>
    .form-label {
        color: #555;
        font-size: 0.9rem;
    }
    
    .card {
        border: none;
        transition: transform 0.2s;
    }
    
    .card:hover {
        transform: translateY(-5px);
    }

    .input-group-text {
        background-color: #f8f9fa;
        border-right: none;
    }

    .form-control {
        border-left: none;
    }

    .form-control:focus {
        box-shadow: none;
        border-color: #ced4da;
    }

    .form-select:focus {
        box-shadow: none;
        border-color: #ced4da;
    }

    .btn {
        padding: 0.5rem 1.5rem;
    }
</style>
@endpush

@push('scripts')
<script>
    // Form validation
    (function () {
        'use strict'
        var forms = document.querySelectorAll('.needs-validation')
        Array.prototype.slice.call(forms)
            .forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }
                    form.classList.add('was-validated')
                }, false)
            })
    })()
</script>
@endpush

@endsection