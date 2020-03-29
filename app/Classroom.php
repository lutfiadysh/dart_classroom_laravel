<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    protected $table = 'classroom';

    protected $fillable = ['leader_id','class_name','class_desc','class_pict'];
}
