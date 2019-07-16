@extends('layout.index')
@section('title')
Lienhe
@endsection
@section('content')
<!-- catg header banner section -->
  <section id="aa-catg-head-banner">
   <img src="upload/images/banner6.jpg" alt="fashion img">
   <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
        <h2>Liên hệ</h2>
        <ol class="breadcrumb">
          <li><a href="pages/trangchu">Trang chủ</a></li>         
          <li class="active">Liên hệ</li>
        </ol>
      </div>
     </div>
   </div>
  </section>
  <!-- / catg header banner section -->
<!-- start contact section -->
 <section id="aa-contact">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="aa-contact-area">
           <div class="aa-contact-top">
             <h2>Liên hệ với chúng tôi</h2>
             <p>Gửi thông tin của bạn</p>
           </div>
           
           <!-- Contact address -->
           
           <div class="aa-contact-address">
             <div class="row">
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
               @if(Auth::check())
               <div class="col-md-8">
                 <div class="aa-contact-address-left">
                   <form class="comments-form contact-form" action="pages/phanhoi" method="post">
                      <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">                        
                          <input type="text" placeholder="Tên của bạn" name="ten" class="form-control" value="{{Auth::user()->name}}">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">                        
                          <input type="email" placeholder="Email của bạn" name="email" class="form-control" value="{{Auth::user()->email}}">
                        </div>
                      </div>
                    </div>
                     <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">                        
                          <input type="text" placeholder="Tiêu đề" class="form-control" name="tieude">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">                        
                          <input type="text" placeholder="Địa chỉ" class="form-control" name="diachi" value="{{Auth::user()->address}}">
                        </div>
                      </div>
                    </div>                  
                     
                    <div class="form-group">                        
                      <textarea class="form-control" rows="3" name="noidung" placeholder="Nội dung"></textarea>
                    </div>
                    <button class="aa-secondary-btn">Gửi</button>
                  </form>
                 </div>
               </div>
               @else
               <div class="col-md-8">
                 <div class="aa-contact-address-left">
                   <form class="comments-form contact-form" action="pages/phanhoi" method="post">
                      <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">                        
                          <input type="text" placeholder="Tên của bạn" class="form-control" name="ten">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">                        
                          <input type="email" placeholder="Email của bạn" class="form-control" name="emai">
                        </div>
                      </div>
                    </div>
                     <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">                        
                          <input type="text" placeholder="Tiêu đề" class="form-control" name="tieude">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">                        
                          <input type="text" placeholder="Địa chỉ" class="form-control" name="diachi">
                        </div>
                      </div>
                    </div>                  
                     
                    <div class="form-group">                        
                      <textarea class="form-control" rows="3" placeholder="Nội dung" name="noidung"></textarea>
                    </div>
                    <button class="aa-secondary-btn">Gửi</button>
                  </form>
                 </div>
               </div>
               @endif
               <div class="col-md-4">
                 <div class="aa-contact-address-right">
                   <address>
                     <h4>Hà Anh Shop</h4>
                     @foreach($contact as $ct)
                     <p>{{$ct->description}}</p> 
                     <p><span class="fa fa-home"></span>{{$ct->address}}</p>
                     <p><span class="fa fa-phone"></span>{{$ct->phone}}</p>
                     <p><span class="fa fa-envelope"></span>{{$ct->email}}</p>
                     @endforeach
                   </address>
                 </div>
               </div>
             </div>
           </div>
         </div>
       </div>
     </div>
   </div>
 </section>

  
@endsection