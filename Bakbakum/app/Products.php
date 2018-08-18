<?php

namespace App;
use App\Images;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
	public function images(){
    	return $this->belongsToMany('App\Images','product_image');
    }
    public function district(){
    	return $this->belongsToMany('App\District','district_product');
    }
    public function division(){
    	return $this->belongsToMany('App\Divisions');
    }
    public function thana(){
        return $this->belongsToMany('App\Thana','product_thana');
    }    
    public function categories(){
    	return $this->belongsToMany('App\Categories','categories_product');
    }
    public function user(){
        return $this->belongsToMany('App\User','product_user');
    }
}
