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
        Schema::create('tb_pembicara', function (Blueprint $table) {
            $table->bigIncrements('id_pembicara');
            $table->integer('id');
            $table->string('judul_materi');
            $table->date('tanggal_kegiatan');
            $table->string('lokasi_kegiatan');
            $table->enum('ruang_lingkup',['Lokal','Nasional','Internasional']);
            $table->string('penyelenggara_kegiatan');
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
        Schema::dropIfExists("tb_pembicara");
    }
};
