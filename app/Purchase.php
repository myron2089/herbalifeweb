<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    //
    protected $table = 'purchases';
    protected $primariKey ="id";

    protected $fillable = [
       'id', 'supplier_id', 'purchaseDocumentNumber', 'purchaseDocumentDate', 'user_id', 'status_id'
    ];



    public function details(){

    	return $this->hasMany('App\PurchaseDetail');

    }
}
