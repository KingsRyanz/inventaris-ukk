<?php

namespace App\Http\Controllers;

use App\Models\HitungDepresiasi;
use App\Models\Pengadaan;
use App\Models\Opname;
use App\Models\MasterBarang;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class HomeController extends Controller
{
    
    public function index()
    {
        // Ambil data hasil depresiasi
        $hasilDepresiasi = HitungDepresiasi::with('pengadaan')->get();

        // Hitung statistik
        
        $totalAset = $hasilDepresiasi->sum('nilai_barang');
        $totalDepresiasi = $hasilDepresiasi->sum('depresiasi_per_bulan');
        $rataDepresiasi = $hasilDepresiasi->avg('depresiasi_per_bulan');

        // Kirim data ke view
        return view('user.dashboard', compact(
            'hasilDepresiasi', 
            'totalAset', 
            'totalDepresiasi', 
            'rataDepresiasi'
        ));
    }

    public function exportPDF()
    {
        // Ambil data untuk export
        $hasilDepresiasi = HitungDepresiasi::with('pengadaan')->get();

        // Hitung total statistik
        $totalAset = $hasilDepresiasi->sum('nilai_barang');
        $totalDepresiasi = $hasilDepresiasi->sum('depresiasi_per_bulan');
        $rataDepresiasi = $hasilDepresiasi->avg('depresiasi_per_bulan');

        // Generate PDF
        $pdf = PDF::loadView('user.pdf-laporan', [
            'hasilDepresiasi' => $hasilDepresiasi,
            'totalAset' => $totalAset,
            'totalDepresiasi' => $totalDepresiasi,
            'rataDepresiasi' => $rataDepresiasi
        ]);

        // Set nama file dengan tanggal
        $namaFile = 'laporan_depresiasi_' . date('Y-m-d_H-i-s') . '.pdf';
        
        // Download PDF
        return $pdf->download($namaFile);
    }

    public function cetakLaporan()
    {
        // Ambil data untuk cetak
        $hasilDepresiasi = HitungDepresiasi::with('pengadaan')->get();

        // Hitung total statistik
        $totalAset = $hasilDepresiasi->sum('nilai_barang');
        $totalDepresiasi = $hasilDepresiasi->sum('depresiasi_per_bulan');
        $rataDepresiasi = $hasilDepresiasi->avg('depresiasi_per_bulan');

        // Generate view untuk print
        return view('user.cetak-laporan', [
            'hasilDepresiasi' => $hasilDepresiasi,
            'totalAset' => $totalAset,
            'totalDepresiasi' => $totalDepresiasi,
            'rataDepresiasi' => $rataDepresiasi
        ]);
    }

    public function dashboard(){
        return $this->index();
    }

    public function home()
    {

        $problematicItems = Opname::whereIn('status_barang', ['rusak', 'hilang', 'perbaikan'])
        ->get();
        $goodConditionItems = Opname::where('status_barang', 'baik')
        ->get();    
        // Ambil semua data master barang
        $masterBarangs = MasterBarang::paginate(8);

           // Ambil semua data pengadaan dengan relasi
        $pengadaans = Pengadaan::with([
            'masterBarang', 
            'depresiasi', 
            'merk', 
            'satuan', 
            'subKategoriAsset', 
            'distributor'
        ])->orderBy('tgl_pengadaan', 'desc')->paginate(10);

        return view('user.home', compact('masterBarangs', 'pengadaans','problematicItems',
        'goodConditionItems'));
    }

}