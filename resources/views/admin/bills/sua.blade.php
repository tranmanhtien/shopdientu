@extends ('admin.layout.index')
@section('content')
  <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Tình trạng
                            <small>Hóa đơn số:{{$bill->id}}</small>
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
                     
                         <form action="admin/bills/sua/{{$bill->id}}" method="POST" >
                            <!-- token để truyền fom này lên -->
                            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                           
                             <div class="form-group">
                                <label>Thay đổi tình trạng</label><br>
                                <label class="radio-inline">
                                    <input name="status1" value="1" 
                                    @if( $bill->status==1)
                                    {{"checked"}}
                                    @endif
                                     type="radio">Đã thanh toán
                                </label>
                                <label class="radio-inline">
                                    <input name="status1" value="0"
                                     @if($bill->status==0)
                                        {{"checked"}}
                                    @endif type="radio" >Chưa thanh toán
                                </label>
                            </div>
                          
                            <button type="submit" class="btn btn-default">Sửa</button>
                            
                        </form>   
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
@endsection