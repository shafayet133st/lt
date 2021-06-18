<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Notifications\verifyreg;
use App\User;
use Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = 'admin';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function login(Request $request)
    {
      $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
      $user = User::where ('email',$request->email)->first();
      if($user->status == 1) {
        if (Auth::guard('web')->attempt(['email' => $request->email, 'password' =>$request->password],$request->remember)) {
           return redirect()->intended(route('admin.index'));
        }
      } else {
        if (!is_null($user)) {
           $user-> notify (new verifyreg ($user) );
            session()->flash('success','A  New Confirmation Email has sent to you.. please check and Confirma ');
       return redirect('/');
        }
        else{
               session()->flash('erorr','Please first Register  ');
       return redirect()->route('register');
        }
    }

    }
}
