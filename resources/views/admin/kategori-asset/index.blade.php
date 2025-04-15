@extends('layouts.tamplate')

@section('content')
<style>
    /* Custom Styles */
    .page-header {
        background: linear-gradient(135deg, #4f46e5, #3730a3);
        padding: 2.5rem 2rem;
        border-radius: 1rem;
        margin-bottom: 2rem;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        color: white;
    }

    .card {
        border: none;
        border-radius: 1rem;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
        transition: transform 0.2s ease;
    }

    .card:hover {
        transform: translateY(-2px);
    }

    .card-header {
        background: white;
        border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        padding: 1.5rem;
    }

    .table {
        margin-bottom: 0;
    }

    .table th {
        background: #f8fafc;
        color: #1e293b;
        font-weight: 600;
        text-transform: uppercase;
        font-size: 0.875rem;
        letter-spacing: 0.05em;
        padding: 1rem;
        border-bottom: 2px solid #e2e8f0;
        text-align: center;
    }

    .table td {
        padding: 1rem;
        vertical-align: middle;
        text-align: center;
    }

    .btn-primary {
        background: linear-gradient(135deg, #4f46e5, #3730a3);
        border: none;
        padding: 0.75rem 1.5rem;
        border-radius: 0.5rem;
        transition: all 0.3s ease;
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(79, 70, 229, 0.2);
    }

    .alert-success, .alert-danger {
        border: none;
        color: white;
        padding: 1rem;
        border-radius: 0.5rem;
        margin-bottom: 1.5rem;
    }

    .alert-success {
        background: linear-gradient(135deg, #10b981, #059669);
    }

    .alert-danger {
        background: linear-gradient(135deg, #ef4444, #b91c1c);
    }

    .action-buttons {
        display: flex;
        gap: 0.5rem;
    }

    .btn-warning, .btn-danger {
        padding: 0.5rem 1rem;
        border-radius: 0.5rem;
        transition: all 0.2s ease;
    }

    .btn-warning:hover, .btn-danger:hover {
        transform: translateY(-2px);
    }

    .empty-state {
        padding: 3rem;
        text-align: center;
        color: #64748b;
    }

    .menu-toggle {
        position: fixed;
        top: 1rem;
        left: 1rem;
        z-index: 1000;
        padding: 0.5rem 1rem;
        border-radius: 0.5rem;
    }

    @media (max-width: 768px) {
        .page-header {
            padding: 1.5rem;
            margin-bottom: 1rem;
        }

        .card-header {
            padding: 1rem;
        }

        .table-responsive {
            margin: 0 -1rem;
        }
    }
</style>

<!-- Menu Toggle Button -->
<button class="btn btn-primary d-md-none menu-toggle">
    <i class="fas fa-bars"></i>
</button>

<!-- Page Header -->
<div class="page-header">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h1 class="h2 mb-1">Kategori Aset</h1>
            <p class="mb-0 text-white-50">Kelola data kategori aset</p>
        </div>
        <a href="{{ route('admin.kategori-asset.create') }}" class="btn btn-light">
            <i class="fas fa-plus-circle me-2"></i>Tambah Kategori Aset
        </a>
    </div>
</div>

<!-- Success Notification -->
@if(session('success'))
    <div class="alert alert-success d-flex align-items-center">
        <i class="fas fa-check-circle me-2"></i>
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger d-flex align-items-center">
        <i class="fas fa-exclamation-circle me-2"></i>
        {{ session('error') }}
    </div>
@endif

<!-- Main Card -->
<div class="card">
    <div class="card-header">
        <h4 class="mb-0">
            <i class="fas fa-tags me-2 text-primary"></i>
            Daftar Kategori Aset
        </h4>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Kategori</th>
                        <th>Kategori Aset</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($kategoriAssets as $kategori)
                        <tr>
                            <td>{{ $loop->iteration + ($kategoriAssets->currentPage() - 1) * $kategoriAssets->perPage() }}</td>
                            <td>{{ $kategori->kode_kategori_asset }}</td>
                            <td>{{ $kategori->kategori_asset }}</td>
                            <td>
                                <div class="action-buttons justify-content-center">
                                    <a href="{{ route('admin.kategori-asset.edit', $kategori->id_kategori_asset) }}" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit me-1"></i>Edit
                                    </a>
                                    <form action="{{ route('admin.kategori-asset.destroy', $kategori->id_kategori_asset) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">
                                            <i class="fas fa-trash me-1"></i>Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">
                                <div class="empty-state">
                                    <i class="fas fa-info-circle mb-3 text-muted fa-2x"></i>
                                    <p class="mb-0">Tidak ada data kategori aset</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Pagination -->
<div class="d-flex justify-content-center mt-4">
    {{ $kategoriAssets->links() }}
</div>

@endsection
