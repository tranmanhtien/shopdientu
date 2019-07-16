<?php

namespace App\Http\Controllers;

// sử dụng lớp auth để dăng nhập cần khai báo
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use App\ProductCategory;
use App\Brand;
use App\Imageslide;
use App\Product;
use App\User;
use App\Contact;
use App\FeedBack;
class PageController extends Controller
{
	function __construct(){
		$productcategory=ProductCategory::all();
    	view()->share('productcategory',$productcategory);
    	$brand=Brand::all();
    	view()->share('brand',$brand);
        $product=Product::all();
        view()->share('product',$product);
    	$imageslide=Imageslide::all();
        view()->share('imageslide',$imageslide);
        $contact=Contact::all();
        view()->share('contact',$contact);

	}
    function trangchu(){
        $tivi=Product::where('categoryid',1)->get()->take(4);	
        $dieuhoa=Product::where('categoryid',2)->get()->take(4);
        $tulanh=Product::where('categoryid',4)->get()->take(4);
    	return view('pages.trangchu',['tivi'=>$tivi,'dieuhoa'=>$dieuhoa,'tulanh'=>$tulanh]);
    }
    function lienhe(){
    	return view('pages.lienhe');
    }
    function gioithieu(){
        return view('pages.gioithieu');
    }
     function slide(){
        
         return view('layout.slide');
    }
    function loaisanpham(Request $request,$type,$price){
        // in ra thương hiệu theo loại
         $brandsp=DB::table('brand')->join('product','brand.id','=','product.brandid')->where('product.categoryid','=',$type)->select('brand.name','brand.id')->distinct()->get();
        if($price==0){
             $sp_category=Product::where('categoryid','=',$type)->paginate(6);
        }
        if($price==1){ 
            $sp_category=Product::where('categoryid','=',$type)->whereBetween('price',[0,7999999])->paginate(6); 
        }
        if($price==2){
             $sp_category=Product::where('categoryid','=',$type)->whereBetween('price',[8000000,12000000])->paginate(6);
        }     
        if($price==3)
        {         
           $sp_category=Product::where('categoryid','=',$type)->where('price','>',12000000)->paginate(6); 

        }
        $categorysp=ProductCategory::where('id',$type)->get();
        // dd($request->all());
         return view('pages.loaisanpham',['sp_category'=>$sp_category,'categorysp'=>$categorysp,'brandsp'=>$brandsp]);
    }
     function loaithuonghieu($type,$price){
         if($price==0){
             $sp_brand=Product::where('brandid','=',$type)->paginate(6);
        }
        if($price==1){
            $sp_brand=Product::where('brandid','=',$type)->whereBetween('price',[0,7999999])->paginate(6);
        }
        if($price==2){
           $sp_brand=Product::where('brandid','=',$type)->whereBetween('price',[8000000,12000000])->paginate(6);
            
        }     
        if($price==3)
        {         
           $sp_brand=Product::where('brandid','=',$type)->where('price','>',12000000)->paginate(6); 

        } 
        $brandsp=Brand::where('id',$type)->get();
        return view('pages.loaithuonghieu',['sp_brand'=>$sp_brand,'brandsp'=>$brandsp]);
    }
    function chitietsp($id){
        // lấy theo id phần tử duy nhất
        $pd_detail=Product::find($id);
        $viewcount=Product::where('id', $id)->update(['viewcount' => $pd_detail->viewcount+1]); 
        $pd_same=Product::where('categoryid',$pd_detail->categoryid)->paginate(4);
        return view('pages.chitietsp',['pd_detail'=>$pd_detail,'pd_same'=>$pd_same,'viewcount'=>$viewcount]);
    }
     function timkiem(Request $request){
        $result=$request->result;
        $result=str_replace('','%',$result);
        $data=Product::where('name','like','%'.$result.'%')->orwhere('price','like','%'.$result.'%')->orwhere('promotionprice','like','%'.$result.'%')->get();
       
        return view('pages.timkiem',['data'=>$data,'result'=>$result]);
     }
     function getDangnhap(){
        return view('pages.dangnhap');
     }
     function postDangnhap(Request $request)
     {
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
            return redirect('pages/trangchu');
        }
        else{
            return redirect('pages/dangnhap')->with('thongbao','Đăng nhập thất bại');
        }
     }
     function getDangxuat(){
        Auth::logout();
        return redirect('pages/trangchu');
     }
     function getNguoidung(){
        if(Auth::check()){
            $nguoidung=Auth::user();
        }
        return view('pages/thongtinnguoidung',['nguoidung'=>$nguoidung]);
     }
     function postNguoidung(Request $request)
     {
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
        $user=Auth::user();
        $user->name=$request->ten;
        $user->username=$request->taikhoan;
        $user->email=$request->email;
        $user->phone=$request->dienthoai;
        $user->address=$request->diachi;
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
        return redirect('pages/nguoidung')->with('thongbao','Bạn đã sửa thành công');
     }
     function getDangky(){
        return view('pages/dangky');
     }
      function postDangky(Request $request){
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
                'taikhoan.min'=>'Tên tìa khoản phải có ít nhất 3 kí tự',
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
        $user->role=0;
        $user->save();
        return redirect('pages/dangnhap')->with('thongbao','Chúc mừng bạn đăng ký tài khoản thành công');
     }
     function getSanpham(){
        $product=Product::paginate(8);
        return view('pages/sanpham',['product'=>$product]);
     }
     function getPhanhoi(){
        return view('pages.lienhe');
     }
     function postPhanhoi(Request $request){
        $this->validate($request,
      [
        'ten'=>'required|min:3',   
        'diachi'=>'required|min:3',
        'email'=>'required|email',
        'tieude'=>'required',
        'noidung'=>'required'     
      ]
      ,
      [
        'ten.required'=>'Bạn chưa nhập tên',
        'ten.min'=>'Tên phải có ít nhất 3 kí tự',
        'diachi.required'=>'Bạn chưa nhập địa chỉ',
        'diachi.min'=>'Địa chỉ phải dài từ 3  kí tự',
        'email.required'=>'Bạn chưa nhập email',
        'email.email'=>'Bạn chưa nhập đúng định dạng email',
        'tieude.required'=>'Bạn chưa nhập tiêu đề',
        'noidung.required'=>'Bạn chưa nhập nội dung'
        
      ]);
        $phanhoi=new FeedBack;
        $phanhoi->name=$request->ten;
        $phanhoi->email=$request->email;
        $phanhoi->title=$request->tieude;
        $phanhoi->address=$request->diachi;
        $phanhoi->content=$request->noidung;
        $phanhoi->save();
        return redirect()->back()->with('thongbao','Bạn đã gửi thành công, chúng tôi sẽ liên hệ sớm nhất cho bạn');
     }
}
