<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Series extends Model
{
    protected $guarded=[];

    public function seasons(){
        return $this->hasMany(Season::class);
    }

    public function genre(){
        return $this->belongsTo(Genre::class);
    }


}
