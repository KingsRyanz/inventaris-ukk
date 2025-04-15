<?php

namespace App\Http\Controllers;

use App\Models\MasterBarang;
use App\Models\KategoriAsset;
use App\Models\SubKategoriAsset;
use App\Models\Distributor;
use App\Models\MutasiLokasi;
use App\Models\Pengadaan;
use App\Models\HitungDepresiasi;
use App\Models\Opname;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
{
    // Ambil input pencarian untuk barang dan distributor
    $search = $request->input('search');
    $searchDistributor = $request->input('search_distributor');

    // Statistik jumlah total
    $totalBarang = MasterBarang::count();
    $totalKategori = KategoriAsset::count();
    $totalSubKategori = SubKategoriAsset::count();
    $totalDistributor = Distributor::count();
    $totalMutasiLokasi = MutasiLokasi::count();

    // Mengambil data untuk barang dengan filter pencarian
    $masterBarangs = MasterBarang::when($search, function ($query) use ($search) {
        return $query->where('nama_barang', 'like', "%{$search}%")
            ->orWhere('kode_barang', 'like', "%{$search}%");
    })->get();

    // Mengambil data distributor dengan filter pencarian
    $distributors = Distributor::when($searchDistributor, function ($query) use ($searchDistributor) {
        return $query->where('nama_distributor', 'like', "%{$searchDistributor}%");
    })->get();

    // Mengambil data kategori dan sub kategori
    $kategoriAssets = KategoriAsset::all();
    $subKategoriAssets = SubKategoriAsset::all();

    // Data Ringkasan Pengadaan, Mutasi Lokasi, dan Opname
    $pengadaans = Pengadaan::with(['masterBarang', 'distributor'])
        ->orderBy('tgl_pengadaan', 'desc')
        ->take(5)
        ->get();

    $mutasiLokasi = MutasiLokasi::with(['lokasi', 'pengadaan'])
        ->orderBy('created_at', 'desc')
        ->take(5)
        ->get();

    $opnames = Opname::with('pengadaan')
        ->orderBy('tgl_opname', 'desc')
        ->take(5)
        ->get();

    // Pemberitahuan Depresiasi dan Kondisi Buruk
    $nearDepreciationItems = HitungDepresiasi::where('durasi', '<=', 12)
        ->whereDate('tgl_hitung_depresiasi', '<=', now()->addMonths(3))
        ->get();

    $poorConditionItems = Opname::where('status_barang', 'Buruk')
        ->get();

    // Barang Bermasalah (Rusak, Hilang, Perbaikan)
    $problematicItems = Opname::whereIn('status_barang', ['rusak', 'hilang', 'perbaikan'])
        ->get();
    $totalProblematicItems = $problematicItems->count();

    // Barang dalam Kondisi Baik
    $goodConditionItems = Opname::where('status_barang', 'baik')
        ->get();
    $totalGoodConditionItems = $goodConditionItems->count();

    // Kirim data ke view
    return view('admin.dashboard.index', compact(
        'totalBarang',
        'totalKategori',
        'totalSubKategori',
        'totalDistributor',
        'totalMutasiLokasi',
        'pengadaans',
        'mutasiLokasi',
        'opnames',
        'nearDepreciationItems',
        'poorConditionItems',
        'problematicItems',
        'goodConditionItems',
        'totalProblematicItems',
        'totalGoodConditionItems',
        'masterBarangs',
        'kategoriAssets',
        'subKategoriAssets',
        'distributors',
        'search',
        'searchDistributor'
    ));
}
}
