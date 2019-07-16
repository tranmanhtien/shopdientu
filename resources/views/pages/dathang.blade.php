@extends('layout.index')
 @section('title')
 Dathang
 @endsection
 @section('content')
 <!-- catg header banner section -->
  <section id="aa-catg-head-banner">
    <img src="upload/images/banner1.jpg" alt="fashion img">
    <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
        <h2>Đặt hàng</h2>
        <ol class="breadcrumb">
          <li><a href="pages/trangchu">Trang chủ</a></li>                   
          <li class="active">Đặt hàng</li>
        </ol>
      </div>
     </div>
   </div>
  </section>
  <!-- / catg header banner section -->

 <!-- Cart view section -->
 <section id="checkout">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
        <div class="checkout-area">
           @if(count($errors)>0)
              <div class="alert alert-danger">
                @foreach($errors->all() as $err)
                    {{$err}}<br>
                @endforeach
              </div>
              @endif
              <!-- in thông báo -->
              @if(session('thongbao'))
              <div class="alert alert-success">{{session('thongbao')}}</div>
           @endif
          <form action="cart/dathang" method="post">
            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
            <div class="row">
              <div class="col-md-6">
                <div class="checkout-left">
                  <div class="panel-group" id="accordion">
                    <div class="panel panel-default aa-checkout-billaddress">
                      <div class="panel-heading">
                        <h4 class="panel-title">
                          Thông tin người mua
                        </h4>
                      </div>
                      <div >
                        @if(Auth::check())
                        <div class="panel-body">
                          <div class="row">
                            <div class="col-md-12">
                              <div class="aa-checkout-single-bill">
                                <input type="text" name="ten" placeholder="Tên người mua" value="{{Auth::user()->name}}">
                              </div>                             
                            </div>
                            <div class="col-md-12">
                              <div class="aa-checkout-single-bill">
                                <input type="text" name="email" placeholder="Email" value="{{Auth::user()->email}}">
                              </div>                             
                            </div>
                            <div class="col-md-12">
                              <div class="aa-checkout-single-bill">
                                <input type="text" name="sodienthoai" placeholder="Số điện thoại" value="{{Auth::user()->phone}}">
                              </div>                             
                            </div>
                            <div class="col-md-12">
                              <div class="aa-checkout-single-bill">
                                <input type="text" name="diachi" placeholder="Địa chỉ" value="{{Auth::user()->address}}">
                              </div>                             
                            </div>
                            <div class="col-md-12">
                                  <div class="aa-checkout-single-bill">
                                    <textarea cols="8" rows="3" name="ghichu" ></textarea>
                                  </div>                             
                                </div>   
                          </div>
                        </div>
                         @else
                        <div class="panel-body">
                              <div class="row">
                                <div class="col-md-12">
                                  <div class="aa-checkout-single-bill">
                                    <input type="text" name="ten" placeholder="Tên người mua" value="{{ old('ten') }}">
                                  </div>                             
                                </div>
                                <div class="col-md-12">
                                  <div class="aa-checkout-single-bill">
                                    <input type="text" name="email" placeholder="Email" value="{{ old('email') }}">
                                  </div>                             
                                </div>
                                <div class="col-md-12">
                                  <div class="aa-checkout-single-bill">
                                    <input type="text"  name="sodienthoai"  placeholder="Số điện thoại" value="{{ old('sodienthoai') }}" >
                                  </div>                             
                                </div>
                                <div class="col-md-12">
                                  <div class="aa-checkout-single-bill">
                                    <input type="text" name="diachi" placeholder="Địa chỉ" value="{{ old('diachi') }}">
                                  </div>                             
                                </div>
                                <div class="col-md-12">
                                  <div class="aa-checkout-single-bill">
                                    <textarea cols="8" rows="3" name="ghichu" placeholder="Ghi chú"></textarea>
                                  </div>                             
                                </div>   
                              </div>
                        </div>
                        @endif
                         
                      </div>

                    </div>
                    
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="checkout-right">
                  <h4>Danh sách giỏ hàng</h4>
                  <div class="aa-order-summary-area">
                     
                    <table class="table table-responsive">
                      <thead>
                        <tr>
                          <th>Sản phẩm</th>
                         
                          <th>Tổng</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($data as $dt)
                        <tr>
                          <td>{{$dt->name}}<strong> x {{$dt->quantity}}</strong></td>
                          <td>@if($dt->attributes->pr_price>0)
                              {{number_format($dt->quantity*$dt->attributes->pr_price)}}đ
                              @else
                              {{number_format($dt->quantity*$dt->price)}}đ
                              @endif
                          </td>
                         
                        </tr>
                        @endforeach
                      </tbody>
                      <tfoot>
                         <tr>
                          <th>Số lượng sản phẩm</th>
                          <td>{{Cart::getTotalQuantity()}}</td>
                        </tr>
                         <tr>
                          <th>Tổng tiền giỏ hàng</th>
                          <td> 
                            @if($total>0)
                              {{number_format($total)}}đ
                              @else 0
                            @endif
                          </td>
                        </tr>
                      </tfoot>
                    </table>
                  </div>
                  <h4>Hình thức thanh toán</h4>
                  <div class="aa-payment-method">                    
                    <label for="cashdelivery"><input type="radio" id="cashdelivery" value="Tiền mặt" name="optionsRadios"> Trả bằng tiền mặt </label>
                    <label for="paypal"><input type="radio" id="paypal" name="optionsRadios" value="Thanh toán ngân hàng " checked=""> Thanh toán qua ngân hàng</label>
                   <!--  <img style="margin-top: 2px;" src="https://www.paypalobjects.com/webstatic/mktg/logo/AM_mc_vs_dc_ae.jpg" border="0" alt="PayPal Acceptance Mark">     -->
                    <!-- <input type="submit" value="Place Order" class="aa-browse-btn">                 -->
                  </div>
                </div>
              </div>
            </div>
              <button style="margin-left: 300px;" type="submit" class="aa-browse-btn">Gửi đơn hàng</button>
          </form>
         </div>
       </div>
     </div>
   </div>
 </section>
 <!-- / Cart view section -->
  @endsection