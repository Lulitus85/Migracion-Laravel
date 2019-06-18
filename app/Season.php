<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Season extends Model
{
    protected $guarded = [];

    public function series(){
        return $this->belongsTo(Series::class, 'serie_id');
    }

    public function episodes(){
        return $this->hasMany(Episode::class);
    }
}
