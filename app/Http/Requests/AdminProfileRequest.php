<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminProfileRequest extends FormRequest
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
            'first_name' => 'required|string|max:255|regex:/^[^<>]+$/',
            'last_name' => 'required|string|max:255|regex:/^[^<>]+$/',
            'phone' => 'required|string|max:20|regex:/^[^<>]+$/',
            'email' => 'required|email|max:255|regex:/^[^<>]+$/',
            'photo' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'هذا الحقل مطلوب.',
            'regex' => 'هذا الحقل يجب أن يحتوي على حروف وأرقام فقط.',
            'max' => 'هذا الحقل يجب أن يحتوي على :max حرف كحد أقصى.',
            'email' => 'هذا الحقل يجب أن يكون عنوان بريد إلكتروني صحيح.',
            'string' => 'هذا الحقل يجب أن يحتوي على أحرف فقط.',
            'image' => 'هذا الحقل يجب أن يكون صورة.',
            'mimes' => 'هذا الحقل يجب أن يكون من نوع: :values.',
            'max' => 'هذا الحقل يجب أن يكون حجمه :max كيلوبايت كحد أقصى.',
        ];
    }

}
