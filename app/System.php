<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class System extends Model
{
    public $timestamps = false;

    protected $fillable = ['ID','Name'];

    protected $primaryKey = 'ID';
    
    public function subsystems()

    {

        return $this->hasMany(SubSystem::class);

    }

    public function cms()

    {

        return $this->belongsTo(Cm::class);

    }
}
