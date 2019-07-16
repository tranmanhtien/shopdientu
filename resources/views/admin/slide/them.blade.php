@extends ('admin.layout.index')
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Slide
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
                        <!-- enctype="multipart/form-data"  dùng để up hình-->
                        <form action="admin/slide/them" method="POST" enctype="multipart/form-data">
                            <!-- token để truyền fom này lên -->
                            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                             <div class="form-group">
                                <label>Hình ảnh</label>
                                <input type="file" name="hinh" />
                            </div>
                            <div class="form-group">
                                <label>Link</label>
                                <input type="text"  name="link" class="form-control "placeholder="Thêm Link"/>
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