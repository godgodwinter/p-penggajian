<?php

namespace Database\Seeders;

use App\Models\kategori;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class oneseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //ADMIN SEEDER
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
            'tipeuser' => 'admin',
            'nomerinduk' => '1',
            'username' => 'admin',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
         ]);


          //settings SEEDER
        DB::table('settings')->insert([
            'app_nama' => 'SI Penggajian Guru dan Karyawan',
            'app_namapendek' => 'SIP',
            'paginationjml' => '10',
            'lembaga_nama' => 'PT Penggajian',
            'lembaga_jalan' => 'Jl. Raya No. 01, Kec. Kepanjen, Kab. Malang',
            'lembaga_telp' => '0341-123456',
            'lembaga_kota' => 'Malang',
            'lembaga_logo' => 'assets/upload/logo.png',
            'sekolahttd' => 'Nama Kepala Sekolah M.Pd',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
         ]);

         DB::table('settingsgaji')->insert(
            array(
                   'id'     =>  1,
                   'transport'     =>   20000,
                   'simkoperasi'     =>  20000,
                   'dansos'     =>   10000,
                   'walikelas'     =>   75000,
                   'created_at'=>date("Y-m-d H:i:s"),
                   'updated_at'=>date("Y-m-d H:i:s")
            ));

DB::table('jabatan')->insert(
    array(
            'nama'     =>   'Kepala Sekolah',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
    ));
DB::table('jabatan')->insert(
    array(
            'nama'     =>   'Waka Kesiswaan',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
    ));
DB::table('jabatan')->insert(
    array(
            'nama'     =>   'Operator',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
    ));
DB::table('jabatan')->insert(
    array(
            'nama'     =>   'Guru',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
    ));
DB::table('jabatan')->insert(
    array(
            'nama'     =>   'TU',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
    ));
DB::table('jabatan')->insert(
    array(
            'nama'     =>   'Pelatih Bela Diri',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
    ));
DB::table('jabatan')->insert(
    array(
            'nama'     =>   'Bendahara',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
    ));
DB::table('jabatan')->insert(
    array(
            'nama'     =>   'Pelatih Pramuka',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
    ));
DB::table('jabatan')->insert(
    array(
            'nama'     =>   'Pelatih Futsal',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
    ));

          $faker = Faker::create('id_ID');

    }
}
