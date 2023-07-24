<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'episode',
        'video',
        'level_id'
    ];

    public function level()
    {
        return $this->belongsTo(Level::class)->select('id', 'name');
    }
}
