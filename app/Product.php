<?php

namespace App;
use App\Product;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
   

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'products';
    protected $primariKey ="id";

    protected $fillable = [
       'id', 'productHerbaLifeCode', 'productName', 'productDescription', 'productBenefits', 'productMeasure', 'unity_id', 'category_id', 'status_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    public function getActiveProducts(){

         return Product::from('products as p')
                         ->join('unities as u', 'u.id', 'p.unity_id')
                         ->join('statuses as st', 'st.id', 'p.status_id')
                         ->join('categories as c', 'c.id', 'p.category_id')
                         ->select('p.id', 'p.productHerbaLifeCode', 'p.productName', 'p.productDescription', 'u.unityName', 'c.categoryName', 'p.productMeasure', 'st.statusName', 'p.status_id')
                         ->orderBy('p.productName', 'asc')
                         ->get();
    }


    public function getProductById($id){

         return Product::from('products as p')
                         ->join('unities as u', 'u.id', 'p.unity_id')
                         ->join('statuses as st', 'st.id', 'p.status_id')
                         ->join('categories as c', 'c.id', 'p.category_id')
                         ->where('p.id', $id)
                         ->select('p.id', 'p.productHerbaLifeCode', 'p.productName', 'p.productDescription', 'u.unityName', 'c.categoryName', 'p.productMeasure', 'st.statusName', 'p.status_id')
                         ->orderBy('p.productName', 'asc')
                         ->get();
    }
    
}
