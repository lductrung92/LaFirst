<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TheLoai;
use App\LoaiTin;
use App\TinTuc;
use App\Http\Requests\TinTucRequest;

class TinTucController extends Controller
{
    public function getDanhSach(){
        $tintuc = TinTuc::orderBy('id', 'DESC')->get();
        return view('admin.tintuc.danhsach', ['tintuc' => $tintuc]);
    }

    public function getThem(){
        $theloai = TheLoai::all();
        $loaitin = LoaiTin::all();
        return view('admin.tintuc.them', ['theloai'=>$theloai, 'loaitin'=>$loaitin]);
    }

    public function postThem(TinTucRequest $request){
        $tintuc = new TinTuc;
        $tintuc->TieuDe = $request->txtTieuDe;
        $tintuc->TieuDeKhongDau = changeTitle($request->txtTieuDe);
        $tintuc->idLoaiTin = $request->LoaiTin;
        $tintuc->TomTat = $request->txtTomTat;
        $tintuc->NoiDung = $request->txtNoiDung;
        $tintuc->SoLuotXem = 0;

        if($request->hasFile('fHinh'))
        {
            $file = $request->file('fHinh');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg'){
                return redirect('admin/tintuc/danhsach')->with('thongbao', 'File upload lên phải có định dạng sau jpg,png,jpeg');
            }
            $name = $file->getClientOriginalName();
            $Hinh = str_random(4) . "_" . $name;
            while(file_exists("upload/tintuc/" . $Hinh))
            {
                $Hinh = str_random(4) . "_" . $name;
            }
            $file->move("upload/tintuc/", $Hinh);
            $tintuc->Hinh = $Hinh;
        }
        else
        {
            $tintuc->Hinh = "";
        }

        $tintuc->save();

       return redirect('admin/tintuc/danhsach')->with('thongbao', 'Thêm thành công');
    }

    public function getSua($id){
        
    }

    public function postSua(){

    }

    public function getXoa($id){
        $tintuc = TinTuc::find($id);
        $tintuc->delete();

        return redirect('admin/tintuc/danhsach')->with('xoa', 'Xóa ' . $tintuc->TieuDe . ' thành công');
    }
}
