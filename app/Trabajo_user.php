<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trabajo_user extends Model
{
    protected $table = "trabajo_user";

    public $timestamps = false;

    public function trabajo() {
        return $this->belongsTo('App\Trabajo');
    }

    public function user() {
        return $this->belongsTo('App\User');
    }
}