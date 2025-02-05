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

    .alert-success {
        background: linear-gradient(135deg, #10b981, #059669);
        border: none;
        color: white;
        padding: 1rem;
        border-radius: 0.5rem;
        margin-bottom: 1.5rem;
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
            <h1 class="h2 mb-1">Data Satuan</h1>
            <p class="mb-0 text-white-50">Kelola data satuan barang</p>
        </div>
        <a href="{{ route('admin.satuan.create') }}" class="btn btn-light">
            <i class="fas fa-plus-circle me-2"></i>Tambah Satuan
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

<!-- Main Card -->
<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <h4 class="mb-0">
                <i class="fas fa-cogs me-2 text-primary"></i>
                Daftar Satuan
            </h4>
        </div>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Satuan</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($satuan as $item)
                        <tr>
                            <td>{{ $item->id_satuan }}</td>
                            <td>{{ $item->satuan }}</td>
                            <td>
                                <div class="action-buttons justify-content-center">
                                    <a href="{{ route('admin.satuan.edit', $item->id_satuan) }}" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit me-1"></i>Edit
                                    </a>
                                    <form action="{{ route('admin.satuan.destroy', $item->id_satuan) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                            <i class="fas fa-trash me-1"></i>Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3">
                                <div class="empty-state">
                                    <i class="fas fa-info-circle mb-3 text-muted fa-2x"></i>
                                    <p class="mb-0">Tidak ada data satuan</p>
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
    {{ $satuan->links() }}
</div>

@endsection
