<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BillDetail extends Model
{
    //
    public $timestamps = false;
    protected $table="billdetail";
    public function product(){
     	return $this->belongsTo('App\Product','idproduct','id');
     }
     public function bills(){
     	return $this->belongsTo('App\Bills','idbill','id');
     }
}
