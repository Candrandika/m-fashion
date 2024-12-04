<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ColorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        if(in_array('POST',$this->route()->methods)){
            return [
                'product_id' => 'required',
                'image' => 'required|image|mimes:jpg,png,jpeg|max:2048',
                'color' => 'required'
            ];
        } else {
            return [
                'product_id' => 'required',
                'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
                'color' => 'required'
            ];
        }
    }

    public function messages(): array
    {
        return [
            'product_id.required' => 'Data warna harus terikat dengan produk!',
            'image.required' => 'Gambar harus berupa image!',
            'image.image' => 'Gambar harus berupa image!',
            'image.mimes' => 'Format Gambar hanya bisa ".jpg,.png,.jpeg"!',
            'image.max' => 'Maxksimal ukuran Gambar 2mb!',
            'color.required' => 'Nama warna harus diisi!'
        ];
    }
}
