<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->increments('id_transaksi');
            $table->string('invoice');
            $table->integer('id_pelanggan');
            $table->integer('id_type_bayar');
            $table->integer('diskon_persen');
            $table->integer('diskon_rupiah');
            $table->integer('diskon_belanja');
            $table->integer('jumlah_bayar')->nullable;
            $table->integer('jumlah_uang')->nullable;
            $table->integer('sisa')->nullable;
            $table->string('keterangan');
            $table->string('status');
            $table->integer('id_karyawan');
            
            $table->timestamps();
        });

        Schema::create('transaksis_detail', function (Blueprint $table) {
            $table->increments('id_transaksi_detail');
            $table->string('invoice');
            $table->integer('id_barang');
            $table->integer('qty_jual');
            $table->integer('harga_jual');
            $table->integer('id_satuan');
            $table->integer('diskon_jual');
            $table->integer('subtotal');
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
        Schema::dropIfExists('transaksis');
        Schema::dropIfExists('transaksis_detail');
    }
}
