<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $table = 'orders';
    protected $primariKey ="id";

    protected $fillable = [
       'id', 'orderNumber', 'distributors_id', 'status_id'
    ];
}
