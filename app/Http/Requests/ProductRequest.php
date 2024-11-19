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
            'desc' => 'nullable|',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048'
        ];
    }

    public function messages(): array
    {
        return [
            'brand_id.required' => 'Brand produk harus diisi!',
            'name.required' => 'Nama produk harus diisi',
            'image.image' => 'Gambar harus berupa image!',
            'image.mimes' => 'Format gambar hanya bisa ".jpg,.png,.jpeg"!',
            'image.max' => 'Maxksimal ukuran gambar 2mb!',
        ];
    }

    public function prepareForVaidation(){
        $char_invalid = BaseValidation::InvalidCharacter();
        
        if($this->desc && in_array($this->desc, $char_invalid)) {
            return redirect()->back()->withErrors('Terdapat kalimat terlarang di deskripsi!');
        }
    }
}
