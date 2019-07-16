<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;

// sử dụng lớp auth để dăng nhập cần khai báo
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    //
    public function getXoa($id,$idproduct)
    {
    	$comment=Comment::find($id);
    	$comment->delete();

    	return redirect('admin/product/sua/'.$idproduct)->with('thongbao','Xóa bình luận thành công');
    }
    public function postBinhLuan($id,Request $request){
    	$idproduct=$id;
    	//lưu thông tin vào csdl comment
    	$comment=new Comment;
    	$comment->idproduct=$idproduct;
    	$comment->iduser=Auth::user()->id;
    	$comment->content=$request->noidung;
    	$comment->save();
    	return redirect("pages/chitietsp/$id")->with('thongbao','Viết bình luận thành công');
    }
}
