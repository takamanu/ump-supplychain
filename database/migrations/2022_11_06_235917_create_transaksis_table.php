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
            $table->foreign('pembeli')->references('id')->on('users')->onDelete('cascade');
            $table->char('penjual');
            $table->foreign('penjual')->references('id')->on('users')->onDelete('cascade');
            $table->integer('jumlah_transaksi');
            $table->integer('total_harga');
            $table->foreignId('bank_id');
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
    }
};
