<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class gajiguru extends Model
{
        public $table = "gajiguru";

        use SoftDeletes;
        use HasFactory;

        protected $fillable = [
            'tahunbulan',
            'guru_id',
            'gajipokok',
            'tunjanganjabatan',
            'tunjangankerja',
            'walikelas',
            'hadir',
            'jam',
            'status',
            'tgl_diberikan',
        ];

        public function guru()
        {
            return $this->belongsTo('App\Models\guru');
        }
}
