@extends('admin.layout.index')
@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Thể Loại
                        <small>danh sách</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->

                @if(session('thongbao'))
                    <div class="col-lg-12">
                        <div class="alert alert-success">
                            {{ session('thongbao') }}
                        </div>
                    </div>
                @endif
                @if(session('xoa'))
                    <div class="col-lg-12">
                        <div class="alert alert-success">
                            {{ session('xoa') }}
                        </div>
                    </div>
                @endif

                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr align="center">
                            <th>ID</th>
                            <th>Tên</th>
                            <th>Tên không dấu</th>
                            <th>Delete</th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($theloai as $tl)
                        <tr class="odd gradeX" align="center">
                            <td>{{ $tl->id }}</td>
                            <td>{{ $tl->Ten }}</td>
                            <td>{{ $tl->TenKhongDau }}</td>
                            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/theloai/xoa/{{ $tl->id }}"> Delete</a></td>
                            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/theloai/sua/{{ $tl->id }}">Edit</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
@endsection