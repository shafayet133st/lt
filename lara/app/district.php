<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class district extends Model
{
      public function Divition()
    {
    	return $this->belongsTo(divition::class);
    }
}
