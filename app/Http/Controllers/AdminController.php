<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sale;
use App\SaleDetail;
use App\Distributor;
use App\Order;
use App\Purchase;
use Auth;
use DB;


class AdminController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getAdminHome(){

    	$sale = new Sale();

    	 $sales = $sale->getSaleData();


         $monthSales = $sales;

         $monthSalesCurr = $sale->getSaleData()->whereRaw('date_format(s.created_at, "%Y-%m") between  "' . date("Y-m") . '" and "' . date("Y-m") . '"');

         $monthSalesLast = $sale->getSaleData()->whereRaw('date_format(s.created_at, "%Y-%m") between  "' . date("Y-m",strtotime("-1 month")) . '" and "' . date("Y-m",strtotime("-1 month")) . '"');

         $monthSales2 = $sale->getSaleData()->whereRaw('date_format(s.created_at, "%Y-%m") between  "' . date("Y-m",strtotime("-2 month")) . '" and "' . date("Y-m",strtotime("-2 month")) . '"');
        

         $mySales = $sales;

         $mySales = $mySales->where('s.user_id', Auth::user()->id)->count();
         

         $salesTotal = $sale->getSaleData()->sum('saleTotal');

         $countSales = $sale->getSaleData();

         $numSales = count($countSales->get());
        
        
         $saleToday = $sale->getSaleData()->whereBetween('s.created_at', [date("Y-m-d"), date("Y-m-d")]);
         $salesTotalToday = $saleToday->sum('saleTotal');
          
         $distributors = Distributor::where('status_id', 0)->get();

         $orders = Order::where('status_id',1 )->get();


         $myPurchases = Purchase::where('user_id', Auth::user()->id)->count();


         // Mis ventas
      
         





    	return view('home', ['salesTotal' => $salesTotal, 'numSales' => $numSales, 'salesTotalToday' => $salesTotalToday, 'numSalesToday'=> count($saleToday->get()), 'distributors' => count($distributors), 'orders' => count($orders), 'mySales' => $mySales, 'myPurchases' => $myPurchases, 'thisMonthSales' => count($monthSalesCurr->get()), 'monthSalesLast' => count($monthSalesLast->get()),  'monthSales2' => count($monthSales2->get()) ]);
    }
}
