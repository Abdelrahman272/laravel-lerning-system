<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CodeRequest extends FormRequest
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
            'level_id' => 'required|numeric|regex:/^[^<>]+$/',
            'count' => 'required|numeric|max:15|regex:/^[^<>]+$/',
        ];
    }

    public function messages()
    {
        return [
            'required'  => 'هذا الحقل مطلوب ',
            'numeric'  => 'هذا الحقل يجب ان يكون رقم ',
            'max'  => '15 هذا الحقل يجب ان يكون اقل من ',
            'level_id.exists'  => 'المستوى غير موجود ',
        ];
    }
}
