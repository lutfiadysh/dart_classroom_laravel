<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table = 'classroom_task';

    protected $fillable = [
        'classroom_id','task_title','task_body','due_task'
    ];

    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }
    public function collect()
    {
        return $this->hasOne('App\Collect','task_id');
    }
}
