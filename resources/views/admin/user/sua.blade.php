@extends ('admin.layout.index')
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Người dùng
                            <small>{{$user->name}}</small>
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
                        <form action="admin/user/sua/{{$user->id}}" method="POST">
                            <!-- token để truyền fom này lên -->
                            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                            <div class="form-group">
                                <label>Tên</label>
                                <input type="text"  name="ten" class="form-control "placeholder="Thêm tên người dùng" value="{{$user->name}}" />
                            </div>
                            <div class="form-group">
                                <label>Tài khoản</label>
                                <input type="text"  name="taikhoan" class="form-control "placeholder="Thêm tài khoản" value="{{$user->username}}"/>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" id="check" name="changepass">
                                <label>Đổi mật khẩu</label>
                                <input type="password"  name="matkhau" class="form-control pass"placeholder="Thêm mật khẩu" disabled="" />
                            </div>
                             <div class="form-group">
                                <label>Nhập lại mật khẩu</label>
                                <input type="password"  name="matkhaulai" class="form-control pass"placeholder="Nhập lại mật khẩu" disabled="" />
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email"  name="email" class="form-control "placeholder="Thêm email" value="{{$user->email}}" readonly="" />
                            </div>
                            <div class="form-group">
                                <label>Địa chỉ</label>
                                <input type="text"  name="diachi" class="form-control "placeholder="Thêm địa chỉ" value="{{$user->address}}"/>
                            </div>
                            <div class="form-group">
                                <label>Điện thoại</label>
                                <input type="text"  name="dienthoai" class="form-control "placeholder="Thêm số điện thoại" value="{{$user->phone}}"/>
                            </div>
                             <div class="form-group">
                                <label>Chọn quyền</label>
                                <label class="radio-inline">
                                    <input name="quyen" value="1" 
                                    @if( $user->role==1)
                                    {{"checked"}}
                                    @endif
                                     type="radio">Quản trị
                                </label>
                                <label class="radio-inline">
                                    <input name="quyen" value="0"
                                     @if( $user->role==0)
                                    {{"checked"}}
                                    @endif type="radio">Thành viên
                                </label>
                            </div>
                          
                            <button type="submit" class="btn btn-default">Sửa</button>
                            <button type="reset" class="btn btn-default">Làm mới</button>
                        </form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function(){
            $('#check').change(function(){
                if($(this).is(":checked")){
                    $('.pass').removeAttr('disabled');
                }
                else {
                    $('.pass').attr('disabled','');
                }
            });
        });
    </script>
@endsection