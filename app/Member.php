<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $table = 'classroom_member';
    protected $fillable = ['classroom_id','user_id'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function class()
    {
        return $this->belongsTo('App\Classroom','classroom_id');
    }
}
