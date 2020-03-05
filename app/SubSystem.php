<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubSystem extends Model
{
    public $timestamps = false;

    protected $fillable = ['ID','SystemID','Name'];

    protected $primaryKey = 'ID';

    public function system()

    {

        return $this->belongsTo(System::class,'SystemID');

    }

    public function cms()

    {

        return $this->hasMany(Cm::class,'SubSystemID');

    }
}
