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


    public function getProductStockBy($id){

    	return Stock::from('stock as s')
    				     ->join('purchase_detail as dt', 'dt.id', 's.purchase_detail_id')
    				     ->join('products as p', 'p.id', 'dt.product_id')
                         ->join('unities as u', 'u.id', 'p.unity_id')
                         ->join('statuses as st', 'st.id', 's.status_id')
                         ->join('categories as c', 'c.id', 'p.category_id')
                         ->where('s.status_id', 1)
                         ->where('p.id', $id)
                         ->select('p.id', 'p.productHerbaLifeCode', 'p.productName', 'p.productDescription', 'u.unityName', 'c.categoryName', 'p.productMeasure', 'st.statusName', 's.balancedPrice',  'p.status_id')
                         ->orderBy('p.productName', 'asc')
                         ->get();
    }


     public function getProductStock(){

    	return Stock::from('stock as s')
    				     ->join('purchase_detail as dt', 'dt.id', 's.purchase_detail_id')
    				     ->join('products as p', 'p.id', 'dt.product_id')
                         ->join('unities as u', 'u.id', 'p.unity_id')
                         ->join('statuses as st', 'st.id', 's.status_id')
                         ->join('categories as c', 'c.id', 'p.category_id')
                         ->where('s.status_id', 1)
                         ->select('p.id', 'p.productHerbaLifeCode', 'p.productName', 'p.productDescription', 'u.unityName', 'c.categoryName', 'p.productMeasure', 'st.statusName', 's.balancedPrice',  'p.status_id')
                         ->orderBy('p.productName', 'asc')
                         ->get();
    }

}
