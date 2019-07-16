<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	public $timestamps = false;
    protected $table="product";

    public function brand(){
     	return $this->belongsTo('App\Brand','brandid','id');
     }
     public function productcategory(){
     	return $this->belongsTo('App\ProductCategory','categoryid','id');
     }
      public function billdetail(){
     	return $this->hasMany('App\BillDetail','idproduct','id');
     }
     public function comment(){
        return $this->hasMany('App\Comment','idproduct','id');
     }
}
