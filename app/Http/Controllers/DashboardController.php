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
        })->get(); // Filter distributor berdasarkan input pencarian

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
        $nearDepreciationItems = HitungDepresiasi::where('durasi', '<=', 12) // Durasi yang hampir selesai
            ->whereDate('tgl_hitung_depresiasi', '<=', now()->addMonths(3))
            ->get();

        $poorConditionItems = Opname::where('kondisi', 'Buruk') // Kondisi buruk berdasarkan opname
            ->get();

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
            'masterBarangs',
            'kategoriAssets',
            'subKategoriAssets',
            'distributors',
            'search',
            'searchDistributor' // Pastikan variabel ini juga tersedia di view
        ));
    }
}
