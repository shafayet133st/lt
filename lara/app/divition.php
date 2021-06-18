<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class divition extends Model
{
     public  function Divition()
    {
    		return $this->belongsTo(category::class,'id');
    }
}
