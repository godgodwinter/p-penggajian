<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class gajipegawai extends Model
{
        public $table = "gajipegawai";

        use SoftDeletes;
        use HasFactory;

        protected $fillable = [
            'tahunbulan',
            'pegawai_id',
            'gajipokok',
            'tunjangankerja',
            'walikelas',
            'hari',
            'status',
            'tgl_diberikan',
            'transport',
            'simkoperasi',
            'dansos',
        ];

        public function pegawai()
        {
            return $this->belongsTo('App\Models\pegawai');
        }
}
