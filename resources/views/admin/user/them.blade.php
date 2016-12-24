@extends('admin.layout.index')
@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">User
                        <small>thêm</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
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
                    <form action="admin/user/them" method="POST">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                        <div class="form-group">
                            <label>Họ tên</label>
                            <input class="form-control" name="txtName" placeholder="Nhập họ tên" />
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input class="form-control" name="txtEmail" placeholder="Nhập email" />
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input class="form-control" type="Password" name="txtPass" placeholder="Nhập password" />
                        </div>
                        <div class="form-group">
                            <label>Nhập lại Password</label>
                            <input class="form-control" type="Password" name="txtPassAgain" placeholder="Nhập lại password" />
                        </div>
                        <div class="form-group">
                            <label>Quyền</label>
                            <label class="radio-inline">
                                <input name="rdoQuyen" value="0" checked="" type="radio">Thành viên
                            </label>
                            <label class="radio-inline">
                                <input name="rdoQuyen" value="1" type="radio">Quản trị
                            </label>
                        </div>
                        <button type="submit" class="btn btn-default">Thêm</button>
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