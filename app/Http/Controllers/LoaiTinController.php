<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LoaiTin;
use App\TheLoai;
use App\Http\Requests\LoaiTinRequest;

class LoaiTinController extends Controller
{
    public function getDanhSach(){
        $loaitin = LoaiTin::all();
        return view('admin.loaitin.danhsach', ['loaitin' => $loaitin]);
    }

    public function getThem(){
        $theloai = TheLoai::all();
        return view('admin.loaitin.them', ['theloai' => $theloai]);
    }

    public function postThem(LoaiTinRequest $request){
        $loaitin = new LoaiTin;
        $loaitin->Ten = $request->txtName;
        $loaitin->TenKhongDau = changeTitle($request->txtName);
        $loaitin->idTheLoai = $request->TheLoai;
        $loaitin->save();

        return redirect('admin/loaitin/danhsach')->with('thongbao', 'Thêm thành công');
    }

    public function getSua($id){
        $loaitin = LoaiTin::find($id);
        $theloai = TheLoai::all();
        return view('admin/loaitin/sua', ['loaitin' => $loaitin, 'theloai' => $theloai]);
    }

    public function postSua($id, LoaiTinRequest $request){
        $loaitin = LoaiTin::find($id);
        $loaitin->Ten = $request->txtName;
        $loaitin->TenKhongDau = changeTitle($request->txtName);
        $loaitin->idTheLoai = $request->TheLoai;
        $loaitin->save();

        return redirect('admin/loaitin/danhsach')->with('thongbao', 'Sữa thành công');
    }


    public function getXoa($id){
        $loaitin = LoaiTin::find($id);
        $loaitin->delete();

        return redirect('admin/loaitin/danhsach')->with('xoa', 'Xóa ' . $loaitin->Ten . ' thành công');
    }
}
