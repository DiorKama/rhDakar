<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string',
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required',
            'phone_number' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'manager_id' => 'nullable|integer',
        ];
    }

    public function messages(): array
{
    return [
        'email.unique' => 'blablabla A title is required',
    ];
}
}
