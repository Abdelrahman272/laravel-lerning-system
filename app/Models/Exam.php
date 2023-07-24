<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'level_id',
        'session_id',
        'question_count',
        'score',
        'duration',
        'start_time',
        'end_time',
    ];

    protected $casts = [
        'start_time' => 'datetime',
        'end_time' => 'datetime',
    ];

    public function level()
    {
        return $this->belongsTo(Level::class)->select('id', 'name');
    }

    public function session()
    {
        return $this->belongsTo(Session::class);
    }
}
