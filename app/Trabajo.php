<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trabajo extends Model
{
    public $timestamps = false;
    
    public function users() {
        return $this->belongsToMany('App\User');
    }
    
    public function citas() {
        return $this->hasMany('App\Cita');
    }
}
