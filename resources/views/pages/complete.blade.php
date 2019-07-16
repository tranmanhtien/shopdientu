 @extends('layout.index')
 @section('title')
Hoanthanhguidon
 @endsection
 @section('content')
   
 <!-- catg header banner section -->
  <section id="aa-catg-head-banner">
   <img style="max-width: 100%;" src="upload/images/banner2.jpg" alt="fashion img">
   <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
        <h2>Đặt hàng</h2>
        <ol class="breadcrumb">
          <li><a href="pages/trangchu">Trang chủ</a></li>                   
          <li class="active">Hoàn thành</li>
        </ol>
      </div>
     </div>
   </div>
  </section>
  <!-- / catg header banner section -->

 <!-- Cart view section -->
 <section id="cart-view">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
          <div>
            <h3>Quý khách đã đặt hàng thành công!</h3>
            <p>Hóa đơn mua hàng của quý khách đã được chuyển đến bộ phận xử lí đơn hàng của shop </p>
            <p>Quý khách kiểm tra lại đơn hàng được gửi trong email</p>
            <p>Đơn hàng sẽ được phản hồi trong 24h</p>
            <p>Nhân viên giao hàng sẽ liên hệ với khách qua số điện thoại trước khi giao hàng 24h</p>
            <p>Cảm ơn quý khách đã mua hàng</p>
          </div>
       </div>
     </div>
   </div>
 </section>
 <!-- / Cart view section -->
 @endsection
