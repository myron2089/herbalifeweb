<?php

namespace App\Http\Controllers;
use DB;
use App\User;
use App\Distributor;
use App\State;
use App\Sale;
use App\Order;
use App\City;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class DistributorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        try{


            $distributors = Distributor::from('distributors as d')
                         ->join('users as u', 'u.id', 'd.user_id')
                         ->join('statuses as st', 'st.id', 'd.status_id')
                         ->where('user_type_id', 2)
                         ->select('d.id', 'u.userFirstName', 'u.userLastName', 'u.userIdentificationNumber', 'u.userHerbaLifeCode', 'u.email', '.u.userPhoneNumber', 'st.statusName', 'd.status_id')
                         ->get();
            
           
            return view('management.distributors.distributors_index', ['distributors'=>$distributors]);


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
        //
        try{
            $states = State::select('id', 'stateName')->orderBy('stateName', 'asc')->get();

            $distributors = Distributor::from('distributors as d')
                         ->join('users as u', 'u.id', 'd.user_id')
                         ->join('statuses as st', 'st.id', 'd.status_id')
                         ->where ('u.status_id', 1)
                         ->where('u.user_type_id', 2)
                         ->select('d.id', 'u.userFirstName', 'u.userLastName', 'u.userHerbaLifeCode')
                         ->get();

            return view('management.distributors.distributor_create', ['states' => $states, 'distributors' => $distributors]);
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

            $id = mt_rand();
            $user =  User::create([
                'id' => $id,
                'userFirstName' => $request->userFirstName,
                'userLastName' => $request->userLastName,
                'userAddress' => $request->userAddress,
                'userPhoneNumber' => $request->userPhoneNumber,
                'userHerbaLifeCode' => 'HBLF-' . $id,
                'userIdentificationNumber' => $request->userDpi,
                'user_create' => Auth::user()->userFirstName,
                'city_id' => $request->city,
                'status_id' => 1,
                'email' => $request->userEmail,
                'password' => Hash::make("Test@1234"),
                'user_type_id' => $request->userType
                ]);

            $distributor = Distributor::create([
                'id' => $id, 
                'distributor_referred_id' => $request->referedId, 
                'user_id' => $id, 
                'status_id' => 1

            ]);
            DB::commit();
            return redirect('administracion/distribuidores');
        }
        catch(Exception $e){
            DB::rollBack();
            return back()->with(['error'=> $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Distributor  $distributor
     * @return \Illuminate\Http\Response
     */
    public function show(Distributor $distributor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Distributor  $distributor
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        try{
            $distributor = Distributor::from('distributors as d')
                         ->join('users as u', 'u.id', 'd.user_id')
                         ->join('cities as c', 'c.id', 'u.city_id')
                         ->join('statuses as st', 'st.id', 'd.status_id')
                         ->join('states as s', 's.id', 'c.state_id')
                         ->where('user_type_id', 2)
                         ->where('d.id', $id)
                         ->select('d.id', 'u.userFirstName', 'u.userLastName', 'u.userIdentificationNumber', 'u.userHerbaLifeCode', 'u.email', '.u.userPhoneNumber', 'st.statusName', 'd.status_id', 'u.city_id', 'd.distributor_referred_id', 'u.userAddress', 'u.city_id', 's.id as state_id')
                         ->get();

            $distributors = Distributor::from('distributors as d')
                         ->join('users as u', 'u.id', 'd.user_id')
                         ->join('statuses as st', 'st.id', 'd.status_id')
                         ->where ('u.status_id', 1)
                         ->where('u.user_type_id', 2)
                         ->where('d.id', '!=', $id)
                         ->select('d.id', 'u.userFirstName', 'u.userLastName', 'u.userHerbaLifeCode')
                         ->get();

            
            $states = State::select('id', 'stateName')->orderBy('stateName', 'asc')->get();

            $cities = City::where('state_id',  $distributor->pluck('state_id'))->select('id', 'cityName')->get();

            

            //dd($distributor[0]->state_id);


            return view('management.distributors.distributor_edit', [  'id' => $id,
                                                               'distributorData' => $distributor,
                                                               'distributors' => $distributors,
                                                               'states' => $states,
                                                               'cities' => $cities
                                                           ]);
        } catch(Exception $e){
            return back()->with(['error' => $e->getMessage()]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Distributor  $distributor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        DB::beginTransaction();
        try{

            $user =  User::where('id', $id)
                ->update([
                'userFirstName' => $request->userFirstName,
                'userLastName' => $request->userLastName,
                'userAddress' => $request->userAddress,
                'userPhoneNumber' => $request->userPhoneNumber,
                'userIdentificationNumber' => $request->userDpi,
                'city_id' => $request->city,
                'email' => $request->userEmail
                ]);

            $distributor = Distributor::where('id', $id)
                ->update([
                'distributor_referred_id' => $request->referedId, 
            ]);
            DB::commit();
            return redirect('administracion/distribuidores');

        } catch(Exception $e){
            DB::rollBack();
            return back()->with(['error' => $e->getMessage()]);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Distributor  $distributor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Distributor $distributor)
    {
        //


    }


    /*
    * Cambiar estado de distribuidores
    */
    public function changeDistributorStatus($id){
        DB::beginTransaction();
        try{


            // Obtener estado actual
            $currStatus = Distributor::where('id', $id)->first()->status_id;

           

            // Estado inactivo 
            $newStatus = 2; 
            $newStatusName = "Incativo";

            // Verificar el estado que viene
            if($currStatus==2){
                $newStatus = 1;
                $newStatusName = "Activo";
            }
            

            //Actualizar el estado del proveedor
            $distributorUpdate = Distributor::where('id', $id)
                    ->update(['status_id' => $newStatus]);
            DB::commit();
            return json_encode(['status'=> 'success', 'message' => 'Se ha cambiado el estado del distribuidor exitosamente.', 'newStatus' => $newStatus, 'newStatusName' => $newStatusName]);

        }catch(Exception $e){

            DB::rollBack();
            return json_encode(['status'=> 'error', 'message' => 'Ha ocurrido un error, porfavor, póngase en contacto con el administrador del sistema.']);
        }

    }




    /*
    * Distribuidor Autenticado
    */

    public function getDistributorSideHomePage(){



         $sales = Sale::from('sales as s')
                     ->join('distributors as d', 'd.id', 's.distributor_id')
                     ->join('users as u', 'u.id', 'd.user_id')
                     ->join('statuses as st', 'st.id', 's.status_id')
                     ->where('s.distributor_id', Auth::user()->id)
                     ->select(DB::raw('s.id as noDoc, u.userHerbaLifeCode, u.userFirstName, u.userLastName, s.saleTotal, date_format(s.created_at, "%d-%m-%Y") as fechaDoc, st.statusName'))
                     ->orderBy('s.created_at', 'desc')
                     ->take(5)
                     ->get();

                      $orders = Order::from('orders as o')
                         ->where('distributors_id',  Auth::user()->id)
                         ->join('order_detail as dt', 'dt.order_id', 'o.id')
                         ->join('statuses as st', 'st.id', 'o.status_id')
                         ->select(DB::raw('o.id, o.orderNumber as noDoc, sum((dt.detailQuantity) * (dt.detailPrice)) as orderTotal, st.statusName'))
                         ->groupBy('o.id' , 'o.orderNumber', 'st.statusName', 'o.status_id')
                         ->distinct()
                         ->take(5)
                         ->get();

        return view('public.distributors.distributor_home', ['sales' => $sales, 'orders'=> $orders]);

    }
}
