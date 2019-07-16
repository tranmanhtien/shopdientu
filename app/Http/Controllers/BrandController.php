<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brand;
use Illuminate\Support\Facades\DB;
class BrandController extends Controller
{
    public function getDanhSach(){
    	$brand=Brand::all();
 		return view('admin.brand.danhsach',['brand'=>$brand]);
 	}  
	public function getThem(){
	 	return view('admin.brand.them');
	} 
	// truyền request nhận dữ liệu
	public function postThem(Request $request){
	 	// ckeck dk băng validate
	 	$this->validate($request,
		[
			'Ten'=>'required|unique:Brand,Name|min:3|max:100'
		],
		[
			'Ten.required'=>'Bạn chưa nhập tên thương hiệu',
			'Ten.unique'=>'Tên thương hiệu đã tồn tại',
			'Ten.min'=>'Tên thương hiệu phải có độ dài từ 3 đến 100 ký tự',
			'Ten.max'=>'Tên thương hiệu phải có độ dài từ 3 đến 100 ký tự'
		]
	 	);
	 	//tạo mới đối tượng model thương hiệu
	 	$brand=new Brand;
	 	$brand->name=$request->Ten;
	 	$brand->metatitle=changeTitle($request->Ten);
	 	//đổi sang k dấu
	 	// $brand->TenKhongDau=changeTitle($request->Ten);
	 	//lưu lại
 		$brand->save();
 		//quay trở lại đưa ra thông báo
 		return redirect('admin/brand/them')->with('Thongbao','Thêm thành công');
	} 
	public function getSua($id){
 		$brand=Brand::find($id);
 		return view('admin.brand.sua',['brand'=>$brand]);
 	}
 	public function postSua(Request $request,$id){
 		$brand=Brand::findorFail($id);
 		$oldbrand = clone $brand;

 		$this->validate($request,
 			[
 				'Ten'=>'required|unique:Brand,name|min:3|max:100'
 			],
 			[
 				'Ten.required'=>'Bạn chưa nhập tên thương hiệu',
 				'Ten.unique'=>'Tên thương hiệu đã tồn tại',
 				'Ten.min'=>'Tên thương hiệu phải có độ dài từ 3 cho đến 100 ký tự',
 				'Ten.max'=>'Tên thương hiệu phải có độ dài từ 3 cho đến 100 ký tự'
 			]
 		);

 		$brand->name=$request->Ten;
 		$brand->metatitle=changeTitle($request->Ten);
 		$brand->save();

 		// DB::table('brand')->where('ID',$id)->update(['Name' => $request->Ten]);

 		return redirect('admin/brand/sua/'.$id)->with('thongbao','Sửa thành công' );
 	}  
 	public function getXoa($id){
 		$brand=Brand::find($id);
 		
 		$brand->delete();
 		return redirect('admin/brand/danhsach')->with('thongbao','Bạn đã xóa thành công');
 	}
}
