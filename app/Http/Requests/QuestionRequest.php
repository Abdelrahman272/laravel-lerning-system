<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuestionRequest extends FormRequest
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
            'question_text' => 'required|string|max:500|regex:/^[^<>]+$/',
            'answers' => 'required|regex:/^[^<>]+$/|string',
            'is_correct' => 'required|regex:/^[^<>]+$/|string',
            'score' => 'required|numeric',
            'exam_id' => 'required|numeric|exists:exams,id',
        ];
    }

    public function messages()
    {
        return [
            'question_text.required' => 'الحقل مطلوب',
            'question_text.string' => 'الحقل يجب ان يكون حروف وارقام',
            'question_text.regex' => 'الحقل يجب ان يكون حروف وارقام',
            'answers.required' => 'الحقل مطلوب',
            'answers.string' => 'الحقل يجب ان يكون حروف وارقام',
            'answers.regex' => 'الحقل يجب ان يكون حروف وارقام',
            'is_correct.required' => 'الحقل مطلوب',
            'is_correct.string' => 'الحقل يجب ان يكون حروف وارقام',
            'is_correct.regex' => 'الحقل يجب ان يكون حروف وارقام',
            'score.required' => 'الحقل مطلوب',
            'score.numeric' => 'الحقل يجب ان يكون رقم',
            'exam_id.required' => 'الحقل مطلوب',
            'exam_id.numeric' => 'اختر الحقل',
            'exam_id.exists' => 'هذا الحقل غير موجود',
            'is_correct.numeric' => 'الحقل يجب ان يكون رقم',
            'score.numeric' => 'الحقل يجب ان يكون رقم',
            'exam_id.required' => 'الحقل مطلوب',
            'exam_id.integer' => 'الحقل يجب ان يكون رقم',
            'exam_id.exists' => 'هذا الحقل غير موجود',
            'is_correct.regex' => 'الحقل يجب ان يكون رقم',
            'is_correct.string' => 'الحقل يجب ان يكون حروف وارقام',
            'score.regex' => 'الحقل يجب ان يكون رقم',
            'score.string' => 'الحقل يجب ان يكون حروف وارقام',
            'answers.regex' => 'الحقل يجب ان يكون حروف وارقام',
            'answers.string' => 'الحقل يجب ان يكون حروف وارقام',
        ];
    }
}
