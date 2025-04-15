@extends('layouts.tamplate')

@section('content')
<style>
    /* Custom styles */
    .procurement-header {
        background: linear-gradient(135deg, #2563eb, #1e40af);
        color: white;
        padding: 2rem;
        border-radius: 0.75rem;
        margin-bottom: 2rem;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .card {
        border: none;
        border-radius: 0.75rem;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        transition: transform 0.2s ease;
        margin-bottom: 2rem;
    }

    .card:hover {
        transform: translateY(-2px);
    }

    .card-header {
        border-top-left-radius: 0.75rem !important;
        border-top-right-radius: 0.75rem !important;
        padding: 1rem 1.5rem;
    }

    .table {
        margin-bottom: 0;
    }

    .table th {
        font-weight: 600;
        text-transform: uppercase;
        font-size: 0.85rem;
        letter-spacing: 0.5px;
        background-color: #f8fafc;
        padding: 1rem;
    }

    .table td {
        padding: 1rem;
        vertical-align: middle;
    }

    .btn-primary {
        background: linear-gradient(135deg, #2563eb, #1e40af);
        border: none;
        padding: 0.625rem 1.25rem;
        border-radius: 0.5rem;
        transition: all 0.3s ease;
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(37, 99, 235, 0.2);
    }

    .btn-warning,
    .btn-danger {
        border: none;
        padding: 0.5rem 1rem;
        border-radius: 0.5rem;
        transition: all 0.3s ease;
    }

    .btn-warning:hover,
    .btn-danger:hover {
        transform: translateY(-2px);
    }

    .alert-success {
        background: linear-gradient(135deg, #10b981, #059669);
        color: white;
        border: none;
        border-radius: 0.75rem;
    }

    .badge {
        padding: 0.5rem 0.75rem;
        border-radius: 0.5rem;
        font-weight: 500;
    }

    .table-hover tbody tr:hover {
        background-color: #f8fafc;
    }

    .status-active {
        background: linear-gradient(135deg, #10b981, #059669);
    }

    .status-inactive {
        background: linear-gradient(135deg, #ef4444, #dc2626);
    }

    .pagination {
        margin-top: 2rem;
    }

    .page-link {
        border-radius: 0.5rem;
        margin: 0 0.25rem;
        color: #2563eb;
    }

    .page-item.active .page-link {
        background: linear-gradient(135deg, #2563eb, #1e40af);
        border-color: transparent;
    }

    /* New styles for keterangan */
    .keterangan-cell {
        max-width: 200px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .keterangan-tooltip {
        cursor: pointer;
    }

    .search-box {
        border-radius: 0.5rem;
        border: 1px solid #e2e8f0;
        padding: 0.5rem 1rem;
        margin-bottom: 1rem;
    }
</style>

<div class="container-fluid px-4">
    <!-- Enhanced Header -->
    <div class="procurement-header d-flex justify-content-between align-items-center">
        <div>
            <h1 class="h3 mb-0">Data Pengadaan</h1>
            <p class="text-white-50 mb-0">Kelola data pengadaan barang</p>
        </div>
        <a href="{{ route('admin.pengadaan.create') }}" class="btn btn-light">
            <i class="fas fa-plus-circle me-2"></i>Tambah Pengadaan
        </a>
    </div>

    <!-- Success Notification -->
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
        <div class="d-flex align-items-center">
            <i class="fas fa-check-circle me-2"></i>
            <strong>{{ session('success') }}</strong>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="fas fa-exclamation-circle me-2"></i>
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <!-- Enhanced Data Table -->
    <div class="card">
        <div class="card-header bg-white">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="mb-0">
                    <i class="fas fa-list me-2 text-primary"></i>Daftar Pengadaan
                </h5>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th class="text-center">ID</th>
                            <th>Master Barang</th>
                            <th>Depresiasi</th>
                            <th>Merk</th>
                            <th>Satuan</th>
                            <th>Sub Kategori Asset</th>
                            <th>Distributor</th>
                            <th>Kode Pengadaan</th>
                            <th>No Invoice</th>
                            <th>No Seri Barang</th>
                            <th>Tahun Produksi</th>
                            <th>Tanggal Pengadaan</th>
                            <th class="text-end">Harga Barang</th>
                            <th class="text-end">Nilai Barang</th>
                            <th class="text-end">Jumlah Barang Fisik</th> <!-- Kolom baru -->
                            <th class="text-center">Fb</th>
                            <th class="text-end">Depresiasi Per Bulan</th> <!-- Kolom baru -->
                            <th>Keterangan</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($pengadaans as $index => $pengadaan)
                        <tr>
                            <td class="text-center">{{ $index + 1 }}</td>
                            <td>{{ $pengadaan->masterBarang->nama_barang ?? 'N/A' }}</td>
                            <td>{{ $pengadaan->depresiasi->lama_depresiasi ?? 'N/A' }}</td>
                            <td>{{ $pengadaan->merk->merk ?? 'N/A' }}</td>
                            <td>{{ $pengadaan->satuan->satuan ?? 'N/A' }}</td>
                            <td>{{ $pengadaan->subKategoriAsset->sub_kategori_asset ?? 'N/A' }}</td>
                            <td>{{ $pengadaan->distributor->nama_distributor ?? 'N/A' }}</td>
                            <td><span class="fw-medium">{{ $pengadaan->kode_pengadaan }}</span></td>
                            <td>{{ $pengadaan->no_invoice }}</td>
                            <td>{{ $pengadaan->no_seri_barang }}</td>
                            <td>{{ $pengadaan->tahun_produksi }}</td>
                            <td>{{ date('d-m-Y', strtotime($pengadaan->tgl_pengadaan)) }}</td>
                            <td class="text-end">
                                <span class="fw-medium">Rp {{ number_format($pengadaan->harga_barang, 0, ',', '.') }}</span>
                            </td>
                            <td class="text-end">
                                <span class="fw-medium">Rp {{ number_format($pengadaan->nilai_barang, 0, ',', '.') }}</span>
                            </td>
                            <td class="text-end">
                                <span class="fw-medium">{{ $pengadaan->jumlah_barang_fisik ?? 'N/A' }}</span>
                            </td>
                            <td class="text-center">
                                @php
                                $fbValue = $pengadaan->fb ?? 0; // Default ke 0 jika fb null
                                @endphp
                                <span class="badge {{ $fbValue == 1 ? 'bg-success' : 'bg-danger' }}">
                                    {{ $fbValue == 1 ? 'Aktif' : 'Tidak Aktif' }}
                                </span>
                            </td>

                            <td class="text-end">
                                @php
                                $hargaBarang = $pengadaan->harga_barang;
                                $usiaBarang = $pengadaan->depresiasi->lama_depresiasi ?? 1; // Default usia 1 bulan jika tidak ada
                                $depresiasiPerBulan = $usiaBarang > 0 ? $hargaBarang / $usiaBarang : 0;
                                @endphp
                                <span class="fw-medium">Rp {{ number_format($depresiasiPerBulan, 0, ',', '.') }}</span>
                            </td>
                            <td>
                                <div class="keterangan-cell" data-bs-toggle="tooltip" data-bs-placement="top"
                                    title="{{ $pengadaan->keterangan ?: 'Tidak ada keterangan' }}">
                                    {{ $pengadaan->keterangan ?: 'Tidak ada keterangan' }}
                                </div>
                            </td>
                            <td class="text-center">
                                <div class="d-flex gap-2 justify-content-center">
                                    <a href="{{ route('admin.pengadaan.edit', $pengadaan->id_pengadaan) }}"
                                        class="btn btn-warning btn-sm d-flex align-items-center justify-content-center"
                                        style="width: 100px">
                                        <i class="fas fa-edit me-1"></i>Edit
                                    </a>
                                    <form action="{{ route('admin.pengadaan.destroy', $pengadaan->id_pengadaan) }}"
                                        method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm d-flex align-items-center justify-content-center"
                                            style="width: 100px;"
                                            onclick="return confirm('Yakin ingin menghapus data ini?')">
                                            <i class="fas fa-trash me-1"></i>Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="17" class="text-center py-4">
                                <div class="text-muted">
                                    <i class="fas fa-info-circle me-2"></i>Data pengadaan tidak ditemukan.
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>
        </div>
    </div>


    <!-- Enhanced Pagination -->
    <div class="d-flex justify-content-center mt-4">
        {{ $pengadaans->links() }}
    </div>
</div>

@push('scripts')
<script>
    // Initialize tooltips
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    })

    // Search functionality
    document.getElementById('searchInput').addEventListener('keyup', function() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById('searchInput');
        filter = input.value.toUpperCase();
        table = document.querySelector('table');
        tr = table.getElementsByTagName('tr');

        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName('td');
            for (let j = 0; j < td.length; j++) {
                if (td[j]) {
                    txtValue = td[j].textContent || td[j].innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = '';
                        break;
                    } else {
                        tr[i].style.display = 'none';
                    }
                }
            }
        }
    });
</script>
@endpush
@endsection