@extends ('admin.layout.index')
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Người dùng
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
                        @if(session('Thongbao'))
                        <div class="alert alert-success">{{session('Thongbao')}}</div>
                        @endif
                        <form action="admin/user/them" method="POST">
                            <!-- token để truyền fom này lên -->
                            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                            <div class="form-group">
                                <label>Tên</label>
                                <input type="text"  name="ten" class="form-control "placeholder="Thêm tên người dùng"/>
                            </div>
                            <div class="form-group">
                                <label>Tài khoản</label>
                                <input type="text"  name="taikhoan" class="form-control "placeholder="Thêm tài khoản"/>
                            </div>
                            <div class="form-group">
                                <label>Mật khẩu</label>
                                <input type="password"  name="matkhau" class="form-control "placeholder="Thêm mật khẩu"/>
                            </div>
                             <div class="form-group">
                                <label>Nhập lại mật khẩu</label>
                                <input type="password"  name="matkhaulai" class="form-control "placeholder="Nhập lại mật khẩu"/>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email"  name="email" class="form-control "placeholder="Thêm email"/>
                            </div>
                            <div class="form-group">
                                <label>Địa chỉ</label>
                                <input type="text"  name="diachi" class="form-control "placeholder="Thêm địa chỉ"/>
                            </div>
                            <div class="form-group">
                                <label>Điện thoại</label>
                                <input type="text"  name="dienthoai" class="form-control "placeholder="Thêm số điện thoại"/>
                            </div>
                             <div class="form-group">
                                <label>Chọn quyền</label>
                                <label class="radio-inline">
                                    <input name="quyen" value="1" checked="" type="radio">Quản trị
                                </label>
                                <label class="radio-inline">
                                    <input name="quyen" value="0" type="radio">Thành viên
                                </label>
                            </div>
                          
                            <button type="submit" class="btn btn-default">Thêm</button>
                            <button type="reset" class="btn btn-default">Làm mới</button>
                        </form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
@endsection