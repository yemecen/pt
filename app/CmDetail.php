<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CmDetail extends Model
{
    public function cm()
    {

        return $this->belongsTo(Cm::class,'CmID');

    }
    public function additionals()
    {

        return $this->hasMany(CmDetailAdditional::class,'CmDetailID','ID');

    }
}
