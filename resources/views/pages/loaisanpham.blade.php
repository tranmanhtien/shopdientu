 @extends('layout.index')
 @section('title')
Loaisanpham
@endsection
 @section('content')
 <style>
   .aa-catg-nav li .active{
    color: red;
   }
 </style>
  <!-- catg header banner section -->
  <section id="aa-catg-head-banner">
   <img src="upload/images/banner8.jpg" alt="fashion img">
   <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
       
        <h2></h2>
        <ol class="breadcrumb">
          <li><a href="pages/trangchu">Trang chủ</a></li> 
          @foreach($categorysp as $catename)        
            <li class="active">{{$catename->name}}</li>
          @endforeach
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
                @foreach($sp_category as $pd_cate)
                <li>
                  <figure>
                    <a class="aa-product-img" href="pages/chitietsp/{{$pd_cate->id}}"><img src="upload/images/{{$pd_cate->images}}" alt="polo shirt img"></a>
                      @if($pd_cate->quantity>0)
                    <a class="aa-add-card-btn"href="{{'cart/add/'.$pd_cate->id}}"><span class="fa fa-shopping-cart"></span>Thêm giỏ hàng</a>
                     @endif
                    <figcaption>
                      <h4 class="aa-product-title"><a href="pages/chitietsp/{{$pd_cate->id}}">{{$pd_cate->name}}</a></h4>
                      @if($pd_cate->promotionprice==0)
                        <span class="aa-product-price">{{number_format($pd_cate->price)}}đ</span>
                      @else
                        <span class="aa-product-price">{{number_format($pd_cate->promotionprice)}}đ</span>
                        <span class="aa-product-price"><del>{{number_format($pd_cate->price)}}đ</del></span>
                      <p class="aa-product-descrip">{{$pd_cate->detail}}</p>
                      @endif
                    </figcaption>
                  </figure>                         
                  <div class="aa-product-hvr-content">
                   <!--  <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                    <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a> -->
                   <a href="pages/chitietsp/{{$pd_cate->id}}" class="show-modal" data-toggle2="tooltip" data-placement="top" title="Chi tiết" ><span class="fa fa-search"></span></a>                           
                  </div>
                  <!-- product badge -->
                   @if($pd_cate->promotionprice!=0)
                            <span class="aa-badge aa-sale" href="#">SALE!</span>
                     @endif
                     @if($pd_cate->quantity==0)
                           <span style="position: absolute;top: 5%;right: 0;padding: 5px 10px;color: #fdfdfd;font-size: 15px;background: burlywood;" href="#">Tạm hết hàng</span>
                      @endif
                </li>
                 @endforeach
                                                 
              </ul>
             
               
            </div>          
          </div>
           <div class="col-sm-12" style="text-align: center;">{{$sp_category->links()}}</div>  
        </div>
        <div class="col-lg-3 col-md-3 col-sm-4 col-md-pull-9">
          <form action="" method="get">
              <aside class="aa-sidebar">
                <!-- single sidebar -->
                <div class="aa-sidebar-widget">
                  <h3>Loaị sản phẩm</h3>

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
                      @foreach($brand as $brsp)
                        
                        <li><a href="pages/loaithuonghieu/{{$brsp->id}}/{{$price=0}}">{{$brsp->name}}</a></li>
                       
                      @endforeach
                  </ul>
                </div>
                <!-- single sidebar -->
                <div class="aa-sidebar-widget">
                  <h3>Lọc theo giá gốc</h3>

                  <ul class="aa-catg-nav">
                     @foreach($categorysp as $catename) 
                        <li><a href="pages/loaisanpham/{{$catename->id}}/{{$price=1}}">Dưới 8 triệu</a></li>
                        <li><a href="pages/loaisanpham/{{$catename->id}}/{{$price=2}}">Từ 8 - 12 triệu</a></li>
                        <li><a href="pages/loaisanpham/{{$catename->id}}/{{$price=3}}">Trên 12 triệu</a></li>
                     @endforeach 
                  </ul>
                </div>
                <!-- single sidebar -->
                <div class="aa-sidebar-widget">
                  <h3>Sản phẩm nổi bật</h3>
                  <div class="aa-recently-views">
                    <?php $data=$product->where('tophot',1)->sortByDesc('promotionprice')->take(3) ?>
                    <ul>
                      @foreach($data->all() as $pd)
                      <li>
                        <a href="pages/chitietsp/{{$pd->id}}" class="aa-cartbox-img"><img alt="img" src="upload/images/{{$pd->images}}"></a>
                        <div class="aa-cartbox-info">
                          <h4><a href="pages/chitietsp/{{$pd->id}}">{{$pd->name}}</a></h4>
                          <p style="font-size:12px ">Giá khuyến mại:{{number_format($pd->promotionprice)}}đ</p>
                        </div>                    
                      </li>
                      @endforeach
                                                         
                    </ul>
                  </div>                            
                </div>
              </aside>
            </form>
        </div>
       
      </div>
    </div>
  </section>
  <!-- / product category -->
  @endsection