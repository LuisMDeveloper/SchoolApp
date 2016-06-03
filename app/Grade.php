<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    protected $fillable = array('competency_id', 'alumno_id', 'grade');

    /**
     * Get the alumno that owns the Grade.
     */
    public function alumno()
    {
        return $this->belongsTo('App\Alumno');
    }

    /**
     * Get the competency that owns the Grade.
     */
    public function competency()
    {
        return $this->belongsTo('App\Competency');
    }

    public function scopeOfCompetency($query, $competency_id)
    {
        return $query->where('competency_id', $competency_id);
    }
}
