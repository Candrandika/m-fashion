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
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,except,'. $this->user,
            'password' => 'nullable',
            "role" => 'required',
            'role.*' => 'required|exists:roles,name',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Kolom nama harus diisi.',
            'email.required' => 'Kolom email harus diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah digunakan.',
            'password.nullable' => 'Kolom password tidak boleh diisi.',
            'role.required' => 'Kolom role harus diisi.',
            'role.*.required' => 'Kolom role harus diisi.',
            'role.*.exists' => 'Role tidak valid.',
        ];
    }
}
