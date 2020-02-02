<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Additional extends Model
{
    public function cm()

    {

        return $this->belongsto(Cm::class);

    }
}
