<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'no',
        'text',
        'task_id',
    ];

    public function task()
    {
        return $this->belongsTo('App\Models\Task', 'task_id');
    }
}
