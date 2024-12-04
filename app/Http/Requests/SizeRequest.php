<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SizeRequest extends FormRequest
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
        return [
            'product_id' => 'required',
            'size' => 'required',
            'width' => 'required|numeric',
            'height' => 'required|numeric'
        ];
    }

    public function messages(): array
    {
        return [
            'product_id.required' => 'Data warna harus terikat dengan produk!',
            'size.required' => 'Ukuran harus berupa image!',
            'width.required' => 'Lebar harus diisi!',
            'width.numeric' => 'Lebar harus berupa angka!',
            'height.required' => 'Tinggi harus diisi!',
            'height.numeric' => 'Tinggi harus berupa angka!'
        ];
    }
}
