<?php

namespace Database\Seeders;

use App\Models\kategori;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class twoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('bendahara')->truncate();
        //Bendahara SEEDER
        DB::table('bendahara')->insert([
            'name' => 'Bendahara',
            'email' => 'bendahara@gmail.com',
            'password' => Hash::make('bendahara'),
            'nomerinduk' => '1',
            'username' => 'bendahara',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('kepsek')->truncate();
        //ADMIN SEEDER
        DB::table('kepsek')->insert([
            'name' => 'Kepala Sekolah',
            'email' => 'kepsek@gmail.com',
            'password' => Hash::make('kepsek'),
            'nomerinduk' => '1',
            'username' => 'kepsek',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
