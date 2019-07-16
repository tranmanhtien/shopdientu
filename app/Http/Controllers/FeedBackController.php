<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FeedBack;

class FeedBackController extends Controller
{
    //
    public function getDanhSach(){
    	$feedback=FeedBack::all();
    	return view('admin/feedback/danhsach',['feedback'=>$feedback]);
    }
    public function getXoa($id){
    	$feedback=FeedBack::find($id);
    	$feedback->delete();
 		return redirect('admin/feedback/danhsach')->with('thongbao','Bạn đã xóa thành công');
    }
}
