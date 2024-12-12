<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
                'name' => 'required',
                'email' => 'required|email|unique:users,email',
                'phone' => 'nullable',
                'password' => 'required|min:8',
                'password_confirmation' => 'sometimes|same:password'
            ];
        }else {
            return [
                'name' => 'required',
                'email' => 'required|email|unique:users,email,'. $this->user->id.',id',
                'phone' => 'nullable',
            ];
        }
    }

    public function messages()
    {
        if(in_array('POST',$this->route()->methods)){
            return [
                'name.required' => 'Kolom nama harus diisi.',
                'email.required' => 'Kolom email harus diisi.',
                'email.email' => 'Format email tidak valid.',
                'email.unique' => 'Email sudah digunakan.',
                'password.required' => 'Kolom password harus diisi.',
                'password.min' => 'Password minimal harus 8.',
            ];
        }else {
            return [
                'name.required' => 'Kolom nama harus diisi.',
                'email.required' => 'Kolom email harus diisi.',
                'email.email' => 'Format email tidak valid.',
                'email.unique' => 'Email sudah digunakan.',
            ];
        }
    }

    public function prepareForValidation()
    {
        if(!$this->password && in_array('POST',$this->route()->methods)) $this->merge(["password" => 'password']);
    }
}
