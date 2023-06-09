<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequests extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
               
            'name' => [
                'required',
                'min:5',
                'max:10',
                Rule::unique('users')->ignore($this->id),
            ],
            'email' => [
                'required',
                'max:20',
                Rule::unique('users')->ignore($this->id),
            ],
            'password' => [
                'required',
                'min:8',
                'max:20',
                Rule::unique('users')->ignore($this->id),
            ]
                
        ];
    }
}
