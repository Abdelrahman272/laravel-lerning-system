<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SessionRequest extends FormRequest
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
            'name' => 'required|string|max:100|regex:/^[^<>]+$/',
            'episode' => 'required|integer',
            'level_id' => 'required|integer',
            'video' => 'required_with:id|mimes:mp4,ogx,oga,ogv,ogg,webm,mkv',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'الحقل مطلوب',
            'name.string' => 'الحقل يجب ان يكون حروف وارقام',
            'episode.integer' => 'الحقل يجب ان يكون رقم',
            'episode.required' => 'الحقل مطلوب',
            'level_id.required' => 'الحقل مطلوب',
            'level_id.integer' => 'الحقل يجب ان يكون رقم',
            'video.required' => 'الحقل مطلوب',
            'video.mimes' => 'الحقل يجب ان يكون ملف mp4, ogx, oga, ogv, ogg, webm',
        ];
    }
}
