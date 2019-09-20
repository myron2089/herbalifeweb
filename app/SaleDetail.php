<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SaleDetail extends Model
{
    //
    protected $table = 'sale_detail';
    protected $primariKey ="id";

    protected $fillable = [
       'id', 'sale_id', 'product_id', 'productQuantity', 'productPrice', 'productPrice', 'status_id'
    ];



    public function purchase(){

    	return $this->hasMany('App\Sale');

    }
}
