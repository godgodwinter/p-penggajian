<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class kategori extends Model
{
        public $table = "kategori";

        use SoftDeletes;
        use HasFactory;

        protected $fillable = [
            'nama',
            'prefix',
            'kode',
        ];

}
