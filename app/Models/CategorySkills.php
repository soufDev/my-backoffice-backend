<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategorySkills extends Model
{
    protected $fillable = [
        'category'
    ];
    protected $table = 'category_skills';
    public $timestamps = false;
}
