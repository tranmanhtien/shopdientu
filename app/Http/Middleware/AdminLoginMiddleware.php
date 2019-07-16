<?php

namespace App\Http\Middleware;
// sử dụng lớp auth để dăng nhập cần khai báo
use Illuminate\Support\Facades\Auth;
use Closure;

class AdminLoginMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //kiểm tra đăng nhập k nếu đăng nhập cho vào admin nếu k trỏ về trang đăng nhập
        // vào kernel.php dể khai báo middleware
        if(Auth::check()){
            $user=Auth::user();
            if($user->role==1)
                //truy cập tiếp
                return $next($request);
            else
                 return redirect('admin/dangnhap');
        }
       else
        return redirect('admin/dangnhap');
    }
}
