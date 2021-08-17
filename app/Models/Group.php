<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'lecturer_id',
    ];

    public function lecturers()
    {
        return $this->belongsTo('App\Models\Lecturer', 'lecturer_id');
    }

    public function details()
    {
        return $this->hasMany('App\Models\groupDetail', 'group_id', 'id');
    }
}
