<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    protected $guarded = [];

    public function season(){
        return $this->belongsTo(Season::class);
    }
}
