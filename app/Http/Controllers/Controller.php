<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
// sử dụng lớp auth để dăng nhập cần khai báo
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    function __construct(){
    	//hàm khởi tạo của controller nó sẽ gọi đến hàm đăng nhập để kiểm tra đăng nhập chưa
    	$this->DangNhap();

    }
    // kiểm tra đăng nhập truyền viewshare đến các view khác
    function DangNhap()
    {
    	if(Auth::check()){
    		view()->share('user_login',Auth::user());
    	}

    }
}
