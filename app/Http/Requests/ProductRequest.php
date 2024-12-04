<?php

namespace App\Http\Requests;

use App\Helpers\BaseValidation;
use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'category_id' => 'nullable',
            'brand_id' => 'required',
            'name' => 'required',
            'price' => 'required|numeric',
            'desc' => 'nullable',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'supplier' => 'required',
            'shipping_return' => 'required'
        ];
    }

    public function messages(): array
    {
        return [
            'brand_id.required' => 'Brand produk harus diisi!',
            'name.required' => 'Nama produk harus diisi',
            'price.required' => 'Harga harus diisi!',
            'price.numeric' => 'Harga harus di isi dengan angka!',
            'image.image' => 'Gambar harus berupa image!',
            'image.mimes' => 'Format gambar hanya bisa ".jpg,.png,.jpeg"!',
            'image.max' => 'Maxksimal ukuran gambar 2mb!',
            'shipping_return.required' => 'Pengiriman dan pengembalian harus di isi!',
            'supplier.required' => 'Data supplier harus di isi!'
        ];
    }

    public function prepareForVaidation(){
        $char_invalid = BaseValidation::InvalidCharacter();
        
        if($this->desc && in_array($this->desc, $char_invalid)) {
            return redirect()->back()->withErrors('Terdapat kalimat terlarang di deskripsi!');
        }
        if($this->supplier && in_array($this->supplier, $char_invalid)) {
            return redirect()->back()->withErrors('Terdapat kalimat terlarang di data pemasok!');
        }
        if($this->shipping_return && in_array($this->shipping_return, $char_invalid)) {
            return redirect()->back()->withErrors('Terdapat kalimat terlarang di data pengiriman dan pengembalian!');
        }
    }
}
