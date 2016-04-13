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

    /**
     * The grupos that belong to the curso.
     */
    public function cursos()
    {
        return $this->belongsToMany('App\Curso');
    }
}
