<?php

use App\Http\Controllers\MasterBarangController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KategoriAssetController;
use App\Http\Controllers\SubKategoriAssetController;
use App\Http\Controllers\DepresiasiController;
use App\Http\Controllers\MerkController;
use App\Http\Controllers\SatuanController;
use App\Http\Controllers\DistributorController;
use App\Http\Controllers\PengadaanController;
use App\Http\Controllers\LokasiController;
use App\Http\Controllers\MutasiLokasiController;
use App\Http\Controllers\OpnameController;
use App\Http\Controllers\HitungDepresiasiController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Route publik
Route::get('/', function () {
    return view('auth.login');
});

// Middleware untuk route yang memerlukan autentikasi dan verifikasi email
Route::middleware(['auth', 'verified'])->group(function () {
    // Dashboard Route
    Route::get('/home', [HomeController::class, 'home'])->name('home');
    Route::get('/dashboard', [HomeController::class,'index'])->name('dashboard');
    Route::get('/export-pdf', [HomeController::class, 'exportPDF'])->name('export.pdf');
    Route::get('/cetak-laporan', [HomeController::class, 'cetakLaporan'])->name('cetak.laporan');
    
});

// Profile routes untuk user yang sudah login
Route::middleware('auth')->group(function () {
    Route::controller(ProfileController::class)->group(function () {
        Route::get('/profile', 'edit')->name('profile.edit');
        Route::patch('/profile', 'update')->name('profile.update');
        Route::delete('/profile', 'destroy')->name('profile.destroy');
    });
});

// Route untuk admin dengan middleware dan prefix
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    
    // Dashboard Routes
    Route::resource('dashboard', DashboardController::class);
    
    // Master Barang Routes
    Route::resource('master-barang', MasterBarangController::class);
    
    // Kategori Asset Routes
    Route::resource('kategori-asset', KategoriAssetController::class);
    Route::resource('sub-kategori-asset', SubKategoriAssetController::class);

    // Depresiasi Routes
    Route::resource('depresiasi', DepresiasiController::class);

    // Merk and Satuan Routes
    Route::resource('merk', MerkController::class);
    Route::resource('satuan', SatuanController::class);

    // Distributor Routes
    Route::resource('distributor', DistributorController::class);

    // Pengadaan Routes
    Route::resource('pengadaan', PengadaanController::class);

    // Lokasi Routes
    Route::resource('lokasi', LokasiController::class);

    // Mutasi Lokasi Routes
    Route::resource('mutasi-lokasi', MutasiLokasiController::class);

    // Opname Routes
    Route::resource('opname', OpnameController::class);

    // Hitung Depresiasi Routes
    Route::resource('hitung-depresiasi', HitungDepresiasiController::class)->except(['show']);
    
    // Custom Route for Detail Depresiasi
    Route::get('hitung-depresiasi/{id}/detail', [HitungDepresiasiController::class, 'showDepresiasiDetail'])
        ->name('hitung-depresiasi.detail');
});

// Auth Routes
require __DIR__ . '/auth.php';
