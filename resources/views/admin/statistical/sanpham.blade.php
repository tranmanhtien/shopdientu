@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
               
                <div class="row">
                   <form action="admin/thongkesp" id="form_order" method="get">
                    <input type="hidden" name="_token" value="{{csrf_token()}}"/>     
                    <div class="col-lg-12"> 
                         <h1>Thống kê sản phẩm</h1>
                        <select style="padding: 3px 0;" class="orderby" name="orderby">
                          <option {{Request::get('orderby')=="spbannhieu"?"selected='selected'":""}} value="spbannhieu" >Sản phẩm bán nhiều </option>
                          <option {{Request::get('orderby')=="spluotxemnhieu"?"selected='selected'":""}} value="spluotxemnhieu" >Sản phẩm có lượt xem nhiều</option>
                          <option {{Request::get('orderby')=="sptonkho"?"selected='selected'":""}} value="sptonkho" >Sản phẩm tồn kho</option>
                        </select>
                        <button type="submit">Thống kê</button>
                    </div>
                    </form>
                    <div class="col-lg-12">
                        <h1 class="page-header">Danh sách
                            <!-- <small>Danh sách</small> -->
                        </h1>
                    </div>
                       
                    <table class="table table-striped table-bordered table-hover" >
                        <thead>
                            <tr align="center">
                                <th>Tên sản phẩm</th>
                                <th>Số lượng trong kho</th>
                                <th>Số lượng đã bán</th>
                                <th>Số lượt xem</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach($sanpham as $sp)
                           <tr>
                               <td>{{$sp->name}}</td>
                               <td>{{$sp->quantity}}</td>
                               <td>{{$sp->numbersell}}</td>
                               <td>{{$sp->viewcount}}</td>
                           </tr>
                          @endforeach
                        </tbody>
                    </table>
                  
                </div>
            
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
     
@endsection
@section('script')
<script  type="text/javascript" charset="utf-8" async defer>
  $function(){
    $('.orderby').change( function(){
          $("#form_order").submit(); 
    });
  }
</script>
@endsection