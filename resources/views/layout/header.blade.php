 <!-- Start header section -->
  <header id="aa-header">
    <!-- start header top  -->
    <div class="aa-header-top">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="aa-header-top-area">
              <!-- start header top left -->
              <div class="aa-header-top-left">
                <!-- start cellphone -->
                <div class="cellphone hidden-xs">
                  <p><span class="fa fa-phone"></span>+0876626868</p>
                </div>
                <!-- / cellphone -->
              </div>
              <!-- / header top left -->
              <div class="aa-header-top-right">
                <ul class="aa-head-top-nav-right">
                 
                  @if(Auth::check())
                    <li><a href="pages/nguoidung" ><span class="glyphicon glyphicon-user">{{Auth::user()->username}}</span></a></li>
                    <li><a href="pages/dangxuat" >Đăng xuất</a></li>
                  @else
                    <li class="hidden-xs"><a href="pages/dangky">Đăng ký</a></li>
                    <li><a href="pages/dangnhap" >Đăng nhập</a></li>
                 @endif
                 
                    
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- / header top  -->

    <!-- start header bottom  -->
    <div class="aa-header-bottom">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="aa-header-bottom-area">
              <!-- logo  -->
              <div class="aa-logo">
                <!-- Text based logo -->
                <a href="pages/trangchu">
                  <span class="fa fa-shopping-cart"></span>
                  <p>HÀ ANH<strong>Shop</strong> <span>đối tác mua sắm của bạn</span></p>
                </a>
                <!-- img based logo -->
                <!-- <a href="index.html"><img src="img/logo.jpg" alt="logo img"></a> -->
              </div>
              <!-- / logo  -->
               <!-- cart box -->
              <div class="aa-cartbox">
                <a class="aa-cart-link" href="cart/show">
                  <span class="fa fa-shopping-basket"></span>
                  <span class="aa-cart-title">Giỏ hàng</span>
                  <span class="aa-cart-notify">{{Cart::getTotalQuantity()}}</span>
                </a>
               
              </div>
              <!-- / cart box -->
              <!-- search box -->
              <div class="aa-search-box">
                <form action="pages/timkiem" method="get">
                  <!-- id="" trong ô input-->
                  <input type="text" name="result"  placeholder="Tìm kiếm sản phẩm">
                  <button type="submit"><span class="fa fa-search"></span></button>      
                </form>
              </div>
              <!-- / search box -->             
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- / header bottom  -->
  </header>
  <!-- / header section -->
 