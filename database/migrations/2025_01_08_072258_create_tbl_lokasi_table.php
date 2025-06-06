<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblLokasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_lokasi', function (Blueprint $table) {
            $table->unsignedBigInteger('id_lokasi')->autoIncrement();
            $table->string('kode_lokasi', 20);
            $table->string('nama_lokasi', 50);
            $table->string('keterangan', 50)->nullable();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_lokasi');
    }
}
