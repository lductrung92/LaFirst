<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function getDanhSach(){
        $users = User::all();
        return view('admin.user.danhsach',['users' => $users]);
    }

    public function getThem(){
        return view('admin.user.them');
    }

    public function postThem(UserRequest $request){
        $user = new User;
        $user->name = $request->txtName;
        $user->email = $request->txtEmail;
        $user->password = bcrypt($request->txtPass);
        $user->quyen = $request->rdoQuyen;
        $user->save();

        return redirect('admin/user/danhsach')->with('thongbao','Thêm thành công');
    }

    public function getSua($id){
        $user = USer::find($id);
        return view('admin.user.sua',['user' => $user]);
    }

    public function postSua($id, Request $request){
        $this->validate($request,[
            'txtName' => 'required|min:3|max:20',
        ],[
            'txtName.required' => 'Bạn chưa nhập tên',
            'txtName.min' => 'Họ tên phải có từ 3 đến 20 ký tự',
            'txtName.max' => 'Họ tên phải có từ 3 đến 20 ký tự',
        ]);

        $user = User::find($id);
        $user->name = $request->txtName;
      
        if($request->changePass == "on"){
              $this->validate($request,[
                    'txtPass' => 'required|min:6|max:20',
                    'txtPassAgain' => 'required|same:txtPass',
                ],[
                    'txtPass.required' => 'Bạn chưa nhập password',
                    'txtPass.min' => 'Password phải có từ 6 đến 20 ký tự',
                    'txtPass.max' => 'Password phải có từ 6 đến 20 ký tự',
                    'txtPassAgain.required' => 'Bạn chưa xác nhận mật khẩu',
                    'txtPassAgain.same' => 'Xác nhận mật khẩu chưa chính xác'
                ]);
             $user->password = bcrypt($request->txtPass);
        }

        $user->quyen = $request->rdoQuyen;
        $user->save();

        return redirect('admin/user/danhsach')->with('thongbao','Sữa thành công');
    }

    public function getXoa($id){
        $user = User::find($id);
        $user->delete();

        return redirect('admin/user/danhsach')->with('xoa','Xóa '. $user->email .' thành công');
    }

    public function loginAdmin(){
        return view('admin.login');
    }

    public function postLoginAdmin(Request $request){
         $this->validate($request,[
                    'password' => 'required|min:6|max:20',
                    'email' => 'required|email',
                ],[
                    'password.required' => 'Bạn chưa nhập password',
                    'password.min' => 'Password phải có từ 6 đến 20 ký tự',
                    'password.max' => 'Password phải có từ 6 đến 20 ký tự',
                    'email.required' => 'Bạn phải nhập email',
                    'email.email' => 'Email không hợp lệ',    
                ]);
         if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
             return redirect('admin/theloai/danhsach');
         }else{
              return redirect('admin/login')->with('dangnhap', 'Đăng nhập không thành công');
         }
    }

    public function logoutAdmin(){
        Auth::logout();

        return redirect('admin/login');
    }
    
}
