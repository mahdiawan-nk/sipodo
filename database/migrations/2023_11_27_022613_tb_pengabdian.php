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
        Schema::create('tb_pengabdian', function (Blueprint $table) {
            $table->bigIncrements('id_pengabdian');
            $table->integer('id');
            $table->string('judul_kegiatan');
            $table->date('tahun_kegiatan');
            $table->string('lokasi_kegiatan');
            $table->enum('status', ['ketua', 'anggota']);
            $table->string('link_pengabdian');
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
        Schema::dropIfExists("tb_pengabdian");
    }
};
