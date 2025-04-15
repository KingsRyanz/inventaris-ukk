<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('tbl_kategori_asset', function (Blueprint $table) {
            $table->unsignedBigInteger('id_kategori_asset')->autoIncrement();
            $table->string('kode_kategori_asset', 20);
            $table->string('kategori_asset', 25);
            $table->timestamps();
        });

        Schema::create('tbl_sub_kategori_asset', function (Blueprint $table) {
            $table->unsignedBigInteger('id_sub_kategori_asset')->autoIncrement();
            $table->unsignedBigInteger('id_kategori_asset');
            $table->string('kode_sub_kategori_asset', 20);
            $table->string('sub_kategori_asset', 25);
            $table->timestamps();

            $table->foreign('id_kategori_asset')->references('id_kategori_asset')->on('tbl_kategori_asset');
        });

        Schema::create('tbl_distributor', function (Blueprint $table) {
            $table->unsignedBigInteger('id_distributor')->autoIncrement();
            $table->string('nama_distributor', 50);
            $table->string('alamat', 50);
            $table->string('no_telp', 15);
            $table->string('email', 30);
            $table->string('keterangan', 45)->nullable();
            $table->timestamps();
        });

        Schema::create('tbl_merk', function (Blueprint $table) {
            $table->unsignedBigInteger('id_merk')->autoIncrement();
            $table->string('merk', 50);
            $table->string('keterangan', 50)->nullable();
            $table->timestamps();
        });

        Schema::create('tbl_satuan', function (Blueprint $table) {
            $table->unsignedBigInteger('id_satuan')->autoIncrement();
            $table->string('satuan', 20);
            $table->timestamps();
        });

        Schema::create('tbl_master_barang', function (Blueprint $table) {
            $table->unsignedBigInteger('id_barang')->autoIncrement();
            $table->string('kode_barang', 20);
            $table->string('nama_barang', 100);
            $table->string('spesifikasi_teknis', 100);
            $table->timestamps();
        });

        Schema::create('tbl_depresiasi', function (Blueprint $table) {
            $table->unsignedBigInteger('id_depresiasi')->autoIncrement();
            $table->integer('lama_depresiasi');
            $table->string('keterangan', 50)->nullable();
            $table->timestamps();
        });

        Schema::create('tbl_pengadaan', function (Blueprint $table) {
            $table->unsignedBigInteger('id_pengadaan')->autoIncrement();
            $table->unsignedBigInteger('id_master_barang');
            $table->unsignedBigInteger('id_depresiasi');
            $table->unsignedBigInteger('id_merk');
            $table->unsignedBigInteger('id_satuan');
            $table->unsignedBigInteger('id_sub_kategori_asset');
            $table->unsignedBigInteger('id_distributor');
            $table->string('kode_pengadaan', 20);
            $table->string('no_invoice', 20);
            $table->string('no_seri_barang', 50);
            $table->string('tahun_produksi', 5);
            $table->date('tgl_pengadaan');
            $table->integer('harga_barang');
            $table->integer('nilai_barang');
            $table->integer('jumlah_barang_fisik')->default(0); // Menambahkan kolom jumlah_barang_fisik
            $table->enum('fb', ['0', '1']);
            $table->string('keterangan', 50)->nullable();
            $table->timestamps();

            $table->foreign('id_master_barang')->references('id_barang')->on('tbl_master_barang');
            $table->foreign('id_depresiasi')->references('id_depresiasi')->on('tbl_depresiasi');
            $table->foreign('id_merk')->references('id_merk')->on('tbl_merk');
            $table->foreign('id_satuan')->references('id_satuan')->on('tbl_satuan');
            $table->foreign('id_sub_kategori_asset')->references('id_sub_kategori_asset')->on('tbl_sub_kategori_asset');
            $table->foreign('id_distributor')->references('id_distributor')->on('tbl_distributor');
        });
    }

    public function down()
    {
        Schema::dropIfExists('tbl_pengadaan');
        Schema::dropIfExists('tbl_depresiasi');
        Schema::dropIfExists('tbl_master_barang');
        Schema::dropIfExists('tbl_satuan');
        Schema::dropIfExists('tbl_merk');
        Schema::dropIfExists('tbl_distributor');
        Schema::dropIfExists('tbl_sub_kategori_asset');
        Schema::dropIfExists('tbl_kategori_asset');
    }
};