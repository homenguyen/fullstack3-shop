<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestProduct extends FormRequest
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
            'name' => 'required',
            'description' => 'required',
//            'image'=>'required',
            'price' => 'required',
            'quantity' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên sản phẩm không được để trống',
            'description.required' => 'Mô tả không được để trống',
//            'image.required'=>'Bạn phải chọn ảnh cho sản phẩm',
            'price.required' => 'Bạn phải nhập giá của sản phẩm',
            'quantity.required' => 'Bạn phải nhập số lượng sản phẩm'
        ];
    }
}
