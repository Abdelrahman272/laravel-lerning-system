<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'question_text',
        'answers',
        'is_correct',
        'score',
        'exam_id'
    ];

    public function exam()
    {
        return $this->belongsTo(Exam::class)->select('id', 'name');
    }
}
