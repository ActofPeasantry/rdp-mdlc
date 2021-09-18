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
        'max_score',
        'task_id',
    ];

    public function task()
    {
        return $this->belongsTo('App\Models\Task', 'task_id');
    }

    function textEditor() {
        // $data = trim($this->text);
        // $data = stripslashes($this->text);
        // $data = htmlspecialchars($this->text);
        return htmlspecialchars_decode(htmlspecialchars_decode($this->text));

    }
}
