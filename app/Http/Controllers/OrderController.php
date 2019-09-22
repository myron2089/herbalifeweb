<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderDetail;
use Illuminate\Http\Request;
use App\Product;
use App\Stock;
use DB;
use Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if(Auth::check()){
        $orders = Order::from('orders as o')
                         ->join('order_detail as dt', 'dt.order_id', 'o.id')
                         ->join('statuses as st', 'st.id', 'o.status_id')
                         ->join('distributors as d', 'd.id', 'o.distributors_id')
                         ->join('users as u', 'u.id', 'd.user_id')
                         ->select(DB::raw('o.id, o.orderNumber as noDoc, sum((dt.detailQuantity) * (dt.detailPrice)) as orderTotal, st.statusName, u.userFirstName, u.userLastName, u.userHerbaLifeCode, DATE_FORMAT(o.created_at, "%d-%m-%Y") as fechaDoc, o.status_id'))
                         ->groupBy('o.id' , 'o.orderNumber', 'st.statusName', 'o.status_id', 'u.userLastName' , 'u.userFirstName', 'u.userHerbaLifeCode', 'o.created_at')
                         ->distinct()
                         ->orderBy('o.status_id', 'asc')
                         ->get();

         return view('management.orders.orders_index', ['orders' => $orders]);
         } else{

              return redirect('login')->with(['status'=> 'error', 'message' => 'No tiene permisos para ver esta página, por favor inicie sesión.']);

        }            

    }

    public function distributorOrdersIndex(){
        if(Auth::check()){
            $distributor = DB::table('distributors as d')
                            ->join('users as u', 'u.id', 'd.user_id')
                            ->where('u.id', Auth::user()->id)
                            ->pluck('d.id');

            $distributorId = $distributor[0];                

            $orders = Order::from('orders as o')
                             ->where('distributors_id', $distributorId)
                             ->join('order_detail as dt', 'dt.order_id', 'o.id')
                             ->join('statuses as st', 'st.id', 'o.status_id')
                             ->select(DB::raw('o.id, o.orderNumber as noDoc, sum((dt.detailQuantity) * (dt.detailPrice)) as orderTotal, st.statusName, DATE_FORMAT(o.created_at, "%d-%m-%Y") as fechaDoc'))
                             ->groupBy('o.id' , 'o.orderNumber', 'st.statusName', 'o.status_id' ,'o.created_at')
                             ->distinct()
                             ->get();
            //dd($orders);
            return view('public.orders.orders_index', ['orders' => $orders]);
         } else{

              return redirect('login')->with(['status'=> 'error', 'message' => 'No tiene permisos para ver esta página, por favor inicie sesión.']);

        }   
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


    /*
    * Creacion de pedido lado del distribuidor
    */

    public function distributorOrderCreate(){

        $productStock = new Stock();

        $products = $productStock->getProductStock();

        /* Obtener id del distribuidor */

        $distributor = DB::table('distributors as d')
                        ->join('users as u', 'u.id', 'd.user_id')
                        ->where('u.id', Auth::user()->id)
                        ->pluck('d.id');


        
        return view('public.orders.order_create', ['products' => $products, 'distributorId' => $distributor[0]]);
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

    /*
    * Registrar pedido
    */

    public function distributorOrdersStore(Request $request){
        DB::beginTransaction();
        try{


            //dd($request->all());
            
            $ordId = mt_rand();
            // Registrar en la tabla orders

            $order = Order::create([
               'id' => $ordId,
               'orderNumber' => $ordId,
               'distributors_id' => $request->distributorId,
               'status_id' => 1

            ]);


            // Recorrer todos los products para ingresarlos a la tabla order_detail
            foreach ($request->products as $product) {
                
                //Obtener id del producto segun codigo herbalife
                $productId = Product::where('productHerbaLifeCode', $product['Id'])->first()->id;
                $productQuantity = $product['Quantity'];

                $detailId = mt_rand();
                $detail = OrderDetail::create([

                    'id' => $detailId, 
                    'order_id'=> $ordId, 
                    'product_id'=> $productId, 
                    'detailQuantity'=> $product['Quantity'], 
                    'detailPrice' => $product['Cost']
                    

                ]);

            }

            //return $request->all();

            DB::commit();
            return json_encode(['status'=> 'success', 'message' => 'Se ha registrado con éxito el pedido!']);

        }
        catch(Exception $e){
            DB::rollBack();
            return ['status' => 'error', 'message' => $e->getMessage()];
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

         $order = Order::from('orders as o')
                         ->join('order_detail as dt', 'dt.order_id', 'o.id')
                         ->join('statuses as st', 'st.id', 'o.status_id')
                         ->join('distributors as d', 'd.id', 'o.distributors_id')
                         ->join('users as u', 'u.id', 'd.user_id')
                         ->where('o.id', $id)
                         ->select(DB::raw('o.id, o.orderNumber as noDoc, sum((dt.detailQuantity) * (dt.detailPrice)) as orderTotal, st.statusName, u.userFirstName, u.userLastName, u.userHerbaLifeCode, DATE_FORMAT(o.created_at, "%d-%m-%Y") as fechaDoc, o.status_id'))
                         ->groupBy('o.id' , 'o.orderNumber', 'st.statusName', 'o.status_id', 'u.userLastName' , 'u.userFirstName', 'u.userHerbaLifeCode', 'o.created_at')
                         ->distinct()
                         ->get();

            if(count($order)==0){

                return redirect('administracion/pedidos');
            }

            $orderTotal = $order[0]->orderTotal;
        
            $orderDetails = OrderDetail::from('order_detail as dt')
                                      ->join('products as p', 'p.id', 'dt.product_id')
                                      ->where('dt.order_id', $id)
                                      ->select(DB::raw('p.productHerbaLifeCode, dt.detailQuantity, p.productName, dt.detailPrice, (dt.detailQuantity *  dt.detailPrice) as subTotal'))
                                      ->get();

            //dd($orderDetails);

         return view('management.orders.order_show', ['order' => $order, 'details'=> $orderDetails, 'orderTotal' => $orderTotal]);       
    }

    /*
    * Mostrar detalles de pedido
    */


    public function distributorOrderDetails($id){

        

        try{

            //Buscar pedido
            $orderData = Order::from('orders as o')
                              ->where('o.id', $id)
                              ->join('statuses as st', 'st.id', 'o.status_id')
                              ->join('order_detail as dt', 'dt.order_id', 'o.id')
                              ->select(DB::raw('o.orderNumber as noDoc, DATE_FORMAT(o.created_at, "%d-%m-%Y") as fechaDoc, st.statusName as statusName, sum((dt.detailQuantity) * (dt.detailPrice)) as orderTotal'))
                              ->groupBy('o.id' , 'o.orderNumber', 'o.created_at','st.statusName', 'o.status_id')
                              ->get();

            $orderDetails = OrderDetail::from('order_detail as dt')
                                      ->join('products as p', 'p.id', 'dt.product_id')
                                      ->where('dt.order_id', $id)
                                      ->select(DB::raw('p.productHerbaLifeCode, dt.detailQuantity, p.productName, dt.detailPrice, (dt.detailQuantity *  dt.detailPrice) as subTotal'))
                                      ->get();

           


            return view('public.orders.order_detail', ['orderData'=>$orderData, 'orderDetails' => $orderDetails]);
        }catch(Exception $e){
            return back()->with(['error'=> $e->getMessage()]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
