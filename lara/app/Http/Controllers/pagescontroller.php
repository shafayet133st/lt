<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\product;


class pagescontroller extends Controller
{
    public function index()
    {
        $products = product::orderBy('id','desc')->paginate(20);
    	return view('index')->with('products',$products);
    }
  public function search(Request $request)
    {
        $search=$request->search;
        $products = product::orwhere('name','like','%'.$search.'%')
        ->orwhere('description','like','%'.$search.'%')
         ->orwhere('price','like','%'.$search.'%')
        ->orderBy('id','desc')
        ->paginate(20);

        return view('search', compact('search','products'));
    }
     public function products()
    {
    	$products = product::orderBy('id','desc')->get();
    	return view('re.product.index')->with('products',$products);
    }
    public function Contact()
    {
    	return view('Contact');
    }
     public function show($slug)
    {
        $products = product::where('slug', $slug)->first();
        if (!is_null($products)) {
            return view('re.product.show')->with('products',$products);
    }        
        else{
            session()->flash('errors','Sorry !! There is no Product by this URL... ');
            return redirect()->route('products');
        }
    }   
}
