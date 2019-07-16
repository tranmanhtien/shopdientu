@extends ('admin.layout.index')
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Thể loại
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
                        <form action="admin/productcategory/them" method="POST">
                            <!-- token để truyền fom này lên -->
                            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                            <div class="form-group">
                                <label>Tên thể loại</label>
                                <input type="text"  name="Ten" class="form-control "placeholder="Thêm loại sản phẩm"/>
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