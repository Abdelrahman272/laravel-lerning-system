<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
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
            'name'=>'required | max:50 |min:3|regex:/^[^<>]+$/',
            'phone' => 'required|max:20|regex:/^[^<>]+$/|unique:users,phone,'.$this->id,
            'parent_phone' => 'required|regex:/^[^<>]+$/|max:20|unique:users,parent_phone,'.$this->id,
            'level_id'  => 'required|exists:levels,id',
            'password'   => 'required_without:id|confirmed|regex:/^[^<>]+$/|min:8',
        ];
    }

    public function messages()
    {
        return [
            'required'  => 'هذا الحقل مطلوب ',
            'numeric'  => 'هذا الحقل يجب ان يكون رقم ',
            'regex'  => 'هذا الحقل يجب ان يكون حروف وارقام ',
            'max'  => 'هذا الحقل طويل',
            'level_id.exists'  => 'المستوى غير موجود ',
            'name.string'  =>'الاسم لابد ان يكون حروف او حروف وارقام ',
            'phone.unique' => 'رقم الهاتف مستخدم من قبل ',
            'parent_phone.unique' => 'رقم الهاتف مستخدم من قبل ',
            'password.required_without' => 'هذا الحقل مطلوب ',
            'password.confirmed' => 'كلمة المرور غير متطابقة ',
            'password.regex' => 'هذا الحقل يجب ان يكون حروف وارقام ',
            'password.min' => 'هذا الحقل لا يقل عن 8 ارقام ',
        ];
    }
}
