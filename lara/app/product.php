<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    public function image()
    {
    	return $this->hasMany('App\productimg');
    }
    
      public function Category()
    {
    	return $this->belongsTo('App\category');
    }
     public function Brand()
    {
    	return $this->belongsTo('App\brand');
    }
}
