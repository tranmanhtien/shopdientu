@extends('layout.index')
@section('title')
Trangchu
@endsection
@section('content')

@include('layout.slide')
 
  <!-- Products section -->
  <section id="aa-product">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <div class="aa-product-area">
              <div class="aa-product-inner">
                <!-- start prduct navigation -->
                <!-- in thông báo -->
                        @if(session('thongbao'))
                        <div class="alert alert-success">{{session('thongbao')}}</div>
                        @endif
                 <ul class="nav nav-tabs aa-products-tab">
                  @foreach( $productcategory as $category)
                  <!-- class="active" -->
                    <li ><a href="pages/loaisanpham/{{$category->id}}/{{$price=0}}">{{$category->name}}</a></li>
                   @endforeach
                  </ul>
                  <!-- Tab panes -->
                  <div class="tab-content">
                    <!-- Start men product category -->
                    <div class="tab-pane fade in active" id="men">
                      <ul class="aa-product-catg">
                        <?php $data=$product->where('tophot',1)->sortByDesc('promotionprice')->take(8); ?>
                      
                        @foreach($data->all() as $pd)
                        <!-- start single product item -->
                        <li>
                          <figure>
                            <a class="aa-product-img" href="pages/chitietsp/{{$pd->id}}"><img src="upload/images/{{$pd->images}}" alt="polo shirt img"></a>
                            @if($pd->quantity>0)
                            <a class="aa-add-card-btn" href="{{'cart/add/'.$pd->id}}"><span class="fa fa-shopping-cart"></span>Thêm giỏ hàng</a>
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
                            <!-- data-toggle="modal"  data-target="#quick-view-modal" -->
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
                      <a class="aa-browse-btn" href="pages/sanpham">Xem tất cả sản phẩm <span class="fa fa-long-arrow-right"></span></a>
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
  <!-- banner section -->
  <section id="aa-banner">
    <div class="container">
      <div class="row">
        <div class="col-md-12">        
          <div class="row">
            <div class="aa-banner-area">
            <a href="#"><img src="upload/images/banner.jpg" alt="fashion banner img"></a>
          </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- popular section -->
  <section id="aa-popular-category">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <div class="aa-popular-category-area">
              <!-- start prduct navigation -->
             <ul class="nav nav-tabs aa-products-tab">
                @foreach( $productcategory as $category)
                <li><a href="pages/loaisanpham/{{$category->id}}/{{$price=0}}" >{{$category->name}}</a></li>   
                 @endforeach                 
              </ul>
              <!-- Tab panes -->
              <div class="tab-content">
                <!-- Start men popular category -->
                <div class="tab-pane fade in active" id="popular">
                  <ul class="aa-product-catg aa-popular-slider">
                      @foreach($tivi as $tv)
                        <li>
                          <figure>
                            <a class="aa-product-img" href="pages/chitietsp/{{$tv->id}}"><img src="upload/images/{{$tv->images}}" alt="polo shirt img"></a>
                            @if($tv->quantity>0)
                            <a class="aa-add-card-btn"href="{{'cart/add/'.$tv->id}}"><span class="fa fa-shopping-cart"></span>Thêm giỏ hàng</a>
                             @endif
                             <figcaption>
                              <h4 class="aa-product-title"><a href="pages/chitietsp/{{$tv->id}}">{{$tv->name}}</a></h4>
                               @if($tv->promotionprice==0)
                                  <span class="aa-product-price">{{number_format($tv->price)}}đ</span>
                              @else
                                  <span class="aa-product-price">{{number_format($tv->promotionprice)}}đ</span>
                                  <span class="aa-product-price"><del>{{number_format($tv->price)}}đ</del></span>
                              @endif
                            </figcaption>
                          </figure>                     
                          <div class="aa-product-hvr-content">
                           <!--  <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                            <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a> -->
                            <a href="pages/chitietsp/{{$tv->id}}" class="show-modal" data-toggle2="tooltip" data-placement="top" title="Chi tiết" ><span class="fa fa-search"></span></a>                               
                          </div>
                            @if($tv->promotionprice!=0)
                            <span class="aa-badge aa-sale" href="#">SALE!</span>
                          @endif
                          @if($tv->quantity==0)
                           <span style="position: absolute;top: 5%;right: 0;padding: 5px 10px;color: #fdfdfd;font-size: 15px;background: burlywood;" href="#">Tạm hết hàng</span>
                          @endif
                        </li>
                      @endforeach
                      @foreach($dieuhoa as $dh)
                        <li>
                          <figure>
                            <a class="aa-product-img" href="pages/chitietsp/{{$dh->id}}"><img src="upload/images/{{$dh->images}}" alt="polo shirt img"></a>
                             @if($dh->quantity>0)
                            <a class="aa-add-card-btn"href="{{'cart/add/'.$dh->id}}"><span class="fa fa-shopping-cart"></span>Thêm giỏ hàng</a>
                             @endif
                             <figcaption>
                              <h4 class="aa-product-title"><a href="pages/chitietsp/{{$dh->id}}">{{$dh->name}}</a></h4>
                               @if($dh->promotionprice==0)
                                  <span class="aa-product-price">{{number_format($dh->price)}}đ</span>
                              @else
                                  <span class="aa-product-price">{{number_format($dh->promotionprice)}}đ</span>
                                  <span class="aa-product-price"><del>{{number_format($dh->price)}}đ</del></span>
                              @endif
                            </figcaption>
                          </figure>                     
                          <div class="aa-product-hvr-content">
                           <!--  <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                            <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a> -->
                             <a href="pages/chitietsp/{{$dh->id}}" class="show-modal" data-toggle2="tooltip" data-placement="top" title="Chi tiết" ><span class="fa fa-search"></span></a>

                          </div>
                          <!-- product badge -->
                           @if($dh->promotionprice!=0)
                            <span class="aa-badge aa-sale" href="#">SALE!</span>
                          @endif
                          @if($dh->quantity==0)
                           <span style="position: absolute;top: 5%;right: 0;padding: 5px 10px;color: #fdfdfd;font-size: 15px;background: burlywood;" href="#">Tạm hết hàng</span>
                          @endif
                        </li>

                      @endforeach
                       @foreach($tulanh as $tl)
                        <li>
                          <figure>
                            <a class="aa-product-img" href="pages/chitietsp/{{$tl->id}}"><img src="upload/images/{{$tl->images}}" alt="polo shirt img"></a>
                             @if($tl->quantity>0)
                            <a class="aa-add-card-btn"href="{{'cart/add/'.$tl->id}}"><span class="fa fa-shopping-cart"></span>Thêm giỏ hàng</a>
                            @endif
                             <figcaption>
                              <h4 class="aa-product-title"><a href="pages/chitietsp/{{$tl->id}}">{{$tl->name}}</a></h4>
                               @if($tl->promotionprice==0)
                                  <span class="aa-product-price">{{number_format($tl->price)}}đ</span>
                              @else
                                  <span class="aa-product-price">{{number_format($tl->promotionprice)}}đ</span>
                                  <span class="aa-product-price"><del>{{number_format($tl->price)}}đ</del></span>
                              @endif
                            </figcaption>
                          </figure>                     
                          <div class="aa-product-hvr-content">
                           <!--  <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                            <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a> -->
                            <a href="pages/chitietsp/{{$tl->id}}" class="show-modal" data-toggle2="tooltip" data-placement="top" title="Chi tiết" ><span class="fa fa-search"></span></a>                              
                          </div>
                          <!-- product badge -->
                           @if($tl->promotionprice!=0)
                            <span class="aa-badge aa-sale" href="#">SALE!</span>
                          @endif
                          @if($tl->quantity==0)
                           <span style="position: absolute;top: 5%;right: 0;padding: 5px 10px;color: #fdfdfd;font-size: 15px;background: burlywood;" href="#">Tạm hết hàng</span>
                          @endif
                        </li>
                      @endforeach                                                                     
                  </ul>
                  <a class="aa-browse-btn" href="pages/sanpham">Xem tất cả sản phẩm <span class="fa fa-long-arrow-right"></span></a>
                </div>
                <!-- / popular product category -->
                
                            
              </div>
            </div>
          </div> 
        </div>
      </div>
    </div>
  </section>
  <!-- / popular section -->
  <!-- Support section -->
  <section id="aa-support">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-support-area">
            <!-- single support -->
            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="aa-support-single">
                <span class="fa fa-truck"></span>
                <h4>Miễn phí vận chuyển</h4>
                <P>Nhanh chóng trong vòng 24h</P>
              </div>
            </div>
            <!-- single support -->
            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="aa-support-single">
                <span class="fa fa-clock-o"></span>
                <h4>30 ngày đổi trả</h4>
                <P>Luôn giữ uy tín</P>
              </div>
            </div>
            <!-- single support -->
            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="aa-support-single">
                <span class="fa fa-phone"></span>
                <h4>hỗ trợ 24/7</h4>
                <P>Hỗ trợ nhanh chóng thuận tiện</P>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / Support section -->

@endsection
