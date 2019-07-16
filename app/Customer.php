<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //
    public $timestamps = false;
    protected $table="customer";

   public function bills(){
     	return $this->hasMany('App\Bills','customid','id');
     }
}
