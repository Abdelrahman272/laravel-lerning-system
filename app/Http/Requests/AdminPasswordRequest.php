<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminPasswordRequest extends FormRequest
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
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ];
    }

    public function messages()
    {
        return [
            'old_password.required' => 'هذا الحقل مطلوب.',
            'new_password.required' => 'هذا الحقل مطلوب.',
            'new_password.confirmed' => 'الرقم السري الجديدة غير متطابقة.',
        ];
    }
}
