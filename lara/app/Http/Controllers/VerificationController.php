<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class VerificationController extends Controller
{
   public function index($token)
    {
    	$user= User ::where('remember_token',$token)->first();
    	if (!is_null($user)) {
    	$user->status= 1;
    	$user->remember_token= NULL;
    	$user->save();
    	session()->flash('success', 'You are Register Successfully!! log in');
    	return redirect('login');
    	}
    	else{
    		session()->flash('errors', 'Sorry You are not Register Successfully!! Try again');
    	return redirect('/');

    	}
    	
    }
}
