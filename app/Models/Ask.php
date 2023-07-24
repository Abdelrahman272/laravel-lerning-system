<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ask extends Model
{
    use HasFactory;

    protected $fillable = [
        'question',
    ];

    public function answers()
    {
        return $this->hasMany(Answer::class, 'ask_id')->whereNotNull('ask_id');
    }
}
