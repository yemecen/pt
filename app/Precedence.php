<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Precedence extends Model
{
    public function cms()

    {

        return $this->hasMany(Cm::class,'PrecedenceID');

    }
}
