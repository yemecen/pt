<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Additional extends Model
{
    public $timestamps = false;

    public function cm()

    {

        return $this->belongsTo(Cm::class,'CmID');

    }
}
