<?php

namespace App\Http\Controllers;

use App\TheLoai;
use App\Http\Requests\TheLoaiRequest;


class TheLoaiController extends Controller
{
   public function getDanhSach(){
     $theloai = TheLoai::all();
     return view('admin.theloai.danhsach', ['theloai' => $theloai]);
   }

   public function postThem(TheLoaiRequest $request){
      $theloai = new TheLoai;
      $theloai->Ten = $request->txtName;
      $theloai->TenKhongDau = changeTitle($request->txtName);
      $theloai->save();

      return redirect('admin/theloai/danhsach')->with('thongbao', 'Thêm thành công');
   }

   public function getThem(){
       return view('admin.theloai.them');
   }

   public function postSua(TheLoaiRequest $request, $id){
       $theloai = TheLoai::find($id);
       $theloai->Ten = $request->txtName;
       $theloai->TenKhongDau = changeTitle($request->txtName);
       $theloai->save();

       return redirect('admin/theloai/danhsach')->with('thongbao', 'Sữa thành công');
   }

   public function getSua($id){
       $theloai = TheLoai::find($id);
       return view('admin.theloai.sua', ['theloai'=> $theloai]);
   }

   public function getXoa($id){
     $theloai = TheLoai::find($id);
     $theloai->delete();

     return redirect('admin/theloai/danhsach')->with('xoa', 'Xóa ' . $theloai->Ten . ' thành công');
   }
   
}
