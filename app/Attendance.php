<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    //
    protected $guarded = [];

    public function users(){
        return $this->belongsTo(User::class, 'userId');
    }
}
