<?php

namespace App\Http\Controllers;

use App\category;
use Illuminate\Http\Request;

class Cat extends Controller
{
      public function index()
    {
        

   }
  
    public function show($id)
    {
       $cata=category::find($id);
       if(!is_null($cata)){
        return view('page.fcat.show')->with('cata',$cata);
       
       }else{
        session()->flash('errors','sorry !! there is no category by this name');
        return redirect('/');
       }

    }
   
}
