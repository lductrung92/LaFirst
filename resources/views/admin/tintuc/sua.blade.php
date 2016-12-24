@extends('admin.layout.index')
@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Sửa
                        <small>{{ $tintuc->TieuDe }}</small>
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
                    <form action="admin/tintuc/sua/{{ $tintuc->id }}" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                        <div class="form-group">
                            <label>Thể loại</label>
                            <select class="form-control" name="TheLoai" id="TheLoai">
                                @foreach($theloai as $tl)
                                    @if($tintuc->loaitin->theloai->id == $tl->id)
                                        <option value="{{ $tl->id }}" selected>{{ $tl->Ten }}</option>
                                    @else
                                        <option value="{{ $tl->id }}">{{ $tl->Ten }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Loại tin</label>
                            <select class="form-control" name="LoaiTin" id="LoaiTin">
                                @foreach($loaitin as $lt)
                                    @if($tintuc->loaitin->id == $lt->id)
                                        <option value="{{ $lt->id }}" selected>{{ $lt->Ten }}</option>
                                    @else
                                        <option value="{{ $lt->id }}">{{ $lt->Ten }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tiêu đề</label>
                            <input class="form-control" name="txtTieuDe" placeholder="Nhập vào tiêu đề" value="{{ $tintuc->TieuDe }}"/>
                        </div>
                        <div class="form-group">
                            <label>Tóm tắt</label>
                            <textarea class="form-control" name="txtTomTat" rows="3">{{ $tintuc->TomTat }}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Nội dung</label>
                            <textarea id="demo" class="form-control ckeditor" name="txtNoiDung" rows="3">{{ $tintuc->NoiDung }}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Hình ảnh</label>
                            <input type="file" name="fHinh">
                        </div>
                        <div class="form-group">
                            <label>Nổi bật</label>
                            <label class="radio-inline">
                                <input name="rdoNoiBat" value="0" @if($tintuc->NoiBat == 0) {{ "checked" }} @endif type="radio">Không nổi bật
                            </label>
                            <label class="radio-inline">
                                <input name="rdoNoiBat" value="1" @if($tintuc->NoiBat == 1) {{ "checked" }} @endif type="radio">Nổi bật
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
       @if(session('thongbao'))
            <div class="col-lg-12">
                <div class="alert alert-success">
                    {{ session('thongbao') }}
                </div>
            </div>
        @endif
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Comment
                    <small>{{ $tintuc->TieuDe }}</small>
                </h1>
            </div>
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Người dùng</th>
                        <th>Nội dung</th>
                        <th>Ngày đăng</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tintuc->comment as $cm)
                    <tr class="odd gradeX" align="center">
                        <th>{{ $cm->id }}</th>
                        <th>{{ $cm->user->name }}</th>
                        <th>{{ $cm->NoiDung }}</th>
                        <th>{{ $cm->created_at }}</th>
                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/comment/xoa/{{ $cm->id }}/{{ $tintuc->id }}"> Xóa</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- /#page-wrapper -->

@endsection
@section('scripts')
    <script>
        $(document).ready(function(){
            $('#TheLoai').change(function(){
                var idTheLoai = $(this).val();
                $.get("admin/ajax/loaitin/" + idTheLoai, function(data){
                    $("#LoaiTin").html(data);
                }); 
            });
        });
    </script>
    <script type="text/javascript" language="javascript" src="admin_asset/ckeditor/ckeditor.js" ></script>
@endsection