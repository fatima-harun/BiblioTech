<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'name' => 'required|min:6',
            'email' => "required|email|unique:users,email",
            'password' => "required|min:8|max:20"
        ];
    }
    public function validated($key = null, $default = null)
    {
        return array_merge($this->validator->validated(), [
            'password' => Hash::make(request('password'))
        ]);
    }
    }

