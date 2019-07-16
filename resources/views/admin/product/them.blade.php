@extends ('admin.layout.index')
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Sản phẩm
                            <small>Thêm</small>
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
                        <form action="admin/product/them" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                            <div class="form-group">
                                <label>Thương hiệu</label>
                                <select class="form-control" name="thuonghieu">
                                    @foreach($brand as $br)
                                    <option value="{{$br->id}}">{{$br->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                             <div class="form-group">
                                <label>Loại sản phẩm</label>
                                 <select class="form-control" name="loaisp">
                                    @foreach($productcategory as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tên sản phẩm</label>
                                <input class="form-control" name="ten" placeholder="Nhập tên sản phẩm" />
                            </div>
                            <div class="form-group">
                                <label>Hình ảnh</label>
                                <input type="file" name="hinh" />
                            </div>
                            <div class="form-group">
                                <label>Giá</label>
                                <input type="number" class="form-control" name="gia" placeholder="Nhập giá sản phẩm" />
                            </div>
                            <div class="form-group">
                                <label>Giá khuyến mại</label>
                                <input type="number" class="form-control" name="giakhuyenmai" placeholder="Nhập giá khuyến mại" />
                            </div>
                            <div class="form-group">
                                <label>Thời gian bảo hành</label>
                                <input type="number" class="form-control" name="thoigian" placeholder="Nhập thời gian bảo hành" />
                            </div>
                            <div class="form-group">
                                <label>Số lượng</label>
                                <input type="number" class="form-control" name="soluong" placeholder="Nhập số lượng" />
                            </div>
                            <div class="form-group">
                                <label>Chi tiết</label>
                                <textarea id="demo" name="chitiet" class="form-control ckeditor" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Mô tả</label>
                                <textarea id="demo" name="mota" class="form-control ckeditor" rows="3"></textarea>
                            </div>
                            
                            <button type="submit" class="btn btn-default">Thêm sản phẩm</button>
                            <button type="reset" class="btn btn-default">Đặt lại</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
@endsection