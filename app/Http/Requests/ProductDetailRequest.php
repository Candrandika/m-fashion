<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductDetailRequest extends FormRequest
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
            'size_id' => 'required',
            'warna_id' => 'required',
            'size' => 'nullable',
            'price' => 'nullable|numeric|min:1',
            'stock' => 'required|numeric|min:0',
            'discount' => 'nullable',
            'width' => 'nullable',
            'height' => 'nullable'
        ];
    }

    public function messages(): array
    {
        return [
            'product_id.required' => 'Product harus diisi!',
            'size_id.required' => 'Ukuran harus diisi!',
            'warna_id.required' => 'Warna harus diisi!',
            'price.numeric' => 'Harga harus berupa angka!',
            'price.min' => 'Harga harus diatas 1',
            'stock.required' => 'Stok produk harus diisi!',
            'stock.numeric' => 'Stok produk harus berupa angka!',
            'stock.min' => 'Stok produk harus diatas minimal 0'
        ];
    }
}
