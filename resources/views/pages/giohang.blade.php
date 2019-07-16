 @extends('layout.index')
 @section('title')
 Giohang
 @endsection
 @section('content')
   
 <!-- catg header banner section -->
  <section id="aa-catg-head-banner">
   <img style="max-width: 100%;" src="upload/images/banner2.jpg" alt="fashion img">
   <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
        <h2>Giỏ hàng</h2>
        <ol class="breadcrumb">
          <li><a href="pages/trangchu">Trang chủ</a></li>                   
          <li class="active">Giỏ hàng</li>
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
         <div class="cart-view-area">
           <div class="cart-view-table">
             <form action="" >
             
               <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                       
                        <th>Ảnh</th>
                        <th>Tên</th>
                        <th>Giá gốc</th>
                        <th>Giá khuyến mại</th>
                       
                        <th>Số Lượng</th>
                        <th>Tổng</th>
                        <th>Tùy chọn</th>
                        
                      </tr>
                    </thead>
                    <tbody> 
                   
                      <form  method="POST">
                        <input type="hidden" name="_token" value="{!!csrf_token()!!}"/>
                          @foreach($data as $key => $dt)
                           
                          <tr>
                           <input type="hidden" name="id_cart" value="{{$dt->id}}" class="id_cart" />
                            <td><a href="#"><img src="upload/images/{{$dt->attributes->img}}" alt="img"></a></td>
                            <td><a class="aa-cart-title" href="#">{{$dt->name}}</a></td>
                            <td>{{number_format($dt->attributes->unit_price)}}đ</td>
                            <td>
                              @if($dt->attributes->pr_price>0)
                              {{number_format($dt->attributes->pr_price)}}đ
                               @else
                              0 đ
                              @endif
                            </td>
                             
                            <td><input class="aa-cart-quantity qty" type="number" name="quantity" value="{{ $dt -> quantity}}" >
                            </td>
                           
                            <td>
                              @if($dt->attributes->pr_price>0)
                              {{number_format($dt->quantity*$dt->attributes->pr_price)}}đ
                              @else
                              {{number_format($dt->quantity*$dt->price)}}đ
                              @endif
                            </td>
                             <td>
                              <div><a class="remove" href="{{ asset('cart/delete/'.$dt->id) }}">Xóa</a></div>
                             <!--  <a href="cart/show" class="updatecart" id="{!!$dt->id!!}">cập nhập</a> -->
                             </td>
                          </tr>
                         @endforeach
                        </form>
                          <tr>
                            <td colspan="8" class="aa-cart-view-bottom">
                              <div class="aa-cart-coupon">
                                <a class="aa-cart-view-btn" href="pages/trangchu">Mua thêm sản phẩm </a>
                                <a style="margin-right: 30px;" class="aa-cart-view-btn" href="{{asset('cart/delete/all')}}" >Xóa giỏ hàng</a>
                              </div>
                            
                            </td>
                          </tr>
                     
                      </tbody>
                  </table>
                </div>
             </form>
             <!-- Cart Total view -->
             <div class="cart-view-total">
               <h4>Tổng giỏ hàng của bạn</h4>
               <table class="aa-totals-table">
                 <tbody>
                   <tr>
                     <th>Số lượng sản phẩm</th>
                     <td>{{Cart::getTotalQuantity()}}</td>
                   </tr>
                   <tr>
                     <th>Tổng tiền</th>
                     <td>
                      @if($total>0)
                      {{number_format($total)}}đ
                      @else 0
                      @endif
                    </td>
                   </tr>
                 </tbody>
               </table>
              @if(count($data)>0)
               <a href="cart/dathang" class="aa-cart-view-btn">Tiến hành đặt hàng</a>
             
             @endif
             </div>
           </div>
         </div>
       </div>
     </div>
   </div>
 </section>
 <!-- / Cart view section -->
 @endsection

  @section('script')
  
   <script type="text/javascript">
    $(document).ready(function(){
      $(".updatecart").click(function(){
        var id=$(this).attr("id");
        var qty=$(this).parent().parent().find(".qty").val();
        var token=$("input[name='_token']").val();
        $.ajax({
          url:'update/'+id+'/'+qty,
          type:'POST',
          cache:false,
          data:{"_token":token,"id":id,"qty":qty},
          success:function(data){
            if(data=="oke"){
              window.location="cart/show"
            }
          }

        });
      });
    });
   </script>
 @endsection