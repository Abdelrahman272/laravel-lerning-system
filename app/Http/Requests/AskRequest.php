<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AskRequest extends FormRequest
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
            'question' => 'required|string|max:500',
        ];
    }

    public function messages()
    {
        return [
            'question.required' => 'هذا الحقل مطلوب',
            'question.string' => 'يجب ان يكون الحقل من نص',
            'question.max' => 'يجب ان يكون الحقل اقل من 500 حرف',
        ];
    }
}
