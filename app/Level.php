<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    public function cms()

    {

        return $this->hasMany(Cm::class);

    }
}
