@extends ('admin.layout.index')
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Slide
                            <small>Sửa</small>
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
                        <form action="admin/slide/sua/{{$slide->id}}" method="POST" enctype="multipart/form-data">
                            <!-- token để truyền fom này lên -->
                            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                             <div class="form-group">
                                <label>Hình ảnh</label>
                               <p> <img width="500px" src="upload/images/{{$slide->images}}" alt=""></p>
                                <input type="file" name="hinh" value="{{$slide->images}}" />
                            </div>
                            <div class="form-group">
                                <label>Link</label>
                                <input type="text"  name="link" class="form-control "placeholder="Thêm Link" value="{{$slide->link}}"/>
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