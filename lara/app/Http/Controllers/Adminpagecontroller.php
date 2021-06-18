<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\product;
use App\productimg;
use Image;

class Adminpagecontroller extends Controller
{
     public function index()
    {
    	return view('admin.index');
    }
     public function soft()
    {
        return view('admin.soft');
    }
    public function product()
    {
    	$products = product::orderBy('id','desc')->get();
    	return view('admin.product')->with('products',$products);
    } 
    public function edit($id)
    {
    	$product = product::find($id);
    	return view('admin.page.edit')->with('product',$product);
    }
    public function create()
    {
    	return view('admin.create');
    }
     public function pstore(Request $request)
    {
    	$request->validate([
        'name' => 'required|max:255',
        'description' => 'required',
        'price' => 'required',
        'quantity' => 'required',
         'cat_id' => 'required',
        'Brand_id' => 'required',
    
]);




    	$product= new product;
    	$product->name= $request->name;
    	$product->description=$request->description;
    	$product->price= $request->price;
    	$product->quantity= $request->quantity;

        $product->slug=str_slug($request->name);
    	$product->category_id=$request->cat_id;
    	$product->brand_id=$request->Brand_id;
    	$product->admin_id=1;
    	$product->save();

    	// product img

    	/**if ($request->hasFile('pimg')) {
    		$image=$request->file('pimg');
    		$img= time().'.'.$image->getClientOriginalExtension();
    		$location=public_path('images/producti/'.$img);
    		Image::make($image)->save($location);

    		$pimg= new productimg;
    		$pimg->product_id=$product->id;
    		$pimg->img=$img;
    		$pimg->save();

    	} */
    	/*if ($request->hasFile('pimg')) {
          foreach ($request->pimg as $image) {
        
    	
    		$img= time().'.'.$image->getClientOriginalExtension();
    		$location=public_path('images/producti/'.$img);
            
    		Image::make($image)->save($location);

    		$pimg= new productimg;
    		$pimg->product_id=$product->id;
    		$pimg->img=$img;
    		$pimg->save();
    		}
    		
    	}*/
        if($request->hasFile('pimg')){
            $image=$request->file('pimg');
            $array=count($image);
            for($i=0; $i<$array; $i++) {
               $img1=$image[$i]->getClientsize(); 
               $img=$image[$i]->getClientOriginalExtension();
               $newi=rand(123456,999999).".".$img;
            $location=public_path('images/producti/');
            
            $image[$i]->move($location,$newi);

            $pimg= new productimg;
            $pimg->product_id=$product->id;
            $pimg->img=$newi;
            $pimg->save();
            }

        }

    	return redirect()->route('admin.create');
    }



        public function pupdate(Request $request,$id)
    {
    




    	$product= product::find($id);
    	$product->name= $request->name;
    	$product->description=$request->description;
    	$product->price= $request->price;
    	$product->quantity= $request->quantity;
        $product->category_id=$request->cat_id;
        $product->brand_id=$request->Brand_id;
    	$product->save();

    	// product img

    	/**if ($request->hasFile('pimg')) {
    		$image=$request->file('pimg');
    		$img= time().'.'.$image->getClientOriginalExtension();
    		$location=public_path('images/producti/'.$img);
    		Image::make($image)->save($location);

    		$pimg= new productimg;
    		$pimg->product_id=$product->id;
    		$pimg->img=$img;
    		$pimg->save();

    	} */
    	

    	return redirect()->route('admin.product');
    }
    public function pdelete($id)
    {
    	$product=product::find($id);
    	
    	if (!is_null($product)){

    		$product->delete();

    	}
        session()->flash('success', 'Product has Delete Successfully');
    	return back();
    }
}