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
        Schema::create('tb_publikasi', function (Blueprint $table) {
            $table->bigIncrements('id_publikasi');
            $table->integer('id');
            $table->integer('id_prodi');
            $table->enum('kategori_publikasi', ['jurnal nasional terakreditasi', 'jurnal nasional tidak terakreditasi', 'jurnal internasional terakreditasi', 'jurnal internasional tidak terakreditasi', 'prosiding nasional', 'prosiding internasional']);
            $table->string('nama_publikasi');
            $table->date('tahun_publikasi');
            $table->enum('autor', ['Single Autor','First Autor','Member Autor']);
            $table->string('publiser');
            $table->enum('status_akreditasi', ['Non Sinta', 'Sinta 1', 'Sinta 2', 'Sinta 3', 'Sinta 4', 'Sinta 5', 'Sinta 6', 'Non Q', 'Q0', 'Q1', 'Q2','Q3', 'Q4']);
            $table->string('link_publikasi');
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
        Schema::dropIfExists('tb_publikasi');
    }
};
