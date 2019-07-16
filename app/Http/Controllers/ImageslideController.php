<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imageslide;
use Illuminate\Support\Facades\DB;
class ImageslideController extends Controller
{
	public function getDanhSach(){
    	$slide=Imageslide::all();
 		return view('admin.slide.danhsach',['slide'=>$slide]);
 	}  
	public function getThem(){
	 	return view('admin.slide.them');
	} 
	// truyền request nhận dữ liệu
	public function postThem(Request $request){
	 	// ckeck dk băng validate
	 	$this->validate($request,
		[
			'hinh'=>'required',
			'link'=>'required'
		],
		[
			'hinh.required'=>'Bạn chưa nhập chọn hình',
			'link.required'=>'Bạn chưa nhập link',
			
		]
	 	);
	 	//tạo mới đối tượng model thương hiệu
	 	$slide=new Imageslide;
	 	$slide->link=$request->link;
	 	if($request->hasFile('hinh')){
			//chọn file hình
			$file=$request->file('hinh');
			// lấy tên hình
			$name= $file->getClientOriginalName();
			//đặt random tên hình 4 kí tự
			$hinh=str_random(4)."_".$name;
			//check k trùng
			while(file_exists("upload/images/".$hinh))
			{
				$hinh =str_random(4)."_".$name;
			}
			//lưu hình vào folder upload
			
			$file->move("upload/images",$hinh);
			//thêm hình vào csdl
			$slide->images=$hinh;
		}else{
			$slide->images="";
		}
	 	//lưu lại
 		$slide->save();
 		//quay trở lại đưa ra thông báo
 		return redirect('admin/slide/them')->with('Thongbao','Thêm slide thành công');
	} 
	public function getSua($id){
 		$slide=Imageslide::find($id);
 		return view('admin.slide.sua',['slide'=>$slide]);
 	}
 	public function postSua(Request $request,$id){
 		// ckeck dk băng validate
	 	$this->validate($request,
		[
			'hinh'=>'required',
			'link'=>'required'
		],
		[
			'hinh.required'=>'Bạn chưa nhập chọn hình',
			'link.required'=>'Bạn chưa nhập link',
			
		]
	 	);
	 	//tạo mới đối tượng model thương hiệu
	 	$slide=Imageslide::find($id);
	 	$slide->link=$request->link;
	 	if($request->hasFile('hinh')){
			//chọn file hình
			$file=$request->file('hinh');
			// lấy tên hình
			$name= $file->getClientOriginalName();
			//đặt random tên hình 4 kí tự
			$hinh=str_random(4)."_".$name;
			//check k trùng
			while(file_exists("upload/images/".$hinh))
			{
				$hinh =str_random(4)."_".$name;
			}
			// xóa link hình cũ
			unlink("upload/images/".$slide->images);
			//lưu hình vào folder upload
			$file->move("upload/images",$hinh);
			//thêm hình vào csdl
			$slide->images=$hinh;
		}
	 	//lưu lại
 		$slide->save();
 		//quay trở lại đưa ra thông báo
 		return redirect('admin/slide/sua/'.$id)->with('Thongbao','Sửa slide thành công');
 	}  
 	public function getXoa($id){
 		$slide=Imageslide::find($id);
 		
 		$slide->delete();
 		return redirect('admin/slide/danhsach')->with('thongbao','Bạn đã xóa thành công');
 	}
    
}
