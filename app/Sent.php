<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sent extends Model
{
    //A message belongs to a user

    public function user()

    { 
        return $this->belongsTo('App\User');
    }
}
