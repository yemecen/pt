<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CmDetailAdditional extends Model
{
    public $timestamps = false;

    public function cmdetail()

    {

        return $this->belongsTo(CmDetail::class,'CmDetailID','ID');

    }
}
