<?php

namespace App;
use DB;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    //
    protected $table = 'sales';
    protected $primariKey ="id";

    protected $fillable = [
       'id', 'user_id', 'distributor_id', 'saleTotal', 'status_id'
    ];



    public function getSaleData(){

    	return Sale::from('sales as s')
                     ->join('statuses as st', 'st.id', 's.status_id')
                    ->select(DB::raw('s.id as noDoc, s.saleTotal, date_format(s.created_at, "%d-%m-%Y") as fechaDoc, st.statusName, date_format(s.created_at,"%Y-%m") as ymFormat'));
    }

}
