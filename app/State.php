<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    //
     protected $table = 'states';

    protected $primariKey ="id";

    protected $fillable = [
       'id', 'stateName'
    ];


    public function getStates(){

    	$states = State::select('id', 'stateName')->get();

    	return $states;

    }
}
