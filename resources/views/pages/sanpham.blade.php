@extends('layout.index')
@section('title')
Sanpham
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
            <li class="active">Tất cả sản phẩm</li>
        </ol>
       
      </div>
     </div>
   </div>
  </section>
  <!-- / catg header banner section -->

 <!-- Products section -->
  <section id="aa-product">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <div class="aa-product-area">
              <div class="aa-product-inner">
                <!-- start prduct navigation -->
                 <ul class="nav nav-tabs aa-products-tab">
                  @foreach( $productcategory as $category)
                  <!-- class="active" -->
                    <li ><a href="pages/loaisanpham/{{$category->id}}">{{$category->name}}</a></li>
                   @endforeach
                  </ul>
                  <!-- Tab panes -->
                  <div class="tab-content">
                    <!-- Start men product category -->
                    <div class="tab-pane fade in active" id="men">
                      <ul class="aa-product-catg">
                        @foreach($product as $pd)
                        <!-- start single product item -->
                        <li>
                          <figure>
                            <a class="aa-product-img" href="pages/chitietsp/{{$pd->id}}"><img src="upload/images/{{$pd->images}}" alt="polo shirt img"></a>
                             @if($pd->quantity>0)
                            <a class="aa-add-card-btn"href="{{'cart/add/'.$pd->id}}"><span class="fa fa-shopping-cart"></span>Thêm giỏ hàng</a>
                            @endif
                              <figcaption>
                              <h4 class="aa-product-title"><a href="pages/chitietsp/{{$pd->id}}">{{$pd->name}}</a></h4>
                              @if($pd->promotionprice==0)
                                  <span class="aa-product-price">{{number_format($pd->price)}}đ</span>
                              @else
                                  <span class="aa-product-price">{{number_format($pd->promotionprice)}}đ</span>
                                  <span class="aa-product-price"><del>{{number_format($pd->price)}}đ</del></span>
                              @endif
                            </figcaption>
                          </figure>                        
                          <div class="aa-product-hvr-content">
                            <!-- <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                            <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a> -->
                           <a href="pages/chitietsp/{{$pd->id}}" class="show-modal" data-toggle2="tooltip" data-placement="top" title="Chi tiết" ><span class="fa fa-search"></span></a>                                
                          </div>
                          <!-- product badge -->
                            @if($pd->promotionprice!=0)
                            <span class="aa-badge aa-sale" href="#">SALE!</span>
                            @endif
                            @if($pd->quantity==0)
                            <span style="position: absolute;top: 5%;right: 0;padding: 5px 10px;color: #fdfdfd;font-size: 15px;background: burlywood;" href="#">Tạm hết hàng</span>
                            @endif
                        </li>
                         @endforeach            
                      </ul>
                     <div class="row" style="text-align: center;">{{$product->links()}}</div>
                    </div>
                    <!-- / men product category -->
                   
                   
                  </div>
                              
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / Products section -->
@endsection