<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cm extends Model
{
    public function additionals()
    {

        return $this->hasMany(Additional::class);

    }

    public function type()
    {

        return $this->belongsTo(Type::class);

    }

    public function level()
    {

        return $this->belongsTo(Level::class);

    }
    
    public function precedence()
    {

        return $this->belongsTo(Precedence::class,'PrecedenceID');

    }

    public function system()
    {

        return $this->belongsTo(System::class);

    }

    public function subsystem()
    {

        return $this->belongsTo(Subsystem::class,'SubSystemID');

    }

    public function user()
    {

        return $this->belongsTo(User::class,'UserID');

    }
}
