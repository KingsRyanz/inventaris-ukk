<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasterBarangTable extends Migration
{
    public function up()
    {
        Schema::create('master_barang', function (Blueprint $table) {
            $table->id('id_barang');
            $table->string('kode_barang', 20);
            $table->string('nama_barang', 100);
            $table->string('spesifikasi_teknis', 100)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('master_barang');
    }
}
