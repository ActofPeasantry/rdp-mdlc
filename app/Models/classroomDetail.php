<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class classroomDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'group_id',
        'student_id',
        'grade',
    ];

    public function groups()
    {
        return $this->belongsTo('App\Models\Group', 'group_id');
    }

    public function students()
    {
        return $this->belongsTo('App\Models\Student', 'student_id');
    }
}
