<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfessionalExperiences extends Model
{
    protected $fillable = [
        'position',
        'company',
        'content',
        'month_join',
        'year_join',
        'month_leave',
        'year_leave'
    ];
    protected $table = 'professional_experiences';
    public $timestamps = false;
}
