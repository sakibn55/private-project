<?php

namespace App;
use App\Products;
use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    public function product(){
    	return $this->belongsToMany('App\Products','product_image');
    }
}
