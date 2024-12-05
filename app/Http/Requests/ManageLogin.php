<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ManageLogin extends FormRequest
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
            'email'=>'required|email|',
            'password'=>'min:8|max:30',
        ];
    }
}
