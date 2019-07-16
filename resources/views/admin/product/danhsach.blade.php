@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Sản phẩm
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
                                <th>Name</th>
                                <th>Hình</th>
                                <th>Chi tiết</th>
                                <!-- <th>Mô tả</th> -->
                                <th>Giá</th>
                                <th>Giá khuyến mại</th>
                                <th>Bảo hành</th>
                                <!-- <th>Loại</th> -->
                                <th>Hãng</th>
                                <th>Nổi bật</th>
                                <th>Số lượng</th>
                                <th>Số lượng đã bán</th>
                                <th>Xóa</th>
                                <th>Sửa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($product as $pd)
                           
                            <tr class="odd gradeX" align="center">
                                
                                <td>{{$pd->id}}</td>
                                <td>{{$pd->name}}</td>
                                <td><img width="70px" src="upload/images/{{$pd->images}}" alt=""></td>
                                <td  maxlength="20">{{Str::limit($pd->detail,20,'...')}}</td>
                               <!--  <td maxlength="20">{{Str::limit($pd->description,20,'...')}}</td> -->
                                <td>@if($pd->price>=10000000)
                                    {{Str::limit(number_format($pd->price),4,'triệu')}}
                                @else
                                    {{Str::limit(number_format($pd->price),3,'triệu')}}
                                @endif
                            </td>
                                <td>
                                    @if($pd->promotionprice >=10000000)
                                    {{Str::limit(number_format($pd->promotionprice),4,'triệu')}}
                                    @elseif($pd->promotionprice < 10000000 && $pd->promotionprice > 0)
                                     {{Str::limit(number_format($pd->promotionprice),3,'triệu')}}
                                    @else
                                     0 đ
                                   
                                    @endif
                                </td>
                                <td>{{$pd->warranty}} tháng</td>                    
                                <!-- <td>{{$pd->productcategory->name}}</td> -->
                                <td>{{$pd->brand->name}}</td>
                                <td>  @if($pd->tophot==1)
                                    {{"có"}}
                                    @else
                                    {{"không"}}
                                    @endif</td>
                                <td>{{$pd->quantity}} chiếc</td>
                                <td>{{$pd->numbersell}} chiếc</td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/product/xoa/{{$pd->id}}"> Xóa</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/product/sua/{{$pd->id}}">Sửa</a></td>
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