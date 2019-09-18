<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $table = 'categories';
    protected $primariKey ="id";

    protected $fillable = [
       'id', 'categoryName'
    ];
}
