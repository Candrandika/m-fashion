<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CartRequest extends FormRequest
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
            'product_detail_id' => 'required',
            'user_id' => 'required',
            'total' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'product_detail_id.required' => 'Produk harus diisi!',
            'user_id.required' => 'User harus diisi!',
            'total.required' => 'Jumlah barang harus diisi'
        ];
    }

    public function prepareForValidation(){
        if(!$this->total) $this->merge(['total' => 1]);
        if(!$this->user_id) $this->merge(['user_id' => Auth::user()->id]);
    }
}
