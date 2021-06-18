<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class UserController extends Controller
{
	 public function __construct()
    {
        $this->middleware('auth');
    }
      public function pro()
    {
    	$user= Auth:: user();
    	return view('admin.user.pro',compact('user'));
    }
       public function upload()
    {
    	$user= Auth:: user();
    	return view('admin.user.pro',compact('user'));
    }
}
