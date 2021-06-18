<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\category;
use Image;
use File;

class CategoryController extends Controller
{
    public function index()
    {
    	$Categories= category::OrderBy('id','desc')->get();
    	return view('admin.cat.index', compact('Categories'));
    }
      public function edit($id)
    { 
    	$Cat= category::OrderBy('id','desc')->where('parent_id', NULL)->get();
    	$cat = category::find($id);
    	if (!is_null($Cat)) {
    		return view('admin.cat.edit', compact('cat', 'Cat'));
    	}else{
    		return resirect()->route('admin.cat');
    	}
    	
    }
      public function create()
    {
    	$Cat= category::OrderBy('id','desc')->where('parent_id', NULL)->get();
    	return view('admin.cat.create', compact('Cat'));
    }
      public function cstore(Request $request)
    {
    	 $this->validate($request,[
    	'name'=>'required',
    	'image'=>'nullable|image',
    ],
    [
    'name.required'=>'Please provide a category name',
    'image.image'=>'Please provide a valid image with .jpg,.png.gf extension...',
    ]
);
    	$category = new Category();
    	$category->name=$request->name;
    	$category->description=$request->description;
    	$category->parent_id=$request->parent_id;
    	//image add
    	
    		$image=$request->file('image');
    		
    		$img= time().'.'.$image->getClientOriginalExtension();
    		$location=public_path('images/cat/'.$img);
    		Image::make($image)->save($location);
    		$category->img=$img;

             

    		$category->save();
      session ()->flash ('success', 'A new category has added successfully');
    return redirect()->route('admin.cat.index');
     
    		
    }
   public function cupdate(Request $request,$id)
    {
    	 $this->validate($request,[
    	'name'=>'required',
    	'image'=>'nullable|image',
    ],
    [
    'name.required'=>'Please provide a category name',
    'image.image'=>'Please provide a valid image with .jpg,.png.gf extension...',
    ]
);
    	$category =Category::find($id);
    	$category->name=$request->name;
    	$category->description=$request->description;
    	$category->parent_id=$request->parent_id;

    	// delete old image

    	//image add
        if($request->image!=NULL){
    if (File::exists('images/cat/'.$category->img)) {
    	File::delete('images/cat/'.$category->img);

    }
    		$image=$request->file('image');
    		
    		$img= time().'.'.$image->getClientOriginalExtension();
    		$location=public_path('images/cat/'.$img);
    		Image::make($image)->save($location);
    		$category->img=$img;
     
         }
    		$category->save();
      session ()->flash ('success', 'Category has Updated successfully');
    return redirect()->route('admin.cat.index');
     
    		
    }   
     public function cdelete($id)
    {
    	$category=Category::find($id);
    	
    	if (!is_null($category)){
    	//if it is parent category then delete sub category
    	if ($category->parent_id== NULL) {
    		$sub_Cat= category::OrderBy('id','desc')->where('parent_id', $category->id)->get();
    		foreach ($sub_Cat as $cat) {
    			//Delete category image
    	if (File::exists('images/cat/'.$cat->img)) {
    	File::delete('images/cat/'.$cat->img);

    }
    			$cat->delete();
    		}
    	}
    	//Delete category image
    	if (File::exists('images/cat/'.$category->img)) {
    	File::delete('images/cat/'.$category->img);

    }	

    		$category->delete();

    	}
        session()->flash('success', 'Category has Delete Successfully');
    	return back();
    }
     
}
