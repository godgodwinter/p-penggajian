<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGajipegawaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gajipegawai', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tahunbulan');
            $table->string('pegawai_id');
            $table->string('gajipokok')->nullable();
            $table->string('tunjangankerja')->nullable();
            $table->string('hadir')->nullable();
            $table->string('status')->nullable();
            $table->string('tgl_diberikan')->nullable();
            $table->string('transport')->nullable();
            $table->string('simkoperasi')->nullable();
            $table->string('dansos')->nullable();
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
        Schema::dropIfExists('gajipegawai');
    }
}
