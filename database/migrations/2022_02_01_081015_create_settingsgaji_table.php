<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsgajiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settingsgaji', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('transport')->nullable();
            $table->string('simkoperasi')->nullable();
            $table->string('dansos')->nullable();
            $table->string('walikelas')->nullable();
            $table->string('gajipokok')->nullable(); //guru
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
        Schema::dropIfExists('settingsgaji');
    }
}
