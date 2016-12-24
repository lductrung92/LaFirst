@extends('admin.layout.index')
@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">User
                        <small>sữa</small>
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
                    <form action="admin/user/sua/{{ $user->id }}" method="POST">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                        <div class="form-group">
                            <label>Họ tên</label>
                            <input class="form-control" name="txtName" placeholder="Nhập họ tên" value="{{ $user->name }}"/>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input class="form-control" name="txtEmail" placeholder="Nhập email" disabled="" value="{{ $user->email }}"/>
                        </div>
                        <div class="form-group">
                            <input type="checkbox" name="changePass" id="changePass"/>
                            <label>Password</label>
                            <input class="form-control password" type="Password" name="txtPass" disabled="" placeholder="Nhập password"/>
                        </div>
                        <div class="form-group">
                            <label>Nhập lại Password</label>
                            <input class="form-control password" type="Password" name="txtPassAgain" disabled="" placeholder="Nhập lại password"/>
                        </div>
                        <div class="form-group">
                            <label>Quyền</label>
                            <label class="radio-inline">
                                <input name="rdoQuyen" value="0" {{ $user->quyen == 0 ? 'checked' : '' }}  type="radio">Thành viên
                            </label>
                            <label class="radio-inline">
                                <input name="rdoQuyen" value="1" {{ $user->quyen == 1 ? 'checked' : '' }} type="radio">Quản trị
                            </label>
                        </div>
                        <button type="submit" class="btn btn-default">Sữa</button>
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
@section('scripts')
    <script>
        $(document).ready(function(){
            $('#changePass').change(function(){
                if($(this).is(":checked")){
                    $('.password').removeAttr('disabled');
                }else{
                    $('.password').attr('disabled','');
                }
            });
        });
    </script>
@endsection