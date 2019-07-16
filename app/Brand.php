<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
	// public $timestamps = false;
    protected $table="brand";

    protected $fillable = ['id','name','metatitle'];
    
    public function Product(){
     	return $this->hasMany('App\Product','brandid','id');
     }
     
    
}
