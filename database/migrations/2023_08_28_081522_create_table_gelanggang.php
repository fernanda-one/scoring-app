<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableGelanggang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gelanggang', function (Blueprint $table) {
                $table->id();
                $table->string('nama_gelanggang');
                $table->foreignId('juri_pertama');
                $table->foreignId('juri_kedua');
                $table->foreignId('juri_ketiga');
                $table->foreignId('dewan');
                $table->foreignId('ketua_pertandingan');
                $table->foreignId('operator');
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
        Schema::dropIfExists('gelanggang');
    }
}
