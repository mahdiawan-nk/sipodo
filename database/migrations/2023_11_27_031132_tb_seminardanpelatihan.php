<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_seminardanpelatihan', function (Blueprint $table) {
            $table->bigIncrements('id_seminardanpelatihan');
            $table->integer('id');
            $table->integer('id_prodi');
            $table->string('tema_seminardanpelatihan');
            $table->date('tanggal_seminardanpelatihan');
            $table->string('lokasi_seminardanpelatihan');
            $table->string('penyelenggara');
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
        Schema::dropIfExists('tb_seminardanpelatihan');
    }
};
