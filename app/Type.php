<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    public $timestamps = false;

    protected $fillable = ['ID','Name'];

    protected $primaryKey = 'ID';
    
    public function cms()

    {

        return $this->hasMany(Cm::class,'TypeID');

    }
}
