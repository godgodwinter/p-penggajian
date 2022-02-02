<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class pegawaidetail extends Model
{
        public $table = "pegawaidetail";

        use SoftDeletes;
        use HasFactory;

        protected $fillable = [
            'pegawai_id',
            'jabatan_id',
        ];

        public function pegawai()
        {
            return $this->belongsTo('App\Models\pegawai');
        }

        public function jabatan()
        {
            return $this->belongsTo('App\Models\jabatan');
        }
}
