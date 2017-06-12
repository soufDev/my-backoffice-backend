<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Skills extends Model
{
    protected $fillable = [
        'name',
        'level',
        'category_id'
    ];
    protected $table = 'skills';
    public $timestamps = false;

    public function getCategory(){
        return $this->hasOne('App\Models\CategorySkills');
    }
}
