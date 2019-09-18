<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PurchaseDetail extends Model
{
    //
    protected $table = 'purchase_detail';
    protected $primariKey ="id";

    protected $fillable = [
       'id', 'purchase_id', 'product_id', 'productQuantity', 'productCost', 'productPrice', 'status_id'
    ];



    public function purchase(){

    	return $this->hasMany('App\Purchase');

    }
}
