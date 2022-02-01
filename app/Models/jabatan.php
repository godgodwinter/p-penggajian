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
            'nama',
        ];

}
