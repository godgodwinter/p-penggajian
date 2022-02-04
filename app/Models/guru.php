<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class guru extends Model
{
        public $table = "guru";

        use SoftDeletes;
        use HasFactory;

        protected $fillable = [
            'nomerinduk',
            'nama',
            'jk',
            'alamat',
            'telp',
            // 'gajipokok',
            'simkoperasi',
            'dansos',
            'tunjanganjabatan',
            'tunjangankerja',
            'walikelas',
            'jam',
        ];

        function gurudetail()
        {
            return $this->hasMany('App\Models\gurudetail');
        }
}
