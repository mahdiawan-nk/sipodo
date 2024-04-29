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
        Schema::create('tb_buku', function (Blueprint $table) {
            $table->bigIncrements('id_buku');
            $table->integer('id');
            $table->integer('id_prodi');
            $table->date('tahun_terbit');
            $table->string('isbn');
            $table->string('kategori');
            $table->string('judul');
            $table->string('link');
            $table->string('lokasi_terbit');
            $table->string('penerbit');
            $table->string('autor');
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
        Schema::dropIfExists('tb_buku');
    }
};
