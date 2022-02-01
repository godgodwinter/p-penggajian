<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class jabatan extends Model
{
        public $table = "jabatan";

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
        ];

        public function pegawai()
        {
            return $this->belongsTo('App\Models\pegawai');
        }
}
