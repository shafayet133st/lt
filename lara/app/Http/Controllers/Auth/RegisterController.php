<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use App\District;
use App\Divition;
use App\Notifications\verifyreg;
use App\productimg;
use Image;

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
    protected $redirectTo = '/register';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
     public function showRegistrationForm()
    {
        $District=District::OrderBy('name','asc')->get();
        $Divition=Divition::OrderBy('priority','asc')->get();

        return view('auth.register', compact('District','Divition'));
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
     
            'f_name' => ['required', 'string', 'max:50'],
            'l_name' => ['required', 'string', 'max:50'],
             'p_number' => ['required', 'max:11'],
            'email' => ['required', 'string', 'email', 'max:100', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
             'Divition_id' => ['required', 'numeric'],
             'District_id' => ['required', 'numeric'],
             'street_address' => ['required', 'max:110'],

        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function register(Request $request)
    { 
        
       $user= User::create([
       
            'f_name' => $request->f_name,
            'l_name' => $request->l_name,
            'u_name' => str_slug($request->f_name.$request->l_name),
            'p_number' => $request->p_number,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'street_address' => $request->street_address,
            'Division_id' => $request->Divition_id,
            'District_id' => $request->District_id,
            'ip_address' => request()->ip(),
            'remember_token' => str_random(50),
            'status' => 0,

        ]);

      $user-> notify (new verifyreg ($user) );

       session()->flash('success','A Confirmation Email has sent to you.. please check and Confirma ');
       return redirect('/');
    }
}
