<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    public function trabajo() {
        return $this->belongsTo('App\Trabajo');
    }
    
    public function user() {
        return $this->belongsTo('App\User');
    }
}
