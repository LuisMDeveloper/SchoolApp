<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    /**
     * Get the cursos of this materia.
     */
    public function cursos()
    {
        return $this->hasMany('App\Curso');
    }
}
