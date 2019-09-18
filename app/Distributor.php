<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Distributor extends Model
{
    //
    protected $table = 'distributors';
    protected $primariKey ="id";

    protected $fillable = [
       'id', 'distributor_referred_id', 'user_id', 'status_id'
    ];
}
