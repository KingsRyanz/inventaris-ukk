<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterBarang extends Model
{
    use HasFactory;

    // Tentukan nama tabel yang digunakan
    protected $table = 'tbl_master_barang';

    // Tentukan kolom primary key jika bukan 'id'
    protected $primaryKey = 'id_barang'; // Sesuaikan dengan nama kolom primary key Anda

    // Tentukan apakah kolom primary key auto-increment atau tidak
    public $incrementing = true; // Ubah menjadi false jika primary key tidak auto-increment

    // Tentukan tipe data kolom primary key (jika perlu)
    protected $keyType = 'int'; // Ubah jika tipe primary key berbeda (misalnya 'string')

    // Kolom-kolom yang boleh diisi (mass assignment)
    protected $fillable = [
        'kode_barang',
        'nama_barang',
        'spesifikasi_teknis',
    ];

    
}
