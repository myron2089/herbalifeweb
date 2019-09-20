<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    //
    protected $table = 'order_detail';
    protected $primariKey ="id";

    protected $fillable = [
       'id', 'order_id', 'detailQuantity', 'product_id', 'detailPrice'
    ];



    public function purchase(){

    	return $this->hasMany('App\Order');

    }
}
