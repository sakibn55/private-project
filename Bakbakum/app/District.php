<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
     public function divisions(){
    	return $this->belongsToMany('App\Divisions');
    }
}
