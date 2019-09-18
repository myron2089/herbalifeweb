<?php

namespace App\Http\Controllers;

use DB;
use App\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{


            $suppliers = Supplier::from('suppliers as s')
                         ->join('statuses as st', 'st.id', 's.status_id')
                         ->select('s.id', 's.supplierName', 's.supplierHerbaLifeCode', 's.supplierIdentificationNumber', 's.supplierEmail', 's.supplierPhoneNumber', 'st.statusName', 's.status_id')
                         ->get();
            
           
            return view('management.suppliers.suppliers_index', ['suppliers'=>$suppliers]);


        } catch(Exception $e){
            
            return back()->with(['error'=> $e->getMessage()]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try{
            return view('management.suppliers.supplier_create');
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
        DB::beginTransaction();
        try{
            $id = mt_rand();
            //Almacenar registro en la tabla suppliesr
            $supplier =  Supplier::create([
                'id' => $id,
                'supplierHerbaLifeCode' => 'HBLFS-' . $id,
                'supplierIdentificationNumber' => $request->supplierIdentificationNumber,
                'supplierName' => $request->supplierName,
                'supplierEmail' => $request->supplierEmail,
                'supplierPhoneNumber' => $request->supplierPhoneNumber,
                'status_id' => 1,
                ]);

            DB::commit();
            return redirect('administracion/proveedores');
        }
        catch(Exception $e){
            DB::rollBack();
            return back()->with(['error'=> $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function show(Supplier $supplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         try{
             $supplierData = Supplier::from('suppliers as s')
                         ->join('statuses as st', 'st.id', 's.status_id')
                         ->select('s.id', 's.supplierName', 's.supplierHerbaLifeCode', 's.supplierIdentificationNumber', 's.supplierEmail', 's.supplierPhoneNumber', 'st.statusName', 's.status_id')
                         ->get();

            
          
            return view('management.suppliers.supplier_edit', [  'id' => $id,
                                                               'supplierData' => $supplierData,
                                                               
                                                           ]);

        } catch(Exception $e){
            return back()->with(['error' => $e->getMessage()]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        //
        DB::beginTransaction();
        try{
            
            //Almacenar registro en la tabla suppliesr
            $supplier =  Supplier::where('id', $id)
                        ->update([
                        'id' => $id,
                        'supplierIdentificationNumber' => $request->supplierIdentificationNumber,
                        'supplierName' => $request->supplierName,
                        'supplierEmail' => $request->supplierEmail,
                        'supplierPhoneNumber' => $request->supplierPhoneNumber,
                        
                ]);

            DB::commit();
            return redirect('administracion/proveedores');
        }
        catch(Exception $e){
            DB::rollBack();
            return back()->with(['error'=> $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supplier $supplier)
    {
        //
    }

    /*
    * Cambiar estado de proveedor
    */
    public function changeSupplierStatus($id){
        DB::beginTransaction();
        try{


            // Obtener estado actual
            $currStatus = Supplier::where('id', $id)->first()->status_id;

           

            // Estado inactivo 
            $newStatus = 2; 
            $newStatusName = "Incativo";

            // Verificar el estado que viene
            if($currStatus==2){
                $newStatus = 1;
                $newStatusName = "Activo";
            }
            

            //Actualizar el estado del proveedor
            $supplierUpdate = Supplier::where('id', $id)
                    ->update(['status_id' => $newStatus]);
            DB::commit();
            return json_encode(['status'=> 'success', 'message' => 'Se ha cambiado el estado del proveedor exitosamente.', 'newStatus' => $newStatus, 'newStatusName' => $newStatusName]);

        }catch(Exception $e){

            DB::rollBack();
            return json_encode(['status'=> 'error', 'message' => 'Ha ocurrido un error, porfavor, póngase en contacto con el administrador del sistema.']);
        }

    }
}
