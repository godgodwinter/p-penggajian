<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTglMulaiBekerjaToGuruTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('guru', function (Blueprint $table) {
            $table->string('tgl_mulai_bekerja')->nullable()->default('2022-02-02');
        });


        Schema::table('pegawai', function (Blueprint $table) {
            $table->string('tgl_mulai_bekerja')->nullable()->default('2022-02-02');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('guru', function (Blueprint $table) {
            $table->dropColumn('tgl_mulai_bekerja');
        });
        Schema::table('pegawai', function (Blueprint $table) {
            $table->dropColumn('tgl_mulai_bekerja');
        });
    }
}
