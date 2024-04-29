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
        Schema::create('tb_pendidikan', function (Blueprint $table) {
            $table->bigIncrements('id_pendidikan');
            $table->integer('id');
            $table->integer('id_prodi');
            $table->string('gelar');
            $table->string('jurusan');
            $table->string('perguruan_tinggi');
            $table->string('asal_perguruan_tinggi');
            $table->date('tanggal_kelulusan');
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
        Schema::dropIfExists('tb_pendidikan');
    }
};
