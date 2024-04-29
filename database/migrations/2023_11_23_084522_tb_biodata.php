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
        Schema::create('tb_biodata', function (Blueprint $table) {
            $table->bigIncrements('id_biodata');
            $table->integer('id');
            $table->string('nama');
            $table->integer('nidn');
            $table->integer('nrp');
            $table->string('alamat');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->integer('nik');
            $table->string('agama');
            $table->string('email');
            $table->string('no_hp');
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
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
        Schema::dropIfExists('tb_biodata');
    }
};
