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
        Schema::create('tb_hibah', function (Blueprint $table) {
            $table->bigIncrements('id_hibah');
            $table->integer('id');
            $table->integer('id_prodi');
            $table->string('nama_hibah');
            $table->date('tanggal_hibah');
            $table->string('lokasi_hibah');
            $table->integer('jumlah_dana');
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
        Schema::dropIfExists('tb_hibah');
    }
};
