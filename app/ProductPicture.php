<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductPicture extends Model
{
    //
     
    protected $table = 'product_pictures';
    protected $primariKey ="id";

    protected $fillable = [
       'id', 'product_id', 'pictureName',
    ];
}
