<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudyMaterial extends Model
{
    use HasFactory;

    public $fillable = [
        'title',
        'abstract',
        'description',
        'classroom_id'
    ];

    public function classroom()
    {
        return $this->belongsTo('App\Models\Classroom', 'classroom_id');
    }
}
