<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    /**
     * Get the user.
     */
    public function user()
    {
        return $this->morphOne('App\User', 'loggable');
    }

    /**
     * Get the grupo of this alumno.
     */
    public function grupo()
    {
        return $this->belongsTo('App\Grupo');
    }
}
