<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    protected $fillable = [
        'path',
        'title',
        'description',
        'url',
        'category_id'
    ];
    protected $table = 'portfolio';
    public $timestamps = false;
}
