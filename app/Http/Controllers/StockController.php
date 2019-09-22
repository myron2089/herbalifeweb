<?php

namespace App\Http\Controllers;

use App\Stock;
use App\Product;
use Illuminate\Http\Request;
use Auth;

class StockController extends Controller
{


    /*
    * Mostrar el stock de productos.
    */
    public function getProductStock(){

        if(Auth::check()){
            try{


                 $products = Product::from('products as p')
                             ->join('unities as u', 'u.id', 'p.unity_id')
                             ->join('statuses as st', 'st.id', 'p.status_id')
                             ->join('categories as c', 'c.id', 'p.category_id')
                             ->join('purchase_detail as dt', 'dt.product_id', 'p.id')
                             ->join('stock as s', 's.purchase_detail_id', 'dt.id')
                             ->where('s.status_id', 1)
                             ->select('p.id', 'p.productHerbaLifeCode', 'p.productName', 'p.productDescription', 'u.unityName', 'c.categoryName', 'p.productMeasure', 'st.statusName', 'p.status_id', 's.currentQuantity', 's.balancedPrice')
                             ->get();
                             
                return view('management.products.products_stock', ['products'=>$products]);
            

            } catch(Exception $e){
                
                return back()->with(['error'=> $e->getMessage()]);
            }
        } else{

              return redirect('login')->with(['status'=> 'error', 'message' => 'No tiene permisos para ver esta página, por favor inicie sesión.']);

        }


    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function show(Stock $stock)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function edit(Stock $stock)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Stock $stock)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stock $stock)
    {
        //
    }
}
