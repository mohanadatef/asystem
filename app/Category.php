<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'category','sub','subsub'
    ];

    protected $table = 'categories';
    public $timestamps = true;
}
