<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserType extends Model
{
    //

    protected $table = 'user_type';

    protected $primariKey ="id";

    protected $fillable = [
       'id', 'userTypeName'
    ];


    public function getUserTypes(){

    	$userTypes = UserType::select('id', 'userTypeName')->get();

    	return $userTypes;

    }

  
   
}
