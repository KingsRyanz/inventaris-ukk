<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubKategoriAsset extends Model
{
    use HasFactory;

    // Menentukan nama tabel jika berbeda dari default
    protected $table = 'tbl_sub_kategori_asset';

    // Menentukan kolom primary key
    protected $primaryKey = 'id_sub_kategori_asset';

    // Menentukan apakah primary key auto-increment
    public $incrementing = true;

    // Menentukan tipe data primary key
    protected $keyType = 'int';

    // Kolom yang dapat diisi (mass assignable)
    protected $fillable = [
        'id_kategori_asset',         // ID Kategori Asset
        'kode_sub_kategori_asset',  // Kode Sub Kategori Asset
        'sub_kategori_asset'        // Nama Sub Kategori Asset
    ];

    // Menentukan apakah menggunakan timestamps
    public $timestamps = true;

    /**
     * Relasi ke model KategoriAsset (Many-to-One).
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function kategoriAsset()
    {
        return $this->belongsTo(KategoriAsset::class, 'id_kategori_asset', 'id_kategori_asset');
    }

    /**
     * Relasi ke model Pengadaan (One-to-Many).
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pengadaan()
    {
        return $this->hasMany(Pengadaan::class, 'id_sub_kategori_asset', 'id_sub_kategori_asset');
    }
}
