@extends('layout.index')
@section('title')
Gioithieu
@endsection
@section('content')
<!-- catg header banner section -->
  <section id="aa-catg-head-banner">
   <img src="upload/images/ban9.png" alt="fashion img">
   <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
        <h2>Giới thiệu</h2>
        <ol class="breadcrumb">
          <li><a href="pages/trangchu">Trang chủ</a></li>         
          <li class="active">Giới thiệu</li>
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
             <h2>Giới thiệu shop</h2>
            
           </div>
           
           <!-- Contact address -->
           
           <div class="aa-contact-address">
             <div class="row">
               <div class="col-md-8">
                 <div class="aa-contact-address-left">
                   
                   <p><b>Hà Anh Shop</b> được ra đời với mong muốn đáp ứng nhu cầu khách hàng tốt nhất có thể, luôn mang lại sự hài lòng cho khách hàng</p>
                   <p>Chúng tôi cảm ơn những người khách hàng đã và đang đồng hành cùng cửa hàng
                   </p>
                   <img src="upload/images/thank.jpg" alt="" style="    max-width: 400px; padding-left: 150px;">
                 </div>
               </div>
              
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