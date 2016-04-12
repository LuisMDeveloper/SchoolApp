<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    /**
     * Get the alumnos of this grupo.
     */
    public function alumnos()
    {
        return $this->hasMany('App\Alumno');
    }
}
