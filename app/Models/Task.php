<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'due_date',
        'time',
        'classroom_id',
        'student_id',
    ];

    public function classroom()
    {
        return $this->belongsTo('App\Models\Classroom', 'classroom_id');
    }

    public function question()
    {
        return $this->hasMany('App\Models\Question', 'task_id', 'id');
    }

    public function scores()
    {
        return $this->hasOne('App\Models\Score', 'task_id', 'id');
    }


}
