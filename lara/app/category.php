<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    public  function parent()
    {
    		return $this->belongsTo(category::class,'parent_id');
    }
      public  function products()
    {
    		return $this->hasMany('App\product');
    }
     public static function porn($parent_id,$child_id)
    {
    		$category=category::where('id',$child_id)->where('parent_id',$parent_id)->get();
    		if(!is_null($category)){
    			return true;
    		}else{
    			return false;
    		}
    }
}
