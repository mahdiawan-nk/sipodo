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
        Schema::create('tb_mengajar', function (Blueprint $table) {
            $table->bigIncrements('id_mengajar');
            $table->integer('id');
            $table->integer('id_prodi');
            $table->string('jenis_pengajaran');
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
        Schema::dropIfExists("tb_mengajar");
    }
};
