<?php

namespace App\Http\Controllers;

use App\Sale;
use App\SaleDetail;
use Illuminate\Http\Request;
use App\Purchase;
use App\Supplier;
use App\Product;
use App\PurchaseDetail;
use App\Stock;
use App\Order;
use App\OrderDetail;
use DB;
use Auth;
use Illuminate\Support\Facades\Input;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

       
        //
      // dd(date("Y-m-d", strtotime($request->start)));
        $sales = Sale::from('sales as s')
                     ->join('distributors as d', 'd.id', 's.distributor_id')
                     ->join('users as u', 'u.id', 'd.user_id')
                     ->join('statuses as st', 'st.id', 's.status_id')
                     ->select(DB::raw('s.id as noDoc, u.userHerbaLifeCode, u.userFirstName, u.userLastName, s.saleTotal, date_format(s.created_at, "%d-%m-%Y") as fechaDoc, st.statusName'));


       //dd($request->all());

        if(isset($request->start) && isset($request->end) ){
             $sales = $sales->whereBetween('s.created_at', [date("Y-m-d", strtotime($request->start)), date("Y-m-d", strtotime($request->end))]);

        }

        $sales = $sales->get();





                     
                       //dd($sales);
        return view('management.sales.sales_index', ['sales' => $sales]);
    }

    /*
    * Distribuidor
    */

    public function distributorPurchasesIndex(){

          $sales = Sale::from('sales as s')
                     ->join('distributors as d', 'd.id', 's.distributor_id')
                     ->join('users as u', 'u.id', 'd.user_id')
                     ->join('statuses as st', 'st.id', 's.status_id')
                     ->where('s.distributor_id', Auth::user()->id)
                     ->select(DB::raw('s.id as noDoc, u.userHerbaLifeCode, u.userFirstName, u.userLastName, s.saleTotal, date_format(s.created_at, "%d-%m-%Y") as fechaDoc, st.statusName'))
                     ->get();

            //dd($sales);
            return view('public.sales.sales_index', ['sales'=>$sales]);

    }

    /*
    * detalle de compras para distribuidor
    */

    public function distributorPurchaseDetail($id){

        $sale = Sale::from('sales as s')
                     ->join('distributors as d', 'd.id', 's.distributor_id')
                     ->join('users as u', 'u.id', 'd.user_id')
                     ->join('statuses as st', 'st.id', 's.status_id')
                     ->join('sale_detail as dt', 'dt.sale_id', 's.id')
                     ->where('s.id', $id)
                     ->select(DB::raw('s.id as noDoc, u.userHerbaLifeCode, u.userFirstName, u.userLastName, s.saleTotal, date_format(s.created_at, "%d-%m-%Y") as fechaDoc, st.statusName, sum((dt.productQuantity) * (dt.productPrice)) as saleTotal'))
                      ->groupBy('s.id' , 'u.userHerbaLifeCode', 'st.statusName', 's.saleTotal', 'u.userLastName' , 'u.userFirstName', 'u.userHerbaLifeCode', 's.created_at')
                     ->get();

         $saleDetails = SaleDetail::from('sale_detail as dt')
                                      ->join('products as p', 'p.id', 'dt.product_id')
                                      ->where('dt.sale_id', $id)
                                      ->select(DB::raw('p.productHerbaLifeCode, dt.productQuantity, p.productName, dt.productPrice, (dt.productQuantity *  dt.productPrice) as subTotal'))
                                      ->get();

        //dd($saleDetails);
        return view('public.sales.sale_detail', ['saleData' => $sale, 'saleDetails'=> $saleDetails]);
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
        DB::beginTransaction();
        try{

            //
            $stockExistsMinus = 0;

            $orderData = Order::where('id' , $request->orderId)->get();
            $orderDetails = OrderDetail::where('order_id' , $request->orderId)->get();

            //dd($orderDetails);

            $saleId = mt_rand();
            $sale = Sale::create([
                'id' => $saleId,
                'user_id' => Auth::user()->id,
                'distributor_id' => $orderData[0]->distributors_id,
                'saleTotal' => $saleId,
                'status_id' => 6,
                'saleTotal' => "0",
            ]);


            
            $productQuantity = 0;
            $stockDiscount = 0;
            $currStock = 0;
            $saleTotal = 0;
            $exception = 0;

           

            foreach ($orderDetails as $detail) {
                

                // Verificar stock

                 $checkStock = Stock::from('stock as s')
                                   ->join('purchase_detail as dt', 'dt.id', 's.purchase_detail_id')
                                   ->where('dt.product_id', $detail->product_id)
                                   ->where('s.status_id', 1)
                                   ->select('s.currentQuantity', 's.balancedPrice', 's.purchase_detail_id')
                                   ->get();

                if(count($checkStock)>0){

                    if($checkStock[0]->currentQuantity >= $detail->detailQuantity){

                        $productQuantity = $detail->detailQuantity;

                        $currStock =  $checkStock[0]->currentQuantity - $detail->detailQuantity;
                    } else{
                        $exception = 1;
                        $stockExistsMinus = 1;
                        $productQuantity = $checkStock[0]->currentQuantity;
                        $currStock = 0;
                    }

                    $detailId = mt_rand();

                    $saleDetail = SaleDetail::create([
                        'id' => $detailId,
                        'sale_id' => $saleId,
                        'product_id' =>  $detail->product_id,
                        'productQuantity' =>  $productQuantity,
                        'productPrice' => $checkStock[0]->balancedPrice,
                        'sale_id' => $saleId,
                        'status_id' => 1
                    ]);

                    $subTotal = $productQuantity * $checkStock[0]->balancedPrice;
                    $saleTotal = $saleTotal + $subTotal;

                    $updateLastStock = Stock::from('stock as s')
                                   ->join('purchase_detail as dt', 'dt.id', 's.purchase_detail_id')
                                   ->where('dt.product_id', $detail->product_id)
                                   ->where('s.status_id', 1)
                                   ->update(['s.status_id'=>2]);

                     $stock = Stock::create([
                        'id' => mt_rand(),
                        'currentQuantity' => $currStock,
                        'stockOut' => $productQuantity,
                        'sale_detail_id' => $detailId,
                        'purchase_detail_id' => $checkStock[0]->purchase_detail_id,
                        'balancedPrice' => $checkStock[0]->balancedPrice,
                        'status_id' => 1
                    ]);


                }else{
                    $stockExistsMinus = 1;
                    $exception = 0;
                }
              


                


            }

            // Actualizar el estado del pedido
            $orderUpdateStatus = Order::where('id' , $request->orderId)->update(['status_id'=> 6]);
            $saleUpdateTotal = Sale::where('id', $saleId)->update(['saleTotal' => $saleTotal]);
            
            DB::commit();
            return redirect('administracion/pedidos')->with(['status'=> 'success', 'action' => 'create', 'message' => 'Pedido facturado con éxito', 'exception' => 1, 'exmsessage' => 'Algunos productos no se facturaron por falta de stock']);;

        }
        catch(Exception $e){
            DB::rollBack();
            return back()->with(['error'=> $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

         $sale = Sale::from('sales as s')
                     ->join('distributors as d', 'd.id', 's.distributor_id')
                     ->join('users as u', 'u.id', 'd.user_id')
                     ->join('statuses as st', 'st.id', 's.status_id')
                     ->join('sale_detail as dt', 'dt.sale_id', 's.id')
                     ->where('s.id', $id)
                     ->select(DB::raw('s.id as noDoc, u.userHerbaLifeCode, u.userFirstName, u.userLastName, s.saleTotal, date_format(s.created_at, "%d-%m-%Y") as fechaDoc, st.statusName, sum((dt.productQuantity) * (dt.productPrice)) as saleTotal'))
                      ->groupBy('s.id' , 'u.userHerbaLifeCode', 'st.statusName', 's.saleTotal', 'u.userLastName' , 'u.userFirstName', 'u.userHerbaLifeCode', 's.created_at')
                     ->get();

         $saleDetails = SaleDetail::from('sale_detail as dt')
                                      ->join('products as p', 'p.id', 'dt.product_id')
                                      ->where('dt.sale_id', $id)
                                      ->select(DB::raw('p.productHerbaLifeCode, dt.productQuantity, p.productName, dt.productPrice, (dt.productQuantity *  dt.productPrice) as subTotal'))
                                      ->get();
        

        if(count($sale) == 0){

            return redirect('administracion/ventas');
        }

         $saleTotal = $sale[0]->saleTotal;


         return view('management.sales.sale_show', ['sale'=> $sale, 'details' => $saleDetails, 'saleTotal' => $saleTotal]);
         dd($saleDetails);


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function edit(Sale $sale)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sale $sale)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sale $sale)
    {
        //
    }
}
