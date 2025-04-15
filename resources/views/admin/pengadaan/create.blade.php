@extends('layouts.tamplate')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card shadow-lg border-0 rounded-lg">
                <div class="card-header bg-gradient-primary">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="card-title text-white mb-0">
                            <i class="fas fa-boxes me-2"></i>Tambah Pengadaan
                        </h4>
                        <a href="{{ route('admin.pengadaan.index') }}" class="btn btn-light btn-sm">
                            <i class="fas fa-arrow-left me-1"></i>Kembali
                        </a>
                    </div>
                </div>

                <div class="card-body bg-light">
                    @if($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong><i class="fas fa-exclamation-triangle me-2"></i>Error!</strong>
                        <ul class="mb-0 mt-2">
                            @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif

                    <form action="{{ route('admin.pengadaan.store') }}" method="POST" class="needs-validation" novalidate>
                        @csrf
                        <div class="row g-4">
                            <!-- Basic Information -->
                            <div class="col-md-6">
                                <div class="card h-100">
                                    <div class="card-header bg-light">
                                        <h5 class="card-title mb-0">Informasi Dasar</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label class="form-label">Kode Pengadaan <span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="fas fa-barcode"></i></span>
                                                <input type="text" name="kode_pengadaan" class="form-control" required>
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Barang <span class="text-danger">*</span></label>
                                            <select name="id_master_barang" class="form-select" required>
                                                <option value="">Pilih Barang</option>
                                                @foreach($masterBarangs as $barang)
                                                <option value="{{ $barang->id_barang }}">{{ $barang->nama_barang }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Merk <span class="text-danger">*</span></label>
                                            <select name="id_merk" class="form-select" required>
                                                <option value="">Pilih Merk</option>
                                                @foreach($merks as $merk)
                                                <option value="{{ $merk->id_merk }}">{{ $merk->merk }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Product Details -->
                            <div class="col-md-6">
                                <div class="card h-100">
                                    <div class="card-header bg-light">
                                        <h5 class="card-title mb-0">Detail Produk</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label class="form-label">No Invoice <span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="fas fa-file-invoice"></i></span>
                                                <input type="text" name="no_invoice" class="form-control" required>
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">No Seri Barang <span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="fas fa-fingerprint"></i></span>
                                                <input type="text" name="no_seri_barang" class="form-control" required>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Tahun Produksi <span class="text-danger">*</span></label>
                                                    <div class="input-group">
                                                        <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                                        <input type="text" name="tahun_produksi" class="form-control" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Tanggal Pengadaan <span class="text-danger">*</span></label>
                                                    <div class="input-group">
                                                        <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                                        <input type="date" name="tgl_pengadaan" class="form-control" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- New Fields for Quantity -->
                                        <div class="mb-3">
                                            <label class="form-label">Jumlah Barang Fisik <span class="text-danger">*</span></label>
                                            <input type="number" name="jumlah_barang_fisik" class="form-control" required>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <!-- Classification -->
                            <div class="col-md-6">
                                <div class="card h-100">
                                    <div class="card-header bg-light">
                                        <h5 class="card-title mb-0">Klasifikasi</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label class="form-label">Satuan <span class="text-danger">*</span></label>
                                            <select name="id_satuan" class="form-select" required>
                                                <option value="">Pilih Satuan</option>
                                                @foreach($satuans as $satuan)
                                                <option value="{{ $satuan->id_satuan }}">{{ $satuan->satuan }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Sub Kategori Asset <span class="text-danger">*</span></label>
                                            <select name="id_sub_kategori_asset" class="form-select" required>
                                                <option value="">Pilih Sub Kategori</option>
                                                @foreach($subKategoriAssets as $subKategori)
                                                <option value="{{ $subKategori->id_sub_kategori_asset }}">{{ $subKategori->sub_kategori_asset }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Depresiasi <span class="text-danger">*</span></label>
                                            <select name="id_depresiasi" class="form-select" required>
                                                <option value="">Pilih Depresiasi</option>
                                                @foreach($depresiasis as $depresiasi)
                                                <option value="{{ $depresiasi->id_depresiasi }}">{{ $depresiasi->lama_depresiasi }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Financial Information -->
                            <div class="col-md-6">
                                <div class="card h-100">
                                    <div class="card-header bg-light">
                                        <h5 class="card-title mb-0">Informasi Keuangan</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label class="form-label">Distributor <span class="text-danger">*</span></label>
                                            <select name="id_distributor" class="form-select" required>
                                                <option value="">Pilih Distributor</option>
                                                @foreach($distributors as $distributor)
                                                <option value="{{ $distributor->id_distributor }}">{{ $distributor->nama_distributor }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Harga Barang <span class="text-danger">*</span></label>
                                                    <div class="input-group">
                                                        <span class="input-group-text">Rp</span>
                                                        <input type="number" name="harga_barang" class="form-control" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Nilai Barang <span class="text-danger">*</span></label>
                                                    <div class="input-group">
                                                        <span class="input-group-text">Rp</span>
                                                        <input type="number" name="nilai_barang" class="form-control" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">FB Status</label>
                                                    <div>
                                                        <label class="form-check-label me-3">
                                                            <input type="radio" name="fb" value="1" class="form-check-input" {{ old('fb') == 1 ? 'checked' : '' }}>
                                                            1
                                                        </label>
                                                        <label class="form-check-label">
                                                            <input type="radio" name="fb" value="0" class="form-check-input" {{ old('fb') == 0 ? 'checked' : '' }}>
                                                            0  
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Keterangan</label>
                                                    <textarea name="keterangan" class="form-control" rows="3" placeholder="Masukkan keterangan tambahan..."></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="text-end mt-4">
                                <a href="{{ route('admin.pengadaan.index') }}" class="btn btn-secondary me-2">
                                    <i class="fas fa-times me-1"></i>Batal
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save me-1"></i>Simpan Data
                                </button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@push('styles')
<style>
    .card {
        transition: transform 0.2s;
    }

    .card:hover {
        transform: translateY(-5px);
    }

    .bg-gradient-primary {
        background: linear-gradient(45deg, #4e73df 0%, #224abe 100%);
    }
</style>
@endpush

@push('scripts')
<script>
    // Form validation
    (function() {
        'use strict'
        var forms = document.querySelectorAll('.needs-validation')
        Array.prototype.slice.call(forms)
            .forEach(function(form) {
                form.addEventListener('submit', function(event) {
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
