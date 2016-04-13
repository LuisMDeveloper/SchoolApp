<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    /**
     * Get the materia record associated with the curso.
     */
    public function materia()
    {
        return $this->belongsTo('App\Materia');
    }

    /**
     * Get the maestro record associated with the curso.
     */
    public function maestro()
    {
        return $this->belongsTo('App\Maestro');
    }

    /**
     * The grupos that belong to the curso.
     */
    public function grupos()
    {
        return $this->belongsToMany('App\Grupo');
    }
}
