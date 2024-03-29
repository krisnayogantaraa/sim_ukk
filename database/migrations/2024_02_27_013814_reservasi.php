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
        Schema::create('reservasi', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_masuk');
            $table->date('tanggal_keluar');
            $table->datetime('tanggal_checkin')->nullable();
            $table->datetime('tanggal_checkout')->nullable();
            $table->integer('no_kamar');
            $table->string('nik');
            $table->string('nama');
            $table->string('email');
            $table->string('no_telp');
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
        Schema::dropIfExists('reservasi');
    }
};
