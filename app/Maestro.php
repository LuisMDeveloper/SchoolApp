<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Maestro extends Model
{
    /**
     * Get the user.
     */
    public function user()
    {
        return $this->morphOne('App\User', 'loggable');
    }

    /**
     * Get the cursos of this maestro.
     */
    public function cursos()
    {
        return $this->hasMany('App\Curso');
    }
}
