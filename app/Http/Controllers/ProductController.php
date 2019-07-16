<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;
use App\ProductCategory;
use App\Brand;
use App\Comment;
class ProductController extends Controller
{
	 public function getDanhSach(){
	 	$product=Product::all();

	 	return view('admin.product.danhsach',['product'=>$product]);
	 }  
	 public function getThem(){
	 	$brand=Brand::all();
	 	$productcategory=ProductCategory::all();
	 	return view('admin.product.them',['brand'=>$brand,'productcategory'=>$productcategory]);
	 } 
	 public function postThem(Request $request)
	 {
		$this->validate($request,
		[
			'ten'=>'required|min:3',
			'gia'=>'required',
			'soluong'=>'required',
			'thoigian'=>'required'
			
		]
		,
		[
			'ten.required'=>'Bạn chưa nhập tên',
			'ten.min'=>'Tên phải có ít nhất 3 kí tự trở lên',
			'gia.required'=>'Bạn chưa nhập giá',
			'soluong.required'=>'Bạn chưa nhập giá',
			'thoigian.required'=>'bạn chưa nhập thời gian bảo hành',
			
		]);
		$product= new Product;
		$product->name=$request->ten;
		$product->brandid=$request->thuonghieu;
		$product->categoryid=$request->loaisp;
		$product->price=$request->gia;
		$product->promotionprice=$request->giakhuyenmai;
		$product->warranty=$request->thoigian;
		$product->detail=$request->chitiet;
		$product->description=$request->mota;
		$product->quantity=$request->soluong;
		$product->tophot=1;
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
			$product->images=$hinh;
		}else{
			$product->images="";
		}
		$product->save();
		// lưu dữ liệu quay về trang thêm
		return redirect('admin/product/them')->with('thongbao','Bạn đã lưu thành công');

	 }
	 public function getSua($id){
	 	$product=Product::findorFail($id);
	 	$brand=Brand::all();
	 	$productcategory=ProductCategory::all();
	 	return view('admin.product.sua',['product'=>$product,'brand'=>$brand,'productcategory'=>$productcategory]);
	 }  
	  public function postSua(Request $request,$id)
	  {
	 	$product =Product::findorFail($id);

	 	$this->validate($request,
		[
			'ten'=>'required|min:3',
			'gia'=>'required',
			'soluong'=>'required',
			'thoigian'=>'required',
			'mota'=>'required'
		]
		,
		[
			'ten.required'=>'Bạn chưa nhập tên',
			'ten.min'=>'Tên phải có ít nhất 3 kí tự trở lên',
			// 'ten.unique'=>'Tên đã tồn tại',
			'gia.required'=>'Bạn chưa nhập giá',
			'soluong.required'=>'Bạn chưa nhập giá',
			'thoigian.required'=>'bạn chưa nhập thời gian bảo hành',
			'mota.required'=>'Bạn chưa nhập mô tả'
		]);
		$product->name=$request->ten;
		$product->brandid=$request->thuonghieu;
		$product->categoryid=$request->loaisp;
		$product->price=$request->gia;
		$product->promotionprice=$request->giakhuyenmai;
		$product->warranty=$request->thoigian;
		$product->detail=$request->chitiet;
		$product->description=$request->mota;
		$product->quantity=$request->soluong;
		if($request->hasFile('hinh'))
		{
			//chọn file hình
			$file=$request->file('hinh');
			// lấy tên hình
			$name= $file->getClientOriginalName();
			//đặt random tên hình 4 kí tự
			$hinh=str_random(4)."_".$name;
			//check k trùng
			while(file_exists("upload/tintuc/".$hinh))
			{
				$hinh =str_random(4)."_".$name;
			}
			//lưu hình vào folder upload
			
			$file->move("upload/images",$hinh);
			//xóa hình cũ đi
			unlink("upload/images/".$product->images);
			//thêm hình vào csdl
			$product->images=$hinh;
		}
		 $product->save();
		return redirect('admin/product/sua/'.$id)->with('thongbao','Sửa thành công' );

	 }  
	 public function getXoa($id){
 		$product=Product::find($id);
 		
 		$product->delete();
 		return redirect('admin/product/danhsach')->with('thongbao','Bạn đã xóa thành công');
 	}
 }
