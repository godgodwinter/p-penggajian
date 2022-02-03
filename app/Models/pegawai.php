<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class pegawai extends Model
{
        public $table = "pegawai";

        use SoftDeletes;
        use HasFactory;

        protected $fillable = [
            'nomerinduk',
            'nama',
            'jk',
            'alamat',
            'telp',
            'gajipokok',
            'simkoperasi',
            'dansos',
            'tunjangankerja',
            'hadir', //harus hadir /jadwal kehadiran
        ];

        function pegawaidetail()
        {
            return $this->hasMany('App\Models\pegawaidetail');
        }

}
