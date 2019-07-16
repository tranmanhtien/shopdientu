<?php

namespace App\Http\Controllers;
// sử dụng lớp auth để dăng nhập cần khai báo
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function getDanhSach(){
    	$user=User::all();
 		return view('admin.user.danhsach',['user'=>$user]);
 	}  
	public function getThem(){
	 	return view('admin.user.them');
	} 
	// truyền request nhận dữ liệu
	public function postThem(Request $request){
	 	// ckeck dk băng validate
	 	$this->validate($request,
	 		[
	 			'ten'=>'required|min:3',
	 			'taikhoan'=>'required|min:3',
	 			'matkhau'=>'required|min:3|max:30',
	 			'matkhaulai'=>'required|same:matkhau',
	 			'email'=>'required|email|unique:user,email',
	 			
	 		]
	 		,
	 		[
	 			'ten.required'=>'Bạn chưa nhập tên',
	 			'ten.min'=>'Tên phải có ít nhất 3 kí tự',
	 			'taikhoan.required'=>'Bạn chưa nhập tài khoản',
	 			'taikhoan.min'=>'Tên phải có ít nhất 3 kí tự',
	 			'matkhau.required'=>'Bạn chưa nhập mật khẩu',
	 			'matkhau.min'=>'Mật khẩu phải dài từ 3 đến 30 kí tự',
	 			'matkhau.max'=>'Mật khẩu phải dài từ 3 đến 30 kí tự',
	 			'matkhaulai.required'=>'Bạn chưa nhập mật khẩu lại',
	 			'matkhaulai.same'=>"Mật khẩu nhập lại chưa khớp",
	 			'email.required'=>'Bạn chưa nhập email',
	 			'email.email'=>'Bạn chưa nhập đúng định dạng email',
	 			'email.unique'=>'Tên email đã tồn tại'
	 		]);

	 	$user=new user;
	 	$user->name=$request->ten;
	 	$user->username=$request->taikhoan;
	 	// bcrypt() hàm mã hóa
	 	$user->password=bcrypt($request->matkhau);
	 	$user->email=$request->email;
	 	$user->phone=$request->dienthoai;
	 	$user->address=$request->diachi;
	 	$user->role=$request->quyen;
	 	$user->save();
	 	return redirect('admin/user/danhsach')->with('thongbao','Đã thêm thành công');
	 
	} 
	public function getSua($id){
 		$user=User::find($id);
 		return view('admin.user.sua',['user'=>$user]);
 	}
 	public function postSua(Request $request,$id){
 		$this->validate($request,
	 		[
	 			'ten'=>'required|min:3',
	 			'taikhoan'=>'required|min:3',
	 		]
	 		,
	 		[
	 			'ten.required'=>'Bạn chưa nhập tên',
	 			'ten.min'=>'Tên phải có ít nhất 3 kí tự',
	 			'taikhoan.required'=>'Bạn chưa nhập tài khoản',
	 			'taikhoan.min'=>'Tên phải có ít nhất 3 kí tự',
	 			
	 		]);
 		//tìm user theo cái id cần sửa
 		$user=user::find($id);
	 	$user->name=$request->ten;
	 	$user->username=$request->taikhoan;
	 	$user->email=$request->email;
	 	$user->phone=$request->dienthoai;
	 	$user->address=$request->diachi;
	 	$user->role=$request->quyen;
	 	if($request->changepass=="on"){
	 		$this->validate($request,
	 		[
	 			
	 			'matkhau'=>'required|min:3|max:30',
	 			'matkhaulai'=>'required|same:matkhau',
	 			
	 			
	 		]
	 		,
	 		[
	 			'matkhau.required'=>'Bạn chưa nhập mật khẩu',
	 			'matkhau.min'=>'Mật khẩu phải dài từ 3 đến 30 kí tự',
	 			'matkhau.max'=>'Mật khẩu phải dài từ 3 đến 30 kí tự',
	 			'matkhaulai.required'=>'Bạn chưa nhập mật khẩu lại',
	 			'matkhaulai.same'=>"Mật khẩu nhập lại chưa khớp",
	 		]);
	 		// bcrypt() hàm mã hóa
	 		$user->password=bcrypt($request->matkhau);
	 	}
	 	
	 	$user->save();
	 	return redirect('admin/user/sua/'.$id)->with('thongbao','Đã sửa thành công');
 	}  
 	public function getXoa($id){
 		$user=user::find($id);
 		$user->delete();
 		return redirect('admin/user/danhsach')->with('thongbao','Đã xóa thành công');
 	}
 	public function getDangnhapAdmin(){
 		return view('admin.login');
 	}
 	public function postDangnhapAdmin(Request $request){
 		$this->validate($request,
 			[
 				'email'=>'required|email',
 				'password'=>'required|min:3|max:30'
 			]
 			,
 			[
 				'email.required'=>'Bạn chưa nhập email',
 				'email.email'=>'Bạn chưa nhập đúng định dạng',
 				'password.required'=>'Bạn chưa nhập mật khẩu',
 				'password.min'=>'Độ dài mật khẩu phải có ít nhất 3 kí tự',
 				'password.max'=>'Độ dài mật khẩu tối đa 30 kí tự',
 			]

 		);
 		//kiểm tra đã đăng nhập chưa dùng hàm attempt([])
 		if(Auth::attempt(['email'=>$request->email,'password'=>$request->password]))
 		{
 			return redirect('admin/brand/danhsach');
 		}
 		else{
 			return redirect('admin/dangnhap')->with('thongbao','Đăng nhập thất bại');
 		}
 		
 	}
 	public function getDangxuatAdmin(){
 		Auth::logout();
 		return redirect('admin/dangnhap');
 	}
}
