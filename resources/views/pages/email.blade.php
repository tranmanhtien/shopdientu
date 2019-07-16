<!-- form lấy giữu liệu từ form dat hàng để đẩy sang đây gửi về mail -->
<div>
  <h3>Thông tin khách hàng</h3>
  <p><strong>Khách hàng:</strong>{{$info['ten']}}</p>
  <p><strong>Email:</strong>{{$info['email']}}</p>
  <p><strong>Điện thoại:</strong>{{$info['sodienthoai']}}</p>
  <p><strong>Địa chỉ:</strong>{{$info['diachi']}}</p>
</div>
<div>
  <h3>Hóa đơn mua hàng</h3>
  <table border="1" cellspacing="0">
    <tr>
      <th>Tên sản phẩm</th>
      <th>Số lượng</th>
      <th>Giá gốc</th>
      <th>Giá khuyến mại</th>
      <th>Thành tiền</th>
    </tr>
    @foreach($cart as $item)
    <tr>
      <td>{{$item->name}}</td>
      <td>{{$item->quantity}} chiếc</td>
      <td>{{number_format($item->attributes->unit_price)}} đ</td>
      <td>
           @if($item->attributes->pr_price>0)
          {{number_format($item->attributes->pr_price)}}đ
          @else
          0 đ
          @endif
      </td>
      <td>
        @if($item->attributes->pr_price>0)
        {{number_format($item->quantity*$item->attributes->pr_price)}}đ
        @else
        {{number_format($item->quantity*$item->price)}}đ
        @endif
      </td>
    </tr>
    @endforeach
    <tr>
      <td><b>Tổng tiền:</b></td>
      <td colspan="4">{{number_format($total)}}đ</td>
    </tr>
    
  </table>
  <div>
    <h3>Quý khách đã đặt hàng thành công!</h3>
    <p>Hóa đơn mua hàng của quý khách đã được chuyển đến bộ phận xử lí đơn hàng của shop </p>
    <p>Đơn hàng sẽ được phản hồi trong 24h</p>
    <p>Nhân viên giao hàng sẽ liên hệ với khách qua số điện thoại trước khi giao hàng 24h</p>
    <p>Cảm ơn quý khách đã mua hàng</p>
  </div>
</div>