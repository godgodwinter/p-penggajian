<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePegawaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pegawai', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nomerinduk');
            $table->string('nama');
            $table->string('jk');;
            $table->string('alamat');
            $table->string('telp');
            $table->string('gajipokok')->nullable();
            $table->string('simkoperasi')->nullable();
            $table->string('dansos')->nullable();
            $table->string('tunjangankerja')->nullable();
            $table->string('hadir')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('pegawai');
    }
}
