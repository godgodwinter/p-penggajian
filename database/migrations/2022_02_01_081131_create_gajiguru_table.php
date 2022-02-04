<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGajiguruTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gajiguru', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tahunbulan');
            $table->string('guru_id');
            $table->string('gajipokok')->nullable();
            $table->string('tunjanganjabatan')->nullable();
            $table->string('tunjangankerja')->nullable();
            $table->string('walikelas')->nullable();
            $table->string('hadir')->nullable();
            $table->string('jam')->nullable();
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
        Schema::dropIfExists('gajiguru');
    }
}
