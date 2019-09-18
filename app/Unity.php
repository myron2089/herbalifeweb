<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unity extends Model
{
    //
    protected $table = 'unities';
    protected $primariKey ="id";

    protected $fillable = [
       'id', 'unityName'
    ];
}
