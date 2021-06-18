<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Divition;

class DivitionController extends Controller
{
     public function index()
    {
    	$Divition=Divition::OrderBy('priority','asc')->get();
    	return view('admin.Divition.index', compact('Divition'));
    }
      public function edit($id)
    { 
    	
    	$Divition = Divition::find($id);
    	if (!is_null($Divition)) {
    		return view('admin.Divition.edit', compact('Divition'));
    	}else{
    		return resirect()->route('admin.Divition');
    	}
    	
    } 
      public function create()
    {
    	
    	return view('admin.Divition.create');
    }
      public function distore(Request $request)
    {
    	 $this->validate($request,[
    	'name'=>'required',
    	'priority'=>'required',
    ],
    [
    'name.required'=>'Please provide a Divition name',
    'priority.required'=>'Please provide a valid Priroryty',
    ]
);
    	$Divition = new Divition();
    	$Divition->name=$request->name;
    	$Divition->priority=$request->priority; 
	   $Divition->save();
      session ()->flash ('success', 'A new Divition has added successfully');
    return redirect()->route('admin.Divition.index');
     
    		
    }
   public function update(Request $request,$id)
    {
    	 $this->validate($request,[
    	'name'=>'required',
    	'priority'=>'required',
    ],
    [
    'name.required'=>'Please provide a Divition name',
    'priority.required'=>'Please provide a valid Priroryty',
    ]
);
    	$Divition =Divition::find($id);
    	$Divition->name=$request->name;
    	$Divition->description=$request->description;
    	// delete old image

    	//image add
       if($request->image!=NULL){
    if (File::exists('images/Divition/'.$Divition->img)) {
    	File::delete('images/Divition/'.$Divition->img);

    }
    		$image=$request->file('image');
    		
    		$img= time().'.'.$image->getClientOriginalExtension();
    		$location=public_path('images/Divition /'.$img);
    		Image::make($image)->save($location);
    		$Divition->img=$img;
     
        }
    		$Divition->save();
      session ()->flash ('success', 'Divition has Updated successfully');
    return redirect()->route('admin.Divition.index');
     
    		
    }   
     public function delete($id)
    {
    	$Divition=Divition::find($id);
    	
    	if (!is_null($Divition)){

    		$Divition->delete();
}
        session()->flash('success', 'Divition has Delete Successfully');
    	return back();
    }
}
