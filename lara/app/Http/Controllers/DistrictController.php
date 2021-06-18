<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\District;
class DistrictController extends Controller
{
   public function index()
    {
        $District=District::OrderBy('name','asc')->get();
        return view('admin.District.index', compact('District'));
    }
      public function edit($id)
    { 
        
        $District = District::find($id);
        if (!is_null($District)) {
            return view('admin.District.edit', compact('District'));
        }else{
            return resirect()->route('admin.District');
        }
        
    } 
      public function create()
    {
        
        return view('admin.District.create');
    }
      public function dstore(Request $request)
    {
         $this->validate($request,[
        'name'=>'required',
        'Divition_id'=>'required',
    ],
    [
    'name.required'=>'Please provide a District name',
    'Divition_id.required'=>'Please provide a valid Divition',
    ]
);
        $District = new District();
        $District->name=$request->name;
        $District->Divition_id=$request->Divition_id; 
       $District->save();
      session ()->flash ('success', 'A new District has added successfully');
    return redirect()->route('admin.District.index');
     
            
    }
   public function update(Request $request,$id)
    {
         $this->validate($request,[
        'name'=>'required',
        'Divition_id'=>'required',
    ],
    [
    'name.required'=>'Please provide a District name',
    'Divition_id.required'=>'Please provide a valid Priroryty',
    ]
);
        $District =District::find($id);
        $District->name=$request->name;
        $District->Divition_id=$request->Divition_id;
        // delete old image

      
            $District->save();
      session ()->flash ('success', 'District has Updated successfully');
    return redirect()->route('admin.District.index');
     
            
    }   
     public function delete($id)
    {
        $District=District::find($id);
        
        if (!is_null($District)){

            $District->delete();
}
        session()->flash('success', 'District has Delete Successfully');
        return back();
    }
}
