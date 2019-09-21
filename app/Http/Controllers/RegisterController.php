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


            $checkEmail = User::where('email', $request->userEmail)->count();

            $checkHbCode = User::where('userHerbaLifeCode', $request->referedId)->select('id')->count();
            
            // Verificar si el codigo de distribuidor ingresado es correcto
            if($checkHbCode <=0){
                 return redirect()->back()->withInput($request->all())->with(['status'=>'error', 'message' => 'El código de asociado ingresado no se encuentra en nuestros registros']);
            
            }

            //dd($checkEmail);
            if($checkEmail==0){

                $referedId = User::where('userHerbaLifeCode', $request->referedId)->select()->first()->id;

                
                $id = mt_rand();
                $user =  User::create([
                    'id' => $id,
                    'userFirstName' => $request->userFirstName,
                    'userLastName' => $request->userLastName,
                    'userAddress' => $request->userAddress,
                    'userPhoneNumber' => $request->userPhoneNumber,
                    'userHerbaLifeCode' =>  'HBLD-' . $id,
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
                    'distributor_referred_id' => $referedId, 
                    'user_id' => $id, 
                    'status_id' => 0

                ]);
                DB::commit();
                return redirect('login')->withInput($request->all())->with(['status'=> 'registered', 'message' => 'Distribuidor registrado con éxito<br>Puedes iniciar sesión para acceder a tu perfil.']);
            }
            else{
                return redirect()->back()->withInput($request->all())->with(['status'=>'error', 'message' => 'El email que ingresó ya se encuentra registrado en nuestro sistema']);
            }
        }
        catch(Exception $e){
            DB::rollBack();
            return back()->with(['error'=> $e->getMessage()]);
        }


    }


    public function distributorRegistered(){


    }
}
