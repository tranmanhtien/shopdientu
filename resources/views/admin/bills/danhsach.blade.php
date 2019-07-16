@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Hóa đơn
                            <small>Danh sách</small>
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
                                <th>ID</th>
                                <th>Tên khách hàng</th>
                                <th>Ngày mua</th>
                                <th>Ghi chú</th>
                                <th>Tình trạng</th>
                                <th>Tổng tiền</th>
                                <th>Hình thức thanh toán</th>
                                <th>Xóa</th>
                                <th>xem chi tiết</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($bills as $br)
                            <tr class="odd gradeX" align="center">
                                <td>{{$br->id}}</td>
                                <td>{{$br->customer->name}}</td>
                                <td>{{$br->dateorder}}</td>
                                <td>{{$br->note}}</td>
                                <td>@if($br->status > 0)
                                    {{"Đã thanh toán"}}
                                    @else
                                    <a href="admin/bills/sua/{{$br->id}}">{{"Chưa thanh toán"}}</a>
                                    @endif
                                </td>
                                <td>{{number_format($br->total)}}đ</td>
                                <td>{{$br->payment}}</td>
                                @if($br->status > 0)
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/bills/xoa/{{$br->id}}"> Xóa</a></td>
                                @else
                                <td>Xóa</td>
                                @endif
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/bills/chitiet/{{$br->id}}">Chi tiết</a></td>
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