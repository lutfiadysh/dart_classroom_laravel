<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Collect extends Model
{
    protected $table = 'collected_task';
    protected $fillable =
    [
        'user_id','task_id','task_file'
    ];
}
