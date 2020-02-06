<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CmDetailAdditional extends Model
{
    public function cmdetail()

    {

        return $this->belongsto(CmDetail::class);

    }
}
