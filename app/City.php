<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    //
     protected $table = 'cities';

    protected $primariKey ="id";

    protected $fillable = [
       'id', 'cityName', 'state_id'
    ];


    public function getCitiesByState($stateId){

    	$cities = City::where('state_id', $stateId)->select('id', 'cityName')->get();

    	return $cities;
    }

}
