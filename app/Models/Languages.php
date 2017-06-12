<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Languages extends Model
{
    protected $fillable = [
        'language',
        'level'
    ];
    protected $table = 'languages';
    public $timestamps = false;
}
