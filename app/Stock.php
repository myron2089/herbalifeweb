<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    //
     protected $table = 'stock';
    protected $primariKey ="id";

    protected $fillable = [
       'id', 'currentQuantity', 'stockIn', 'stockOut', 'purchase_detail_id', 'sale_detail_id', 'balancedPrice', 'status_id'
    ];

}
