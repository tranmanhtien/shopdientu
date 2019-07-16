<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Bills;
use App\BillDetail;
use App\Product;
class BillsController extends Controller
{
    //
    public function getDanhSach(){
    	 $bills=Bills::all();
    	return view('admin.bills.danhsach',['bills'=>$bills]);
    }
     public function getChiTiet($id_bill){
    	$billdetail=BillDetail::where('idbill',$id_bill)->get();
        $chitiet=BillDetail::select('idbill')->where('idbill',$id_bill)->distinct()->get();
    	return view('admin.bills.chitiet',['billdetail'=>$billdetail,'chitiet'=>$chitiet]);
    }
    public function getXoa($id){
        $bill=Bills::find($id);
        $billdetail=BillDetail::where('idbill','=',$id);
        $billdetail->delete();
        $bill->delete();
        return redirect('admin/bills/danhsach')->with('thongbao','Bạn đã xóa thành công');
    }
    public function getSua($id){
        $bill=Bills::find($id);
        return view('admin.bills.sua',['bill'=>$bill]);
    }
    public function postSua(Request $request,$id){
       
        $bill=Bills::find($id);
    
         $bill->status=$request->status1;

         $bill->save();
        
         return redirect('admin/bills/sua/'.$id)->with('thongbao','Đã sửa thành công');
        }
     
    // public function getThongKe(){
    //     $month=null;
    //     $year=null;
    //     $bills=Bills::where('status','<>',0)->paginate(3);
    //     return view('admin.statistical.thongke',['bills'=>$bills,'month'=>$month,'year'=>$year]);
    // }
    // public function postThongKe(Request $request){
    //     $this->validate($request,
    //     [
    //         'thang'=>'required',
    //         'nam'=>'required'
    //     ],
    //     [
    //         'thang.required'=>'Bạn chưa nhập tháng',
    //         'nam.required'=>'Bạn chưa nhập năm',
    //     ]
    //     );
    //     $month=$request->input('thang');
    //     $year=$request->input('nam');
    //     $bills=Bills::whereMonth('dateorder','=',$month)->whereYear('dateorder','=',$year)->where('status','<>',0)->paginate(3);
    //     return view('admin/statistical/thongke',['bills'=>$bills,'month'=>$month,'year'=>$year]);
    // }
        public function getThongKe(Request $request){
             $bills=Bills::paginate(10);
             $orderby=$request->orderby;
             $month=$request->input('thang');
             $year=$request->input('nam');
            

            if($orderby==1 && $month=='' && $year==''){
                     $bills=Bills::where('status','<>',0)->paginate(10);
            }
            elseif($orderby==1){
                     $bills=Bills::whereMonth('dateorder','=',$month)->whereYear('dateorder','=',$year)->where('status','<>',0)->paginate(10);
            }
           elseif($orderby==2 && $month=='' && $year==''){
                     $bills=Bills::where('status','=',0)->paginate(10);
            }
            elseif($orderby==2){
                     $bills=Bills::whereMonth('dateorder','=',$month)->whereYear('dateorder','=',$year)->where('status','=',0)->paginate(10);
            }
             
            return view('admin/statistical/thongke',['bills'=>$bills]);

        }
}
