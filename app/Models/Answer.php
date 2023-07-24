<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;

    protected $fillable = [
        'answer',
        'ask_id',
    ];

    public function ask()
    {
        return $this->belongsTo(Ask::class)->select('id', 'question');
    }
}
