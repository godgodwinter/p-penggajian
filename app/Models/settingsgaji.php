<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class settingsgaji extends Model
{
        public $table = "settingsgaji";

        use SoftDeletes;
        use HasFactory;

        protected $fillable = [
            'transport',
            'walikelas',
            'simkoperasi',
            'dansos',
            'gajipokok', //guru
        ];

}
