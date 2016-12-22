@extends('admin.layout.index')
@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Thể loại
                        <small>{{ $theloai->Ten }}</small>
                    </h1>
                </div>
                
                <div class="col-lg-7" style="padding-bottom:120px">
                    <!-- check validate -->
                        @if(count($errors) > 0)
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $err)
                                    {{ $err }}<br />
                                @endforeach
                            </div>
                        @endif
                    <!-- check validate -->
                    <form action="admin/theloai/sua/{{ $theloai->id }}" method="POST">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <div class="form-group">
                            <label>Tên thể loại</label>
                            <input class="form-control" name="txtName" placeholder="Nhập tên thế loại" value="{{ $theloai->Ten }}" />
                        </div>
                        <button type="submit" class="btn btn-default">Sửa</button>
                        <button type="reset" class="btn btn-default">Làm mới</button>
                    <form>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
@endsection