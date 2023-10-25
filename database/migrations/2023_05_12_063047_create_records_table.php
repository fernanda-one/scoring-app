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
            $table->string('sudut_merah');
            $table->string('sudut_biru');
            $table->string('kontingen_merah');
            $table->string('kontingen_biru');
            $table->string('babak');
            $table->string('round_time');
            $table->string('pemenang');
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
        Schema::dropIfExists('log_pertandingan');
    }
}
