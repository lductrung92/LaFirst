<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TheLoaiRequest extends FormRequest
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
            'txtName' => 'required|min:3|max:50|unique:theloai,Ten',
        ];
    }

    public function messages()
    {
        return array(
            'txtName.required' => 'Bạn chưa nhập tên thể loại',
            'txtName.min' => 'Tên thể loại phải có độ dài từ 3 đến 50 ký tự',
            'txtName.max' => 'Tên thể loại phải có độ dài từ 3 đến 50 ký tự',
            'txtName.unique' => 'Tên thể loại đã tồn tại'
        );
    }
}
