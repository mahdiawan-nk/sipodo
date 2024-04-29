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
        Schema::create('tb_penelitian', function (Blueprint $table) {
            $table->bigIncrements('id_penelitian');
            $table->integer('id');
            $table->string('judul_penelitian');
            $table->date('tahun_penelitian');
            $table->string('lokasi_penelitian');
            $table->enum('status', ['ketua', 'anggota']);
            $table->string('link_penelitian');
            $table->enum('sumber_dana', ['internal', 'eksternal', 'mandiri']);
            $table->string('nama_pemberi_dana');
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
        Schema::dropIfExists('tb_penelitian');
    }
};
