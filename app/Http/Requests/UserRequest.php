<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'txtName' => 'required|min:3|max:20',
            'txtEmail' => 'required|email|unique:users,email',
            'txtPass' => 'required|min:6|max:20',
            'txtPassAgain' => 'required|same:txtPass',
        ];
    }

    public function messages(){
        return array(
            'txtName.required' => 'Bạn chưa nhập tên',
            'txtName.min' => 'Họ tên phải có từ 3 đến 20 ký tự',
            'txtName.max' => 'Họ tên phải có từ 3 đến 20 ký tự',
            'txtEmail.required' => 'Bạn phải nhập email',
            'txtEmail.email' => 'Email không hợp lệ',
            'txtEmail.unique' => 'Email đã tồn tại',
            'txtPass.required' => 'Bạn chưa nhập password',
            'txtPass.min' => 'Password phải có từ 6 đến 20 ký tự',
            'txtPass.max' => 'Password phải có từ 6 đến 20 ký tự',
            'txtPassAgain.required' => 'Bạn chưa xác nhận mật khẩu',
            'txtPassAgain.same' => 'Xác nhận mật khẩu chưa chính xác'
        );
    }
}
