<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\UserType;
use App\State;
use App\City;

use Auth;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // Seleccionar usuarios registrados

        try{


            $users = User::from('users as u')
                         ->join('user_type as ut', 'ut.id', 'u.user_type_id')
                         ->join('statuses as st', 'st.id', 'u.status_id')
                         ->join('cities as c', 'c.id', 'u.city_id')
                         ->join('states as s', 's.id', 'c.state_id')
                         ->where('u.id', '!=', Auth::user()->id)
                         ->select('u.id', 'u.email', 'u.userFirstName', 'u.userLastName', 'u.userAddress', 'u.userIdentificationNumber', 'city_id', 'st.statusName', 'ut.userTypeName', 'c.cityName', 's.stateName')
                         ->get();

            return view('management.users.users_index', ['users'=>$users]);


        } catch(Exception $e){
            return back();
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
        $states = State::select('id', 'stateName')->orderBy('stateName', 'asc')->get();
        $userTypes = UserType::where('id', '!=', 2)->select('id', 'userTypeName')->get();

        return view('management.users.users_create', ['states'=> $states, 
                                                      'userTypes'=>$userTypes
        ]);
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
                'password' => Hash::make("ps".$id."wrd"),
                'user_type_id' => $request->userType
                ]);

            return redirect('administracion/usuarios');
        }
        catch(Exception $e){
            return back()->with(['error'=> $e->getMessage()]);
        }
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        try{
            $userData = User::from('users as u')
                            ->join('cities as c', 'c.id', 'u.city_id')
                            ->join('states as s', 's.id', 'c.state_id')
                            ->where('u.id', $id)
                            ->select('u.id', 'u.email', 'u.password', 'u.userFirstName', 'u.userLastName','u.userAddress', 'u.userPhoneNumber', 'u.userIdentificationNumber', 'u.userHerbaLifeCode', 'u.user_create', 'u.city_id', 'u.status_id', 'u.user_type_id', 's.id as state_id')
                            ;

            $states = State::select('id', 'stateName')->orderBy('stateName', 'asc')->get();



            $cities = City::where('state_id',  $userData->pluck('state_id'))->select('id', 'cityName')->get();


            $userTypes = UserType::where('id', '!=', 2)->select('id', 'userTypeName')->get();

            return view('management.users.user_edit', ['id' => $id,
                                                       'userData' => $userData->get(),
                                                       'states' => $states, 
                                                       'cities' => $cities,
                                                       'userTypes'=>$userTypes]);

        } catch(Exception $e){
            return back()->with(['error' => $e->getMessage()]);
        }

        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

       
        try{

            User::where('id', $id)
                ->update(['userFirstName' => $request->userFirstName,
                          'userLastName' => $request->userLastName,
                          'userAddress' => $request->userAddress,
                          'userPhoneNumber' => $request->userPhoneNumber,
                          //'userHerbaLifeCode' => 'HBLF-' . $id,
                          'userIdentificationNumber' => $request->userDpi,
                          //'user_create' => Auth::user()->userFirstName,
                          'city_id' => $request->city,
                          //'status_id' => 1,
                          'email' => $request->userEmail,
                          //'password' => Hash::make("ps".$id."wrd"),
                          'user_type_id' => $request->userType]);


            return redirect('administracion/usuarios');    

        } catch(Exception $e){
             return back()->with(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
