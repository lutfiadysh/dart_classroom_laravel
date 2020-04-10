<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table = 'classroom_task';

    protected $fillable = [
        'classroom_id','task_title','task_body','due_task'
    ];
}
