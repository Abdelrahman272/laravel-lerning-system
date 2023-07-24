<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Code extends Model
{
    use HasFactory;

    protected $fillable = [
        'level_id',
        'code',
    ];

    public function level()
    {
        return $this->belongsTo(Level::class)->select('id', 'name');
    }
}
