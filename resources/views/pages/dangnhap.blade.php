@extends('layout.index')
@section('title')
Dangnhap
@endsection
@section('content')
<!-- catg header banner section -->
  <section id="aa-catg-head-banner">
    <img src="upload/images/banner1.jpg" alt="fashion img">
    <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
        <h2>Đăng nhập</h2>
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
                <h4>Đăng nhập</h4>
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
                 <form class="aa-login-form" action="pages/dangnhap" method="post" >
                 	<input type="hidden" name="_token" value="{{csrf_token()}}"/>
                  	<label for="">Email của bạn<span>*</span></label>
                   	<input type="text" name="email" placeholder="Nhập email">
                   	<label for="">Mật khẩu<span>*</span></label>
                    <input type="password" name="password" placeholder="Nhập mật khẩu">
                    <button type="submit" class="aa-browse-btn">Đăng nhập</button><br>
                    <p class="aa-lost-password"><a href="pages/dangky">Đăng ký tài khoản</a></p>
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