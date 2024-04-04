<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barangs', function (Blueprint $table) {
            $table->id();
            $table->string('gudang');
            $table->string('ruangan');
            $table->string('nama_barang');
            $table->string('jenis_barang');
            $table->string('kode_barang'); // Mengubah 'code_barang' menjadi 'kode_barang
            $table->string('register');
            $table->string('kondisi_barang');
            $table->string('lokasi');
            $table->string('harga_barang'); // Mengubah tipe data 'harga_barang' menjadi decimal
            $table->string('image');
            $table->string('qr');
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
        Schema::dropIfExists('barangs');
    }
};
