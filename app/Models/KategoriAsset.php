<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriAsset extends Model
{
    use HasFactory;

    // Menentukan nama tabel jika tidak menggunakan nama default tabel yang sesuai dengan model
    protected $table = 'tbl_kategori_asset';

    // Menentukan kolom primary key jika tidak menggunakan kolom 'id'
    protected $primaryKey = 'id_kategori_asset';

    // Jika primary key bukan auto-increment, set incrementing menjadi false
    public $incrementing = false;

    // Menentukan tipe data primary key
    protected $keyType = 'string';

    // Menentukan kolom yang dapat diisi
    protected $fillable = [
        'kode_kategori_asset',
        'kategori_asset',
    ];

    // Menentukan apakah menggunakan timestamp
    public $timestamps = true;

    /**
     * Relasi one-to-many dengan model SubKategori
     */
    public function subKategori()
    {
        return $this->hasMany(SubKategoriAsset::class, 'id_kategori_asset', 'id_kategori_asset');
    }

    public function masterBarang()
    {
        return $this->hasMany(MasterBarang::class, 'kategori_asset_id');  // Adjust 'kategori_asset_id' to the actual foreign key
    }
    
}
