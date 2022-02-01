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
            $table->string('guru_id');
            $table->string('gajipokok')->nullable();
            $table->string('tunjangankerja')->nullable();
            $table->string('hari')->nullable();
            $table->string('status')->nullable();
            $table->string('tgl_diberikan')->nullable();
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
