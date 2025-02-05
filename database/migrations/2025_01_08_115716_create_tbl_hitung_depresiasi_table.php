<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tbl_hitung_depresiasi', function (Blueprint $table) {
            $table->unsignedBigInteger('id_hitung_depresiasi')->autoIncrement();
            $table->unsignedBigInteger('id_pengadaan');
            $table->date('tgl_hitung_depresiasi');
            $table->string('bulan');
            $table->integer('durasi');
            $table->decimal('nilai_barang', 15, 2);
            $table->decimal('depresiasi_per_bulan', 15, 2);
            $table->timestamps();

            $table->foreign('id_pengadaan')->references('id_pengadaan')->on('tbl_pengadaan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_hitung_depresiasi');
    }
};
