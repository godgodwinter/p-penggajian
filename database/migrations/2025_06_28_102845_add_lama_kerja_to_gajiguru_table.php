<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLamaKerjaToGajiguruTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('gajiguru', function (Blueprint $table) {
            $table->string('lamakerja')->nullable()->default('0');
        });
        Schema::table('gajipegawai', function (Blueprint $table) {
            $table->string('lamakerja')->nullable()->default('0');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('gajiguru', function (Blueprint $table) {
            $table->dropColumn('lamakerja');
        });
        Schema::table('gajipegawai', function (Blueprint $table) {
            $table->dropColumn('lamakerja');
        });
    }
}
