<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Informations extends Model
{
    protected $fillable = [
        'last_name',
        'first_name',
        'birth_date',
        'path', 'title',
        'address',
        'about',
        'phone_number',
        'facebook',
        'twitter',
        'github',
        'linkedin'
    ];
    protected $table = 'informations';
    public $timestamps = false;
}
