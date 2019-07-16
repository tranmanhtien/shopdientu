@extends('layout.index')
@section('title')
Dangky
@endsection
@section('content')
<!-- catg header banner section -->
  <section id="aa-catg-head-banner">
    <img src="upload/images/banner1.jpg" alt="fashion img">
    <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
        <h2>Đăng ký tài khoản</h2>
        <ol class="breadcrumb">
          <li><a href="pages/trangchu">Trang chủ</a></li>                   
          <li class="active">Tài khoản</li>
        </ol>
      </div>
     </div>
   </div>
  </section>
  <!-- / catg header banner section -->
<!-- Cart view section -->
 <section id="aa-myaccount">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
        <div class="aa-myaccount-area">         
            <div class="row">
              <div style="margin-left: 300px;" class="col-md-6">
                <div class="aa-myaccount-login">
                <h4>Đăng ký tài khoản</h4>
                 @if(count($errors)>0)
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $err)
                                {{$err}}<br>
                            @endforeach
                        </div>
                        @endif
                        <!-- in thông báo -->
                        @if(session('thongbao'))
                        <div class="alert alert-success">{{session('thongbao')}}</div>
                        @endif
                 <form class="aa-login-form" action="pages/dangky" method="post" >
                 	<input type="hidden" name="_token" value="{{csrf_token()}}"/>
                 	  <label for="">Họ và tên<span>*</span></label>
                   	<input type="text" name="ten" placeholder="Họ tên" >
                   	<label for="">Tên tài khoản<span>*</span></label>
                   	<input type="text" name="taikhoan"  placeholder="Tên tài khoản" >
                  	<label for="">Email của bạn<span>*</span></label><br>
                   	<input style="border: 1px solid #ccc; font-size: 16px; height: 40px; margin-bottom: 15px;padding: 10px; width: 100%;" type="email" name="email" placeholder="Email" >
                    <div class="form-group">
                                <label>Mật khẩu</label>
                                <input type="password"  name="matkhau" class="form-control pass" placeholder=" Mật khẩu" />
                            </div>
                             <div class="form-group">
                                <label>Nhập lại mật khẩu</label>
                                <input type="password"  name="matkhaulai" class="form-control pass"placeholder="Nhập lại mật khẩu" />
                            </div>
                    <label for="">Số điện thoại<span>*</span></label>
                   	<input type="text" name="dienthoai" placeholder="Số điện thoại" >
                   	<label for="">Địa chỉ<span>*</span></label>
                   	<input type="text" name="diachi" placeholder="Địa chỉ" >
                    <button type="submit" class="aa-browse-btn">Đăng ký</button>
                    
                  </form>
                </div>
              </div>
            </div>          
         </div>
       </div>
     </div>
   </div>
 </section>
 <!-- / Cart view section -->
@endsection
