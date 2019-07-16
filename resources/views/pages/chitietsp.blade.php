@extends('layout.index')
@section('title')
Chitietsanpham
@endsection
@section('content')
<!-- catg header banner section -->
  <section id="aa-catg-head-banner">
   <img src="upload/images/banner1.jpg" alt="fashion img">
   <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
        <h2>Chi tiết sản phẩm </h2>
        <ol class="breadcrumb">
          <li><a href="pages/trangchu">Trang chủ</a></li>         
          <li><a href="#">Loại sản phẩm</a></li>
          <li class="active">{{$pd_detail->productcategory->name}}</li>
        </ol>
      </div>
     </div>
   </div>
  </section>
  <!-- / catg header banner section -->

  <!-- product category -->
  <section id="aa-product-details">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-product-details-area">
            <div class="aa-product-details-content">
              <div class="row">
                <!-- Modal view slider -->
                <div class="col-md-5 col-sm-5 col-xs-12">                              
                  <div class="aa-product-view-slider">                                
                    <div id="demo-1" class="simpleLens-gallery-container">
                      <div class="simpleLens-container">
                        <div class="simpleLens-big-image-container"><a data-lens-image="upload/images/{{$pd_detail->images}}" class="simpleLens-lens-image"><img src="upload/images/{{$pd_detail->images}}" class="simpleLens-big-image"></a></div>
                      </div>
                      <!-- <div class="simpleLens-thumbnails-container">
                          <a data-big-image="img/view-slider/medium/polo-shirt-1.png" data-lens-image="img/view-slider/large/polo-shirt-1.png" class="simpleLens-thumbnail-wrapper" href="#">
                            <img src="img/view-slider/thumbnail/polo-shirt-1.png">
                          </a>                                    
                          <a data-big-image="img/view-slider/medium/polo-shirt-3.png" data-lens-image="img/view-slider/large/polo-shirt-3.png" class="simpleLens-thumbnail-wrapper" href="#">
                            <img src="img/view-slider/thumbnail/polo-shirt-3.png">
                          </a>
                          <a data-big-image="img/view-slider/medium/polo-shirt-4.png" data-lens-image="img/view-slider/large/polo-shirt-4.png" class="simpleLens-thumbnail-wrapper" href="#">
                            <img src="img/view-slider/thumbnail/polo-shirt-4.png">
                          </a>
                      </div> -->
                    </div>
                  </div>
                </div>
                <!-- Modal view content -->
                <div class="col-md-7 col-sm-7 col-xs-12">
                  <div class="aa-product-view-content">
                    <h3><b>{{$pd_detail->name}}</b></h3>
                    <div class="aa-price-block">
                       @if($pd_detail->price > 0)
                      <span class="aa-product-view-price">
                        Giá sản phẩm:{{number_format($pd_detail->price)}}đ</span><br>
                      <span class="aa-product-view-price">
                        Giá khuyến mại :{{number_format($pd_detail->promotionprice)}}đ</span><br>
                      @else
                      <span class="aa-product-view-price">
                        Giá sản phẩm:{{number_format($pd_detail->price)}}đ</span><br>
                      @endif
                       <span class="aa-product-view-price">
                        Hãng sản xuất:{{$pd_detail->brand->name}}</span>
                      <p class="aa-product-view-price">Số lượt xem: <b>{{$viewcount}}</b> <i class="fa fa-eye"></i></p>
                       <p class="aa-product-view-price">Tình trạng: <b>@if($pd_detail->quantity>0)
                        {{"Còn hàng"}}
                        @else
                        {{"Hết hàng"}}
                        @endif
                       </b> </p>
                      <p class="aa-product-avilability">Loại sản phẩm: <span>{{$pd_detail->productcategory->name}}</span></p>
                    </div>
                    {!!$pd_detail->detail!!}
                    <div class="aa-prod-view-bottom">
                       @if($pd_detail->quantity>0)
                      <a class="aa-add-to-cart-btn" href="{{asset('cart/add/'.$pd_detail->id)}}">Thêm giỏ hàng</a>
                      @endif
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="aa-product-details-bottom">
              <ul class="nav nav-tabs" id="myTab2">
                <li><a href="#description" data-toggle="tab">Mô tả</a></li>
                <li><a href="#review" data-toggle="tab">Đánh giá</a></li>                
              </ul>

              <!-- Tab panes -->
              <div class="tab-content">
                <div class="tab-pane fade in active" id="description">
                  <p>{!!$pd_detail->description!!}</p>
                 
                </div>
                <div class="tab-pane fade " id="review">
                 <div class="aa-product-review-area">
                   <h4>Nhận xét sản phẩm</h4> 
                   <ul class="aa-review-nav">
                    @foreach($pd_detail->comment as $cm)
                     <li>
                        <div class="media">
                          <div class="media-left">
                            <a href="#">
                              <img class="media-object" src="upload/images/user3.png" alt="girl image">
                            </a>
                          </div>
                          <div class="media-body">
                            <h4 class="media-heading"><strong>{{$cm->user->name}}</strong> - <span>{{$cm->created_at}}</span></h4>
                            
                            <p>{{$cm->content}}</p>
                          </div>
                        </div>
                      </li>
                    @endforeach  
                   </ul>
                   @if(Auth::check())
                   <h4>Thêm nhận xét</h4>
                   <!-- review form -->
                      @if(session('thongbao'))
                          {{session('thongbao')}}
                      @endif
                   <form action="binhluan/{{$pd_detail->id}}" method="post" class="aa-review-form">
                      <div class="form-group">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <label for="message">Bình luận của bạn</label>
                        <textarea class="form-control" name="noidung" rows="3" id="message"></textarea>
                      </div>
                      

                      <button type="submit" class="btn btn-default aa-review-submit">Gửi</button>
                   </form>
                   @endif
                 </div>
                </div>            
              </div>
            </div>
            <!-- Related product -->
            <div class="aa-product-related-item">
              <h3>Sản phẩm tương tự</h3>
              <ul class="aa-product-catg aa-related-item-slider">
                <!-- start single product item -->
                @foreach($pd_same as $same)
                <li>
                  <figure>
                    <a class="aa-product-img" href="pages/chitietsp/{{$same->id}}"><img src="upload/images/{{$same->images}}" alt="polo shirt img"></a>
                    <a class="aa-add-card-btn"href="{{'cart/add/'.$same->id}}"><span class="fa fa-shopping-cart"></span>Thêm giỏ hàng</a>
                     <figcaption>
                      <h4 class="aa-product-title"><a href="pages/chitietsp/{{$same->id}}">{{$same->name}}</a></h4>
                      @if($same->promotionprice==0)
                        <span class="aa-product-price">{{number_format($same->price)}}đ</span>
                      @else
                        <span class="aa-product-price">{{number_format($same->promotionprice)}}đ</span>
                        <span class="aa-product-price"><del>{{number_format($same->price)}}đ</del></span>
                      
                      @endif
                    </figcaption>
                  </figure>                     
                  <div class="aa-product-hvr-content">
                   <!--  <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                    <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a> -->
                     <a href="pages/chitietsp/{{$same->id}}" class="show-modal" data-toggle2="tooltip" data-placement="top" title="Chi tiết" ><span class="fa fa-search"></span></a>                            
                  </div>
                  <!-- product badge -->
                 @if($same->promotionprice!=0)
                            <span class="aa-badge aa-sale" href="#">SALE!</span>
                 @endif
                @if($same->quantity==0)
                            <span style="position: absolute;top: 5%;right: 0;padding: 5px 10px;color: #fdfdfd;font-size: 15px;background: burlywood;" href="#">Tạm hết hàng</span>
                @endif
                </li>                      
                @endforeach                                                      
              </ul>
              <div class="row" style="margin: 0 auto; text-align: center;">{{$pd_same->links()}}</div>
               
            </div>  
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / product category -->


 
 @endsection