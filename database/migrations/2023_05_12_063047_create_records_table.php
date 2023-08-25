<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecordsTable extends Migration
{
    /**
     * Run the migrations.pemenang pertandingan
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log_pertandingan', function (Blueprint $table) {
            $table->id();
            $table->integer('partai');
            $table->string('juri_pertama');
            $table->string('juri_kedua');
            $table->string('juri_ketiga');
            $table->string('dewan');
            $table->string('sudut_merah');
            $table->string('sudut_biru');
            $table->string('round_time')->nullable();
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
        Schema::dropIfExists('records');
    }
}
