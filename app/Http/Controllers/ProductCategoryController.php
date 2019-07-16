<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductCategory;
use Illuminate\Support\Facades\DB;
class ProductCategoryController extends Controller
{
    public function getDanhSach(){
    	$productcategory=ProductCategory::all();
 		return view('admin.productcategory.danhsach',['productcategory'=>$productcategory]);
 	}  
	public function getThem(){
	 	return view('admin.productcategory.them');
	} 
	// truyền request nhận dữ liệu
	public function postThem(Request $request){
	 	// ckeck dk băng validate
	 	$this->validate($request,
		[
			'Ten'=>'required|unique:ProductCategory,name|min:3|max:100'
		],
		[
			'Ten.required'=>'Bạn chưa nhập tên thể loại',
			'Ten.unique'=>'Tên thể loại đã tồn tại',
			'Ten.min'=>'Tên thể loại phải có độ dài từ 3 đến 100 ký tự',
			'Ten.max'=>'Tên thể loại phải có độ dài từ 3 đến 100 ký tự'
		]
	 	);
	 	//tạo mới đối tượng model thương hiệu
	 	$productcategory=new ProductCategory;
	 	$productcategory->name=$request->Ten;
	 	$productcategory->metatitle=changeTitle($request->Ten);
	 	//đổi sang k dấu
	 	// $brand->TenKhongDau=changeTitle($request->Ten);
	 	//lưu lại
 		$productcategory->save();
 		//quay trở lại đưa ra thông báo
 		return redirect('admin/productcategory/them')->with('Thongbao','Thêm thành công');
	} 
	public function getSua($id){
 		$productcategory=ProductCategory::find($id);
 		return view('admin.productcategory.sua',['productcategory'=>$productcategory]);
 	}
 	public function postSua(Request $request,$id){
 		$productcategory=ProductCategory::findorFail($id);
 		
 		$this->validate($request,
 			[
 				'Ten'=>'required|unique:ProductCategory,name|min:3|max:100'
 			],
 			[
 				'Ten.required'=>'Bạn chưa nhập tên thương hiệu',
 				'Ten.unique'=>'Tên thể loại đã tồn tại',
 				'Ten.min'=>'Tên thể loại phải có độ dài từ 3 cho đến 100 ký tự',
 				'Ten.max'=>'Tên thể loại phải có độ dài từ 3 cho đến 100 ký tự'
 			]
 		);

 		$productcategory->name=$request->Ten;
 		$productcategory->metatitle=changeTitle($request->Ten);
 		$productcategory->save();

 		// DB::table('brand')->where('ID',$id)->update(['Name' => $request->Ten]);

 		return redirect('admin/productcategory/sua/'.$id)->with('thongbao','Sửa thành công' );
 	}  
 	public function getXoa($id){
 		$productcategory=ProductCategory::find($id);
 		$productcategory->delete();
 		
 		return redirect('admin/productcategory/danhsach')->with('thongbao','Bạn đã xóa thành công');
 	}
}
