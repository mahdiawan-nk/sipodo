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
        Schema::create('tb_patendanhaki', function (Blueprint $table) {
            $table->bigIncrements('id_patendanhaki');
            $table->integer('id');
            $table->integer('id_prodi');
            $table->string('nama');
            $table->date('tanggal_terima');
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
        Schema::dropIfExists("tb_patendanhaki");
    }
};
