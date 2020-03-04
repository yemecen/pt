<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stat extends Model
{
    public $timestamps = false;

    protected $fillable = ['ID','Name','Badge'];

    protected $primaryKey = 'ID';

    public function cms()

    {

        return $this->hasMany(Cm::class,'StatID');

    }
}
