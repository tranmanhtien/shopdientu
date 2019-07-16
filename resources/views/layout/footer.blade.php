
  <!-- Subscribe section -->
  <section id="aa-subscribe">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-subscribe-area">
            <h3>Gửi email của bạn </h3>
            <p>Để nhận những thông tin giảm giá</p>
            <form action="" class="aa-subscribe-form">
              <input type="email" name="" id="" placeholder="Email của bạn">
              <input type="submit" value="Gửi">
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / Subscribe section -->
<!-- footer -->  
  <footer id="aa-footer">
    <!-- footer bottom -->
    <div class="aa-footer-top">
     <div class="container">
        <div class="row">
        <div class="col-md-12">
          <div class="aa-footer-top-area">
            <div class="row">
              <div class="col-md-3 col-sm-6">
                <div class="aa-footer-widget">
                  <h3>Danh mục</h3>
                  <ul class="aa-footer-nav">
                    <li><a href="pages/trangchu">Trang chủ</a></li>
                    <li><a href="#">Sản phẩm</a></li>
                    <li><a href="#">Thương hiệu </a></li>
                    <li><a href="pages/gioithieu">Giới thiệu về chúng tôi</a></li>
                    <li><a href="pages/lienhe">Liên hệ với chúng tôi</a></li>
                  </ul>
                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="aa-footer-widget">
                  <div class="aa-footer-widget">
                    <h3>Đối tác liên kết</h3>
                    <ul class="aa-footer-nav">
                      <li><a href="#">Công ty Samsung</a></li>
                      <li><a href="#">Công ty Toshiba</a></li>
                      <li><a href="#">Điện máy xanh</a></li>
                      <li><a href="#">Mediamart</a></li>
                      <li><a href="#">Các công ty khác(5)</a></li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="aa-footer-widget">
                  <div class="aa-footer-widget">
                    <h3>Hỗ trợ khách hàng</h3>
                    <ul class="aa-footer-nav">
                      <li><a href="#">Hướng đẫn mua hàng Online</a></li>
                      <li><a href="#">Chính sách bảo hành đổi trả</a></li>
                      <li><a href="#">Giao hàng và lắp đặt</a></li>
                      <li><a href="#">Mua trả góp qua thẻ</a></li>
                      <li><a href="#">In hóa đơn điện tử</a></li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="aa-footer-widget">
                  <div class="aa-footer-widget">
                    <h3>Liên hệ</h3>
                    @foreach($contact as $ct)
                    <address>
                      <p>{{$ct->address}}</p>
                      <p><span class="fa fa-phone"></span>{{$ct->phone}}</p>
                      <p><span class="fa fa-envelope"></span>{{$ct->email}}</p>
                    </address>
                    @endforeach
                    <div class="aa-footer-social">
                      <a href="#"><span class="fa fa-facebook"></span></a>
                      <a href="#"><span class="fa fa-twitter"></span></a>
                      <a href="#"><span class="fa fa-google-plus"></span></a>
                      <a href="#"><span class="fa fa-youtube"></span></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
     </div>
    </div>
    <!-- footer-bottom -->
    <div class="aa-footer-bottom">
      <div class="container">
        <div class="row">
        <div class="col-md-12">
          <div class="aa-footer-bottom-area">
            <p>Shop Hà Anh</p>
            <div class="aa-footer-payment">
              <span class="fa fa-cc-mastercard"></span>
              <span class="fa fa-cc-visa"></span>
              <span class="fa fa-paypal"></span>
              <span class="fa fa-cc-discover"></span>
            </div>
          </div>
        </div>
      </div>
      </div>
    </div>
  </footer>
  <!-- / footer -->