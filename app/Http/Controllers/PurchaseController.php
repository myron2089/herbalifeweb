<?php

namespace App\Http\Controllers;

use App\Purchase;
use App\Supplier;
use App\Product;
use App\PurchaseDetail;
use App\Stock;
use DB;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class PurchaseController extends Controller
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
            try{


                $purchases = Purchase::from('purchases as p')
                             ->join('users as u', 'u.id', 'p.user_id')
                             ->join('statuses as st', 'st.id', 'p.status_id')
                             ->join('suppliers as s' , 's.id' , 'p.supplier_id')
                             ->join('purchase_detail as dt', 'dt.purchase_id', 'p.id')
                             ->orderBy('p.purchaseDocumentDate', 'desc')
                             ->select(DB::raw('p.id, p.purchaseDocumentNumber as noDoc,  p.purchaseDocumentDate, u.userFirstName, u.userLastName, u.userIdentificationNumber, u.userHerbaLifeCode, u.email, u.userPhoneNumber, s.supplierName, st.statusName, p.status_id, sum((dt.productQuantity) * (dt.productCost)) as purchaseTotal '))
                             ->groupBy('p.id' , 'p.purchaseDocumentNumber',  'p.purchaseDocumentDate', 'u.userFirstName', 'u.userLastName', 'u.userIdentificationNumber', 'u.userHerbaLifeCode', 'u.email', 'u.userPhoneNumber', 's.supplierName', 'st.statusName', 'p.status_id')
                             ->distinct()

                             ->get();

                return view('management.purchases.purchases_index', ['purchases'=>$purchases]);


            } catch(Exception $e){
                
                return back()->with(['error'=> $e->getMessage()]);
            }
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
         //
        try{
            
            $suppliers = Supplier::from('suppliers as s')
                         ->join('statuses as st', 'st.id', 's.status_id')
                         ->where('s.status_id', 1)
                         ->select('s.id', 's.supplierName', 's.supplierHerbaLifeCode', 's.supplierIdentificationNumber', 's.supplierEmail', 's.supplierPhoneNumber', 'st.statusName', 's.status_id')
                         ->get();

            $product = new Product();

            $products = $product->getActiveProducts(); 



            return view('management.purchases.purchase_create', ['suppliers' => $suppliers, 'products' => $products]);
        }catch(Exception $e){
            return back()->with(['error'=> $e->getMessage()]);
        }
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

            $purchaseId = mt_rand();
            // Insertar en tabla purchases
            $purchase = Purchase::create([
                'id' => $purchaseId,
                'purchaseDocumentNumber' => $request->purchaseDocumentNumber,
                'purchaseDocumentDate'=> $request->purchaseDocumentDate,
                'supplier_id' => $request->supplierId,
                'user_id' => Auth::user()->id,
                'status_id' => 1
            ]);
            
            // Insertar en tabla purchase_detail
            foreach ($request->products as $product) {
                
                //Obtener id del producto segun codigo herbalife
                $productId = Product::where('productHerbaLifeCode', $product['Id'])->first()->id;
                $productQuantity = $product['Quantity'];

                $detailId = mt_rand();
                $detail = PurchaseDetail::create([

                    'id' => $detailId, 
                    'purchase_id'=> $purchaseId, 
                    'product_id'=> $productId, 
                    'productQuantity'=> $product['Quantity'], 
                    'productCost'=> $product['Cost'], 
                    'productPrice' => $product['Price'], 
                    'status_id' => 1,

                ]);

                /* Buscar el producto en stock y actualizarlo*/

                $checkStock = Stock::from('stock as s')
                                   ->join('purchase_detail as dt', 'dt.id', 's.purchase_detail_id')
                                   ->where('dt.product_id', $productId)
                                   ->where('s.status_id', 1)
                                   ->select('s.currentQuantity')
                                   ->get();

                // Verificar si existia previamente el producto 
                if(count($checkStock)>0){
                    $updateLastStock = Stock::from('stock as s')
                                   ->join('purchase_detail as dt', 'dt.id', 's.purchase_detail_id')
                                   ->where('dt.product_id', $productId)
                                   ->where('s.status_id', 1)
                                   ->update(['s.status_id'=>2]);

                    $productQuantity = $productQuantity + $checkStock[0]->currentQuantity;
                }

                $stock = Stock::create([
                    'id' => mt_rand(),
                    'currentQuantity' => $productQuantity,
                    'stockIn' => $product['Quantity'],
                    'purchase_detail_id' => $detailId,
                    'balancedPrice' => $product['Price'],
                    'status_id' => 1
                ]);

                
            }


            DB::commit();
            return json_encode(['status'=> 'success', 'message' => 'Se ha registrado con éxito la compra!']);

        }
        catch(Exception $e){
            DB::rollBack();
            return ['status' => 'error', 'message' => $e->getMessage()];
        }
       
      
    }

    /*
    * Registrar nueva compra
    */

    public function storePurchase(Request $request){

         
         
         return response()->json(['success'=>'Got Simple Ajax Request.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        try{
            $purchase = Purchase::from('purchases as p')
                                 ->join('suppliers as s', 's.id', 'p.supplier_id')                 
                                 ->where('p.id', $id)
                                 ->get();

            $details = PurchaseDetail::from('purchase_detail as dt')
                                      ->join('products as p', 'p.id', 'dt.product_id')
                                      ->where('dt.purchase_id', $id)
                                      ->select(DB::raw('p.productHerbaLifeCode, dt.productQuantity, p.productName, dt.productCost, dt.productPrice, (dt.productQuantity *  dt.productCost) as subTotal'))
                                      ->get();

            $purchaseTotal = PurchaseDetail::select(DB::raw('sum(productQuantity *  productCost) as total'))->where('purchase_id', $id)->first()->total;
            
             return view('management.purchases.purchase_show', ['purchase' => $purchase, 'purchaseTotal' => $purchaseTotal, 'details' => $details]);

        } catch(Exception $e){
            
            return ['status' => 'error', 'message' => $e->getMessage()];
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function edit(Purchase $purchase)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Purchase $purchase)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function destroy(Purchase $purchase)
    {
        //
    }
}
