<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    public function image()
    {
    	return $this->hasMany(productimg);
    }
     public function Category()
    {
    	return $this->belongsTo(category::class,"category_id");
    }
     public function Brand()
    {
    	return $this->belongsTo(brand::class);
    }
}
