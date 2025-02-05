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
        Schema::create('tbl_opname', function (Blueprint $table) {
            $table->unsignedBigInteger('id_opname')->autoIncrement();
            $table->unsignedBigInteger('id_pengadaan');
            $table->date('tgl_opname');
            $table->string('kondisi', 25);
            $table->string('keterangan', 50)->nullable();
            $table->timestamps();

            $table->foreign('id_pengadaan')->references('id_pengadaan')->on('tbl_pengadaan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_opname');
    }
};
