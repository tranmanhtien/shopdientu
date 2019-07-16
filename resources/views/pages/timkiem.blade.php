 @extends('layout.index')
 @section('title')
Timkiemsanpham
@endsection
 @section('content')
  <!-- catg header banner section -->
  <section id="aa-catg-head-banner">
   <img src="upload/images/banner1.jpg" alt="fashion img">
   <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
       
        <h2></h2>
        <ol class="breadcrumb">
          <li><a href="pages/trangchu">Trang chủ</a></li>         
          <li class="active">Từ khóa tìm kiếm :{{$result}}</li>
        </ol>
       
      </div>
     </div>
   </div>
  </section>
  <!-- / catg header banner section -->

  <!-- product category -->
  <section id="aa-product-category">
    <div class="container">
      <div class="row">

        <div class="col-lg-9 col-md-9 col-sm-8 col-md-push-3">
          <div class="aa-product-catg-content">
            <div class="aa-product-catg-body">
              <ul class="aa-product-catg">
                <!-- start single product item -->
              
                @foreach($data as $dt)
                <li>
                  <figure>
                    <a class="aa-product-img" href="pages/chitietsp/{{$dt->id}}"><img src="upload/images/{{$dt->images}}" alt="polo shirt img"></a>
                     @if($dt->quantity >0)
                    <a class="aa-add-card-btn"href="{{'cart/add/'.$dt->id}}">
                      <span class="fa fa-shopping-cart"></span>Thêm giỏ hàng</a>
                      @endif
                    <figcaption>
                      <h4 class="aa-product-title"><a href="pages/chitietsp/{{$dt->id}}">{{$dt->name,$result}}</a></h4>
                     
                      @if($dt->promotionprice==0)
                        <span class="aa-product-price">{{number_format($dt->price)}}đ</span>
                      @else
                        <span class="aa-product-price">{{number_format($dt->promotionprice)}}đ</span>
                        <span class="aa-product-price"><del>{{number_format($dt->price)}}đ</del></span>
                      <p class="aa-product-descrip">{{$dt->detail}}</p>
                      @endif
                    </figcaption>
                  </figure>                         
                  <div class="aa-product-hvr-content">
                   <!--  <a href="#" -toggle="tooltip" -placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                    <a href="#" -toggle="tooltip" -placement="top" title="Compare"><span class="fa fa-exchange"></span></a> -->
                   <a href="pages/chitietsp/{{$dt->id}}" class="show-modal" data-toggle2="tooltip" data-placement="top" title="Chi tiết" ><span class="fa fa-search"></span></a>                             
                  </div>
                  <!-- product badge -->
                    @if($dt->promotionprice!=0)
                            <span class="aa-badge aa-sale" href="#">SALE!</span>
                     @endif
                     @if($dt->quantity==0)
                           <span style="position: absolute;top: 5%;right: 0;padding: 5px 10px;color: #fdfdfd;font-size: 15px;background: burlywood;" href="#">Tạm hết hàng</span>
                      @endif
                </li>
                 @endforeach
                                                 
              </ul>
               
              
            </div>
            
          </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-4 col-md-pull-9">
          <aside class="aa-sidebar">
            <!-- single sidebar -->
            <div class="aa-sidebar-widget">
              <h3>Loại sản phẩm</h3>

              <ul class="aa-catg-nav">
                  @foreach($productcategory as $cate)
                    <li><a href="pages/loaisanpham/{{$cate->id}}/{{$price=0}}">{{$cate->name}}</a></li>
                  @endforeach
              </ul>
            </div>
             <!-- single sidebar -->
            <div class="aa-sidebar-widget">
              <h3>Thương hiệu</h3>

              <ul class="aa-catg-nav">
                  @foreach($brand as $br)
                    <li><a href="pages/loaithuonghieu/{{$br->id}}/{{$price=0}}">{{$br->name}}</a></li>
                  @endforeach
              </ul>
            </div>
           
            
          </aside>
        </div>
       
      </div>
    </div>
  </section>
  <!-- / product category -->
  @endsection