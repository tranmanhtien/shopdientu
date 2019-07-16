@extends ('admin.layout.index')
@section('content')
  <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Thể loại
                            <small>{{$productcategory->name}}</small>
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
                        @if(session('thongbao'))
                            <div class="alert alert-success">
                                {{session('thongbao')}}
                            </div>
                        @endif
                     
                         <form action="admin/productcategory/sua/{{$productcategory->id}}" method="POST" enctype="multipart/form-data">
                            <!-- day du lieu form -->
                          @csrf
                            <div class="form-group">
                                <label>Tên thể loại</label>
                                <input class="form-control" name="Ten" placeholder="Điền tên thể loại" value="{{ old('Ten',$productcategory->name) }}" />

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