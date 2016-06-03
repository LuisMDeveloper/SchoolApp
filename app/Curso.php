<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Curso extends Model
{
    public function getInicioAttribute($value)
    {
        return Carbon::parse($value)->toFormattedDateString();
    }

    public function getFinAttribute($value)
    {
        return Carbon::parse($value)->toFormattedDateString();
    }

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

    /**
     * Get the competencies for the curso.
     */
    public function competencies()
    {
        return $this->hasMany('App\Competency');
    }
}
