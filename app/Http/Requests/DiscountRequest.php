<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DiscountRequest extends FormRequest
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
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'desc' => 'required',
            'product_id' => 'nullable',
            'max_used' => 'nullable',
            'used' => 'nullable',
            'percentage' => 'nullable',
            'price' => 'nullable',
            'discount_type' => 'required',
            'start_at' => 'required',
            'end_at' => 'required|after_or_equal:start_at'
        ];
    }

    public function messages(): array
    {
        return [
            'image.image' => 'Logo harus berupa image!',
            'image.mimes' => 'Format logo hanya bisa ".jpg,.png,.jpeg"!',
            'image.max' => 'Maxksimal ukuran logo 2mb!',
            'desc.required' => 'Penamaan diskon harus diisi!',
            'discount_type.required' => 'Tipe diskon harus di isi!',
            'start_at.required' => 'Tanggal mulai diskon harus di isi!',
            'end_at.required' => 'Tanggal berakhir diskon harus di isi!',
            'end_at.after_or_equal' => 'Tanggal berakhir diskon harus lebih dari hari ini!'
        ];
    }

    public function prepareForValidation()
    {
        if(isset($this->discount["percentage"])) $this->merge(["percentage" => $this->discount["percentage"]]);
        if(isset($this->discount["price"])) $this->merge(["price" => $this->discount["price"]]);
    }
}
