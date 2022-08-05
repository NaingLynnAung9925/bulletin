<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PasswordRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'current_password' => "required",
            'new_password' => 'required|min:5',
            'confirm_password' => 'required|same:new_password'
        ];
    }
    public function messages()
    {
        return [
            'current_password.required' => 'Current Password is required',
            'new_password.required' => 'New Password is required',
            'confirm_password.required' => 'Confirm Password is required'
        ];
    }
}
