<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExamRequest extends FormRequest
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
            'name' => 'required|string|max:255|regex:/^[^<>]+$/',
            'level_id' => 'required|exists:levels,id|min:1|integer',
            'session_id' => 'required|exists:sessions,id|min:1|integer',
            'question_count' => 'required|integer|regex:/^[^<>]+$/',
            'score' => 'required|integer|regex:/^[^<>]+$/',
            'duration' => 'required|integer|min:1|regex:/^[^<>]+$/',
            'start_time' => 'required|date|after:now|regex:/^[^<>]+$/',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'هذا الحقل مطلوب',
            'integer' => 'هذا الحقل يجب أن يكون رقم',
            'exists' => 'المستوى غير موجود',
            'min' => 'قيمة هذا الحقل يجب أن تكون على الأقل :min',
            'max' => 'قيمة هذا الحقل يجب أن تكون على الأكثر :max',
            'date' => 'هذا الحقل يجب أن يكون تاريخ صحيح',
            'after' => 'هذا الحقل يجب أن يكون تاريخ بعد :date',
        ];
    }
}
