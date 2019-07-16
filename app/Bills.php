<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;
use App\BillDetail;
class Bills extends Model
{
    //
    public $timestamps = false;
    protected $table="bills";
     public function billdetail(){
     	return $this->hasMany('App\BillDetail','idbill','id');
     }
     public function customer(){
     	return $this->belongsTo('App\Customer','customid','id');
     }
     public function product(){
     	return $this->belongstoMany('App\Product','billdetail','idbill','idproduct');
     }
     
}
