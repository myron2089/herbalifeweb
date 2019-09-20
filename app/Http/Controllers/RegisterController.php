<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Distributor;
use App\User;
use App\State;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    //

    public function distributorRegister(Request $request){

    	
    	try{
            $states = State::select('id', 'stateName')->orderBy('stateName', 'asc')->get();


            return view('public.distributors.distributor_register', ['states' => $states]);
        }catch(Exception $e){
            return back()->with(['error'=> $e->getMessage()]);
        }

    }

    public function distributorStore(Request $request){

    	

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
                'user_create' => $request->userFirstName,
                'city_id' => $request->city,
                'status_id' => 1,
                'email' => $request->userEmail,
                'password' => Hash::make($request->userPassword),
                'user_type_id' => 2
                ]);

            $distributor = Distributor::create([
                'id' => $id, 
                'distributor_referred_id' => $request->referedId, 
                'user_id' => $id, 
                'status_id' => 0

            ]);
            DB::commit();
            return redirect('login')->with(['status'=> 'registered', 'message' => 'Distribuidor registrado con éxito<br>Puedes iniciar sesión para acceder a tu perfil.']);
        }
        catch(Exception $e){
            DB::rollBack();
            return back()->with(['error'=> $e->getMessage()]);
        }


    }


    public function distributorRegistered(){


    }
}
