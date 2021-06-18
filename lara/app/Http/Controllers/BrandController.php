<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Brand;
use Image;
use File;

class BrandController extends Controller
{
    public function index()
    {
    	$Brand= Brand::OrderBy('id','desc')->get();
    	return view('admin.Brand.index', compact('Brand'));
    }
      public function edit($id)
    { 
    	
    	$Brand = Brand::find($id);
    	if (!is_null($Brand)) {
    		return view('admin.Brand.edit', compact('Brand'));
    	}else{
    		return resirect()->route('admin.Brand');
    	}
    	
    } 
      public function create()
    {
    	
    	return view('admin.Brand.create');
    }
      public function bstore(Request $request)
    {
    	 $this->validate($request,[
    	'name'=>'required',
    	'image'=>'nullable|image',
    ],
    [
    'name.required'=>'Please provide a Brand name',
    'image.image'=>'Please provide a valid image with .jpg,.png.gf extension...',
    ]
);
    	$Brand = new Brand();
    	$Brand->name=$request->name;
    	$Brand->description=$request->description; 
    	//image add
    	
    		$image=$request->file('image');
    		
    		$img= time().'.'.$image->getClientOriginalExtension();
    		$location=public_path('images/Brand/'.$img);
    		Image::make($image)->save($location);
    		$Brand->img=$img;

             

    		$Brand->save();
      session ()->flash ('success', 'A new Brand has added successfully');
    return redirect()->route('admin.Brand.index');
     
    		
    }
   public function update(Request $request,$id)
    {
    	 $this->validate($request,[
    	'name'=>'required',
    	'image'=>'nullable|image',
    ],
    [
    'name.required'=>'Please provide a Brand name',
    'image.image'=>'Please provide a valid image with .jpg,.png.gf extension...',
    ]
);
    	$Brand =Brand::find($id);
    	$Brand->name=$request->name;
    	$Brand->description=$request->description;
    	// delete old image

    	//image add
       if($request->image!=NULL){
    if (File::exists('images/Brand/'.$Brand->img)) {
    	File::delete('images/Brand/'.$Brand->img);

    }
    		$image=$request->file('image');
    		
    		$img= time().'.'.$image->getClientOriginalExtension();
    		$location=public_path('images/Brand /'.$img);
    		Image::make($image)->save($location);
    		$Brand->img=$img;
     
        }
    		$Brand->save();
      session ()->flash ('success', 'Brand has Updated successfully');
    return redirect()->route('admin.Brand.index');
     
    		
    }   
     public function delete($id)
    {
    	$Brand=Brand::find($id);
    	
    	if (!is_null($Brand)){
    	//Delete Brand image
    	if (File::exists('images/Brand /'.$Brand->img)) {
    	File::delete('images/Brand /'.$Brand->img);

    }	

    		$Brand->delete();

    	}
        session()->flash('success', 'Brand has Delete Successfully');
    	return back();
    }
     
}
