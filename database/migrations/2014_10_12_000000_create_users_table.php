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
        Schema::create('users', function (Blueprint $table) {
            

            $table->uuid('id')->primary();
            
            // String data
            $table->string('name');
            // $table->bigInteger('nik')->unique();
            // $table->string('address');
            $table->string('qr_code');
            $table->string('email')->unique();
            $table->string('avatar')->default('/images/default-avatar.svg');
            $table->string('password');
            $table->string('phone');
            $table->date('date');
            $table->string('date_string');

            // $table->string('added_by');

            // Integer data
            // $table->integer('rekening_type');
            // $table->bigInteger('provinsi');
            // $table->bigInteger('kabupaten');
            // $table->bigInteger('kecamatan');
            // $table->string('rekening');
            $table->integer('gender');
            // $table->bigInteger('postal_code');
            $table->integer('role')->default(0);
            
            
            // Other type data
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
