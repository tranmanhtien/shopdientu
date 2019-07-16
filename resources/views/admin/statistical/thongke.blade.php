@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <form action="admin/bills/thongke" method="get">
                 <input type="hidden" name="_token" value="{{csrf_token()}}"/>     
                <div class="row">
                    <div class="col-lg-12"> 
                         <h1>Thống kê tài chính theo tháng năm</h1>
                        <input type="number" name="thang" style="width: 100px;" placeholder="Nhập tháng" min="1" max="12" value="{{Request::get('thang')}}">
                        <input type="number" name="nam" style="width: 100px;" min="1900" placeholder="Nhập năm" value="{{Request::get('nam')}}" ">
                        <select style="padding: 3px 0;" class="orderby" name="orderby">
                          <option {{Request::get('orderby')=="1"?"selected='selected'":""}} value="1" >Đã thanh toán</option>
                          <option {{Request::get('orderby')=="2"?"selected='selected'":""}} value="2" >Chưa thanh toán</option>
                        </select>
                        <button type="submit">Thống kê</button>
                    </div>
                    <div class="col-lg-12">
                        <h1 class="page-header">Danh sách
                            <!-- <small>Danh sách</small> -->
                        </h1>
                    </div>
                      @if(count($errors)>0)
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $err)
                                {{$err}}<br>
                            @endforeach
                        </div>
                        @endif
                    <!-- /.col-lg-12 -->
                     @if(session('thongbao'))
                            <div class="alert alert-success">
                                {{session('thongbao')}}
                            </div>
                    @endif
                       
                    <table class="table table-striped table-bordered table-hover" >
                        <thead>
                            <tr align="center">
                                <th>ID Hóa đơn</th>
                                <th>Khách hàng</th>
                                <th>Ngày mua</th>
                                <th>Tình trạng</th>
                                <th>Tổng tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $sum=0; ?>
                           @foreach($bills as $bil)
                           <tr>
                                <td>{{$bil->id}}</td>
                                <td>{{$bil->customer->name}}</td>
                                <td>{{$bil->dateorder}}</td>
                                <td>@if($bil->status > 0)
                                    {{"Đã thanh toán"}}
                                    @else
                                    {{"Chưa thanh toán"}}
                                    @endif
                                </td>
                                <td>{{number_format($bil->total)}}đ</td>
                            <?php $sum=$sum +$bil->total; ?>
                           </tr>
                           
                           @endforeach
                           <tr>
                               <th>Tổng số tiền</th>
                               <td colspan="4">{{number_format($sum)}}đ</td>
                           </tr>
                        </tbody>
                    </table>
                    <div class="col-lg-12">{{$bills->appends($_GET)->links()}}</div>
                   
                </div>
            </form>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
     
@endsection