<?php

namespace App\Http\Requests;

use App\Models\Admin;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class AdminProfilUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        $userId = Auth::guard('admin')->user()->id;

        return [
            'firstName' => ['string', 'max:255'],
            'lastName' => ['string', 'max:255'],
            'email' => ['email', 'max:255', Rule::unique('admins')->ignore($userId)],
        ];
    }
}
