<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Authorization extends Model
{
    public function users()
    {

        return $this->belongsToMany(User::class,'user_authorizations');

    }
}
