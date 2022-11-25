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
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('produk_id');
            $table->char('pembeli');
            $table->char('penjual');
            $table->integer('jumlah_transaksi');
            $table->integer('total_harga');
            $table->char('metode_pembayaran');
            $table->timestamps();

        });

        Schema::table('transaksis', function (Blueprint $table) { 
            $table->foreign('pembeli')->references('id')->on('users');
            $table->foreign('penjual')->references('id')->on('users');
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
    }
};
