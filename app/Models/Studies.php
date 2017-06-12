<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Studies extends Model
{
    protected $fillable = [
        'speciality',
        'establishment',
        'month_join',
        'year_join',
        'month_finish',
        'year_finish',
        'description'
    ];
    protected $table = 'studies';
    public $timestamps = false;
}
