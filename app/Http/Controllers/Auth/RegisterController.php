<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */


    public function __construct()
    {
        $this->middleware('guest');
    }
    public function showRegistrationForm($lg) {
        if($lg=="ar"){
        return view('ar.ar_register');
        }
        else {
            return view('auth.register');
        }
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone_number' => ['required','string'],
            'wilaya' => ['required','string'],
            'commune' => ['required','string'],
            'function' => ['required','string'],
            'type_payement'=>['required','string'],
            'Ncompte'=>['required','string'],


        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $val="inactif";       
        $date = Carbon::now();
        $nb=User::where('type_compte','simple')->count();
        if($nb<600){
            $val="actif";       
            $date->addYear();
        }

        if($data['type_inscription']=='particulier'){
        return User::create([
            'type_inscription'=>$data['type_inscription'],
            'name' => $data['name'],
            'prenom' => "   ", 
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'phone_number'=>$data['phone_number'],
            'wilaya' => $data['wilaya'],
            'commune' => $data['commune'],
            'function' => $data['function'],
            'categorie'=>$data['categorie'],
            'type_payement'=>$data['type_payement'],
            'Ncompte'=>$data['Ncompte'],
            'adresse'=>$data['adresse'],
            'state'=>$val,
            'date_valid'=>$date,
            


        ]);
    }
        else{

            return User::create([

                'type_inscription'=>$data['type_inscription'],
                'name' => $data['name'],
                'prenom' => "  ", 
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'phone_number'=>$data['phone_number'],
                'wilaya' => $data['wilaya'],
                'commune' => $data['commune'],
                'categorie'=>$data['categorie'],
                'function' => $data['function'],
                'type_payement'=>$data['type_payement'],
                'Ncompte'=>$data['Ncompte'],
                'adresse'=>$data['adresse'],
                // 'Nif'=>$data['Nif'],
                // 'Rc'=>$data['Rc'],
                'state'=>$val,
                'date_valid'=>$date,
            
    
    
            ]);
        


        }
    }
}
