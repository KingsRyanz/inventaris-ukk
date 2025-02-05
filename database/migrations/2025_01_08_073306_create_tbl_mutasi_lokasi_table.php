<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblMutasiLokasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_mutasi_lokasi', function (Blueprint $table) {
            $table->unsignedBigInteger('id_mutasi_lokasi')->autoIncrement();
            $table->unsignedBigInteger('id_lokasi');
            $table->unsignedBigInteger('id_pengadaan');
            $table->string('flag_lokasi', 45);
            $table->string('flag_pindah', 45);
            $table->timestamps();

            $table->foreign('id_lokasi')->references('id_lokasi')->on('tbl_lokasi');
            $table->foreign('id_pengadaan')->references('id_pengadaan')->on('tbl_pengadaan');
        });


    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_mutasi_lokasi');
    }
}
