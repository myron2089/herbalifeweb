<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    //
    protected $table = 'suppliers';
    protected $primariKey ="id";

    protected $fillable = [
       'id', 'supplierName', 'supplierPhoneNumber', 'supplierIdentificationNumber', 'supplierEmail', 'supplierHerbaLifeCode', 'status_id'
    ];
}
