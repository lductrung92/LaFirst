<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoaiTinRequest extends FormRequest
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
            'txtName' => 'required|unique:loaitin,Ten|min:1|max:100',
            'TheLoai' => 'required', 
        ];
    }

    public function messages(){
        return array(
            'txtName.required' => 'Bạn chưa nhập tên loại tin',
            'txtName.unique' => 'Tên loại tin đã tồn tại',
            'txtName.min' => 'Tên loại tin phải có độ dài từ 1 đến 100 ký tự',
            'txtName.max' => 'Tên loại tin phải có độ dài từ 1 đến 100 ký tự',
            'TheLoai.required' => 'Bạn chưa chọn thể loại', 
        );
    }
}
