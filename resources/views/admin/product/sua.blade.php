@extends ('admin.layout.index')
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Sản phẩm
                            <small>{{$product->name}}</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
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
                        <!-- enctype="multipart/form-data dùng để up file hình ... -->
                        <form action="admin/product/sua/{{$product->id}}" method="POST" enctype="multipart/form-data">
                             <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                            <div class="form-group">
                                <label>Thương hiệu</label>
                                <select class="form-control" name="thuonghieu">
                                    @foreach($brand as $br)
                                    <option
                                        @if ( $product->brand->id==$br->id)
                                        {{"selected"}}
                                        @endif
                                     value="{{$br->id}}">{{$br->name}}

                                 </option>
                                    @endforeach
                                </select>
                            </div>
                             <div class="form-group">
                                <label>Loại sản phẩm</label>
                                 <select class="form-control" name="loaisp">
                                    @foreach($productcategory as $category)
                                    <option 
                                        @if( $product->productcategory->id==$category->id)
                                        {{"selected"}}
                                        @endif 
                                        value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tên sản phẩm</label>
                                <input class="form-control" name="ten" placeholder="Nhập tên sản phẩm" value="{{$product->name}}" />
                            </div>
                            <div class="form-group">
                                <label>Hình ảnh</label>
                                <p>
                                    <img width="300px" src="upload/images/{{$product->images}}" alt="">
                                </p>
                                <input type="file" name="hinh" />
                            </div>
                            <div class="form-group">
                                <label>Giá</label>
                                <input type="number" class="form-control" name="gia" placeholder="Nhập giá sản phẩm"  value="{{$product->price}}" />
                            </div>
                            <div class="form-group">
                                <label>Giá khuyến mại</label>
                                <input type="number" class="form-control" name="giakhuyenmai" placeholder="Nhập giá khuyến mại" value="{{$product->promotionprice}}"/>
                            </div>
                            <div class="form-group">
                                <label>Thời gian bảo hành</label>
                                <input type="number" class="form-control" name="thoigian" placeholder="Nhập thời gian bảo hành" value="{{$product -> warranty}}" />
                            </div>
                            <div class="form-group">
                                <label>Số lượng</label>
                                <input type="number" class="form-control" name="soluong" placeholder="Nhập số lượng" value="{{$product -> quantity}}"/>
                            </div>
                            <div class="form-group">
                                <label>Chi tiết</label>
                                <textarea id="demo" name="chitiet" class="form-control ckeditor" rows="3">{{$product->detail}}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Mô tả</label>
                                <textarea id="demo" name="mota" class="form-control ckeditor" rows="3">{{$product->description}}</textarea>
                            </div>
                            
                            <button type="submit" class="btn btn-default">Sửa sản phẩm</button>
                            <button type="reset" class="btn btn-default">Đặt lại</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
                  <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Bình luận
                            <small>Danh sách</small>
                        </h1>
                    </div>
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Người bình luận</th>
                                <th>Sản phẩm</th>
                                <th>Nội dung </th>
                                <th>Xóa</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($product->comment as $cm)
                            <tr class="odd gradeX" align="center">
                                <td>{{$cm->id}}</td>
                                <td>{{$cm->user->name}}</td>
                                <td>{{$product->name}}</td>
                                <td>{{$cm->content}}</td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/comment/xoa/{{$cm->id}}/{{$product->id}}"> Xóa</a></td>
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