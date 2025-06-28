<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTunjangankerjaToSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('settingsgaji', function (Blueprint $table) {
            $table->string('tunjangankerja')->nullable()->default('10000');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('settingsgaji', function (Blueprint $table) {
            $table->dropColumn('tunjangankerja');
        });
    }
}
