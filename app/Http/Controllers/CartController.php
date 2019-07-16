<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Cart;
use App\Product;
use App\ProductCategory;
use App\Brand;
use App\Imageslide;
use App\Contact;
use App\Customer;
use App\Bills;
use App\BillDetail;
use Mail;

class CartController extends Controller
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
    //
    public function getAddCart($id){
    	$productBuy = Product::find($id);
      
		Cart::add(array('id'=>$productBuy->id,'name'=>$productBuy->name,
			 "price"=>($productBuy->promotionprice!=0)? $productBuy->promotionprice :$productBuy->price

			,'quantity'=>1,'attributes'=>array('img'=>$productBuy->images,'pr_price'=>$productBuy->promotionprice,'unit_price'=>$productBuy->price)));
		// $data=Cart::getContent();
  //   dd($data);
   
    	 return redirect()->back();
    
     
    }
     public function getShowCart(){
     
     	$total=Cart::getSubTotal(0);
     	$data=Cart::getContent();
      
     	 return view('pages.giohang',['data'=>$data,'total'=>$total]);
     }
    public function getDelete($id){
       	if($id=='all'){
       		Cart::clear();
       	}
       	else{
       		Cart::remove($id);
       	}
       	return back();
     }
     public function getUpdateCart(){
     if(Request::ajax()){
      $id=Request::get('id');
      $qty=Request::get('qty');
      Cart::update($id,$qty);
      echo "oke";
     }
     }
    public function getDathang(){
      $total=Cart::getSubTotal(0);
      $data=Cart::getContent();

      return view('pages.dathang',['data'=>$data,'total'=>$total]);
    }
    public function postDathang(Request $request)
    {
     

      $this->validate($request,
      [
        'ten'=>'required|min:3',
        'sodienthoai'=>'required|min:3',
        'diachi'=>'required|min:3',
        'email'=>'required|email'
      
      ]
      ,
      [
        'ten.required'=>'Bạn chưa nhập tên',
        'ten.min'=>'Tên phải có ít nhất 3 kí tự',
        'sodienthoai.required'=>'Bạn chưa nhập số điện thoại',
        'sodienthoai.min'=>'Số điện thoại phải có ít nhất 3 kí tự',
        'diachi.required'=>'Bạn chưa nhập địa chỉ',
        'diachi.min'=>'Địa chỉ phải dài từ 3  kí tự',
        'email.required'=>'Bạn chưa nhập email',
        'email.email'=>'Bạn chưa nhập đúng định dạng email',
        
      ]);
      $total=Cart::getSubTotal(0);
      $data=Cart::getContent();
     if(count($data)>0){
      $customer=new Customer;
      $customer->name=$request->ten;
      $customer->email=$request->email;
      $customer->phone=$request->sodienthoai;
      $customer->address=$request->diachi;
      $customer->note=$request->ghichu;

      $customer->save();

      $bill= new Bills;
      $bill->customid=$customer->id;
      $bill->dateorder=date('Y-m-d');
      $bill->total=$total;
      $bill->status=0;
      $bill->payment=$request->optionsRadios;
      $bill->note=$request->ghichu;

      $bill->save();

      foreach ($data as $key => $value) {
        $billdetail=new BillDetail;
        $billdetail->idbill=$bill->id;
        $billdetail->idproduct=$key;
        $billdetail->quantity= $value['quantity'];
        $billdetail->price=$value['price'];
        $dt=Product::find($key);
        if($dt->quantity >= $value['quantity']){
           $pd=Product::where('id', $key)->update(['quantity' =>$dt->quantity-$value['quantity']]);
            $sellpd=Product::where('id', $key)->update(['numbersell'=>$dt->numbersell + $value['quantity']]);
        }else {
          //xóa đi thông tin bill đã lưu trước đó
          $abc=Bills::where('id','=',$bill->id)->delete();
         return redirect()->back()->with('thongbao','Số lượng sản phẩm không đáp ứng đủ');
        }
        $billdetail->save();
      }
          //xử lý phần gửi mail
      $data1['info']=$request->all();
      $email=$request->email;
      $data1['cart']=Cart::getContent();
      $data1['total']=Cart::getSubTotal();
      Mail::send('pages.email',$data1,function($message) use($email){
        //gửi từ đâu
        $message->from('tiendvc97@gmail.com','tientran');
        //mail lấy trên form khách
        $message->to($email,$email);
        // gửi cho chủ
        $message->cc('tiendvc97@gmail.com','tientran');
        $message->subject('Xác nhận hóa đơn mua hàng hà anh shop');  
      });
       Cart::clear();
      return redirect('cart/hoanthanh');

      }else
       return redirect()->back()->with('thongbao','Không có sản phẩm nào trong giỏ hàng');
    }
     public function getHoanThanh(){
      return view('pages.complete');
     }
}
