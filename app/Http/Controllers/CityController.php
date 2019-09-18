<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\City;

class CityController extends Controller
{
    //
    public function getCityByState(Request $request, $id){

    	try{
    	
	    	$cities = City::where('state_id', $id)->select('id', 'cityName')->orderBy('cityName', 'asc')->get();
	    	$result = ['status' => 'success', 'cities' => $cities];

	    	return $result;

	    }
	    catch(Exception $e){
	    	$result = ['status' => 'error', 'message' => $e->getMessage()];
	    }

	    return $result;
    	


    }
}
