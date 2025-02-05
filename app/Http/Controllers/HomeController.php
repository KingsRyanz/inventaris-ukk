<?php

namespace App\Http\Controllers;

use App\Models\HitungDepresiasi;
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
        return view('user.home', compact(
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
}