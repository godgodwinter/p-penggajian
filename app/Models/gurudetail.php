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
            'guru_id',
            'jabatan_id',
        ];

        public function guru()
        {
            return $this->belongsTo('App\Models\pegawai');
        }

        public function jabatan()
        {
            return $this->belongsTo('App\Models\jabatan');
        }
}
