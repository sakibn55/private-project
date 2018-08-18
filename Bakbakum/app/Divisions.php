<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Divisions extends Model
{
    public function district(){
    	return $this->belongsToMany('App\District');
    }
    public function product(){
        return $this->belongsToMany('App\Products','divisions_product');
    }

}
