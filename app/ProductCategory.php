<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
	public $timestamps = false;
     protected $table="productcategory";
     public function Product(){
     	return $this->hasMany('App\Product','categoryid','id');
     }
     
}
