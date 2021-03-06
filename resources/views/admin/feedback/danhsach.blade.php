@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Phản hồi khách hàng
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
                                <th>STT</th>
                                <th>Tên khách hàng</th>
                                <th>Email</th>
                                <th>Địa chỉ</th>
                                <th>Tiêu đề </th>
                                <th>Nội dung</th>    
                                <th>Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $stt=1; ?>
                            @foreach($feedback as $fb)
                            <tr class="odd gradeX" align="center">
                                <td>{{$stt++}}</td>
                                <td>{{$fb->name}}</td>
                                <td>{{$fb->email}}</td>
                                <td>{{$fb->title}}</td>
                                <td>{{$fb->address}}</td>
                                <td>{{$fb->content}}</td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/feedback/xoa/{{$fb->id}}"> Xóa</a></td>
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