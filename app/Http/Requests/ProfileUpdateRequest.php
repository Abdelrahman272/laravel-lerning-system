<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => ['string', 'max:255'],
            'phone' => 'required||regex:/^[^<>]+$/|max:12|unique:users,phone,' . $this->id,
            'parent_phone' => 'required|regex:/^[^<>]+$/|max:12|unique:users,parent_phone,' . $this->id,
            'level_id'  => 'required|exists:levels,id',
        ];
    }

    public function messages()
    {
        return [
            'required'  => 'هذا الحقل مطلوب ',
            'numeric'  => 'هذا الحقل يجب ان يكون رقم ',
            'regex'  => 'هذا الحقل يجب ان يكون حروف وارقام ',
            'max'  => '  هذا الحقل يجب ان يكون اقل من 12 رقم',
            'level_id.exists'  => 'المستوى غير موجود ',
            'unique'  => 'رقم الهاتف مستخدم من قبل ',
        ];
    }
}
