<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubSystem extends Model
{
    public function system()

    {

        return $this->belongsTo(System::class);

    }

    public function cms()

    {

        return $this->hasMany(Cm::class,'SubSystemID');

    }
}
