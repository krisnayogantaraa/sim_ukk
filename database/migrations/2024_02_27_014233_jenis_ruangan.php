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
        Schema::create('jenis_ruangan', function (Blueprint $table) {
            $table->id();
            $table->integer('no_kamar')->unique();
            $table->string('nama');
            $table->string('jenis_suite');
            $table->integer('kapasitas');
            $table->integer('harga');
            $table->string('ketersediaan');
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
        Schema::dropIfExists('jenis_ruangan');
    }
};
