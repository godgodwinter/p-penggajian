<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuruTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guru', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nomerinduk');
            $table->string('nama');
            $table->string('jk');;
            $table->string('alamat');
            $table->string('telp');
            // $table->string('gajipokok')->nullable();
            $table->string('simkoperasi')->nullable();
            $table->string('dansos')->nullable();
            $table->string('tunjanganjabatan')->nullable();
            $table->string('tunjangankerja')->nullable();
            $table->string('walikelas')->nullable();
            $table->string('hadir')->nullable();
            $table->string('jam')->nullable();
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
        Schema::dropIfExists('guru');
    }
}
