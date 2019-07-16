<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BillDetail;
use App\Bills;
use App\Product;
class BillDetailController extends Controller
{
    //
    public function getThongkesp(Request $request){
            $sanpham=Product::all();
            $orderby=$request->orderby;
            if($orderby=="spbannhieu"){
                $sanpham=Product::where('numbersell','>',5)->get();
            }
            elseif($orderby=="spluotxemnhieu"){
                $sanpham=Product::where('viewcount','>',5)->get();
            }
            elseif($orderby=="sptonkho"){
                $sanpham=Product::where('quantity','>',5)->get();
            }
        
     return view('admin/statistical/sanpham',['sanpham'=>$sanpham]);
       
    }
    
}
