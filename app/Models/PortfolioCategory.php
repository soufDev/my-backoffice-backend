<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PortfolioCategory extends Model
{
    protected $fillable = [
        'content'
    ];
    protected $table = 'portfolio_categories';
    public $timestamps = false;
}
