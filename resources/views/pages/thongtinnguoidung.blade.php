@extends('layout.index')
@section('title')
Thongtinnguoidung
@endsection
@section('content')
<!-- catg header banner section -->
  <section id="aa-catg-head-banner">
    <img src="upload/images/banner1.jpg" alt="fashion img">
    <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
        <h2>Tài khoản người dùng</h2>
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
                <h4>Thông tin tài khoản</h4>
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
                 <form class="aa-login-form" action="pages/nguoidung" method="post" >
                 	<input type="hidden" name="_token" value="{{csrf_token()}}"/>
                 	<label for="">Họ và tên<span>*</span></label>
                   	<input type="text" name="ten" placeholder="Họ tên" value="{{$nguoidung->name}}">
                   	<label for="">Tên tài khoản<span>*</span></label>
                   	<input type="text" name="taikhoan"  placeholder="Tên tài khoản" value="{{$nguoidung->username}}">
                  	<label for="">Email của bạn<span>*</span></label><br>
                   	<input style="border: 1px solid #ccc; font-size: 16px; height: 40px; margin-bottom: 15px;padding: 10px; width: 100%;"type="email" name="email" placeholder="Email" value="{{$nguoidung->email}}">
                    <div class="form-group">
                                <input type="checkbox" id="check" name="changepass">
                                <label>Đổi mật khẩu</label>
                                <input type="password"  name="matkhau" class="form-control pass" placeholder=" Mật khẩu" disabled="" />
                            </div>
                             <div class="form-group">
                                <label>Nhập lại mật khẩu</label>
                                <input type="password"  name="matkhaulai" class="form-control pass"placeholder="Nhập lại mật khẩu" disabled="" />
                            </div>
                    <label for="">Số điện thoại<span>*</span></label>
                   	<input type="text" name="dienthoai" placeholder="Số điện thoại" value="{{$nguoidung->phone}}">
                   	<label for="">Địa chỉ<span>*</span></label>
                   	<input type="text" name="diachi" placeholder="Địa chỉ" value="{{$nguoidung->address}}">
                    <button type="submit" class="aa-browse-btn">Sửa</button>
                    
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
@section('script')
    <script type="text/javascript">
        $(document).ready(function(){
            $('#check').change(function(){
                if($(this).is(":checked")){
                    $('.pass').removeAttr('disabled');
                }
                else {
                    $('.pass').attr('disabled','');
                }
            });
        });
    </script>
@endsection