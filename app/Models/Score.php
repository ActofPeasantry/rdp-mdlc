<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    use HasFactory;


    protected $fillable = [
        'start_at',
        'student_id',
        'task_id',
    ];

    public function task()
    {
        return $this->belongsTo('App\Models\Task', 'task_id');
    }

    public function students()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

}
