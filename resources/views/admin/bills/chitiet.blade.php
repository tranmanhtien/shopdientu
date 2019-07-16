@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Hóa đơn
                            <small>Chi tiết hóa đơn:
                            @foreach($chitiet as $ct)
                            {{$ct->idbill}}
                            @endforeach
                            </small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                     @if(session('thongbao'))
                            <div class="alert alert-success">
                                {{session('thongbao')}}
                            </div>
                        @endif
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>Mã hóa đơn</th>
                                <th>Mã sản phẩm</th>
                                <th>Số lượng</th>
                                <th>Giá</th>
                              
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($billdetail as $billdt)
                            <tr>
                                <td>{{$billdt->idbill}}</td>
                                <td>{{$billdt->idproduct}}</td>
                                <td>{{$billdt->quantity}}</td>
                                <td>{{number_format($billdt->price)}}đ</td>
                                 
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