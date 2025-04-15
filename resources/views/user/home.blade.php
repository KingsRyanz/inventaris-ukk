@extends('layouts.user')

@section('content')
<!-- Hero Section with Improved Design -->
<div class="relative bg-gradient-to-br from-blue-700 via-indigo-600 to-purple-700 pt-28 pb-20 overflow-hidden">
    <!-- Decorative Background Elements -->
    <div class="absolute inset-0">
        <div class="absolute inset-0 bg-black opacity-10"></div>
        <div class="absolute bottom-0 left-0 right-0 h-32 bg-gradient-to-t from-black/20"></div>
        <div class="absolute right-0 top-0 -mr-40 transform translate-x-1/2">
            <div class="w-96 h-96 bg-gradient-to-br from-white/10 to-transparent rounded-full filter blur-xl"></div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
        <div class="flex flex-col lg:flex-row items-center justify-between gap-12">
            <!-- Left Content -->
            <div class="lg:w-1/2 text-white">
                <div class="space-y-6">
                    <div class="inline-flex items-center px-4 py-2 bg-white/10 backdrop-blur-lg rounded-full">
                        <span class="animate-pulse w-2 h-2 bg-green-400 rounded-full mr-2"></span>
                        <span class="text-sm font-medium">Sistem Aktif</span>
                    </div>

                    <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold leading-tight">
                        Selamat Datang di
                        <span class="block mt-2 bg-gradient-to-r from-yellow-200 to-yellow-400 bg-clip-text text-transparent">
                            Sistem InventoPro
                        </span>
                    </h1>

                    <p class="text-xl text-gray-100 leading-relaxed max-w-xl">
                        Sistem manajemen inventaris modern untuk mengoptimalkan bisnis Anda dengan teknologi terkini.
                    </p>

                    <div class="flex flex-col sm:flex-row gap-4 pt-4">
                        <a href="#pengadaan" class="inline-flex items-center justify-center px-8 py-4 rounded-xl border-2 border-white/50 backdrop-blur-lg text-white font-bold hover:bg-white hover:text-indigo-700 transform hover:-translate-y-1 transition-all duration-200">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                            </svg>
                            Lihat Pengadaan
                        </a>
                    </div>
                </div>
            </div>

            <!-- Right Content - Stats Preview -->
            <div class="lg:w-1/2 grid grid-cols-2 gap-4">
                <div class="bg-white/10 backdrop-blur-lg p-6 rounded-2xl border border-white/20 transform hover:-translate-y-1 transition-all duration-200">
                    <div class="text-white">
                        <p class="text-sm uppercase tracking-wider opacity-75">Total Barang</p>
                        <p class="text-3xl font-bold mt-2">{{ number_format($masterBarangs->total()) }}</p>
                    </div>
                </div>
                <div class="bg-white/10 backdrop-blur-lg p-6 rounded-2xl border border-white/20 transform hover:-translate-y-1 transition-all duration-200">
                    <div class="text-white">
                        <p class="text-sm uppercase tracking-wider opacity-75">Total Pengadaan</p>
                        <p class="text-3xl font-bold mt-2">{{ number_format($pengadaans->total()) }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Main Content Section -->
<div class="bg-gray-50 min-h-screen">
    <!-- Quick Stats Cards -->
    <div class="relative -mt-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            <!-- Barang Aktif Card -->
            <div class="bg-white rounded-2xl shadow-lg p-6 border border-gray-100 transform hover:-translate-y-1 transition-all duration-200">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-blue-50 text-blue-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                        </svg>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-500">Barang Aktif</p>
                        <p class="text-2xl font-bold text-gray-900">{{ $masterBarangs->count() }}</p>
                    </div>
                </div>
            </div>

            <!-- Pengadaan Aktif Card -->
            <div class="bg-white rounded-2xl shadow-lg p-6 border border-gray-100 transform hover:-translate-y-1 transition-all duration-200">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-green-50 text-green-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                        </svg>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-500">Pengadaan Aktif</p>
                        <p class="text-2xl font-bold text-gray-900">{{ $pengadaans->count() }}</p>
                    </div>
                </div>
            </div>

            <!-- You can add more stat cards here -->
        </div>
    </div>

    <!-- Enhanced Alerts Section -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        @if($goodConditionItems->count())
        <div class="bg-emerald-50 rounded-2xl shadow-lg overflow-hidden mb-6 border border-emerald-100">
            <div class="p-6">
                <div class="flex items-start">
                    <div class="flex-shrink-0">
                        <div class="p-2 bg-emerald-100 rounded-full">
                            <svg class="w-6 h-6 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                        </div>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-lg font-semibold text-emerald-900">Barang dalam Kondisi Baik</h3>
                        <div class="mt-2 space-y-3">
                            @foreach($goodConditionItems as $item)
                            <div class="bg-white/50 rounded-xl p-4 hover:bg-white transition-colors">
                                <p class="text-emerald-900 font-medium">
                                    {{ $item->pengadaan->masterBarang->nama_barang }} - Status: {{ $item->status_barang }}
                                </p>
                                <p class="text-emerald-600 mt-1 text-sm">
                                    Keterangan: {{ $item->keterangan ?? 'Tidak ada keterangan' }}
                                </p>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif

        @if($problematicItems->count())
        <div class="bg-red-50 rounded-2xl shadow-lg overflow-hidden border border-red-100">
            <div class="p-6">
                <div class="flex items-start">
                    <div class="flex-shrink-0">
                        <div class="p-2 bg-red-100 rounded-full">
                            <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                            </svg>
                        </div>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-lg font-semibold text-red-900">Pemberitahuan: Barang dengan Masalah</h3>
                        <div class="mt-2 space-y-3">
                            @foreach($problematicItems as $item)
                            <div class="bg-white/50 rounded-xl p-4 hover:bg-white transition-colors">
                                <p class="text-red-900 font-medium">
                                    {{ $item->pengadaan->masterBarang->nama_barang }} - Status: {{ $item->status_barang }}
                                </p>
                                <p class="text-red-600 mt-1 text-sm">
                                    Keterangan: {{ $item->keterangan ?? 'Tidak ada keterangan' }}
                                </p>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>

    <!-- Daftar Barang Section -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
            <div class="p-6 border-b border-gray-100">
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                    <div>
                        <h2 class="text-2xl font-bold text-gray-900">Daftar Barang</h2>
                        <p class="mt-1 text-sm text-gray-500">Kelola semua barang dalam sistem</p>
                    </div>
                </div>
            </div>

            <div class="p-6">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                    @forelse($masterBarangs as $barang)
                    <div class="group bg-white rounded-xl shadow-sm hover:shadow-md transition-all duration-200 border border-gray-100 overflow-hidden transform hover:-translate-y-1">
                        <div class="p-5">
                            <div class="flex items-center justify-between mb-4">
                                <span class="px-3 py-1 bg-blue-50 text-blue-600 rounded-full text-sm font-medium">
                                    {{ $barang->kode_barang }}
                                </span>
                                <button class="p-1.5 rounded-lg text-gray-400 hover:text-gray-600 hover:bg-gray-100">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                                    </svg>
                                </button>
                            </div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-2">{{ $barang->nama_barang }}</h3>
                            <p class="text-gray-600 text-sm mb-4">{{ $barang->spesifikasi_teknis ?? 'Tidak tersedia' }}</p>
                            <div class="pt-4 border-t border-gray-100">
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="col-span-full flex flex-col items-center justify-center py-16 bg-gray-50 rounded-xl border-2 border-dashed border-gray-200">
                        <svg class="w-16 h-16 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                        </svg>
                        <p class="text-gray-500 text-lg mb-2">Tidak ada barang yang tersedia</p>
                        <p class="text-gray-400 text-sm">Mulai tambahkan barang ke sistem</p>
                    </div>
                    @endforelse
                </div>

                <!-- Pagination -->
                <div class="mt-8">
                    {{ $masterBarangs->links() }}
                </div>
            </div>
        </div>
    </div>

    <!-- Pengadaan Table Section -->
    <div id="pengadaan" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-16">
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
            <div class="p-6 border-b border-gray-100">
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                    <div>
                        <h2 class="text-2xl font-bold text-gray-900">Daftar Pengadaan</h2>
                        <p class="mt-1 text-sm text-gray-500">Kelola semua pengadaan barang</p>
                    </div>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="bg-gray-50">
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kode Pengadaan</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Barang</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Stok</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Depresiasi</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Merk</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Satuan</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kategori</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Distributor</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No Invoice</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No Seri</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tahun</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Harga</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nilai</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Depresiasi/Bulan</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 bg-white">
                        @forelse($pengadaans as $index => $pengadaan)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $index + 1 }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="inline-flex px-2 py-1 rounded-md text-sm font-medium bg-blue-50 text-blue-700">
                                    {{ $pengadaan->kode_pengadaan }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                {{ $pengadaan->masterBarang->nama_barang ?? 'N/A' }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $pengadaan->jumlah_barang_fisik }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $pengadaan->depresiasi->lama_depresiasi ?? 'N/A' }} bulan
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $pengadaan->merk->merk ?? 'N/A' }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $pengadaan->satuan->satuan ?? 'N/A' }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $pengadaan->subKategoriAsset->sub_kategori_asset ?? 'N/A' }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $pengadaan->distributor->nama_distributor ?? 'N/A' }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $pengadaan->no_invoice }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $pengadaan->no_seri_barang }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $pengadaan->tahun_produksi }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ date('d M Y', strtotime($pengadaan->tgl_pengadaan)) }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                Rp {{ number_format($pengadaan->harga_barang, 0, ',', '.') }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                Rp {{ number_format($pengadaan->nilai_barang, 0, ',', '.') }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                Rp {{ number_format($pengadaan->harga_barang / ($pengadaan->depresiasi->lama_depresiasi ?? 1), 0, ',', '.') }}
                            </td>

                        </tr>
                        @empty
                        <tr>
                            <td colspan="16" class="px-6 py-10 text-center">
                                <div class="flex flex-col items-center justify-center">
                                    <svg class="w-12 h-12 text-gray-400 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                    </svg>
                                    <p class="text-gray-500 text-lg mb-2">Tidak ada data pengadaan</p>
                                    <p class="text-gray-400 text-sm">Mulai tambahkan data pengadaan baru</p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Table Pagination -->
            <div class="px-6 py-4 border-t border-gray-200">
                {{ $pengadaans->links() }}
            </div>
        </div>
    </div>
</div>

<!-- Footer Section -->
<footer class="bg-gray-50 border-t border-gray-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="text-center text-gray-500 text-sm">
            &copy; {{ date('Y') }} Sistem Manajemen Inventaris. All rights reserved.
        </div>
    </div>
</footer>

@endsection