<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TinTucRequest extends FormRequest
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
            'LoaiTin' => 'required',
            'txtTieuDe' => 'required|min:3|unique:tintuc,TieuDe',
            'txtTomTat' => 'required',
            'txtNoiDung' => 'required',
        ];
    }

    public function messages(){
        return array(
            'LoaiTin.required' => 'Bạn chưa chọn loại tin',
            'txtTieuDe.required' => 'Bạn chưa nhập tiêu đề',
            'txtTieuDe.min' => 'Tiêu đề quá ngắn',
            'txtTieuDe.unique' => 'Tiêu đề đã tồn tại',
            'txtTomTat.required' => 'Bạn chưa nhập tóm tắt',
            'txtNoiDung.required' => 'Bạn chưa nhập nội dung',
        );
    }
}
