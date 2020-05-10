<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Collect extends Model
{
    protected $table = 'collected_task';
    protected $fillable =
    [
        'user_id','task_id','task_file','collected'
    ];

    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }
    public function task()
    {
        return $this->belongsTo('App\Task','task_id');
    }
    public function userCollect()
    {
        return $this->hasMany('App\User','user_id');
    }
}
