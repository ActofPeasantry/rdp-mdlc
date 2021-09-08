<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class scoreDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'text',
    ];

    public function score()
    {
        return $this->belongsTo('App\Models\Score', 'score_id');
    }

    public function question()
    {
        return $this->belongsTo('App\Models\Question', 'question_id');
    }
}
